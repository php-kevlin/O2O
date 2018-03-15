<?php
/**
 * Created by PhpStorm.
 * User: 张凯凯
 * Date: 2017/12/26
 * Time: 21:51
 */
namespace app\common\model;
use think\Model;
class BisAccount extends BaseModel
{
        public function updateById($data,$id)
        {

            return $this->allowField(true)->save($data,['id'=>$id]);
        }
}