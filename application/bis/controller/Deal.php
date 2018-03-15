<?php
/**
 * Created by PhpStorm.
 * User: 张凯凯
 * Date: 2017/12/28
 * Time: 16:59
 */
namespace app\bis\controller;
use think\Controller;
class Deal extends Base
{
    public function index()
    {
        $bisId = $this->getLoginUser()->bis_id;
        $datas = model('Deal')->getDealByBisId($bisId);

        return $this->fetch('',[
            'datas'=>$datas,
        ]);
    }
    public function add()
    {
        $bisId = $this->getLoginUser()->bis_id;
        if(request()->isPost()){
            //走插入逻辑
            $data = input('post.');
            //校验数据

            $location = model('BisLocation')->get($data['location_ids'][0]);
            $deals = [
                'name'=>$data['name'],
                'image'=>$data['image'],
                'bis_id'=>$bisId,
                'category_id'=>$data['category_id'],
                'se_category_id'=>empty($data['se_category_id'])?'':implode(',',$data['se_category_id']),
                'city_id'=>$data['city_id'],
                'location_ids'=>empty($data['location_ids'])?'':implode(',',$data['location_ids']),
                'start_time'=>strtotime($data['start_time']),
                'end_time'=>strtotime($data['end_time']),
                'total_count'=>$data['total_count'],
                'origin_price'=>$data['origin_price'],
                'current_price'=>$data['current_price'],
                'coupons_begin_time'=>strtotime($data['start_time']),
                'coupons_end_time'=>strtotime($data['end_time']),
                'notes'=>"以后再修改",
                'description'=>$data['description'],
                //'notes'=>$data['notes'],
                'bis_count_id'=>$this->getLoginUser()->id,
                'xpoint'=>$location->xpoint,
                'ypoint'=>$location->ypoint,

            ];
            $id = model('Deal')->add($deals);
            if($id)
            {
                $this->success('添加成功',url('deal/index'));
            }else{
                $this->error('添加失败');
            }

        }else{
            //引用模板
            //获取一级城市的名称
            $citys = model('City')->getNormalCitysByParentId();
            $categorys = model('Category')->getNormalCategoryByParentId();
            return $this->fetch('',[
                'citys'=> $citys,
                'categorys'=>$categorys,
                'bislocations'=>model('BisLocation')->getNormalLocationByBisId($bisId),
            ]);
        }


    }
}