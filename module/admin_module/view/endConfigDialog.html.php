<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/common.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/style.css';?>' type='text/css' media='screen' />
<style type="text/css">
body{height:100%;font-size: 12px; background:none}
.t_body{width: 520px;display: inline-block;overflow: hidden;padding:10px 0 0 10px;}
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
.t_userlist_content a{cursor: pointer;color:#2078A8;}
.t_userlist_content a:hover{text-decoration: underline;color: #F96706;}
</style>
<body>
<div class="t_body" id="t_body">
    <div class="t_header">
        <ul>
            <li class="cur" pon="t_base_con">定义</li>
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
                    <td><input name="" id="nodeStart" name="START" type="checkbox" value="2" checked='checked'  disabled="disabled">结束节点</td>
                </tr>
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

})



function saveData(){
    updateTaskLabel();
    var oNode = new Object();
    oNode.NODEID = $("#nodeId").val();
    oNode.FLOWID = $("#flowId").val();
    oNode.NODENAME = $("#nodeName").val();
    oNode.NODETYPE = 'end';

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
