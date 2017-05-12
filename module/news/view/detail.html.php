<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title><?=$detail['zheng'][0]['title']?>_<?=$detail['zheng'][0]['name']?>_<?=$type=="info"?"资讯":"政策"?>_<?=$this->config->app_name?></title>
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
  	<div class="logo logo-<?=$type?>"><a href="#"></a></div>
    <ul class="navlist">
    <li><a <? if($type=='info'){ ?>class="check" <? } ?>href="/news/index?type=info">资讯</a></li>
    <li><a <? if($type=='policy'){ ?>class="check" <? } ?>href="/news/index?type=policy">政策</a></li>
    <li><a <? if($type=='guide'){ ?>class="check" <? } ?>href="/guide">指南</a></li>
    </ul>
    <div method="get" action="/news/index" onsubmit="return sousuo()" class="input-group col-md-4 pull-right mtm">
        <input type="text" placeholder="请输关键字" value="" class="form-control pull-left" id="name" name="name">
        <input type="hidden" name="type" value="<?=$type=="info"?"info":"policy"?>"/>
        <div class="input-group-btn">
            <button onclick="sousuo()" class="btn btn-success" type="submit"><i class="fa fa-search "></i></button>
        </div>
    </div>
  </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
           <ul class="breadcrumb">
               <li><a href="/">首页</a></li>
               <li><a href="/news/index?type=<?=$type=="info"?"info":"policy"?>">乐山<?=$type=="info"?"资讯":"政策"?></a></li>
               <? if($detail['zheng'][0]['name']){ ?>
                   <li><a href="/news/index?houseList=<?=$detail['zheng'][0]['cid']?>"><?=$detail['zheng'][0]['name']?></a></li>
               <? }else{ ?>
                   <li>其他类型</li>
               <? } ?>
               <li class="active">正文</li>
           </ul>
       </div>
    </div>
</div>
<style>
.article .attr{ color: #616669;}
.article .article-bd {
    margin-top: 30px;
    min-height: 200px;
    position: relative;
}
.article .summary {background-color: #f0f3f5;color: #849aae;font-size: 16px;line-height: 28px;margin-top: 20px;padding: 33px 40px;}
.article p{font-size:16px;}
.article .article-bd .article-detail h1{font-size:22px;line-height: 31px;}
.r-list li {
    border: 0 none;
    font-size: 14px;
    overflow: hidden;
    padding-bottom: 20px;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.btn{
    width: 39px;
    height: 34px;
}
</style>
<!-- Article Section -->
<div id="article">
  <div class="container">
    <div class="row">
      <div class="col-left">
      	<div class="article">
        	<div class="article-hd">
                <h2 class="title"><?=$detail['zheng'][0]['title']?></h2>
                <div class="attr mtl mbl clearfix">
                    <div class="mrl left">
                        <span class="time">发布时间：<?=$detail['zheng'][0]['postdate']?></span>
                    </div>
                    <div class="mll mrl left">
                        <span class="author">作者：<?=$detail['zheng'][0]['author']==''?"未知":$detail['zheng'][0]['author']?></span>
                    </div>
                    <div class="mll right">
                        <span class="source">来源：<?=$detail['zheng'][0]['fromsite']==''?"未知":$detail['zheng'][0]['fromsite']?></span>
                    </div>
                </div>
                <div class="summary">
                    <span><b>文章摘要：</b></span><span id="intro"><?=$detail['zheng'][0]['intro']?></span>
                </div>
            </div>
            <div class="article-bd mbxxl">
            	<div class="article-detail">
                    <?=$detail['zheng'][0]['content']?>
            </div>
            </div>
        </div>
      </div>
      
      <div class="col-right">
      	<div class="">
        	<h1 class="h-5">热点要闻</h1>
            <div class="col-item-3 pll prl">
                <ul class="r-list mtl">
                    <? foreach($detail['tuijian'] as $key=>$info){ ?>
                        <? if($key == 0){?>
                            <li><a href="/news/detail?type=info&id=<?=$info['id']?>"><lable class="label label-danger mrs">热点</lable><?=$info['title']?></a></li>
                        <? }else if($key == 1){ ?>
                            <li><a href="/news/detail?type=info&id=<?=$info['id']?>"><lable class="label label-warning mrs">政策</lable><?=$info['title']?></a></li>
                        <? }else if($key == 2){ ?>
                            <li><a href="/news/detail?type=info&id=<?=$info['id']?>"><lable class="label label-success mrs">政策</lable><?=$info['title']?></a>
                        <? }else{ ?>
                            <li><a href="/news/detail?type=info&id=<?=$info['id']?>"><lable class="mrs">[动态]</lable><?=$info['title']?></a></li>
                        <? } ?>
                    <? } ?>
                    <br/><br/><br/>
<!--                    <li><a href="#"><lable class="label label-danger mrs">热点</lable>四川出租车取消“顶子费” “份子钱”可协商动态调整</a></li>-->
<!--                    <li><a href="#"><lable class="label label-warning mrs">政策</lable>成都规划局遏制楼盘“超面积”现象&nbsp;将会有惩罚</a></li>-->
<!--                    <li><a href="#"><lable class="label label-success mrs">政策</lable>惊呆!成都楼市连续16天未见新预售号</a></li>-->
<!--                    <li><a href="#"><lable class="mrs">[动态]</lable>成都严处中德红谷违法广告&nbsp;关联公司被罚100万元</a></li>-->
<!--                    <li><a href="#"><lable class="mrs">[动态]</lable>龙湖21年洋房修为， 匠造一座三千庭</a></li>-->
<!--                    <li><a href="#"><lable class="mrs">[动态]</lable>成都严处中德红谷违法广告&nbsp;关联公司被罚100万元</a></li>-->
<!--                    <li><a href="#"><lable class="mrs">[动态]</lable>龙湖21年洋房修为， 匠造一座三千庭</a></li>-->
<!--                    <li><a href="#"><lable class="mrs">[动态]</lable>成都严处中德红谷违法广告&nbsp;关联公司被罚100万元</a></li>-->
<!--                    <li><a href="#"><lable class="mrs">[动态]</lable>龙湖21年洋房修为， 匠造一座三千庭</a></li>-->
            	</ul>
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

<!-- main JavaScript -->
<script src="/theme/agency/js/agency.js"></script>

<script>
    function sousuo(){
        if($("#name").val() == ""){
            return false;
        }else{
            return true;
        }
    }
    var intro = document.getElementById('intro');
    s = intro.innerHTML.replace("<p>","");
    ss = s.replace("</p>","");
    intro.innerHTML = ss;

</script>

</body>
</html>
