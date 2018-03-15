<?php
namespace app\index\controller;

use think\Controller;

class Base extends Controller
{
    public $city;
    public $account;
    public function _initialize()
    {
        $citys = model('City')->getNormalCitys();
        //获取城市数据
        $this->getCity($citys);
        //获取首页分类的信息
        $cats = $this->getRecommendCats();
        $this->assign('cats',$cats);
        $this->assign('citys',$citys);
        $this->assign('city',$this->city);
        $this->assign('user',$this->getLoginUser());
        $this->assign('controller',strtolower(request()->controller()));
        $this->assign('title','o2o团购网');
    }

    public function getCity($citys)
    {
        $defaultname = '';
        foreach ($citys as $city)
        {
            $city = $city->toArray();

            if($city['is_default'] ==1 )
            {
                $defaultname = $city['uname'];
                break;
            }
        }

        $defaultname = $defaultname?$defaultname:'beijing';

        if(session('cityname','','o2o'&& !input('get.city')))
        {
            $cityuname = session('cityname','','o2o');
        }else{
            $cityuname = input('get.city',$defaultname,'trim');
            session('cityuname',$cityuname,'o2o');
        }

        $this->city = model('City')->where(['uname'=>$cityuname])->find();

    }


    public function getLoginUser()
    {
        if(!$this->account)
        {
            $this->account = session('o2o_user','','o2o');
        }
        return $this->account;
    }

    /**
     * 获取首页当中商品分类数据
     */
    public function getRecommendCats()
    {
        $parentIds = $sedCats = $recomCats = [];
        $cats = model('Category')->getNormalRecommendCategoryByParentId(0,5);
      foreach($cats as $cat)
      {
          $parentIds[] =$cat->id;
      }
      //获取二级分类的数据
       $sedCats = model('Category')->getNormalCategoryIdParentId($parentIds);
      foreach($sedCats as $sedcat)
      {
          $sedcatArr[$sedcat->parent_id][] = [
            'id'=>$sedcat->id,
              'name'=>$sedcat->name
          ];
      }

      foreach ($cats as $cat)
        {
            //代表是整个一级和二级数据
            //第一个参数是一级分类的name
            //第二个参数是此一级分类下面的所有二级分类数据
            $recomCats[$cat->id] = [$cat->name,empty($sedcatArr[$cat->id])?[]:$sedcatArr[$cat->id]];
        }
        return $recomCats;

    }

}
