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
<title>Css+Html前端框架</title>
</head>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/cdrstyle.css';?>' type='text/css' media='screen' />
<style>
body{ background:none}

</style>
<script src="/js/jquery-1.8.3.min.js" ></script>
<script>
function infoTab(title,url){
	var na=parseInt(Math.random()*(20-11+1) + 11); 
	var tabWinC = '<iframe src="'+url+'" width="100%" height="100%" frameborder="0"></iframe>';
	window.top.tab_panel.addTab({id:"infoTab_"+na, 
						  title:title,
						  html:tabWinC,
						  closable: true, 
						  disabled:false
					   });
}
</script>
<body style="margin-top:5px;">	
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span2">
			<ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="/demo/apiJs" target="sys_main">Js开发帮助</a></li>
		  </ul>
		  </div>

		<div class="span10">
			<iframe style="width: 100%; " scrolling="no" onunload="this.height=780;" frameborder="0" id="sys_main" name="sys_main"
				src="/demo/apiJs">您的浏览器不支持此功能，请您使用最新的版本。</iframe>
		</div>

	</div>
</div>

	
</body>
</html>
 <script language="JavaScript" type="text/javascript">
$(document).ready(function(){
	$(".nav li").each(function(i){
		$(this).click(function(){
			$(this).siblings().removeClass("active");
			$(this).addClass("active");
		})
	});
})

$(window.parent).scroll(function(){$('.span2').css('margin-top', $(window.parent.document).scrollTop());});
 
function NT_Scrolliframe()
{
	document.body.scrollTop=0;
}
var resizeflag='1';

function NT_iframeResize()
{  
	var dyniframe   = null;
	var indexwin    = null;

	if (document.getElementById)
	{
		dyniframe       = document.getElementById("sys_main");
		indexwin        = window;
		if (dyniframe)
		{
			if(resizeflag=='0'){resizeflag='1';dyniframe.height="800";return false}
			if (dyniframe.contentDocument){
				dyniframe.height = dyniframe.contentDocument.body.scrollHeight + 1700;
			}
			else if (dyniframe.document && dyniframe.document.body.scrollHeight)
			{
				iframeheight	= sys_main.document.body.scrollHeight + 1700;
				dyniframe.height = iframeheight;
 
			}
		}
	}
}

if (window.addEventListener)
window.addEventListener("load", NT_iframeResize, false)
else if (window.attachEvent)
window.attachEvent("onload", NT_iframeResize)
else
window.onload=NT_iframeResize
</script>
