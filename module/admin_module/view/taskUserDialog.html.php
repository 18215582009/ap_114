<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<style type="text/css">
body{height: auto;font-size: 12px;}
.t_body{}

.t_content{padding:5px;}

.tc_top{height:9px;position: relative;padding:0 9px;overflow: hidden;}
.tc_top div,.tc_bot div{display: inline-block;position: absolute;}
/*.tc_top .tcs_top{background: url('../../images/ftl.png') no-repeat;width:9px;height:100%;left: 0;top:0;}*/
.tc_top .tcs_center{border-top:solid 1px #DADADA;width:100%;height: 100%;position: relative;}
/*.tc_top .tcs_right{background: url('../../images/ftr.png') no-repeat;width:9px;height:100%;right:0;top:0;}*/

.tc_center {border-left:solid 1px #DADADA;border-right:solid 1px #DADADA;padding:5px 10px;display: inline-block;}
.tc_center table{width: 100%;}
.tc_center table tr{}
.tc_center table tr td{font-size: 12px;padding:5px;border-bottom: dashed 1px #DADADA;}
.tc_center table tr td.t_tdtitle{text-align: center;}
.tc_center table tr td.t_speuser{background: url('../../images/bulletButton.gif') no-repeat left center;text-align: left;padding-left:10px;}

.tc_center table tr td.t_userlist_title{background-color: #E0E0E0;}


.tc_bot{height:15px;position: relative;padding:0 25px;overflow: hidden;}
/*.tc_bot .tcs_top{background: url('../../images/fbl.png') no-repeat;width:25px;height:100%;left: 0;top:0;}*/
.tc_bot .tcs_center{border-bottom:solid 1px #DADADA;width:100%;height: 100%;bottom: 7px;position: relative;}
/*.tc_bot .tcs_right{background: url('../../images/fbr.png') no-repeat;width:25px;height:100%;right:0;top:0;}*/

.tc_action  p{text-align: center;height:30px;border-bottom: none 0;padding-top: 10px;}
.tc_action  p button{margin-right: 50px;}

.t_userlist_content a{cursor: pointer;color:#2078A8;}
.t_userlist_content a:hover{text-decoration: underline;color: #F96706;}

.t_textcenter{text-align: center;}

.tcc_left{width:220px;height:300px;border-right :dashed 1px #D0D0D0;float: left;overflow-y: auto;}
.tcc_left ul{padding:0;margin:0;}
.tcc_left ul li{list-style: none;padding-left:20px;}
.tcc_left .ltitle .label ,.tcc_left .ltitle ul{float: left;width:100%;}
/*.tcc_left .ltitle ul {display:none;}
.tcc_left .ltitle ul .ltitle ul{display:none;}
.tcc_left .ltitle ul .ltitle ul ul{display:block;}
.tcc_left .ltitle ul .ltitle ul ul li ul{display:none;}*/
.tcc_left .ltitle .label span{cursor: pointer;float: left;}
.tcc_left .ltitle .label span input{border:solid 1px #D0D0D0;width:13px;height:13px;margin:4px;padding:2px;display: inline-block;}
.tcc_left .ltitle .label span .not{background-color: #C0FFFF;border:solid 1px #969696;width:11px;height:11px;margin:4px;display: none;}
.tcc_left .lcontent{background: url('/images/spelist.gif') no-repeat left center;padding-left: 20px;margin-left: 10px;}

.tcc_center{float: left;border:solid 1px #D5E4FA;margin: 0 0 0 20px;height:300px;width:220px;overflow-y: auto;}
.tcc_center{}

.tcc_right{float:left;border:solid 1px #D5E4FA;height:300px;width:200px;overflow-y: auto;overflow-x: hidden;}
.tcc_right ul{width: 100%;float: left;margin: 0;padding:5px 0 5px 20px;}
.tcc_right ul li{float: left;list-style: none;padding:2px 10px;width:50px;}
.tcc_right ul li.u_lititle{width:80px;}
.tcc_right .tccr_title{border-bottom: dashed 1px #D5E4FA;}

.tc_center .addone{cursor: pointer;color:#007B7B;text-decoration: underline;}
</style>
<body>
<div class="t_body">
<div class="t_content">
        <div class="tc_top">
            <div class="tcs_top"></div>
            <div class="tcs_center"></div>
            <div class="tcs_right"></div>
        </div>
        <div class="tc_center" id="tc_center">
            <table id="t_user_con" >
                <tr>
                    <td class="t_tdtitle t_speuser" colspan="2">搜索:&nbsp;&nbsp;<input type="text" name="usernaem" id="username" /></td>
                </tr>
                <!--<tr>
                    <td class="t_userlist_title">用户/组</td>
                    <td class="t_userlist_title t_textcenter">指定</td>
                </tr>-->
            </table>
            <div class="tcc_left">
                <?=$treelist?>
                <!--<ul>
                    <li class="ltitle">
                        <div class="label">
                            <span><img src="/images/minus.gif" alt=""></span>
                            <span><input type="checkbox" name="depart_1" checked="checked" /></span>
                            <span>&nbsp;川大软件</span>
                        </div>
                        <ul>
                            <li class="ltitle">
                            <div class="label">
                                <span><img src="/images/minus.gif" alt=""></span>
                                <span><input type="checkbox" name="depart_1" checked="checked" /></span>
                                <span>&nbsp;软件部</span>
                            </div>
                                <ul>
                                    <li class="lcontent"><input type="checkbox" name="depart_3" checked="checked" />&nbsp;123</li>
                                    <li class="lcontent"><input type="checkbox" name="depart_3" checked="checked" />&nbsp;123</li>
                                    <li class="lcontent"><input type="checkbox" name="depart_3" checked="checked" />&nbsp;123</li>
                                    <li class="lcontent"><input type="checkbox" name="depart_3" checked="checked" />&nbsp;123</li>
                                    <li class="lcontent"><input type="checkbox" name="depart_3" checked="checked" />&nbsp;123</li>
                                </ul>
                            </li>
                            <li class="ltitle">
                                <div class="label">
                                    <span><img src="/images/minus.gif" alt=""></span>
                                    <span><input type="checkbox" name="depart_1" checked="checked" /></span>
                                    <span>&nbsp;部门</span>
                                </div>
                            </li>
                            <li class="ltitle">
                                <div class="label">
                                    <span><img src="/images/minus.gif" alt=""></span>
                                    <span><input type="checkbox" name="depart_1" checked="checked" /></span>
                                    <span>&nbsp;川大软件</span>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>-->
            </div>
            <div class="tcc_center">
                <table>
                    <tr>
                        <td>全选</td>
                        <td>id</td>
                        <td>人员</td>
                        <td><span class="addone" onclick="addall();">添加+</span></td>
                    </tr>
                </table>
                <table id="t_guserlist">
                    
                </table>
            </div>
            <div class="tcc_right">
                <ul class="tccr_title">
                    <li class="u_lititle">姓名</li>
                    <li><span class="addone" title="全部移除" onclick="removeall()">全部移除</span></li>
                </ul>
                <form action="saveUserRight" method="post" id="saveUser">
                <div id="u_userlist"></div>
                </form>
            </div>
           <!-- <table id="t_userlist">
                <tr class="t_userlist_content">
                    <td>admin</td>
                    <td class="t_textcenter"><a class="t_a" onclick="addUser('1');">添加</a></td>
                </tr><tr class="t_userlist_content">
                    <td>admin</td>
                    <td class="t_textcenter"><a class="t_a" onclick="addUser('2');">添加</a></td>
                </tr><tr class="t_userlist_content">
                    <td>admin</td>
                    <td class="t_textcenter"><a class="t_a" onclick="addUser('3');">添加</a></td>
                </tr><tr class="t_userlist_content">
                    <td>admin</td>
                    <td class="t_textcenter"><a class="t_a" onclick="addUser('4');">添加</a></td>
                </tr><tr class="t_userlist_content">
                    <td>admin</td>
                    <td class="t_textcenter"><a class="t_a" onclick="addUser(this);">添加</a></td>
                </tr><tr class="t_userlist_content">
                    <td>admin</td>
                    <td class="t_textcenter"><a class="t_a" onclick="addUser(this);">添加</a></td>
                </tr><tr class="t_userlist_content">
                    <td>admin</td>
                    <td class="t_textcenter"><a class="t_a" onclick="addUser(this);">添加</a></td>
                </tr>
            </table>-->
        </div>
        <div class="tc_bot">
            <div class="tcs_top"></div>
            <div class="tcs_center"></div>
            <div class="tcs_right"></div>
        </div>
        <div class="tc_action">
            <p> <button id="t_sub">提交</button><button class="t_cancle">取消</button></p>
        </div>
    </div>
</div>
<script type="text/javascript">
function addUser(id)
{
    if(confirm("确定给用户添加此权限？"))
    {
         alert("<?=$_GET['parent']?>")
    }
}
$(window).load(function(){
    var width = $(".t_body").width();
    var height = $(".t_body").height();
    $(".t_cancle").bind('click',function(){
        parent.dialogDestroy("<?=$_GET['itemid']?>");
    })

    $("li.ltitle .label span img").each(function(){
        $(this).attr('sta','add').attr('src','/images/add.gif');
        $(this).parent('span').parent().parent('.ltitle').children('ul').hide();
        $(this).bind('click',function(){
            if($(this).attr('sta')&&$(this).attr('sta')=='add')
            {
                $(this).attr('sta','minus').attr('src','/images/minus.gif');
                $(this).parent('span').parent().parent('.ltitle').children('ul').show();
            }
            else
            {
                $(this).attr('sta','add').attr('src','/images/add.gif');
                $(this).parent('span').parent().parent('.ltitle').children('ul').hide();
            }
            
        })
    })
    $("li.ltitle .label  span.checkbox").each(function(){ 
        $(this).attr("checked",'1');
        $(this).bind('click',function(){
            if($(this).attr("checked"))
            {
                $(this).parents('li.ltitle').children('.label').children('span').children('input').removeAttr('checked').hide();
                 $(this).parent().parent('li.ltitle').find('.label').children('span').children('input').removeAttr('checked').hide();
                 $(this).parents('li.ltitle').children('.label').children('span').children('.not').css('display','inline-block');
                 $(this).parent().parent('li.ltitle').find('.label').children('span').children('.not').css('display','inline-block');
                 $(this).removeAttr("checked");
            }
            else
            {
                 $(this).parents('li.ltitle').children('.label').children('span').children('input').attr('checked','true').css('display','inline-block');
                 $(this).parent().parent('li.ltitle').find('.label').children('span').children('input').attr('checked','true').css('display','inline-block');
                $(this).parents('li.ltitle').children('.label').children('span').children('.not').hide();
                $(this).parent().parent('li.ltitle').find('.label').children('span').children('.not').hide();
                $(this).attr("checked",'1');
            }
            getUser();
        })
    })
    $("#t_sub").bind('click',function(){
        var userids = $("#u_userlist ul li").find('input[name="userid[]"]');
        if(userids.size()>0)
        {
            var userid = 'u:'
            userids.each(function(){
                userid += $(this).val()+',';
            })  
            $.ajax({
            type:'post',
            dataType:'json',
            url:'/admin/saveUserRight',
            data:{nodeid:'<?=$_GET['id']?>',flowid:'<?=$_GET['flowid']?>',userid:userid},
            timeout:30000,
            beforeSend: function(){
                overDiv.show();
            },
            success:function(msg){ //showErroMsg(msg);return;
                overDiv.close();
                if(msg=='1')
                {
                    parent.dialogReload("<?=$_GET['parent']?>");
                    parent.dialogDestroy("<?=$_GET['itemid']?>");
                }
                else
                {
                    alert('更新失败')
                }
            },
            error:function (XMLHttpRequest, textStatus, errorThrown) {
                overDiv.close();
            }
        });
        }
    })
})
function getUser()
{
    $.ajax({
            type:'post',
            dataType:'json',
            url:'/admin/getUserListInfo',
            data:{id:1},
            timeout:30000,
            beforeSend: function(){
                overDiv.show();
            },
            success:function(msg){ //showErroMsg(msg);return;
                overDiv.close();
                var tr = '';
                for(var i in msg)
                {
                    tr += '<tr>';
                    tr += '<td><input type="checkbox" name="users" checked /></td><td>'+msg[i]['id']+'</td><td>'+msg[i]['name']+'</td>';
                    tr +='<td><span class="addone '+msg[i]['id']+'" onclick="addone(this)" mark="'+msg[i]['id']+'">>></span>';
                    tr +='<input type="hidden" name="userid[]" value="'+msg[i]['id']+'" >';
                    tr +='<input type="hidden" name="username[]" value="'+msg[i]['name']+'" >';
                    tr +='</td>';
                    tr += '</tr>';
                }
                $("#t_guserlist").html(tr);
            },
            error:function (XMLHttpRequest, textStatus, errorThrown) {
                overDiv.close();
            }
        });
}
function addone(obj)
{
    if(!$(obj).attr('sta'))
    {
        //添加过失效
        $(obj).attr('sta','1');
        var ul = $("<ul>");
        var li ='<li class="u_lititle">'+$(obj).parent('td').children('input[name="username[]"]').val()+'</li><li><span class="addone" title="移除" onclick="removeone(this);" mark="'+$(obj).attr('mark')+'"><<</span><input type="hidden" name="userid[]" value="'+$(obj).parent('td').children('input[name="userid[]"]').val()+'" ></li>';
        ul.html(li);
        $("#u_userlist").append(ul);
    }
}
function addall()
{
    var check = $("#t_guserlist").find('input["type=checkbox"]:checked');
    if(check.size()>0)
    {
        check.each(function(){
            var span = $(this).parent('td').parent('tr').children('td').children('span.addone');
            if(!span.attr('sta'))
            {
                span.attr('sta','1');
                var ul = $("<ul>");
                var li ='<li class="u_lititle">'+span.parent('td').children('input[name="username[]"]').val()+'</li><li><span class="addone" title="移除" onclick="removeone(this);" mark="'+span.attr('mark')+'"><<</span><input type="hidden" name="userid[]" value="'+span.parent('td').children('input[name="userid[]"]').val()+'" ></li>';
                ul.html(li);
                $("#u_userlist").append(ul);
            }
        })
    }
}
function removeone(obj)
{
    if(confirm('确定移除此人员？'))
    {
        $(obj).parent('li').parent('ul').remove();
        //移除失效标识
        $("#t_guserlist").find('td span.'+$(obj).attr('mark')).removeAttr('sta');
    }
}
function removeall()
{
    if(confirm('确定移除所有人员？'))
    {
        var ul = $("#u_userlist ul");
        if(ul.size()>0)
        {
            ul.each(function(){
                $(this).remove();
                $("#t_guserlist").find('td span.'+$(this).find('li span.addone').attr('mark')).removeAttr('sta');
            })
        }
    }
}
var overDiv = 
{
    show:function()
    {
        var obj = $("#tc_center");
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