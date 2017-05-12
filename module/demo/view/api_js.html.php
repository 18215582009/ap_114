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
<title>PHP框架-API说明</title>
</head>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/cdrstyle.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/style.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/page.css';?>' type='text/css' media='screen' />
<script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/js/candor.common.js" type="text/javascript"></script>
<style>
body{ background:none}
</style>
<body>
<div class="container-fluid">
	<div class="row">
	<h2>关于弹出框方法</h2>
  
	<table class="table table-bordered">
		<thead>
		  <tr>
			<th>Js方法名</th>
            <th>参数</th>
			<th>描述及调用</th>
			<th>元素效果</th>
		  </tr>
		</thead>
		<tbody>
        	<tr>
            	<td colspan="4" style="">prompt(msg,status,param1='',time='2000',param2='',islock=true)</td>
                <!--<td colspan="2" style="">&lt;script src="/js/candor.common.js" type="text/javascript"&gt;&lt;/script&gt;</td>-->
            </tr>
		  <tr>
			<td>prompt</td>
			<td>
            	<p></p>
           		<p>string msg 弹出框内的提示信息</p>
                <p>string status 弹出框图标（loading加载图标、alert、succeed成功图标、error失败图标、question询问图标....。图标位置：www\js\plugins\artDialog\skins\icons）</p>              
            	<p>string param1 参数格式为：动作(refresh刷新页面、back后退、close关闭、url网址跳转、fun执行函数)|按钮名字|执行操作(可以为js方法或url地址)</p>
                <p>int time 弹出框自动关闭时间</p>
 				<p>string param2 参数格式为：动作(refresh刷新页面、back后退、close关闭、url网址跳转、fun执行函数)|按钮名字|执行操作(可以为js方法或url地址)</p>
                <p>bool islock 弹出框是否锁定</p>
                
            </td>
			<td>
				<p><code>prompt('加载等待','loading')</code></p>
				<p><code>prompt('两次输入的密码不一致','alert');</code></p>
                <p><code>prompt('你确定要刷新页面？','question','refresh')</code></p>
                <p><code>prompt('失败，刷新页面','error','refresh|刷新')</code></p>
                <p><code>prompt('成功，页面后退','succeed','back')</code></p>
                <p><code>prompt('关闭弹出框','succeed','close')</code></p>
                <p><code>prompt('跳转到apiJs','question','url|确认|apiJs')</code></p>
                <p><code>prompt('执行temp函数','question','fun|确认|temp')</code></p>
		    </td>
			<td>
 				<button class="btn" onclick="prompt('加载等待','loading')">加载等待</button>
 				<button class="btn" onclick="prompt('两次输入的密码不一致','alert');">提示框</button>
                <button class="btn" onclick="prompt('你确定要刷新页面？','question','refresh')">刷新页面</button>
                <button class="btn" onclick="prompt('失败，刷新页面','error','refresh|刷新')">刷新页面2</button>
                <button class="btn" onclick="prompt('成功，页面后退','succeed','back',3)">页面后退</button>
                <button class="btn" onclick="prompt('关闭弹出框','question','close')">关闭弹出框</button>
                <button class="btn" onclick="prompt('执行temp函数','question','fun|确认|temp')">执行temp函数</button>
                <p>其他</p>
                <button class="btn" onclick="prompt('跳转到url','succeed','url')">跳转到url</button>
                <button class="btn" onclick="prompt('跳转到url2','succeed','url|确认')">跳转到url2</button>
                <button class="btn" onclick="prompt('跳转到url3','succeed','url|确认|apiJs')">跳转到url3</button>
                <button class="btn" onclick="prompt('跳转到url4','succeed','url|确认|apiJs','3')">跳转到url4</button>
                <button class="btn" onclick="prompt('跳转到url5','succeed','url|确认|apiJs','3','url')">跳转到url5</button>
                <button class="btn" onclick="prompt('跳转到url5','succeed','url|确认|apiJs','30','refresh')">跳转到url5</button>
                <button class="btn" onclick="prompt('跳转到url5','succeed','url|确认|apiJs','30','refresh|刷新')">跳转到url5</button>
                <button class="btn" onclick="prompt('跳转到url5','succeed','url|确认|apiJs','30','url|确认1|apiJs')">跳转到url5</button>
                <button class="btn" onclick="prompt('跳转到url5','succeed','url|确认|apiJs','30','url|确认1|apiJs',true)">跳转到url5</button>
                <button class="btn" onclick="prompt('跳转到url5','succeed','fun|确认|temp','30','fun|确认1|temp',false)">跳转到url5</button>
                <script>
                function temp(){
                    alert("执行的方法！");
                }
                </script>
			</td>
		  </tr>
		</tbody>
	  </table>	 
  </div>
  <div class="row">
	<h2>关于jquery设置元素的readonly和disabled</h2>
   
	<table class="table table-bordered">
		<thead>
		  <tr>
			<th>Js方法名</th>
			<th>所属基类</th>
			<th>描述及调用</th>
			<th>元素效果</th>
		  </tr>
		</thead>
		<tbody>
		  <tr>
			<td><span class="helpe-inline">disabled</span></td>
			<td>candor.common.js</td>
			<td>
				<code>disabled(true)</code><p>使页面所有元素变为不可编辑状态</p><br />
				<code>disabled(false)</code><p>使页面所有元素变为可编辑状态</p><br />
		    </td>
			<td>
				<input  name="n1" value="n1" class="enabled" /><br />
				<input name="c1" type="checkbox" />checkbox<br />
				<input name="r1" type="radio" />radio<br />
				<input type="file" /><br />
				<select>
					<option value="1">1</option>
				</select><br />
				<a href="javascript:disabled(true);" class="btn">点击查看效果-元素不可以编辑</a>
				<a href="javascript:disabled(false);" class="btn">点击查看效果-元素可以编辑</a>
			</td>
		  </tr>
		</tbody>
	  </table>
	  <p><a href="http://www.cnblogs.com/WeAreEpms/archive/2008/12/28/1364166.html" target="_blank">关于html元素的disabled,readonly 的详细分析</a></p>
	
  </div>
	
	
	</div>
</body>
</html>

