<?php
/**
 * Created by PhpStorm.
 * User: 张凯凯
 * Date: 2017/12/26
 * Time: 21:51
 */
namespace app\common\model;
use think\Model;
class Featured extends BaseModel
{
    public function getFeaturedsByType($type)
    {
        $data=[
          'type'=>$type,
            'status'=>['neq',-1]
        ];
        $order = ['id'=>'desc'];
        $result = $this->where($data)
            ->order($order)
            ->paginate(1);
        //echo $this->getLastSql();
        return $result;
    }
}