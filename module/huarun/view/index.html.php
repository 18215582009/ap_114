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
.btn-lookmore {
    margin-top: 30px;
    text-align: right;
    position: relative;
}
.btn-lookmore:before {
    content: "";
    position: absolute;
    left: 0;
    right: 125px;
    top: 7px;
    height: 6px;
    background-color: #394043;
}
.card-item .btn-more {
    font-size: 16px;
    color: #666;
}
.card-item .card-hd {
    padding-left: 120px;
}
.card-item .card-hd .index-01 {
    background-image: url(/theme/agency/img/sprite.png);
    background-position: 0 -221px;
    width: 80px;
    height: 60px;
}
.card-item .card-hd .tit {
    font-size: 30px;
    height: 30px;
    font-weight: bold;
}
.card-item .card-hd .subtit {
    margin-top: 13px;
    font-size: 15px;
    color: #acaeb0;
}
.card-item .card-hd .index {
    position: absolute;
    top: 5px;
    left: 50px;
}
.my-color{
	margin-top:30px;
    padding: 20px;
	padding-bottom:40px;
    background-color: #f8f8f9;	
	}
.card-one {
    width: 355px;
    margin-left: 44px;
    padding: 25px 30px;
    border-bottom: 4px solid #ebecec;
    background-color: #fff;
}
.my-pad{
	padding-top:50px;
	}
.card-one .tit {
    display: block;
    line-height: 28px;
    height: 56px;
    overflow: hidden;
    font-size: 20px;
    font-weight: bold;
}
.card-one .subtit {
    margin-top: 5px;
    line-height: 25px;
    height: 75px;
    overflow: hidden;
    color: #7f8183;
}
.my-a .title{
    position: absolute;
    z-index: 2;
    top: 55px;
	left:50px;
    line-height: 1;
    color: #fff;
	}
.my-a .tit {
    font-size: 22px;
    display: block;
    width: 220px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.my-a .subtit {
    font-size: 12px;
    display: block;
    width: 220px;
    margin: 0 auto;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.my-a .layer {
    position: absolute;
    top: 0;
    background-color: #000;
    filter: alpha(opacity=40);
    opacity: .4;
	width: 262px;
    height: 150px;
}
.baike {
    background-image: url(/theme/agency/img/sprite.png);
    background-position: -180px -99px;
    width: 109px;
    height: 27px;
	margin-bottom: 18px;
}
.nav-pills>li>a {
    font-weight:bold;
	font-size:20px;	
	border-radius: 0px;
}
.nav-pills>li>a:hover {
	background-color:#fff;
	color:#333;
}
.nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
    color:#00ae66;
    background-color: #fff;
	border-bottom:3px solid #00ae66;
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
                    	<div id="myCarousel" class="carousel slide">
                            <!-- 轮播（Carousel）指标 -->
                            <ol class="carousel-indicators right">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>   
                            <!-- 轮播（Carousel）项目 -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="img-responsive center-block" src="/theme/agency/img/neirong.png" alt="First slide">
                                    <div class="carousel-caption"><h3>在成都，如何办理房产继承？</h3><h5>办理房产继承的手续比较简单。</h5></div>
                                </div>
                                <div class="item">
                                    <img class="img-responsive center-block" src="/theme/agency/img/neirong.png" alt="Second slide">
                                    <div class="carousel-caption"><h3>在成都，如何办理房产继承？</h3><h5>带齐资料去房管局办理过户即可。</h5></div>
                                </div>
                                <div class="item">
                                    <img class="img-responsive center-block" src="/theme/agency/img/neirong.png" alt="Third slide">
                                    <div class="carousel-caption"><h3>在成都，如何办理房产继承？</h3><h5>不同的需求有不同的选择。</h5></div>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-12" style="margin-top:25px;">
                    	<div class="row">
                        	<div class="col-md-4">
                            	<a href="/" target="_blank" class=" my-a" data-lj_dianji="baike12888">
                                    <img src="http://img.ljcdn.com/neirong-image/neirong1487208808phpmXP02Z.png.262x150.jpg" alt="父母如何把房产过户给子女？">
                                    <span class="title">
                                    	<span class="tit">父母如何把房产过户给子女？</span>
                                    	<span class="subtit">可通过继承、赠与、买卖三种方式。</span>
                                    </span>
                                    <span class="layer"></span>
                                </a>
                            </div>
                            <div class="col-md-4">
                            	<a href="/" target="_blank" class=" my-a" data-lj_dianji="baike12888">
                                    <img src="http://img.ljcdn.com/neirong-image/neirong1487208808phpmXP02Z.png.262x150.jpg" alt="父母如何把房产过户给子女？">
                                    <span class="title">
                                    	<span class="tit">影响银行放款额度的因素有哪些？</span>
                                    	<span class="subtit">信用情况、借贷人年龄都会影响额度。</span>
                                    </span>
                                    <span class="layer"></span>
                                </a>
                            </div>
                            <div class="col-md-4">
                            	<a href="/" target="_blank" class=" my-a" data-lj_dianji="baike12888">
                                    <img src="http://img.ljcdn.com/neirong-image/neirong1487208808phpmXP02Z.png.262x150.jpg" alt="父母如何把房产过户给子女？">
                                    <span class="title">
                                    	<span class="tit">我是房东，签租房合同时要带哪些材料？</span>
                                    	<span class="subtit">资料带全，租房才安心。</span>
                                    </span>
                                    <span class="layer"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                    	<div class="btn-lookmore"><a target="_blank" href="/baike/zhuanti"><h5>浏览过往更多专题</h5></a></div>
                    </div>
                    <div class="col-md-12" style="margin-top:15px;">
                    	<ul id="myTab" class="nav nav-pills">
                            <li class="active"><a href="#home" data-toggle="tab">二手房</a></li>
                            <li><a href="#newf" data-toggle="tab">新房</a></li>
                            <li><a href="#ios" data-toggle="tab">海外买房</a></li>
                            <li><a href="#ios" data-toggle="tab">卖房</a></li>
                            <li><a href="#ios" data-toggle="tab">换房</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade in active" id="home">
                                <div class="row my-color">
                                	<div class="col-md-12">
                                        <div class=" row card-item">
                                            <div class="col-md-12"><a href="/" target="_blank" class="btn-more right">更多</a></div>
                                            <div class="col-md-12">
                                                <div class="card-hd">
                                                    <div class="index index-01"></div>
                                                    <div class="tit">准备买房</div>
                                                    <div class="subtit">有购房资质了吗，资金准备好了吗？开始寻找房源吧</div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 my-pad">
                                              <div class="row">
                                                <div class="col-md-6 card-one">
                                                    <div class="tit">到底要不要买房？用这三个问题自检</div>
                                                    <div class="subtit">当你找到了适合自己的房子，肯定迫不及待地准备签署合同买下它。但买房是件大事儿，一定要慎重考虑。</div>
                                                </div>
                                                <div class="col-md-6 card-one">
                                                    <div class="tit">到底要不要买房？用这三个问题自检</div>
                                                    <div class="subtit">当你找到了适合自己的房子，肯定迫不及待地准备签署合同买下它。但买房是件大事儿，一定要慎重考虑。</div>
                                                </div>
                                              </div>
                                            </div>  
                                        </div>   
                                    </div>
                                </div>
                                
                                <div class="row my-color">
                                	<div class="col-md-12">
                                        <div class=" row card-item">
                                            <div class="col-md-12"><a href="/" target="_blank" class="btn-more right">更多</a></div>
                                            <div class="col-md-12">
                                                <div class="card-hd">
                                                    <div class="index index-01"></div>
                                                    <div class="tit">准备买房</div>
                                                    <div class="subtit">有购房资质了吗，资金准备好了吗？开始寻找房源吧</div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 my-pad">
                                              <div class="row">
                                                <div class="col-md-6 card-one">
                                                    <div class="tit">到底要不要买房？用这三个问题自检</div>
                                                    <div class="subtit">当你找到了适合自己的房子，肯定迫不及待地准备签署合同买下它。但买房是件大事儿，一定要慎重考虑。</div>
                                                </div>
                                                <div class="col-md-6 card-one">
                                                    <div class="tit">到底要不要买房？用这三个问题自检</div>
                                                    <div class="subtit">当你找到了适合自己的房子，肯定迫不及待地准备签署合同买下它。但买房是件大事儿，一定要慎重考虑。</div>
                                                </div>
                                              </div>
                                            </div>  
                                        </div>   
                                    </div>
                                </div>
                                
                            </div>
                            <div class="tab-pane fade" id="newf">
                                
                                <div class="row my-color">
                                	<div class="col-md-12">
                                        <div class=" row card-item">
                                            <div class="col-md-12"><a href="/" target="_blank" class="btn-more right">更多</a></div>
                                            <div class="col-md-12">
                                                <div class="card-hd">
                                                    <div class="index index-01"></div>
                                                    <div class="tit">准备买房</div>
                                                    <div class="subtit">有购房资质了吗，资金准备好了吗？开始寻找房源吧</div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 my-pad">
                                              <div class="row">
                                                <div class="col-md-6 card-one">
                                                    <div class="tit">到底要不要买房？用这三个问题自检</div>
                                                    <div class="subtit">当你找到了适合自己的房子，肯定迫不及待地准备签署合同买下它。但买房是件大事儿，一定要慎重考虑。</div>
                                                </div>
                                                <div class="col-md-6 card-one">
                                                    <div class="tit">到底要不要买房？用这三个问题自检</div>
                                                    <div class="subtit">当你找到了适合自己的房子，肯定迫不及待地准备签署合同买下它。但买房是件大事儿，一定要慎重考虑。</div>
                                                </div>
                                              </div>
                                            </div>  
                                        </div>   
                                    </div>
                                </div>
                                
                            </div>
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
