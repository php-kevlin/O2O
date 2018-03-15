<?php
namespace app\index\controller;

use think\Controller;

class User extends Controller
{
    public function login()
    {

        $user = session('o2o_user','','o2o');
        if($user &&$user->id)
        {
            $this->redirect('index/index');
        }
        return $this->view->fetch('login');
    }
    public function register()
    {
        if(request()->isPost())
        {
            $data = input('post.');
            $res = $this->validate($data,[
                'verifycode|验证码'=>'require|captcha',
                'username|用户名'=>'require',
                'password|密码'=>'require',
                'email'=>'require'
            ]);

            if($res!==true)
            {
                return $this->error($res);
            }
            if($data['password']!=$data['repassword'])
            {
                return $this->error("两次输入的密码不一致");
            }
            //自动生成,密码的加盐字符串
            $data['code']=mt_rand(100,10000);
            $data['password']=md5($data['password'].$data['code']);

            $result = model('User')->add($data);
            if($result)
            {
                $this->success('注册成功','index/index');
            }else{
                $this->success('注册失败');
            }
            //print_r($data);exit;
        }
        return $this->view->fetch('register');
    }
    public function logincheck()
    {
        if(!request()->isPost())
        {
            $this->error('提交不合法');
        }
        $data = input('post.');
        $res =$this->validate($data,[
            'username|用户名'=>'require',
            'password|密码'=>'require'
            ]);
        if($res!==true)
        {
            return $this->error($res);
        }
        $user = model('User')->getUserByName($data['username']);
        //print_r($user['username']);exit;
        if(!$user||$user['status']!=1)
        {
            $this->error('用户不存在');
        }
        if($user['username'] == $data['username']&&$user['password']==md5($data['password'].$user['code']))
        {
            model('User')->updateById(['last_login_time'=>time()],$user->id);

            session('o2o_user',$user,'o2o');

            $this->success('登录成功','index/index');
        }else{
            $this->success('密码错误');
        }

    }


    public function logout()
    {
        session(null,'o2o');
        $this->redirect('user/login');
    }

}
