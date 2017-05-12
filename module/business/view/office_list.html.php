<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>乐山商铺写字楼出租</title>
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
    .filter-item .pricecond, .filter-item .areacond {
        display: inline-block;
        height: 26px;
        line-height: 26px;
    }
    .filter-item form input {
        border: 1px solid #ccc;
        height: 18px;
        line-height: 18px;
        margin: -4px 0 0;
        padding: 10px;
        text-align: center;
        width: 35px;
    }
    .list-item .info .where span{color: #333;display:inline-block;font-size:14px;font-weight:700;line-height:18px;white-space:nowrap;margin-right:5px;}

    /* list-advs left */
    .list-advs {
        border: 1px solid #ddd;
        margin: 0 0 20px;
        background:#fff;
    }
    .list-advs li{padding:10px 15px;}
    /* guess like css */
    .guess-like {
        border: 1px solid #ddd;
        font-size: 14px;
        margin: 20px 0;
        padding-bottom:15px;
    }
    .guess-like h3 {
        font-size: 18px;
        height: 20px;
        line-height: 20px;
        margin-top:15px;
        font-weight: normal;
    }
    .guess-item a{ text-decoration:none}
    .guess-item img:hover{ opacity:0.8}
    .guess-item p {
        color: #333;
        height: 24px;
        line-height: 24px;
        overflow: hidden;
        margin:5px 0 0;
    }
    .guess-item .g-price em {
        color: #f60;
        font-size: 16px;
    }
    
</style>
<body id="page-top">
<a href="#" id="totop"><i class="fa fa-angle-up"></i></a>
<!-- Navigation -->
<?php include '../../index/view/header.html.php';?>

<!-- Search -->
<div class="container">
	<div class="row mbm">
        <div class="col-md-6">
           <ul class="breadcrumb">
               <li><a href="/">FC114乐山站</a></li>
               <li class="active">写字楼出租</li>
           </ul>
           <input type="hidden" value="{$info.id}" name="layout_id" id="layout_id">
           <input type="hidden" value="{$info.project_name}" name="project_name" id="project_name">
       </div>
        <div class="col-md-6 search-box">
        	<form class="search-form right" method="GET" action="#">
                <input type="text" placeholder="请输入项目名称称或地址..." class="input-search" name="kw" maxlength="100" autocomplete="off" value="">
                <input type="submit" class="btn-search" value="搜索">
            </form>
        </div>
    </div>
    
    <div class="topFilter">
        <div class="topContent">
        	<form method="get" action="/house_list.php" id="searchform" name="searchform">
            <input type="hidden" name="keyword" id="keywords" value="">
            <input type="hidden" name="borough" id="borough" value="">
            <input type="hidden" name="room" id="room" value="">
            <input type="hidden" name="price" id="price" value="">
            <input type="hidden" name="pm_type" id="pm_type" value="">
            <input type="hidden" name="price_sort" id="price_sort" value="">
            </form>
            <div class="filter-item dashed">
                <label class="item-title">区域：</label>
                <div class="item-mod">
                <a target="_self" href="javascript:searchhouse('0','room')"><span class="item-on">不限</span></a>
                <a target="_self" href="javascript:searchhouse('510104','borough')"><span>锦江区</span></a>
                <a target="_self" href="javascript:searchhouse('510105','borough')"><span>青羊区</span></a>
                <a target="_self" href="javascript:searchhouse('510106','borough')"><span>金牛区</span></a>
                <a target="_self" href="javascript:searchhouse('510107','borough')"><span>武侯区</span></a>
                <a target="_self" href="javascript:searchhouse('510108','borough')"><span>成华区</span></a>
                <a target="_self" href="javascript:searchhouse('510109','borough')"><span>高新区</span></a>
                <a target="_self" href="javascript:searchhouse('510112','borough')"><span>龙泉</span></a>
                <a target="_self" href="javascript:searchhouse('510113','borough')"><span>青白江</span></a>
                <a target="_self" href="javascript:searchhouse('510121','borough')"><span>金堂</span></a>
                <a target="_self" href="javascript:searchhouse('510122','borough')"><span>双流</span></a>
                <a target="_self" href="javascript:searchhouse('510123','borough')"><span>温江</span></a>
                <a target="_self" href="javascript:searchhouse('510124','borough')"><span>郫县</span></a>
                <a target="_self" href="javascript:searchhouse('510125','borough')"><span>新都</span></a>
                <a target="_self" href="javascript:searchhouse('510129','borough')"><span>大邑</span></a>
                <a target="_self" href="javascript:searchhouse('510131','borough')"><span>蒲江</span></a>
                <a target="_self" href="javascript:searchhouse('510132','borough')"><span>新津</span></a>
                <a target="_self" href="javascript:searchhouse('510181','borough')"><span>都江堰</span></a>
                <a target="_self" href="javascript:searchhouse('510182','borough')"><span>彭州</span></a>
                <a target="_self" href="javascript:searchhouse('510183','borough')"><span>邛崃</span></a>
                <a target="_self" href="javascript:searchhouse('510184','borough')"><span>崇州</span></a>
                </div>
            </div>
            <!--
            <div class="filter-item dashed">
            	<label class="item-title">地铁：</label>
            	<div class="item-mod">
                <a href="http://cd.fang.anjuke.com/loupan/subway_28/y1/">1号线</a>
                <a href="http://cd.fang.anjuke.com/loupan/subway_29/y1/">2号线</a>
                <a href="http://cd.fang.anjuke.com/loupan/subway_71/y1/">3号线</a>
                <a href="http://cd.fang.anjuke.com/loupan/subway_185/y1/">4号线</a>
                <a href="http://cd.fang.anjuke.com/loupan/subway_184/y1/">7号线</a>
                <a href="http://cd.fang.anjuke.com/loupan/subway_41/y1/">成灌快铁</a>
                </div>
            </div>
            -->
            
            <div class="filter-item dashed">
            	<label class="item-title">面积：</label>
                <div class="item-mod">
                	<a rel="nofollow" class=" " href="#"><span class="item-on">全部</span></a>
                    <a rel="nofollow" class=" " href="#">50平米以下</a>
                    <a rel="nofollow" class=" " href="#">50-70平米</a>
                    <a rel="nofollow" class=" " href="#">70-90平米</a>
                    <a rel="nofollow" class=" " href="#">90-120平米</a>
                    <a rel="nofollow" class=" " href="#">120-144平米</a>
                    <a rel="nofollow" class=" " href="#">144-200平米</a>
                    <a rel="nofollow" class=" " href="#">200-300平米</a>
                    <a rel="nofollow" class=" " href="#">300平米以上</a>
                    <div class="areacond">
                        <form onsubmit="return areaCondition.submit(0)" id="pr_form_apf_id_11" action="#" method="get">
                            <input type="text" value="" autocomplete="off" id="from_area" name="from_area" maxlength="5" class="from-area "> -
                            <input type="text" value="" autocomplete="off" id="to_area" name="to_area" maxlength="5" class="to-area ">&nbsp;<span class="">平米</span>
                            <input type="submit" value="确定" style="display:none" id="arearange_search" class="smit">
                        </form>
                    </div>
                </div>
            </div>

            <div class="filter-item">
                <label class="item-title">价格：</label>
                <div class="item-mod">
                    <a rel="nofollow" class=" " href="#"><span class="item-on">全部</span></a>
                    <a rel="nofollow" class=" " href="#">30元/平米•月以下</a>
                    <a rel="nofollow" class=" " href="#">30-60元</a>
                    <a rel="nofollow" class=" " href="#">60-90元</a>
                    <a rel="nofollow" class=" " href="#">90-120元</a>
                    <a rel="nofollow" class=" " href="#">120-150元</a>
                    <a rel="nofollow" class=" " href="#">150万以上</a>
                    <div class="pricecond">
                        <form onsubmit="return priceCondition.submit(0)" action="#">
                            <input type="text" value="" autocomplete="off" id="from_price" maxlength="5" name="from_price" class="from-price "> -
                            <input type="text" value="" autocomplete="off" id="to_price" maxlength="5" name="to_price" class="to-price ">&nbsp;<span class="">元</span>
                            <input type="submit" value="确定" style="display:none" id="pricerange_search" class="smit">
                        </form>
                    </div>
                </div>
            </div>
            <!--
            <div class="filter-item dashed">
                <label class="item-title">户型：</label>
                <div class="item-mod">
                <a target="_self" href="javascript:searchhouse('0','room')"><span class="item-on">全部</span></a>
                <a target="_self" href="javascript:searchhouse('1','room')"><span>一室</span></a>
                <a target="_self" href="javascript:searchhouse('2','room')"><span>两室</span></a>
                <a target="_self" href="javascript:searchhouse('3','room')"><span>三室</span></a>
                <a target="_self" href="javascript:searchhouse('4','room')"><span>四室</span></a>
                <a target="_self" href="javascript:searchhouse('5','room')"><span>五室以上</span></a>
        		</div>
            </div>
            -->
            <!--
            <div class="filter-item dashed">
                <label class="item-title">更多：</label>
                <div class="item-mod">
                <select data-width="100px"  class="selectpicker form-control mbn" placeholder="年代">
                    <option>年代</option>
                    <option>2010年以后</option>
                    <option>2008年以后</option>
                    <option>2000~2008年</option>
                    <option>2000年以前</option>
                </select>
                
                <select data-width="100px"  class="selectpicker form-control mbn">
                    <option>房屋类型</option>
                    <option>公寓</option>
                    <option>普通住宅</option>
                    <option>别墅</option>
                    <option>平房</option>
                    <option>其它</option>
                </select>
                
                <select data-width="100px"  class="selectpicker form-control mbn">
                    <option>朝向</option>
                    <option>朝东</option>
                    <option>朝西</option>
                    <option>朝南</option>
                    <option>朝北</option>
                    <option>南北</option>
                </select>
                
                <select data-width="100px"  class="selectpicker form-control mbn">
                    <option>楼层</option>
                    <option>6层以下</option>
                    <option>6-12层</option>
                    <option>12层以上</option>
                </select>
                
        		</div>
            </div>
            -->

            
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-9">
            <!-- listing begin  -->
            <div class="main_list">
                <div class="topbar">
                    <div class="left">共有<span class="c-yellow"> 1164 </span>个符合要求的写字楼</div>
                    <!--div class="fr">排序：<a href="http://cd.fang.anjuke.com/loupan/s?m=1" rel="nofollow">推荐</a></div-->
                    <div class="sort-page-box">
                        <div class="newSort">
                        <a rel="nofollow" href="javascript:sysOrder()">默认排序</a>
                        </div>
                        <div class="newSort">
                            <a target="_self" href="javascript:priceOrder()">
                            售价<i class="list-ico down"></i></a>
                            <a target="_self" href="javascript:priceOrder()">
                            面积<i class="list-ico down"></i></a>
                            <a href="javascript:timeOrder()" rel="nofollow">租金<i class="list-ico down"></i></a>
                        </div>
                    </div>
                </div>
                
                <div style="position:relative" class="list-item clearfix" data-link="/index/houseDetail">
                	<a class="col-md-3 img" href="#">
    <img onerror="javascript:this.src='/ui/images/240x180m.jpg'" alt="英伦" src="/theme/agency/img/240x180m.jpg">
                    </a>
                    <div class="col-md-6">
                        <div class="tilte">
                            <h3><a target="_blank" href="#" class="items-name">地铁火车南站富森宜家旁，精装，低价出租</a></h3>
                        </div>
                        
                        <div class="info">
                            <p class="where">
                            <span>200平米</span>
                            <i>|</i>
                            <span>中区楼层 </span>
                            </p>
                            <p>
                            <span class="mrm">蜀都中心</span>
                            <span>[高新 世纪城 天府二街138号]</span>
                            </p>
                            <p>推荐理由：<a>商业,住宅,电梯,  2线</a></p>
                        </div>
                        
                        
                    </div>
                    
                    <div class="col-md-3 favor-pos">
                        <p class="price"><em>1.64</em>元/m²•天</p>
                        <div class="discount-item">
                        	<span class="price-b">1.25万/月</span>
                        	<!--
                            <p class="favor-tag"><em title="高层全款优惠6％，按揭优惠5％" class="discount-txt">58人看过此房</em></p>
                            <p class="favor-tag"><a target="_blank" class="tour-mark" soj="list_kficon" href="">我要看房</a></p>
                         	-->
                        </div>
                    	<div class="tel">
                            <i class="fa fa-phone"> </i> 028-87824111
                        </div>
                    </div>
                </div>
                
                <div style="position:relative" class="list-item clearfix" data-link="/index/houseDetail">
                	<a class="col-md-3 img" href="#">
    <img onerror="javascript:this.src='/ui/images/240x180m.jpg'" alt="英伦" src="/theme/agency/img/240x180m.jpg">
                    </a>
                    <div class="col-md-6">
                        <div class="tilte">
                            <h3><a target="_blank" href="#" class="items-name">金融城地铁口 豪装6隔间带家具 超值写字楼</a></h3>
                        </div>
                        
                        <div class="info">
                            <p class="where">
                            <span>180平米</span>
                            <i>|</i>
                            <span>低区楼层 </span>
                            </p>
                            <p>
                            <span class="mrm">ACC中航城市广场</span>
                            <span>[高新-金融城 府城大道中段88号]</span>
                            </p>
                            <p>推荐理由：<a>商业,住宅,电梯,  2线</a></p>
                        </div>
                        
                        
                    </div>
                    
                    <div class="col-md-3 favor-pos">
                        <p class="price"><em>2.3</em>元/m²•天</p>
                        <div class="discount-item">
                        	<span class="price-b">4.9万/月</span>
                        	<!--
                            <p class="favor-tag"><em title="高层全款优惠6％，按揭优惠5％" class="discount-txt">58人看过此房</em></p>
                            <p class="favor-tag"><a target="_blank" class="tour-mark" soj="list_kficon" href="">我要看房</a></p>
                         	-->
                        </div>
                    	<div class="tel">
                            <i class="fa fa-phone"> </i> 028-87824111
                        </div>
                    </div>
                </div>
                
                <div style="position:relative" class="list-item clearfix" data-link="/index/houseDetail">
                	<a class="col-md-3 img" href="#">
    <img onerror="javascript:this.src='/ui/images/240x180m.jpg'" alt="英伦" src="/theme/agency/img/240x180m.jpg">
                    </a>
                    <div class="col-md-6">
                        <div class="tilte">
                            <h3><a target="_blank" href="#" class="items-name">市中心 雄飞中心280平精装带家具出租含税</a></h3>
                        </div>
                        
                        <div class="info">
                            <p class="where">
                            <span>400平米</span>
                            <i>|</i>
                            <span>中区楼层 </span>
                            </p>
                            <p>
                            <span class="mrm">航天科技大厦</span>
                            <span>[锦江-盐市口 新光华街1号]</span>
                            </p>
                            <p>推荐理由：<a>商业,住宅,电梯,  2线</a></p>
                        </div>
                        
                        
                    </div>
                    
                    <div class="col-md-3 favor-pos">
                        <p class="price"><em>3.29</em>元/m²•天</p>
                        <div class="discount-item">
                        	<span class="price-b">4万/月</span>
                        	<!--
                            <p class="favor-tag"><em title="高层全款优惠6％，按揭优惠5％" class="discount-txt">58人看过此房</em></p>
                            <p class="favor-tag"><a target="_blank" class="tour-mark" soj="list_kficon" href="">我要看房</a></p>
                         	-->
                        </div>
                    	<div class="tel">
                            <i class="fa fa-phone"> </i> 028-87824111
                        </div>
                    </div>
                </div>
                
                                         
            </div>
            <!-- listing end  -->
            <div id="pagination">
            <ul><li class="active"><a href="javascript:void(1);">1</a></li><li><a href="?p=2">2</a></li><li><a href="?p=3">3</a></li><li><a href="?p=4">4</a></li><li><a href="?p=5">5</a></li><li><a href="?p=6">6</a></li><li><a href="?p=7">7</a></li><li><a href="?p=8">8</a></li><li><a href="?p=9">9</a></li><li><a href="?p=10">10</a></li><li><a href="?p=2">下一页</a></li></ul>
            </div>
        </div>
        <div class="col-md-3">
        	<div class="row list-advs">
        	<h1 class="h-5">房价走势</h1>
            <img src="/theme/agency/img/zs.png" class="col-md-12">
            </div>
            
            <div class="row list-advs">
        	<h1 class="h-5">购房问答</h1>
            <ul>
            	<li><a href="#">2016二手房交易需缴纳哪些税费 </a></li>
                <li><a href="#">有住房公积金贷款么 </a></li>
                <li><a href="#">怎么挑选房子地段 </a></li>
                <li><a href="#">外地人在合肥市买房条件一次付款...</a></li>
                <li><a href="#">商住两用商贷，能提取住房公积金... </a></li>
            </ul>
            </div>
        </div>
    </div>
    
    <div class="row guess-like">  
        <h3 class="col-md-12">猜你喜欢</h3>    
        <div class="col-md-2 guess-item clearfix">              
            <a target="_blank" rel="nofollow" href="#">
                <img width="170" height="125" src="/theme/agency/img/133x100m.jpg">
                <p class="g-name">温江-锦汇城</p>
                <p class="g-price"><em>4250</em>元/㎡</p>
            </a>
        </div>
        
        <div class="col-md-2 guess-item clearfix">              
            <a target="_blank" rel="nofollow" href="#">
                <img width="170" height="125" src="/theme/agency/img/133x100m.jpg">
                <p class="g-name">温江-锦汇城</p>
                <p class="g-price"><em>4250</em>元/㎡</p>
            </a>
        </div>
        <div class="col-md-2 guess-item clearfix">              
            <a target="_blank" rel="nofollow" href="#">
                <img width="170" height="125" src="/theme/agency/img/133x100m.jpg">
                <p class="g-name">温江-锦汇城</p>
                <p class="g-price"><em>4250</em>元/㎡</p>
            </a>
        </div>
        <div class="col-md-2 guess-item clearfix">              
            <a target="_blank" rel="nofollow" href="#">
                <img width="170" height="125" src="/theme/agency/img/133x100m.jpg">
                <p class="g-name">温江-锦汇城</p>
                <p class="g-price"><em>4250</em>元/㎡</p>
            </a>
        </div>
        <div class="col-md-2 guess-item clearfix">              
            <a target="_blank" rel="nofollow" href="#">
                <img width="170" height="125" src="/theme/agency/img/133x100m.jpg">
                <p class="g-name">温江-锦汇城</p>
                <p class="g-price"><em>4250</em>元/㎡</p>
            </a>
        </div>
        <div class="col-md-2 guess-item clearfix">              
            <a target="_blank" rel="nofollow" href="#">
                <img width="170" height="125" src="/theme/agency/img/133x100m.jpg">
                <p class="g-name">温江-锦汇城</p>
                <p class="g-price"><em>4250</em>元/㎡</p>
            </a>
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
<script src="/js/bootstrap-select.min.js"></script>

<!-- main JavaScript -->
<script src="/theme/agency/js/agency.js"></script> 

<!--BEGIN JAVASCRIPT-->
<script>
    $('.selectpicker').selectpicker({
        iconBase: 'fa',
        tickIcon: 'fa-check'
    });
</script>
<!--END JAVASCRIPT-->
</body>
</html>
