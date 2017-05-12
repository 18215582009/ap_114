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
<title><?=$this->config->zbxt_degree->name?></title>
</head>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_font-awesome.min.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_simple-line-icons';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/bootstrap.min.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_animate.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_all.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/bootstrap-switch.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/prettify.css';?>' type='text/css' media='screen' />
<link type="text/css" rel="stylesheet" href="" id="font-layout">
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/toastr.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/bootstrap-select.min.css';?>' type='text/css' id='skinSheet' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_core.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_system.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_system-responsive.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/page.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href="/js/plugins/jquery-autocomplete/jquery.autocomplete.css" type='text/css' media='screen' />

<body>
<div class="page-wrapper">
  <div class="page-content" style="min-height:0px;">
    <!-- begin page header-->
    <!-- <div class="page-title-breadcrumb">
      <div class="page-header pull-left">
        <div class="page-title"><?=$this->config->zbxt_degree->name?></div>
      </div>
      <ul class="breadcrumb page-breadcrumb "  style="padding: 0px;">
 		<li class="pull-right">
		  <div class="row-fluid demo-btn"  id="operateBar">
		   		<a href="javascript:void(0)" class="btn btn-default" id="edit" onclick="cancel()">取消</a>
				<button class="btn btn-success" type="button" id="save" onclick="save()">保存</button>
		  </div>
		</li>
      </ul>
         </div> -->
    <!-- end  page header-->
    <!-- begin box-content -->
    <div class="box-content">
      <!--begin content-->
      <div class="content" style="padding-bottom: 0px;">
      	<div class="panel">
			<div class="panel-body">
			  <div class="row">
				 <form class="form-horizontal formTab" action="/<?=$this->config->zbxt_degree->moduleName?>/<?=$method?>?action=save" id="opform" name="opform"  method="post"  enctype="multipart/form-data" onsubmit="prompt('加载等待','loading')">
				 	<input type="hidden" id="plan_id"></input>
					<div class="col-xs-12">
					  <div class="row">
						  <div class="col-md-12">
						  	<div class="col-md-6">
								<div class="form-group">
									<label class="control-label" for="showEasing">源计划名称</label>
									<input type="text" class="form-control input-medium" placeholder="" name="" id="plan_name" value="" required="required" disabled="disabled" />
								</div> 
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label" for="showEasing">类型</label>
									<select  class="form-control input-medium" id="state">
										<option value="-1">全部</option>
										<option value="0" selected="selected">未分派</option>
										<option value="1">已分派</option>
									</select>
								</div> 
							</div>                     
						  </div>
							<div class="col-md-12">													
                                <table class="table table-hover-color" id="table01">
									<thead>
									<tr>
										<th> <input id="checkall" name="checkall" type="checkbox"></input></th>
										<th>流水号</th>
										<th title="">任务</th>
									</tr>
									</thead>
									<tbody>

									</tbody>
								</table>
					  </div>
					</div>
				</form>
			  </div>
			</div>
		</div><!--end panel-->
      </div>
      <!--end content-->
    </div>
    <!-- end box-content -->
  </div>
</div>
<script src="/js/jquery-1.10.2.min.js" ></script>
<script src="/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/js/candor.blockui.js"></script>
<script src="/js/jquery.nicescroll.js"></script>
<script src="/js/jquery-ui.js"></script>
<script src="/js/bootstrap.min.js" ></script>
<script src="/js/bootstrap-hover-dropdown.js"></script>
<script src="/js/mtek_html5shiv.js"></script>
<script src="/js/respond.min.js"></script>
<script src="/js/jquery.metisMenu.js"></script>
<script src="/js/mtek_icheck.min.js"></script>
<script src="/js/mtek_custom.min.js"></script>
<script src="/js/jquery.slimscroll.js"></script>
<script src="/js/bootstrap-switch.min.js"></script>
<script src="/js/prettify.js"></script>
<script src="/js/jquery.cookie.js"></script>
<script src="/js/jquery.pulsate.js"></script>
<!--LOADING SCRIPTS FOR PAGE-->
<script src="/js/bootstrap-select.min.js"></script>
<!--LOADING SCRIPTS FOR PAGE-->

<!--CORE JAVASCRIPT-->
<script src="/js/mtek_core.js"></script>
<script src="/js/mtek_system-layout.js"></script>
<script src="/js/jquery-responsive.js"></script>
<script src="/js/candor.portal.js" ></script>
<script src="/js/candor.common.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/plugins/jquery-autocomplete/jquery.autocomplete.js.min.js"></script>

</body>
</html>
<script>
var default_check=$("#plan_id_all",artDialog.open.origin.document).val().toString().split(",");
$(document).ready(function() {
	$("#plan_name").val($("#plan_name",artDialog.open.origin.document).val());
	$("#plan_id").val($("#id",artDialog.open.origin.document).val());
	
	bindAllCheck();//为全选框绑定事件
	refreshList();
	$("#state").change(function(){
	 	refreshList();
	});
});

// 绑定全选按钮
function bindAllCheck(){
	$("#checkall").next().click(function(){
		if($("#checkall").attr("checked")=="checked"){			
			$("#table01 tbody :checkbox").attr("checked","checked");
			$("#table01 tbody :checkbox").parents(".icheckbox_square-blue").addClass("checked");
		}else{				
			$("#table01 tbody :checkbox").removeAttr("checked");
			$("#table01 tbody :checkbox").parents(".icheckbox_square-blue").removeClass("checked");
		}
	});
}

jQuery(document).ready(function () {
    //产品名称自动完成
	var productlisttemp='<?=$plan_json?>';
	if(productlisttemp!="")
	{
	var productlist='<?=$plan_json?>';	
	$("#plan_name").autocomplete(eval(productlist), {
		dataType: "json",
		width:$("#plan_name").outerWidth(true),
		delay:0,
		minChars:0,
		max:0,
		mustMatch:true,
		matchContains:true,
		extraParams:{searchName:function(){return $("#searchName").val()}},
		parse: function(data) { 
			return $.map(data, function(row) {
				return {
					data: row,
					value: row.id,
					result: row.id
				}
			});
		},
		formatItem: function(item) {
			if(typeof(item.id)=="undefined"||item.id==""||item.id==null)
			{return item.name;
			}else{return "["+item.id+"]"+item.name;
			}
			
		}	   
	}).result(function(e,item){
		//回调
		if(typeof(item)!="undefined")
		{
			$("#plan_id").val(item.id);
			refreshList();	
		}
	});	
	$("#plan_name").focus(function(){$("#plan_name").click();});//用于使输入框获得焦点时能展示产品	
	}

});

function refreshList(){
	var plan_id=$("#plan_id").val();
	var state=$("#state").val();
	$.ajax({
        url: '/mrp_task/ajaxGetPlanList?plan_id='+plan_id+"&state="+state,
        type: "GET",
        dataType: 'json',
        success: function (data) {
        	str="";
        	if(data){
        		for(var i in data){
        			var t=default_check.indexOf(data[i]["id"])>=0?" checked='checked' ":"";
        			str+="<tr data-plan_id='"+data[i]["id"]+"'><td><input type='checkbox'"+t+"></input></td><td>"+data[i]["id"]+"</td><td>"+data[i]["name"]+"</td></tr>";
	        	}
        	}
        	$("#table01 tbody").html(str);
        	$.getScript(window.location.protocol+"//"+window.location.host+"/js/mtek_core.js", function() {
				bindAllCheck();
  			}); 
        }
    })
}

function save(){
	$("form").eq(0).submit();
}

function cancel(){
	art.dialog.close();
}

var close='<?=$_GET["close"]?>';
if(close){
	artDialog.open.origin.location.reload();
}

//框架点击ok触发的事件
function ok(){
	var plan_id="";
	$("#table01 tbody tr :checked").each(function(){
		plan_id+=","+$(this).parents("tr").data("plan_id");
	});
	plan_id=plan_id==""?plan_id:plan_id.substring(1);
	$("#plan_id_all",artDialog.open.origin.document).val(plan_id);
}
</script>


