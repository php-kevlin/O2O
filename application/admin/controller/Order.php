<?php
/**
 * Created by PhpStorm.
 * User: 张凯凯
 * Date: 2018/1/10
 * Time: 11:58
 */
namespace app\admin\controller;

use think\Controller;

class Order extends Base
{
    private $obj;
    public function _initialize()
    {
        $this->obj = model('Order');
    }

    public function index()
    {
        $orders  = $this->obj->getList();

        return $this->fetch('',[
            'orders'=>$orders
        ]);
    }


}
