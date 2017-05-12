<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>买新房，找众房</title>

<!-- Bootstrap Core CSS -->
<link href="/theme/bootstrap.min.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="/theme/mtek_font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="/theme/fonts/font-lineicons.css" rel="stylesheet" type="text/css">

<!-- Theme CSS -->
<link href="/theme/agency/css/agency.css" rel="stylesheet">

<link rel="stylesheet" href="/js/vlightbox/vlb_files1/vlightbox1.css" type="text/css" />
<link rel="stylesheet" href="/js/vlightbox/vlb_files1/visuallightbox.css" type="text/css" media="screen" />

</head>
<style>
.tit-sub {
    line-height: 60px;
}
.tit-sub p{
	color:#999;
	}
.tit-sub p span{
	color:#999;
	}
.mr10 {
    margin-right: 10px;
}
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
.house_info .house_price .sale_note{background: url('/theme/agency/img/sale_note.png') no-repeat left center;}
.house_info .house_price .mor_cal{background: url('/theme/agency/img/mor_cal.png') no-repeat left center;}
.house_info label{color: #999;font-weight:normal;}

.house_openinfo{line-height:36px;width:100%;float:left; margin-top:2px;}
.house_openinfo h3 {font-size:18px;height: 20px;line-height: 20px;margin-top:15px;color:#f60}
.house_openinfo .link_map{margin-left: 16px;background: url('/theme/agency/img/map_icon.png') no-repeat left center;padding-left: 16px;}
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
#tab1,#tab2,#tab3{float:left;line-height:200%; text-indent:2em; margin-top:20px;}
#tab2 p{line-height:250%}
.tablist{margin-top:10px;}
.tablist li{float: left;overflow: hidden;padding: 0 10px;}
.tablist td{ text-indent:0.1em}
.tablist table tr{height:32px; margin-top:5px}
.map{height:300px;border: solid 1px #D1DCB2; margin-top:10px;}

.tit-name {
    font-size: 22px;
    font-family: Microsoft YaHei;
    font-weight: bold;
    line-height: 30px;
}
</style>
<body>
<!-- Navigation -->
<?php include '../../index/view/header.html.php';?>

<!-- Search -->
<div class="container">
	<div class="row">
        <div class="col-md-12">
        <h3 class="tit-name" id="j-triggerlayer">超甲楼盘地铁口 大气装修带家具 看上一切好商量</h3>
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
                    <dt class="gray6 zongjia1">租<span class="padl27"></span>金：<span class="red20b">20979</span><span class="black">元/月</span>(不含物业费)</dt>
                    <dt style="margin-left:0px"> 
                        <span class="red" style="font-size: 16px; color: #f30; font-family: Arial; padding-left: 62px;">2.1</span>
                        <span class="black">元/平米·天</span>(不含物业费)
                    </dt>
                    <dd class="gray6">建筑面积：<span class="black ">333㎡</span></dd>
                </dl>
    			<div class="phone_top">
        			<span><label id="mobilecode">15828619817</label></span>
    			</div>
    			<dl style=" clear:both;">
        			<dt>
            			<span class="gray6 ">楼盘名称：</span>
                        <a href="#" target="_blank" title="查看此楼盘的更多写字楼房源" id="A1">东方希望天祥广场写字楼</a> 
        			</dt>
        			<dt><span class="gray6">楼盘地址：</span>高新区天府大道中段500号</dt>
        			<dd><span class="gray6">所在楼层：</span>中区(共33层)</dd>
        			<dd><span class="gray6">物 业 费：17.00元/平米·月</span></dd>
        			<dd><span class="gray6">等<span class="padl27"></span>级：甲级</span></dd>
        			<dd><span class="gray6">装<span class="padl27"></span>修：</span>精装修</dd>
                    <dd><span class="gray6">类<span class="padl27"></span>型：</span>商业综合体楼</dd> 
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
                        <a href="#" class="laishanghai" target="_blank"><img class="iframe-img" src="../theme/agency/img/photo.jpg"></a>
                    </div>
                    <div class="p-del left">
                        <p class="p-01">张永</p>
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
.itemCon {
    font-size: 14px;
    color: #666;
    padding: 25px 25px 10px;
	font-family: "Microsoft YaHei","微软雅黑","Hiragino Sans GB",tahoma,arial,simhei;
}
.itemCon .litem {
    float: left;
    width: 40%;
}
.itemCon .ritem {
    float: left;
    width: 40%;
}
.itemCon li {
    padding-bottom: 15px;
}
.itemCon li span {
	float:left;
    width: 100px;
    line-height: 40px;
}
.itemCon li .desc {
    width: 300px;
    color: #333;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
    </style>    
    <!-- house second start -->
    <div class="row" id="detailBox">
        <div class="col-md-12">
            <div class="proj_info clearfix">
                <div class="proj_tab">
                    <ul>
                        <li title="tab1" class="active">房源描述</li>
                    </ul>
                </div>
                <div class="proj_tabbox">
                    <div id="tab1" style="text-indent:0;margin-top:0">
                    <div class="leftBox" id="hsPro-pos">
    <div class="describe mt10" id="house_des">
        <!-- 房源描述内容 -->
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
        
    </div>
</div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>  
    <!-- house pic start -->
    <div class="row" id="picBox">
        <div class="col-md-12">
            <div class="proj_info clearfix">
            <div class="proj_tab">
                <ul>
                    <li title="tab1" class="active">楼盘详情</li>
                </ul>
            </div>
            <div class="proj_tabbox">
                <div id="tab1" style="width:100%">
                	<div class="itemCon clearfix">
						<ul class="litem">
	                        <li>
	                        	<span>类型</span>
	                        	<span class="desc">纯写字楼</span>
	                        </li>
	                        <li>
	                        	<span>总楼层</span>
	                        	<span class="desc">20层</span></li>
	                        <li>
	                        	<span>竣工年月</span>
	                        	<span class="desc">2014年1月</span></li>
	                        <li>
	                        	<span>大堂层高</span>
	                        	<span class="desc">暂无数据</span></li>
	                        <li>
	                        	<span>空调类型</span>
	                        	<span class="desc">集中式中央空调</span>
	                        </li>
	                        <li>
	                        	<span>车位</span>
	                        	<span class="desc">暂无数据</span>
	                        </li>
	                    </ul>
	                    <ul class="ritem">
	                        <li>
	                        	<span>单层面积</span>
	                        	<span class="desc">1100m²</span>
	                        </li>
	                        <li>
	                        	<span>得房率</span>
	                        	<span class="desc">暂无数据</span>
	                        </li>
	                     <li>
	                        	<span>物业公司</span>
	                        	<span class="desc">四川通用物业管理有限公司</span>
	                        </li>
	                        <li>
	                        	<span>标准层高</span>
	                        	<span class="desc">暂无数据</span>
	                        </li>
	                        <li>
	                        	<span>电梯</span>
	                        	<span class="desc">客梯4部 货梯1部</span>
	                        </li>
	                        <li>
	                        	<span>是否涉外</span>
	                        	<span class="desc">是</span>
	                        </li>
	                    </ul>
					</div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        </div>
    </div>

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
