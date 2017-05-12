<?php
/**
 * Html模板文件
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong<751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: index.html.php,v 1.4 2012/02/16 09:54:23 lj Exp $
 */
 use lib\form\Form as Form;
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
      <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="caption">
                    <i class="fa fa-home"></i>&nbsp;<a href="/admin_wkf/index">流程设计</a>&nbsp;<i class="fa fa-angle-right"></i>&nbsp;<?php echo $handle=='edit'?'编辑':'新增' ?>
                    </div>
                    <!-- begin button-content -->
                    <div class="btn-group pull-right"><?=Form::btn_main($this->config->module->wkfBtn,$handle,1);?></div>
                    
                    <!-- end button-content -->
                </div>
                <div class="panel-body">
                    <form action="<?=$handle?>Wkf?action=save" id="opform" name="opform"  method="post"  enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id" value="<?=$Info['id']?>" />
                    <!-- begin wkf-content -->
                    <div class="row">
                          <div class="col-md-4">
                            <?=Form::input('name',$Info['name'],$handle,'流程名称');?> 
                            <?=Form::input('due_date',$Info['due_date'],$handle,'办理期限(单位/天)');?>
                          </div><!-- col-md-4 -->
                          
                          <div class="col-md-4">
                            <?=Form::input('alias',$Info['alias'],$handle,'业务名');?>
                            <?=Form::radio($name='is_suspended',array(1=>'是',0=>'否'),empty($Info['is_suspended'])?0:$Info['is_suspended'],$handle,'是否挂起');?>
                          </div><!-- col-md-4 -->
                          
                          <div class="col-md-4">
                            <?=Form::input('res_table',$Info['res_table'],$handle,'业务表名');?>
                            <?=Form::select_multiple('res_field[]',@$Info['res_fields'],$Info['res_field'],$handle,'业务流程字段');?>
                          </div><!-- col-md-4 -->
                    </div>
                    <!-- edn wkf-content -->
                    </form>
                  
                    <!-- begin activity-list -->
                    <div class="tabbable-line">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_default_1" data-toggle="tab">流程节点</a></li>
                                <li><a href="#tab_default_2" data-toggle="tab">流程图</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab_default_1" class="tab-pane active">
                                    <table id="table"
                                           data-toggle="table"
                                           data-classes="table table-hover table-no-bordered"
                                           data-url="/admin_wkf/actList?wkf_id=<?=$Info['id']?>"
                                           data-side-pagination="server">
                                        <thead>
                                        <tr>
                                            <th data-field="id">ID</th>
                                            <th data-field="name" data-switchable="false">名称</th>
                                            <th data-field="type">类别</th>
                                            <th data-field="start">工作流开始</th>
                                            <th data-field="end">工作流结束</th>
                                            <th data-field="delete">操作</th>
                                        </tr>
                                        </thead>
                                    </table>
                                    <? if($handle=='edit'){ ?>
                                    <button class="btn btn-success btn-sm" type="button" onclick="activityAdd(<?=$Info['id']?>);" value="">添加项目</button>
                                    <? } ?>
                                </div>
                                <div id="tab_default_2" class="tab-pane">
                                    流程图
                                </div>
                            </div>
                        </div>
                    <!-- end activity-list -->
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
<script src="/js/bootstrap-table/src/bootstrap-table.js"></script>
<script src="/js/bootstrap-table/src/extensions/toolbar/bootstrap-table-toolbar.js"></script>
<script src="/js/plugins/artDialog/artDialog.source.js?skin=default"></script>
<script src="/js/plugins/artDialog/plugins/iframeTools.js"></script>

<!--LOADING SCRIPTS FOR PAGE--><!--CORE JAVASCRIPT-->
<script src="/js/mtek_core.js"></script>
<script src="/js/mtek_system-layout.js"></script>
<script src="/js/mtek_jquery-responsive.js"></script>

<script>
var $table = $('#table');
var actUrl = 'showAct';
jQuery(document).ready(function () {
    "use strict";
    JQueryResponsive.init();
    Layout.init();

	$('.selectpicker').selectpicker();
	
	<?php if($handle=='edit'){?>
	$table.bootstrapTable('showColumn', 'delete');
	actUrl = 'editAct';
	<? } ?>

	//get res_table's fields
	$("#res_table").blur(function(){
		$.ajax({
			url: "/admin_wkf/ajaxTableFields",
			dataType: "json",
			async: true,
			data: { "table_name": $(this).val() },
			type: "GET",
			success: function(json) {
				$(".selectpicker").empty(); 
				$.each( json, function(index, value){ 
				    //alert( "item #" + index + " its value is: " + value ); 
					$('.selectpicker').append($("<option></option>").attr("value",index) .text(value));
				}); 
				$('.selectpicker').siblings('div').remove();
				$('.selectpicker').selectpicker()
			}
		});
	});
	
});

$table.bootstrapTable({
	onDblClickRow: function (row, element, field) {
		 //console.log(row);
		 //alert(row.id);

		 art.dialog.open('/admin_wkf/'+actUrl+'?id='+row.id+'&phandle=<?=$handle?>',
		 	{title: "",
			width: '80%',
			height: '80%',
			lock: 'true',
			esc: 'false',
			close: function(){
				//重新刷新本页面;
				//window.location.reload();
				$table.bootstrapTable('refresh');
				return true;   
			} 
		},false);
	}
});

function delAct(act_id){
	if(window.confirm('您确定要删除吗？')){
		$.ajax({
			url: "/admin_wkf/delAct",
			dataType: "json",
			async: true,
			data: { "act_id":act_id },
			type: "GET",
			success: function(json) {
				alert(json.des);
				if(json.status==1){
					$table.bootstrapTable('refresh');
				}
			}
		});
	}else{
		return false;
	}
}

function vk(){
	$("#opform").submit();	
	//$("#opbtn").click();
}

function cancel(){
	prompt('您确认放弃操作嘛？','warning');
}

function activityAdd(wkf_id)
{
	art.dialog.open('/admin_wkf/addAct?wkf_id='+wkf_id,{title: "",
		width: '80%',
		height: '80%',
		lock: 'true',
		esc: 'false',
		close: function(){
			//重新刷新本页面;
    		$table.bootstrapTable('refresh');
            return true;   
		} 
	},false);
}
</script>
</body>
</html>
