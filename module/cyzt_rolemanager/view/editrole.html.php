<?php
/**
 * Html模板文件
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong<751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: editrole.html.php,v 1.4 2014/06/05 09:57:01 lj Exp $
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>角色名称</title>
</head>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/cdrstyle.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/style.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/page.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'js/plugins/jquery.dynatree/skin/ui.dynatree.css';?>' type='text/css' id='skinSheet' /> 
<link rel="stylesheet" href="/js/plugins/html5Validate/validate.css" type="text/css" />
<script src="/js/jquery-1.8.3.min.js" ></script>
<script src="/js/candor.common.js"></script>
<script src="/js/plugins/datepicker/WdatePicker.js" ></script><!--时间控件JS-->
<script src="/js/jquery-ui.custom.min.js" type="text/javascript"></script>
<script src="/js/jquery.cookie.js" type="text/javascript"></script>
<script src="/js/plugins/jquery.dynatree/jquery.dynatree.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/plugins/artDialog/artDialog.source.js?skin=default"></script>
<script type="text/javascript" src="/js/plugins/artDialog/plugins/iframeTools.js"></script>
<script src="/js/plugins/html5Validate/jquery-html5Validate.js"></script>
<style>
.form-horizontal .control-label{width:130px}
[class*="span"] {
    float: left;
    margin-right: 0px;
}
ul.dynatree-container{height:98%}
#tree3{height:538px; background:#FFFFFF}
</style>

<script>
/*
[
{id:122,title:"组织机构管理", isFolder: true,key:"122"},
{id:123,title:"修改单位", isFolder: true,key:"123"},
{id:124,title:"新增单位", isFolder: true,key:"124"},
{id:125,title:"页面浏览", isFolder: true,key:"125"},
{id:126,title:"删除单位", isFolder: true,key:"126"}
]

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
*/
var treeData = <?=$jsontree;?>;	


function getTreeDefalut(jsontree){
	var result="";
	for(var i in jsontree){
		if(jsontree[i].select){
			result+=","+jsontree[i].key;
		}
		if(jsontree[i].children){
			result+=getTreeDefalut(jsontree[i].children);
		}
	}
	return result;
}
	$(document).ready(function(){
		var t=getTreeDefalut(treeData);
		if(t!=="")
		$("#leafNode").val(t.substr(1));
		//alert(stype);	
		//给save按钮添加制定方法
		$("#opform").html5Validate(function(){this.submit();},{});
		<?php if($method=='editRole'){ ?>
			disabled(true);
			operateBar('show','<?=$info["id"]?"edit":""?>');
			operateFactoryFun('edit',edit);
		<?php } else{?>
			disabled(false);
			operateBar('show','save,cancel');
			operateFactoryFun('save',vk);
			operateFactoryFun('cancel',cancel);
		<?php }?>
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
			$("#echoSelection3").text(selKeys.join(", ")); 
			$("#leafNode").val(selKeys.join(", "));
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
		  onActivate: function(node) {
			  if(node.data.isFolder){
				$("#attachRight").css('display','block');
				$("#vnodeId").val(node.data.id);
				$("#vnodeName").val(node.data.title);
			  }else{
				$("#attachRight").css('display','none');
				$("#vnodeId").val('');
				$("#vnodeName").val('');
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

	});	

	function edit(){		
		disabled(false);
		operateBar('show','save,cancel');
		operateFactoryFun('save',vk);
		operateFactoryFun('cancel',cancel);

	}

	function vk(){
		prompt('加载等待','loading');
		$("#opform").submit();	
	}
	function cancel(){
		window.location.reload();
		// prompt('您确认放弃操作嘛？','warning');
		//disabled(true);
		//operateBar('show','edit');
		//operateFactoryFun('edit',edit);
	}

	function getURLParameter(name) { 
		return unescape( 
			(RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1] 
		); 
	} 



	function addAttachRight(){
		var nodeId = $("#vnodeId").val();
		var nodeName = $("#vnodeName").val();
		var group_id = $("#ID").val();
		if(nodeId>0){
			var adddialog = art.dialog.open('/cyzt_rolemanager/additionrights.html?nodeid='+nodeId+'&nodename='+nodeName+'&group_id='+group_id,{
				title:'附加权限信息',
				width:360,
				height:400,
				lock:'true',
				esc:'false',
				window:top,
				ok:function(){
					var iframe = this.iframe.contentWindow;
					var addrightslist = iframe.document.getElementById('leafNode').value;
					if((addrightslist!="")||(addrightslist.lenght>=0)){
						$.ajax({
						   type: "GET",
						   url: "/cyzt_rolemanager/additionrights.html?nodeId="+nodeId+"&nodeName="+nodeName+"&group_id="+group_id+"&addrightslist="+addrightslist,
						   data: {"act":"dosave"},
						   success: function(msg){
								if(msg)
								{

									alert_msg('保存用户附加权限信息成功！','succeed','/cyzt_rolemanager/editrole.candor?group_id='+group_id+'&type=view|确认',3,'',true);
									
								}
								else{
									alert_msg('保存用户附加权限信息失败！','error','/cyzt_rolemanager/editrole.candor?group_id='+group_id+'&type=view|确认',3,'',true);
			
									
								}
						   }
						});
					}
					art.dialog.close();
				},
				cancel: true
			});
		}
	}
</script>
<style>
#main-content {
	margin-bottom: 40px !important;
    margin-top: 0;
	min-height:100%;
    margin-left: 270px;
}
</style>
<body>
<div id="search_content" style="position:fixed">
	<div id="search_frist_spacer">
		<form class="form-inline span6" action="/cyzt_rolemanager/rolelist.candor" method="POST"  target="leftFrame">
			角色名称&nbsp;<input type="text" class="input-large gray radius" id="GROUP_NAME" name="GROUP_NAME">
			<button class="btn" type="submit"><i class="icon-search"></i>搜索</button>
		</form>
		<div class="row-fluid" align="right" id="operateBar">
			<a href="javascript:;" class="btn" id="cancel">取消</a>&nbsp;
			<a href="javascript:;" class="btn" id="save"><i class="icon-check"></i>保存</a>
			<a href="javascript:;" class="btn" id="edit">编辑</a>&nbsp;&nbsp;
		</div>
	</div>
	<div id="search_shadow"></div>
</div>

<div id="main-content">
	<div class="container-fluid" style="padding-top:40px;">
	<div class="row-fluid">	
		<div class="span12">
    		<form action="/cyzt_rolemanager/<?=$method?>.candor?act=save" method="POST" id="opform" class="form-horizontal">
			<input type="hidden" id="vnodeId" value="" readonly="readonly" />
			<input type="hidden" id="vnodeName" value="" />
			<input type="hidden" id="leafNode" name="rightslist" value="<?=$rightslist?>"/>
		  <div style="display:none">
		  <div>叶子节点: <span id="echoSelection3">-</span></div> 
		  <div>根节点: <span id="echoSelectionRootKeys3">-</span></div> 
		  <div>Selected root nodes: <span id="echoSelectionRoots3">-</span></div> 
		  </div>
			<input type="hidden" name="id" id="id" value="<?=$info["id"]?>" />
			<div class="row-fluid">
			<div class="span7"> 
				<fieldset>
					<legend>角色信息</legend>
					<div class="row-fluid">
							<div class="control-group">
							<label class="control-label" for="name">角色名称：</label>
							<div class="controls">
							<input type="text" class="input-medium" id="name" name="name" required value="<?=$info['name']?>">
							</div>
							</div>

							<div class="control-group">
							<label class="control-label" for="input01">角色别名：</label>
							<div class="controls">
							<input type="text" class="input-medium" id="alias" name="alias" value="<?=$info['alias']?>">
							</div>
							</div>

							<div class="control-group">
							<label class="control-label" for="REGIONCODE">角色说明：</label>
							<div class="controls">
							<input type="text" class="input-medium" id="note" name="note" required value="<?=$info['note']?>">
							</div>
							</div>	
					</div>
					<div class="wrap-sl" style="height:419px">
						<div class="wrap-sl-header">
						<h5>授权用户信息 <?php if(count($groupinfo)>0){?><a style="float:right; margin-right:20px;margin-top:6px;" target="mainFrame" href="/cyzt_rolemanager/rightsgive.candor?groupid=<?=$groupinfo['ID']?>" title="授权"><i class="icon-banner-role icon-blue"></i></a><?php }?></h5>			
						</div>
						<div class="wrap-sl-content" style="height:389px; overflow:auto; margin-bottom:10px;overflow-x:hidden;">
						<?=$userlistStr?>
						<!-- xyd+ -->
						<!-- <div class="wrap-sl-content"> -->
						<ul id="selectedUser" class="unstyled arrange" style="padding:0 5px;">
							<?php if($userlist){foreach ($userlist as $k => $v) {?>
							<li style="width:20%;"><span title="<?=$v['name']?>"><?=$v["name"]?></span></li>
							<?php }}?>	
						</ul>
						<!-- </div> -->
						<!-- xyd+ -->
						</div>
					</div>
				</fieldset>
			</div>
 
			<div class="span5">
				<div class="wrap-sl" style="margin-top:20px">
					<div class="wrap-sl-header gray-blue">
						<h5>权限设置</h5>
						</div>
					  <div class="wrap-sl-content">
						  <div id="tree3"></div>					 
					  </div>	
				</div>	
			</div>	
			</div>
			</form>
		</div>
	</div><!-- row-fluid end -->
</div>
</div>
</body>
</html>
<script type="text/javascript">
var reload='<?=$_GET["reload"]?>';
if(reload){
	var t=reload.split(",");
	for(var k in t){
		window.parent.frames[t[k]].location.reload();
	}
}
</script>