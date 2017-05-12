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
.page-wrapper{overflow:hidden;padding-bottom:30px;}
.page-content{margin:0px;overflow:auto;}
.panel-body{padding-top:0px;margin-bottom:30px;}
</style>
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
							<div class="panel-body">
								<div class="row">
                                	<form name="opform" id="opform" method="get" action="<?=$this->app->getMethodName()?>">
									<div class="col-lg-12">
                                        <div class="btn-toolbar mtm mbm">
                                        	<a id="recycleUndo" href="javascript:;" onClick="operate('recycleUndo')" class="btn btn-default">批量还原</a>
                                            <a id="recycleDel" href="javascript:;" onClick="operate('recycleDel')" class="btn btn-default">批量删除</a>
                                        	<div class="input-group pull-right">
                                        		<ul class="list-group mail-action list-unstyled list-inline" style="margin-bottom:0;float:left">
                                       				<li>
                                                    <select name="cid" onchange="javascript:this.form.submit();" class="form-control">
                                                        <option value="">请选择分类</option>
														<? foreach($menu as $key=>$contact){ ?>
                                                            <option value="<?=$contact['id']?>" <? if($contact['id']==$this->cid){ ?>selected="selected"<? } ?>>&raquo;<?=$contact['name']?></option>
                                                            <? foreach($contact['child'] as $ckey=>$item){ ?>
                                                            <option value="<?=$item['id']?>" <? if($item['id']==$this->cid){ ?>selected="selected"<? } ?>>|---<?=$item['name']?></option>
                                                            <? } ?>
                                                        <? } ?>
                                                    </select>
                                                    </li>
                                                    <li>
                                                        <div class="input-group">
                                                            <input type="text" name="title" class="form-control pull-left" id="title" value=""  placeholder="请输关键字" />
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
                                    
									<form name="form1" id="opform1" method="POST" action="/cms_content/recycleOperate?cid=<?=$this->cid?>&mid=<?=$this->mid?>">
                                    <input type="hidden" name="action" id="action" value="" />
									<div class="col-lg-12">
									<table class="table table-hover-color">
									<thead>
									<tr>
                                    <th><input name="checkbox" type="checkbox" onclick="CheckAll(this);" value="全选" ></th>
                                    <th>ID</th>
                                    <th>标题</th>
                                    <th>发布者</th>
                                    <th>删除人</th>
                                    <th>删除时间</th>
                                    <th>操作</th>
									</tr>
									</thead>
									<tbody>
									<? foreach($list as $k=>$v){ ?>
									<tr>
                                    <td><input type="checkbox" name="ids[]" data-index="<?=$v['tid']?>" value="<?=$v['tid']?>-<?=$v['cid']?>-<?=$v['guid']?>-<?=$v['mid']?>" /></td>
									<td><?=$v['tid']?></td>
									<td><?=Util::msubstr($v['title'],0,10)?></td>
									<td><?=$v['publisher']?></td>
                                    <td><?=$v['admin']?></td>
									<td><?=date('Y-m-d h:i:s',$v['deltime']);?></td>
									<td>
                                    <a href="recycleDel?cid=<?=$v['cid']?>&id=<?=$v['id']?>&mid=<?=$v['mid']?>&guid=<?=$v['guid']?>"><img src="/images/del.gif" align="absmiddle" title="删除" onClick="return confirm('您确定要删除此内容？');" /></a>
<a href="recycleUndo?cid=<?=$v['cid']?>&id=<?=$v['id']?>"><img src="/images/update.gif" align="absmiddle" title="还原" onClick="return confirm('您确定要还原此内容？');" /></a>
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
	var r=confirm('您确定要删除此内容？');
	if (r==true)
	{
		//判断是否选取行
		if($(":checkbox:checked").length>0){
			$("#action").val(type);
			$("#opform1").submit();
		}else{
			alert('您没有选取需要操作的记录');
			return false;	
		}
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
