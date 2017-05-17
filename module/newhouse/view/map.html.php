<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>新房_<?=$this->config->siteName;?></title>

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

<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=cZbx2Is0Hu8G0nG0Oj1EMGbY"></script>
</head>
<style>
    #mainNav{box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);}
    .mapContent .mapleft{width:70%;position:relative;float:left}
    .mapContent .mapRight{width:30%;float:left;box-shadow: -1px 0 2px rgba(0, 0, 0, 0.26); position: relative; overflow-y: scroll;}
    .page-header-clear{height:50px }
    .map-head{
        color:#eef;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
        height: 42px;
        width: 100%;
        position: absolute;
        right: 0;
        top: 0;
        z-index: 0;
    }
    .map-head .map-head-wrp {
        width:100%;
        height:inherit;
        position: relative;
    }
    .map-head .map-filter{
        cursor: default;
        float: left;
        height: 42px;
        line-height: 42px;
        width: 100%;
    }
    .map-head .map-filter-clear{padding:0 20px;float:left;width: 90px;}
    .map-head .list-mode {
        cursor: default;
        color: #eef;background: #222;
        height: 42px;
        line-height: 42px;
        text-align: center;
        width: 120px;
        position: absolute;
        right: 0;
        top:0;
    }
    .switch-a{color:#eef}
    .map-head .map-head-bg {
        background: #4a4a4a none repeat scroll 0 0;
        height: 100%;
        left: 0;
        opacity: 0.87;
        position: absolute;
        top: 0;
        width: 100%;
        z-index: -1;
    }
    .search-box .input-search {
        border-color: #eef;
        border-radius: 0;
        padding: 7px 10px;
        width: 160px;
        margin-top: 5px;
    }
    .search-box .btn-search{width: 40px; margin-top: 5px; height: 32px; line-height: 32px;border-radius:0;}
    .mapleft .dropdown{width: 90px;}
    .mapleft .dropdown-menu{min-width: 90px;}
    .mapleft .dropdown-menu > li > a {padding: 3px 10px 3px 7px;}
    .btn-map{padding:10px 10px;width: 90px;color:#eef;background:none;border:none;border-right: 1px #eee solid; vertical-align: baseline}
    .btn-map:hover,.btn-map:focus{color: #eee}
    .split{border-left: 1px #eee solid;}

    .mapRight .list-head {
        background: #f7f7f7 none repeat scroll 0 0;
        height: 72px;
    }
    .mapRight .list-head .list-attr {
        font-size: 18px;
        height: 48px;
        line-height: 48px;
        padding-left: 16px;
        position: relative;
        margin: 0;
    }
    .mapRight .list-head .list-summary {
        background: #f7f7f7 none repeat scroll 0 0;
        border-bottom: 1px solid #dedede;
        font-size: 14px;
        height: 26px;
        padding-left: 16px;
        position: relative;
        margin:0;
    }
    .mapRight .list-result{
        position: absolute;
    }
    .mapRight .list-result .mapListBt > li {
        border-bottom: 1px solid #ddd;
        height: 130px;
        padding: 5px 0;
        position: relative;
    }
    .mapListBt > li:hover {
        background-color: #f3f3f3;
    }
    .mapRight .list-result .mapListImg{
        border: 1px solid #ddd;
        float: left;
        height: 98px;
        margin: 3% 3% 0;
        overflow: hidden;
        position: relative;
        width: 37%;}
    .mapRight .list-result .mapListDet {
        display: inline;
        float: left;
        height: 82%;
        margin-top: 10px;
        overflow: hidden;
        width: 57%;
    }
    .mapRight .list-result .mapPoint{margin-left: 10px;}
    .mapRight .list-result .mapListImg .imgts {
        height: 98px;
        transition: all 0.3s ease 0s;
        width: 100%;
    }
    .mapRight .list-result li:hover .imgts {
        transform: scale(1.04, 1.04);
    }
    .mapRight a:hover {
        color: #444;
        text-decoration: none;
    }
    .mapListDet > .timu {
        float: left;
        height: 30px;
        line-height: 30px;
        overflow: hidden;
        position: relative;
        width: 100%;
    }
    .mapListDet > .timu > u {
        color: #333;
        float: left;
        font-size: 14px;
        font-weight: bold;
        overflow: hidden;
        text-decoration: none;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .mapListDet > .timu > span {
        color: #c00;
        float: right;
        font-size: 14px;
        margin-right: 12px;
    }
    .mapListDet:hover > .timu > u {
        color: #c00;
    }
    .mapListDet > .jushi {
        float: left;
        margin-top: 5px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .area {
        position: absolute;
        right: 19px;
        top: 49px;
    }
    .mapListDet > .mesMore {
        float: left;
        margin-top: 12px;
        overflow: hidden;
        width: 100%;
    }
    .mapListDet > .mesMore > li {
        float: left;
        line-height: 22px;
        margin-right: 5px;
    }
    .mapListDet > .mesMore > li > u {
        border: 1px solid #ddd;
        color: #999;
        display: block;
        font-size: 12px;
        height: 20px;
        line-height: 20px;
        padding: 0 5px;
    }
    .mapListDet u {
        text-decoration: none;
    }
    /* pagnation css */
    #pagination a{padding:4px 7px}
</style>
<body id="page-top">
<a href="#" id="totop"><i class="fa fa-angle-up"></i></a>
<!-- Navigation -->
<?php include '../../index/view/header.html.php';?>

<!-- mapContent -->
<div class="mapContent">
    <div class="mapleft">
        <!--百度地图容器-->
        <div id="dituContent"></div>
        <div class="map-head">

            <div class="map-head-wrp clearfix">
                <div class="map-filter search-box">

                  
                        <input placeholder="请输入小区名称或地址..." class="input-search" name="kw" maxlength="100" id = "kw" autocomplete="off" value="" type="text">
                        <input type="hidden" id="page" value="1">
                        <input type="hidden" id="pm_type" value="">
                        <input type="hidden" id="borough" value="">
                        <input type="hidden" id="apa_room" value="">
                        <input type="hidden" id="price" value="">
                        <button type="buuton" class="btn-search"  onclick="searchHouse()"><i class="fa fa-search"></i></button>
           

                    <div class="dropdown pull-left">
                        <a data-toggle="dropdown" class="btn btn-map split" data-target="#" href="javascript:;">
                            <span id="pm_typeTxt">类型</span><span class="mls caret"></span>
                        </a>
                        <ul class="dropdown-menu multi-level" role="pm_type">
                            <li><a href="javascript:;" onclick="selectCond(this,'pm_type','0')">不限</a></li>
                            <li><a href="javascript:;" onclick="selectCond(this,'pm_type','22308')">住宅</a></li>
                            <li><a href="javascript:;" onclick="selectCond(this,'pm_type','22301')">别墅</a></li>
                            <li><a href="javascript:;" onclick="selectCond(this,'pm_type','22304')">商业</a></li>
                            <li><a href="javascript:;" onclick="selectCond(this,'pm_type','22305')">写字楼</a></li>
                        </ul>
                    </div>

                    <div class="dropdown pull-left">
                        <a data-toggle="dropdown" class="btn btn-map" data-target="#" href="javascript:;">
                            <span id="boroughTxt">城区</span><span class="mls caret"></span>
                        </a>
                        <ul class="dropdown-menu multi-level" role="borough">
                            <? foreach ($this->config->borough_option as $key=>$item){ ?>
                            <li><a href="javascript:;" onclick="selectCond(this,'borough','<?=$key?>')"><?=$item?></a></li>
                            <? } ?>
                            <!--li class="divider"></li>
                            <li><a href="javascript:;" onclick="selectCond(this,'boroughTxt')">金牛区</a></li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="javascript:;">一级菜单</a>
                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="javascript:;">二级菜单</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-submenu">
                                        <a href="javascript:;">二级菜单</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="javascript:;">三级菜单</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li-->
                        </ul>
                    </div>

                    <div class="dropdown pull-left" style="width: 100px;">
                        <a data-toggle="dropdown" class="btn btn-map" data-target="#" href="javascript:;">
                            <span id="apa_roomTxt">户型</span><span class="mls caret"></span>
                        </a>
                        <ul class="dropdown-menu multi-level" role="apa_room">
                            <? foreach ($this->config->apa_room_option as $key=>$item){ ?>
                            <li><a href="javascript:;" onclick="selectCond(this,'apa_room','<?=$key?>')"><?=$item?></a></li>
                            <? } ?>
                        </ul>
                    </div>

                    <!--div class="dropdown pull-left">
                        <a id="tube" data-toggle="dropdown" class="btn btn-map" data-target="#" href="javascript:;">
                            <span id="tubeTxt">地铁</span><span class="mls caret"></span>
                        </a>
                        <ul class="dropdown-menu multi-level" role="tube">
                            <li><a href="javascript:;" onclick="selectCond(this,'tubeTxt')">不限</a></li>
                            <li><a href="javascript:;" onclick="selectCond(this,'tubeTxt')">1号线</a></li>
                            <li><a href="javascript:;" onclick="selectCond(this,'tubeTxt')">2号线</a></li>
                        </ul>
                    </div-->
                    <div class="dropdown pull-left" style="width: 110px;">
                        <a data-toggle="dropdown" class="btn btn-map" data-target="#" href="javascript:;" style="width: 110px;">
                            <span id="priceTxt">售价</span><span class="mls caret"></span>
                        </a>
                        <ul class="dropdown-menu multi-level" role="price" style="width: 110px;">
                            <? foreach ($this->config->price_option as $key=>$item){ ?>
                            <li><a href="javascript:;" onclick="selectCond(this,'price','<?=$key?>')"><?=$item?></a></li>
                            <? } ?>
                        </ul>
                    </div>

                    <div class="map-filter-clear" onclick="clearSearch()"><i class="fa fa-trash-o mrs"></i>清空</div>

                </div>
                <div class="list-mode">
                    <a class="switch-a" href="/newhouse/index">
                        <i class="fa fa-list mrm"></i>列表模式
                    </a>
                </div>
            </div>
            <div class="map-head-bg"></div>
        </div>
    </div>
    <div class="mapRight">
        <div class="list-head">
            <h1 class="list-attr">成都市</h1>
            <h2 class="list-summary">
                共找到在售房源 <b class="text-danger" id="total"></b> 套
            </h2>
        </div>
        <div class="list-result">
            <ul class="mapListBt">

            </ul>
            <div id="pagination"></div>
        </div>

    </div>
</div>

<ul class="mapListBtTmp" style="display: none">
    <li id="listtmp" class="list-result" alt="{$list[a].map_x},{$list[a].map_y},{$list[a].id}">
        <a href="javascript:;" target="_blank">
            <div class="mapListImg">
                <img src="/theme/agency/img/210x140m.jpg" class="imgts" style="display: inline;">
            </div>
            <div class="mapListDet rel">
                <div class="timu clearfix">
                    <u class="name">海伦印象</u>
                    <span class="price">13000<span>元/平米</span></span>
                </div>
                <span class="jushi clearfix">
                    <u>三居</u>
                    <u>四居</u>
                    <span class="mapPoint">[ <i class="fa fa-map-marker"></i>地图 ]</span>
                </span>
                <div class="area f12 gray6">89-119m²</div>
                <ul class="mesMore clearfix">
                    <li><u>小户型</u></li>
                    <li><u>南北通透</u></li>
                    <li><u>露台</u></li>
                </ul>
            </div>
        </a>
    </li>
</ul>
<!-- jQuery -->
<script src="/js/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="/js/vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Plugin JavaScript -->
<!-- main JavaScript -->
<script src="/theme/agency/js/agency.js"></script>

<script>
    var marketS = [];
    var marketI = [];

    var data = {
        total: '5444',
        list: [
            {'id':'1','name':'卓锦城','price':'9000元/平米','area':'80-90m²','feature':'南北通透,小户型,露台','spic':'/theme/agency/img/210x140m.jpg','map_x':'104.076251','map_y':'30.661455','jushi':'<u>三居</u><u>四居</u>','mesMore':'<li><u>小户型</u></li><li><u>南北通透</u></li><li><u>露台</u></li>'},
            {'id':'2','name':'中海国际','price':'9000元/平米','area':'80-90m²','feature':'南北通透,小户型,露台','spic':'/theme/agency/img/210x140m.jpg','map_x':'104.279251','map_y':'30.653455','jushi':'<u>二居</u><u>三居</u>','mesMore':'<li><u>南北通透</u></li><li><u>露台</u></li>'},
            {'id':'3','name':'468公馆','price':'9000元/平米','area':'80-90m²','feature':'南北通透,小户型,露台','spic':'/theme/agency/img/210x140m.jpg','map_x':'104.170051','map_y':'30.669455','jushi':'<u>三居</u><u>四居</u>','mesMore':'<li><u>小户型</u></li><li><u>南北通透</u></li><li><u>露台</u></li>'},
            {'id':'4','name':'马克公馆','price':'9000元/平米','area':'80-90m²','feature':'南北通透,小户型,露台','spic':'/theme/agency/img/210x140m.jpg','map_x':'104.374251','map_y':'30.661455','jushi':'<u>三居</u><u>四居</u>','mesMore':'<li><u>小户型</u></li><li><u>南北通透</u></li><li><u>露台</u></li>'},
        ]
    };

    //清空搜索
    function clearSearch() {
        $("#page").val(1);
        $("#pm_type").val('');
        $("#borough").val('');
        $("#apa_room").val('');
        $("#price").val('');
        $("#pm_typeTxt").html('类型');
        $("#boroughTxt").html('城区');
        $("#apa_roomTxt").html('户型');
        $("#priceTxt").html('售价');
        searchHouse();
    }

    //选择搜房条件
    function selectCond(obj,name,key){
        var txt = $(obj).html();
        $("#"+name+"Txt").html(txt);
        $("#"+name).val(key);
        searchHouse();
    }

    //获取数据
    function searchHouse(){
        var page = $("#page").val();
        var pm_type = $("#pm_type").val();
        var borough = $("#borough").val();
        var apa_room = $("#apa_room").val();
        var price = $("#price").val();
        var keyword= $("#kw").val();
        $.ajax({
            url: "/newhouse/apiMapSearch",
            dataType: "json",
            data:{
                keyword:keyword,
                page: page,
                pm_type:pm_type,
                borough:borough,
                apa_room:apa_room,
                price:price

            },
            success: function( data ) {
                houseList(data);
                //清除地图上的 overlays
                map.clearOverlays();
                marketS = [];
                markerProject(data);
            }
        });
    }

    //渲染列表
    function houseList(obj){

        $('#total').html(obj.total);

        //处理分页
        $('#pagination').html('<ul>'+obj.pageNation+'</ul>');
        $.each($('#pagination').find("li[class!='active'] a"),function(index,obj){
            var pageInfo = $(obj).attr('href');
            var pageInfoArr = pageInfo.split('page=');
            //console.log(pageInfoArr);
            $(obj).attr('href','javascript:void(0)');
            $(obj).click(function () {
                $("#page").val(pageInfoArr[1]);
                searchHouse();
            })
        });

        $('.mapListBt').empty();
        $.each(obj.list,function(index,item){
            var listtmp = $('#listtmp').clone();
            var curlist = $(listtmp);
            curlist.find('.name').html(item.name);
            curlist.find('.price').html(item.price);
            curlist.find('.jushi').html(item.jushi);
            curlist.find('.area').html(item.area);
            curlist.find('.mesMore').html(item.mesMore);
            var latlng = item.map_x+','+item.map_y+','+item.id;
            curlist.attr('alt',latlng);
            //添加事件
            curlist.find('.mapPoint').click(function(){
                $(marketS[item.id]._div).trigger("click");
            });
            //添加详细页面连接
            curlist.find('.name').attr('href','/newhouse/detail?id='+item.id+'&pm_type='+$("#pm_type").val());
            $('.mapListBt').append(curlist);
        });
    }

    //创建和初始化地图函数：
    function initMap(){
        $("#dituContent").height($(window).height()-$("#mainNav").height());
        $(".mapRight").height($(window).height()-$("#mainNav").height());
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
        //markerProject(data);
    }

    //创建地图函数：
    function createMap(){
        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
        var point = new BMap.Point(104.072211,30.693455);//定义一个中心点坐标
        map.centerAndZoom(point,12);//设定地图的中心点和坐标并将地图显示在地图容器中
        //map.centerAndZoom("成都",13);
        window.map = map;//将map变量存储在全局
    }

    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }

    //地图控件添加函数：
    function addMapControl(){
        //向地图中添加缩放控件
        var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
        map.addControl(ctrl_nav);
        //向地图中添加缩略图控件
        var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
        map.addControl(ctrl_ove);
        //向地图中添加比例尺控件
        var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
        map.addControl(ctrl_sca);
    }

    // 复杂的自定义覆盖物
    function ComplexCustomOverlay(point, text, mouseoverText){
        this._point = point;
        this._text = text;
        this._overText = mouseoverText;
    }
    ComplexCustomOverlay.prototype = new BMap.Overlay();
    ComplexCustomOverlay.prototype.initialize = function(map){
        //色码 绿色:#06A897,蓝色1:#1CBAFF,蓝色2:#3088DF,蓝色3:#0000FF,橙色:#FF6600,棕色:#CE9B86,灰色:#AFAFAF,粉色:#FF00FF;红色:#EE5D5B
        this._map = map;
        var div = this._div = document.createElement("div");
        div.style.position = "absolute";
        div.style.zIndex = BMap.Overlay.getZIndex(this._point.lat);
        div.style.backgroundColor = "#EE5D5B";
        //div.style.border = "1px solid #BC3B3A";
        div.style.color = "white";
        div.style.height = "28px";
        div.style.padding = "2px 10px";
        div.style.lineHeight = "25px";
        div.style.whiteSpace = "nowrap";
        div.style.MozUserSelect = "none";
        div.style.fontSize = "14px";
        div.style.boxShadow = "0 0 3px #111";
        div.style.borderRadius = "3px";
        div.setAttribute('mapx',this._point.lng);
        div.setAttribute('mapy',this._point.lat);
        var span = this._span = document.createElement("span");
        span.setAttribute('mapx',this._point.lng);
        span.setAttribute('mapy',this._point.lat);
        div.appendChild(span);
        span.appendChild(document.createTextNode(this._text));
        var that = this;

        var arrow = this._arrow = document.createElement("div");
        //arrow.style.background = "url(http://map.baidu.com/fwmap/upload/r/map/fwmap/static/house/images/label.png) no-repeat";
        arrow.style.position = "absolute";
        arrow.style.width = "11px";
        arrow.style.height = "10px";
        arrow.style.top = "27px";
        arrow.style.left = "10px";
        arrow.style.overflow = "hidden";
        arrow.style.borderColor = "#EE5D5B transparent transparent transparent";
        arrow.style.borderWidth = "7px 8px 8px 0";
        arrow.style.borderStyle = "solid dashed dashed dashed";
        div.appendChild(arrow);

        div.onmouseover = function(){
            this.style.backgroundColor = "#6BADCA";
            this.style.borderColor = "#6BADCA";
            this.getElementsByTagName("span")[0].innerHTML = that._overText;
            //arrow.style.backgroundPosition = "0px -20px";
            arrow.style.borderColor = "#6BADCA transparent transparent transparent";
        }

        div.onmouseout = function(){
            this.style.backgroundColor = "#EE5D5B";
            this.style.borderColor = "#BC3B3A";
            this.getElementsByTagName("span")[0].innerHTML = that._text;
            //arrow.style.backgroundPosition = "0px 0px";
            arrow.style.borderColor = "#EE5D5B transparent transparent transparent";
        }

        map.getPanes().labelPane.appendChild(div);

        return div;
    }
    ComplexCustomOverlay.prototype.draw = function(){
        var map = this._map;
        var pixel = map.pointToOverlayPixel(this._point);
        this._div.style.left = pixel.x - parseInt(this._arrow.style.left) + "px";
        this._div.style.top  = pixel.y - 30 + "px";
    }
    ComplexCustomOverlay.prototype.addEventListener = function (event, fun) {
        this._div['on' + event] = fun;
    }

    function markerProject(obj){
        $.each(obj.list,function(index,item){
            //判断是否已经添加该标注
            if(!marketS.hasOwnProperty(item.id)) {
                //颜色处理
                var color = 1;
                var mvp = 1;
                //house_type_ary[index].key
                var sContent =
                    "<h4 style='margin:0 0 5px 0;'><a href='/wap/house_item.php?id=" + item.id + "'>" + item.name + mvp + "</a></h4>" +
                    "<img style='float:right;margin:4px' id='imgDemo' src='" + item.spic + "' width='80' height='60' title='" + item.name + "'/>" +
                    "<p><span>便&nbsp;&nbsp;&nbsp利&nbsp;&nbsp;&nbsp性：</span>" + item.id + "</p><br/>" +
                    "<p><span>环境舒适性：</span>" + item.id + "</p><br/>" +
                    "<p><span>房间舒适性：</span>" + item.id + "</p><br/>" +
                    "<p>地址：" + item.name + "</p>" +
                    "<p>开发商：" + item.name + "</p>" +
                    "<p>项目电话：" + item.name + "</p>" +
                    "<p><a href='javascript:void(0);' onclick='favorites(" + item.id + ")'>收藏</a></p>" +
                    "</div>";
                var opts = {
                    width: 350,     // 信息窗口宽度
                    height: 100     // 信息窗口高度
                }
                var infoWindow = new BMap.InfoWindow(sContent, opts);  // 创建信息窗口对象

                var point = new BMap.Point(item.map_x, item.map_y);
                var txt = item.name, mouseoverTxt = txt + " " + item.price;
                var marker = new ComplexCustomOverlay(point, txt, mouseoverTxt);
                map.addOverlay(marker);

                //console.log('变量：', item.id);

                marketS[item.id] = marker;
                marketI[item.id] = infoWindow;

                marker.addEventListener("click", function (e) {
                    var p = e.target;
                    //console.log(p);
                    var point = new BMap.Point(p.getAttribute('mapx'), p.getAttribute('mapy'));
                    map.openInfoWindow(infoWindow, point); //开启信息窗口
                    // 图片加载完毕重绘infowindow
                    document.getElementById('imgDemo').onload = function () {
                        infoWindow.redraw();   //防止在网速较慢，图片未加载时，生成的信息框高度比图片的总高度小，导致图片部分被隐藏
                    }
                });
            }

        });

    }

    $(window).resize(function(){
        //process here
        $("#dituContent").height($(window).height()-$("#mainNav").height());
        $(".mapRight").height($(window).height()-$("#mainNav").height());
        //$("#dituContent").width($(window).width());
    });

    $(window).load(function () {
        searchHouse();
        initMap(data);//创建和初始化地图
    });
</script>
</body>
</html>
