<?php

namespace app\common\model;

use think\Model;

class Order extends Model
{
    protected $autoWriteTimestamp = true;
    public function getList()
    {

        return $this->select();
    }
    public function add($data)
    {
        $data['status'] = 1;
        $result = $this->save($data);
        return $result;
    }

}
