<?php
/**
 * Html模板文件
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong<751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: index.html.php,v 1.4 2012/02/16 09:54:23 lj Exp $
 */
 use lib\form\Form as Form;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?=$header?></title>
    <?=Form::css()?>
</head>
<style>
.page-content {margin: 0px;}
.panel{margin-bottom:0px;}
.caption{font-weight:normal}
.bootstrap-select.btn-group:not(.input-group-btn), .bootstrap-select.btn-group[class*="span"]{ margin-bottom:0px;}
</style>
<body>
<div class="page-wrapper">

<div class="page-content">
	<!-- begin page header-->
	<?=lib\form\Form::bread_crumb(
		$header,
		$this->config->module->moduleName,
		$navlist=array(
			array('name'=>$this->config->module->name,'method'=>'index')
		));
	?>
	<!-- end  page header-->
	
	<!-- begin box-content -->
	<div class="box-content">
      <!--begin content-->
      <div class="content">
	
    
	<? if($handle=='edit'){ ?>
    <div class="tabbable-line-wrapper">
        <div class="tabbable-line">
            <?=$tab?>
            <div class="tab-content">
                <div id="default" class="tab-pane active">
    <? }?>
                    <div id="default" class="tab-pane fade in active">
                <form action="<?=$handle?>.html?action=save" id="opform" name="opform"  method="post" class="form-horizontal">
                  <input type="hidden" value="<?=$Info['id']?>" name="id" id="id" />
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="panel">
                        <div class="panel-heading">
                            <div class="caption"><i class="glyphicon glyphicon-th-large"></i>基础信息</div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                             	<div class="col-md-4">
		                        	<?=Form::input('create_uid',empty($Info['create_uid'])? '':$Info['create_uid'],$handle,'发布人');?>
	                                <?=Form::input('telphone',empty($Info['telphone'])? '':$Info['telphone'],$handle,'电话');?>
	                                <?=Form::input('email',empty($Info['email'])? '':$Info['email'],$handle,'email');?>
	                                <?=Form::input('qq',empty($Info['qq'])? '':$Info['qq'],$handle,'QQ');?>
	                                <?=Form::input_time('create_date',empty($Info['create_date'])? '':$Info['create_date'],$handle,'创建时间');?>
	                                <?=Form::input_time('write_date',empty($Info['write_date'])? '':$Info['write_date'],$handle,'发布时间');?>
	                           </div>
                              <div class="col-md-4">
                                <?=Form::input('rent_way',empty($Info['rent_way'])? '':$Info['rent_way'],$handle,'租凭方式');?>
                                <?=Form::input('time_limit',empty($Info['time_limit'])? '':$Info['time_limit'],$handle,'最短租期');?>
                                <?=Form::input('pay_way',empty($Info['pay_way'])? '':$Info['pay_way'],$handle,'支付方式');?>
                                <?=Form::input('deposit',empty($Info['deposit'])? '':$Info['deposit'],$handle,'押金');?>
                                <?=Form::input('fees',empty($Info['fees'])? '':$Info['fees'],$handle,'收费');?>
                              </div>

                            </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12">
                      <div class="panel">
                       
                        <div class="panel-body">
                             <?=lib\form\Form::btn_main($this->config->module->btn,$handle,2);?>
                         </div>
                         
                        </div>
                      </div>
                    </div>
                </form>
            </div>
    <? if($handle=='edit'){ ?>
                </div>
            </div>
        </div>
    </div>
	<? } ?>

      	 
      </div>
      <!--end content-->
    </div>
	<!-- end box-content -->
</div>
</div>

<style>
.coverall{background:#000000;width:100%;height:100%; position:absolute;z-index:9999; display: none;}
.text-content{position:absolute;z-index:99999;background-color: #A6D2FA;height:430px;display: none;border:1px solid #8CD6FF}
.map-head{padding:0 15px;margin: 0;height:26px;line-height: 26px;text-align: right;}
.map-head span{cursor: pointer;}
#container{width: 610px; height: 360px; margin:5px; border:1px solid #aaa;}
.img-cur{cursor: pointer;}
.posinput{height:16px;}
</style>
<div id="coverall" class="coverall"></div>
<div class="text-content" id="show-map">
<p class="map-head">[<span id="close-map">关闭</span>]</p>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.4" ></script>
<div id="container" ></div>  
<div style="margin-left:88px;">
x-坐标：<input type="text" name="map_x1" id="map_x1" value="<?=$Info['map_x']?>" class="posinput" />
y-坐标：<input type="text" name="map_y1" id="map_y1" value="<?=$Info['map_y']?>" class="posinput" />
<button style="cursor:pointer;width:69px;height:26px;line-height: 26px;border:0 none;" align="absmiddle" id="insertimg" alt="插入此文件" type="button">插入</button>
</div>
<?=Form::js();?>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.4"></script>
<script>
jQuery(document).ready(function () {
    "use strict";

	//处理地图
	$("#choseMap").bind('click',function(){
		var w = $("body").width()
		var h = $("body").height()
		var ws = $(this).offset().left-250;
		var wh = $(this).offset().top;
		$("#coverall").fadeTo('slow',0.66).css({'width':w,'height':h}).show();
		$("#show-map").css({'left':(ws/2)-50+'px','top':(wh-250)+'px'}).fadeIn('fast')
		initMap();
		return false;
	});
                
	$("#close-map,.close-box").bind('click',function(){
		if( $("#map_x").val()==''&& $("#map_y").val()=='')
		{
			if(!confirm('您还没有选择坐标点确定关闭吗？'))return false;
		}
		$("#coverall,#show-map,.show-file-box").fadeOut(400);
	});

	$("#insertimg").bind('click',function(){
		if( $("#map_x1").val()==''&& $("#map_y1").val()=='')
		{
			alert('请先选择坐标点后再插入');return false;
		}
		$("#map_x").val($("#map_x1").val());
		$("#map_y").val($("#map_y1").val());
		$("#coverall,#show-map").fadeOut(400);
	});
});

function vk(){
	$("#opform").submit();	
	//$("#opbtn").click();
}
function cancel(){
	prompt('您确认放弃操作嘛？','warning');
}

function initMap(){  
	// 初始化地图，设置中心点坐标和地图级别  
	var map = new BMap.Map("container");// 创建地图实例 

	var _point_x = 104.072251
	var _point_y = 30.663455
			
	if($("#map_x").val()>0&&$("#map_y").val()>0&$("#map_x").val().length>0&&$("#map_y").val().length>0)
	{
		_point_x = $("#map_x").val();
		_point_y = $("#map_y").val();
		$("#map_x1").val($("#map_x").val());
		$("#map_y1").val($("#map_y").val());
	}   
	var point = new BMap.Point(_point_x,_point_y);    
	map.addControl(new BMap.NavigationControl()); map.enableScrollWheelZoom() ;        
	marker = new BMap.Marker(new BMap.Point(_point_x,_point_y));
	map.centerAndZoom(point, 17); map.addOverlay(marker); 
	var mapx = 'map_x';
	var mapy = 'map_y';
	var marker = '';
				// 将标注添加到地图中
	map.addEventListener("click", function(e){  
		map.clearOverlays();
		marker = new BMap.Marker(new BMap.Point(e.point.lng,e.point.lat));
		map.addOverlay(marker); 
		$("#map_x1").val(e.point.lng)  ;
		$("#map_y1").val(e.point.lat)  ;
	});
}
//超市要与商场合并
var arr_content = new Array('餐饮','酒店','商场','医院','邮局','银行','景点','学校','公交站','超市');
var content_key = ['dining','hotel','market','hospital','postoffice','bank','attris','school','busstop','smarket'];
var arr_content2 = new Array('地铁站','电影院','KTV');
var content_key2 = ['subway','cinema','ktv'];
var map = new BMap.Map("container");          // 创建地图实例
var s_content = [];var is_complete = 0;
var s_type = 1;

function getArea(obj,type){
	var obj = $("#"+obj);
	var s_arr_content;
	if(type=='2'){
		s_type = 2;
		s_arr_content = arr_content2;
	}else{
		s_type = 1;
		s_arr_content = arr_content;
	}
    var map_x = $("#map_x").val(),map_y = $("#map_y").val();
	if(parseFloat(map_x)<=0||parseFloat(map_y)<=0||map_x==''||map_y=='')return false;
	$(obj).attr('disabled',true);
	var point = new BMap.Point(parseFloat($("#map_x").val()), parseFloat($("#map_y").val()));  // 创建点坐标   //根据给定的坐标点设置
	map.centerAndZoom(point, 17);
    map.clearOverlays();
    var local = new BMap.LocalSearch(map);
    var circle = new BMap.Circle(point,1000,{fillColor:"", strokeWeight: 0.1 ,fillOpacity: 0.3, strokeOpacity: 0.1}); //查询范围
    map.addOverlay(circle);
    var bounds = getSquareBounds(circle.getCenter(),circle.getRadius());
    local.disableFirstResultSelection()
    local.disableAutoViewport()
    local.searchInBounds(s_arr_content, bounds);  //根据给定的周边配设查询
    //local.search('电影院');
    local.setSearchCompleteCallback (LRs)
}

function LRs(results){
	var search_a = []; var busline = '',smarket = '';
	var s_content_key;
	if(s_type==1){
		s_content_key = content_key;
	}else{
		s_content_key = content_key2;
	}

	for(var i =0; i<results.length;i++){
		$("#"+s_content_key[i]).val('');
		search_a[i]=[]
		//s_content[i]=[]
		console.log(results[i]);
		for(var j in results[i]['ki'])
		{
			search_a[i][j]=[]
			var Paot = results[i]['ki'][j]['point'];
			for(var k in Paot)
			{
				search_a[i][j]['pois'] =  Paot['lng']+","+Paot['lat'];
			}
			if(s_type==1){
				switch(s_content_key[i]){
					case 'dining' :
									$("#dining").val(results[i]['ki'][j]['title']+'|'+results[i]['ki'][j]['point']['lng']+'-'+results[i]['ki'][j]['point']['lat']+'，'+$("#dining").val());
									break;
					case 'hotel' :
									$("#hotel").val(results[i]['ki'][j]['title']+'|'+results[i]['ki'][j]['point']['lng']+'-'+results[i]['ki'][j]['point']['lat']+'，'+$("#hotel").val());
									break;
					case 'market' :
									$("#market").val(results[i]['ki'][j]['title']+'|'+results[i]['ki'][j]['point']['lng']+'-'+results[i]['ki'][j]['point']['lat']+'，'+$("#market").val());
									break;
					case 'smarket' :
									smarket += results[i]['ki'][j]['title']+'|'+results[i]['ki'][j]['point']['lng']+'-'+results[i]['ki'][j]['point']['lat']+'，';
									break;
					case 'hospital' :
									$("#hospital").val(results[i]['ki'][j]['title']+'|'+results[i]['ki'][j]['point']['lng']+'-'+results[i]['ki'][j]['point']['lat']+'，'+$("#hospital").val());
									break;
					case 'postoffice' :
									$("#postoffice").val(results[i]['ki'][j]['title']+'|'+results[i]['ki'][j]['point']['lng']+'-'+results[i]['ki'][j]['point']['lat']+'，'+$("#postoffice").val());
									break;
					case 'bank' :
									$("#bank").val(results[i]['ki'][j]['title']+'|'+results[i]['ki'][j]['point']['lng']+'-'+results[i]['ki'][j]['point']['lat']+'，'+$("#bank").val());
									break;
					case 'attris' :
									$("#attris").val(results[i]['ki'][j]['title']+'|'+results[i]['ki'][j]['point']['lng']+'-'+results[i]['ki'][j]['point']['lat']+'，'+$("#attris").val());
									break;
					case 'school' :
									$("#school").val(results[i]['ki'][j]['title']+'|'+results[i]['ki'][j]['point']['lng']+'-'+results[i]['ki'][j]['point']['lat']+'，'+$("#school").val());
									break;
					case 'busstop' :
									busline += results[i]['ki'][j]['address']+'|'+results[i]['ki'][j]['point']['lng']+'-'+results[i]['ki'][j]['point']['lat']+';';
									break;
									
				}//switch1 end
			}else{
			
				switch(s_content_key[i]){
					case 'subway' :
									$("#subway").val(results[i]['ki'][j]['title']+'|'+results[i]['ki'][j]['point']['lng']+'-'+results[i]['ki'][j]['point']['lat']+'，'+$("#subway").val());
									break;
					case 'cinema' :
									$("#cinema").val(results[i]['ki'][j]['title']+'|'+results[i]['ki'][j]['point']['lng']+'-'+results[i]['ki'][j]['point']['lat']+'，'+$("#cinema").val());
									break;
					case 'ktv' :
									$("#ktv").val(results[i]['ki'][j]['title']+'|'+results[i]['ki'][j]['point']['lng']+'-'+results[i]['ki'][j]['point']['lat']+'，'+$("#ktv").val());
									break;
									
				}//switch2 end
			}//if end
		}
	}
	
	if(s_type==1){
		//合并超市与商场
		$("#market").val($("#market").val()+smarket);
		//处理公交数据
		setTimeout(function(){
			var Bus_arr = busline.split(";");var Bus_new = [], Bus_lemp = {};
			for(var i=0;i<Bus_arr.length;i++){
				Bus_arr[i] = $.trim(Bus_arr[i])
				if(!Bus_lemp[Bus_arr[i]]){
					Bus_lemp[Bus_arr[i]] = true ;
					Bus_new.push(Bus_arr[i]);
				}
			}
			
			$("#traffic").val(Bus_new.join(','));
			setTimeout(function(){
					//$("#getarea_button").removeAttr('disabled');
					getArea("getarea_button",2);
				},500);
		},1000)
	}else{
		$("#getarea_button").removeAttr('disabled');
	}
}

/**
* 得到圆的内接正方形bounds
* @param {Point} centerPoi 圆形范围的圆心
* @param {Number} r 圆形范围的半径
* @return 无返回值
*/
function getSquareBounds(centerPoi,r){
	var a = Math.sqrt(2) * r; //正方形边长

	mPoi = getMecator(centerPoi);
	var x0 = mPoi.x, y0 = mPoi.y;

	var x1 = x0 + a / 2 , y1 = y0 + a / 2;//东北点
	var x2 = x0 - a / 2 , y2 = y0 - a / 2;//西南点

	var ne = getPoi(new BMap.Pixel(x1, y1)), sw = getPoi(new BMap.Pixel(x2, y2));
	return new BMap.Bounds(sw, ne);

}
//根据球面坐标获得平面坐标。
function getMecator(poi){
	return map.getMapType().getProjection().lngLatToPoint(poi);
}
//根据平面坐标获得球面坐标。
function getPoi(mecator){
	return map.getMapType().getProjection().pointToLngLat(mecator);
}
</script>
</body>
</html>
