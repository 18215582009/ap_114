<?php
/**
 * Html模板文件
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong<751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: set_app.html.php,v 1.3 2013/11/18 09:47:36 yl Exp $
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>应用设置</title>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/common.css';?>' type='text/css' media='screen' />
<script src="/js/jquery-1.10.2.min.js" ></script>

<!--LOADING SCRIPTS FOR PAGE-->
<script src="/js/plugins/artDialog/artDialog.source.js?skin=default"></script>
<script src="/js/plugins/artDialog/plugins/iframeTools.js"></script>

</head>
<body>
<div class="pagecenter">
<input name="hidTreeRole" type="hidden" id="hidTreeRole" value="" />
<!--//为了方便使用超级用户有所有权限-->
<div id="layout_menu" style="padding:0;overflow:auto; height:100%;width:100%;"></div>
<!--<div id="center-div" style="padding:5px;background:#dfe8f6;">aa</div>-->
<div id="center-div" style="padding:5px;">
  <p align="center" class="STYLE2">个人桌面 </p><br>
  <p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br>
  <p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br>
  <p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br>
  <p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br>
  <p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br>
  <p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br>
  <p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br>
  <p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br><p align="center" class="STYLE2">个人桌面 </p><br>
  <button name="demoCode04-2" class="runCode" onclick="huxingAdd()">运行»</button>
</div>
</body>
<script>
function huxingAdd()
{
	art.dialog.open('http://www.connect.renren.com/igadget/renren/index.html',
    {title: '人人网', width: 320, height: 400});
	/*art.dialog.open('/admin_wkf/addHuxing?project_id='+project_id+'&type='+type,{title: "",
		width: '79%',
		height: '66%',
		lock: 'true',
		esc: 'false',
		window: 'top',
		close: function(){
			//重新刷新表格数据;
            return true;   
		}
	},false);*/
}			
</script>
</html>
