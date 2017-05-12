<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title><? if(isset($sousuo)){echo $sousuo."_搜索_";} ?><?=$type=="info"?"资讯":"政策"?>_<?=$this->config->app_name?></title>
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
/* Prevent the slideshow from flashing on load */
.rslides{width:100%;height:400px;position:relative;padding:0}
.rslides{width:100%;height:400px;overflow:hidden;position:relative}
.rslides li{width:100%;height:400px;float:left}
.rslides img{width: 652px;height: 400px;}
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
.list-item:hover {border: none;cursor: pointer;}
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
	display:inline-block;
    line-height:24px;
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
.buke{
    pointer-events: none;
}
.btn{
    width: 39px;
    height: 34px;
}
.right li a{
    margin-left: 10px;
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
    <li><a <? if($type=='info'){ ?>class="check" <? } ?>href="/news/index?type=info">资讯</a></li>
    <li><a <? if($type=='policy'){ ?>class="check" <? } ?>href="/news/index?type=policy">政策</a></li>
    <li><a href="/guide">指南</a></li>
    </ul>
    <form method="get" action="/news/index" onsubmit="return sousuo()" class="input-group col-md-4 pull-right mtm">
        <input type="text" placeholder="请输关键字" value="" class="form-control pull-left" id="name" name="name">
        <input type="hidden" name="type" value="<?=$type=="info"?"info":"policy"?>"/>
        <div class="input-group-btn">
        <button onclick="sousuo()" class="btn btn-success" type="submit"><i class="fa fa-search "></i></button>
        </div>
    </form>
  </div>
</div>
<? if(isset($sousuo) || isset($houseList)){ ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="/">首页</a></li>
                    <li><a href="/news/index?type=<?=$type?>">乐山<?=$type=="info"?"资讯":"政策"?></a></li>
                    <? if(isset($sousuo)){ ?>
                        <li>搜索</li>
                        <li><?=$sousuo?></li>
                    <? } ?>
                    <? if(isset($houseList)){ ?>
                        <li><?=$info['list'][0]['name']?></li>
                    <? } ?>
                </ul>
            </div>
        </div>
    </div>
<? } ?>
<? if(!isset($sousuo) && !isset($houseList)){ ?>
<!-- flashNav -->
<div class="flashNav">
	<div class="container">
            <div class="row">
                <div class="col-md-7">
                    <ul class="rslides">
                        <? foreach($info['flash'] as $key=>$flash){ ?>
                            <a href="/news/detail?type=<?=$type?>&id=<?=$flash['id']?>"><li><img id="lunimg<?=$flash['id']?>" class="lunimg" src="<?=$flash['photo']?>" alt=""></li></a>
                        <? } ?>
                    </ul>
                </div>
                <div class="col-md-5">
                    <? foreach($info['graphic'] as $key=>$graphic){ ?>
                        <a href="/news/detail?id=<?=$graphic['id']?>" class="item mbl">
                            <img class="tiem-photo" alt="本周荐房|万年场片区60-140万精选房源" src="<?=$graphic['photo']?>">
                            <div class="label">淘好房</div><div class="title tiem-title"><?=$graphic['title']?></div>
                        </a>
                    <? } ?>
                </div>
            </div>
    </div>
</div>
<? } ?>
<!-- News Section -->
<div id="news" class="section">
  <div class="container">

    <div class="row">
      <div class="col-left">
          <? if($info['list'] == ''){ ?>
              没能找到与 <? if(isset($sousuo)){ echo "<span style='font-size:18px'>".$sousuo."</span>";}?> 相关的信息
          <? }else{ ?>
              <? foreach($info['list'] as $key=>$item){ ?>
                  <div class="list-item clearfix" data-link="/news/detail?type=<?=$type?>&id=<?=$item['id']?>">
                      <a href="javascript:void(0)" class="col-md-4" data-toggle="modal" target="_blank" style="padding-left:0">
                          <img src="<?=$item['photo']?>" class="item-img" alt="">
                      </a>
                      <div class="col-md-8 pln">
                          <a href="javascript:void(0)" class="item-title"><?=$item['title']?></a>
                          <a href="javascript:void(0)" class="item-des"><?=strip_tags($item['intro'])?></a>
                          <div class="item-info">
                              类型：<?=$item['name']?>&nbsp;&nbsp;&nbsp;作者：<?=$item['author']?>&nbsp;&nbsp;&nbsp;<?=$item['postdate']?>
                          </div>
                          <div class="item-topic mtm">
                              <? if($item['digest']>0){ ?>
                                  <a class="label label-danger" href="#">推荐</a>
                              <? } ?>
                              <a class="label label-success" href="#">最新</a>
                          </div>
                      </div>
                  </div>
                  <hr>
              <? } ?>
          <? } ?>

          <!-- 分页 -->
          <div class="col-md-12 pagination-pd">
              <? if($info['list'] != ''){ ?>
                  <ul class="pagination right">
                      <?
                      $types = "";
                      if(isset($type)){$types = "&type=$type";}
                      if($page >= 4){
                          if(isset($sousuo)){
                              echo "<li><a href='/news/index?name=$sousuo&page=1$types'>首页</a></li>";
                          }elseif(isset($houseList)){
                              echo "<li><a href='/news/index?houseList=$houseList&page=1$types'>首页</a></li>";
                          }else{
                              echo "<li><a href='/news/index?type=$type&page=1'>首页</a></li>";
                          }
                          }
                      if($page == 1){
                          echo "<li class='buke'><a>上一页</a></li>";
                      }else{
                          $pages = $page-1;
                          if(isset($sousuo)){
                              echo "<li><a href='/news/index?name=$sousuo&page=$pages$types'>上一页</a></li>";
                          }elseif(isset($houseList)){
                              echo "<li><a href='/news/index?houseList=$houseList&page=$pages$types'>上一页</a></li>";
                          }else{
                              echo "<li><a href='/news/index?type=$type&page=$pages'>上一页</a></li>";
                          }
                      }
                      $n = 1;
                      if($page >= 4){$first_page = $page-2;}
                      else{$first_page = 1;}
                      if($info['page'] <=5 ){$first_page = 1;}
                      for($i=$first_page;$i<=$info['page'];$i++){
                          if($n <= 5){
                              if(isset($sousuo)){
                                  echo "<li><a id='i$i' href='/news/index?name=$sousuo&page=$i$types'>$i</a></li>";
                              }elseif(isset($houseList)){
                                  echo "<li><a id='i$i' href='/news/index?houseList=$houseList&page=$i$types'>$i</a></li>";
                              }else{
                                  echo "<li><a id='i$i' href='/news/index?type=$type&page=$i'>$i</a></li>";
                              }
                              $n++;
                          }
                      }
                      if($page == $info['page']){
                          echo "<li class='buke'><a>下一页</a></li>";
                      }else{
                          $pages = $page+1;
                          if(isset($sousuo)){
                              echo "<li><a href='/news/index?name=$sousuo&page=$pages$types'>下一页</a></li>";
                          }elseif(isset($houseList)){
                              echo "<li><a href='/news/index?houseList=$houseList&page=$pages$types'>下一页</a></li>";
                          }else{
                              echo "<li><a href='/news/index?type=$type&page=$pages'>下一页</a></li>";
                          }
                      }
                      ?>
                  </ul>
              <? } ?>
          </div>
        <!--
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
        -->
<!--        <a data-sojcommon="click_toutiao_more" class="loading-more" href="javascript:;">-->
<!--            <img alt="" src="/theme/agency/img/loading.gif" class="loading-icon">-->
<!--            <span class="loading-tip">加载更多</span>-->
<!--        </a>-->
      </div>
      
      <div class="col-right">
      	<div class="border-light-gray">
        	<h1 class="h-5">推荐楼盘</h1>
            <? foreach($info['recom'] as $key=>$item){ ?>
            <div class="col-item-3 pll prl">
                <a href="/newhouse/detail?id=<?=$item['id']?>&pm_type=0" target="_blank">
                    <img width="100%" height="150" alt="<?=$item['img_url']?>" src="<?=$item['img_url']?>">
                    <div class="item-title">[<?=$this->news->pmType($item['pm_type']);?>] <?=$item['name']?></div>
                    <div class="item-des gray"><?=$item['slogan']?></div>
                </a>
                <hr>
            </div>
            <? } ?>
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
var color1 = document.getElementById("i<?=$page?>");
color1.style.color="#fff";
color1.style.background="#0367e1";
color1.style.pointerEvents="none";

function sousuo(){
    if($("#name").val() == ""){
        return false;
    }else{
        return true;
    }
}

</script>
</body>
</html>
