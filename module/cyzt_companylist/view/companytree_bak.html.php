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
<title>人员管理</title>
</head>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/cdrstyle.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/style.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/page.css';?>' type='text/css' media='screen' />
<link rel="stylesheet" href="/js/plugins/jquery.treeview/jquery.treeview.css" />
<script src="/js/jquery-1.8.3.min.js" ></script>
<script src="/js/candor.common.js"></script>
<script src="/js/jquery.cookie.js" type="text/javascript"></script>
<script src="/js/plugins/jquery.treeview/jquery.treeview.js" type="text/javascript"></script>
<script src="/js/plugins/jquery.treeview/jquery.treeview.edit.js" type="text/javascript"></script>
<script src="/js/plugins/jquery.treeview/jquery.treeview.async.js" type="text/javascript"></script>
<script src="/js/plugins/jquery.contextMenu/jquery.contextmenu.r2-min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function () {
		renderTree();
		changeSelectStyle();
	});
	
	function renderTree(){
		var objtree = $("#browser").treeview({
			animated: "fast",
            collapsed: true,control:"#sidetreecontrol",
			url: "/cyzt_companylist/ajaxGetCyOrgList.php",
			ajax: {
				complete:function(){
					addContentMenu();
					changeSelectStyle();
				}
			}
		});
		//var current = $('ul.treeview').find("a").filter(function() {return this.href.toLowerCase() == location.href.toLowerCase(); });
		//current.parent().addClass("selected").end().addClass("selected").parents("ul, li").add( current.next() ).show();
		addContentMenu();
	}
	
	function expendNode(id){
		//$.cookie("cookie_expendNode","#"+id); 
		$('#sidetreecontrol a:eq(1)').click();    
	}
	
	function addNode(pid,id,companyid,type,title){
		
		var _type = type;
		if(type=='job')_type = 'file';
		if(type=='department')_type = 'folder';
		var branches = $("<li id='"+id+"' orgid='"+id+"' companyid='"+companyid+"' type='"+type+"'><span class='"+_type+"'>"+title+"</span></li>").appendTo("#"+pid);
		$("#browser").treeview({
			add: branches
		});
		renderTree();
	}
	
	function changeSelectStyle(){
		$("#browser").find("a").each(function(i){
			$(this).click(function(){
				$("#browser").find("a").each(function(i){
					$(this).css("color","#384F67");
				});
				$(this).css("color","red");
			});
		});
	}
</script>
<style>
a{cursor: pointer}
.title{height:36px;line-height:36px;width:100%;/*background:#E7F5FF;border-top:#FFFFFF solid 1px;border-bottom:#FFFFFF solid 1px;*/background:#5CC7FF;}
.title img{padding:0 5px 0 10px;}
.title span{font-size:14px;font-weight:bold}

.filetree{padding-left:5px;}
.filetree span.company {
    background: url("/theme/default/images/icon/company.png") no-repeat scroll 0 0 transparent;
}

.filetree li.expandable span.company {
    background: url("/theme/default/images/icon/company.png") no-repeat scroll 0 0 transparent;
}

.filetree span.folder {
    background: url("/theme/default/images/icon/department.png") no-repeat scroll 0 0 transparent;
}

.filetree li.expandable span.folder {
    background: url("/theme/default/images/icon/department.png") no-repeat scroll 0 0 transparent;
}

.filetree span.file {
    background: url("/theme/default/images/icon/job.png") no-repeat scroll 0 0 transparent;
}
.refresh{background:url("/theme/default/images/icon/refresh.png") no-repeat;padding:16px 16px; margin-top:3px; float:right; margin-right:10px;}
.refresh:hover{background:url("/theme/default/images/icon/refresh_action.png") no-repeat;}
.add{background:url("/theme/default/images/icon/add.png") no-repeat;padding:16px 16px; margin-top:3px; float:right; margin-right:2px;}
.add:hover{background:url("/theme/default/images/icon/add_hover.png") no-repeat;}
</style>
<body>
	<div class="ui-layout-west">
		<div class="row-fluid" style="height: 105px;">
			<div style="float:left;width:64px;margin:20px 0 0 50px" ><img src="/images/app_icons/<?php echo $this->app->config->module->icon; ?>" width="64"></div>
			<div class="fcolor_one f_16 f_bold" style="float:left; margin:47px 0 0 10px"><h3><?php echo $this->app->config->module->name; ?></h3></div>
		</div>
		<div class="title">
			<a href="javascript:window.location.reload()" title="刷新" class="refresh"></a>
			<a href="/cyzt_companylist/addcompany.candor?type=company&orgid=0&p=1" target="mainFrame" class="add" title="新增公司"></a>
			<img width="8" height="11" src="/theme/default/images/trigon_white_down.png" border="0" />
			<span>组织管理</span>
			<a style="margin-left:20px;color:#FFFFFF" title="角色管理" onclick="frameWorkTab('app_6','角色管理','/cyzt_rolemanager/index.candor?app=CripService&flowid=1')" href="javascript:;">角色管理&raquo;</a>	
		</div>
		<div style="height:20px;padding:3px 0 0 5px;background:#E6E6E6">
			<div style="float:left"><img border=0 src="/theme/default/images/icon/organize.png" style="vertical-align:baseline">组织机构</div>
			<div id="sidetreecontrol" style="float:left; margin-left:20px"> <a href="?#">关闭</a> | <a href="?#">展开</a></div>
		</div>
		<div style="height:400px; width:100%; overflow:auto; background:#FFFFFF">
			<ul id="browser" class="filetree">
				<? foreach ($companylist as $key=>$value){?>
				<li id="<?=$value['ID']?>" orgid="<?=$value['ID']?>" type="company" companyid="<?=$value['COMPANYID']?>" class="hasChildren">
					<span class="company"><a href="/cyzt_companylist/userlist.candor?type=company&opt=view&orgid=<?=$value['ID']?>" target="mainFrame"><?=$value['ORGNAME']?></a></span>
					<ul>
						<li><span class="placeholder">&nbsp;</span></li>
					</ul>
				</li>
				<?}?>
			</ul>
		</div>
		<div style="height:14px;width:100%; background:url('/theme/default/images/bot_shadow.png') no-repeat"></div>
	</div>
	<div class="contextMenu" id="companyMenu" style="display:none;">
        <ul>
			<li id="editcompany"><img src="/theme/default/images/icon/organize.png" />编辑单位</li>
			<li id="delcompany"><img src="/theme/default/images/icon/organize.png" />删除单位</li>
            <li id="addcompany"><img src="/theme/default/images/icon/organize.png" />添加子单位</li>
            <li id="adddepartment"><img src="/theme/default/images/icon/organize.png" />添加部门</li>
            <li id="addperson"><img src="/theme/default/images/icon/organize.png" />添加人员</li>
        </ul>
    </div>
	<div class="contextMenu" id="departmentMenu" style="display:none;">
        <ul>
            <li id="editdepartment"><img src="/theme/default/images/icon/organize.png" />编辑部门</li>
			<li id="deldepartment"><img src="/theme/default/images/icon/organize.png" />删除部门</li>
            <li id="adddepartment"><img src="/theme/default/images/icon/organize.png" />添加部门</li>
			<li id="addjob"><img src="/theme/default/images/icon/organize.png" />添加岗位</li>
            <li id="addperson"><img src="/theme/default/images/icon/organize.png" />添加人员</li>
        </ul>
    </div>
	<div class="contextMenu" id="jobMenu" style="display:none;">
        <ul>
            <li id="editjob"><img src="/theme/default/images/icon/organize.png" />编辑岗位</li>
			 <li id="deljob"><img src="/theme/default/images/icon/organize.png" />删除岗位</li>
            <li id="addperson"><img src="/theme/default/images/icon/organize.png" />添加人员</li>
        </ul>
    </div>
</body>
</html>
<script>
function addContentMenu(){
	$('#browser li').each(function(i){
		var type = $(this).attr('type');
		if(type=='company'){
			$(this).contextMenu('companyMenu',{
				bindings: {
					'editcompany': function (t) {
						 parent.document.getElementById("mainFrame").src = "/cyzt_companylist/userlist.candor?type=company&orgid=" + $(t).attr('orgid')+"&companyid="+$(t).attr('companyid')+"&parentid="+$(t).attr('parentid');
					},
					'delcompany': function (t) {
						 parent.document.getElementById("mainFrame").src = "/cyzt_companylist/editcompany.candor?type=company&action=del&orgid=" + $(t).attr('orgid')+"&companyid="+$(t).attr('companyid')+"&parentid="+$(t).attr('parentid');
					},
					'addcompany': function (t) {
						parent.document.getElementById("mainFrame").src = "/cyzt_companylist/addcompany.candor?type=company&orgid=" + $(t).attr('orgid')+"&companyid="+$(t).attr('companyid')+"&parentid="+$(t).attr('parentid');
					},
					'adddepartment': function (t) {
						parent.document.getElementById("mainFrame").src = "/cyzt_companylist/adddepartment.candor?type=company&orgid=" + $(t).attr('orgid')+"&companyid="+$(t).attr('companyid')+"&parentid="+$(t).attr('parentid');
					},
					'addperson': function (t) {
						parent.document.getElementById("mainFrame").src = "/cyzt_companylist/addperson.candor?type=company&orgid=" + $(t).attr('orgid')+"&companyid="+$(t).attr('companyid')+"&parentid="+$(t).attr('parentid')+"&option=edit&";
					}
				}
			});
		}//添加公司菜单
		if(type=='folder'){
			$(this).contextMenu('departmentMenu',{
				bindings: {
					'editdepartment': function (t) {
						 parent.document.getElementById("mainFrame").src = "/cyzt_companylist/userlist.candor?type=depart&orgid=" + $(t).attr('orgid')+"&companyid="+$(t).attr('companyid')+"&parentid="+$(t).attr('parentid');
					},
					'deldepartment': function (t) {
						 parent.document.getElementById("mainFrame").src = "/cyzt_companylist/editdepartment.candor?type=depart&action=del&orgid=" + $(t).attr('orgid')+"&companyid="+$(t).attr('companyid')+"&parentid="+$(t).attr('parentid');
					},
					'adddepartment': function (t) {
						parent.document.getElementById("mainFrame").src = "/cyzt_companylist/adddepartment.candor?type=depart&orgid=" + $(t).attr('orgid')+"&companyid="+$(t).attr('companyid')+"&parentid="+$(t).attr('parentid');
					},
					'addjob': function (t) {
						parent.document.getElementById("mainFrame").src = "/cyzt_companylist/addjob.candor?type=depart&orgid=" + $(t).attr('orgid')+"&companyid="+$(t).attr('companyid')+"&parentid="+$(t).attr('parentid');
					},
					'addperson': function (t) {
						parent.document.getElementById("mainFrame").src = "/cyzt_companylist/addperson.candor?type=depart&orgid=" + $(t).attr('orgid')+"&companyid="+$(t).attr('companyid')+"&parentid="+$(t).attr('parentid')+"&option=edit&";
					}
				}
			});
		}//添加部门菜单
		if(type=='file'){
			$(this).contextMenu('jobMenu',{
				bindings: {
					'editjob': function (t) {
						parent.document.getElementById("mainFrame").src = "/cyzt_companylist/userlist.candor?type=job&orgid=" + $(t).attr('orgid')+"&companyid="+$(t).attr('companyid')+"&parentid="+$(t).attr('parentid');
					},
					'deljob': function (t) {
						parent.document.getElementById("mainFrame").src = "/cyzt_companylist/editjob.candor?type=job&action=del&orgid=" + $(t).attr('orgid')+"&companyid="+$(t).attr('companyid')+"&parentid="+$(t).attr('parentid');
					},
					'addperson': function (t) {
						parent.document.getElementById("mainFrame").src = "/cyzt_companylist/addperson.candor?type=job&orgid=" + $(t).attr('orgid')+"&companyid="+$(t).attr('companyid')+"&parentid="+$(t).attr('parentid')+"&option=edit&";
					}
				}
			});
		}//添加岗位菜单
	});
}

</script>
