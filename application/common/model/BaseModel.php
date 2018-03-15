<?php
/**
 * Created by PhpStorm.
 * User: 张凯凯
 * Date: 2017/12/27
 * Time: 8:24
 */
namespace app\common\model;
use think\Model;
class BaseModel extends Model
{
    protected $autoWriteTimestamp = true;
    public function add($data)
    {
        $data['status'] = 0;
        $this->save($data);
        return $this->id;

    }

    public function updateById($data,$id)
    {
        return $this->allowField(true)->save($data,['id'=>$id]);
    }
}