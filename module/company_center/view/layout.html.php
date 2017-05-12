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
    <title>布局模版</title>
    <?=Form::cssmin();?>
    <link rel="stylesheet" href="/js/vendor/jquery-jvectormap/jquery-jvectormap-2.0.1.css" type="text/css">
    <link rel='stylesheet' href='/theme/client/css/client.css' type='text/css' media='screen' />
</head>
<style>

</style>
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
                        <div class="alert alert-warning alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <i aria-hidden="true" class="icon-volume-1 mts"></i>
                            <strong>01-17</strong> 乐山房产&二手房预售资金监管系统上线测试预告 <a>查看详情</a>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel">
                                    <div class="panel-body"><h3 class="info-title mtn">商品房销售情况</h3>
                                        <small>随时为您展示最新的商品房销售情况</small>
                                        <div class="table-responsive mtl">
                                            <table class="table table-border-dashed table-hover">
                                                <thead>
                                                <tr>
                                                    <th>商品房销售情况</th>
                                                    <th>总套数</th>
                                                    <th>总面积</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>本日销售情况</td>
                                                    <td>4</td>
                                                    <td>
                                                        <div data-hover="tooltip" title="" class="progress progress-xs mtm mbm" data-original-title="80%">
                                                            <div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;" class="progress-bar progress-bar-success"><span class="sr-only">80% Complete</span></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>本月销售情况</td>
                                                    <td>23</td>
                                                    <td>
                                                        <div data-hover="tooltip" title="" class="progress progress-xs mtm mbm" data-original-title="85%">
                                                            <div role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;" class="progress-bar progress-bar-info"><span class="sr-only">85% Complete</span></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>本季销售情况</td>
                                                    <td>233</td>
                                                    <td>
                                                        <div data-hover="tooltip" title="" class="progress progress-xs mtm mbm" data-original-title="90%">
                                                            <div role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;" class="progress-bar progress-bar-danger"><span class="sr-only">90% Complete</span></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>本年销售情况</td>
                                                    <td>884</td>
                                                    <td>
                                                        <div data-hover="tooltip" title="" class="progress progress-xs mtm mbm" data-original-title="60%">
                                                            <div role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;" class="progress-bar progress-bar-warning"><span class="sr-only">60% Complete</span></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="panel">
                                    <div class="panel-body">
                                        2017年房屋成交均价
                                        <span style="font-size: 24px;" class="pull-right">
                                            <span id="earning-number">5,645</span>元/平米
                                        </span>

                                        <div id="earning-chart" style="width: 100%; height: 100px; padding: 0px; position: relative;" class="mtl">
                                        </div>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-body">区域成交
                                        <span class="pull-right">
                                            <span id="new-customer-number" style="font-size: 24px;">3,420</span>
                                        </span>

                                        <div id="new-customer-chart" style="width: 100%; height: 100px; padding: 0px; position: relative;" class="mtl">

                                        </div>
                                    </div>
                                </div>

                                <!--div class="panel">
                                    <div class="panel-body">
                                        <div id="placeholder" style="width: 100%; height: 150px; padding: 0px; position: relative;" class="demo-placeholder">

                                        </div>
                                        <div class="section section-info"><span class="info-time">Today 2:25 PM</span>

                                            <h3 class="info-title">Salt Lake City, Utah</h3>

                                            <div class="info-block">
                                                <dl>
                                                    <dt>13.5 M</dt>
                                                    <dd>Shares Traded</dd>
                                                </dl>
                                            </div>
                                            <div class="info-block last">
                                                <dl>
                                                    <dt>28.44</dt>
                                                    <dd>Market Cap</dd>
                                                </dl>
                                            </div>
                                            <div class="info-aapl">AAPL
                                                <ul>
                                                    <li><span style="height: 29px;" class="orange"></span></li>
                                                    <li><span style="height: 18px;" class="orange"></span></li>
                                                    <li><span style="height: 10px;" class="orange"></span></li>
                                                    <li><span style="height: 39px;" class="orange"></span></li>
                                                    <li><span style="height: 34px;" class="green"></span></li>
                                                    <li><span style="height: 15px;" class="green"></span></li>
                                                    <li><span style="height: 29px;" class="green"></span></li>
                                                    <li><span style="height: 8px;" class="green"></span></li>
                                                </ul>
                                            </div>
                                            <div class="yearly-change">Yearly Change<span><em>+</em> 127.01</span></div>
                                        </div>
                                    </div>
                                </div-->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="panel">
                                    <div class="panel-body">
                                        <h3 class="info-title mtn">区域展示</h3>
                                        <small>乐山地区销售示意图</small>
                                        <div class="row mtl">
                                            <div class="col-md-4">
                                                <div id="map-visitor-chart" style="width: 100%; height: 200px; padding: 0px; position: relative;"></div>
                                            </div>
                                            <div class="col-md-8">
                                                <div id="map-visitor-markers" style="width: 100%; height: 300px"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="widget-weather">
                                    <div class="widget-header"><h5>四川乐山<span class="caret mls"></span></h5>
                                    </div>
                                    <div class="widget-body">
                                        <div class="date"><p>3月, 10号 - 星期一</p></div>
                                        <div class="row">
                                            <div class="col-xs-7"><p class="time">12:30<span>PM</span></p>

                                                <div class="stats"><p>多云:<span class="text-success">16 mph NE</span>
                                                    </p>

                                                    <p>湿度<span>%</span><span id="number-humidity" class="text-pink">88</span></p>

                                                    <p>日出:<span>6:30 AM</span></p>

                                                    <p>日落:<span>5:40 PM</span></p></div>
                                            </div>
                                            <div class="col-xs-5">
                                                <canvas id="icon1" width="60px" height="60px"></canvas>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="items">
                                                <div class="item col-xs-3"><p>成都</p>
                                                    <canvas id="icon2" width="30px" height="30px"></canvas>
                                                    <p class="value">14°C</p></div>
                                                <div class="item col-xs-3"><p>峨眉山</p>
                                                    <canvas id="icon3" width="30px" height="30px"></canvas>
                                                    <p class="value">20°C</p></div>
                                                <div class="item col-xs-3"><p>夹江</p>
                                                    <canvas id="icon4" width="30px" height="30px"></canvas>
                                                    <p class="value">25°C</p></div>
                                                <div class="item col-xs-3"><p>沐川</p>
                                                    <canvas id="icon5" width="30px" height="30px"></canvas>
                                                    <p class="value">30°C</p></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    "/js/vendor/jquery-jvectormap/jquery-jvectormap-2.0.1.min.js",
    "/js/vendor/jquery-jvectormap/jquery-jvectormap-world-mill-en.js",
    "/js/vendor/jquery-jvectormap/jquery-jvectormap-us-lcc-en.js",
    "/js/vendor/jquery-jvectormap/china-zh.js",
    "/js/vendor/jquery-jvectormap/gdp-data.js",
    "/js/vendor/flot-chart/jquery.flot.js",
    "/js/vendor/flot-chart/jquery.flot.categories.js",
    "/js/vendor/flot-chart/jquery.flot.pie.js",
    "/js/vendor/flot-chart/jquery.flot.tooltip.js",
    "/js/vendor/flot-chart/jquery.flot.resize.js",
    "/js/vendor/flot-chart/jquery.flot.fillbetween.js",
    "/js/vendor/flot-chart/jquery.flot.stack.js",
    "/js/vendor/flot-chart/jquery.flot.spline.js",
    "/js/vendor/jquery-animateNumber/jquery.animateNumber.min.js",
    "/js/vendor/jquery.sparkline.min.js",
    "/js/vendor/skycons/skycons.js",
    //"/js/plugins/artDialog/artDialog.source.js?skins=default" type="text/javascript",
    //"/js/plugins/artDialog/plugins/iframeTools.js" type="text/javascript",
    "/theme/client/js/index.js"
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
