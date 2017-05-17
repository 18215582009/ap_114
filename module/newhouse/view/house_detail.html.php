<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title><?=$info['name']?>_新房列表_<?=$this->config->siteName?></title>
<!-- Bootstrap Core CSS -->
<link href="/js/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="/css/mtek_font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="/css/fonts/font-lineicons.css" rel="stylesheet" type="text/css">

<!-- Theme CSS -->
<link href="/theme/agency/css/agency.css" rel="stylesheet">
<link rel="stylesheet" href="/js/vendor/vlightbox/vlb_files1/vlightbox1.css" type="text/css" />
<link rel="stylesheet" href="/js/vendor/vlightbox/vlb_files1/visuallightbox.css" type="text/css" media="screen" />
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>



<![endif]-->
</head>
<style>
i,em{font-style:normal}
h2,h3 {
    font-weight: normal;
}

.lp-tag-status {
    background:url("/theme/agency/img/viewindex-icons-16.png") no-repeat scroll 0 0;
    color: #fff;
    float: left;
    font-size: 14px;
    height: 25px;
    line-height: 25px;
    margin: 7px 0 0 7px;
    overflow: hidden;
    padding-left: 6px;
    text-align: center;
    width: 48px;
}
.lp-tag-status-qi, .lp-tag-status-xian {
    background-position: 0 -275px;
    width: 76px;
}

.tmark{height:40px;line-height:40px;}
.tmark span{margin-right:20px;}
.tmark h2{font-size:28px;float: left;line-height: 42px; margin:0 10px 0 0;}
.mmark{margin-top:10px; height:18px;color:#666666;padding:0;}
.tel .fa-phone{color:#00ae66; width:1rem}
.tel span{color:#f60;}

.navbar-self {
	border-radius: 0;
	background-color: #fff;
	/*background-image: linear-gradient(to bottom, #ffffff, #f2f2f2);*/
	background-repeat: repeat-x;
	border: 1px solid #ddd;
	box-shadow: 0 1px 4px rgba(0, 0, 0, 0.067);
	min-height: 40px;
	padding:3px 20px;
	margin-top:10px;
}
.navbar-self .nav > li > a {
	color: #333;
	font-size: 16px;
	font-weight: 400;
	letter-spacing: 2px;
    padding: 10px 10px 5px;
    text-transform: uppercase;
}
.navbar-self .nav li a:focus {
    color: #f60 ;font-weight:bold;
}
.navbar .divider-vertical {
	border-left: 1px solid #f2f2f2;
	border-right: 1px solid #ffffff;
	height: 40px;
	margin: 0 9px;
}

/* thumbs img */
#thumbs { overflow: hidden; padding-top: 10px;}
#thumbs img, #largeImage { /*border: 1px solid gray; padding: 4px;*/ background-color: white; cursor: pointer;}
#largeImage{ width:100%; height:290px}
#thumbs .picborder{float:left;border: 1px solid gray; margin-right:4px;}
#thumbs .picborder img {float:left;width:85px;height:58px; }
#thumbs .active{border:2px solid #74982E;padding:0;}
#thumbs .active img{width:82px;height:56px; }
#thumbs .rongs{ float:left; position:relative}
#thumbs .active:before {
    border-bottom: 7px solid rgba(0, 0, 0, 0.2);
    border-left: 7px solid rgba(0, 0, 0, 0);
    border-right: 7px solid rgba(0, 0, 0, 0);
    content: "";
    display: inline-block;
    left: 37px;
    position: absolute;
    top: -7px;
}
#thumbs .active:after {
    border-bottom: 6px solid #74982E;
    border-left: 6px solid rgba(0, 0, 0, 0);
    border-right: 6px solid rgba(0, 0, 0, 0);
    content: "";
    display: inline-block;
    left: 38px;
    position: absolute;
    top: -6px;
}

/* house info */
.house_info{font-size:16px;color:#000}
.lp-icons {
    background-image: url("/theme/agency/img/viewindex-icons-16.png");
    background-repeat: no-repeat;
    display: inline-block;
    font-size: 0;
    overflow: hidden;
    vertical-align: middle;
}

.house_info .house_price{line-height:30px;}
.house_info .house_price .hprice{font-size:28px;color:#E51400;margin: 0 5px;}
.house_info .house_price a{margin-left: 20px;padding-left: 20px;font-size: 14px;}
.house_info .house_price .sale_note{background: url('/theme/agency/img/sale_note.png') no-repeat left center;cursor: pointer;}
.house_info .house_price .mor_cal{background: url('/theme/agency/img/mor_cal.png') no-repeat left center;}
.house_info label{color: #999;font-weight:normal;}

.house_openinfo{line-height:36px;width:100%;float:left; margin-top:2px;}
.house_openinfo h3 {font-size:18px;height: 20px;line-height: 20px;margin-top:15px;color:#f60}
.house_openinfo .link_map{margin-left: 16px;background: url('/theme/agency/img/map_icon.png') no-repeat left center;padding-left: 16px;cursor:pointer;}
.house_openinfo  .nowfund{color:#CA1B1B; font-weight:bold}
.house_openinfo .showlink{padding-left:10px;}
.house_openinfo .showlink:hover{color:#f60;text-decoration:none;cursor:pointer}
.house_openinfo .showlink .lp-icons-open{background-position:-210px -153px;height:15px;margin-right:1px;vertical-align:-2px;width:17px;}
.house_openinfo .showlink:hover .lp-icons-open {background-position: -236px -153px;}
.house_openinfo .public-notice {color: #5cb85c;font-size: 16px;padding: 11px 0 0 3px;}

.house_tel{width:100%; margin:6px 0;}
.house_tel .house_tel_num{color:#62ab00;background:#f7fded;border:1px solid #5cb85c;height:60px;line-height:60px;padding:0 20px 0 0;font-size: 32px;letter-spacing: 0.4mm;width:100%;float:left}
.house_tel .house_tel_num .btn{margin-left:50px;}
.house_tel .lp-icons-tel {background-position: -210px -310px;float: left;height: 35px;margin: 12px 13px 0 17px;width: 25px;}

/* project detail */
.proj_info{border:1px solid #ddd;padding:20px; margin-top:20px; height:auto;background:#fff}
.proj_info h3 {font-size:16px;height: 20px;line-height: 20px;margin-top:15px;color:#888; font-weight:bold;}
.proj_tab{border-bottom:2px solid #888A89; padding:1px 20px 1px 0px; height:32px;}
.proj_tab li{float:left;padding:0 20px;color:#f60;font-size: 16px;font-weight: bold; line-height:27px; cursor:pointer; list-style:none;}
.proj_tab .active{border-bottom:4px solid #f60;}
#tab1,#tab3{float:left;line-height:200%;text-indent:2em; margin-top:20px;}
#tab2{float:left;margin-top: 20px;line-height: 200%}
#tab2 p{line-height:250%}
.tablist{margin-top:10px;}
.tablist li{float: left;overflow: hidden;padding: 0 10px;}
.tablist td{ text-indent:0.1em}
.tablist table tr{height:32px; margin-top:5px}
.map{height:300px;border: solid 1px #D1DCB2; margin-top:10px;}
.ahezhaoc{width: 622px;margin-top: 50px}
.atitle{font-size: 27px;font-weight: bold;color: #63ab02;padding: 10px 20px 0 20px}
.atoubu{border: 0}
.atoubu hr{width: 550px;border: 1px solid #63ab02;font-weight: bold;margin-top: 10px}
.aneirong{border: 0;margin-top: -10px}
.aneirong .abitian{color: #ff0000}
.atoubu .ayuyue{font-size: 19px;padding-left: 20px; }
.atoubu img{padding-left: 20px;width: 573px;}
.ainput{width: 222px;height: 42px}
.aint{font-size: 16px}
.aneirong p{ padding-left: 60px;margin-top: -10px;}
.adxyanzheng{height: 42px;border: 0;border-radius: 3px;background-color: #eeeeee  }
.alijiyy{height: 42px;width: 120px;background-color: #81bb32;color: #fff;font-size: 18px;border: 0;margin-left: 108px}
.atpyanzheng{height: 41px;width: 130px;margin-top: -3px}
.atishi{height: 21px;font-size:13px;color:red;padding-left: 108px}
.aguanbi{font-size: 30px}
.gzhezhao{margin-top: 10px}
.atimg{width: 552px;margin-left: -13px}
.xinfangname{padding: 15px 20px;font-size:25px}
.dingx{font-size: 21px;margin-left: 10px}
.ding{color: #979797  }
.sxuan{margin-left: -50px}
.sfuxuan{display: inline-block;width: 550px;height: 70px;background-color: #ececec;margin: 0 0 25px 0}
.sfuxuan span{margin-left: 20px;font-size: 16px;line-height: 70px}
.sfuxuan input{width: 14px;height: 14px}
.ading{margin-left: -10px}
.tijiaoimg{width: 50px;height: 50px;}
.tjnei{margin-top:40px;}
.tijiao .tjbtn{margin-top:60px;background-color: #81bb32;color: #fff;padding: 4px 8px;border:0;font-size: 18px;margin-left: 240px;display: none}
.tijiao{width: 513px;height: 250px;margin-left: 30px;text-align: center;font-size: 20px;display: none}
.danwei{width: 45px;height: 35px;border:1px solid #a5a5a5;background-color: #fff;border-left: 0};
.gtjnei{margin-top:130px;}
.errors{font-size: 13px}
.abiaoti{margin-left: 20px;width: 553px;height: 93px;background-color: #ececec;font-size: 20px;}
.abiaoti .index-1 {
    background-image: url(/theme/agency/img/viewindex-icons-16.png);
    background-position: -150px -310px;
    width: 40px;
    height: 40px;
}
.index-1{float: left;margin: 28px 0 28px 25px}
.abiaoti b,.abiaoti span{margin-left: 15px;line-height: 93px;  }
.abiaoti span{font-size: 17px;color: #808080;}
.aprompt{font-size: 20px;float: left;margin-left: -65px}
.loupanimg1 a{float: left;margin-left: 45px;margin-top: 10px}
.huxingimg1 a{float: left;margin-left: 45px;margin-top: 10px}
.daispan{width: 42px;height: 42px;text-align: center;line-height: 42px;border:1px solid #989898;top:2px;border-right: 0}
.daiint{margin-left: 80px}
.dtishi{height: 21px;font-size:13px;color:red;padding-left: 1px}
.kong{height: 15px}
.daisms{border: 1px solid #989898;background-color: #dbdbdb;border-radius: 0%;height: 42px}
#dphone{width: 355px}
.daisheng{width: 357px;margin-left: 80px}
.daicheck{font-size: 14px;}
.daicheck input{width: 14px;height: 14px}
.daibuzhou{margin-left: 40px}
.daikuants{margin-left: -27px}
.daibuzhou p{text-align: center;line-height: 63px;font-size: 17px;}
.loan2int{width: 280px;height: 35px;  }
.lint{font-size: 17px}
.lkong{display: inline-block;width: 10px;  }
.lkong2{display: inline-block;width: 30px;  }
.loan2 p{margin-left: 70px;  }
.ltishi{height: 20px;color:#ff0000;display: inline-block;margin-left: 80px;font-size: 14px}
.loan2 ul{margin-top: -15px;  }
.loan2 li{padding-top: 15px;  }
.loan{width: 160px;height: 35px;margin-left: 75px;margin-top: 20px;border: 0;background-color: rgb(255, 69, 0);color: #fff;}
.fade .ainput{padding-left: 5px;}
.dongtai:hover{background-color: #eaeaea;cursor:pointer;  }
.dongtai{width:550px;margin-left: 20px;}
.dtime{float:left;width: 100px;text-align: center;}
.dtime1{color: #00c309;font-size:25px;}
.dtime2{color:#9f9f9f;font-size:20px;}
.dcontent{margin-left: 20px;}
.dcontent1{font-size:21px;}
.dcontent2{width:500px;margin-left: 25px;}
.jiaotong{margin-left: 45px;margin-top: -32px;}
.zoubian{margin-left: 50px;margin-top: -45px;}
.periphery{padding:4px;display: inline-block;margin-left: 20px;}
.traffic{display: inline-block;margin-left: 10px;}
.dongtai_a{overflow:hidden;text-overflow:ellipsis;white-space:nowrap;width:650px}
.check{color: red;font-size: 14px;}

.uinput{width: 388px;height: 44px;padding-left: 40px;}
.uint{margin: 10px 40px}
.ulogin{width: 388px;height: 34px;background-color: #5cb85c;color:#fff;border:0;}
.ulogin:hover{background-color: #448d44;}
.forget_password{margin-left: 230px;color:#60ab00;}
.register{position:relative;float: right;left: -40px;top: -29px;}
.register span{color:#a5a5a5;}
.close{font-size: 30px;}
.lhead{border-bottom:2px solid #60ab00;height: 70px};
#landlord{width: 500px;border-radius: 0;margin-left: 70px;margin-top: 140px;}
#userlogin>.modal-dialog{width: 500px;border-radius: 0;margin-left: 470px;margin-top: 140px;}
.licon{float: left;font-size: 17px;position:relative;top:32px;left:13px;color: #828282;}
.guess-like {
    border: 1px solid #ddd;
    font-size: 14px;
    margin: 20px 0;
    padding-bottom:15px;
}
</style>
<body>
<!-- Navigation -->
<?php include '../../index/view/header.html.php';?>

<!-- Search -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
           <ul class="breadcrumb">
               <li><a href="/">FC114乐山站</a></li>
<!--               <li><a href="/">--><?//=$this->config->shortName?><!--</a></li>-->
               <li><a href="/newhouse">新房列表</a></li>
               <li class="active"><?=$info['name']?></li>
           </ul>
           <input type="hidden" id="layout_id" name="layout_id" value="{$info.id}" />
           <input type="hidden" id="project_name" name="project_name" value="{$info.project_name}" />
       </div>
        <div class="col-md-6 search-box">
            <form class="search-form right" method="get" action="/newhouse/" onsubmit="return search()">
                <input type="text" placeholder="请输入楼盘名称、地址或房源特征" class="input-search" name="keyword" id="keyword" maxlength="100" value="">
                <input type="submit" class="btn-search" value="搜索">
            </form>
        </div>
    </div>
    
    <div class="row">
    	<div class="col-md-7">
        	<div class="tmark">
                <h2><?=$info['name']?></h2>
                <i class="lp-tag-status lp-tag-status-qi">期房<?=$info['status']==''?'待定':$this->config->status_option[$info['status']]?></i>
                <!--i class="label label-sm label-success">在售</i>
                <i class="label label-sm label-warning">在售</i>
                <span>浏览<font color="#FF0000"><strong>442</strong></font>次</span-->
            </div>
            <p class="mmark"><?=$info['slogan']?></p>
        </div>
        <div class="col-md-5 tel">
            <div class="pull-right" style="margin-top:50px;">
           <i class="fa fa-phone"></i> 免费咨询：<span><?=$info['telephone']?></span><!--转 <span>38602</span>-->
            </div>
        </div>
    </div>
    
    <div class="row">
       <div class="col-md-12">
       <!-- house-guid start -->
       <div class="navbar navbar-default navbar-self">
        <ul class="nav navbar-nav">
          <li><a href="#" onclick="goToLabel('propertyBox')">楼盘信息</a></li>
          <li class="divider-vertical"></li>
          <li><a id="loupan" href="#" onclick="goToLabel('detailBox')">楼盘详细</a></li>
          <li class="divider-vertical"></li>
          <li><a id="zhoubian" href="#" onclick="goToLabel('detailBox')">周边配套</a></li>
          <li class="divider-vertical"></li>
          <li><a id="loupanimg" href="#" onclick="goToLabel('picBox')">楼盘图片</a></li>
          <li class="divider-vertical"></li>
          <li><a id="huxingtu" href="#" onclick="goToLabel('picBox')">户型图</a></li>
          <li class="divider-vertical"></li>
          <li><a id="" href="#" onclick="goToLabel('mapBox')">地图交通</a></li>
          <li class="divider-vertical"></li>
        </ul>
       </div>
       <!-- house-guid end -->
       </div>
    </div>
    
    <!-- house info start -->
    <div class="row">
        <div class="col-md-5">
            <div id="gallery" style="background:#fff;border:1px">
                <img id="largeImage" class="img-responsive" src="<?=$info['gallery'][0]['url']?>"  onerror="javascript:this.src='/images/pic_default.jpg'"/>
                <div id="thumbs">
                    <? foreach($info['gallery'] as $key=>$gal){ ?>
                        <? if($key < 5){ ?>
                            <div class="rongs">
                                <? if($key == 0){ ?>
                                    <div class="picborder active"><img src="<?=$gal['url']?>" alt="<?=$gal['url']?>" /></div>
                                <? }else{ ?>
                                    <div class="picborder"><img src="<?=$gal['url']?>" alt="<?=$gal['url']?>" /></div>
                                <? } ?>
                            </div>
                        <? } ?>
                    <? } ?>
<!--                    <div class="rongs">-->
<!--                        <div class="picborder"><img src="/theme/agency/img/13_m.png" alt="" /></div>-->
<!--                    </div>-->
<!--                    <div class="rongs">-->
<!--                        <div class="picborder" style="margin-left:1px;"><img src="/theme/agency/img/12_m.png" alt="" /></div>-->
<!--                    </div>-->
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="house_info clearfix" style="position:relative">
                <div class="house_price">
                    <label>参考价格：</label><span class="hprice"><?=$info['red_house_price_average']==''?'待定':$info['red_house_price_average']."</span>元/m²"?>
                    <a id="the_price" class="sale_note not_logged" data-toggle="modal" data-target="#subscribe">降价通知我</a>
                    <a class="mor_cal not_logged" id="aloan " href="" data-toggle="modal" data-target="#loan">我要贷款</a>
                </div>
                <div class="house_openinfo clearfix">
                    <label>物业类型：</label>
                    <?
                    if(!empty($info['pm_type'])){
                        $_pm_type = explode(',',$info['pm_type']);
                        $cnt = count($_pm_type);
                        foreach($_pm_type as $k=>$_v){
                            if(!empty($_v)){
                                echo $this->config->pm_type_option[$_v]."&nbsp;&nbsp;";
//                                if($_v == "22308"){echo $this->config->pm_type_option[$_v]."<span style='font-size:14px'>(".$info['red_house_price_average']."元/m²)</span>"."&nbsp;&nbsp;";}//住宅
//                                if($_v == "22301"){echo $this->config->pm_type_option[$_v]."<span style='font-size:14px'>(".$info['red_villa_price_average']."元/m²)</span>"."&nbsp;&nbsp;";}//别墅
//                                if($_v == "22309"){echo $this->config->pm_type_option[$_v]."<span style='font-size:14px'>(".$info['red_business_price_average']."元/m²)</span>"."&nbsp;&nbsp;";}//商住
//                                if($_v == "22304"){echo $this->config->pm_type_option[$_v]."<span style='font-size:14px'>(".$info['red_house_price_average']."元/m²)</span>"."&nbsp;&nbsp;";}//商铺
//                                if($_v == "22305"){echo $this->config->pm_type_option[$_v]."<span style='font-size:14px'>(".$info['red_office_price_average']."元/m²)</span>"."&nbsp;&nbsp;";}//写字楼
//                                if($_v == "22311"){echo $this->config->pm_type_option[$_v]."<span style='font-size:14px'>(".$info['red_house_price_average']."元/m²)</span>"."&nbsp;&nbsp;";}//酒店式公寓
                            }
                        }
                    }
                    ?>                </div>
                <div class="house_openinfo clearfix">
                	<label>楼盘地址：</label>
                	<span title="<?=$info['address']?>"><?=$info['address']==''?'暂未公布':$info['address']?></span><a onclick="goToLabel('mapBox')" class="link_map">查看地图</a>
                </div>
                
                <div class="house_tel clearfix">
                    <div class="house_tel_num" id="house_tel_num">
                    <i class="lp-icons lp-icons-tel"></i>
                    <?=$info['telephone']?>
                    <a href="javascript:changeimg()"><button class="btn btn-success not_logged" id="abooking" type="button" data-toggle="modal" data-target="#booking">预约看房</button></a>
                    </div>
                </div>
                
                <div class="house_openinfo row">
                	<div class="col-md-5">
                        <label>最新开盘：</label><span><?=date('Y-m-d',$OtherInfo['open_date'])?></span><br>
                        <?
                        $paramStr = "";
                        switch($pm_type){
                            case '22301'://别墅
                                $paramStr ='villa';
                                break;
                            case '22304'://商业
                                $paramStr .='<label>周边人群：</label><span>上班族</span><br>';
                                $paramStr .='<label>产权年限：</label><span>40年</span>';
                                break;
                            case '22305'://写字楼
                                $paramStr .='<label>建筑面积：</label><span>78228平方米</span><br>';
                                $paramStr .='<label>产权年限：</label><span>40年</span>';
                                break;
                            default:
                                $paramStr .='<label>建筑形态：</label><span>'.($info['structure']==''?"未知":$this->config->structure_option[$info['structure']]).'</span><br>';
                                $paramStr .='<label>产权年限：</label><span>'.($OtherInfo['use_age']==''?'未知':$OtherInfo['use_age'].'年').'</span>';
                                break;
                        }
                        echo $paramStr;

                        ?>
                    </div>
                    <div class="col-md-7">
                        <label>交房时间：</label><span><?=date('Y-m-d',$OtherInfo['live_date'])?></span>&nbsp;&nbsp;
                        <a class="showlink not_logged" id="opening_notice" data-toggle="modal" data-target="#subscribe"><i class="lp-icons lp-icons-open"></i>开盘通知我</a><br>
                        <!--div class="house_openinfo">户型区间：<span>{$info.area_min}-{$info.area_max}平米</span></div-->
                        <?
                        $paramStr = "";
                        switch($pm_type){
                            case '22301'://别墅
                                $paramStr ='villa';
                                break;
                            case '22304'://商业
                                $paramStr .='<label>标准层面积：</label><span>2000平方米</span><br>';
                                $paramStr .='<label>产权年限：</label><span>40年</span>';
                                break;
                            case '22305'://写字楼
                                $paramStr .='<label>建筑面积：</label><span>78228平方米</span><br>';
                                $paramStr .='<label>电梯配置：</label><span>客梯10部</span>';
                                break;
                            default:
                                $paramStr .='<label>规划户数：</label><span>'.($info['count_family']==0?'未知':($info['count_family']=='未知'?'':$info['count_family'])).'</span><br>';
                                $paramStr .='<label>装修状况：</label><span>'.($info['fitmen_type']==''?"未知":$this->config->fitmen_type_option[$info['fitmen_type']]).'</span>';
                                break;
                        }
                        echo $paramStr;
                        ?>
                    </div>
                </div>
                
                <div class="house_openinfo dongtai_a">
                    <i class="label label-sm label-success"><? if(empty($info['dynamic'][0]['type'])){echo "动态";}else{echo $this->config->dynamic_type_option[$info['dynamic'][0]['type']];}?></i>
                    <span"><? if(empty($info['dynamic'][0]['content'])){echo "暂无动态";}else{echo $info['dynamic'][0]['content'];}?>...</span>
                    <p class="public-notice ">最新政策、价格详情，敬请电话咨询售楼处</p>
                </div>
            </div>
        </div>
    </div>
    <!-- house info end -->
    <style>
.act-item {
    background: #fff none repeat scroll 0 0;
    border: 1px solid #ddd;
    height: auto;
}
.act-title span {
    color: #999;
    font-size: 14px;
	font-weight: normal;
}
.act-item .act-title {
    cursor: pointer;
    font-size: 20px;
    line-height: 28px;
    margin: -3px 0 4px;
    overflow: hidden;
    word-break: break-all;
    word-wrap: break-word;
}
.act-item .lp-icons-kan {
    background-position: -58px 0;
}
.act-item .lp-icons-tuan, .act-item .lp-icons-kan {
    height: 49px;
    overflow: hidden;
    text-indent: -999999px;
    width: 49px;
}
.act-item .lp-icons-people {
    background-position: -130px -120px;
}
.act-item .lp-icons-people {
    height: 16px;
    margin-right: 8px;
    vertical-align: -2px;
    width: 16px;
}

.act-item .act-join {
    font-size: 16px;
    margin-top: 5px;
}
.act-item .act-join .join{margin-right:15px;}
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="act-item mtl pdb clearfix">
                <i class="lp-icons lp-icons-kan fl">看房</i>
                <div class="act-item-info col-md-8">
                    <h4 class="act-title">
                        <a rel="nofollow" target="_blank" soj="from_lp_detail" title="组团看房" href="#">组团看房</a>
                        <span>成团后即可享受免费看房服务</span>
                    </h4>
                    <div class="act-date">
                        <div id="group-kft-count" class="act-time fl">距离本场报名结束还剩：<span id="hideD"><span id="day"></span>天</span> <span id="hideH"><span id="hour"></span>时</span>
                            <span id="hideM"> <span id="minute"></span>分</span> <span id="hideS"><span id="second"></span>秒</span></div>
                    </div>
                </div>
                <div class="act-join col-md-3">
                	<span limit="20" class="join"><i class="lp-icons lp-icons-people"></i>还差 <em id="zhutuansum"><?=20-$info['groupsum'][0]['sum']?></em>人成团</span>
                    <a href="javascript:changeimg()"><button class="btn btn-success not_logged" data-soj="zc_lpdetail"  id="agroup" type="button" data-toggle="modal" data-target="#group">组团报名</button></a>
                </div>
                
           </div> 
        </div>
    </div>
    <style>
	.title-nav{margin: 30px 0 0;}
	.title-nav span{line-height:24px;}
    .title-nav .title{float: left;font-size: 24px;line-height: 24px;margin:0;}
	.title-nav .more{color: #999;float: right;font-size: 14px;line-height: 20px;margin-top: 3px;padding-right:25px;}
	.sub-list li{float:left;padding:5px 10px;}
	.sub-list li input {
    height: 16px;
    vertical-align: text-bottom;
    width: 16px;}
    </style>
    <!-- house dynamic and RSS-->
	<div class="row">
    	<div class="col-md-8">
        	<div class="title-nav clearfix">
                <h3 class="title">动态资讯</h3>
                <a class="more" target="_blank" href=""  data-toggle="modal" data-target="#dynamic">查看全部&gt;&gt;</a>
            </div>
            <div class="act-item mtm pdb clearfix">
            	<ul>
                    <? if(empty($info['dynamic'])){ ?>
                        暂无动态...
                        <br/><br/><br/><br/><br/>
                    <? }else{ ?>
                        <li>
                            <a target="_blank" class="left" href="" data-toggle="modal" data-target="#dynamic">[<?=$this->config->dynamic_type_option[$info['dynamic'][0]['type']]?>]
                                <?=$info['dynamic'][0]['title']?></a>
                            <span class="right gray"><?=date("Y-m-d",$info['dynamic'][0]['start_date'])?></span>
                            <p class="left mtm dark"><?=$info['dynamic'][0]['content']?></p>
                        </li>
                        <? if(count($info['dynamic']) >=2){ ?>
                            <li>
                                <a class="left" target="_blank" href="" data-toggle="modal" data-target="#dynamic">[<?=$this->config->dynamic_type_option[$info['dynamic'][0]['type']]?>] <?=$info['dynamic'][1]['title']?></a>
                                <span class="right gray"><?=date("Y-m-d",$info['dynamic'][1]['start_date'])?></span>
                            </li>
                        <? } ?>
                    <? } ?>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
        	<div class="title-nav clearfix">
                <h3 class="title">订阅信息</h3>
                <span class="gray mlm">(我们将为您保密个人信息)</span>
            </div>
            <div class="act-item mtm pdb clearfix">
            	<ul class="sub-list left">
                    <li class="static"><input id="bjtz" type="checkbox" name="notice" class="notice" value="1"><label for="bjtz">变价通知</label></li>
                    <li class="static"><input id="yhtz" type="checkbox" name="notice" class="notice" value="2"><label for="yhtz">优惠通知</label></li>
                    <li><input id="kptz" type="checkbox" name="notice" class="notice" value="3"><label>开盘通知</label for="kptz"></li>
                    <li class="static"><input id="zxdt" type="checkbox" checked name="notice" class="notice" value="4"><label for="zxdt">最新动态</label></li>
                    <li><input id="kfttz" type="checkbox" name="notice" class="notice" value="5"><label for="kfttz">看房团通知</label></li><!--subscribe-->
                </ul>
                <div class="cell-info left pdn navbar-form navbar-left">
                    <input id="dyphone" type="text"  data-subscribe="open" maxlength="11" placeholder="请输入您的手机号码" class="form-control">
                    <a id="dingyue" class="btn btn-success not_logged" data-toggle="modal" data-target="">立即订阅</a>
                    <span id="error" style="display:none;" class="com-msg">
                        <i class="lp-icons error-icon"></i><span class="errors" id="errors"></span>
                    </span>
                </div>
            </div>
        </div>
    </div>   
    
    <!-- house second start -->
    <div class="row" id="detailBox">
        <div class="col-md-12">
            <div class="proj_info clearfix">
                <div class="proj_tab">
                    <ul>
                        <li id="property" title="tab1" class="active">楼盘详情</li>
                        <li id="peripheral" title="tab2" class="">周边配套</li>
                    </ul>
                </div>
                <div class="proj_tabbox">
                    <div class="loupan1" id="tab1" style="text-indent:0;margin-top:0">
                        <div class="tablist">
                        	<h3><i class="fa fa-tags"></i> 基本信息</h3>
                            <ul class="clearfix">
                                <li class="col-md-4">
                                   <label>物业类别：</label>
                                   <span>
                                       <?
                                       if(!empty($info['pm_type'])){
                                           $_pm_type = explode(',',$info['pm_type']);
                                           $cnt = count($_pm_type);
                                           foreach($_pm_type as $k=>$_v){
                                               if(!empty($_v)){echo $this->config->pm_type_option[$_v]."&nbsp;";}
                                           }
                                       }
                                       ?>
                                   </span>
                                </li>
                                <li class="col-md-4">
                                   <label>项目特色：</label>
                                   <span><?=$OtherInfo['slogan']==''?'未知':$OtherInfo['slogan']?></span>
                                </li>
                                <li class="col-md-4">
                                   <label>建筑类别：</label>
                                   <span>
                                       <? foreach($this->config->build_type_option as $key=>$item){
                                            if($key == $info['structure']){
                                                echo $item;
                                            }
                                        } ?>
                                   </span>
                                </li>
                                <li class="col-md-4">
                                   <label>装修状况：</label>
                                   <span><?=$info['fitmen_type']==''?'未知':$this->config->fitmen_type_option[$info['fitmen_type']]?></span>
                                </li>
                                <li class="col-md-4">
                                   <label>工程进度：</label>
                                   <span><?=$info['plan']==''?'未知':$this->config->plan_option[$info['plan']]?></span>
                                </li>
                                <li class="col-md-4">
                                   <label>产权年限：</label>
                                   <span><?=$OtherInfo['use_age']==''?'未知':$OtherInfo['use_age'].'年'?></span>
                                </li>
                                <li class="col-md-4">
                                   <label>环线位置：</label>
                                   <span><?=$info['circle']==''?'未知':$this->config->circle_option[$info['circle']]?></span>
                                </li>
                                <li class="col-md-4">
                                   <label>电梯配置：</label>
                                   <span><?=$OtherInfo['elevator']==''?'未知':$OtherInfo['elevator']?></span>
                                </li>
                                <li class="col-md-4">
                                   <label>标准层面积：</label>
                                   <span><?=$info['tier_area']==''?'未知':$info['tier_area']?></span>
                                </li>
                                <li class="col-md-4">
                                   <label>商业面积：</label>
                                   <span><?=$info['business_area']==''?'未知':$info['business_area']?></span>
                                </li>
                                <li class="col-md-4">
                                   <label>办公面积：</label>
                                   <span><?=$info['office_area']==''?'未知':$info['office_area']?></span>
                                </li>
                                <li class="col-md-4">
                                   <label>开 发 商：</label>
                                   <span><?=$info['developer']==''?'未知':$info['developer']?></span>
                                </li>
                                <li class="col-md-4">
                                   <label>楼盘地址：</label>
                                   <span><?=$info['address']==''?'未知':$info['address']?></span>
                                </li>
                            </ul>
                            <h3><i class="fa fa-tags"></i> 销售信息</h3>
                            <ul class="clearfix">
                                <li class="col-md-4">
                                   <label>销售状态：</label>
                                   <span><? if($info['status'] == 1){echo "在售";}else if($info['status'] == 2){echo "未开盘";}else{echo "售完";} ?></span>
                                </li>
                                <li class="col-md-4">
                                   <label>楼盘优惠：</label>
                                   <span><?=$info['dynamic'][0]['type']==2?$info['dynamic'][0]['title']:'暂无优惠' ?></span>
                                </li>
                                <li class="col-md-4">
                                   <label>开盘时间：</label>
                                   <span><?=date('Y-m-d',$OtherInfo['open_date']); ?><a class="item-a" target="_blank" href="#">[开盘时间详情]</a></span>
                                </li>
                                <li class="col-md-4">
                                   <label>交房时间：</label>
                                   <span><?=date('Y-m-d',$info['live_date'])?></span>
                                </li>
                                <li class="col-md-4">
                                   <label>售楼地址：</label>
                                   <span><?=$info['address']==''?'未知':$info['address']?></span>
                                </li>
                                <li class="col-md-4">
                                   <label>售楼电话：</label>
                                   <span><?=$info['telephone']==''?'未知':$info['telephone']?> </span>
                                </li>
                                <li class="col-md-4">
                                   <label>在售户型：</label>
                                   <span>
                                       <? if(count($info['household']) != 0){foreach($info['household'] as $house){ ?>
                                           <a href="#"><?=$house['shi']?>室(<?=$house['total']?>)</a>
                                       <? }}else{echo "暂无户型";} ?>
<!--                                   <a href="#">三居(3)</a>-->
<!--                                   <a href="#">四居(12)</a>-->
                                   </span>
                                </li>
                                <li class="col-md-4">
                                   <label>预售许可证：</label>
                                   <span>暂无资料</span>
                                </li>
                            </ul>
                            <h3><i class="fa fa-tags"></i> 小区规划</h3>
                            <ul class="clearfix">
                                <li class="col-md-4">
                                   <label>占地面积：</label>
                                   <span><?=$info['total_occupy']==''?'未知':$info['total_occupy']?></span>
                                </li>
                                <li class="col-md-4">
                                   <label>建筑面积：</label>
                                   <span><?=$info['total_area']==''?'未知':$info['total_area']?></span>
                                </li>
                                <li class="col-md-4">
                                   <label>容积率：</label>
                                   <span><?=$info['cubage']==''?'未知':$info['cubage']?></span>
                                </li>
                                <li class="col-md-4">
                                   <label>绿化率：</label>
                                   <span><?=$info['greenbelt']==''?'未知':$info['greenbelt']?></span>
                                </li>
                                <li class="col-md-4">
                                   <label>停车位：</label>
                                   <span><?=$info['parking']==''?'未知':$info['parking']?></span>
                                </li>
                                <li class="col-md-4">
                                   <label>楼栋总数：</label>
                                   <span><?=$OtherInfo['total_dong']==''?'未知':$OtherInfo['total_dong']?></span>
                                </li>
                                <li class="col-md-4">
                                   <label>总户数：</label>
                                   <span><?=$info['count_family']==''?'未知':$info['count_family']?></span>
                                </li>
                                <li class="col-md-4">
                                   <label>物业公司：</label>
                                   <span><?=$info['manage_company']==''?'未知':$info['manage_company']?></span>
                                </li>
                                <li class="col-md-4">
                                   <label>物业费：</label>
                                   <span><?=$info['manage_price']==''?'未知':$info['manage_price']?></span>
                                </li>
                                <li class="col-md-8">
                                   <label>楼层状况：</label>
                                   <span>一期住宅2栋，共33层，2梯6户，户型建面78-105平米</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="peitao1" style="display: none;" id="tab2">
                            <p><span style="font-weight:600;padding-right:5px;padding-bottom: 50px;padding-left: 20px;">商场:</span>
                                <div class="zoubian">
                                    <? if($info['market'] == ''){echo "<span class='periphery'>暂无</span>"; } ?>
                                    <?
                                    $arr = explode("，",$info['market']);
                                    foreach($arr as $key=>$u){
                                        $strarr = explode("|",$u);
                                        foreach($strarr as $newstr){
                                            if(preg_match("/[\x7f-\xff]/",$newstr)){
                                                echo "<a class='periphery' href='#'>".$newstr."</a>";
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                            </p>
                            <p><span style="font-weight:600;padding-right:5px;padding-left: 20px;">邮局:</span>
                            <div class="zoubian">
                                <? if($info['postoffice'] == ''){echo "<span class='periphery'>暂无</span>"; } ?>
                                <?
                                $arr = explode("，",$info['postoffice']);
                                foreach($arr as $key=>$u){
                                    $strarr = explode("|",$u);
                                    foreach($strarr as $newstr){
                                        if(preg_match("/[\x7f-\xff]/",$newstr)){
                                            echo "<a href='#' class='periphery'>".$newstr."</a>";
                                        }
                                    }
                                }
                                ?>
                            </div>
                            </p>
                            <p><span style="font-weight:600;padding-right:5px;padding-left: 20px;">银行:</span>
                            <div class="zoubian">
                                <? if($info['bank'] == ''){echo "<span class='periphery'>暂无</span>"; } ?>
                                <?
                                $arr = explode("，",$info['bank']);
                                foreach($arr as $key=>$u){
                                    $strarr = explode("|",$u);
                                    foreach($strarr as $newstr){
                                        if(preg_match("/[\x7f-\xff]/",$newstr)){
                                            echo "<a href='#' class='periphery'>".$newstr."</a>";
                                        }
                                    }
                                }
                                ?>
                            </div>
                            </p>
                            <p><span style="font-weight:600;padding-right:5px;padding-left: 20px;">医院:</span>
                            <div class="zoubian">
                                <? if($info['hospital'] == ''){echo "<span class='periphery'>暂无</span>"; } ?>
                                <?
                                $arr = explode("，",$info['hospital']);
                                foreach($arr as $key=>$u){
                                    $strarr = explode("|",$u);
                                    foreach($strarr as $newstr){
                                        if(preg_match("/[\x7f-\xff]/",$newstr)){
                                            echo "<a href='#' class='periphery'>".$newstr."</a>";
                                        }
                                    }
                                }
                                ?>
                            </div>
                            </p>
                            <p><span style="font-weight:600;padding-right:5px;padding-left: 20px;">学校:</span>
                            <div class="zoubian">
                                <? if($info['school'] == ''){echo "<span class='periphery'>暂无</span>"; } ?>
                                <?
                                $arr = explode("，",$info['school']);
                                foreach($arr as $key=>$u){
                                    $strarr = explode("|",$u);
                                    foreach($strarr as $newstr){
                                        if(preg_match("/[\x7f-\xff]/",$newstr)){
                                            echo "<a href='#' class='periphery'>".$newstr."</a>";
                                        }
                                    }
                                }
                                ?>
                            </div>
                            </p>
                            <p><span style="font-weight:600;padding-right:10px;padding-left: 20px;">酒店:</span>
                            <div class="zoubian">
                                <? if($info['hotel'] == ''){echo "<span class='periphery'>暂无</span>"; } ?>
                                <?
                                $arr = explode("，",$info['hotel']);
                                foreach($arr as $key=>$u){
                                    $strarr = explode("|",$u);
                                    foreach($strarr as $newstr){
                                        if(preg_match("/[\x7f-\xff]/",$newstr)){
                                            echo "<a href='#' class='periphery'>".$newstr."</a>";
                                        }
                                    }
                                }
                                ?>
                            </div>
                            </p>
                            <p><span style="font-weight:600;padding-right:5px;padding-left: 20px;">景点:</span>
                            <div class="zoubian">
                                <? if($info['attris'] == ''){echo "<span class='periphery'>暂无</span>"; } ?>
                                <?
                                $arr = explode("，",$info['attris']);
                                foreach($arr as $key=>$u){
                                    $strarr = explode("|",$u);
                                    foreach($strarr as $newstr){
                                        if(preg_match("/[\x7f-\xff]/",$newstr)){
                                            echo "<a href='#' class='periphery'>".$newstr."</a>";
                                        }
                                    }
                                }
                                ?>
                            </div>
                            </p>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <!-- house second start -->
    
    <!-- house pic start -->
    <div class="row" id="picBox">
        <div class="col-md-12">
            <div class="proj_info clearfix">
            <div class="proj_tab">
                <ul>
                    <li id="studio" title="tab1" class="active">楼盘相册</li>
                    <!--li title="tab2">&nbsp;&nbsp;&nbsp;&nbsp;实景图</li-->
                    <li id="apartment" title="tab3" class="">&nbsp;&nbsp;&nbsp;&nbsp;户型图</li>
                </ul>
            </div>
            <div class="proj_tabbox">
                <div class="loupanimg1" id="tab1" style="width:100%">
                    <div class="col-md-3 img-portfolio" style="margin-bottom:20px;width: 100%">
                        <?if(count($info['gallery']) == 0){echo "暂无相册";} foreach($info['gallery'] as $key=>$gal){ ?>
                            <a class="vlightbox1" href="<?=$gal['url']?>" title="">
                                <img width="210" height="140" src="<?=$gal['url']?>" class="img-responsive img-hover">
                            </a>
                        <? } ?>
                    </div>
                </div>
                <!--div id="tab2" style="display:none">
                    {section name=a loop=$allphoto}
                    {if $allphoto[a].code == '21003' }
                    <img src="{$allphoto[a].url|replace:'.':'_m.'|default:'/ui/images/pic_default.jpg'}" class="img-polaroid" title="{$allphoto[a].title}">
                    {/if}
                    {/section}
                </div-->
                <div class="huxingimg1" id="tab3" style="display:none;width:100%">
                    <div class="col-md-3 img-portfolio" style="margin-bottom:20px;width: 100%">
                        <?if(count($info['gallery']) == 0){echo "暂无户型图";} foreach($info['modeInfo'] as $key=>$mode){ ?>
                            <a class="vlightbox1" href="<?=$mode['total']?>" title="">
                                <img width="210" height="140" src="<?=$mode['total']?>" class="img-responsive img-hover">
                            </a>
                        <? } ?>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        </div>
    </div>
    <!-- house pic end -->

    <!-- house map start -->
    <div class="row" id="mapBox">
        <div class="col-md-12">
            <div class="proj_info clearfix" style="margin-bottom:20px;">
            <div class="proj_tab">
                <ul>
                    <li title="tab1" class="active">地图交通</li>
                </ul>
            </div>
            <div class="proj_tabbox">
                <div class="col-md-9">
                    <div class="map" id="map"></div>
                </div>
                <div class="col-md-3">
                    <br />
                    <h3>交通情况</h3>
                    <div class="map_intro_info">
						<p>地铁：
                        <div class="jiaotong">
                            <? if($info['subway'] == ''){echo "<span class='traffic'>暂无</span>"; } ?>
                            <?
                            $arr = explode("，",$info['subway']);
                            foreach($arr as $u){
                                $strarr = explode("|",$u);
                                foreach($strarr as $newstr){
                                    if(preg_match("/[\x7f-\xff]/",$newstr)){
                                        echo "<a class='traffic' href='#'>".$newstr."</a>";
                                    }
                                }
                            }
                            ?>
                        </div>
                        </p>
                        <p>公交：
                            <div class="jiaotong">
                            <? if($info['traffic'] == ''){echo "<span class='traffic'>暂无</span>"; } ?>
                            <?
                            $arr = explode(",",$info['traffic']);
                            foreach($arr as $u){
                                $strarr = explode("|",$u);
                                foreach($strarr as $newstr){
                                    if(preg_match("/[\x7f-\xff]/",$newstr)){
                                        echo "<a class='traffic' href='#'>".$newstr."</a>";
                                    }
                                }
                            }
                            ?>
                            </div>
                        </p>

					</div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        </div>
    </div>
    <!-- house map end -->

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
    </div>
</div>
<!--  Mask layer content  -->

<!--Dynamic information-->
<div class="modal fade" id="dynamic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div id="aneirong" class="modal-content ahezhaoc">
            <div class="modal-header atoubu">
                <button type="button" class="close closemask" data-dismiss="modal" aria-label="Close"><span class="aguanbi" aria-hidden="true">&times;</span></button>
                <h4 class="modal-title atitle" id="myModalLabel">动态资讯</h4>
                <hr/>
            </div>
            <div class="modal-body aneirong">
                <? if(!empty($info['dynamic'])){ ?>
                <? foreach($info['dynamic'] as $key=>$dyna){ ?>
                    <div class="dongtai">
                        <br/>
                        <div class="dtime">
                            <? $time = date("Y-m-d",$info['dynamic'][0]['start_date']) ?>
                            <?$arr = explode("-",$time);?>
                            <span class="dtime1"><?=$arr[1]?>-<?=$arr[2]?></span><br/>
                            <span class="dtime2"><?=$arr[0]?></span>
                        </div>
                        <div class="dcontent">
                            <p class="dcontent1"><?=$dyna['title']?></p>
                            <p class="dcontent2"><?=$dyna['content']?></p>
                        </div>
                        <br/>
                    </div>
                    <hr style="clear: both"/>
                <? } ?>
                <? }else{echo "<span style='margin-left: 20px'>暂无动态...</span>";} ?>
            </div>
        </div>
    </div>
</div>
<!--I want a loan-->
<div class="modal fade" id="loan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div id="aneirong" class="modal-content ahezhaoc">
            <div class="modal-header atoubu">
                <button type="button" class="close closemask" data-dismiss="modal" aria-label="Close"><span class="aguanbi" aria-hidden="true">&times;</span></button>
                <h4 class="modal-title atitle" id="myModalLabel">贷款申请</h4>
                <hr/>
                <div class="daibuzhou" style="width: 513px;height: 63px;background-color: #ececec">
                    <p>
                        <span class="step1" style="color: #63ab02">1、输入您的电话</span>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="glyphicon glyphicon-menu-right"></span>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="step2">2、填写贷款申请</span>
                    </p>
                </div>
            </div>
            <div class="modal-body aneirong">
                <div class="loan1">
                    <div class="kong"></div>
                    <p class="aint">
                        手机号码：<input id="dphone" onblur="phone('dphone')" maxlength="11" class="ainput phone" type="text" placeholder=" 请输入您的手机号码"/>
                        <br/><span id="dphonets" class="atishi phonets daikuants"></span>
                    </p>
                    <p class="aint">
                        <span style="letter-spacing: 0.5em;"> 验证</span>码：<input id="dcode" onblur="code('dcode')" maxlength="4" class="ainput code" type="text" placeholder=" 请输入图片中的验证码"/>
                        <a href="javascript:changeimg()"><img class="atpyanzheng imgcode" src="/userlogin/apiCheckVerify" alt="验证码"/></a>
                        <br/><span id="dcodets" class="atishi codets daikuants"></span>
                    </p>
                    <p class="aint">
                         <span> 动态密码：</span><input id="dsms_code" maxlength="4" class="ainput sms_code" type="text" placeholder=" 请输入短信验证码"/>
                        <input onclick="smscode('dphone')" class="adxyanzheng atpyanzheng smscode" type="button" value="获取短信验证码"/>
                        <br/><span id="dsms_codets" class="atishi sms_codets daikuants"></span>
                    </p>
                    <p class="aint daiint daicheck">
                        <input id="daicheck" type="checkbox" checked/>我已阅读并接受 <a>用户服务协议</a>
                    </p>
                    <p>
                        <input id="loan_application" class="alijiyy daisheng" type="button" onclick="loan()" value="  快速申请  "/>
                    </p>
                </div>
                <div class="loan2" style="display: none">
                    <div class="inputcontent">
                        <span class="ltishi"></span>
                        <p class="lint">
                            您的姓名<span class="lkong"></span><input id="lname" class="loan2int lname" maxlength="10" placeholder="请输入您的真实姓名" type="text"/><br/>
                            <span id="lnamets" class="ltishi lnamets"></span>
                        </p>
                        <p class="lint">
                            您的性别<span class="lkong"></span><input type="radio" checked name="gender" value="先生"/>先生<span class="lkong2"></span><input type="radio" name="gender" value="女士"/>女士<br/>
                            <span class="ltishi"></span>
                        </p>
                        <p class="lint">
                            您的邮箱<span class="lkong"></span><input id="lemail" class="loan2int" maxlength="35" placeholder="请输入您的邮箱" type="email"/><br/>
                            <span class="ltishi lemailts"></span>
                        </p>
                        <p class="lint">
                            贷款金额<span class="lkong"></span><input style="width: 235px;" id="lloansum" maxlength="20" class="loan2int" placeholder="请输入您的贷款金额" type="text"/><input class="danwei" disabled type="text" value="万元"/><br/>
                            <span id="lloansumts" class="ltishi lloansumts"></span>
                        </p>
                        <p class="lint">
                            <span style="float:left;">贷款用途<span class="lkong"></span></span>
                            <ul style="float:left;">
                                <li><input type="radio" checked name="purpose" value="1"/>信用贷(付装修,车位或其他消费)</li>
                                <li><input type="radio" name="purpose" value="2"/>按揭贷(二手房按揭)</li>
                                <li><input type="radio" name="purpose" value="3"/>抵押贷(赎楼,纯抵押)</li>
                            </ul>
                        </p>
                        <p class="tijiaoloan" style="clear: both">
                            <input class="loan" onclick="immediately()" type="button" value="立即申请"/>
                        </p>
                    </div>
                    <div id="tijiao" class="loaded tijiao">
                        <div class="tjnei">
                            <img id="dtjimg" class="tijiaoimg" src="/theme/agency/img/being_loaded.gif" alt=""/> <span id="dtjname" class="tjname">   正在提交...</span><br/>
                        </div>
                        <button type="button" class="tjbtn btn-default closemask" data-dismiss="modal">  确 认  </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Booking house-->
<div class="modal fade" id="booking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div id="aneirong" class="modal-content ahezhaoc">
            <div class="modal-header atoubu">
                <button type="button" class="close closemask" data-dismiss="modal" aria-label="Close"><span class="aguanbi" aria-hidden="true">&times;</span></button>
                <h4 class="modal-title atitle" id="myModalLabel">预约看房</h4>
                <hr/>
                <div class="abiaoti" style="width: 553px;height: 93px;background-color: #ececec">
                    <div class="index index-1"></div><b>专人服务</b><span>预约看房享案场一对一专人服务</span>
                </div>
                <p class="aprompt">请填写您的手机号码，以便置业顾问联系您看房。</p>
            </div>
            <div class="modal-body aneirong">
                <div class="inputcontent">
                    <p class="aint">
                        <span class="abitian">* </span> <span style="letter-spacing: 0.32em"> 手机号</span>码：<input id="aphone" maxlength="11" onblur="phone('aphone')" class="ainput phone" type="text" placeholder=" 请输入您的手机号码"/>
                        <br/><span id="aphonets" class="atishi phonets"></span>
                    </p>
                    <p class="aint">
                        <span class="abitian">* </span> <span style="letter-spacing: 1em"> 验证</span>码：<input id="acode" onblur="code('acode')" maxlength="4" class="ainput code" type="text" placeholder=" 请输入图片中的验证码"/>
                        <a href="javascript:changeimg()" title="换一张"><img class="atpyanzheng imgcode" src="/userlogin/apiCheckVerify" alt="验证码"/></a>
                        <br/><span id="acodets" class="atishi codets"></span>
                    </p>
                    <p class="aint">
                        <span class="abitian">* </span> <span> 短信验证码：</span><input id="asms_code" maxlength="4" class="ainput sms_code" type="text" placeholder=" 请输入短信验证码"/>
                        <input onclick="smscode('aphone')" class="adxyanzheng atpyanzheng smscode" type="button" value="发送短信验证码"/>
                        <br/><span id="asms_codets" class="atishi sms_codets"></span>
                    </p>
                    <p>
                        <input class="alijiyy" type="button" onclick="yuyue()" value="  立即预约  "/>
                    </p>
                </div>
                <div id="tijiao" class="loaded tijiao">
                    <div class="tjnei">
                        <img id="dtjimg" class="tijiaoimg" src="/theme/agency/img/being_loaded.gif" alt=""/> <span id="dtjname" class="tjname">   正在提交...</span><br/>
                    </div>
                    <button type="button" class="tjbtn btn-default closemask" data-dismiss="modal">  确 认  </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Group showings-->
<div class="modal fade" id="group" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content gzhezhao">
            <div class="modal-header atoubu">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="aguanbi closemask" aria-hidden="true">&times;</span></button>
                <h4 class="modal-title atitle ading" id="myModalLabel">组团看房报名</h4>
                <hr/>
                <img class="atimg" src="/theme/agency/img/zutuankanfang.jpg" alt=""/><br/>
                <p class="xinfangname">组团楼盘-<?=$info['name']?></p>
            </div>
            <div class="modal-body aneirong">
                <div class="inputcontent">
                    <p class="aint">
                        <span class="abitian">* </span> <span style="letter-spacing: 0.32em"> 您的称</span>呼：<input id="gname" onblur="username('gname')" class="ainput lname" type="text" placeholder=" 列如：王先生"/>
                        <br/><span id="gnamets" class="atishi lnamets"></span>
                    </p>
                    <p class="aint">
                        <span class="abitian">* </span> <span style="letter-spacing: 0.32em"> 手机号</span>码：<input id="gphone" onblur="phone('gphone')" maxlength="11" class="ainput phone" type="text" placeholder=" 请输入您的手机号码"/>
                        <br/><span id="gphonets" class="atishi phonets"></span>
                    </p>
                    <p class="aint">
                        <span class="abitian">* </span> <span style="letter-spacing: 1em"> 验证</span>码：<input id="gcode" onblur="code('gcode')" maxlength="4" class="ainput code" type="text" placeholder=" 请输入图片中的验证码"/>
                        <a href="javascript:changeimg()"><img class="atpyanzheng imgcode" src="/userlogin/apiCheckVerify" alt="验证码"/></a>
                        <br/><span id="gcodets" class="atishi codets"></span>
                    </p>
                    <p class="aint">
                        <span class="abitian">* </span> <span> 短信验证码：</span><input id="gsms_code" maxlength="4" class="ainput sms_code" type="text" placeholder=" 请输入短信验证码"/>
                        <input onclick="smscode('gphone')" class="adxyanzheng atpyanzheng smscode" type="button" value="发送短信验证码"/>
                        <br/><span id="gsms_codets" class="atishi sms_codets"></span>
                    </p>
                    <p>
                        <input class="alijiyy" type="button" onclick="zutuan()" value="  报名组团  "/>
                    </p>
                </div>
                <div id="tijiao" class="loaded tijiao">
                    <div class="tjnei">
                        <img id="dtjimg" class="tijiaoimg" src="/theme/agency/img/being_loaded.gif" alt=""/> <span id="dtjname" class="tjname">   正在提交...</span><br/>
                    </div>
                    <button type="button" class="tjbtn btn-default closemask" data-dismiss="modal">  确 认  </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Instant subscription-->
<div class="modal fade" id="subscribe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content gzhezhao">
            <div class="modal-header atoubu">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="aguanbi closemask" id="subscribeclose" aria-hidden="true">&times;</span></button>
                <h4 class="modal-title atitle ading" id="myModalLabel">订阅信息</h4>
                <hr/>
                <p class="dingx">我们将为您保密个人信息！ <span class="ding">请填写您接受订阅的手机号码：</span></p>
            </div>
            <div class="modal-body aneirong">
                <p class="sxuan">
                        <span class="sfuxuan">
                            <span><input id="checkbox1" type="checkbox" name="box" class="check" value="1" /><label for="checkbox1">变价通知</label></span>
                            <span><input id="checkbox2" type="checkbox" name="box" class="check" value="2" /><label for="checkbox2">优惠通知</label></span>
                            <span><input id="checkbox3" type="checkbox" name="box" class="check" value="3" /><label for="checkbox3">开盘通知</label></span>
                            <span><input id="checkbox4" type="checkbox" name="box" class="check" checked value="4"/><label for="checkbox4">最新动态</label></span>
                            <span><input id="checkbox5" type="checkbox" name="box" class="check" value="5" /><label for="checkbox5">看房团通知</label></span>
                        </span>
                    <input id="sfuxuan" type="hidden" value=""/>
                </p>
                <div class="inputcontent">
                    <p class="aint">
                        <span class="abitian">* </span> <span style="letter-spacing: 0.32em"> 手机号</span>码：<input id="sphone" onblur="phone('sphone')" class="ainput phone" type="text" placeholder=" 请输入您的手机号码"/>
                        <br/><span id="sphonets" class="atishi phonets"></span>
                    </p>
                    <p class="aint">
                        <span class="abitian">* </span> <span style="letter-spacing: 1em"> 验证</span>码：<input id="scode" onblur="code('scode')" class="ainput code" type="text" placeholder=" 请输入图片中的验证码"/>
                        <a href="javascript:changeimg()"><img class="atpyanzheng imgcode" src="/userlogin/apiCheckVerify" alt="验证码"/></a>
                        <br/><span id="scodets" class="atishi codets"></span>
                    </p>
                    <p class="aint">
                        <span class="abitian">* </span> <span> 短信验证码：</span><input id="ssms_code" class="ainput sms_code" type="text" placeholder=" 请输入短信验证码"/>
                        <input onclick="smscode('sphone')" class="adxyanzheng atpyanzheng smscode" type="button" value="发送短信验证码"/>
                        <br/><span id="ssms_codets" class="atishi sms_codets"></span>
                    </p>
                    <p>
                        <input class="alijiyy" type="button" onclick="sdingyue()" value="  立即订阅  "/><span id="check" class="check"></span>
                    </p>
                </div>
                <div id="tijiao" class="loaded tijiao">
                    <div class="tjnei">
                        <img id="dtjimg" class="tijiaoimg" src="/theme/agency/img/being_loaded.gif" alt=""/> <span id="dtjname" class="tjname">   正在提交...</span><br/>
                    </div>
                    <button type="button" class="tjbtn btn-default closemask" data-dismiss="modal">  确 认  </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--user login-->
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
                    <p class="uint">
                        <span class="glyphicon glyphicon-phone licon"></span><input id="tel" name="tel" maxlength="11" class="uinput phone" type="text" placeholder=" 请输入手机号"/>
                    </p>
                    <p class="uint">
                        <span class="glyphicon glyphicon-lock licon"></span><input id="pwd" name="pwd" class="uinput code" type="password" placeholder=" 请输入密码"/>
                    </p>
                    <p class="uint">
                        <input id="daicheck" type="checkbox" checked/>下次自动登录 <a class="forget_password" href="#">忘记密码</a>
                    </p>
                    <p class="uint">
                        <input id="loan_application" class="ulogin" type="button" onclick="login()" value="马上登录"/>
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


<!-- Footer -->
<?php include '../../index/view/footer.html.php';?>

<!-- jQuery --> 
<script src="/js/jquery.min.js"></script> 

<!-- Bootstrap Core JavaScript -->
<script src="/js/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript --> 
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.4"></script>
<script type="text/javascript" src="/js/baidu_new.js"></script>

<!-- main JavaScript -->
<script src="/theme/agency/js/agency.js"></script> 

<script src="/js/vendor/vlightbox/vlb_engine/visuallightbox.js" type="text/javascript"></script>
<script src="/js/vendor/vlightbox/vlb_engine/vlbdata1.js" type="text/javascript"></script>

<script>
var houseid = 3327;
var newhouseid = <?=$_GET['id']?>;
var newhousename = '<?=$info['name']?>';

//判断用户是否登录
<? if(!isset($_SESSION['userid'])){ ?>
$(".not_logged").attr({"data-toggle":"modal","data-target":"#userlogin"});
<? }?>

//用户登录
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
                window.location = "/newhouse/detail?id=<?=$info['id']?>&pm_type=<?=$_GET['pm_type']?>";
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

//搜索楼盘
function search(){
    if($("#keyword").val() == ''){
        return false;
    }else{
        return true;
    }
}

//地图
$(document).ready(function(){
	try
	{
		 // 初始化地图，设置中心点坐标和地图级别
		var map = new BMap.Map("map");          // 创建地图实例
			var houseid = 3327;

            var _point_x = <?=$info['map_x']==''?'104.07261':$info['map_x']?>;
            var _point_y = <?=$info['map_y']==''?'30.663708':$info['map_y']?>;
            var title = "<?=$info['name']?>";
            _point_x = <?=$info['map_x']==''?'104.07261':$info['map_x']?>;
            _point_y = <?=$info['map_y']==''?'30.663708':$info['map_y']?>;

			var point = new BMap.Point(_point_x, _point_y);  // 创建点坐标   //根据给定的坐标点设置
			var Icon = new BMap.Icon( "http://map.baidu.com/image/markers_new.png",new BMap.Size(22, 30),{
				imageOffset: new BMap.Size(0, 0),anchor:new BMap.Size(10,10)
			});
            <? if($info['map_x']!='' && $info['map_y'] != ''){ ?>
            var marker = new ComplexCustomOverlay(new BMap.Point(_point_x,_point_y), title,title,'');
            map.centerAndZoom(point, 18);map.addControl(new BMap.NavigationControl());
            map.addOverlay(marker);
            <? }else{ ?>
			map.centerAndZoom(point, 12);map.addControl(new BMap.NavigationControl());
            <? } ?>
            map.enableScrollWheelZoom();//启用地图滚轮放大缩小
    }
	catch (e)
	{

	}
});

/* 切换验证码  */
function changeimg(){
    $(".imgcode").attr('src',"/userlogin/apiCheckVerify?n="+(new Date()).getTime());
}
/* 切换验证码  */

//楼盘详情
$("#loupan").click(function(){
    $("#property").attr("class","active");
    $("#peripheral").attr("class","");
    $(".loupan1").css("display","inline-block");
    $(".peitao1").css("display","none")
})
//周边配套
$("#zhoubian").click(function(){
    $("#property").attr("class","");
    $("#peripheral").attr("class","active");
    $(".loupan1").css("display","none");
    $(".peitao1").css("display","inline-block");
})
//楼盘相册
$("#loupanimg").click(function(){
    $("#studio").attr("class","active");
    $("#apartment").attr("class","");
    $(".loupanimg1").css("display","inline-block");
    $(".huxingimg1").css("display","none");
})
//户型图
$("#huxingtu").click(function(){
    $("#studio").attr("class","");
    $("#apartment").attr("class","active");
    $(".loupanimg1").css("display","none");
    $(".huxingimg1").css("display","inline-block");
})

//关闭遮罩层清楚验证提示
$(".closemask").click(function(){
    $("#check").html('');
    //姓名验证
    $(".lnamets").html("");
    $(".lname").css("border","1px solid #a5a5a5")
    //手机号码验证
    $(".phonets").html("");
    $(".phone").css({"border":"1px solid #a5a5a5"});
    //图片验证码
    $(".codets").html("");
    $(".code").css({"border":"1px solid #a5a5a5"});
    $(".code").val("");
    //短信验证码
    $(".sms_codets").html("");
    $(".sms_code").css({"border":"1px solid #a5a5a5"});
    $(".sms_code").val("");
    //短信发送倒计时
    $(".smscode").val("发送短信验证码");
    $(".smscode").attr("disabled",false);
    $(".smscode").css("color","#000");
    time = 0;
    //贷款申请
    $(".loan1").css({"display": "inherit"});
    $(".loan2").css({"display":"none"});
    $(".step1").css("color","#63ab02");
    $(".step2").css("color","#000000");
    $("#dphone").val("");
    //提交信息等待
    $(".inputcontent").css({"display":"inherit"})
    $(".tijiao").css({"display":"none"});
    $(".tijiaoimg").attr("src","/theme/agency/img/being_loaded.gif");
    $(".tjname").html("正在提交...");
    $(".tjbtn").css({"display":"none"});
    //贷款填写信息
    $(".lnamets").html("");
    $("#lname").css("border","1px solid #a5a5a5");
    $(".lemailts").html("");
    $("#lemail").css("border", "1px solid #a5a5a5");
    $(".lloansumts").html("");
    $("#lloansum").css("border","1px solid #a5a5a5");
    $("input[name='gender']:eq(0)").prop("checked","checked");
    $("input[name='purpose']:eq(0)").prop("checked","checked");
});


//发送短信验证码
var time = 60;
function datetime(){
    if(time == 0){
        $(".smscode").val("发送短信验证码");
        $(".smscode").attr("disabled",false);
        $(".smscode").css("color","#000");
        time = 60;
    }else{
        $(".smscode").val("重新发送( "+time+"s )");
        $(".smscode").attr("disabled",true);
        $(".smscode").css("color","rgb(172, 167, 163)");
        time--;
        setTimeout(function() {
            datetime();
        },1000)
    }
}
function smscode(obj){
    if(time == 0){
        datetime();
    }
    if(time == 60){
        if($("#"+obj).val() == ''){
            $(".phonets").html("手机号不能为空");
            $(".phone").css({"border":"1px solid red"})
        }else{
            var phone = /^1[34578]\d{9}$/;
            if(phone.test($("#"+obj).val())){
                $.post(
                    "/userlogin/apiSendSms",{
                        mobile:$("#"+obj).val()
                    },function(msg){
                        alert(msg);
                    });

                $(".phonets").html("");
                $(".phone").css({"border":"1px solid #a5a5a5"})

                $(".smscode").val("重新发送( "+time+"s )");
                $(".smscode").attr("disabled",true);
                $(".smscode").css("color","rgb(172, 167, 163)");
                time--;
                setTimeout(function(){
                    datetime();
                },1000);
            }else{
                $(".phonets").html("手机号码格式不正确");
                $(".phone").css({"border":"1px solid red"})
            }
        }
    }
}
/*失去焦点时验证*/
//手机号码验证
function phone(obj){
    if($("#"+obj).val() == ''){
        $("#"+obj+"ts").html("手机号不能为空");
        $("#"+obj).css({"border":"1px solid red"})
    }else{
        var phone = /^1[34578]\d{9}$/;
        if(phone.test($("#"+obj).val())){
            $("#"+obj+"ts").html("");
            $("#"+obj).css({"border":"1px solid #a5a5a5"})
        }else{
            $("#"+obj+"ts").html("手机号码格式不正确");
            $("#"+obj).css({"border":"1px solid red"})
        }
    }
}
//图片验证码
function code(obj){
    if($("#"+obj).val() != ''){
        $.post(
            "/newhouse/code",{
                code:$("#"+obj).val()
            },function(msg){
                if(msg == 1){
                    $("#"+obj+"ts").html("");
                    $("#"+obj).css({"border":"1px solid #a5a5a5"})
                }else{
                    $("#"+obj+"ts").html("验证码不正确");
                    $("#"+obj).css({"border":"1px solid red"});
                    changeimg();
                }
            })
    }
}
//姓名验证
function username(obj){
    if($("#"+obj).val() != ''){
        var name = /^[\u4e00-\u9fa5]+$/;
        if(name.test($("#"+obj).val())){
            $("#"+obj).css("border","1px solid #a5a5a5");
            $("#"+obj+"ts").html("");
        }else{
            $("#"+obj).css("border","1px solid red");
            $("#"+obj+"ts").html("姓名不符合规范");
        }
    }else{
        $('#'+obj).css('border','1px solid #a5a5a5');
        $('#'+obj+'ts').html('');
    }
}
/*失去焦点时验证*/
/*点击提交按钮时验证*/
function code_submit(obj){
    if($("#"+obj).val() == ''){
         $("#"+obj+"ts").html("验证码不正确");
         $("#"+obj).css({"border":"1px solid red"});
          changeimg();
    }
}
function smscode_submit(obj){
    if($("#"+obj).val() == ''){
        $("#"+obj+"ts").html("验证码不能为空");
        $("#"+obj).css({"border":"1px solid red"});
    }else{
        $("#"+obj+"ts").html("");
        $("#"+obj).css({"border":"1px solid #a5a5a5"});
    }
}
/*点击提交按钮时验证*/

//预约，组团，订阅成功提示
function success_tips(){
    $(".inputcontent").css({"display":"none"});
    $(".tijiao").css({"display":"inherit"});
    setTimeout("$('.tijiaoimg').attr('src','/images/ok.png')", 3000);
    setTimeout("$('.tjname').html('提交成功')", 3000);
    setTimeout("$('.tjbtn').css('display','inherit')", 3000);
}
//预约，组团，订阅类型已申请
function already_applied(){
    $(".phonets").html("该手机号已经提交过申请");
    $(".phone").css({"border":"1px solid red"});
    $(".code").val("");
    $(".sms_code").val("");
    $(".smscode").val("发送短信验证码");
    $(".smscode").attr("disabled",false);
    $(".smscode").css("color","#000");
    time = 0;
}


/* 贷款申请 */
/* 贷款申请第一步 */
$("#daicheck").click(function(){
    if($("#daicheck[type='checkbox']").is(':checked')){
        $("#loan_application").attr("disabled",false);
        $("#loan_application").css("background","#81bb32");
    }else{
        $("#loan_application").attr("disabled",true);
        $("#loan_application").css("background","#dbdbdb");
    }
});
function loan(){
    phone('dphone');
    if($('#dphone').val() != ''){
        code_submit('dcode');
    }
    if($('#dcode').val() != ''){
        smscode_submit('dsms_code');
    }
    if($('#dphone').val() != '' && $('#dcode').val() != '' && $('#dcodets').html() == '' && $('#dsms_code').val() != ''){
        $.post(
            "/newhouse/loan", {
                typeid:'loancode',
                lphone:$("#dphone").val(),
                sms_code: $("#dsms_code").val()
            },
            function (msg) {
                if (msg == 1) {
                    $(".loan1").css({"display": "none"});
                    $(".loan2").css({"display":"inherit"});
                    $(".step1").css("color","#000000")
                    $(".step2").css("color","#63ab02")
                }else if(msg == 2){
                    $(".phonets").html("该手机号贷款正在申请中...");
                    already_applied();
                    changeimg();
                }else{
                    $(".sms_codets").html("动态密码不正确");
                    $(".sms_code").css({"border":"1px solid red"});
                }
            });
    }
}

/* 贷款申请第二步 */
$("#lname").blur(function(){
    if($("#lname").val() != ''){
        var name = /^[\u4e00-\u9fa5]+$/;
        if(name.test($("#lname").val())){
            $("#lname").css("border","1px solid #a5a5a5");
            $("#lnamets").html("");
        }else{
            $("#lname").css("border","1px solid red");
            $("#lnamets").html("姓名不符合规范");
        }
    }
})
$("#lemail").blur(function(){
    var email  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if($("#lemail").val() == ''){
    }else{
        if(email.test($("#lemail").val())){
            $(".lemailts").html("");
            $("#lemail").css({"border":"1px solid #a5a5a5"})
        }else{
            $(".lemailts").html("邮箱格式不正确")
            $("#lemail").css({"border":"1px solid red"})
        }
    }
});
$("#lloansum").keyup(function(){
    this.size=(this.value.length>4?this.value.length:2);
    this.value=this.value.replace(/\D/gi,'')
});
$("#lloansum").blur(function(){
    if($("#lloansum").val() != ''){
        $("#lloansum").css("border","1px solid #a5a5a5");
        $("#lloansumts").html('');
    }
})
function immediately(){
    if($("#lname").val() == ''){
        $(".lnamets").html("真实姓名不能为空");
        $("#lname").css("border","1px solid red");
    }
    if($("#lemail").val() == '') {
        $(".lemailts").html("邮箱账号不能为空");
        $("#lemail").css("border", "1px solid red");
    }
    if($("#lloansum").val() == ''){
        $(".lloansumts").html("贷款金额不能为空");
        $("#lloansum").css("border","1px solid red");

    }
    if($(".lnamets").html() == '' && $(".lemailts").html() == '' && $(".lloansumts").html() == ''){
        $.post(
            "/newhouse/loan",{
                typeid:5,
                lphone:$("#dphone").val(),
                lusername:$("#lname").val(),
                lemail:$("#lemail").val(),
                lloansum:$("#lloansum").val(),
                lpurpose:$("input[name='purpose']:checked").val()
            },function(msg){
                if(msg == 1){
                    $(".inputcontent").css({"display":"none"});
                    $(".tijiao").css({"display":"inherit"});
                    setTimeout("$('.tijiaoimg').attr('src','/images/ok.png')", 3000);
                    setTimeout("$('.tjname').html('提交成功')", 3000);
                    setTimeout("$('.tjbtn').css('display','inherit')", 3000);
                }else{
                    $("#lnamets").html("贷款失败")
                }
            })
    }
}
/* 贷款申请 */
/* 预约看房  */
function yuyue(){
    phone('aphone');
    if($('#aphone').val() != ''){
        code_submit('acode');
    }
    if($('#acode').val() != ''){
        smscode_submit('asms_code');
    }
    if($('#aphone').val() != '' && $('#acode').val() != '' && $('#acodets').html() == '' && $('#asms_code').val() != ''){
        $.post(
            "/newhouse/type", {
                typeid:1,
                newhouseid:newhouseid,
                newhousename:newhousename,
                phone: $("#aphone").val(),
                sms_code: $("#asms_code").val()
            },
            function (msg) {
                if (msg == 1){
                    success_tips();
                }else if(msg == 2){
                    already_applied();
                    changeimg();
                }else{
                    $(".sms_codets").html("验证码不正确");
                }
            });
    }
}

/* 组团报名  */
function zutuan(){
    phone('gphone');
    if($('#gphone').val() != ''){
        code_submit('gcode');
    }
    if($('#gcode').val() != ''){
        smscode_submit('gsms_code');
    }
    if($('#gphone').val() != '' && $('#gcode').val() != '' && $('#gcodets').html() == '' && $('#gsms_code').val() != ''){
        $.post(
            "/newhouse/type", {
                typeid:2,
                newhouseid:newhouseid,
                newhousename:newhousename,
                username:$("#gname").val(),
                phone: $("#gphone").val(),
                sms_code:$("#gsms_code").val()
            },
            function(msg){
                if(msg == 1){
                    $("#zhutuansum").html($("#zhutuansum").html()-1);
                    success_tips();
                }else if(msg == 2){
                    already_applied();
                    changeimg();
                }else{
                    $(".sms_codets").html("验证码不正确");
                }
            });
    }
}

/*  立即订阅  */
//外部选中的复选框传到遮罩层内
$(".check").click(function() {
    $("#check").html('');
    var aa = document.getElementsByName("box");
    var ss = "";
    for (var i = 0; i < aa.length; i++) {
        if (aa[i].checked) {
            ss += aa[i].value+',';
        }
    }
    ss =  ss.substr(0, ss.length - 1);
    $("#sfuxuan").val(ss);
});

//变价通知
$("#the_price").click(function(){
    for(var i=1;i<=5;i++){
        if(i == 1){
            $("#checkbox"+i).prop("checked",true)
        }else{
            $("#checkbox"+i).prop("checked",false)
        }
    }
    $("#sfuxuan").val("1");
});
//开盘通知
$("#opening_notice").click(function(){
    for(var i=1;i<=5;i++){
        if(i == 3){
            $("#checkbox"+i).prop("checked",true)
        }else{
            $("#checkbox"+i).prop("checked",false)
        }
    }
    $("#sfuxuan").val("3");
});

//关闭立即订阅遮罩层时里面的复选框设为未选中
$("#subscribeclose").click(function(){
    for(var n=1;n<=5;n++){
        $("#checkbox"+n).prop("checked",false)
    }
})

//外层立即订阅验证是否弹出遮罩层
var dingyue = document.getElementById('dingyue');
$("#dingyue").click(function(){
    if($("#dyphone").val() == ''){
        $("#errors").html("电话号码不能为空");
        $("#error").css({"color":"red"});
        $("#error").css({"display":"inherit"});
//        dingyue.setAttribute("data-target","");
    }else{
        var phone = /^1[34578]\d{9}$/;
        if(phone.test($("#dyphone").val())){
            $("#aphonets").html("");
            $("#error").css({"display":"none"});
            dingyue.setAttribute("data-target","#subscribe");
            $("#sphone").val($("#dyphone").val());
            //把选中的复选框提交到遮罩层内
            var aa = document.getElementsByName("notice");
            var ss = "";
            for (var i = 0; i < aa.length; i++) {
                if (aa[i].checked) {
                    ss += aa[i].value+',';
                }
            }
            ss =  ss.substr(0, ss.length - 1);
            $("#sfuxuan").val(ss);
            for(var n=0;n<ss.length;n++){
                $("#checkbox"+ss[n]).prop("checked",true)
            }

        }else{
            dingyue.setAttribute("data-target","");
            $("#error").css({"display":"inherit"});
            $("#error").css({"color":"red"});
            $("#errors").html("请输入正确的手机号码");
            $("#aphone").css({"border":"1px solid red"})
        }
    }
});

function sdingyue(){
    phone('sphone');
    if($('#sphone').val() != ''){
        code_submit('scode');
    }
    if($('#scode').val() != ''){
        smscode_submit('ssms_code');
    }
    //判断是否选中类型
    for(var che=0;che<5;che++){
        if($("input[name='box']:eq("+che+")").prop("checked")){
            var ked = 1;
        }
    }
    if(ked == 1){
        if($('#sphone').val() != '' && $('#scode').val() != '' && $('#scodets').html() == '' && $('#ssms_code').val() != ''){
            $.post(
                "/newhouse/type", {
                    typeid:3,
                    newhouseid:newhouseid,
                    newhousename:newhousename,
                    subtype:$("#sfuxuan").val(),
                    phone: $("#sphone").val(),
                    sms_code:$("#ssms_code").val()
                },
                function(msg){
                    if(msg == 1){
                        success_tips();
                    }else if(msg == 2){
                        already_applied();
                        changeimg();
                    }else{
                        $(".sms_codets").html("验证码不正确");
                    }
                });
        }
    }else{
        $("#check").html('你还没有勾选订阅内容');
    }
}
/*  立即订阅  */

//从新房首页跳转查看地图
<? if(isset($_GET["map"])){ ?>
    $("html,body").animate({scrollTop:1760},500);//跳转
<? } ?>
//从新房首页跳转查看户型
<? if(isset($_GET["house"])){ ?>
    $("#studio").attr("class","");
    $("#apartment").attr("class","active");
    $(".loupanimg1").css("display","none");
    $(".huxingimg1").css("display","inline-block");
    $("html,body").animate({scrollTop:1560},500);//跳转
<? } ?>


function goToLabel(obj)
{
    var _targetTop = $('#'+obj).offset().top;//获取位置  
    $("html,body").animate({scrollTop:_targetTop-50},300);//跳转
}

//flash 幻灯
$('#thumbs').delegate('img','mouseover', function(){
	$('#largeImage').attr('src',$(this).attr('src').replace('thumb','large'));
	//$('#description').html($(this).attr('alt'));
	$('.picborder').removeClass('active');
	$(this).parent().addClass('active');
});

//tab
$('.proj_tab').delegate('li','click', function(){
	$(this).siblings().removeClass('active');
	$(this).addClass('active');
	
	$(this).parent().parent().siblings().children('#'+$(this).attr('title')).css('display','');
	$(this).parent().parent().siblings().children('#'+$(this).attr('title')).siblings().css('display','none');
});

//组团看房倒计时
<?
$time = $OtherInfo['open_date'];;//开盘时间戳
$nowtime = time();//当前时间戳
if ($time>=$nowtime){
    $overtime = $time-$nowtime; //实际剩下的时间（单位/秒）
}else{
    $overtime=0;
}
 ?>
var runtimes = 0;
//function getrtime(){
//    var nMS = <?//=$overtime; ?>//*1000-runtimes*1000;
//
//    if (nMS>=0){
//        var nd=Math.floor(nMS/(1000*60*60*24))%24;
//        var nh=Math.floor(nMS/(1000*60*60))%24;
//        var nm=Math.floor(nMS/(1000*60)) % 60;
//        var ns=Math.floor(nMS/1000) % 60;
//        document.getElementById("day").innerHTML=nd;
//        document.getElementById("hour").innerHTML=nh;
//        document.getElementById("minute").innerHTML=nm;
//        document.getElementById("second").innerHTML=ns;
//        runtimes++;
//        if(nd==0){
//            //天数0 变为00
//            document.getElementById("day").innerHTML='00';
//            if(nh==0){
//                //数0 隐藏天数
//                document.getElementById("hour").innerHTML='00';
//                if(nm==0){
//                    document.getElementById("minute").innerHTML='00';
//                    if(ns==0){
//                        alert("倒计时完毕");
//                    }
//                }
//            }
//        }
//        setTimeout("getrtime()",1000);
//    }
//}
//window.onload = function() {
//    getrtime();
//}





</script>
</body>
</html>
