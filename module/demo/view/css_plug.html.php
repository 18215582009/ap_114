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
<script src="/js/plugins/candor-tab.js" ></script>
<script src="/js/plugins/candor-dropdown.js" ></script>
<style>
body{background:none;}
</style>
<body>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="subnav">
			<ul class="nav nav-pills">
			  <li><a href="/js/plugins/artDialog/index.html">artDialog 插件</a></li>
			  <li><a href="#tab">tab 插件</a></li>
			  <li><a href="#dropdown">dropdown 插件</a></li>
			  <li><a href="#table">table 表格插件</a></li>
			</ul>
		</div>
		
	</div>


	<h2>tab 插件</h2><a id="tab"></a>
	<div class="row">
        
        <div class="span9 columns">
          <h2>标签页例子</h2>
          <p>点击下面的标签(包括下拉菜单项)切换显示不同面板中的内容。</p>
          <ul class="nav nav-tabs" id="tab">
            <li class="active"><a data-toggle="tab" href="#home">首页</a></li>
            <li class=""><a data-toggle="tab" href="#profile">介绍</a></li>
            <li class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">下拉 <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a data-toggle="tab" href="#dropdown1">下拉1</a></li>
                <li><a data-toggle="tab" href="#dropdown2">下拉2</a></li>
              </ul>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div id="home" class="tab-pane fade active in">
              <p>首页...</p>
            </div>
            <div id="profile" class="tab-pane fade">
              <p>介绍...</p>
            </div>
            <div id="dropdown1" class="tab-pane fade">
              <p>下拉1...</p>
            </div>
            <div id="dropdown2" class="tab-pane fade">
              <p>下拉2...</p>
            </div>
          </div>
          <hr>
          <h2>使用candor-tab.js</h2>
          <p>通过javascript启动可切换的标签页：</p>
          <pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="pln">$</span><span class="pun">(</span><span class="str">'#myTab'</span><span class="pun">).</span><span class="pln">tab</span><span class="pun">(</span><span class="str">'show'</span><span class="pun">)</span></li></ol></pre>
          <h3>标记</h3>
          <p>在某个元素上设置 <code>data-toggle="tab"</code> 或 <code>data-toggle="pill"</code> 而无须编写javascript，就可以激活标签页</p>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"nav nav-tabs"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#home"</span><span class="pln"> </span><span class="atn">data-toggle</span><span class="pun">=</span><span class="atv">"tab"</span><span class="tag">&gt;</span><span class="pln">首页</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#profile"</span><span class="pln"> </span><span class="atn">data-toggle</span><span class="pun">=</span><span class="atv">"tab"</span><span class="tag">&gt;</span><span class="pln">介绍</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#messages"</span><span class="pln"> </span><span class="atn">data-toggle</span><span class="pun">=</span><span class="atv">"tab"</span><span class="tag">&gt;</span><span class="pln">消息</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L4"><span class="pln">  </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#settings"</span><span class="pln"> </span><span class="atn">data-toggle</span><span class="pun">=</span><span class="atv">"tab"</span><span class="tag">&gt;</span><span class="pln">设置</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L5"><span class="tag">&lt;/ul&gt;</span></li></ol></pre>
          <h3>方法</h3>
          <h4>$().tab</h4>
          <p>
	    激活一个标签页元素和内容容器。标签页应该含有 <code>data-target='#id'</code> 或 <code>href='#id'</code> 属性以指向dom中的某个容器节点。
          </p>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;ul</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"nav nav-tabs"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;li</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"active"</span><span class="tag">&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#home"</span><span class="tag">&gt;</span><span class="pln">首页</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#profile"</span><span class="tag">&gt;</span><span class="pln">介绍</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#messages"</span><span class="tag">&gt;</span><span class="pln">消息</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L4"><span class="pln">  </span><span class="tag">&lt;li&gt;&lt;a</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"#settings"</span><span class="tag">&gt;</span><span class="pln">设置</span><span class="tag">&lt;/a&gt;&lt;/li&gt;</span></li><li class="L5"><span class="tag">&lt;/ul&gt;</span></li><li class="L6"><span class="pln">&nbsp;</span></li><li class="L7"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tab-content"</span><span class="tag">&gt;</span></li><li class="L8"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tab-pane active"</span><span class="pln"> </span><span class="atn">id</span><span class="pun">=</span><span class="atv">"home"</span><span class="tag">&gt;</span><span class="pln">...</span><span class="tag">&lt;/div&gt;</span></li><li class="L9"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tab-pane"</span><span class="pln"> </span><span class="atn">id</span><span class="pun">=</span><span class="atv">"profile"</span><span class="tag">&gt;</span><span class="pln">...</span><span class="tag">&lt;/div&gt;</span></li><li class="L0"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tab-pane"</span><span class="pln"> </span><span class="atn">id</span><span class="pun">=</span><span class="atv">"messages"</span><span class="tag">&gt;</span><span class="pln">...</span><span class="tag">&lt;/div&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"tab-pane"</span><span class="pln"> </span><span class="atn">id</span><span class="pun">=</span><span class="atv">"settings"</span><span class="tag">&gt;</span><span class="pln">...</span><span class="tag">&lt;/div&gt;</span></li><li class="L2"><span class="tag">&lt;/div&gt;</span></li><li class="L3"><span class="pln">&nbsp;</span></li><li class="L4"><span class="tag">&lt;script&gt;</span></li><li class="L5"><span class="pln">  $</span><span class="pun">(</span><span class="kwd">function</span><span class="pln"> </span><span class="pun">()</span><span class="pln"> </span><span class="pun">{</span></li><li class="L6"><span class="pln">    $</span><span class="pun">(</span><span class="str">'.tabs a:last'</span><span class="pun">).</span><span class="pln">tab</span><span class="pun">(</span><span class="str">'show'</span><span class="pun">)</span></li><li class="L7"><span class="pln">  </span><span class="pun">})</span></li><li class="L8"><span class="tag">&lt;/script&gt;</span></li></ol></pre>
          <h3>事件</h3>
          <table class="table table-bordered table-striped">
            <thead>
             <tr>
               <th style="width: 150px;">事件</th>
               <th>描述</th>
             </tr>
            </thead>
            <tbody>
             <tr>
               <td>show</td>
               <td>
		 该事件在标签开始展示时（尚未渲染完之前）触发。
		  <code>event.target</code>  指向要激活的标签， <code>event.relatedTarget</code> 提向之前已激活的标签（如果有的话）。
	       </td>
            </tr>
            <tr>
               <td>shown</td>
               <td>
		 该事件在标签已经呈现后（已渲染完成）触发。
		  <code>event.target</code>  指向要激活的标签， <code>event.relatedTarget</code> 提向之前已激活的标签（如果有的话）。
	       </td>
             </tr>
            </tbody>
          </table>

          <pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="pln">$</span><span class="pun">(</span><span class="str">'a[data-toggle="tab"]'</span><span class="pun">).</span><span class="pln">on</span><span class="pun">(</span><span class="str">'shown'</span><span class="pun">,</span><span class="pln"> </span><span class="kwd">function</span><span class="pln"> </span><span class="pun">(</span><span class="pln">e</span><span class="pun">)</span><span class="pln"> </span><span class="pun">{</span></li><li class="L1"><span class="pln">  e</span><span class="pun">.</span><span class="pln">target </span><span class="com">// activated tab</span></li><li class="L2"><span class="pln">  e</span><span class="pun">.</span><span class="pln">relatedTarget </span><span class="com">// previous tab</span></li><li class="L3"><span class="pun">})</span></li></ol></pre>
       </div>
      </div>
	
	<h2>dropdown 插件</h2><a id="dropdown"></a>
	<div class="row">
		<div class="span9">
			<p>点击下面的导航栏链接和胶囊链接以测试下拉项。</p>
			<ul class="nav nav-pills">
				<li class="active"><a href="#">规则的链接</a></li>
				<li class="dropdown">
				  <a href="#" data-toggle="dropdown" class="dropdown-toggle">下拉 <b class="caret"></b></a>
				  <ul class="dropdown-menu">
					<li><a href="#">动作1</a></li>
					<li><a href="#">另一个动作</a></li>
					<li><a href="#">其他</a></li>
					<li class="divider"></li>
					<li><a href="#">另一个链接</a></li>
				  </ul>
				</li>
				<li class="dropdown">
				  <a href="#" data-toggle="dropdown" class="dropdown-toggle">下拉 <b class="caret"></b></a>
				  <ul class="dropdown-menu">
					<li><a href="#">动作2</a></li>
					<li><a href="#">另一个动作</a></li>
					<li><a href="#">其他</a></li>
					<li class="divider"></li>
					<li><a href="#">另一个链接</a></li>
				  </ul>
				</li>
				<li class="dropdown">
				  <a href="#" data-toggle="dropdown" class="dropdown-toggle">下拉 <b class="caret"></b></a>
				  <ul class="dropdown-menu" id="menu3">
					<li><a href="#">动作</a></li>
					<li><a href="#">另一个动作</a></li>
					<li><a href="#">其他</a></li>
					<li class="divider"></li>
					<li><a href="#">另一个链接</a></li>
				  </ul>
				</li>
			  </ul>
			<h2>使用bootstrap-dropdown.js</h2>
			<p>通过javascript调用下拉项：</p>
			<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="pln">$</span><span class="pun">(</span><span class="str">'.dropdown-toggle'</span><span class="pun">).</span><span class="pln">dropdown</span><span class="pun">()</span></li></ol></pre>
			<p>包含bootstrap-dropdown.js，然后设置 <code>data-toggle="dropdown"</code> 可以为任何元素添加并激活下拉项</p>
			
			<h3>方法</h3>
			<h4>$().dropdown()</h4>
			<p>用于激活某个导航条/标签页导航栏下的菜单</p>
		</div>
	</div>
</div>	
</body>
</html>

