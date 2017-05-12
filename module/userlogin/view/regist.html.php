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
<!-- Plugin Css -->
<link href="/css/weui.min.css" rel="stylesheet">

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
                <div class="other">已有FC114账号？<a href="/userlogin/enter">马上登录</a></div>
            </div-->

            <div class="panel panel-info mtxl clearfix">
                <div class="panel-heading">
                    <div class="caption"><?=$name?></div>
                    <div class="other">已有FC114账号？<a href="/userlogin/enter">马上登录</a></div>
                </div>
                <div class="panel-body col-md-10 col-md-offset-1 ptl">
                    <div class="input-icon ptl">
                        <i class="icon-screen-smartphone"></i>
                        <input type="text" id="tel" name="tel" class="input form-control" placeholder="请输入手机号" data-type="tel"><span class="require">*</span>
                        <a class="sendbtn nosend" onclick="javascript:;">发送验证码</a>
                        <span id="tel-error" class="error"></span>
                    </div>
                    <div class="input-icon ptl">
                        <i class="icon-key"></i>
                        <input type="text" id="sms" name="sms" class="input form-control" placeholder="请输短信验证码" data-type="sms"><span class="require">*</span>
                        <span id="sms-error" class="error"></span>
                    </div>
                    <div class="input-icon ptl">
                        <i class="icon-user"></i>
                        <input type="text" id="nickname" name="nickname" class="form-control" placeholder="昵称">
                    </div>
                    <div class="input-icon ptl">
                        <i class="icon-lock"></i>
                        <input type="password" id="pwd" name="pwd" class="input form-control" placeholder="请输入密码" data-type="pwd"><span class="require">*</span>
                        <span id="pwd-error" class="error"></span>
                    </div>
                    <div class="input-icon ptl">
                        <i class="icon-lock"></i>
                        <input type="password" id="rpwd" name="rpwd" class="input form-control" placeholder="请确认新密码" data-type="rpwd"><span class="require">*</span>
                        <span id="rpwd-error" class="error"></span>
                    </div>
                    <div class="input-icon ptl">
                        <input type="checkbox" id="prot" name="prot" validatename="FC114用户使用协议" class="check-agreed mrs" checked="checked">我已阅读并同意<a target="_blank" href="#">《FC114用户使用协议》</a>
                        <span id="prot-error" class="error"></span>
                    </div>
                    <div class="ptm">
                        <input type="submit" class="btn btn-success" value="立即注册" style="width:100%;" onclick="regist()" />
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

<script>
    var countdown;
    var timeoutProcess;
    $(document).ready(function(){
        $('.input').blur(function () {
            validate(this);
        });

        $("#prot").click(function(){
            if($(this).attr("checked"))
            {
                $(this).removeAttr("checked");
                $('#prot-error').html('您必须同意使用协议才能继续');
                $(this).addClass('warning');
            }
            else
            {
                $(this).attr("checked",'true');
                $('#prot-error').html('');
                $(this).removeClass('warning');
            }
        });

    })

    function validate(obj){
        var type = $(obj).data('type');
        var val = $.trim($(obj).val());
        if(type=='tel'){
            var reg = /^(13[0-9]|14(5|7)|15(0|1|2|3|5|6|7|8|9)|18[0-9]|17[0-9])\d{8}$/;
            if(val==""){
                $('#tel-error').html('请输入手机号码');
                $(this).addClass('warning');
                return false;
            }else {
                if (!reg.test(val)) {
                    $('#tel-error').html('手机号码不正确');
                    $(this).addClass('warning');
                    $('.sendbtn').removeClass('send').addClass('nosend');
                    return false;
                } else {
                    //判断该电话号码是否存在
                    var isExist = checkMobile(val);
                    if (isExist == 1) {
                        //该电话号码已经存在
                        $('#tel-error').html('该手机号已经存在');
                        $(this).addClass('warning');
                        $('.sendbtn').removeClass('send').addClass('nosend');
                        return false;
                    } else {
                        $('#tel-error').html('');
                        $(this).removeClass('warning');
                        $('.sendbtn').removeClass('nosend').addClass('send');
                        //绑定发送短信事件
                        $('.sendbtn').click(sendSms);
                    }
                }
            }
        }else if(type=='sms'){
            if (!val.length) {
                $('#sms-error').html('请填写手机验证码');
                $(this).addClass('warning');
                return false;
            }else{
                $('#sms-error').html('');
                $(this).removeClass('warning');
            }
        }else if(type=='pwd'){
            //var reg = /^\S{6,18}$/;
            var reg = /^[A-Za-z0-9~!@#$%^&*()_+`\-={}:";'<>?,.\/]{6,20}$/;
            //var reg = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[~!@#$%^&*()_+`\-={}:";'<>?,.\/]).{4,16}$/;
            if(!reg.test(val)){
                $('#pwd-error').html('密码为6-20位字母或数字、字符');
                $(this).addClass('warning');
                return false;
            }else{
                $('#pwd-error').html('');
                $(this).removeClass('warning');
            }
        }else if(type=='rpwd'){
            var pwd = $('#pwd').val();
            if(pwd != val){
                $('#rpwd-error').html('密码不一致');
                $(this).addClass('warning');
                return false;
            }else{
                $('#rpwd-error').html('');
                $(this).removeClass('warning');
            }
        }
        return true;
    }

    function regist(){
        if(!validate($('#tel'))){return;}
        if(!validate($('#sms'))){return;}
        if(!validate($('#pwd'))){return;}
        if(!validate($('#rpwd'))){return;}
        if(!$('#prot').is(':checked')){
            $('#prot-error').html('您必须同意使用协议才能继续');
            $(this).addClass('warning');
            return false;
        }
        //if(!ischeck){
            //alert(ischeck);
            //注册信息不正确
        //}else{
            //alert(ischeck);
            var tel = $('#tel').val();
            var sms = $('#sms').val();
            var nickname = $('#nickname').val();
            var pwd = $('#pwd').val();
            var rpwd = $('#rpwd').val();
            $('#loadingToast').show();
            $.ajax({
                type: 'POST',
                url: '/userlogin/apiRegist',
                dataType: 'JSON',
                data: {
                    mobile: tel,
                    sms:sms,
                    nickname:nickname,
                    pwd:pwd,
                    rpwd:rpwd
                },
                success: function (result) {
                    alert(result.msg);
                    if (result.success) {
                        window.location.href='/userlogin/enter';
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
        //}
    }

    function sendSms(){
        var $tel = $('#tel');
        var $sendbtn = $('.sendbtn');
        $sendbtn.unbind('click',sendSms);
        countdown = 5;
        settime($sendbtn);
        $.ajax({
            type: 'POST',
            url: '/userlogin/apiSendSms',
            dataType: 'JSON',
            data: {
                mobile: $tel.val()
            },
            success: function (result) {
                alert(result.msg+result.send_code);
                if (result.success) {

                } else {

                }
            },
            error: function (result) {
                alert(result.msg);
                if (result.success) {

                }
                else {
                    alert("系统繁忙!");
                }
            }
        });
    }

    function checkMobile(mobile) {
        var result;
        $.ajax({
            type: 'POST',
            url: '/userlogin/apiCheckMobile',
            dataType: 'JSON',
            data: {
                mobile: mobile
            },
            async : false,
            success: function (data) {
                result = data;
            }
        });
        return result;
    }

    function settime(val) {
        var val = $(val);
        if (countdown == 0) {
            clearTimeout(timeoutProcess);
            val.removeAttr("disabled");
            val.html("发送验证码");
            val.removeClass('nosend').addClass('send');
            val.click(sendSms);
            return false;
        } else {
            val.attr("disabled", true);
            val.removeClass('send').addClass('nosend');
            val.html("重新发送(" + countdown + ")");
            countdown--;
        }
        timeoutProcess = setTimeout(function() {
            settime(val)
        },1000)
    }
</script>
</body>
</html>
