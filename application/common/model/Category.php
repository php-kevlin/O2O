<?php
/**
 * Created by PhpStorm.
 * User: 张凯凯
 * Date: 2017/12/23
 * Time: 17:41
 */
namespace app\common\model;
use think\Model;
class Category extends Model
{
    protected $autoWriteTimestamp = true;
    public function add($data){
        $data['status'] = 1;
        $data['create_time'] = time();
        return $this->save($data);
    }

    public function getNormalFirstCategory(){

        //条件
        $data = [
            'status' =>1,
            'parent_id'=>0,
        ];

        //排序
        $order = [
          'id'=>'desc',
        ];

       return $this->where($data)
            ->order($order)
            ->select();

    }

    public function getFirstCategorys($parent_id = 0)
    {
        $data = [
            'parent_id' => $parent_id,
            'status' => ['neq',-1],
        ];

        $order = [
            'id'=>'desc',
        ];

        $result = $this->where($data)
            ->order($order)
            ->paginate();
       // echo $this->getLastSql();
        return $result;
    }

    public  function getNormalCategoryByParentId($parentId = 0){
        $data = [
            'parent_id' => $parentId,
            'status' => ['neq',-1],
        ];

        $order = [
            'id'=>'desc',
        ];

        $result = $this->where($data)
            ->order($order)
            ->select();
        // echo $this->getLastSql();
        return $result;
    }

    /**
     *
     */
    public function getNormalRecommendCategoryByParentId($id =0,$limit = 5)
    {

        $data = [
            'parent_id' => $id,
            'status' => 1
        ];
        $order = [
          'listorder' =>'asc',
            'id'=>'desc'
        ];

        $result = $this->where($data)->order($order)->limit($limit)->select();
        return $result;
    }

    public function getNormalCategoryIdParentId($ids)
    {
        $data = [
            'parent_id'=>['in',implode(',',$ids)],
            'status'=>1,
        ];
        $order = [
            'listorder' =>'desc',
            'id'=>'desc'
        ];
        $result = $this->where($data)->order($order)->select();
        return $result;
    }


}