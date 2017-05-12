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
			<li class="active"><a href="/demo/baseui" target="sys_main">基础css</a></li>
			<li><a href="/demo/baselayout" target="sys_main">布局</a></li>
			<li><a href="/demo/uilist" target="sys_main">列表布局</a></li>
			<li><a href="/demo/basecomponent" target="sys_main">组件</a></li>
			<li><a href="/demo/baseplug" target="sys_main">javascript插件</a></li>
			<li><a href="/demo/uiexp" target="sys_main" onclick="infoTab('NormalPage','/demo/uiexp');">UI布局实例</a></li>
			<li><a href="/demo/uitabpage" onclick="infoTab('TabPage','/demo/uitabpage')">TabPage页面实例</a></li>
			<li><a href="/demo/uidividepage" onclick="infoTab('DividePage','/demo/uidividepage')">DividePage页面实例</a></li>
			<li><a href="/demo/validate" onclick="infoTab('DividePage','/demo/validate')">validate表单验证</a></li>
		  </ul>
		  </div>

		<div class="span10">
			<iframe style="width: 100%; " scrolling="no" onunload="this.height=480;"
				onload="NT_iframeResize();NT_Scrolliframe();" frameborder="0" id="sys_main" name="sys_main"
				src="/demo/baseui">您的浏览器不支持此功能，请您使用最新的版本。</iframe>
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

    var theDownedButtonObj=null;
    function CheckBTN(theObj,URL)
    {
	    var ns6 = document.getElementById&&!document.all
        if(ns6)
        {
	        if (!theDownedButtonObj) {theDownedButtonObj='button_down';}
	            if (theObj.className!='button')
	            {
		            theObj.className='button';
		            theDownedButtonObj.className='button_down';
		            theDownedButtonObj=theObj;
		            frames["sys_main"].location=URL;
	            }
	    }
	    else
	    {
            if (!theDownedButtonObj) {theDownedButtonObj=IDC_DownedBUtton;}
                if (theObj.className!='button')
                {
	                theObj.className='button';
	                theDownedButtonObj.className='button_down';
	                theDownedButtonObj=theObj;
	                frames["sys_main"].location=URL;
                }
	    }
    }

    
     function CheckBTNu(DivID,URL)
     {
        if (document.getElementById(DivID).style.display=='')
        {
            document.getElementById(DivID).style.display='none';
            document.getElementById("fontchar").innerHTML="显示菜单";
        }
        else
        {
            document.getElementById(DivID).style.display='';
            document.getElementById("table_id").style.width='100%';
            document.getElementById("fontchar").innerHTML="隐藏菜单";
	        frames["menu"].location=URL;
        }
    }    
    
    function LoadMenu(theObj,URL)
    {
	    var ns6 = document.getElementById&&!document.all
        if(ns6)
        {
	        if (!theDownedButtonObj) {theDownedButtonObj='button_down';}
	            if (theObj.className!='button')
	            {
		            theObj.className='button';
		            theDownedButtonObj.className='button_down';
		            theDownedButtonObj=theObj;
		            //frames["sys_main"].location=URL;
	            }
	    }
	    else
	    {
            if (!theDownedButtonObj) {theDownedButtonObj=IDC_DownedBUtton;}
                if (theObj.className!='button')
                {
	                theObj.className='button';
	                theDownedButtonObj.className='button_down';
	                theDownedButtonObj=theObj;
	                //frames["sys_main"].location=URL;
                }
	    }	        
	    frames["menu"].location=URL;
    }
    
//    if (ie4||ns6)
//	document.onclick=hidemenu

    //动态调用菜单

    </script>