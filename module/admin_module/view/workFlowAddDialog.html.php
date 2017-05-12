<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/common.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/style.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/page.css';?>' type='text/css' media='screen' />
<script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/js/plugins/artDialog/artDialog.source.js?skin=default" type="text/javascript"></script>
<script src="/js/plugins/artDialog/plugins/iframeTools.js" type="text/javascript"></script>
<style type="text/css">
.aui_content{background: url("/js/plugins/jquery.tabPanel/image/TabPanel/content_bg.png");padding: 10px;margin: 0;}
.d_body{width:320px;}
.d_body p{font-size: 14px;border-bottom: 1px dotted #032682;color: #032682;font-weight: bold;line-height: 30px;margin: 10px 0;width: 370px;padding:0 10px;}
.d_content .d_title{padding:0 5px;width:80px;}
.d_content .d_button{text-align: center;}
.d_content table{width: 100%;}
.d_content table tr td{line-height: 18px;margin: 5px;}
.d_content table tr td input.form-input{width:150px;margin: 0px;}
</style>
<script type="text/javascript">
 var get_submodule = function (obj){
    //$('#APPNAME').val(prefix[$(obj).val()]);
    $.ajax({
       type: "POST",
       url: "/admin/getSubModule",
       data: {pid:$(obj).val()},
       success: function(msg){ 
         $("#APPNAME2").html(msg);
       }
    }); 
}
$(function(){
    /*//联动菜单  暂不开放
    $("#project_name").bind('change',function(){
        get_submodule(this);
    });
    */
    $("#submit").click(function(){
        var isCheck = true ;
        if($("#FLOWNAME").val().length<3)
        {
            showErroMsg('FLOWNAME','流程名称必须大于3个字符');
            isCheck = false ;
        }
        var isuse = $("#ISUSE").attr("checked")  ? 1 : 0 ;
        if(!isCheck)return;
        $.ajax({
           type: "POST",
           url: "/admin/saveWorkFlow",
           data: {APPNAME:$("#APPNAME").val(),FLOWNAME:$("#FLOWNAME").val(),ISUSE:isuse,ID:$("#FLOWID").val()},
           beforeSend:function(){parent.art.dialog({id:'ajaxid',title:false,border:false,lock:true,drag:false,esc:false,content:'<div><img src="/theme/default/images/loading4.gif" /><p style="text-align:center;font-weight:bold;">正在提交,请稍候...</p><div>'});
},
           success: function(msg){
               parent.art.dialog.get('ajaxid').close();
               if(msg=='1')
               {
                   art.dialog.parent.location.href = '/admin/workFlowList';
                   art.dialog.close();
               }
               else parent.art.dialog.alert('操作不成功！');
           }
        }); 
    })
})
function showErroMsg($id,$msg)
{
    $.dialog({content:'<b class="red">'+$msg+'</b>',icon: 'error',lock:true,time:1,closeFn:function(){$("#"+$id).focus();}});return false;
}
</script>
<div class="d_body">
    <p><?if($flowinfo['ID']>0){?>修改流程<?}else{?>新建流程<?}?></p>
    <div class="d_content">
    <form action="/admin/saveWorkFlow" method="post" target="_self">
        <table>
            <tr>
                <td class="d_title"><label>应用名称：</label></td>
                <td>
                    <div style="width:150px;height:28px;" class="select-wrapper">
                        <select id="APPNAME" name="APPNAME"  >
                          <?php 
                              foreach($this->app->config->project->category as $key=>$item){
                                if($key == $flowinfo['APPNAME'])$checked = "selected";
                                else $checked = '';
                                echo '<option value="'.$key.'" '.$checked.' >'.$item.'</option>';    
                            }
                          ?>
                        </select>
                    </div><!--<div style="width:150px;height:28px;" class="select-wrapper">
                        <select name="APPNAME2" id="APPNAME2">
                          <?php 
                              foreach($this->app->config->project->submodule['100'] as $key=>$item){
                                echo '<option value="'.$key.'">'.$item.'</option>';    
                            }
                          ?>
                        </select>
                    </div>-->
                </td>
            </tr><tr>
                <td class="d_title"><label>流程名称：</label></td>
                <td><input type="text" class="form-input" name="FLOWNAME" id="FLOWNAME" value="<?=$flowinfo['FLOWNAME']?>" /></td>
            </tr><tr>
                <td class="d_title"><label>是否启用：</label></td>
                <td><input type="checkbox"  name="ISUSE" id="ISUSE" value="1" <?if($flowinfo['ISUSE']=='1') echo 'checked';?> /></td>
            </tr><tr>
                <td colspan="2" class="d_button">
                    <input type="button" value="提交" class="button blue" id="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="button" value="取消" class="button blue" id="d_closeDialog" onclick="parent.art.dialog.get('itemText').close();">
                    <input type="hidden" name="FLOWID" id="FLOWID" value="<?=$flowinfo['ID']?>" >
                </td>
            </tr>
        </table>
    </form>
    </div>
</div>