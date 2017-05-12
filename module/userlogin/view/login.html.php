<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$this->config->app_name?>-用户登录</title>
<link rel='stylesheet' href='/css/mtek_font-awesome.min.css' type='text/css' media='screen' />
<link rel='stylesheet' href='/js/vendor/bootstrap/css/bootstrap.min.css' type='text/css' media='screen' />
<link rel='stylesheet' href='/css/mtek_core.css' type='text/css' media='screen' />
</head>
<style>
body{font-family:"宋体", Arial;background:#E5E9EC url(images/6.jpg) -500px -330px;font-size:12px;}

</style>
<script src="/js/jquery.min.js" ></script>
<script src="/js/plugins/artDialog/artDialog.js"></script>
<body>
<div class="container">
  <div class="row" style="margin:0 auto;padding-top:150px; width:460px; height:300px;">
    <div class="span5">
	  <!--h2>后台系统登录</h2-->
	
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="caption">用户登录<span style="margin-left:10px;font-size:14px;color:#eee;"><?=$this->config->app_name?></span></div>
			</div>
			<div class="panel-body mtl">
			   <form class="form-horizontal" id="form1"  method="POST" action="/userlogin/userlogin">


				<div class="form-group">
					<label for="username" class="col-md-3 control-label" style="font-size:14px;">用户名<span class="require">*</span>:</label>
					<div class="col-md-6 prs">
					  <input type="text" id="username" name="username" verify='true' class="form-control input-medio" required msg="用户名不能为空" value="admin" />
					</div>
				</div>
				
				<div class="form-group">
					<label for="password" class="col-md-3 control-label" style="font-size:14px;">密&nbsp;&nbsp;码<span class="require">*</span>:</label>
					<div class="col-md-6 prs">
					  <input type="password" id="password" name="password" verify='true' class="form-control input-medio" required msg="密码不能为空" value="123" />
					</div>
				</div>

				<!--div class="row" style="width:320px;float:left;padding-left:80px; margin-top:-9px; margin-bottom:10px;">
				<a href="#">忘记密码?</a>&nbsp;&nbsp;<input type="checkbox" value="1" id="checkbox1" style="margin-top:-3px;">&nbsp;<a style="color:#999999">记住密码</a>
				</div-->
				<div class="control-group" style="margin-top:30px; text-align:right; margin-right:95px;">
				<button class="btn btn-large btn-success" type="button" onclick="login()">登录</button>
				<!--button class="btn btn-large btn-info" type="button">注册</button-->
				</div>
				</form>
			</div>
		</div>
    </div>
  </div>
</div>

</body>
<script src="/js/jquery.cookie.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){ 
	$(document).keydown(function(event){ 
		if(event.keyCode==13){ 
			$("form").eq(0).submit();
		} 
	});
});
  function login(){
  	$("form").eq(0).submit();
  }
</script>
</html>