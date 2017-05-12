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
<script src="/js/jquery-1.8.3.min.js" ></script>
<style>
body{background:none;}
.subnav {
    background-color: #EEEEEE;
    background-image: -moz-linear-gradient(center top , #F5F5F5 0%, #EEEEEE 100%);
    background-repeat: repeat-x;
    border: 1px solid #E5E5E5;
    border-radius: 4px 4px 4px 4px;
    height: 36px;
    width: 100%;
}

.subnav-fixed {
    border-color: #D5D5D5;
    border-radius: 0 0 0 0;
    border-width: 0 0 1px;
    box-shadow: 0 1px 0 #FFFFFF inset, 0 1px 5px rgba(0, 0, 0, 0.1);
    left: 0;
    position: fixed;
    right: 0;
    top: 40px;
    z-index: 1020;
}
</style>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="subnav">
			<a id="tables"></a>
			<ul class="nav nav-pills">
			  <li><a href="#tables">表格</a></li>
			  <li><a href="#buttons">按钮</a></li>
			  <li><a href="#forms">表单</a></li>
			  <li><a href="#icons">图标</a></li>
			</ul>
		</div>
		
	</div>
	
	<div class="row">
		<h2>表格-元素&lt;table&gt;</h2>
		<p>自由组合搭配表格类以实现不同的外观。</p>
		<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;table</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"table table-striped table-bordered table-condensed"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  ...</span></li><li class="L2"><span class="tag">&lt;/table&gt;</span></li></ol></pre>
		<table class="table table-bordered table-striped" style="margin-bottom:10px">
			  <thead>
				  <tr>
					<th>名称</th>
					<th>类</th>
					<th>描述</th>
				  </tr>
				</thead>
				<tbody>
				  <tr>
					<td>默认</td>
					<td class="muted">None</td>
					<td>无样式，仅仅有列和行</td>
				  </tr>
				  <tr>
					<td>基本</td>
					<td>
					  <code>.table</code>
					</td>
					<td>行与行之间以水平线相隔</td>
				  </tr>
				  <tr>
					<td>有边线</td>
					<td>
					  <code>.table-bordered</code>
					</td>
					<td>表格外围均有外边框</td>
				  </tr>
				  <tr>
					<td>间隔背景</td>
					<td>
					  <code>.table-striped</code>
					</td>
					<td>奇数行背景设为浅灰色</td>
				  </tr>
				  <tr>
					<td>紧凑</td>
					<td>
					  <code>.table-condensed</code>
					</td>
					<td>竖直方向padding缩减一半，从8px变为4px，所有的 <code>td</code> 和 <code>th</code> 元素都受影响</td>
				  </tr>
				</tbody>
			  </table>
		<div class="pagingbox">
				<div class="paging">
					<ul class="pagtools">
						<li><a href=""><img src="/theme/default/images/icon/add.gif" /></a></li>
						<li><a href=""><img src="/theme/default/images/icon/edit.gif" /></a></li>
					</ul>
					<ul class="paglist">
					  <li>共5条记录，每页显示15条，当前第1/1页</li>
					  <li class="disabled"><a href="#">[首页]</a></li>
					  <li class="disabled"><a href="#">[上一页]</a></li>
					  <li class="active"><a href="#">1</a></li>
					  <li><a href="#">2</a></li>
					  <li><a href="#">3</a></li>
					  <li><a href="#">4</a></li>
					  <li><a href="#">[下一页]</a></li>
					  <li><a href="#">[尾页]</a></li>
					</ul>
				  </div>
			  </div>
	</div>
	  
	<div class="row">
	<a id="buttons"></a>
	<h2>按钮-元素&lt;button&gt;</h2>
	<table class="table table-bordered table-striped">
		<thead>
		  <tr>
			<th>按钮</th>
			<th>代码</th>
			<th>描述</th>
		  </tr>
		</thead>
		<tbody>
		  <tr>
			<td>
			<button href="#" class="btn">默认</button>
			</td>
			<td><code>&lt;button href="#" class="btn"&gt;默认&lt;/button&gt;</code></td>
			<td>带渐变的标准灰色按钮</td>
		  </tr>
		  <tr>
			<td><button href="#" class="btn btn-primary">首要</button></td>
			<td><code>&lt;button href="#" class="btn btn-primary"&gt;首要&lt;/button&gt;</code></td>
			<td>
		  视觉吸引力强，用于标识一组按钮中最主要的那个动作	</td>
		  </tr>
		  <tr>
			<td><button href="#" class="btn btn-info">信息</button></td>
			<td><code>&lt;button href="#" class="btn btn-info"&gt;信息&lt;/button&gt;</code></td>
			<td>
		  可用于替换默认样式	</td>
		  </tr>
		  <tr>
			<td><button href="#" class="btn btn-success">成功</button></td>
			<td><code>&lt;button href="#" class="btn btn-success"&gt;成功&lt;/button&gt;</code></td>
			<td>
		  表示操作成功或动作正确	</td>
		  </tr>
		  <tr>
			<td><button href="#" class="btn btn-warning">警告</button></td>
			<td><code>&lt;button href="#" class="btn btn-warning"&gt;警告&lt;/button&gt;</code></td>
			<td>
		  表示该动作应谨慎	</td>
		  </tr>
		  <tr>
			<td><button href="#" class="btn btn-danger">危险</button></td>
			<td><code>&lt;button href="#" class="btn btn-danger"&gt;危险&lt;/button&gt;</code></td>
			<td>
		  表示危险或有潜在威胁的动作。	</td>
		  </tr>
		  <tr>
			<td><button href="#" class="btn btn-inverse">相反</button></td>
			<td><code>&lt;button href="#" class="btn btn-inverse"&gt;相反&lt;/button&gt;</code></td>
			<td>
		  做为补充的深灰色按钮，与具体行为或动作无关。	</td>
		  </tr>
		  <tr>
			<td><button href="#" class="btn btn-primary disabled">禁用按钮</button></td>
			<td><code>&lt;button href="#" class="btn btn-primary disabled"&gt;禁用按钮&lt;/button&gt;</code></td>
			<td><p><code>.disabled</code> 做为工具类来用</p></td>
		  </tr>
		</tbody>
	  </table>
	</div>
	
	<div class="row">
	<h2>按钮-其它各类元素按钮</h2>
	<table class="table table-bordered table-striped">
		<thead>
		  <tr>
			<th>按钮</th>
			<th>代码</th>
			<th>描述</th>
		  </tr>
		</thead>
		<tbody>
		  <tr>
			<td>
			<input class="btn btn-skyblue" type="button" value="Input" /> 
			</td>
			<td><code>&lt;input class="btn" type="button" value="Input" /&gt;</code></td>
			<td>带渐变的标准灰色按钮</td>
		  </tr>
		  <tr>
			<td><button class="btn">Button</button></td>
			<td><code>&lt;button class="btn"&gt;Button&lt;/button&gt;</code></td>
			<td>
		  视觉吸引力强，用于标识一组按钮中最主要的那个动作	</td>
		  </tr>
		  <tr>
			<td><span class="btn">Span</span> </td>
			<td><code>&lt;span class="btn"&gt;Span&lt;/span&gt;</code></td>
			<td>
		  可用于替换默认样式	</td>
		  </tr>
		  <tr>
			<td><div class="btn">Div</div> </td>
			<td><code>&lt;div class="btn"&gt;Div&lt;/div&gt;</code></td>
			<td>
		  表示操作成功或动作正确	</td>
		  </tr>
		  <tr>
			<td><p class="btn"> P </p> </td>
			<td><code>&lt;p class="btn"&gt; P &lt;/p&gt;</code></td>
			<td>
		  表示该动作应谨慎	</td>
		  </tr>
		  <tr>
			<td><h3 class="btn">H3</h3> </td>
			<td><code>&lt;h3 class="btn"&gt;H3&lt;/h3&gt;</code></td>
			<td>
		  表示危险或有潜在威胁的动作。	</td>
		  </tr>
		</tbody>
	  </table>
	</div>
		
	<div class="row">
	<a id="forms"></a>
	<h2>表单元素</h2>
	<form class="form-horizontal">    
	<table class="table table-bordered">
		<thead>
		  <tr>
			<th>元素</th>
			<th>代码</th>
			<th>描述</th>
		  </tr>
		</thead>
		<tbody>
		  <tr>
			<td>
			<div class="control-group">
				<label for="input01" class="control-label">文本输入框</label>
				<div class="controls">
					<input type="text" id="input01">
					<p class="help-block">除了文本域之外，任何HTML5输入框都是该样式</p>
				</div>
			</div>		</td>
			<td><code>&lt;input type="text" value="" /&gt;</code></td>
			<td><p>目前ie9以下的浏览器不支持圆角和选取高亮效果</p>          </td>
		  </tr>
		  <tr>
			<td>
			<div class="control-group">
				<label for="input01" class="control-label"> 选择框 </label>
				<div class="controls">
				  <select id="select01">
					<option>请选择</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				  </select>
				</div>
			</div>		</td>
			<td><code>&lt;select id="select01"&gt;...&lt;/select&gt;</code></td>
			<td>目前ie9以下的浏览器不支持圆角</td>
		  </tr>
		  <tr>
			<td>
			<div class="control-group">
				<label class="control-label" for="multiSelect">复选框</label>
				<div class="controls">
				  <select multiple="multiple" id="multiSelect">
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				  </select>
				</div>
			</div>        </td>
			<td><code>&lt;select id="multiSelect"&gt;...&lt;/select&gt;</code></td>
			<td>目前ie9以下的浏览器不支持圆角</td>
		  </tr>
		  <tr>
			<td>
			<div class="control-group">
            <label for="fileInput" class="control-label">上传框</label>
            <div class="controls">
              <input type="file" id="fileInput" class="input-file">
            </div>
            </div>
		    </td>
			<td><code>&lt;input type="file" id="fileInput" class="input-file"&gt;</code></td>
			<td>目前ie9以下的浏览器不支持圆角和选取高亮效果</td>
		  </tr>
		  
		   <tr>
			<td>
			<div class="control-group">
				<label for="input01" class="control-label"> 文本域 </label>
				<div class="controls">
					<textarea rows="5"></textarea>
				</div>
			</div>		</td>
			<td><code>&lt;textarea id="textarea01" rows="5"&gt;&lt;/textarea&gt;</code></td>
			<td>目前ie9以下的浏览器不支持圆角和选取高亮效果</td>
		  </tr>
		  
		  <tr>
			<td>
			<div class="control-group">
				<label for="input01" class="control-label"> 单选按钮 </label>
				<div class="controls">
					<input type="checkbox">
				</div>
			</div>		</td>
			<td><code>&lt;input type="checkbox" value="" /&gt;</code></td>
			<td>
		  目前暂时未设置效果</td>
		  </tr>
		  <tr>
			<td>
			<div class="control-group">
				<label for="input01" class="control-label"> 复选按钮 </label>
				<div class="controls">
					<input type="radio">
				</div>
			</div></td>
			<td><code>&lt;input type="radio" value="" /&gt;</code></td>
			<td>目前暂时未设置效果</td>
		  </tr>
		  <tr>
			<th colspan="3"><h3>表单状态设置</h3></th>
			</tr>
		  <tr>
			<td>
			<div class="control-group">
				<label class=control-label>不可编辑的输入框</label> 
				<div class="controls">
				  <span class="uneditable-input">不可编辑，只读</span>            </div>
			</div>		</td>
			<td><code>&lt;span class="uneditable-input"&gt;不可编辑，只读&lt;/span&gt;</code></td>
			<td>目前暂时未设置效果</td>
		  </tr>
		  <tr>
			<td>
			<div class="control-group">
				<label class=control-label for=disabledInput>被禁用的输入框</label> 
				<div class="controls">
				  <input type="text" disabled="" placeholder="输入框被禁用" id="disabledInput" class="input-xlarge disabled">
				</div>
			</div>		</td>
			<td><code>&lt;input type="text" disabled="" placeholder="输入框被禁用" id="disabledInput" class="input-xlarge disabled" /&gt;</code></td>
			<td></td>
		  </tr>
		  <tr>
			<td>
			<div class="control-group">
				<label class="control-label" for="optionsCheckbox2">被禁用的复选框</label>
				<div class="controls">
				  <label class="checkbox">
					<input id="optionsCheckbox2" value="option1" disabled="" type="checkbox">被禁用              </label>
				</div>
			</div>          </td>
			<td><code>&lt;input id="optionsCheckbox2" value="option1" disabled="" type="checkbox" /&gt;</code></td>
			<td></td>
		  </tr>
		  
		  <tr>
			<td>
				<div class="control-group warning">
				<label for="inputWarning" class="control-label">Warning状态的输入框</label>
				<div class="controls">
				  <input type="text" id="inputWarning">
				  <span class="help-inline">警告信息</span>            </div>
			  </div>          </td>
			<td><code>&lt;div class="control-group warning"&gt;&lt;input type="text" /&gt;&lt;/div&gt;</code></td>
			<td></td>
		  </tr>
		  
		  <tr>
			<td>
				<div class="control-group error">
				<label for="inputError" class="control-label">Error状态的输入框</label>
				<div class="controls">
				  <input type="text" id="inputError">
				  <span class="help-inline">错误信息</span>            </div>
			  </div>          </td>
			<td><code>&lt;div class="control-group error"&gt;&lt;input type="text" /&gt;&lt;/div&gt;</code></td>
			<td></td>
		  </tr>
		  
		  <tr>
			<td>
			   <div class="control-group success">
				<label for="inputSuccess" class="control-label">Success状态的输入框</label>
				<div class="controls">
				  <input type="text" id="inputSuccess">
				  <span class="help-inline">耶！</span>            </div>
			  </div>          </td>
			<td><code>&lt;div class="control-group success"&gt;&lt;input type="text" /&gt;&lt;/div&gt;</code></td>
			<td></td>
		  </tr>
		  
		  <tr>
			<th colspan="3"><h3>表单元素宽度</h3></th>
			</tr>
		  <tr>
			  <td colspan="3">
				<h4>网格指定尺寸</h4>
				<p>使用.span* 类来指定输入框大小,共定义了12个级别,分别为<code>.span1</code><code>.span2</code> ... <code>.span11</code><code>.span12</code></p>
				<table class="table table-bordered">
					<thead>
					  <tr>
						<th>元素</th>
						<th>代码</th>
					  </tr>
					</thead>
					<tbody>
						<tr>
							<td><input type="text" placeholder=".span1" class="span1"></td>
							<td><code>&lt;input type="text" placeholder=".span1" class="span1"&gt;</code></td>
						</tr>
						<tr>
							<td><input type="text" placeholder=".span2" class="span2"></td>
							<td><code>&lt;input type="text" placeholder=".span2" class="span2"&gt;</code></td>
						</tr>
						<tr>
							<td><input type="text" placeholder=".span3" class="span3"></td>
							<td><code>&lt;input type="text" placeholder=".span3" class="span3"&gt;</code></td>
						</tr>
						<tr>
							<td><select class="span1">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							  </select>
							</td>
							<td><code>&lt;select class="span1"&gt;...&lt;/select&gt;</code></td>
						</tr>
						<tr>
							<td><select class="span2">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							  </select></td>
							<td><code>&lt;select class="span2"&gt;...&lt;/select&gt;</code></td>
						</tr>
					</tbody>
				</table>
				</td>
			</tr>
			<tr>
			  <td colspan="3">
				<h4>别名指定尺寸</h4>
				<p>静态类指定的尺寸与网格系统的尺寸并不匹配，只对几种控件有效(比如 input 和 select)，分别为：<code>input-mini</code><code>input-small</code><code>input-medium</code><code>input-large</code><code>input-xlarge</code><code>input-xxlarge</code></p>
				<table class="table table-bordered">
					<thead>
					  <tr>
						<th>元素</th>
						<th>代码</th>
					  </tr>
					</thead>
					<tbody>
						<tr>
							<td><input type="text" placeholder=".input-mini" class="input-mini"></td>
							<td><code>&lt;input type="text" placeholder=".input-mini" class="input-mini"&gt;</code></td>
						</tr>
						<tr>
							<td><input type="text" placeholder=".input-small" class="input-small"></td>
							<td><code>&lt;input type="text" placeholder=".input-small" class="input-small"&gt;</code></td>
						</tr>
						<tr>
							<td><input type="text" placeholder=".input-medium" class="input-medium"></td>
							<td><code>&lt;input type="text" placeholder=".input-medium" class="input-medium"&gt;</code></td>
						</tr>
						<tr>
							<td><input type="text" placeholder=".input-large" class="input-large"></td>
							<td><code>&lt;input type="text" placeholder=".input-large" class="input-large"&gt;</code></td>
						</tr>
						<tr>
							<td><input type="text" placeholder=".input-xlarge" class="input-xlarge"></td>
							<td><code>&lt;input type="text" placeholder=".input-xlarge" class="input-xlarge"&gt;</code></td>
						</tr>
						<tr>
							<td><input type="text" placeholder=".input-xxlarge" class="input-xxlarge"></td>
							<td><code>&lt;input type="text" placeholder=".input-xxlarge" class="input-xxlarge"&gt;</code></td>
						</tr>
					</tbody>
				</table>
				</td>
			  </tr>
		</tbody>
	  </table>
	  </form>
	</div>
	
	<div class="row">
	<h2>表单帮助/提示文本</h2>
	<form class="form-horizontal">    
	<table class="table table-bordered">
		<thead>
		  <tr>
			<th>元素</th>
			<th>代码</th>
			<th>描述</th>
		  </tr>
		</thead>
		<tbody>
		  <tr>
			<td class="span2">
			<span class="helpe-inline">使用行级帮助文本</span></td>
			<td class="span6"><code>&lt;span class="helpe-inline"&gt;就是使用行级帮助文本&lt;/span&gt;</code></td>
			<td rowspan="2"><p>
			对表单中的输入框添加帮助/提示文本时，添加 <code>&lt;span class="help-inline"&gt;</code> 就是使用行级帮助文本；
			在输入框后添加 <code>&lt;p class="help-block"&gt;</code>  就是使用块状帮助文本。
			  </p>
			</td>
		  </tr>
		  <tr>
			<td>
			<p class="helpe-block">使用块状帮助文本</p></td>
			<td><code>&lt;p class="helpe-block"&gt;就是使用行级帮助文本&lt;/p&gt;</code></td>
		  </tr>
		</tbody>
	  </table>
	  </form>
	</div>
	<div class="row">
		  <div class="span6">
		  	<input type="text" class="input-small" id="input01">
			<p class="help-inline">请输入信息</p>
			<pre>
&lt;input type=&quot;text&quot; class=&quot;input-small&quot; id=&quot;input01&quot;&gt;
&lt;p class=&quot;help-inline&quot;&gt;请输入信息&lt;/p&gt;
			</pre>
		  </div>
		  <div class="span6">
		  	<input type="text" class="input-small" id="input01">
			<p class="help-block">请输入信息</p>
			<pre>
&lt;input type=&quot;text&quot; class=&quot;input-small&quot; id=&quot;input01&quot;&gt;
&lt;p class=&quot;help-block&quot;&gt;请输入信息&lt;/p&gt;
			</pre>
		  </div>
	</div>
	
	<div class="row">
	<a id="icons"></a>
	<h2>图标</h2>
      <p><code>&lt;i&gt;</code> 标签图标，用法如下：</p>
	  <pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;i</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"icon-search"</span><span class="tag">&gt;&lt;/i&gt;</span></li></ol></pre>
      <p>用 <code>.icon-white</code> 类显示反白图标：</p>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;i</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"icon-search icon-white"</span><span class="tag">&gt;&lt;/i&gt;</span></li></ol></pre>
      <p><span class="label label-info">强调!</span>在图标毗邻文本时，比如buttons或导航链接，要保证在 <code>&lt;i&gt;</code> 与文本之间有空格。</p>
	  <p>
        <a href="#" class="btn"><i class="icon-refresh"></i> 刷新</a>
        <a href="#" class="btn btn-success"><i class="icon-shopping-cart icon-white"></i> 签出</a>
        <a href="#" class="btn btn-danger"><i class="icon-trash icon-white"></i> 删除</a>
      </p>
	  <div class="input-prepend">
	  	<span class="add-on"><i class="icon-envelope"></i></span><input type="text" style="margin:0;" id="inputIcon" class="span2">
	  </div>
    <div class="span3">
      <ul class="the-icons">
        <li><i class="icon-glass"></i> icon-glass</li>
        <li><i class="icon-music"></i> icon-music</li>
        <li><i class="icon-search"></i> icon-search</li>
        <li><i class="icon-envelope"></i> icon-envelope</li>
        <li><i class="icon-heart"></i> icon-heart</li>
        <li><i class="icon-star"></i> icon-star</li>
        <li><i class="icon-star-empty"></i> icon-star-empty</li>
        <li><i class="icon-user"></i> icon-user</li>
        <li><i class="icon-film"></i> icon-film</li>
        <li><i class="icon-th-large"></i> icon-th-large</li>
        <li><i class="icon-th"></i> icon-th</li>
        <li><i class="icon-th-list"></i> icon-th-list</li>
        <li><i class="icon-ok"></i> icon-ok</li>
        <li><i class="icon-remove"></i> icon-remove</li>
        <li><i class="icon-zoom-in"></i> icon-zoom-in</li>
        <li><i class="icon-zoom-out"></i> icon-zoom-out</li>
        <li><i class="icon-off"></i> icon-off</li>
        <li><i class="icon-signal"></i> icon-signal</li>
        <li><i class="icon-cog"></i> icon-cog</li>
        <li><i class="icon-trash"></i> icon-trash</li>
        <li><i class="icon-home"></i> icon-home</li>
        <li><i class="icon-file"></i> icon-file</li>
        <li><i class="icon-time"></i> icon-time</li>
        <li><i class="icon-road"></i> icon-road</li>
        <li><i class="icon-download-alt"></i> icon-download-alt</li>
        <li><i class="icon-download"></i> icon-download</li>
        <li><i class="icon-upload"></i> icon-upload</li>
        <li><i class="icon-inbox"></i> icon-inbox</li>
        <li><i class="icon-play-circle"></i> icon-play-circle</li>
        <li><i class="icon-repeat"></i> icon-repeat</li>
      </ul>
    </div>
    <div class="span3">
      <ul class="the-icons">
        <li><i class="icon-refresh"></i> icon-refresh</li>
        <li><i class="icon-list-alt"></i> icon-list-alt</li>
        <li><i class="icon-lock"></i> icon-lock</li>
        <li><i class="icon-flag"></i> icon-flag</li>
        <li><i class="icon-headphones"></i> icon-headphones</li>
        <li><i class="icon-volume-off"></i> icon-volume-off</li>
        <li><i class="icon-volume-down"></i> icon-volume-down</li>
        <li><i class="icon-volume-up"></i> icon-volume-up</li>
        <li><i class="icon-qrcode"></i> icon-qrcode</li>
        <li><i class="icon-barcode"></i> icon-barcode</li>
        <li><i class="icon-tag"></i> icon-tag</li>
        <li><i class="icon-tags"></i> icon-tags</li>
        <li><i class="icon-book"></i> icon-book</li>
        <li><i class="icon-bookmark"></i> icon-bookmark</li>
        <li><i class="icon-print"></i> icon-print</li>
        <li><i class="icon-camera"></i> icon-camera</li>
        <li><i class="icon-font"></i> icon-font</li>
        <li><i class="icon-bold"></i> icon-bold</li>
        <li><i class="icon-italic"></i> icon-italic</li>
        <li><i class="icon-text-height"></i> icon-text-height</li>
        <li><i class="icon-text-width"></i> icon-text-width</li>
        <li><i class="icon-align-left"></i> icon-align-left</li>
        <li><i class="icon-align-center"></i> icon-align-center</li>
        <li><i class="icon-align-right"></i> icon-align-right</li>
        <li><i class="icon-align-justify"></i> icon-align-justify</li>
        <li><i class="icon-list"></i> icon-list</li>
        <li><i class="icon-indent-left"></i> icon-indent-left</li>
        <li><i class="icon-indent-right"></i> icon-indent-right</li>
        <li><i class="icon-facetime-video"></i> icon-facetime-video</li>
        <li><i class="icon-picture"></i> icon-picture</li>
      </ul>
    </div>
    <div class="span3">
      <ul class="the-icons">
        <li><i class="icon-pencil"></i> icon-pencil</li>
        <li><i class="icon-map-marker"></i> icon-map-marker</li>
        <li><i class="icon-adjust"></i> icon-adjust</li>
        <li><i class="icon-tint"></i> icon-tint</li>
        <li><i class="icon-edit"></i> icon-edit</li>
        <li><i class="icon-share"></i> icon-share</li>
        <li><i class="icon-check"></i> icon-check</li>
        <li><i class="icon-move"></i> icon-move</li>
        <li><i class="icon-step-backward"></i> icon-step-backward</li>
        <li><i class="icon-fast-backward"></i> icon-fast-backward</li>
        <li><i class="icon-backward"></i> icon-backward</li>
        <li><i class="icon-play"></i> icon-play</li>
        <li><i class="icon-pause"></i> icon-pause</li>
        <li><i class="icon-stop"></i> icon-stop</li>
        <li><i class="icon-forward"></i> icon-forward</li>
        <li><i class="icon-fast-forward"></i> icon-fast-forward</li>
        <li><i class="icon-step-forward"></i> icon-step-forward</li>
        <li><i class="icon-eject"></i> icon-eject</li>
        <li><i class="icon-chevron-left"></i> icon-chevron-left</li>
        <li><i class="icon-chevron-right"></i> icon-chevron-right</li>
        <li><i class="icon-plus-sign"></i> icon-plus-sign</li>
        <li><i class="icon-minus-sign"></i> icon-minus-sign</li>
        <li><i class="icon-remove-sign"></i> icon-remove-sign</li>
        <li><i class="icon-ok-sign"></i> icon-ok-sign</li>
        <li><i class="icon-question-sign"></i> icon-question-sign</li>
        <li><i class="icon-info-sign"></i> icon-info-sign</li>
        <li><i class="icon-screenshot"></i> icon-screenshot</li>
        <li><i class="icon-remove-circle"></i> icon-remove-circle</li>
        <li><i class="icon-ok-circle"></i> icon-ok-circle</li>
        <li><i class="icon-ban-circle"></i> icon-ban-circle</li>
      </ul>
    </div>
    <div class="span3">
      <ul class="the-icons">
        <li><i class="icon-arrow-left"></i> icon-arrow-left</li>
        <li><i class="icon-arrow-right"></i> icon-arrow-right</li>
        <li><i class="icon-arrow-up"></i> icon-arrow-up</li>
        <li><i class="icon-arrow-down"></i> icon-arrow-down</li>
        <li><i class="icon-share-alt"></i> icon-share-alt</li>
        <li><i class="icon-resize-full"></i> icon-resize-full</li>
        <li><i class="icon-resize-small"></i> icon-resize-small</li>
        <li><i class="icon-plus"></i> icon-plus</li>
        <li><i class="icon-minus"></i> icon-minus</li>
        <li><i class="icon-asterisk"></i> icon-asterisk</li>
        <li><i class="icon-exclamation-sign"></i> icon-exclamation-sign</li>
        <li><i class="icon-gift"></i> icon-gift</li>
        <li><i class="icon-leaf"></i> icon-leaf</li>
        <li><i class="icon-fire"></i> icon-fire</li>
        <li><i class="icon-eye-open"></i> icon-eye-open</li>
        <li><i class="icon-eye-close"></i> icon-eye-close</li>
        <li><i class="icon-warning-sign"></i> icon-warning-sign</li>
        <li><i class="icon-plane"></i> icon-plane</li>
        <li><i class="icon-calendar"></i> icon-calendar</li>
        <li><i class="icon-random"></i> icon-random</li>
        <li><i class="icon-comment"></i> icon-comment</li>
        <li><i class="icon-magnet"></i> icon-magnet</li>
        <li><i class="icon-chevron-up"></i> icon-chevron-up</li>
        <li><i class="icon-chevron-down"></i> icon-chevron-down</li>
        <li><i class="icon-retweet"></i> icon-retweet</li>
        <li><i class="icon-shopping-cart"></i> icon-shopping-cart</li>
        <li><i class="icon-folder-close"></i> icon-folder-close</li>
        <li><i class="icon-folder-open"></i> icon-folder-open</li>
        <li><i class="icon-resize-vertical"></i> icon-resize-vertical</li>
        <li><i class="icon-resize-horizontal"></i> icon-resize-horizontal</li>
      </ul>
    </div>
	</div>
	
	<div class="row">
		<h2>图标2</h2>
		<p>用 <code>.icon-blue</code> </p>
		<div class="span3">
		  <ul class="the-icons">
			<li><i class="icon-bar-add icon-blue"></i> icon-bar-add</li>
			<li><i class="icon-bar-edit icon-blue"></i> icon-bar-edit</li>
			<li><i class="icon-bar-del icon-blue"></i> icon-bar-del</li>
			<li><i class="icon-bar-minus icon-blue"></i> icon-bar-minus</li>
			<li><i class="icon-bar-remove icon-blue"></i> icon-bar-remove</li>
			<li><i class="icon-bar-ok icon-blue"></i> icon-bar-ok</li>
			<li><i class="icon-bar-checkall icon-blue"></i> icon-bar-checkal</li>
			<li><i class="icon-bar-home icon-blue"></i> icon-bar-home</li>
	        	<li><i class="icon-bar-folder icon-blue"></i> icon-bar-folder</li>
		        <li><i class="icon-bar-folderopen icon-blue"></i> icon-bar-folderopen</li>
		        <li><i class="icon-bar-person icon-blue"></i> icon-bar-person</li>
         	        <li><i class="icon-bar-role icon-blue"></i> icon-bar-role</li>
		        <li><i class="icon-bar-star icon-blue"></i> icon-bar-star</li>
		        <li><i class="icon-bar-right icon-blue"></i> icon-bar-right</li>
			<li><i class="icon-bar-page icon-blue"></i> icon-bar-page</li>
			<li><i class="icon-bar-board icon-blue"></i> icon-bar-board</li>
			<li><i class="icon-bar-board1 icon-blue"></i> icon-bar-board1</li>
		  </ul>
		</div>
		
		<div class="span3">
		  <ul class="the-icons">
			<li><i class="icon-bar-gis icon-blue"></i> icon-bar-gis</li>
			<li><i class="icon-bar-loc icon-blue"></i> icon-bar-loc</li>
			<li><i class="icon-bar-img icon-blue"></i> icon-bar-img</li>
			<li><i class="icon-bar-img1 icon-blue"></i> icon-bar-img1</li>
			<li><i class="icon-bar-filter icon-blue"></i> icon-bar-filter</li>
			<li><i class="icon-bar-setup icon-blue"></i> icon-bar-setup</li>
			<li><i class="icon-bar-setup1 icon-blue"></i> icon-bar-setup1</li>
			<li><i class="icon-bar-unit icon-blue"></i> icon-bar-unit</li>
			<li><i class="icon-bar-depart icon-blue"></i> icon-bar-depart</li>
			<li><i class="icon-bar-station icon-blue"></i> icon-bar-station</li>
			<li><i class="icon-bar-out icon-blue"></i> icon-bar-out</li>
			<li><i class="icon-bar-down icon-blue"></i> icon-vdown</li>
			<li><i class="icon-bar-up icon-blue"></i> icon-bar-up</li>
			<li><i class="icon-bar-clip icon-blue"></i> icon-bar-clip</li>
			<li><i class="icon-bar-layer icon-blue"></i> icon-bar-layer</li>
			<li><i class="icon-bar-calendar icon-blue"></i> icon-bar-calendar</li>
			<li><i class="icon-bar-pages icon-blue"></i> icon-bar-pages</li>
			<li><i class="icon-bar-action icon-blue"></i> icon-bar-action</li>
			<li><i class="icon-bar-play icon-blue"></i> icon-bar-play</li>
			<li><i class="icon-bar-email icon-blue"></i> icon-bar-email</li>
			<li><i class="icon-bar-clock icon-blue"></i> icon-bar-clock</li>
			<li><i class="icon-bar-clock1 icon-blue"></i>  icon-bar-clock1</li>
		  </ul>
		</div>
		
		<div class="span3">
		  <ul class="the-icons">
			<li><i class="icon-bar-list icon-blue"></i> icon-bar-list</li>
			<li><i class="icon-bar-din icon-blue"></i> icon-bar-din</li>
			<li><i class="icon-bar-phone icon-blue"></i> icon-bar-phone</li>
			<li><i class="icon-bar-refresh icon-blue"></i> icon-bar-refresh</li>
			<li><i class="icon-bar-lock icon-blue"></i> icon-bar-lock</li>
			<li><i class="icon-bar-switch icon-blue"></i> icon-bar-switch</li>
			<li><i class="icon-bar-book icon-blue"></i> icon-bar-book</li>
			<li><i class="icon-bar-message icon-blue"></i> icon-bar-message</li>
			<li><i class="icon-bar-camera icon-blue"></i> icon-bar-camera</li>
			<li><i class="icon-bar-camera1 icon-blue"></i> icon-bar-camera1</li>
			<li><i class="icon-bar-video icon-blue"></i> icon-bar-video</li>
			<li><i class="icon-bar-flag icon-blue"></i> icon-bar-flag</li>
			<li><i class="icon-bar-nav icon-blue"></i> icon-bar-nav</li>
			<li><i class="icon-bar-view icon-blue"></i> icon-bar-view</li>
			<li><i class="icon-bar-search icon-blue"></i> icon-bar-search</li>
			<li><i class="icon-bar-searchin icon-blue"></i> icon-bar-searchin</li>
			<li><i class="icon-bar-searchout icon-blue"></i> icon-bar-searchout</li>
			<li><i class="icon-bar-print icon-blue"></i> icon-bar-print</li>
		  </ul>
		</div>
		
		<div class="span3">
		  <ul class="the-icons">
			<li>用于导航banner</li>
			<li><i class="icon-banner-filter icon-blue"></i> icon-banner-filter</li>
			<li><i class="icon-banner-arrowdown icon-blue"></i> icon-banner-arrowdown</li>
			<li><i class="icon-banner-search icon-blue"></i> icon-banner-search</li>
			<li><i class="icon-banner-add icon-blue"></i> icon-banner-add</li>
			<li><i class="icon-banner-edit icon-blue"></i> icon-banner-edit</li>
			<li><i class="icon-banner-down icon-blue"></i> icon-banner-down</li>
			<li><i class="icon-banner-up icon-blue"></i> icon-banner-up</li>
			<li><i class="icon-banner-role icon-blue"></i> icon-banner-role</li>
			<li><i class="icon-banner-setup icon-blue"></i> icon-banner-setup</li>
			<li><i class="icon-banner-checkall icon-blue"></i> icon-banner-checkall</li>
			<li><i class="icon-banner-page icon-blue"></i> icon-banner-page</li>
			<li><i class="icon-banner-board icon-blue"></i> icon-banner-board</li>
			<li><i class="icon-banner-star icon-blue"></i> icon-banner-star</li>
			<li><i class="icon-con-blackfolding icon-blue"></i> icon-con-blackfolding</li>
			<li><i class="icon-con-bluefolding icon-blue"></i> icon-con-bluefolding</li>
			<li><i class="icon-con-whitefolding icon-blue"></i> icon-con-whitefolding</li>
		  </ul>
		</div>
		
	</div>

</div>	
</body>
</html>

