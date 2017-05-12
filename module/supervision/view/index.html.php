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
<body id="page-top">
<a href="#" id="totop"><i class="fa fa-angle-up"></i></a>
<!-- Navigation -->
<?php include '../../index/view/header.html.php';?>

<!-- secondNav -->
<div class="secondNav mbl">
  <div class="container">
    <div class="logo-box">
    	<a href="#" class="logo logo-main-dark left"></a>
    	<h3 class="logo-title">诚信管理中心</h3>
    </div>
    <ul class="navlist pull-right">
    <li><a class="check" href="#">首页</a></li>
    <li><a href="#">曝光台</a></li>
    <li><a href="#">维权中心</a></li>
    <li><a href="#">信用查询</a></li>
    </ul>
    
  </div>
</div>
<style>
#banner .notice-box {
    color: #fff;
    overflow: hidden;
}
#banner .notice-box ul li{float:left;}
#banner .notice-box a{color:#fff}
#banner .notice-box a:hover{color:#fa0}
#banner .search-box {background-color: #cce3f5;float: left;padding-bottom: 6px;padding-left: 6px;padding-top: 6px;position: relative;}
#banner .search-box .f-text {border: 0 none;height:39px;}
#banner .search-box .f-btn {background-color: #cce3f5;border: 0 none;color: #333;cursor: pointer;float: left;font-family: "microsoft yahei";font-size: 20px;height: 40px;vertical-align: top;width: 118px;}
#banner .box-item {background-color: #fff;border: 1px solid #fff;float: left;margin-left: 25px;padding: 5px;}
#banner .box-item p{ margin:0 5px 0; line-height:normal;}
#banner .box-item .btn{width:110px;margin-top: 5px;}
#banner .helps-item {
    background-color: #eee;
    border: 1px solid #eee;
    padding: 10px;
	opacity:0.8;
	margin-top:30px;
}

.compbox {position: relative;height: 157px;color:#fff}
.developer-hd {background: rgba(0, 0, 0, 0) url("/theme/agency/img/service1.jpg") no-repeat scroll center center;}
.master-hd {background: rgba(0, 0, 0, 0) url("/theme/agency/img/master1.jpg") no-repeat scroll center center;}
.compbox .name {font-size: 18px;font-weight: 600;left: 50%;margin-left: -50px;margin-top: -20px;position: absolute;text-align: center;top: 50%;width: 100px;}
.compbox .cycle {font-size: 14px;left: 50%;margin-left: -50px;margin-top: 0;position: absolute;text-align: center;top: 53%;width: 100px;}
.compbox .count {background: #fff none repeat scroll 0 0;border-radius: 10px;color: #4270e8;line-height: 20px;padding: 0 6px;position: absolute;font-size:12px;transition: background-color 0.3s ease 0s, color 0.3s ease 0s, font-size 0.3s ease 0s, font-weight 0.3s ease 0s;}
.compbox .count:hover {background-color: #39c678;color: #fff;cursor: pointer;font-size: 14px;font-weight: 400;}
.compbox .count1 {left: 43px;top: 32px;}
.compbox .count2 {bottom: 35px;left: 50px;}
.compbox .count3 {right: 50px;top: 35px;}
.compbox .count4 {bottom: 35px;right: 38px;}
.compbox .count-4-fh {bottom: 65px;right: 20px;}

.orgbox{border: 1px solid #ccc;padding:0 10px;}
.orgbox .org-item{border-bottom: 1px dashed #ccc;overflow: hidden;padding: 10px 0;}
.orgbox ul li{float:left;width:100%;padding:7px 10px;}
.orgbox ul li:last-child{border-bottom: none;}
.orgbox ul li div{float:left;width:100%;}
.orgbox ul li div p{margin:0;}

/* 曝光台list */
.list-item {margin-bottom: 20px;position: relative;}
.list-item .item-img {height: 150px;width: 100%;}
.list-item .item-title {font-size: 18px;line-height: 28px;overflow: hidden;display:inline-block;text-overflow: ellipsis;white-space: nowrap;width:100%;}
.list-item .item-des {color: #666;font-size: 14px;margin: 10px;max-height: 50px;overflow: hidden;display:inline-block}
.list-item .item-des:hover{color:#f60}
.list-item .item-info {border-top: 1px dashed #ededed;color: #999;font-size: 14px;padding-top: 10px;position: relative;margin:0 10px;}

/*规则中心*/
.rules-center .rules-hd .rules-item {
    border-bottom: 1px dashed #d9e2e9;
    margin-bottom: 20px;
    padding-bottom: 20px;
}
.rules-center .rules-hd .rules-item .icons {
    background: #fbfbfb none repeat scroll 0 0;
    border: 1px solid #d3dcf5;
    border-radius: 50%;
    float: left;
    height: 80px;
    position: relative;
    width: 80px;
}
.rules-center .rules-hd .rules-item .icons {
    background: #fbfbfb none repeat scroll 0 0;
    border: 1px solid #d3dcf5;
    border-radius: 50%;
    float: left;
    height: 80px;
    position: relative;
    width: 80px;
	margin-left:10px;
}
.rules-center .rules-hd .rules-item .icons .icon-rule {
    background: rgba(0, 0, 0, 0) url("/theme/agency/img/index-icon_78d2d54.png") no-repeat scroll center center;
    height: 55px;
    left: 50%;
    margin-left: -27px;
    margin-top: -27px;
    position: absolute;
    top: 50%;
    width: 55px;
}
.rules-center .rules-hd .rules-item .icons .icon-service {
    background-position: -44px -2px;
}
.rules-center .rules-hd .rules-item .icons .icon-exchange {
    background-position: -44px -69px;
}
.rules-center .rules-hd .rules-item .icons .icon-safeguard {
    background-position: -120px -2px;
}
.rules-center .rules-hd .rules-item .icons .icon-punish {
    background-position: -120px -66px;
}
.rules-center .rules-hd .rules-item .rules-text {
    float: left;
    text-align: left;
	margin-left:20px;
}
.rules-center .rules-hd .rules-item .rules-text .rules-type {
    color: #333;
    font-size: 16px;
    margin-bottom: 10px;
    margin-top: -5px;
}
.rules-center .rules-hd .rules-item .rules-text .rules-link {
    color: #999;
    display: block;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.rules-center .rules-hd .rules-item .rules-text .rules-link:hover {
    color: #227bd7;
    text-decoration: none;
}

</style>
<div id="banner" class="section bg-light-green3">
	<div class="container">
        <div class="row notice-box">
        	<div class="col-md-12">
                <ul>
                <li><span>公告：</span></li>
                <li class="prxxl"><a href="/">派克公馆物管强收装修管理费用处罚</a></li>
                <li class="prxxl"><a href="#">468公馆物管强制要求使用封窗材料</a></li>
                <li class="prxxl"><a href="#">小区游泳费用乱收</a></li>
                </ul>
                <div class="right"><a href="#">更多 &gt;</a></div>
            </div>
        </div>
        <div class="row mtl">
        	<div class="col-md-12">
            	<div class="row">
                <div class="col-md-7">
                    <div class="search-box input-group">
                        <input type="text" placeholder="请输关键字" value="" class="f-text form-control pull-left" name="name">								
                        <div class="input-group-btn">
                        <button class="btn btn-success f-btn" type="submit"><i class="fa fa-search "></i> 查 找</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                	<div class="box-item">
                    <p class="left pdn"><span>您好</span>！<br>欢迎提交您的投诉、举报？</p>
                	<input class="btn btn-info left" value="我要投诉">
                    <input class="btn btn-danger left mlm" value="我要举报">
                    </div>
                </div>
                </div>
            </div>
        </div>
        
        <!--div class="row">
        	<div class="col-md-3">
               <div class="helps-item">
                    <p class="title">致新用户的一封信</p>
                    <p class="person">欢迎加入房产大家庭</p>
                    <p class="time">独家定制的新手宝典，开店无忧为您保驾护航！</p>
                </div>
            </div>
            <div class="col-md-3">
               <div class="helps-item">
                    <p class="title">致新用户的一封信</p>
                    <p class="person">欢迎加入房产大家庭</p>
                    <p class="time">独家定制的新手宝典，开店无忧为您保驾护航！</p>
                </div>
            </div>
            <div class="col-md-3">
               <div class="helps-item">
                    <p class="title">致新用户的一封信</p>
                    <p class="person">欢迎加入房产大家庭</p>
                    <p class="time">独家定制的新手宝典，开店无忧为您保驾护航！</p>
                </div>
            </div>
            <div class="col-md-3">
               <div class="helps-item">
                    <p class="title">致新用户的一封信</p>
                    <p class="person">欢迎加入房产大家庭</p>
                    <p class="time">独家定制的新手宝典，开店无忧为您保驾护航！</p>
                </div>
            </div>
            
        </div-->
    </div>
</div>

<div class="section">
	<div class="container">
    	<div class="col-left">
            <div class="block-hd">
                <span class="hd-text">曝光台</span>
                <span class="more">
                <a target="_blank" href="/report/CaseAnalysis">更多 &gt;</a>
                </span>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="compbox developer-hd">
                    	<div class="name">开发商</div>
                        <div class="cycle">近3月已累计</div>
                        <span class="count count1">惩罚：528用户</span>
                        <span class="count count2">封号：20用户</span>
                        <span class="count count3">封店：34用户</span>
                        <span class="count count4">永久封号：20用户</span>
                    </div>
                    <div class="orgbox clearfix">
                    	<ul>
                        	<li class="org-item">
                                <div>
                                    <p class="left">天地房产开发有限公司</p>
                                    <p class="right">诚信度扣除20分</p>
                                </div>
                                <div>
                                    <p class="left gray">拖延交房时间</p>
                                    <p class="right gray">2016-10-08</p>
                                </div>
                            </li>
                            
                            <li class="org-item clearfix">
                                <div>
                                    <p class="left">天地房产开发有限公司</p>
                                    <p class="right">诚信度扣除20分</p>
                                </div>
                                <div>
                                    <p class="left gray">拖延交房时间</p>
                                    <p class="right gray">2016-10-08</p>
                                </div>
                            </li>
                            
                            <li class="org-item clearfix">
                                <div>
                                    <p class="left">天地房产开发有限公司</p>
                                    <p class="right">诚信度扣除20分</p>
                                </div>
                                <div>
                                    <p class="left gray">拖延交房时间</p>
                                    <p class="right gray">2016-10-08</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="compbox master-hd">
                    	<div class="name">中介公司</div>
                        <div class="cycle">近3月已累计</div>
                        <span class="count count1">惩罚：474用户</span>
                        <span class="count count2">封号：62用户</span>
                        <span class="count count-4-fh">永久封号：60用户</span>
                    </div>
                    <div class="orgbox clearfix">
                    	<ul>
                        	<li class="org-item">
                                <div>
                                    <p class="left">天地房产开发有限公司</p>
                                    <p class="right">诚信度扣除20分</p>
                                </div>
                                <div>
                                    <p class="left gray">拖延交房时间</p>
                                    <p class="right gray">2016-10-08</p>
                                </div>
                            </li>
                            
                            <li class="org-item clearfix">
                                <div>
                                    <p class="left">天地房产开发有限公司</p>
                                    <p class="right">诚信度扣除20分</p>
                                </div>
                                <div>
                                    <p class="left gray">拖延交房时间</p>
                                    <p class="right gray">2016-10-08</p>
                                </div>
                            </li>
                            
                            <li class="org-item clearfix">
                                <div>
                                    <p class="left">天地房产开发有限公司</p>
                                    <p class="right">诚信度扣除20分</p>
                                </div>
                                <div>
                                    <p class="left gray">拖延交房时间</p>
                                    <p class="right gray">2016-10-08</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="block-hd mtl">
                <span class="hd-text">曝光台</span>
                <span class="more">
                <a target="_blank" href="/report/CaseAnalysis">更多 &gt;</a>
                </span>
            </div>
            
            <div class="list-item clearfix">
                <a href="/news/detail" class="col-md-4" data-toggle="modal" style="padding-left:0">
                <img src="/upload/avatar2.jpg" class="item-img" alt="">
                </a>
                <div class="col-md-8 pln">
                    <a href="/supervision/detail" class="item-title">【案例】纠纷案例解析，八戒支招分享--02期</a>
                    <a href="/supervision/detail" class="item-des">改善需求选哪里？作为传统的改善板块，桐梓林现如今发展已十分成熟，居住生活都十分方便。</a>
                    <div class="item-info">
                    类型：纠纷&nbsp;&nbsp;&nbsp;投诉时间&nbsp;&nbsp;&nbsp;2016-10-12 11:01
                    </div>
                </div>
            </div>
            <div class="list-item clearfix">
                <a href="/news/detail" class="col-md-4" data-toggle="modal" style="padding-left:0">
                <img src="/upload/avatar2.jpg" class="item-img" alt="">
                </a>
                <div class="col-md-8 pln">
                    <a href="/supervision/detail" class="item-title">【案例】纠纷案例解析，八戒支招分享--02期</a>
                    <a href="/supervision/detail" class="item-des">改善需求选哪里？作为传统的改善板块，桐梓林现如今发展已十分成熟，居住生活都十分方便。</a>
                    <div class="item-info">
                    类型：纠纷&nbsp;&nbsp;&nbsp;投诉时间&nbsp;&nbsp;&nbsp;2016-10-12 11:01
                    </div>
                </div>
            </div>
            <div class="list-item clearfix">
                <a href="/news/detail" class="col-md-4" data-toggle="modal" style="padding-left:0">
                <img src="/upload/avatar2.jpg" class="item-img" alt="">
                </a>
                <div class="col-md-8 pln">
                    <a href="/supervision/detail" class="item-title">【案例】纠纷案例解析，八戒支招分享--02期</a>
                    <a href="/supervision/detail" class="item-des">改善需求选哪里？作为传统的改善板块，桐梓林现如今发展已十分成熟，居住生活都十分方便。</a>
                    <div class="item-info">
                    类型：纠纷&nbsp;&nbsp;&nbsp;投诉时间&nbsp;&nbsp;&nbsp;2016-10-12 11:01
                    </div>
                </div>
            </div>
            
        </div>
        
        <style>        
.search-center .search-hd {}
.search-center .search-hd h3{font-size:16px; font-weight:normal;color:#333} 
.search-center .search-hd {border-bottom: 1px dashed #d9e2e9;margin-bottom: 20px;padding: 0 10px 20px;}
.search-center .search-hd:last-child{border-bottom: none;}
.search-center .form-control{width:210px;}
        </style>
        <div class="col-right">
        	<div class="search-center">
                <div class="block-hd">
                    <span class="hd-text">信用查询</span>
                    <span class="more">
                    <a target="_blank" href="/report/CaseAnalysis">更多 &gt;</a>
                    </span>
                </div>
                <div class="search-hd">
                	<h3>房企信用查询</h3>
                    <form class="form-inline">
                    <div class="form-group">
                      <input type="password" class="form-control" id="inputPassword2" placeholder="请输入企业编号">
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-search "></i> 查找</button>
                    </form>
                </div>
                <div class="search-hd">
                	<h3>中介信用查询</h3>
                    <form class="form-inline">
                    <div class="form-group">
                      <input type="password" class="form-control" id="inputPassword2" placeholder="请输入中介编号">
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-search "></i> 查找</button>
                    </form>
                </div>
                <div class="search-hd">
                	<h3>经纪人信用查询</h3>
                    <form class="form-inline">
                    <div class="form-group">
                      <input type="password" class="form-control" id="inputPassword2" placeholder="请输入经纪人编号">
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-search "></i> 查找</button>
                    </form>
                </div>
            </div>
            
            <div class="rules-center">
                <div class="block-hd">
                    <span class="hd-text">维权中心</span>
                    <span class="more">
                    <a target="_blank" href="/report/CaseAnalysis">更多 &gt;</a>
                    </span>
                </div>
                
                <div class="rules-hd">
                    <div class="rules-item clearfix">
                        <div class="icons">
                        <i class="icon-rule icon-service"></i>
                        </div>
                        <div class="rules-text">
                        <p class="rules-type">服务规范</p>
                        <a target="_blank" class="rules-link" href="#">服务规则</a>
                        <a target="_blank" class="rules-link" href="#">服务协议</a>
                        <a target="_blank" class="rules-link" href="#">经纪人服务规则</a>
                        </div>
                    </div>
                    <div class="rules-item clearfix">
                        <div class="icons">
                        <i class="icon-rule icon-exchange"></i>
                        </div>
                        <div class="rules-text">
                        <p class="rules-type">
                        交易相关
                        </p>
                        <a target="_blank" class="rules-link" href="#">需求发布与处理规则</a>
                        <a target="_blank" class="rules-link" href="#">弃选需求赏金分配规则</a>
                        <a target="_blank" class="rules-link" href="#">发票开具规则</a>
                        </div>
                    </div>
                    <div class="rules-item clearfix">
                        <div class="icons">
                        <i class="icon-rule icon-safeguard"></i>
                        </div>
                        <div class="rules-text">
                        <p class="rules-type">
                        交易保障
                        </p>
                        <a target="_blank" class="rules-link" href="#">保证完成服务协议</a>
                        <a target="_blank" class="rules-link" href="#">保证原创服务协议</a>
                        <a target="_blank" class="rules-link" href="#">三个月维护服务协议</a>
                        </div>
                    </div>
                    <div class="rules-item clearfix">
                        <div class="icons">
                        <i class="icon-rule icon-punish"></i>
                        </div>
                        <div class="rules-text">
                        <p class="rules-type">
                        违规处罚
                        </p>
                        <a target="_blank" class="rules-link" href="#">举报处理制度</a>
                        <a target="_blank" class="rules-link" href="#">服务商行为规范</a>
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
<script src="/js/vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Plugin JavaScript -->
<script src="/js/vendor/chartjs/Chart.min.js"></script>

<!-- main JavaScript -->
<script src="/theme/agency/js/agency.js"></script>

</body>
</html>
