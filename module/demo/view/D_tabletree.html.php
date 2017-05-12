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
<title>Css+Html前端框架</title>
</head>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_font-awesome.min.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_simple-line-icons.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/bootstrap.min.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_animate.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_all.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/bootstrap-switch.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/prettify.css';?>' type='text/css' media='screen' />
<link type="text/css" rel="stylesheet" href="" id="font-layout">
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/toastr.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/jquery.treegrid.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_core.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_system.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_system-responsive.css';?>' type='text/css' media='screen' />
<style>
body{
    background:#ebf0f3 ;}
</style>
<body>
<div class="page-wrapper">

<div class="page-content">
	<!-- begin box-content -->
	<div class="box-content">
		<!--begin content-->
		<div class="content">
			<div class="page-profile">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel">
							<div class="panel-body">
								<div class="table-responsive">
									<table class="tree-projects table table-striped table-condensed mbn">
									<thead>
									<tr>
									<th>Porjects</th>
									<th width="13%">Member</th>
									<th width="10%">Points</th>
									<th width="13%">Status</th>
									<th width="13%">Deadline</th>
									<th width="10%">Priority</th>
									</tr>
									</thead>
									<tbody>
									<tr class="treegrid-1">
									<td>Project 1</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									</tr>
									
									<tr class="treegrid-2 treegrid-parent-1">
									<td><a class="text-link" href="#">Sed ut perspiciatis unde</a>
									</td>
									<td>Corey Smith</td>
									<td>10 Point</td>
									<td>
									<div class="label label-default">Closed</div>
									</td>
									<td>03.10.2014</td>
									<td>
									<div class="label label-success">Normal</div>
									</td>
									</tr>
									<tr class="treegrid-3 treegrid-parent-1">
									<td><a class="text-link" href="#">Omnis iste natus error sit</a>
									</td>
									<td>Isabella Allen</td>
									<td>14 Point</td>
									<td>
									<div class="label label-default">Closed</div>
									</td>
									<td>03.10.2014</td>
									<td>
									<div class="label label-success">Normal</div>
									</td>
									</tr>
									
									<tr class="treegrid-4">
									<td>Project 1</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									</tr>
									
									<tr class="treegrid-5 treegrid-parent-4">
									<td><a class="text-link" href="#">Sed ut perspiciatis unde</a>
									</td>
									<td>Corey Smith</td>
									<td>10 Point</td>
									<td>
									<div class="label label-default">Closed</div>
									</td>
									<td>03.10.2014</td>
									<td>
									<div class="label label-success">Normal</div>
									</td>
									</tr>
                                    <tr class="treegrid-12 treegrid-parent-5">
									<td><a class="text-link" href="#">Sed ut perspiciatis unde</a>
									</td>
									<td>Corey Smith</td>
									<td>10 Point</td>
									<td>
									<div class="label label-default">Closed</div>
									</td>
									<td>03.10.2014</td>
									<td>
									<div class="label label-success">Normal</div>
									</td>
									</tr>
									<tr class="treegrid-6 treegrid-parent-4">
									<td><a class="text-link" href="#">Omnis iste natus error sit</a>
									</td>
									<td>Isabella Allen</td>
									<td>14 Point</td>
									<td>
									<div class="label label-default">Closed</div>
									</td>
									<td>03.10.2014</td>
									<td>
									<div class="label label-success">Normal</div>
									</td>
									</tr>
									</tbody>
									</table>
									</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal fade" aria-hidden="true" aria-labelledby="modal-default-label" role="dialog" tabindex="-1" id="modal-default">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header bg-primary">
								<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
								<h4 class="modal-title text-center" id="modal-default-label">Edit
									Profile</h4></div>
							<div class="modal-body">
								<div class="st-title">Modal title goes here</div>
								<p class="st-description">Your form component goes here</p></div>
							<div class="modal-footer">
								<button class="btn btn-default" data-dismiss="modal" type="button">Close
								</button>
								<button class="btn btn-primary" type="button">Save changes</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="viewcode-example">
					<div class="progress progress-lg">
						<div class="progress-bar progress-bar-success progress-bar-striped" style="width: 70%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar">
							70%
						</div>
					</div>
					<div class="progress progress-md">
						<div class="progress-bar progress-bar-info" style="width: 50%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar">
							50%
						</div>
					</div>
					<div class="progress progress-lg">
						<div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: 20%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar">
							20%
						</div>
					</div>
					<div class="progress">
						<div class="progress-bar progress-bar-danger progress-bar-striped active" style="width: 90%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar">
							90%
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
<script src="/js/jquery.treegrid.js"></script>

<!--LOADING SCRIPTS FOR PAGE--><!--CORE JAVASCRIPT-->
<script src="/js/mtek_core.js"></script>
<script src="/js/mtek_system-layout.js"></script>
<script src="/js/jquery-responsive.js"></script>
<script src="/js/candor.portal.js" ></script>
</body>
</html>
<script>
$.extend($.fn.treegrid.defaults, {
    expanderExpandedClass: 'glyphicon glyphicon-chevron-down',
    expanderCollapsedClass: 'glyphicon glyphicon-chevron-right'
});

jQuery(document).ready(function () {
    "use strict";
    JQueryResponsive.init();
    Layout.init();
	
	$('.tree-projects').treegrid({
		expanderExpandedClass: 'fa fa-caret-down',
		expanderCollapsedClass: 'fa fa-caret-right'
	});
	
	//table_treegrid.init();
});


</script>

