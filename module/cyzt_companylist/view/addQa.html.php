<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/cdrstyle.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/style.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/page.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'js/plugins/jquery.dynatree/skin/ui.dynatree.css';?>' type='text/css' id='skinSheet' /> 
<script type="text/javascript" src="/js/plugins/datepicker/WdatePicker.js"></script>
<script src="/js/wq/form_validate.js"></script>
<script src="/js/jquery-1.8.3.min.js" ></script>
<script src="/js/plugins/candor-tab.js" ></script>
<script src="/js/candor.common.js"></script>
<script src="/js/jquery-ui.custom.min.js" type="text/javascript"></script>
<script src="/js/plugins/artDialog/artDialog.source.js?skin=default"></script>
<script src="/js/plugins/artDialog/plugins/iframeTools.js" type="text/javascript"></script>
<script src="/js/jquery.cookie.js" type="text/javascript"></script>
<script src='/js/plugins/jquery.dynatree/jquery.dynatree.js' type="text/javascript"></script> 
</head>
<body style="background:url('/images/rolemanage/img02.gif') repeat-x scroll 0 0 #bbdaee">
<div class="container-fluid">	
	<div class="tabbable">
		<div class="tab-content">
			<div class="row-fluid">
				<form class="form-horizontal" id="form1" action="/cyzt_companylist/resultQa.candor?app=FcxxWebService" method="POST">
					<div class="row-fluid">
						 <div class="span12">
								<div class="control-group">
                                <label class="control-label" for="input01"></label>
                                <div class="controls">
										&nbsp;
                                </div>
                                </div>
						        <div class="control-group">
                                <label class="control-label" for="input01">资质等级：</label>
                                <div class="controls">
										<select name="SYSTEM@CYUSERQA-QALEVEL" class="input-medium" id="qalevel">
										<option>一级</option>
										<option>二级</option>
										<option>三级</option>
										<option>四级</option>
										<option>临时资质</option>
										</select>
                                </div>
                                </div>
								<div class="control-group">
                                <label class="control-label" for="input01">资质证编号：</label>
                                <div class="controls">
								<input id="qacode" type="text" class="input-medium" name="SYSTEM@CYUSERQA-QACODE"/>
                                </div>
                                </div>
								<div class="control-group">
                                <label class="control-label" for="input01">资质类型：</label>
                                <div class="controls">
                              	<input id="qatype" type="text" class="input-medium" name="SYSTEM@CYUSERQA-QATYPE"/>
                                </div>
                                </div>
								<div class="control-group">
                                <label class="control-label" for="input01">取得日期：</label>
                                <div class="controls">
								<input id="getdate" type="text" class="span2" name="SYSTEM@CYUSERQA-GETDATE" style="width:150px" onclick="WdatePicker()"/>
                                </div>
                                </div>
								<div class="control-group">
                                <label class="control-label" for="input01">发证日期：</label>
                                <div class="controls">
								<input id="qadate" type="text" class="span2" name="SYSTEM@CYUSERQA-QADATE" style="width:150px" onclick="WdatePicker()"/>
                                </div>
                                </div>
								<div class="control-group">
                                <label class="control-label" for="input01">有效日期：</label>
                                <div class="controls">
								<input id="qavalidate" type="text" class="span2" name="SYSTEM@CYUSERQA-QAVALIDATE" style="width:150px" onclick="WdatePicker()"/>
                                </div>
                                </div>
								<div class="control-group">
                                <label class="control-label" for="input01">发证机关：</label>
                                <div class="controls">
                                <input id="qaorgan" type="text" class="input-medium" name="SYSTEM@CYUSERQA-QAORGAN"/>
                                </div>
                                </div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>
