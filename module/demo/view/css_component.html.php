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
<script src="/js/jquery-1.8.3.min.js"></script>
<script src="/js/bootstrap.js"></script>
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
			  <li><a href="#wrap">容器组件</a></li>
			  <li><a href="#forms">Tab组件</a></li>
			  <li><a href="#buttons">叠放式导航</a></li>
			  <li><a href="#buttons">导航列表</a></li>
			  <li><a href="#buttons">模块导航条</a></li>
			</ul>
		</div>
		
	</div>
	
	<h2>容器组件</h2>
	<div class="row-fluid">
		<h3>无背景-容器组件</h3>
		<p>用<code>&lt;div class="wrap-group"&gt;</code> 实现的简单的容器块布局</p>
		  <div class="wrap-group">
				<br /><br /><br /><br />
				容器内容区
				<br /><br /><br /><br />
		  </div>
		  <pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;body&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"wrap-group"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    ...</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;/div&gt;</span></li><li class="L4"><span class="tag">&lt;/body&gt;</span></li></ol></pre>	
	</div> 
	
	<div class="row-fluid">
		<h3>带背景-容器组件</h3>
		<p>用<code>&lt;div class="wrap-group-bg"&gt;</code> 实现的简单的容器块布局</p>
		  <div class="wrap-group-bg">
				<br /><br /><br /><br />
				容器内容区
				<br /><br /><br /><br />
		  </div>
		  <pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;body&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"wrap-group-bg"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    ...</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;/div&gt;</span></li><li class="L4"><span class="tag">&lt;/body&gt;</span></li></ol></pre>	
	</div> 
	
	<div class="row-fluid">
		<h3>渐变背景-容器组件</h3>
		<p>用<code>&lt;div class="wrap-group-gd"&gt;</code> 实现的简单的容器块布局</p>
		  <div class="wrap-group-gd">
				<br /><br /><br /><br />
				容器内容区
				<br /><br /><br /><br />
		  </div>
		  <pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;body&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"wrap-group-gd"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    ...</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;/div&gt;</span></li><li class="L4"><span class="tag">&lt;/body&gt;</span></li></ol></pre>	
	</div>
	
	<div class="row-fluid">
		<h3>纯色背景-容器组件</h3>
		<p>用<code>&lt;div class="wrap-blue"&gt;</code> 实现的简单的容器块布局</p>
		  <div class="wrap-blue">
				<br /><br /><br /><br />
				容器内容区
				<br /><br /><br /><br />
		  </div>
		  <pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;body&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"wrap-blue"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    ...</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;/div&gt;</span></li><li class="L4"><span class="tag">&lt;/body&gt;</span></li></ol></pre>	
	</div> 
	
	<div class="row-fluid">
		<h3>蓝色渐变-容器组件</h3>
		<p>用<code>&lt;div class="wrap-fix-blue"&gt;</code> 实现复杂容器布局</p>
		<div class="wrap-fix-blue">
			<div class="fix-blue-l"></div>
			<div class="fix-blue-m">
				<form class="form-horizontal">
				<fieldset>
					<div class="row-fluid">
					<div class="span6">
					<div class="control-group">
					<label for="input01" class="control-label">流水号：</label>
					<div class="controls">
					<input type="text" id="input01" class="input-small">
					</div>
					</div>
					<div class="control-group">
					<label for="input01" class="control-label">业务宗号：</label>
					<div class="controls">
					<input type="text" id="input01" class="input-small">
					</div>
					</div>
					</div>
					<div class="span6">
					<div class="control-group">
					<label for="input01" class="control-label">业务状态：</label>
					<div class="controls">
					<input type="text" id="input01" class="input-small">
					</div>
					</div>
					<div class="control-group">
					<label for="input01" class="control-label">上首宗号：</label>
					<div class="controls">
					<input type="text" id="input01" class="input-small">
					</div>
					</div>
					</div>
					</div>
				</fieldset>
			</form>
			</div>
			<div class="fix-blue-r"></div>
		</div>
		<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;body&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"wrap-fix-blue"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"fix-blue-l"</span><span class="tag">&gt;</span><span class="tag">&lt;/div&gt;</span></li><li class="L2"><span class="pln">    </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"fix-blue-m"</span><span class="tag">&gt;</span></li><li class="L3"><span class="pln">    ...</span></li><li class="L2"><span class="pln">    </span><span class="tag">&lt;/div&gt;</span></li><li class="L2"><span class="pln">    </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"fix-blue-r"</span><span class="tag">&gt;</span><span class="tag">&lt;/div&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;/div&gt;</span></li><li class="L0"><span class="tag">&lt;/body&gt;</span></li></ol></pre>	
	</div>
	
	<div class="row-fluid">
		<h3>Title-Content-容器组件</h3>
		<p>用<code>&lt;div class="wrap-sl"&gt;</code> 实现的简单的容器块布局</p>
		<div class="row-fluid">
		  <div class="span6">
			  <div class="wrap-sl">
					<div class="wrap-sl-header">
					<p><span class="label label-info">说明</span>板块标题</p>
					</div>
					<div class="wrap-sl-content">
					<br /><br /><br /><br />
					容器内容区
					<br /><br /><br /><br />
					</div>
			  </div>
		    <pre class="prettyprint linenums">&lt;div class=&quot;wrap-sl&quot;&gt;
  &lt;div class=&quot;wrap-sl-header&quot;&gt;
  &lt;p&gt;&lt;span class=&quot;label label-info&quot;&gt;说明&lt;/span&gt;板块标题&lt;/p&gt;
  &lt;/div&gt;
  &lt;div class=&quot;wrap-sl-content&quot;&gt;容器内容区&lt;/div&gt;<br />&lt;/div&gt;</pre>
			</div>
			
			<div class="span6">
			  <div class="wrap-sl">
					<div class="wrap-sl-header gray-blue">
					<p><span class="label label-info">说明</span>用<code>&lt;div class="wrap-sl-header gray-blue"&gt;</code>实现title背景颜色</p>
					</div>
					<div class="wrap-sl-content">
					<br /><br /><br /><br />
					容器内容区
					<br /><br /><br /><br />
					</div>
			  </div>
			<pre class="prettyprint linenums">&lt;div class=&quot;wrap-sl&quot;&gt;
  &lt;div class=&quot;wrap-sl-header gray-blue&quot;&gt;
  &lt;p&gt;&lt;span class=&quot;label label-info&quot;&gt;说明&lt;/span&gt;板块标题&lt;/p&gt;
  &lt;/div&gt;
  &lt;div class=&quot;wrap-sl-content&quot;&gt;容器内容区&lt;/div&gt;<br />&lt;/div&gt;</pre>
			</div>
		</div>
	</div> 
	
	<div class="row-fluid">
		<h3>Title-ThinkPad-容器组件</h3>
		<p>用<code>&lt;div class="wrap-thinkpad"&gt;</code> 实现的简单的容器块布局</p>
		<div class="row-fluid">
		  <div class="span6">
			  <div class="wrap-thinkpad">
				<div class="wrap-thinkpad-header"><span>工作信息</span></div>
				<div class="wrap-thinkpad-content">
					<ul id="leftcontent">
						<li>车辆类型：&nbsp;<label id="VEHICLETYPE"/></label></li>
						<li>车辆型号：&nbsp;<label id="MODELS" /></label></li>
						<li>车&nbsp;&nbsp;牌&nbsp;&nbsp;号：&nbsp;<label id="LPNO" /></label></label></li>
						<li>座&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;位：&nbsp;<label id="SEATS" /></label></li>
						<li>准载重量：&nbsp;<label id="DEADWEIGHT" /></label></li>
						<li>购买时间：&nbsp;<label id="BUYDATE" /></label></li>
						<li>车辆所属：&nbsp;<label id="BELONGS" /></label></li>
					</ul>
				</div>
			</div>
		    <pre class="prettyprint linenums">&lt;div class=&quot;wrap-thinkpad&quot;&gt;<br>
&lt;div class=&quot;wrap-thinkpad-header&quot;&gt;&lt;span&gt;工作信息&lt;/span&gt;&lt;/div&gt;<br>
&lt;div class=&quot;wrap-thinkpad-content&quot;&gt;<br>
&lt;ul id=&quot;leftcontent&quot;&gt;<br>
&lt;li&gt;车辆类型：&amp;nbsp;&lt;label id=&quot;VEHICLETYPE&quot;/&gt;&lt;/label&gt;&lt;/li&gt;<br>
&lt;li&gt;车辆型号：&amp;nbsp;&lt;label id=&quot;MODELS&quot; /&gt;&lt;/label&gt;&lt;/li&gt;<br>
&lt;li&gt;车&amp;nbsp;&amp;nbsp;牌&amp;nbsp;&amp;nbsp;号：&amp;nbsp;&lt;label id=&quot;LPNO&quot; /&gt;&lt;/label&gt;&lt;/label&gt;&lt;/li&gt;<br>
&lt;li&gt;座&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;位：&amp;nbsp;&lt;label id=&quot;SEATS&quot; /&gt;&lt;/label&gt;&lt;/li&gt;<br>
&lt;li&gt;准载重量：&amp;nbsp;&lt;label id=&quot;DEADWEIGHT&quot; /&gt;&lt;/label&gt;&lt;/li&gt;<br>
&lt;li&gt;购买时间：&amp;nbsp;&lt;label id=&quot;BUYDATE&quot; /&gt;&lt;/label&gt;&lt;/li&gt;<br>
&lt;li&gt;车辆所属：&amp;nbsp;&lt;label id=&quot;BELONGS&quot; /&gt;&lt;/label&gt;&lt;/li&gt;<br>
&lt;/ul&gt;<br>
&lt;/div&gt;<br>
&lt;/div&gt;</pre>
			</div>
			
			<div class="span6">
			  <div class="module-logo">
				<div class="module-img" ><img src="/images/app_icons/@crs.png" width="64"></div>
				<div class="module-title"><h3>模块名称</h3></div>
			  </div>
		    <pre class="prettyprint linenums">&lt;div class=&quot;module-logo&quot;&gt;<br>
&lt;div class=&quot;module-img&quot; &gt;&lt;img src=&quot;/images/app_icons/@crs.png&quot; width=&quot;64&quot;&gt;&lt;/div&gt;<br>
&lt;div class=&quot;module-title&quot;&gt;&lt;h3&gt;模块名称&lt;/h3&gt;&lt;/div&gt;<br>
&lt;/div&gt;</pre>
			</div>
			
			
		</div>
	</div>
	
	<h2>标签页切换导航</h2>
	<pre>我们使用一个简单的插件切换标签页对应的内容,提供了四种样式的标签页：置顶(默认)，居右，置底，居左。 </pre>
	<div class="row-fluid">
		<div class="span6">
			<div style="margin-bottom: 9px;" class="tabbable">
				<ul class="nav nav-tabs">
				  <li class="active"><a data-toggle="tab" href="#1">tab 1</a></li>
				  <li class=""><a data-toggle="tab" href="#2">tab 2</a></li>
				  <li class=""><a data-toggle="tab" href="#3">tab 3</a></li>
				</ul>
				<div class="tab-content">
				  <div id="1" class="tab-pane active">
					<p>这里是tab1的内容区域</p>
				  </div>
				  <div id="2" class="tab-pane">
					<p>这里是tab2的内容区域</p>
				  </div>
				  <div id="3" class="tab-pane">
					<p>这里是tab3的内容区域</p>
				  </div>
				</div>
		    </div>
			<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tabbable"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"nav nav-tabs"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"active"</span><span class="tag">&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#1"</span><span class="pln"> </span><span class="atn">data-toggle</span><span class="pun">=</span><span class="atv">"tab"</span><span class="tag">&gt;</span><span class="pln">tab 1</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L3"><span class="pln">    </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#2"</span><span class="pln"> </span><span class="atn">data-toggle</span><span class="pun">=</span><span class="atv">"tab"</span><span class="tag">&gt;</span><span class="pln">tab 2</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L4"><span class="pln">  </span><span class="tag">&lt;/ul&gt;</span></li><li class="L5"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tab-content"</span><span class="tag">&gt;</span></li><li class="L6"><span class="pln">    </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tab-pane active"</span><span class="pln"> </span><span class="atn">id</span><span class="pun">=</span><span class="atv">"1"</span><span class="tag">&gt;</span></li><li class="L7"><span class="pln">      </span><span class="tag">&lt;p&gt;</span><span class="pln">这里是tab 1的内容区域.</span><span class="tag">&lt;/p&gt;</span></li><li class="L8"><span class="pln">    </span><span class="tag">&lt;/div&gt;</span></li><li class="L9"><span class="pln">    </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tab-pane"</span><span class="pln"> </span><span class="atn">id</span><span class="pun">=</span><span class="atv">"2"</span><span class="tag">&gt;</span></li><li class="L0"><span class="pln">      </span><span class="tag">&lt;p&gt;</span><span class="pln">这里是tab 2的内容区域.</span><span class="tag">&lt;/p&gt;</span></li><li class="L1"><span class="pln">    </span><span class="tag">&lt;/div&gt;</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;/div&gt;</span></li><li class="L3"><span class="tag">&lt;/div&gt;</span></li></ol></pre>
		</div>
	  <div class="span6">
			<div style="margin-bottom: 9px;" class="tabbable tabs-below">
				<div class="tab-content">
				  <div id="1" class="tab-pane active">
					<p>这里是tab1的内容区域</p>
				  </div>
				  <div id="2" class="tab-pane">
					<p>这里是tab3的内容区域</p>
				  </div>
				  <div id="3" class="tab-pane">
					<p>这里是tab3的内容区域</p>
				  </div>
				</div>
				<ul class="nav nav-tabs">
				  <li class="active"><a data-toggle="tab" href="#1">tab 1</a></li>
				  <li class=""><a data-toggle="tab" href="#2">tab 2</a></li>
				  <li class=""><a data-toggle="tab" href="#3">tab 3</a></li>
				</ul>
		    </div>
		  <pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tabbable tabs-below"</span><span class="tag">&gt;</span></li><li class="L5"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tab-content"</span><span class="tag">&gt;</span></li><li class="L6"><span class="pln">    </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tab-pane active"</span><span class="pln"> </span><span class="atn">id</span><span class="pun">=</span><span class="atv">"1"</span><span class="tag">&gt;</span></li><li class="L7"><span class="pln">      </span><span class="tag">&lt;p&gt;</span><span class="pln">这里是tab 1的内容区域.</span><span class="tag">&lt;/p&gt;</span></li><li class="L8"><span class="pln">    </span><span class="tag">&lt;/div&gt;</span></li><li class="L9"><span class="pln">    </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tab-pane"</span><span class="pln"> </span><span class="atn">id</span><span class="pun">=</span><span class="atv">"2"</span><span class="tag">&gt;</span></li><li class="L0"><span class="pln">      </span><span class="tag">&lt;p&gt;</span><span class="pln">这里是tab 2的内容区域.</span><span class="tag">&lt;/p&gt;</span></li><li class="L1"><span class="pln">    </span><span class="tag">&lt;/div&gt;</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;/div&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">&quot;nav nav-tabs&quot;</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">&quot;active&quot;</span><span class="tag">&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">&quot;#1&quot;</span><span class="pln"> </span><span class="atn">data-toggle</span><span class="pun">=</span><span class="atv">&quot;tab&quot;</span><span class="tag">&gt;</span><span class="pln">tab 1</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L3"><span class="pln">    </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">&quot;#2&quot;</span><span class="pln"> </span><span class="atn">data-toggle</span><span class="pun">=</span><span class="atv">&quot;tab&quot;</span><span class="tag">&gt;</span><span class="pln">tab 2</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L4"><span class="pln">  </span><span class="tag">&lt;/ul&gt;</span></li><li class="L3"><span class="tag">&lt;/div&gt;</span></li></ol></pre>
		</div>
		<!-- span6 end -->
	</div>
	
	<div class="row-fluid">
		<div class="span6">
			<div style="margin-bottom: 9px;" class="tabbable tabs-left">
				<ul class="nav nav-tabs">
				  <li class="active"><a data-toggle="tab" href="#1">tab 1</a></li>
				  <li class=""><a data-toggle="tab" href="#2">tab 2</a></li>
				  <li class=""><a data-toggle="tab" href="#3">tab 3</a></li>
				</ul>
				<div class="tab-content">
				  <div id="1" class="tab-pane active">
					<p>这里是tab1的内容区域</p>
				  </div>
				  <div id="2" class="tab-pane">
					<p>这里是tab3的内容区域</p>
				  </div>
				  <div id="3" class="tab-pane">
					<p>这里是tab3的内容区域</p>
				  </div>
				</div>
		    </div>
			<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tabbable tabs-left"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"nav nav-tabs"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"active"</span><span class="tag">&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#1"</span><span class="pln"> </span><span class="atn">data-toggle</span><span class="pun">=</span><span class="atv">"tab"</span><span class="tag">&gt;</span><span class="pln">tab 1</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L3"><span class="pln">    </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#2"</span><span class="pln"> </span><span class="atn">data-toggle</span><span class="pun">=</span><span class="atv">"tab"</span><span class="tag">&gt;</span><span class="pln">tab 2</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L4"><span class="pln">  </span><span class="tag">&lt;/ul&gt;</span></li><li class="L5"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tab-content"</span><span class="tag">&gt;</span></li><li class="L6"><span class="pln">    </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tab-pane active"</span><span class="pln"> </span><span class="atn">id</span><span class="pun">=</span><span class="atv">"1"</span><span class="tag">&gt;</span></li><li class="L7"><span class="pln">      </span><span class="tag">&lt;p&gt;</span><span class="pln">这里是tab 1的内容区域.</span><span class="tag">&lt;/p&gt;</span></li><li class="L8"><span class="pln">    </span><span class="tag">&lt;/div&gt;</span></li><li class="L9"><span class="pln">    </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tab-pane"</span><span class="pln"> </span><span class="atn">id</span><span class="pun">=</span><span class="atv">"2"</span><span class="tag">&gt;</span></li><li class="L0"><span class="pln">      </span><span class="tag">&lt;p&gt;</span><span class="pln">这里是tab 2的内容区域.</span><span class="tag">&lt;/p&gt;</span></li><li class="L1"><span class="pln">    </span><span class="tag">&lt;/div&gt;</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;/div&gt;</span></li><li class="L3"><span class="tag">&lt;/div&gt;</span></li></ol></pre>
		</div>
	  <div class="span6">
			<div style="margin-bottom: 9px;" class="tabbable tabs-right">
				<div class="tab-content">
				  <div id="1" class="tab-pane active">
					<p>这里是tab1的内容区域</p>
				  </div>
				  <div id="2" class="tab-pane">
					<p>这里是tab3的内容区域</p>
				  </div>
				  <div id="3" class="tab-pane">
					<p>这里是tab3的内容区域</p>

				  </div>
				</div>
				<ul class="nav nav-tabs">
				  <li class="active"><a data-toggle="tab" href="#1">tab 1</a></li>
				  <li class=""><a data-toggle="tab" href="#2">tab 2</a></li>
				  <li class=""><a data-toggle="tab" href="#3">tab 3</a></li>
				</ul>
		    </div>
		  <pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tabbable tabs-left"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"nav nav-tabs"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"active"</span><span class="tag">&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#1"</span><span class="pln"> </span><span class="atn">data-toggle</span><span class="pun">=</span><span class="atv">"tab"</span><span class="tag">&gt;</span><span class="pln">tab 1</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L3"><span class="pln">    </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#2"</span><span class="pln"> </span><span class="atn">data-toggle</span><span class="pun">=</span><span class="atv">"tab"</span><span class="tag">&gt;</span><span class="pln">tab 2</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L4"><span class="pln">  </span><span class="tag">&lt;/ul&gt;</span></li><li class="L5"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tab-content"</span><span class="tag">&gt;</span></li><li class="L6"><span class="pln">    </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tab-pane active"</span><span class="pln"> </span><span class="atn">id</span><span class="pun">=</span><span class="atv">"1"</span><span class="tag">&gt;</span></li><li class="L7"><span class="pln">      </span><span class="tag">&lt;p&gt;</span><span class="pln">这里是tab 1的内容区域.</span><span class="tag">&lt;/p&gt;</span></li><li class="L8"><span class="pln">    </span><span class="tag">&lt;/div&gt;</span></li><li class="L9"><span class="pln">    </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tab-pane"</span><span class="pln"> </span><span class="atn">id</span><span class="pun">=</span><span class="atv">"2"</span><span class="tag">&gt;</span></li><li class="L0"><span class="pln">      </span><span class="tag">&lt;p&gt;</span><span class="pln">这里是tab 2的内容区域.</span><span class="tag">&lt;/p&gt;</span></li><li class="L1"><span class="pln">    </span><span class="tag">&lt;/div&gt;</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;/div&gt;</span></li><li class="L3"><span class="tag">&lt;/div&gt;</span></li></ol></pre>
		</div>
		<!-- span6 end -->
		
	</div>
	
	<h2>叠放式导航</h2>
	<div class="row">
		<div class="span4">
		  <h3>如何叠放</h3>
		  <p>默认情况下标签和胶囊链接是水平排放的，使用 <code>.nav-stacked</code> 就可以将其变成竖直叠放。</p>
		</div>
		<div class="span4">
		  <h3>叠放式标签</h3>
		  <ul class="nav nav-tabs nav-stacked">
			<li class="active"><a href="#">首页</a></li>
			<li><a href="#">介绍</a></li>
			<li><a href="#">消息</a></li>
		  </ul>
	<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"nav nav-tabs nav-stacked"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  ...</span></li><li class="L2"><span class="tag">&lt;/ul&gt;</span></li></ol></pre>
		</div>
		<div class="span4">
		  <h3>叠放式胶囊链接</h3>
		  <div class="wrap-blue">
		  <ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="#"><i class="icon-book icon-white"></i> 首页</a></li>
			<li><a href="#">介绍</a></li>
			<li><a href="#">消息</a></li>
		  </ul>
		  </div>
	<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"nav nav-pills nav-stacked"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  ...</span></li><li class="L2"><span class="tag">&lt;/ul&gt;</span></li></ol></pre>
		</div>
	</div>
	
	<h2>导航列表</h2>
	<div class="row">
		<div class="span4">
		  <h4>使用图标</h4>
		  <p>
		在导航列表中使用图标很容易。只须添加带有图标类的 <code>&lt;i&gt;</code> 标签即可。
		  </p>
		  <h4>水平间隔</h4>
		  <p>
		应用 <code>.divider</code> 的空列表项会显示为一个水平间隔，如下：
		  </p>
	<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"nav nav-list"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  ...</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"divider"</span><span class="tag">&gt;&lt;/li&gt;</span></li><li class="L3"><span class="pln">  ...</span></li><li class="L4"><span class="tag">&lt;/ul&gt;</span></li></ol></pre>
		</div>
		<div class="span4">
		  <h3>导航列表例子</h3>
		  <p>对存放一组链接的列表使用 <code>class="nav nav-list"</code> :</p>
		  <div style="padding: 8px 0;" class="well">
			<ul class="nav nav-list">
			  <li class="nav-header">列表头</li>
			  <li class="active"><a href="#">首页</a></li>
			  <li><a href="#">类库</a></li>
			  <li><a href="#">应用</a></li>
			  <li class="nav-header">另一个列表头</li>
			  <li><a href="#">介绍</a></li>
			  <li><a href="#">设置</a></li>
			  <li class="divider"></li>
			  <li><a href="#">帮助</a></li>
			</ul>
		  </div> <!-- /well -->
	<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"nav nav-list"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"nav-header"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    列表头</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;/li&gt;</span></li><li class="L4"><span class="pln">  </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"active"</span><span class="tag">&gt;</span></li><li class="L5"><span class="pln">    </span><span class="tag">&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">首页</span><span class="tag">&lt;/a&gt;</span></li><li class="L6"><span class="pln">  </span><span class="tag">&lt;/li&gt;</span></li><li class="L7"><span class="pln">  </span><span class="tag">&lt;li&gt;</span></li><li class="L8"><span class="pln">    </span><span class="tag">&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">类库</span><span class="tag">&lt;/a&gt;</span></li><li class="L9"><span class="pln">  </span><span class="tag">&lt;/li&gt;</span></li><li class="L0"><span class="pln">  ...</span></li><li class="L1"><span class="tag">&lt;/ul&gt;</span></li></ol></pre>
		</div>
		<div class="span4">
		  <h3>使用图标的例子</h3>
		  <p>
		同样的例子，使用 <code>&lt;i&gt;</code> 标签显示图标。
		  </p>
		  <div style="padding: 8px 0;" class="well">
			<ul class="nav nav-list">
			  <li class="nav-header">列表头</li>
			  <li class="active"><a href="#"><i class="icon-white icon-home"></i> 首页</a></li>
			  <li><a href="#"><i class="icon-book"></i> 类库</a></li>
			  <li><a href="#"><i class="icon-pencil"></i> 应用</a></li>
			  <li class="nav-header">另一个列表头</li>
			  <li><a href="#"><i class="icon-user"></i> 介绍</a></li>
			  <li><a href="#"><i class="icon-cog"></i> 设置</a></li>
			  <li class="divider"></li>
			  <li><a href="#"><i class="icon-flag"></i> 帮助</a></li>
			</ul>
		  </div> <!-- /well -->
	<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"nav nav-list"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  ...</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;li&gt;</span></li><li class="L3"><span class="pln">    </span><span class="tag">&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span></li><li class="L4"><span class="pln">      </span><span class="tag">&lt;i</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"icon-book"</span><span class="tag">&gt;&lt;/i&gt;</span></li><li class="L5"><span class="pln">      类库</span></li><li class="L6"><span class="pln">    </span><span class="tag">&lt;/a&gt;</span></li><li class="L7"><span class="pln">  </span><span class="tag">&lt;/li&gt;</span></li><li class="L8"><span class="pln">  ...</span></li><li class="L9"><span class="tag">&lt;/ul&gt;</span></li></ol></pre>
		</div>
	</div>
	
	<h2>模块导航条</h2>
	<div class="navbar">
		<div class="navbar-inner">
		  <div class="container">
			<a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			</a>
			<a href="#" class="brand">初始登记</a>
			<div class="nav-collapse">
			  <ul class="nav">
				<li class="active"><a href="#">首页</a></li>
				<li><a href="#">链接</a></li>
				<li><a href="#">链接</a></li>
				<li><a href="#">链接</a></li>
				<li class="dropdown">
				  <a data-toggle="dropdown" class="dropdown-toggle" href="#">下拉 <b class="caret"></b></a>
				  <ul class="dropdown-menu">
					<li><a href="#">动作</a></li>
					<li><a href="#">另一个动作</a></li>
					<li><a href="#">其他动作</a></li>
					<li class="divider"></li>
					<li class="nav-header">导航头</li>
					<li><a href="#">被间隔的链接</a></li>
					<li><a href="#">另一个链接</a></li>
				  </ul>
				</li>
			  </ul>
			  <form action="" class="navbar-search pull-left">
				<input type="text" placeholder="搜索" class="search-query span2">
			  </form>
			  <ul class="nav pull-right">
				<li><a href="#">链接</a></li>
				<li class="divider-vertical"></li>
				<li class="dropdown">
				  <a data-toggle="dropdown" class="dropdown-toggle" href="#">下拉 <b class="caret"></b></a>
				  <ul class="dropdown-menu">
					<li><a href="#">动作</a></li>
					<li><a href="#">另一个动作</a></li>
					<li><a href="#">其他动作</a></li>
					<li class="divider"></li>
					<li class="nav-header">导航头</li>
					<li><a href="#">被间隔的链接</a></li>
					<li><a href="#">另一个链接</a></li>
				  </ul>
				</li>
			  </ul>
			</div><!-- /.nav-collapse -->
		  </div>
		</div><!-- /navbar-inner -->
	</div>
	<div class="row-fluid">
		<div class="span8">
			<h3>导航条基本框架</h3>
			<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"navbar"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"navbar-inner"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"container"</span><span class="tag">&gt;</span></li><li class="L3"><span class="pln">      ...</span></li><li class="L4"><span class="pln">    </span><span class="tag">&lt;/div&gt;</span></li><li class="L5"><span class="pln">  </span><span class="tag">&lt;/div&gt;</span></li><li class="L6"><span class="tag">&lt;/div&gt;</span></li></ol></pre>
			
			<h3>固定导航条</h3>
			<p>只要在最外层的div上应用 <code>.navbar-fixed-top</code> ，就可以将导航条固定到顶部或是底部。</p>
			<div class="row">
				<div class="span4">
		<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"navbar navbar-fixed-top"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  ...</span></li><li class="L2"><span class="tag">&lt;/div&gt;</span></li></ol></pre>
				</div><!--/span-->
				<div class="span4">
		<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"navbar navbar-fixed-bottom"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  ...</span></li><li class="L2"><span class="tag">&lt;/div&gt;</span></li></ol></pre>
				</div><!--/span-->
			</div>
		</div>
		<div class="span4">
			<h3>导航链接</h3>
			<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"nav"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"active"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    </span><span class="tag">&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">首页</span><span class="tag">&lt;/a&gt;</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;/li&gt;</span></li><li class="L4"><span class="pln">  </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">链接</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L5"><span class="pln">  </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span><span class="pln">链接</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L6"><span class="tag">&lt;/ul&gt;</span></li></ol></pre>
			
			<p>将应用 <code>.divider-vertical</code> 的空列表项插入到两个链接项之间，就会得到分隔条：</p>
			<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"nav"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  ...</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"divider-vertical"</span><span class="tag">&gt;&lt;/li&gt;</span></li><li class="L3"><span class="pln">  ...</span></li><li class="L4"><span class="tag">&lt;/ul&gt;</span></li></ol></pre>
		</div>
	</div>
	
  	<h2>下拉按钮</h2>
	<div class="row">
    <div class="span4">
      <p>下拉菜单中的按钮嵌套于 <code>.btn-group</code> 内。</p>
      <div style="margin-top: 18px;" class="btn-toolbar">
        <div class="btn-group">
          <button data-toggle="dropdown" class="btn dropdown-toggle">动作 <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href="#">动作</a></li>
            <li><a href="#">其他动作</a></li>
            <li><a href="#">其他</a></li>
            <li class="divider"></li>
            <li><a href="#">被间隔的链接</a></li>
          </ul>
        </div><!-- /btn-group -->
        <div class="btn-group">
          <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">动作 <span class="caret"></span></button>
          <ul class="dropdown-menu">
	    	<li><a href="#">动作</a></li>
            <li><a href="#">其他动作</a></li>
            <li><a href="#">其他</a></li>
            <li class="divider"></li>
            <li><a href="#">被间隔的链接</a></li>
          </ul>
        </div><!-- /btn-group -->
        <div class="btn-group">
          <button data-toggle="dropdown" class="btn btn-danger dropdown-toggle">危险 <span class="caret"></span></button>
          <ul class="dropdown-menu">
	    <li><a href="#">动作</a></li>
            <li><a href="#">其他动作</a></li>
            <li><a href="#">其他</a></li>
            <li class="divider"></li>
            <li><a href="#">被间隔的链接</a></li>
          </ul>
        </div><!-- /btn-group -->
      </div>
      <div class="btn-toolbar">
        <div class="btn-group">
          <button data-toggle="dropdown" class="btn btn-warning dropdown-toggle">警告 <span class="caret"></span></button>
          <ul class="dropdown-menu">
	    <li><a href="#">动作</a></li>
            <li><a href="#">其他动作</a></li>
            <li><a href="#">其他</a></li>
            <li class="divider"></li>
            <li><a href="#">被间隔的链接</a></li>
          </ul>
        </div><!-- /btn-group -->
        <div class="btn-group">
          <button data-toggle="dropdown" class="btn btn-success dropdown-toggle">成功 <span class="caret"></span></button>
          <ul class="dropdown-menu">
	    <li><a href="#">动作</a></li>
            <li><a href="#">其他动作</a></li>
            <li><a href="#">其他</a></li>
            <li class="divider"></li>
            <li><a href="#">被间隔的链接</a></li>
          </ul>
        </div><!-- /btn-group -->
        <div class="btn-group">
          <button data-toggle="dropdown" class="btn btn-info dropdown-toggle">信息 <span class="caret"></span></button>
          <ul class="dropdown-menu">
	    <li><a href="#">动作</a></li>
            <li><a href="#">其他动作</a></li>
            <li><a href="#">其他</a></li>
            <li class="divider"></li>
            <li><a href="#">被间隔的链接</a></li>
          </ul>
        </div><!-- /btn-group -->
        <div class="btn-group">
          <button data-toggle="dropdown" class="btn btn-inverse dropdown-toggle">操作 <span class="caret"></span></button>
          <ul class="dropdown-menu">
	    	<li><a href="#">动作</a></li>
            <li><a href="#">其他动作</a></li>
            <li><a href="#">其他</a></li>
            <li class="divider"></li>
            <li><a href="#">被间隔的链接</a></li>
          </ul>
        </div><!-- /btn-group -->
      </div><!-- /btn-toolbar -->
    </div>
    <div class="span8">
      <h3>标记例子</h3>
      <p>
	和按钮组类似，下拉按钮仍使用按钮标记，并用到少量其他标记以增强显示效果，同时支持Bootstrap的下拉jquery插件。
      </p>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"btn-group"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;a</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"btn dropdown-toggle"</span><span class="pln"> </span><span class="atn">data-toggle</span><span class="pun">=</span><span class="atv">"dropdown"</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    Action</span></li><li class="L3"><span class="pln">    </span><span class="tag">&lt;span</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"caret"</span><span class="tag">&gt;&lt;/span&gt;</span></li><li class="L4"><span class="pln">  </span><span class="tag">&lt;/a&gt;</span></li><li class="L5"><span class="pln">  </span><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"dropdown-menu"</span><span class="tag">&gt;</span><ol><li>&lt;li&gt;&lt;a href=&quot;#&quot;&gt;动作&lt;/a&gt;&lt;/li&gt;<br />&lt;li&gt;&lt;a href=&quot;#&quot;&gt;其他动作&lt;/a&gt;&lt;/li&gt;<br />&lt;li&gt;&lt;a href=&quot;#&quot;&gt;其他&lt;/a&gt;&lt;/li&gt;<br />&lt;li class=&quot;divider&quot;&gt;&lt;/li&gt;<br />&lt;li&gt;&lt;a href=&quot;#&quot;&gt;被间隔的链接&lt;/a&gt;&lt;/li&gt;</li></ol></li><li class="L7"><span class="pln">  </span><span class="tag">&lt;/ul&gt;</span></li><li class="L8"><span class="tag">&lt;/div&gt;</span></li></ol></pre>
    </div>
  </div>
</div>	
</body>
</html>

