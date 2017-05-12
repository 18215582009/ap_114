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
	<!-- begin page header-->
	<div class="page-title-breadcrumb-small">
		<div class="btn-group pull-left">
            <a class="btn btn-info" href="/<?=$this->config->module->moduleName?>/addWkf.html">新建</a>
        </div>
		<div class="pull-right">
        	<div class="input-group">
                <form method="get" id="opform">
                    <ul class="list-group mail-action list-unstyled list-inline" style="margin-bottom:0;float:left">
                        <li>
                            <div class="input-group">
                            <input type="text" name="name" class="form-control  pull-left" id="name" value="<?=$name?>"  placeholder="" />
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
                                    <table id="table"
                                    	   class="table table-striped"
                                           data-toggle="table"
                                           data-height="428"
                                           data-url="/wkf_admin/ajaxList"
                                           data-sort-name="id"
                                           data-sort-order="desc"
                                           data-search="false"
                                           data-show-refresh="true"
                                           data-show-toggle="true"
                                           data-show-columns="true"
                                            data-query-params="queryParams"

                                           data-side-pagination="server"
                                           data-pagination="true">
                                        <thead>
                                        <tr>
                                            <th data-field="id">ID</th>
                                            <th data-field="name">名称</th>
                                            <th data-field="price">业务名</th>
                                            <th data-field="price">办理期限</th>
                                            <th data-field="price">定义完整</th>
                                            <th data-field="price">是否挂起</th>
                                        </tr>
                                        </thead>
                                    </table>
                                    
        <button onclick="ajaxSearch()">resfresh</button>
        <button onclick="ajaxSearch1()">resfresh1</button>
									<table class="table table-hover-color table-striped">
									<thead>
									<tr>
									<th>ID</th>
									<th>名称</th>
									<th>业务名</th>
									<th>办理期限</th>
                                    <th>定义完整</th>
                                    <th>是否挂起</th>
									<!--th>操作</th-->
									</tr>
									</thead>
									<tbody>
									<? foreach($list as $k=>$v){ ?>
									<tr onclick="window.location.href='showWkf.html?id=<?=$v['id']?>'">
									<td><?=$v['id']?></td>
									<td><?=$v['name']?></td>
									<td><?=$v['alias']?></td>
									<td><?=$v['due_date']?></td>
                                    <td><? if($v['is_define_completed']==1) echo "是";else echo "否";?></td>
                                    <td><? if($v['is_suspended']==1) echo "是"; else echo "否";?></td>
									<!--td>
									<span style="display:block">
                                    <a class="btn btn-default btn-xs" href="editWkf.html?id=<?=$v['id']?>" style="font-weight:normal">
                                    	<i class="fa fa-edit"></i>&nbsp;编辑</a>
                                    <a style="font-weight:normal" href="actList.html?id=<?=$v['id']?>" class="btn btn-default btn-xs">
                                   	 <i class="fa fa-link"></i>&nbsp;设计</a>
                                    <a class="btn btn-default btn-xs" href="" style="font-weight:normal">
                                    	<i class="fa fa-trash-o"></i>&nbsp;删除</a>
                                    </span>
                                    <span style="display:block;margin-top:5px;">
                                    <a class="btn btn-default btn-xs" href="" style="font-weight:normal">
                                    	<i class="glyphicon glyphicon-share"></i>&nbsp;发布	
                                    </a>
                                    <a class="btn btn-default btn-xs" href="" style="font-weight:normal">
                                    	<i class="fa fa-signal"></i>&nbsp;统计</a>
                                    </span>
									</td-->
									</tr>
									<? } ?>
									</tbody>
									</table>
									</div>
								</div>
								<div class="row">
                                    <ul class="pagination pull-right">
                                        <?=$splitPageStr?>
                                    </ul>
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
function ajaxSearch(){
	 $table.bootstrapTable('refresh',{query:{type:'1',key:'fff'}});
}
function ajaxSearch1(){
	 $table.bootstrapTable('refresh',{silent: true});
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
