<?php
/**
 * Html模板文件
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong<751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: addrole.html.php,v 1.4 2014/06/05 09:57:01 lj Exp $
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UI</title>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/common.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/style.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/cdrstyle.css';?>' type='text/css' media='screen' />
<link rel="stylesheet" type="text/css" href="/js/plugins/sdmenu/sdmenu.css" />
<script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>

<script type="text/javascript" src="/js/plugins/sdmenu/sdmenu.js"></script>
<!-- *加载等待 js -->
<script src="/js/plugins/artDialog/jquery.artDialog.source.js?skin=default" type="text/javascript"></script>
<script src="/js/plugins/artDialog/plugins/iframeTools.js" type="text/javascript"></script>


</head>


		<script type="text/javascript">
		var myMenu;
		window.onload = function() {
			myMenu = new SDMenu("my_menu");
			//myMenu.speed = 3; // 折叠速度
			//myMenu.remember = true; // 是否记录状态
			//myMenu.oneSmOnly = false; // 一次只有一个菜单打开
			//myMenu.markCurrent = true; // 是否高亮当前菜单 
			myMenu.init();
		};
		function beforelocate(obj,sdmenuid){
			$("#my_menu").find("div").each(function(i){$(this).attr("class","collapsed");});
			$("#my_menu").find("a").each(function(i){$(this).attr("class","");});
			locate(obj,sdmenuid);
		}
		function locate(obj,sdmenuid){
			var ParentObj = $(obj).parent();
			$(obj).attr("class","current");
			if(ParentObj.attr("id")!=sdmenuid){
				ParentObj.attr("class","");
				locate(ParentObj,sdmenuid);
			}
		}
		function checkall(obj){
			//alert($(obj).attr("checked"));
			if ($(obj).attr("checked")=="checked"){
				//alert($(obj).parents().parents().html());
					$(obj).parent().parent().find("input").each(function(i){
						$(this).attr("checked","checked");
					});	
			}
			else
			{
					$(obj).parent().parent().find("input").each(function(i){
						$(this).removeAttr("checked");
					});	
			}
		}

		//提交
		function postform()
		{
			var a = $("#aaa").val();
			var gid = $("#ID").val();
			a = $.trim(a);
			if(a == null ||a == ""){
				alert("角色名称不能为空!");
				return false;
			}
			var module_id=new Array();
			var j=0;
			$("#my_menu").find("input").each(function(i){
				if ($(this).attr("checked")=="checked"){
					module_id[j] = $(this).val();
					j++;
				}
			});
			if(module_id.length == 0)
			{
				alert("请至少为该角色赋一个权限!");
				return false;				
			}
			if (gid == null ||gid == "")
			{
				$.ajax({
				   type: "POST",
				   url: "/cyzt_rolemanager/saverole.candor?app=FcxxWebService",
				   data: {"GROUP_NAME":a,"ID":gid,"type":"append","sub_MODULE_ID":module_id},
				   success: function(msg){
					   if(msg=1){
						  art.dialog.close();
					   }
				   }
				});
			}
			else
			{
				$.ajax({
				   type: "POST",
				   url: "/cyzt_rolemanager/saverole.candor?app=FcxxWebService",
				   data: {"GROUP_NAME":a,"ID":gid,"type":"update","sub_MODULE_ID":module_id},
				   success: function(msg){
					   if(msg=1){
						  art.dialog.close();
					   }
				   }
				});			
			}
		}
		</script>

		<body style="background:url('/images/rolemanage/img02.gif') repeat-x scroll 0 0 #bbdaee">
			<form id="form1" action="/cyzt_rolemanager/saverole.candor?app=FcxxWebService" method="POST">
				<img src="/images/rolemanage/img01.gif" class="clear"/>
				<table class="clear" align="center">
					<tr>
						<td>角色名称：</td>
						<td><input type="text" name="SYSTEM@CYGROUP-GROUP_NAME" id="aaa" /></td>
					</tr>
					<div class="controls">
						<input type="hidden" name="ID" id="ID" />
					</div>
					<tr>
						<td><div style="height:360px;">角色权限：</div></td>
						<td>
							<div style="border:1px solid #8aa6b1;width:383px;height:360px;">
								<div style="background:#aed3e3;padding:6px 0 0 6px;">查询：<input type="text" name="SYSTEM@CYGROUP-GROUP_NAME" id="aaa" /><img src="/images/rolemanage/img04.gif" style="cursor:pointer;"/></div>
								<div style="overflow-y:scroll;width:383px;height:318px;">
									<div style="float:left" id="my_menu" class="sdmenu">
											<?=$moduletree?>
									</div>
								</div>
							</div>
							<img src="/images/rolemanage/img03.gif" class="clear"/>
						</td>
						
					</tr>
					<tr>
					<td></td>
						<td align="right">
							<div>
								<input onclick="postform();" value="保存" class="btn btn-info" type="button"/>
								<input onclick="javascript:art.dialog.close();" class="btn btn-danger" value="放弃" type="button"/>
							</div>
						</td>
					</tr>

				</table>
			</form>
		</body>
</html>
