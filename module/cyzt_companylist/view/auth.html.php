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
<title>公司管理</title>
</head>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/cdrstyle.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/style.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/page.css';?>' type='text/css' media='screen' />
<script src="/js/jquery-1.8.3.min.js" ></script>
<script src="/js/candor.common.js"></script>
<script src="/js/jquery-ui.custom.min.js" type="text/javascript"></script>
<script src="/js/jquery.cookie.js" type="text/javascript"></script>
<style>
blockquote small:before {
    content: " ";
}
.arrange li{width:130px;overflow:hidden;height:18px;padding-left:5px;}
.inputnoborder{width:110px;border:0;}
.searchbtn{ background:url('/theme/default/images/icon/search.png') no-repeat;padding:0 12px; margin-left:5px}
.searchbtn:hover{background:url('/theme/default/images/icon/search-hover.png') no-repeat;}

#tree3{height:454px; background:#FFFFFF}


#main-content {
	margin-bottom: 20px !important;
    margin-top: 0;
	min-height:100%;
}
</style>
<script>
$(document).ready(function(){
	//$("#opform").html5Validate();
	disabled(true);
	operateBar('show','edit');
	operateFactoryFun('edit',edit);
});	

function edit(){		
	disabled(false);
	operateBar('show','save,cancel');
	operateFactoryFun('save',vk);
	operateFactoryFun('cancel',cancel);
}

function vk(){
	$("#opform").submit();	
}
function cancel(){
	prompt('您确认放弃操作嘛？','warning');
	//disabled(true);
	//operateBar('show','edit');
	//operateFactoryFun('edit',edit);
}
</script>
<body>

<div id="search_content" style="position:fixed">
	<div id="search_frist_spacer">
		<div class="row-fluid" align="right" id="operateBar">
			<a href="javascript:;" class="btn" id="cancel">取消</a>&nbsp;
			<a href="javascript:;" class="btn" id="save"><i class="icon-check"></i>保存</a>
			<a href="javascript:;" class="btn" id="edit">编辑</a>&nbsp;&nbsp;
		</div>
	</div>
	<div id="search_shadow"></div>
</div>


<div id="main-content">
	<div class="container-fluid" style="padding-top:50px;">
		<div class="row-fluid">	
		
		<div class="span12">	
			<div class="wrap-sl" style="height:432px;overflow:hidden;">
				<div class="wrap-sl-header"  gray-blue>
				<h5>&nbsp;<b>角色信息:</b></h5>
				</div>
				<form class="form-horizontal" id="opform" name="opform" action="/cyzt_companylist/authPerson.candor?action=save" method="post">
					<input type="hidden" value="<?=$user_id?>" id="user_id" name="user_id"  />
					<div class="wrap-sl-content" style="height:449px; width:100%; overflow:auto; margin-bottom:10px; overflow-x:hidden; ">
						<ul class="unstyled arrange">
							<? foreach($roleList as $k=>$v){ ?>
							<li>&nbsp;<input type="checkbox" name="selectuser[]" value="<?=$v['id']?>" <? if($v['checked']==1){echo 'checked="checked"';} ?> />&nbsp;<?=$v['name']?></li>
							<? } ?>
	
						</ul>
					</div>
				</form>
			</div>
		</div>				
			<!--span12 end -->
		</div>
	</div>	
</div>
</body>
</html>
