<?php
/**
 * Html模板文件
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong<751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: index.html.php,v 1.4 2012/02/16 09:54:23 lj Exp $
 */
 use lib\form\Form as Form;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?=$header?></title>
<?=Form::css();?>
</head>
<style>
.page-wrapper{overflow:hidden}
.page-content{margin:0px;overflow:auto}
.page-wrapper{overflow:hidden;padding-bottom:30px;}
.page-content{margin:0px;overflow:auto;}
.panel-body{padding-top:0px;margin-bottom:30px;}
/*table line*/
.line td{border-bottom:1px #e4e2da dashed;min-height:30px;line-height:170%;color:#000;padding:3px 5px 3px 10px;}
</style>
<body>

<div class="page-wrapper">
	<!-- begin page header-->
    <?=lib\form\Form::bread_crumb(
		$header,
		$this->config->module->moduleName,
		$navlist=array(
			array('name'=>$this->config->module->name,'method'=>'contentList')
		));
	?>
	<!-- end  page header-->

    <div class="page-content">
	<!-- begin box-content -->
	<div class="box-content">
		<!--begin content-->
		<div class="content">
			<div class="page-profile">
				<div class="row">
					<div class="col-lg-12">
						<!-- begin panel -->
						<div class="panel">
							<div class="panel-body">
                            	<form action="<?=$this->app->getMethodName()?>?action=save" method="post" name="FORM">
                                <input type="hidden" name="cid" id="cid" value="<?=$result['cid']?>" />
                                <input type="hidden" name="mid" id="mid" value="<?=$result['mid']?>" />
                                <input type="hidden" name="id" id="id" value="<?=$result['id']?>" />
                                <input type="hidden" name="guid" id="guid" value="<?=$result['guid']?>" />
                            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr class="line">
                                    <td>推荐</td>
                                    <td>
                                    <input type="radio" value="0" name="digest" <? if($result['digest']=='0')echo 'checked="checked"';?> /> 普通主题
                                    <input type="radio" value="1" name="digest" <? if($result['digest']=='1')echo 'checked="checked"';?> /> 栏目推荐
                                    <input type="radio" value="2" name="digest" <? if($result['digest']=='2')echo 'checked="checked"';?> /> 站点推荐
                                    <input type="radio" value="3" name="digest" <? if($result['digest']=='3')echo 'checked="checked"';?> /> 头条推荐
                                    </td>
                                  </tr>

                                    <tr class="line">
                                    <td>标题</td>
                                    <td><input class="input" name="title" id="title" value="<?=$result['title']?>" size="70"></td>
                                    </tr>
                                    <tr class="line">
                                    <td>alias</td>
                                    <td><input class="input" name="alias" id="alias" value="<?=$result['alias']?>" size="70">
                                      字母开头，包括a-z,A-Z，中划线，数字</td>
                                    </tr>
                                    <tr class="line">
                                    <td>标题字体</td>
                                    <td><select name="titlecolor" id="titlecolor">
<option value="">标题颜色</option>
<option value="skyblue" style="background-color:skyblue;color:skyblue" <? if($result['titlecolor']=='skyblue')echo 'selected="selected"';?>>skyblue</option>
<option value="royalblue" style="background-color:royalblue;color:royalblue" <? if($result['titlecolor']=='royalblue')echo 'selected="selected"';?>>royalblue</option>
<option value="blue" style="background-color:blue;color:blue" <? if($result['titlecolor']=='blue')echo 'selected="selected"';?>>blue</option>
<option value="darkblue" style="background-color:darkblue;color:darkblue" <? if($result['titlecolor']=='darkblue')echo 'selected="selected"';?>>darkblue</option>
<option value="orange" style="background-color:orange;color:orange" <? if($result['titlecolor']=='orange')echo 'selected="selected"';?>>orange</option>
<option value="orangered" style="background-color:orangered;color:orangered" <? if($result['titlecolor']=='orangered')echo 'selected="selected"';?>>orangered</option>
<option value="crimson" style="background-color:crimson;color:crimson" <? if($result['titlecolor']=='crimson')echo 'selected="selected"';?>>crimson</option>
<option value="red" style="background-color:red;color:red" <? if($result['titlecolor']=='red')echo 'selected="selected"';?>>red</option>
<option value="firebrick" style="background-color:firebrick;color:firebrick" <? if($result['titlecolor']=='firebrick')echo 'selected="selected"';?>>firebrick</option>
<option value="darkred" style="background-color:darkred;color:darkred" <? if($result['titlecolor']=='darkred')echo 'selected="selected"';?>>darkred</option>
<option value="green" style="background-color:green;color:green" <? if($result['titlecolor']=='green')echo 'selected="selected"';?>>green</option>
<option value="limegreen" style="background-color:limegreen;color:limegreen" <? if($result['titlecolor']=='limegreen')echo 'selected="selected"';?>>limegreen</option>
<option value="seagreen" style="background-color:seagreen;color:seagreen" <? if($result['titlecolor']=='seagreen')echo 'selected="selected"';?>>seagreen</option>
<option value="teal" style="background-color:teal;color:teal" <? if($result['titlecolor']=='teal')echo 'selected="selected"';?>>teal</option>
<option value="deeppink" style="background-color:deeppink;color:deeppink" <? if($result['titlecolor']=='deeppink')echo 'selected="selected"';?>>deeppink</option>
<option value="tomato" style="background-color:tomato;color:tomato" <? if($result['titlecolor']=='tomato')echo 'selected="selected"'?>>tomato</option>
<option value="coral" style="background-color:coral;color:coral" <? if($result['titlecolor']=='coral')echo 'selected="selected"';?>>coral</option>
<option value="purple" style="background-color:purple;color:purple" <? if($result['titlecolor']=='purple')echo 'selected="selected"';?>>purple</option>
<option value="indigo" style="background-color:indigo;color:indigo" <? if($result['titlecolor']=='indigo')echo 'selected="selected"';?>>indigo</option>
<option value="burlywood" style="background-color:burlywood;color:burlywood" <? if($result['titlecolor']=='burlywood')echo 'selected="selected"';?>>burlywood</option>
<option value="sandybrown" style="background-color:sandybrown;color:sandybrown" <? if($result['titlecolor']=='sandybrown')echo 'selected="selected"';?>>sandybrown</option>
<option value="sienna" style="background-color:sienna;color:sienna" <? if($result['titlecolor']=='sienna')echo 'selected="selected"';?>>sienna</option>
<option value="chocolate" style="background-color:chocolate;color:chocolate"<? if($result['titlecolor']=='chocolate')echo 'selected="selected"';?>>chocolate</option>
<option value="silver" style="background-color:silver;color:silver" <? if($result['titlecolor']=='silver')echo 'selected="selected"';?>>silver</option>
</select>
<input name="titleb" type="checkbox" id="titleb" value="1" <? if($result['titleb']=="1") echo 'checked="checked"';?>>粗体
<input name="titlei" type="checkbox" id="titlei" value="1" <? if($result['titlei']=="1") echo 'checked="checked"';?>>斜体
<input name="titleu" type="checkbox" id="titleu" value="1" <? if($result['titleu']=="1") echo 'checked="checked"';?>>下划线
                                        </td>
                                  </tr>
                                  <tr class="line">
                                    <td>请选择所属相关类别</td>
                                    <td>
                                        <select name="relatedcid[]" size="7" multiple>
                                        <? foreach($result['relatedCategory'] as $key=>$val){
												if($result['cid']!=$val['id']){
													$selected = '';
													if(@in_array($val['id'],$result['relatedcid']))$selected = 'selected="selected"';
													echo '<option value="'.$val['id'].'" '.$selected.'>&raquo;'.$val['name'].'</option>';
												}else{
													echo '<optgroup label="&raquo;'.$val['name'].'"></optgroup> ';
												}
                                            	//二级
												foreach($val['child'] as $ckey=>$cval){
													if($result['cid']!=$cval['id']){
														$selected1 = '';
														if(@in_array($cval['id'],$result['relatedcid']))$selected1="selected";
														echo '<option value="'.$cval['id'].'" '.$selected1.'>|---'.$cval['name'].'</option>';
													}else{
														echo '<optgroup label="|---'.$cval['name'].'"></optgroup>';
													}
													//三级
													foreach($cval['child'] as $skey=>$sval){
														if($result['cid']!=$sval['id']){
															$selected2 = '';
															if(@in_array($sval['id'],$result['relatedcid']))$selected2="selected";
															echo '<option value="'.$sval['id'].'" '.$selected2.'>|------'.$sval['name'].'</option>';
														}else{
															echo '<optgroup label="|------'.$sval['name'].'"></optgroup>';
														}
													}
												}
											}
											?>
                                        </select>
                                    </td>
                                  </tr>
                                  <tr class="line">
                                    <td>允许评论</td>
                                    <td>
                                    <select name="is_comment" id="is_comment" >
                                        <option value="1" {if $result.is_comment=="1"}selected="selected"{/if}>是</option>
                                        <option value="0" {if $result.is_comment=="0"}selected="selected"{/if}>否</option>
                                    </select>
                                      </td>
                                  </tr>

                                  <tr class="line">
                                    <td>详细</td>
                                    <td>
                                    <div>
                                    <input type="hidden" id="content" name="content" style="display: none" value="<?=$result['content']?>">
                                    <input type="hidden" id="content___Config" value="" style="display:none"/>
<iframe id="content___Frame" name="content___Frame" src="/js/plugins/fckeditor/editor/fckeditor.html?InstanceName=content&Toolbar=Default" width="650" height="420" frameborder="0" scrolling="no"></iframe></div>
                                <input type="checkbox" name="imagetolocal" value=1 /> 外部图片本地化 <br />
                                <input type="checkbox" name="selectimage" value=1 /> 自动提取第一张图片为新闻图片<br />
                                <input type="checkbox" name="autofpage" value=1 /> 自动分页处理<br />
                                <script>
                                //查看内容
                                function getContentValue()
                                {
                                var oEditor = FCKeditorAPI.GetInstance('content');
                                var acontent = oEditor.GetXHTML();
                                return acontent;
                                }
                                function setContentValue(content)
                                {
                                var oEditor = FCKeditorAPI.GetInstance('content');

                                  if ( oEditor.EditMode == FCK_EDITMODE_WYSIWYG )
                                  {
                                  oEditor.InsertHtml(content);
                                }else{
                                  alert(请切换到HTML编辑模式进行操作！);
                                }
                                }
                                </script>
                                <!--<input type=button onclick="alert(getContentValue());"> -->
                                </td>
                                </tr>
                                  <tr class="line">
                                    <td>内容摘要</td>
                                    <td><div><input type="hidden" id="intro" name="intro" value="<?=$result['intro']?>" style="display:none" /><input type="hidden" id="intro___Config" value="" style="display:none" /><iframe id="intro___Frame" name="intro___Frame" src="/js/plugins/fckeditor/editor/fckeditor.html?InstanceName=intro&amp;Toolbar=Basic" width="450" height="150" frameborder="0" scrolling="no"></iframe></div></td>
                                  </tr>

                                  <tr class="line">
                                    <td>作者</td>
                                    <td><input class="input" name="author" id="author" value="<?=$result['author']?>" size="20">
                                    <select onchange="selectValue('author',this.options[this.selectedIndex].text);">
                                        <option value="">作者</option>
                                        <?
                                        foreach($result['author_value'] as $key=>$val){
										echo '<option value="'.$key.'" label="'.$val.'">'.$val.'</option>';
										}
										?>
                                    </select></td>
                                  </tr>

                                  <tr class="line">
                                    <td>新闻来源</td>
                                    <td><input class="input" name="fromsite" id="fromsite" value="<?=$result['fromsite']?>" size="20">
                                    <select onchange="selectValue('fromsite',this.options[this.selectedIndex].text);">
                                    <option value="">来源</option>
                                    <?
									foreach($result['fromsite_value'] as $key=>$val){
									echo '<option value="'.$key.'" label="'.$val.'">'.$val.'</option>';
									}
									?>
                                    </select></td>
                                  </tr>

                                  <tr class="line">
                                    <td>相关图片</td>
                                    <td>
                                      <? if($handle=='add'){?>
                                      <img src="/images/null.gif" id="show_pic" height="96px" style="vertical-align:middle" />
                                      <? }else{ ?>
                                      <img src="<?=$result['photo']?>" id="show_pic" height="96px" style="vertical-align:middle" onerror="this.src='/images/null.gif'" />
                                      <? } ?>
                                      <input type="button" class="btn" onclick="selectImg('photo');" value="Insert">
                                      <input type="button" class="btn" onclick="removeImg('photo');" value="Remove">
                                      <input type="hidden" class="input" name="photo" id="photo" value="<?=$result['photo']?>" size="70">该字段标志着主题是否属于图文主题
                                      </td>
                                  </tr>

                                  <tr class="line">
                                    <td>外部链接</td>
                                    <td><input class="input" name="linkurl" id="linkurl" value="<?=$result['linkurl']?>" size="70">  </td>
                                  </tr>
                                  <tr class="line">
                                      <td>自定义时间</td>
                                      <td>
                                        <input type="text" name="postdate" value="<?=$result['postdate']?>" class="input" id="postdate"  size="70" /></td>
                                  </tr>
                                  <tr class="line">
                                        <td>当前Tags</td>
                                        <td><input id="tags" class="input" name="tags" size="70" value=""  onfocus="showtag();" />
                                        标签之间请使用逗号,最多5个<br />
                                        <fieldset id="tags_show" style="width:70%;display:none;"><legend>热门标签</legend><div id="hottags" style="height:80px;overflow-Y:auto;"></div></fieldset></td>
                                  </tr>
                                </table>
                                <input type="hidden" name="UrlReferer" value="<?=$result['url']?>">
                                <input type="hidden" name="aid" id="aid" value="<?=$result['aid']?>" />
                                
                                <div class="text-right pal">
                                <input type="reset" name="Submit2" value="重置" class="btn btn-default" />&nbsp;或&nbsp;
                                <input type="submit" name="Submit" value="保存" class="btn btn-success" onclick="setselectvalue()" />
                                </div>
                                </form>
							</div>
						</div>
						<!-- end panel -->
					</div>
				</div>
				
			</div>
		</div>
		<!--end content-->
	</div>
	<!-- end box-content -->
    </div>
</div>

<?=Form::js();?>
<script>
jQuery(document).ready(function () {
    "use strict";
});
</script>

<script language="javascript">
var tagsname = '';
var objts;
function IsBrowser(){
	var sAgent = navigator.userAgent.toLowerCase() ;
	if ( sAgent.indexOf("msie") != -1 && sAgent.indexOf("mac") == -1 && sAgent.indexOf("opera") == -1 )
		return "msie" ;
	if ( navigator.product == "Gecko" && !( typeof(opera) == 'object' && opera.postError ) )
		return "gecko";
	if ( navigator.appName == 'Opera')
		return "opera" ;
	if ( sAgent.indexOf( 'safari' ) != -1 )
		return "safari";
	return false ;
}

function selectImg(inputname){
	var time = new Date();
	var timestamp = time.valueOf();
	if(IsBrowser()=='msie'){
		objts=showModalDialog("/cms_content/attachList?type=image&inputtype=input&inputname="+inputname,window,'dialogWidth=650px;dialogHeight=500px;help:no;status:no;');
	}else{
		window.open("/cms_content/attachList?type=image&inputtype=input&inputname="+inputname,"selectimg","width=840,height=500,resizable=no,z-look=yes,alwaysRaised=yes,depended=yes,scrollbars=yes,left=" + (window.screen.width-840)/2 + ",top=" + (window.screen.height-500)/2);
	}
}

function removeImg(inputname){
	var obj_photo = document.getElementById(inputname);
	var obj_aid = document.getElementById('aid');
	var obj_show = document.getElementById('show_pic');
	obj_photo.value='';
	obj_aid.value='0';
	obj_show.src='/images/null.gif';
}

function selectAttach(inputname){
	var time = new Date();
	var timestamp = time.valueOf();
	if(IsBrowser()=='msie'){
		objts=showModalDialog("/admin.php?adminjob=edit&action=addattach&type=attach&inputtype=input&inputname="+inputname+"&time="+timestamp,window,'dialogWidth=650px;dialogHeight=500px;help:no;status:no;');
	}else{
		window.open("/admin.php?adminjob=edit&action=addattach&type=attach&inputtype=input&inputname="+inputname+"&time="+timestamp,"selectimg","width=840,height=500,resizable=no,z-look=yes,alwaysRaised=yes,depended=yes,scrollbars=yes,left=" + (window.screen.width-840)/2 + ",top=" + (window.screen.height-500)/2);
	}
}

function selectTids(inputname,inputtype){
	var time = new Date();
	var timestamp = time.valueOf();	
	window.open("/admin.php?adminjob=edit&action=selecttids&inputtype="+inputtype+"&inputname="+inputname+"&time="+timestamp,"sinavblogupload","width=840,height=500,resizable=no,z-look=yes,alwaysRaised=yes,depended=yes,scrollbars=yes,left=" + (window.screen.width-840)/2 + ",top=" + (window.screen.height-500)/2);

}

function add(inputname, tid, title){
	var obj = document.getElementById(inputname);
	if (optionExist(obj,tid)) {
		alert("该文章已添加");
		return false;
	}
	var length=obj.length;
	obj.options[length]=new Option(title,tid);

}

function optionExist(obj,tid){
	var isexit = false;
	for(var i=0;i<obj.options.length;i++){
		if(obj.options[i].value == tid){
			isexit = true;
			break;
		}
	}
	return isexit;
}

function moveUp(inputname){
	var obj = document.getElementById(inputname);
	with (obj){
		try {
			if(selectedIndex==0){
				options[length]=new Option(options[0].text,options[0].value);
				options[0]=null;
				selectedIndex=length-1;
			}else if(selectedIndex>0) moveG(obj,-1);
		}catch(e){}

	}
}

function moveDown(inputname){
	var obj = document.getElementById(inputname);
	with (obj){
		try {
			if(selectedIndex==length-1){
				var otext=options[selectedIndex].text;
				var ovalue=options[selectedIndex].value;
				for(i=selectedIndex; i>0; i--){
					options[i].text=options[i-1].text;
					options[i].value=options[i-1].value;
				}
				options[i].text=otext;
				options[i].value=ovalue;
				selectedIndex=0;
			}else if(selectedIndex<length-1){
				moveG(obj,+1);
			}
		} catch(e) {}
	}
}
function moveG(obj,offset){
	with (obj){
		desIndex=selectedIndex+offset;
		var otext=options[desIndex].text;
		var ovalue=options[desIndex].value;
		options[desIndex].text=options[selectedIndex].text;
		options[desIndex].value=options[selectedIndex].value;
		options[selectedIndex].text=otext;
		options[selectedIndex].value=ovalue;
		selectedIndex=desIndex;
	}
}
function del(inputname){
	var obj = document.getElementById(inputname);
	with(obj) {
		try {
			options[selectedIndex]=null;
			selectedIndex=length-1;
		}catch(e){}
	}
}

function setContentLinkValue(inputname){
	var obj = document.getElementById(inputname);
 	var returnValue = '';

	with(obj){
 		for(i=0; i <  obj.length ; i++){
			if(i==0){
				returnValue = options[i].value;
			}else{
				returnValue = returnValue + ',' + options[i].value;
			}
 		}
	}
	if(returnValue == 'undefined'){
		returnValue = '';
	}
 	return returnValue;
}
function setselectvalue(){
	var selectList =document.getElementsByTagName('select');
	var selectname;
	for(var i=0; i<selectList.length; i++){
		selectname = selectList[i]['id'];
		if(selectname !=false){
			try {
				var obj = document.getElementById(selectname+'_value');
			}catch(e){
				continue;
			}
			try {
				obj.value = setContentLinkValue(selectname);
				document.getElementById(selectname).value='';
			}catch (e) {
			}

		}
	}
}

function showtag(){
	var str='';
	tn = tagsname.split(',');
	for(i=0;i<tn.length;i++){
		str +='<a href="javascript:void(0)" onclick="SelectTag('+i+');">'+tn[i]+'</a>&nbsp;&nbsp;&nbsp;';
	}
	document.getElementById('hottags').innerHTML=str;
	document.getElementById('tags_show').style.display = '';
}

function SelectTag(id){
	tn = tagsname.split(',');
	tags = document.FORM.tags.value;
	if(tags.indexOf(tn[id])==-1 && tags.split(',').length<5){
		document.FORM.tags.value += document.FORM.tags.value ? ' , '+tn[id] : tn[id];
	}
}

function selectValue(inputname,value){
	if(value!=''){
		document.getElementById(inputname).value=value;
	}
}

function showColor(showName,inputName){
	var menu_editor = getObj("menu_editor");
	var colors = [
		'000000','660000','663300','666600','669900','66CC00','66FF00','666666','660066','663366','666666',
		'669966','66CC66','66FF66','CCCCCC','6600CC','6633CC','6666CC','6699CC','66CCCC','66FFCC','FF0000',
		'FF0000','FF3300','FF6600','FF9900','FFCC00','FFFF00','0000FF','FF0066','FF3366','FF6666','FF9966',
		'FFCC66','FFFF66','00FFFF','FF00CC','FF33CC','FF66CC','FF99CC','FFCCCC','FFFFCC'
	];
	var html = '<div id="colorbox">';
	for(i in colors){
		html += "<div unselectable=\"on\" style=\"background:#" + colors[i] + "\" onClick=\"SetC('" + colors[i] + "','" + inputName + "')\"></div>";
	}
	html += '</div>';
	menu_editor.innerHTML = html;
	if(typeof type == 'undefined'){
		click_open('menu_editor',showName,'2');
	} else{
		mouseover_open('menu_editor',showName,'2');
	}
}
function SetC(color,inputName){
	//var textValue = document.getElementById(inputName).value;
	//document.getElementById(inputName).value = "<span style=\"color:#"+color+";\">"+textValue+"</span>";
	document.getElementById(inputName).value = "#"+color;
	closep();
}

function selectTpl(name){
	window.open('/admin.php?adminjob=edit&action=selectTpl&inputname='+name,"selecttpl","width=840,height=500,resizable=no,z-look=yes,alwaysRaised=yes,depended=yes,scrollbars=yes,left=" + (window.screen.width-840)/2 + ",top=" + (window.screen.height-500)/2);
	return;
}
</script>


<script language="javascript">
var agt = navigator.userAgent.toLowerCase();
var is_ie = ((agt.indexOf("msie") != -1) && (agt.indexOf("opera") == -1));
var is_gecko= (navigator.product == "Gecko");
var top=parent.topFrame;
if(typeof(top)=='object'){
	var loadMsg=top.document.getElementById('loadMsg');
	if(loadMsg!=undefined){
		loadMsg.style.display='none';
	}
}
ifcheck = true;

function getObj(id){
	return document.getElementById(id);
}

function window_open(url){
	if(is_ie){
		showModalDialog(url,window,'dialogWidth=650px;dialogHeight=500px;help:no;status:no;');
	}else{
		window.open(url,'','width=650,height=500,status=no');
	}
}

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

function GetCookie(name){
	var searchname=name+"=";
	var offset=document.cookie.indexOf(searchname);
	if(offset==-1) return false;
	var start=offset+searchname.length;
	var end=document.cookie.indexOf(";",start);
	if(end==-1) end=document.cookie.length;
	var value=unescape(document.cookie.substring(start,end));
	return value;
}

function SetCookie(name,value,Minutes){
	var exp = new Date();
	exp.setTime(exp.getTime() + Minutes*60000);
	document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
}

function ietruebody(){
	return (document.compatMode && document.compatMode!="BackCompat") ? document.documentElement : document.body;
}
function  randomvalue(low,high){
	return Math.floor(Math.random()*(1 + high -low) + low);
}
</script>
</body>
</html>