<?php
namespace app\admin\controller;

use think\Controller;

class Category extends Base
{
    private $obj;
    public function _initialize()
    {
        $this->obj = model('Category');
    }

    public function index()
    {
        $parent_id = input('get.parent_id',0,'intval');


        $categorys = $this->obj->getFirstCategorys($parent_id);
        return $this->view->fetch('index',[
            'categorys' =>$categorys,
        ]);
    }

    public function add()
    {
        $categorys =  $this->obj->getNormalFirstCategory();
        $this->view->assign('categorys',$categorys);
        return $this->fetch('add');
    }

    public function save()
    {
        /**
         * 做下严格判定
         */
        if(!request()->isPost()){
            $this->error('请求失败');
        }

        $data = input('post.');

        $validate = validate('Category');

        if(!$validate->scene('add')->check($data)){
            $this->error($validate->getError());
        }

        if(!empty($data['id'])){
            return $this->update($data);
        }

        $res =  $this->obj->add($data);
        if($res){
            $this->success('新增成功');
        }else{
            $this->error('新增失败');
        }
    }

    /**
     * 编辑页面
     */
    public function edit($id)
    {
        //echo input('get.id');
       // echo $id;
        if(intval($id)<1)
        {
            $this->error('参数不合法');
        }
        $category = $this->obj->get($id);
        $categorys = $this->obj->getNormalFirstCategory();
        return $this->fetch('edit',[
            'categorys' =>$categorys,
            'category' => $category,
        ]);

    }

    public function update($data){

       $res = $this->obj->save($data,['id'=>intval($data['id'])]);
       if($res){
           $this->success('更新成功');
       }else{
           $this->error('更新失败');
       }
    }

    /**
     * 排序逻辑
     */
    public function listorder($id,$listorder){
        $res = $this->obj->save(['listorder'=>$listorder],['id'=>$id]);
        if($res){
            return $this->result($_SERVER['HTTP_REFERER'],1,'success');
        }else{
            return $this->result($_SERVER['HTTP_REFERER'],0,'更新失败');
        }
    }




}
