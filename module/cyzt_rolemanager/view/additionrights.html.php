<?php
/**
 * Html模板文件
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong<751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: additionrights.html.php,v 1.2 2014/06/05 09:57:01 lj Exp $
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
<script src="/js/candor.common.js"></script>
<script src="/js/plugins/datepicker/WdatePicker.js" ></script><!--时间控件JS-->
<script src="/js/jquery-ui.custom.min.js" type="text/javascript"></script>
<script src="/js/jquery.cookie.js" type="text/javascript"></script>
<script src="/js/plugins/jquery.dynatree/jquery.dynatree.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/plugins/artDialog/artDialog.source.js?skin=default"></script>
<script type="text/javascript" src="/js/plugins/artDialog/plugins/iframeTools.js"></script>
<style>
.form-horizontal .control-label{width:130px}
[class*="span"] {
    float: left;
    margin-right: 0px;
}
#tree3{margin-top:10px;height:360px;overflow:hidden; background:#FFFFFF}
#tree3 ul{overflow-x:hidden;height:98%}
</style>

<script>

	var treeData = <?=$addrightjsontree;?>;	
	$(document).ready(function(){
		if (treeData=="0")
		{
			//alert(1);
			$("#errorMsg").css('display','block');
		}
		else
		{
			//alert(2);
			$("#errorMsg").css('display','none');
			$("#tree3").dynatree({ 
			  checkbox: true, 
			  selectMode: 3, 
			  //minExpandLevel:5,
			  //imagePath: "/js/plugins/jquery.dynatree/skin-custom/",
			  children: treeData, 
			  onSelect: function(select, node) { 
				// Get a list of all selected nodes, and convert to a key array: 
				var selKeys = $.map(node.tree.getSelectedNodes(), function(node){ 
				  return node.data.key; 
				}); 
				$("#echoSelection3").text(selKeys.join(",")); 
				$("#leafNode").val(selKeys.join(","));
				// Get a list of all selected TOP nodes 
				var selRootNodes = node.tree.getSelectedNodes(true); 
				// ... and convert to a key array: 
				var selRootKeys = $.map(selRootNodes, function(node){ 
				  return node.data.key; 
				}); 
				$("#echoSelectionRootKeys3").text(selRootKeys.join(",")); 
				$("#echoSelectionRoots3").text(selRootNodes.join(",")); 
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
			  onActivate: function(node) { 
				  if(node.data.isFolder){
					$("#attachRight").css('display','block');
					$("#nodeId").val(node.data.id);
					$("#nodeName").val(node.data.title);
				  }else{
					$("#attachRight").css('display','none');
					$("#nodeId").val('');
					$("#nodeName").val('');
				  }
				  //for (var i in node.data) { 
				  //	alert(i + ": " + node.data[i]);
				  //}
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
		tree.activateKey("id4.2.1"); 
		// Get a DynaTreeNode object instance: 
		//var node = tree.getNodeByKey("key7654"); 
		//var rootNode = $("#tree").dynatree("getRoot"); 
		// and use it 
		//node.toggleExpand();
		}

	});	


</script>
<body>

<div class="container-fluid"> 
			<input type="hidden" name="GROUP_ID" id="GROUP_ID" value="<?=$group_id?>"/>
			<input type="hidden" name="NODEID" id="NODEID" value="<?=$nodeid?>"/>
			<input type="hidden" name="NODENAME" id="NODENAME" value="<?=$nodename?>"/>
			<input type="hidden" id="leafNode" name="ADDRIGHTSLIST" value=""/>
	<form action="" method="POST" id="opform"  class="form-horizontal">
		<div class="row-fluid">

			<div class="wrap-sl"  style="height:360px;">
				<div style="border:#98b1c8 1px solid; vertical-align:middle; display:none" id="errorMsg"><span id="spnMsg">当前选择节点未配置附加权限。  </span></div>	
				<div id="tree3"></div> 
			 </div>	
		</div>
	</form>
</div>

</body>
</html>