<?php
namespace app\bis\controller;
use think\Controller;
class Base extends Controller
{
    private $account;
    public function _initialize()
    {
       $isLogin = $this->isLogin();
       if(!$isLogin)
       {
           return $this->redirect(url('login/index'));
       }
    }
    public function isLogin()
    {
        $user = $this->getLoginUser();
        if($user)
        {
            return true;
        }
        return false;

    }

    public function getLoginUser()
    {
        if(!$this->account)
        {
            $this->account = session('bisAccount','','bis');
        }

        return $this->account;
    }
}
