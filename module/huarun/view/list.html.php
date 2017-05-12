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
.m-classify .bd {
    border-top: 6px solid #394043;
    background-color: #f8f8f9;
    padding: 0 22px;
}
.m-classify .bd dt {
    padding: 22px 0 12px;
    line-height: 1;
    font-size: 18px;
    font-weight: bold;
}
.m-classify .bd dl {
    padding-bottom: 25px;
    border-top: 1px dashed #eaeaea;
}
.m-classify .bd dd {
    line-height: 24px;
}
.m-classify .bd dd a {
    float: left;
    width: 70px;
    color: #7c7f80;
}
.baike {
    background-image: url(/theme/agency/img/sprite.png);
    background-position: -180px -99px;
    width: 109px;
    height: 27px;
	margin-bottom: 18px;
}
.list-item .item-img {
	height: 170px;
    width: 100%;
}
.list-item .item-title {
    font-size: 24px;
    line-height: 30px;
    overflow: hidden;
	display:inline-block;
	text-overflow: ellipsis;
    white-space: nowrap;
	width:100%;
}
.list-item .item-des {
    color: #666;
    font-size: 16px;
    margin: 10px 0 10px;
    max-height: 50px;
    overflow: hidden;
	display:inline-block
}
.list-item .item-des:hover{color:#f60}
.list-item .item-topic a{font-size:14px;}
.list-item .item-info {
    border-top: 1px dashed #ededed;
    color: #999;
    font-size: 14px;
    padding-top: 10px;
    position: relative;
}
.pagination-pd ul li a{
	margin-left:10px;
	
	}
</style>
<body id="page-top">
<a href="#" id="totop"><i class="fa fa-angle-up"></i></a>
<!-- Navigation -->
<?php include '../../index/view/header.html.php';?>

<!-- secondNav -->
<div class="secondNav mbl">
  <div class="container">
  	<div class="logo logo-<?=$type?>"><a href="#"></a></div>
    <ul class="navlist">
        <li><a href="/news/index?type=info">资讯</a></li>
        <li><a href="/news/index?type=policy">政策</a></li>
        <li><a class="check" href="/guide">指南</a></li>
    </ul>
    <div class="input-group col-md-4 pull-right mtm">
        <input type="text" placeholder="请输关键字" value="" class="form-control pull-left" name="name">								
        <div class="input-group-btn">
        <button class="btn btn-success" type="submit"><i class="fa fa-search "></i></button>
        </div>
    </div>
  </div>
</div>

<!-- Section -->
<div class="guide">

	<div class="container">
        <div class="row">
            <div class="col-md-12">
               <ul class="breadcrumb">
                   <li><a href="/">首页</a></li>
                   <li><a href="/index/houseList">成都热点指南</a></li>
                   <li class="active">乐山购房须知</li>
               </ul>
           </div>
        </div>
    </div>
	
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            	<div class="row m-classify">
                    <div class="col-md-12">
                        <div class="baike"></div>
                    </div>
                    <div class="col-md-12">
                        <div class="bd">
                            <dl>
                                <dt>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="购房须知" href="/guide/lists" target="_blank">购房须知</a>
                                </dt>
                                <dd class="clearfix">
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="房产政策" href="/" target="_blank">房产政策</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="购房建议" href="/" target="_blank">购房建议</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="购房资质" href="/" target="_blank">购房资质</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="房屋贷款" href="/" target="_blank">房屋贷款</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="保障住房" href="/" target="_blank">保障住房</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="产权变更" href="/" target="_blank">产权变更</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="法律纠纷" href="/" target="_blank">法律纠纷</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="房屋装修" href="/" target="_blank">房屋装修</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="其他" href="" target="_blank">其他</a>
                                </dd>
                              </dl>
                            <dl>
                                <dt>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="购房须知" href="/" target="_blank">二手房</a>
                                </dt>
                                <dd class="clearfix">
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="房产政策" href="/" target="_blank">准备买房</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="购房建议" href="/" target="_blank">看房</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="购房资质" href="/" target="_blank">选房签约</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="房屋贷款" href="/" target="_blank">定房全款</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="保障住房" href="/" target="_blank">贷款缴税</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="产权变更" href="/" target="_blank">过户入住</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="法律纠纷" href="/" target="_blank">交接买房</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="房屋装修" href="/" target="_blank">风险</a>
                                </dd>
                              </dl>
                            <dl>
                                <dt>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="购房须知" href="/" target="_blank">新房</a>
                                </dt>
                                <dd class="clearfix">
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="房产政策" href="/" target="_blank">准备买房</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="购房建议" href="/" target="_blank">看房/选房</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="购房资质" href="/" target="_blank">认购新房</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="房屋贷款" href="/" target="_blank">签约/定房</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="保障住房" href="/" target="_blank">全款/贷款</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="产权变更" href="/" target="_blank">收房/验房</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="法律纠纷" href="/" target="_blank">装修/入住</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="房屋装修" href="/" target="_blank">退房/维权</a>
                                </dd>
                              </dl>
                            <dl>
                                <dt>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="购房须知" href="/" target="_blank">购房须知</a>
                                </dt>
                                <dd class="clearfix">
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="房产政策" href="/" target="_blank">房产政策</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="购房建议" href="/" target="_blank">购房建议</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="购房资质" href="/" target="_blank">购房资质</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="房屋贷款" href="/" target="_blank">房屋贷款</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="保障住房" href="/" target="_blank">保障住房</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="产权变更" href="/" target="_blank">产权变更</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="法律纠纷" href="/" target="_blank">法律纠纷</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="房屋装修" href="/" target="_blank">房屋装修</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="其他" href="" target="_blank">其他</a>
                                </dd>
                              </dl>
                            <dl>
                                <dt>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="购房须知" href="/" target="_blank">二手房</a>
                                </dt>
                                <dd class="clearfix">
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="房产政策" href="/" target="_blank">准备买房</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="购房建议" href="/" target="_blank">看房</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="购房资质" href="/" target="_blank">选房签约</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="房屋贷款" href="/" target="_blank">定房全款</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="保障住房" href="/" target="_blank">贷款缴税</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="产权变更" href="/" target="_blank">过户入住</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="法律纠纷" href="/" target="_blank">交接买房</a>
                                    <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="房屋装修" href="/" target="_blank">风险</a>
                                </dd>
                              </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
            	<div class="row">
                	<div class="col-md-12">
                    	<div class="list-item clearfix">
                            <a href="/guide/detail" class="col-md-4" data-toggle="modal" style="padding-left:0">
                            	<img src="/upload/avatar2.jpg" class="item-img" alt="">
                            </a>
                            <div class="col-md-8 pln">
                            	<a href="/guide/detail" class="item-title">如何才能买到适合自己需求的房子？</a>
                            	<a href="/guide/detail" class="item-des">买二手房最让人头疼的就是选房子，有些人花了很长的时间也买不到满意的房子，那是因为你不会选，学会以下几点，助你轻松选到好房。</a>
                                <div class="item-info">
                                类型：热点&nbsp;&nbsp;&nbsp;作者：广州日报&nbsp;&nbsp;&nbsp;2016-10-12 11:01
                                </div>
                                <div class="item-topic mtm">
                                <a class="label label-info" target="_blank" href="#">卖房时机</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    
                    <div class="col-md-12">
                    	<div class="list-item clearfix">
                            <a href="/guide/detail" class="col-md-4" data-toggle="modal" style="padding-left:0">
                            	<img src="/upload/avatar3.jpg" class="item-img" alt="">
                            </a>
                            <div class="col-md-8 pln">
                            	<a href="/guide/detail" class="item-title">购买的新房出现质量问题该如何维权？</a>
                            	<a href="/guide/detail" class="item-des">新房出现质量问题主要包括主体结构不合格、影响正常居住使用的质量问题等，出现这些问题可找开发商维权。</a>
                                <div class="item-info">
                                类型：热点&nbsp;&nbsp;&nbsp;作者：广州日报&nbsp;&nbsp;&nbsp;2016-10-12 11:01
                                </div>
                                <div class="item-topic mtm">
                                <a class="label label-info" target="_blank" href="#">房屋核验</a>
                                <a class="label label-info" target="_blank" href="#">收房</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    
                    <div class="col-md-12">
                    	<div class="list-item clearfix">
                            <a href="/guide/detail" class="col-md-4" data-toggle="modal" style="padding-left:0">
                            	<img src="/upload/avatar2.jpg" class="item-img" alt="">
                            </a>
                            <div class="col-md-8 pln">
                            	<a href="/guide/detail" class="item-title">如何才能买到适合自己需求的房子？</a>
                            	<a href="/guide/detail" class="item-des">买二手房最让人头疼的就是选房子，有些人花了很长的时间也买不到满意的房子，那是因为你不会选，学会以下几点，助你轻松选到好房。</a>
                                <div class="item-info">
                                类型：热点&nbsp;&nbsp;&nbsp;作者：广州日报&nbsp;&nbsp;&nbsp;2016-10-12 11:01
                                </div>
                                <div class="item-topic mtm">
                                <a class="label label-info" target="_blank" href="#">卖房时机</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    
                    <div class="col-md-12">
                    	<div class="list-item clearfix">
                            <a href="/guide/detail" class="col-md-4" data-toggle="modal" style="padding-left:0">
                            	<img src="/upload/avatar3.jpg" class="item-img" alt="">
                            </a>
                            <div class="col-md-8 pln">
                            	<a href="/guide/detail" class="item-title">购买的新房出现质量问题该如何维权？</a>
                            	<a href="/guide/detail" class="item-des">新房出现质量问题主要包括主体结构不合格、影响正常居住使用的质量问题等，出现这些问题可找开发商维权。</a>
                                <div class="item-info">
                                类型：热点&nbsp;&nbsp;&nbsp;作者：广州日报&nbsp;&nbsp;&nbsp;2016-10-12 11:01
                                </div>
                                <div class="item-topic mtm">
                                <a class="label label-info" target="_blank" href="#">房屋核验</a>
                                <a class="label label-info" target="_blank" href="#">收房</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    
                   <!-- 分页 --> 
                   <div class="col-md-12 pagination-pd"> 	   
                        <ul class="pagination right">
                            <li><a href="#">上一页</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">下一页</a></li>
                        </ul>
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

<!-- Sildes JavaScript -->
<script src="/js/slides.js"></script>

<!-- main JavaScript -->
<script src="/theme/agency/js/agency.js"></script>

<script>
$(".rslides").responsiveSlides({
	  auto: true,             // Boolean: 设置是否自动播放, true or false
	  speed: 800,            // Integer: 动画持续时间，单位毫秒
	  timeout: 5000,          // Integer: 图片之间切换的时间，单位毫秒
	  pager: false,           // Boolean: 是否显示页码, true or false
	  nav: false,             // Boolean: 是否显示左右导航箭头（即上翻下翻）, true or false
	  random: false,          // Boolean: 随机幻灯片顺序, true or false
	  pause: false,           // Boolean: 鼠标悬停到幻灯上则暂停, true or false
	  pauseControls: true,    // Boolean: 悬停在控制板上则暂停, true or false
	  prevText: "Previous",   // String: 往前翻按钮的显示文本
	  nextText: "Next",       // String: 往后翻按钮的显示文本
	  maxwidth: "",           // Integer: 幻灯的最大宽度
	  navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
	  manualControls: "",     // Selector: 声明自定义分页导航
	  namespace: "rslides",   // String: 修改默认的容器名称
	  before: function(){},   // Function: 回调之前的参数
	  after: function(){}     // Function: 回调之后的参数
	});
</script>
</body>
</html>
