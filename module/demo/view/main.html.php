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
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/cdrjresponsive.css';?>' type='text/css' media='screen' />
<script src="/js/jquery-1.8.3.min.js" ></script>
<script src="/theme/cdrjs.js" ></script>
<body style="margin-top:45px;">
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
	<div class="container-fluid">
	  <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </a>
	  <a href="#" class="brand">Framework of CandorPHP - CandorSoft</a>
	  <div class="nav-collapse">
		<ul class="nav">
		  <li class="active"><a href="/demo/ui" target="demo_main">前端UI框架</a></li>
		  <li><a href="/demo/phpdemo" target="demo_main">PHP开发</a></li>
		  <li><a href="/demo/api" target="demo_main">js开发</a></li>
		  <li><a href="/demo/oe" target="demo_main">OE接口调用</a></li>
		  <li><a href="/demo/newUi" target="demo_main">新框架UI-icon</a></li>
		  <li><a href="/demo/tableTree" target="demo_main">新框架UI-tableTree</a></li>
		  <li><a href="/demo/ui_modals" target="demo_main">mtek</a></li>
        </ul>
	  </div><!--/.nav-collapse -->
	</div>
  </div>
</div>
	
<div class="container-fluid" style="margin-left:-20px">
	<div class="row-fluid">
		<iframe style="width: 100%; " scrolling="no" onunload="this.height=480;"
			onload="NT_iframeResize();NT_Scrolliframe();" frameborder="0" id="demo_main" name="demo_main"
			src="/demo/ui">您的浏览器不支持此功能，请您使用最新的版本。</iframe>
	</div>
</div>


	
</body>
</html>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
	 //导航条状态改变
	 var url=window.location.href;
	 $("ul li").each(function(){
		 $(this).click(function(){
			 $("ul li").removeClass("active");
			 $(this).attr("class","active");
		})
	 })
})
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
		dyniframe       = document.getElementById("demo_main");
		indexwin        = window;
		if (dyniframe)
		{
			if(resizeflag=='0'){resizeflag='1';dyniframe.height="800";return false}
			if (dyniframe.contentDocument){
				dyniframe.height = dyniframe.contentDocument.body.scrollHeight + 200;
			}
			else if (dyniframe.document && dyniframe.document.body.scrollHeight)
			{
				iframeheight	= demo_main.document.body.scrollHeight + 200;
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
		            frames["demo_main"].location=URL;
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
	                frames["demo_main"].location=URL;
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
		            //frames["demo_main"].location=URL;
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
	                //frames["demo_main"].location=URL;
                }
	    }	        
	    frames["menu"].location=URL;
    }
    
//    if (ie4||ns6)
//	document.onclick=hidemenu

    //动态调用菜单

    </script>
