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
<style>
    #forgetPassword{border-top: 2px solid #eee; height: 1800px;}
    .step-box{ text-align: center}
    .step-box li .tx-l .num,.step-box li.cur .tx-l .num,.step-box li i,.step-box li.cur b,.icon-green,.icon-org{background:url(/theme/agency/img/find-icon.png) no-repeat}
    .step-box{margin:15px 0 0 0;overflow:hidden}
    .step-box li{float:left;position:relative}
    .step-box li .tx-l{height:36px;width:170px;line-height:36px;padding-left:40px;float:left;color:#f26009;font-family:"Microsoft Yahei";font-size:14px;display:inline-block;background-color:#fcd7c1}
    .step-box li .tx-l .num{width:16px;float:left;height:36px;display:inline-block;margin-right:10px}
    .step-box li .tx-l .num-one{width:10px;background-position:-13px 0}
    .step-box li .tx-l .num-two{background-position:-45px 0}
    .step-box li .tx-l .num-three{background-position:-82px 0}
    .step-box li .tx-l .num-four{background-position:-117px 0}
    .step-box li i{width:15px;height:36px;float:left;display:inline-block;background-position:-18px -39px}
    .step-box li b{display:none}
    .step-box li.cur i{background-position:0 -39px}
    .step-box li.cur b{width:15px;height:36px;display:inline-block;background-position:-36px -39px;position:absolute;left:-15px;top:0}
    .step-box li.cur .tx-l{height:36px;line-height:36px;padding-left:40px;float:left;color:#fff;font-family:"Microsoft Yahei";font-size:14px;display:inline-block;background-color:#f26009}
    .step-box li.cur .tx-l .num{width:16px;float:left;height:36px;display:inline-block;margin-right:10px}
    .step-box li.cur .tx-l .num-one{background-position:0 0;width:10px}
    .step-box li.cur .tx-l .num-two{background-position:-26px 0}
    .step-box li.cur .tx-l .num-three{background-position:-64px 0}
    .step-box li.cur .tx-l .num-four{background-position:-100px 0}

    .form-horizontal .getcode {
        display: inline-block;
        height: 44px;
        line-height: 44px;
        background: #fff;
        border: 1px solid #f60;
        color: #f60;
        width: 100px;
        cursor: pointer;
        margin-left: 8px;
        font-size: 13px;
        text-align: center;
    }
    .form-horizontal .getcode-dis, .form-horizontal .getcode-dis:hover {
        color: #999;
        background: #ddd;
        border-color: #ddd;
        cursor: default;
    }
    .middle-text {
        width: 200px;float:left;
    }
    .msg{padding:50px 0 30px}
    .msgImg{width: 24rem;}
    .time{font-size: 18px;color: tomato; font-family: "Lucida Grande", "Lucida Sans Unicode", geneva, verdana, arial, helvetica, sans-serif}
    .point{color: tomato; }
</style>
<body id="page-top">
<?php include 'header.html.php';?>

<div id="forgetPassword" class="section clearfix">
	<div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="step-box">
                    <ul>
                        <li class="cur"><div class="tx-l"><span class="num num-one"></span>填写找回信息</div><i></i></li>
                        <li><div class="tx-l"><span class="num num-two"></span>验证身份</div><i></i></li>
                        <li><div class="tx-l"><span class="num num-three"></span>设置新密码</div><i></i></li>
                        <li><div class="tx-l"><span class="num num-four"></span>找回密码成功</div></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 mtxl">
                <form class="form-horizontal mtxl"  id="form-modify1">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="telephone" class="col-md-3 control-label">
                                请输入手机号码<span class="require">*</span>
                            </label>
                            <div class="col-md-5">
                                <input id="telephone" name="telephone" class="form-control" type="number">
                            </div>
                        </div>
                    </div>

                    <div class="form-actions text-center pal">
                        <button type="submit" class="btn btn-success mrs">下一步</button>
                    </div>


                    <div class="form-body">
                        <div class="form-group">
                            <label for="telCode" class="col-md-3 control-label">短信验证码<i>*</i></label>
                            <div class="col-md-6">
                                <input id="telCode" name="telCode" class="form-control middle-text" placeholder="请输入短信验证码" type="text">
                                <a href="javascript:;" class="getcode getcode-dis nosend">获取动态密码</a>
                            </div>
                        </div>
                    </div>


                    <div class="form-actions text-center pal">
                        <button type="submit" class="btn btn-success mrs">下一步</button>
                    </div>

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
                        <button type="submit" class="btn btn-success mrs">下一步</button>
                    </div>

                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <div class="msg">
                    <p>系统将在<span class="time">5秒</span>后调整,如长时间未反应,请点击<a href="<?=$url?>" class="point">此处</a>!</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <img src="/images/error/200.png" class="msgImg">
            </div>
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
