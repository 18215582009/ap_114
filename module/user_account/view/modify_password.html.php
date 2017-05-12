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
    <title>修改密码-个人中心</title>
    <link rel="stylesheet" href="/css/fonts/open_sans.css" type="text/css">
    <link rel="stylesheet" href="/css/mtek_font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/css/mtek_simple-line-icons.css" type="text/css">
    <link rel="stylesheet" href="/js/vendor/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/css/mtek_core.css" type="text/css">
    <link rel="stylesheet" href="/css/mtek_system.css" type="text/css">
    <link rel="stylesheet" href="/css/mtek_system-responsive.css" type="text/css">
    <link rel="stylesheet" href="/css/mtek_self.css" type="text/css">
    <link rel='stylesheet' href='/theme/client/css/user_center.css' type='text/css' media='screen' />
    <link rel="stylesheet" href="/js/vendor/jquery-steps/css/jquery.steps.css" type="text/css">
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

                <!-- begin page header-->
                <?=lib\form\Form::bread_crumb(
                    '修改密码',
                    'user_common');
                ?>
                <!-- end  page header-->

                <div class="box-content"><!--BEGIN CONTENT-->
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <form class="form-horizontal mtxl"  id="form-modify1">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label for="inputPassword" class="col-md-3 control-label">
                                                原始密码
                                                <span class="require">*</span>
                                            </label>
                                            <div class="col-md-5">
                                                <input id="oldpassword" name="oldpassword" class="form-control" type="password">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions text-center pal">
                                        <button type="submit" class="btn btn-success mrs">下一步</button>
                                        <button type="button" class="btn btn-default">取&nbsp;&nbsp;&nbsp;消</button>
                                    </div>

                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <form class="form-horizontal mtxl" id="form-modify2">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">
                                                输入新密码 &nbsp;
                                                <span class="require">*</span>
                                            </label>
                                            <div class="col-md-5">
                                            <input name="password" class="form-control" type="password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">
                                                再次输入密码 &nbsp;
                                                <span class="require">*</span>
                                            </label>
                                            <div class="col-md-5">
                                            <input name="confirmPassword" class="form-control" type="password">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-actions text-center pal">
                                        <button type="submit" class="btn btn-success mrs">提&nbsp;&nbsp;&nbsp;交</button>
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
<script src="http://cdn.bootcss.com/jquery-validate/1.16.0/jquery.validate.js"></script>
<script>
    $("#form-modify1").validate({
        errorElement: 'span',
        errorClass: 'help-block',
        rules: {
            oldpassword: {
                required: true,
                minlength: 6
            }
        },
        messages: {
            oldpassword: {
                required: "请输入密码",
                minlength: "密码为6-24位"
            }
        },
        highlight: function (element) { // hightlight error inputs
            $(element)
                .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
        },
        unhighlight: function (element) { // revert the change done by hightlight
            $(element)
                .closest('.form-group').removeClass('has-error'); // set error class to the control group
        }
    });
    $("#form-modify2").validate({
        errorElement: 'span',
        errorClass: 'help-block',
        rules: {
            password: {
                required: true,
                minlength: 6
            },
            confirmPassword: {
                required: true,
                minlength: 6,
                equalTo: "#password"
            }
        },
        messages: {
            password: {
                required: "请输入密码",
                minlength: "密码为6-24位"
            },
            confirmPassword: {
                required: "请再次输入密码",
                minlength: "密码为6-24位",
                equalTo: "两次密码输入不一致"
            }
        },
        highlight: function (element) { // hightlight error inputs
            $(element)
                .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
        },
        unhighlight: function (element) { // revert the change done by hightlight
            $(element)
                .closest('.form-group').removeClass('has-error'); // set error class to the control group
        }
    });
</script>
</body>
</html>
