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
	<script>

	//$(document).ready(function(){
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
.how-section h2{
	color:#333;
	font-family: "Avenir Next", Avenir, "Helvetica Neue", Helvetica, "Nimbus Sans L", Arial, "Liberation Sans", "PingFang SC", "Hiragino Sans GB", "Source Han Sans CN", "Source Han Sans SC", "Microsoft YaHei", "Wenquanyi Micro Hei", "WenQuanYi Zen Hei", "ST Heiti", SimHei, "WenQuanYi Zen Hei Sharp", sans-serif;
	font-weight:bold;
	}
.text-block p {width:100%}
.text-block p a{color:#ffffff;}
.text-block p a:hover{color:#49C265;}
.text-block p b{
	font-size: 22px;
    font-weight: 600;
	}
.navbar-custom.top-nav-collapse, .innerpage_nav {
	background-color: #00ae66;
	    border-bottom: 1px solid #00ae66;
	}
.intro {
	background: url(../theme/agency/img/850519825-2.jpg) no-repeat;
	/*background: #4ca834 url(../theme/agency/img/head_img.png) no-repeat bottom;*/
	}
.padding-top10{
	padding-top:10px;
	}
.trendR .a_h a:hover {
    color: #f60;
}
.trend {
	border: 1px solid #d8d8d8;
	border-radius: 4px;
	}
.trendR {
    width: 380px;
    height: 240px;
    overflow: hidden;
	margin-left:29px;
    margin-top: 21px;
	font-family: "Microsoft YaHei","微软雅黑",Tahoma,Arial,simhei,Helvetica,sans-serif;
}
.trendR h4 {
    color: #666;
	font-size: 15px;
}
.trendR div a {
	line-height:22px;
	margin-right: 15px;
	color: #666;
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
	background: rgba(60, 66, 74, 0.5);
	margin-right:2px;}
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
.bg-light-green{background-color:#00ae66;}
.col-md-4{color:#ffffff;}
.footer{
	background: #3a3a3a;
    padding: 30px 0;
    border-top: 1px solid #5c5d5c;
	color:#ddd;
	}
.footer a{color:#ddd;}
.footer hr {border-color: #6d6d6d;}
#wrap{padding:0;}
.form-control-2{height:44px;}
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
.bor-r div{
	
	}
</style>
<body id="page-top" data-spy="scroll" data-target="navbar-fixed-top">
<div itemscope="" itemtype="http://schema.org/SoftwareApplication">
<div id="wrap">
<!-- Navigation top-nav-collapse-->
<nav class="navbar navbar-custom navbar-fixed-top top-nav-collapse" role="navigation">
<div class="container">
<div class="logo-big"> <a class="navbar-brand logo-crop" href="http://www.sentrifugo.com"> <img itemprop="image" src="../theme/agency/img/logo.png" width="304" height="68" alt="FC114"> </a> </div>
<div class="header-signin"> <a class="sign-in" href="http://www.sentrifugo.com/home/login">登录</a> <img src="images/front/or-img.png" alt="OR" width="34" height="61"> <a class="sign-in" href="http://www.sentrifugo.com/home/register">注册</a></div>
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="navbar-main-collapse"> <i class="fa fa-bars"></i> </button>
<a class="navbar-brand logo-crop" href="#page-top"> <img src="../theme/agency/img/logo.png" alt="FC114"> </a> </div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse navbar-right navbar-main-collapse" id="menu_set">
<ul class="nav navbar-nav navbar-right">
<li class="mrgetop4 mrgeleft-50 brdr-btm"><a class="sign-in" href="http://www.sentrifugo.com/home/login">登录</a> <img src="../theme/agency/img/or-img-menu.png" width="34" height="61" alt="OR"> <a class="sign-in" href="http://www.sentrifugo.com/home/register">注册</a></li>
</ul>

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
    <h1 class="brand-heading">乐山城市房产综合服务平台!</h1>
    <p class="intro-text"><br>
    <span itemprop="name">城市房产服务平台</span> 是一个 <b>权威</b> 和 <b>公正</b> 的房产信息服务平台 <br>最权威、最真实的房屋验证、评估、监管服务！</p>
	<!--div class="released_ver" itemprop="softwareVersion"><i class="fa fa-code"></i> 我们的服务</div-->
    <div class="col-lg-11 col-lg-offset-1" style="margin-top:1rem">
        <div class="col-md-12 padding-320-none bor-r">
        <div class="col-xs-6 col-sm-6 col-md-2 hr-bg-color img-block">
        <div class="img-ctrl"><img src="../theme/agency/img/sm.png" width="75" height="75" alt="市民"></div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-4 default-bg-color text-block">
        <p><b>市民</b> <br>
        <a href="#">购房</a> 
        <a href="#">卖方</a> 
        <a href="#">租房</a> <br>
        <a href="#">评估</a>
        <a href="#"> 投资</a>
        <a href="#"> 维权</a>
        <a href="#"> 投诉</a>
        </p>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-2 custom-bg-color img-block">
        <div class="img-ctrl"><img src="../theme/agency/img/jg.png" width="70" height="70" alt="机构"></div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-4 default-bg-color text-block">
        <p><b>机构</b><br><a href="#">从业</a><a href="#"> 资质</a> <a href="#">业务</a></p>
        </div>
        </div>
        <div class="col-md-12 mrgetop1 padding-320-none bor-r">
        <div class="col-xs-6 col-md-2 enterpre-bg-color img-block">
        <div class="img-ctrl"><img src="../theme/agency/img/gl.png" width="70" height="70 alt="监管"></div>
        </div>
        <div class="col-xs-6 col-md-4 default-bg-color text-block">
        <p><b>监管</b> <br>
          <a href="#">购房</a>
           <a href="#">物业</a>
            <a href="#">维修资金</a> </p>
        </div>
        <div class="col-xs-6 col-md-2 intui-bg-color img-block">
        <div class="img-ctrl"><img src="../theme/agency/img/zx.png" width="62" height="62" alt="资讯"></div>
        </div>
        <div class="col-xs-6 col-md-4 default-bg-color text-block">
        <p><b>资讯</b> <br>
         <a href="#"> 政策</a>
          <a href="#"> 热点</a>
          <a href="#">  百科 </a>
          <a href="#">  问答</a></p>
        </div>
        </div>
    </div>
    
    <div class="top-section-btns">
    <!--a href="/" class="btn btn-success btn-lg btn-ctrl-explore"><span itemprop="operatingSystem">Download</span></a> 
    <a href="/" class="btn btn-default btn-lg btn-ctrl-explore">Demo</a-->
    </div>
    
    <a href="#feature_link" class="btn page-scroll angle-down"> <i class="fa fa-angle-down animated"></i> </a>
</div>
</div>
</div>
</div>
</header>
<script>
//$(document).ready(function(){
//
//	$("#home_menu").addClass('active');
//	$("#home_footer").addClass('active');
//});

</script>
<!-- How Section -->
<div class="container content-section text-center how-section">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<h2>成都市<span itemprop="author" itemscope="" itemtype="http://schema.org/Person">
<span itemprop="name"> 8月</span> </span> 二手房市场行情</h2>
<h4>真实信息准确同步，楼盘动态一手掌握</h4>
</div>
</div>
</div>
<div class="content-section text-center how-section container">
    <div class="row margin_none">
        <div class="col-md-12 trend">
            <div class="col-xsm-12 col-md-7"><img itemprop="screenshot" src="../theme/agency/img/trend-m.png" alt="Banner Image" class="img-rounded"></div>
            <!--<div class="col-xsm-12 col-md-1"></div>-->
            <div class="col-xsm-12 col-md-4 display-text-all">
                <!--<div class="col-md-3 lines-block">
                    <div class="line-class"><img src="images/download-line.png" width="130" height="9" alt="Download"></div>
                    <div class="line-class"><img src="images/install-line.png" width="130" height="9" alt="install"></div>
                    <div class="line-class"><img src="images/configure-line.png" width="130" height="9" alt="Configure"></div>
                    <div class="line-class"><img src="images/use-line.png" width="130" height="9" alt="Use"></div>
                </div>-->
                <div class="col-md-12 info-block-area padding-320-none">
                	<div class="trendR text">
                        <h4 class="highLight">成都12月二手房均价<em class="up">8560</em> 元/m²</h4>
                        <h4>成都11月二手房均价 <em class="up">8524</em> 元/m²</h4>   
                        <h4>环比上月上涨 <i class="up">0.43% ↑</i>，同比去年同期上涨 <i class="up">4.23% ↑</i></h4>
                        <h4>查看成都更多<a href="#" target="_blank">二手房房源</a>，更多<a href="href="#" rel="nofollow" target="_blank">租房房源</a></h4>
                        <h4 class="highLight price">价格找房</h4>
            			<div class="a_h">
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
                    <!--<div class="download-block">
                        <div class="block-img"><img src="images/download-img-icon.png" alt="Download"></div>
                        <div class="block-text"> <a href="http://www.sentrifugo.com/download">Download</a> <span>Download Sentrifugo to your server</span> </div>
                        <div class="curve-img-block"><img src="images/download-curve.png" alt="Download"></div>
                    </div>
                    <div class="install-block">
                        <div class="block-img-install"><img src="images/install-img-icon.png" alt="Install"></div>
                        <div class="block-text"> <a href="http://www.sentrifugo.com/installation-guide">Install</a> <span>Follow the installation guide and install</span> </div>
                        <div class="curve-img-block"><img src="images/install-curve.png" alt="Install"></div>
                    </div>
                    <div class="configure-block">
                        <div class="block-img"><img src="images/configure-img-icon.png" alt="Configure"></div>
                        <div class="block-text"> <b>Configure</b> <span>Configure to meet your organization's process</span> </div>
                        <div class="curve-img-block"><img src="images/configure-curve.png" width="95" height="17" alt="Configure"></div>
                    </div>
                    <div class="use-block">
                        <div class="block-img"><img src="images/use-img-icon.png" alt="How to Use"></div>
                        <div class="block-text"> <b>Use</b> <span>Sentrifugo is ready to use</span> </div>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>

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
    <a href="#" class="set_anch">
        <div class="hr-border">
            <div class="features-group">
                <div class="padding-top10"><img class="img-circle" src="../theme/agency/img/zj01.jpg" width="70" height="70" alt="鉴房专家"></div>
            </div>
        </div>
    </a>
	<a href="#"><span itemprop="applicationCategory">鉴房专家</span></a>
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
    <a href="#" class="set_anch">
        <div class="pa-border">
            <div class="features-group">
            <div class="padding-top10"><img class="img-circle" src="../theme/agency/img/zj01.jpg" width="70" height="70" alt="鉴房专家"></div>
            </div>
        </div>
    </a>
	<a href="#"><span itemprop="applicationCategory">鉴房专家</span></a>
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
    <a href="#" class="set_anch">
        <div class="ss-border">
            <div class="features-group">
            	<div class="padding-top10"><img class="img-circle" src="../theme/agency/img/zj01.jpg" width="70" height="70" alt="鉴房专家"></div>
            </div>
        </div>
    </a>
	<a href="#"><span itemprop="applicationCategory">鉴房专家</span></a> 
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
    <a href="#" class="set_anch">
        <div class="an-border">
            <div class="features-group">
                <div class="padding-top10"><img class="img-circle" src="../theme/agency/img/zj01.jpg" width="70" height="70" alt="鉴房专家"></div>
            </div>
        </div>
    </a>
	<a href="#"><span itemprop="applicationCategory">鉴房专家</span></a> 
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
    <a href="#" class="set_anch">
        <div class="bc-border">
            <div class="features-group">
                <div class="padding-top10"><img class="img-circle" src="../theme/agency/img/zj01.jpg" width="70" height="70" alt="鉴房专家"></div>
            </div>
        </div>
    </a>
	<a href="#"><span itemprop="applicationCategory">鉴房专家</span></a>
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
    <a href="#" class="set_anch">
        <div class="lm-border">
            <div class="features-group">
                <div class="padding-top10"><img class="img-circle" src="../theme/agency/img/zj01.jpg" width="70" height="70" alt="鉴房专家"></div>
            </div>
        </div>
    </a>
	<a href="#"><span itemprop="applicationCategory">鉴房专家</span></a>
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
    <a href="#" class="set_anch">
        <div class="sr-border">
            <div class="features-group">
                <div class="padding-top10"><img class="img-circle" src="../theme/agency/img/zj01.jpg" width="70" height="70" alt="鉴房专家"></div>
            </div>
        </div>
    </a>
	<a href="#"><span itemprop="applicationCategory">鉴房专家</span></a>
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
    <a href="#" class="set_anch">
        <div class="rr-border">
            <div class="features-group">
                <div class="padding-top10"><img class="img-circle" src="../theme/agency/img/zj01.jpg" width="70" height="70" alt="鉴房专家"></div>
            </div>
        </div>
    </a>
	<a href="#"><span itemprop="applicationCategory">鉴房专家</span></a>
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
    <a href="#" class="set_anch">
        <div class="is-border">
            <div class="features-group">
                <div class="padding-top10"><img class="img-circle" src="../theme/agency/img/zj01.jpg" width="70" height="70" alt="鉴房专家"></div>
            </div>
        </div>
    </a>
	<a href="#"><span itemprop="applicationCategory">鉴房专家</span></a>
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
    <a href="#" class="set_anch">
        <div class="db-border">
            <div class="features-group">
                <div class="padding-top10"><img class="img-circle" src="../theme/agency/img/zj01.jpg" width="70" height="70" alt="鉴房专家"></div>
            </div>
        </div>
    </a>
    <a href="#"><span itemprop="applicationCategory">鉴房专家</span></a>
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
    <a href="#" class="set_anch">
        <div class="sh-border">
            <div class="features-group">
                <div class="padding-top10"><img class="img-circle" src="../theme/agency/img/zj01.jpg" width="70" height="70" alt="鉴房专家"></div>
            </div>
        </div>
    </a>
    <a href="#"><span itemprop="applicationCategory">鉴房专家</span></a>
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
	<a href="#" class="set_anch">
		<div class="tm-border">
			<div class="features-group">
				<div class="padding-top10"><img class="img-circle" src="../theme/agency/img/zj01.jpg" width="70" height="70" alt="鉴房专家"></div>
			</div>
		</div>
	</a>
	<a href="#"><span itemprop="applicationCategory">鉴房专家</span></a>
</div>

<!--
<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
	<a href="http://www.sentrifugo.com/features#policy-documents" class="set_anch">
		<div class="hr-border">
			<div class="features-group">
				<div class="padding-top20"><img src="images/Policy_Documents_Feature.png" width="42" height="42" alt="Policy Documents"></div>
			</div>
		</div>
	</a>
	<a href="http://www.sentrifugo.com/features#policy-documents"><span itemprop="applicationCategory">Policy Documents</span></a>
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
	<a href="http://www.sentrifugo.com/features#expense-management" class="set_anch">
		<div class="pa-border">
			<div class="features-group">
				<div class="padding-top20"><img src="images/Expense_Management_Feature.png" width="42" height="42" alt="Expense Management"></div>
			</div>
		</div>
	</a>
	<a href="http://www.sentrifugo.com/features#expense-management"><span itemprop="applicationCategory">Expense Management</span></a>
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
	<a href="http://www.sentrifugo.com/features#invoice" class="set_anch">
		<div class="ss-border">
			<div class="features-group">
				<div class="padding-top20"><img src="images/Invoice_Feature.png" width="42" height="42" alt="Invoice"></div>
			</div>
		</div>
	</a>
	<a href="http://www.sentrifugo.com/features#invoice"><span itemprop="applicationCategory">Invoice</span></a>
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
	<a href="http://www.sentrifugo.com/features#employee-offboarding" class="set_anch">
		<div class="an-border">
			<div class="features-group">
				<div class="padding-top20"><img src="images/Employee_Offboarding_Feature.png" width="42" height="42" alt="Employee Offboarding"></div>
			</div>
		</div>
	</a>
	<a href="http://www.sentrifugo.com/features#employee-offboarding"><span itemprop="applicationCategory">Employee Offboarding</span></a>
</div>
-->

</div>

<a href="#" class="btn btn-default btn-lg btn-ctrl-explore">预约专家鉴房</a>
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
          <input type="text" class="form-control form-control-2" placeholder="请输入房源编号验证房源...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
          </span>
        </div><!-- /input-group -->
      </div>
      
      <div class="col-md-4 col-sm-6 tool-item">
      	<h3>交易进度查询</h3>
        <p>实时查看房屋的交易的办理进度！</p>
        <div class="input-group col-md-10">
          <input type="text" class="form-control form-control-2" placeholder="请输入房屋交易号...">
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
          <img src="../theme/agency/img/logo2.png">
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
<div id="defaultspinner" class="ajax-loader" style="display:none;"><img id="img-spinner" src="images/loader2.gif" alt="Loading"></div>

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
