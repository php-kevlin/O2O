<?php
/**
 * Created by PhpStorm.
 * User: 张凯凯
 * Date: 2018/1/10
 * Time: 11:36
 */
namespace app\admin\controller;

use think\Controller;

class User extends Base
{
    private $obj;
    public function _initialize()
    {
        $this->obj = model('User');
    }

    public function index()
    {
        $users = $this->obj->getList();

        return $this->fetch('',[
            'users'=>$users
        ]);
    }


}
