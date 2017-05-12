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
    <link href="/theme_old/all_minified.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/theme_old/mtek_font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script src="/js/all.mins.js?v=20"></script>
	<script>

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

<body id="page-top" data-spy="scroll" data-target="navbar-fixed-top">
<div itemscope="" itemtype="http://schema.org/SoftwareApplication">
<div id="wrap">
<!-- Navigation top-nav-collapse-->
<nav class="navbar navbar-custom navbar-fixed-top top-nav-collapse" role="navigation">
<div class="container">
<div class="logo-big"> <a class="navbar-brand logo-crop" href="http://www.sentrifugo.com"> <img itemprop="image" src="images/sentrifugo_logo.png" width="304" height="68" alt="Sentrifugo Logo"> </a> </div>
<div class="header-signin"> <a class="sign-in" href="http://www.sentrifugo.com/home/login">登录</a> <img src="images/or-img.png" alt="OR" width="34" height="61"> <a class="sign-in" href="http://www.sentrifugo.com/home/register">注册</a></div>
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="navbar-main-collapse"> <i class="fa fa-bars"></i> </button>
<a class="navbar-brand logo-crop" href="#page-top"> <img src="images/sentrifugo_logo-menu.png" alt="Sentrifugo Logo"> </a> </div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse navbar-right navbar-main-collapse" id="menu_set">
<ul class="nav navbar-nav navbar-right">
<li class="mrgetop4 mrgeleft-50 brdr-btm"><a class="sign-in" href="http://www.sentrifugo.com/home/login">登录</a> <img src="images/or-img-menu.png" width="34" height="61" alt="OR"> <a class="sign-in" href="http://www.sentrifugo.com/home/register">注册</a></li>
</ul>

<ul class="nav navbar-nav navbar-right">
<!-- Hidden li included to remove active class from about link when scrolled up past about section -->
<li class="hidden"><a href="#page-top"></a></li>
<li><a class="active" href="/">首页</a></li>
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
<header class="intro">
<div class="intro-body">
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
    <h1 class="brand-heading">乐山城市房产综合服务平台!</h1>
    <p class="intro-text"><br>
    <span itemprop="name">城市房产服务平台</span> 是一个 <b>权威</b> 和 <b>公正</b> 的房产信息服务平台 <br>最权威、最真实的房屋验证、评估、监管服务！</p>
	<!--div class="released_ver" itemprop="softwareVersion"><i class="fa fa-code"></i> 我们的服务</div-->
    <div class="col-lg-11 col-lg-offset-1" style="margin-top:1rem">
        <div class="col-md-12 padding-320-none">
        <div class="col-xs-6 col-sm-6 col-md-2 hr-bg-color img-block">
        <div class="img-ctrl"><img src="images/hr_process.png" width="53" height="58" alt="Human Resource"></div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-4 default-bg-color text-block">
        <p>市民 <br>购房 卖方 租房 <br>评估 投资 维权 投诉</p>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-2 custom-bg-color img-block">
        <div class="img-ctrl"><img src="images/customizable_feature.png" width="56" height="58" alt="Customizable Features"></div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-4 default-bg-color text-block">
        <p>机构<br>从业 资质 业务</p>
        </div>
        </div>
        <div class="col-md-12 mrgetop1 padding-320-none">
        <div class="col-xs-6 col-md-2 enterpre-bg-color img-block">
        <div class="img-ctrl"><img src="images/medium_enterprices.png" width="67" height="50" alt="For Small and Medium Enterprises"></div>
        </div>
        <div class="col-xs-6 col-md-4 default-bg-color text-block">
        <p>监管 <br>
          购房 物业 维修资金 </p>
        </div>
        <div class="col-xs-6 col-md-2 intui-bg-color img-block">
        <div class="img-ctrl"><img src="images/feature_rich.png" width="65" height="59" alt="Feature Rich and Intuitive"></div>
        </div>
        <div class="col-xs-6 col-md-4 default-bg-color text-block">
        <p>资讯 <br>
          政策 热点 百科 问答</p>
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
</header><script>
$(document).ready(function(){

	$("#home_menu").addClass('active');
	$("#home_footer").addClass('active');
});

</script>
<!-- How Section -->
<div class="container content-section text-center how-section">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<h2>成都市<span itemprop="author" itemscope="" itemtype="http://schema.org/Person">
<span itemprop="name"> 8月</span> </span> 二手房市场行情</h2>
<h4>Sentrifugo envelops the most efficient human resource modules
and features. It is easy to setup and flexible to configure with an intuitive
interface.</h4>
</div>
</div>
</div>
<div class="content-section text-center how-section">
<div class="row margin_none">
<div class="col-md-12">
<div class="col-xsm-12 col-md-5 banner-display-img"><img itemprop="screenshot" src="images/mobile-ui.png" alt="Banner Image"></div>
<div class="col-xsm-12 col-md-7 display-text-all">
<div class="col-md-3 lines-block">
<div class="line-class"><img src="images/download-line.png" width="130" height="9" alt="Download"></div>
<div class="line-class"><img src="images/install-line.png" width="130" height="9" alt="install"></div>
<div class="line-class"><img src="images/configure-line.png" width="130" height="9" alt="Configure"></div>
<div class="line-class"><img src="images/use-line.png" width="130" height="9" alt="Use"></div>
</div>
<div class="col-md-9 info-block-area padding-320-none">
<div class="download-block">
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
</div>
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
<h2>Features</h2>
<p>A one stop solution for managing all human resource
processes, Sentrifugo offers a slew of features that are flexible and customizable
to reflect your organization’s flow.</p>
<div class="col-md-12 features-flow">

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
<a href="http://www.sentrifugo.com/features#human-resource" class="set_anch">
<div class="hr-border">
<div class="features-group">
<div class="padding-top20"><img src="images/human-resource-feature.png" width="56" height="38" alt="Human Resource"></div>
</div>
</div>
</a>
<a href="http://www.sentrifugo.com/features#human-resource"><span itemprop="applicationCategory">Human Resource</span></a>
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
<a href="http://www.sentrifugo.com/features#performance-appraisal" class="set_anch">
<div class="pa-border">
<div class="features-group">
<div class="padding-top25"><img src="images/performance-appraisal-feature.png" width="40" height="33" alt="Performance Appraisal"></div>
</div>
</div>
</a>
<a href="http://www.sentrifugo.com/features#performance-appraisal"><span itemprop="applicationCategory">Performance Appraisal</span></a>
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
<a href="http://www.sentrifugo.com/features#employee-self-service" class="set_anch">
<div class="ss-border">
<div class="features-group">
<div class="padding-top20"><img src="images/employee-self-service-feature.png" width="44" height="39" alt="Employee Self-Service"></div>
</div>
</div>
</a>
<a href="http://www.sentrifugo.com/features#employee-self-service"><span itemprop="applicationCategory">Employee Self-Service</span></a> 
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
<a href="http://www.sentrifugo.com/features#analytics" class="set_anch">
<div class="an-border">
<div class="features-group">
<div class="padding-top20"><img src="images/analytics-feature.png" width="42" height="40" alt="Analytics"></div>
</div>
</div>
</a>
<a href="http://www.sentrifugo.com/features#analytics"><span itemprop="applicationCategory">Analytics</span></a> 
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
<a href="http://www.sentrifugo.com/features#background-checks" class="set_anch">
<div class="bc-border">
<div class="features-group">
<div class="padding-top20"><img src="images/background-checks-feature.png" width="38" height="38" alt="Background Checks"></div>
</div>
</div>
</a>
<a href="http://www.sentrifugo.com/features#background-checks"><span itemprop="applicationCategory">Background Checks</span></a>
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
<a href="http://www.sentrifugo.com/features#leave-management" class="set_anch">
<div class="lm-border">
<div class="features-group">
<div class="padding-top20"><img src="images/leave-management.png" width="42" height="42" alt="Leave Management"></div>
</div>
</div>
</a>
<a href="http://www.sentrifugo.com/features#leave-management"><span itemprop="applicationCategory">Leave Management</span></a>
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
<a href="http://www.sentrifugo.com/features#service-request" class="set_anch">
<div class="sr-border">
<div class="features-group">
<div class="padding-top20"><img src="images/service-request-feature.png" width="36" height="40" alt="Service Request"></div>
</div>
</div>
</a>
<a href="http://www.sentrifugo.com/features#service-request"><span itemprop="applicationCategory">Service Request</span></a>
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
<a href="http://www.sentrifugo.com/features#resource-requisition" class="set_anch">
<div class="rr-border">
<div class="features-group">
<div class="padding-top20"><img src="images/resource-requisition-feature.png" width="40" height="40" alt="Resource Requisition"></div>
</div>
</div>
</a>
<a href="http://www.sentrifugo.com/features#resource-requisition"><span itemprop="applicationCategory">Talent Acquisition</span></a>
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
<a href="http://www.sentrifugo.com/features#interview-schedule" class="set_anch">
<div class="is-border">
<div class="features-group">
<div class="padding-top20"><img src="images/interview-schedule.png" width="42" height="42" alt="Interview Schedule"></div>
</div>
</div>
</a>
<a href="http://www.sentrifugo.com/features#interview-schedule"><span itemprop="applicationCategory">Interview Schedule</span></a>
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
<a href="http://www.sentrifugo.com/features#dashboard" class="set_anch">
<div class="db-border">
<div class="features-group">
<div class="padding-top20"><img src="images/dashboard-feature.png" width="42" height="42" alt="Dashboard"></div>
</div>
</div>
</a>
<a href="http://www.sentrifugo.com/features#dashboard">Dashboard</a>
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
<a href="http://www.sentrifugo.com/features#feed-forward" class="set_anch">
<div class="sh-border">
<div class="features-group">
<div class="padding-top20"><img src="images/shortcut-feature.png" width="42" height="42" alt="Feed Forward"></div>
</div>
</div>
</a>
<a href="http://www.sentrifugo.com/features#feed-forward"><span itemprop="applicationCategory">Feed Forward</span></a>
</div>

<div class="col-sm-6 col-md-3 fetaures-circle cirle-ctrl">
	<a href="http://www.sentrifugo.com/features#time-management" class="set_anch">
		<div class="tm-border">
			<div class="features-group">
				<div class="padding-top20"><img src="images/time-management-feature.png" width="43" height="42" alt="Time Management"></div>
			</div>
		</div>
	</a>
	<a href="http://www.sentrifugo.com/features#time-management"><span itemprop="applicationCategory">Time Management</span></a>
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

<a href="http://www.sentrifugo.com/features" class="btn btn-default btn-lg btn-ctrl-explore">Explore All Features</a>
</div>

</div>
</div>
</div>
  
</div>


<!-- Footer -->
<footer>
<div class="container text-center">
<div class="footer_menu_links">
<a itemprop="url" id="home_footer" href="http://www.sentrifugo.com" class="active">Home</a>
<a id="features_footer" href="http://www.sentrifugo.com/features">Features</a>
<a itemprop="downloadUrl" id="download_footer" href="http://www.sentrifugo.com/download">Download</a>
<a id="forum_footer" href="http://www.sentrifugo.com/forum">Forum</a>
<div class="footer-circle-img"><img src="images/footer_logo_icon.png" width="56" height="55" alt="Image"></div>
<a id="blog_footer" href="https://sentrifugo.wordpress.com/" target="_blank">Blog</a>
<a id="support_footer" href="http://www.sentrifugo.com/support">Support</a>
<a id="faqs_footer" href="http://www.sentrifugo.com/faqs">FAQ</a>
<a id="contact_footer" href="http://www.sentrifugo.com/contact-us">Contact</a>
</div>
<div class="footer_text">
<p>Copyright © <span itemprop="datePublished" content="2015-05-22">2016</span> <a href="http://www.sapplica.com/" target="_blank" class="padding_zero"><span itemprop="publisher" itemscope="" itemtype="http://schema.org/Organization"><span itemprop="name">Sapplica</span></span>.</a> All rights reserved</p>
<p><a id="privacy_policy_footer" href="http://www.sentrifugo.com/privacy-policy">Privacy Policy</a>|<a id="installation_guide_footer" href="http://www.sentrifugo.com/installation-guide"><span itemprop="requirements">Installation Guide</span></a>|<a id="support_footer_1" href="http://www.sentrifugo.com/support">Support</a></p>
<p class="social_text">
	<a href="https://www.facebook.com/sentrifugo" title="Facebook" target="_blank"><i class="fa fa-facebook-square"></i></a>
	<a href="https://twitter.com/sentrifugo" title="Twitter" target="_blank"><i class="fa fa-twitter-square"></i></a>
	<a href="https://plus.google.com/+Sentrifugo/" title="Google Plus" target="_blank" rel="publisher"><i class="fa fa-google-plus-square"></i></a>
	<a href="https://www.linkedin.com/company/sentrifugo-hrms" title="Linkedin" target="_blank" rel="publisher"><i class="fa fa-linkedin-square"></i></a>
	<a href="https://github.com/sapplica/sentrifugo" target="_blank" title="Github" rel="publisher"><i class="fa fa-github-square"></i></a>
	<a href="http://sourceforge.net/projects/sentrifugo/" class="sorce_forge" title="Source Forge" target="_blank" rel="publisher"><i class="fa fa-sorce-square"></i></a>
</p>
</div>
</div>
</footer>
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
