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
			<div class="page-profile">
				<div class="row">
					<div class="col-lg-12">
						<!-- begin panel -->
						<div class="panel">
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-12">
									<table class="table table-hover-color">
                                            <thead>
                                            <tr>
                                            <th><input name="checkbox" type="checkbox" onclick="CheckAll();" value="全选" ></th>
                                            <th>CID</th>
                                            <th>分类名</th>
                                            <th>内容模型</th>
                                            <th>排序权重</th>
                                            <th>&nbsp;</th>
                                            <th>栏目操作</th>                
                                            </tr>
                                            </thead>
                                            
                                            <tbody>
                                            <? foreach($list as $key=>$item){ ?>
                                            <tr>
                                            <td><input type="checkbox" name="selectItem" data-index="<?=$item['id']?>" value="<?=$item['id']?>"></td>
                                            <td><?=$item['mid']?></td>
                                            <td><?=$item['name']?></td>
                                            <td><?=$module_list[$item['mid']]?></td>
                                            <td><input name="taxis[<?=$item['id']?>]" type="text" class="input" id="taxis[<?=$key?>]" value="<?=$item['order_list']?>" size="5" maxlength="2"></td>
                                            <td>
                                            <a href="categorylist.php?action=index&depth=<?=$item['depth']+1?>&up=<?=$item['id']?>&guide=<?=$item['name']?>">查看子分类</a> 
                                            <a href="categoryAdd.php?cid=<?=$item['id'];?>">添加子分类</a> 
                                            <a href="categoryEdit.php?cid=<?=$item['id'];?>">编辑分类</a> 
                                            <a href="categoryDel.php?cid=<?=$item['id'];?>" onClick="return confirm('确定要删除分类么?');" style="color:#FF0000">删除分类</a></td>
                                            <td>
                                            <a href="contentList.php?cid=<?=$item['id'];?>">查看内容</a> 
                                            <a href="contentAdd.php?cid=<?=$item['id'];?>">添加内容</a>&nbsp;</td>
                                            </tr>
                                            <? } ?>
                                            </tbody>
                                            </table>
									</div>
								</div>
								<div class="row">
                                    <ul class="pagination pull-right">
                                        <? //$splitPageStr; ?>
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
