<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:67:"F:\web\www\o2o\public/../application/admin\view\featured\index.html";i:1514539997;s:56:"F:\web\www\o2o\application\admin\view\public\header.html";i:1514704735;s:56:"F:\web\www\o2o\application\admin\view\public\footer.html";i:1514704688;}*/ ?>
<!--包含头部文件-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<script type="text/javascript" src="lib/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/hui/static/h-ui/css/H-ui.min.css" />

    <link rel="stylesheet" type="text/css" href="__STATIC__/admin/css/common.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/admin/uploadify/uploadify.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/lib/bootstrap-3/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/hui/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/hui/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/hui/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/hui/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/hui/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>o2o平台</title>
<meta name="keywords" content="tp5打造o2o平台系统">
<meta name="description" content="o2o平台">
</head>
<body>
<nav class="breadcrumb"></nav>
<div class="page-container">
  <div class="text-c"> 
  <form method="get" action="<?php echo url('featured/index'); ?>">
      <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>选择推荐类别：</label>
      <div class="formControls col-xs-8 col-sm-3"> <span class="select-box">
        <select name="type" class="select">
          <?php if(is_array($types) || $types instanceof \think\Collection || $types instanceof \think\Paginator): $i = 0; $__LIST__ = $types;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
         <option value="<?php echo $key; ?>" <?php if($key == $type): ?> selected="selected" <?php endif; ?>><?php echo $vo; ?></option>
          <?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
        </span>
      </div>

    <button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont"></i> 搜索</button>
  </form>
  </div>
  
  <div class="mt-20">
    <table class="table table-border table-bordered table-bg table-hover table-sort">
      <thead>
        <tr class="text-c">
          <th width="40">ID</th>
          <th width="150">标题</th>
          <th width="100">地址</th>
          <th width="150">新增时间</th>
          <th width="30">发布状态</th>
          <th width="30">操作</th>
        </tr>
      </thead>
      <tbody>
        
        <tr class="text-c">
          <?php if(is_array($featured) || $featured instanceof \think\Collection || $featured instanceof \think\Paginator): $i = 0; $__LIST__ = $featured;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
          <td><?php echo $vo['id']; ?></td>
          <td><a href="<?php echo $vo['url']; ?>" target="_blank"><?php echo $vo['title']; ?></a></td>
          <td class="text-c"><?php echo $vo['url']; ?></td>
          <td><?php echo date("Y-m-d H:i",$vo['create_time']); ?></td>
          <td class="td-status"><a href="<?php echo url('featured/status',['id'=>$vo['id'],'status'=>$vo['status']==1?0:1]); ?>" title="点击修改状态"><?php echo status($vo['status']); ?></a></td>
          <td class="td-manage"> <a style="text-decoration:none" class="ml-5" onClick="o2o_del('','<?php echo url('featured/status',['id'=>$vo['id'],'status'=>-1]); ?>')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
          <?php endforeach; endif; else: echo "" ;endif; ?>
        </tr>
        
      </tbody>
    </table>
    <?php echo $featured->render(); ?>
  </div>
</div>
<!--包含头部文件-->
<script type="text/javascript" src="__STATIC__/admin/hui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/admin/hui/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="__STATIC__/admin/hui/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="__STATIC__/admin/hui/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script> 
<script type="text/javascript" src="__STATIC__/admin/hui/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="__STATIC__/admin/hui/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>  
<script type="text/javascript" src="__STATIC__/admin/hui/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="__STATIC__/admin/hui/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="__STATIC__/admin/js/image.js"></script>
<script type="text/javascript" src="__STATIC__/admin/js/common.js"></script>
<script type="text/javascript" src="__STATIC__/admin/uploadify/jquery.uploadify.js"></script>
<script type="text/javascript" src="__STATIC__/lib/bootstrap-3/js/bootstrap.js"></script>



