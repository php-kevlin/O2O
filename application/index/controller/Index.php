<?php
namespace app\index\controller;

use think\Controller;

class Index extends Base
{
    public function index()
    {
        //获取首页大图数据


        //获取右侧推荐位数据

        //商品分类 数据-美食 推荐的数据
        $datas = model('Deal')->getNormalDealByCategory(1,$this->city->id);
        //获取4个子分类
        $meishicates = model('Category')->getNormalRecommendCategoryByParentId(1,4);
        return $this->view->fetch('index',[
            'datas'=>$datas,
            'meishicates'=>$meishicates
        ]);
    }

}
