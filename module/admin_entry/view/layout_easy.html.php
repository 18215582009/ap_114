<?php
use lib\form\Form;
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
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FC管理系统</title>
<?=Form::css()?>
</head>
<style>
body{overflow:hidden}
.sidebar {width: 200px;}
.page-content {margin: 0 0 0 200px;}
#footer {padding-left: 200px;}
body.font-source-sans-pro .sidebar-main ul#sidebar-main > li > a {font-size: 14px;}
body.sidebar-color-grey #wrapper #page-wrapper .sidebar-main ul#sidebar-main > li > a > .menu-title, body.sidebar-color-grey #wrapper #page-wrapper .sidebar-main ul#sidebar-main > li > a > i[class*="icon-"], body.sidebar-color-grey #wrapper #page-wrapper .sidebar-main ul#sidebar-main > li > a > .arrow::before {color: #ddd;}
.sidebar-main ul#sidebar-main > li.sidebar-search {padding: 10px 15px;}
.sidebar-main ul#sidebar-main > li > a {padding: 12px 25px;}
.sidebar-main ul#sidebar-main > li > ul.nav-second-level > li > a {padding: 8px 25px 8px 60px;}
</style>
<body class="sidebar-color-grey font-source-sans-pro">
<div id="source-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" class="close">&times;</button>
                <h4 id="modal-default-label" class="modal-title">View Code</h4></div>
            <div class="modal-body">
                <pre class="prettyprint linenums"></pre>
            </div>
        </div>
    </div>
</div>
<div class="fluid">
	<?php include '../../common/view/navigation.html.php';?>
    
    <div id="wrapper"><!--BEGIN PAGE WRAPPER-->
        <div id="page-wrapper"><!--BEGIN SIDEBAR MAIN-->
            
            <?php include '../../common/view/left_easy.html.php';?>
            <!--END SIDEBAR MAIN--><!--BEGIN CHAT FORM-->

            <div class="chat-form-wrapper">
                <div id="chat-form">
                    <div class="chat-inner"><h2 class="chat-header"><a href="javascript:;" class="chat-form-close pull-right"><i class="fa fa-times"></i></a><i class="fa fa-user"></i>&nbsp; 客户聊天 &nbsp;<span class="badge badge-success">5</span></h2>
                        <div id="group-1" class="chat-group"><h4 class="group-title">Recently</h4><a href="#"><img
                                src="/images/48.jpg"
                                class="avt"/><span class="user-status is-online"></span>
                            <small>Judy Russell</small>
                            <span class="badge badge-info">2</span></a><a href="#"><img
                                src="/images/48.jpg" class="avt"/><span
                                class="user-status is-online"></span>
                            <small>Eugene Turner</small>
                            <span class="badge badge-info is-hidden">0</span></a><a href="#"><img
                                src="/images/48.jpg" class="avt"/><span
                                class="user-status is-busy"></span>
                            <small>Ann Porter</small>
                            <span class="badge badge-info is-hidden">0</span></a><a href="#"><img
                                src="/images/48.jpg"
                                class="avt"/><span class="user-status is-idle"></span>
                            <small>Benjamin Howell</small>
                            <span class="badge badge-info is-hidden">0</span></a></div>
                        <div id="group-2" class="chat-group"><h4 class="group-title">Work</h4><a href="#"><img
                                src="/images/48.jpg" class="avt"/><span
                                class="user-status is-busy"></span>
                            <small>Lawrence Larson</small>
                            <span class="badge badge-info is-hidden">0</span></a><a href="#"><img
                                src="/images/48.jpg"
                                class="avt"/><span class="user-status is-offline"></span>
                            <small>Jacqueline Howell</small>
                            <span class="badge badge-info is-hidden">0</span></a><a href="#"><img
                                src="/images/48.jpg"
                                class="avt"/><span class="user-status is-offline"></span>
                            <small>Andrew Brewer</small>
                            <span class="badge badge-info">1</span></a></div>
                        <div id="group-3" class="chat-group"><h4 class="group-title">Friends</h4><a href="#"><img
                                src="/images/48.jpg"
                                class="avt"/><span class="user-status is-online"></span>
                            <small>Marilyn Romero</small>
                            <span class="badge badge-info is-hidden">0</span></a><a href="#"><img
                                src="/images/48.jpg" class="avt"/><span
                                class="user-status is-busy"></span>
                            <small>Philip Hall</small>
                            <span class="badge badge-info is-hidden">0</span></a><a href="#"><img
                                src="/images/48.jpg" class="avt"/><span
                                class="user-status is-offline"></span>
                            <small>Gary Wells</small>
                            <span class="badge badge-info is-hidden">0</span></a></div>
                        <div class="chat-theme-setting text-right">
                            <div id="setting-theme-chat" data-on-label="dark" data-off-label="light"
                                 class="make-switch"><input type="checkbox" class="switch"/></div>
                        </div>
                    </div>
                </div>
                <div class="chat-box-wrapper">
                    <div id="chat-box" style="top:400px">
                        <div class="chat-box-header"><a href="#" class="chat-box-close pull-right mlm"><i
                                class="fa fa-times"></i></a><a href="#" class="chat-box-minimize-btn pull-right"><i
                                class="fa fa-chevron-down"></i></a><span class="user-status is-online"></span><span
                                class="display-name">Willard Mckenzie</span></div>
                        <div class="chat-content">
                            <ul class="chat-box-body">
                                <li><p><img src="/images/48.jpg" class="avt"/><span
                                        class="user">You</span><span class="time">08:44</span></p>

                                    <p>Hi, we have some ideas for this template</p></li>
                                <li class="odd"><p><img
                                        src="/images/48.jpg"
                                        class="avt"/><span class="user">Jake Rochleau</span><span
                                        class="time">08:45</span></p>

                                    <p>Great! Let tell us now...</p></li>
                            </ul>
                        </div>
                        <div class="chat-textarea"><input placeholder="Type text and press Enter" class="form-control"/>
                        </div>
                    </div>
                    <div class="chat-box-minimize"><img
                            src="/images/48.jpg"
                            data-pulsate="{border:false,speed:200,reach: 50}" class="img-circle"/><span
                            class="user-status is-online"></span></div>
                </div>
            </div>
            <!--END CHAT FORM-->
			<!--BEGIN PAGE CONTENT-->
			<div class="page-content"><!--BEGIN TITLE & BREADCRUMB PAGE-->
                <iframe id="main" src="/admin_entry/desktop" width="100%" frameborder="0" scrolling="no"></iframe> 
            </div>
            <!--END PAGE CONTENT-->
			</div>
        <!--END PAGE WRAPPER--></div>
    <!--BEGIN FOOTER-->

    <!--END FOOTER-->
</div>

<script src="/js/jquery.min.js" ></script>
<script src="/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/js/jquery.nicescroll.js"></script>
<script src="/js/jquery-ui.js"></script>
<script src="/js/vendor/bootstrap/js/bootstrap.min.js" ></script>
<script src="/js/vendor/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js"></script>
<script src="/js/html5shiv.js"></script>--
<script src="/js/respond.min.js"></script>
<script src="/js/vendor/metisMenu/jquery.metisMenu.js"></script>
<script src="/js/vendor/iCheck/icheck.min.js"></script>
<script src="/js/vendor/iCheck/custom.min.js"></script>
<script src="/js/vendor/slimScroll/jquery.slimscroll.js"></script>
<script src="/js/bootstrap-switch.min.js"></script>

<script src="/js/jquery.cookie.js"></script>
<script src="/js/jquery.pulsate.js"></script>

<!--LOADING SCRIPTS FOR PAGE-->
<script src="/js/plugins/artDialog/artDialog.source.js?skin=default"></script>
<script src="/js/plugins/artDialog/plugins/iframeTools.js"></script>

<!--CORE JAVASCRIPT-->
<script src="/js/mtek_core.js"></script>
<script src="/js/mtek_system-layout.js"></script>
<script src="/js/mtek_jquery-responsive.js"></script>

<script>
jQuery(document).ready(function () {
    "use strict";
    JQueryResponsive.init();
    Layout.init();
	//page_pricing_table.init();
	$("#main").height($(window).height()-60);
});

/* iframe 在导入高度后计算高度 
$("#main").load(function(){
	var mainheight = $(this).contents().find("body").height()+30;
	$(this).height(mainheight);
});
*/

function iFrameHeight() {alert(1)
	var ifm= document.getElementById("main"); 
	var subWeb = document.frames ? document.frames["main"].document : ifm.contentDocument; 
	if(ifm != null && subWeb != null) { 
		ifm.height = subWeb.body.scrollHeight+50; alert(ifm.height);
	} 
}
function launch(url){
	var ifm= document.getElementById("main"); 
	ifm.src = url;
}
</script>
</body>
</html>
