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
    <!-- Custom CSS -->
    <link href="/theme/agency/css/agency.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />  
</head>
<style>
input, select {
    vertical-align: middle;
}
.courses-search {
    clear: both;
    float: left;
    margin: 0;
    padding: 0;
    text-align: center;
    width: 100%;
}
.courses-search input[type="text"] {
    border: medium none;
    border-radius: 3px 0 0 3px;
    color: #8b8b8b;
    display: inline-block;
    font-size: 16px;
    font-weight: 300;
    padding: 10px;
}

.courses-search input[type="submit"] {
    background-image: url("/theme/agency/img/search-ico2.png");
    background-position: center center;
    background-repeat: no-repeat;
    border-radius: 0 3px 3px 0;
    display: inline-block;
    float: none;
    margin: 0 0 0 -4px;
    padding: 12px 25px 13px;
}
input[type="submit"], button, input[type="button"] {
    border: medium none;
    border-radius: 3px;
    color: #ffffff;
    cursor: pointer;
    float: right;
    font-size: 14px;
    font-weight: bold;
    margin: 10px 0 0;
    padding: 11px 20px;
    text-transform: uppercase;
	background-color: #fff;
	opacity:0.7
}

/* Prevent the slideshow from flashing on load */
.rslides{width:100%;min-width:1110px;height:596px;position:relative;padding:0}
.rslides{width:100%;height:596px;overflow:hidden;position:relative}
.rslides li{width:100%;height:596px;float:left}
.rslides li img{position:absolute;left:50%;margin-left:-960px}

aside {
    padding: 50px 0 10px;
}
aside h3.section-subheading {
    font-family: Microsoft YaHei,"Droid Serif","Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 16px;
    font-style: italic;
    font-weight: 400;
    margin-bottom: 45px;
    text-transform: none;
}
aside h2.section-heading {
    font-size: 40px;
    margin-bottom: 15px;
    margin-top: 0;
}
</style>
<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--a class="navbar-brand page-scroll" href="#page-top">众房网科技</a-->
                <div class="header-logo"><img width="145" height="49" src="/ui/agency/img/3.png"></div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            	
                <ul class="nav navbar-nav">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="active">
                        <a class="page-scroll active" href="#services">首页</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="/house_list.php">新房</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="/house_list.php?action=tuan">合作楼盘</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="/news.php">资讯</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="/about.php">关于我们</a>
                    </li>
                </ul>
                
                <!-- search box -->
                <div style="float:right">
                <form action="/" class="courses-search" id="courses-search" method="post">                  	
                    <input type="text" placeholder="请输入项目名称" value="" name="searchtext" id="searchtext">
                    <input type="hidden" value="courses" name="search-type">
                    <input type="hidden" value="" name="lang">
                    <input type="submit" value="">
                </form>
                </div>
                <!-- /search box -->
            </div>
            <!-- /.navbar-collapse -->
            
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <ul class="rslides">
          <li><img src="/ui/agency/img/eye2.jpg" alt=""></li>
          <li><img src="/ui/agency/img/eye3.jpg" alt=""></li>
        </ul>
    </header>
    
    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">合作楼盘</h2>
                    <h3 class="section-subheading text-muted">RECOMMENDED HOUSING.</h3>
                </div>
            </div>
            <div class="row">
            	{section name=a loop=$listHouse}
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="/house_item.php?sp={fp id=$listHouse[a].id}" title="{$listHouse[a].project_name}" class="portfolio-link">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="{$listHouse[a].layout_pic}" class="img-responsive" alt="{$listHouse[a].project_name}" style="height:245px;">
                    </a>
                    <div class="portfolio-caption">
                        <h4>{$listHouse[a].project_name}</h4>
                        <p class="text-muted">
                        	{if $listHouse[a].red_house_price_average>0}
                        	房价：{$listHouse[a].red_house_price_average}元</em>/m<sup>2</sup>
                            {else}
                            房价：待定
                            {/if}
                        	<a href="/estate-id-1016885.htm" class="btn btn-success" style="float:right;">去看看</a>
                        </p>
                        
                    </div>
                </div>
                {/section}
            </div>
            <a class="btn btn-danger" style="float:right;font-size:20px;" href="/house_list.php?action=tuan">更多合作楼盘 &gt;&gt;</a>
        </div>
        
    </section>

    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">服务</h2>
                    <h3 class="section-subheading text-muted">Our Services.</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-info fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">选房</h4>
                    <p class="text-muted">帮助意向购房者选择合适匹配的楼盘及房源.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">看房</h4>
                    <p class="text-muted">免费提供100辆看房车全程带看精选优质楼盘.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-search fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">谈价</h4>
                    <p class="text-muted">免费为购房者提供与开发商楼盘协商砍价事宜.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Our Amazing Team</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="/ui/agency/img/team/1.jpg" class="img-responsive img-circle" alt="">
                        <h4>Kay Garland</h4>
                        <p class="text-muted">Lead Designer</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="/ui/agency/img/team/2.jpg" class="img-responsive img-circle" alt="">
                        <h4>Larry Parker</h4>
                        <p class="text-muted">Lead Marketer</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="/ui/agency/img/team/3.jpg" class="img-responsive img-circle" alt="">
                        <h4>Diana Pertersen</h4>
                        <p class="text-muted">Lead Developer</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
                </div>
            </div>
        </div>
    </section>
	

    <!-- Clients Aside -->
    <aside class="clients">
        <div class="container">
			<div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">合作伙伴</h2>
                    <h3 class="section-subheading text-muted">Cooperative partner.</h3>
                </div>
            </div>
            <div class="row">
            	{section name=a loop=$origin}
                <div class="col-md-2 col-sm-6">
                    <a href="{$origin[a].url}" target="_blank">
					<img src="{$origin[a].photo}" class="img-responsive" style="border:1px solid #ccc; margin-right:10px; margin-top:10px; height:95px" />
					</a>
                </div>
               {/section}
            </div>
        </div>
    </aside>
    
    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">请填写您的购房愿望</h2>
                    <h3 class="section-subheading text-muted">我们将帮您解答.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="您的姓名" id="name" required data-validation-required-message="请填写您的姓名">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="您的电话" id="phone" required data-validation-required-message="请填写您的电话">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="您的购房愿望" id="message" required data-validation-required-message="请填写您的购房愿望"></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">提交</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                	<span>众房网www.51zfun.com版权所有</span><br>
                    <span class="copyright">Copyright &copy; 2009-2016 ZhongFang Information Network All Rights Reserved</span><br>
                    <span>《中华人民共和国电信与信息服务业务经营许可证》编号: <a rel="nofollow" href="http://www.51zfun.com/">蜀ICP备13029095号-1</a></span><br>
                    <span class="copyright">服务热线：028-66685775</span><br>
                </div>
                <div class="col-md-4">
                    <img src="/ui/agency/img/qrcode.jpg" style="border:2px solid #444; width:40%">
                </div>
            </div>
        </div>
    </footer>
	<script>
    	var token = '{$token}';
    </script>
    <!-- jQuery -->
    <script src="/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
	
    <!-- Plugin JavaScript -->
    <script src="/theme/agency/js/jquery.easing.min.js"></script>
    <script src="/theme/agency/js/classie.js"></script>
    <script src="/theme/agency/js/cbpAnimatedHeader.js"></script>
    
    <!-- Sildes JavaScript -->
    <script src="/js/slides.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/theme/agency/js/agency.js"></script>

</body>
</html>
