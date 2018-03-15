<?php
/**
 * Created by PhpStorm.
 * User: 张凯凯
 * Date: 2017/12/29
 * Time: 12:18
 */
namespace app\admin\controller;

use think\Controller;

class Featured extends Base
{
    private $obj ;
    public function _initialize()
    {
       $this->obj = model('Featured');
    }

    public function index()
    {
        //获取推荐位类别
        $types = config('featured.featured_type');
        $type = input('get.type',0,'intval');
        //获取列表数
        $result = $this->obj->getFeaturedsByType($type);
        return $this->fetch('',[
            'types'=>$types,
            'featured' =>$result,
            'type'=>$type
        ]);

    }

    public function add()
    {
        if(request()->isPost())
        {
            //数据校验
            //入库数据
            $data = input('post.');
            $id = model('Featured')->add($data);
            if($id)
            {
                $this->success('添加成功');
            }else{
                $this->error('添加失败');
            }

        }else{
        //获取推荐位类别
        $types = config('featured.featured_type');
       // print_r($types);exit;
        return $this->fetch('add',[
            'types'=>$types,
        ]);
        }
    }






}
