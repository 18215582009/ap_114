<?php
/**
 * Html模板文件
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong<751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: index.html.php,v 1.4 2012/02/16 09:54:23 lj Exp $
 */
 use lib\form\Form as Form;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?=$header?></title>
<link type="text/css" rel="stylesheet" href='/css/fonts/aliyun.css' type='text/css' media='screen' />
<?=Form::css();?>
<link href="/js/plugins/tree/xtree.css" rel="stylesheet" type="text/css" />
<link href="/js/plugins/tree/xmenu.css" rel="stylesheet" type="text/css" />
</head>
<style>
.page-content {
    background-color: #fff;
    border-left: none;
    margin: 0;
}
.viewFramework-topbar {
	position: fixed;
	width: 100%;
	height: 50px;
	background: #09C;
	z-index: 101
}

.viewFramework-body {
	position: absolute;
	width: 100%;
	top: 50px;
	bottom: 0px;
	background-color: #000;
	z-index: 100
}

.viewFramework-product {
	width: auto;
	position: absolute;
	top: 0px;
	left: 0px;
	bottom: 0px;
	right: 0px;
	overflow: hidden;
	background: #FFF
}

.viewFramework-product-navbar {
	width: 0px;float: left;background-color: #EAEDF1;position: absolute;
	top: 0px;bottom: 0px;z-index: 2;overflow: hidden;
	-o-transition: all 0.2s ease;
	-ms-transition: all 0.2s ease;
	-moz-transition: all 0.2s ease;
	-webkit-transition: all 0.2s ease
}
.viewFramework-product-navbar .product-nav-stage {width: 180px;overflow: hidden;position: absolute;top: 0px;bottom: 0px;right: 0px}
.viewFramework-product-navbar .product-nav-stage .product-nav-scene {width: 180px;position: absolute;top: 0px;bottom: 0px;-webkit-transition: position,.2s,linear;-moz-transition: position,.2s,linear}
.viewFramework-product-navbar .product-nav-stage .product-nav-main-scene {left: 0px}
.viewFramework-product-navbar .product-nav-stage .product-nav-sub-scene {left: 180px}
.viewFramework-product-navbar .product-nav-stage-main .product-nav-main-scene {left: 0px}
.viewFramework-product-navbar .product-nav-stage-main .product-nav-sub-scene {left: 180px}
.viewFramework-product-navbar .product-nav-stage-sub .product-nav-main-scene {left: -180px}
.viewFramework-product-navbar .product-nav-stage-sub .product-nav-sub-scene {left: 0px}
.viewFramework-product-navbar .product-nav-scene .product-nav-title {width: 180px;height: 60px;line-height: 60px;background: #D9DEE4;overflow: hidden;text-overflow: ellipsis;white-space: nowrap}
.viewFramework-product-navbar .product-nav-main-scene .product-nav-title {font-weight: bold;text-indent: 20px}
.viewFramework-product-navbar .product-nav-sub-scene .product-nav-title {text-align: center}
.viewFramework-product-navbar .product-nav-sub-scene .product-nav-title a {font-size: 20px;color: #546478;text-decoration: none}
.viewFramework-product-navbar .product-nav-sub-scene .product-nav-title a:hover {color: #09C}

.viewFramework-product-navbar .product-nav-list {
	/*position: absolute;*/
	top: 70px;
	left: 0px;
	right: 0px;
	bottom: 0px;
	overflow-y: auto;
	overflow-x: hidden;
    height: 100%;
}

.viewFramework-product-navbar .product-nav-list .nav-icon {
	width: 30px;
	height: 40px;
	float: left;
	text-align: center;
	font-size: 16px;
	color: #333
}

.viewFramework-product-navbar .product-nav-list .nav-title {
	width: 138px;
	float: left;
	overflow: hidden;
	text-overflow: ellipsis;
	white-space: nowrap
}

.viewFramework-product-navbar .product-nav-list .nav-extend {
	height: 40px;
	line-height: 40px;
	float: right;
	margin-top: -40px
}

.viewFramework-product-navbar .product-nav-list ul {
	list-style: none;
	padding: 0px;
	margin: 0px
}

.viewFramework-product-navbar .product-nav-list li a {
	width: 180px;
	height: 40px;
	line-height: 40px;
	display: block;
	color: #333
}

.viewFramework-product-navbar .product-nav-list ul ul li a {
	color: #666
}

.viewFramework-product-navbar .product-nav-list ul ul li a .nav-title {
	text-indent: 8px
}

.viewFramework-product-navbar .product-nav-list li a:hover {
	background-color: #F4F6F8
}

.viewFramework-product-navbar .product-nav-list li.active a {
	background-color: #FFF
}

.viewFramework-product-navbar-collapse {
	position: absolute;
	left: 0;
	top: 50%;
	width: 20px;
	height: 50px;
	z-index: 3;
	-o-transition: all 0.2s ease;
	-ms-transition: all 0.2s ease;
	-moz-transition: all 0.2s ease;
	-webkit-transition: all 0.2s ease
}

.viewFramework-product-navbar-collapse:hover .product-navbar-collapse {
	left: 0
}

.viewFramework-product-navbar-collapse:hover .product-navbar-collapse-bg {
	border-bottom: 8px solid transparent;
	border-left: 20px solid #D9DEE4;
	border-top: 8px solid transparent
}

.viewFramework-product-navbar-collapse .product-navbar-collapse-inner {
	top: -50%;
	position: relative;
	overflow: hidden
}

.viewFramework-product-navbar-collapse .product-navbar-collapse {
	height: 50px;
	position: relative;
	left: -7px;
	text-align: center;
	cursor: pointer;
	-o-transition: all 0.1s ease,0.1s ease;
	-ms-transition: all 0.1s ease,0.1s ease;
	-moz-transition: all 0.1s ease,0.1s ease;
	-webkit-transition: all 0.1s ease,0.1s ease
}

.viewFramework-product-navbar-collapse .product-navbar-collapse>span {
	font-size: 15px;
	line-height: 50px;
	vertical-align: text-top
}

.viewFramework-product-navbar-collapse .product-navbar-collapse-bg {
	width: 0;
	height: 50px;
	position: absolute;
	top: 0;
	left: 0;
	border-bottom: 9px solid transparent;
	border-left: 13px solid #D9DEE4;
	border-top: 9px solid transparent;
	-o-transition: all 0.1s ease,0.1s ease;
	-ms-transition: all 0.1s ease,0.1s ease;
	-moz-transition: all 0.1s ease,0.1s ease;
	-webkit-transition: all 0.1s ease,0.1s ease
}

.viewFramework-product-navbar-collapse .icon-collapse-left {
	display: none
}

.viewFramework-product-navbar-collapse .icon-collapse-right {
	display: inline
}

.viewFramework-product-body {
	position: absolute;
	width: auto;
	top: 0px;
	bottom: 0px;
	left: 0px;
	right: 0px;
	overflow: hidden;
	overflow-y: auto;
	-o-transition: all 0.2s ease;
	-ms-transition: all 0.2s ease;
	-moz-transition: all 0.2s ease;
	-webkit-transition: all 0.2s ease
}

.viewFramework-product-col-1 .viewFramework-product-navbar-bg,.viewFramework-product-col-1 .viewFramework-product-navbar {
	width: 180px
}

.viewFramework-product-col-1 .viewFramework-product-body {
	left: 180px
}

.viewFramework-product-col-1 .viewFramework-product-navbar-collapse {
	left: 160px
}

.viewFramework-product-col-1 .viewFramework-product-navbar-collapse .product-navbar-collapse {
	right: -7px;
	left: auto
}

.viewFramework-product-col-1 .viewFramework-product-navbar-collapse .product-navbar-collapse>span {
	color: #546478
}

.viewFramework-product-col-1 .viewFramework-product-navbar-collapse .product-navbar-collapse-bg {
	right: 0;
	left: auto;
	border-bottom: 9px solid transparent;
	border-left: none;
	border-right: 13px solid #f7f7f7;
	border-top: 9px solid transparent
}

.viewFramework-product-col-1 .viewFramework-product-navbar-collapse .icon-collapse-left {
	display: inline
}

.viewFramework-product-col-1 .viewFramework-product-navbar-collapse .icon-collapse-right {
	display: none
}

.viewFramework-product-col-1 .viewFramework-product-navbar-collapse:hover .product-navbar-collapse {
	right: 0;
	left: auto
}

.viewFramework-product-col-1 .viewFramework-product-navbar-collapse:hover .product-navbar-collapse-bg {
	border-bottom: 8px solid transparent;
	border-left: none;
	border-right: 20px solid #f7f7f7;
	border-top: 8px solid transparent
}

.viewFramework-product-col-2 .viewFramework-product-navbar-bg,.viewFramework-product-col-2 .viewFramework-product-navbar {
	width: 360px
}
.viewFramework-product-col-2 .viewFramework-product-body {left: 360px}
.viewFramework-animate {
	-webkit-animation-duration: 0.1s;
	animation-duration: 0.1s;
	-webkit-animation-fill-mode: both;
	animation-fill-mode: both
}

.viewFramework-fadeIn {
	-webkit-animation-name: viewFrameworkFadeIn;
	animation-name: viewFrameworkFadeIn
}

@-webkit-keyframes viewFrameworkFadeIn {
	0% {opacity: 0}
	100% {opacity: 1}
}

@keyframes viewFrameworkFadeIn {
	0% {opacity: 0}
	100% {opacity: 1}
}
</style>
<script type="text/javascript" src="/js/plugins/tree/xtree.js"></script>
<script type="text/javascript" src="/js/plugins/tree/xmlextras.js"></script>
<script type="text/javascript" src="/js/plugins/tree/xloadtree.js"></script>
<script type="text/javascript" src="/js/plugins/tree/xmenu.js"></script>
<script>
var elo;
var loadmenuok=false;
var type = 'main';

function goMain(action) {
	var ifm= document.getElementById("mainFrame"); 
	ifm.src = action;
}
function goNew(action){
	window.open(action);
	return;
}
function goDel(action){
	var msg = confirm('您确定要删除此栏目么？删除之后所有栏目下数据都将丢失!');
	if(msg){
		//goMain(action);
        $.ajax({
            type: 'GET',
            url: action,
            dataType: 'JSON',
            success: function (result) {
                alert(result.desc);
                if (result.state) {
                    //处理成功动作
                } else {

                }
            },
            error: function (result) {
                alert(result.desc);
            }
        });
		return;
	}else{
		return;
	}

}
function rightMenu(e,cid) {
	var toolMenu = new WebFXMenu;
	toolMenu.width = 90;
	if(cid == 'root'){
		toolMenu.add(new WebFXMenuItem('新建栏目','javascript:goMain("/cms_content/categoryAdd.php?cid=0")','新建栏目'));
		//toolMenu.add(new WebFXMenuItem('统计内容','javascript:goMain("/admin.php?adminjob=category&action=total")','统计内容数'));
		//toolMenu.add(new WebFXMenuItem('更新首页','javascript:goMain("/admin.php?adminjob=category&action=pubindex")','更新首页'));
		//toolMenu.add(new WebFXMenuItem('批量处理','javascript:goMain("/admin.php?adminjob=category&action=batpub")','批量处理'));
	} else if(cid == 'recycle'){
		toolMenu.add(new WebFXMenuItem('清空回收站','javascript:if(confirm("确定要清空回收站?"))goMain("/admin.php?adminjob=recycle&action=del&type=all");','清空回收站'));
		toolMenu.add(new WebFXMenuItem('还原所有项','javascript:if(confirm("确定要还原所有项目?"))goMain("/admin.php?adminjob=recycle&action=undo&type=all");','还原所有'));
	}else if(cid == 'nopriv'){
		
	} else {
		toolMenu.add(new WebFXMenuItem('添加新内容','javascript:goMain("/cms_content/contentAdd.php?cid='+ cid +'")','新建文档'));
		//toolMenu.add(new WebFXMenuItem('查看此首页','javascript:goNew("/admin.php?adminjob=category&action=viewlist&cid='+ cid +'")','查看首页'));
		//toolMenu.add(new WebFXMenuItem('更新此首页','javascript:goMain("/admin.php?adminjob=category&action=publist&cid='+ cid +'")', '更新栏目首页'));
		toolMenu.add(new WebFXMenuItem('栏目设置','javascript:goMain("/cms_content/categoryEdit.php?cid='+ cid +'")','栏目设置'));
		toolMenu.add(new WebFXMenuItem('新建栏目','javascript:goMain("/cms_content/categoryAdd.php?cid='+ cid +'")','添加子栏目'));
		//toolMenu.add(new WebFXMenuItem('发布此栏目','javascript:goMain("/admin.php?adminjob=category&action=pubview&cid='+ cid +'")', '发布此栏目'));
		//toolMenu.add(new WebFXMenuItem('更新此栏目','javascript:goMain("/admin.php?adminjob=category&action=pubupdate&cid='+ cid +'")', '更新此栏目'));
		toolMenu.add(new WebFXMenuItem('删除此栏目','javascript:goDel("/cms_content/categoryDel.php?cid='+ cid +'")', '删除此栏目'));
	}
	var menudata = document.getElementById('menudata');
	menudata.innerHTML = toolMenu ;
	var eve = e || document.event;
	elo=eve.srcElement;
	toolMenu.left = eve.clientX;
	toolMenu.top = eve.clientY+document.body.scrollTop;
	toolMenu.show();

}

/// XP Look
webFXTreeConfig.rootIcon		= "/js/plugins/tree/xp/folder.png";
webFXTreeConfig.openRootIcon	= "/js/plugins/tree/xp/openfolder.png";
webFXTreeConfig.folderIcon		= "/js/plugins/tree/xp/folder.png";
webFXTreeConfig.openFolderIcon	= "/js/plugins/tree/xp/openfolder.png";
webFXTreeConfig.fileIcon		= "/js/plugins/tree/xp/file.png";
webFXTreeConfig.lMinusIcon		= "/js/plugins/tree/xp/Lminus.png";
webFXTreeConfig.lPlusIcon		= "/js/plugins/tree/xp/Lplus.png";
webFXTreeConfig.tMinusIcon		= "/js/plugins/tree/xp/Tminus.png";
webFXTreeConfig.tPlusIcon		= "/js/plugins/tree/xp/Tplus.png";
webFXTreeConfig.iIcon			= "/js/plugins/tree/xp/I.png";
webFXTreeConfig.lIcon			= "/js/plugins/tree/xp/L.png";
webFXTreeConfig.tIcon			= "/js/plugins/tree/xp/T.png";


var rti;
var tree = new WebFXTree("Root","root","javascript:goMain('/cms_content/contentList')");
var rtree = new WebFXTree("回收站","recycle","javascript:goMain('/cms_content/recycle')");
rtree.icon		="/js/plugins/tree/xp/recycle.png";
rtree.openIcon	="/js/plugins/tree/xp/recycle.png";


<?php 	
	foreach($category as $item){
		if($item['ischild']==1){
?>
	tree.add(new WebFXLoadTreeItem("<?php echo $item['name']; ?>", "/cms_content/categoryTree.php?cid=<?php echo $item['id']; ?>","javascript:goMain('<?php echo $item['url']; ?>?cid=<?php echo $item['id']; ?>&mid=<?php echo $item['mid']; ?>');","<?php echo $item['id']; ?>"));
<?php }else{ ?>
	tree.add(new WebFXTreeItem("<?php echo $item['name']; ?>","javascript:goMain('<?php echo $item['url']; ?>?cid=<?php echo $item['id']; ?>&mid=<?php echo $item['mid']; ?>');","<?php echo $item['id']; ?>"));
<?php } } ?>
/*
	tree.add(new WebFXLoadTreeItem("实例效果", "/admin.php?adminjob=tree&action=showXML&cid=9","javascript:goMain('/admin.php?adminjob=content&action=view&cid=9');","9"));
	tree.add(new WebFXTreeItem("友情链接","javascript:goMain('/admin.php?adminjob=content&action=view&cid=7');","7"));
*/

</script>
<body>

<div class="viewFramework-product viewFramework-product-col-1">
        <div class="viewFramework-product-navbar">
            <div class="product-nav-stage product-nav-stage-main">
                <div class="product-nav-scene product-nav-main-scene">
                    <div class="product-nav-title ng-binding">栏目信息管理</div>
                    <!-- 自定义内容插入点，比如商标、logo -->
                    <div customized-content="" class="ng-isolate-scope"></div>
                    <div class="product-nav-list">
                        <div id="menus" style="margin:5px 10px 0 10px;">
                        <div class="t">
                        <table border="0" cellspacing="0" cellpadding="0" width=100%>
                          <tr class="tr">
                            <td style="text-align:left"><a href="javascript:goMain('categoryList.php')"><img src="/images/page_nav.png" hspace="2" style="vertical-align:middle;" />栏目结构</a> &nbsp;
                            <!--<a href="javascript:goMain('main.php');"><img src="/images/page_view.png" hspace="2" style="vertical-align:middle;margin-left:3px;" />栏目内容</a>--></td>
                          </tr>
                          <tr class="tr3"><td>
                        <script>
                        document.write(tree);
                        document.write(rtree);
                        </script>
                          </td>
                          </tr>
                        
                        </table>
                        </div>
                        </div>
                        <div id="menudata"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="viewFramework-product-navbar-collapse ng-scope" style="">
            <div class="product-navbar-collapse-inner">
            <div class="product-navbar-collapse-bg"></div>
            <div aliyun-console-spm="4" class="product-navbar-collapse" data-spm-click="gostr=/aliyun;locaid=d4;;">
            <span class="icon-collapse-left"></span> 
            <span class="icon-collapse-right"></span>
            </div>
            </div>
        </div>
        
        <div class="viewFramework-product-body" style="overflow: hidden">
        	<iframe id="mainFrame" src="/cms_content/contentList" width="100%" height="100%" frameborder="0" ></iframe>
        </div>
    </div>
<script src="/js/jquery.min.js"></script>
<script>
jQuery(document).ready(function () {
    "use strict";
});
$("#mainFrame").load(function(){
	//var mainheight = $(this).contents().find("body").height()+20;
	//if(mainheight<300)mainheight = $(window).height();
	//$(this).height(mainheight);
});
</script>
</body>
</html>
