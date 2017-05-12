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
<style>
.ui-layout-west {
    height: 100%;
    overflow-y:none;
    position: fixed;
    width: 270px;
    z-index: 100;
	margin-top:40px;
	overflow: hidden;
}

.ui-layout-center {
    margin-top: 0;
	overflow:none;
	height:100%;
}

</style>
<body>
	<div class="ui-layout-west" tabindex="5000">
		<iframe id="leftFrame" name="leftFrame" width="100%" height="100%" frameborder="0" scrolling="no" src="/cyzt_companylist/companyTree.candor?type=company&opt=view&orgid=<?=$first_company["id"]?>" style="border-left:solid 1px #96A4B1;border:none;"></iframe>
	</div>
	
	<div class="ui-layout-center">
		<!-- <iframe id="mainFrame" name="mainFrame" width="100%" height="100%" frameborder="0" scrolling="yes" src="/cyzt_companylist/userList.candor?type=company&opt=view&orgid=<?=$firstorgid?>" style="border-left:solid 1px #96A4B1;border:none;"></iframe> -->
		<iframe id="mainFrame" name="mainFrame" width="100%" height="100%" frameborder="0" scrolling="yes" src="/cyzt_companylist/editCompany.candor?type=company&org_id=<?=$first_company["org_id"]?>&parent_id=<?=$first_company["parent_id"]?>" style="border-left:solid 1px #96A4B1;border:none;"></iframe>		
	</div><!--end-->
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
