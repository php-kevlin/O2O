<?php
namespace app\common\validate;
use think\Validate;
class Location extends Validate
{
    //分店数据校验
    protected $rule = [
        'name'=>'require',
        'logo'=>'require',
        'tel'=>'require',
        'contant'=>'require',
        'category_id'=>'require',
        'city_id'=>'require',
        'api_adress'=>'require',
        'open_time'=>'require',
        'content'=>'require',
    ];

    //场景设置
    protected  $scene = [
        'add' => ['name','logo','city_id','tel',
            'contant','category_id','city_id','open_time'],
    ];
}