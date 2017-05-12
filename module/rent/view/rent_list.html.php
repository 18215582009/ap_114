<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>租房_<?=$this->config->siteName;?></title>
<!-- Bootstrap Core CSS -->
<link href="/js/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Plugin Css -->
<link href="/js/vendor/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">

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
.topFilter {
    border: 1px solid #DDDDDD;
    font-size:14px;;
    padding-bottom: 12px;
	margin-bottom:20px;
	background:#fff;
}
.topFilter .topContent {
    padding-left: 20px;
    position: relative;
}

.topFilter .topContent {
    padding: 5px 20px 0 20px;
    z-index: 2;
}

.topContent a {
    display: inline-block;
    margin-right: 7px;
}
.topContent a:link, .topContent a:visited {
    color: #444;
	font-size:14px;
}

.topContent .dashed{border-bottom:1px dashed #DDDDDD}


/*   filter css   */
.filter-item {
    line-height: 44px;
	display:block;
	padding:2px 0;
}
.filter-item .item-title {
    float: left;
}
.filter-item .item-bd {
    background: #f9f9f9 none repeat scroll 0 0;
    border: 1px solid #ddd;
    left: 21px;
    line-height: 28px;
    padding: 7px 20px;
    position: relative;
    width: 1038px;
}
.filter-item a:hover {
    color: #f60;
	text-decoration:none
}
.filter-item .item-hd a:hover,
.filter-item .item-hd .item-on,
.filter-item .item-mod .item-on,
.filter-item .item-hd .item-on:hover {
    color: #f60;
    font-weight: 700;
}
.filter-item .item-hd a {
    display: inline-block;
    margin: 0 10px 0 10px;
    width: 80px;
}
.filter-item .item-mod span {
    display: inline-block;
    margin-left: 2px;
}
.list-ico {
    background-image: url("http://pages.aifcdn.com/img/house/list/list_icons_02_1x.png");
    background-repeat: no-repeat;
    display: inline-block;
    font-size: 0;
    overflow: hidden;
}
.filter-item .list-ico {
    height: 15px;
    margin-right: 5px;
    vertical-align: -2px;
    width: 14px;
}
.filter-item .area-ico {
    background-position: 0 0;
}
.filter-item .item-hd a:hover .area-ico, .filter-item .item-on .area-ico, .filter-item .item-on:hover .area-ico {
    background-position: -16px 0;
}
.filter-item .subway-ico {
    background-position: -32px 0;
}
.filter-item .item-hd a:hover .subway-ico, .filter-item .item-on .subway-ico, .filter-item .item-on:hover .subway-ico {
    background-position: -48px 0;
}
.filter-item .map-ico {
    background-position: -64px 0;
}
.filter-item .item-hd a:hover .map-ico, .filter-item .item-on .map-ico, .filter-item .item-on:hover .map-ico {
    background-position: -80px 0;
}
.filter-item .fangtan-ico {
    background-position: -257px 0;
    width: 14px;
}
.filter-item .item-hd a:hover .fangtan-ico, .filter-item .item-on .fangtan-ico, .filter-item .item-on:hover .fangtan-ico {
    background-position: -273px 0;
}
.filter-item .item-bd .icon-top-arrow {
    border-bottom: 9px solid #ddd;
    border-left: 9px dashed transparent;
    border-right: 9px dashed transparent;
    display: block;
    height: 0;
    margin-top: -14px;
    position: absolute;
    top: 4px;
    width: 0;
}
.filter-item .item-bd .area-bd .icon-top-arrow {
    left: 50px;
}

.filter-item .item-bd .subway-bd .icon-top-arrow {
    left: 145px;
}

.filter-item .item-bd .icon-top-arrow span {
    border-bottom: 9px solid #f9f9f9;
    border-left: 9px dashed transparent;
    border-right: 9px dashed transparent;
    display: block;
    height: 0;
    left: -9px;
    overflow: hidden;
    position: absolute;
    top: 1px;
    width: 0;
}

.filter-item .pricecond, .filter-item .areacond {
    display: inline-block;
    height: 26px;
    line-height: 26px;
}
.filter-item form input {
    border: 1px solid #ccc;
    height: 18px;
    line-height: 1px;
    margin: -4px 0 0;
    padding: 10px 3px;
    text-align: center;
}

/*　house list */
.main_list .topbar{
	border: 1px solid #DDDDDD;
    height: 55px;
    line-height: 40px;
    padding: 5px 0 0 15px;
	border-top:2px solid #48A843;
	background:#fff;
	margin-bottom:20px;
}
.sort-page-box {
    float: right;
    width: 220px;
}

.sort-page-box .newSort {
    float: left;
    height: 40px;
    line-height: 40px;
    overflow: hidden;
}
.newSort a{ margin-right:12px;font-size:14px;}
.newSort a:hover {
    color: #ff6600;
    display: inline-block;
}

.newSort .list-ico {
    height: 10px;
    margin-left: 5px;
    width: 9px;
}
.newSort .down {
    background-position: -208px 0;
}
.newSort .up {
    background-position: -192px 0;
}

/* house list */
.main_list .list_item {
    border: 1px solid #DDDDDD;
	position:relative;
	margin: 10px auto;
    padding: 20px 0;
	background:#fff;
}
.list_item i,em{font-style:normal}
.list_item:hover {border: 1px solid #f60;cursor: pointer;}
.list_item a:hover {color: #ff6600; text-decoration:none;}
.list_item .img {display: block;float: left;height:140px;width:180px; margin-right:20px;}
.list_item .img img{height: 140px;width: 180px;}
.list_item .tilte {height: 28px;line-height: 28px;}
.list_item .tilte h3 {display: inline-block;font-size:20px;padding-right:4px; margin-top:0; font-weight:normal}
.list_item .tilte .list-dp {color: #999;display: inline-block;font-size: 14px;}
.list_item .tilte .list-dp:hover{color:#f60;}
.list_item .info {color: #666;font-size: 14px;}
.list_item .info a {font-size:14px;}
.list_item .info p {height:25px;line-height: 25px;overflow: hidden;margin: 12px 0 0;}
.list_item .info p .map {color: #999;float: right;}
.list_item .info .where span{color: #333;display:inline-block;font-size:14px;font-weight:700;line-height:18px;white-space:nowrap;margin-right:5px;}
.list_item .favor-pos{text-align: right;}
.list_item .favor-pos .price {
    color: #666;
    font-size: 14px;
    height: 30px;
    line-height: 30px; margin-bottom: 5px;
}
.list_item .favor-pos .price span {
    color: #f60;
    font-size: 30px;
    padding: 0 2px;
}
.list_item .favor-pos .discount-item {
    height: 70px;
    padding-top: 10px;
}
.list_item .favor-pos .favor-tag {
    font-size: 14px;
    height: 24px;
    margin-bottom: 10px;
}

.list_item .favor-pos .favor-tag .group-mark,
.list_item .favor-pos .favor-tag .group-mark:hover,
.list_item .favor-pos .favor-tag .discount-txt {
    border: 1px solid #f60;
    color: #f60;
}

.list_item .favor-pos .favor-tag .tour-mark,
.list_item .favor-pos .favor-tag .tour-mark:hover {
    border: 1px solid #62ab00;
    color: #62ab00;
}
.list_item .favor-pos .favor-tag a,
.list_item .favor-pos .favor-tag .discount-txt {
    display: inline-block;
    height: 22px;
    line-height: 22px;
    max-width: 188px;
    overflow: hidden;
    padding: 0 5px;
    text-align: left;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.list_item .favor-pos .tel {
    color: #999;
    float: right;
    font-size: 16px;
    height:25px;line-height: 25px;margin-top:8px;
}

/* list-advs left */

.list-advs{
    border: 1px solid #ddd;
    margin: 0 0 20px;
	background:#fff;
}
.list-advs li{padding:10px 15px;}
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
.landlord{height: 25px;padding-top: 2px;color: #62ab00;border:1px solid #62ab00;background-color: #fff}
.landlord:hover{background-color: #62ab00;color:#fff}
.collection_report {
    color: #a5a5a5;
    margin-top: 10px;
}

.ainput{width: 388px;height: 44px;padding-left: 40px;}
.aint{margin: 10px 40px}
.alogin{width: 388px;height: 34px;background-color: #5cb85c;color:#fff;border:0;}
.alogin:hover{background-color: #448d44;}
.forget_password{margin-left: 230px;color:#60ab00;}
.register{position:relative;float: right;left: -40px;top: -29px;}
.register span{color:#a5a5a5;}
.close{font-size: 30px;}
.lhead{border-bottom:2px solid #60ab00;height: 70px};
#landlord{width: 500px;border-radius: 0;margin-left: 70px;margin-top: 140px;}
.modal-dialog{width: 500px;border-radius: 0;margin-left: 470px;margin-top: 140px;}
.licon{float: left;font-size: 17px;position:relative;top:32px;left:13px;color: #828282;}
.title{overflow: hidden;display:inline-block;text-overflow: ellipsis;white-space: nowrap;width:100%;}
.phoneyse{width: 65px;height: 40px}
.phoneyse:hover{background-color: #00aa00;color:#fff;}
.phoneno{width: 65px;height: 40px}
.phoneno:hover{background-color: #00aa77;color:#fff;}
.rtoubu{  width: 458px;margin-left: 20px;}
.rtishi{margin-left: 20px;width: 458px;height: 60px;background-color: #eeeeee;}
.rtubiao{float:left;display: inline-block;width: 40px;height: 40px;border-radius: 50%;border:2px solid #62ab00;margin: 10px 15px;text-align: center;line-height: 52px;}
.rtubiao>span{font-size: 28px;color:#62ab00;}
.rcontent{float: left;width: 301px;margin-top: 10px;}
.rcontent>span{display:inline-block;}
.rxuanzhe{width: 408px;margin-left: 30px;}
.rxuanzhe>p{font-size: 20px;}
.rxuanzhe>ul>li{padding-top: 15px;}
.checkbox{width: 15px;height: 15px;float: left;}
.rxuanzhe>textarea{width: 408px;height: 120px;margin-top: 15px;resize: none;}
.rxuanzhe>input{width: 408px;height: 50px;color: #fff;background-color: #e0e0e0;border: 0;font-size: 20px;}
#report{margin-top: -80px;}
.selecteds{line-height: 25px;height:27px;padding: 0 10px;border:1px solid #a5a5a5;color:#a5a5a5;}
.selecteds:hover{border:1px solid #f60;color: #f60;}
.btn-li-right .entrust-house {
    display: inline-block;
    height: 42px;
    width:260px;
    line-height: 42px;
    border-radius: 5px;
    background-color: #ff911b;
    margin: 0;
    padding: 0 15px;
    color: #fff;
    font-size: 20px;
    font-weight: 500;
    letter-spacing:7px;
}
.btn-li-right {
    margin-bottom:20px;
}
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
<!--               <li class="active"><a href="/">乐山租房</a></li>-->
               <li class="active">租房列表</li>
           </ul>
           <input type="hidden" value="{$info.id}" name="layout_id" id="layout_id">
           <input type="hidden" value="{$info.project_name}" name="project_name" id="project_name">
       </div>
        <div class="col-md-6 search-box">
            <form class="search-form right" method="get" action="/rent/" onsubmit="return search()">
                <input type="text" placeholder="请输入房源名称、地址或房源特征" class="input-search" name="keyword" id="keyword" maxlength="100" value="">
                <input type="submit" class="btn-search" value="搜索">
            </form>
        </div>
    </div>
    
    <div class="topFilter">
        <div class="topContent">
        	<form method="get" action="/rent/" id="searchform" name="searchform">
                <input type="hidden" name="borough" id="borough" value="<?=$borough?>">
                <input type="hidden" name="room" id="room" value="<?=$room?>">
                <input type="hidden" name="price" id="price" value="<?=$price?>">
                <input type="hidden" name="area" id="area" value="<?=$area?>">
                <input type="hidden" name="build_year" id="build_year" value="<?=$build_year?>">
                <input type="hidden" name="pm_type" id="pm_type" value="<?=$pm_type?>"/>
                <input type="hidden" name="toward" id="toward" value="<?=$toward?>">
                <input type="hidden" name="lease" id="lease" value="<?=$lease?>">
                <input type="hidden" name="price_sort" id="price_sort" value="<?=$price_sort?>">
                <input type="hidden" name="time_sort" id="time_sort" value="<?=$time_sort?>">
                <input type="hidden" name="keyword" id="search" value="<?=$keyword?>"/>
                <input type="hidden" name="deposit" id="deposit" value="<?=$deposit?>"/>
                <input type="hidden" name="fitmen_type" id="fitmen_type" value="<?=$fitmen_type?>">
            </form>
            <div class="filter-item dashed">
                <label class="item-title">区域：</label>
                <div class="item-mod">
                    <? foreach($this->config->borough_option as $key=>$item) {
                        $seleted = '';
                        if($key==$borough){$seleted = ' class="item-on"';
                            echo "<a target=\"_self\" href='javascript:;'><span".$seleted.">".$item."</span></a>";
                        }else{
                            echo "<a target=\"_self\" href=\"javascript:searchhouse('".$key."','borough')\"><span".$seleted.">".$item."</span></a>";
                        }
                    }
                    ?>
                </div>
            </div>
            
<!--            <div class="filter-item dashed">-->
<!--            	<label class="item-title">地铁：</label>-->
<!--            	<div class="item-mod">-->
<!--                <a href="http://cd.fang.anjuke.com/loupan/subway_28/y1/">1号线</a>-->
<!--                <a href="http://cd.fang.anjuke.com/loupan/subway_29/y1/">2号线</a>-->
<!--                <a href="http://cd.fang.anjuke.com/loupan/subway_71/y1/">3号线</a>-->
<!--                <a href="http://cd.fang.anjuke.com/loupan/subway_185/y1/">4号线</a>-->
<!--                <a href="http://cd.fang.anjuke.com/loupan/subway_184/y1/">7号线</a>-->
<!--                <a href="http://cd.fang.anjuke.com/loupan/subway_41/y1/">成灌快铁</a>-->
<!--                </div>-->
<!--            </div>-->
            
            <div class="filter-item dashed">
                <label class="item-title">价格：</label>
                <div class="item-mod">
                    <a rel="nofollow" class="" id="pr0" target="_self" href="javascript:searchhouse('0','price')"><span>不限</span></a>
                    <a rel="nofollow" class="" id="pr0-500" target="_self" href="javascript:searchhouse('0-500','price')">500以下</a>
                    <a rel="nofollow" class="" id="pr500-800" target="_self" href="javascript:searchhouse('500-800','price')">500-800元</a>
                    <a rel="nofollow" class="" id="pr800-1000" target="_self" href="javascript:searchhouse('800-1000','price')">800-1000元</a>
                    <a rel="nofollow" class="" id="pr1000-1500" target="_self" href="javascript:searchhouse('1000-1500','price')">1000-1500元</a>
                    <a rel="nofollow" class="" id="pr1500-2000" target="_self" href="javascript:searchhouse('1500-2000','price')">1500-2000元</a>
                    <a rel="nofollow" class="" id="pr2000-3000" target="_self" href="javascript:searchhouse('2000-3000','price')">2000-3000元</a>
                    <a rel="nofollow" class="" id="pr3000-5000" target="_self" href="javascript:searchhouse('3000-5000','price')">3000-5000元</a>
                    <a rel="nofollow" class="" id="pr5000-8000" target="_self" href="javascript:searchhouse('5000-8000','price')">5000-8000元</a>
                    <a rel="nofollow" class="" id="pr8000-0" target="_self" href="javascript:searchhouse('8000-0','price')">8000以上</a>
                    <div class="pricecond">
                        <form>
                            <? $prices = explode('-',$price);  if(strlen($price)!=1){ $seleted = " item-on";} ?>
                            <input type="text" value="<?=$prices[0] == 0?'':$prices[0]?>" autocomplete="off" id="from_price" maxlength="5" size="2"   name="from_price" class="from-price price_custom custom <?=$seleted ?>"> -
                            <input type="text" value="<? if(strlen($price)==1){ echo '';}else{ ?><? if($prices[1]==0){echo '';}else{ echo count($prices)==1?'':$prices[1];} ?><? } ?>" autocomplete="off" id="to_price" maxlength="5" size="2" name="to_price" class="to-price price_custom custom <?=$seleted ?>">&nbsp;<span class="">万</span>
                            <input type="button" value="确定" onclick="range_search('price')" style="display:none" id="pricerange_search" class="smit">
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="filter-item dashed">
            	<label class="item-title">面积：</label>
                <div class="item-mod">
                    <? foreach($this->config->area_option as $key=>$item){
                        $seleted = '';
                        if($key===$area){$seleted = ' class="item-on"';
                            echo "<a target=\"_self\" href='javascript:;'><span".$seleted.">".$item."</span></a>";
                        }else{
                            echo "<a target=\"_self\" href=\"javascript:searchhouse('".$key."','area')\"><span".$seleted.">".$item."</span></a>";
                        }
                    }
                    ?>
                    <div class="areacond">
                        <form id="pr_form_apf_id_11">
                            <? $measures = explode('-',$area); if(strlen($area)!=1){ $seleted = " item-on";} ?>
                            <input type="text" value="<?=$measures[0] == 0?'':$measures[0]?>" autocomplete="off" id="from_area" name="from_area" size="2"   maxlength="5" class="from-area area_custom custom <?=$seleted ?>"> -
                            <input type="text" value="<? if(strlen($area)==1){ echo '';}else{ ?><? if($measures[1]==0){echo '';}else{ echo count($measures)==1?'':$measures[1];} ?><? } ?>" autocomplete="off" id="to_area" name="to_area" maxlength="5" size="2"  class="to-area area_custom custom <?=$seleted ?>">&nbsp;<span class="">平米</span>
                            <input type="button" value="确定" style="display: none" onclick="range_search('area')" id="arearange_search" class="smit">
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="filter-item dashed">
                <label class="item-title">户型：</label>
                <div class="item-mod">
                    <? foreach($this->config->apa_room_option as $key=>$item){
                        $seleted = '';
                        if($key==$room){$seleted = ' class="item-on"';
                            echo "<a target=\"_self\" href='javascript:;'><span".$seleted.">".$item."</span></a>";
                        }else{
                            echo "<a target=\"_self\" href=\"javascript:searchhouse('".$key."','room')\"><span".$seleted.">".$item."</span></a>";
                        }
                    }
                    ?>
        		</div>
            </div>
            
            <div class="filter-item dashed">
                <label class="item-title">更多：</label>
                <div class="item-mod">
                
                <select data-width="100px" onchange="select('pm_type')" class="pm_type selectpicker form-control mbn">
                    <option value="0">房屋类型</option>
                    <? foreach($this->config->property_option as $key=>$item){
                        if($key > 0){
                            $seleted = '';
                            if($key == $pm_type)$seleted = " selected";
                            echo "<option ".$seleted." value=".$key.">$item</option>";
                        }
                    } ?>
                </select>
                
                <select data-width="100px" onchange="select('toward')" class="toward selectpicker form-control mbn">
                    <option value="0">朝向</option>
                    <? foreach($this->config->orientation_option as $key=>$item){
                        if($key > 0){
                            $seleted = '';
                            if($key == $toward)$seleted = " selected ";
                            echo "<option ".$seleted." value=".$key.">$item</option>";
                        }
                    } ?>
                </select>

                <select data-width="100px" onchange="select('fitmen_type')" class="fitmen_type selectpicker form-control mbn">
                    <option>装修</option>
                    <? foreach($this->config->fitment_option as $key=>$item){
                        if($key > 0){
                            $seleted = '';
                            if($key == $fitmen_type)$seleted = ' selected';
                            echo "<option ".$seleted." value=".$key.">$item</option>";
                        }
                    } ?>
                </select>

                <select data-width="100px" onchange="select('lease')" class="lease selectpicker form-control mbn">
                    <option value="0">租赁方式</option>
                    <? foreach($this->config->rent_way_option as $key=>$item){
                        if($key > 0){
                            $seleted = '';
                            if($key == $lease)$seleted = " selected ";
                            echo "<option ".$seleted." value=".$key.">$item</option>";
                        }
                    } ?>
                </select>
                <select data-width="100px" onchange="select('deposit')" class="deposit selectpicker form-control mbn">
                    <option value="0">押金方式</option>
                    <? foreach($this->config->pay_way_option as $key=>$item){
                        if($key > 0){
                            $seleted = '';
                            if($key == $deposit)$seleted = " selected ";
                            echo "<option ".$seleted." value=".$key.">$item</option>";
                        }
                    } ?>
                </select>
                
        		</div>
            </div>

            <? if($condition == 1){ ?>
                <div class="filter-item">
                    <label class="item-title">筛选条件：</label>
                    <div class="item-mod">
                        <?if($borough != 0){?><a href="javascript:closesearch('borough')"><span class="selecteds">区域：<?=$this->config->borough_option[$borough] ?><span style="left: 5px;top:2px" class="glyphicon glyphicon-remove"></span></span></a><?}?>
                        <?if($room != 0){?><a href="javascript:closesearch('room')"><span class="selecteds">户型：<?=$this->config->apa_room_option[$room] ?><span style="left: 5px;top:2px" class="glyphicon glyphicon-remove"></span></span></a><?}?>
                        <?if(strlen($price) != 1){?><a href="javascript:closesearch('price')"><span class="selecteds">价格：<? $prices=explode('-',$price);if($prices[0]==0){echo $prices[1]."元以下";}elseif($prices[1]==0){echo $prices[0]."元以上";}else{echo $price.'元';}  ?><span style="left: 5px;top:2px" class="glyphicon glyphicon-remove"></span></span></a><?}?>
                        <?if(strlen($area) != 1){?><a href="javascript:closesearch('area')"><span class="selecteds">面积：<? $areas=explode('-',$area);if($areas[0]==0){echo $areas[1]."平米以下";}elseif($areas[1]==0){echo $areas[0]."平米以上";}else{echo $area.'平米';}  ?><span style="left: 5px;top:2px" class="glyphicon glyphicon-remove"></span></span></a><?}?>

                        <?if($keyword != ''){?><a href="javascript:closesearch('search')"><span class="selecteds">关键字：<?=$keyword ?><span style="left: 5px;top:2px" class="glyphicon glyphicon-remove"></span></span></a><?}?>
                        <?if(strlen($pm_type) != 1){?><a href="javascript:closesearch('pm_type')"><span class="selecteds">房屋类型：<?=$this->config->property_option[$pm_type] ?><span style="left: 5px;top:2px" class="glyphicon glyphicon-remove"></span></span></a><?}?>
                        <?if(strlen($toward) != 1){?><a href="javascript:closesearch('toward')"><span class="selecteds">朝向：<?=$this->config->direction_option[$toward] ?><span style="left: 5px;top:2px" class="glyphicon glyphicon-remove"></span></span></a><?}?>
                        <?if($lease != 0){?><a href="javascript:closesearch('lease')"><span class="selecteds">租赁：<?=$this->config->rent_way_option[$lease] ?><span style="left: 5px;top:2px" class="glyphicon glyphicon-remove"></span></span></a><?}?>
                        <?if($deposit != 0){?><a href="javascript:closesearch('deposit')"><span class="selecteds">押金：<?=$this->config->pay_way_option[$deposit] ?><span style="left: 5px;top:2px" class="glyphicon glyphicon-remove"></span></span></a><?}?>
                        <?if($fitmen_type != 0){?><a href="javascript:closesearch('fitmen_type')"><span class="selecteds">装修：<?=$this->config->fitment_option[$fitmen_type] ?><span style="left: 5px;top:2px" class="glyphicon glyphicon-remove"></span></span></a><?}?>
                        <a href="/rent/">清空所有条件</a>
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
                    <div class="left">共有<span class="c-yellow"> <?=$total ?> </span>个符合要求的房源</div>
                    <!--div class="fr">排序：<a href="http://cd.fang.anjuke.com/loupan/s?m=1" rel="nofollow">推荐</a></div-->
                    <div class="sort-page-box">
                        <div class="newSort">
                        <a rel="nofollow" href="javascript:sysOrder()">默认排序</a>
                        </div>
                        <div class="newSort">
                            <a target="_self" href="javascript:priceOrder()">
                                月租
                                <? if($price_sort=='price_asc'){ ?>
                                    <i class="list-ico up"></i>
                                <? }else{ ?>
                                    <i class="list-ico down"></i>
                                <? }?>
                            </a>
                            <a href="javascript:timeOrder()" rel="nofollow">
                                时间
                                <? if($time_sort=='time_asc'){ ?>
                                    <i class="list-ico up"></i>
                                <? }else{ ?>
                                    <i class="list-ico down"></i>
                                <? } ?>
                            </a>
                        </div>
                    </div>
                </div>
                <input id="houseid" type="hidden" value=""/>
                <? foreach($list as $key=>$info){ ?>
                    <div style="position:relative;" id="m<?=$info['id'] ?>"  class="list-item clearfix" data-link="/rent/detail?id=<?=$info['id'] ?>">
                        <a class="col-md-3 img" href="/rent/detail?id=<?=$info['id'] ?>">
                            <img onerror="javascript:this.src='/images/pic_default.jpg'" alt="英伦" src="<?=$info['img_path'] ?>">
                        </a>
                        <div class="col-md-6">
                            <div class="tilte">
                                <h3 class="title"><a target="_blank" href="/rent/detail?id=<?=$info['id'] ?>" class="items-name esf_name"><?=$info['title']==''?$info['reside']:$info['title']?></a></h3>
                            </div>
                            <div class="info">
                                <p class="where">
                                    <span><?=$info['shi'] ?>室<?=$info['ting'] ?>厅</span>
                                    <span style="padding: 0 8px">|</span>
                                    <span><?=round($info['total_area']) ?>平米</span>
                                    <span style="padding: 0 8px">|</span>
                                    <span><?=$info['rent_way']==2?"合租":"整租"?></span>

                                    <span><? if($info['current_floor']!='' && $info['current_floor']!=0){?><span style="padding: 0 8px">|</span><?=$info['current_floor'] ?>/<?=$info['total_floor'] ?>层<? }?></span>
                                    <span><? if(isset($this->config->direction_option[$info['toward']]) && $info['toward']!=0){ ?><span style="padding: 0 8px">|</span><?=$this->config->direction_option[$info['toward']] ?><? } ?></span>
                                </p>
                                <p>
                                    <span class="mrm"><?=$info['reside'] ?></span>
                                    <span>[<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                        <?=$this->config->borough_option[$info['borough']]?>
                                        <?=$info['address'] ?>]</span>
                                </p>
                                <p>
                                    <span style="padding: 1px 5px;border: 1px solid #a5a5a5">随时看房</span>
                                    <? if(isset($this->config->fitment_option[$info['fitmen_type']]) && $info['fitmen_type']!=0){echo "<span style='padding: 1px 5px;border: 1px solid #a5a5a5'>".$this->config->fitment_option[$info['fitmen_type']]."</span>";} ?>
                                </p>

                            </div>


                        </div>

                        <div class="col-md-3 favor-pos">
                            <p class="price"><span><?=round($info['price'])==0?'待定</span>':round($info['price']).'</span>元/月'?></p>
                            <div class="discount-item">
                                <p class="favor-tag"><em title="高层全款优惠6％，按揭优惠5％" class="discount-txt"><?=$info['hits']==0?"0":$info['hits'] ?>人看过此房</em></p>
                                <div class="btn landlord" data-toggle="modal" data-target="#viewphone" onclick="landlord('<?=$info['id']?>')">联系房东</div>
                                <div id="landlordphone" style="display:none" class="tel"></div>
                            </div>
                            <a class="collection_report report" style="float: right" data-toggle="modal" data-target="#report"><span class="glyphicon glyphicon-exclamation-sign"></span><span>举报</span></a>
                            <a class="collection_report collection" onclick="collection('<?=$info['id']?>')" style="float: right"><span class="glyphicon glyphicon-star"></span><span>收藏&nbsp;&nbsp;</span></a>
                        </div>
                    </div>
                <? } ?>
<!--                <div style="position:relative" class="list_item clearfix" data-link="/sale/detail">-->
<!--                	<a class="col-md-3 img" href="#">-->
<!--                    <img onerror="javascript:this.src='/ui/images/240x180m1.jpg'" alt="英伦" src="/theme/agency/img/240x180m1.jpg">-->
<!--                    </a>-->
<!--                    <div class="col-md-6">-->
<!--                        <div class="tilte">-->
<!--                            <h3><a target="_blank" href="#" class="items-name">贝森兴苑 三居室 面积89.29平米 </a></h3>-->
<!--                        </div>-->
<!--                        -->
<!--                        <div class="info">-->
<!--                            <p class="where">-->
<!--                            <span>4室2厅</span>-->
<!--                            <span>145.3平米 </span>-->
<!--                            <span>中层(共16层)</span>-->
<!--                            <span>2015年建造</span>-->
<!--                            </p>-->
<!--                            <p>-->
<!--                            <span class="mrm">卓锦城六期</span>-->
<!--                            <span>[锦江-三圣乡 国香街780号]</span>-->
<!--                            </p>-->
<!--                            <p>推荐理由：<a>商业,住宅,电梯,  2线</a></p>-->
<!--                        </div>-->
<!--                        -->
<!--                        -->
<!--                    </div>-->
<!--                    -->
<!--                    <div class="col-md-3 favor-pos">-->
<!--                        <p class="price">总价<span>102</span>万</p>-->
<!--                        <div class="discount-item">-->
<!--                            <p class="favor-tag"><em title="高层全款优惠6％，按揭优惠5％" class="discount-txt">58人看过此房</em></p>-->
<!--                            <p class="favor-tag"><a target="_blank" class="tour-mark" soj="list_kficon" href="">我要看房</a></p>-->
<!--                        </div>-->
<!--                    	<div class="tel">-->
<!--                            <i class="fa fa-phone"> </i> 028-87824111-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

            </div>
            <!-- listing end  -->
            <div id="pagination">
                <?=$pageNation?>
            </div>
        </div>
        <div class="col-md-3">

            <!-- 闪电买卖 -->
            <div class="btn-li-right text-center" >
                <a rel="nofollow" class="entrust-house" href="/rent/pub" target="_blank"><i></i><em>闪电卖房</em></a>
            </div>

            <div class="row list-advs">
                <h1 class="h-5">房价走势</h1>
                <img src="/theme/agency/img/zs.png" class="col-md-12">
            </div>

            <div class="row list-advs">
                <h1 class="h-5">购房问答</h1>
                <ul>
                    <? foreach($information as $key=>$info){ ?>
                        <li class="title"><a href="/news/detail?type=info&id=<?=$info['id']?>"><?=$info['title']?></a></li>
                    <? } ?>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="row guess-like">  
        <h3 class="col-md-12">猜你喜欢</h3>
        <? foreach($guessyoulike as $key=>$info){ ?>
            <div class="col-md-2 guess-item clearfix">
                <a target="_blank" rel="nofollow" href="/sale/detail?id=<?=$info['id']?>">
                    <img width="170" height="125" onerror="javascript:this.src='/images/pic_default.jpg'" src="<?=$info['img_path']?>">
                    <p class="g-name"><?=$info['title']?></p>
                    <p class="g-price"><em><?=round($info['price'])==0?'待定</em>':round($info['price']).'</em>元/月'?></p>
                </a>
            </div>
        <? } ?>
        
    </div>
</div>
<div id="prompt" style="display: none;box-shadow: 2px 4px 10px #000;z-index: 2;background-color: #fbfbfb;width:300px;height:180px;position: fixed;left: 38%;top:32%;text-align: center;font-size: 20px">
    <div style="padding-top: 65px">
        <span style="color:#fd6002" class="glyphicon glyphicon-star"></span> 收藏成功
    </div>
</div>

<div class="modal fade" id="userlogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header lhead">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span id="close" aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">用户登录</h3>
                <div class="register"><span style="">还没有FC114账号？</span><a href="/userlogin/regist">马上注册</a></div>
            </div>
            <div class="modal-body">
                <div class="loan1">
                    <input type="hidden" name="from" id="from" value="rent">
                    <p class="aint">
                        <span class="glyphicon glyphicon-phone licon"></span><input id="tel" name="tel" maxlength="11" class="ainput phone" type="text" placeholder=" 请输入手机号"/>
                    </p>
                    <p class="aint">
                        <span class="glyphicon glyphicon-lock licon"></span><input id="pwd" name="pwd" class="ainput code" type="password" placeholder=" 请输入密码"/>
                    </p>
                    <p class="aint">
                        <input id="daicheck" type="checkbox" checked/>下次自动登录 <a class="forget_password" href="#">忘记密码</a>
                    </p>
                    <p class="aint">
                        <input id="loan_application" class="alogin daisheng" type="button" onclick="login()" value="马上登录"/>
                    </p>
                </div>
                <div id="loadingToast" class="weui_loading_toast" style="display: none;">
                    <div class="weui_mask_transparent"></div>
                    <div class="weui_toast">
                        <div class="weui_loading">
                            <div class="weui_loading_leaf weui_loading_leaf_0"></div>
                            <div class="weui_loading_leaf weui_loading_leaf_1"></div>
                            <div class="weui_loading_leaf weui_loading_leaf_2"></div>
                            <div class="weui_loading_leaf weui_loading_leaf_3"></div>
                            <div class="weui_loading_leaf weui_loading_leaf_4"></div>
                            <div class="weui_loading_leaf weui_loading_leaf_5"></div>
                            <div class="weui_loading_leaf weui_loading_leaf_6"></div>
                            <div class="weui_loading_leaf weui_loading_leaf_7"></div>
                            <div class="weui_loading_leaf weui_loading_leaf_8"></div>
                            <div class="weui_loading_leaf weui_loading_leaf_9"></div>
                            <div class="weui_loading_leaf weui_loading_leaf_10"></div>
                            <div class="weui_loading_leaf weui_loading_leaf_11"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="viewphone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header lhead">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span id="close" aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">查看房源</h3>
            </div>
            <div class="modal-body" style="padding: 50px">
                <h4 id="integral_cue" style="text-align: center">是否使用<span style="font-size: 25px;font-weight: bold"> 40 </span>积分获得房东电话</h4>
                <div style="text-align: center;margin-top: 50px;margin-bottom: 40px;">
                    <button type="button" class="btn phoneyse" data-dismiss="">确定</button>
                    <button type="button" class="btn phoneno closes" data-dismiss="modal">取消</button>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="report" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header lhead rtoubu">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span id="close" aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">我要举报</h3>
            </div>
            <div class="rtishi">
                <span class="rtubiao">
                    <span class="glyphicon glyphicon-volume-up"></span>
                </span>
                <span class="rcontent">
                    <span>1.信息隐私保护，请放心举报;</span>
                    <span>2.举报会在两个工作日内进行处理。</span>
                </span>
            </div>
            <div class="modal-body">
                <form class="rxuanzhe">
                    <p>您举报房源的原因是 (必填,可多选):</p>
                    <input id="esf_id" type="hidden" value=""/>
                    <ul>
                        <li><input class="checkbox" id="check1" type="checkbox"/>&nbsp;<label for="check1">房子不存在或已经卖了</label></li>
                        <li><input class="checkbox" id="check2" type="checkbox"/>&nbsp;<label for="check2">图文与实际不符</label></li>
                        <li><input class="checkbox" id="check3" type="checkbox"/>&nbsp;<label for="check3">价格与实际不符</label></li>
                        <li><input class="checkbox" id="check4" type="checkbox"/>&nbsp;<label for="check4">其他</label></li>
                    </ul>
                    <textarea id="textarea" placeholder="您可在此写下具体描述,请至少输入10个汉字"></textarea>
                    <span style="float:right;position:relative;top: -25px;left: -4px"><span id="textsum">0</span>/<span>100</span></span>
                    <input id="submit" disabled type="button" value="提交"/>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Footer -->
<?php include '../../index/view/footer.html.php';?>

<!-- jQuery --> 
<script src="/js/jquery.min.js"></script> 

<!-- Bootstrap Core JavaScript --> 
<script src="/js/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript --> 
<script src="/js/vendor/bootstrap-select/bootstrap-select.min.js"></script>

<!-- main JavaScript -->
<script src="/theme/agency/js/agency.js"></script> 

<!--BEGIN JAVASCRIPT-->
<script>
$(document).ready(function(){
    //判断用户是否登录
    <? if(!isset($_SESSION['login'])){ ?>
    $(".landlord").attr("data-target","#userlogin");
    $(".report").attr("data-target","#userlogin");
    $(".collection").attr({"data-toggle":"modal","data-target":"#userlogin"});
    <? } ?>
    //登录后显示已经收藏的房源和已查看的房东电话
    <? if(isset($_SESSION['userid'])){ ?>
    <? foreach($collection as $info){ ?>
    $("#m<?=$info['esf_id']?>>.favor-pos>.collection>span:eq(1)").html("已收藏&nbsp;&nbsp;")
    <? } ?>
    <? foreach($landlordphone as $info){ ?>
    $("#m<?=$info['esf_id']?>>.favor-pos>.discount-item>#landlordphone").html("<span class='fa fa-phone'> </span>&nbsp;<?=$info['linkman']?> <?=$info['telphone']?>");
    $("#m<?=$info['esf_id']?>>.favor-pos>.discount-item>#landlordphone").css("display","block");
    $("#m<?=$info['esf_id']?>>.favor-pos>.discount-item>.landlord").css("display","none");
    <? } ?>
    <? } ?>


});
//价格选择
$("#pr<?=$price?>").prop("class","item-on");
$("#pr<?=$price?>").prop("href","javascript:;");
//更多，楼层选择
$("#to<?=$total_floor?>").prop("selected","selected");
//登录
function login(){
    var tel = $('#tel').val();
    var pwd = $('#pwd').val();
    var code = $('#code').val();
    var from = $('#from').val();
    $('#loadingToast').show();
    $.ajax({
        type: 'POST',
        url: '/userlogin/apiMobilelogin',
        dataType: 'JSON',
        data: {
            username: tel,
            password:pwd,
            code:code,
            from:from,
            submittype:'ajax'
        },
        success: function (result) {
            alert(result.msg);
            if (result.success) {
                document.searchform.submit();
            }
            setTimeout(function () {
                $('#loadingToast').hide();
            }, 500);
        },
        error: function (result) {
            if (result.success) {
                alert(result.msg);
            }
            else {
                alert("系统繁忙!");
            }
        }
    });
}


function landlord(id){
    $("#houseid").val(id);
}
//联系房东
$('div.list-item').on('click', '.landlord', function(){
},'click','.close',function(){
});
//消费积分查看房东电话
$(".phoneyse").click(function(){
    var esf_id = $("#houseid").val();
    var esf_name = $("#m"+esf_id+" .esf_name").html();
    $.ajax({
        type:'POST',
        url:'/sale/consumption',
        dataType:'JSON',
        data:{
            esf_id:esf_id,
            esf_name:esf_name,
            sum:40
        },
        success:function(result){
            if(result == '积分不足'){
                $('#integral_cue').html("<span style='font-size: 27px;position: relative;top: 13px;'>"+result+"</span>"+"&nbsp;&nbsp;&nbsp;<a style='font-size: 14px' href='#'>>>前往充值</a><div style='position:relative;top: 1px;left:77px;font-size: 14px;color: #a5a5a5;'><a href='/user_common/score'>>>如何获得积分</a></div>");
                $(".phoneyse").css("display","none");

            }else{
                var id = $("#houseid").val();
                $("#m"+id+">.favor-pos>.discount-item>#landlordphone").html("<i class='fa fa-phone'> </i>&nbsp; "+result.telphone);
                $("#m"+id+">.favor-pos>.discount-item>#landlordphone").css("display","block");
                $("#m"+id+">.favor-pos>.discount-item>.landlord").css("display","none");
                $('#integral_cue').html("房东："+result.linkman+"&nbsp;&nbsp;电话："+result.telphone+result.integral);
                $(".phoneyse").css("display","none");
            }
        },
        error:function(result){alert('no');}
    });
});

$(".closes").click(function(){
    setTimeout("integral_cue()",1000);
});
function integral_cue(){
    $('#integral_cue').html("是否使用<span style='font-size: 25px;font-weight: bold'> 40 </span>积分获得房东电话");
    $(".phoneyse").css("display","inline-block")
}

//收藏
function collection(obj){
    <? if(isset($_SESSION['userid'])){ ?>
    if($("#m"+obj+">.favor-pos>.collection>span:eq(1)").html() == "收藏&nbsp;&nbsp;"){
        var esf_name = $("#m"+obj+" .esf_name").html();
        $.ajax({
            type:'POST',
            url:'/sale/collection',
            dataType:'JSON',
            data:{
                esf_id:obj,
                house_type:2
            },
            success:function(result){
                $("#prompt").css("display","block");
                $("#prompt").fadeOut(3000);
                $("#m"+obj+">.favor-pos>.collection>span:eq(1)").html("已收藏&nbsp;&nbsp;");
            },
            error:function(result){alert('no');}
        });
    }
    event.stopPropagation();
    <? } ?>
}
$('div.list-item').on('click', '.collection', function(){
},'click','.close',function(){
});
//举报
$('div.list-item').on('click', '.report', function(){
},'click','.close',function(){
});
$("#textarea").keyup(function(){
    var text = $("#textarea").val();
    if(text.length >= 10){
        $("#submit").attr("disabled",false);
        $("#submit").css("background","#62ab00");
    }else{
        $("#submit").attr("disabled",true);
        $("#submit").css("background","#e0e0e0");
    }
    $("#textsum").html(text.length);
});

//自定义内容验证
$(".custom").keyup(function(){
    this.size=(this.value.length>4?this.value.length:2);
    this.value=this.value.replace(/\D/gi,'')
});

$(document).click(function(e){
    e = window.event || e; // 兼容IE7
    obj = $(e.srcElement || e.target);
    if ($(obj).is("#pricerange_search,.price_custom")) {
        $("#pricerange_search").css("display","inline-block");
    } else {
        $("#pricerange_search").css("display","none");
    }
});
$(document).click(function(e){
    e = window.event || e; // 兼容IE7
    obj = $(e.srcElement || e.target);
    if ($(obj).is("#arearange_search,.area_custom")) {
        $("#arearange_search").css("display","inline-block");
    } else {
        $("#arearange_search").css("display","none");
    }
});
function range_search(type){
    if($('#from_'+type).val() != '' || $('#to_'+type).val() != ''){
        var from = 0;
        var to = 0;
        if($('#from_'+type).val()!=''){
            from = $("#from_"+type).val();
        }
        if($('#to_'+type).val()!=''){
            to = $("#to_"+type).val();
        }
        if($("#from_"+type).val()!='' && $("#to_"+type).val()!=''){
            if(parseInt(from) > parseInt(to)){
                $('#from_'+type).val(to);
                $('#to_'+type).val(from);
                $("#"+type).val(to+"-"+from);
            }else{
                $("#"+type).val(from+"-"+to);
            }
        }else{
            $("#"+type).val(from+"-"+to);
        }
        document.searchform.submit();
    }
}

$('.selectpicker').selectpicker({
    iconBase: 'fa',
    tickIcon: 'fa-check'
});

//搜索
function search(){
    if($("#keyword").val() == ''){
        return false;
    }else{
        return true;
    }
}
//搜索关键字取消
function closesearch(type){
    if(type == 'search'){
        $("#"+type).val("");
    }else{
        $("#"+type).val("0");
    }
    document.searchform.submit();
}
//地区、价格、面积、户型
function searchhouse(key,obj){
    $("#"+obj).val(key);
    document.searchform.submit();
}
//价格排序
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
//时间排序
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

//默认排序
function sysOrder(){
    $("#price_sort").val('normal');
    $("#time_sort").val('normal');
    document.searchform.submit();
}

//更多类型选择
var Moretype = ['pm_type','toward','fitmen_type','lease','deposit'];
var Moretypevalue = ['<?=$pm_type?>','<?=$toward?>','<?=$fitmen_type?>','<?=$lease?>','<?=$deposit?>'];
var Moretypesum = [<?=count($this->config->property_option)?>,<?=count($this->config->direction_option)?>,
                    <?=count($this->config->fitment_option)?>,<?=count($this->config->rent_way_option)?>,
                    <?=count($this->config->pay_way_option)?>];
for(var n=0;n<Moretype.length;n++){
    if(Moretypevalue[n] != 0){
        $("."+Moretype[n]+" .pull-left").css("color","#f60");
    }
    for(var i=0;i<Moretypesum[n];i++){
        if($("."+Moretype[n]+" .selectpicker li:eq("+i+")").attr("class") == "selected"){
            $("."+Moretype[n]+" .selectpicker li:eq("+i+") .text").css("color","#f60");
        }
    }
    $("."+Moretype[n]+" .selectpicker li:eq(0) .text").html('全部');
}
//更多类型选择
function select(key){
    $("#"+key).val($("."+key).val());
    document.searchform.submit();
}

</script>
<!--END JAVASCRIPT-->
</body>
</html>
