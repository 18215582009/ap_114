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
    <title>个人中心</title>
    <?=Form::cssmin();?>
    <link rel='stylesheet' href='/theme/client/css/user_center.css' type='text/css' media='screen' />
</head>
<body class="font-source-sans-pro sidebar-color-white">
<div class="fluid">
    <?php include '../../user_center/view/navigation.html.php';?>

    <div id="wrapper"><!--BEGIN PAGE WRAPPER-->
        <div id="page-wrapper">

            <!--BEGIN SIDEBAR MAIN-->
            <?php include '../../user_center/view/left_easy.html.php';?>
            <!--END SIDEBAR MAIN-->

            <!--BEGIN PAGE CONTENT-->
            <div class="page-content"><!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div class="box-content"><!--BEGIN CONTENT-->
                    <div class="content">
                        <!--div class="row text-center">
                            <div class="services-list clearfix">
                                <div class="col-sm-4 step">
                                    <img src="/theme/client/img/user-center-sale.png" alt="闪电卖房">
                                    <h4 class="text-uppercase"><strong>闪电卖房</strong></h4>
                                    <p class="lead">为您提供安全、便捷的房屋出售服务.</p>
                                    <br>
                                </div>
                                <div class="col-sm-4 step">
                                    <img src="/theme/client/img/user-center-rent.png" alt="出租合租">
                                    <h4 class="text-uppercase"><strong>出租 &amp; 合租</strong></h4>
                                    <p class="lead">方便、快捷的发布您的出租需求.</p>
                                    <br>
                                </div>
                                <div class="col-sm-4 step">
                                    <img src="/theme/client/img/user-center-guide.png" alt="购房指南">
                                    <h4 class="text-uppercase"><strong>购房指南</strong></h4>
                                    <p class="lead">提供新房、二手房买卖等权威指南.</p>
                                    <br>
                                </div>
                            </div>
                        </div-->
                        <div class="row">

                        </div>
                    </div>
                    <!--END CONTENT-->
                </div>
            </div>
            <!--END PAGE CONTENT-->
        </div>
        <!--END PAGE WRAPPER-->
    </div>
    <!--BEGIN FOOTER-->
    <!--END FOOTER-->
</div>
<?
$jsArr = array(
    "/js/plugins/artDialog/artDialog.source.js?skins=default",
    "/js/plugins/artDialog/plugins/iframeTools.js"
);
Form::jsmin($jsArr);
?>

<script>
    jQuery(document).ready(function () {
        "use strict";
        JQueryResponsive.init();
        Layout.init();
        //page_pricing_table.init();
        //$("#main").height($(window).height()-60);
    });

    jQuery(document).ready(function () {
        index.init();
    });

</script>
</body>
</html>
