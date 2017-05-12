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
<script src="/js/plugins/artDialog/artDialog.source.js?skin=default"></script>
<script src="/js/plugins/artDialog/jquery.artDialog.source.js?skin=default" type="text/javascript"></script>
<script src="/js/plugins/artDialog/plugins/iframeTools.js" type="text/javascript"></script>
<script src="/js/candor.common.js"></script>
<script src="/js/plugins/candor-tab.js" ></script>
<script src="/js/plugins/datepicker/WdatePicker.js" ></script><!--时间控件JS-->
<script src="/js/jquery-ui.custom.min.js" type="text/javascript"></script>
<script src="/js/jquery.cookie.js" type="text/javascript"></script>
<script src='/js/plugins/jquery.dynatree/jquery.dynatree.js' type="text/javascript"></script> 
<style>
blockquote small:before {
    content: " ";
}
.arrange li{width:130px;overflow:hidden;height:18px;}
.inputnoborder{width:110px;border:0;}
.searchbtn{ background:url('/theme/default/images/icon/search.png') no-repeat;padding:0 12px; margin-left:5px}
.searchbtn:hover{background:url('/theme/default/images/icon/search-hover.png') no-repeat;}

#tree3{height:454px;overflow-y:scroll; background:#FFFFFF}
</style>
<body>
<div class="container-fluid">
	<div class="tabbable">
		
		<div class="tab-content">
				
			<div class="tab-pane" id="2" style="display:block;">	                
				<div class="row-fluid">
					<fieldset>
						<legend>用户信息</legend>
						<div class="row-fluid">
							<table style="margin-top:10px;margin-bottom:10px;" class="table table-bordered table-striped">
					<thead>
					  <tr>
							<th>序号</th>
							<th>用户标识符</th>
							<th>姓名</th>
							<th>登录名</th>
							<th>职务</th>
							<th>单位</th>
							<th>部门</th>
							<th>操作</th>
					  </tr>
					</thead>
					<tbody>
						<?php foreach($userlist as $key=>$item){?>
						<tr>
							<td class="span1"><input type="checkbox"/><?=$item['ROW_ID']?></td>
							<td align="right"><a href="/cyzt_companylist/editperson.candor?option=view&orgid=<?=$item['ID']?>&parentid=<?if (!empty($item['POSTSORGID'])){echo $item['POSTSORGID'];}else if(!empty($item['DEPARTORGID'])) {echo $item['DEPARTORGID'];}else{echo $item['ORGID'];}?>" target="mainFrame"><?=$item['USER_NAME']?></a></td>
							<td align="right"><?=$item['TRUENAME']?></td>
							<td align="right"><?=$item['LOGIN_ID']?></td>
							<td align="right"><?=$item['PLACE']?></td>
							<td align="right"><?=$item['FULLNAME']?></td>
							<td align="right"><?=$item['DEPART']?></td>
							<td align="right"><a href="/cyzt_companylist/editperson.candor?option=edit&orgid=<?=$item['ID']?>&parentid=<?if (!empty($item['POSTSORGID'])){echo $item['POSTSORGID'];}else if(!empty($item['DEPARTORGID'])) {echo $item['DEPARTORGID'];}else{echo $item['ORGID'];}?>&stype=<?if (!empty($item['POSTSORGID'])){echo 'job';}else if(!empty($item['DEPARTORGID'])) {echo 'depart';}else{echo 'company';}?>&searchkeyword=<?=$searchkeyword?>" target="mainFrame">编辑</a>&nbsp;|&nbsp;<a href="/cyzt_companylist/removePerson.candor?orgid=<?=$item['ID']?>&parentid=<?if (!empty($item['POSTSORGID'])){echo $item['POSTSORGID'];}else if(!empty($item['DEPARTORGID'])) {echo $item['DEPARTORGID'];}else{echo $item['ORGID'];}?>&type=<?if (!empty($item['POSTSORGID'])){echo 'job';}else if(!empty($item['DEPARTORGID'])) {echo 'depart';}else{echo 'company';}?>&isactive=<?=$item['ISACTIVE']?>&flag=<?=$item['FLAG']?>&searchkeyword=<?=$searchkeyword?>" target="mainFrame"><?if ($item['ISACTIVE']=='是'){echo '停用';} else { echo '启用';}?></a>&nbsp;|&nbsp;<a  href="javascript:if(confirm('确实要删除该内容吗?'))location='/cyzt_companylist/removePerson.candor?act=del&orgid=<?=$item['ID']?>&parentid=<?if (!empty($item['POSTSORGID'])){echo $item['POSTSORGID'];}else if(!empty($item['DEPARTORGID'])) {echo $item['DEPARTORGID'];}else{echo $item['ORGID'];}?>&type=<?if (!empty($item['POSTSORGID'])){echo 'job';}else if(!empty($item['DEPARTORGID'])) {echo 'depart';}else{echo 'company';}?>&flag=<?=$item['FLAG']?>&searchkeyword=<?=$searchkeyword?>'" target="mainFrame" >删除</a>&nbsp;|&nbsp;<a href="/cyzt_companylist/editperson.candor?option=edit&orgid=<?=$item['ID']?>&parentid=<?if (!empty($item['POSTSORGID'])){echo $item['POSTSORGID'];}else if(!empty($item['DEPARTORGID'])) {echo $item['DEPARTORGID'];}else{echo $item['ORGID'];}?>&tabselect=tab3&stype=<?if (!empty($item['POSTSORGID'])){echo 'job';}else if(!empty($item['DEPARTORGID'])) {echo 'depart';}else{echo 'company';}?>&searchkeyword=<?=$searchkeyword?>">授权</a>&nbsp;|&nbsp;<a href="/cyzt_companylist/editperson.candor?option=edit&orgid=<?=$item['ID']?>&parentid=<?if (!empty($item['POSTSORGID'])){echo $item['POSTSORGID'];}else if(!empty($item['DEPARTORGID'])) {echo $item['DEPARTORGID'];}else{echo $item['ORGID'];}?>&tabselect=tab4&stype=<?if (!empty($item['POSTSORGID'])){echo 'job';}else if(!empty($item['DEPARTORGID'])) {echo 'depart';}else{echo 'company';}?>&searchkeyword=<?=$searchkeyword?>">权限范围</a></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
						</div>
					 </fieldset>
				</div><!-- row end -->
			</div>
		</div><!--tab-content end-->
    </div>
	<!--<button class="btn" onclick="alert_msg('loading','请等待...')">加载等待</button>
	<button class="btn" onclick="alert_msg('succeed','成功提示')">成功提示</button>
	<button class="btn" onclick="alert_msg('error','失败提示')">失败提示</button>
	
	<div class="row-fluid"><h2>公司管理-新增用户</h2></div>
	<div class="row-fluid">
		
	</div><!-- row-fluid end -->

</div>	
</body>
</html>
