<?php
/**
 * Created by PhpStorm.
 * User: 张凯凯
 * Date: 2018/1/2
 * Time: 20:52
 */
namespace app\index\controller;
use think\controller;
class Order extends Base
{
    public function index()
    {
        $data = input('get.');
        $user = $this->getLoginUser();
        if(!$user)
        {
            $this->error('请登录','user/login');
        }
        $id = input('get.id',0,'intval');
        if(!$id)
        {
            $this->error('参数不合法');
        }
        $dealcount = input('get.deal_count',0,'intval');
        $totalprice = input('get.total_price',0,'intval');
        $deal = model('Deal')->find($id);
        if(!$deal ||$deal->status !=1)
        {
            $this->error('商品不存在');
        }
        if(empty($_SERVER['HTTP_REFERER']))
        {
            $this->error('请求不合法');
        }
        $orderSN =setOrderSN();
            //组装入库数据
        $data = [
          'out_trade_no'=>$orderSN,
            'user_id'=>$user->id,
            'username'=>$user->username,
            'deal_id'=>$id,
            'deal_count'=>$dealcount,
            'total_price'=>$totalprice,
            'referer'=>$_SERVER['HTTP_REFERER']
        ];
        $orderId = model('Order')->add($data);
        $this->redirect('pay/index',['id'=>$orderId]);
    }
    public function confirm()
    {
        if(!$this->getLoginUser())
        {
            $this->error('请登录','user/login');
        }

        $id = input('get.id',0,'intval');
        if(!$id)
        {
            $this->error('参数不合法');
        }
        $count = input('get.count',1,'intval');
        $deal = model('Deal')->find($id);
        if(!$deal ||$deal->status !=1)
        {
            $this->error('商品不存在');
        }
        $deal= $deal->toArray();
        return $this->fetch('confirm',[
            'count'=>$count,
            'deal'=>$deal
        ]);
    }
}