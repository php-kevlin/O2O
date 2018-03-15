<?php
/**
 * Created by PhpStorm.
 * User: 张凯凯
 * Date: 2017/12/25
 * Time: 18:20
 */
namespace app\api\controller;
use think\Controller;
class Category extends Controller
{
    private $obj;
    public function _initialize()
    {
        $this->obj = model("Category");
    }
    public function getCategoryByParentId($id)
    {
        $id = input('post.id',0,'intval');
        if(!$id){
            $this->error('ID不合法');
        }
        //获取二级分类名
        $categorys = $this->obj->getNormalCategoryByParentId($id);
        if(!$categorys){
            return show(0,'error');
        }else{
            return show(1,'success',$categorys);
        }
    }
}