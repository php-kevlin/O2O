<?php
namespace app\bis\controller;

use think\Controller;
use think\Model;

class Register extends Controller
{
    public function index()
    {

        //获取一级城市的名称
        $citys = model('City')->getNormalCitysByParentId();
        $categorys = model('Category')->getNormalCategoryByParentId();
        return $this->fetch('',[
            'citys'=> $citys,
            'categorys'=>$categorys

        ]);
    }

    public function add()
    {

        if(!request()->isPost()){
            $this->error('请求错误');
        }
        $data = input('post.');

        //商户信息校验
        $validate = validate('Bis');
        if(!$validate->scene('add')->check($data)){
            $this->error($validate->getError());
        }


        //获取经纬度
        //print_r($data['address']);
        $lnglat = \Map::getLngLat($data['address']);
        //print_r($lnglat);
        if(empty($lnglat)|| $lnglat['status']!=0){
            $this->error('无法获取数据，或者匹配的数据不精准');
        }


        //将商户信息入库
        $bisData = [
            'name'=>$data['name'],
            'email'=>$data['email'],
            'logo'=>$data['logo'],
            'licence_logo'=>$data['licence_logo'],
            'descrition'=>$data['description'],
            'city_id'=>$data['city_id'],
            'city_path'=>empty($data['se_city_id'])?$data['city_id']:$data['city_id'].','.$data['se_city_id'],
            'bank_info'=>$data['bank_info'],
            'bank_name'=>$data['bank_name'],
            'bank_user'=>$data['bank_user'],
            'faren'=>$data['faren'],
            'faren_tel'=>$data['faren_tel'],

        ];

        $bisId = model('Bis')->add($bisData);


        $data['cat'] = '';
        if(!empty($data['se_category_id'])){
            $data['cat'] = implode('|',$data['se_category_id']);
        }
        //总店信息校验

        //将总店信息入库
        $locationData = [
          'bis_id' =>$bisId,
            'name'=>$data['name'],
            'logo'=>$data['logo'],
            'tel'=>$data['tel'],
            'contant'=>$data['contact'],
            'category_id'=>$data['category_id'],
            'category_path'=>$data['category_id'].','.$data['cat'],
            'city_id'=>$data['city_id'],
            'city_path'=>empty($data['se_city_id'])?$data['city_id']:$data['city_id'].','.$data['se_city_id'],
            'api_adress'=>$data['address'],
            'open_time'=>$data['open_time'],
            'content'=>$data['content'],
            'is_main'=>1,  //代表的是总店信息
            'xpoint'=>empty($lnglat['result']['location']['lng']) ? '': $lnglat['result']['location']['lng'],
            'ypoint'=>empty($lnglat['result']['location']['lng']) ? '': $lnglat['result']['location']['lat'],

        ];
        $locationId = model('BisLocation')->add($locationData);

        //账户信息校验

        //判断提交的用户是否存在
        $accountResult = Model('BisAccount')->get(['username'=>$data['username']]);
        if($accountResult){
            $this->error('该用户存在，请重新分配');
        }
        //自动生成密码的加盐字符串
        $data['code'] = mt_rand(100,10000);
        //将账户信息入库

        $accountData = [
            'bis_id' => $bisId,
            'username'=> $data['username'],
            'code'=>$data['code'],
            'password'=>md5($data['password'].$data['code']),
            'is_main' =>1 , //代表的是总管理员
        ];
        $accountId = model('BisAccount')->add($accountData);
        if(!$accountId){
            $this->error('申请失败');
        }

        //发送邮件
        $url = request()->domain().url('bis/register/waiting',['id'=>$bisId]);
        $title='o2o入驻申请通知';
        $content = "你提交的入驻申请需要等待平台审核，你可以通过点击链接<a href='".$url."' target='_blank'>查看链接</a>查看审核状态";
        \phpmailer\Email::send($data['email'],$title,$content);

        $this->success('申请成功',url('register/waiting',['id'=>$bisId]));


    }

    public function waiting($id){
        if(empty($id))
        {
            $this->error('error');
        }
        $detail = \model('Bis')->get($id);
        return $this->fetch('',[
            'detail'=>$detail,
        ]);
    }
}