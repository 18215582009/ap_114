<?php
/**
 * Html模板文件
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong<751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: index.html.php,v 1.4 2012/02/16 09:54:23 lj Exp $
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>模块功能授权</title>
</head>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/cdrstyle.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/style.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/page.css';?>' type='text/css' media='screen' />
<script src="/js/jquery-1.8.3.min.js" ></script>
<script src="/js/candor.common.js"></script>
<script type="text/javascript">

</script>
<style>

</style>
<body>
	<div class="container-fluid">
		<div class="row-fluid">
			<fieldset>
			<legend>模块信息</legend>
				<p>模块名称：<?=$module['business_name']?>&nbsp;&nbsp;&nbsp;&nbsp;
					所属系统：<?=$module['project_name']?>&nbsp;&nbsp;&nbsp;&nbsp;开发者：<?=$module['developer']?></p>
				<p>创建时间：<?=date("Y-m-d", $module['time'])?>&nbsp;&nbsp;&nbsp;&nbsp;模块说明：<?=$module['describe']?></p>
			</fieldset>	
		</div>
		<div class="row-fluid">
			<form action="/admin/addFun.candor" method="post">
			<table class="table table-bordered table-striped" style="border-top:none;">
				<thead>
				  <tr>
					<th>序号</th>
					<th>方法名</th>
					<th>模块名</th>
					<th>描述</th>
					<th>类型</th>
					<th>操作<button class="btn" onclick="quickAddFun()">一键打入权限</button></th>
				  </tr>
				</thead>
				<tbody>
					<?php foreach($methods as $key=>$item){
						if($item['type']=='public'){
					?>					
						<tr>
							<td width="5%"><?=$key?></td>
							<td width="10%"><?=$item['name']?></td>
							<td width="10%"><?=$item['class']?></td>
							<td width="10%" >
								<input type="text" id="method_name" class="form-control" placeholder="" style="margin-bottom: 0px;width:120px;height:20px;"  
								<?php
									$t=false;
									foreach($methodname as $v){
										if($v['method']==$item['name']){
									
								?>
											value="<?=$v['method_name']?>" assist="<?=$v['id']?>"
								<?php
										$t=true;
										}
									}
									if(!$t){?>
										value="<?=$item['doc']?>"
									<?php 
									}
								?>
								<? if($item['is_ext']=='1'){?>name="desc"<? }else{ ?>name="adesc"<? } ?>/>
							</td>
							<td width="15%"><?=$item['type']?></td>
							<td width="35%">
							<?php if($item['is_ext']=='0'){ ?>
							<a href="javascript:void(0)" hrefs="/admin/addFun.candor?method=<?=$item['name']?>&module=<?=$item['class']?>&sid=<?=$key?>&parent_name=<?=$module['parent_module_name']?>&parent_id=<?=$module[parent_module]?>&module_name=<?=$module['business_name']?>&module_id=<?=$module['id']?>&app_name=<?=$module['project_name']?>&app_id=<?=$module['project_code']?>" title="添加" class="add">权限添加</a>&nbsp;&nbsp;
							<?php } else { ?>
							<a href="/admin/delFun.candor?fun=<?=$item['name']?>&module=<?=$item['class']?>&module_id=<?=$module['id']?>" title="删除" style="color:#f00">权限移除</a>&nbsp;&nbsp;
							<?php } ?>
							<input type="hidden" name="id[]" value="<?=$item['method_id']?>"></input>
							<input type="hidden" name="module_id[]" value="<?=$module['id']?>"></input>
							<input type="hidden" name="module_name[]" value="<?=$module['business_name']?>"></input>
							<input type="hidden" name="module[]" value="<?=$item['class']?>"></input>
							<input type="hidden" class="method_name" name="method_name[]" value=""></input>
							<input type="hidden" name="method[]" value="<?=$item['name']?>"></input>
							<input type="hidden" name="app_name[]" value="<?=$module['project_name']?>"></input>
							<input type="hidden" name="app_id[]" value="<?=$module['project_code']?>"></input>
							<input type="hidden" name="parent_name[]" value="<?=$module['parent_module_name']?>"></input>
							<input type="hidden" name="parent_id[]" value="<?=$module[parent_module]?>"></input>
							<input type="hidden" name="flag[]" value="1"></input>
							</td>
						</tr>
					<?php }} ?>
					<!--javascript:alert('亲,此功能暂未开放！')-->
				</tbody>
			</table>
			</form>
		</div>
	</div>
</body>
<script>
$(function(){
	var all=$('input[name=desc]');
	all.css('color','#082D93');
	all.blur(function(){
		var id=$(this).attr('assist');
		var value=$(this).val();
		// $.post('ajaxUpdateMethod.control',{id:id,value:value},function(data){
		// 	if(data==1){
		// 		alert('更新成功');
		// 	}else{
		// 		alert('更新失败');
		// 	}
		// })
	})
	var add=$('.add');
	add.click(function(){
		var aa=$(this).parent().prev().prev().children().val();
		var oldhref=$(this).attr('hrefs');
		var newhref=oldhref+'&method_name='+aa;
		$(this).attr("href",newhref);
		// window.location.href=newhref;
	})
	add.mouseover(function(){
		$(this).css('cursor','pointer');
	})
})

function quickAddFun(){
	$("table tbody tr").each(function(){
		var t=$(this).find("td").eq(3).find("input").val();
		if(!t){
			t=$(this).find("td").eq(1).text();
		}
		$(this).find(".method_name").val(t);
	})
	$("form").eq(0).submit();
}
</script>
</html>
