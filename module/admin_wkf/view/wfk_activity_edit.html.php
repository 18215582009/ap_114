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
<div class="box-content">
	<div class="content">
    	<div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="caption">创建：活动</div>
                    <div class="pull-right"><?=Form::btn_alert($this->config->module->actBtn,$handle,$phandle);?></div>
                </div>
                <div class="panel-body">
                      <form action="<?=$handle?>Act?action=save" id="opform" name="opform"  method="post"  enctype="multipart/form-data">
                      <!--p class="mlx plm">模块功能描述</p-->
                      <input type="hidden" id="id" name="id" value="<?=$Info['id']?>" />
                      <input type="hidden" id="wkf_id" name="wkf_id" value="<?=$Info['wkf_id']?>" />
                      <div class="row">
                          <div class="col-md-4">
                            <?=Form::input('name',$Info['name'],$handle,'活动名称');?>
                          </div><!-- col-md-4 -->
                          
                          <div class="col-md-4">
                            <?=Form::input('due_date',$Info['due_date'],$handle,'活动完成期限(天)');?>
                          </div><!-- col-md-4 -->
                          
                          <div class="col-md-4">
                            <?=Form::radio($name='type',array(1=>'活动节点',2=>'开始节点',3=>'结束节点'),empty($Info['type'])?0:$Info['type'],$handle,'活动节点类型');?>
                          </div><!-- col-md-4 -->
                       </div>
                      <div class="row"> 
                      <!-- begin activity-config -->
                      <div class="tabbable-line">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_default_1" data-toggle="tab">属性</a></li>
                                <li><a href="#tab_default_2" data-toggle="tab">转换</a></li>
                                <li><a href="#tab_default_3" data-toggle="tab">表单</a></li>
                                <li><a href="#tab_default_4" data-toggle="tab">权限</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab_default_1" class="tab-pane active">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <?=Form::select($name='kind',array(1=>'空',2=>'函数',3=>'子流程',4=>'全部停止'),empty($Info['kind'])?0:$Info['kind'],$handle,'执行的动作类别');?>
                                            <?=Form::select($name='subflow_id',array(1=>'1',2=>'2',3=>'3'),empty($Info['subflow_id'])?0:$Info['subflow_id'],$handle,'子工作流');?>
                                      </div>
                                         
                                         <div class="col-md-4">
                                            <?=Form::input('action',$Info['action'],$handle,'执行动作-即程序方法，如apply()');?>  
                                         </div>
                                         
                                      <div class="col-md-4">
                                            <?=Form::select($name='join_mode',array(1=>'异或XOR',2=>'或OR',3=>'和AND'),empty($Info['join_mode'])?0:$Info['join_mode'],$handle,'合并模式');?>
                                            <?=Form::select($name='split_mode',array(1=>'异或XOR',2=>'或OR',3=>'和AND'),empty($Info['split_mode'])?0:$Info['split_mode'],$handle,'拆分模式');?>
                                         </div>
                                    </div>
                                </div>
                                <div id="tab_default_2" class="tab-pane">
                                    <table id="tableJoin"
                                           data-toggle="table"
                                           data-classes="table table-hover table-no-bordered"
                                           data-url="/admin_wkf/tranFromToList?act_id=<?=$Info['id']?>&wkf_id=<?=$Info['wkf_id']?>&type=join"
                                           data-side-pagination="server">
                                        <thead>
                                        <tr>
                                            <th data-field="id">ID</th>
                                            <th data-field="act_from_name" data-switchable="false">来源活动节点</th>
                                            <th data-field="signal">信号（按钮名称）</th>
                                            <th data-field="condition">条件</th>
                                            <th data-field="delete_from" data-visible="false">&nbsp;</th>
                                        </tr>
                                        </thead>
                                    </table>
                                     <? if($handle=='edit' or $handle=='add'){ ?>
                                        <button class="btn btn-success btn-sm" type="button" onclick="tranAdd('join',<?=$Info['id']?>);" value="">添加项目</button>
                                    <? } ?>
                                    
                                    <table id="tableSplit"
                                           data-toggle="table"
                                           data-classes="table table-hover table-no-bordered"
                                           data-url="/admin_wkf/tranFromToList?act_id=<?=$Info['id']?>&wkf_id=<?=$Info['wkf_id']?>&type=split"
                                           data-side-pagination="server">
                                        <thead>
                                        <tr>
                                            <th data-field="id">ID</th>
                                            <th data-field="act_to_name" data-switchable="false">目的活动节点</th>
                                            <th data-field="signal">信号（按钮名称）</th>
                                            <th data-field="condition">条件</th>
                                            <th data-field="delete_to" data-visible="false">&nbsp;</th>
                                        </tr>
                                        </thead>
                                    </table>
                                     <? if($handle=='edit' or $handle=='add'){ ?>
                                        <button class="btn btn-success btn-sm" type="button" onclick="tranAdd('split',<?=$Info['id']?>);" value="">添加项目</button>
                                    <? } ?>
                                    
                                    
                                </div>
                                <div id="tab_default_3" class="tab-pane">
                                    表单
                                </div>
                                <div id="tab_default_4" class="tab-pane">
                                    角色
                                </div>
                                
                            </div>
                        </div>
                      <!-- end activity-config -->
                      </div>
                     </form>
                </div>
            </div><!-- panel end -->
        </div>
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
<script src="/js/plugins/artDialog/artDialog.source.js?skin=default"></script>
<script src="/js/plugins/artDialog/plugins/iframeTools.js"></script>
<!--LOADING SCRIPTS FOR PAGE-->

<!--LOADING SCRIPTS FOR PAGE--><!--CORE JAVASCRIPT-->
<script src="/js/mtek_core.js"></script>
<script src="/js/mtek_system-layout.js"></script>
<script src="/js/mtek_jquery-responsive.js"></script>

<script>
var $tableJoin  = $('#tableJoin'),
	$tableSplit = $('#tableSplit');
var tranUrl = 'showTran';

jQuery(document).ready(function () {
    "use strict";
    JQueryResponsive.init();
    Layout.init();
	
	<?php if($handle=='edit' or $handle=='add'){?>
$tableJoin.bootstrapTable('showColumn', 'delete_from');
$tableSplit.bootstrapTable('showColumn', 'delete_to');
tranUrl = 'editTran';
	<? } ?>
	
	if($("#kind").val()==3){
		$("#subflow_id").attr("disabled",false);
	}else{
		$("#subflow_id").attr("disabled",true);
	}
	$("#kind").change(function(){
		if($(this).val()==3){
			$("#subflow_id").attr("disabled",false);
		}else{
			$("#subflow_id").attr("disabled",true);
		}
	});
});

function tranAdd(type,act_id)
{
	art.dialog.open('/admin_wkf/addTran?act_id='+act_id+'&type='+type,{title: "",
		width: '79%',
		height: '66%',
		lock: 'true',
		esc: 'false',
		close: function(){
			//重新刷新表格数据;
			if(type=='join'){
    			$tableJoin.bootstrapTable('refresh');
			}else{
				$tableSplit.bootstrapTable('refresh');
			}
            return true;   
		}
	},false);
}

function delTran(type,tran_id){
	if(window.confirm('您确定要删除吗？')){
		$.ajax({
			url: "/admin_wkf/delTran",
			dataType: "json",
			async: true,
			data: { "tran_id":tran_id },
			type: "GET",
			success: function(json) {
				alert(json.des);
				if(json.status==1){
					if(type=='join'){
						$tableJoin.bootstrapTable('refresh');
					}else{
						$tableSplit.bootstrapTable('refresh');
					}
				}
			}
		});
	}else{
		return false;
	}
}

$tableJoin.bootstrapTable({
	onDblClickRow: function (row, element, field) {
		 //console.log(row);
		 //alert(row.id);
		 art.dialog.open('/admin_wkf/'+tranUrl+'?id='+row.id+'&phandle=<?=$handle?>',
		 	{title: "",
			width: '79%',
			height: '80%',
			lock: 'true',
			esc: 'false',
			close: function(){
				//重新刷新表格数据;
				$tableJoin.bootstrapTable('refresh');
				return true;   
			} 
		},false);
	}
});

$tableSplit.bootstrapTable({
	onDblClickRow: function (row, element, field) {
		 //console.log(row);
		 //alert(row.id);
		 art.dialog.open('/admin_wkf/'+tranUrl+'?id='+row.id+'&phandle=<?=$handle?>',
		 	{title: "",
			width: '79%',
			height: '80%',
			lock: 'true',
			esc: 'false',
			close: function(){
				//重新刷新表格数据;
				$tableSplit.bootstrapTable('refresh');
				return true;   
			} 
		},false);
	}
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
