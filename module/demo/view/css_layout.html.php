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
</style>
<body>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="subnav">
			<ul class="nav nav-pills">
			  <li><a href="#tables">表单元素布局</a></li>
			  <li><a href="#forms">表单布局</a></li>
			  <li><a href="#buttons">页面布局</a></li>
			</ul>
		</div>
		
	</div>

	<div class="row-fluid">
	<h2>表单元素布局</h2>
	<form class="form-horizontal">    
	<table class="table table-bordered">
		<thead>
		  <tr>
			<th class="span5">元素布局</th>
			<th>代码</th>
			<th>描述</th>
		  </tr>
		</thead>
		<tbody>
		  <tr>
			<td>
				<div class="control-group">
				<label for="inlineCheckboxes" class="control-label">行级复选框</label>
				<div class="controls">
				  <label class="checkbox inline">
					<input type="checkbox" value="option1" id="inlineCheckbox1"> 1
				  </label>
				  <label class="checkbox inline">
					<input type="checkbox" value="option2" id="inlineCheckbox2"> 2
				  </label>
				  <label class="checkbox inline">
					<input type="checkbox" value="option3" id="inlineCheckbox3"> 3
				  </label>
				</div>
			  </div>
			</td>
			<td>
			<font color="#FF0000">
				&lt;div class="control-group"&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&lt;label for="inlineCheckboxes" class="control-label"&gt;行级复选框&lt;/label&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&lt;div class="controls"&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;label class="checkbox inline"&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input type="checkbox" value="option1" id="inlineCheckbox1"&gt; 1<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/label&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;label class="checkbox inline"&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input type="checkbox" value="option2" id="inlineCheckbox2"&gt; 2<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/label&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;label class="checkbox inline"&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input type="checkbox" value="option3" id="inlineCheckbox3"&gt; 3<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/label&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<BR>&nbsp;&lt;/div&gt;
			</font>
			</td>
			<td><p class="help-block">在form表单中实现input的行级排列，通过label包含input实现，注意label需要调用的类，如果input元素为checkbox时，label应调用<code>.checkbox inline</code>,如果input元素为radio时，label应调用<code>.radio inline</code></p></td>
		  </tr>
		  <tr>
			<td>
				<div class="control-group">
				<label for="optionsCheckboxList" class="control-label">多复选框</label>
				<div class="controls">
				  <label class="checkbox">
					<input type="checkbox" value="option1" name="optionsCheckboxList1">
			第一个选项，最好给出将其做为首选的理由
				  </label>
				  <label class="checkbox">
					<input type="checkbox" value="option2" name="optionsCheckboxList2">
			第二个选项，同样可选并包含在表单结果中
				  </label>
				  <label class="checkbox">
					<input type="checkbox" value="option3" name="optionsCheckboxList3">
			第三个选项，同样可选并包含在表单结果中
				  </label>
				</div>
			  </div>
			</td>
			<td><font color="#FF0000">&lt;div class="control-group"&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&lt;label for="optionsCheckboxList" class="control-label"&gt;多复选框&lt;/label&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&lt;div class="controls"&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;label class="checkbox"&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input type="checkbox" value="option1" name="optionsCheckboxList1"&gt;<BR>&nbsp;&nbsp;&nbsp;第一个选项，最好给出将其做为首选的理由<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/label&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;label class="checkbox"&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input type="checkbox" value="option2" name="optionsCheckboxList2"&gt;<BR>&nbsp;&nbsp;&nbsp;第二个选项，同样可选并包含在表单结果中<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/label&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;label class="checkbox"&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input type="checkbox" value="option3" name="optionsCheckboxList3"&gt;<BR>&nbsp;&nbsp;&nbsp;第三个选项，同样可选并包含在表单结果中<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/label&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;p class="help-block"&gt;&lt;strong&gt;注意&lt;/strong&gt;<BR>&nbsp;&nbsp;&nbsp;建议使用label标签将option选项包裹起来，这样可以提供更大的点击区域，提升表单可用性。<BR>&nbsp;&nbsp;&nbsp;&nbsp; &lt;/p&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;</font>
			</td>
			<td><p class="help-block">在form表单中实现input的垂直级排列，通过label包含input实现，注意label需要调用的类，如果input元素为checkbox时，label应调用<code>.checkbox</code>,如果input元素为radio时，label应调用<code>.radio</code><p>
			<p class="help-block"><strong>注意</strong>
			建议使用label标签将option选项包裹起来，这样可以提供更大的点击区域，提升表单可用性。
			  </p></td>
		  </tr>
		  <tr>
			<td>
			<div class="control-group">
				<label class="control-label">单选钮</label>
				<div class="controls">
				  <label class="radio">
					<input type="radio" checked="" value="option1" id="optionsRadios1" name="optionsRadios">第一个选项
				  </label>
				  <label class="radio">
					<input type="radio" value="option2" id="optionsRadios2" name="optionsRadios">第二个选项
				  </label>
				</div>
			  </div>
			</td>
			<td><font color="#FF0000">&lt;div class="control-group"&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&lt;label class="control-label"&gt;单选钮&lt;/label&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&lt;div class="controls"&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;label class="radio"&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input type="radio" checked="" value="option1" id="optionsRadios1" name="optionsRadios"&gt;<BR>&nbsp;&nbsp;&nbsp;第一个选项，最好给出将其做为首选的理由<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/label&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;label class="radio"&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input type="radio" value="option2" id="optionsRadios2" name="optionsRadios"&gt;<BR>&nbsp;&nbsp;&nbsp;第二个选项，如果选译该选项就会取消第一个选项。<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/label&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<BR>&lt;/div&gt;</font>
			</td>
			<td><p class="help-block">在form表单中实现input的垂直级排列，通过label包含input实现，注意label需要调用的类，如果input元素为checkbox时，label应调用<code>.checkbox</code>,如果input元素为radio时，label应调用<code>.radio</code><p></td>
		  </tr>
		  <tr>
			<td>
			  <div class="control-group">
            <label for="appendedPrependedInput" class="control-label">后置按钮</label>
            <div class="controls">
              <div class="input-append">
                <input type="text" size="16" id="appendedPrependedInput" class="span2"><button type="button" class="btn">执行</button>
              </div>
            </div>
          </div>
			</td>
			<td><font color="#FF0000">&lt;div class="control-group"&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&lt;div class="controls"&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;div class="input-append"&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input type="text" size="16" id="appendedPrependedInput" class="span2"&gt;&lt;button type="button" class="btn"&gt;执行&lt;/button&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/div&gt;<BR>&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<BR>&lt;/div&gt;</font></td>
			<td>目前ie9以下的浏览器不支持圆角和选取高亮效果</td>
		  </tr>
		</tbody>
	  </table>
	</form>
	</div>
	
	<div class="row-fluid">
	<h2>表单form布局</h2>
	<table class="table table-bordered table-striped">
		<thead>
		  <tr>
			<th>名称</th>
			<th>类</th>
			<th>描述</th>
		  </tr>
		</thead>
		<tbody>
		  <tr>
			<th>垂直式 (默认)</th>
			<td><code>.form-vertical</code> <span class="muted">(非必填，默认)</span></td>
			<td>堆叠式的，所有控件的标签文字都左对齐</td>
		  </tr>
		  <tr>
			<th>行式</th>
			<td><code>.form-inline</code></td>
			<td>标签文字左对齐，控件以inline-block紧凑形式存在</td>
		  </tr>
		  <!--tr>
			<th>搜索式</th>
			<td><code>.form-search</code></td>
			<td>
		  经典的搜索美化方案，对文本框进行圆化
		</td>
		  </tr-->
		  <tr>
			<th>水平式</th>
			<td><code>.form-horizontal</code></td>
			<td>左浮动，标签与其对应的控件居于同一行，标签文字右对齐</td>
		  </tr>
		</tbody>
	  </table>
</div>

	<div class="row-fluid">
		<div class="span3">
		  <h3>vertical垂直表单布局</h3>
		  <p>使用 <code>.form-vertical</code>布局，默认form表单布局样式
		  </p>
		</div>
		<div  class="span9">
		<form class="well well-small">
			<label for="select01" >选择框</label>
			<select id="select01" class="span2">
			<option>请选择</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			</select>
			<label for="input01" >关键字1：</label>
			<input type="text" id="input01" class="span2">
			<label for="input01">关键字2：</label>
			<input type="text" class="input-medium search-query">
			<button type="submit" class="btn">搜索</button>
		 </form>
		 <pre>
&lt;form class=&quot;well well-small&quot;&gt;
	&lt;label for=&quot;select01&quot;&gt;选择框&lt;/label&gt;
	&lt;select id=&quot;select01&quot; class=&quot;span2&quot;&gt;
		&lt;option&gt;请选择&lt;/option&gt;
		&lt;option&gt;2&lt;/option&gt;
		&lt;option&gt;3&lt;/option&gt;
		&lt;option&gt;4&lt;/option&gt;
		&lt;option&gt;5&lt;/option&gt;
	&lt;/select&gt;
	&lt;label for=&quot;input01&quot;&gt;关键字1：&lt;/label&gt;
	&lt;input type=&quot;text&quot; id=&quot;input01&quot; class=&quot;span2&quot;&gt;
	&lt;label for=&quot;input01&quot;&gt;关键字2：&lt;/label&gt;
	&lt;input type=&quot;text&quot; class=&quot;input-medium search-query&quot;&gt;
	&lt;button type=&quot;submit&quot; class=&quot;btn&quot;&gt;搜索&lt;/button&gt;
&lt;/form&gt;</pre>
		</div>
	</div>
	
	<div class="row-fluid">
		<div class="span3">
		  <h3>inline线性表单布局</h3>
		  <p>使用<code>.form-inline</code>或<code>.form-horizontal</code>布局，使用线性布局时，可以
		  </p>
		</div>
		<div  class="span9">
		<form class="well well-small form-inline">选择框
			<select id="select01" class="span2">
			<option>请选择</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			</select>
			关键字1：<input type="text" id="input01" class="span2">
			关键字2：<input type="text" class="input-medium search-query">
			<button type="submit" class="btn"><i class="icon-search"></i>搜索</button>
		</form>
		 <pre>
&lt;form class=&quot;well well-small form-inline&quot;&gt;选择框
	&lt;select id=&quot;select01&quot; class=&quot;span2&quot;&gt;
	&lt;option&gt;请选择&lt;/option&gt;
	&lt;option&gt;2&lt;/option&gt;
	&lt;option&gt;3&lt;/option&gt;
	&lt;option&gt;4&lt;/option&gt;
	&lt;option&gt;5&lt;/option&gt;
	&lt;/select&gt;
	关键字1：&lt;input type=&quot;text&quot; id=&quot;input01&quot; class=&quot;span2&quot;&gt;
	关键字2：&lt;input type=&quot;text&quot; class=&quot;input-medium search-query&quot;&gt;
	&lt;button type=&quot;submit&quot; class=&quot;btn&quot;&gt;搜索&lt;/button&gt;
&lt;/form&gt;</pre>
		</div>
	</div>
	
	<div class="row-fluid">
		<div class="span3">
		  <h3>horizontal水平表单布局1</h3>
		  <p>使用 <code>.form-horizontal</code>布局</p>
		  <p>
	<strong>注意：</strong>在该水平布局中用到了control-group控件组（在本UI中，我们将这种多元素组成的块，称为<a href="/demo/basecomponent" target="sys_main">css组件</a>，具体参<a href="/demo/basecomponent" target="sys_main">css组件</a>)
      </p>
		</div>
		<div  class="span9">
		    <form class="row-fluid well form-horizontal">
				<div class="control-group">
				<label for="input01" class="control-label">文本输入框</label>
				<div class="controls">
				  <input type="text" id="input01">
				</div>
				</div>
				<div class="control-group">
				  <label for="input01" class="control-label">文本输入框</label>
				  <div class="controls">
					<input type="text" id="input01">
				  </div>
				</div>
				<div class="control-group">
				  <label for="input01" class="control-label">文本输入框</label>
				  <div class="controls">
				  <input type="text" id="input01">
				</div>
				</div>
			</form>
		 <pre>
&lt;form class=&quot;row-fluid well form-horizontal&quot;&gt;
	&lt;div class=&quot;control-group&quot;&gt;
	&lt;label for=&quot;input01&quot; class=&quot;control-label&quot;&gt;文本输入框&lt;/label&gt;
	&lt;div class=&quot;controls&quot;&gt;
	&lt;input type=&quot;text&quot; id=&quot;input01&quot;&gt;
	&lt;/div&gt;
	&lt;/div&gt;
	&lt;div class=&quot;control-group&quot;&gt;
	&lt;label for=&quot;input01&quot; class=&quot;control-label&quot;&gt;文本输入框&lt;/label&gt;
	&lt;div class=&quot;controls&quot;&gt;
	&lt;input type=&quot;text&quot; id=&quot;input01&quot;&gt;
	&lt;/div&gt;
	&lt;/div&gt;
	&lt;div class=&quot;control-group&quot;&gt;
	&lt;label for=&quot;input01&quot; class=&quot;control-label&quot;&gt;文本输入框&lt;/label&gt;
	&lt;div class=&quot;controls&quot;&gt;
	&lt;input type=&quot;text&quot; id=&quot;input01&quot;&gt;
	&lt;/div&gt;
	&lt;/div&gt;
&lt;/form&gt;
		 </pre>
		</div>
	</div>
	
	<div class="row-fluid">
		<div class="span3">
		  <h3>horizontal水平表单布局2</h3>
		  <p><strong>注意：</strong>在该水平布局中用到了<code>.fieldset</code>容器和<code>.legend</code>类，参见<a href="/demo/basecomponent" target="sys_main">css组件</a></p>
		</div>
		<div  class="span9">
			<form class="form-horizontal">
			<fieldset>
			<legend>完善资料</legend>
			<div class="row">
				<div class="span3">
					<div class="control-group">
					<label class="control-label" for="input01">姓名1</label>
					<div class="controls">
					<input type="text" class="input-small" id="input01">
					</div>
					</div>
					<div class="control-group">
					<label class="control-label" for="input01">年龄1</label>
					<div class="controls">
					<input type="text" class="input-small" id="input01">
					</div>
					</div>
				</div>
				<div class="span3">
					<div class="control-group">
					<label class="control-label" for="input01">姓名2</label>
					<div class="controls">
					<input type="text" class="input-small" id="input01">
					</div>
					</div>
					<div class="control-group">
					<label class="control-label" for="input01">年龄2</label>
					<div class="controls">
					<input type="text" class="input-small" id="input01">
					</div>
					</div>
				</div>
			</div>
			</fieldset>
			</form>
		 	<pre>
&lt;form class=&quot;form-horizontal&quot;&gt;
	&lt;fieldset&gt;
		&lt;legend&gt;完善资料&lt;/legend&gt;
		&lt;div class=&quot;row&quot;&gt;
		&lt;div class=&quot;span3&quot;&gt;
		&lt;div class=&quot;control-group&quot;&gt;
		&lt;label class=&quot;control-label&quot; for=&quot;input01&quot;&gt;姓名1&lt;/label&gt;
		&lt;div class=&quot;controls&quot;&gt;
		&lt;input type=&quot;text&quot; class=&quot;input-small&quot; id=&quot;input01&quot;&gt;
		&lt;/div&gt;
		&lt;/div&gt;
		&lt;div class=&quot;control-group&quot;&gt;
		&lt;label class=&quot;control-label&quot; for=&quot;input01&quot;&gt;年龄1&lt;/label&gt;
		&lt;div class=&quot;controls&quot;&gt;
		&lt;input type=&quot;text&quot; class=&quot;input-small&quot; id=&quot;input01&quot;&gt;
		&lt;/div&gt;
		&lt;/div&gt;
		&lt;/div&gt;
		&lt;div class=&quot;span3&quot;&gt;
		&lt;div class=&quot;control-group&quot;&gt;
		&lt;label class=&quot;control-label&quot; for=&quot;input01&quot;&gt;姓名2&lt;/label&gt;
		&lt;div class=&quot;controls&quot;&gt;
		&lt;input type=&quot;text&quot; class=&quot;input-small&quot; id=&quot;input01&quot;&gt;
		&lt;/div&gt;
		&lt;/div&gt;
		&lt;div class=&quot;control-group&quot;&gt;
		&lt;label class=&quot;control-label&quot; for=&quot;input01&quot;&gt;年龄2&lt;/label&gt;
		&lt;div class=&quot;controls&quot;&gt;
		&lt;input type=&quot;text&quot; class=&quot;input-small&quot; id=&quot;input01&quot;&gt;
		&lt;/div&gt;
		&lt;/div&gt;
		&lt;/div&gt;
		&lt;/div&gt;
	&lt;/fieldset&gt;
&lt;/form&gt;
			</pre>
		</div>
	</div>
	
	
	<h3>页面布局</h3>
	<div class="row-fluid">
		<div class="span12">
		  <h4>1、固定布局</h4>
		  <p>用<code>&lt;div class="container"&gt;</code> 实现的简单的中央布局的页面，默认为940px宽。</p>
		  <div class="wrap-group">
			<div class="container" style="background:#DCEAF4; border-radius: 3px 3px 3px 3px;height:inherit; text-align:center;height:240px;"><br />容器宽度940px</div>
		  </div>
			<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;body&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"container"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    ...</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;/div&gt;</span></li><li class="L4"><span class="tag">&lt;/body&gt;</span></li></ol></pre>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
		  <h2>流式布局</h2>
		  <p><code>&lt;div class="container-fluid"&gt;</code> 提供灵活的页面结构，定义了最小和最大宽度，拥有一个左边栏。很适合做应用和文档。</p>
		  <div class="wrap-group">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span2" style="background:#BBD8E9; border-radius: 3px 3px 3px 3px;height:240px; text-align:center;">.span2</div>
					<div class="span10" style="background:#DCEAF4; border-radius: 3px 3px 3px 3px;height:240px; text-align:center;">.span10</div>
				</div>
			</div>
		  </div>
			<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"container-fluid"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"row-fluid"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"span2"</span><span class="tag">&gt;</span></li><li class="L3"><span class="pln">      </span><span class="com">&lt;!--Sidebar content--&gt;</span></li><li class="L4"><span class="pln">    </span><span class="tag">&lt;/div&gt;</span></li><li class="L5"><span class="pln">    </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"span10"</span><span class="tag">&gt;</span></li><li class="L6"><span class="pln">      </span><span class="com">&lt;!--Body content--&gt;</span></li><li class="L7"><span class="pln">    </span><span class="tag">&lt;/div&gt;</span></li><li class="L8"><span class="pln">  </span><span class="tag">&lt;/div&gt;</span></li><li class="L9"><span class="tag">&lt;/div&gt;</span></li></ol></pre>
		</div>
    </div>
    
	 <div class="span12 wrap-group">
		<form action="" class="form-inline">
		<fieldset>
		<legend class="small">布局实例1</legend>
		<div class="title">系统管理<span class="prompt ml50">最多填写25个字符</span><span class="prompt_red ml5">*为必填项</span></div>
			<label for="subject">业务状态</label>
			<input type="text" name="subject" class="form-input" />
			<label for="select">Select组件</label>
			<select name="select" required>
				<option value="1">Value 1</option>
				<option value="2">Value 2</option>
				<option value="3">Value 3</option>
				<option value="4">Value 4</option>
			</select>
			<label for="select" class="ml5">业务状态:</label>
			<input name="radio" type="radio" value="1" checked />选择1
			<input name="radio" type="radio" value="2" />选项2
			</fieldset>
		</form>
	</div>
	
	<div class="span12 wrap-group">
		<form action="" class="form-horizontal">
		<fieldset>
		<legend>布局实例2</legend>
		<div class="control-group">
			<label class="control-label" for="subject">业务状态</label>
			<div class="control">
			<input type="text" name="subject" class="form-input" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="select">Select组件</label>
			<div class="control">
			<select name="select" required>
				<option value="1">Value 1</option>
				<option value="2">Value 2</option>
				<option value="3">Value 3</option>
				<option value="4">Value 4</option>
			</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="select" class="ml5">业务状态:</label>
			<div class="control">
			<input name="radio" type="radio" value="1" checked />选择1
			<input name="radio" type="radio" value="2" />选项2
			</div>
		</div>
		</fieldset>
		</form>
	</div>
	
	
</div>	
</body>
</html>

