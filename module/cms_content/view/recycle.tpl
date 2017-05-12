<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>LD-recycle</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<link href="../../admin/css/admin.css" rel="stylesheet" type="text/css" />
<div class="t" style="margin-top:5px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr class="tr4">
    <td style="text-align:left">
	<form action="/admin/column/recycle.php" method="get" name="show">
	&nbsp;栏目:&nbsp;
	<select name="cid" onchange="javascript:this.form.submit();">
		{foreach item=contact from=$menu}
			<option value="{$contact.cid}" {if $contact.cid==$cid}selected="selected"{/if}>&raquo;{$contact.name}</option>
			{foreach item=item from=$contact.child}
			<option value="{$item.cid}" {if $item.cid==$cid}selected="selected"{/if}>|---{$item.name}</option>
			{/foreach}
		{/foreach}
	</select>&nbsp;
	标题关键字搜索: &nbsp;
      <input type="text" name="title" value="{$title}" id="title" />&nbsp;&nbsp;
      <input type="submit" name="Submit2" value="显示" class="btn" />
	  </form>
		<!--
		<input type="button" value="清空栏目内容" class="btn" onclick="javascript:if(confirm('确定要清空本栏目的所有项目?'))window.location='/admin.php?adminjob=recycle&action=del&cid=9';" /> <input type="button" value="还原栏目内容" class="btn" onclick="javascript:if(confirm('确定要还原本栏目的所有项目?'))window.location='/admin.php?adminjob=recycle&action=undo&cid=9';"/>
		-->
	  </td>

  </tr>
</table>
</div>
<form action="/admin.php?adminjob=recycle" method="post" name="list">
<div class="t">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr class="head">
    <td colspan="8"><div style="float:right">内容合计 {$count}  条</div>{$className} 回收站</td>
  </tr>
  <tr class="tr2">
    <td>序号</td>
    <td>标题</td>
    <td>发布者</td>
    <td>删除人</td>
    <td>删除时间</td>
    <td>操作</td>
  </tr>
{section name=a loop=$recycleList}
  <tr class="tr3 t_one">
    <td><input name="tids[]" type="checkbox" id="tids[]" value="{$recycleList[a].id}" />{$recycleList[a].id}</td>
    <td>{$recycleList[a].title}</td>
		<td>{$recycleList[a].publisher}</td>
    <td>{$recycleList[a].admin}</td>
    <td>{$recycleList[a].deltime|date_format:'%Y-%m-%d'}</td>
    <td>
<a href="recycle.php?action=del&sp={fp cid=$recycleList[a].cid id=$recycleList[a].id  mid=$recycleList[a].mid}"><img src="/admin/images/del.gif" align="absmiddle" title="删除" onClick="return confirm('您确定要删除此内容？');" /></a>
<a href="recycle.php?action=undo&sp={fp cid=$recycleList[a].cid id=$recycleList[a].id}"><img src="/admin/images/update.gif" align="absmiddle" title="还原" onClick="return confirm('您确定要还原此内容？');" /></a>
</td>
  </tr>
{/section}
</table>
</div>
<div class="t">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr class="tr4">
    <td>
	<!--doto
	操作:  
	  <select name="action" id="action">
      <option value="del"  selected="selected">清空内容</option>
      <option value="undo">还原内容</option>
      </select>
      <input name="cid" type="hidden" id="cid" value="9" />
    <input type="button" name="Submit3" value="全选" class="btn" onclick="CheckAll(document.list);" />
    <input type="submit" name="Submit4" value="提交" class="btn" onclick="return whole(document.list);" /></td>
	-->
    <td style="text-align:right">{$splitPageStr}</td>
  </tr>
</table>
</div>
</form>
{include file="../tpl/admin/footer.tpl"}
{literal}
<script language="javascript">
var top=parent.topFrame;
if(typeof(top)=='object'){
	var loadMsg=top.document.getElementById('loadMsg');
	if(loadMsg!=undefined){
		loadMsg.style.display='none';
	}
}

ifcheck = true;

function CheckAll(form){
	for (var i=0;i<form.elements.length-2;i++){
		var e = form.elements[i];
		if(e.type=='checkbox') e.checked = ifcheck;
	}
	ifcheck = ifcheck == true ? false : true;
}

var selectCheck = 0;
function whole(form){
	for (var i=0;i<form.elements.length-2;i++){
		var e = form.elements[i];
		if(e.type=='checkbox'){
			if(e.checked==true) selectCheck++;
		}
	}
	if(selectCheck<=0){
		alert("请选择操作对象");
		return false;
	}
}

</script>
{/literal}