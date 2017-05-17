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
    <title>我的积分-个人中心</title>
    <link rel="stylesheet" href="/css/fonts/open_sans.css" type="text/css">
    <link rel="stylesheet" href="/css/mtek_font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/css/mtek_simple-line-icons.css" type="text/css">
    <link rel="stylesheet" href="/js/vendor/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/js/vendor/bootstrap-datepicker/datepicker.css" type="text/css">
    <link rel="stylesheet" href="/css/mtek_core.css" type="text/css">
    <link rel="stylesheet" href="/css/mtek_system.css" type="text/css">
    <link rel="stylesheet" href="/css/mtek_system-responsive.css" type="text/css">
    <link rel="stylesheet" href="/css/mtek_self.css" type="text/css">
    <link rel='stylesheet' href='/theme/client/css/user_center.css' type='text/css' media='screen' />
</head>
<style>
    .invite-tle {
        float:left;width:753px;
        font-weight:bold;font-size:16px;color:#9E5F40;
        border-bottom: 2px solid #C1B1A1;
        color: #333333;
        margin-bottom: 10px;
        margin-top: 20px;
    }
    .invite{float:left;width:753px}
    .invite dl dt {
        line-height: 25px;
        padding: 5px 0 5px;
        color:#737373
    }
    .invite .third {
        background: none repeat scroll 0 0 #F3F3F3;
        border: 1px solid #E2E2E2;
        margin-left: 20px;
        padding: 8px;
    }
    .invite .first {
        padding-left: 20px;
        position: relative;
    }
    .invite .first .conts {
        background: none repeat scroll 0 0 #F3F3F3;
        border: 1px solid #E2E2E2;
        clear: both;
        overflow: hidden;
        padding: 8px 8px 0 8px;
    }
    .invite .first .p-cont {
        background: none repeat scroll 0 0 #FFFFFF;
        border: 1px solid #CCCCCC;
        float: left;

        line-height: 20px;
        padding: 8px;
        width: 500px;
    }
    .invite .p-btn {
        float: left;
        padding: 1px 7px;
        text-align: right;
    }
    .invite .p-btn input {
        cursor: pointer;
        height: 35px;
        width: 120px;
        text-align:center;
    }
</style>
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

                <!-- begin page header-->
                <?=lib\form\Form::bread_crumb(
                    '积分管理',
                    'user_common');
                ?>
                <!-- end  page header-->

                <div class="box-content"><!--BEGIN CONTENT-->
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-12">
                                <p style="position: absolute; right: 20px;top:20px;font-size: 14px;">您的当前积分:<span class="badge badge-warning"><?=$userinfo[0]['score'] ?></span>分</p>
                                <div class="tabbable-line">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#score-tab1" data-toggle="tab">积分管理</a></li>
                                        <li class=""><a href="#score-tab2" data-toggle="tab">积分消费</a></li>
                                    </ul>

                                    <div class="tab-content" style="padding: 15px 0;">
                                        <div id="score-tab1" class="tab-pane active">
                                            <!-- 积分管理 start -->
                                            <table class="table table-bordered">
                                                <tbody><tr class="jf_head">
                                                    <td style="width:315px"><span class="f_blod">得分项目</span></td>
                                                    <td style="width:96px"><span class="f_blod">积分标准</span></td>
                                                    <td style="width:96px"><span class="f_blod">累计数量</span></td>
                                                    <td style="width:96px"><span class="f_blod">得分情况</span></td>
                                                </tr>
                                                <tr class="jf_head">
                                                    <td style="width:315px;">注册赠送积分</td>
                                                    <td style="width:96px">200分</td>
                                                    <td style="width:96px">1</td>
                                                    <td style="width:96px">200</td>
                                                </tr>
                                                <tr class="jf_head">
                                                    <td style="width:315px;">登录所得积分,每天只限一次</td>
                                                    <td style="width:96px">20分/天</td>
                                                    <td style="width:96px">0</td>
                                                    <td style="width:96px">0</td>
                                                </tr>
                                                <tr class="jf_head">
                                                    <td style="width:315px;">举报中介房源所得积分</td>
                                                    <td style="width:96px">40分/套</td>
                                                    <td style="width:96px">0</td>
                                                    <td style="width:96px">0</td>
                                                </tr>
                                                <tr class="jf_head">
                                                    <td style="width:315px;">对网站提出的建议被采纳</td>
                                                    <td style="width:96px">40分/条</td>
                                                    <td style="width:96px">0</td>
                                                    <td style="width:96px">0</td>
                                                </tr>
                                                <tr class="jf_head">
                                                    <td style="width:315px;">邀请好友注册FC114网</td>
                                                    <td style="width:96px">40分/人</td>
                                                    <td style="width:96px">0</td>
                                                    <td style="width:96px">0</td>
                                                </tr>
                                                <tr class="jf_head">
                                                    <td style="width:315px;">查看房东信息</td>
                                                    <td style="width:96px">40分/套</td>
                                                    <td style="width:96px"><?=count($consumption)?></td>
                                                    <td style="width:96px"><?=count($consumption)==0?'0':('-'.(count($consumption)*40))?></td>
                                                </tr>
                                                </tbody>
                                            </table>

                                            <p><strong>积分规则：</strong></p>
                                            <p>&bull;注册并通过审核后的会员即赠送 200 积分；</p>
                                            <p>&bull;每天登录一次FC114网（每天仅限一次），即赠送 20 个积分;</p>
                                            <p>&bull;每成功举报并确认是非个人业主（即是中介），即赠送 40 个积分;</p>
                                            <p>&bull;对FC114网提出建议被采纳，即赠送 40 个积分</p>
                                            <p>&bull;每成功邀请注册一个会员，即赠送 40 积分；</p>
                                            <p>&bull;每看一个房东电话消耗 40 个积分</p>
                                            <!-- 邀请好友 -->
                                            <div class="invite-tle">邀请好友</div>
                                            <div class="invite">
                                                <dl>
                                                    <dt>1.我的专用邀请链接：</dt>
                                                    <dd class="third">
                                                        <div class="conts">
                                                            <input id="MyLink" class="text-input" style="width:350px;" value="/i4663" type="text">
                                                            &nbsp;
                                                            <input onclick="setClipboardfirst()" value=" 复 制 " type="button">
                                                            &nbsp;[<a style="color:#666;" href="/i4663" target="_blank">预览我的邀请主页</a>]
                                                        </div>
                                                    </dd>
                                                </dl>
                                                <dl class="mt15">
                                                    <dt>2.复制后请通过QQ或MSN发送给好友：</dt>
                                                    <dd class="first">
                                                        <div class="conts">
                                                            <p id="allpeople-cont" class="p-cont">这个网站有点意思，买房全免中介费，而且全是个人房源，推荐了！/i4663</p>
                                                            <p class="p-btn">
                                                                <input onclick="copyContent()" value=" 复制发送给好友 " type="button">
                                                            </p>
                                                        </div>
                                                    </dd>
                                                </dl>
                                                <dl class="mt15">
                                                    <dt>3.分享到:</dt>
                                                    <dd>
                                                        <div class="third">
                                                            <!-- JiaThis Button BEGIN -->
                                                            <div id="ckepop" class="sharebar_toolbox">
                                                                <span class="jiathis_txt">分享到：</span>
                                                                <a class="jiathis_button_tools_1"></a>
                                                                <a class="jiathis_button_tools_2"></a>
                                                                <a class="jiathis_button_tools_3"></a>
                                                                <a class="jiathis_button_tools_4"></a>
                                                                <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank">更多</a>
                                                                <a class="jiathis_counter_style"></a>
                                                            </div>
                                                            <script type="text/javascript" src="http://v2.jiathis.com/code/jia.js" charset="utf-8"></script>
                                                            <!-- JiaThis Button END -->
                                                            <style>
                                                                .sharebar_toolbox{overflow:visible; height:18px;line-height:18px; padding:2px 0;}
                                                                .sharebar_toolbox a{color:#000}
                                                                #ckepop .jiathis_counter.jiathis_bubble_style{width: 35px;}
                                                            </style>
                                                            <script type="text/javascript">
                                                                var jiathis_config = {
                                                                    url: "/i4663",
                                                                    summary: "这个网站有点意思，买房全免中介费，而且全是个人房源，推荐了！",
                                                                    title: " ",
                                                                    pic: "/theme/agency/img/logo.png",
                                                                    hideMore: false
                                                                }
                                                            </script>
                                                            <script type="text/javascript">
                                                                function setClipboard(data, value) {
                                                                    if (window.clipboardData) {
                                                                        window.clipboardData.clearData();
                                                                        window.clipboardData.setData(data, value);
                                                                        alert("复制成功");
                                                                    } else {
                                                                        /*
                                                                         $("<div><p class='f12 fblod mt8'>你使用的是非IE核心浏览器,请按下Ctrl+C复制代码到剪切板</p><textarea id='selecter' class='mt8' style='width:340px; height:60px; padding:5px; font-size:12px;'>" + value + "</textarea>").dialog({ title: " 温馨提示", modal: true, width: 380, height: 150 });
                                                                         $("#selecter").select();
                                                                         */
                                                                        var dialog2 = art.dialog({
                                                                            content: "<div style='padding:0 10px'><p>你使用的是非IE核心浏览器</p><p class='f_blod'>请点击“选取”按钮,按下Ctrl+C复制代码到剪切板</p><textarea id='selecter' style='width:340px; height:60px; font-size:12px; margin-bottom:10px;'>" + value + "</textarea>",
                                                                            yesText:'选取',
                                                                            yesFn: function(){
                                                                                $("#selecter").select();
                                                                                return false;
                                                                            }
                                                                        });

                                                                    }
                                                                };
                                                                function copyContent() {
                                                                    setClipboard("Text", $("#allpeople-cont").html());
                                                                }
                                                                function setClipboardfirst() {
                                                                    var value = $("#MyLink").val();
                                                                    if (window.clipboardData) {
                                                                        window.clipboardData.setData("Text", value);
                                                                        alert("复制成功");
                                                                    } else {
                                                                        /*
                                                                         $("<div><p class='f12 fblod mt8'>你使用的是非IE核心浏览器,请按下Ctrl+C复制代码到剪切板</p><textarea id='selectersecond' class='mt8' style='width:340px; height:60px; padding:5px; font-size:12px;'>" + value + "</textarea>").dialog({ title: " 温馨提示", modal: true, width: 380, height: 150 });
                                                                         */

                                                                        var dialog1 = art.dialog({
                                                                            content: "<div style='padding:0 10px'><p>你使用的是非IE核心浏览器</p><p class='f_blod'>请点击”选取“按钮,按下Ctrl+C复制代码到剪切板</p><textarea id='selectersecond' style='width:340px; height:60px;font-size:12px;margin-bottom:10px;'>" + value + "</textarea>",
                                                                            yesText:'选取',
                                                                            yesFn: function(){
                                                                                $("#selectersecond").select();
                                                                                return false;
                                                                            }
                                                                        });

                                                                    }

                                                                }
                                                            </script>
                                                            <!-- JiaThis Button END -->
                                                        </div>
                                                    </dd>
                                                </dl>
                                            </div>
                                            <!-- 积分管理 end -->
                                        </div>

                                        <div id="score-tab2" class="tab-pane">
                                            <!-- 积分消费 start -->
                                            <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>消费项目</th>
                                                <th>积分标准</th>
                                                <th>消费积分</th>
                                                <th>查看时间</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <? foreach($consumption as $info){ ?>
                                                <tr>
                                                    <td><?=$info['esf_id'] ?></td>
                                                    <td><?=$info['score'] ?></td>
                                                    <td><?=$info['score'] ?></td>
                                                    <td><?=date("Y-m-d H:i:s",$info['create_date'])?></td>
                                                </tr>
                                            <? } ?>
<!--                                            <tr>-->
<!--                                                <td>11298</td>-->
<!--                                                <td>40</td>-->
<!--                                                <td>40</td>-->
<!--                                                <td>2017-04-12 12:44:21</td>-->
<!--                                            </tr>-->

                                            </tbody>
                                        </table>
                                            <!-- 积分消费 end -->
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
<script src="/js/jquery.min.js"></script>
<script src="/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/js/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/js/vendor/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script src="/js/plugins/artDialog/artDialog.source.js?skin=default"></script>
<script src="/js/plugins/artDialog/plugins/iframeTools.js"></script>
<script>
    jQuery(document).ready(function () {
        "use strict";
        $('.datepicker-default').datepicker();
    });
</script>
</body>
</html>
