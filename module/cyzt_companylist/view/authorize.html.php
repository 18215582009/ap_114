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
<title><?=$header?></title>
</head>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/cdrstyle.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/style.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/page.css';?>' type='text/css' media='screen' />
<script src="/js/jquery-1.8.3.min.js" ></script>
<script src="/js/plugins/candor-tab.js" ></script>
<script src="/js/plugins/datepicker/WdatePicker.js" ></script><!--时间控件JS-->
<body>
<div class="container-fluid">
	<div class="tabbable">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#1" data-toggle="tab">用户信息</a></li>
			<li style="padding:0;padding-top:14px;">|</li>
			<li><a href="#2" data-toggle="tab">权限信息</a></li>
			<li style="padding:0;padding-top:14px;">|</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="1">
				<form class="form-horizontal" id="opform" name="opform" action="/cyzt_companylist/<?=$fromAddr?>.candor?action=save" method="post">
			<div class="row-fluid">
				<div class="wrap-fix-blue">
					<fieldset>
                        <legend>用户信息</legend>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                <label class="control-label" for="input01">地区编码：</label>
                                <div class="controls">
                                <input type="text" class="input-medium"  name="REGIONCODE" id="REGIONCODE" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" value="<?if($fromAddr=='editperson'){echo $userinfo["REGIONCODE"];}?>">
                                </div>
                                </div>
								<div class="control-group">
                                <label class="control-label" for="input01">用户标识符：</label>
                                <div class="controls">
                                <input type="text" class="input-medium" name="USER_NAME" id="USER_NAME" value="<?if($fromAddr=='editperson'){echo $userinfo["USER_NAME"];}?>">
                                </div>
                                </div>
                            </div>  
							<div class="span4">
                                <div class="control-group">
                                <label class="control-label" for="input01">登录名：</label>
                                <div class="controls">
                                <input type="text" class="input-medium" name="LOGIN_ID" id="LOGIN_ID" value="<?if($fromAddr=='editperson'){echo $userinfo["LOGIN_ID"];}?>">
                                </div>
                                </div>
								<div class="control-group">
                                <label class="control-label" for="input01">人员类别：</label>
                                <div class="controls">
									<select name="USERTYPE" id="USERTYPE" class="input-medium" value="<?if($fromAddr=='editperson'){echo $userinfo["USERTYPE"];}?>">
										<option>测绘人员</option>
										<option>管理人员</option>
										<option>经纪人</option>
										<option>房地产估价师</option>
										<option>物业小区经理</option>
										<option>销售人员</option>
										<option>其他</option>
									</select>
                                </div>
                                </div>
                            </div>  
							<div class="span4">
                                <div class="control-group">
                                <label class="control-label" for="input01">真实姓名：</label>
                                <div class="controls">
                                <input type="text" class="input-medium" name="TRUENAME" id="TRUENAME" value="<?if($fromAddr=='editperson'){echo $userinfo["TRUENAME"];}?>">
                                </div>
                                </div>
								<div class="control-group">
									<label class="control-label" for="input01">关联机构：</label>
									<div class="controls">
										<?=$orgSelect?>
									</div>
								</div>	
                            </div>  
                        </div>
                    </fieldset>
				</div>
			</div>


			<div class="row-fluid">
				<div class="wrap-fix-blue">
					<fieldset>
                        <legend>基本属性</legend>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                <label class="control-label" for="input01">国籍：</label>
                                <div class="controls">
                                <input type="text" class="input-medium" name="NATIONALITY" id="NATIONALITY" value="<?if($fromAddr=='editperson'){echo $userinfo["NATIONALITY"];}?>">
                                </div>
                                </div>
                                <div class="control-group">
                                <label class="control-label" for="input01">联系电话：</label>
                                <div class="controls">
                                <input type="text" class="input-medium" name="PHONE" id="PHONE" value="<?if($fromAddr=='editperson'){echo $userinfo["PHONE"];}?>">
                                </div>
                                </div>
								<div class="control-group">
                                <label class="control-label" for="input01">电子邮箱：</label>
                                <div class="controls">
                                <input type="text" class="input-medium" name="EMAIL" id="EMAIL" value="<?if($fromAddr=='editperson'){echo $userinfo["EMAIL"];}?>">
                                </div>
                                </div>
                            </div>  
							<div class="span4">
                                <div class="control-group">
                                <label class="control-label" for="input01">出生日期：</label>
                                <div class="controls">
								<input type="text" class="span2" id="BIRTHDATE" name="BIRTHDATE"  style="width:150px" onclick="WdatePicker()" value="<?if($fromAddr=='editperson'){echo $userinfo["BIRTHDATE"];}?>"/>
                                </div>
                                </div>
                                <div class="control-group">
                                <label class="control-label" for="input01">移动电话：</label>
                                <div class="controls">
                                <input type="text" class="input-medium" name="MOBILE" id="MOBILE" value="<?if($fromAddr=='editperson'){echo $userinfo["MOBILE"];}?>">
                                </div>
                                </div>
								<div class="control-group">
                                <label class="control-label" for="input01">QQ：</label>
                                <div class="controls">
                                <input type="text" class="input-medium" name="QQ" id="QQ" value="<?if($fromAddr=='editperson'){echo $userinfo["QQ"];}?>">
                                </div>
                                </div>
                            </div>  
							<div class="span4">
                                <div class="control-group">
                                <label class="control-label" for="input01">性别：</label>
                                <div class="controls">
									<select name="SEX" id="SEX" class="input-medium" value="<?if($fromAddr=='editperson'){echo $userinfo["SEX"];}?>">
										<option>男</option>
										<option>女</option>
									</select>
                                </div>
                                </div>
                                <div class="control-group">
                                <label class="control-label" for="input01">传真：</label>
                                <div class="controls">
									<input type="text" class="input-medium" name="FAX" id="FAX" value="<?if($fromAddr=='editperson'){echo $userinfo["FAX"];}?>">
                                </div>
                                </div>
                                <div class="control-group">
                                <label class="control-label" for="input01">学历：</label>
                                <div class="controls">
									<input type="text" class="input-medium" name="KNOWLEDGE" id="KNOWLEDGE" value="<?if($fromAddr=='editperson'){echo $userinfo["KNOWLEDGE"];}?>">
                                </div>
                                </div>
                            </div>  
                        </div>
						<div class="row-fluid">
						    <div class="span12">
                                <div class="control-group">
                                <label class="control-label" for="input01">地址：</label>
                                <div class="controls">
                                <input type="text" class="input-medium" name="ADDRESS" id="ADDRESS" value="<?if($fromAddr=='editperson'){echo $userinfo["ADDRESS"];}?>">
                                </div>
                                </div>
                            </div> 
						</div>
                    </fieldset>
				</div>
			</div>
            
            
            <div class="row-fluid">
				<div class="wrap-fix-blue">
					<fieldset>
                        <legend>证件信息</legend>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                <label class="control-label" for="input01">证件类型：</label>
                                <div class="controls">
									<select name="IDTYPE" id="IDTYPE" class="input-medium" value="<?if($fromAddr=='editperson'){echo $userinfo["IDTYPE"];}?>">
										<option>身份证</option>
										<option>出生证</option>
                                        <option>户口薄</option>
										<option>护照</option>
                                        <option>兵役证</option>
										<option>军官证</option>
                                        <option>港澳台身份证</option>
										<option>企业代码证</option>
									</select>
                                </div>
                                </div>
                            </div>   
							<div class="span4">
                                <div class="control-group">
                                <label class="control-label" for="input01">证件号码：</label>
                                <div class="controls">
									<input type="text" class="input-medium" name="OWNERID" id="OWNERID" value="<?if($fromAddr=='editperson'){echo $userinfo["OWNERID"];}?>">
                                </div>
                                </div>
                            </div>
						    <div class="span4">
                                <div class="control-group">
                                <label class="control-label" for="input01">证件地址：</label>
                                <div class="controls">
                                <input type="text" class="input-medium" name="CERTADDR" id="CERTADDR" value="<?if($fromAddr=='editperson'){echo $userinfo["CERTADDR"];}?>">
                                </div>
                                </div>
                            </div>  
                        </div>
						<div class="row-fluid">
						    <div class="span12">
								<div class="control-group">
									<div class="controls">
										<input type="hidden" name="ID" id="ID" value="<?if($fromAddr=='editperson'){echo $userinfo["ID"];}?>"/>
									</div>
								</div>	

								<div class="control-group">
									<div class="controls">
										<input type="hidden" name="USERMOUNT-USERID" id="USERMOUNT-USERID" value="<?if($fromAddr=='editperson'){echo $userinfo["ID"];}?>"/>
									</div>
								</div>
								<div class="control-group">
									<div class="controls">
										<input type="hidden" name="USERMOUNT-ID" id="USERMOUNT-ID" value="<?if($fromAddr=='editperson'){echo $usermountinfo["ID"];}?>"/>
									</div>
								</div>
							 </div> 
						</div>
                    </fieldset>
				</div>
			</div>
            </form>
			</div>
			<div class="tab-pane" id="2">	
				<div class="span6">	
					<fieldset>
					<legend>用户信息</legend>
					<p>姓名：<code>张子基</code>&nbsp;&nbsp;所属：川大软件</p>
					</fieldset>	
				</div>
				<div class="span6">	
					<fieldset>
					<legend>用户信息</legend>
					<p>姓名：<code>张子基</code>&nbsp;&nbsp;所属：川大软件</p>
					</fieldset>	
				</div>
			</div>
		</div><!--tab-content end-->
    </div>
</div>	
</body>
</html>
