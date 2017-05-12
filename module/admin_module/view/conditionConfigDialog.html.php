<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/common.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/style.css';?>' type='text/css' media='screen' />
<style type="text/css">
body{height:100%;font-size: 12px; background:none}
.t_body{width: 800px;display: inline-block;overflow: hidden;padding:10px 0 0 10px;}
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

.t_action  p{text-align: center;height:40px;border-bottom: none 0;padding-top: 2px;}
.t_action  p a{margin-right: 10px;line-height: 24px;height:24px;}

.t_content .t_hide{display:none;}
.t_condition_content select{width: auto;height: auto;padding: 0;border:solid 1px #C0C0C0;font-size: 12px;}
.t_condition_content select option{width: auto;height: auto;padding: 0 5px 0 0;border:none 0;background: transparent none;}
.t_condition_content a{cursor: pointer;color:#2078A8;}
.t_condition_content a:hover{text-decoration: underline;color: #F96706;}

.borderErro{border:solid 1px red ;}
.t_condition_content td input{height:24px;}
input{padding: 0 2px;}
</style>
<body>
<div class="t_body" id="t_body">
    <div class="t_header">
        <ul>
            <li class="cur" pon="t_base_con">定义</li>
            <li pon="t_condition_con">派送规则</li>
<!--            <li pon="t_do_con">处理方法</li>-->
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
            </table>
			<table id="t_condition_con" class="t_hide">
                <tr>
                    <td class="t_tdtitle t_speuser" colspan="2">条件派送:&nbsp;&nbsp;<button type="button" id="t_addCondition">新增</button></td>
                </tr><tr>
                    <td class="t_tdtitle t_speuser" colspan="2">来源条件<span style="color: red" id="sourceCount"></span>条，任意完成条件数:&nbsp;&nbsp;<input type="text" name="NEEDCOMP" id="NEEDCOMP" value="<?=$info['NEEDCOMP']?>" /></td>
                </tr>
                <tr>
                    <td class="t_tdtitle t_speuser" colspan="3">提示:&nbsp;&nbsp;
                    允许程序语言运算符“&&”,“||”,“==”
                     </td>
                </tr><tr>
                    <td class="t_tdtitle t_speuser" colspan="3">
                    派送匹配:&nbsp;&nbsp;
                    <br />
                    1、选择变量时，以@@开头！
                    <br />
                    2、选择方法时，前端方法格式为<span style="color:red;">Front:</span>getHouse ;&nbsp;&nbsp;后端方法格式为<span style="color:red;">Back:</span>getHouse
                    <!--<p>设定参数：
                    <select name="cptype" id="cptype">
                        <option value="var" <? if($flowinfo['cptype']=='var') echo 'selected'; ?>>变量</option>
                        <option value="func" <? if($flowinfo['cptype']=='func') echo 'selected'; ?>>方法</option>
                    </select>
                    <textarea cols="45" rows="3" name="PARAMS" id="PARAMS" style="resize:none;"><?=$flowinfo['params']?></textarea>
                    
                    </p>-->
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table >
                            <tr>
                                <td >下一节点</td>
                                <td width="200px" align="center">判断条件</td>
                                <td width="120px" align="right">标记名</td>
                                <td width="120px" align="right">流程状态</td>
                                <td ><input type="checkbox" name="isoneline" id="isoneline" value="1" <?if($info['ISONELINE']=='1'){?>checked='checked'<?}?> >&nbsp;开启单项条件</td>
                            </tr><tr>
                                <td colspan="5">
                                    <table width="100%" id="t_condition_content" class="t_condition_content">
                                       
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                    
                </tr>
            </table>
<!--			<table id="t_do_con" class="t_hide">
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
                    <td><input type="text" name="ENTERCHECK" id="ENTERCHECK" value="<?=$info['entercheck']?>" /></td>
                </tr><tr class="t_userlist_content">
                    <td>结束流程后</td>
                    <td><select name="leway" id="leway"><option value="func">func</option></select></td>
                    <td><input type="text" name="LEAVECHECK" id="LEAVECHECK" value="<?=$info['leavecheck']?>" /></td>
                </tr>
            </table>
            <table id="t_user_con" class="t_hide">
                <tr>
                    <td class="t_tdtitle t_speuser" colspan="2">指定用户:&nbsp;&nbsp;<button type="button" id="t_adduser">添加</button></td>
                </tr>
                <tr>
                    <td colspan="2" class="t_userlist_title">用户/组</td>
                </tr>
                <tr class="t_userlist_content">
                    <td>admin</td>
                    <td><a class="t_a" onClick="tRemove(this);">移除</a></td>
                </tr>
            </table>-->
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

var userlist = [] , fninfo = [] , sourceLen = 0;
<?foreach($fninfo as $key=>$item){?>
fninfo['<?=$key?>'] = <?=json_encode($item)?>;
<?}?>
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
        $("#"+tabid+" table").show();
        if($(this).attr('pon')=='t_condition_con')
        {
            overDiv.show();
            var targetEdges = parent.getTargetNode(parent.CONDITION_CELL) , tr = '';
            for(var i in targetEdges)
            {
                if($("#node_"+targetEdges[i]['id']).length==0)
                {
                    var nodeext = typeof(fninfo[targetEdges[i]['id']])=='undefined' ? '' : fninfo[targetEdges[i]['id']];
                    tr += '<tr id="node_'+targetEdges[i]['id']+'">'
                    tr += '<td>'+targetEdges[i]['name']+'</td>';
//                    tr += '<td><input type="text" name="actions[]" value="" size="13"></td>';
                    tr += '<td width="300px"><input type="text" name="conditions[]" value="'+(nodeext.conditions==null ? '' : nodeext.conditions)+'" style="width:285px" /></td>';
                    tr += '<td><input type="text" name="tagname[]" value="'+(nodeext.tagname==null ? targetEdges[i]['name'] : nodeext.tagname)+'" size="18" /></td>';
                    tr += '<td><input type="text" name="bizstatus[]" value="'+(nodeext.bizstatus==null ? targetEdges[i]['name'] : nodeext.bizstatus)+'" size="18" /></td>';
                    tr += '<td><a class="t_a" onclick="removeTr(this)">移除</a></td>';
                    tr += '</tr>';
                }
            }
            $("#t_condition_content").append(tr);
            //sourceEdges
            var sourceEdges =parent.getTargetNode(parent.CONDITION_CELL , true)  ;
            sourceLen = sourceEdges.length;
            if($("#NEEDCOMP").val()=='')$("#NEEDCOMP").val(sourceLen);
            $("#sourceCount").html(sourceLen);
            overDiv.close();
        }
        parent.autoFrameHeight('<?=$_GET['itemid']?>');
        setDisabled();
    })
    $("#t_sub").bind('click',function(){
        var oNode = new Object();
        oNode.flowId = $("#flowId").val();
        oNode.nodeId = $("#nodeId").val();
        oNode.nodeName = $("#nodeName").val();

        $.ajax({
           type:"POST",
           url:"/admin/workFlowNodeAdd.candor",
           data:{name:'John',location:'Boston'},
           success:function(msg){
               alert(1)
           }
        })
    })
    $(".t_cancle").bind('click',function(){
        parent.dialogDestroy("<?=$_GET['itemid']?>");
    })
    $("#t_sub").bind('click',function(){
        self.location.reload();
    })
    $("#t_addCondition").bind('click',function(){
        var tr = '' , cSelect = '<select onchange="chooseNode(this)" onclick="doMark(this)"><option value="-1">请选择</option>';
        var allNodes = parent.getAllNode(parent.ALL_CELLS);
        for(var i in allNodes)
        {
            cSelect += '<option value="'+allNodes[i]['id']+'">'+allNodes[i]['name']+'</option>';
        }
        cSelect += '</select>';
        tr += '<tr>'
        tr += '<td>'+cSelect+'</td>';
//        tr += '<td><input type="text" name="actions[]" value="" size="13"></td>';
        tr += '<td width="300px"><input type="text" name="conditions[]" value="" style="width:285px" /></td>';
        tr += '<td><input type="text" name="tagname[]" value="" size="18" /></td>';
        tr += '<td><input type="text" name="bizstatus[]" value="" size="18" /></td>';
        tr += '<td><a class="t_a" onclick="removeTr(this)">移除</a></td>';
        tr += '</tr>' ;
        $("#t_condition_content").append(tr);
        parent.autoFrameHeight('<?=$_GET['itemid']?>');
        setDisabled();
    });
    $("#t_adduser").bind('click',function(){
        var userDialog = new parent.markG();
        userDialog.height = null;
        userDialog.parent = "<?=$_GET['itemid']?>";
        userDialog.dialog('选择用户','/admin/taskUser');
    })
    setDisabled();
    $("#isoneline").bind('click',function(){
        setDisabled();
    })
    $("#NEEDCOMP").bind('blur',function(){
        if($(this).val()<0){alert('任意完成条数不能小于0');$(this).val(sourceLen)}
        if($(this).val()>sourceLen){alert('任意完成条数不能大于所有源条数');$(this).val(sourceLen)}
    })
    
    $("#cptype").bind('change',function(){
            checkCtype();
    });
})
function setDisabled()
{
    if($("#isoneline").attr('checked'))
    {
        $("#t_condition_content input[type='text'][name='conditions[]']").removeAttr('disabled');
       // $("#t_condition_content input[type='text'][name='tagname[]']").removeAttr('disabled');
    }
    else {
       $("#t_condition_content input[type='text'][name='conditions[]']").attr('disabled','disabled');
     //  $("#t_condition_content input[type='text'][name='tagname[]']").attr('disabled','disabled'); 
    }
}
function chooseNode(obj)
{
    var obj = $(obj);
    var value = $(obj).val();
    if($("#node_"+value).length==0){
        obj.parent().parent('tr').attr('id','node_'+value);
    }else if(value=='-1'){
        obj.parent().parent('tr').attr('id','');
    }else{
        obj.val(obj.attr('mark'));
        alert('选择的节点已存在！');
    }
    
}
function doMark(obj)
{
    $(obj).attr('mark',$(obj).val());
    $(obj).children('option').css({'top':'0','left':'0'})
}
function removeTr(obj)
{
    if(confirm('确定删除此节点吗？'))$(obj).parent().parent('tr').remove();
}
function saveData(){
    this.isP = true;
    updateTaskLabel();
    //开始更新数据
    var oNode = new Object();
    oNode.NODEID = $("#nodeId").val();
    oNode.FLOWID = $("#flowId").val();
    oNode.NODENAME = $("#nodeName").val();
    oNode.NEEDCOMP = $("#NEEDCOMP").val();
//    oNode.ENTERCHECK = $("#enway").val()+":"+$("#ENTERCHECK").val();
//    oNode.LEAVECHECK = $("#leway").val()+":"+$("#LEAVECHECK").val();
    var delimiter = '#split#';
//    var enc = $("#ENTERCHECK").val();
//    var lvc = $("#LEAVECHECK").val();
//    if(enc.indexOf(":")>-1){alert("进入流程检验方法中不允许出现符号':'");return false;}
//    if(lvc.indexOf(":")>-1){alert("结束流程检验方法中不允许出现符号':'");return false;}
    //nodeid
    var nodeids = '';
    $("#t_condition_content").find('tr').each(function(){
        var id = $(this).attr('id') ;
        if(id!= undefined&&id!="node_-1")
        {
            ids = [];
            ids = id.split('node_');
            id = ids[1];
            if(id>0)
            {
                nodeids += id+delimiter ;
            }
            
        }
    })
    //action
    var actions = '';
    $("#t_condition_content").find("input[name='actions[]']").each(function(){
        actions += $(this).val() + delimiter ;
    });
    //判断条件
    var conditions = '' , that = this;
    $("#t_condition_content").find("input[name='conditions[]']").each(function(){ 
        if(!checkCtype($(this).val())){
            that.isP = false;
            $(this).addClass('borderErro');
            return false;
        }
        else $(this).removeClass('borderErro');
        conditions += $(this).val() + delimiter ;
    });
    if(!this.isP){
        return false;
    }
    //Tagname
    var tagname = '';
    $("#t_condition_content").find("input[name='tagname[]']").each(function(){
        tagname += $(this).val() + delimiter ;
    });
    //Tagname
    var bizstatus = '';
    $("#t_condition_content").find("input[name='bizstatus[]']").each(function(){
        bizstatus += $(this).val() + delimiter ;
    });
    
    oNode.nodeids = nodeids;
    //oNode.actions = actions;
    oNode.conditions = conditions;
    oNode.tagname = tagname;
    oNode.bizstatus = bizstatus;
    if($("#isoneline").attr('checked'))oNode.isoneline = $("#isoneline").val();
    
    $.ajax({
       type: "POST",
       url: "/admin/saveConditionNode",
       data: oNode,
       beforeSend: function(){
           overDiv.show();
       },
       success: function(msg){
           overDiv.close();
           if(msg=='1'){
               updateEdgesToNode();
               alert('更新成功');
           }
           else{
               alert( "系统提示: 更新出错!请确认流程图已经保存！" );
           }
           
       }
    });
    
}
function updateEdgesToNode()
{
    var tab = $("#t_condition_content") ,targets = [] ;
    tab.find('tr').each(function(){
        var id = $(this).attr('id') , nodeId = null ;
        if(id!= undefined&&id!="node_-1")
        {
            ids = [];
            ids = id.split('node_');
            nodeId = ids[1];
            if(nodeId>0)
            {
                targets[nodeId] = nodeId ;
            }
        }
        
    })
    //var str = '';
//    for(var i in targets){str += '+'+i+":"+targets[i]+';';}
//    alert(str);return false;
    parent.updateConditionEdgeNode(targets);
}

function checkCtype(value)
{

        var para = "@@[a-zA-Z]+\\d*"; 

        var fun = "((Front:)|(Back:))[a-zA-Z]+\\(([a-zA-Z]+\\d*(,[a-zA-Z]+\\d*)*)*\\)";
        var ysuan = "(&&|(\\|\\|))";
        var bj = "(>|<|(==)|(>=)|(<=))*\\w+";
        
       eval(" var param =  /^\\w+$|^("+para+bj+"("+ysuan+para+bj+")*)*$|^(\\(?(\\(?"+fun+"("+ysuan+"\\(?"+fun+")*\\)?)+\\)?(\\s)*([a-zA-Z]+)?)"+bj+"$/") ;     
   
    if(value.length > 0 && !param.test(value))
    {
        alert('条件格式不正确');
        return false;
    }
    lBrackets = jsCorreBrackets(value,'(');
    rBrackets = jsCorreBrackets(value,')');
    if(lBrackets!=rBrackets){
        alert('对应括号不匹配');
        return false;
    }
    return  true;
}


function jsCorreBrackets(str,charone)
{
    var j = 0;
    for(var i=0;i<str.length;i++)
    {
        if(charone==str.charAt(i))
        {
            j++;
        }
    }
    return j;
}
var overDiv = 
{
    show:function()
    {
        var obj = $("#t_condition_con");
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
