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
<link type="text/css" rel="stylesheet" href='/theme/fonts/open_sans.css' type='text/css' media='screen' />
<link type="text/css" rel="stylesheet" href='/theme/fonts/aliyun.css' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_font-awesome.min.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_simple-line-icons.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/bootstrap.min.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_animate.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_all.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/bootstrap-switch.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/prettify.css';?>' type='text/css' media='screen' />
<link type="text/css" rel="stylesheet" href="" id="font-layout">
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/toastr.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_core.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_system.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_system-responsive.css';?>' type='text/css' media='screen' />
</head>
<style>
.page-content {
    margin: 0px;
}
.page-content > .box-content > .content {padding: 0;}

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

.viewFramework-body .console-global-notice .console-global-notice-nav {
	top: 14px
}

.viewFramework-body .console-global-notice .console-global-notice-list {
	margin: 0;
	height: 40px
}

.viewFramework-body .console-global-notice .console-global-notice-list .console-global-notice-item {
	padding: 11px 12px;
	border: none
}

.viewFramework-body .console-global-notice .console-global-notice-list .console-global-notice-item .console-global-notice-nomore {
	top: 10px
}

.viewFramework-body.viewFramework-topbar-hide {
	top: 0px
}

.viewFramework-body.viewFramework-topbar-hide .viewFramework-sidebar {
	top: 0px
}

.viewFramework-sidebar {
	width: 0px;
	display: none;
	position: fixed;
	top: 50px;
	bottom: 0px;
	background-color: #293038;
	z-index: 102;
	overflow-x: hidden
}

.viewFramework-sidebar .sidebar-content {
	width: 200px;
	height: 100%;
	overflow: auto;
	overflow-x: hidden
}

.viewFramework-sidebar .sidebar-trans {
	-o-transition: all 0.12s ease,0.12s ease;
	-ms-transition: all 0.12s ease,0.12s ease;
	-moz-transition: all 0.12s ease,0.12s ease;
	-webkit-transition: all 0.12s ease,0.12s ease
}

.viewFramework-sidebar .sidebar-fold {
	height: 30px;
	width: 180px;
	background: #394555;
	color: #aeb9c2;
	text-align: center;
	line-height: 30px !important;
	font-size: 12px;
	user-select: none;
	cursor: pointer;
	-webkit-user-select: none;
	-moz-user-select: none
}

.viewFramework-sidebar .sidebar-fold:hover {
	background: #37424f
}

.viewFramework-sidebar .sidebar-nav {
	width: 180px
}

.viewFramework-sidebar .sidebar-nav ul {
	margin: 0px;
	padding: 0px;
	list-style: none;
	overflow: hidden
}

.viewFramework-sidebar .sidebar-nav li a {
	display: block;
	width: 100%;
	height: 40px;
	line-height: 40px;
	overflow: hidden
}

.viewFramework-sidebar .sidebar-nav li a:hover {
	background: #37424f
}

.viewFramework-sidebar .sidebar-nav li a:hover .nav-icon,.viewFramework-sidebar .sidebar-nav li a:hover .nav-title {
	color: #fff
}

.viewFramework-sidebar .sidebar-nav .nav-item {
	position: relative
}

.viewFramework-sidebar .sidebar-nav .nav-comment {
	background: #2d3945;
	color: #cccccc;
	height: 26px;
	margin-left: 8px;
	line-height: 26px;
	padding: 0 7px;
	vertical-align: middle;
	position: relative;
	display: none
}

.viewFramework-sidebar .sidebar-nav .nav-comment .icon-arrow-left {
	position: absolute;
	left: -14px;
	line-height: 26px;
	font-size: 24px;
	color: #2d3945
}

.viewFramework-sidebar .sidebar-nav .nav-tooltip-comment {
	color: #ccc
}

.viewFramework-sidebar .sidebar-nav .sidebar-title {
	height: 40px;
	background: #22282e;
	color: #fff;
	line-height: 40px;
	position: relative;
	cursor: pointer;
	-webkit-user-select: none;
	-moz-user-select: none
}

.viewFramework-sidebar .sidebar-nav .sidebar-title:hover {
	background: #414d5c
}

.viewFramework-sidebar .sidebar-nav .sidebar-title-icon {
	display: inline-block;
	margin: 0 8px 0 20px;
	vertical-align: middle;
	transition: transform 0.12s;
	-o-transition: -o-transform 0.12s;
	-ms-transition: -ms-transform 0.12s;
	-moz-transition: -moz-transform 0.12s;
	-webkit-transition: -webkit-transform 0.12s
}

.viewFramework-sidebar .sidebar-manage {
	vertical-align: middle;
	position: absolute;
	height: 40px;
	width: 40px;
	right: 0
}

.viewFramework-sidebar .sidebar-manage a {
	display: block;
	width: 100%;
	height: 100%;
	text-align: center;
	line-height: 40px;
	font-size: 14px;
	color: #a0abb3;
	text-decoration: none
}

.viewFramework-sidebar .sidebar-nav-fold ul {
	height: 0 !important;
	overflow: hidden
}

.viewFramework-sidebar .sidebar-nav-fold .sidebar-title-icon {
	transform: rotate(-90deg);
	-webkit-transform: rotate(-90deg);
	-moz-transform: rotate(-90deg);
	-ms-transform: rotate(-90deg);
	-o-transform: rotate(-90deg)
}

.viewFramework-sidebar .sidebar-nav-fold .sidebar-title {
	background: #37424f;
	border-bottom: 1px solid #414d5c
}

.viewFramework-sidebar .sidebar-nav .nav-item:hover .nav-comment {
	display: inline-block
}

.viewFramework-sidebar .entrance-nav .nav-comment {
	margin-left: 10px
}

.viewFramework-sidebar .sidebar-nav .nav-icon {
	width: 50px;
	text-align: center;
	font-size: 16px;
	float: left;
	color: #aeb9c2
}

.viewFramework-sidebar .sidebar-nav .nav-title {
	float: left;
	overflow: hidden;
	color: #fff;
	white-space: nowrap;
	text-overflow: ellipsis;
	display: block;
	width: 130px
}

.viewFramework-sidebar .entrance-nav .nav-title {
	width: auto
}

.viewFramework-sidebar .sidebar-nav li.consolehome .nav-tooltip {
	top: 15px;
	line-height: 40px
}

.viewFramework-sidebar .sidebar-nav li.consolehome a {
	height: 70px;
	line-height: 70px;
	background: #293038
}

.viewFramework-sidebar .sidebar-nav li.consolehome a .nav-icon {
	font-size: 20px
}

.viewFramework-sidebar .sidebar-nav li.consolehome.active a {
	background: #293038
}

.viewFramework-sidebar .sidebar-nav li.active a {
	background: #0099cc
}

.viewFramework-sidebar .sidebar-nav li.active a .nav-title {
	color: #fff
}

.viewFramework-sidebar .sidebar-nav li.active a .nav-icon {
	color: #fff
}

.viewFramework-sidebar .sidebar-nav .manage-nav {
	height: 30px;
	overflow: hidden
}

.viewFramework-sidebar .sidebar-nav .manage-nav:hover .nav-icon {
	color: #fff
}

.viewFramework-sidebar .sidebar-nav .manage-nav a {
	display: block;
	height: 100%
}

.viewFramework-sidebar .sidebar-nav .manage-nav .nav-icon {
	height: 100%;
	line-height: 30px;
	font-size: 16px
}

.viewFramework-sidebar .sidebar-nav .manage-nav .nav-title {
	margin-top: 14px;
	background: #293038;
	height: 1px;
	width: 120px
}

.viewFramework-sidebar .sidebar-nav .more-nav {
	display: block;
	width: 100%;
	height: 40px;
	line-height: 40px;
	position: relative
}

.viewFramework-sidebar .sidebar-nav .more-nav.open .more-nav-switch {
	background: #09c
}

.viewFramework-sidebar .sidebar-nav .more-nav.open .more-nav-switch .nav-icon,.viewFramework-sidebar .sidebar-nav .more-nav.open .more-nav-switch .nav-title {
	color: #fff
}

.viewFramework-sidebar .sidebar-nav .more-nav.open .more-nav-switch:hover {
	background: #09c
}

.viewFramework-sidebar .sidebar-nav .more-nav.open .icon-up {
	display: none
}

.viewFramework-sidebar .sidebar-nav .more-nav.open .icon-down {
	display: inline-block
}

.viewFramework-sidebar .sidebar-nav .more-nav .icon-up {
	display: inline-block
}

.viewFramework-sidebar .sidebar-nav .more-nav .icon-down {
	display: none
}

.viewFramework-sidebar .sidebar-nav .more-nav .more-nav-switch {
	display: block;
	width: 100%;
	height: 40px;
	line-height: 40px
}

.viewFramework-sidebar .sidebar-nav .more-nav .more-nav-switch:hover {
	background: #425160
}

.viewFramework-sidebar .sidebar-nav .more-nav .more-nav-switch:hover .nav-icon,.viewFramework-sidebar .sidebar-nav .more-nav .more-nav-switch:hover .nav-title {
	color: #fff
}

.viewFramework-sidebar .sidebar-nav .more-nav .more-nav-container {
	background: #425160;
	position: absolute;
	bottom: 40px;
	top: auto;
	border: none;
	border-radius: 0 0;
	box-shadow: none;
	margin: 0;
	width: 100%
}

.viewFramework-sidebar .sidebar-nav .more-nav .more-nav-container a {
	color: #fff;
	text-decoration: none
}

.viewFramework-sidebar .sidebar-nav .more-nav .more-nav-container .more-nav-item {
	display: block;
	height: 40px;
	line-height: 40px
}

.viewFramework-sidebar .sidebar-nav .more-nav .more-nav-container .more-nav-item:hover {
	background: #3a4856
}

.viewFramework-sidebar .sidebar-nav .more-nav .more-nav-container .more-nav-item:hover .more-nav-item-icon {
	color: #aeb9c2
}

.viewFramework-sidebar .sidebar-nav .more-nav .more-nav-container .more-nav-item-icon {
	width: 50px;
	display: inline-block;
	vertical-align: text-top;
	text-align: center;
	color: #546478
}

.viewFramework-sidebar .sidebar-nav .more-nav .more-nav-container .more-nav-item.active {
	background: #2d3945
}

.viewFramework-sidebar .sidebar-nav .more-nav .more-nav-container .more-nav-item.active .more-nav-item-icon {
	color: #0099cc
}

.viewFramework-sidebar .sidebar-nav .more-nav .more-nav-close {
	height: 20px;
	background: #09c;
	text-align: right;
	line-height: 20px;
	cursor: pointer
}

.viewFramework-sidebar .sidebar-nav .more-nav .more-nav-close .icon-down {
	text-align: left;
	width: 32px;
	display: inline-block;
	color: #80cce6;
	vertical-align: middle
}

.viewFramework-sidebar-mini .viewFramework-sidebar,.viewFramework-sidebar.sidebar-mini {
	width: 50px;
	display: block
}

.viewFramework-sidebar-mini .viewFramework-sidebar .sidebar-content,.viewFramework-sidebar.sidebar-mini .sidebar-content {
	width: 70px
}

.viewFramework-sidebar-mini .viewFramework-sidebar .sidebar-fold,.viewFramework-sidebar.sidebar-mini .sidebar-fold {
	width: 50px
}

.viewFramework-sidebar-mini .viewFramework-sidebar .sidebar-nav,.viewFramework-sidebar.sidebar-mini .sidebar-nav {
	width: 50px
}

.viewFramework-sidebar-mini .viewFramework-sidebar .sidebar-nav .nav-item a:hover+.nav-tooltip,.viewFramework-sidebar.sidebar-mini .sidebar-nav .nav-item a:hover+.nav-tooltip {
	display: block
}

.viewFramework-sidebar-mini .viewFramework-sidebar .sidebar-nav .nav-title,.viewFramework-sidebar.sidebar-mini .sidebar-nav .nav-title {
	display: none
}

.viewFramework-sidebar-mini .viewFramework-sidebar .sidebar-nav .more-nav .more-nav-switch:hover,.viewFramework-sidebar.sidebar-mini .sidebar-nav .more-nav .more-nav-switch:hover {
	background: #425160 !important
}

.viewFramework-sidebar-mini .viewFramework-sidebar .sidebar-nav .more-nav.open .more-nav-switch,.viewFramework-sidebar.sidebar-mini .sidebar-nav .more-nav.open .more-nav-switch {
	background: #425160 !important
}

.viewFramework-sidebar-mini .viewFramework-sidebar .sidebar-nav .more-nav .more-nav-container,.viewFramework-sidebar.sidebar-mini .sidebar-nav .more-nav .more-nav-container {
	bottom: 0px;
	left: 50px;
	width: 180px
}

.viewFramework-sidebar-mini .viewFramework-sidebar .sidebar-nav .more-nav .more-nav-container .more-nav-item,.viewFramework-sidebar.sidebar-mini .sidebar-nav .more-nav .more-nav-container .more-nav-item {
	display: block;
	height: 40px;
	line-height: 40px
}

.viewFramework-sidebar-mini .viewFramework-sidebar .sidebar-nav .more-nav .more-nav-container .more-nav-item-icon,.viewFramework-sidebar.sidebar-mini .sidebar-nav .more-nav .more-nav-container .more-nav-item-icon {
	width: 50px;
	padding-left: 0
}

.viewFramework-sidebar-mini .viewFramework-sidebar .sidebar-nav .more-nav .more-nav-close,.viewFramework-sidebar.sidebar-mini .sidebar-nav .more-nav .more-nav-close {
	display: none
}

.viewFramework-sidebar-mini .viewFramework-sidebar .sidebar-nav li.consolehome a :hover,.viewFramework-sidebar.sidebar-mini .sidebar-nav li.consolehome a :hover {
	background: #425160
}

.viewFramework-sidebar-mini .viewFramework-sidebar .sidebar-title .sidebar-title-text,.viewFramework-sidebar.sidebar-mini .sidebar-title .sidebar-title-text {
	display: none
}

.viewFramework-sidebar-mini .viewFramework-sidebar .sidebar-title-inner:hover+.nav-tooltip,.viewFramework-sidebar.sidebar-mini .sidebar-title-inner:hover+.nav-tooltip {
	display: block
}

.viewFramework-sidebar-mini .viewFramework-sidebar .sidebar-manage,.viewFramework-sidebar.sidebar-mini .sidebar-manage {
	display: none
}

.viewFramework-sidebar-mini .viewFramework-sidebar .entrance-nav .nav-item:hover .nav-comment,.viewFramework-sidebar.sidebar-mini .entrance-nav .nav-item:hover .nav-comment {
	display: none
}

.viewFramework-sidebar-full .viewFramework-sidebar,.viewFramework-sidebar.sidebar-full {
	width: 180px;
	display: block
}

.viewFramework-sidebar-full .viewFramework-sidebar .sidebar-nav .nav-icon,.viewFramework-sidebar.sidebar-full .sidebar-nav .nav-icon {
	width: 50px
}

.viewFramework-sidebar-mini .viewFramework-product {
	left: 50px
}

.viewFramework-sidebar-full .viewFramework-product {
	left: 180px
}

.viewFramework-sidebar-dialog .modal-dialog {
	width: 730px
}

.viewFramework-sidebar-dialog .modal-dialog .modal-title {
	user-select: none;
	-webkit-user-select: none
}

.viewFramework-sidebar-manage .sidebar-item-list {
	padding: 4px 0 0 0;
	height: auto
}

.viewFramework-sidebar-manage .sidebar-item-list-picked .sidebar-item {
	border: 1px solid #37a9d5
}

.viewFramework-sidebar-manage .sidebar-item-list-picked .sidebar-item .sidebar-item-opt-icon {
	display: block
}

.viewFramework-sidebar-manage .sidebar-item-list-picked .sidebar-item .sidebar-item-icon {
	color: #516176
}

.viewFramework-sidebar-manage .sidebar-config-title {
	padding-left: 6px;
	user-select: none;
	-webkit-user-select: none
}

.viewFramework-sidebar-manage .sidebar-item-wrap {
	padding: 6px;
	width: 33.3%;
	float: left;
	user-select: none;
	-webkit-user-select: none
}

.viewFramework-sidebar-manage .sidebar-item-wrap.on-drag-hover .sidebar-item {
	border: 1px dashed #ddd
}

.viewFramework-sidebar-manage .sidebar-item {
	height: 32px;
	padding: 4px;
	line-height: 24px;
	background: #fff;
	border: 1px solid #d3dce3;
	position: relative;
	cursor: pointer;
	overflow: hidden;
	white-space: nowrap;
	text-overflow: ellipsis;
	-o-transition: all 0.1s, 0.1s;
	-ms-transition: all 0.1s, 0.1s;
	-moz-transition: all 0.1s, 0.1s;
	-webkit-transition: all 0.1s, 0.1s
}

.viewFramework-sidebar-manage .sidebar-item:hover {
	border: 1px solid #37a9d5
}

.viewFramework-sidebar-manage .sidebar-item:hover .sidebar-item-opt-icon {
	display: block
}

.viewFramework-sidebar-manage .sidebar-item .sidebar-item-icon {
	color: #aeb9c2;
	font-size: 14px;
	margin: 0 2px;
	position: relative;
	top: 1px
}

.viewFramework-sidebar-manage .sidebar-item .sidebar-item-opt-icon {
	display: none;
	position: absolute;
	height: 30px;
	width: 30px;
	right: 0;
	top: 0;
	line-height: 30px;
	text-align: center;
	border-left: 1px solid #37a9d5;
	color: #37a9d5;
	font-size: 14px
}

.viewFramework-sidebar-manage .sidebar-config-gap {
	border: 1px dashed #e8ecf0;
	margin: 16px 5px;
	user-select: none;
	-webkit-user-select: none
}

.aliyun-console-sidebar-tooltip {
	position: absolute;
	z-index: 1030;
	display: block;
	font-size: 12px;
	line-height: 1.4;
	opacity: 0;
	filter: alpha(opacity=0);
	visibility: visible
}

.aliyun-console-sidebar-tooltip .tooltip-inner {
	max-width: 200px;
	padding: 12px 8px;
	color: #ffffff;
	text-align: center;
	text-decoration: none;
	border-radius: 0 0;
	background-color: #425160
}

.aliyun-console-sidebar-tooltip .tooltip-arrow {
	position: absolute;
	width: 0;
	height: 0;
	border-color: transparent;
	border-style: solid
}

.aliyun-console-sidebar-tooltip.in {
	opacity: 0.9;
	filter: alpha(opacity=90)
}

.aliyun-console-sidebar-tooltip.right {
	padding: 0 5px;
	margin-left: 3px
}

.aliyun-console-sidebar-tooltip.right .tooltip-arrow {
	top: 50%;
	left: 0;
	margin-top: -5px;
	border-right-color: #425160;
	border-width: 5px 5px 5px 0
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
	width: 0px;
	float: left;
	background-color: #EAEDF1;
	position: absolute;
	top: 0px;
	bottom: 0px;
	z-index: 2;
	overflow: hidden;
	-o-transition: all 0.2s ease;
	-ms-transition: all 0.2s ease;
	-moz-transition: all 0.2s ease;
	-webkit-transition: all 0.2s ease
}

.viewFramework-product-navbar .product-nav-stage {
	width: 180px;
	overflow: hidden;
	position: absolute;
	top: 0px;
	bottom: 0px;
	right: 0px
}

.viewFramework-product-navbar .product-nav-stage .product-nav-scene {
	width: 180px;
	position: absolute;
	top: 0px;
	bottom: 0px;
	-webkit-transition: position,.2s,linear;
	-moz-transition: position,.2s,linear
}

.viewFramework-product-navbar .product-nav-stage .product-nav-main-scene {
	left: 0px
}

.viewFramework-product-navbar .product-nav-stage .product-nav-sub-scene {
	left: 180px
}

.viewFramework-product-navbar .product-nav-stage-main .product-nav-main-scene {
	left: 0px
}

.viewFramework-product-navbar .product-nav-stage-main .product-nav-sub-scene {
	left: 180px
}

.viewFramework-product-navbar .product-nav-stage-sub .product-nav-main-scene {
	left: -180px
}

.viewFramework-product-navbar .product-nav-stage-sub .product-nav-sub-scene {
	left: 0px
}

.viewFramework-product-navbar .product-nav-scene .product-nav-title {
	width: 180px;
	height: 70px;
	line-height: 70px;
	background: #D9DEE4;
	overflow: hidden;
	text-overflow: ellipsis;
	white-space: nowrap
}

.viewFramework-product-navbar .product-nav-main-scene .product-nav-title {
	font-weight: bold;
	text-indent: 20px
}

.viewFramework-product-navbar .product-nav-sub-scene .product-nav-title {
	text-align: center
}

.viewFramework-product-navbar .product-nav-sub-scene .product-nav-title a {
	font-size: 20px;
	color: #546478;
	text-decoration: none
}

.viewFramework-product-navbar .product-nav-sub-scene .product-nav-title a:hover {
	color: #09C
}

.viewFramework-product-navbar .product-nav-list {
	position: absolute;
	top: 70px;
	left: 0px;
	right: 0px;
	bottom: 0px;
	overflow-y: auto;
	overflow-x: hidden
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

.viewFramework-product-col-2 .viewFramework-product-body {
	left: 360px
}

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
	0% {
		opacity: 0
	}

	100% {
		opacity: 1
	}
}

@keyframes viewFrameworkFadeIn {
	0% {
		opacity: 0
	}

	100% {
		opacity: 1
	}
}
</style>
<body>
<div class="page-wrapper">

<div class="page-content">
	
	<!-- begin box-content -->
	<div class="box-content">
		<!--begin content-->
		<div class="content">
			<div class="page-profile">
				<div class="row">
					<div class="col-lg-12">
						<!-- begin panel -->
						<div class="panel">
							<div class="panel-body">
								<div class="row">
                                
									<div class="viewFramework-product viewFramework-product-col-1 clear">
                                    	<div class="viewFramework-product-navbar ng-scope clear">
                                        	<div class="product-nav-stage ng-scope product-nav-stage-main clear">
                                            	<div class="product-nav-scene product-nav-main-scene clear">
                                                <div ng-bind="config.title" id="nav-title" class="product-nav-title ng-binding clear">云服务器 ECS</div>
                                                <!-- 自定义内容插入点，比如商标、logo -->
                                                <div customized-content="" class="ng-isolate-scope"></div>
                                                	<ul role="tree" aria-labelledby="nav-title">
                                                    	<li ng-repeat="item in config.mainNav" class="active">
                                                        	<div product-nav-link="" item="item" class="ng-isolate-scope"><a href="#/home" role="treeitem" ui-sref="home()" class="ng-scope"><div class="nav-icon"></div><div class="nav-title ng-binding" ng-bind="item.title">概览</div></a></div>
                                                         </li>
                                                    </ul>
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
                                        
                                        <div class="viewFramework-product-body">
                                        
                                        </div>
                                        
                                    </div>
									
								</div>
								
							</div>
						</div>
						<!-- end panel -->
					</div>
				</div>
				
			</div>
		</div>
		<!--end content-->
	</div>
	<!-- end box-content -->
</div>
</div>

<script src="/js/jquery-1.10.2.min.js" ></script>
<script src="/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/js/candor.blockui.js"></script>
<script src="/js/jquery.nicescroll.js"></script>
<script src="/js/jquery-ui.js"></script>
<script src="/js/bootstrap.min.js" ></script>
<script src="/js/bootstrap-hover-dropdown.js"></script>
<script src="/js/mtek_html5shiv.js"></script>
<script src="/js/respond.min.js"></script>
<script src="/js/jquery.metisMenu.js"></script>
<script src="/js/mtek_icheck.min.js"></script>
<script src="/js/mtek_custom.min.js"></script>
<script src="/js/jquery.slimscroll.js"></script>
<script src="/js/bootstrap-switch.min.js"></script>
<script src="/js/prettify.js"></script>
<script src="/js/jquery.cookie.js"></script>
<script src="/js/jquery.pulsate.js"></script>

<!--LOADING SCRIPTS FOR PAGE-->


<!--LOADING SCRIPTS FOR PAGE--><!--CORE JAVASCRIPT-->
<script src="/js/mtek_core.js"></script>
<script src="/js/mtek_system-layout.js"></script>
<script src="/js/mtek_jquery-responsive.js"></script>
<!--script src="/js/candor.portal.js" ></script-->

<script>
jQuery(document).ready(function () {
    "use strict";
    JQueryResponsive.init();
    Layout.init();
});
</script>
</body>
</html>
