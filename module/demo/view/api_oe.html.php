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
	<h2>mrp.production</h2>
	<form class="form-horizontal">    
	<table class="table table-bordered">
		<thead>
		  <tr>
			<th>模块</th>
			<th>方法名</th>
			<th>所属基类</th>
			<th>调用</th>
			<th>描述</th>
		  </tr>
		</thead>
		<tbody>
		  <tr>
		    <td>创建生产计划</td>
			<td><span class="helpe-inline">create</span></td>
			<td>Oe.class.php</td>
			<td>
				<p>require("../../lib/xmlrpc/xmlrpc.inc");<br />
				//创建一个生产订单<br />
				$xmlrpc_oe = new Oe();<br />
				$production_data = array(<br />
					'name'=>new xmlrpcval(iconv("UTF-8", "Gb2312", "Ems/0003"), "string"),<br />
					'product_id'=>new xmlrpcval('2', "int"),//产品id<br />
					'product_uom'=>new xmlrpcval('1', "int"),//产品数量，始终为1<br />
					'routing_id'=>new xmlrpcval('1',"int"),//工艺规程,始终为1<br />
					'bom_id'=>new xmlrpcval('1',"int")//产品bom_id<br />
				);<br />
				$xmlrpc_oe->create("mrp.production",$production_data);<br />
				</p>
		    </td>
			<td>
				<p>
				@param string $relation: OE模块对象名，如：res.partner<br />
				@param string $partner_data：操作数据对象
				</p>
			</td>
		  </tr>
		  
		  <tr>
		    <td>确认生产计划</td>
			<td><span class="helpe-inline">call_oe_func</span></td>
			<td>Oe.class.php</td>
			<td>
				<p>require("../../lib/xmlrpc/xmlrpc.inc");<br />
				//创建一个生产订单<br />
				$xmlrpc_oe = new Oe();<br />
				$xmlrpc_oe->call_oe_func("mrp.production","action_confirm",35);<br />
				</p>
		    </td>
			<td>
				<p>
				 @param string $relation: 数据对象，如：product.product<br />
	  @param array  $function: 调用方法<br />
	  @param string or array $ids: id 的数组<br />
				</p>
			</td>
		  </tr>

		</tbody>
	  </table>
	  <p>返回对象<br />
	  if ($resp->faultCode())<br />
            echo 'Error: '.$resp->faultString();<br />
        else<br />
            echo 'Order '.$resp->value()->scalarval().' confirm !';<br />
	</p>
	  <p>
      <a href="http://www.cnblogs.com/WeAreEpms/archive/2008/12/28/1364166.html" target="_blank">关于html元素的disabled,readonly 的详细分析</a>
      </p>
	  </form>
  </div>
	
	
	</div>
</body>
</html>

