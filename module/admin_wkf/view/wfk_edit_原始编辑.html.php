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
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?=$this->config->module->name?></title>
<link rel="stylesheet" href='<?php echo $this->app->getWebRoot() .'theme/fonts/open_sans.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_font-awesome.min.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_simple-line-icons.css';?>' type='text/css' media='screen' />
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
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_self.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_system-responsive.css';?>' type='text/css' media='screen' />
<link rel="stylesheet" href="/js/bootstrap-datepicker/datepicker.css" type="text/css" media="screen">
</head>
<style>
.page-content {
    margin: 0px;
}
</style>
<body>
<div class="page-wrapper">

<div class="page-content">
	<!-- begin page header-->
	<div class="page-title-breadcrumb-small">
		<div class="btn-group pull-left">
            <?=Form::btn_main($this->config->module->btnMain,$handle);?>
        </div>
		<div class="pull-right">
            <ol class="breadcrumb page-breadcrumb hidden-xs">
                <li><i class="fa fa-home"></i>&nbsp;<a href="/wkf_admin/index">流程设计</a>&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
                <li class="active"><?php echo $handle=='edit'?'编辑':'新增' ?></li>
            </ol>
		</div>
	</div>
	<!-- end  page header-->
	
	<!-- begin box-content -->
	<div class="box-content">
      <!--begin content-->
      <div class="content"> 
        <div class="page-profile">
          <div class="panel">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-xs-12">
                         <form class="form-horizontal" action="<?=$handle?>Wkf?action=save" id="opform" name="opform"  method="post"  enctype="multipart/form-data">
                         <input type="hidden" id="id" name="id" value="<?=$Info['id']?>" />
                          <div class="col-md-4">
                            <?=Form::input('name',$Info['name'],$handle,'流程名称');?> 
                            <?=Form::input('due_date',$Info['due_date'],$handle,'办理期限(单位/天)');?>
                            <?=Form::input('create_uid',$Info['create_uid'],$handle,'创建者',true);?>
                          </div><!-- col-md-4 -->
                          
                          <div class="col-md-4">
                            <?=Form::input('alias',$Info['alias'],$handle,'业务名');?>
                            <?=Form::radio($name='is_suspended',array(1=>'是',0=>'否'),empty($Info['is_suspended'])?0:$Info['is_suspended'],$handle,'是否挂起');?>
                            <?=Form::input('create_date',$Info['create_date'],$handle,'创建时间',true);?>
                          </div><!-- col-md-4 -->
                          
                          <div class="col-md-4">
                          	<?=Form::input('res_table',$Info['res_table'],$handle,'业务表名');?>
                            <?=Form::input('res_field',$Info['res_field'],$handle,'业务流程字段');?>             
                          </div><!-- col-md-4 -->
                        </form>
                    </div>
                  </div>
                </div>
              </div>
        </div>
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
<script src="/js/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<!--LOADING SCRIPTS FOR PAGE-->

<!--LOADING SCRIPTS FOR PAGE--><!--CORE JAVASCRIPT-->
<script src="/js/mtek_core.js"></script>
<script src="/js/mtek_system-layout.js"></script>
<script src="/js/mtek_jquery-responsive.js"></script>
<!--script src="/js/candor.portal.js" ></script>
<script src="/js/candor.common.js" type="text/javascript"></script-->
<script>
jQuery(document).ready(function () {
    "use strict";
    JQueryResponsive.init();
    Layout.init();
});

function vk(){
	$("#opform").submit();	
	//$("#opbtn").click();
}
function cancel(){
	prompt('您确认放弃操作嘛？','warning');
}
</script>
</body>
</html>
