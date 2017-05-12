<?php
/**
 * Html模板文件
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong<751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: rightsgive.html.php,v 1.4 2014/06/05 09:57:01 lj Exp $
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
<script src="/js/jquery-1.8.3.min.js" ></script>
<script src="/js/candor.common.js"></script>
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
#tree3{height:572px;overflow-y:none; background:#FFFFFF}
</style>
<script>
$(function(){ 
    $("#searchvalue").keyup(function(){
        $("#div1").hide();
        var theName = $("#searchvalue").val(); 
        var i=0;
        if(theName.replace(" ","") != ""){
            $.post("/cyzt_rolemanager/ajaxGetsearchres.candor",{ orgname: theName },function(result){
            	var curuserlist = eval("(" + result + ")");
                if(curuserlist.length>0){
                	var temp="";
	                for (i; i < curuserlist.length; i++) {
	                  	temp += "<li><a id='a"+ i +"' onclick='selectTheLi("+ i +","+curuserlist[i].ID+")'>"+curuserlist[i].ORGNAME + "</a></li>";
                    }
                    var myli="<ul id='test_li'>"+temp+"</ul>";
                    $("#div1").html(myli); 
                    $("#div1").show();
                 }
                 else{
                    $("#div1").hide();
                 }
            });
        }
        else{
           $("#div1").hide();
        }
    });
});
function selectTheLi(li,id){
    $(function(){
        $("#searchvalue").attr("value",$("#a"+li).html());
        $("#div1").hide();
        $.post("/cyzt_rolemanager/ajaxGetorgstructbyid.candor",{ ORGID: id },function(result){
        	 $("#searchorgstruct").html(result);//联动
        });
    });
}
/* 
var treeData= [{id,101,title: "从业主体",  isFolder: true, key: "101", children:[
{id:"101_5",title:"用户管理", isFolder: true,key:"101_5","children":[
{id:"101_5_122",title:"组织机构管理",unselectable: true, isFolder: false,select: true,key:"101_5_122"},
{id:"101_5_123",title:"修改单位",unselectable: true, isFolder: false,key:"101_5_123"},
{id:"101_5_124",title:"新增单位",unselectable: true, isFolder: false,key:"101_5_124"},
{id:"101_5_125",title:"页面浏览",unselectable: true, isFolder: false,key:"101_5_125"},
{id:"101_5_126",title:"删除单位",unselectable: true, isFolder: false,key:"101_5_126"}
]
},{id:"101_6",title:"角色管理", isFolder: true,select: true,key:"101_6",unselectable: true}]}];
*/
var treeData = <?=$jsontree?>;
$(document).ready(function(){
	$("#tree3").dynatree({ 
		  checkbox: true, 
		  selectMode: 3, 
		  minExpandLevel:3,
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
	refreshSelectedUser();
	disabled(true);
	operateBar('show','edit');
	operateFactoryFun('edit',edit);
});

	function edit(){		
		disabled(false);
		$("#getPerson").bind('click',getPersonById).removeClass('disabled');
		operateBar('show','save,cancel');
		operateFactoryFun('save',vk);
		operateFactoryFun('cancel',cancel);
	}
	
	function vk(){
		prompt('加载等待','loading');
		$("#opform").submit();	
	}

	function cancel(){
		$("#getPerson").unbind('click');
		prompt('您确认放弃操作嘛？','warning');
	}

	var selectuserlist = <?=$userSelectJson ?>;//{"wanggang": "王江", "liuyuxiao": "刘雨潇"} ;//初始化数据
 	function adduser(obj, username,realname) {
        if ($(obj).is(':checked')) {
            eval("selectuserlist." + username + " = '" + realname + "'");
            //添加到右边选择用户块
            refreshSelectedUser();
        } else {
            eval("selectuserlist." + username + " = undefined");
            //移除右边选择用户块
            refreshSelectedUser();
        }
    }

    function deluser(obj, username, realname) {
        $(obj).remove();

        $("#showUser").find("input").each(function (i) {
            var tmp_user = $(this).val();
            if("uid_"+tmp_user==username){
                $(this).removeAttr("checked");
            } 
        });

        eval("selectuserlist." + username + " = undefined");
        refreshSelectedUser();
    }

    function refreshSelectedUser() {
        //alert(selectuserlist.tgm); // 读取a页面的数据
        var selectContent = "";
        $.each(selectuserlist, function (key, value) {
			//alert(eval("selectuserlist."+key1) );
			if (value != undefined) {
				selectContent += "<li><input type=\"checkbox\" name=\"selectuser[]\" title=\""+eval("selectuserlist."+key)+"\" value=\"" + key + "\" onclick=\"deluser(this,'" + key + "','" + value + "');\" checked=\"checked\" /><span title=\""+eval("selectuserlist."+key)+"\">" + value + "</span></li>";
			}
        });
        $("#selectedUser").html(selectContent);
    }	
	
	function getPersonById() {
        var curContent = "";
        var user_name = encodeURIComponent($("#user_name").val());
		var org_id = $("#parent_id").val();
        var i = 0;
        $.ajax({
            type: "POST",
            url: "/cyzt_rolemanager/ajaxGetUserJson.candor",
            data: "org_id=" + org_id +"&user_name="+user_name,
            success: function (msg) {
                //alert(msg);
                curuserlist = eval("(" + msg + ")");
                curContent = "";
                //alert(curuserlist.root.length);
                for (i; i < curuserlist.length; i++) {
                    var ischeck = "";
					var depart = "";
                    $.each(selectuserlist, function (key, value) {
                        if ("uid_"+curuserlist[i].id == key && value != undefined) {
                            ischeck = "checked=\"checked\""
                        }
                        if (curuserlist[i].DEPART != undefined) {
                            depart = curuserlist[i].DEPART;
                        }
                    });
                    //curContent += "<li><input type=\"checkbox\" title=\""+curuserlist[i].FULLNAME+" "+depart+"\" rel=\"" + curuserlist[i].USER_NAME + "\" name=\"ids\" value=\"" + curuserlist[i].ID + "\" onclick=\"adduser(this,'uid_" + curuserlist[i].ID + "','" + curuserlist[i].USER_NAME + "');\" " + ischeck + " /><span title=\""+curuserlist[i].FULLNAME+" "+depart+"\">" + curuserlist[i].USER_NAME + "</span></li>";
					curContent += "<li>&nbsp;<input type=\"checkbox\" title=\""+curuserlist[i].name+"\" rel=\"" + curuserlist[i].login + "\" name=\"ids[]\" value=\"" + curuserlist[i].id + "\" onclick=\"adduser(this,'uid_" + curuserlist[i].id + "','" + curuserlist[i].name + "');\" " + ischeck + " /><span title=\""+curuserlist[i].name+"\">&nbsp;" + curuserlist[i].name + "</span></li>";
                }
				if(curuserlist.length<1){
					curContent = '<li style=\"width:200px;\">&nbsp;抱歉，系统中没有找到该用户！</li>';
				}
                curContent = curContent;
                //$("#selectTitle").html(title);
                $("#showUser").html(curContent);


                $('#inputCheck').click(function () {
                    if ($('#inputCheck').is(':checked')) {
                        $("#Showdata").find("input").each(function (i) {
                            $(this).attr("checked", true);
                            var username = $(this).val();
                            var realname = $(this).attr("rel");
                            eval("selectuserlist." + username + " = '" + realname + "'");
                        });
                    } else {
                        $("#Showdata").find("input").each(function (i) {
                            $(this).removeAttr("checked");
                            var username = $(this).val();
                            eval("selectuserlist." + username + " = undefined");
                        });
                    }
                    refreshSelectedUser();
                    art.dialog.data('bUserlist', selectuserlist);
                });


                $("#select_reverse").click(function () {
                    $("#Showdata").find("input").each(function (i) {
                        if ($(this).is(':checked')) {
                            $(this).removeAttr("checked");
                            var username = $(this).val();
                            eval("selectuserlist." + username + " = undefined");
                        } else {
                            $(this).attr("checked", true);
                            var username = $(this).val();
                            var realname = $(this).attr("rel");
                            eval("selectuserlist." + username + " = '" + realname + "'");
                        }

                    });
                    refreshSelectedUser();
                    art.dialog.data('bUserlist', selectuserlist);
                });

            }
        });
    }
    //全选按钮
    function selectAll(obj){
    	if($(obj).html()=="全不选"){
    		$("#showUser :checkbox").filter(":checked").each(function(){
    			$(this).removeAttr("checked");
    			var t=$(this).attr("onclick").toString();
    			eval(t);
    		});
    		$(obj).html("全选");
    	}else{
    		$("#showUser :checkbox").not(":checked").each(function(){
    			$(this).attr("checked","checked");
    			var t=$(this).attr("onclick").toString();
    			eval(t);
    		});
    		$(obj).html("全不选");
    	}
    }
</script>
<style>
.arrange li{width:75px; overflow:hidden;height:18px;}
.searchbtn{ background:url('/theme/default/images/icon/search.png') no-repeat;padding:0 12px; margin-left:5px}
.searchbtn:hover{background:url('/theme/default/images/icon/search-hover.png') no-repeat;}

#test_li { display: block; margin-left: -30px; margin:0; width: 250px;}  
#test_li li { border: 0 none; cursor: pointer; list-style-type: none; overflow: hidden; width: 250px;}
#test_li li a {  display: block; height: 20px; width: 250px;}
#test_li li a:hover{ background-color:#99CCFF;}

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
		<form class="form-inline span6" action="/cyzt_rolemanager/rolelist.candor" method="GET" id="searchrole" target="leftFrame">
			角色名称&nbsp;<input type="text" class="input-large gray radius" id="name" name="name">
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
				
					<div class="row-fluid">
						<fieldset>
						<legend>当前角色</legend>
							<p>角色名称：<?=$roleInfo['name']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;角色别名：<?=$grouplist['alias']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;说明：<?=$roleInfo['note']?></p>
							
						</fieldset>	
					</div>
					<div class="row-fluid">
						
						<div class="span8">
						<form class="form-horizontal" id="opform" name="opform" action="/cyzt_rolemanager/rightsGive.candor?act=save" method="POST">
						<input type="hidden" name="id" id="id" value="<?=$roleInfo['id']?>">
						<fieldset>
						<legend>用户列表</legend>
							<div class="wrap-sl">
								<div class="wrap-sl-header">
								<table border="0" cellpadding="0" cellspacing="0" >
									<tr>
										<!--td>单位&nbsp;</td>
										<td><input type="text" class="span2" id="searchvalue" name="orgname" value=""-->
									&nbsp;隶属&nbsp;<span id="searchorgstruct"><?=$orgSelect?></span>
									用户名&nbsp;<input type="text" class="span2" id="user_name" name="user_name" value="" placeholder="所有用户">&nbsp;
									<!-- <button type="submit" id="getPerson" class="btn disabled" ><i class="icon-search"></i>搜索</button> -->
									<a href="javascript:void(0)" onclick="getPersonById()" class="searchbtn" >&nbsp;</a>
									<a href="javascript:void(0)" onclick="selectAll(this)" class="" >全选</a>
									</td>
									</tr>
									<tr valign="top">
										<td>&nbsp;</td>
										<td><div id="div1" style="background-color:White; width:252px; border:1px solid #999999; display:none; position: absolute;"></div></td>
									</tr>
								</table>	
									<!--button type="button" class="btn btn-primary" onclick="getPersonById()">搜索</button-->
								</div>
								<div class="wrap-sl-content" style="overflow:auto;height:250px;">
									<ul class="unstyled arrange" id="showUser">
									<!--li><input type="checkbox" rel="王江" name="ids" value="wanggang" onclick="adduser(this,'wanggang','王江');" checked="checked"/>王江</li>
									<li><input type="checkbox" rel="刘雨潇" name="ids" value="liuyuxiao" onclick="adduser(this,'liuyuxiao','刘雨潇');" checked="checked"/>刘雨潇</li-->
									</ul>
								</div>
							</div>
							<div class="wrap-sl light-purple">
									<div class="wrap-sl-header gray-blue">
										<p><!--span class="label label-info">说明</span-->&nbsp;授权该角色的用户信</p>
									</div>
									<div class="wrap-sl-content" style="overflow:auto;height:250px;">
										<ul class="unstyled arrange" id="selectedUser" style="padding:0 5px;">
										</ul>
									</div>
								</div>
						</fieldset>
						</form>
						</div>
						<div class="span4">
							<fieldset>
							<legend>角色权限</legend>
								 <div class="wrap-sl-content">
								  <div id="tree3"></div> 
								  <!--
								  <div>叶子节点: <span id="echoSelection3">-</span></div> 
								  <div>根节点: <span id="echoSelectionRootKeys3">-</span></div> 
								  <div>Selected root nodes: <span id="echoSelectionRoots3">-</span></div> 
								  -->	
								</div>
							</fieldset>
						</div>
					</div>
			</div>
		</div><!-- row-fluid end -->
	</div>
</div>
</body>
</html>
