<?php
namespace app\api\controller;
use think\Controller;

class City extends Controller
{
    private $obj;
    public function _initialize()
    {
       $this->obj = model("City");
    }

    public function getCityByParentId()
    {
        $id = input('post.id');
        if(!$id){
            $this->error('ID不合法');
        }
        //通过id获取二级城市
        $citys = $this->obj->getNormalCitysByParentId($id);
        if(!$citys){
            return show(0,'error');
        }
        return show(1,'success',$citys);
    }
}