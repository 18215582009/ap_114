<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>写字楼出售_<?=$this->config->siteName;?></title>
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
        line-height: 1px;
        margin: -4px 0 0;
        padding: 10px 3px;
        text-align: center;
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
               <li class="active">写字楼出售</li>
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
        	<form method="get" action="/office/index" id="searchform" name="searchform">
            <input type="hidden" name="type" id="type" value="<?=$type?>">
            <input type="hidden" name="pm_type" id="pm_type" value="<?=$pm_type?>">
            <input type="hidden" name="borough" id="borough" value="<?=$borough?>">
            <input type="hidden" name="price" id="price" value="<?=$price?>">
            <input type="hidden" name="price_sort" id="price_sort" value="<?=$price_sort?>">
            <input type="hidden" name="time_sort" id="time_sort" value="<?=$time_sort?>">
            <input type="hidden" name="total_area" id="total_area" value="<?=$total_area?>">
            <input type="hidden" name="total_area_sort" id="total_area_sort" value="<?=$total_area_sort?>">
            </form>
            <div class="filter-item dashed">
                <label class="item-title">区域：</label>
                <div class="item-mod">

                     <? foreach($this->config->borough_option as $key=>$item) {
                                $seleted = '';
                                if($key==$borough)$seleted = ' class="item-on"';
                                echo "<a target=\"_self\" href=\"javascript:searchhouse('".$key."','borough')\"><span".$seleted.">".$item."</span></a>";
                               }
                            ?>

                </div>
            </div>
            
            <div class="filter-item dashed">

            	<label class="item-title">面积：</label>
                <div class="item-mod">
                
               <? foreach($area as $key=>$value) {
                    $seleted = '';
                    if($key===$total_area)
                    $seleted = ' class="item-on"';
                    echo "<a target=\"_self\" href=\"javascript:searchhouse('".$key."','total_area')\"><span".$seleted.">".$value."</span></a>";
                }
                ?>
                  <div class="areacond">
                      <form id="pr_form_apf_id_11">
                          <? $measures = explode('-',$total_area); if(strlen($total_area)!=1){ $seleted = " item-on";} ?>
                          <input type="text" value="<?=$measures[0] == 0?'':$measures[0]?>" autocomplete="off" id="from_area" name="from_area" size="2"   maxlength="5" class="from-area area_custom custom <?=$seleted ?>"> -
                          <input type="text" value="<? if(strlen($total_area)==1){ echo '';}else{ ?><? if($measures[1]==0){echo '';}else{ echo count($measures)==1?'':$measures[1];} ?><? } ?>" autocomplete="off" id="to_area" name="to_area" maxlength="5" size="2"  class="to-area area_custom custom <?=$seleted ?>">&nbsp;<span class="">平米</span>
                          <input type="button" value="确定" style="display: none" onclick="range_search('total_area')" id="arearange_search" class="smit">
                      </form>
                  </div>
         
                </div>



            </div>

            <div class="filter-item">
                <label class="item-title">价格：</label>
                <div class="item-mod">

                  <? foreach ($price_option as $key => $value) {
                    $seleted = '';
                    if($key==$price) $seleted = ' class="item-on"';
                     echo "<a target=\"_self\" href=\"javascript:searchhouse('".$key."','price')\"><span".$seleted.">".$value."</span></a>";
                    }
                    ?>
                    <div class="pricecond">
                        <form>
                            <? $prices = explode('-',$price);  if(strlen($price)!=1){ $seleted = " item-on";} ?>
                            <input type="text" value="<?=$prices[0] == 0?'':$prices[0]?>" autocomplete="off" id="from_price" maxlength="5" size="2"   name="from_price" class="from-price price_custom custom <?=$seleted ?>"> -
                            <input type="text" value="<? if(strlen($price)==1){ echo '';}else{ ?><? if($prices[1]==0){echo '';}else{ echo count($prices)==1?'':$prices[1];} ?><? } ?>" autocomplete="off" id="to_price" maxlength="5" size="2" name="to_price" class="to-price price_custom custom <?=$seleted ?>">&nbsp;<span class="">元</span>
                            <input type="button" value="确定" onclick="range_search('price')" style="display:none" id="pricerange_search" class="smit">
                        </form>
                    </div>
                   
                </div>
            </div>   
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-9">
            <!-- listing begin  -->
            <div class="main_list">
                <div class="topbar">
                    <div class="left">共有<span class="c-yellow"> <?=$total?></span>个符合要求的写字楼</div>
                    <!--div class="fr">排序：<a href="http://cd.fang.anjuke.com/loupan/s?m=1" rel="nofollow">推荐</a></div-->
                    <div class="sort-page-box">
                        <div class="newSort">
                        <a rel="nofollow" href="javascript:sysOrder()">默认排序</a>
                        </div>
                        <div class="newSort">
                            <a target="_self" href="javascript:priceOrder()">
                              售价
                                    <? if($price_sort=='price_asc'){ ?>
                                        <i class="list-ico up"></i>
                                    <? }else{ ?>
                                        <i class="list-ico down"></i>
                                    <? }?>
                            <a target="_self" href="javascript:areaOrder()">
                            面积
                               <? if($total_area_sort=='total_area_asc'){ ?>
                                        <i class="list-ico up"></i>
                                    <? }else{ ?>
                                        <i class="list-ico down"></i>
                                    <? }?>
                             <a target="_self" href="javascript:timeOrder()">
                                最新
                                <? if($time_sort=='time_asc'){ ?>
                                    <i class="list-ico up"></i>
                                <? }else{ ?>
                                    <i class="list-ico down"></i>
                                <? }?>
                            </a>
                    
                        </div>
                    </div>
                </div>




            <? foreach ($list as $key => $value) { ?>
                            <div style="position:relative" class="list-item clearfix" data-link="/office/detail?id=<?=$value['id']?>">
                            	<a class="col-md-3 img" href="#">
                <img onerror="javascript:this.src='<?=$value['img_url']?>'" alt="英伦" src="<?=$value['img_url']?>">
                                </a>








                                <div class="col-md-6">
                                    <div class="tilte">
                                        <h3><a target="_blank" href="#" class="items-name"><?=$value['name']?></a></h3>
                                         <? if($value['status'] == 1){ ?><i class="label label-sm label-success">在售</i><? } ?>
                                        <? if($value['status'] == 2){ ?><i class="label label-sm " style="background-color: orange">未出售</i><? } ?>
                                        <? if($value['status'] == 3){ ?><i class="label label-sm " style="background-color: #c1c6c6">售完</i><? } ?>
                                        <? if($key <6){ ?>
                                            <i class="label label-sm label-warning">推荐</i>
                                        <? } ?>
                                    </div> 
                                    <div class="info">
                                        <p class="where">
                                        <span><?=$value['total_area']?></span>
                                        <i>|</i>
                                        <span><?=$value['build_struct']?></span>
                                        </p>
                                        <p>
                                        <span class="mrm" ><?=$value['address']?></span>
                                        <span>[ <i class="fa fa-map-marker"></i> &nbsp;<?=$value['sale_address']?>]</span>
                                        </p>
                                        <p><?=$value['developer']?></p>
                                    </div>
                                    
                                </div>
                                

                                <div class="col-md-3 favor-pos">
                                    <?if($type=='sale'){?>
                                        <p class="price">均价<span><?=$value['red_house_price_average']?></span><em>元/m²</em></p>
                                        <div class="discount-item pdn">
                                            <span class="price-b">总面积<?=$value['office_area']?></span>
                                        </div>
                                    <?}else{?>
                                    <p class="price-a"><em>2.3</em>元/m²•天</p>
                                    <div class="discount-item pdn">
                                    	<span class="price-b">4.9万/月</span>
                                    </div>
                                    <?}?>
                                	<div class="tel">
                                        <i class="fa fa-phone"> </i> <?=$value['telephone']?>
                                    </div>
                                </div>
                            </div>
            <? }?>
        




            </div>
            <!-- listing end  -->
            <div id="pagination">
            <ul> 
                <?=$pageNation?>
            </ul>
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


<? foreach($youlike as $key=>$like){ ?>
            <div class="col-md-2 guess-item clearfix">
                <a target="_blank" rel="nofollow" href="/office/detail?id=<?=$like['id']?>&pm_type=0">
                    <img width="170" height="125" src="<?=$like['img_url'] ?>">
                    <p class="g-name"><?=$like['name'] ?></p>
                    <p class="g-price"><em><?=$like['red_house_price_average'] ?></em>元/㎡</p>
                </a>
            </div>
<? } ?>


        
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

<!--BEGIN JAVASCRIPT-->

<!--END JAVASCRIPT-->
</body>

<script>
    function search(){
        if($("#keyword").val() == ''){
            return false;
        }else{
            $("#price_sort").val('');
            $("#time_sort").val('');
             $("#total_area_sort").val('');
            return true;
        }
    }
    function closesearch(){
        $("#keyword").val('');
        $("#search").remove();
        document.searchform.submit();
    }

    function searchhouse(key,obj){
        $("#"+obj).val(key);
        document.searchform.submit();
    }

    $(".custom").keyup(function(){
        this.size=(this.value.length>4?this.value.length:2);
        this.value=this.value.replace(/\D/gi,'')
    });

    $(document).click(function(e){
        e = window.event || e; // 兼容IE7
        obj = $(e.srcElement || e.target);
        if ($(obj).is("#pricerange_search,.price_custom")) {
            $("#pricerange_search").css("display","inline-block");
        } else {
            $("#pricerange_search").css("display","none");
        }
    });
    $(document).click(function(e){
        e = window.event || e; // 兼容IE7
        obj = $(e.srcElement || e.target);
        if ($(obj).is("#arearange_search,.area_custom")) {
            $("#arearange_search").css("display","inline-block");
        } else {
            $("#arearange_search").css("display","none");
        }
    });

    function range_search(type){
        if($('#from_'+type).val() != '' || $('#to_'+type).val() != ''){
            var from = 0;
            var to = 0;
            if($('#from_'+type).val()!=''){
                from = $("#from_"+type).val();
            }
            if($('#to_'+type).val()!=''){
                to = $("#to_"+type).val();
            }
            if($("#from_"+type).val()!='' && $("#to_"+type).val()!=''){
                if(parseInt(from) > parseInt(to)){
                    $('#from_'+type).val(to);
                    $('#to_'+type).val(from);
                    $("#"+type).val(to+"-"+from);
                }else{
                    $("#"+type).val(from+"-"+to);
                }
            }else{
                $("#"+type).val(from+"-"+to);
            }
            document.searchform.submit();
        }
    }

    function areaOrder(){
        var total_area_sort = $("#total_area_sort").val();
        if(total_area_sort=='total_area_asc'){
            $("#total_area_sort").val('total_area_desc');
        }else{
            $("#total_area_sort").val('total_area_asc');
        }
        $("#time_sort").val('');
        $("#price_sort").val('');
        document.searchform.submit();
    }

    function priceOrder(){
        var price_order = $("#price_sort").val();
        if(price_order=='price_asc'){
            $("#price_sort").val('price_desc');
        }else{
            $("#price_sort").val('price_asc');
        }
         $("#time_sort").val('');
         $("#total_area_sort").val('');
        document.searchform.submit();
    }

    function timeOrder(){
        var time_order = $("#time_sort").val();
        if(time_order=='time_asc'){
            $("#time_sort").val('time_desc');
        }else{
            $("#time_sort").val('time_asc');
        }
        $("#price_sort").val('');
         $("#total_area_sort").val('');
        document.searchform.submit();
    }

    function sysOrder(){
        $("#price_sort").val('');
        $("#time_sort").val('');
        $("#total_area_sort").val('');
        document.searchform.submit();
    }

    $('#arearange_search').click(function(){
        var  from_area = $('#from_area').val();
        var to_area =$('#to_area').val();
        if(parseInt(from_area) > parseInt(to_area)){
            var  to_area =$('#from_area').val();
            var  from_area = $('#to_area').val();
        }
    $('#total_area').val(from_area+'-'+to_area);
     document.searchform.submit();

    })

    $('#pricerange_search').click(function(){
        var  from_price = $('#from_price').val();
        var to_price =$('#to_price').val();
        if(parseInt(from_price) > parseInt(to_price)){
            var  to_price =$('#from_price').val();
            var  from_price = $('#to_price').val();
        }
    $('#price').val(from_area+'-'+to_area);
     document.searchform.submit();

    })

</script>



</html>
