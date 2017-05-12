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
<title>公司管理</title>
</head>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/cdrstyle.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/style.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/page.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'js/plugins/jquery.dynatree/skin/ui.dynatree.css';?>' type='text/css' id='skinSheet' /> 
<script src="/js/jquery-1.8.3.min.js" ></script>
<script src="/js/plugins/datepicker/WdatePicker.js" ></script><!--时间控件JS-->
<script src="/js/jquery-ui.custom.min.js" type="text/javascript"></script>
<script src="/js/jquery.cookie.js" type="text/javascript"></script>
<script src='/js/plugins/jquery.dynatree/jquery.dynatree.js' type="text/javascript"></script> 
<style>
.form-horizontal .control-label{width:130px}
[class*="span"] {
    float: left;
    margin-right: 0px;
}
</style>

<script>
var treeData = [ 
    {title: "从业主体", isFolder: true, key: "id3", 
      children: [ 
        {title: "Sub-item 3.1", 
          children: [ 
            {title: "Sub-item 3.1.1", key: "id3.1.1" }, 
            {title: "Sub-item 3.1.2", key: "id3.1.2" } 
          ] 
        }, 
        {title: "Sub-item 3.2", 
          children: [ 
            {title: "Sub-item 3.2.1", key: "id3.2.1" }, 
            {title: "Sub-item 3.2.2", key: "id3.2.2" } 
          ] 
        } 
      ] 
    }, 
    {title: "登记系统", key: "id4", expand: false, isFolder: true,
      children: [ 
        {title: "Sub-item 4.1 (active on init)", activate: true, 
          children: [ 
            {title: "Sub-item 4.1.1", key: "id4.1.1" }, 
            {title: "Sub-item 4.1.2", key: "id4.1.2" } 
          ] 
        }, 
        {title: "Sub-item 4.2 (selected on init)", select: true, 
          children: [ 
            {title: "Sub-item 4.2.1", key: "id4.2.1" }, 
            {title: "Sub-item 4.2.2", key: "id4.2.2" } 
          ] 
        }, 
        {title: "Sub-item 4.3 (hideCheckbox)", hideCheckbox: true }, 
        {title: "Sub-item 4.4 (unselectable)", unselectable: true } 
      ] 
    } 
  ]; 

	$(document).ready(function(){
		//parent.operateBar('show','save,cancel');
		//给save按钮添加制定方法
		//parent.operateFactory('save','mainFrame#opform');
		//parent.operateFactory('cancel','mainFrame#opform');
		
		
		$("#tree3").dynatree({ 
		  checkbox: true, 
		  selectMode: 3, 
		  children: treeData, 
		  onSelect: function(select, node) { 
			// Get a list of all selected nodes, and convert to a key array: 
			var selKeys = $.map(node.tree.getSelectedNodes(), function(node){ 
			  return node.data.key; 
			}); 
			$("#echoSelection3").text(selKeys.join(", ")); 
		
			// Get a list of all selected TOP nodes 
			var selRootNodes = node.tree.getSelectedNodes(true); 
			// ... and convert to a key array: 
			var selRootKeys = $.map(selRootNodes, function(node){ 
			  return node.data.key; 
			}); 
			$("#echoSelectionRootKeys3").text(selRootKeys.join(", ")); 
			$("#echoSelectionRoots3").text(selRootNodes.join(", ")); 
		  }, 
		  onDblClick: function(node, event) { 
			node.toggleSelect(); 
		  }, 
		  onKeydown: function(node, event) { 
			if( event.which == 32 ) { 
			  node.toggleSelect(); 
			  return false; 
			} 
		  }, 
		  // The following options are only required, if we have more than one tree on one page: 
		  //initId: "treeData", 
		  cookieId: "dynatree-Cb3", 
		  idPrefix: "dynatree-Cb3-",
		  /*
		  onPostInit: function(isReloading, isError) { 
				var key = getURLParameter("activate"); 
				if( key ) { 
					this.activateKey(key); 
				} 
			}
			*/
		}); 
		
		// Get the DynaTree object instance: 
		var tree = $("#tree3").dynatree("getTree"); 
		// Use it's class methods: 
		//tree.activateKey("id4.2.1"); 
		// Get a DynaTreeNode object instance: 
		//var node = tree.getNodeByKey("key7654"); 
		//var rootNode = $("#tree").dynatree("getRoot"); 
		// and use it 
		//node.toggleExpand();
	});	
	
	function getURLParameter(name) { 
		return unescape( 
			(RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1] 
		); 
	} 

</script>
<body>

<div class="container-fluid">
	<div class="row-fluid"><h2>角色管理</h2></div>
	<div class="row-fluid">
    		<form action="/cyzt_rolemanager/<?=$actionname?>.candor?act=dosave" method="POST" id="opform"  class="form-horizontal">
			<div class="span6">  
				<div class="wrap-fix-blue">
					<fieldset>
                        <legend>角色信息</legend>
                        <div class="row-fluid">

                                <div class="control-group">
                                <label class="control-label" for="input01">角色名称：</label>
                                <div class="controls">
                                <input type="text" class="input-medium" id="GROUP_NAME" name="GROUP_NAME" value="<?=$groupinfo['GROUP_NAME']?>">
                                </div>
                                </div>

                                <div class="control-group">
                                <label class="control-label" for="input01">角色别名：</label>
                                <div class="controls">
                                <input type="text" class="input-medium" id="REMARK" name="REMARK" value="<?=$groupinfo['REMARK']?>">
                                </div>
                                </div>

                                <div class="control-group">
                                <label class="control-label" for="input01">地区编码：</label>
                                <div class="controls">
                                <input type="text" class="input-medium" id="REGIONCODE" name="REGIONCODE" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" value="<?=$groupinfo['REGIONCODE']?>">
                                </div>
                                </div>
								<div class="control-group">
									<div class="controls">
										<input type="hidden" name="ID" id="ID" value="<?if($actionname=='editrole'){echo $groupinfo["ID"];}?>"/>
									</div>
								</div>	

                        </div>
						<!--
						<?=$inputStr?>
						-->
						<legend>授权用户信息</legend>
						<input type="checkbox" value=""  checked="checked" /> 张三
						<input type="checkbox" value=""  checked="checked" /> 李四
						<input type="checkbox" value=""  checked="checked" /> 王武
						<input type="checkbox" value=""  checked="checked" /> 天亮
						<input type="checkbox" value=""  checked="checked" /> 刘海
						<?=$userlistStr?>
						<!--<div class="row-fluid">
							<input class="btn" type="submit"  value="保存" style="margin-right:20px; float:right"></input>
						</div>-->
                    </fieldset>
				</div>
			</div>
 
			<div class="span6">
				<div class="wrap-fix-blue">
					<fieldset>
						<legend>编辑权限</legend>
						  <div id="tree3"></div> 
						  <div>Selected keys: <span id="echoSelection3">-</span></div> 
						  <div>Selected root keys: <span id="echoSelectionRootKeys3">-</span></div> 
						  <div>Selected root nodes: <span id="echoSelectionRoots3">-</span></div> 

						<!--div style="width:100%;min-height:50px;">
							 <?=$rightslistStr?>		
						</div-->	
						<div class="control-group">
								<div class="controls">
									<input type="hidden" name="GROUP_ID" id="GROUP_ID" value="<?if($actionname=='editrole'){echo $groupinfo["ID"];}?>"/>
								</div>
						</div>	
					</fieldset>
				 </div>	
			</div>	
			</form>		
	</div><!-- row-fluid end -->
</div>

</body>
</html>
