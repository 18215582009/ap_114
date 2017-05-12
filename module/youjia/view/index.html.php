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
.secondNav .navlist li a {
    display: inline-block;
    font-size: 16px;
    line-height: 30px;
    padding: 0 16px;
}
.secondNav .navlist li a.check {
    color: #fff;
	background-color: #f90;
}
/* Prevent the slideshow from flashing on load */
.rslides{width:100%;height:400px;position:relative;padding:0}
.rslides{width:100%;height:400px;overflow:hidden;position:relative}
.rslides li{width:100%;height:400px;float:left}
.rslides li img{width:100%}
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

/* youjia list-item */
.inbrowse {font-size: 0;padding: 10px 0;display:inline-block}
.inbrowse .brow {color: #0078d6;float: left;font-size: 16px;line-height: 32px;margin-left: 0;margin-right: 6px;}
.inbrowse .browsetag {float: left;}
.inbrowse .browsetag a {
    display: inline-block;
    line-height: 30px;
    margin: 0 5px;
    position: relative;
    vertical-align: middle;
	height:32px;width:82px;
}
.inbrowse .browsetag a font, .inbrowse .browsetag a i {vertical-align: middle;}
.inbrowse .browsetag a font {font-size: 16px;margin-left: 4px;}
.inbrowse .browsetag a i {
    background-image: url("/theme/agency/img/infor_icon.png");
    background-repeat: no-repeat;
    display: inline-block;
    height: 20px;
    margin-left: 5px;
    width: 20px;
}
.inbrowse .browsetag a .inxin {
    background-position: -174px -2px;
    height: 24px;
    width: 22px;
}
.inbrowse .browsetag a .inzui {
    background: rgba(0, 0, 0, 0) url("/theme/agency/img/infor_icon2.png") no-repeat scroll 0 0;
    height: 24px;
    width: 24px;
}
.inbrowse .browsetag a .inquan {
    background: rgba(0, 0, 0, 0) url("/theme/agency/img/infor_icon2.png") no-repeat scroll 0 -35px;
    height: 24px;
    width: 24px;
}
.inbrowse .active {
    background-color: #fff;
    border: 1px solid #c6c6c6;
    border-radius: 30px;
    height: 30px;
    line-height: 32px;
    position: relative;
    width: 70px;
}
.inbrowse .active em {
    background: rgba(0, 0, 0, 0) url("/theme/agency/img/infor_icon.png") no-repeat scroll -206px -255px;
    bottom: -9px;
    height: 9px;
    left: 50%;
    margin-left: -9px;
    position: absolute;
    width: 19px;
}

.list-item {
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid #eee;
    width: 678px;
}

/* right list */
.r-solid {
    background-color: #fff;
    border: 1px solid #eee;
    margin-bottom: 20px;
    position: relative;
    width: 278px;
}
.r-title {
    border-bottom: 1px solid #eee;
    color: #333333;
    font-size: 18px;
    font-weight: bold;
    height: 34px;
    text-indent: 14px;
	margin-top: 15px;
}
.r-boxs li {
    height: 40px;
    padding: 10px 0;
    width: 250px;
}

.r-boxs a {
    display: inline-block;
    float: left;
    height: 40px;
}
.r-boxs span {
    display: inline-block;
    float: left;
}
.r-boxs .r-heat-font {
    font-size: 14px;
    line-height: 14px;
    margin-left: 9px;
    max-width: 120px;
}

.r-boxs .r-heat-img {
    border: 1px solid #e7e7e7;
    border-radius: 50%;
    height: 38px;
    overflow: hidden;
    width: 38px;
}


.r-boxs em {
    color: #999999;
    font-size: 12px;
    height: 12px;
    line-height: 12px;
    padding-top: 7px;
}
.r-boxs i, .r-heat em {
    display: block;
    font-style: inherit;
    max-width: 120px;
    overflow: hidden;
}
.r-boxs img {
    height: 100%;
    width: 100%;
}
.r-boxs i {
    height: 15px;
}
</style>
<body id="page-top" class="">
<a href="#" id="totop"><i class="fa fa-angle-up"></i></a>
<!-- Navigation -->
<?php include '../../index/view/header.html.php';?>

<!-- secondNav -->
<div class="secondNav mbl">
  <div class="container">
  	<div class="logo logo-<?=$type?>"><a href="#"></a></div>
    <ul class="navlist">
    <li><a <? if($type=='info'){ ?>class="check" <? } ?>href="/news/index?type=info">资讯</a></li>
    <li><a <? if($type=='policy'){ ?>class="check" <? } ?>href="/news/index?type=policy">政策</a></li>
    <li><a <? if($type=='guide'){ ?>class="check" <? } ?>href="/news/index?type=guide">指南</a></li>
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
<div class="flashNav bg-light-gray1">
	<div class="container">
    	<div class="row">
            <div class="col-md-9">
                <ul class="rslides">
                  <li><img src="/theme/agency/img/flash1.jpg" alt=""></li>
                  <li><img src="/theme/agency/img/flash2.jpg" alt=""></li>
                </ul>
            </div>
            <div class="col-md-3">
            	<a href="/news/detail" class="item mbl">
                <img alt="本周荐房|万年场片区60-140万精选房源" src="/theme/agency/img/youjia01.jpg">
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
<div id="news" class="section bg-light-gray1">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="inbrowse">
            <span class="brow">浏览分类：</span>
            <div class="browsetag">
                <a href="/?type=2" class="fotow active"><i class="inxin"></i><font>优选</font><em></em></a>
                <a class="foicon" href="/?type=1"><i class="inzui"></i><font>我关注</font><em></em></a>
                <a class="fotow " href="/?type=0"><i class="inquan"></i><font>全部</font><em></em></a>
                <input type="hidden" value="" id="hidType">
            </div>
            <div class="intishi">
                <i></i><a href="/Notice/detail?noticeId=2088#pvareaid=2125119" target="_blank">如何申请加入优创+平台？</a>
            </div>
        </div>
      	<div class="list-item clearfix">
            <a href="/news/detail" class="col-md-4" data-toggle="modal" style="padding-left:0">
            	<img src="/upload/avatar2.jpg" class="item-img" alt="">
            </a>
            <div class="col-md-8 pln">

            </div>
        </div>
        <hr>
        
        <a data-sojcommon="click_toutiao_more" class="loading-more" href="javascript:;">
            <img alt="" src="/theme/agency/img/loading.gif" class="loading-icon">
            <span class="loading-tip">加载更多</span>
        </a>
      </div>
      
      <div class="col-md-3">
      	<div class="r-solid clearfix">
        	<h3 class="r-title">优家推荐</h3>
            <ul class="r-boxs">
                <li>
                    <a href="/Authors/106947#pvareaid=2125130" target="_blank">
                        <span class="r-heat-img"><img width="58" height="58" sizes="58px" alt="" src="http://qn.www2.autoimg.cn/youchuang/g16/M06/79/D3/autohomecar__wKgH5lczTdiAEAivABDdtm5LS7k265.jpg?imageView2/1/w/58/h/58"></span>
                        <span class="r-heat-font">
                            <i>韩路出品</i>
                            <em>汽车之家前总编...</em>
                        </span>
                    </a>
                    <a class="follow" data-uid="106947" href="javascript:;">关注</a>
                </li>
                <li>
                    <a href="/Authors/16585638#pvareaid=2125130" target="_blank">
                        <span class="r-heat-img"><img width="58" height="58" sizes="58px" alt="" src="http://qn.www2.autoimg.cn/youchuang/g11/M12/80/43/autohomecar__wKgH0lgPBryAaM36AAT5TC-VMlY964.jpg?imageView2/1/w/58/h/58"></span>
                        <span class="r-heat-font">
                            <i>五号频道</i>
                            <em>来自吴昊的汽车...</em>
                        </span>
                    </a>
                    <a class="follow" data-uid="16585638" href="javascript:;">关注</a>
                </li>
        	</ul>
            
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
