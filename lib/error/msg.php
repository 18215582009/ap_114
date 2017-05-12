<?php 
	if(!empty($url)){
		$_url = explode("|",$url);
		if(count($_url)>1){
			$refresh = $_url[0];
		}else{
			$refresh = $url;
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>系统提示信息</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php if($time>0){ ?><meta http-equiv="refresh" content="<?=$time;?>;URL=<?=$refresh;?>" /><?php } ?>
<style>
.container{font-size:12px;font-family:verdana;line-height:180%;padding:0px; margin: 0 auto; height:270px;margin-top:50px;width:80%; background:#fff}
.title{background: #5CC7FF;padding-left:10px;font-weight:bold;line-height:30px;height:30px;color:#fff}
.content{padding-top:40px;font-size:14px; height:auto; min-height:120px;margin:0 auto;}
.content .icon { width:75px; height:75px; background-repeat:no-repeat;}
.content .succeed { background-image:url(/images/sys_icon/icon64_succeed.png);}
.content .error { background-image:url(/images/sys_icon/icon64_error.png); }
.content .help { background-image:url(/images/sys_icon/icon64_help.png); }
.content .warning { background-image:url(/images/sys_icon/icon64_warning.png); }
.content .info { background-image:url(/images/sys_icon/icon64_info.png); }
.content .stop { background-image:url(/images/sys_icon/icon64_stop.png); }
.content .forbidden { background-image:url(/images/sys_icon/icon64_forbidden.png); }
/*.content .icon { width:75px; height:57px;background-image:url(/images/icon/icon64_help.png); background-repeat:no-repeat;}
.content .alert { background-position:0 -96px; }
.content .succeed { background-position:0 0;}
.content .error { background-position:0 -48px; }
.content .confirm { background-position:0 -144px; }
*/
.opt{text-align:center;height:30px; margin-top:30px; }
.opt .div_btn{text-align:center;height:30px; margin-right:30px; display:inline}
.btn {color:#fff; border:1px double #0C4B82; background:#0075CC; height:28px; width:150px; text-align:center; cursor:pointer}
</style>
</head>

<body>
<div class="container">
	<div class="title">系统提示信息</div>
	<div class="content">
		<table align="center" width="90%">
			<tr>
			<td align="right" width="20%"><div class="icon <?=$style?>"></div></td>
			<td align="left" width="80%"><span style="color:#356498;padding-left:20px"><?=$msg; ?></span></td>
			</tr>
		</table>
	</div>
	<div class="opt">
		<?php 
		if(empty($url)){
			echo "<div class='div_btn' style=''><input class=btn type=button onclick='window.history.go(-1)' value='返回继续操作'/></div>";
		}else{
			$_url = explode("|",$url);
			if(count($_url)>1){
				echo "<div class='div_btn' ><input class=btn type=button onclick=\"window.location='".$_url[0]."';\" value='".$_url[1]."'/></div>";
			}else{
				echo "<div class='div_btn' ><input class=btn type=button onclick=\"window.location='".$url."';\" value='返回继续操作'/></div>";
			}
		}
		
		if(!empty($url2)){
			$_url = explode("|",$url2);
			if(count($_url)>1){
				echo "<div class='div_btn' ><input class=btn type=button onclick=\"window.location='".$_url[0]."';\" value='".$_url[1]."'/></div>";
			}else{
				echo "<div class='div_btn' ><input class=btn type=button onclick=\"window.location='".$url2."';\" value='未定义名称'/></div>";
			}
		}
		?>
	</div>
</div>
</body>
</html>
<script>
//parent.close_loads();
</script>
