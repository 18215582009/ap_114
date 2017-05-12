<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title><? if(isset($name)){echo $name."_搜索";}else{echo $bkarr['baike1'][0]['name'];}?>_<?=$this->config->module->name?>_<?=$this->config->app_name?></title>
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
    width: 70px;
    color: #7c7f80;
}
.baike {
    background-image: url(/theme/agency/img/sprite.png);
    background-position: -180px -99px;
    width: 109px;
    height: 27px;
	margin-bottom: 18px;
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
.pagination-pd ul li a{
	margin-left:10px;
	
	}
.buke{
    pointer-events: none;
}
.btn{
    width: 39px;
    height: 34px;
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
          <li><a href="/news/index?type=info">资讯</a></li>
          <li><a href="/news/index?type=policy">政策</a></li>
          <li><a class="check" href="/guide">指南</a></li>
      </ul>
    <form method="get" action="/guide/lists" onsubmit="return sousuo()" class="input-group col-md-4 pull-right mtm">
        <input type="text" placeholder="请输关键字" value="" class="form-control pull-left" id="name" name="name">
        <div class="input-group-btn">
            <button class="btn btn-success" type="submit"><i class="fa fa-search "></i></button>
        </div>
    </form>
  </div>
</div>

<!-- Section -->
<div class="guide">

	<div class="container">
        <div class="row">
            <div class="col-md-12">
               <ul class="breadcrumb">
                   <li><a href="/">首页</a></li>
                   <li><a href="/guide">乐山指南</a></li>
                   <? if(isset($leiid)){ ?>
                       <? if(isset($bkarr['baike2'])){ ?>
                           <li><a href="/guide/lists?baike=<?=$bkarr['baike2'][0]['id']?>"><?=$bkarr['baike2'][0]['name']?></a></li>
                       <? } ?>
                       <li><?=$bkarr['baike1'][0]['name']?></li>
                   <? }elseif(isset($name)){ ?>
                       <li>搜索</li>
                       <li><?=$name?></li>
                   <? } ?>

               </ul>
           </div>
        </div>
    </div>

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
                                        <a class=" LOGCLICK" id="l<?=$info['id']?>" data-log_id="10001" data-bl="classify" data-el="<?=$info['name']?>" href="/guide/lists?baike=<?=$info['id']?>"><?=$info['name']?></a>
                                    </dt>
                                    <dd class="clearfix">
                                        <? foreach($fenlei['cg2'] as $key2=>$info2){ ?>
                                            <? if($info['id'] == $info2['parent_id']){ ?>
                                                <a class=" LOGCLICK" id="l<?=$info2['id']?>" data-log_id="10001" data-bl="classify" data-el="<?=$info2['name']?>" href="/guide/lists?baike=<?=$info2['id']?>"><?=$info2['name']?></a>
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
                    <? if($bkarr['baike'] == ""){ ?>
                        <p>暂时没有<? if(isset($sousuo)){ echo $sousuo;}?>相关的信息</p>
                    <? }else{ ?>
                        <? foreach($bkarr['baike'] as $key=>$info){ ?>
                                <div class="col-md-12">
                                    <div class="list-item clearfix" data-link="/guide/detail?wid=<?=$info['id']?>">
                                        <a href="/guide/detail?wid=<?=$info['id']?>" class="col-md-4" data-toggle="modal" style="padding-left:0">
                                            <img src="<?=$info['photo'] ?>" class="item-img" alt="">
                                        </a>
                                        <div class="col-md-8 pln">
                                            <a id="i<?=$info['id']?>" href="/guide/detail?wid=<?=$info['id']?>" class="item-title"><?=$info['title'] ?></a>
                                            <a href="/guide/detail?wid=<?=$info['id']?>" class="item-des"><?=$info['intro'] ?></a>
                                            <div class="item-info">
                                                类型：<?=$info['name']?>
                                                &nbsp;&nbsp;&nbsp;作者：<?=$info['author']?>&nbsp;&nbsp;&nbsp;<?=$info['postdate']?>
                                            </div>
                                            <div class="item-topic mtm">
                                                <a class="label label-info" target="_blank" href="#">卖房时机</a>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                        <? } ?>
                    <? } ?>

                    <? if($bkarr['baike'] == ''){ ?>
                    <? }else{ ?>
                        <!-- 分页 -->
                        <div class="col-md-12 pagination-pd">
                            <ul class="pagination right">
                                <?
                                    if($page == 1){
                                        echo "<li class='buke'><a>上一页</a></li>";
                                    }else{
                                        $pages = $page-1;
                                        if(isset($leiid)){
                                            echo "<li><a href='/guide/lists?baike=$leiid&page=$pages'>上一页</a></li>";
                                        }elseif(isset($name)){
                                            echo "<li><a href='/guide/lists?name=$name&page=$pages'>上一页</a></li>";
                                        }
                                    }
                                    $n = 1;
                                    if($page >= 4){$first_page = $page-2;}
                                    else{$first_page = 1;}
                                    if($bkarr['page'] <=5 ){$first_page = 1;}
                                    for($i=$first_page;$i<=$bkarr['page'];$i++){
                                        if($n <= 5){
                                            if(isset($leiid)){
                                                echo "<li><a id='i$i' href='/guide/lists?baike=$leiid&page=$i'>$i</a></li>";
                                            }elseif(isset($name)){
                                                echo "<li><a id='i$i' href='/guide/lists?name=$name&page=$i'>$i</a></li>";
                                            }
                                            $n++;
                                        }
                                    }
                                    if($page == $bkarr['page']){
                                        echo "<li class='buke'><a>下一页</a></li>";
                                    }else{
                                        $pages = $page+1;
                                        if(isset($leiid)){
                                            echo "<li><a href='/guide/lists?baike=$leiid&page=$pages'>下一页</a></li>";
                                        }elseif(isset($name)){
                                            echo "<li><a href='/guide/lists?name=$name&page=$pages'>下一页</a></li>";
                                        }
                                    }
                                ?>
                            </ul>
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
<? if(isset($leiid)){ ?>
    $("#l<?=$leiid?>").css("color","#00ae66");
<?}?>
$("#i<?=$page?>").css("color","#ffffff");
$("#i<?=$page?>").css("background","#0367e1");
$("#i<?=$page?>").css("pointerEvents","none");

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
