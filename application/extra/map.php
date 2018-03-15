<?php
/**
 * 地图相关配置文件
 */
return [
    /*
     * http://api.map.baidu.com/geocoder/v2/?callback=renderOption&output=json&address=北京市海淀区上地10街10号&city=北京市&ak=7g2DH0QhwOjMhvYTMeM1YDoVl0zg4vYn
     * http://api.map.baidu.com/staticimage/v2?ak=7g2DH0QhwOjMhvYTMeM1YDoVl0zg4vYn&mcode=666666&center=116.403874,39.914888&width=300&height=200&zoom=11
     */
    'ak' => '7g2DH0QhwOjMhvYTMeM1YDoVl0zg4vYn',
    'baidu_map_url'=>'http://api.map.baidu.com/',
    'geocoder'=>'geocoder/v2/',
    'width' => 400,
    'height' =>300,
    'staticimage'=>'staticimage/v2'
];