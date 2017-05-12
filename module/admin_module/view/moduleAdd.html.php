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
<title><? echo $header['title'] ?></title>
<script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/js/jquery.colorpicker.js" type="text/javascript"></script>
<script src="/js/candor.common.js" type="text/javascript"></script>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/cdrstyle.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/style.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/page.css';?>' type='text/css' media='screen' />
</head>
<style>
label{display:block}
.imgbox{float:left;border: 2px solid #ccc; position:relative;
	padding:3px;
    float: left;
    height: 53px;
    margin: 3px;}
.imgbox:hover{opacity: .5;}
.imgbox .selected_flag{ position:absolute; top:36px; width:24px; left:7px;}
.row{ margin-left:0;}
input {
    width:auto;
}
select{width:158px;}
</style>
<script>
$(document).ready(function(){
	$("#background").colorpicker({
		fillcolor:true,
		success:function(o,color){
			$(o).css("color",color);
		}
	});
})

</script>
<body>
<div class="container-fluid">

	<form id="form1" class="form-horizontal" action="/admin/saveModule" method="post">	
	<fieldset>
		<legend>创建模块</legend>
    	<div class="row">
			<div class="span3">
				<label for="project_code">所属项目</label>
				<?php if($action=='add') {?>
				<select name="project_code" id="project_code" onchange="get_submodule(this);">
				  <?php 
					foreach($project as $pkey=>$pitem){
						if($pitem['project_code']==$projectcode){
							echo '<option value="'.$pitem['project_code'].'" data-prefix="'.$pitem['project_prefix'].'" selected="selected">'.$pitem['project_name'].'</option>';
						}else{
							echo '<option value="'.$pitem['project_code'].'" data-prefix="'.$pitem['project_prefix'].'">'.$pitem['project_name'].'</option>';
						}
					}
				  ?>
				</select>
				<?php } else { ?>
					<input type="text" name="project_name" id="project_name" <?php if($action=='edit'){?>readonly="readonly"<?php } ?> value="<?=$module['project_name']?>" />
					<input type="hidden" name="project_code" id="project_code" value="<?=$module['project_code'];?>" />
				<?php } ?>
				<script>
					function get_submodule(obj){
						$('#module_prefix').val($(obj).find(":selected").data("prefix"));

						$.ajax({
						   type: "POST",
						   url: "/admin/ajaxGetSubModule",
						   data: "pid="+$(obj).val(),
						   success: function(msg){
							 $("#parent_module").html(msg);
						   }
						}); 
					}
				</script>
				<label for="business_name">业务名称</label>
	            <input type="text" name="business_name" id="business_name" value="<?=@$module['business_name']?>" />
				<label for="module_name">module文件名前缀</label>
	            <input type="text" name="module_prefix" id="module_prefix" readonly="readonly" value="<?=$module['module_prefix']?>" />
				<label for="app_icon">请选择业务应用图标</label>
	            <input type="text" name="app_icon" id="app_icon" value="<?=$action=='add'?"bom_64.png":$module['app_icon']?>" readonly="readonly" />
		   </div>
		   <div class="span5">
			   	<label for="parent_module">所属子类</label>
				<select name="parent_module" id="parent_module">
					<option value="0">请选择子类</option>	
					<?php 
					foreach($category as $key=>$item){
						if($item['id']==$parent_module){
							echo '<option value="'.$item['id'].'" selected="selected">'.$item['business_name'].'</option>';
						}else{

							echo '<option value="'.$item['id'].'">'.$item['business_name'].'</option>';
						}
					}
					?>
				</select>
				<label for="developer">创建人(开发者)</label>
	            <input type="text" name="developer" id="developer" value="<?=@$module['developer']?>" />
				<label>module文件名-method方法名-url参数</label>
				<input type="text" name="module_name" id="module_name" <?php if($action=='edit'){?>readonly="readonly"<?php } ?> value="<?=@$module['module_name']?>" style="width:75px;" /> -
				<input type="text" name="method_name" id="method_name" value="<?=$action=='add'?"index":@$module['method_name']?>" style="width:75px;" /> -
				<input type="text" name="url_param" id="url_param" value="<?=@$module['url_param']?>" style="width:120px;" /> 
				<label>模块状态</label>
				<select name="flag" id="flag">
					<option value="1" <?php if(@$module['flag']=='1') echo 'selected="selected"'; ?>>开发</option>
					<option value="2" <?php if(@$module['flag']=='2') echo 'selected="selected"'; ?>>测试</option>
					<option value="0" <?php if(@$module['flag']=='0') echo 'selected="selected"'; ?>>无效</option>
				</select>
		   </div>
	   </div>
       <div class="row">
            <?php 
				foreach($icons as $key=>$item){
					$ext = explode(".",$item);
					$pos = strpos($item, "64");
					if ($pos === false) {
						//echo "The string '$findme' was not found in the string '$mystring'";
					} else {
						if($ext[1]!='svn'){
							echo '<div class="imgbox" onclick="select_app_icon(this,\''.$item.'\');">';
							echo '<img src="/images/app_icons/'.$item.'" width="36" height="36" title="'.$item.'" />';
							$now_icon=$action=='add'?"bom_64.png":$module['app_icon'];
							if($item == $now_icon){
								echo '<img src="/images/ok.png" class="selected_flag" align="right" />';
							}else{
								echo '<img src="/images/ok.png" class="selected_flag" align="right" style="display:none" />';
							}
							echo '</div>';
						}
					}
					
				}
			?>
            <script>
            	function select_app_icon(obj,img){
					$(".selected_flag").css('display','none');
					$(obj).find(".selected_flag").css('display','block');
					$("#app_icon").val(img);
				}
            </script>
        </div>
        <div class="row">
			<div class="span3">
			<label for="business_name">模块背景颜色</label>
            <input type="text" name="background" id="background" value="<?=$action=='add'?"#3300FF":$module['background']?>" />
			</div>
			
			<div class="span3">
			<label for="business_name">模块背景透明度</label>
            <input type="text" name="opacity" id="opacity" value="<?=$action=='add'?"0.5":$module['opacity']?>" />
			</div>
        </div>														
        <div class="row">
			<div class="span12">
            	<label for="describe">模块功能描述</label>
            	<textarea name="describe" id="describe" rows="6" class="span10"><?=$action=='add'?"无":@$module['describe']?></textarea>
			</div>
        </div>
        <div class="row">
			<div class="span12">
				<label for="remark">模块注意事项、开发难点、配置等信息</label>
				<textarea name="remark" id="remark" rows="6" class="span10"><?=$action=='add'?"无":@$module['remark']?></textarea>
			</div>
        </div>
            <input name="serial_number" id="serial_number" value="CANDOR-LUODONG-2012-10-10-1234" type="hidden" /> 
			<input name="action" id="action" value="<?=$action?>" type="hidden" />
			<input name="mid" id="mid" value="<?=@$module['id']?>" type="hidden" />
        <div class="row"><br />
			<div class="span12">
			<button type="submit" class="btn">提交</button></p>	
			</div>
		</div>	
		</fieldset>
	</form>	
</div>
</body>
</html>
<script type="text/javascript">
var reload='<?=@$_GET["reload"]?>';
if(reload){
	var t=reload.split(",");
	for(var k in t){
		window.parent.frames[t[k]].location.reload();
	}
}
</script>