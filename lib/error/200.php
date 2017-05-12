<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<?php if($time>0){ ?><meta http-equiv="refresh" content="<?=$time;?>;URL=<?=$url;?>" /><?php } ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>操作成功!</title>
	<!-- Bootstrap Core CSS -->
	<link href="/js/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="/css/mtek_font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="/css/fonts/font-lineicons.css" rel="stylesheet" type="text/css">

	<!-- Theme CSS -->
	<link href="/theme/agency/css/agency.css" rel="stylesheet">
	<link href="/theme/agency/css/hs_pub.css" rel="stylesheet">
	<!-- Plugin Css -->
	<link href="/css/jquery-ui.css" rel="stylesheet">

	<script src="http://g.tbcdn.cn/kissy/k/1.4.7/seed-min.js" charset="utf-8"></script>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<style>
	.msg{padding:50px 0 30px}
	.msgImg{width: 24rem;}
	.time{font-size: 18px;color: tomato; font-family: "Lucida Grande", "Lucida Sans Unicode", geneva, verdana, arial, helvetica, sans-serif}
	.point{color: tomato; }
</style>
<body>
<body id="page-top">

<div class="secondNav mbs mts">
	<div class="container">
		<div class="logo logo-main-dark"><a href="/"></a></div>
		<ul class="navlist">
			<li><a href="/">首页</a></li>
			<li><a href="/newhouse">新房</a></li>
			<li><a href="/sale">二手房</a></li>
			<li><a href="/rent">租房</a></li>
			<li><a href="/office/index?type=rent">写字楼</a></li>
			<li><a href="/news">资讯</a></li>
			<li><a href="/guide">指南</a></li>
		</ul>
	</div>
</div>

<div class="container pub-bg">
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
</body>
</html>