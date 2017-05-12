<?php
/**
 * Html模板文件
 *
 * @copyright   Copyright: 2012
 * @author      LuoDong<751450467@qq.com>
 * @package     CandorPHP
 * @version     : index.html.php,v 1.4 2012/06/16 21:54:23 ld Exp $
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $header; ?></title>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/cdrstyle.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/style.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/page.css';?>' type='text/css' media='screen' />

<script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/js/plugins/artDialog/artDialog.source.js?skin=default" type="text/javascript"></script>
<script src="/js/plugins/artDialog/plugins/iframeTools.js" type="text/javascript"></script>
<!-- *加载等待 js -->
<script src="/js/candor.common.js" type="text/javascript"></script>
</head>
<style>
#left_work .l_module{height:auto;width:270px; margin:8px 0 0 10px;float:left}
#left_work .l_search{width:270px; margin-top:20px;position:relative}
#left_work .l_menu{width:269px; margin-top:10px;background:#E7F5FF;border-right:1px solid #FFF;border-top:1px solid #fff;position:relative;}
#left_work .l_menu ul{padding:10px 20px 10px 30px;}
#left_work .l_menu li{border-bottom:1px dotted #919BD9; line-height:27px;text-align:center;color:#082D7E;}
#left_work .l_menu li.l_on{background:#66A0DF;border:1px solid #4A86C5;color:#fff;position:relative;}
.gap{border-left: 1px solid #eee;
    border-right: 1px solid #ccc;
    float: left;
    height: 14px;
    margin-top: 11px;
    overflow: hidden;
    width: 0;}
</style>
<body>
<div id="search_content">
	<div id="search_frist_spacer">
		<form class="form-inline span6" action="/cyzt_companylist/companytree.candor" method="POST" target="leftFrame">
			流程名称<input type="text" class="input-large gray radius" id="input01" name="search">
			应用名称<input type="text" name="name" class="input-large gray radius" />
			<button class="btn" type="submit"><i class="icon-search"></i>搜索</button>
		</form>
		<ul class="nav pull-right">
				<li><a href="/admin/workFlowList">流程管理</a></li>
				<li class="divider-vertical"></li>
			  </ul>
		
    </div>
    <div id="search_shadow"></div>
</div>

<div class="container-fluid" style="padding-top:45px;">
		<fieldset>
        <legend>流程信息</legend>
    	<form name="form1" id="form1" method="post" action="?action=order">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-condensed">
		   <thead>
		    <tr class="tr2">
			<th width="10%">流水号</th>
			<th width="25%">流程名称</th>
			<th width="10%">应用名称</th>
			<th width="10%">是否启用</th>
			<th width="45%">操作</th>
		    </tr>
		  </thead>
		  <tbody>
		  <?php foreach($flowinfo as $key=>$item){?>
		  <tr class="tr3 bgcolor">
		  <td><input name="ids[]" type="checkbox" id="sid_1" value="<?=$item['ID']?>">&nbsp;<?=$item['ID']?></td>
		  <td align="left"><?=$item['FLOWNAME']?></td>
		  <td align="left"><?=$this->app->config->project->category[$item['APPNAME']]?></td>
		  <td align="left"><?=$item['ISUSE'] == 1 ? "启用" : "<span class='prompt'>未启用</span>"?></td>
		  <td>
			<a href="javascript:;" onclick="markG.dialog('/admin/workFlowAddDialog',{title:'流程信息管理',id:'<?=$item['ID']?>'})" title="编辑流程"><i class="icon-edit icon-blue"></i>dd</a>&nbsp;&nbsp;&nbsp;
            <a href="/admin/workFlowEdit.php?flowid=<?=$item['ID']?>" title="查看流程"><i class="icon-view icon-blue"></i>dd</a>
            &nbsp;&nbsp;&nbsp;
			<a href="javascript:;" onclick="delOne('<?=$item['ID']?>')" title="删除流程"><i class="icon-del icon-blue">dd</i></a>
		   </td>
		  </tr>
		  <?php } ?>
		  </tbody>
		</table>
		<div class="pagingbox">
			<div class="paging">
				<a href="#" onclick="markG.dialog('/admin/workFlowAddDialog','新建流程')" style="float:left" title="新建流程"><i class="icon-photo icon-blue"></i></a>
				<?=$pageStr?>
			</div>
		</div>
		</form>
		<!--from end-->
		</fieldset>

</div>
<script type="text/javascript">
function delOne(id)
{
    if(confirm('确定删除此流程信息吗?'))
    {
        $.ajax({
           type: "GET",
           url: "/admin/workFlowDel.candor",
           data: {flowid:id},
           beforeSend:function(){art.dialog({id:'delid',title:false,border:false,lock:true,drag:false,esc:false,content:'<div><img src="/theme/default/images/loading4.gif" /><p style="text-align:center;font-weight:bold;">正在提交,请稍候...</p><div>'});
    },
           success: function(msg){
               art.dialog.get('delid').close();
               if(msg=='1')
               {
                   window.location.href = '/admin/workFlowList';
                   art.dialog.close();
               }
               else art.dialog.alert('删除不成功！');
           }
        }); 
    }
}
</script>
</body>
</html>
