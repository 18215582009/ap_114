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
    <title>完善用户资料-个人中心</title>
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
    .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {color: #444;}
    .smodify{padding:5px;
        color: #07bf29;
        display: block;
        margin-bottom: 10px;
        margin-top: 5px;}
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
                    '完善用户资料',
                    'user_common');
                ?>
                <!-- end  page header-->

                <div class="box-content"><!--BEGIN CONTENT-->
                    <div class="content ptl">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <form class="form-horizontal mtm">
                                    <div class="form-body">

                                        <div class="form-group">
                                            <label for="InputText" class="col-md-3 control-label">用户名:</label>
                                            <div class="col-md-6">
                                                <input id="username" class="form-control" type="text"  maxlength="24" placeholder="6-24位小写字母、数字组成，且字母开头">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="InputPassword" class="col-md-3 control-label">职业</label>

                                            <div class="col-md-3">
                                                <select name="country" class="form-control">
                                                    <option value="">-- 选择职业 --</option>
                                                    <option value="fr">计算机 / 互联网 / 通信 / 电子</option>
                                                    <option value="de">会计 / 金融 / 银行 / 保险</option>
                                                    <option value="it">贸易 / 消费 / 制造 / 运营</option>
                                                    <option value="jp">制药 / 医疗</option>
                                                    <option value="ru">广告 / 媒体</option>
                                                    <option value="gb">房地产 / 建筑</option>
                                                    <option value="us">专业服务 / 教育 / 培训</option>
                                                    <option value="gb">服务业</option>
                                                    <option value="gb">物流 / 运输</option>
                                                    <option value="gb">能源 / 原材料</option>
                                                    <option value="gb">政府 / 非盈利机构 / 其他</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <input id="job" class="form-control" type="text"  maxlength="24" placeholder="岗位名称">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">性别</label>
                                            <div class="col-md-6">
                                                <div class="radio">
                                                    <label class="radio-inline">
                                                        <input id="sexRadios1" name="sexRadios" value="option1" checked="checked" type="radio">&nbsp; 先生
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input id="sexRadios2" name="sexRadios" value="option2" type="radio">&nbsp; 女士
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions text-center pal">
                                        <button type="submit" class="btn btn-success">提&nbsp;&nbsp;&nbsp;交</button>
                                        &nbsp;
                                        <button type="button" class="btn btn-default">取&nbsp;&nbsp;&nbsp;消</button>
                                    </div>

                                </form>
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

<script>
    jQuery(document).ready(function () {
        "use strict";

    });
</script>
</body>
</html>
