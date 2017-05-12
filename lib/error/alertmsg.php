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
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<title>系统提示信息</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php if($time>0){ ?><meta http-equiv="refresh" content="<?=$time;?>;URL=<?=$refresh;?>" /><?php } ?>
<script type="text/javascript" src="/js/plugins/artDialog/artDialog.source.js?skin=default"></script>
<script type="text/javascript" src="/js/plugins/artDialog/plugins/iframeTools.js"></script>
<script src="/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="/js/candor.common.js" type="text/javascript"></script>
</head>
<body>
</body>
</html>
<script>
var msg = '<?=$msg?>';
var status = '<?=$style?>';
var btn1 = '返回继续操作';
var btn2 = '未定义名称';
var url1='';
var url2='';
<?php
	if(!empty($url)){
		$_url = explode("|",$url);
		if(count($_url)>1){
			echo "url1 = '".$_url[0]."';";
			echo "btn1 = '".$_url[1]."';";
		}else{
			echo "url1 = '".$url."';";
		}
	}
	
	if(!empty($url2)){
		$_url2 = explode("|",$url2);
		if(count($_url2)>1){
			echo "url2 = '".$_url2[0]."';";
			echo "btn2 = '".$_url2[1]."';";
		}else{
			echo "url2 = '".$url2."';";
		}
	}
?>

var obj = art.dialog({
	lock: true,
	background: '#ccc', // 背景色
	opacity: 0.37,	// 透明度
	content: msg,
	icon: 'icon48_'+status,
	button: [
        {
            name: btn1,
            callback: function () {
            	if (url1.indexOf("window=close")>=0) {
					art.dialog.close();
				}else if(url1.indexOf("window=reload")>=0||url1.indexOf("close=now")>=0){
					artDialog.open.origin.location.reload();	
				}else{
	                if(url1!=''){
	                	if(url1=="/userlogin"){
	                		window.top.location.href=url1;
	                	}else{
	                		window.location.href=url1;
	                	}
						
					}else{
						window.history.go(-1);
					}
				}
                return false;
            },
            focus: true
        }
		<?php if(!empty($url2)){ ?>
		,{
            name: btn2,
            callback: function () {
			   if(url2!=''){
			   		if(url1=="/userlogin"){
                		window.top.location.href=url2;
                	}else{
                		window.location.href=url2;
                	}
			   }else{
				   window.history.go(-1);
			   }
			   return false;
            }
        }
		<?php } ?>
    ],
	close: function () {
		if (url1.indexOf("window=close")>=0) {
			art.dialog.close();
		}else if(url1.indexOf("window=reload")>=0||url1.indexOf("close=now")>=0){
			artDialog.open.origin.location.reload();	
		}else{
			if(url1!=''){
	    		if(url1=="/userlogin"){
	        		window.top.location.href=url1;
	        	}else{
	        		window.location.href=url1;
	        	}
			}else{
				window.history.go(-1);
			}
		}	
    }
	/*
	ok: function () {
		if(callback!=null){
			eval(callback+"()");
		}else{
			//window.location.reload(); 
			//window.location.href=url
		}
		return true;
	},
	cancel: true
	*/
});
</script>
