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
<title>模块管理</title>
</head>
<link rel='stylesheet' href='/js/plugins/jquery.layout/layout-default-latest.css' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/cdrstyle.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/style.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/page.css';?>' type='text/css' media='screen' />
<script src="/js/jquery-1.8.3.min.js" ></script>
<script src="/js/candor.common.js"></script>
<script src="/js/plugins/jquery.cookie.js" type="text/javascript"></script>
<script src="/js/jquery-ui.custom.min.js" type="text/javascript"></script>
<script src="/js/plugins/jquery.layout/jquery.layout-latest.js" type="text/javascript"></script>
<script src="/js/plugins/candor-dropdown.js" type="text/javascript"></script> 
<script type="text/javascript">
	var myLayout; // a var is required because this page utilizes: myLayout.allowOverflow() method
	$(document).ready(function () {
		myLayout = $('body').layout({
			//north__closable:false,//可以被关闭     
			//north__resizable:false,//可以改变大小    
			//north__size:40,//pane的大小
			//north__spacing_open:			0,			// space between pane and adjacent panes - when pane is 'open'
			//north__spacing_closed:			0,			// ditto - when pane is 'closed'
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
</script>
<style>
.title{height:30px;line-height:30px;width:100%;background:#E7F5FF;border-top:#FFFFFF solid 1px;border-bottom:#FFFFFF solid 1px}
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
<body style="height:800px">
	<!--div class="ui-layout-north" style="padding:0; border-top:none; border-bottom:none;overflow:visible;">
		<div id="search_content">
			<div id="search_frist_spacer">
				<form class="form-inline span6" action="/cyzt_companylist/companytree.candor" method="POST" target="leftFrame">
					单位名称:<input type="text" class="input-large gray radius" id="input01" name="orgname">
					<button class="btn" type="submit"><i class="icon-search"></i>搜索</button>
				</form>
				<div class="btn-toolbar span6" id="operateBar">
					 <div class="btn-group">
					  <button data-toggle="dropdown" class="btn dropdown-toggle">新增 <span class="caret"></span></button>
					  <ul class="dropdown-menu">
						<li><a href="/cyzt_companylist/addcompany.candor?type=company" target="mainFrame">新增单位</a></li>
						<li><a href="/cyzt_companylist/adddepartment.candor?type=company" target="mainFrame">新增部门</a></li>
						<li><a href="/cyzt_companylist/addjob.candor?type=depart" target="mainFrame">新增岗位</a></li>
						<li class="divider"></li>
						<li><a href="/cyzt_companylist/addperson.candor?type=depart&orgid=100&companyid=99&parentid=99&option=edit&" target="mainFrame">新增人员</a></li>
					  </ul>
					</div><!- /btn-group ->
					<div class="btn-group">
					<a href="javascript:;" class="btn disabled" id="edit">编辑</a>&nbsp;
					</div>
					<div class="btn-group">
					<a href="javascript:;" class="btn disabled" id="cancel">取消</a>&nbsp;
					</div>
					<div class="btn-group">
					<a href="javascript:;" class="btn disabled" id="save"><i class="icon-check"></i>保存</a>&nbsp;&nbsp;
					</div>
				</div><!- /btn-toolbar ->
			</div>
			<div id="search_shadow"></div>
		</div>
	</div-->
	
	<iframe id="leftFrame" name="leftFrame" class="ui-layout-west" width="100%" height="800" frameborder="0" scrolling="auto" src="/admin_module/projectList.candor" style="border-right:solid 1px #96A4B1;border:none;"></iframe>
	
	<iframe id="mainFrame" name="mainFrame" class="ui-layout-center" width="100%" height="800" frameborder="0" scrolling="auto" src="/admin_module/addModule.candor" style="border-left:solid 1px #96A4B1;border:none;"></iframe>
	
</body>
</html>
