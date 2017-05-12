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
<link type="text/css" rel="stylesheet" href='<?php echo $this->app->getWebRoot() .'theme/fonts/open_sans.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_font-awesome.min.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_simple-line-icons.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/bootstrap.min.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_animate.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_all.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/bootstrap-switch.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='/js/bootstrap-table/src/bootstrap-table.css' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/prettify.css';?>' type='text/css' media='screen' />
<link type="text/css" rel="stylesheet" href="" id="font-layout">
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/toastr.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_core.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_system.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_self.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_system-responsive.css';?>' type='text/css' media='screen' />
</head>
<style>
.page-content {
    margin: 0px;
}
</style>
<body>
<div class="page-wrapper">

<div class="page-content">
	<!-- begin page header--
	<div class="page-title-breadcrumb-small">
		<div class="btn-group pull-right">
            <a class="btn btn-info" href="/<?=$this->config->module->moduleName?>/addWkf.html">新建</a>
        </div>
		<div class="pull-right">
        	<div class="input-group">
                <form method="get" id="opform">
                    <ul class="list-group mail-action list-unstyled list-inline" style="margin-bottom:0;float:left">
                        <li>
                            <div class="input-group">
                            <input type="text" name="name" class="form-control  pull-left" id="name" value=""  placeholder="" />
                                <div class="input-group-btn">
                                    <button  type="submit" class="btn btn-info">搜索</button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </form>	
            </div>
		</div>
	</div>
	<!-- end  page header-->
	
	<!-- begin box-content -->
	<div class="box-content">
		<!--begin content-->
		<div class="content">
			<div class="page-profile">
				<div class="row">
					<div class="col-lg-12">
						<!-- begin panel -->
						<div class="panel">
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-12">
                                    <div id="toolbar">
                                        <!--div class="form-inline" role="form">
                                            <div class="form-group">
                                                <input name="search" class="form-control pull-left" type="text" placeholder="Search">
                                            </div>
                                            <button id="搜索" type="submit" class="btn btn-info">搜索</button>
                                        </div-->
                                        <a class="btn btn-default" href="/<?=$this->config->module->moduleName?>/addWkf.html">新建</a>
                                        <div class="btn-group">
                                            <button class="btn btn-default" type="button">更多</button>
                                            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">删除</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">导出</a></li>
                                                <li><a href="#">打印</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <table id="table"
                                    	   class="table table-striped"
                                           data-toolbar="#toolbar"
                                           data-toggle="table"
                                           data-height="511"
                                           data-url="/admin_wkf/ajaxList"
                                           data-sort-name="id"
                                           data-sort-order="desc"
                                           data-search="true"
                                           data-advanced-search="true"
										   data-id-table="advancedTable"
                                           data-show-refresh="true"
                                           data-show-toggle="true"
                                           data-show-columns="true"
                                           data-side-pagination="server"
                                           data-pagination="true"
                                           data-page-list="[5, 10, 20, 50, 100, 200]">
                                        <thead>
                                        <tr>
                                        	<th data-field="state" data-checkbox="true"></th>
                                            <th data-field="id">ID</th>
                                            <th data-field="name">名称</th>
                                            <th data-field="alias">业务名</th>
                                            <th data-field="due_date">办理期限</th>
                                            <th data-field="is_define_completed">定义完整</th>
                                            <th data-field="is_suspended">是否挂起</th>
											<th data-field="opt">操作</th>
                                        </tr>
                                        </thead>
                                    </table>
									</div>
								</div>
								
							</div>
						</div>
						<!-- end panel -->
					</div>
				</div>
				
			</div>
		</div>
		<!--end content-->
	</div>
	<!-- end box-content -->
    
    <!--begin Modal Responsive--
    <div id="dialog-form" title="Create new user">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-responsive-label" class="modal-title">Modal Responsive</h4></div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mbm"><input type="text" class="form-control"/></div>
                            <div class="mbm"><input type="text" class="form-control"/></div>
                            <div class="mbm"><input type="text" class="form-control"/></div>
                            <div class="mbm"><input type="text" class="form-control"/></div>
                            <div class="mbm"><input type="text" class="form-control"/></div>
                            <div class="mbm"><input type="text" class="form-control"/></div>
                            <div class="mbm"><input type="text" class="form-control"/></div>
                        </div>
                        <div class="col-md-6">
                            <div class="mbm"><input type="text" class="form-control"/></div>
                            <div class="mbm"><input type="text" class="form-control"/></div>
                            <div class="mbm"><input type="text" class="form-control"/></div>
                            <div class="mbm"><input type="text" class="form-control"/></div>
                            <div class="mbm"><input type="text" class="form-control"/></div>
                            <div class="mbm"><input type="text" class="form-control"/></div>
                            <div class="mbm"><input type="text" class="form-control"/></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Close
                    </button>
                    <button type="button" class="btn btn-success">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!--end Modal Responsive-->
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
<script src="/js/bootstrap-table/src/bootstrap-table.js"></script>
<script src="/js/bootstrap-table/src/extensions/toolbar/bootstrap-table-toolbar.js"></script>

<!--LOADING SCRIPTS FOR PAGE--><!--CORE JAVASCRIPT-->
<script src="/js/mtek_core.js"></script>
<script src="/js/mtek_system-layout.js"></script>
<script src="/js/mtek_jquery-responsive.js"></script>
<!--script src="/js/candor.portal.js" ></script-->

<script>
jQuery(document).ready(function () {
    "use strict";
    JQueryResponsive.init();
    Layout.init();
});
	
var $table = $('#table');
$table.bootstrapTable({
	onDblClickRow: function (row, element, field) {
		 window.location.href="/admin_wkf/showWkf.candor?id="+row.id;
		 //console.log(row);
	}
});
	
function ajaxSearch(){
	//带参数的search
	$table.bootstrapTable('refresh',{query:{type:'1',key:'fff'}});
}

function queryParams() {
	var params = {};
	$('#toolbar').find('input[name]').each(function () {
		params[$(this).attr('name')] = $(this).val();
	});
	return params;
}

function delWkf(wkf_id){
	//alert(wkf_id);return false;
	if(window.confirm('您确定要删除吗？')){
		$.ajax({
			url: "/admin_wkf/delWkf",
			dataType: "json",
			async: true,
			data: { "wkf_id":wkf_id },
			type: "GET",
			success: function(json) {
				alert(json.des);
				$table.bootstrapTable('refresh');
			},
			error: function() {
				alert('删除失败！');
			}
		});
	}else{
		return false;
	}
}

// your custom ajax request here
function ajaxRequest(params) {
	// data you need
	console.log(params.data);
	// get ajax data
	
	// just use setTimeout
	setTimeout(function () {
		params.success({
			total: 100,
			rows: [{
				"id": 0,
				"name": "Item 0",
				"price": "$0"
			}]
		});
	}, 1000);
}
</script>
</body>
</html>
