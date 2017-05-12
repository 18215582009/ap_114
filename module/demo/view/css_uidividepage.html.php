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
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/common.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/cdrstyle.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/style.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/page.css';?>' type='text/css' media='screen' />
<script src="/js/jquery-1.8.3.min.js" ></script>
<script src="/js/plugins/candor-dropdown.js" ></script>
<style>
body{}

</style>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="subnav subnav-fixed navbar-fixed-top">
			<form class="form-inline span6">
				业务宗号:<input type="text" class="input-small" id="input01">
				流水号:<input type="text" class="input-small search-query">
				<button class="btn" type="submit"><i class="icon-search"></i>搜索</button>
			</form>
			
			    <ul class="nav nav-pills">
      <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">按钮 <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#buttonGroups">按钮组</a></li>
          <li><a href="#buttonDropdowns">下拉按钮</a></li>
        </ul>
      </li>
      <li class="dropdown active">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">导航 <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#navs">导航，标签页，胶囊链接</a></li>
          <li class="active"><a href="#navbar">导航条</a></li>
          <li><a href="#breadcrumbs">面包屑导航栏</a></li>
          <li><a href="#pagination">分页</a></li>
        </ul>
      </li>
      <li><a href="#labels">标签</a></li>
      <li><a href="#badges">标记</a></li>
      <li><a href="#typography">排版</a></li>
      <li><a href="#thumbnails">缩略图</a></li>
      <li><a href="#alerts">警告</a></li>
      <li><a href="#progress">进度条</a></li>
      <li><a href="#misc">杂项</a></li>
    </ul>
		</div>
	</div>
	
	<div class="row-fluid" style="margin-top:40px;">
		<div class="span3">
			<div class="row">
				<div style="float:left;width:64px;margin:10px 0 0 50px" ><img src="/images/app_icons/@crs.png"/ width="64"></div>
				<div class="fcolor_one f_16 f_bold" style="float:left; margin:47px 0 0 10px">登记受理</div>
			</div>
			<div class="row-fluid">
				<a class="btn">新增</a>
				<a class="btn">修改</a>
				<a class="btn">提交</a>
				<a class="btn">打印</a>
			</div>

			<div class="row mt10">
				<div class="wrap-blue">
					<ul class="nav nav-pills nav-stacked">
					<LI class=active><A href="#id1"><I class="icon-book icon-white"></I> 登记信息</A></LI>
					<LI><A href="#">房屋图形</A></LI>
					<LI><A href="#">费用信息</A></LI>
					<LI><A href="#">工作日志</A></LI>
					<LI><A href="#">工作流程</A></LI>
					<LI><A href="#">数字影像</A></LI>
					</ul>
				</div>
			</div><!-- row end -->
		</div>
		<div class="span9">
			<div class="row-fluid">
				<a href="">允许合同修改</a><span class="separate_line">|</span><a href="">允许合同注销</a>
			</div>
			<div class="row-fluid">
				<div class="span6">
					<div class="row-fluid">
						<div class="wrap-fix-blue">
							<div class="fix-blue-l"></div>
							<div class="fix-blue-m">
								<form class="form-horizontal">
								<fieldset>
									<div class="row-fluid">
									<div class="span6">
									<div class="control-group">
									<label class="control-label" for="input01">流水号：</label>
									<div class="controls">
									<input type="text" class="input-small" id="input01">
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="input01">业务宗号：</label>
									<div class="controls">
									<input type="text" class="input-small" id="input01">
									</div>
									</div>
									</div>
									<div class="span6">
									<div class="control-group">
									<label class="control-label" for="input01">业务状态：</label>
									<div class="controls">
									<input type="text" class="input-small" id="input01">
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="input01">上首宗号：</label>
									<div class="controls">
									<input type="text" class="input-small" id="input01">
									</div>
									</div>
									</div>
									</div>
								</fieldset>
							</form>
							</div>
							<div class="fix-blue-r"></div>
						</div>
					</div>
					<div class="row-fluid">
						<form class="form-horizontal">
							<fieldset>
								<legend>基本信息</legend>
								<div class="row-fluid">
									<div class="span6">
										<div class="control-group">
										<label class="control-label" for="input01">产别：</label>
										<div class="controls">
										<input type="text" class="input-small" id="input01">
										</div>
										</div>
										<div class="control-group">
											<label for="inlineCheckboxes" class="control-label">买方到场：</label>
											<div class="controls">
											  <label class="checkbox inline">
											 <input type="checkbox" value="option1" id="inlineCheckbox1">是
											  </label>
											</div>
										</div> 
										<div class="control-group">
											<label class="control-label" for="input01">计费基数：</label>
											<div class="controls">
											<input type="text" class="input-small" id="input01">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="input01">土地信息：</label>
											<div class="controls">
											<input type="text" class="input-small" id="input01">
											</div>
										</div>
									</div>
									<div class="span6">
										<div class="control-group">
										<label class="control-label" for="input01">共有方式：</label>
										<div class="controls">
										<select id="select01" class="input-small">
										<option>请选择</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
										</select>
										</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="input01">指导价：</label>
											<div class="controls">
											<input type="text" class="input-small" id="input01">元
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="input01">竣工时间：</label>
											<div class="controls">
											<input type="text" class="input-small" id="input01">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="input01">住宅计费面积：</label>
											<div class="controls">
											<input type="text" class="input-small" id="input01">
											</div>
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div><!-- row end -->
				</div>
				<div class="span6">
					<div class="wrap-group-gd">
						<form class="form-horizontal">
							<div class="row-fluid">
									<div class="span6">
										<div class="control-group">
										<label class="control-label" for="input01">产别：</label>
										<div class="controls">
										<input type="text" class="input-small" id="input01">
										</div>
										</div>
										<div class="control-group">
											<label for="inlineCheckboxes" class="control-label">买方到场：</label>
											<div class="controls">
											  <label class="checkbox inline">
											 <input type="checkbox" value="option1" id="inlineCheckbox1">是
											  </label>
											</div>
										</div> 
										<div class="control-group">
											<label class="control-label" for="input01">计费基数：</label>
											<div class="controls">
											<input type="text" class="input-small" id="input01">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="input01">土地信息：</label>
											<div class="controls">
											<input type="text" class="input-small" id="input01">
											</div>
										</div>
									</div>
									<div class="span6">
										<div class="control-group">
										<label class="control-label" for="input01">共有方式：</label>
										<div class="controls">
										<select id="select01" class="input-small">
										<option>请选择</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
										</select>
										</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="input01">指导价：</label>
											<div class="controls">
											<input type="text" class="input-small" id="input01">元
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="input01">竣工时间：</label>
											<div class="controls">
											<input type="text" class="input-small" id="input01">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="input01">住宅计费面积：</label>
											<div class="controls">
											<input type="text" class="input-small" id="input01">
											</div>
										</div>
									</div>
								</div>
						</form>
					</div>
					
					<div class="row-fluid">
						<table style="margin-bottom:10px" class="table table-bordered table-striped">
			  <thead>
				  <tr>
					<th>序号</th>
					<th>类</th>
					<th>描述</th>
				  </tr>
				</thead>
				<tbody>
				  <tr>
					<td class="span1"><input type="checkbox" /> 1</td>
					<td class="muted">None</td>
					<td>无样式，仅仅有列和行</td>
				  </tr>
				  <tr>
					<td><input type="checkbox" /> 2</td>
					<td>None</td>
					<td>行与行之间以水平线相隔</td>
				  </tr>
				  <tr>
					<td><input type="checkbox" /> 3</td>
					<td>None</td>
					<td>表格外围均有外边框</td>
				  </tr>
				  <tr>
					<td><input type="checkbox" /> 4</td>
					<td>None</td>
					<td>奇数行背景设为浅灰色</td>
				  </tr>
				  <tr>
					<td><input type="checkbox" /> 5</td>
					<td>None</td>
					<td>竖直方向padding缩减一响</td>
				  </tr>
				</tbody>
			  </table>
					</div>
					<div class="row-fluid">
						<table style="margin-bottom:10px" class="table table-bordered table-striped">
			  <thead>
				  <tr>
					<th>序号</th>
					<th>类</th>
					<th>描述</th>
				  </tr>
				</thead>
				<tbody>
				  <tr>
					<td class="span1"><input type="checkbox" /> 1</td>
					<td class="muted">None</td>
					<td>无样式，仅仅有列和行</td>
				  </tr>
				  <tr>
					<td><input type="checkbox" /> 2</td>
					<td>None</td>
					<td>行与行之间以水平线相隔</td>
				  </tr>
				  <tr>
					<td><input type="checkbox" /> 3</td>
					<td>None</td>
					<td>表格外围均有外边框</td>
				  </tr>
				  <tr>
					<td><input type="checkbox" /> 4</td>
					<td>None</td>
					<td>奇数行背景设为浅灰色</td>
				  </tr>
				  <tr>
					<td><input type="checkbox" /> 5</td>
					<td>None</td>
					<td>竖直方向padding缩减一响</td>
				  </tr>
				</tbody>
			  </table>
					</div>
					<div class="row-fluid">
						<table style="margin-bottom:10px" class="table table-bordered table-striped">
			  <thead>
				  <tr>
					<th>序号</th>
					<th>类</th>
					<th>描述</th>
				  </tr>
				</thead>
				<tbody>
				  <tr>
					<td class="span1"><input type="checkbox" /> 1</td>
					<td class="muted">None</td>
					<td>无样式，仅仅有列和行</td>
				  </tr>
				  <tr>
					<td><input type="checkbox" /> 2</td>
					<td>None</td>
					<td>行与行之间以水平线相隔</td>
				  </tr>
				  <tr>
					<td><input type="checkbox" /> 3</td>
					<td>None</td>
					<td>表格外围均有外边框</td>
				  </tr>
				  <tr>
					<td><input type="checkbox" /> 4</td>
					<td>None</td>
					<td>奇数行背景设为浅灰色</td>
				  </tr>
				  <tr>
					<td><input type="checkbox" /> 5</td>
					<td>None</td>
					<td>竖直方向padding缩减一响</td>
				  </tr>
				</tbody>
			  </table>
					</div>
					
				</div>
			</div><!-- row-fluid end -->
			
			<div class="row-fluid">
				<a class="btn">新增</a>
				<a class="btn">修改</a>
				<a class="btn">提交</a>
				<a class="btn">打印</a>
			</div>
			<br />
		</div>
	</div>
</div>	
</body>
</html>

