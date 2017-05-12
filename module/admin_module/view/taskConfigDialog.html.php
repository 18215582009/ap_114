<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/common.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/style.css';?>' type='text/css' media='screen' />
<style type="text/css">
body{height:100%;font-size: 12px; background:none}
.t_body{width: 580px;display: inline-block;overflow: hidden;padding:10px 0 0 10px;}
.t_body ul li{list-style: none;}
.t_header,.t_content{float: left;width:96%;}
.t_header{padding:0 6px;border-bottom: solid 1px #919B9C;}

.t_header ul {display: inline-block;margin: 0 0 -1px 10px;padding: 0;}
.t_header ul li{float: left;padding:0 5px;margin: 0 3px;height: 24px;line-height: 24px;border: solid 1px #919B9C;font-size: 12px;cursor: pointer;}
.t_header ul li.cur{border-bottom: solid  1px #FFFFFF;cursor: text;}
.t_header ul li.oncur{border-bottom: solid  1px #FFFFFF;}

.t_content{border-bottom : solid 1px #919B9C;border-left: solid 1px #919B9C;border-right: solid 1px #919B9C;padding:5px;}
.t_content table{width: 100%;}
.t_content table tr{}
.t_content table tr td{font-size: 12px;padding:5px;border-bottom: dashed 1px #DADADA;}
.t_content table tr td.t_tdtitle{text-align: center;}
.t_content table tr td.t_speuser{background: url('../../images/bulletButton.gif') no-repeat left center;text-align: left;padding-left:10px;}

.t_content table tr td.t_userlist_title{background-color: #E0E0E0;}
.t_content p input{font-size:12px;}

.t_action  p{text-align: center;height:40px;border-bottom: none 0;padding-top: 2px;}
.t_action  p a{margin-right: 10px;line-height: 24px;height:24px;}

.t_content .t_hide{display:none;}
.t_userlist_content a{cursor: pointer;color:#2078A8;}
.t_userlist_content a:hover{text-decoration: underline;color: #F96706;}
</style>
<body>
<div class="t_body" id="t_body">
    <div class="t_header">
        <ul>
            <li class="cur" pon="t_base_con">定义</li>
            <li pon="t_condition_con">动作</li>
            <li pon="t_do_con">处理方法</li>
            <li pon="t_user_con">用户</li>
        </ul>
    </div>
    <div class="t_content">
            <input type="hidden" id="flowId" name="FLOWID" value="0" />
            <input type="hidden" id="nodeId" name="NODEID" value="<?=$task['id']?>" />
            <table id="t_base_con">
                <tr>
                    <td width="14%" class="t_tdtitle">标题:</td>
                    <td width="86%"><input type="text" id="nodeName" name="NODENAME" id="action" value="<?=$task['name']?>" /></td>
                </tr>
				<tr>
                    <td class="t_tdtitle">描述:</td>
                    <td><input type="text" id="nodeDes" name="NODEDES" id="action" value="" /></td>
                </tr>
				<tr>
                    <td class="t_tdtitle">&nbsp;</td>
                    <td><input name="" id="nodeStart" name="START" type="checkbox" value="1" <?if($flowinfo['isstart']==1) echo 'checked';?>>开始节点</td>
                </tr>
            </table>
			<table id="t_condition_con" class="t_hide">
                <tr>
                    <td width="30%" class="t_tdtitle">BIZNMAE(所在方法类)</td>
                    <td width="80%">
                    <p><input type="text" id="BIZNAME" name="BIZNAME" value="<?=empty($flowinfo['bizname'])? '__CLASS__' : $flowinfo['bizname']?>"  /></p>
                    <p>(页面逻辑处理模块<span style="color: red;">control</span>；默认当前页面处理类__CLASS__):</p></td>
                </tr> 
                <tr>
                    <td width="30%" class="t_tdtitle">Display(页面展示方法):</td>
                    <td width="80%"><input type="text" id="DISPLAY" name="DISPLAY" value="<?=$flowinfo['display']?>"  /></td>
                </tr> 
                <tr>
                    <td width="30%" class="t_tdtitle">Action(路径):</td>
                    <td width="80%"><input type="text" id="action" name="ACTION" value="<?=$flowinfo['action']?>"  /></td>
                </tr>
            </table>
            <table id="t_do_con" class="t_hide">
                <tr>
                    <td class="t_tdtitle t_speuser" colspan="2">处理方法:&nbsp;&nbsp;(<span style="color:red;">func:module中的执行方法</span>)</td>
                </tr>
                <tr>
                    <td  class="t_userlist_title">类型</td>
                    <td  class="t_userlist_title">使用方式</td>
                    <td  class="t_userlist_title">内容</td>
                </tr>
                <tr class="t_userlist_content">
                    <td>进入流程前</td>
                    <td><select name="enway" id="enway"><option value="func">func</option></select></td>
                    <td><input type="text" name="ENTERCHECK" id="ENTERCHECK" value="<?=$flowinfo['entercheck']?>" /></td>
                </tr><tr class="t_userlist_content">
                    <td>保存流程前</td>
                    <td><select name="sbnway" id="sbnway"><option value="func">func</option></select></td>
                    <td><input type="text" name="SAVEBEFORECHECK" id="SAVEBEFORECHECK" value="<?=$flowinfo['savebeforecheck']?>" /></td>
                </tr><tr class="t_userlist_content">
                    <td>保存流程后</td>
                    <td><select name="leway" id="leway"><option value="func">func</option></select></td>
                    <td><input type="text" name="LEAVECHECK" id="LEAVECHECK" value="<?=$flowinfo['leavecheck']?>" /></td>
                </tr>
            </table>
			<table id="t_user_con" class="t_hide">
                <tr>
                    <td class="t_tdtitle t_speuser" colspan="2">指定用户:&nbsp;&nbsp;<button type="button" id="t_adduser">添加</button></td>
                </tr>
                <tr>
                    <td colspan="2" class="t_userlist_title">用户/组</td>
                </tr>
                <? foreach($userinfo as $item):
					if($item!=null){
				?>
                <tr class="t_userlist_content">
                    <td><?=$item?></td>
                    <td><a class="t_a" onClick="tRemove(this,'<?=$item?>');">移除</a></td>
                </tr>
                <?} endforeach;?>
            </table>
        <div class="t_action">
             <p><a  href="javascript:void(0);" onClick="saveData()" class="button blue">提交</a></p>
        </div>
    </div>
</div>
<script type="text/javascript">
//修改任务节点Label
function updateTaskLabel(){
	parent.curModel.beginUpdate();
	try
	{
		var edit = new parent.mxCellAttributeChange(parent.curCell, 'label', $("#nodeName").val());
		parent.curModel.execute(edit);
	}
	finally
	{
		parent.curModel.endUpdate();
	}
}
	
var userlist = [] ;
$(function(){
	//获取流程id
	$("#flowId").val(parent.flowid);
	
    $(".t_header ul li").hover(function(){
        $('.t_header ul li').removeClass('oncur');
        $(this).addClass('oncur');
    },function(){
        $('.t_header ul li').removeClass('oncur');
    })
    $(".t_header ul li").click(function(){
        $('.t_header ul li').removeClass('cur');
        $(this).addClass('cur');
        var tabid = $(this).attr('pon');
        $(".t_content table").hide();
        $("#"+tabid).show();
        parent.autoFrameHeight('<?=$_GET['itemid']?>');
    })
    
    $(".t_cancle").bind('click',function(){
        parent.dialogDestroy("<?=$_GET['itemid']?>");
    })
    $("#t_sub").bind('click',function(){
        self.location.reload();
    })
    $("#t_adduser").bind('click',function(){
        var userDialog = new parent.markG();
        userDialog.height = null;
        userDialog.width = 720;
        userDialog.parent = "<?=$_GET['itemid']?>";
        userDialog.id = "<?=$_GET['id']?>";
        userDialog.flowid = parent.flowid;
        userDialog.dialog('选择用户','/admin/taskUserDialog');
    })
    
    
})


function tRemove(obj,id)
{
    if(confirm("确定要移除此用户或组吗？"))
    {
        $.ajax({
            type:'post',
            dataType:'json',
            url:'/admin/delUserOne',
            data:{uid:id,flowid:'<?=$_GET['flowid']?>',nodeid:"<?=$_GET['id']?>"},
            timeout:30000,
            beforeSend: function(){
                overDiv.show();
            },
            success:function(msg){ //showErroMsg(msg);return;
                overDiv.close();
                if(msg=='1')$(obj).parent().parent('tr').remove();
                else alert('移除用户失败');
                
            },
            error:function (XMLHttpRequest, textStatus, errorThrown) {
                overDiv.close();
            }
        });
    }
}




function saveData(){

	updateTaskLabel();
	var oNode = new Object();
	oNode.NODEID = $("#nodeId").val();
	oNode.FLOWID = $("#flowId").val();
    oNode.NODENAME = $("#nodeName").val();
    oNode.ACTION = $("#action").val();
    oNode.DISPLAY = $("#DISPLAY").val();
	oNode.BIZNAME = $("#BIZNAME").val();
    oNode.ENTERCHECK = $("#enway").val()+":"+$("#ENTERCHECK").val();
    oNode.SAVEBEFORECHECK = $("#sbnway").val()+":"+$("#SAVEBEFORECHECK").val();
    oNode.LEAVECHECK = $("#leway").val()+":"+$("#LEAVECHECK").val();
//    oNode.PARAMS = $("#PARAMS").val();
//    oNode.CPTYPE = $("#cptype").val();

    var enc = $("#ENTERCHECK").val();
    var sbc = $("#SAVEBEFORECHECK").val();
    var lvc = $("#LEAVECHECK").val();
    if(enc.indexOf(":")>-1){alert("进入流程检验方法中不允许出现符号':'");return false;}
    if(sbc.indexOf(":")>-1){alert("保存流程前检验方法中不允许出现符号':'");return false;}
    if(lvc.indexOf(":")>-1){alert("结束流程检验方法中不允许出现符号':'");return false;}
    if($("#nodeStart").attr('checked')){
        oNode.ISSTART = $("#nodeStart").val();
    }

	$.ajax({
	   type: "POST",
	   url: "/admin/workFlowNodeAdd.php",
	   data: oNode,
	   success: function(msg){
		 alert( "系统提示: " + msg );
	   }
	});
}

var overDiv = 
{
    show:function()
    {
        var obj = $("#t_user_con");
        var w = obj.width();
        var h = obj.height();
        var left = obj.offset().left;
        var top = obj.offset().top;
        var zIndex = obj.css('z-index');
        div = $("<div>");
        div.css({
            'position':'absolute',
            'z-index':zIndex+100,
            'left':left,
            'top':top,
            'width':w,
            'height':h,
            'padding':'5px 10px',
            'background':'#E0E0E0 ',
            'text-align':'center',
            'filter':'alpha(opacity=50)',
            '-moz-opacity':'0.5',  
            '-khtml-opacity': '0.5', 
            'opacity': '0.5' 
        });
        div.html('<div style="margin:'+((h/2)-30)+'px"><img src="/images/loading2.gif" /><p style="text-align:center;font-weight:bold;">正在查询,请稍候...</p></div>');
        $("body").append(div);
    },
    close : function(){
        div.remove();
    }
}
</script>
</body>
