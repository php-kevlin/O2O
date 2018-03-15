<?php
/**
 * Created by PhpStorm.
 * User: 张凯凯
 * Date: 2017/12/28
 * Time: 10:51
 */

namespace app\bis\controller;
use think\Controller;
class Location extends Base
{
    public function index()
    {
        $bisId = $this->getLoginUser()->bis_id;
        $bisLocation = model('BisLocation')->getNormalLocationByBisId($bisId);
        return $this->fetch('',[
            'bislocations' =>$bisLocation,
        ]);
    }

    public function add()
    {
        if(request()->isPost()){
            //校验数据
            $data = input('post.');
            $validata = $this->validate('location');
            if(!$validata->scene('add')->check($data))
            {
                return $this->error($validata->getError());
            }
            //获取经纬度
            $lnglat = \Map::getLngLat($data['address']);
            if(empty($lnglat)|| $lnglat['status']!=0){
                $this->error('无法获取数据，或者匹配的数据不精准');
            }
            //获取二级分类
            $data['cat'] = '';
            if(!empty($data['se_category_id'])){
                $data['cat'] = implode('|',$data['se_category_id']);
            }
            //门店入库操作
            $bisId = $this->getLoginUser()->bis_id;
            $locationData = [
                'bis_id' =>$bisId,
                'name'=>$data['name'],
                'logo'=>$data['logo'],
                'tel'=>$data['tel'],
                'status'=>1,
                'contant'=>$data['contact'],
                'category_id'=>$data['category_id'],
                'category_path'=>$data['category_id'].','.$data['cat'],
                'city_id'=>$data['city_id'],
                'city_path'=>empty($data['se_city_id'])?$data['city_id']:$data['city_id'].','.$data['se_city_id'],
                'api_adress'=>$data['address'],
                'open_time'=>$data['open_time'],
                'content'=>$data['content'],
                'is_main'=>0,  //代表的是分店信息
                'xpoint'=>empty($lnglat['result']['location']['lng']) ? '': $lnglat['result']['location']['lng'],
                'ypoint'=>empty($lnglat['result']['location']['lng']) ? '': $lnglat['result']['location']['lat'],

            ];
            $locationId = model('BisLocation')->add($locationData);

            if($locationId)
            {
                return $this->success('门店申请成功');
            }else{
                return $this->error('门店申请失败');
            }
        }else {
            //获取一级城市的名称
            $citys = model('City')->getNormalCitysByParentId();
            $categorys = model('Category')->getNormalCategoryByParentId();
            return $this->fetch('', [
                'citys' => $citys,
                'categorys' => $categorys
            ]);

        }

    }
}