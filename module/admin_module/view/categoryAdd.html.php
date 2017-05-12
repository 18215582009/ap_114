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
    height: 38px;
    margin: 3px;}
.imgbox:hover{opacity: .5;}
.imgbox .selected_flag{ position:absolute; top:21px; width:24px; left:4px;}
.row{ margin-left:0;}
input {
    width:auto;
}
select{width:158px;}
</style>
<script>
$(document).ready(function(){

})

</script>
<body>
<div style="position:absolute;right:1px;top:1px;">
	<a href="javascript:window.location.reload()" title="刷新" class="refresh"></a>
	<a href="javascript:history.back()" title="返回" class="return"></a>
</div>
<div class="container-fluid">
	<form id="form1" class="form-horizontal" action="/admin/saveCategory" method="post">	
	<fieldset>
		<legend>创建分类</legend>
    	<div class="row">
			<div class="span3">
			<label for="project_name">所属项目</label>
			<select name="project_name" id="project_name" onchange="get_submodule(this);">
			  <?php 
				foreach($project as $pkey=>$pitem){
					if($pitem['project_code']==$module['project_code']){
						echo '<option value="'.$pitem['project_code'].'" selected="selected">'.$pitem['project_name'].'</option>';	
					}else{
						echo '<option value="'.$pitem['project_code'].'">'.$pitem['project_name'].'</option>';
					}
				}
			  ?>
			</select>
			<script>
				function get_submodule(obj){
					//alert($(obj).val());
					$('#module_prefix').val(prefix[$(obj).val()]);
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
			<label for="app_icon">请选择业务应用图标</label>
            <input type="text" name="app_icon" id="app_icon" value="<?=$module['app_icon']?>" readonly="readonly" />
		   </div>
		   <div class="span3">
		   	<label for="parent_module">子类名称</label>
			<input type="text" name="business_name" id="business_name" value="<?=$module['business_name']?>" />
			<label>分类状态</label>
			<select name="flag" id="flag">
				<option value="1" <?php if($module['flag']=='1') echo 'selected="selected"'; ?>>启用</option>
				<option value="0" <?php if($module['flag']=='0') echo 'selected="selected"'; ?>>停用</option>
			</select>
		   </div>
	   </div>
       <div class="row">
            <?php 
				foreach($icons as $key=>$item){
					$ext = explode(".",$item);
					$pos = strpos($item, "48");
					if ($pos === false) {
						//echo "The string '$findme' was not found in the string '$mystring'";
					} else {
						if($ext[1]!='svn'){
							echo '<div class="imgbox" onclick="select_app_icon(this,\''.$item.'\');">';
							echo '<img src="/images/app_icons/'.$item.'" width="24" />';
							if($item == $module['app_icon']){
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
			<div class="span12">
            	<label for="describe">分类功能描述</label>
            	<textarea name="describe" id="describe" rows="6" class="span10"><?=$module['describe']?></textarea>
			</div>
        </div>
			<input name="module_type" id="moduletype"  value="<?=$module['module_type']?>" type="hidden" />
            <input name="serial_number" id="serial_number" value="CANDOR-LUODONG-2012-10-10-1234" type="hidden" /> 
			<input name="action" id="action" value="<?=$action?>" type="hidden" />
			<input name="mid" id="mid" value="<?=$module['id']?>" type="hidden" />
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
