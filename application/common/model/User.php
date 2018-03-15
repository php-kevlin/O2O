<?php
/**
 * Created by PhpStorm.
 * User: 张凯凯
 * Date: 2017/12/29
 * Time: 20:50
 */
namespace app\common\model;
use think\Model;

class User extends BaseModel
{
    public function getList()
    {

        return $this->where(['status' => 1])->paginate();
    }
    public function add($data = []){
        $data['status'] = 1;
        return $this->data($data)->allowField(true)->save();

    }

    public function getUserByName($name)
    {
      $user =  $this->where(['username'=>$name])->find();
      return $user;
    }


}
