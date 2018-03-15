<?php
/**
 * Created by PhpStorm.
 * User: 张凯凯
 * Date: 2017/12/26
 * Time: 21:39
 */
namespace app\common\model;
use think\Model;
class BisLocation extends BaseModel
{
        public function getNormalLocationByBisId($bisId)
        {
            $data = [
              'bis_id'=>$bisId,
                'status'=> 1,
            ];
            $result = $this->where($data)
                ->order('id','desc')
                ->select();
            return $result;
        }

        public function getNormalLocationInId($ids)
        {
            $data = [
              'id'=>['in',$ids],
                'status'=>1
            ];
            return $this->where($data)->select();

        }


}