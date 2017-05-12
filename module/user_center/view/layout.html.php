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
    <?php include 'navigation.html.php';?>

    <div id="wrapper"><!--BEGIN PAGE WRAPPER-->
        <div id="page-wrapper">

            <!--BEGIN SIDEBAR MAIN-->
            <?php include 'left_easy.html.php';?>
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

                        <div class="row mbxxl account">
                            <div class="left col-sm-4">
                                <div class="panel">
                                    <div class="panel-body">
                                        <h2 class="mtn mbm">帐户信息<span class="unit"></span></h2>
                                        <p class="mbm">帐户类型:<span class="mlm">普通帐户</span><i class="icon-question" data-toggle="tooltip" data-placement="right" title="Tooltip on right"></i> </p>
                                        <p>发布出售: <span class="badge badge-success mlm">1套</span><a href="#" class="mlm">详情&gt;</a></p>
                                        <p>发布出租: <span class="badge badge-warning mlm">1套</span><a href="#" class="mlm">详情&gt;</a></p>
                                        <p>我的收藏: <span class="badge badge-default mlm">21条</span><a href="#" class="mlm">详情&gt;</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="middle col-sm-4">
                                <div class="panel">
                                    <div class="panel-body lineb">
                                        <h3 class="info-title mtn">委托卖房</h3>
                                        <small>权威房屋发布</small>
                                        <a href="#" class="mlm pub">发 布</a>
                                    </div>
                                    <div class="panel-body">
                                        <h3 class="info-title mtn">发布出租</h3>
                                        <small>急时、方便、快捷的发布整租、合租</small>
                                        <a href="#" class="mlm pub">发 布</a>
                                    </div>
                                </div>
                            </div>
                            <div class="right col-sm-4">
                                <div class="panel">
                                    <div class="panel-body">
                                        <a class="u-supplement service" href="#" target="_blank" data-toggle="tooltip" data-placement="bottom" title="您还没有使用过专家服务，点击查看服务详情">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-4 col-sm-4">
                                <!-- Services box element modern style -->
                                <div class="services_box services_box--modern sb--hasicon">
                                    <!-- Service box wrapper -->
                                    <div class="services_box__inner clearfix">
                                        <!-- Icon content -->
                                        <div class="services_box__icon">
                                            <!-- Icon wrapper -->
                                            <div class="services_box__icon-inner">
                                                <!-- Icon = .icon-noun_65754  -->
                                                <span class="services_box__fonticon glyphicon glyphicon-bullhorn" style="margin:-2px 20px auto"></span>
                                            </div>
                                            <!--/ Icon wrapper -->
                                        </div>
                                        <!--/ Icon content -->

                                        <!-- Content -->
                                        <div class="services_box__content">
                                            <!-- Title -->
                                            <h4 class="services_box__title">最新公告</h4>
                                            <!--/ Title -->

                                            <!-- Description -->
                                            <div class="services_box__desc">
                                                <p>关注我们的最新动态</p>
                                            </div>
                                            <!--/ Description -->

                                            <!-- List wrapper -->
                                            <div class="services_box__list-wrapper">
                                                <span class="services_box__list-bg"></span>
                                                <!-- List -->
                                                <ul class="services_box__list">

                                                    <li><a href="#" title="超性能云服务器上线通知" target="_blank"><span>个人房屋交易系统上线通知</span></a></li>
                                                    <li><a href="#" title="超性能云服务器售罄通知" target="_blank"><span>2017房屋购买政策</span></a></li>
                                                    <li><a href="#" title="牛云平台公测上线通知" target="_blank"><span>二手房交易监管</span></a></li>
                                                </ul>
                                                <!--/ List -->
                                            </div>
                                            <!--/ List wrapper -->
                                        </div>
                                        <!--/ Content -->
                                    </div>
                                    <!--/ Service box wrapper -->
                                </div>
                                <!--/ Services box element modern style -->
                            </div>
                            <!--/ col-md-4 col-sm-4 -->
                            <div class="col-md-4 col-sm-4">
                                <!-- Services box element modern style -->
                                <div class="services_box services_box--modern sb--hasicon">
                                    <!-- Service box wrapper -->
                                    <div class="services_box__inner clearfix">
                                        <!-- Icon content -->
                                        <div class="services_box__icon">
                                            <!-- Icon wrapper -->
                                            <div class="services_box__icon-inner">
                                                <!-- Icon = .icon-process2  -->
                                                <span class="services_box__fonticon glyphicon glyphicon-list-alt" style="margin:-2px 20px auto"></span>
                                            </div>
                                            <!--/ Icon wrapper -->
                                        </div>
                                        <!--/ Icon content -->

                                        <!-- Content -->
                                        <div class="services_box__content">
                                            <!-- Title -->
                                            <h4 class="services_box__title">购房指南</h4>
                                            <!--/ Title -->

                                            <!-- Description -->
                                            <div class="services_box__desc">
                                                <p>帮您解决一切问题</p>
                                            </div>
                                            <!--/ Description -->

                                            <!-- List wrapper -->
                                            <div class="services_box__list-wrapper">
                                                <span class="services_box__list-bg"></span>
                                                <!-- List -->
                                                <ul class="services_box__list">

                                                    <li><a href="#" title="关于房产的这些玄机你知道吗？" target="_blank"><span>关于房产的这些玄机你知道吗？</span></a></li>
                                                    <li><a href="#" title="法院如何对房产进行查封和解封？" target="_blank"><span>法院如何对房产进行查封和解封？</span></a></li>
                                                    <li><a href="#" title="未成年人能擅自买房吗？" target="_blank"><span>未成年人能擅自买房吗？</span></a></li>
                                                    <li><a href="#" title="婚前买房出资不同归属权" target="_blank"><span>婚前买房出资不同归属权</span></a></li>
                                                    <li><a href="#" title="经济适用房可以卖吗？怎么卖？" target="_blank"><span>经济适用房可以卖吗？怎么卖？</span></a></li>
                                                </ul>
                                                <!--/ List -->
                                            </div>
                                            <!--/ List wrapper -->
                                        </div>
                                        <!--/ Content -->
                                    </div>
                                    <!--/ Service box wrapper -->
                                </div>
                                <!--/ Services box element modern style -->
                            </div>
                            <!--/ col-md-4 col-sm-4 -->

                            <div class="col-md-4 col-sm-4">
                                <!-- Services box element modern style -->
                                <div class="services_box services_box--modern sb--hasicon">
                                    <!-- Service box wrapper -->
                                    <div class="services_box__inner clearfix">
                                        <!-- Icon content -->
                                        <div class="services_box__icon">
                                            <!-- Icon wrapper -->
                                            <div class="services_box__icon-inner">
                                                <!-- Icon = .icon-process3  -->
                                                <span class="services_box__fonticon glyphicon glyphicon-file" style="margin:-2px 24px auto"></span>
                                            </div>
                                            <!--/ Icon wrapper -->
                                        </div>
                                        <!--/ Icon content -->

                                        <!-- Content -->
                                        <div class="services_box__content">
                                            <!-- Title -->
                                            <h4 class="services_box__title">最新资讯</h4>
                                            <!--/ Title -->

                                            <!-- Description -->
                                            <div class="services_box__desc">
                                                <p>行业最新动态</p>
                                            </div>
                                            <!--/ Description -->

                                            <!-- List wrapper -->
                                            <div class="services_box__list-wrapper">
                                                <span class="services_box__list-bg"></span>
                                                <!-- List -->
                                                <ul class="services_box__list">

                                                    <li><a href="#" title="老房子价格比新房低？" target="_blank"><span>老房子价格比新房低？</span></a></li>

                                                    <li><a href="#" title="警惕！便宜的集资房轻易不要买！" target="_blank"><span>警惕！便宜的集资房轻易不要买！</span></a></li>

                                                    <li><a href="#" title="华润领跑高端改善市场！" target="_blank"><span>华润领跑高端改善市场！</span></a></li>

                                                    <li><a href="#" title="400亩北美园林别墅" target="_blank"><span>400亩北美园林别墅</span></a></li>

                                                    <li><a href="#" title="绕城高速拟改名四环" target="_blank"><span>绕城高速拟改名四环</span></a></li>

                                                </ul>
                                                <!--/ List -->
                                            </div>
                                            <!--/ List wrapper -->
                                        </div>
                                        <!--/ Content -->
                                    </div>
                                    <!--/ Service box wrapper -->
                                </div>
                                <!--/ Services box element modern style -->
                            </div>
                            <!--/ col-md-4 col-sm-4 -->
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
