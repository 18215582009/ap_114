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
    <title>基础信息-个人中心</title>
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
                    '基础信息',
                    'user_common');
                ?>
                <!-- end  page header-->

                <div class="box-content"><!--BEGIN CONTENT-->
                    <div class="content ptl">
                        <div class="page-profile">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="profile-left-side col-md-3">
                                                <div class="user-img text-center">
                                                    <img src="/theme/client/img/avatar00x2.png" class="img-circle">
                                                </div>
                                                <div class="social-icon-group">
                                                    <ul class="social-icons list-unstyled list-inline text-center mbl mtl">
                                                        <li><a href="#" data-hover="tooltip" data-original-title="facebook" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                                        <li><a href="#" data-hover="tooltip" data-original-title="google Plus" class="googleplus"><i class="fa fa-google-plus"></i></a></li>
                                                        <li><a href="#" data-hover="tooltip" data-original-title="twitter" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="text-center">
                                                    <a href="#" class="btn btn-default"><i class="icon-user"></i>&nbsp;修改头像</a>
                                                </div>
                                            </div>
                                            <div class="profile-right-side col-md-9">
                                                <form role="form" class="form-horizontal form-seperated">
                                                <div class="form-body">
                                                    <h4>个人信息</h4><hr>
                                                    <div class="form-group">
                                                        <label for="InputText" class="col-md-3 control-label">登录帐号</label>
                                                        <div class="col-md-6">
                                                            <input id="InputText" class="form-control" type="text" disabled="disabled" value="<?=$this->session->username?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="InputPassword" class="col-md-3 control-label">登录密码</label>

                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                                                <input class="form-control" type="password"  disabled="disabled" value="************">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 pln"><span class="smodify">修改</span></div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="InputText" class="col-md-3 control-label">昵称</label>
                                                        <div class="col-md-6">
                                                            <input id="InputText" placeholder="请输入昵称" class="form-control" type="text" disabled="disabled">
                                                        </div>
                                                        <div class="col-md-3 pln"><span class="smodify">修改</span></div>
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

                                                    <div class="form-group">
                                                        <label for="InputEmail" class="col-md-3 control-label">手机</label>

                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                                <input placeholder=".input-group" class="form-control" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 pln"><span class="smodify">修改</span></div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="InputEmail" class="col-md-3 control-label">邮箱</label>

                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                                <input placeholder=".input-group" class="form-control" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 pln"><span class="smodify">修改</span></div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">注册时间</label>

                                                        <div class="col-md-6">
                                                            <div class="input-icon">
                                                                <i class="fa fa-clock-o"></i>
                                                                <input placeholder="Left icon" disabled="disabled" class="form-control" type="text" value="2017-03-13 13:00">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h4>业务信息</h4><hr>
                                                    <div class="form-group">
                                                        <label for="InputText" class="col-md-3 control-label">公司名称</label>
                                                        <div class="col-md-6">
                                                            <input id="InputText" placeholder="" class="form-control form-control-shadow" type="text">
                                                        </div>
                                                        <div class="col-md-3 pln"><span class="smodify">修改</span></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="InputText" class="col-md-3 control-label">所在行业</label>
                                                        <div class="col-md-6">
                                                            <input id="InputText" placeholder="" class="form-control" type="text">
                                                        </div>
                                                        <div class="col-md-3 pln"><span class="smodify">修改</span></div>
                                                    </div>

                                                </div>
                                            </form>
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
