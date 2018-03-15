<?php
namespace app\bis\controller;
use think\Controller;

class Login extends Controller
{
    public function index()
    {
        if(request()->isPost()){
            //登录的逻辑
            //获取相关的数据
            $data =input('post.');
            //数据校验validate
            $validate = validate('Login');
            if(!$validate->scene('login')->check($data))
            {
                return $this->error($validate->getError());
            }
            $ret = model('BisAccount')->get(['username'=>$data['username']]);
            if(!$ret  || $ret->status!=1)
            {
                return $this->error('该用户不存在，或者该用户审核未通过');
            }
            if($ret->password !=md5($data['password'].$ret->code))
            {
                return $this->error('密码错误');
            }

            model('BisAccount')->updateById(['last_login_time'=>time()],$ret->id);
            //保存用户信息到session中，bis是作用域
            session('bisAccount',$ret,'bis');

            return $this->success('登录成功',url('index/index'));

        }else{
            $account =  session('bisAccount','','bis');
            if($account && $account->id)
            {
                return $this->redirect(url('index/index'));
            }
            return $this->fetch('login/index');
        }

    }
    public function logout()
    {
        session(null,'bis');
        $this->redirect('login/index');
    }

}