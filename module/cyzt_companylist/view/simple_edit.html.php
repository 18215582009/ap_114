<?php
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
<title>应用设置</title>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/common.css';?>' type='text/css' media='screen' />
<script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/js/jquery.cookie.js" type="text/javascript"></script> 
<!-- *加载等待 js -->
<script src="/js/candor.blockui.js" type="text/javascript"></script>
<style>
.app_wrap{width:500px;height:320px; background:#FFF}
.app_wrap .app_category{width:100%;height:30px; background:#CCC}
.app_wrap .app_content{width:100%;height:290px;}
.app_wrap .app_content a{ color:#000; font-size:12px;}
.app_wrap .app_content img{ vertical-align:middle; display:block}
.app_wrap .app_content .left{float:left;width:119px;height:290px;border-right:1px solid #d0d0d0; background:#F3F3F3}
.app_wrap .app_content .left li{ background:#F3F3F3; border-bottom:1px solid #d0d0d0; padding:5px 10px;}
.app_wrap .app_content .left li img{ vertical-align:middle; display:inline}

.app_wrap .app_content .right{float:left;width:380px;height:290px;}
.app_wrap .app_content .right ul{width:100%;height:100%;}
.app_wrap .app_content .right li{float:left;padding:10px 22px; text-align:center; position:relative}
</style>
<script>			
function addtool(obj){
	var rtopFrame = $(self.parent.window.document);
	var id=$(obj).attr("id");
	var cimg = $(obj).find('img').attr('src');
	var title = $(obj).attr('title');
	var src = $(obj).attr('appurl');
	$(".my_tools ul",rtopFrame).append('<li id="'+id+'" class="itool" title="'+title+'" src="'+src+'"><img src="'+cimg+'" width="48" /></li>');
	$(obj).addClass('box-opacity');
	$(obj).attr('onclick','');
	window.parent.renderLeftTools(); 
	
	//设置cookie信息
	var cookie_itool = $.cookie(id);
	var cookie_itool_ids = $.cookie("itool_ids"); 
	if(cookie_itool==null){ 
		if(cookie_itool_ids==null){ 
			$.cookie("itool_ids",id,{expires:30,path:'/'});
		}else{
			$.cookie("itool_ids",cookie_itool_ids+"|"+id,{expires:30,path:'/'});
		}
		$.cookie(id,"id:"+id+";title:"+title+";src:"+src+";cimg:"+cimg,{expires:30,path:'/'});
	}
}

$(function(){
	//获取所有应用判断是否存在cookie信息
	$("#app_box li").each(function(i){
	   //检查cookie信息是否存在
		var cookie_itool = $.cookie($(this).attr('id')); 
		if(cookie_itool!=null){ 
			$(this).addClass('box-opacity');
			$(this).attr('onclick','');
		}
	 }); 
});

//关闭加载等待提示
$(window).load(function(){
	$('.html_content',$(self.parent.window.document)).unblock();
});

</script>
</head>
<style>
body{ background:url(/js/plugins/jquery.tabPanel/image/TabPanel/content_bg.png) repeat;}
</style>
<body>
	<div class="app_wrap" style="position:relative">
    	<div class="app_category"></div>
        <div class="app_content">
        	<div class="left">
            	<ul>
                	<li><a class="current" id="m01" href="javascript:;" title="系统管理" src="www.163.com"><img src="/images/icon/mytable.png" align="absMiddle" width="20" height="20"> 系统管理</a></li>
                </ul>
            </div>
            <div class="right">
            	<ul style="cursor:pointer" id="app_box">
                	<?php foreach($moduleList as $key=>$item){ ?>
                	<li id="app_<?php echo $item['id']; ?>" appid="<?php echo $item['id']; ?>" appurl="<?php echo "/".$item['module_name']; ?>" href="javascript:;" onclick="addtool(this)" title="<?php echo $item['business_name']; ?>">
                    	<img src="/images/app_icons/<?php echo $item['icon']; ?>" align="absMiddle" width="48" height="48">
                    	<span class="lright"><?php echo $item['business_name']; ?></span>
                    </li>
                    <?php } ?>
					<li id="app_99" appid="99" appurl="http://www.pm.com/sysworkflow/zh-CN/classic/cases/main" onclick="addtool(this)" title="工作流程">
                    	<img src="/images/app_icons/attendance.png" align="absMiddle" width="48" height="48">
                    	<span class="lright">工作流程</span>
                    </li>
					<li id="app_99" appid="99" appurl="/js/JGraph/processeditor.html" onclick="addtool(this)" title="流程建模">
                    	<img src="/images/app_icons/project.png" align="absMiddle" width="48" height="48">
                    	<span class="lright">流程建模</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>