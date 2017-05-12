<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title><?=$name?>-<?=$this->config->app_name?></title>
<!-- Bootstrap Core CSS -->
<link href="/js/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="/css/mtek_font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="/css/mtek_simple-line-icons.css" rel="stylesheet" type="text/css">

<!-- Theme CSS -->
<link href="/theme/agency/css/agency.css" rel="stylesheet">
<link href="/theme/agency/css/login_regist.css" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body id="page-top">
<?php include 'header.html.php';?>

<div id="enter" class="section clearfix">
	<div class="container">
        <div class="row mtxl">
            <!-- panel start -->
            <!--div class="back clearfix">
            	<a class="left" href="/">返回FC114首页</a>
                <div class="other">还没有FC114账号？<a href="/userlogin/regist">马上注册</a></div>
            </div-->
            <input type="hidden" name="from" id="from" value="enter">
            <div class="panel panel-info mtxl clearfix">
                <div class="panel-heading">
                    <div class="caption">用户登录</div>
                    <div class="other">还没有FC114账号？<a href="/userlogin/regist">马上注册</a></div>
                </div>
                <div class="panel-body ptxl">
                    <div class="loginbox" style="width: 388px; margin-left: 38px;">
                    <div class="input-icon">
                        <i class="icon-screen-smartphone"></i>
                        <input type="text" id="tel" name="tel" class="form-control" placeholder="请输入手机号"><!--span class="require">*</span-->
                    </div>
                    <div class="input-icon mtl">
                        <i class="icon-key"></i>
                        <input type="password" id="pwd" name="pwd" class="form-control" placeholder="请输密码">
                    </div>
                    <label>
                    <input type="checkbox" validatename="FC114用户使用协议" validate="isChecked" class="check-agreed">
                    下次自动登录<a target="_blank" href="#" class="right">找回密码</a>
                    </label>
                    <input type="button" class="btn btn-success" value="马上登录" onclick="login()" style="width:100%">
                    </div>
                </div>
            </div>
            <!-- panel end -->
        </div>
    </div>
</div>

<div id="loadingToast" class="weui_loading_toast" style="display: none;">
    <div class="weui_mask_transparent"></div>
    <div class="weui_toast">
        <div class="weui_loading">
            <div class="weui_loading_leaf weui_loading_leaf_0"></div>
            <div class="weui_loading_leaf weui_loading_leaf_1"></div>
            <div class="weui_loading_leaf weui_loading_leaf_2"></div>
            <div class="weui_loading_leaf weui_loading_leaf_3"></div>
            <div class="weui_loading_leaf weui_loading_leaf_4"></div>
            <div class="weui_loading_leaf weui_loading_leaf_5"></div>
            <div class="weui_loading_leaf weui_loading_leaf_6"></div>
            <div class="weui_loading_leaf weui_loading_leaf_7"></div>
            <div class="weui_loading_leaf weui_loading_leaf_8"></div>
            <div class="weui_loading_leaf weui_loading_leaf_9"></div>
            <div class="weui_loading_leaf weui_loading_leaf_10"></div>
            <div class="weui_loading_leaf weui_loading_leaf_11"></div>
        </div>
        <p class="weui_toast_content">数据加载中</p>
    </div>
</div>

<!-- Footer -->
<?php include '../../userlogin/view/footer.html.php';?>

<!-- jQuery --> 
<script src="/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript --> 
<script src="/js/bootstrap.min.js"></script>

<script>
    function login(){
        var tel = $('#tel').val();
        var pwd = $('#pwd').val();
        var code = $('#code').val();
        var from = $('#from').val();
        $('#loadingToast').show();
        $.ajax({
            type: 'POST',
            url: '/userlogin/apiMobilelogin',
            dataType: 'JSON',
            data: {
                username: tel,
                password:pwd,
                code:code,
                from:from,
                submittype:'ajax'
            },
            success: function (result) {
                alert(result.msg);
                if (result.success) {
                    window.location.href='/index';
                }
                setTimeout(function () {
                    $('#loadingToast').hide();
                }, 500);
            },
            error: function (result) {
                if (result.success) {
                    alert(result.msg);
                }
                else {
                    alert("系统繁忙!");
                }
            }
        });
    }
</script>
</body>
</html>
