<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

function status($status)
{
    if($status ==1 )
    {
        $str = "<span class='label label-success radius'>正常</span>";
    }elseif ($status == 0) {
        $str = "<span class='label label-danger radius'>待审</span>";
    }else{
        $str = "<span class='label label-danger radius'>删除</span>";
    }
    return $str;
}

function isMain($val)
{
    if($val ==1 )
    {
        $str = "<span class='label label-success radius'>总店</span>";
    }else{
        $str = "<span class='label label-danger radius'>分店</span>";
    }
    return $str;
}

/**
 * @param $url
 * @param int $type 0 get 1 post
 * @param array $data
 */
function doCurl($url,$type=0,$data=[]){
    $ch = curl_init();  //1.初始化

    //2.设置选项
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_HEADER,0);

    if($type == 1)
    {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }

    // 3. 执行并获取HTML文档内容
    $output = curl_exec($ch);

    // 4. 释放curl句柄
    curl_close($ch);
    return $output;
}

//商户审核状态
 function bisRegister($status){
    if($status == 0){
        $str = "待审核，审核后平台会发送邮件通知，请关注邮件";
    }elseif ($status == 1){
        $str  = "入驻申请成功";
    }elseif ($status == 2){
        $str = "非常抱歉，你提交的材料不符合要求，请重新提交";
    }else{
        $str = "该申请已被删除";
    }

    return $str;
}

//支付状态
function pay_status($status)
{

    if($status ==1 )
    {
        $str = "<span class='label label-success radius'>支付成功</span>";
    }else{
        $str = "<span class='label label-danger radius'>未支付</span>";
    }
    return $str;

}


function getCityName($path)
{
    if(empty($path)){
        return '';
    }
    if(preg_match('/,/',$path))
    {
        $cityPath = explode(',',$path);
        $cityId = $cityPath[1];
    }else{
        $cityId = $path;
    }

    $city = model('City')->get($cityId);
    return $city->name;
}

function getCategory($path)
{
    if(empty($path)){
        return '';
    }
    if(preg_match('/,/',$path))
    {
        $categoryPath = explode(',',$path);
        $categoryId = $categoryPath[1];
    }else{
        $categoryId = $path;
    }

    $category = model('Category')->get($categoryId);
    return $category->name;
}


function countLocation($ids)
{
    if(!$ids)
    {
        return 1;
    }
    if(preg_match('/,/',$ids))
    {
        $arr = explode(',',$ids);
        return count($arr);
    }
    return 1;

}

/*
 * 设置订单号
 */
function setOrderSN()
{
    //dump(microtime());exit;
    list($t1,$t2) = explode(' ',microtime());
    $t3 = explode('.',$t1*1000);
    return $t2.$t3[0].rand(10000,99999);

}
















