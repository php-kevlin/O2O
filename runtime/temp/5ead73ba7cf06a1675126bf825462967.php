<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:64:"F:\web\www\o2o\public/../application/index\view\index\index.html";i:1515217551;s:56:"F:\web\www\o2o\application\index\view\public\header.html";i:1515037672;s:53:"F:\web\www\o2o\application\index\view\public\nav.html";i:1514882993;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="__STATIC__/index/css/base.css" />
    <link rel="stylesheet" href="__STATIC__/index/css/common.css" />
    <link rel="stylesheet" href="__STATIC__/index/css/<?php echo $controller; ?>.css" />
    <script type="text/javascript" src="__STATIC__/index/js/html5shiv.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/respond.min.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/jquery-1.11.3.min.js"></script>
    <!--
    <link rel="stylesheet" type="text/css" href="__STATIC__/lib/bootstrap-3/css/bootstrap.css" />
    <script type="text/javascript" src="__STATIC__/lib/bootstrap-3/js/bootstrap.js"></script>
    -->
</head>
<body>
<div class="header-bar">
    <div class="header-inner">
        <ul class="father">
            <li><a><?php echo $city['name']; ?></a></li>
            <li>|</li>
            <li class="city">
                <a>切换城市<span class="arrow-down-logo"></span></a>
                <div class="city-drop-down">
                    <h3>热门城市</h3>
                    <ul class="son">
                        <?php if(is_array($citys) || $citys instanceof \think\Collection || $citys instanceof \think\Paginator): $i = 0; $__LIST__ = $citys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <li><a href="<?php echo url('index/index',['city'=>$vo['uname']]); ?>"><?php echo $vo['name']; ?></a></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        <!--
                        <li><a href="">上海</a></li>
                        <li><a href="">广州</a></li>
                        <li><a href="">深圳</a></li>
                        <li><a href="">天津</a></li>
                        <li><a href="">杭州</a></li>
                        <li><a href="">西安</a></li>
                        <li><a href="">成都</a></li>
                        <li><a href="">郑州</a></li>
                        <li><a href="">厦门</a></li>
                        <li><a href="">青岛</a></li>
                        <li><a href="">太原</a></li>
                        <li><a href="">重庆</a></li>
                        <li><a href="">武汉</a></li>
                        <li><a href="">南京</a></li>
                        <li><a href="">沈阳</a></li>
                        <li><a href="">济南</a></li>
                        <li><a href="">哈尔滨</a></li>
                        -->
                    </ul>

                </div>
            </li>

            <?php if($user): ?>
                <li>欢迎你<?php echo $user['username']; ?></li>
            <li><a href="<?php echo url('user/logout'); ?>">退出</a></li>
            <?php else: ?>
            <li><a href="<?php echo url('user/register'); ?>">注册</a></li>
            <li>|</li>
            <li><a href="<?php echo url('user/login'); ?>">登录</a></li>
            <?php endif; ?>
            <li><a href="<?php echo url('bis/login/index'); ?>">商户中心</a></li>
        </ul>
    </div>
</div>



<div class="search">
    <img src="__STATIC__/index/image/logo.png" />

</div>

<div class="nav-bar-header">
    <div class="nav-inner">
        <ul class="nav-list">
            <li class="nav-item">
                <span class="item">全部分类</span>
                <div class="left-menu">
                    <?php if(is_array($cats) || $cats instanceof \think\Collection || $cats instanceof \think\Paginator): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cat): $mod = ($i % 2 );++$i;?>
                    <div class="level-item">
                        <div class="first-level">
                            <dl>
                                <dt class="title"><a href="<?php echo url('lists/index',['id'=>$key]); ?>" target="_top"><?php echo $cat[0]; ?></a></dt>
                                <?php if(is_array($cat[1]) || $cat[1] instanceof \think\Collection || $cat[1] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($cat[1]) ? array_slice($cat[1],0,2, true) : $cat[1]->slice(0,2, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <dd><a href="<?php echo url('lists/index',['id'=>$vo['id']]); ?>" target="_blank" class=""><?php echo $vo['name']; ?></a></dd>

                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </dl>
                        </div>
                        <div class="second-level">
                            <div class="section">
                                <div class="section-item clearfix no-top-border">
                                    <h3>其他分类</h3>
                                    <ul>
                                        <?php if(is_array($cat[1]) || $cat[1] instanceof \think\Collection || $cat[1] instanceof \think\Paginator): $i = 0; $__LIST__ = $cat[1];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <li><a href="<?php echo url('lists/index',['id'=>$vo['id']]); ?>" target="_blank" class=""><?php echo $vo['name']; ?></a></li>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>

                                    </ul>
                                </div>


                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </li>
            <li class="nav-item"><a class="item first active">首页</a></li>
            <li class="nav-item"><a class="item">团购</a></li>
            <li class="nav-item"><a class="item">商户</a></li>
        </ul>
    </div>
</div>

    <div class="container">
        <div class="top-container">
            <div class="mid-area">
                <div class="slide-holder" id="slide-holder">
                    <a href="#" class="slide-prev"><i class="slide-arrow-left"></i></a>
                    <a href="#" class="slide-next"><i class="slide-arrow-right"></i></a>
                    <ul class="slideshow">
                        <li><a href="" class="item-large"><img class="ad-pic" src="__STATIC__/index/image/a1ec08fa513d2697b85e74c35dfbb2fb4216d89b.jpg" /></a></li>
                        <li><a href="" class="item-large"><img class="ad-pic" src="__STATIC__/index/image/63d0f703918fa0ec7c51e2912e9759ee3c6ddb9c.jpg" /></a></li>
                    </ul>
                </div>
                <div class="list-container">
                    
                </div>
            </div>
        </div>
        <div class="right-sidebar">
            <div class="right-ad">
                <ul class="slidepic">
                    <li><a><img src="__STATIC__/index/image/72f082025aafa40f9205eb43a364034f79f01968.jpg" /></a></li>
                </ul>
            </div>
            
        </div>
        <div class="content-container">
            <div class="no-recom-container">
                <div class="floor-content-start">
                    
                    <div class="floor-content">
                        <div class="floor-header">
                            <h3>美食</h3>
                            <ul class="reco-words">
                                <?php if(is_array($meishicates) || $meishicates instanceof \think\Collection || $meishicates instanceof \think\Paginator): $i = 0; $__LIST__ = $meishicates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <li><a href="<?php echo url('lists/index',['id'=>1]); ?>" target="_blank"><?php echo $vo['name']; ?></a></li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                <li><a class="no-right-border no-right-padding" target="_blank" href="<?php echo url('lists/index',['id'=>1]); ?>">全部<span class="all-cate-arrow"></span></a></li>
                            </ul>
                        </div>
                        <ul class="itemlist eight-row-height">
                            <?php if($datas): if(is_array($datas) || $datas instanceof \think\Collection || $datas instanceof \think\Paginator): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <li class="j-card">
                                <a>
                                    <div class="imgbox">
                                        <ul class="marketing-label-container">
                                            <li class="marketing-label marketing-free-appoint"></li>
                                        </ul>

                                        <div class="borderbox">
                                            <img src="<?php echo $vo['image']; ?>" />
                                        </div>
                                    </div>
                                </a>
                                <div class="contentbox">
                                    <a href="<?php echo url('detail/index',['id'=>$vo['id']]); ?>" target="_blank">
                                        <div class="header">
                                            <h4 class="title ">【<?php echo countLocation($vo['location_ids']); ?>店通用】</h4>
                                        </div>
                                        <p><?php echo $vo['name']; ?></p>
                                    </a>
                                    <div class="add-info"></div>
                                    <div class="pinfo">
                                        <span class="price"><span class="moneyico">¥</span><?php echo $vo['current_price']; ?></span>
                                        <span class="ori-price">价值<span class="price-line">¥<span><?php echo $vo['origin_price']; ?></span></span></span>
                                    </div>
                                    <div class="footer">
                                        <span class="sold">已售<?php echo $vo['buy_count']; ?></span>
                                        <div class="bottom-border"></div>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; else: ?>
                            <span style="color:red;font-size: 24px;">该城市下没有此数据</span>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <!--
                    <div class="floor-content">
                        <div class="floor-header">
                            <h3>丽人</h3>
                            <ul class="reco-words">
                                <li><a href="//t10.nuomi.com/pc/t10/index" target="_blank">精选品牌</a></li>
                                <li><a href="//bj.nuomi.com/380" target="_blank">小吃快餐</a></li>
                                <li><a href="//bj.nuomi.com/392" target="_blank">自助餐</a></li>
                                <li><a href="//bj.nuomi.com/327" target="_blank">其他美食</a></li>
                                <li><a class="no-right-border no-right-padding" target="_blank">全部<span class="all-cate-arrow"></span></a></li>
                            </ul>
                        </div>
                        <ul class="itemlist eight-row-height">
                            <li class="j-card">
                                <a>
                                    <div class="imgbox">
                                        <ul class="marketing-label-container">
                                            <li class="marketing-label marketing-free-appoint"></li>
                                        </ul>
                                        <div class="range-area">
                                            <div class="range-bg"></div>
                                            <div class="range-inner">
                                                <span class="white-locate"></span>
                                                安贞 六里桥 丽泽桥 安定门 劲松 昌平镇 航天桥 通州区 通州北苑
                                            </div>
                                        </div>
                                        <div class="borderbox">
                                            <img src="image/b219ebc4b74543a9c6c87b8e18178a82b80114a4.jpg" />
                                        </div>
                                    </div>
                                </a>
                                <div class="contentbox">
                                    <a href="//www.nuomi.com/deal/ke0370si.html" target="_blank">
                                        <div class="header">
                                            <h4 class="title ">【6店通用】好伦哥</h4>
                                        </div>
                                        <p>单人自助餐！免费WiFi！</p>
                                    </a>
                                    <div class="add-info"></div>
                                    <div class="pinfo">
                                        <span class="price"><span class="moneyico">¥</span>52</span>
                                        <span class="ori-price">价值<span class="price-line">¥<span>56</span></span></span>
                                    </div>
                                    <div class="footer">
                                        <span class="comment">4.6分</span><span class="sold">已售337334</span>
                                        <div class="bottom-border"></div>
                                    </div>
                                </div>
                            </li>
                            <li class="j-card">
                                <a>
                                    <div class="imgbox">
                                        <ul class="marketing-label-container">
                                            <li class="marketing-label marketing-free-appoint"></li>
                                        </ul>
                                        <div class="range-area">
                                            <div class="range-bg"></div>
                                            <div class="range-inner">
                                                <span class="white-locate"></span>
                                                安贞 六里桥 丽泽桥 安定门 劲松 昌平镇 航天桥 通州区 通州北苑
                                            </div>
                                        </div>
                                        <div class="borderbox">
                                            <img src="image/b219ebc4b74543a9c6c87b8e18178a82b80114a4.jpg" />
                                        </div>
                                    </div>
                                </a>
                                <div class="contentbox">
                                    <a href="//www.nuomi.com/deal/ke0370si.html" target="_blank">
                                        <div class="header">
                                            <h4 class="title ">【6店通用】好伦哥</h4>
                                        </div>
                                        <p>单人自助餐！免费WiFi！</p>
                                    </a>
                                    <div class="add-info">
                                        <span class="promo">立减3.6元</span>
                                    </div>
                                    <div class="pinfo">
                                        <span class="price"><span class="moneyico">¥</span>52</span>
                                        <span class="ori-price">价值<span class="price-line">¥<span>56</span></span></span>
                                    </div>
                                    <div class="footer">
                                        <span class="comment">4.6分</span><span class="sold">已售337334</span>
                                        <div class="bottom-border"></div>
                                    </div>
                                </div>
                            </li>
                            <li class="j-card">
                                <a>
                                    <div class="imgbox">
                                        <ul class="marketing-label-container">
                                            <li class="marketing-label marketing-free-appoint"></li>
                                        </ul>
                                        <div class="range-area">
                                            <div class="range-bg"></div>
                                            <div class="range-inner">
                                                <span class="white-locate"></span>
                                                安贞 六里桥 丽泽桥 安定门 劲松 昌平镇 航天桥 通州区 通州北苑
                                            </div>
                                        </div>
                                        <div class="borderbox">
                                            <img src="image/b219ebc4b74543a9c6c87b8e18178a82b80114a4.jpg" />
                                        </div>
                                    </div>
                                </a>
                                <div class="contentbox">
                                    <a href="//www.nuomi.com/deal/ke0370si.html" target="_blank">
                                        <div class="header">
                                            <h4 class="title ">【6店通用】好伦哥</h4>
                                        </div>
                                        <p>单人自助餐！免费WiFi！</p>
                                    </a>
                                    <div class="add-info">
                                        <span class="promo">立减3.6元</span>
                                    </div>
                                    <div class="pinfo">
                                        <span class="price"><span class="moneyico">¥</span>52</span>
                                        <span class="ori-price">价值<span class="price-line">¥<span>56</span></span></span>
                                    </div>
                                    <div class="footer">
                                        <span class="comment">4.6分</span><span class="sold">已售337334</span>
                                        <div class="bottom-border"></div>
                                    </div>
                                </div>
                            </li>
                            <li class="j-card">
                                <a>
                                    <div class="imgbox">
                                        <ul class="marketing-label-container">
                                            <li class="marketing-label marketing-free-appoint"></li>
                                        </ul>
                                        <div class="range-area">
                                            <div class="range-bg"></div>
                                            <div class="range-inner">
                                                <span class="white-locate"></span>
                                                安贞 六里桥 丽泽桥 安定门 劲松 昌平镇 航天桥 通州区 通州北苑
                                            </div>
                                        </div>
                                        <div class="borderbox">
                                            <img src="image/b219ebc4b74543a9c6c87b8e18178a82b80114a4.jpg" />
                                        </div>
                                    </div>
                                </a>
                                <div class="contentbox">
                                    <a href="//www.nuomi.com/deal/ke0370si.html" target="_blank">
                                        <div class="header">
                                            <h4 class="title ">【6店通用】好伦哥</h4>
                                        </div>
                                        <p>单人自助餐！免费WiFi！</p>
                                    </a>
                                    <div class="add-info">
                                        <span class="promo">立减3.6元</span>
                                    </div>
                                    <div class="pinfo">
                                        <span class="price"><span class="moneyico">¥</span>52</span>
                                        <span class="ori-price">价值<span class="price-line">¥<span>56</span></span></span>
                                    </div>
                                    <div class="footer">
                                        <span class="comment">4.6分</span><span class="sold">已售337334</span>
                                        <div class="bottom-border"></div>
                                    </div>
                                </div>
                            </li>
                            <li class="j-card">
                                <a>
                                    <div class="imgbox">
                                        <ul class="marketing-label-container">
                                            <li class="marketing-label marketing-free-appoint"></li>
                                        </ul>
                                        <div class="range-area">
                                            <div class="range-bg"></div>
                                            <div class="range-inner">
                                                <span class="white-locate"></span>
                                                安贞 六里桥 丽泽桥 安定门 劲松 昌平镇 航天桥 通州区 通州北苑
                                            </div>
                                        </div>
                                        <div class="borderbox">
                                            <img src="image/b219ebc4b74543a9c6c87b8e18178a82b80114a4.jpg" />
                                        </div>
                                    </div>
                                </a>
                                <div class="contentbox">
                                    <a href="//www.nuomi.com/deal/ke0370si.html" target="_blank">
                                        <div class="header">
                                            <h4 class="title ">【6店通用】好伦哥</h4>
                                        </div>
                                        <p>单人自助餐！免费WiFi！</p>
                                    </a>
                                    <div class="add-info">
                                        <span class="promo">立减3.6元</span>
                                    </div>
                                    <div class="pinfo">
                                        <span class="price"><span class="moneyico">¥</span>52</span>
                                        <span class="ori-price">价值<span class="price-line">¥<span>56</span></span></span>
                                    </div>
                                    <div class="footer">
                                        <span class="comment">4.6分</span><span class="sold">已售337334</span>
                                        <div class="bottom-border"></div>
                                    </div>
                                </div>
                            </li>
                            <li class="j-card">
                                <a>
                                    <div class="imgbox">
                                        <ul class="marketing-label-container">
                                            <li class="marketing-label marketing-free-appoint"></li>
                                        </ul>
                                        <div class="range-area">
                                            <div class="range-bg"></div>
                                            <div class="range-inner">
                                                <span class="white-locate"></span>
                                                安贞 六里桥 丽泽桥 安定门 劲松 昌平镇 航天桥 通州区 通州北苑
                                            </div>
                                        </div>
                                        <div class="borderbox">
                                            <img src="image/b219ebc4b74543a9c6c87b8e18178a82b80114a4.jpg" />
                                        </div>
                                    </div>
                                </a>
                                <div class="contentbox">
                                    <a href="//www.nuomi.com/deal/ke0370si.html" target="_blank">
                                        <div class="header">
                                            <h4 class="title ">【6店通用】好伦哥</h4>
                                        </div>
                                        <p>单人自助餐！免费WiFi！</p>
                                    </a>
                                    <div class="add-info"></div>
                                    <div class="pinfo">
                                        <span class="price"><span class="moneyico">¥</span>52</span>
                                        <span class="ori-price">价值<span class="price-line">¥<span>56</span></span></span>
                                    </div>
                                    <div class="footer">
                                        <span class="comment">4.6分</span><span class="sold">已售337334</span>
                                        <div class="bottom-border"></div>
                                    </div>
                                </div>
                            </li>
                            <li class="j-card">
                                <a>
                                    <div class="imgbox">
                                        <ul class="marketing-label-container">
                                            <li class="marketing-label marketing-free-appoint"></li>
                                        </ul>
                                        <div class="range-area">
                                            <div class="range-bg"></div>
                                            <div class="range-inner">
                                                <span class="white-locate"></span>
                                                安贞 六里桥 丽泽桥 安定门 劲松 昌平镇 航天桥 通州区 通州北苑
                                            </div>
                                        </div>
                                        <div class="borderbox">
                                            <img src="image/b219ebc4b74543a9c6c87b8e18178a82b80114a4.jpg" />
                                        </div>
                                    </div>
                                </a>
                                <div class="contentbox">
                                    <a href="//www.nuomi.com/deal/ke0370si.html" target="_blank">
                                        <div class="header">
                                            <h4 class="title ">【6店通用】好伦哥</h4>
                                        </div>
                                        <p>单人自助餐！免费WiFi！</p>
                                    </a>
                                    <div class="add-info">
                                        <span class="promo">立减3.6元</span>
                                    </div>
                                    <div class="pinfo">
                                        <span class="price"><span class="moneyico">¥</span>52</span>
                                        <span class="ori-price">价值<span class="price-line">¥<span>56</span></span></span>
                                    </div>
                                    <div class="footer">
                                        <span class="comment">4.6分</span><span class="sold">已售337334</span>
                                        <div class="bottom-border"></div>
                                    </div>
                                </div>
                            </li>
                            <li class="j-card">
                                <a>
                                    <div class="imgbox">
                                        <ul class="marketing-label-container">
                                            <li class="marketing-label marketing-free-appoint"></li>
                                        </ul>
                                        <div class="range-area">
                                            <div class="range-bg"></div>
                                            <div class="range-inner">
                                                <span class="white-locate"></span>
                                                安贞 六里桥 丽泽桥 安定门 劲松 昌平镇 航天桥 通州区 通州北苑
                                            </div>
                                        </div>
                                        <div class="borderbox">
                                            <img src="image/b219ebc4b74543a9c6c87b8e18178a82b80114a4.jpg" />
                                        </div>
                                    </div>
                                </a>
                                <div class="contentbox">
                                    <a href="//www.nuomi.com/deal/ke0370si.html" target="_blank">
                                        <div class="header">
                                            <h4 class="title ">【6店通用】好伦哥</h4>
                                        </div>
                                        <p>单人自助餐！免费WiFi！</p>
                                    </a>
                                    <div class="add-info">
                                        <span class="promo">立减3.6元</span>
                                    </div>
                                    <div class="pinfo">
                                        <span class="price"><span class="moneyico">¥</span>52</span>
                                        <span class="ori-price">价值<span class="price-line">¥<span>56</span></span></span>
                                    </div>
                                    <div class="footer">
                                        <span class="comment">4.6分</span><span class="sold">已售337334</span>
                                        <div class="bottom-border"></div>
                                    </div>
                                </div>
                            </li>
                            <li class="j-card">
                                <a>
                                    <div class="imgbox">
                                        <ul class="marketing-label-container">
                                            <li class="marketing-label marketing-free-appoint"></li>
                                        </ul>
                                        <div class="range-area">
                                            <div class="range-bg"></div>
                                            <div class="range-inner">
                                                <span class="white-locate"></span>
                                                安贞 六里桥 丽泽桥 安定门 劲松 昌平镇 航天桥 通州区 通州北苑
                                            </div>
                                        </div>
                                        <div class="borderbox">
                                            <img src="image/b219ebc4b74543a9c6c87b8e18178a82b80114a4.jpg" />
                                        </div>
                                    </div>
                                </a>
                                <div class="contentbox">
                                    <a href="//www.nuomi.com/deal/ke0370si.html" target="_blank">
                                        <div class="header">
                                            <h4 class="title ">【6店通用】好伦哥</h4>
                                        </div>
                                        <p>单人自助餐！免费WiFi！</p>
                                    </a>
                                    <div class="add-info">
                                        <span class="promo">立减3.6元</span>
                                    </div>
                                    <div class="pinfo">
                                        <span class="price"><span class="moneyico">¥</span>52</span>
                                        <span class="ori-price">价值<span class="price-line">¥<span>56</span></span></span>
                                    </div>
                                    <div class="footer">
                                        <span class="comment">4.6分</span><span class="sold">已售337334</span>
                                        <div class="bottom-border"></div>
                                    </div>
                                </div>
                            </li>
                            <li class="j-card">
                                <a>
                                    <div class="imgbox">
                                        <ul class="marketing-label-container">
                                            <li class="marketing-label marketing-free-appoint"></li>
                                        </ul>
                                        <div class="range-area">
                                            <div class="range-bg"></div>
                                            <div class="range-inner">
                                                <span class="white-locate"></span>
                                                安贞 六里桥 丽泽桥 安定门 劲松 昌平镇 航天桥 通州区 通州北苑
                                            </div>
                                        </div>
                                        <div class="borderbox">
                                            <img src="image/b219ebc4b74543a9c6c87b8e18178a82b80114a4.jpg" />
                                        </div>
                                    </div>
                                </a>
                                <div class="contentbox">
                                    <a href="//www.nuomi.com/deal/ke0370si.html" target="_blank">
                                        <div class="header">
                                            <h4 class="title ">【6店通用】好伦哥</h4>
                                        </div>
                                        <p>单人自助餐！免费WiFi！</p>
                                    </a>
                                    <div class="add-info">
                                        <span class="promo">立减3.6元</span>
                                    </div>
                                    <div class="pinfo">
                                        <span class="price"><span class="moneyico">¥</span>52</span>
                                        <span class="ori-price">价值<span class="price-line">¥<span>56</span></span></span>
                                    </div>
                                    <div class="footer">
                                        <span class="comment">4.6分</span><span class="sold">已售337334</span>
                                        <div class="bottom-border"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    -->
                </div>
            </div>
        </div>
    </div>

    <div class="footer-content">
        <div class="copyright-info">
            
        </div>
    </div>

    <script>
        var width = 800 * $("#slide-holder ul li").length;
        $("#slide-holder ul").css({width: width + "px"});

        //轮播图自动轮播
        var time = setInterval(moveleft,5000);

        //轮播图左移
        function moveleft(){
            $("#slide-holder ul").animate({marginLeft: "-737px"},600, function () {
                $("#slide-holder ul li").eq(0).appendTo($("#slide-holder ul"));
                $("#slide-holder ul").css("marginLeft","0px");
            });
        }

        //轮播图右移
        function moveright(){
            $("#slide-holder ul").css({marginLeft: "-737px"});
            $("#slide-holder ul li").eq(($("#slide-holder ul li").length)-1).prependTo($("#slide-holder ul"));
            $("#slide-holder ul").animate({marginLeft: "0px"},600);
        }

        //右滑箭头点击事件
        $(".slide-next").click(function () {
            clearInterval(time);
            moveright();
            time = setInterval(moveleft,5000);
        });

        //左滑箭头点击事件
        $(".slide-prev").click(function () {
            clearInterval(time);
            moveleft();
            time = setInterval(moveleft,5000);
        });
    </script>
</body>
</html>