<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title><?=$this->config->module->name?>_<?=$this->config->app_name?></title>
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
    width: 72px;
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
.card-item .card-hd .index-1 {
    background-image: url(/theme/agency/img/sprite.png);
    background-position: 0 -221px;
    width: 80px;
    height: 60px;
}
.card-item .card-hd .index-2 {
    background-image: url(/theme/agency/img/sprite.png);
    background-position: 280px -221px;
    width: 80px;
    height: 60px;
}
.card-item .card-hd .index-3 {
    background-image: url(/theme/agency/img/sprite.png);
    background-position: 200px -221px;
    width: 80px;
    height: 60px;
}
.card-item .card-hd .index-4 {
    background-image: url(/theme/agency/img/sprite.png);
    background-position: 120px -221px;
    width: 80px;
    height: 60px;
}
.card-item .card-hd .index-5 {
    background-image: url(/theme/agency/img/sprite.png);
    background-position: 120px 480px;
    width: 80px;
    height: 60px;
}
.card-item .card-hd .index-6 {
    background-image: url(/theme/agency/img/sprite.png);
    background-position: 0px 480px;
    width: 80px;
    height: 60px;
}
.card-item .card-hd .index-7 {
    background-image: url(/theme/agency/img/sprite.png);
    background-position: 280px 480px;
    width: 80px;
    height: 60px;
}
.card-item .card-hd .index-8 {
    background-image: url(/theme/agency/img/sprite.png);
    background-position: -260px 605px;
    width: 80px;
    height: 60px;
}
.card-item .card-hd .index-9 {
    background-image: url(/theme/agency/img/sprite.png);
    background-position: -180px 605px;
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
    margin-left: 42px;
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
    height: 20px;
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

.tit:hover{
    cursor:pointer;
}
.s1:hover{
    text-decoration:underline;
    cursor:pointer;
}
.jian {
    background-image: url(/theme/agency/img/sprite.png);
    background-position: -645px -419px;
    width: 12px;
    height: 22px;
    margin-top: 80px;
    float: left;
}
.jia {
    background-image: url(/theme/agency/img/sprite.png);
    background-position: -697px -55px;
    width: 12px;
    height: 22px;
    margin-top: 80px;
    float: right;
}
.jia,.jian:hover{
    cursor:pointer;
}


.carousel-caption h3,.carousel-caption p{
    display:inline-block;
    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
    width: 500px;
    height: 25px;
}
/*.item{*/
    /*width: 830px;*/
    /*height: 350px;*/
/*}*/
/*.lunbo{*/
    /*width: 830px;*/
    /*height: 350px;*/
/*}*/
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
    <form method="get" action="/guide/lists" onsubmit="return sousuo()" class="input-group col-md-4 pull-right mtm">
        <input type="text" placeholder="请输关键字" value="" class="form-control pull-left" id="name" name="name">
        <div class="input-group-btn">
        <button onclick="sousuo()" class="btn btn-success" type="submit"><i class="fa fa-search "></i></button>
        </div>
    </form>
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
                            <? foreach($fenlei['cg1'] as $key=>$info){ ?>
                                <dl>
                                    <dt>
                                        <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="<?=$info['name']?>" href="/guide/lists?baike=<?=$info['id']?>"><?=$info['name']?></a>
                                    </dt>
                                    <dd class="clearfix">
                                        <? foreach($fenlei['cg2'] as $key2=>$info2){ ?>
                                            <? if($info['id'] == $info2['parent_id']){ ?>
                                                <a class=" LOGCLICK" data-log_id="10001" data-bl="classify" data-el="<?=$info2['name']?>" href="/guide/lists?baike=<?=$info2['id']?>"><?=$info2['name']?></a>
                                            <? }else{ ?>
                                            <? } ?>
                                        <? } ?>
                                    </dd>
                                </dl>
                            <? } ?>
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
                                <? foreach($fenlei['ct'] as $key=>$info){ ?>
                                    <? if($key == 0){ ?>
                                        <div class="item active">
                                    <? }else{ ?>
                                        <div class="item">
                                    <? } ?>
                                            <a href="/guide/detail?wid=<?=$info['id']?>" target="_blank">
                                            <img class="img-responsive center-block lunbo" src="<?=$info['photo']?>" alt="First slide">
                                            <div class="carousel-caption"><h3><?=$info['title']?></h3><h5><?=$info['intro']?></h5></div>
                                            </a>
                                        </div>

                                <? } ?>
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-12" style="margin-top:25px;">
                    	<div class="row">
                            <div class="chesi">
                                <? foreach($fenlei['ct2'] as $key=>$info){ ?>
                                    <div class="col-md-4">
                                        <a href="/guide/detail?wid=<?=$info['id']?>" target="_blank" class=" my-a" data-lj_dianji="baike12888">
                                        <img style="width: 262px;height: 150px" src="<?=$info['photo']?>" alt="<?=$info['title']?>">
                                        <span class="title">
                                            <span class="tit"><?=$info['title']?></span>
                                            <span class="subtit"><?=$info['intro']?></span>
                                        </span>
                                        <span class="layer"></span>
                                        </a>
                                    </div>
                                <? } ?>

<!--                                <div class="col-md-4">-->
<!--                                    <a href="/" target="_blank" class=" my-a" data-lj_dianji="baike12888">-->
<!--                                        <img src="http://img.ljcdn.com/neirong-image/neirong1486979481phpbPnqpy.png.262x150.jpg" alt="影响银行放款额度的因素有哪些？">-->
<!--                                    <span class="title">-->
<!--                                    	<span class="tit">影响银行放款额度的因素有哪些？</span>-->
<!--                                    	<span class="subtit">信用情况、借贷人年龄都会影响额度。</span>-->
<!--                                    </span>-->
<!--                                        <span class="layer"></span>-->
<!--                                    </a>-->
<!--                                </div>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                    	<div class="btn-lookmore"><a target="_blank" href="/baike/zhuanti"><h5>浏览过往更多专题</h5></a></div>
                    </div>
                    <div class="col-md-12" style="margin-top:15px;">
                    	<ul id="myTab" class="nav nav-pills">
                            <? foreach($fenlei['cg1'] as $key=>$info){ ?>
                                <? if($key == 0){ ?>
                                <? }else{ ?>
                                    <? if($key == 1){ ?>
                                        <li class="active"><a href="#i<?=$info['id'] ?>" data-toggle="tab"><?=$info['name'] ?></a></li>
                                    <? }else{ ?>
                                        <li><a href="#i<?=$info['id'] ?>" data-toggle="tab"><?=$info['name'] ?></a></li>
                                    <? } ?>
                                <? } ?>
                            <? } ?>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <? foreach($fenlei['cg1'] as $key=>$info){?>
                            <? if($key == 0){ ?>
                            <? }else{ ?>
                                <? $n=1 ?>
                                <? if($key == 1){ ?>
                                    <div class="tab-pane fade in active" id="i<?=$info['id']?>">
                                <? }else{ ?>
                                        <div class="tab-pane fade in" id="i<?=$info['id']?>">
                                <? } ?>
                                        <? foreach($fenlei['cg2'] as $key2=>$info2){ ?>
                                            <? if($info2['parent_id'] == $info['id'] ){ ?>
                                                <div class="row my-color">
                                                    <div class="col-md-12">
                                                        <div class=" row card-item">
                                                            <div class="col-md-12"><a href="/guide/lists?baike=<?=$info2['id']?>" target="_blank" class="btn-more right">更多</a></div>
                                                            <div class="col-md-12">
                                                                <div class="card-hd">
                                                                    <div class="index index-<?=$n?>"><? $n++ ?></div>
                                                                    <div class="tit"><a href="/guide/lists?baike=<?=$info2['id']?>"><?=$info2['name']?></a></div>
                                                                    <div class="subtit"><?=$info2['description']?></div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12 my-pad">
                                                                <div class="row">
                                                                    <div class="zuoyou">
                                                                        <div id="z1" class="z1">
<!--                                                                            <div id="jian" class="jian"></div>-->
                                                                            <div class="kk">
                                                                                <? foreach($fenlei['cg3'] as $key3=>$info3){ ?>
                                                                                    <? if($info2['id'] == $info3['cid'] || $info2['id'] == $info3['relatedcid']){ ?>
                                                                                        <a href="/guide/detail?wid=<?=$info3['id']?>"><div class="col-md-6 card-one">
                                                                                            <div class="tit"><?=$info3['title']?></div>
                                                                                            <div class="subtit s1"><?=$info3['intro']?></div>
                                                                                        </div></a>
                                                                                    <? }else{ ?>

                                                                                    <? } ?>
                                                                                <? } ?>
                                                                            </div>
                                                                            <!--<div id="jia" class="jia"></div>-->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <? }else{ ?>
                                            <? } ?>
                                        <? } ?>
                                    </div>


                                <? } ?>
                            <? } ?>

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
    function sousuo(){
        var name = document.getElementById("name");
        if(name.value == ""){
            return false;
        }else{
            return true;
        }
    }
</script>
</body>
</html>
