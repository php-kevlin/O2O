<?php
/**
 * Created by PhpStorm.
 * User: 张凯凯
 * Date: 2017/12/31
 * Time: 16:19
 */
namespace app\index\controller;

use think\Controller;

class Map extends Controller
{
        public function getMapImage($data)
        {
            return \Map::staticimage($data);
        }
}