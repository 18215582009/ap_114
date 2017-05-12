<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title></title>

<!--[if IE]>
<meta http-equiv="imagetoolbar" content="no" />
<![endif]-->

    <!-- Bootstrap Core CSS -->
    <link href="../theme/fonts/font-lineicons.css" rel="stylesheet" type="text/css">

    <link href="/theme/all_minified.css" rel="stylesheet">
    <!-- animate css -->
    <link href="/theme/animate.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/theme/mtek_font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!--<script src="../../../www/js/all.min.js"></script>-->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/chartjs/Chart.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    
	<script>
	
//   全屏显示banner
//   $(document).ready(function(){
//		var abc=$(window).height();
//		$("#intro").css('height',abc);
//	});


	$(document).ready(function(){
		$('.navbar-toggle').on('click', function(e){
			  $('#menu_set').toggleClass('collapse');
			  $('#menu_set').toggleClass('in');
		});	
	});
	
	
	
	$(window).scroll(function() {    
		var scroll = $(window).scrollTop();
	
		 //>=, not <=
		if (scroll >= 500) {
			//clearHeader, not clearheader - caps H
			$(".clearHeader").addClass("darkHeader");
		}
	});
	
	navigator.sayswho= (function(){
		var N= navigator.appName, ua= navigator.userAgent, tem;
		var M= ua.match(/(opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i);
		if(M && (tem= ua.match(/version\/([\.\d]+)/i))!= null) M[2]= tem[1];
		M= M? [M[1], M[2]]: [N, navigator.appVersion, '-?'];
	
		return M;
	})();
	var version = parseInt(navigator.sayswho[1]);
	  //      alert('--version='+version+'--serach=='+navigator.userAgent);
		   
	   if(navigator.userAgent.match(/firefox/i) == 'Firefox')
		{  
		  if(version<5)
			window.location.href = "http://www.sentrifugo.com/home/browserfailure";
		}
		else if(navigator.userAgent.match(/msie/i) == 'MSIE')
		{           
			 if(version<9)      
				window.location.href = "http://www.sentrifugo.com/home/browserfailure";
		}
		else if(navigator.userAgent.match(/chrome/i) == 'Chrome')
		{       
		   if(version<13)
				window.location.href = "http://www.sentrifugo.com/home/browserfailure";
		}
		else if(navigator.userAgent.match(/safari/i) == 'Safari' && navigator.userAgent.match(/Android/i) != 'Android')
		{       
		   if(version<5)
				window.location.href = "http://www.sentrifugo.com/home/browserfailure";
		}
		else if(navigator.userAgent.match(/opera/i) == 'Opera')
		{                                                      
		   if(version<12)
				window.location.href = "http://www.sentrifugo.com/home/browserfailure";
		}
		
	</script>
    
    


    
    
</head>
<style>
.btn-default:hover, .btn-default:focus {
    border:0;
}
.btn-default{
	border:0;
	}
.intro .intro-body .brand-heading{
	margin-top:50px;
}
.navbar-custom a{
	font-family: "Microsoft YaHei", 微软雅黑, 黑体, 宋体, Arial, Simsun, Helvetica, sans-serif;
	}
.how-section h2{
	color:#4c4c4c;
	font-family: "Microsoft YaHei", 微软雅黑, 黑体, 宋体, Arial, Simsun, Helvetica, sans-serif;
	}
.text-block p {
	width:100%;
	padding-top:0px;
	vertical-align:middle; display:table-cell;
	}
.text-block p a{color:#7f7f7f; font-family:"宋体"; font-size:15px;padding: 0 15px 14px 0;}
.text-block p a:hover{color:#49C265;}
.text-block p b{
	font-size: 22px;
    font-weight: 600;
	display:block;
	margin-bottom:-10px;
	}
.navbar-custom.top-nav-collapse, .innerpage_nav {
	background-color: #00ae66;
	border-bottom: 1px solid #00ae66;
	}
.intro {
	background: #81c95b url(../theme/agency/img/banner.jpg) repeat 50% 50%;
	background-size:cover;
	}
.padding-top10{
	padding-top:10px;
	}
.trendR .a_h a:hover {
    color: #f60;
	text-decoration:underline;
}
.trendR {
    width: 380px;
	margin-left:40px;
}
.trendR .tr-bg{
	background:#f8f8f8 url(../theme/agency/img/tr-bg.png) repeat-x;
	padding-top:30px;
	padding-left:10px;
	padding-bottom:10px;
	}
.trendR .a_h{
	margin-top:18px;
	background:#f8f8f8 url(../theme/agency/img/a_h-bg.png) repeat-x;
	padding-top:30px;
	padding-left:10px;
	padding-bottom:10px;
	}
.trendR h4 {
    color: #666;
	font-size: 14px;
}
.trendR h4 a{
	text-decoration:underline;
}
.trendR h4 a:hover{
	color: #f60;
	}
.trendR div a {
	line-height:22px;
	margin-right: 15px;
	}
.trendR .up{
    color: #f60;
    font-style: normal;
}
.trendR .highLight {
    font-size: 18px;
    font-weight: bold;
}
body{ background-color:#fff;}
#tools p{
	font-size: 15px;
    line-height: 1.75;
	}
#system p {
	font-size: 15px;
    line-height: 1.75;
}
.footer p{
	font-size: 15px;
    line-height: 1.75;
	}
.default-bg-color {
	background: url(../theme/agency/img/bg-ban.png) repeat-x;
	height:118px;
	margin-bottom:18px;
	display:table;
	}
.footer .friends ol {
	list-style: outside none none;
    margin: 0;
    padding: 0;
}
.footer .friends ol li {
    float: left;
    font-size: 14px;
    height: 24px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    width: 12.5%;
	list-style: outside none none;
    margin: 0;
    padding: 0;
}
.text{text-align:left;}
.section { padding: 30px 0;}
.bg-light-green{background-color:#8392bd;color:#ffffff;}
.footer{
	background: #3a3a3a;
    padding: 30px 0;
    border-top: 1px solid #5c5d5c;
	color:#ddd;
	}
.footer a{color:#ddd;}
.footer hr {border-color: #6d6d6d;}
#wrap{padding:0;}

.footer-bottom ul > li + li::before {
    color: #bbb;
    content: "|";
    padding: 0 10px;
}
#system .icon {
    font-size: 3.3em;
    color: #333;
}
#system span {
    display: block;
    font-size: 17px;
    font-weight: 700;
    color: #555;
}
.font-big{
	font-size: 22px;
    font-weight: 600;
	}
</style>
<body id="page-top" data-spy="scroll" data-target="navbar-fixed-top">
<div itemscope="" itemtype="http://schema.org/SoftwareApplication">
<div id="wrap">
<!-- Navigation top-nav-collapse-->
<nav class="navbar navbar-custom navbar-fixed-top top-nav-collapse" role="navigation">
<div class="container">
<div class="logo-big"> <a class="navbar-brand logo-crop" href="#"> <img itemprop="image" src="../theme/agency/img/logo.png" width="304" height="68" alt="FC114"> </a> </div>
<div class="header-signin"> <a class="sign-in" href="http://www.sentrifugo.com/home/login">登录</a> <img src="../images/front/or-img.png" alt="OR" width="34" height="61"> <a class="sign-in" href="http://www.sentrifugo.com/home/register">注册</a></div>
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="navbar-main-collapse"> <i class="fa fa-bars"></i> </button>
<a class="navbar-brand logo-crop" href="#page-top"> <img src="../theme/agency/img/logo-white-yellow.png" alt="FC114"> </a> </div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse navbar-right navbar-main-collapse" id="menu_set">
    <!--<ul class="nav navbar-nav navbar-right">
    <li class="mrgetop4 mrgeleft-50 brdr-btm"><a class="sign-in" href="http://www.sentrifugo.com/home/login">登录</a> <img src="../theme/agency/img/or-img-menu.png" width="34" height="61" alt="OR"> <a class="sign-in" href="http://www.sentrifugo.com/home/register">注册</a></li>
    </ul>
-->
<ul class="nav navbar-nav navbar-right">
<!-- Hidden li included to remove active class from about link when scrolled up past about section -->
<li class="hidden"><a href="#page-top"></a></li>
<!-- <li><a class="active" href="/">首页</a></li> -->
<li><a href="/">首页</a></li>
<li><a href="/">新房</a></li>
<li><a href="/">二手房</a></li>
<li><a href="/">租房</a></li>
<li><a href="/">商铺写字楼</a></li>
<li><a href="/" target="_blank">投诉</a></li>
<li><a href="/">资讯</a></li>
<li><a href="/">问答</a></li>
</ul>


</div>
<!-- /.navbar-collapse --> 
</div>
<!-- /.container --> 
</nav>

<!-- Intro Header -->
<header id="intro" class="intro">
<div class="intro-body">
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
    <h1 class="animated fadeInLeft brand-heading"><img src="../theme/agency/img/big-txt.png"></h1>
    <p class="animated fadeInUp intro-text">
    	<span itemprop="name">城市房产服务平台</span> 是一个权威和公正的房产信息服务平台 <br>最权威、最真实的房屋验证、评估、监管服务！
    </p>
    <div class="col-lg-11 col-lg-offset-1 animated fadeInUp" style="margin-top:1rem">
        <div class="col-md-12 padding-320-none bor-r">
            <div class="col-xs-3 col-sm-3 col-md-2 hr-bg-color img-block">
                <div class="img-ctrl"><img src="../theme/agency/img/shi-ming.png" alt="市民"></div>
                <div class="font-big">市民</div>
            </div>
            <div class="col-xs-9 col-sm-9 col-md-4 default-bg-color text-block">
                <p>
                    <a href="#">购房</a>
                    <a href="#">卖房</a> 
                    <a href="#">租房</a> 
                    <a href="#">评估</a>
                    <a href="#">投资</a>
                    <a href="#">维权</a>
                    <a href="#">投诉</a>
                </p>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-2 custom-bg-color img-block">
                <div class="img-ctrl"><img src="../theme/agency/img/ji-gou.png" alt="机构"></div>
                <div class="font-big">机构</div>
            </div>
            <div class="col-xs-9 col-sm-9 col-md-4 default-bg-color text-block">
                <p>
                    <a href="#">从业</a>
                    <a href="#"> 资质</a>
                    <a href="#">业务</a>
                </p>
            </div>
        </div>
        <div class="col-md-12 mrgetop1 padding-320-none bor-r">
            <div class="col-xs-3 col-md-2 enterpre-bg-color img-block">
                <div class="img-ctrl"><img src="../theme/agency/img/jian-guan.png" alt="监管"></div>
                <div class="font-big">监管</div>
            </div>
            <div class="col-xs-9 col-md-4 default-bg-color text-block">
                <p>
                    <a href="#">购房</a>
                    <a href="#">物业</a>
                    <a href="#">维修资金</a>
                </p>
            </div>
            <div class="col-xs-3 col-md-2 intui-bg-color img-block">
                <div class="img-ctrl"><img src="../theme/agency/img/zi-xun.png" alt="资讯"></div>
                <div class="font-big">资讯</div>
            </div>
            <div class="col-xs-9 col-md-4 default-bg-color text-block">
                <p>
                     <a href="#">政策</a>
                      <a href="#">热点</a>
                      <a href="#">百科</a>
                      <a href="#">问答</a>
                 </p>
            </div>
        </div>
    </div>
    
    <div class="top-section-btns">
    <!--a href="#" class="btn btn-success btn-lg btn-ctrl-explore"><span itemprop="operatingSystem">Download</span></a> 
    <a href="#" class="btn btn-default btn-lg btn-ctrl-explore">Demo</a-->
    </div>
    
    <!--<a href="#feature_link" class="btn page-scroll angle-down"> <i class="fa fa-angle-down animated"></i> </a>-->
</div>
</div>
</div>
</div>
</header>

<!-- How Section -->
<div class="container content-section text-center how-section">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<h2>乐山市<span itemprop="author" itemscope="" itemtype="http://schema.org/Person">
<span itemprop="name"> 12月</span> </span> 新房市场行情</h2>
<h4>真实信息准确同步，楼盘动态一手掌握</h4>
</div>
</div>
</div>
<div class="content-section text-center how-section container">
    <div class="row margin_none">
            <div class="col-md-7">	
				<canvas id="myChart" width="650" height="350"></canvas>
            </div>
            <div class="col-md-5">
                	<div class="trendR text">
                    	<div class="tr-bg">
                        	<h4 class="highLight">乐山12月新房均价<em class="up">8560</em> 元/m²</h4>
                            <h4>乐山11月新房均价 <em class="up">8524</em> 元/m²</h4>   
                            <h4>环比上月上涨 <i class="up">0.43% ↑</i>，同比去年同期上涨 <i class="up">4.23% ↑</i></h4>
                            <h4>查看乐山更多<a href="#" target="_blank">新房房源</a>，更多<a href="href="#" rel="nofollow" target="_blank">二手房房源</a></h4>
                        </div>
            			<div class="a_h">
                        	<h4 class="highLight price">价格找房</h4>
                            <a href="#" rel="nofollow" target="_blank">30万以下</a>
                            <a href="#" rel="nofollow" target="_blank">30-40万</a>
                            <a href="#" rel="nofollow" target="_blank">40-50万</a>
                            <a href="#" rel="nofollow" target="_blank">50-60万</a>
                            <a href="#" rel="nofollow" target="_blank">60-80万</a>
                            <a href="#" rel="nofollow" target="_blank">80-100万</a>
                            <a href="#" rel="nofollow" target="_blank">100-120万</a>
                            <a href="#" rel="nofollow" target="_blank">120-150万</a>
                            <a href="#" rel="nofollow" target="_blank">150-200万</a>
                            <a href="#" rel="nofollow" target="_blank">200万以上</a>
                		</div>
        			</div>
            </div>
    </div>
</div>
<!-- 曲线图 js数据-->
<script>
var data = {
	labels : ["08-01","08-5","08-10","08-15","08-20","08-25","08-30"],//X轴
	datasets : [
		{
			fillColor : "rgba(220,220,220,0)",// 背景色
			strokeColor : "#EC6900",// 线
			pointColor : "#f2a730", // 点
			pointStrokeColor : "#fff",// 点的包围圈
			data : [7500,7840,8000,8420,8422,8540,8560]// Y轴坐标
		},
/*		{
			fillColor : "rgba(151,187,205,0.5)",
			strokeColor : "rgba(151,187,205,1)",
			pointColor : "rgba(151,187,205,1)",
			pointStrokeColor : "#fff",
			data : [28,48,40,19,96,27,100]
		}*/
	]
}

var defaults = {
				
	//Boolean - If we show the scale above the chart data			
	scaleOverlay : false,
	
	//Boolean - If we want to override with a hard coded scale
	scaleOverride : false,
	
	//** Required if scaleOverride is true **
	//Number - The number of steps in a hard coded scale
	scaleSteps : null,
	//Number - The value jump in the hard coded scale
	scaleStepWidth : null,
	//Number - The scale starting value
	//Y 轴的起始值
	scaleStartValue : 4500,

	//String - Colour of the scale line	
	// Y/X轴的颜色
	scaleLineColor : "#82bce7",
	
	//Number - Pixel width of the scale line
	// X,Y轴的宽度	
	scaleLineWidth : 1,

	//Boolean - Whether to show labels on the scale	
	// 刻度是否显示标签, 即Y轴上是否显示文字
	scaleShowLabels : true,
	
	//Interpolated JS string - can access value
	// Y轴上的刻度,即文字
	scaleLabel : "<%=value%>",
	
	//String - Scale label font declaration for the scale label
	// 字体
	scaleFontFamily : "'Arial'",
	
	//Number - Scale label font size in pixels	
	// 文字大小
	scaleFontSize : 12,
	
	//String - Scale label font weight style
	// 文字样式	
	scaleFontStyle : "normal",
	
	//String - Scale label font colour	
	// 文字颜色
	scaleFontColor : "#666",	
	
	//Boolean - Whether grid lines are shown across the chart
	// 是否显示网格
	scaleShowGridLines : true,
	
	//String - Colour of the grid lines
	// 网格颜色
	scaleGridLineColor : "rgba(0,0,0,.1)",
	
	//Number - Width of the grid lines
	// 网格宽度
	scaleGridLineWidth : 1,	
	
	//Boolean - Whether the line is curved between points
	// 是否使用贝塞尔曲线? 即:线条是否弯曲
	bezierCurve : false,
	
	//Boolean - Whether to show a dot for each point
	// 是否显示点数
	pointDot : true,
	
	//Number - Radius of each point dot in pixels
	// 圆点的大小
	pointDotRadius : 4,
	
	//Number - Pixel width of point dot stroke
	// 圆点的笔触宽度, 即:圆点外层白色大小
	pointDotStrokeWidth : 1,
	
	//Boolean - Whether to show a stroke for datasets
	// 数据集行程
	datasetStroke : true,
	
	//Number - Pixel width of dataset stroke
	// 线条的宽度, 即:数据集
	datasetStrokeWidth : 2,
	
	//Boolean - Whether to fill the dataset with a colour
	// 是否填充数据集
	datasetFill : true,
	
	//Boolean - Whether to animate the chart
	// 是否执行动画
	animation : true,

	//Number - Number of animation steps
	// 动画的时间
	animationSteps : 60,
	
	//String - Animation easing effect
	// 动画的特效
	animationEasing : "easeOutQuart",

	//Function - Fires when the animation is complete
	// 动画完成时的执行函数
	onAnimationComplete : null
	
}
var myLine = new Chart(document.getElementById("myChart").getContext("2d")).Line(data, defaults);
</script>

<!-- Feature Section -->
<div id="feature_link"></div>
<div class="content-section text-center">
<div class="features-section">
<div class="container">
<div class="col-lg-9 feature_section">
<h2>鉴房专家团</h2>
<p>专业的评估人士帮您做房屋评估</p>
<div class="col-md-12 features-flow">

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
    <a data-toggle="modal" href="#myModal-one" class="set_anch">
        <div class="hr-border">
            <div class="features-group">
                <div class="padding-top10"><img class="img-circle" src="../theme/agency/img/zj01.jpg" width="100" height="100" alt="鉴房专家"></div>
            </div>
        </div>
    </a>
	<a data-toggle="modal" href="#myModal-one"><span itemprop="applicationCategory">鉴房专家</span></a>
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
    <a data-toggle="modal" href="#myModal-one" class="set_anch">
        <div class="pa-border">
            <div class="features-group">
            <div class="padding-top10"><img class="img-circle" src="../theme/agency/img/zj02.jpg" width="100" height="100" alt="鉴房专家"></div>
            </div>
        </div>
    </a>
	<a data-toggle="modal" href="#myModal-one"><span itemprop="applicationCategory">鉴房专家</span></a>
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
    <a data-toggle="modal" href="#myModal-one" class="set_anch">
        <div class="ss-border">
            <div class="features-group">
            	<div class="padding-top10"><img class="img-circle" src="../theme/agency/img/zj03.jpg" width="100" height="100" alt="鉴房专家"></div>
            </div>
        </div>
    </a>
	<a data-toggle="modal" href="#myModal-one"><span itemprop="applicationCategory">鉴房专家</span></a> 
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
    <a data-toggle="modal" href="#myModal-one" class="set_anch">
        <div class="an-border">
            <div class="features-group">
                <div class="padding-top10"><img class="img-circle" src="../theme/agency/img/zj01.jpg" width="100" height="100" alt="鉴房专家"></div>
            </div>
        </div>
    </a>
	<a data-toggle="modal" href="#myModal-one"><span itemprop="applicationCategory">鉴房专家</span></a> 
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
    <a data-toggle="modal" href="#myModal-one" class="set_anch">
        <div class="bc-border">
            <div class="features-group">
                <div class="padding-top10"><img class="img-circle" src="../theme/agency/img/zj01.jpg" width="100" height="100" alt="鉴房专家"></div>
            </div>
        </div>
    </a>
	<a data-toggle="modal" href="#myModal-one"><span itemprop="applicationCategory">鉴房专家</span></a>
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
    <a data-toggle="modal" href="#myModal-one" class="set_anch">
        <div class="lm-border">
            <div class="features-group">
                <div class="padding-top10"><img class="img-circle" src="../theme/agency/img/zj01.jpg" width="100" height="100" alt="鉴房专家"></div>
            </div>
        </div>
    </a>
	<a data-toggle="modal" href="#myModal-one"><span itemprop="applicationCategory">鉴房专家</span></a>
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
    <a data-toggle="modal" href="#myModal-one" class="set_anch">
        <div class="sr-border">
            <div class="features-group">
                <div class="padding-top10"><img class="img-circle" src="../theme/agency/img/zj01.jpg" width="100" height="100" alt="鉴房专家"></div>
            </div>
        </div>
    </a>
	<a data-toggle="modal" href="#myModal-one"><span itemprop="applicationCategory">鉴房专家</span></a>
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
    <a data-toggle="modal" href="#myModal-one" class="set_anch">
        <div class="rr-border">
            <div class="features-group">
                <div class="padding-top10"><img class="img-circle" src="../theme/agency/img/zj01.jpg" width="100" height="100" alt="鉴房专家"></div>
            </div>
        </div>
    </a>
	<a data-toggle="modal" href="#myModal-one"><span itemprop="applicationCategory">鉴房专家</span></a>
</div>

</div>

<a data-toggle="modal" href="#myModal" class="btn btn-default btn-lg btn-ctrl-explore">预约专家鉴房</a>
</div>

</div>
</div>

<style>
.my-modal{
	border-top:10px solid #00ae66;
	overflow:hidden;
	text-align:left;
	}
.zj_name{
	font-size:30px;
	font-weight:bold;
	color:#000;
	margin-right:30px;
	}
.zj_iden{
	font-size:13px;
	color:#969696;
	}
.zj_details{
	font-size:15px;
	color:#6e6d6d;
	}
.modal-body{padding-left:30px;}
.btn-close{background-color:#f0a81e;}
.btn-appointment{background-color:#00ae66;}
.btn-appointment:hover{background-color:#019658;}
</style>
<!-- Modal 单个鉴房专家 -->
<div class="modal fade" id="myModal-one" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-one" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content my-modal">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
          <div class="row">
              <div class="col-xs-4 col-md-4">
                  <img class="img-circle" src="../theme/agency/img/zj01.jpg" width="150" height="150";>
              </div>
              <div class="col-xs-8 col-md-8">
                  <p class="zj_iden">
                      <b class="zj_name">万胜涛</b>FC114认证鉴房专家
                  </p>
                  <p class="zj_details">
                      FC114认证鉴房专家FC114认证鉴房专家FC114认证鉴房专家FC114认证鉴房专家
                  </p>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-close" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary btn-appointment">立即预约</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal 预约专家鉴房 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content my-modal">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
           <div class="row">
              <div class="col-xs-4 col-md-4">
                  <img class="img-circle" src="../theme/agency/img/zj01.jpg" width="150" height="150";>
              </div>
              <div class="col-xs-8 col-md-8">
                  <p class="zj_iden">
                      <b class="zj_name">万胜涛</b>FC114认证鉴房专家
                  </p>
                  <p class="zj_details">
                      FC114认证鉴房专家FC114认证鉴房专家FC114认证鉴房专家FC114认证鉴房专家
                  </p>
              </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary">立即预约</button>
      </div>
    </div>
  </div>
</div>




<!-- 1 -->
<div id="tools" class="section portfolio bg-light-green">
  <div class="container">
    <div class="row text">
      <div class="col-md-4 col-sm-6 tool-item">
      	<h2>网上政务</h2>
        <p>房产服务平台为您提供全面的房产政务服务，包括房源验证、交易监管、物业监管、投诉维权等全面的服务，为老百姓解决各类房产问题！</p>
      </div>
      
      <div class="col-md-4 col-sm-6 tool-item">
      	<h3>房源验证</h3>
        <p>验证房屋的真实性！</p>
        <div class="input-group col-md-10">
          <input type="text" class="form-control form-control-2" placeholder="请输入房源编号验证房源..." style="height:42px; border:0;">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
          </span>
        </div><!-- /input-group -->
      </div>
      
      <div class="col-md-4 col-sm-6 tool-item">
      	<h3>交易进度查询</h3>
        <p>实时查看房屋的交易的办理进度！</p>
        <div class="input-group col-md-10">
          <input type="text" class="form-control form-control-2" placeholder="请输入房屋交易号..." style="height:42px; border:0;">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
          </span>
        </div><!-- /input-group -->
      </div>
    </div>
  </div>
</div>

<!-- 2 -->
<div id="system" class="section portfolio">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12 system-item">
            <div class="text-center">
                <i class="icon icon-office-12 icon-active" aria-hidden="true"></i>
                <span>经纪人行业数据填报</span>
                <p>国内数据经纪行业还处于初级阶段，未来会有怎样的模式和发展 </p>
            </div>
        </div>
        
        <div class="col-md-3 col-sm-6 col-xs-12 system-item">
            <div class=" text-center">
                <i class="icon icon-multimedia-16" aria-hidden="true"></i>
                <span>经纪管理服务平台</span>
                <p>数据经纪商通常提供市场营销产品、风险控制产品和人员搜索产品等三类数据应用产品 </p>
            </div>
        </div>
        
        <div class="col-md-3 col-sm-6 col-xs-12 system-item">
            <div class=" text-center">
                <i class="icon icon-seo-icons-31" aria-hidden="true"></i>
                <span>销售公示系统</span>
                <p>目前国家已经启动了大数据，云计算等战略发展的计划，前途只会越来越好的</p>
            </div>
        </div>
        
        <div class="col-md-3 col-sm-6 col-xs-12 system-item">
            <div class=" text-center">
                <i class="icon icon-seo-icons-26" aria-hidden="true"></i>
                
                <span>房产企业USEKEY办理</span>
                <p>数据经纪是伴随大数据发展而发展的，目前国内也有少量的数据经纪企业。目前国家已经启动了大数据，云计算等战略发展的计划，前途只会越来越好的</p>
            </div>
        </div>
      
    </div>
  </div>
</div>
<!-- 3 -->
<div class="footer">
  <div class="container">
    <div class="row friends">
        <div class="col-md-12 col-sm-12 col-xs-12 text">
            <h4 class="title">友情链接</h4>
            <ol class="friend-items clearfix">
            <li><a href="/" target="_blank">猫途鹰旅游资讯</a></li>
            <li><a href="/" target="_blank">酷讯网</a></li>
            <li><a href="/" target="_blank">艺龙旅行网</a></li>
            <li><a href="/" target="_blank">同程旅游</a></li>
            <li><a href="/" target="_blank">住哪网</a></li>
            <li><a href="/" target="_blank">汉庭连锁酒店</a></li>
            <li><a href="/" target="_blank">金陵连锁酒店</a></li>
            <li><a href="/" target="_blank">途牛旅游网</a></li>
            <li><a href="/" target="_blank">国旅在线</a></li>
            <li><a href="/" target="_blank">五分旅游网</a></li>
            <li><a href="/" target="_blank">相约久久旅游网</a></li>
            <li><a href="/" target="_blank">携程旅游攻略</a></li>
            <li><a href="/" target="_blank">去哪儿网机票</a></li>
            <li><a href="/" target="_blank">梦之旅</a></li>
            <li><a href="/" target="_blank">户外运动</a></li>
            <li><a href="/" target="_blank">北京神舟国旅</a></li>
            <li><a href="/" target="_blank">蚂蜂窝自由行</a></li>
            <li><a href="/" target="_blank">春秋航空</a></li>
            </ol>
        </div>         
    </div>
    <hr>
    <div class="row footer-top text">
      <div class="col-sm-6 col-lg-6">
        <h4>
          <img src="../theme/agency/img/s-logo.png">
        </h4>
        <p>本网站所列开源项目的中文版文档全部由<a href="http://www.bootcss.com/">Bootstrap中文网</a>成员翻译整理，并全部遵循 <a target="_blank" href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>协议发布。</p>
      </div>
      <div class="col-sm-6  col-lg-5 col-lg-offset-1">
        <div class="row about">
          <div class="col-xs-3">
            <h4>关于</h4>
            <ul class="list-unstyled">
              <li><a href="/about/">关于我们</a></li>
              <li><a href="/ad/">广告合作</a></li>
              <li><a href="/links/">友情链接</a></li>
              <li><a href="/hr/">招聘</a></li>
            </ul>
          </div>
          <div class="col-xs-3">
            <h4>联系方式</h4>
            <ul class="list-unstyled">
              <li><a target="_blank" title="Bootstrap中文网官方微博" href="http://weibo.com/bootcss">新浪微博</a></li>
              <li><a href="mailto:admin@bootcss.com">电子邮件</a></li>
            </ul>
          </div>
          <div class="col-xs-3">
            <h4>旗下网站</h4>
            <ul class="list-unstyled">
              <li><a target="_blank" href="http://www.golaravel.com/">Laravel中文网</a></li>
              <li><a target="_blank" href="http://www.ghostchina.com/">Ghost中国</a></li>
            </ul>
          </div>
          <div class="col-xs-3">
            <h4>赞助商</h4>
            <ul class="list-unstyled">
              <li><a target="_blank" href="http://www.ucloud.cn/">UCloud</a></li>
              <li><a target="_blank" href="https://www.upyun.com">又拍云</a></li>
            </ul>
          </div>
        </div>

      </div>
    </div>
    <hr>
    <div class="row footer-bottom">
      <ul class="list-inline text-center">
        <li><a target="_blank" href="http://www.miibeian.gov.cn/">川ICP备11008151号</a></li><li>京公网安备11010802014853</li>
      </ul>
    </div>
  </div>
</div>
<!-- 3 结束 -->

</div>
  
</div>


</div>
<div id="defaultspinner" class="ajax-loader" style="display:none;"><img id="img-spinner" src="../images/loading.gif" alt="Loading"></div>

<script type="text/javascript"> //piwikCode();</script>

<script>
/**
 * Dropdown menu - Header 
 */
$('body').click(function(e){
	
	var targ;
    if (!e) {
        var e = window.event;
    }
    if (e.target) {
        targ=e.target;
    } else if (e.srcElement) {
        targ=e.srcElement;
    }
    if(targ.id == 'logoutbutton'){
		if($('.logoutdiv')){
			$('.logoutdiv').toggle();
		}		
    }
    else{	
        if($('.logoutdiv')){
			$('.logoutdiv').hide();
		}
	}
});
</script>





</body>

</html>
