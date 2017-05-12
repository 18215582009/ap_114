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

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<style>
/* Prevent the slideshow from flashing on load */
.rslides{width:100%;height:400px;position:relative;padding:0}
.rslides{width:100%;height:400px;overflow:hidden;position:relative}
.rslides li{width:100%;height:400px;float:left}
.flashNav .item{color:#fff;display:block;height:190px;position:relative;}
.flashNav .item:hover::after {
    background-image: url("/theme/agency/img/gradient.png?v=201606271");
    bottom: 0;
    content: "";
    height: 100%;
    left: 0;
    position: absolute;
    width: 100%;
    z-index: 1;
}
.flashNav .item img{height:190px;width:100%;}
.flashNav .item .title {
    bottom: 18px;
    font-size: 18px;
    left: 20px;
    position: absolute;
    z-index: 2;
}

.list-item {
    margin-bottom: 20px;
    position: relative;
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
</style>
<body id="page-top">
<a href="#" id="totop"><i class="fa fa-angle-up"></i></a>
<!-- Navigation -->
<?php include '../../index/view/header.html.php';?>

<!-- secondNav -->
<div class="secondNav mbl">
  <div class="container">
  	<div class="logo"><a href="#"></a></div>
    <ul class="navlist">
    <li><a class="check" href="#">资讯</a></li>
    <li><a href="#">政策</a></li>
    <li><a href="#">指南</a></li>
    </ul>
    <div class="input-group col-md-4 pull-right mtm">
        <input type="text" placeholder="请输关键字" value="" class="form-control pull-left" name="name">								
        <div class="input-group-btn">
        <button class="btn btn-success" type="submit"><i class="fa fa-search "></i></button>
        </div>
    </div>
  </div>
</div>

<!-- flashNav -->
<div class="flashNav">
	<div class="container">
    	<div class="row">
            <div class="col-md-7">
                <ul class="rslides">
                  <li><img src="/theme/agency/img/flash1.jpg" alt=""></li>
                  <li><img src="/theme/agency/img/flash2.jpg" alt=""></li>
                </ul>
            </div>
            <div class="col-md-5">
            	<a href="/news/detail" class="item mbl">
                <img alt="本周荐房|万年场片区60-140万精选房源" src="/theme/agency/img/flash3.jpg">
                <div class="label">淘好房</div><div class="title">本周荐房|万年场片区60-140万精选房源</div>
                </a>
                <a href="/news/detail" class="item">
                <img alt="厉害了！中国百强城市成都由第10升至第6位" src="/theme/agency/img/flash4.jpg">
                <div class="label">全聚焦</div><div class="title">厉害了！中国百强城市成都由第10升至第6位</div></a>
            </div>
        </div>
    </div>
</div>

<!-- News Section -->
<div id="news" class="section news">
  <div class="container">
    <div class="row">
      <div class="col-left">
      	<div class="list-item clearfix">
            <a href="/news/detail" class="col-md-4" data-toggle="modal" style="padding-left:0">
            <img src="/upload/avatar2.jpg" class="item-img" alt="">
            </a>
            <div class="col-md-8 pln">
            <a href="/news/detail" class="item-title">传统居住区展现新魅力 桐梓林精选改善房源推荐桐梓林精选改善房源推荐</a>
            <a href="/news/detail" class="item-des">改善需求选哪里？作为传统的改善板块，桐梓林现如今发展已十分成熟，居住生活都十分方便。</a>
            <div class="item-info">
            类型：热点&nbsp;&nbsp;&nbsp;作者：广州日报&nbsp;&nbsp;&nbsp;2016-10-12 11:01
            </div>
            <div class="item-topic mtm">
            <a class="label label-danger" target="_blank" href="#">推荐</a>
            <a class="label label-success" target="_blank" href="#">最新</a>
            </div>
            </div>
        </div>
        <hr>
        <div class="list-item clearfix">
            <a href="/news/detail" class="col-md-4" data-toggle="modal" style="padding-left:0">
            <img src="/theme/agency/img/210x140m.jpg" class="item-img" alt="">
            </a>
            <div class="col-md-8 pln">
            <a href="/news/detail" class="item-title">传统居住区展现新魅力 桐梓林精选改善房源推荐</a>
            <a href="/news/detail" class="item-des">改善需求选哪里？作为传统的改善板块，桐梓林现如今发展已十分成熟，居住生活都十分方便。</a>
            <div class="item-info">
            类型：热点&nbsp;&nbsp;&nbsp;作者：广州日报&nbsp;&nbsp;&nbsp;2016-10-12 11:01
            </div>
            <div class="item-topic mtm">
            <a class="label label-danger" target="_blank" href="#">推荐</a>
            <a class="label label-success" target="_blank" href="#">最新</a>
            </div>
            </div>
        </div>
        <hr>
        <div class="list-item clearfix">
            <a href="/news/detail" class="col-md-4" data-toggle="modal" style="padding-left:0">
            <img src="/theme/agency/img/245x167m.jpg" class="item-img" alt="">
            </a>
            <div class="col-md-8 pln">
            <a href="/news/detail" class="item-title">传统居住区展现新魅力 桐梓林精选改善房源推荐</a>
            <a href="/news/detail" class="item-des">改善需求选哪里？作为传统的改善板块，桐梓林现如今发展已十分成熟，居住生活都十分方便。</a>
            <div class="item-info">
            类型：热点&nbsp;&nbsp;&nbsp;作者：广州日报&nbsp;&nbsp;&nbsp;2016-10-12 11:01
            </div>
            <div class="item-topic mtm">
            <a class="label label-danger" target="_blank" href="#">推荐</a>
            <a class="label label-success" target="_blank" href="#">最新</a>
            </div>
            </div>
        </div>
        <hr>
        <div class="list-item clearfix">
            <a href="/news/detail" class="col-md-4" data-toggle="modal" style="padding-left:0">
            <img src="/upload/avatar2.jpg" class="item-img" alt="">
            </a>
            <div class="col-md-8 pln">
            <a href="/news/detail" class="item-title">传统居住区展现新魅力 桐梓林精选改善房源推荐</a>
            <a href="/news/detail" class="item-des">改善需求选哪里？作为传统的改善板块，桐梓林现如今发展已十分成熟，居住生活都十分方便。</a>
            <div class="item-info">
            类型：热点&nbsp;&nbsp;&nbsp;作者：广州日报&nbsp;&nbsp;&nbsp;2016-10-12 11:01
            </div>
            <div class="item-topic mtm">
            <a class="label label-danger" target="_blank" href="#">推荐</a>
            <a class="label label-success" target="_blank" href="#">最新</a>
            </div>
            </div>
        </div>
        <hr>
        <div class="list-item clearfix">
            <a href="/news/detail" class="col-md-4" data-toggle="modal" style="padding-left:0">
            <img src="/upload/avatar2.jpg" class="item-img" alt="">
            </a>
            <div class="col-md-8 pln">
            <a href="/news/detail" class="item-title">传统居住区展现新魅力 桐梓林精选改善房源推荐桐梓林精选改善房源推荐</a>
            <a href="/news/detail" class="item-des">改善需求选哪里？作为传统的改善板块，桐梓林现如今发展已十分成熟，居住生活都十分方便。</a>
            <div class="item-info">
            类型：热点&nbsp;&nbsp;&nbsp;作者：广州日报&nbsp;&nbsp;&nbsp;2016-10-12 11:01
            </div>
            <div class="item-topic mtm">
            <a class="label label-danger" target="_blank" href="#">推荐</a>
            <a class="label label-success" target="_blank" href="#">最新</a>
            </div>
            </div>
        </div>
        <hr>
        <div class="list-item clearfix">
            <a href="/news/detail" class="col-md-4" data-toggle="modal" style="padding-left:0">
            <img src="/theme/agency/img/210x140m.jpg" class="item-img" alt="">
            </a>
            <div class="col-md-8 pln">
            <a href="/news/detail" class="item-title">传统居住区展现新魅力 桐梓林精选改善房源推荐</a>
            <a href="/news/detail" class="item-des">改善需求选哪里？作为传统的改善板块，桐梓林现如今发展已十分成熟，居住生活都十分方便。</a>
            <div class="item-info">
            类型：热点&nbsp;&nbsp;&nbsp;作者：广州日报&nbsp;&nbsp;&nbsp;2016-10-12 11:01
            </div>
            <div class="item-topic mtm">
            <a class="label label-danger" target="_blank" href="#">推荐</a>
            <a class="label label-success" target="_blank" href="#">最新</a>
            </div>
            </div>
        </div>
        
        <a data-sojcommon="click_toutiao_more" class="loading-more" href="javascript:;">
            <img alt="" src="/theme/agency/img/loading.gif" class="loading-icon">
            <span class="loading-tip">加载更多</span>
        </a>
      </div>
      
      <div class="col-right">
      	<div class="border-light-gray">
        	<h1 class="h-5">推荐楼盘</h1>
            <div class="col-item-3 pll prl">
                <a target="_blank" href="">
                    <img width="100%" alt="" src="http://c.pic1.ajkimg.com/display/xinfang/65ed75acd85302c99ce0e0d741682448/280x210n.jpg">
                    <div class="item-title">[金牛] 临河高层华侨城原岸 究竟有何优势？</div>
                    <div class="item-des gray">华侨城原岸是成都华侨城10年深耕成都的升级之作。项目位于上府河生态圈，临欢乐...</div>
                </a>
                <hr>
            </div>
            <div class="col-item-3 pll prl">
                <a target="_blank" href="">
                    <img width="100%" alt="" src="http://c.pic1.ajkimg.com/display/xinfang/65ed75acd85302c99ce0e0d741682448/280x210n.jpg">
                    <div class="item-title">[金牛] 临河高层华侨城原岸 究竟有何优势？</div>
                    <div class="item-des gray">华侨城原岸是成都华侨城10年深耕成都的升级之作。项目位于上府河生态圈，临欢乐...</div>
                </a>
                <hr>
            </div>
            
            <div class="col-item-3 pll prl">
                <a target="_blank" href="">
                    <img width="100%" alt="" src="http://c.pic1.ajkimg.com/display/xinfang/65ed75acd85302c99ce0e0d741682448/280x210n.jpg">
                    <div class="item-title">[金牛] 临河高层华侨城原岸 究竟有何优势？</div>
                    <div class="item-des gray">华侨城原岸是成都华侨城10年深耕成都的升级之作。项目位于上府河生态圈，临欢乐...</div>
                </a>
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
<script src="/js/bootstrap.min.js"></script> 

<!-- Plugin JavaScript --> 

<!-- Sildes JavaScript -->
<script src="/js/slides.js"></script>

<!-- main JavaScript -->
<script src="/theme/agency/js/agency.js"></script> 

</body>
</html>
