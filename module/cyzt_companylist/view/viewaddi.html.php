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
<title>附件信息</title>
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

<body>

<div class="container-fluid"> 
	<div class="row-fluid">
		<div class="wrap-sl"  style="height:360px;">
			<div> <img width="355" src="<?=$filepath?>"/></div>
		 </div>	
	</div>
</div>

</body>
</html>