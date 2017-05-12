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
<title><?=$this->config->zbxt_health->name?></title>
</head>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_font-awesome.min.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_simple-line-icons';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/bootstrap.min.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_animate.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_all.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/bootstrap-switch.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/prettify.css';?>' type='text/css' media='screen' />
<link type="text/css" rel="stylesheet" href="" id="font-layout">
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/toastr.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/bootstrap-select.min.css';?>' type='text/css' id='skinSheet' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_core.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_system.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_system-responsive.css';?>' type='text/css' media='screen' />

<body>
<div class="page-wrapper">
  <div class="page-content" style="min-height:0px;">
    <!-- begin page header-->
    <div class="page-title-breadcrumb">
      <div class="page-header pull-left">
        <div class="page-title"><?=$this->config->zbxt_health->name?></div>
      </div>
      <ul class="breadcrumb page-breadcrumb "  style="padding: 0px;">
 		<li class="pull-right">
		  <div class="row-fluid demo-btn"  id="operateBar">
		   		<a href="javascript:void(0)" class="btn btn-default" id="edit" onclick="cancel()">取消</a>
				<button class="btn btn-success" type="button" id="save" onclick="save()">保存</button>
		  </div>
		</li>
      </ul>
         </div>
    <!-- end  page header-->
    <!-- begin box-content -->
    <div class="box-content">
      <!--begin content-->
      <div class="content" style="padding-bottom: 0px;">
      	<div class="panel">
			<div class="panel-body">
			  <div class="row">
				 <form class="form-horizontal formTab" action="/<?=$this->config->zbxt_health->moduleName?>/<?=$method?>?action=save" id="opform" name="opform"  method="post"  enctype="multipart/form-data" onsubmit="prompt('加载等待','loading')">
				    <input type="hidden" id="id" name="ID" value="<?=$data['ID']?>" />
					<div class="col-xs-12">
					  <div class="row">
						  <div class="col-md-11">
							<div class="form-group">
								<label class="control-label" for="showEasing">名称</label>
								<input type="text" class="form-control input-medium" placeholder="" name="JKZK" id="" value="<?=$data["JKZK"]?>" required="required"/>
							</div>                       
						  </div>
							<!-- <div class="col-md-11">
								<div class="form-group">
								  <label class="control-label" for="message">说明</label>
								  <textarea class="form-control" placeholder="请填写说明信息 ..." rows="3" id="note" name="ZTMS" ><?=$data["ZTMS"]?></textarea>
								</div>
						  	</div>	 -->				  						  
					  </div>
					</div>
				</form>
			  </div>
			</div>
		</div><!--end panel-->
      </div>
      <!--end content-->
    </div>
    <!-- end box-content -->
  </div>
</div>
<script src="/js/jquery-1.10.2.min.js" ></script>
<script src="/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/js/candor.blockui.js"></script>
<script src="/js/jquery.nicescroll.js"></script>
<script src="/js/jquery-ui.js"></script>
<script src="/js/bootstrap.min.js" ></script>
<script src="/js/bootstrap-hover-dropdown.js"></script>
<script src="/js/mtek_html5shiv.js"></script>
<script src="/js/respond.min.js"></script>
<script src="/js/jquery.metisMenu.js"></script>
<script src="/js/mtek_icheck.min.js"></script>
<script src="/js/mtek_custom.min.js"></script>
<script src="/js/jquery.slimscroll.js"></script>
<script src="/js/bootstrap-switch.min.js"></script>
<script src="/js/prettify.js"></script>
<script src="/js/jquery.cookie.js"></script>
<script src="/js/jquery.pulsate.js"></script>
<!--LOADING SCRIPTS FOR PAGE-->
<script src="/js/bootstrap-select.min.js"></script>
<!--LOADING SCRIPTS FOR PAGE-->

<!--CORE JAVASCRIPT-->
<script src="/js/mtek_core.js"></script>
<script src="/js/mtek_system-layout.js"></script>
<script src="/js/jquery-responsive.js"></script>
<script src="/js/candor.portal.js" ></script>
<script src="/js/candor.common.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/plugins/jquery-autocomplete/jquery.autocomplete.js.min.js"></script>

</body>
</html>
<script>

jQuery(document).ready(function () {
    "use strict";
    JQueryResponsive.init();
    Layout.init();

});

function save(){
	$("form").eq(0).submit();
}

function cancel(){
	art.dialog.close();
}

var close='<?=$_GET["close"]?>';
if(close){
	artDialog.open.origin.location.reload();
}
</script>


