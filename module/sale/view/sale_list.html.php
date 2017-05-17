<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>二手房_<?=$this->config->siteName;?></title>
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
    /*width: 35px;*/
}


.list-item .info .where span{color: #333;display:inline-block;font-size:14px;font-weight:700;line-height:18px;white-space:nowrap;margin-right:5px;}

/* list-advs left */
.list-advs {
    border: 1px solid #ddd;
    margin: 0 0 20px;
	background:#fff;
}
.list-advs li{padding:7px 15px;}
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
.btn-li-right {
	margin-bottom:20px;
}
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
.btn-li-right .entrust-house i {
    display: inline-block;
    width: 28px;
    height: 24px;
    vertical-align: -7px;
    margin-right: 7px;
    background: url(/theme/agency/img/entrust-icons-v2.png) no-repeat -120px 0;
}
.collection_report{color:#a5a5a5;margin-top: 10px}
.landlord{height: 25px;padding-top: 2px;color: #62ab00;border:1px solid #62ab00;background-color: #fff}
.landlord:hover{background-color: #62ab00;color:#fff}
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
.rtoubu{width: 458px;margin-left: 20px;}
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
.sort-page-box {
    float: right;
    width: 220px;
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
               <li class="active">二手房列表</li>
           </ul>
           <input type="hidden" value="{$info.id}" name="layout_id" id="layout_id">
           <input type="hidden" value="{$info.project_name}" name="project_name" id="project_name">
       </div>
        <div class="col-md-6 search-box">
            <form class="search-form right" method="get" action="/sale/" onsubmit="return search()">
                <input type="text" placeholder="请输入二手房名称、地址或房源特征" class="input-search" name="keyword" id="keyword" maxlength="100" value="">
                <input type="submit" class="btn-search" value="搜索">
            </form>
        </div>
    </div>
    <div class="topFilter">
        <div class="topContent">
        	<form method="get" action="/sale/" id="searchform" name="searchform">
                <input name="borough" id="borough" type="hidden" value="<?=$borough ?>"/>
                <input name="price" id="price" type="hidden" value="<?=$price ?>"/>
                <input name="area" id="area" type="hidden" value="<?=$area ?>"/>
                <input name="room" id="room" type="hidden" value="<?=$room ?>"/>
                <input type="hidden" name="price_sort" id="price_sort" value="<?=$price_sort?>">
                <input type="hidden" name="time_sort" id="time_sort" value="<?=$time_sort?>">

                <input type="hidden" name="build_year" id="build_year" value="<?=$build_year?>">
                <input type="hidden" name="pm_type" id="pm_type" value="<?=$pm_type?>">
<!--                <input type="hidden" name="struct" id="struct" value="--><?//=$struct?><!--">-->
                <input type="hidden" name="toward" id="toward" value="<?=$toward?>">
                <input type="hidden" name="total_floor" id="total_floor" value="<?=$total_floor?>"/>
                <input type="hidden" name="fitmen_type" id="fitmen_type" value="<?=$fitmen_type?>">

                <input type="hidden" name="keyword" id="search" value="<?=$keyword?>"/>
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
<!--                <a target="_self" href="javascript:searchhouse('0','room')"><span class="item-on">不限</span></a>-->
<!--                <a target="_self" href="javascript:searchhouse('510104','borough')"><span>锦江区</span></a>-->
<!--                <a target="_self" href="javascript:searchhouse('510105','borough')"><span>青羊区</span></a>-->
<!--                <a target="_self" href="javascript:searchhouse('510106','borough')"><span>金牛区</span></a>-->
<!--                <a target="_self" href="javascript:searchhouse('510107','borough')"><span>武侯区</span></a>-->
<!--                <a target="_self" href="javascript:searchhouse('510108','borough')"><span>成华区</span></a>-->
<!--                <a target="_self" href="javascript:searchhouse('510109','borough')"><span>高新区</span></a>-->
<!--                <a target="_self" href="javascript:searchhouse('510112','borough')"><span>龙泉</span></a>-->
<!--                <a target="_self" href="javascript:searchhouse('510113','borough')"><span>青白江</span></a>-->
<!--                <a target="_self" href="javascript:searchhouse('510121','borough')"><span>金堂</span></a>-->
<!--                <a target="_self" href="javascript:searchhouse('510122','borough')"><span>双流</span></a>-->
<!--                <a target="_self" href="javascript:searchhouse('510123','borough')"><span>温江</span></a>-->
<!--                <a target="_self" href="javascript:searchhouse('510124','borough')"><span>郫县</span></a>-->
<!--                <a target="_self" href="javascript:searchhouse('510125','borough')"><span>新都</span></a>-->
<!--                <a target="_self" href="javascript:searchhouse('510129','borough')"><span>大邑</span></a>-->
<!--                <a target="_self" href="javascript:searchhouse('510131','borough')"><span>蒲江</span></a>-->
<!--                <a target="_self" href="javascript:searchhouse('510132','borough')"><span>新津</span></a>-->
<!--                <a target="_self" href="javascript:searchhouse('510181','borough')"><span>都江堰</span></a>-->
<!--                <a target="_self" href="javascript:searchhouse('510182','borough')"><span>彭州</span></a>-->
<!--                <a target="_self" href="javascript:searchhouse('510183','borough')"><span>邛崃</span></a>-->
<!--                <a target="_self" href="javascript:searchhouse('510184','borough')"><span>崇州</span></a>-->
                </div>
            </div>
            <?  ?>
            <div class="filter-item dashed">
                <label class="item-title">价格：</label>
                <div class="item-mod">
<!--                    --><?// foreach($this->config->price_option as $key=>$item) {
//                        $seleted = '';
//                        if($key==$price)$seleted = ' class="item-on"';
//                        echo "<a target=\"_self\" href=\"javascript:searchhouse('".$key."','price')\"><span".$seleted.">".$item."</span></a>";
//                    }
//                    ?>
                    <a rel="nofollow" id="pr0" class="" href="javascript:searchhouse('0','price')"><span>不限</span></a>
                    <a rel="nofollow" id="pr0-30" class="" href="javascript:searchhouse('0-30','price')">30万以下</a>
                    <a rel="nofollow" id="pr30-40" class="" href="javascript:searchhouse('30-40','price')">30-40万</a>
                    <a rel="nofollow" id="pr40-50" class="" href="javascript:searchhouse('40-50','price')">40-50万</a>
                    <a rel="nofollow" id="pr50-60" class="" href="javascript:searchhouse('50-60','price')">50-60万</a>
                    <a rel="nofollow" id="pr60-80" class="" href="javascript:searchhouse('60-80','price')">60-80万</a>
                    <a rel="nofollow" id="pr80-100" class="" href="javascript:searchhouse('80-100','price')">80-100万</a>
                    <a rel="nofollow" id="pr100-120" class="" href="javascript:searchhouse('100-120','price')">100-120万</a>
                    <a rel="nofollow" id="pr120-150" class="" href="javascript:searchhouse('120-150','price')">120-150万</a>
                    <a rel="nofollow" id="pr150-200" class="" href="javascript:searchhouse('150-200','price')">150-200万</a>
                    <a rel="nofollow" id="pr200-0" class="" href="javascript:searchhouse('200-0','price')">200万以上</a>
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
                <select data-width="100px" onchange="select('build_year')" class="build_year selectpicker form-control mbn" placeholder="年代">
                    <option value="0">年代</option>
                    <? foreach($this->config->year_option as $key=>$item){
                    $year = explode('-',$key);
                    if(count($year) != 1){
                        $seleted = '';
                        if ($key == $build_year && strlen($build_year)==strlen($key)) $seleted = "selected";
                        echo "<option " . $seleted . " value=" . $key . ">$item</option>";
                    }
                    }
                    ?>
                </select>

                <select data-width="100px" onchange="select('pm_type')" class="pm_type housetype selectpicker form-control mbn">
                    <option value="0">房屋类型</option>
                    <? foreach($this->config->pm_type_option as $key=>$item){
                        if($key > 0){
                            $seleted = '';
                            if($key == $pm_type)$seleted = " selected";
                            echo "<option ".$seleted." value=".$key.">$item</option>";
                        }
                    } ?>
                </select>
<!--                <select data-width="100px" onchange="select('struct')" class="struct housetype selectpicker form-control mbn">-->
<!--                    <option value="0">房屋结构</option>-->
<!--                    --><?// foreach($this->config->apa_type_option as $key=>$item){
//                        if($key > 0){
//                            $seleted = '';
//                            if($key == $struct)$seleted = " selected";
//                            echo "<option ".$seleted." value=".$key.">$item</option>";
//                        }
//                    } ?>
<!--                </select>-->

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

                <select data-width="100px" onchange="select('total_floor')" class="total_floor selectpicker form-control mbn">
                    <option id="to0" value="0">楼层</option>
                    <option id="to0-6" value="0-6">6层以下</option>
                    <option id="to6-12" value="6-12">6-12层</option>
                    <option id="to12-0" value="12-0">12层以上</option>
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

        		</div>
            </div>
            <? if($condition == 1){ ?>
                <div class="filter-item">
                    <label class="item-title">筛选条件：</label>
                    <div class="item-mod">
                        <?if($borough != 0){?><a href="javascript:closesearch('borough')"><span class="selecteds">区域：<?=$this->config->borough_option[$borough] ?><span style="left: 5px;top:2px" class="glyphicon glyphicon-remove"></span></span></a><?}?>
                        <?if($room != 0){?><a href="javascript:closesearch('room')"><span class="selecteds">户型：<?=$this->config->apa_room_option[$room] ?><span style="left: 5px;top:2px" class="glyphicon glyphicon-remove"></span></span></a><?}?>
                        <?if(strlen($price) != 1){?><a href="javascript:closesearch('price')"><span class="selecteds">价格：<? $prices=explode('-',$price);if($prices[0]==0){echo $prices[1]."万以下";}elseif($prices[1]==0){echo $prices[0]."万以上";}else{echo $price.'万';}  ?><span style="left: 5px;top:2px" class="glyphicon glyphicon-remove"></span></span></a><?}?>
                        <?if(strlen($area) != 1){?><a href="javascript:closesearch('area')"><span class="selecteds">面积：<? $areas=explode('-',$area);if($areas[0]==0){echo $areas[1]."平米以下";}elseif($areas[1]==0){echo $areas[0]."平米以上";}else{echo $area.'平米';}  ?><span style="left: 5px;top:2px" class="glyphicon glyphicon-remove"></span></span></a><?}?>

                        <?if($keyword != ''){?><a href="javascript:closesearch('search')"><span class="selecteds">关键字：<?=$keyword ?><span style="left: 5px;top:2px" class="glyphicon glyphicon-remove"></span></span></a><?}?>
                        <?if(strlen($build_year) != 1){?><a href="javascript:closesearch('build_year')"><span class="selecteds">年代：<?=$this->config->year_option[$build_year] ?><span style="left: 5px;top:2px" class="glyphicon glyphicon-remove"></span></span></a><?}?>
                        <?if(strlen($pm_type) != 1){?><a href="javascript:closesearch('pm_type')"><span class="selecteds">类型：<?=$this->config->pm_type_option[$pm_type] ?><span style="left: 5px;top:2px" class="glyphicon glyphicon-remove"></span></span></a><?}?>
<!--                        --><?//if($struct != 0){?><!--<a href="javascript:closesearch('struct')"><span class="selecteds">结构：--><?//=$this->config->apa_type_option[$struct] ?><!--<span style="left: 5px;top:2px" class="glyphicon glyphicon-remove"></span></span></a>--><?//}?>
                        <?if($toward != 0){?><a href="javascript:closesearch('toward')"><span class="selecteds">朝向：<?=$this->config->orientation_option[$toward] ?><span style="left: 5px;top:2px" class="glyphicon glyphicon-remove"></span></span></a><?}?>
                        <?if(strlen($total_floor) != 1){?><a href="javascript:closesearch('total_floor')"><span class="selecteds">楼层：<? $total_floors=explode('-',$total_floor);if($total_floors[0]==0){echo"6层以下";}elseif($total_floors[1]==0){echo"12层以上";}else{echo $total_floor.'层';}  ?><span style="left: 5px;top:2px" class="glyphicon glyphicon-remove"></span></span></a><?}?>
                        <?if($fitmen_type != 0){?><a href="javascript:closesearch('fitmen_type')"><span class="selecteds">装修：<?=$this->config->fitment_option[$fitmen_type] ?><span style="left: 5px;top:2px" class="glyphicon glyphicon-remove"></span></span></a><?}?>
                        <a href="/sale/">清空所有条件</a>
                    </div>
                </div>
            <? } ?>


        </div>
    </div>

    <div class="row">
        <div class="col-md-9" style="z-index:1">
            <!-- listing begin  -->
            <div class="main_list">
                <div class="topbar">
                    <div class="left">共有<span class="c-yellow"> <?=$total ?> </span>个符合要求的二手房</div>
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
                    <div style="position:relative;" id="m<?=$info['id'] ?>"  class="list-item clearfix" data-link="/sale/detail?id=<?=$info['id'] ?>">
                        <a class="col-md-3 img" href="/sale/detail?id=<?=$info['id'] ?>">
                            <img onerror="javascript:this.src='/images/pic_default.jpg'" alt="英伦" src="<?=$info['img_path'] ?>">
                        </a>
                        <div class="col-md-6">
                            <div class="tilte">
                                <h3 class="title"><a target="_blank" href="/sale/detail?id=<?=$info['id'] ?>" class="items-name esf_name">
                                        <? if(!empty($info['title'])){
                                            echo $info['title'];
                                        }else{
                                            $this->loadModel('sale');
                                            $title = $this->sale->title($info);
                                            echo $title['title'].$title['price'];
                                        }?>
                                </a></h3>
                            </div>
                            <div class="info">
                                <p class="where">
                                    <span><?=$info['shi'] ?>室<?=$info['ting'] ?>厅<?=$info['wei'] ?></span>
                                    <span><?=round($info['total_area']) ?>平米 </span>
                                    <span>
                                        <? if($info['total_floor'] < 10){
                                            echo "低层(共".$info['total_floor']."层)";
                                        }else if($info['total_floor'] > 20 ){
                                            echo "高层(共".$info['total_floor']."层)";
                                        }else{
                                            echo "中层(共".$info['total_floor']."层)";
                                        } ?>
                                    </span>
                                    <span><?=$info['build_year'] ?>年建造</span>
                                </p>
                                <p>
                                    <span class="mrm"><?=$info['reside'] ?></span>
                                    <span>[<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <? foreach($this->config->borough_option as $keyb=>$item){
                                            if($info['borough'] == $keyb){
                                                echo $item."&nbsp;";
                                            }
                                        } ?>
                                        <?=$info['address'] ?>]</span>
                                </p>
                                <p>推荐理由：<a id="reason">
                                    <? if($info['pm_type']!='' && $info['pm_type']!=0 && $info['pm_type']!=22310 && isset($this->config->pm_type_option[$info['pm_type']])){echo $this->config->pm_type_option[$info['pm_type']]."，";}
                                        if($info['fitmen_type']!=0 && $info['fitmen_type']!=21901 && isset($this->config->fitment_option[$info['fitmen_type']])){echo $this->config->fitment_option[$info['fitmen_type']]."，";}
                                    ?>
                                    配套设施健全，衣食住行方便
                                </a></p>
                            </div>


                        </div>

                        <div class="col-md-3 favor-pos">
                            <p class="price">总价<span><?=round($info['price'])==0?'待定':round($info['price']).'万'?></span></p>
                            <div class="discount-item">
                                <p class="favor-tag"><em title="高层全款优惠6％，按揭优惠5％" class="discount-txt"><?=$info['hits']==0?"0":$info['hits'] ?>人看过此房</em></p>
                                <div class="btn landlord" data-toggle="modal" onclick="landlord('<?=$info['id']?>','viewphone')" data-target="#viewphone">联系房东</div>
                                <div id="landlordphone" style="display:none" class="tel"></div>
                            </div>
                            <a class="collection_report report" style="float: right" onclick="landlord('<?=$info['id']?>','report')" data-toggle="modal" data-target="#report"><span class="glyphicon glyphicon-exclamation-sign"></span><span>举报</span></a>
                            <a class="collection_report collection" title="" onclick="collection('<?=$info['id']?>')" style="float: right"><span class="glyphicon glyphicon-star"></span><span>收藏&nbsp;&nbsp;</span></a>

                        </div>
                    </div>
                <? } ?>
<!--                <div style="position:relative" class="list-item clearfix" data-link="/sale/detail">-->
<!--                	<a class="col-md-3 img" href="#">-->
<!--    <img onerror="javascript:this.src='/ui/images/240x180m1.jpg'" alt="英伦" src="/theme/agency/img/240x180m1.jpg">-->
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
            	<a rel="nofollow" class="entrust-house" href="/sale/pub" target="_blank"><i></i><em>闪电卖房</em></a>
    		</div>

        	<div class="row list-advs">
        	<h1 class="h-5">房价走势</h1>
            <img src="/theme/agency/img/zs.png" class="col-md-12">
            </div>

            <div class="row list-advs">
        	<h1 class="h-5">购房问答</h1>
            <ul>
                <? foreach($interlocution as $key=>$info){ ?>
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
                    <img onerror="javascript:this.src='/images/pic_default.jpg'" width="170" height="125" src="<?=$info['img_path']?>">
                    <p class="g-name"><?=$info['title']==''?$info['reside']:$info['title']?></p>
                    <p class="g-price"><em><?=round($info['price'])==0?'</em>待定':round($info['price']).'</em>万'?></p>
                </a>
            </div>
        <? } ?>
<!--        <div class="col-md-2 guess-item clearfix">              -->
<!--            <a target="_blank" rel="nofollow" href="/sale/detail">-->
<!--                <img width="170" height="125" src="/theme/agency/img/133x100m.jpg">-->
<!--                <p class="g-name">温江-锦汇城</p>-->
<!--                <p class="g-price"><em>4250</em>元/㎡</p>-->
<!--            </a>-->
<!--        </div>-->

    </div>
</div>
<div id="prompt" style="display: none;box-shadow: 2px 4px 10px #000;z-index: 2;background-color: #fbfbfb;width:300px;height:180px;position: fixed;left: 38%;top:32%;text-align: center;font-size: 20px">
    <div style="padding-top: 65px">
        <span style="color:#fd6002" class="glyphicon glyphicon-star"></span> 收藏成功
    </div>
</div>
<!-- Modal -->
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
                    <input type="hidden" name="from" id="from" value="sale">
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="closes" id="close" aria-hidden="true">&times;</span></button>
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
                        <li><input class="checkbox" id="check1" name="check" type="checkbox" value="1"/>&nbsp;<label for="check1">房子不存在或已经卖了</label></li>
                        <li><input class="checkbox" id="check2" name="check" type="checkbox" value="2"/>&nbsp;<label for="check2">图文与实际不符</label></li>
                        <li><input class="checkbox" id="check3" name="check" type="checkbox" value="3"/>&nbsp;<label for="check3">价格与实际不符</label></li>
                        <li><input class="checkbox" id="check4" name="check" type="checkbox" value="4"/>&nbsp;<label for="check4">其他</label></li>
                    </ul>
                    <input id="type" name="type" type="hidden" value=""/>
                    <textarea id="textarea" name="textarea" placeholder="您可在此写下具体描述,请至少输入10个汉字"></textarea>
                    <span style="float:right;position:relative;top: -25px;left: -4px"><span id="textsum">0</span>/<span>100</span></span>
                    <input id="submit" disabled type="button" data-dismiss="" value="提交"/>
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
<script id="data_link" src="/theme/agency/js/agency.js"></script>

<!--BEGIN JAVASCRIPT-->
<script>
    $(document).ready(function(){
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

    function landlord(id,type){
        $("#houseid").val(id);
        event.stopPropagation();
        <? if(isset($_SESSION['userid'])){ ?>
        $("#"+type).modal("show");
        <? }else{ ?>
        $("#userlogin").modal("show");
        <? } ?>
    }

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
                    $('#integral_cue').html("房东："+result.linkman+"&nbsp;&nbsp;电话："+result.telphone);
                    $(".phoneyse").css("display","none");
                }
            },
            error:function(result){alert('no');}
        });
    });

    //关闭获取到的房东信息
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
        <? }else{ ?>
        event.stopPropagation();
        $("#userlogin").modal("show");
        <? } ?>
    }

    //举报
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

    $("#submit").click(function(){
        var aa = document.getElementsByName("check");
        var ss = "";
        for (var i = 0; i < aa.length; i++) {
            if (aa[i].checked) {
                ss += aa[i].value+",";
            }
        }
        if(ss==""){
            alert("请选择举报原因");
        }else{
            ss =  ss.substr(0, ss.length - 1);
            $.ajax({
                type:"post",
                url:"/sale/report",
                dataType:"JSON",
                data:{
                    houseid:$("#houseid").val(),
                    type:ss,
                    reason:$("#textarea").val(),
                    page_url:"sale_list"
                },
                success:function(result){
                    alert(result);
                    $("#report").modal('hide');
                    $("#textarea").val("");
                    $(".checkbox").prop("checked",false);
                },
                error:function(result){alert("数据错误,请修改后从新提交");}
            });
        }

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
    var Moretype = ['build_year','pm_type','toward','total_floor','fitmen_type'];
    var Moretypevalue = ['<?=$build_year?>','<?=$pm_type?>','<?=$toward?>','<?=$total_floor?>','<?=$fitmen_type?>'];
    var Moretypesum = [<?=count($this->config->year_option)?>,<?=count($this->config->property_option)?>,
                        <?=count($this->config->direction_option)?>,4,<?=count($this->config->fitmen_type_option)?>];
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
