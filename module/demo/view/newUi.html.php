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
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_font-awesome.min.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_simple-line-icons.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/bootstrap.min.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_animate.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_all.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/bootstrap-switch.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/prettify.css';?>' type='text/css' media='screen' />
<link type="text/css" rel="stylesheet" href="" id="font-layout">
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/toastr.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/jquery.treegrid.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_core.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_system.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_system-responsive.css';?>' type='text/css' media='screen' />
<style>
body{
    background:#ebf0f3 ;}
</style>
<body>
<div class="page-wrapper">

<div class="page-content"><!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">Icons</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb hidden-xs">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li><a href="#">UI</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Icons</li>
                    </ol>
                </div>
                <!--END TITLE & BREADCRUMB PAGE-->
                <div class="box-content"><!--BEGIN CONTENT-->
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tabbable-line-wrapper">
                                    <div class="tabbable-line">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#simpleline-tab">Simple
                                                Line</a></li>
                                            <li><a data-toggle="tab" href="#fontawesome-tab">Font Awesome</a></li>
                                            <li><a data-toggle="tab" href="#glyphicons-tab">Glyphicons</a></li>
                                        </ul>
                                        <div class="tab-content demo-icons" id="icons-tab-content">
                                            <div class="tab-pane fade" id="fontawesome-tab">
                                                
                                                <h3 class="block-heading">Icons</h3>

                                                <div class="row row-icons">
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-rub"></i>fa-rub</div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-ruble"></i>fa-ruble<span class="text-muted">(alias)</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-rouble"></i>fa-rouble<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-pagelines"></i>fa-pagelines
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-stack-exchange"></i>fa-stack-exchange
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-arrow-circle-o-right"></i>fa-arrow-circle-o-right
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-arrow-circle-o-left"></i>fa-arrow-circle-o-left
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-caret-square-o-left"></i>fa-caret-square-o-left
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-toggle-left"></i>fa-toggle-left<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-dot-circle-o"></i>fa-dot-circle-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-wheelchair"></i>fa-wheelchair
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-vimeo-square"></i>fa-vimeo-square
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-try"></i>fa-try</div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-turkish-lira"></i>fa-turkish-lira<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-plus-square-o"></i>fa-plus-square-o
                                                    </div>
                                                </div>
                                                <h3 class="block-heading">Web Application Icons</h3>

                                                <div class="row row-icons">
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-adjust"></i>fa-adjust
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-anchor"></i>fa-anchor
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-archive"></i>fa-archive
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-asterisk"></i>fa-asterisk
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-ban"></i>fa-ban</div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-bar-chart-o"></i>fa-bar-chart-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-barcode"></i>fa-barcode
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-beer"></i>fa-beer
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-bell"></i>fa-bell
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-bell-o"></i>fa-bell-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-bolt"></i>fa-bolt
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-book"></i>fa-book
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-bookmark"></i>fa-bookmark
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-bookmark-o"></i>fa-bookmark-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-briefcase"></i>fa-briefcase
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-bug"></i>fa-bug</div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-building-o"></i>fa-building-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-bullhorn"></i>fa-bullhorn
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-bullseye"></i>fa-bullseye
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-calendar"></i>fa-calendar
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-calendar-o"></i>fa-calendar-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-camera"></i>fa-camera
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-camera-retro"></i>fa-camera-retro
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-caret-square-o-down"></i>fa-caret-square-o-down
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-caret-square-o-left"></i>fa-caret-square-o-left
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-caret-square-o-right"></i>fa-caret-square-o-right
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-caret-square-o-up"></i>fa-caret-square-o-up
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-certificate"></i>fa-certificate
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-check"></i>fa-check
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-check-circle"></i>fa-check-circle
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-check-circle-o"></i>fa-check-circle-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-check-square"></i>fa-check-square
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-check-square-o"></i>fa-check-square-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-circle"></i>fa-circle
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-circle-o"></i>fa-circle-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-clock-o"></i>fa-clock-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-cloud"></i>fa-cloud
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-cloud-download"></i>fa-cloud-download
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-cloud-upload"></i>fa-cloud-upload
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-code"></i>fa-code
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-code-fork"></i>fa-code-fork
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-coffee"></i>fa-coffee
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-cog"></i>fa-cog</div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-cogs"></i>fa-cogs
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-comment"></i>fa-comment
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-comment-o"></i>fa-comment-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-comments"></i>fa-comments
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-comments-o"></i>fa-comments-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-compass"></i>fa-compass
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-credit-card"></i>fa-credit-card
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-crop"></i>fa-crop
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-crosshairs"></i>fa-crosshairs
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-cutlery"></i>fa-cutlery
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-dashboard"></i>fa-dashboard<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-desktop"></i>fa-desktop
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-dot-circle-o"></i>fa-dot-circle-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-download"></i>fa-download
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-edit"></i>fa-edit<span class="text-muted">(alias)</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-ellipsis-h"></i>fa-ellipsis-h
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-ellipsis-v"></i>fa-ellipsis-v
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-envelope"></i>fa-envelope
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-envelope-o"></i>fa-envelope-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-eraser"></i>fa-eraser
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-exchange"></i>fa-exchange
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-exclamation"></i>fa-exclamation
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-exclamation-circle"></i>fa-exclamation-circle
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-exclamation-triangle"></i>fa-exclamation-triangle
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-external-link"></i>fa-external-link
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-external-link-square"></i>fa-external-link-square
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-eye"></i>fa-eye</div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-eye-slash"></i>fa-eye-slash
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-female"></i>fa-female
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-fighter-jet"></i>fa-fighter-jet
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-film"></i>fa-film
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-filter"></i>fa-filter
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-fire"></i>fa-fire
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-fire-extinguisher"></i>fa-fire-extinguisher
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-flag"></i>fa-flag
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-flag-checkered"></i>fa-flag-checkered
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-flag-o"></i>fa-flag-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-flash"></i>fa-flash<span class="text-muted">(alias)</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-flask"></i>fa-flask
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-folder"></i>fa-folder
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-folder-o"></i>fa-folder-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-folder-open"></i>fa-folder-open
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-folder-open-o"></i>fa-folder-open-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-frown-o"></i>fa-frown-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-gamepad"></i>fa-gamepad
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-gavel"></i>fa-gavel
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-gear"></i>fa-gear<span class="text-muted">(alias)</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-gears"></i>fa-gears<span class="text-muted">(alias)</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-gift"></i>fa-gift
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-glass"></i>fa-glass
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-globe"></i>fa-globe
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-group"></i>fa-group
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-hdd-o"></i>fa-hdd-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-headphones"></i>fa-headphones
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-heart"></i>fa-heart
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-heart-o"></i>fa-heart-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-home"></i>fa-home
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-inbox"></i>fa-inbox
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-info"></i>fa-info
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-info-circle"></i>fa-info-circle
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-key"></i>fa-key</div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-keyboard-o"></i>fa-keyboard-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-laptop"></i>fa-laptop
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-leaf"></i>fa-leaf
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-legal"></i>fa-legal<span class="text-muted">(alias)</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-lemon-o"></i>fa-lemon-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-level-down"></i>fa-level-down
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-level-up"></i>fa-level-up
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-lightbulb-o"></i>fa-lightbulb-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-location-arrow"></i>fa-location-arrow
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-lock"></i>fa-lock
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-magic"></i>fa-magic
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-magnet"></i>fa-magnet
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-mail-forward"></i>fa-mail-forward<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-mail-reply"></i>fa-mail-reply<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-mail-reply-all"></i>fa-mail-reply-all
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-male"></i>fa-male
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-map-marker"></i>fa-map-marker
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-meh-o"></i>fa-meh-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-microphone"></i>fa-microphone
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-microphone-slash"></i>fa-microphone-slash
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-minus"></i>fa-minus
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-minus-circle"></i>fa-minus-circle
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-minus-square"></i>fa-minus-square
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-minus-square-o"></i>fa-minus-square-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-mobile"></i>fa-mobile
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-mobile-phone"></i>fa-mobile-phone<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-money"></i>fa-money
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-moon-o"></i>fa-moon-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-music"></i>fa-music
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-pencil"></i>fa-pencil
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-pencil-square"></i>fa-pencil-square
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-pencil-square-o"></i>fa-pencil-square-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-phone"></i>fa-phone
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-phone-square"></i>fa-phone-square
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-picture-o"></i>fa-picture-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-plane"></i>fa-plane
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-plus"></i>fa-plus
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-plus-circle"></i>fa-plus-circle
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-plus-square"></i>fa-plus-square
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-power-off"></i>fa-power-off
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-print"></i>fa-print
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-puzzle-piece"></i>fa-puzzle-piece
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-qrcode"></i>fa-qrcode
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-question"></i>fa-question
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-question-circle"></i>fa-question-circle
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-quote-left"></i>fa-quote-left
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-quote-right"></i>fa-quote-right
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-random"></i>fa-random
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-refresh"></i>fa-refresh
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-reply"></i>fa-reply
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-reply-all"></i>fa-reply-all
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-retweet"></i>fa-retweet
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-road"></i>fa-road
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-rocket"></i>fa-rocket
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-rss"></i>fa-rss</div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-rss-square"></i>fa-rss-square
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-search"></i>fa-search
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-search-minus"></i>fa-search-minus
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-search-plus"></i>fa-search-plus
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-share"></i>fa-share
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-share-square"></i>fa-share-square
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-share-square-o"></i>fa-share-square-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-shield"></i>fa-shield
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-shopping-cart"></i>fa-shopping-cart
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-sign-in"></i>fa-sign-in
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-sign-out"></i>fa-sign-out
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-signal"></i>fa-signal
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-sitemap"></i>fa-sitemap
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-smile-o"></i>fa-smile-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-sort"></i>fa-sort
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-sort-alpha-asc"></i>fa-sort-alpha-asc
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-sort-alpha-desc"></i>fa-sort-alpha-desc
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-sort-amount-asc"></i>fa-sort-amount-asc
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-sort-amount-desc"></i>fa-sort-amount-desc
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-sort-asc"></i>fa-sort-asc
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-sort-desc"></i>fa-sort-desc
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-sort-down"></i>fa-sort-down<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-sort-numeric-asc"></i>fa-sort-numeric-asc
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-sort-numeric-desc"></i>fa-sort-numeric-desc
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-sort-up"></i>fa-sort-up<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-spinner"></i>fa-spinner
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-square"></i>fa-square
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-square-o"></i>fa-square-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-star"></i>fa-star
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-star-half"></i>fa-star-half
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-star-half-empty"></i>fa-star-half-empty<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-star-half-full"></i>fa-star-half-full<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-star-half-o"></i>fa-star-half-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-star-o"></i>fa-star-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-subscript"></i>fa-subscript
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-suitcase"></i>fa-suitcase
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-sun-o"></i>fa-sun-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-superscript"></i>fa-superscript
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-tablet"></i>fa-tablet
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-tachometer"></i>fa-tachometer
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-tag"></i>fa-tag</div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-tags"></i>fa-tags
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-tasks"></i>fa-tasks
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-terminal"></i>fa-terminal
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-thumb-tack"></i>fa-thumb-tack
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-thumbs-down"></i>fa-thumbs-down
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-thumbs-o-down"></i>fa-thumbs-o-down
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-thumbs-o-up"></i>fa-thumbs-o-up
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-thumbs-up"></i>fa-thumbs-up
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-ticket"></i>fa-ticket
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-times"></i>fa-times
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-times-circle"></i>fa-times-circle
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-times-circle-o"></i>fa-times-circle-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-tint"></i>fa-tint
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-toggle-down"></i>fa-toggle-down<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-toggle-left"></i>fa-toggle-left<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-toggle-right"></i>fa-toggle-right<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-toggle-up"></i>fa-toggle-up<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-trash-o"></i>fa-trash-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-trophy"></i>fa-trophy
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-truck"></i>fa-truck
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-umbrella"></i>fa-umbrella
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-unlock"></i>fa-unlock
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-unsorted"></i>fa-unsorted<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-upload"></i>fa-upload
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-user"></i>fa-user
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-video-camera"></i>fa-video-camera
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-volume-down"></i>fa-volume-down
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-volume-off"></i>fa-volume-off
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-volume-up"></i>fa-volume-up
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-warning"></i>fa-warning<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-wheelchair"></i>fa-wheelchair
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-wrench"></i>fa-wrench
                                                    </div>
                                                </div>
                                                <h3 class="block-heading">Form Control Icons</h3>

                                                <div class="row row-icons">
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-check-square"></i>fa-check-square
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-check-square-o"></i>fa-check-square-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-circle"></i>fa-circle
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-circle-o"></i>fa-circle-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-dot-circle-o"></i>fa-dot-circle-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-minus-square"></i>fa-minus-square
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-minus-square-o"></i>fa-minus-square-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-plus-square"></i>fa-plus-square
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-plus-square-o"></i>fa-plus-square-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-square"></i>fa-square
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-square-o"></i>fa-square-o
                                                    </div>
                                                </div>
                                                <h3 class="block-heading">Currency Icons</h3>

                                                <div class="row row-icons">
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-bitcoin"></i>fa-bitcoin<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-btc"></i>fa-btc</div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-cny"></i>fa-cny<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-dollar"></i>fa-dollar<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-eur"></i>fa-eur</div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-euro"></i>fa-euro<span class="text-muted">(alias)</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-gbp"></i>fa-gbp</div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-inr"></i>fa-inr</div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-jpy"></i>fa-jpy</div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-krw"></i>fa-krw</div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-money"></i>fa-money
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-rmb"></i>fa-rmb<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-rouble"></i>fa-rouble<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-rub"></i>fa-rub</div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-ruble"></i>fa-ruble<span class="text-muted">(alias)</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-rupee"></i>fa-rupee<span class="text-muted">(alias)</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-try"></i>fa-try</div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-turkish-lira"></i>fa-turkish-lira<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-usd"></i>fa-usd</div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-won"></i>fa-won<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-yen"></i>fa-yen<span class="text-muted">(alias)</span></div>
                                                </div>
                                                <h3 class="block-heading">Text Editor Icons</h3>

                                                <div class="row row-icons">
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-align-center"></i>fa-align-center
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-align-justify"></i>fa-align-justify
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-align-left"></i>fa-align-left
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-align-right"></i>fa-align-right
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-bold"></i>fa-bold
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-chain"></i>fa-chain<span class="text-muted">(alias)</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-chain-broken"></i>fa-chain-broken
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-clipboard"></i>fa-clipboard
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-columns"></i>fa-columns
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-copy"></i>fa-copy<span class="text-muted">(alias)</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-cut"></i>fa-cut<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-dedent"></i>fa-dedent<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-eraser"></i>fa-eraser
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-file"></i>fa-file
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-file-o"></i>fa-file-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-file-text"></i>fa-file-text
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-file-text-o"></i>fa-file-text-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-files-o"></i>fa-files-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-floppy-o"></i>fa-floppy-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-font"></i>fa-font
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-indent"></i>fa-indent
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-italic"></i>fa-italic
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-link"></i>fa-link
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-list"></i>fa-list
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-list-alt"></i>fa-list-alt
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-list-ol"></i>fa-list-ol
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-list-ul"></i>fa-list-ul
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-outdent"></i>fa-outdent
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-paperclip"></i>fa-paperclip
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-paste"></i>fa-paste<span class="text-muted">(alias)</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-repeat"></i>fa-repeat
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-rotate-left"></i>fa-rotate-left<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-rotate-right"></i>fa-rotate-right<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-save"></i>fa-save<span class="text-muted">(alias)</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-scissors"></i>fa-scissors
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-strikethrough"></i>fa-strikethrough
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-table"></i>fa-table
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-text-height"></i>fa-text-height
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-text-width"></i>fa-text-width
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-th"></i>fa-th</div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-th-large"></i>fa-th-large
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-th-list"></i>fa-th-list
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-underline"></i>fa-underline
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-undo"></i>fa-undo
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-unlink"></i>fa-unlink<span class="text-muted">(alias)</span></div>
                                                </div>
                                                <h3 class="block-heading">Directional Icons</h3>

                                                <div class="row row-icons">
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-angle-double-down"></i>fa-angle-double-down
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-angle-double-left"></i>fa-angle-double-left
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-angle-double-right"></i>fa-angle-double-right
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-angle-double-up"></i>fa-angle-double-up
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-angle-down"></i>fa-angle-down
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-angle-left"></i>fa-angle-left
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-angle-right"></i>fa-angle-right
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-angle-up"></i>fa-angle-up
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-arrow-circle-down"></i>fa-arrow-circle-down
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-arrow-circle-left"></i>fa-arrow-circle-left
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-arrow-circle-o-down"></i>fa-arrow-circle-o-down
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-arrow-circle-o-left"></i>fa-arrow-circle-o-left
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-arrow-circle-o-right"></i>fa-arrow-circle-o-right
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-arrow-circle-o-up"></i>fa-arrow-circle-o-up
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-arrow-circle-right"></i>fa-arrow-circle-right
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-arrow-circle-up"></i>fa-arrow-circle-up
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-arrow-down"></i>fa-arrow-down
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-arrow-left"></i>fa-arrow-left
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-arrow-right"></i>fa-arrow-right
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-arrow-up"></i>fa-arrow-up
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-caret-down"></i>fa-caret-down
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-caret-left"></i>fa-caret-left
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-caret-right"></i>fa-caret-right
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-caret-square-o-down"></i>fa-caret-square-o-down
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-caret-square-o-left"></i>fa-caret-square-o-left
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-caret-square-o-right"></i>fa-caret-square-o-right
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-caret-square-o-up"></i>fa-caret-square-o-up
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-caret-up"></i>fa-caret-up
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-chevron-circle-down"></i>fa-chevron-circle-down
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-chevron-circle-left"></i>fa-chevron-circle-left
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-chevron-circle-right"></i>fa-chevron-circle-right
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-chevron-circle-up"></i>fa-chevron-circle-up
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-chevron-down"></i>fa-chevron-down
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-chevron-left"></i>fa-chevron-left
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-chevron-right"></i>fa-chevron-right
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-chevron-up"></i>fa-chevron-up
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-hand-o-down"></i>fa-hand-o-down
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-hand-o-left"></i>fa-hand-o-left
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-hand-o-right"></i>fa-hand-o-right
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-hand-o-up"></i>fa-hand-o-up
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-long-arrow-down"></i>fa-long-arrow-down
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-long-arrow-left"></i>fa-long-arrow-left
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-long-arrow-right"></i>fa-long-arrow-right
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-long-arrow-up"></i>fa-long-arrow-up
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-toggle-down"></i>fa-toggle-down<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-toggle-left"></i>fa-toggle-left<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-toggle-right"></i>fa-toggle-right<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-toggle-up"></i>fa-toggle-up<span class="text-muted">(alias)</span></div>
                                                </div>
                                                <h3 class="block-heading">Video Player Icons</h3>

                                                <div class="row row-icons">
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-arrows-alt"></i>fa-arrows-alt
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-backward"></i>fa-backward
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-compress"></i>fa-compress
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-eject"></i>fa-eject
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-expand"></i>fa-expand
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-fast-backward"></i>fa-fast-backward
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-fast-forward"></i>fa-fast-forward
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-forward"></i>fa-forward
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-pause"></i>fa-pause
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-play"></i>fa-play
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-play-circle"></i>fa-play-circle
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-play-circle-o"></i>fa-play-circle-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-step-backward"></i>fa-step-backward
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-step-forward"></i>fa-step-forward
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-stop"></i>fa-stop
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-youtube-play"></i>fa-youtube-play
                                                    </div>
                                                </div>
                                                <h3 class="block-heading">Brand Icons</h3>

                                                <div class="note note-success">
                                                    <ul class="mbn list-unstyled">
                                                        <li>All brand icons are trademarks of their respective owners.
                                                        </li>
                                                        <li>The use of these trademarks does not indicate endorsement
                                                            of the trademark holder by Font Awesome, nor vice versa.
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="row row-icons">
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-adn"></i>fa-adn</div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-android"></i>fa-android
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-apple"></i>fa-apple
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-bitbucket"></i>fa-bitbucket
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-bitbucket-square"></i>fa-bitbucket-square
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-bitcoin"></i>fa-bitcoin<span class="text-muted">(alias)</span></div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-btc"></i>fa-btc</div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-css3"></i>fa-css3
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-dribbble"></i>fa-dribbble
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-dropbox"></i>fa-dropbox
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-facebook"></i>fa-facebook
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-facebook-square"></i>fa-facebook-square
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-flickr"></i>fa-flickr
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-foursquare"></i>fa-foursquare
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-github"></i>fa-github
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-github-alt"></i>fa-github-alt
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-github-square"></i>fa-github-square
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-gittip"></i>fa-gittip
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-google-plus"></i>fa-google-plus
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-google-plus-square"></i>fa-google-plus-square
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-html5"></i>fa-html5
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-instagram"></i>fa-instagram
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-linkedin"></i>fa-linkedin
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-linkedin-square"></i>fa-linkedin-square
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-linux"></i>fa-linux
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-maxcdn"></i>fa-maxcdn
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-pagelines"></i>fa-pagelines
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-pinterest"></i>fa-pinterest
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-pinterest-square"></i>fa-pinterest-square
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-renren"></i>fa-renren
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-skype"></i>fa-skype
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-stack-exchange"></i>fa-stack-exchange
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-stack-overflow"></i>fa-stack-overflow
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-trello"></i>fa-trello
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-tumblr"></i>fa-tumblr
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-tumblr-square"></i>fa-tumblr-square
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-twitter"></i>fa-twitter
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-twitter-square"></i>fa-twitter-square
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-vimeo-square"></i>fa-vimeo-square
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-vk"></i>fa-vk</div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-weibo"></i>fa-weibo
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-windows"></i>fa-windows
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-xing"></i>fa-xing
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-xing-square"></i>fa-xing-square
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-youtube"></i>fa-youtube
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-youtube-play"></i>fa-youtube-play
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-youtube-square"></i>fa-youtube-square
                                                    </div>
                                                </div>
                                                <h3 class="block-heading">Medical Icons</h3>

                                                <div class="row row-icons">
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-ambulance"></i>fa-ambulance
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-h-square"></i>fa-h-square
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-hospital-o"></i>fa-hospital-o
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-medkit"></i>fa-medkit
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-plus-square"></i>fa-plus-square
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-stethoscope"></i>fa-stethoscope
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-user-md"></i>fa-user-md
                                                    </div>
                                                    <div class="col-md-4 col-sm-4"><i class="fa fa-wheelchair"></i>fa-wheelchair
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="glyphicons-tab">
                                                
                                                <div class="row row-icons">
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-adjust"></i><span>glyphicon-adjust</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-align-center"></i><span>glyphicon-align-center</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-align-justify"></i><span>glyphicon-align-justify</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-align-left"></i><span>glyphicon-align-left</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-align-right"></i><span>glyphicon-align-right</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-arrow-down"></i><span>glyphicon-arrow-down</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-arrow-left"></i><span>glyphicon-arrow-left</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-arrow-right"></i><span>glyphicon-arrow-right</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-arrow-up"></i><span>glyphicon-arrow-up</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-asterisk"></i><span>glyphicon-asterisk</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-backward"></i><span>glyphicon-backward</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-ban-circle"></i><span>glyphicon-ban-circle</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-barcode"></i><span>glyphicon-barcode</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-bell"></i><span>glyphicon-bell</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-bold"></i><span>glyphicon-bold</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-book"></i><span>glyphicon-book</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-bookmark"></i><span>glyphicon-bookmark</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-briefcase"></i><span>glyphicon-briefcase</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-bullhorn"></i><span>glyphicon-bullhorn</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-calendar"></i><span>glyphicon-calendar</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-camera"></i><span>glyphicon-camera</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-certificate"></i><span>glyphicon-certificate</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-check"></i><span>glyphicon-check</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-chevron-down"></i><span>glyphicon-chevron-down</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-chevron-left"></i><span>glyphicon-chevron-left</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-chevron-right"></i><span>glyphicon-chevron-right</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-chevron-up"></i><span>glyphicon-chevron-up</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-circle-arrow-down"></i><span>glyphicon-circle-arrow-down</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-circle-arrow-left"></i><span>glyphicon-circle-arrow-left</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-circle-arrow-right"></i><span>glyphicon-circle-arrow-right</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-circle-arrow-up"></i><span>glyphicon-circle-arrow-up</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-cloud"></i><span>glyphicon-cloud</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-cloud-download"></i><span>glyphicon-cloud-download</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-cloud-upload"></i><span>glyphicon-cloud-upload</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-cog"></i><span>glyphicon-cog</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-collapse-down"></i><span>glyphicon-collapse-down</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-collapse-up"></i><span>glyphicon-collapse-up</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-comment"></i><span>glyphicon-comment</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-compressed"></i><span>glyphicon-compressed</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-copyright-mark"></i><span>glyphicon-copyright-mark</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-credit-card"></i><span>glyphicon-credit-card</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-cutlery"></i><span>glyphicon-cutlery</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-dashboard"></i><span>glyphicon-dashboard</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-download"></i><span>glyphicon-download</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-download-alt"></i><span>glyphicon-download-alt</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-earphone"></i><span>glyphicon-earphone</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-edit"></i><span>glyphicon-edit</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-eject"></i><span>glyphicon-eject</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-envelope"></i><span>glyphicon-envelope</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-euro"></i><span>glyphicon-euro</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-exclamation-sign"></i><span>glyphicon-exclamation-sign</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-expand"></i><span>glyphicon-expand</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-export"></i><span>glyphicon-export</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-eye-close"></i><span>glyphicon-eye-close</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-eye-open"></i><span>glyphicon-eye-open</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-facetime-video"></i><span>glyphicon-facetime-video</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-fast-backward"></i><span>glyphicon-fast-backward</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-fast-forward"></i><span>glyphicon-fast-forward</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-file"></i><span>glyphicon-file</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-film"></i><span>glyphicon-film</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-filter"></i><span>glyphicon-filter</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-fire"></i><span>glyphicon-fire</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-flag"></i><span>glyphicon-flag</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-flash"></i><span>glyphicon-flash</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-floppy-disk"></i><span>glyphicon-floppy-disk</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-floppy-open"></i><span>glyphicon-floppy-open</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-floppy-remove"></i><span>glyphicon-floppy-remove</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-floppy-save"></i><span>glyphicon-floppy-save</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-floppy-saved"></i><span>glyphicon-floppy-saved</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-folder-close"></i><span>glyphicon-folder-close</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-folder-open"></i><span>glyphicon-folder-open</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-font"></i><span>glyphicon-font</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-forward"></i><span>glyphicon-forward</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-fullscreen"></i><span>glyphicon-fullscreen</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-gbp"></i><span>glyphicon-gbp</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-gift"></i><span>glyphicon-gift</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-glass"></i><span>glyphicon-glass</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-globe"></i><span>glyphicon-globe</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-hand-down"></i><span>glyphicon-hand-down</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-hand-left"></i><span>glyphicon-hand-left</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-hand-right"></i><span>glyphicon-hand-right</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-hand-up"></i><span>glyphicon-hand-up</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-hd-video"></i><span>glyphicon-hd-video</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-hdd"></i><span>glyphicon-hdd</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-header"></i><span>glyphicon-header</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-headphones"></i><span>glyphicon-headphones</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-heart"></i><span>glyphicon-heart</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-heart-empty"></i><span>glyphicon-heart-empty</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-home"></i><span>glyphicon-home</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-import"></i><span>glyphicon-import</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-inbox"></i><span>glyphicon-inbox</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-indent-left"></i><span>glyphicon-indent-left</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-indent-right"></i><span>glyphicon-indent-right</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-info-sign"></i><span>glyphicon-info-sign</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-italic"></i><span>glyphicon-italic</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-leaf"></i><span>glyphicon-leaf</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-link"></i><span>glyphicon-link</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-list"></i><span>glyphicon-list</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-list-alt"></i><span>glyphicon-list-alt</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-lock"></i><span>glyphicon-lock</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-log-in"></i><span>glyphicon-log-in</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-log-out"></i><span>glyphicon-log-out</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-magnet"></i><span>glyphicon-magnet</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-map-marker"></i><span>glyphicon-map-marker</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-minus"></i><span>glyphicon-minus</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-minus-sign"></i><span>glyphicon-minus-sign</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-move"></i><span>glyphicon-move</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-music"></i><span>glyphicon-music</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-new-window"></i><span>glyphicon-new-window</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-off"></i><span>glyphicon-off</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-ok"></i><span>glyphicon-ok</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-ok-circle"></i><span>glyphicon-ok-circle</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-ok-sign"></i><span>glyphicon-ok-sign</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-open"></i><span>glyphicon-open</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-paperclip"></i><span>glyphicon-paperclip</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-pause"></i><span>glyphicon-pause</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-pencil"></i><span>glyphicon-pencil</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-phone"></i><span>glyphicon-phone</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-phone-alt"></i><span>glyphicon-phone-alt</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-picture"></i><span>glyphicon-picture</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-plane"></i><span>glyphicon-plane</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-play"></i><span>glyphicon-play</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-play-circle"></i><span>glyphicon-play-circle</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-plus"></i><span>glyphicon-plus</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-plus-sign"></i><span>glyphicon-plus-sign</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-print"></i><span>glyphicon-print</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-pushpin"></i><span>glyphicon-pushpin</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-qrcode"></i><span>glyphicon-qrcode</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-question-sign"></i><span>glyphicon-question-sign</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-random"></i><span>glyphicon-random</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-record"></i><span>glyphicon-record</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-refresh"></i><span>glyphicon-refresh</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-registration-mark"></i><span>glyphicon-registration-mark</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-remove"></i><span>glyphicon-remove</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-remove-circle"></i><span>glyphicon-remove-circle</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-remove-sign"></i><span>glyphicon-remove-sign</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-repeat"></i><span>glyphicon-repeat</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-resize-full"></i><span>glyphicon-resize-full</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-resize-horizontal"></i><span>glyphicon-resize-horizontal</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-resize-small"></i><span>glyphicon-resize-small</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-resize-vertical"></i><span>glyphicon-resize-vertical</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-retweet"></i><span>glyphicon-retweet</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-road"></i><span>glyphicon-road</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-save"></i><span>glyphicon-save</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-saved"></i><span>glyphicon-saved</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-screenshot"></i><span>glyphicon-screenshot</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-sd-video"></i><span>glyphicon-sd-video</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-search"></i><span>glyphicon-search</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-send"></i><span>glyphicon-send</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-share"></i><span>glyphicon-share</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-share-alt"></i><span>glyphicon-share-alt</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-shopping-cart"></i><span>glyphicon-shopping-cart</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-signal"></i><span>glyphicon-signal</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-sort"></i><span>glyphicon-sort</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-sort-by-alphabet"></i><span>glyphicon-sort-by-alphabet</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-sort-by-alphabet-alt"></i><span>glyphicon-sort-by-alphabet-alt</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-sort-by-attributes"></i><span>glyphicon-sort-by-attributes</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-sort-by-attributes-alt"></i><span>glyphicon-sort-by-attributes-alt</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-sort-by-order"></i><span>glyphicon-sort-by-order</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-sort-by-order-alt"></i><span>glyphicon-sort-by-order-alt</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-sound-5-1"></i><span>glyphicon-sound-5-1</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-sound-6-1"></i><span>glyphicon-sound-6-1</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-sound-7-1"></i><span>glyphicon-sound-7-1</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-sound-dolby"></i><span>glyphicon-sound-dolby</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-sound-stereo"></i><span>glyphicon-sound-stereo</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-star"></i><span>glyphicon-star</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-star-empty"></i><span>glyphicon-star-empty</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-stats"></i><span>glyphicon-stats</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-step-backward"></i><span>glyphicon-step-backward</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-step-forward"></i><span>glyphicon-step-forward</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-stop"></i><span>glyphicon-stop</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-subtitles"></i><span>glyphicon-subtitles</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-tag"></i><span>glyphicon-tag</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-tags"></i><span>glyphicon-tags</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-tasks"></i><span>glyphicon-tasks</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-text-height"></i><span>glyphicon-text-height</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-text-width"></i><span>glyphicon-text-width</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-th"></i><span>glyphicon-th</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-th-large"></i><span>glyphicon-th-large</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-th-list"></i><span>glyphicon-th-list</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-thumbs-down"></i><span>glyphicon-thumbs-down</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-thumbs-up"></i><span>glyphicon-thumbs-up</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-time"></i><span>glyphicon-time</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-tint"></i><span>glyphicon-tint</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-tower"></i><span>glyphicon-tower</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-transfer"></i><span>glyphicon-transfer</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-trash"></i><span>glyphicon-trash</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-tree-conifer"></i><span>glyphicon-tree-conifer</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-tree-deciduous"></i><span>glyphicon-tree-deciduous</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-unchecked"></i><span>glyphicon-unchecked</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-upload"></i><span>glyphicon-upload</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-usd"></i><span>glyphicon-usd</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-user"></i><span>glyphicon-user</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-volume-down"></i><span>glyphicon-volume-down</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-volume-off"></i><span>glyphicon-volume-off</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-volume-up"></i><span>glyphicon-volume-up</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-warning-sign"></i><span>glyphicon-warning-sign</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-wrench"></i><span>glyphicon-wrench</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-zoom-in"></i><span>glyphicon-zoom-in</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="glyphicon glyphicon-zoom-out"></i><span>glyphicon-zoom-out</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade in active" id="simpleline-tab">
                                                
                                                <div class="row row-icons">
                                                    <div class="col-md-4 col-sm-6"><i class="icon-user" aria-hidden="true"></i><span>icon-user</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-user-female" aria-hidden="true"></i><span>icon-user-female</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-users" aria-hidden="true"></i><span>icon-users</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-user-follow" aria-hidden="true"></i><span>icon-user-follow</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-user-following" aria-hidden="true"></i><span>icon-user-following</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-user-unfollow" aria-hidden="true"></i><span>icon-user-unfollow</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-trophy" aria-hidden="true"></i><span>icon-trophy</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-speedometer" aria-hidden="true"></i><span>icon-speedometer</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-social-youtube" aria-hidden="true"></i><span>icon-social-youtube</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-social-twitter" aria-hidden="true"></i><span>icon-social-twitter</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-social-tumblr" aria-hidden="true"></i><span>icon-social-tumblr</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-social-facebook" aria-hidden="true"></i><span>icon-social-facebook</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-social-dropbox" aria-hidden="true"></i><span>icon-social-dropbox</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-social-dribbble" aria-hidden="true"></i><span>icon-social-dribbble</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-shield" aria-hidden="true"></i><span>icon-shield</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-screen-tablet" aria-hidden="true"></i><span>icon-screen-tablet</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-screen-smartphone" aria-hidden="true"></i><span>icon-screen-smartphone</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-screen-desktop" aria-hidden="true"></i><span>icon-screen-desktop</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-plane" aria-hidden="true"></i><span>icon-plane</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-notebook" aria-hidden="true"></i><span>icon-notebook</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-moustache" aria-hidden="true"></i><span>icon-moustache</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-mouse" aria-hidden="true"></i><span>icon-mouse</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-magnet" aria-hidden="true"></i><span>icon-magnet</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-magic-wand" aria-hidden="true"></i><span>icon-magic-wand</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-hourglass" aria-hidden="true"></i><span>icon-hourglass</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-graduation" aria-hidden="true"></i><span>icon-graduation</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-ghost" aria-hidden="true"></i><span>icon-ghost</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-game-controller" aria-hidden="true"></i><span>icon-game-controller</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-fire" aria-hidden="true"></i><span>icon-fire</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-eyeglasses" aria-hidden="true"></i><span>icon-eyeglasses</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-envelope-open" aria-hidden="true"></i><span>icon-envelope-open</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-envelope-letter" aria-hidden="true"></i><span>icon-envelope-letter</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-energy" aria-hidden="true"></i><span>icon-energy</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-emoticon-smile" aria-hidden="true"></i><span>icon-emoticon-smile</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-disc" aria-hidden="true"></i><span>icon-disc</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-cursor-move" aria-hidden="true"></i><span>icon-cursor-move</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-crop" aria-hidden="true"></i><span>icon-crop</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-credit-card" aria-hidden="true"></i><span>icon-credit-card</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-chemistry" aria-hidden="true"></i><span>icon-chemistry</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-bell" aria-hidden="true"></i><span>icon-bell</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-badge" aria-hidden="true"></i><span>icon-badge</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-anchor" aria-hidden="true"></i><span>icon-anchor</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-action-redo" aria-hidden="true"></i><span>icon-action-redo</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-action-undo" aria-hidden="true"></i><span>icon-action-undo</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-bag" aria-hidden="true"></i><span>icon-bag</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-basket" aria-hidden="true"></i><span>icon-basket</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-basket-loaded" aria-hidden="true"></i><span>icon-basket-loaded</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-book-open" aria-hidden="true"></i><span>icon-book-open</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-briefcase" aria-hidden="true"></i><span>icon-briefcase</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-bubbles" aria-hidden="true"></i><span>icon-bubbles</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-calculator" aria-hidden="true"></i><span>icon-calculator</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-call-end" aria-hidden="true"></i><span>icon-call-end</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-call-in" aria-hidden="true"></i><span>icon-call-in</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-call-out" aria-hidden="true"></i><span>icon-call-out</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-compass" aria-hidden="true"></i><span>icon-compass</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-cup" aria-hidden="true"></i><span>icon-cup</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-diamond" aria-hidden="true"></i><span>icon-diamond</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-direction" aria-hidden="true"></i><span>icon-direction</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-directions" aria-hidden="true"></i><span>icon-directions</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-docs" aria-hidden="true"></i><span>icon-docs</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-drawer" aria-hidden="true"></i><span>icon-drawer</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-drop" aria-hidden="true"></i><span>icon-drop</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-earphones" aria-hidden="true"></i><span>icon-earphones</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-earphones-alt" aria-hidden="true"></i><span>icon-earphones-alt</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-feed" aria-hidden="true"></i><span>icon-feed</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-film" aria-hidden="true"></i><span>icon-film</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-folder-alt" aria-hidden="true"></i><span>icon-folder-alt</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-frame" aria-hidden="true"></i><span>icon-frame</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-globe" aria-hidden="true"></i><span>icon-globe</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-globe-alt" aria-hidden="true"></i><span>icon-globe-alt</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-handbag" aria-hidden="true"></i><span>icon-handbag</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-layers" aria-hidden="true"></i><span>icon-layers</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-map" aria-hidden="true"></i><span>icon-map</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-picture" aria-hidden="true"></i><span>icon-picture</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-pin" aria-hidden="true"></i><span>icon-pin</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-playlist" aria-hidden="true"></i><span>icon-playlist</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-present" aria-hidden="true"></i><span>icon-present</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-printer" aria-hidden="true"></i><span>icon-printer</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-puzzle" aria-hidden="true"></i><span>icon-puzzle</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-speech" aria-hidden="true"></i><span>icon-speech</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-vector" aria-hidden="true"></i><span>icon-vector</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-wallet" aria-hidden="true"></i><span>icon-wallet</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-arrow-down" aria-hidden="true"></i><span>icon-arrow-down</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-arrow-left" aria-hidden="true"></i><span>icon-arrow-left</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-arrow-right" aria-hidden="true"></i><span>icon-arrow-right</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-arrow-up" aria-hidden="true"></i><span>icon-arrow-up</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-bar-chart" aria-hidden="true"></i><span>icon-bar-chart</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-bulb" aria-hidden="true"></i><span>icon-bulb</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-calendar" aria-hidden="true"></i><span>icon-calendar</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-control-end" aria-hidden="true"></i><span>icon-control-end</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-control-forward" aria-hidden="true"></i><span>icon-control-forward</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-control-pause" aria-hidden="true"></i><span>icon-control-pause</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-control-play" aria-hidden="true"></i><span>icon-control-play</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-control-rewind" aria-hidden="true"></i><span>icon-control-rewind</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-control-start" aria-hidden="true"></i><span>icon-control-start</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-cursor" aria-hidden="true"></i><span>icon-cursor</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-dislike" aria-hidden="true"></i><span>icon-dislike</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-equalizer" aria-hidden="true"></i><span>icon-equalizer</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-graph" aria-hidden="true"></i><span>icon-graph</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-grid" aria-hidden="true"></i><span>icon-grid</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-home" aria-hidden="true"></i><span>icon-home</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-like" aria-hidden="true"></i><span>icon-like</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-list" aria-hidden="true"></i><span>icon-list</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-login" aria-hidden="true"></i><span>icon-login</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-logout" aria-hidden="true"></i><span>icon-logout</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-loop" aria-hidden="true"></i><span>icon-loop</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-microphone" aria-hidden="true"></i><span>icon-microphone</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-music-tone" aria-hidden="true"></i><span>icon-music-tone</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-music-tone-alt" aria-hidden="true"></i><span>icon-music-tone-alt</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-note" aria-hidden="true"></i><span>icon-note</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-pencil" aria-hidden="true"></i><span>icon-pencil</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-pie-chart" aria-hidden="true"></i><span>icon-pie-chart</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-question" aria-hidden="true"></i><span>icon-question</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-rocket" aria-hidden="true"></i><span>icon-rocket</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-share" aria-hidden="true"></i><span>icon-share</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-share-alt" aria-hidden="true"></i><span>icon-share-alt</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-shuffle" aria-hidden="true"></i><span>icon-shuffle</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-size-actual" aria-hidden="true"></i><span>icon-size-actual</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-size-fullscreen" aria-hidden="true"></i><span>icon-size-fullscreen</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-support" aria-hidden="true"></i><span>icon-support</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-tag" aria-hidden="true"></i><span>icon-tag</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-trash" aria-hidden="true"></i><span>icon-trash</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-umbrella" aria-hidden="true"></i><span>icon-umbrella</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-wrench" aria-hidden="true"></i><span>icon-wrench</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-ban" aria-hidden="true"></i><span>icon-ban</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-bubble" aria-hidden="true"></i><span>icon-bubble</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-camcorder" aria-hidden="true"></i><span>icon-camcorder</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-camera" aria-hidden="true"></i><span>icon-camera</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-check" aria-hidden="true"></i><span>icon-check</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-clock" aria-hidden="true"></i><span>icon-clock</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-close" aria-hidden="true"></i><span>icon-close</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-cloud-download" aria-hidden="true"></i><span>icon-cloud-download</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-cloud-upload" aria-hidden="true"></i><span>icon-cloud-upload</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-doc" aria-hidden="true"></i><span>icon-doc</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-envelope" aria-hidden="true"></i><span>icon-envelope</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-eye" aria-hidden="true"></i><span>icon-eye</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-flag" aria-hidden="true"></i><span>icon-flag</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-folder" aria-hidden="true"></i><span>icon-folder</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-heart" aria-hidden="true"></i><span>icon-heart</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-info" aria-hidden="true"></i><span>icon-info</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-key" aria-hidden="true"></i><span>icon-key</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-link" aria-hidden="true"></i><span>icon-link</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-lock" aria-hidden="true"></i><span>icon-lock</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-lock-open" aria-hidden="true"></i><span>icon-lock-open</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-magnifier" aria-hidden="true"></i><span>icon-magnifier</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-magnifier-add" aria-hidden="true"></i><span>icon-magnifier-add</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-magnifier-remove" aria-hidden="true"></i><span>icon-magnifier-remove</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-paper-clip" aria-hidden="true"></i><span>icon-paper-clip</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-paper-plane" aria-hidden="true"></i><span>icon-paper-plane</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-plus" aria-hidden="true"></i><span>icon-plus</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-pointer" aria-hidden="true"></i><span>icon-pointer</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-power" aria-hidden="true"></i><span>icon-power</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-refresh" aria-hidden="true"></i><span>icon-refresh</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-reload" aria-hidden="true"></i><span>icon-reload</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-settings" aria-hidden="true"></i><span>icon-settings</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-star" aria-hidden="true"></i><span>icon-star</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-symbol-female" aria-hidden="true"></i><span>icon-symbol-female</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-symbol-male" aria-hidden="true"></i><span>icon-symbol-male</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-target" aria-hidden="true"></i><span>icon-target</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-volume-1" aria-hidden="true"></i><span>icon-volume-1</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-volume-2" aria-hidden="true"></i><span>icon-volume-2</span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6"><i class="icon-volume-off" aria-hidden="true"></i><span>icon-volume-off</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--END CONTENT--></div>
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
<script src="/js/jquery.treegrid.js"></script>

<!--LOADING SCRIPTS FOR PAGE--><!--CORE JAVASCRIPT-->
<script src="/js/mtek_core.js"></script>
<script src="/js/mtek_system-layout.js"></script>
<script src="/js/jquery-responsive.js"></script>
<script src="/js/candor.portal.js" ></script>
</body>
</html>
<script>
$.extend($.fn.treegrid.defaults, {
    expanderExpandedClass: 'glyphicon glyphicon-chevron-down',
    expanderCollapsedClass: 'glyphicon glyphicon-chevron-right'
});

jQuery(document).ready(function () {
    "use strict";
    JQueryResponsive.init();
    Layout.init();
	
	$('.tree-projects').treegrid({
		expanderExpandedClass: 'fa fa-caret-down',
		expanderCollapsedClass: 'fa fa-caret-right'
	});
	
	//table_treegrid.init();
});


</script>

