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
<!DOCTYPE html>
<html lang="zh-CN">
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
	<!-- begin box-content -->
	<div class="box-content">
      <!--begin content-->
      <div class="content"> 
        <div class="page-profile">
          <div class="panel">
                <div class="panel-body">
                	<!-- begin button-content -->
                    <div class="btn-group pull-left"><?=Form::btn_main($this->config->module->btnMain,$handle);?></div>
                    <div class="pull-right">
                        <ol class="breadcrumb page-breadcrumb hidden-xs">
                            <li>
                            <i class="fa fa-home"></i>&nbsp;<a href="/wkf_admin/index">流程设计</a>&nbsp;<i class="fa fa-angle-right"></i>&nbsp;
                            </li>
                            <li class="active"><?php echo $handle=='edit'?'编辑':'新增' ?></li>
                        </ol>
                    </div>
                    <!-- end button-content -->
                  
                  	<!-- begin wkf-content -->
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
                    <!-- edn wkf-content -->
                  
                  	<!-- begin action-content -->
                    <div class="tabbable-line">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_default_1" data-toggle="tab">流程节点</a></li>
                                <li><a href="#tab_default_2" data-toggle="tab">流程图</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab_default_1" class="tab-pane active">
                                	<table id="table"
                                           data-toggle="table"
                                           data-classes="table table-no-bordered"
                                           data-url="/wkf_admin/actList?wkf_id=<?=$Info['id']?>"
                                           data-side-pagination="server">
                                        <thead>
                                        <tr>
                                            <th data-field="id">ID</th>
                                            <th data-field="name" data-switchable="false">名称</th>
                                            <th data-field="price">类别</th>
                                            <th data-field="start">工作流开始</th>
                                            <th data-field="end">工作流结束</th>
                                            <th data-field="delete" data-visible="false">&nbsp;</th>
                                        </tr>
                                        </thead>
                                    </table>
                                    <a class="btn" data-target="#modal-responsive" data-toggle="modal" href="javascript:void(0)">添加项目</a>
                                </div>
                                <div id="tab_default_2" class="tab-pane">
                                    流程图
                                </div>
                            </div>
                        </div>
                    <!-- end action-content -->
                </div>
              </div>
        </div>
      </div>
      <!--end content-->
    </div>
	<!-- end box-content --> 

	<div class="modal fade" aria-hidden="true" aria-labelledby="modal-wide-width-label" role="dialog" tabindex="-1" id="modal-responsive" style="display: none;">
        <div class="modal-dialog modal-wide-width">
            <div class="modal-content" style="height:500px;">
			<iframe id="main" src="/wkf_admin/addAct" width="100%" frameborder="0" scrolling="no"></iframe> 
            </div>
        </div>
    </div>
    
    <div class="modal fade" aria-hidden="true" aria-labelledby="modal-wide-width-label" role="dialog" tabindex="-1" id="modal-responsive-test" style="display: none;">
        <div class="modal-dialog modal-wide-width">
            <div class="modal-content" id="someID">
            </div>
        </div>
    </div>
	
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
<script src="/js/bootstrap-table/src/bootstrap-table.js"></script>
<script src="/js/bootstrap-table/src/extensions/toolbar/bootstrap-table-toolbar.js"></script>
<script src="/js/jquery.bootstrap-form-builder.js"></script>
<script src="/js/plugins/artDialog/artDialog.source.js?skin=default"></script>
<script src="/js/plugins/artDialog/plugins/iframeTools.js"></script>

<!--LOADING SCRIPTS FOR PAGE--><!--CORE JAVASCRIPT-->
<script src="/js/mtek_core.js"></script>
<script src="/js/mtek_system-layout.js"></script>
<script src="/js/mtek_jquery-responsive.js"></script>
<script src="/js/candor.form.js" type="text/javascript"></script>
<!--script src="/js/candor.portal.js" ></script>
<script src="/js/candor.common.js" type="text/javascript"></script-->
<script>
var $table = $('#table');
jQuery(document).ready(function () {
    "use strict";
    JQueryResponsive.init();
    Layout.init();
	
	<?php if($handle=='edit'){?>
$table.bootstrapTable('showColumn', 'delete');
	<? } ?>
	/********* 开始-表单初始化 **********/
	$('#someID').bootstrapForm({
		align: 'block',
		title: '创建：活动',
		formInputs: {
				column: 6,
				items: [
				{
					items:[
					{type: 'hidden', attr: { 
						id: 'id',
						value: 1
					}
					},
					{type: 'text',  attr: { 
						placeholder: '请输入名称',
						id: 'name',
						value: 1,
						helpblock: '',
						label: '名称',
						validationState: 'default' }
					},
					{type: 'radio', attr: {
						label: '工作流开始', 
						layout: 'inline',
						radios: [ 
							{ id: 'id1', name: 'radios', label: '任务', value: '1'},
							{ id: 'id2', name: 'radios', label: '开始', value: '2'},
							{ id: 'id3', name: 'radios', label: '结束', value: '3'} 
						]}
					}]
				},
				{
					items:[
					{type: 'text', attr: { 
						placeholder: '请输入节点类型',
						id: 'type',
						helpblock: '',
						label: '节点类型',
						validationState: 'default' }
					},
					{type: 'text', attr: { 
						placeholder: '执行动作（程序方法）',
						id: 'action',
						helpblock: '',
						label: '服务器动作',
						validationState: 'default' }
					}]
				},
				{
					items:[
					{type: 'text', attr: { 
						placeholder: '请输入节点类型',
						id: 'type',
						helpblock: '',
						label: '节点类型',
						validationState: 'default' }
					},
					{type: 'text', attr: { 
						placeholder: '执行动作（程序方法）',
						id: 'action',
						helpblock: '',
						label: '服务器动作',
						validationState: 'default' }
					}]
				}]
			},
		buttons: [ 
			{   dataDismiss: 'modal',
				validationState: 'default', 
				id: 'erase', 
				text: '取消',
				onSubmit: function(values) { alert('hi') }
			},
			{
				validationState: 'success', 
				id: 'submit', 
				text: '保存', 
				onSubmit: function(values) { console.log(values) }
			}
		 ]
	});
	/********* 结束-表单初始化 **********/
});

$('#modal-responsive').on('hide.bs.modal', function () {
  // 执行一些动作...
})

$('#modal-responsive').on('shown.bs.modal', function () {
  // 执行一些动作...
})

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
