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

</style>
<script>
var prefix=new Array()
//prefix[0]="Saab"
<?php 
	foreach($this->app->config->project->prefix as $key=>$item){
				echo 'prefix['.$key.']="'.$item.'";';	
			}
?>
</script>
<body>
<div style="float:left;width:600px; border:1px solid #CCC; padding:0 10px;">
	<h2>创建模块</h2>
	<form id="form1" action="/admin/saveModule" method="post">	
		<input type="hidden" name="project_code" id="project_code" value="100" />
    	<p>
        <label for="project_name">所属项目</label>
        <select name="project_name" id="project_name" onchange="get_submodule(this);">
          <?php 
		  	foreach($this->app->config->project->category as $key=>$item){
				echo '<option value="'.$key.'">'.$item.'</option>';	
			}
		  ?>
        </select>
		<script>
        	function get_submodule(obj){
				//alert($(obj).val());
				$('#module_prefix').val(prefix[$(obj).val()]);
				$('#project_code').val($(obj).val());
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
        <label for="parent_module">所属子类</label>
        <select name="parent_module" id="parent_module">
        </select>
        </p>
        <p class="first">
            <label for="business_name">业务名称</label>
            <input type="text" name="business_name" id="business_name" size="30" />

            <label for="module_name">module文件名</label>
            <input type="text" name="module_prefix" id="module_prefix" size="6" readonly="readonly"/>
            <input type="text" name="module_name" id="module_name" size="21" />

            <label for="developer">创建人(开发者)</label>
            <input type="text" name="developer" id="developer" size="30" />
        </p>
        <p>
        	<label for="app_icon">请选择业务应用图标</label>
            <input type="text" name="app_icon" id="app_icon" />
            <?php 
				foreach($icons as $key=>$item){
					echo '<div class="imgbox" onclick="select_app_icon(this,\''.$item.'\');">';
					echo '<img src="/images/app_icons/'.$item.'" width="36" height="36" />';
					echo '<img src="/images/ok.png" class="selected_flag" align="right" style="display:none" />';
					echo '</div>';
				}
			?>
            <script>
            	function select_app_icon(obj,img){
					$(".selected_flag").css('display','none');
					$(obj).find(".selected_flag").css('display','block');
					$("#app_icon").val(img);
				}
            </script>
        </p>
        <br style="clear:both" />																
        <p>
            <label for="describe">模块功能描述</label>
            <textarea name="describe" id="describe" cols="70" rows="6"></textarea>
        </p>
        <p>
            <label for="remark">模块注意事项、开发难点、配置等信息</label>
            <textarea name="remark" id="remark" cols="70" rows="6"></textarea>
        </p>
            <input name="serial_number" id="serial_number" value="CANDOR-LUODONG-2012-10-10-1234" type="hidden" /> 
        <p class="submit"><button type="submit">提交</button></p>		
	</form>	
</div>
<div style="float:left;width:600px; border:1px solid #CCC; margin-left:10px">
	<h2>已有模块</h2>
<?php 
	foreach($mList as $kye=>$item){
		echo $item['id']."、".$item['project_name']."、".$item['business_name']."、".$item['module_name']."、".$item['developer']."<br/>";
		
		//echo "INSERT INTO `candor`.`module` SET `id`={$item['id']},`business_name`='{$item['business_name']}',`module_name`='{$item['module_name']}',`project_name`='{$item['project_name']}',`parent_module`='{$item['parent_module']}',`module_prefix`='{$item['module_prefix']}',`app_icon`='{$item['app_icon']}',`developer`='{$item['developer']}',`access_code`='{$item['access_code']}',`flag`={$item['flag']},`serial_number`='{$item['serial_number']}',`time`='{$item['time']}',`describe`='{$item['describe']}',`remark`='{$item['remark']}';</br>";
	}
?>
</div>
</body>
</html>
