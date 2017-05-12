<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title><?=$this->config->module->name?></title>
<!-- Bootstrap Core CSS -->
<link href="/js/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Plugin Css -->
<link href="/js/vendor/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="/css/mtek_font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="/css/fonts/font-lineicons.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="/js/vendor/vlightbox/vlb_files1/vlightbox1.css" type="text/css" />
<link rel="stylesheet" href="/js/vendor/vlightbox/vlb_files1/visuallightbox.css" type="text/css" media="screen" />

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
i,em{font-style:normal}
h2,h3 {
    font-weight: normal;
}
.breadcrumb {
    background:none;
    list-style: none outside none;
    margin-bottom:5px;
    padding: 8px 10px 8px 0;
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
.tmark h2{
	font-size: 24px;
    font-family: Microsoft YaHei;
    font-weight: 500;
    line-height: 30px;
	margin-top:0;
}
	}
/*.mmark{margin-top:10px; height:18px;color:#666666;padding:0;}*/
.tel .fa-phone{color:#00ae66; width:1rem}
.tel span{color:#f60;}

.search-box .input-search {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-bottom-left-radius: 3px;
    border-color: #ccc -moz-use-text-color #ccc #ccc;
    border-image: none;
    border-style: solid none solid solid;
    border-top-left-radius: 3px;
    border-width: 1px 0 1px 1px;
    color: #999;
    float: left;
    font-size: 14px;
    line-height: 16px;
    overflow: hidden;
    padding: 8px 10px;
    width: 370px;
}
.search-box .btn-search {
    background: #f60 none repeat scroll 0 0;
    border: 0 none;
    border-bottom-right-radius: 3px;
    border-top-right-radius: 3px;
    color: #fff;
    cursor: pointer;
    float: left;
    font-size: 18px;
    height: 34px;
    letter-spacing: 4px;
    overflow: hidden;
    width: 120px;
}
.search-box .btn-search:hover {
    background: #db5700 none repeat scroll 0 0;
}
.search-box .f-int-focus {
    border-color: #f60 -moz-use-text-color #f60 #f60;
    border-right: 0 none;
    color: #333;
}

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
#thumbs .picborder{float:left;border: 1px solid gray; margin-right:5px;}
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
.lp-icons {
    background-image: url("/theme/agency/img/viewindex-icons-16.png");
    background-repeat: no-repeat;
    display: inline-block;
    font-size: 0;
    overflow: hidden;
    vertical-align: middle;
}

.inforTxt dl dt .mor_cal{background: url('/theme/agency/img/mor_cal.png') no-repeat left center;padding-left:20px; margin-left:20px;}
/* project detail */
.proj_info{border:1px solid #ddd;padding:20px; margin-top:20px; height:auto;background:#fff}
.proj_info h3 {font-size:16px;height: 20px;line-height: 20px;margin-top:15px;color:#888; font-weight:bold;}
.proj_tab{border-bottom:2px solid #888A89; padding:1px 20px 1px 0px; height:32px;}
.proj_tab li{float:left;padding:0 20px;color:#f60;font-size: 16px;font-weight: bold; line-height:27px; cursor:pointer; list-style:none;}
.proj_tab .active{border-bottom:4px solid #f60;}
#tab1,#tab2,#tab3{float:left;line-height:200%; text-indent:2em; margin-top:20px;}
#tab2 p{line-height:250%}
.tablist{margin-top:10px;}
.tablist li{float: left;overflow: hidden;padding: 0 10px;}
.tablist td{ text-indent:0.1em}
.tablist table tr{height:32px; margin-top:5px}
.map{height:300px;border: solid 1px #D1DCB2; margin-top:10px;}


.tit-sub p {
    color: #999;
}
.mr10 {
    margin-right: 10px;
}
</style>
<body>
<!-- Navigation -->
<?php include '../../index/view/header.html.php';?>

<!-- Search -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
           <ul class="breadcrumb">
               <li><a href="/">首页</a></li>
               <li><a href="/index/houseList">成都二手房</a></li>
               <li><a href="/index/houseList">武侯二手房</a></li>
               <li class="active">阳光名苑</li>
           </ul>
           <input type="hidden" id="layout_id" name="layout_id" value="{$info.id}" />
           <input type="hidden" id="project_name" name="project_name" value="{$info.project_name}" />
       </div>
<?php /*?>        <div class="col-md-6 search-box">
        	<form action="http://cd.fang.anjuke.com/loupan/s" method="GET" class="search-form">
                <input type="text" value="请输入楼盘名称、地址或房源特征" autocomplete="off" maxlength="100" name="kw" class="input-search" placeholder="请输入楼盘名称、地址或房源特征">
                <input type="submit" value="搜索" class="btn-search">
            </form>
        </div><?php */?>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
        	<div class="tmark">
                <h2 class="tit-name">电梯小高层，通透户型，临地铁3号线，带屋顶花园</h2>
            </div>
        </div> 
    </div>
    <div class="row">
    	<div class="col-md-12">
        	<div class="tit-sub">
            	<p class="gray9">
                        <span class="mr10">房源编号：173941903</span>
                        <span class="mr10"></span>
                        发布时间：2016/11/10 13:49:52
                </p>
            </div>
        </div>
    </div>
    <div class="row">
       <div class="col-md-12">
       <!-- house-guid start -->
       <div class="navbar navbar-default navbar-self">
        <ul class="nav navbar-nav">
          <!--<li><a href="#" onclick="goToLabel('propertyBox')">楼盘信息</a></li>-->
          <!--<li class="divider-vertical"></li>-->
          <li><a href="#" onclick="goToLabel('detailBox')">房源描述</a></li>
          <!--<li class="divider-vertical"></li>
          <li><a href="#" onclick="goToLabel('detailBox')">周边配套</a></li>-->
          <li class="divider-vertical"></li>
          <li><a href="#" onclick="goToLabel('picBox')">房源图片</a></li>
          <li class="divider-vertical"></li>
          <li><a href="#" onclick="goToLabel('picBox')">户型图</a></li>
          <li class="divider-vertical"></li>
          <li><a href="#" onclick="goToLabel('mapBox')">地图交通</a></li>
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
                <img id="largeImage" class="img-responsive" src="/theme/agency/img/12.png" onerror="doDefaultImg(this)"/>
                <div id="thumbs">
                    <div class="rongs">
                        <div class="picborder active"><img src="/theme/agency/img/12_m.png" alt="" /></div>
                    </div>
                    <div class="rongs">
                        <div class="picborder"><img src="/theme/agency/img/13_m.png" alt="" /></div>
                    </div>
                    <div class="rongs">
                        <div class="picborder"><img src="/theme/agency/img/12_m.png" alt="" /></div>
                    </div>
                    <div class="rongs">
                        <div class="picborder" style="margin-left:1px;"><img src="/theme/agency/img/12_m.png" alt="" /></div>
                    </div>
                    <div class="rongs">
                        <div class="picborder" style="margin-right:0px; margin-left:1px;"><img src="/theme/agency/img/12_m.png" alt="" /></div>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-md-4">
                <div class="inforTxt">
                    <dl>
                        <dt class="gray6 zongjia1">
                            总<span class="padl27"></span>价：<span class="red20b">130</span><span class="black">万</span>(9353元/㎡)
                            <a class="mor_cal" href="?do=tools">房贷计算器</a>
                        </dt>
                        <dd class="gray6">参考首付：<span class="black ">39万元</span></dd>
                        <dd class="gray6">参考月供：<span class="black ">4830元</span></dd>
                        <dd class="gray6">户型：<span class="black ">3室1厅1厨2卫</span></dd>
                        <dd class="gray6">建筑面积：：<span class="black ">139㎡</span></dd>
                    </dl>
                    <div class="phone_top">
                        <span><label id="mobilecode">13880101981</label></span>
                    </div>
                    <dl style=" clear:both;">
                        <dd><span class="gray6">年<span class="padl27"></span>代：</span>2005年</dd>
                        <dd><span class="gray6">所在楼层：</span>中区(共20层)</dd>
                        <dd><span class="gray6">结<span class="padl27"></span>构：</span>平层</dd>
                        <dd><span class="gray6">装<span class="padl27"></span>修：</span>精装修</dd>
                        <dd><span class="gray6">住宅类别：</span>普通住宅</dd>
                        <dd><span class="gray6">建筑类别：</span>板楼</dd>
                        <dd><span class="gray6">产权性质：</span>个人产权</dd>
                    </dl>
                    <dl style=" clear:both;">
                        <dt>
                            <span class="gray6">楼盘名称：</span>
                            <a class="bule" href="#" target="_blank" title="查看此楼盘的更多写字楼房源" id="A1">东方希望天祥广场写字楼</a> 
                        </dt>
                        <dt><span class="gray6">楼盘地址：</span>高新区天府大道中段500号</dt>
                    </dl>
                </div>
        </div>
<style>

.inforTxt dl dt,.inforTxt dl dd{
    line-height: 30px;
	font-size:13px;
	font-family: "Microsoft YaHei"!important;
}
.inforTxt dl dd {
	display:block;
    float: left;
	width:180px;
}
.phone_top {
    padding: 10px 0 2px;
    float: left;
    width: 350px;
}
.phone_top span {
    display: block;
    line-height: 36px;
    padding: 10px 20px 10px 66px;
    border: solid 1px #eee;
    background: url(../theme/agency/img/sprite_8_dy_1.png) no-repeat 10px 10px ;
    background-color: #f7f7f7;
    font-size: 28px;
    color: #62ab00;
}
.padl27 {
    padding-left: 25px;
}
.inforTxt dl dt{
	font-weight:100;
	color:#666;
	}
.gray6, .gray6 a {
    color: #666;
}
.red20b {
    font-size: 32px;
    color: #F60;
    font-family: Arial;
    padding-right: 5px;
    font-weight: bold;
}
.agent .agent-info .p-del p.p-01 {
    font-size: 30px;
    font-weight: bold;
	margin:0;
}
.agent .agent-info .agent-del {
    margin-right: 20px;
    height: auto;
}
.agent .agent-info .p-del p span {
    color: #888;
}
.agent .agent-info .p-del p .bold a{
    line-height: 22px;
    height: 22px;
    color: #335292;
}
.agent .agent-info .p-del p .bold a:hover {
    color: #f60;
    text-decoration: underline;
    outline: 0;
}
.icon_tel {
    display: inline-block;
    float: left;
    width: 40px;
    height: 40px;
    background: url(../theme/agency/img/ico_dy_1.png) no-repeat 0 0;
    margin-right: 5px;
	
}
a.broker_more {
	font-size:18px;
    display: block;
    height: 35px;
    line-height: 35px;
    color: #335292;
	width: 300px;
	text-align:center;
	margin-bottom:12px;
}
.unic-label .ban {
    background:url(../theme/agency/img/detail.png) -9px -116px no-repeat;
    width: 40px;
    height: 40px;
}
.unic-label .iinfo {
    font-family: microsoft Yahei;
    line-height: 18px;
    float: left;
    margin-left: 6px;
}
.unic-label .iinfo p{ margin:0;font-size:13px; }
.unic-label .iinfo .vote {
    cursor: pointer;
    color: #009de8;
    margin-left: 10px;
}
.p_icon {
    background: url(../theme/agency/img/sprite_8_dy_2.png) no-repeat 0 0;
}
.identity_verify {
    background-position: -21px 1px;
	display: inline-block;
    width: 22px;
    height: 20px;
    margin-right: 3px;
}
.company_verify {
    background-position: -53px 1px;
	display: inline-block;
    width: 22px;
    height: 20px;
    margin-right: 3px;
}
</style>
                <div class="col-md-3">
        	<div class="agent">
               <div class="agent-info">
                    <div class="agent-del left">
                        <a href="#" class="laishanghai" target="_blank"><img class="iframe-img" src="../theme/agency/img/photo_01.jpg"></a>
                    </div>
                    <div class="p-del left">
                        <p class="p-01">黄泳杰</p>
                        <p class="p-04"><span>经纪人</span></p>
                        <div><span class="p_icon identity_verify" title="已进行身份验证"></span>
                        <span class="p_icon company_verify" title="已进行公司验证"></span></div>
                        <p class="p-02"><span class="bold"><a href="#" target="_blank">康乐地产</a></span></p>
                        <p class="p-03"><span class="bold"><a href="#" target="_blank">康乐地产世纪城店</a></span></p>
                     </div>
               </div>
            </div>
            <div style="height:10px; clear:both;"></div>
            <a href="#" target="_blank" class="broker_more" >查看TA的更多房源</a>
            <div class="unic-label">
            	<div class="ban left"></div>
                <div class="iinfo"><p class="bold"><span>房源编号：</span><span>CDJJ92901932</span></p>
                	<p><span><a target="_blank" href="#">了解真房源</a></span><span class="vote"><a target="_blank" href="#">举报</a></span></p>
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
    
    <!-- house second start -->
    <div class="row" id="detailBox">
        <div class="col-md-12">
            <div class="proj_info clearfix">
                <div class="proj_tab">
                    <ul>
                        <li title="tab1" class="active">楼盘详情</li>
                        <!--<li title="tab2">周边配套</li>-->
                    </ul>
                </div>
                <div class="proj_tabbox">
                    <div id="tab1" style="text-indent:0;margin-top:0">
                    <!--详情描述-->
                    	<div onselectstart="return false;" style="-moz-user-select: none;">
            <p align="left" style="padding:0px;margin:3.75pt 0cm;color:#333333;line-height:2;font-family:宋体;list-style:none;font-size:14px;"><b><span style="font-size:22px;color:#00b050;">专做写字楼租赁，实地拍摄、看房接送。</span></b></p>
<p align="left" style="padding:0px;margin:3.75pt 0cm;color:#333333;line-height:2;font-family:宋体;list-style:none;font-size:14px;"><b><span style="font-size:18px;">我们公司是专做高新区写字楼租赁公司，高新区这边房源信息基本都有，每次看房都会给你准备5套以上类似房源，每次看房都会提前落实好每套房子情况。</span></b></p>
<p align="left" style="padding:0px;margin:3.75pt 0cm;color:#333333;line-height:2;font-family:宋体;list-style:none;font-size:14px;"><b><span style="font-size:22px;"><span style="color:#ff0000;">租金补贴年40元/㎡，年</span><b style="font-size:14px;"><span style="font-size:22px;color:#ff0000;">20元/㎡（60-40）</span></b></span></b></p>
<p align="left" style="padding:0px;margin:3.75pt 0cm;color:#333333;line-height:2;font-family:宋体;list-style:none;font-size:14px;"><b><span style="font-size:20px;color:#00b050;">楼盘介绍：</span></b></p>
<p align="left" style="padding:0px;margin:3.75pt 0cm;color:#333333;line-height:2;font-family:宋体;list-style:none;font-size:14px;"><b><span style="font-size:22px;color:red;"><span style="font-size:20px;color:#000000;">银泰，正对电梯口，一号线金融城地铁口，超高信价比。</span><br>
</span></b></p>
<p align="left" style="padding:0px;margin:3.75pt 0cm;color:#333333;line-height:2;font-family:宋体;list-style:none;font-size:14px;"><b><span style="font-size:20px;color:#00b050;">房屋介绍：</span></b></p>
<p align="left" style="padding:0px;margin:3.75pt 0cm;color:#333333;line-height:2;font-family:宋体;list-style:none;font-size:14px;"></p>
<p align="left" style="padding:0px;margin:3.75pt 0cm;color:#333333;line-height:2;font-family:宋体;list-style:none;font-size:14px;"><b><span style="font-size:22px;text-decoration:underline;">前台很大气，</span></b><b><span style="font-size:22px;text-decoration:underline;">空调,24自由控制。高区房源，采光视野*，一点都不压抑。</span></b></p>
<p align="left" style="padding:0px;margin:3.75pt 0cm;color:#333333;line-height:2;font-family:宋体;list-style:none;font-size:14px;background : initial;background-attachment:initial;background-size:initial;background-origin:initial;background-clip:initial;background-position:initial;background-repeat:initial;"></p>
<p align="left" style="padding:0px;margin:3.75pt 0cm;color:#333333;line-height:2;font-family:宋体;list-style:none;font-size:14px;background : initial;background-attachment:initial;background-size:initial;background-origin:initial;background-clip:initial;background-position:initial;background-repeat:initial;"><b><span style="font-size:15pt;color:#00b050;">温馨提示：</span></b></p>
<p align="left" style="padding:0px;margin:3.75pt 0cm;color:#333333;line-height:2;font-family:宋体;list-style:none;font-size:14px;background : initial;background-attachment:initial;background-size:initial;background-origin:initial;background-clip:initial;background-position:initial;background-repeat:initial;"><b><span style="font-size:15pt;color:#0c0c0c;">1.</span></b><b><span style="font-size:15pt;color:#0c0c0c;">如果您租房的时间短（</span></b><b><span style="font-size:15pt;color:#0c0c0c;">1-2</span></b><b><span style="font-size:15pt;color:#0c0c0c;">年），建议您找精装房；</span></b><b><span style="font-size:15pt;color:#0c0c0c;"><br>
</span></b><b><span style="font-size:15pt;color:#0c0c0c;">2.</span></b><b><span style="font-size:15pt;color:#0c0c0c;">如果您打算租房长期（</span></b><b><span style="font-size:15pt;color:#0c0c0c;">3-5</span></b><b><span style="font-size:15pt;color:#0c0c0c;">年以上），建议您自己装修，不要怕麻烦，提前两三个月可以装修成：您想要的风格与符合贵公司的气质；</span></b><b><span style="font-size:15pt;color:#0c0c0c;"><br>
</span></b><b><span style="font-size:15pt;color:#0c0c0c;">3.</span></b><b><span style="font-size:15pt;color:#0c0c0c;">清水房价格比精装房的价格低：</span></b><b><span style="font-size:15pt;color:#0c0c0c;">20-35</span></b><b><span style="font-size:15pt;color:#0c0c0c;">元</span></b><b><span style="font-size:15pt;color:#0c0c0c;">/</span></b><b><span style="font-size:15pt;color:#0c0c0c;">月</span></b><b><span style="font-size:15pt;color:#0c0c0c;">/</span></b><b><span style="font-size:15pt;color:#0c0c0c;">平米左右；</span></b><b><span style="font-size:15pt;color:#0c0c0c;"><br>
</span></b><b><span style="font-size:15pt;color:#0c0c0c;">4.</span></b><b><span style="font-size:15pt;color:#0c0c0c;">当您租期（</span></b><b><span style="font-size:15pt;color:#0c0c0c;">3-5</span></b><b><span style="font-size:15pt;color:#0c0c0c;">年）合同终止时，您使用的家具（不想带走），还可以折给二手家具市场。</span></b></p>
        </div>
                        <!--<div class="tablist">
                        	<h3><i class="fa fa-tags"></i> 基本信息</h3>
                            <ul class="clearfix">
                                <li class="col-md-4">
                                   <label>物业类别：</label>
                                   <span>普通住宅</span>
                                </li>
                                <li class="col-md-4">
                                   <label>项目特色：</label>
                                   <span>低总价</span>
                                </li>
                                <li class="col-md-4">
                                   <label>建筑类别：</label>
                                   <span>塔楼 高层 </span>
                                </li>
                                <li class="col-md-4">
                                   <label>装修状况：</label>
                                   <span>毛坯 </span>
                                </li>
                                <li class="col-md-4">
                                   <label>工程进度：</label>
                                   <span>在建 </span>
                                </li>
                                <li class="col-md-4">
                                   <label>产权年限：</label>
                                   <span>70年</span>
                                </li>
                                <li class="col-md-4">
                                   <label>环线位置：</label>
                                   <span>绕城以外</span>
                                </li>
                                <li class="col-md-4">
                                   <label>电梯配置：</label>
                                   <span>客梯10部</span>
                                </li>
                                <li class="col-md-4">
                                   <label>标准层面积：</label>
                                   <span>2000平方米</span>
                                </li>
                                <li class="col-md-4">
                                   <label>商业面积：</label>
                                   <span>8000平方米</span>
                                </li>
                                <li class="col-md-4">
                                   <label>办公面积：</label>
                                   <span>45846平方米</span>
                                </li>
                                <li class="col-md-4">
                                   <label>开 发 商：</label>
                                   <span>成都同森投资集团</span>
                                </li>
                                <li class="col-md-4">
                                   <label>楼盘地址：</label>
                                   <span>广场路（技师学院对面）</span>
                                </li>
                            </ul>
                            <h3><i class="fa fa-tags"></i> 销售信息</h3>
                            <ul class="clearfix">
                                <li class="col-md-4">
                                   <label>销售状态：</label>
                                   <span>待售</span>
                                </li>
                                <li class="col-md-4">
                                   <label>楼盘优惠：</label>
                                   <span>暂无</span>
                                </li>
                                <li class="col-md-4">
                                   <label>开盘时间：</label>
                                   <span>暂无资料<a class="item-a" target="_blank" href="#">[开盘时间详情]</a></span>
                                </li>
                                <li class="col-md-4">
                                   <label>交房时间：</label>
                                   <span></span>
                                </li>
                                <li class="col-md-4">
                                   <label>售楼地址：</label>
                                   <span>成都郫县广场路（技师学院对面）</span>
                                </li>
                                <li class="col-md-4">
                                   <label>售楼电话：</label>
                                   <span>400-890-0000 转 821926</span>
                                </li>
                                <li class="col-md-4">
                                   <label>在售户型：</label>
                                   <span>
                                   <a href="#">三居(3)</a>
                                   <a href="#">四居(12)</a>
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
                                   <span>130802平方米</span>
                                </li>
                                <li class="col-md-4">
                                   <label>建筑面积：</label>
                                   <span>568395平方米</span>
                                </li>
                                <li class="col-md-4">
                                   <label>容积率：</label>
                                   <span>3.00</span>
                                </li>
                                <li class="col-md-4">
                                   <label>绿化率：</label>
                                   <span>35%</span>
                                </li>
                                <li class="col-md-4">
                                   <label>停车位：</label>
                                   <span>共计1081个</span>
                                </li>
                                <li class="col-md-4">
                                   <label>楼栋总数：</label>
                                   <span>2栋</span>
                                </li>
                                <li class="col-md-4">
                                   <label>总户数：</label>
                                   <span>1609户</span>
                                </li>
                                <li class="col-md-4">
                                   <label>物业公司：</label>
                                   <span>成都同森物业管理有限公司</span>
                                </li>
                                <li class="col-md-4">
                                   <label>物业费：</label>
                                   <span>2.10元/平方米·月</span>
                                </li>
                                <li class="col-md-8">
                                   <label>楼层状况：</label>
                                   <span>一期住宅2栋，共33层，2梯6户，户型建面78-105平米</span>
                                </li>
                            </ul>
                        </div>-->
                    </div>
                    
                    <!--<div style="display: none;" id="tab2">
                            <p><span style="font-weight:600;padding-right:5px;">商场:</span>洋浩广场，红日子购物广场，沃尔玛购物超市，宏达商场，福岭超市，美宜多连锁超市(金碧路)，惠万家生活超市，佳宜生活超市八卦岭店，八卦岭净菜超市，平方超市，佳林百货，安达明超市，</p>
                            <p><span style="font-weight:600;padding-right:5px;">邮局:</span>宅急送(八卦岭营业部)，红岗速递部，中国邮政(上林代办所)，中国邮政(泥岗代办所)，</p>
                            <p><span style="font-weight:600;padding-right:5px;">银行:</span>中国光大银行(八卦岭支行)，中国农业银行(深圳八卦岭支行)，招商银行(深圳鹏基商务支行)，平安银行(平安大厦店)，中信银行(深圳八卦岭支行)，交通银行(八卦岭支行)，中国农业银行(红岭北路支行)，中国工商银行(八卦岭支行)，招商银行(深圳八卦岭支行)，中国建设银行(深圳八卦岭支行)，</p>
                            <p><span style="font-weight:600;padding-right:5px;">医院:</span>粤康中医，益元堂，深圳弘林门诊部，深圳友谊医院白癜风治疗基地，深圳流花医院二门诊部，流花医院(八卦四路店)，深圳友谊医院，广州军区总医院共建医院，深圳市园岭医院，深圳市第四人民医院(福田医院)，</p>
                            <p><span style="font-weight:600;padding-right:5px;">学校:</span>深圳市坭岗幼儿园，暨南大学深圳教学点，南开大学深圳函授站，华南师范大学深圳教学点，深圳市第三职业技术学校，广东外语外贸大学深圳教学点，深圳市罗湖区侨香学校，深圳市凤光小学，深圳市银湖学校，深圳中学(泥岗校区)，</p>
                            <p><span style="font-weight:600;padding-right:10px;">酒店:</span>神一宾馆，荣登客栈，7天连锁酒店(深圳八卦三路店)，维也纳酒店(八卦路店)，华和酒店，米欧伯爵酒店，深圳卡帝亚精品酒店，上林苑酒店，如家快捷酒店(深圳八卦岭红岭北路店)，莫泰168酒店(深圳红岭店)，</p>
                            <p><span style="font-weight:600;padding-right:5px;">景点:</span>卡莱雅手绘艺术馆，孔雀艺术公馆，深圳一号美术馆，多喜乐儿童乐园（泥岗店），林向明艺术馆，博登顺达展览，CS野战，泥岗社区公园，</p>
                    </div>-->
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
                    <li title="tab1" class="active">楼盘相册</li>
                    <!--li title="tab2">&nbsp;&nbsp;&nbsp;&nbsp;实景图</li-->
                    <li title="tab3">&nbsp;&nbsp;&nbsp;&nbsp;户型图</li>
                </ul>
            </div>
            <div class="proj_tabbox">
                <div id="tab1" style="width:100%">
                	<div id="esfcdxq_116">
                        <div style="float:left" class="imgHover_2013">
                            <a href="#" target="_blank">
                                <img src="http://cdnsfb.soufunimg.com/viewimage/1/2016_7/13/M17/52/81b9f27b1f914c64a811904b57312d61/600x600.jpg" alt="室内图" >
                            </a>
                        </div>
                        <div style=" clear:both;"></div>
                        <p>南城都汇室内图</p>         
            
                        <div style="float:left" class="imgHover_2013">
                            <a href="#" target="_blank">
                                <img src="http://cdnsfb.soufunimg.com/viewimage/1/2016_7/13/M17/52/81b9f27b1f914c64a811904b57312d61/600x600.jpg" alt="室内图" >
                            </a>
                        </div>
                        <div style=" clear:both;"></div>
                        <p>南城都汇室内图</p>                             
					</div>
                    <!--<div class="col-md-3 img-portfolio" style="margin-bottom:20px;">
                        <a class="vlightbox1" href="/theme/agency/img/210x140m.jpg" title="">
                        <img src="/theme/agency/img/210x140m.jpg" class="img-responsive img-hover">
                        </a>
                    </div>-->
                </div>
                <!--div id="tab2" style="display:none">
                    {section name=a loop=$allphoto}
                    {if $allphoto[a].code == '21003' }
                    <img src="{$allphoto[a].url|replace:'.':'_m.'|default:'/ui/images/pic_default.jpg'}" class="img-polaroid" title="{$allphoto[a].title}">
                    {/if}
                    {/section}
                </div-->
                <div id="tab3" style="display:none;width:100%">
                    <div class="col-md-3 img-portfolio" style="margin-bottom:20px;">
                        <a class="vlightbox1" href="/theme/agency/img/hx_m.jpg" title="{$allphoto[a].title}">
                        <img src="/theme/agency/img/hx_s.jpg" class="img-responsive img-hover">
                        </a>
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
						<p>地铁：7、9号线,距7、9号线红岭北站200米。</p>
                        <p>公交：57路,69路,79路,85路,123路,222路,237路,242路,321路,336路,375路,385路,b615路,e8路,k105路,m360路,m463路,n16路,n17路,n25路,高峰专线13路,高峰专线33路,高快巴士9路,24路,207路,218路5路,m389</p>
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
        <div class="col-md-2 guess-item clearfix">              
            <a target="_blank" rel="nofollow" href="#">
                <img width="170" height="125" src="/theme/agency/img/133x100m.jpg">
                <p class="g-name">温江-锦汇城</p>
                <p class="g-price"><em>4250</em>元/㎡</p>
            </a>
        </div>
        
        <div class="col-md-2 guess-item clearfix">              
            <a target="_blank" rel="nofollow" href="#">
                <img width="170" height="125" src="/theme/agency/img/133x100m.jpg">
                <p class="g-name">温江-锦汇城</p>
                <p class="g-price"><em>4250</em>元/㎡</p>
            </a>
        </div>
        <div class="col-md-2 guess-item clearfix">              
            <a target="_blank" rel="nofollow" href="#">
                <img width="170" height="125" src="/theme/agency/img/133x100m.jpg">
                <p class="g-name">温江-锦汇城</p>
                <p class="g-price"><em>4250</em>元/㎡</p>
            </a>
        </div>
        <div class="col-md-2 guess-item clearfix">              
            <a target="_blank" rel="nofollow" href="#">
                <img width="170" height="125" src="/theme/agency/img/133x100m.jpg">
                <p class="g-name">温江-锦汇城</p>
                <p class="g-price"><em>4250</em>元/㎡</p>
            </a>
        </div>
        <div class="col-md-2 guess-item clearfix">              
            <a target="_blank" rel="nofollow" href="#">
                <img width="170" height="125" src="/theme/agency/img/133x100m.jpg">
                <p class="g-name">温江-锦汇城</p>
                <p class="g-price"><em>4250</em>元/㎡</p>
            </a>
        </div>
        <div class="col-md-2 guess-item clearfix">              
            <a target="_blank" rel="nofollow" href="#">
                <img width="170" height="125" src="/theme/agency/img/133x100m.jpg">
                <p class="g-name">温江-锦汇城</p>
                <p class="g-price"><em>4250</em>元/㎡</p>
            </a>
        </div>
        
    </div>
</div>

<!-- Footer -->
<?php include '../../index/view/footer.html.php';?>

<!-- jQuery --> 
<script src="/js/jquery.min.js"></script> 

<!-- Bootstrap Core JavaScript --> 
<script src="/js/bootstrap.min.js"></script> 

<!-- Plugin JavaScript --> 
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.4"></script>
<script type="text/javascript" src="/js/baidu_new.js"></script>

<!-- main JavaScript -->
<script src="/theme/agency/js/agency.js"></script> 

<script src="/js/vlightbox/vlb_engine/visuallightbox.js" type="text/javascript"></script>
<script src="/js/vlightbox/vlb_engine/vlbdata1.js" type="text/javascript"></script>

<script>
var houseid = 3327;
$(document).ready(function(){
	try 
	{
		 // 初始化地图，设置中心点坐标和地图级别
		var map = new BMap.Map("map");          // 创建地图实例
			var houseid = 3327;
			var _point_x = 104.072251;
			var _point_y = 30.663455;
			var title = '英伦';
			_point_x = 104.073167;
			_point_y = 30.661777;
				
			var point = new BMap.Point(_point_x, _point_y);  // 创建点坐标   //根据给定的坐标点设置
			var Icon = new BMap.Icon( "http://map.baidu.com/image/markers_new.png",new BMap.Size(22, 30),{
				imageOffset: new BMap.Size(0, 0),anchor:new BMap.Size(10,10)
			});
			var marker = new ComplexCustomOverlay(new BMap.Point(_point_x,_point_y), title,title,'');
			map.centerAndZoom(point, 18);map.addControl(new BMap.NavigationControl());
			map.addOverlay(marker);
	} 
	catch (e) 
	{ 
	
	}   
}); 
    
function goToLabel(obj)
{
    var _targetTop = $('#'+obj).offset().top;//获取位置  
    $("html,body").animate({scrollTop:_targetTop},300);//跳转  
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
</script>
</body>
</html>
