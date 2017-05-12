<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>新房_<?=$this->config->siteName;?></title>
<!-- Bootstrap Core CSS -->
<link href="/js/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="/css/mtek_font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="/css/fonts/font-lineicons.css" rel="stylesheet" type="text/css">

<!-- Theme CSS -->
<link href="/theme/agency/css/agency.css" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<style>
/* tuangou left */
.tuangou_entry {
    border: 1px solid #ddd;
    margin: 0 0 10px;
	background:#fff;
}
.tuangou_entry dt {
    color: #111111;
    font-size: 14px;
    font-weight: 700;
    height: 43px;
    line-height: 43px;
    padding: 0 0 0 11px;
}
.tuangou_entry .dd_items {
    margin: 15px 19px 0;
    padding: 5px 0 15px;
    position: relative;
	font-size:14px;
	border-bottom: 1px dashed #eee;
}
.dd_items .dda0 {
    display: block;
    overflow: hidden;
}
.dd_items .dda1 {
    background: none repeat scroll 0 0 #F7F7F7;
    height: 130px;
    margin: 0 0 6px;
}
.dd_items .dda1 img {
    border: 1px solid #CCCCCC;
    height: 128px;
    overflow: hidden;
    width: 100%;
}
.dd_items .dda2 {
    height: 20px;
    line-height: 20px;
    overflow: hidden;
	margin-top:5px;
}
.dd_items .dda2:link, .dd_items .dda2:visited {
    color: #666666;
}
.dd_items .dda2:hover {
    color: #FF6600;
    text-decoration: underline;
}
.dd_items .ddd {
    color: #999999;
    margin-top: 6px;
    position: relative;
}
.dd_items .ddd em {
    color: #FF6600;
    font-weight: 700;
    position: absolute;
    right: 5px;
}
.dd_items .dds1 {
    display: inline-block;
    height: 39px;
    overflow: hidden;
    position: absolute;
    right: 20px;
    top: 1px;
    width: 76px;
}
.dd_items .ddi0 {
    background: url("/theme/agecny/img/right_icon.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
    float: right;
    height: 39px;
    overflow: hidden;
    width: 38px;
}
.dd_items .ddi1 {
    background-position: 0 0;
}
.dd_items .ddi2 {
    background-position: 0 -49px;
}

/* guess like css */
.guess-like {
    border: 1px solid #ddd;
    font-size: 14px;
    margin: 20px 0;
	padding-bottom:15px;
}
.guess-like h3 {
    font-size: 18px;
    height: 20px;
    line-height: 20px;
	margin-top:15px;
    font-weight: normal;
}
.guess-item a{ text-decoration:none}
.guess-item img:hover{ opacity:0.8}
.guess-item p {
    color: #333;
    height: 24px;
    line-height: 24px;
    overflow: hidden;
	margin:5px 0 0;
}
.guess-item .g-price em {
    color: #f60;
    font-size: 16px;
}
.selected{line-height: 25px;height:27px;padding: 0 10px;border:1px solid #a5a5a5;color:#a5a5a5;}
.selected:hover{border:1px solid #f60;color: #f60;}
</style>
<body id="page-top">
<a href="#" id="totop"><i class="fa fa-angle-up"></i></a>
<!-- Navigation -->
<?php include '../../index/view/header.html.php';?>

<!-- Search -->
<div class="container">
	<div class="row mbm">
        <div class="col-md-6">
           <ul class="breadcrumb">
               <li><a href="/">FC114乐山站</a></li>
               <li class="active">新房列表</li>
           </ul>
           <input type="hidden" value="{$info.id}" name="layout_id" id="layout_id">
           <input type="hidden" value="{$info.project_name}" name="project_name" id="project_name">
       </div>
        <div class="col-md-6 search-box">
        	<form class="search-form right" method="get" action="/newhouse/" onsubmit="search()">
                <input type="text" placeholder="请输入楼盘名称、地址或房源特征" class="input-search" name="keyword" id="keyword" maxlength="100" value="">
                <input type="submit" class="btn-search" value="搜索">
            </form>
        </div>
    </div>
    
    <div class="topFilter">
        <div class="topContent">
            <div class="filter-item">
                <form method="get" action="/newhouse/" id="searchform" name="searchform">
                    <input type="hidden" name="borough" id="borough" value="<?=$borough?>">
                    <input type="hidden" name="room" id="room" value="<?=$room?>">
                    <input type="hidden" name="price" id="price" value="<?=$price?>">
                    <input type="hidden" name="pm_type" id="pm_type" value="<?=$pm_type?>">
                    <input type="hidden" name="price_sort" id="price_sort" value="<?=$price_sort?>">
                    <input type="hidden" name="time_sort" id="time_sort" value="<?=$time_sort?>">
                    <input type="hidden" name="keyword" id="search" value="<?=$keyword?>"/>
                </form>
                <label class="item-title">位置：</label>
                <div class="item-area">
                    <div class="item-hd">
                        <a class="item-tab item-on" href="javascript:void(0);"><i class="list-ico area-ico"></i>区域找房</a>
<!--                        <a class="item-tab" href="javascript:void(0);"><i class="list-ico subway-ico"></i>地铁找房</a>-->
                            <a class="map-tab" href="/newhouse/mapHouse"><i class="list-ico map-ico"></i>地图找房</a>
<!--                        <a target="_blank" soj="loupanlist" class="fangtan-tab" href="/"><i class="list-ico fangtan-ico"></i>智能选房</a>-->
                    </div>
                    <div class="item-bd">
                        <div class="area-bd" style="display: block;">
                            <!-- 区域 -->
                            <div class="item-mod">
                            <? foreach($this->config->borough_option as $key=>$item) {
                                $seleted = '';
                                if($key==$borough) {
                                    $seleted = ' class="item-on"';
                                    echo "<a target=\"_self\" href='javascript:;'><span" . $seleted . ">" . $item . "</span></a>";
                                }else {
                                    echo "<a target=\"_self\" href=\"javascript:searchhouse('" . $key . "','borough')\"><span" . $seleted . ">" . $item . "</span></a>";
                                }}
                            ?>
                            </div>
    
                            <!-- 板块 -->
                            <i class="icon-top-arrow"><span></span></i>
                        </div>
    
                        <!-- 地铁线路 -->
                        <div class="subway-bd" style="display: none;">
                            <div class="filter">
                            <a href="http://cd.fang.anjuke.com/loupan/subway_28/y1/">1号线</a>
                            <a href="http://cd.fang.anjuke.com/loupan/subway_29/y1/">2号线</a>
                            <a href="http://cd.fang.anjuke.com/loupan/subway_71/y1/">3号线</a>
                            <a href="http://cd.fang.anjuke.com/loupan/subway_185/y1/">4号线</a>
                            <a href="http://cd.fang.anjuke.com/loupan/subway_184/y1/">7号线</a>
                            <a href="http://cd.fang.anjuke.com/loupan/subway_41/y1/">成灌快铁</a>
                            </div>
                            <!-- 地铁站台 -->
                            <i class="icon-top-arrow"><span></span></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="filter-item dashed">
                <label class="item-title">户型：</label>
                <div class="item-mod">
                <? foreach($this->config->apa_room_option as $key=>$item) {
                    $seleted = '';
                    if($key==$room) {
                        $seleted = ' class="item-on"';
                        echo "<a target=\"_self\" href='javascript:;'><span" . $seleted . ">" . $item . "</span></a>";
                    }else{
                        echo "<a target=\"_self\" href=\"javascript:searchhouse('".$key."','room')\"><span".$seleted.">".$item."</span></a>";
                    }
                }
                ?>
        		</div>
            </div>
            
            <div class="filter-item dashed">
                <label class="item-title">价格：</label>
                <div class="item-mod">
                <? foreach($this->config->price_option as $key=>$item) {
                    $seleted = '';
                    if($key==$price) {
                        $seleted = ' class="item-on"';
                        echo "<a target=\"_self\" href='javascript:;'><span" . $seleted . ">" . $item . "</span></a>";
                    }else{
                        echo "<a target=\"_self\" href=\"javascript:searchhouse('".$key."','price')\"><span".$seleted.">".$item."</span></a>";
                    }
                }
                ?>
                <a id="p99" target="_self" href="javascript:searchhouse('99','price')"><span>价格待定</span></a>
       			</div>
            </div>
            
<!--            <div class="filter-item dashed">-->
<!--                <label class="item-title">特色：</label>-->
<!--                <div class="item-mod">-->
<!--                --><?// foreach($this->config->use_feature_option as $key=>$item) {
//                    $seleted = '';
//                    if($key==$use_feature)$seleted = ' class="item-on"';
//                    echo "<a target=\"_self\" href=\"javascript:searchhouse('".$key."','use_feature')\"><span".$seleted.">".$item."</span></a>";
//                }
//                ?>
<!--       			</div>-->
<!--            </div>-->

            <div class="filter-item dashed">
                <label class="item-title">类型：</label>
                <div class="item-mod">
                <? foreach($this->config->pm_type_option as $key=>$item) {
                    $seleted = '';
                    if($key==$pm_type) {
                        $seleted = ' class="item-on"';
                        echo "<a target=\"_self\" href='javascript:;'><span" . $seleted . ">" . $item . "</span></a>";
                    }else{
                        if($key!=22310){
                            echo "<a target=\"_self\" href=\"javascript:searchhouse('".$key."','pm_type')\"><span".$seleted.">".$item."</span></a>";
                        }
                    }

                }
                ?>
        		</div>
            </div>
            <? if($condition == 1){ ?>
            <div class="filter-item">
                <label class="item-title">筛选条件：</label>
                <div class="item-mod">
                    <?if($borough != 0){?><a href="javascript:closesearch('borough')"><span class="selected">区域：<?=$this->config->borough_option[$borough] ?><span style="left: 5px;top:2px" class="glyphicon glyphicon-remove"></span></span></a><?}?>
                    <?if($room != 0){?><a href="javascript:closesearch('room')"><span class="selected">户型：<?=$this->config->apa_room_option[$room] ?><span style="left: 5px;top:2px" class="glyphicon glyphicon-remove"></span></span></a><?}?>
                    <?if($price != 0){?><a href="javascript:closesearch('price')"><span class="selected">价格：<?=$this->config->price_option[$price] ?><span style="left: 5px;top:2px" class="glyphicon glyphicon-remove"></span></span></a><?}?>
                    <?if(strlen($price) == 2){?><a href="javascript:closesearch('price')"><span class="selected">价格：待定<span style="left: 5px;top:2px" class="glyphicon glyphicon-remove"></span></span></a><?}?>
                    <?if($pm_type != 0){?><a href="javascript:closesearch('pm_type')"><span class="selected">类型：<?=$this->config->pm_type_option[$pm_type] ?><span style="left: 5px;top:2px" class="glyphicon glyphicon-remove"></span></span></a><?}?>
                    <?if($keyword != ''){?><a href="javascript:closesearch('search')"><span class="selected">关键字：<?=$keyword ?><span style="left: 5px;top:2px" class="glyphicon glyphicon-remove"></span></span></a><?}?>
                    <a href="/newhouse/">清空所有条件</a>
                </div>
            </div>
            <? } ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-9">
            <!-- listing begin  -->
            <div class="main_list">
                <div class="topbar">
                    <div class="left"> 共有<span class="c-yellow"> <?=$total?> </span>个符合要求的成都新房楼盘</div>
                    <!--div class="fr">排序：<a href="http://cd.fang.anjuke.com/loupan/s?m=1" rel="nofollow">推荐</a></div-->
                    <div class="sort-page-box">
                        <div class="newSort">
                        <a rel="nofollow" href="javascript:sysOrder()">默认排序</a>
                        </div>
                        <div class="newSort">
                            <a target="_self" href="javascript:priceOrder()">
                                售价
                                <? if($price_sort=='price_asc'){ ?>
                                    <i class="list-ico up"></i>
                                <? }else{ ?>
                                    <i class="list-ico down"></i>
                                <? }?>
                            </a>
                            <a href="javascript:timeOrder()" rel="nofollow">
                                开盘时间
                                <? if($time_sort=='time_asc'){ ?>
                                    <i class="list-ico up"></i>
                                <? }else{ ?>
                                    <i class="list-ico down"></i>
                                <? } ?>
                            </a>
                        </div>
                    </div>
                </div>

                <? foreach($list as $key=>$item){ ?>
                <div style="position:relative" class="list-item clearfix" data-link="/newhouse/detail?id=<?=$item['id']?>&pm_type=<?=$pm_type?>">
                	<a class="col-md-3 img" href="/newhouse/detail?id=<?=$item['id']?>&pm_type=<?=$pm_type?>">
    <img onerror="javascript:this.src='/images/pic_default.jpg'" alt="<?=$item['name']?>" src="<?=$item['img_url']?>"><!-- javascript:this.src='/ui/images/pic_default_s.jpg' -->
                    </a>
                    <div class="col-md-6">
                        <div class="tilte">
                            <h3><a target="_blank" href="/newhouse/detail?id=<?=$item['id']?>&pm_type=<?=$pm_type?>" class="items-name"><?=$item['name']?></a></h3>
                            <? if($item['status'] == 1){ ?><i class="label label-sm label-success">在售</i><? } ?>
                            <? if($item['status'] == 2){ ?><i class="label label-sm " style="background-color: orange">未开盘</i><? } ?>
                            <? if($item['status'] == 3){ ?><i class="label label-sm " style="background-color: #c1c6c6">售完</i><? } ?>
                            <? if($key <6){ ?>
                                <i class="label label-sm label-warning">推荐</i>
                            <? } ?>
<!--                            <a soj="list_dp" class="list-dp" target="_blank" href="">（113条点评）</a>-->
                        </div>
                        
                        <div class="info">
                            <p>
                            <a>[<? if(isset($this->config->borough_option[$item['borough']])){echo $item['borough']==0?'':$this->config->borough_option[$item['borough']];}?>
                                <?if(isset($this->config->circle_option[$item['circle']])){ echo $item['circle']==0?'':$this->config->circle_option[$item['circle']];}?>]
                                <?=$item['address']==''?'':$item['address']?></a>
                            <a href="/newhouse/detail?id=<?=$item['id']?>&pm_type=<?=$pm_type?>&map=0" class="map">[ <i class="fa fa-map-marker"></i> 地图 ]</a>
                            </p>
                            <? if($pm_type != 22309 && $pm_type != 22304 && $pm_type != 22305){ ?>
                            <p>户型：<? if(count($item['modeInfo']) == 0){echo "暂无户型";}?>
                                <?foreach($item['modeInfo'] as $modeItem){?>
                                <a target="_blank" href="/newhouse/detail?id=<?=$item['id']?>&pm_type=<?=$pm_type?>&house=1"><?=$modeItem['shi']?>室(<?=$modeItem['total']?>)</a>,
                                <?}?>
							</p>
                            <?}?>
                            <p>物业类型：<a><?if(!empty($item['pm_type'])){
                                    $_pm_type = explode(',',$item['pm_type']);
                                    $cnt = count($_pm_type);
                                    foreach($_pm_type as $k=>$_v){
                                        if(!empty($_v))echo "<span style='padding-left: 5px'>".$this->config->pm_type_option[$_v]."</span>";
                                    }
                                }?></a>
                            </p>
                            <p>推荐理由：
                                <a>

                                    <?
                                    if(!empty($item['tube']) || isset($this->config->attribute_option[$item['attribute']])){
                                        echo $this->config->attribute_option[$item['attribute']];
                                        $_tube = explode(',',$item['tube']);
                                        foreach($_tube as $k=>$_v){
                                            if(!empty($_v))echo ",".$this->config->tube_option[$_v];
                                        }
                                    }else{
                                        echo "暂无周边信息";
                                    }
                                    ?>
                                </a>
                            </p>
                        </div>
                        
                        
                    </div>
                    
                    <div class="col-md-3 favor-pos">
                        <p class="price">均价<span>
                            <? if($pm_type == 22304){echo $item['red_business_price_average']==''?'待定':$item['red_business_price_average']."</span>元/m²";}
                               elseif($pm_type == 22301){echo $item['red_villa_price_average']==''?'待定':$item['red_villa_price_average']."</span>元/m²";}
                               elseif($pm_type == 22305){echo $item['red_office_price_average']==''?'待定':$item['red_office_price_average']."</span>元/m²";}
                               else{echo $item['red_house_price_average']==''?'待定':$item['red_house_price_average']."</span>元/m²";}?>
                        </p>
                        <div class="discount-item">
                            <p class="favor-tag"><em title="<?=$item['slogan']?>" class="discount-txt"><?=$item['slogan']==''?'精彩生活每一天':$item['slogan']?></em></p>
<!--                            <p class="favor-tag"><a target="_blank" class="tour-mark" soj="list_kficon" href="">10.22看房团</a></p>-->
                        </div>
                    	<div class="tel">
                            <i class="fa fa-phone"> </i> <?=$item['telephone']?>
                        </div>
                    </div>
                </div>
                <? } ?>
                <!-- demo list
                <div style="position:relative" class="list-item clearfix" data-link="/index/houseDetail">
                	<a class="col-md-3 img" href="#">
    <img onerror="javascript:this.src='/ui/images/pic_default_s.jpg'" alt="英伦" src="/theme/agency/img/210x140m.jpg">
                    </a>
                    <div class="col-md-6">
                        <div class="tilte">
                            <h3><a target="_blank" href="#" class="items-name">龙都国际</a></h3>
                            <i class="label label-sm label-success">在售</i>
                            <i class="label label-sm label-warning">推荐</i>
                            <a soj="list_dp" class="list-dp" target="_blank" href="">（113条点评）</a>
                        </div>

                        <div class="info">
                            <p>
                            <a>[高新区 绕城外] 成都高新西区天目路（成都外国语学)</a>
                            <a href="#" class="map">[ <i class="fa fa-map-marker"></i>地图 ]</a>
                            </p>
                            <p>户型：
<a target="_blank" href="http://cd.fang.anjuke.com/loupan/252886.html#housetype-divid">2室(1)</a>，
<a target="_blank" href="http://cd.fang.anjuke.com/loupan/252886.html#housetype-divid">3室(3)</a>，
<a target="_blank" href="http://cd.fang.anjuke.com/loupan/252886.html#housetype-divid">4室(1)</a>
							</p>
                            <p>推荐理由：<a>商业,住宅,电梯,  2线</a></p>
                        </div>


                    </div>

                    <div class="col-md-3 favor-pos">
                        <p class="price">均价<span>4500</span>元/m²</p>
                        <div class="discount-item">
                            <p class="favor-tag"><em title="高层全款优惠6％，按揭优惠5％" class="discount-txt">高层全款优惠6％，按揭优惠5％</em></p>
                            <p class="favor-tag"><a target="_blank" class="tour-mark" soj="list_kficon" href="http://cd.fang.anjuke.com/kft/?from=list_kficon">10.22看房团</a></p>
                        </div>
                    	<div class="tel">
                            <i class="fa fa-phone"> </i> 028-87824111
                        </div>
                    </div>
                </div>
                -->
            </div>
            <!-- listing end  -->

            <div id="pagination">
            <ul><?=$pageNation?></ul>
            </div>
        </div>
        <div class="col-md-3 list-advs">
            <dl class="tuangou_entry">
                <h1 class="h-5">推荐楼盘</h1>
                <? foreach($recommend as $key=>$mend){ ?>
                    <dd class="dd_items" data-link="">
                        <a class="dda0 dda1" href="/newhouse/detail?id=<?=$mend['id']?>&pm_type=0" target="_blank">
                            <img width="190px" height="128px" src="<?=$mend['img_url']?>" alt="<?=$mend['img_url']?>">
                        </a>
                        <a class="dda0 dda2" href="/newhouse/detail?id=<?=$mend['id']?>&pm_type=0" target="_blank">
                            [<?=$mend['borough']==0?'暂无':$this->config->borough_option[$mend['borough']]?>] <?=$mend['name']?></a>
                        <a title="3室91平米，2室75平米	" class="dda0 dda2" href="/newhouse/detail?id=<?=$mend['id']?>&pm_type=0" target="_blank"><?=$item['slogan']==''?'精彩生活每一天':$item['slogan']?></a>
                        <div class="ddd">
                            <?=$mend['sum']?>人已报名<em title="">暂无优惠</em>
                        </div>
                        <span class="dds1"><i class="ddi0 ddi1">&nbsp;</i></span>
                    </dd>
                <? } ?>

<!--                    <dd class="dd_items" data-link="">-->
<!--                        <a class="dda0 dda1" href="/house_item.php?sp=aWRgMzIyMg%3D%3D" target="_blank">-->
<!--                            <img width="190px" height="128px" src="/theme/agency/img/245x167m.jpg" alt="">-->
<!--                        </a>-->
<!--                        <a class="dda0 dda2" href="/house_item.php?sp=aWRgMzIyMg%3D%3D" target="_blank">-->
<!--                            [金牛区] 蓝光花满庭</a>-->
<!--                        <a title="常熟昆承湖湖畔花园额外优化2%" class="dda0 dda2" href="/house_item.php?sp=aWRgMzIyMg%3D%3D" target="_blank">常熟昆承湖湖畔花园额外优化2%</a>-->
<!--                        <div class="ddd">-->
<!--                            4人已报名<em title="总价29万/套起。5.22日蓝客会会员专场团购1%优惠额外享。">总价29万/套起。5.2...</em>-->
<!--                        </div>-->
<!--                        <span class="dds1"><i class="ddi0 ddi1">&nbsp;</i></span>-->
<!--                    </dd>-->
<!--                    <dd class="dd_items" data-link="">        -->
<!--                        <a class="dda0 dda1" href="/house_item.php?sp=aWRgMzMyNw%3D%3D" target="_blank">-->
<!--                            <img width="190px" height="128px" src="/theme/agency/img/210x140m-1.jpg" alt="">-->
<!--                        </a>-->
<!--                        <a class="dda0 dda2" href="/house_item.php?sp=aWRgMzMyNw%3D%3D" target="_blank">-->
<!--                            [高新区]英伦</a>-->
<!--                        <a title="项目位于高新西区政务中心的东侧,地铁2号线外国语学校站出口处" class="dda0 dda2" href="/house_item.php?sp=aWRgMzMyNw%3D%3D" target="_blank">项目位于高新西区政务中心的东侧...</a>-->
<!--                        <div class="ddd">-->
<!--                            4人已报名<em title=""></em>-->
<!--                        </div>-->
<!--                        <span class="dds1"><i class="ddi0 ddi1">&nbsp;</i></span>-->
<!--                    </dd>-->
                </dl>
        </div>
    </div>
    
    <div class="row guess-like">  
        <h3 class="col-md-12">猜你喜欢</h3>
        <? foreach($youlike as $key=>$like){ ?>
            <div class="col-md-2 guess-item clearfix">
                <a target="_blank" rel="nofollow" href="/newhouse/detail?id=<?=$like['id']?>&pm_type=0">
                    <img width="170" height="125" src="<?=$like['img_url'] ?>" alt="<?=$like['img_url'] ?>">
                    <p class="g-name"><?=$like['name'] ?></p>
                    <p class="g-price"><em><?=$like['red_house_price_average'] ?></em>元/㎡</p>
                </a>
            </div>
        <? } ?>
<!--        <div class="col-md-2 guess-item clearfix">              -->
<!--            <a target="_blank" rel="nofollow" href="#">-->
<!--                <img width="170" height="125" src="/theme/agency/img/133x100m.jpg">-->
<!--                <p class="g-name">温江-锦汇城</p>-->
<!--                <p class="g-price"><em>4250</em>元/㎡</p>-->
<!--            </a>-->
<!--        </div>-->
    </div>
</div>

<!-- Footer -->
<?php include '../../index/view/footer.html.php';?>

<!-- jQuery --> 
<script src="/js/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="/js/vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Plugin JavaScript -->
<!-- main JavaScript -->
<script src="/theme/agency/js/agency.js"></script>

<script>
    <? if(strlen($price) == 2){ ?>
    $("#p99").attr('class','item-on');
    <? } ?>
    function search(){
        if($("#keyword").val() == ''){
            return false;
        }else{
            return true;
        }
    }
    function closesearch(type){
        if(type == 'search'){
            $("#"+type).val("");
        }else{
            $("#"+type).val("0");
        }
        document.searchform.submit();
    }

    function searchhouse(key,obj){
        $("#"+obj).val(key);
        document.searchform.submit();
    }

    function priceOrder(){
        var price_order = $("#price_sort").val();
        if(price_order=='price_asc'){
            $("#price_sort").val('price_desc');
        }else{
            $("#price_sort").val('price_asc');
        }
        $("#time_sort").val('normal');
        document.searchform.submit();
    }

    function timeOrder(){
        var time_order = $("#time_sort").val();
        if(time_order=='time_asc'){
            $("#time_sort").val('time_desc');
        }else{
            $("#time_sort").val('time_asc');
        }
        $("#price_sort").val('normal');
        document.searchform.submit();
    }

    function sysOrder(){
        $("#price_sort").val('normal');
        $("#time_sort").val('normal');
        document.searchform.submit();
    }
</script>

</body>
</html>
