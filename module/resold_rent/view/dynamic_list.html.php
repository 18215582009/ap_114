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
.page-content {
    margin: 0px;
}
.panel-body{padding-top:0px}
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
		<!--end tabbable-->
        <div class="tabbable-line-wrapper">
            <div class="tabbable-line">
                <?=$tab?>
                <div class="tab-content">
                    <div id="default" class="tab-pane active">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- begin panel -->
                                <div class="panel">
                                    <div class="panel-body" style="padding-top:5px;">
                                        <div class="row">
                                            <table class="table table-hover-color">
                                            <thead>
                                            <tr>
                                            <th><input name="checkbox" type="checkbox" onclick="CheckAll();" value="全选" ></th>
                                            <th>ID</th>
                                            <th>标题</th>
                                            <th>信息类型</th>
                                            <th>信息来源</th>
                                            <th>有效时间</th>
                                            <th>状态</th>
                                            <th>操作</th>
                                            </tr>
                                            </thead>
                                            
                                            <tbody>
                                            <? foreach($list as $k=>$v){ ?>
                                            <tr>
                                            <td><input type="checkbox" name="selectItem" data-index="<?=$v['id']?>" value="<?=$v['id']?>"></td>
                                            <td><?=$v['id']?></td>
                                            <td><?=$v['title']?></td>
                                            <td><?=$this->config->dynamic_type_option[$v['type']];?></td>
											<td><?=$this->config->dynamic_from_option[$v['from']];?></td>
                                            <td><?=date('Y-m-d',empty($v['start_date'])?time():$v['start_date'])?> - <?=date('Y-m-d',empty($v['start_date'])?time():$v['start_date'])?></td>
                                            <td><?=Form::lable($this->config->flag_option[isset($v['flag'])?$v['flag']:0],isset($v['flag'])?$v['flag']:0);?></td>
                                            <td>
                                            <button class="btn btn-default btn-xs mrm" onclick="editDynamic(<?=$v['id']?>,<?=$project_id?>)"><i class="fa fa-edit mrs"></i>编辑</button>
                                                                                         
                                            <a class="btn btn-default btn-xs" href="delDynamic.html?id=<?=$v['id']?>" style="font-weight:normal"><i class="fa fa-times mrs"></i>删除</a>
                                            </td>
                                            </tr>
                                            <? } ?>
                                            </tbody>
                                            </table>
                                        </div>
                                        
                                        <div class="row">
                                        	<div class="action-group btn-group mtm mbm">
                                                <button class="btn btn-success mrm" onclick="addDynamic(<?=$project_id?>)">新建</button>
                                                <button class="btn btn-default"><i class="fa fa-trash-o mrs"></i>删除</button>
                                            </div>
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
            </div>
    	</div>
		<!--end tabbable-->
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

	page_gallery.init();
});

function addDynamic(project_id)
{
	art.dialog.open('/fc_project/addDynamic?project_id='+project_id,{
		title: '',
		width: '85%',
		height: '90%',
		lock: 'true',
		esc: 'false',
		window: 'top',
		close: function(){
			//重新刷新表格数据;
            return true;   
		}
	},false);
}

function editDynamic(dynamic_id,project_id)
{
	art.dialog.open('/fc_project/editDynamic?project_id='+project_id+'&id='+dynamic_id,{
		title: '',
		width: '85%',
		height: '90%',
		lock: 'true',
		esc: 'false',
		window: 'top',
		close: function(){
			//重新刷新表格数据;
            return true;   
		}
	},false);
}
</script>
</body>
</html>
