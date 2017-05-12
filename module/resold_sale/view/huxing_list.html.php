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
                                            <th>名称</th>
                                            <th>类型</th>
                                            <th>总套数</th>
                                            <th>建筑面积</th>
                                            <th>套内净面积</th>
                                            <th>当前总价</th>
                                            <th>CV便利</th>
                                            <th>EC环境</th>
                                            <th>RC房间</th>
                                            <th>VP\MP\MVP</th>
                                            <th>有效</th>
                                            <th>操作</th>
                                            </tr>
                                            </thead>
                                            
                                            <tbody>
                                            <? foreach($list as $k=>$v){ ?>
                                            <tr>
                                            <td><input type="checkbox" name="selectItem" data-index="<?=$v['id']?>" value="<?=$v['id']?>"></td>
                                            <td><?=$v['id']?></td>
                                            <td><?=$this->fc_project->tranHuxing($v['ting'],$v['shi']);?></td>
                                            <td><?=$v['apa_type']?></td>
                                            <td><?=$v['total_apa']?></td>
                                            <td><?=$v['area_constru']?></td>
                                            <td><?=$v['area_net']?></td>
                                            <td><?=$v['price_apa_cur']?></td>
                                            <td><?=$v['cv']?></td>
                                            <td><?=$v['ec']?></td>
                                            <td><?=$v['rc']?></td>
                                            <td><? echo $v['vp'].'/'.$v['mp'].'/'.$v['mvp']?></td>
                                            <td><?=$v['flag']?></td>
                                            <td>
                                             <button class="btn btn-default btn-xs mrm" onclick="editHuxing(<?=$v['id']?>,<?=$project_id?>)"><i class="fa fa-edit mrs"></i>编辑</button>
                                                                                         
                                            <a class="btn btn-default btn-xs" href="delHuxing.html?id=<?=$v['id']?>" style="font-weight:normal"><i class="fa fa-times mrs"></i>删除</a>
                                            </td>
                                            </tr>
                                            <? } ?>
                                            </tbody>
                                            </table>
                                        </div>
                                        
                                        <div class="row">
                                        	<div class="action-group btn-group mtm mbm">
                                                <button class="btn btn-success mrm" onclick="addHuxing(<?=$project_id?>)">新建</button>
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
});

function addHuxing(project_id)
{
	art.dialog.open('/fc_project/addHuxing?project_id='+project_id,{
		title: '',
		width: '85%',
		height: '90%',
		lock: 'true',
		esc: 'false',
		close: function(){
			//重新刷新表格数据;
            window.location.reload();
            return true;   
		}
	},false);
}

function editHuxing(huxing_id,project_id)
{
	art.dialog.open('/fc_project/editHuxing?project_id='+project_id+'&id='+huxing_id,{
		title: '',
		width: '85%',
		height: '90%',
		lock: 'true',
		esc: 'false',
		close: function(){
			//重新刷新表格数据;
            return true;   
		}
	},false);
}
</script>
</body>
</html>
