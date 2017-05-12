<?php
/**
 * Htmlģ���ļ�
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
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=$header?></title>
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
	<!-- begin page header-->
	<div class="page-title-breadcrumb">
		<div class="page-header pull-left">
			<div class="page-title"><?=$header?></div>
		</div>
		<ol class="breadcrumb page-breadcrumb hidden-xs">
			<li><i class="fa fa-home"></i>&nbsp;<a href="index.html">��������</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
			<li><a href="/index/demo"><?=$header?></a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
			<li class="active">�����ƻ�����</li>
		</ol>
	</div>
	<!-- end  page header-->
	
	<!-- begin box-content -->
	<div class="box-content"><!--BEGIN CONTENT-->
                    <div class="content">
                        <div class="page-mail">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="sidebar sidebar-left nav nav-pills">
                                        <div class="sidebar-row">
                                            <ul class="sidebar-list-info list-unstyled">
                                                <!--li class="mbm" style="border-bottom: 1px solid rgba(153, 153, 153, 0.32)">
                                                    <div class="sidebar-title">
													<a class="btn btn-info" data-toggle="tab" role="tab" href="#tab-compose"><i class="fa fa-play"></i>&nbsp;��ʼ��ҵ</a>
													</div>
                                                </li-->
                                                <li class="active"><a class="btn-group dropup btn-block" data-toggle="tab" role="tab" href="#tab-inbox">��Ʒ (5)</a></li>
                                                <li class=""><a class="btn-group dropup btn-block" data-toggle="tab" role="tab" href="#tab-sent">��ⱨ�� (2)</a></li>
												<li style="border-top: 1px solid rgba(153, 153, 153, 0.32)"><h4 class="mtl mbm" style="padding-left: 15px;">��Ʒ����</h4></li>
												<li class=""><a class="btn-group dropup btn-block" data-toggle="tab" role="tab" href="#tab-inbox"><span class="mrs badge badge-success" style="display: inline"></span>���׼�</a>
												<li class=""><a class="btn-group dropup btn-block" data-toggle="tab" role="tab" href="#tab-sent"><span class="mrs badge badge-warning" style="display: inline"></span>��������</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="mail-main tab-content">
                                        <div class="tab-pane fade pdm" id="tab-compose">
                                            <ul class="list-group mail-action list-unstyled list-inline mbm">
												<li><h3 class="mbs mlx plm mtm" style="color: #222">��ҵ����</h3></li>
                                                <li class="pull-right">
												<a class="btn btn-default" data-original-title="Save Draft" data-hover="tooltip" href="#"> <i class="fa fa-floppy-o"></i></a>
												<a class="btn btn-default" data-original-title="Move to" data-hover="tooltip" href="#"> <i class="fa fa-folder"></i></a>
												<a class="btn btn-default" data-original-title="Trash" data-hover="tooltip" href="#"> <i class="fa fa-trash-o"></i></a></li>
                                            </ul>
											
                                            <form class="form-horizontal mtm" action="#" role="form">
                                                
                                                <div class="col-md-4">
													<div class="form-group"><label class="control-label" for="title">����</label>
													<input type="text" class="form-control input-medium" placeholder="������ƻ�����" id="title">
													</div>
													<div class="form-group"><label class="control-label" for="title">��Ʒ����</label>
													<input type="text" class="form-control input-medium" placeholder="�������Ʒ����" id="title"></div>
													<div class="form-group"><label class="control-label" for="title">������·</label>
													<input type="text" class="form-control input-medium" placeholder="������·" id="title"></div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label" for="showEasing">��ʼʱ��</label>
														<input type="text" class="form-control input-medium" value="" placeholder="��ʼʱ��" id="showEasing">
													</div>
													<div class="form-group">
														<label class="control-label" for="hideEasing">��Ʒ����</label>
														<input type="text" class="form-control input-medium" value="" placeholder="��Ʒ����" id="hideEasing">
													</div>
													<div class="form-group">
														<label class="control-label" for="showMethod">�ƻ�������</label>
														<input type="text" class="form-control input-medium" value="slideDown" placeholder="�ƻ�������" id="showMethod">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label" for="showEasing">����ʱ��</label>
														<input type="text" class="form-control input-medium" value="" placeholder="����ʱ��" id="showEasing">
													</div>
													<div class="form-group">
														<label class="control-label" for="hideEasing">�����嵥</label>
														<input type="text" class="form-control input-medium" value="" placeholder="�����嵥" id="hideEasing">
													</div>
													<div class="form-group">
														<label class="control-label">�ƻ�״̬</label>
														<div class="radio">
															<label>
															<input id="optionsRadios4" name="optionsRadiosInline" value="option1" checked="checked" class="form-control-shadow" type="radio">&nbsp; �ݸ�
															</label>
															<label>
															<input id="optionsRadios5" name="optionsRadiosInline" value="option2" type="radio">&nbsp; ִ��
															</label>
														</div>
													</div>
												</div>
												<div class="col-md-11">
													<div class="form-group"><label class="control-label" for="message">˵��</label><textarea class="form-control" placeholder="����д˵����Ϣ ..." rows="3" id="message"></textarea></div>
												</div>
									
                                                
                                                <div class="form-group">
                                                    <div class="col-lg-7 col-lg-offset-10">
                                                        <button class="btn btn-success" type="submit">����</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade active in" id="tab-inbox">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    
                                                </div>
                                                <div class="col-lg-12">
                                                    <ul class="list-group mail-action list-unstyled list-inline">
                                                        <li><a class="btn btn-default" style="padding: 6px 15px;">
														<div class="icheckbox_square-blue" style="position: relative;">
														<input type="checkbox" class="checkall-email" /></div></a></li>
                                                        
                                                        <li class="dropdown">
															<a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-folder"></i>&nbsp; ����... &nbsp;<span class="caret"></span></a>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li><a href="#">...</a></li>
                                                                <li><a href="#">...</a></li>
                                                                <li><a href="#">...</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="pull-right">
															<div class="input-group"><input type="text" class="form-control" placeholder="��������...">
																<div class="input-group-btn">
																	<button class="btn btn-info">����</button>
																</div>
															</div>
														</li>
                                                    </ul>
                                                    <table class="table table-hover-color">
														<thead>
														<tr>
															<th>ID</th>
															<th>����</th>
															<th>����</th>
															<th>��ʼʱ��</th>
															<th>����ʱ��</th>
															<th>����</th>
															<th>��Ʒ����</th>
															<th>������</th>
															<th>״̬</th>
														</tr>
														</thead>
														<tbody>
															<tr style="cursor: pointer;">
																<td><input type="checkbox" /> 4032</td>
																<td>C#�߼����</td>
																<td>A</td>
																<td>1970-01-20 </td>
																<td>1970-01-01 </td>
																<td>A303098293</td>
																<td>90</td>
																<td></td>
																<td>
																<i class="fa fa-play text-success"></i><span> ���</span>
																</td>
															  </tr>
															  <tr style="cursor: pointer;">
																<td><input type="checkbox" /> 4033</td>
																<td>C#�߼����</td>
																<td>B</td>
																<td>1970-01-20 </td>
																<td>1970-01-01 </td>
																<td>B949823832</td>
																<td>90</td>
																<td></td>
																<td>
																<i class="fa fa-pause text-warning"></i><span> �����</span>
																</td>
															  </tr>
															  <tr style="cursor: pointer;">
																<td><input type="checkbox" /> 4032</td>
																<td>C#�߼����</td>
																<td>C</td>
																<td>1970-01-20 </td>
																<td>1970-01-01 </td>
																<td>C934838833</td>
																<td>90</td>
																<td></td>
																<td>
																<i class="fa fa-stop text-danger"></i><span> ֹͣ</span>
																</td>
															  </tr>
														</tbody>
													</table>
													<ul class="pagination pull-right mts">
														<li class="disabled"><a href="javascript:;">��һҳ</a></li> <li class="active"><a href="javascript:;">1</a></li><li><a href="?page=2">2</a></li> <li><a href="?page=2">��һҳ</a></li>
													</ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab-sent">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="input-group mtm mbm"><input type="text" class="form-control" placeholder="����ƻ�����...">

                                                        <div class="input-group-btn">
                                                            <button class="btn btn-info">Search</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <ul class="list-group mail-action list-unstyled list-inline">
                                                        <li><a class="btn btn-default" style="padding: 6px 15px;"><div class="icheckbox_square-blue" style="position: relative;"><input type="checkbox" class="checkall-email"></div></a></li>
                                                        
                                                        <li class="dropdown"><a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-folder"></i>&nbsp; ����... &nbsp;<span class="caret"></span></a>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li><a href="#">ִ��</a></li>
                                                                <li><a href="#">�ݸ�</a></li>
                                                                <li><a href="#">���</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="pull-right"><a class="btn btn-sm btn-default"><i class="fa fa-angle-left"></i></a><a class="btn btn-sm btn-default"><i class="fa fa-angle-right"></i></a></li>
                                                    </ul>
                                                    <div class="list-group mail-box">
														<a class="list-group-item" href="#">
                                                        <div class="row">
                                                            <div class="col-md-3 col-lg-3">
																<strong class="mail-from mrm mlm ">����</strong>
															</div>
															
															<div class="col-md-3 col-lg-3">
																<strong class="mail-from mrm mlm ">����</strong>
															</div>
															
															<div class="col-md-3 col-lg-3">
																<strong class="mail-from mrm mlm ">��Ʒ</strong>
															</div>
															
															<div class="col-md-3 col-lg-3">
																<strong class="mail-from mrm mlm ">������</strong>
															</div>
															
                                                        </div>
                                                    </a>
														<a class="list-group-item" href="#">
                                                        <div class="row">
                                                            <div class="col-md-3 col-lg-3">
																<div class="icheckbox_square-blue" style="position: relative;">
																<input type="checkbox">
																</div>
																<!--span class="fa fa-star mrm mlm text-warning"></span-->
																<strong class="mail-from">����ͷ�����ƻ�</strong>
															</div>
                                                            <div class="col-md-3 col-lg-3">
																<span class="text-muted" style="font-size: 11px;">�¼ƻ�</span>
                                                            </div>
															<div class="col-md-3 col-lg-3">
																<span class="text-muted" style="font-size: 11px;">����ͷ</span>
                                                            </div>
															<div class="col-md-3 col-lg-3">
																<span class="text-muted" style="font-size: 11px;">����</span>
                                                            </div>
                                                        </div>
                                                    </a>
													</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab-drafts">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="input-group mtm mbm"><input type="text" class="form-control" placeholder="Enter text...">

                                                        <div class="input-group-btn">
                                                            <button class="btn btn-info">Search</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <ul class="list-group mail-action list-unstyled list-inline">
                                                        <li><a class="btn btn-default" style="padding: 6px 15px;"><div class="icheckbox_square-blue" style="position: relative;"><input type="checkbox" class="checkall-email"></div></a></li>
                                                        
                                                        <li class="dropdown"><a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-folder"></i>&nbsp; ����... &nbsp;<span class="caret"></span></a>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li><a href="#">ִ��</a></li>
                                                                <li><a href="#">�ݸ�</a></li>
                                                                <li><a href="#">���</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="pull-right"><a class="btn btn-sm btn-default"><i class="fa fa-angle-left"></i></a><a class="btn btn-sm btn-default"><i class="fa fa-angle-right"></i></a></li>
                                                    </ul>
                                                    <div class="list-group mail-box">
														<a class="list-group-item" href="#">
                                                        <div class="row">
                                                            <div class="col-md-3 col-lg-3">
																<strong class="mail-from mrm mlm ">����</strong>
															</div>
															
															<div class="col-md-3 col-lg-3">
																<strong class="mail-from mrm mlm ">����</strong>
															</div>
															
															<div class="col-md-3 col-lg-3">
																<strong class="mail-from mrm mlm ">��Ʒ</strong>
															</div>
															
															<div class="col-md-3 col-lg-3">
																<strong class="mail-from mrm mlm ">������</strong>
															</div>
															
                                                        </div>
                                                    </a>
														<a class="list-group-item" href="#">
                                                        <div class="row">
                                                            <div class="col-md-3 col-lg-3">
																<div class="icheckbox_square-blue" style="position: relative;">
																<input type="checkbox">
																</div>
																<!--span class="fa fa-star mrm mlm text-warning"></span-->
																<strong class="mail-from">����ͷ�����ƻ�</strong>
															</div>
                                                            <div class="col-md-3 col-lg-3">
																<span class="text-muted" style="font-size: 11px;">�¼ƻ�</span>
                                                            </div>
															<div class="col-md-3 col-lg-3">
																<span class="text-muted" style="font-size: 11px;">����ͷ</span>
                                                            </div>
															<div class="col-md-3 col-lg-3">
																<span class="text-muted" style="font-size: 11px;">����</span>
                                                            </div>
                                                        </div>
                                                    </a>
													</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--END CONTENT--></div>
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


<!--LOADING SCRIPTS FOR PAGE--><!--CORE JAVASCRIPT-->
<script src="/js/mtek_core.js"></script>
<script src="/js/mtek_system-layout.js"></script>
<script src="/js/jquery-responsive.js"></script>
<script src="/js/candor.portal.js" ></script>
<script src="/js/candor.common.js"></script>
</body>
</html>
<script>
jQuery(document).ready(function () {
    "use strict";
    JQueryResponsive.init();
    Layout.init();
});
</script>
