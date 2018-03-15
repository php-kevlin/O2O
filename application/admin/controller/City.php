<?php
namespace app\admin\controller;

use think\Controller;

class City extends Base
{
    private $obj;
    public function _initialize()
    {
        $this->obj = model('City');
    }

    public function index()
    {
        $shengfen = $this->obj->getNormalCitysByParentId();
        return $this->fetch('',[
           'shengfen'=>$shengfen
        ]);
    }


}
