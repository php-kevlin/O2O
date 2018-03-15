<?php
/**
 * Created by PhpStorm.
 * User: 张凯凯
 * Date: 2017/12/31
 * Time: 16:41
 */
namespace app\index\controller;
use think\Controller;

class Lists extends Base
{
    public function index()
    {
        //1.首先获取一级栏目
         $categorys = model('Category')->getNormalCategoryByParentId();
        $category[] =  '';
        $data = [];
        $orders = [];
         foreach ($categorys as $cate)
         {
             $category[] = $cate->id;
         }
         //2.获取分类id
        $id = input('get.id');
         if(in_array($id,$category)){//一级分类
             $categoryParentId = $id;
             $data['category_id'] =$id;
         }elseif($id){//二级分类
             //获取二级分类的数据
            $ca = model('Category')->get($id);
            if(!$ca || $ca['status']!=1){
                $this->error('数据不合法');
            }
             $categoryParentId = $ca->parent_id;
            $data['se_category_id'] = $id;
         }else{//0
             $categoryParentId = 0;
         }
         //获取分类下所有子分类
        $sedcategorys='';
        if($categoryParentId)
        {
            $sedcategorys = model('Category')->getNormalCategoryByParentId($categoryParentId);
        }

        //排序数据获得的逻辑
        $order_sales = input('order_sales','');
        $order_price = input('order_price','');
        $order_time = input('order_time','');


        if(!empty($order_sales))
        {
            $orderflag = 'order_sales';
            $orders['order_sales']= $order_sales;

        }elseif (!empty($order_price))
        {
            $orderflag = 'order_price';
            $orders['order_price']= $order_price;

        }elseif (!empty($order_time))
        {
            $orderflag = 'order_time';
            $orders['order_time']= $order_time;
        }else{
            $orderflag = '';
        }

        //根据上面条件查询商品列表数据
        $deals = model('Deal')->getDealByConditions($data,$orders);



        return $this->fetch('',[
            'title'=>'分类模板',
            'categorys'=>$categorys,
            'sedcategorys'=>$sedcategorys,
            'id'=>$id,
            'categoryParentId'=>$categoryParentId,
            'orderflag'=>$orderflag,
            'deals'=>$deals
        ]);
    }

}