<?php
namespace app\admin\controller;

use think\Controller;

class Deal extends Controller
{
    private $obj;
    public function _initialize()
    {
       $this->obj = model('Deal');
    }

    public function index()
    {
        $cityarrs = [];
        $categoryarrs = [];
        $categorys = model('Category')->getNormalCategoryByParentId();
        $citys = model('City')->getNormalCitys();
        foreach ($categorys as $category)
        {
            $categoryarrs[$category->id]= $category->name;
        }

        foreach ($citys as $city)
        {
            $cityarrs[$city->id]= $city->name;
        }

            $data = input('get.');
            if (!empty($data['category_id'])) {
                $sdata['category_id'] = $data['category_id'];
            }
            $sdata = [];
            if (!empty($data['city_id'])) {
                $sdata['city_id'] = $data['city_id'];
            }
            if (!empty($data['start_time']) && !empty($data['end_time']) && strtotime($data['end_time']) > strtotime($data['start_time'])) {
                $sdata['create_time'] = [
                    ['lt', strtotime($data['end_time'])],
                    ['gt', strtotime($data['start_time'])]
                ];
            }

            if (!empty($data['name'])) {
                $sdata['name'] = ['like', '%' . $data['name'] . '%'];
            }

           $deals = $this->obj->getNormalDeals($sdata);

            return $this->view->fetch('index', [
                'categorys' => $categorys,
                'citys' => $citys,
                'deals'=>$deals,
                'category_id'=>empty($data['category_id'])?'':$data['category_id'],
                'city_id'=>empty($data['city_id'])?'':$data['city_id'],
                'name'=>empty($data['name'])?'':$data['name'],
                'start_time'=>empty($data['start_time'])?'':$data['start_time'],
                'end_time'=>empty($data['end_time'])?'':$data['end_time'],
                'cityarrs' =>$cityarrs,
                'categoryarrs' =>$categoryarrs
            ]);


    }

    public function apply()
    {
        $cityarrs = [];
        $categoryarrs = [];
        $categorys = model('Category')->getNormalCategoryByParentId();
        $citys = model('City')->getNormalCitys();
        foreach ($categorys as $category)
        {
            $categoryarrs[$category->id]= $category->name;
        }

        foreach ($citys as $city)
        {
            $cityarrs[$city->id]= $city->name;
        }
        $status = 0;
        $deals = $this->obj->getDealByStatus($status);
        return $this->fetch('',[
            'deals'=>$deals,
            'cityarrs' =>$cityarrs,
            'categoryarrs' =>$categoryarrs
        ]);



    }


    public function status()
    {
        $data = input('get.');
        /*
        $validate = validate('Category');

        if(!$validate->scene('status')->check($data)){
            $this->error($validate->getError());
        }
        */

        $res = $this->obj->save(['status'=>$data['status']],['id'=>$data['id']]);


        if($res){
            $this->success('状态更新成功');
        }else{
            $this->error('状态更新失败');
        }
    }




}
