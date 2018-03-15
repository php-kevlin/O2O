<?php
/**
 * Created by PhpStorm.
 * User: 张凯凯
 * Date: 2017/12/26
 * Time: 21:51
 */
namespace app\common\model;
use think\Exception;
use think\Model;
class Deal extends BaseModel
{

   public function getNormalDeals($data = [])
   {
       $data['status'] = 1;
       $order = ['id'=>'desc'];
       $result = $this->where($data)
           ->order($order)
           ->paginate(1);
       //echo $this->getLastSql();
       return $result;
   }

   public function getNormalDealByCategory($id,$city_Id,$limit = 0)
   {
        $data = [
            'end_time'=>['gt',time()],
            'category_id'=>$id,
            'city_id'=>$city_Id,
            'status'=>1
        ];

        $order = [
          'listorder'=>'desc',
            'id'=>'desc'
        ];

        $result = $this->where($data)->order($order);
        if($limit){
            $result = $result->limit($limit);
        }
        return $result->select();
   }

   public function getDealByBisId($bis_id)
   {
       $data = [
         'status'=>1,
         'bis_id'=>$bis_id
       ];
       $order= [
         'id'=>'desc'
       ];
       $result  = $this->where($data)->order($order)->select();
       return $result;
   }

   public function getDealByConditions($data =[],$orders)
   {
        $order = [];
       if(!empty($orders['order_sales']))
       {
           $order['buy_count'] = 'desc';
       }
       if(!empty($orders['order_price']))
       {
           $order['current_price'] = 'desc';
       }
       if(!empty($orders['order_time']))
       {
           $order['create_time'] = 'desc';
       }
       $order['id']='desc';



       $result = $this->where($data)
           ->order($order)
           ->select();
       return $result;

   }

   public function getDealByStatus($status)
   {
       $data['status'] = 0;
       $order = ['id'=>'desc'];
       $result = $this->where($data)
           ->order($order)
           ->select();
       //echo $this->getLastSql();
       return $result;

   }


}