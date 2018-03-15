<?php
namespace app\bis\controller;
use think\Controller;
class Index extends Base
{
    public function index()
    {
        $name = $this->getLoginUser()->username;
        $id = $this->getLoginUser()->id ;
        return $this->fetch('',[
            'name'=>$name,
        ]);
    }
}
