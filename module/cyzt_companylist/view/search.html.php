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
<script src="/js/plugins/candor-dropdown.js" type="text/javascript"></script> 
<script type="text/javascript">
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
<div id="search_content" style="position:fixed">
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
