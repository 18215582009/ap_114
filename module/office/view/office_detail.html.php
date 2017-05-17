<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>写字楼出售_<?=$this->config->siteName;?></title>

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
    .tit-name {font-size: 22px;  font-family: Microsoft YaHei;  font-weight: bold;  line-height: 30px;  }
    .p_icon {background: url(../theme/agency/img/sprite_8_dy_2.png) no-repeat 0 0;}
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

    /* inforTxt */
    .inforTxt{font-size:16px;color:#000}
    .inforTxt dl dt,.inforTxt dl dd{line-height: 36px;font-size:16px;font-family: "Microsoft YaHei"!important;}
    .inforTxt dl dt{font-weight:100;color:#000;}
    .inforTxt dl dd {  display: block;  float: left;  width: 275px;  }
    .inforTxt dl dt .mor_cal{  background: url('/theme/agency/img/mor_cal.png') no-repeat left center;  padding-left: 20px;  margin-left: 20px;}
    .gray9{color:#999999;}
    .gray6{color:#666666;font-size: 13px;}
    .red28b {font-size: 28px;color: #E51400;font-family: Arial;padding-right: 5px;  font-weight: bold;}
    .red20b{font-size:18px;color:#E51400;}

    /* agent css */
    .agent{background: #eee;width:100%;height: 100%}
    .agent .agent-info .iframe-img{padding:10px 0 0 20px}
    .agent .agent-info .agent-del{margin-right:20px;height:auto;}
    .agent .agent-info .p-del p.p-01 {font-size: 30px;font-weight: bold;margin:0;}
    .agent .agent-info .p-del p span {color: #888;}
    .agent .agent-info .p-del p .bold a{line-height: 20px;  height: 20px;  color: #335292;}
    .agent .agent-info .p-del p .bold a:hover {color: #f60;  text-decoration: underline;  outline: 0;}
    .identity_verify {background-position: -21px 1px;display: inline-block;width: 22px;height: 20px;margin-right: 3px;}
    .company_verify {  background-position: -53px 1px;display: inline-block;width: 22px;height: 20px;margin-right: 3px;}
    .broker_shop {height: 42px;background-color: #EEE;  line-height: 42px;padding: 0 17px;white-space: nowrap;width: 100%;border-top: 2px solid #fff;
    }
    .broker_shop a {font-size: 12px;color: #666;  }
    .broker_shop a:hover {color: #f60;  }
    .phone_top {float: left;width: 100%}
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

    /* houseInfo detail */
    .houseInfo{font-size:16px;color:#000}
    .block-title {font-size:20px;font-weight:bold;line-height:44px;margin-top:39px;padding-bottom:2px;overflow:hidden;  }
    .houseInfo-title {margin: 15px 0 16px; border-bottom: 1px solid #e6e6e6;  }
    .houseInfo-title span {float: right;font-size: 12px;margin-top: 3px;font-weight: normal;color: #999;  }
    .houseInfo .first-col {width: 410px;}
    .houseInfo .second-col {width: 410px;}
    .houseInfo a {  color: #2666b2;  font-size: 14px;  }
    .houseInfo dl{float: left;margin-bottom: 7px;font-size:16px;}
    .houseInfo dt, .houseInfo dd {float:left;line-height:36px;overflow:hidden;white-space: nowrap;text-overflow:ellipsis;font-family: "Microsoft YaHei"!important;}
    .houseInfo dl dt{font-weight:100;color:#999;padding-right: 4px;}
    .houseInfo dl dd {padding-right: 12px;float: left;}
    .houseInfo dd p {  float: left;  overflow: hidden;  white-space: nowrap;  text-overflow: ellipsis;  }
    .houseInfo .first-col dd {width: 325px; ;  }
    .houseInfo .second-col dd {width: 325px;  }

    .map{height:300px;margin-top:10px;}
</style>
<body>
<!-- Navigation -->
<?php include '../../index/view/header.html.php';?>

<!-- Search -->
<div class="container">
        <div class="row mbm">
        <div class="col-md-6">
           <ul class="breadcrumb">
               <li><a href="/">FC114乐山站</a></li>
               <li class="active">写字楼出租</li>
           </ul>
           <input type="hidden" value="{$info.id}" name="layout_id" id="layout_id">
           <input type="hidden" value="{$info.project_name}" name="project_name" id="project_name">
       </div>
        <div class="col-md-6 search-box">
            <form class="search-form right" method="GET" action="#">
                <input type="text" placeholder="请输入项目名称称或地址..." class="input-search" name="kw" maxlength="100" autocomplete="off" value="">
                <input type="submit" class="btn-search" value="搜索">
            </form>
        </div>



	<div class="row">
        <div class="col-md-12">
        <h3 class="tit-name" id="j-triggerlayer"><?=$get_desc['name']?></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tit-sub">
            	<p class="gray9">
                    <span class="mr10">房源编号：<?=$get_desc['keeper_uid']?></span>
                    <span class="mr10"></span>发布时间：<?=$get_desc['create_date']?>
                </p>
            </div>
        </div>
    </div>

    <!-- office start -->
    <div class="row">
        <div class="col-md-9">
            <!-- office info -->
            <div class="row">
                <div class="col-md-7" style="width: 55.66666666%">
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
                <div class="col-md-5" style="width: 44.33333333%">
                    <div class="inforTxt clearfix">


                        <dl>
                         
                            <dt>
                                <span class="gray9">租<span class="plxl"></span>金：</span>
                                <span class="red28b">20979</span>
                                <span>元/月</span>
                                <span class="gray6">(不含物业费)</span>
                            </dt>
                            <dt style="margin-left:0px">
                                <span class="plxxl mlxxl red20b">2.1</span>
                                <span class="black">元/m²·天</span>
                                <span class="gray6">(不含物业费)</span>
                            </dt>
                            <dt><span class="gray9">面<span class="plxl"></span>积：</span><span><?=$get_desc['total_area']?> m²</span></dt>
                        </dl>

                        <dl style=" clear:both;">
                            <dt>
                                <span class="gray9 ">楼盘名称：</span>
                                <a href="#" target="_blank" title="查看此楼盘的更多写字楼房源" id="A1"><?=$get_desc['name']?></a>
                            </dt>
                            <dt><span class="gray9">地<span class="plxl"></span>址：</span><?=$get_desc['sale_addresss']?></dt>
                            <dd><span class="gray9">所在楼层：</span><?=$get_desc['structure']?></dd>
                            <dd><span class="gray9">物<span class="plm"></span>业<span class="pls"></span>费：</span><span class="red20b">17.00</span>元/m²·月</dd>
                            <dd><span class="gray9">等<span class="plxl"></span>级：</span>甲级<?=$get_desc['level']?></dd>
                            <dd><span class="gray9">装<span class="plxl"></span>修：</span>精装修</dd>
                            <dd><span class="gray9">类<span class="plxl"></span>型：</span><?=$get_desc['pm_type']?></dd>
                        </dl>
                    </div>
                </div>
            </div>

            <!-- office simaple start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="houseInfo">
                        <h4 class="block-title houseInfo-title">楼盘信息</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="first-col left">
                                    <dl><dt>类型：</dt><dd><?=$get_desc['pm_type']?></dd></dl>
                                    <dl><dt>总楼层：</dt><dd>20层</dd></dl>
                                    <dl><dt>建筑年月：</dt><dd><?=$get_desc['build_year']?></dd></dl>
                                    <dl><dt>大堂层高：</dt><dd>暂无数据</dd></dl>
                                    <dl><dt>空调类型：</dt><dd>集中式中央空调</dd></dl>
                                    <dl><dt>车位：</dt><dd><?=$get_desc['parking']?></dd></dl>
                                </div>

                                <div class="second-col left">
                                    <dl><dt>单层面积：</dt><dd>1100m²</dd></dl>
                                    <dl><dt>得房率：</dt><dd>暂无数据</dd></dl>
                                    <dl><dt>物业公司：</dt><dd><?=$get_desc['manage_company']?></dd></dl>
                                    <dl><dt>标准层高：</dt><dd>暂无数据</dd></dl>
                                    <dl><dt>电梯：</dt><dd>客梯4部 货梯1部</dd></dl>
                                    <dl><dt>是否涉外：</dt><dd>是</dd></dl>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- office desc start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="houseInfo">
                        <h4 class="block-title houseInfo-title">
                            <i class="iconsindex i-home">&nbsp;</i> 房源描述
                        </h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="desc-con">
                                    <p>	
                                        <b><span style="font-size:16px;">占地面积：</span></b>
                                         <span style="font-size:16px;">204亩（共A、B、C、D四块地）</span>
                                    </p>
                                    <p>	
                                            <b><span style="font-size:16px;">建筑面积：</span></b>
                                            <span style="font-size:16px;">60万平方</span>
                                    </p>
                                     <p>
                                        <b><span style="font-size:16px;">项目物业：</span></b>
                                        <span style="font-size:16px;">苏州工业园区置信物业服务有限公司成都分公司</span>
                                    </p>
                                        <p>
                                        	<b><span style="font-size:16px;">交通情况：</span></b>
                                            <span style="font-size:16px;">紧邻武侯大道、成双大道两条城市级主干道，横向主路三环路，进出城均十分便利。</span>
                                        </p>
                                         <p><b><span style="font-size:16px;">地铁情况：</span></b>
                                            <span style="font-size:16px;color:#E53333;">3号线、10号线位于项目800米直线*，标准地铁物业。</span>
                                        </p>
                                        <p>	
                                                <b><span style="font-size:16px;">购物配套：</span></b>
                                                <span style="font-size:16px;"> 10*车程到大悦城、15*车程到龙湖金楠天街。</span>
                                                <b><span style="font-size:16px;">自身涵盖</span></b>
                                                <b><span style="font-size:16px;">60</span></b>
                                                <b><span style="font-size:16px;">万方超大商业综合体集群，楼下即是</span></b>
                                                <b><span style="font-size:16px;">15</span></b>
                                                <b><span style="font-size:16px;">万方的红星美凯龙欧丽洛雅旗舰店与</span></b>
                                                <b><span style="font-size:16px;">10</span></b>
                                                <b><span style="font-size:16px;">万方的爱琴海购物公园以及</span></b>
                                                <b><span style="font-size:16px;">15</span></b>
                                                <b><span style="font-size:16px;">万方“穿巷子”体验式步行街。</span></b>
                                        </p>

                                            <p>	
                                                <b><span style="font-size:16px;color:#006600;">休闲娱乐：</span></b>
                                                <span style="font-size:16px;color:#006600;">楼下即是15万方商业步行街、步行5*即可到千盛百货、兰庭酒店、宴会厅等...</span></p>
                                                <p>	<b><span style="font-size:16px;color:#006600;">教育：</span></b>
                                                    <span style="font-size:16px;color:#006600;">龙江路小学、成都石室外国语实验学校、金花实验中学、光明中学等...</span>
                                                </p>
                                         <p>	<b><span style="font-size:16px;color:#006600;">医疗：</span></b><span style="font-size:16px;color:#006600;">武候区第三人民医院、武候区新城医院、省军官医院等...</span></p><p>	<span style="font-size:16px;color:#006600;"></span></p><p>	<b><span style="font-size:16px;">二、在售项目信息</span></b></p><p>	<span style="font-size:16px;">C地块总面积：</span><span style="font-size:16px;">14</span><span style="font-size:16px;">万方</span></p><p>	<span style="font-size:16px;">在售楼栋：</span><span style="font-size:16px;">C</span><span style="font-size:16px;">地块</span><span style="font-size:16px;"> 2</span><span style="font-size:16px;">号楼（总面积：</span><span style="font-size:16px;">21143.95</span><span style="font-size:16px;">㎡；其中商业：</span><span style="font-size:16px;">8936.72</span><span style="font-size:16px;">㎡，写字楼：</span><span style="font-size:16px;">11755.8</span><span style="font-size:16px;">㎡）</span></p><p>	<span style="font-size:16px;">总层数：</span><span style="font-size:16px;">-1F/10F</span><span style="font-size:16px;">（工程进度：已建到</span><span style="font-size:16px;">9</span><span style="font-size:16px;">层，即将封顶）</span></p><p>	<span style="font-size:16px;">单层面积：</span><span style="font-size:16px;">5F-9F</span><span style="font-size:16px;">约：1974.15㎡；</span><span style="font-size:16px;"> 10F</span><span style="font-size:16px;">约：1978.89㎡</span></p><p>	<span style="font-size:16px;">电梯品牌：迅达（电梯载重：</span><span style="font-size:16px;">1000KG</span><span style="font-size:16px;">、</span><span style="font-size:16px;">1150KG</span><span style="font-size:16px;">、</span><span style="font-size:16px;">1600KG</span><span style="font-size:16px;">）</span></p><p>	<span style="font-size:16px;">梯户比：</span><span style="font-size:16px;">4T33</span><span style="font-size:16px;">户</span></p><p>	<span style="font-size:16px;">楼板荷载：</span><span style="font-size:16px;">2.0KN/</span><span style="font-size:16px;">㎡</span></p><p>	<span style="font-size:16px;">用电配置：</span><span style="font-size:16px;">220V/380V</span></p><p>	<span style="font-size:16px;">外立面材质：玻璃幕墙、陶土板、铝板、涂料</span></p><p>	<span style="font-size:16px;">内廊材质：地砖、涂料、石膏板</span></p><p>	<span style="font-size:16px;">土地性质：商业</span></p><p>	<span style="font-size:16px;">土地使用年限：</span><span style="font-size:16px;">40</span><span style="font-size:16px;">年</span></p><p>	<span style="font-size:16px;">物业费：</span><span style="font-size:16px;"> 2.5/</span><span style="font-size:16px;">㎡</span><span style="font-size:16px;">/</span><span style="font-size:16px;">月</span></p><p>	<span style="font-size:16px;">交房装修标准：水泥砂浆、混合砂浆（公共区域地砖、石材、涂料、石膏板吊顶）</span></p><p>	<span style="font-size:16px;">交房时间：</span><span style="font-size:16px;">2017</span><span style="font-size:16px;">年</span><span style="font-size:16px;">12</span><span style="font-size:16px;">月</span><span style="font-size:16px;">26</span><span style="font-size:16px;">日</span></p><p>	<span style="font-size:16px;">在售面积：</span><span style="font-size:16px;">41</span><span style="font-size:16px;">㎡、</span><span style="font-size:16px;">55</span><span style="font-size:16px;">㎡、</span><span style="font-size:16px;">96</span><span style="font-size:16px;">㎡</span></p><p>	<span style="font-size:16px;">水电费标准：水：</span><span style="font-size:16px;">4.13-4.43/</span><span style="font-size:16px;">吨；电：</span><span style="font-size:16px;">0.75-1.2/</span><span style="font-size:16px;">度</span></p><p>	<b><span style="font-size:16px;color:#009900;">商业*入户条件：</span><span style="font-size:16px;color:#009900;">30</span><span style="font-size:16px;color:#009900;">万以上。</span></b></p><p>	<span style="font-size:16px;color:#009900;">*政策：享交2</span><span style="font-size:16px;color:#009900;">万团购费抵</span><span style="font-size:16px;color:#009900;">5</span><span style="font-size:16px;color:#009900;">万*</span></p><p>	<span style="font-size:16px;color:#009900;">特惠价格：</span><b><span style="font-size:16px;color:#009900;">5800</span></b><b><span style="font-size:16px;color:#009900;">-</span></b><b><span style="font-size:16px;color:#009900;">6000</span></b><span style="font-size:16px;color:#009900;">左右</span><span style="font-size:16px;color:#009900;">/</span><span style="font-size:16px;color:#009900;">㎡</span></p><p>	<span style="font-size:16px;"></span></p><p>	<span style="font-size:16px;"></span></p><p>	<b><span style="font-size:16px;">三、业态*重点、回率及户型</span></b></p><p>	<span style="font-size:16px;">业态*重心：多功能*为主</span></p><p>	<span style="font-size:16px;">5F：空中商铺，可经营液态：网店、私房菜、私人影院、培训学校、私人医院等……</span></p><p>	<span style="font-size:16px;">10F：写字楼</span></p><p>	<b><span style="font-size:24px;color:#E53333;">回率：年收益率</span></b><b><span style="font-size:24px;color:#E53333;">7%</span></b><b><span style="font-size:24px;color:#E53333;">（租金：</span></b><b><span style="font-size:24px;color:#E53333;">35-40/</span></b><b><span style="font-size:24px;color:#E53333;">㎡</span></b><b><span style="font-size:24px;color:#E53333;">/</span></b><b><span style="font-size:24px;color:#E53333;">月</span></b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- office pic start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="houseInfo">
                        <h4 class="block-title houseInfo-title">
                            <i class="iconsindex i-home">&nbsp;</i> 房源图片
                        </h4>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- 户型图 -->
                                <div class="col-md-3 img-portfolio" style="margin-bottom:20px;">
                                    <a class="vlightbox1" href="/theme/agency/img/hx_s.jpg" title="{$allphoto[a].title}">
                                        <img src="/theme/agency/img/hx_s.jpg" class="img-responsive img-hover">
                                    </a>
                                    <p>sdf</p>
                                </div>

                                <div class="col-md-3 img-portfolio" style="margin-bottom:20px;">
                                    <a class="vlightbox1" href="/theme/agency/img/hx_s.jpg" title="{$allphoto[a].title}">
                                        <img src="/theme/agency/img/hx_s.jpg" class="img-responsive img-hover">
                                    </a>
                                    <p>sdf</p>
                                </div>
                                <div class="col-md-3 img-portfolio" style="margin-bottom:20px;">
                                    <a class="vlightbox1" href="/theme/agency/img/hx_s.jpg" title="{$allphoto[a].title}">
                                        <img src="/theme/agency/img/hx_s.jpg" class="img-responsive img-hover">
                                    </a>
                                    <p>sdf</p>
                                </div>
                                <div class="col-md-3 img-portfolio" style="margin-bottom:20px;">
                                    <a class="vlightbox1" href="/theme/agency/img/hx_s.jpg" title="{$allphoto[a].title}">
                                        <img src="/theme/agency/img/hx_s.jpg" class="img-responsive img-hover">
                                    </a>
                                    <p>sdf</p>
                                </div>
                                <div class="col-md-3 img-portfolio" style="margin-bottom:20px;">
                                    <a class="vlightbox1" href="/theme/agency/img/hx_s.jpg" title="{$allphoto[a].title}">
                                        <img src="/theme/agency/img/hx_s.jpg" class="img-responsive img-hover">
                                    </a>
                                    <p>sdf</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- office map start -->
            <div class="row" id="mapBox">
                <div class="col-md-12">
                    <div class="houseInfo clearfix" style="margin-bottom:20px;">
                        <h4 class="block-title houseInfo-title"><i class="iconsindex i-map">&nbsp;</i> 地图交通</h4>
                        <div class="map" id="map"></div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <!-- office map end -->

        </div>

        <!-- right -->
        <div class="col-md-3">
            <div class="row">
                <div class="agent clearfix">
                   <div class="agent-info left">
                        <div class="agent-del left">
                            <a href="#" class="laishanghai" target="_blank">
                                <img class="iframe-img" src="../theme/agency/img/zj03.jpg">
                            </a>
                        </div>
                        <div class="p-del left">
                            <p class="p-01">张永</p>
                            <p><span>经纪人</span></p>
                            <div class="mbs"><span class="p_icon identity_verify" title="已进行身份验证"></span>
                            <span class="p_icon company_verify" title="已进行公司验证"></span></div>
                            <p class="small"><span class="bold"><a href="#" target="_blank">康乐地产</a></span></p>
                            <p class="small"><span class="bold"><a href="#" target="_blank">康乐地产世纪城店</a></span></p>
                         </div>
                   </div>
                    <div class="broker_shop left">
                        <a class="left" href="/" target="_blank">写字楼出售<em>11</em>套</a>
                        <a class="right" href="/" target="_blank">查看个人信息 &gt;</a>
                    </div>
                    <div class="phone_top">
                        <span><label id="mobilecode">15828619817</label></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- office end -->

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

<script src="/js/vendor/vlightbox/vlb_engine/visuallightbox.js" type="text/javascript"></script>
<script src="/js/vendor/vlightbox/vlb_engine/vlbdata1.js" type="text/javascript"></script>

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
