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
<link rel='stylesheet' href='/js/plugins/jquery.layout/layout-default-latest.css' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/cdrstyle.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/style.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/page.css';?>' type='text/css' media='screen' />
<script src="/js/jquery-1.8.3.min.js" ></script>
<script src="/js/candor.common.js"></script>
<script src="/js/jquery.cookie.js" type="text/javascript"></script>
<script src="/js/jquery-ui.custom.min.js" type="text/javascript"></script>
<script src="/js/plugins/jquery.layout/jquery.layout-latest.js" type="text/javascript"></script>
<script src="/js/plugins/candor-dropdown.js" type="text/javascript"></script> 
<script type="text/javascript">
	var myLayout; // a var is required because this page utilizes: myLayout.allowOverflow() method
	$(document).ready(function () {
		myLayout = $('body').layout({
			north__closable:false,//可以被关闭     
			north__resizable:false,//可以改变大小    
			north__size:40,//pane的大小
			north__spacing_open:			0,			// space between pane and adjacent panes - when pane is 'open'
			north__spacing_closed:			0,			// ditto - when pane is 'closed'
			west__size:					300,
			west__closable:false,//可以被关闭     
			west__resizable:false,//可以改变大小  
			west__spacing_open:			0,			// space between pane and adjacent panes - when pane is 'open'
			west__spacing_closed:			0,			// ditto - when pane is 'closed'
			//west__spacing_closed:		20,
			//west__togglerLength_closed:	100,
			//west__togglerAlign_closed:	"top",
			//west__togglerContent_closed:"更<BR>多<BR>信<BR>息",
			//west__togglerTip_closed:	"Open & Pin Menu",
			//west__sliderTip:			"Slide Open Menu",
			//west__slideTrigger_open:	"mouseover",
			center__maskContents:		true // IMPORTANT - enable iframe masking
		});
		$(".ui-layout-north").css("z-index","100");
	});

	function refreshtree(pid){
		document.frames("leftFrame").src="http://www.baidu.com"; 
	}
	function changeformaction(obj){
		var searchtype = $(obj).val();
		if(searchtype=='company'){
			$("#searchform").attr("action","/cyzt_companylist/companytree.candor");
			$("#searchform").attr("target","leftFrame");
			$("#input01").attr("name","orgname");
		}else{
			$("#searchform").attr("action","/cyzt_companylist/searchuser.candor");
			$("#searchform").attr("target","mainFrame");
			$("#input01").attr("name","searchuser");
		}
	}


	function deldialog1(orgid,parentid,flag,stype){
		art.dialog({
			content: '确实要删除该内容?',
			ok: function () {				
				$("#mainFrame").attr("src","/cyzt_companylist/removePerson.candor?act=del&orgid="+orgid+"&parentid="+parentid+"&flag="+flag+"&type="+stype);
				return true;				
			},
			cancelVal: '关闭',
			cancel: true //为true等价于function(){}
		});
	}
</script>
<style>
.title{height:30px;line-height:30px;width:100%;background:#E7F5FF;}
.title img{padding:0 5px 0 10px;}
.title span{font-size:14px;font-weight:bold}

.filetree{padding-left:5px;}
.filetree span.company {
    background: url("/theme/img/icon/company.png") no-repeat scroll 0 0 transparent;
}

.filetree li.expandable span.company {
    background: url("/theme/img/icon/company.png") no-repeat scroll 0 0 transparent;
}

.filetree span.folder {
    background: url("/theme/img/icon/department.png") no-repeat scroll 0 0 transparent;
}

.filetree li.expandable span.folder {
    background: url("/theme/img/icon/department.png") no-repeat scroll 0 0 transparent;
}

.filetree span.file {
    background: url("/theme/img/icon/job.png") no-repeat scroll 0 0 transparent;
}


</style>
<body>
	<div class="ui-layout-north" style="padding:0; border-top:none; border-bottom:none;overflow:visible;">
		<div id="search_content">
			<div id="search_frist_spacer">
				<form class="form-inline span6" action="/cyzt_companylist/companytree.candor" method="POST" target="leftFrame" id="searchform">
				<select style="width:80px;border:1px solid #CCCCCC;" onchange="changeformaction(this);">
					<option value="company">单位名称</option>
					<option value="user">按姓名搜索</option>
				</select>
					<input type="text" class="input gray radius" id="input01" name="orgname">
					<button class="btn" type="submit" onclick="javascript:document.forms.searchform.submit();"><i class="icon-search"></i>搜索</button>
				</form>
				<div class="btn-toolbar span6" id="operateBar">
					 <div class="btn-group">
					  <button data-toggle="dropdown" class="btn dropdown-toggle" id="add">新增 <span class="caret"></span></button>
					  <ul class="dropdown-menu">
						<li><a href="/cyzt_companylist/addcompany.candor?type=company&orgid=0&p=1" target="mainFrame">新增单位</a></li>
						<li><a href="/cyzt_companylist/addcompany.candor" target="mainFrame">新增子单位</a></li>
						<li><a href="/cyzt_companylist/adddepartment.candor" target="mainFrame">新增部门</a></li>
						<li><a href="/cyzt_companylist/addjob.candor" target="mainFrame">新增岗位</a></li>
						<li class="divider"></li>
						<li><a href="/cyzt_companylist/addperson.candor?type=depart&orgid=100&companyid=99&parentid=99&option=edit&" target="mainFrame">新增人员</a></li>
					  </ul>
					</div><!-- /btn-group -->
					<div class="btn-group">
					<a href="javascript:;" class="btn" id="edit"><i class="icon-edit"></i>编辑</a>&nbsp;
					</div>
					<div class="btn-group">
					<a href="javascript:;" class="btn" id="cancel"><i class="icon-share"></i>取消</a>&nbsp;
					</div>
					<div class="btn-group">
					<a href="javascript:;" class="btn" id="save"><i class="icon-check"></i>保存</a>&nbsp;&nbsp;
					</div>
				</div><!-- /btn-toolbar -->
			</div>
			<div id="search_shadow"></div>
		</div>
	</div>
	
	<?php include 'companytree.html.php';?>
	
	<iframe id="mainFrame" name="mainFrame" class="ui-layout-center" width="100%" height="500" frameborder="0" scrolling="auto" src="/cyzt_companylist/userlist.candor?type=company&opt=view&orgid=<?=$firstorgid?>" style="border-left:solid 1px #96A4B1;border:none;"></iframe>
	
</body>
</html>