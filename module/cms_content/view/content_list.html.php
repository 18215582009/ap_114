<?php
/**
 * Html模板文件
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong<751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: index.html.php,v 1.4 2012/02/16 09:54:23 lj Exp $
 */
 use lib\util\Util as Util;
 use lib\form\Form as Form;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?=$header?></title>
<?=Form::css();?>
</head>
<style>
.page-wrapper{overflow:hidden;}
.page-content{margin:0px;overflow:auto;}
.panel-body{padding-top:0px;margin-bottom:30px;}
</style>
<script>
var okimg = '/images/star_ok.gif';
var noimg = '/images/star_no.gif';
var cid = '<?=$this->cid?>';
var mid = '1';
//var url = '/admin.php?adminjob=content';
var current_key;
var current_tid;
var current_num;
//var tagsname = '装饰,别墅,';
var digestMsg = new Array(4);
digestMsg[0] = '您确认要取消此内容的精华推荐吗？';
digestMsg[1] = '您确认要将此内容设置为 栏目推荐 吗？';
digestMsg[2] = '您确认要将此内容设置为 站点推荐 吗？';
digestMsg[3] = '您确认要将此内容作为 头条内容 吗？';
function showStar(key,i){
	for(var s=1;s<=3;s++){
		var imgid = 'img'+key+'_'+s;
		if(s<=i){
		document.getElementById(imgid).src = okimg;
		}else{
		document.getElementById(imgid).src = noimg;
		}
	}
}

function reSet(key,num){
	for(var s=1;s<=3;s++){
		var imgid = 'img'+key+'_'+s;
		if(s<=num){
			document.getElementById(imgid).src = okimg;
		}else{
			document.getElementById(imgid).src = noimg;
		}
	}
}

function digest(id,key,num){
	var msg = confirm(digestMsg[num]);
	if(msg){
		current_num = num;
		current_tid = id;
		current_key = key;
		$.get(
			 "/cms_content/ajaxDigest",
			 { id: id, cid: cid, digest: num},
			 function(data){
			   //window.location="{/literal}{$smarty.const.URL}/admin/column/content1.php?cid="+cid+"&mid"+mid+"{literal}";
			   reSet(key,num);
			   $('#digest_'+key).mouseout( function() {reSet(key,num);} );
			 }
		); 
	}else{
		return false;
	}
}

function digestOk(res){
	if(res=='100'){
		var divname = 'd_'+current_key;
		var divname2 = 'ss_'+current_key;
		document.getElementById(divname).innerHTML = "<div id='"+divname2+"' onmouseout=\"reSet('"+current_key+"','"+current_num+"')\"></div>";
		for(var i=1;i<=3;i++){
		if(i<=current_num){
			theimg = okimg;
		}else{
			theimg = noimg;
		}
		document.getElementById(divname2).innerHTML += "<img id='img"+current_key+"_"+i+"' class='st' src='"+theimg+"' onmouseover=\"showStar('"+current_key+"','"+i+"');\" onclick=\"digest('"+current_tid+"','"+current_key+"','"+i+"');\" />";
		}
	}
}
</script>
<body>

<div class="page-wrapper">
    <div class="page-content">
	<!-- begin page header-->
    <?=lib\form\Form::bread_crumb(
		$header,
		$this->config->module->moduleName,
		$navlist=array(
			array('name'=>$this->config->module->name,'method'=>'contentList')
		));
	?>
	<!-- end  page header-->

	<!-- begin box-content -->
	<div class="box-content">
		<!--begin content-->
		<div class="content">
			<div class="page-profile">
				<div class="row">
					<div class="col-lg-12">
						<!-- begin panel -->
						<div class="panel">
							<div class="panel-body" style="min-height: 400px">
								<div class="row">
                                	<form name="opform" id="opform" method="get" action="<?=$this->app->getMethodName()?>?cid=<?=$this->cid?>">
									<div class="col-lg-12">
                                        <div class="btn-toolbar mtm mbm">
                                        	<a class="btn btn-default" href="/cms_content/contentAdd?cid=<?=$this->cid?>" id="newAdd">新建</a>
                                        	<div class="btn-group">
                                                <button type="button" class="btn btn-default">更多</button>
                                                <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul role="menu" class="dropdown-menu">
                                                    <li><a href="javascript:;" onClick="operate('order')">排序</a></li>
                                                    <li><a href="javascript:;" onClick="operate('pubview')">发布</a></li>
                                                    <li><a href="javascript:;" onClick="operate('pubcancel')">取消发布</a></li>
                                                    <li><a href="javascript:;" onClick="operate('del')">删除</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="javascript:;" onClick="listExport()">导出</a></li>
                                                    <li><a href="javascript:;" onClick="listPrint()">打印</a></li>
                                                </ul>
                                            </div>
                                        	<div class="input-group pull-right">
                                        		<ul class="list-group mail-action list-unstyled list-inline" style="margin-bottom:0;float:left">
                                       				<li>
                                                        <div class="input-group">
                                                            <input type="text" name="keyword" class="form-control pull-left" id="keyword" value=""  placeholder="请输关键字" />
                                                            <div class="input-group-btn">
                                                            <button  type="submit" class="btn btn-info">搜索</button>
                                                            </div>
                                                        </div>
                                                    </li>
                                        		</ul>
                                       		</div>
                                       	</div>
									</div>
                                    </form>
                                    
									<form name="form1" id="opform1" method="POST" action="/cms_content/operate?cid=<?=$this->cid?>&mid=<?=$this->mid?>">
                                    <input type="hidden" name="action" id="action" value="" />
									<div class="col-lg-12">
									<table class="table table-hover-color">
									<thead>
									<tr>
                                    <th><input name="checkbox" type="checkbox" onclick="CheckAll(this);" value="全选" ></th>
									<th>ID</th>
									<th>标题</th>
									<th>发布者</th>
                                    <th>推荐</th>
									<th>权重</th>
									<th>浏览</th>
                                    <th>发布</th>
                                    <th>添加时间</th>
									<th>操作</th>
									</tr>
									</thead>
									<tbody>
									<? foreach($list as $k=>$v){ ?>
									<tr>
                                    <td>
                                    <input type="checkbox" name="ids[]" data-index="<?=$v['id']?>" value="<?=$v['id']?>" />
                                    <input type="hidden" name="guids[<?=$v['id']?>]" value="<?=$v['guid']?>" />
                                    </td>
									<td><?=$v['id']?></td>
									<td><?=Util::msubstr($v['title'],0,10)?></td>
									<td><?=$v['publisher']?></td>
                                    <td>
  <div id='d_<?=$k?>' oncontextmenu="digest('<?=$v['id']?>','<?=$k?>','0');return false;">
  <div onmouseout="reSet('<?=$k?>','<?=$v['digest']?>');" id="digest_<?=$k?>">
  <img id='img<?=$k?>_1' class='st' src='/images/star_no.gif' onmouseover="showStar('<?=$k?>','1');" onclick="digest('<?=$v['id']?>','<?=$k?>','1');" />
  <img id='img<?=$k?>_2' class='st' src='/images/star_no.gif' onmouseover="showStar('<?=$k?>','2');" onclick="digest('<?=$v['id']?>','<?=$k?>','2');" />
  <img id='img<?=$k?>_3' class='st' src='/images/star_no.gif' onmouseover="showStar('<?=$k?>','3');" onclick="digest('<?=$v['id']?>','<?=$k?>','3');" />  </div>
  </div>
  <script>reSet('<?=$k?>','<?=$v['digest']?>');</script>
                                    </td>
									<td><input name="taxis[<?=$v['id']?>]" type="text" class="input" id="taxis[<?=$v['id']?>]" value="<?=$v['comnum']?>" size="3" maxlength="3"></td>
                                    <td><?=$v['hits']?></td>
                                    <td>
                                    <?=Form::lable($this->config->ifpub_option[isset($v['ifpub'])?$v['ifpub']:0],isset($v['ifpub'])?$v['ifpub']:0);?>
                                    </td>
                                    <td><?=$v['postdate']?></td>
									<td>
                                    <a href="contentEdit?id=<?=$v['id']?>&cid=<?=$v['cid']?>&mid=<?=$v['mid']?>"><img src="/images/edit.gif" align="absmiddle" alt="编辑" /></a>
                                    <a href="contentDel?id=<?=$v['id']?>&cid=<?=$v['cid']?>&mid=<?=$v['mid']?>" onclick='return window.confirm("您确认要删除!");'><img src="/images/del.gif" align="absmiddle" alt="删除" /></a>
                                    <!--<a href="#"><img src="/admin/images/update.gif" align="absmiddle" alt="更新静态页" /></a>-->
                                    <a href="contentCancel?id=<?=$v['id']?>"><img src="/images/cancel.gif" align="absmiddle" alt="取消发布" /></a>
                                    <a href="contentPub?id=<?=$v['id']?>"><img src="/images/pub.gif" align="absmiddle" alt="发布内容" /></a>
                                    </td>
									</tr>
									<? } ?>
									</tbody>
									</table>
									</div>
                                    </form>
								</div>
								<div class="row">
                                    <ul class="pagination pull-right">
                                        <?=$splitPageStr?>
                                    </ul>
                                </div>
                                
							</div>
						</div>
						<!-- end panel -->
					</div>
				</div>
				
			</div>
		</div>
		<!--end content-->
	</div>
	<!-- end box-content -->

    </div>
</div>

<?=Form::js();?>

<script>
jQuery(document).ready(function () {
    "use strict";
});

function CheckAll(obj){
	if($(obj).is(':checked')){
		$(":checkbox").attr("checked","checked");
	}else{
		$(":checkbox").removeAttr("checked"); 
	}
}

function operate(type){
	//判断是否选取行
	if($(":checkbox:checked").length>0){
		$("#action").val(type);alert(type);
		$("#opform1").submit();
	}else{
		alert('您没有选取需要操作的记录');
		return false;	
	}
	/*
	switch(type){
		case 'order':
			$(":checkbox:checked").each(function() {
				alert($(this).data('index'));
			});
			break;
		case '':
			break;
	}
	*/	
}
</script>
</body>
</html>
