<?php
/**
 * Created by PhpStorm.
 * User: 张凯凯
 * Date: 2017/12/26
 * Time: 20:55
 */
namespace app\common\model;
use think\Model;
class Bis extends BaseModel
{
public function getBisByStatus($status = 0)
{
    $order = [
        'id'=>'desc',
    ];
    $data = [
        'status' => $status,
    ];
    $result =$this->where($data)
        ->order($order)
        ->paginate(2);
    return $result;
}
}