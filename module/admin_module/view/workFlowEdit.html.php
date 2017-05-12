<?php
/**
 * Html模板文件
 *
 * @copyright   Copyright: 2012
 * @author      LuoDong<751450467@qq.com>
 * @package     CandorPHP
 * @version     : index.html.php,v 1.4 2012/06/16 21:54:23 ld Exp $
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $header; ?></title>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/cdrstyle.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/style.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/page.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='/js/plugins/jquery.layout/layout-default-latest.css' type='text/css' media='screen' />
<script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/js/plugins/artDialog/artDialog.source.js?skin=default" type="text/javascript"></script>
<script src="/js/plugins/artDialog/plugins/iframeTools.js" type="text/javascript"></script>

<script src="/js/jquery-ui.custom.min.js" type="text/javascript"></script>
<script src="/js/plugins/jquery.layout/jquery.layout-latest.js" type="text/javascript"></script>
</head>
<script>
var flowid=<?=$flowid?>;

var myLayout; // a var is required because this page utilizes: myLayout.allowOverflow() method
	$(document).ready(function () {
		myLayout = $('body').layout({
			north__closable:false,//可以被关闭     
			north__resizable:false,//可以改变大小    
			north__size:40,//pane的大小
			north__spacing_open:			0,			// space between pane and adjacent panes - when pane is 'open'
			north__spacing_closed:			0,			// ditto - when pane is 'closed'
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
</script>
<body>
<div class="ui-layout-north" style="padding:0; border-top:none; border-bottom:none;overflow:visible;">
	<div id="search_content">
		<div id="search_frist_spacer">
			<div class="btn-toolbar span6">
				<a href="/admin/workFlowList" class="btn">流程管理</a>
				<a href="#" class="btn" onclick="markG.dialog('/admin/workFlowAddDialog','流程信息管理')">新建流程</a>
			</div>
		</div>
		<div id="search_shadow"></div>
	</div>
</div>

<iframe class="ui-layout-center" width="100%" height="100%" frameborder="0" src="/js/JGraph/processeditor.html"></iframe>

</body>
</html>