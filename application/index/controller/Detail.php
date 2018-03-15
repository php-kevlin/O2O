<?php
namespace app\index\controller;

use think\Controller;

class Detail extends Base
{
    public function index($id)
    {
        if(!intval($id))
        {
            $this->error('ID不合法');

        }
        //根据id查询商品的数据
        $deal = model('Deal')->get($id);
        if(!$deal || $deal->status!=1)
        {
            $this->error('该商品不存在');
        }

        //获取分类信息
        $category = model('Category')->get($deal->category_id);

        //获取店信息
        $locations = model('BisLocation')->getNormalLocationInId($deal->location_ids);
        //print_r($locations);exit;

        $flag = 0;
        $timedata = '';
        if($deal->start_time>time())
        {
            $flag = 1;
            $dtime = $deal->start_time-time();
            $d = floor($dtime/(3600*24));
            if($d)
            {
                $timedata.=$d."天";
            }
            $h = floor($dtime%(3600*24)/3600);
            if($h)
            {
                $timedata.=$h."小时";
            }
            $m = floor($dtime%(3600*24)%3600/60);
            if($m)
            {
                $timedata.=$m."分钟";
            }
        }


        return $this->view->fetch('index',[
            'title'=>$deal->name,
            'deal'=>$deal,
            'category'=>$category,
            'location'=>$locations,
            'overplus'=>$deal->total_count - $deal->buy_count,
            'flag' => $flag,
            'timedata'=>$timedata,
            'mapstr' => $locations[0]->xpoint.','.$locations[0]->ypoint,
        ]);
    }

}
