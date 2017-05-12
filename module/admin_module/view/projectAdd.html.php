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
<body>
<div style="position:absolute;right:1px;top:1px;">
	<a href="javascript:window.location.reload()" title="刷新" class="refresh"></a>
	<a href="javascript:history.back()" title="返回" class="return"></a>
</div>
<div class="container-fluid">
	<form id="form1" class="form-horizontal" action="/admin/<?php if($action=='update'){ ?>editProject<?php }else { ?>addProject<?php } ?>" method="post">	
	<fieldset>
		<legend>
		<?php if($action=='insert'){
			echo '新建项目';
		}else{
			echo '编辑项目';
		} ?>
		</legend>
    	<div class="row">
			<div class="span6">
				<label for="project_name">项目名称</label>
				<input type="text" name="project_name" id="project_name" value="<?=$project['project_name']?>" /><p class="help-inline">请填写中文名称,如："从业主体"</p>
				<label for="project_icon">请选择业务应用图标</label>
	            <input type="text" name="project_icon" id="project_icon" value="<?=$project['project_icon']?>" readonly="readonly" /><p class="help-inline">项目图标必须指定</p>
		   </div>
		   <div class="span6">
			   	<label for="project_prefix">项目前缀</label>
				<input type="text" name="project_prefix" id="project_prefix" value="<?=$project['project_prefix']?>"  <?php if($action=='update'){?>readonly="readonly"<?php } ?> /><p class="help-inline">如：从业主体,前缀为"cyzt_"</p>

				<label for="project_code">项目编号</label>
				<?php if($action=='insert'){ ?>
				<select name="project_code" id="project_code">
					<?php 
						foreach($resultCodeList as $key=>$item){
							echo '<option value="'.$item.'">'.$item.'</option>';
						}
					?>
				</select><p class="help-inline">项目编号必须指定</p>
				<?php }else{ ?>
					<input type="text" name="project_code" id="project_code" value="<?=$project['project_code']?>"  <?php if($action=='update'){?>readonly="readonly"<?php } ?> /><p class="help-inline"><p class="help-inline">项目编号不能修改</p>
				<?php } ?>
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
							echo '<img src="/images/app_icons/'.$item.'" width="24" title="'.$item.'" />';
							if($item == $project['project_icon']){
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
					$("#project_icon").val(img);
				}
            </script>
        </div>
        														
		<input name="action" id="action" value="<?=$action?>" type="hidden" />
		<input name="pid" id="pid" value="<?=$project['id']?>" type="hidden" />
        <div class="row"><br />
			<div class="span12">
			<button type="submit" class="btn">提交</button>
			<a href="javascript:history.back()" class="btn">返回</a>
			</div>
		</div>	
		</fieldset>
	</form>	
</div>
</body>
</html>
<script>
var reload='<?=$_GET["reload"]?>';
if(reload){
	var t=reload.split(",");
	for(var k in t){
		window.parent.frames[t[k]].location.reload();
	}
}
</script>