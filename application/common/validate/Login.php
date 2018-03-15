<?php
namespace app\common\validate;
use think\Validate;
class Login extends Validate
{
    //商户登录数据校验
    protected $rule = [
        ['username','require','用户名不能为空'],
        ['password','require','密码不能为空'],
    ];

    //场景设置
    protected  $scene = [
        'login' => ['username','password'],
    ];
}