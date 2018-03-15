<?php
/**
 * Created by PhpStorm.
 * User: 张凯凯
 * Date: 2017/12/25
 * Time: 17:47
 */
function show($status,$message='',$data=[])
{
    return [
        'status' => $status,
        'message' => $message,
        'data' => $data
    ];
}