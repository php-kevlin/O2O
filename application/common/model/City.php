<?php

namespace app\common\model;

use think\Model;

class City extends Model
{
    //
    public  function getNormalCitysByParentId($parentId = 0){
        $data = [
            'parent_id' => $parentId,
            'status' => ['neq',-1],
        ];

        $order = [
            'id'=>'desc',
        ];

        $result = $this->where($data)
            ->order($order)
            ->select();
        // echo $this->getLastSql();
        return $result;
    }

    public function getNormalCitys(){
        $data = [
          'status'=>1,
          'parent_id'=>['gt',0],
        ];
        $order = [

            'id'=>'desc',
        ];
        $restlt = $this->where($data)
            ->order($order)
            ->select();
        return $restlt;
    }

    /**
     * 根据分类以及城市来获取分类数据
     * @param $category_id 分类id
     * @param $city_id城市id
     * @param $limit显示条数
     */
    public function getNormalDealByCategory($category_id,$city_id,$limit)
    {
        $data = [
            'end_time'=>['gt',time()],
            'category_id'=> $category_id,
            'city_id'=>$city_id,
            'status' => 1
        ];

        $order = [
          'listorder'=>'desc',
            'id'=>'desc'
        ];
        $result = $this->where($data)
                    ->order($order);
        if($limit)
        {
            $result = $result->limit($limit);
        }
        return $result->select();


    }


}
