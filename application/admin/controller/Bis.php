<?php
namespace app\admin\controller;
use think\Controller;
class Bis extends Controller
{
    private $obj;
    public function _initialize()
    {
        $this->obj = model('Bis');
    }

    /**
     * 正常的商户列表
     */
    public function index()
    {
        $bis = $this->obj->getBisByStatus(1);
        return $this->fetch('',[
            'bis'=>$bis,
        ]);
    }
    public function index3()
    {
        $bis = $this->obj->getBisByStatus(-1);
        return $this->fetch('',[
            'bis'=>$bis,
        ]);
    }
    public function apply()
    {
        $bis = $this->obj->getBisByStatus();
        return $this->fetch('',[
            'bis'=>$bis,
        ]);
    }
    public function detail()
    {
        $id = input('get.id');
        if(empty($id)){
            return $this->error('id为空');
        }
        //获取一级城市数据
        $citys = model('City')->getNormalCitysByParentId();
        //获取一级栏目的数据
        $categorys = model('Category')->getNormalFirstCategory();
        //获取商户数据
        $bisData = model('Bis')->get($id);

        $locationData = model('BisLocation')->get(['bis_id'=>$id,'is_main'=>1]);
        $accountData = model('BisAccount')->get(['bis_id'=>$id,'is_main'=>1]);

        return $this->fetch('',[
            'citys'=>$citys,
            'categorys'=>$categorys,
            'bisData' => $bisData,
            'locationData'=> $locationData,
            'accountData' => $accountData
        ]);
    }



    /**
     * 修改状态
     */
    public function status()
    {
        $data = input('get.');
        /*
        $validate = validate('Category');

        if(!$validate->scene('status')->check($data)){
            $this->error($validate->getError());
        }
        */

        $res = $this->obj->save(['status'=>$data['status']],['id'=>$data['id']]);

        $locationData = model('BisLocation')->save(['status'=>$data['status']],['bis_id'=>$data['id'],'is_main'=>1]);
        $accountData = model('BisAccount')->save(['status'=>$data['status']],['bis_id'=>$data['id'],'is_main'=>1]);
        if($res && $locationData && $accountData){
            $this->success('状态更新成功');
        }else{
            $this->error('状态更新失败');
        }
    }
}