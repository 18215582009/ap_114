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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>上传下载文件</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<script src="/js/showDiv.js" type="text/javascript" language="javascript"></script>
<?=Form::css();?>
<style>
div#qTip {
 padding: 3px;
 border: 1px solid #8394a5;
 border-right-width: 2px;
 border-bottom-width: 2px;
 display: none;
 background: #f0f4f8;
 color: #8394a5;
 font: 12px Verdana, Arial, Helvetica, sans-serif;
 line-height:22px;
 text-align: left;
 position: absolute;
 z-index: 1000;
}
a{cursor:pointer}
.page-content {
    margin: 0px;
}
.input {
    border: 1px solid #7f9db9;
    padding: 2px 0 2px 1px;
}

</style>
<base target="_self">
<script language="javascript">
var	ftpweb = '';
var weburl ="http://<?=$this->config->domain;?>";
var inputname = "<?php echo isset($_GET['inputname'])?$_GET['inputname']:'photo'; ?>";
var inputtype = "<?php echo isset($_GET['inputtype'])?$_GET['inputtype']:'input'; ?>";
var attach_id = 'aid';


function insertImg(aid,filename,type,imgtype){
	var imgsrc;
	if (type) {
		//imgsrc = ftpweb+"/"+filename;
		imgsrc = "download.php?id=" + aid;
	}else {
		filename = filename.replace(".",imgtype);
		imgsrc = filename;
	}
	
	if(window.dialogArguments){
		var win = window.dialogArguments;
	}else{
		var win = window.opener;
	}
	//var input = window.opener.document.getElementsByName(inputname);
	if(inputtype=='editor'){
		win.document.getElementById(inputname).value=imgsrc;
		//win.parent.dialogArguments.document.getElementById('aid').value+=','+aid;
	}else if(inputtype=='input'){
		win.document.getElementById(inputname).value=imgsrc;
		win.document.getElementById(attach_id).value=aid;
		win.document.getElementById('show_pic').src=imgsrc;
	}
	window.close();
}

function goclick(element){
	if(document.all){
		parent.document.getElementById(element).click();
	}else{
		var evt = parent.document.createEvent("MouseEvents");
		evt.initEvent("click",true,true);
		parent.document.getElementById(element).dispatchEvent(evt);
	}
}

function notice() {//通知用户文件上传成功 
		document.getElementById('msg').style.display = 'none';
		goclick("reload");
		alert('文件上传成功！');
}

function notice_false() {//通知用户文件上传失败
		document.getElementById('msg').style.display = 'none';
		goclick("reload");
		alert('你没有上传权限！');
} 

</script>
<body onkeydown="if (event.keyCode==116){reload.click();}">
<a id="reload" href="attachList?type=<?=$_GET['type']; ?>&inputtype=<?=$_GET['inputtype']; ?>&inputname=<?=$inputname; ?>" style="display:none">reload...</a>


<div class="page-wrappers">

<div class="page-content">
<div class="box-content">
	<div class="content">
    	<div class="row">
        <div class="col-md-12">
            <div class="panel">
            	
                <div class="panel-heading">
                    <div class="caption">
                    <i class="fa fa-home"></i>&nbsp;附件管理</div>
                    <!-- begin button-content -->
                    <div class="btn-group pull-right mts" style="margin:0;padding:0;">
                    	<form class="navbar-form navbar-left" action="attachAdd" method="post" name="upload" target="uploadFrame" enctype="multipart/form-data">
                        <input name="type" type="hidden" id="type" value="<?php echo $_GET['type']; ?>" />
                        <div class="form-group">
                    	<label>上传</label>
                        <input name="file" type="file" class="form-control input" />
                        </div>
                        <div class="form-group">
                        <label>描述：</label>
                        <input type="text" name="fileintro" class="form-control input" />
                        </div>
                       	<input type="submit" name="Submit" value=" 上传 " class="btn btn-success" onclick="javascript:document.getElementById('msg').style.display = '';" />
                    	</form>
                    </div>
                    
                    <!-- end button-content -->
                </div>
                
                <div class="panel-body">
                    <div id="msg" style="border:#69788c 1px solid; background-color:#fdfdfd;padding:3px; width:300px;position:absolute; top:100px; left:150px; display:none;">
                    <div style="height:20px; padding:3px;"><img src="/images/ing.gif" align="absmiddle" /> 上传中，请耐心等待.....</div></div>
                    <div class="row">
                    <table width="100%" class="table table-hover-color">
                    	<thead>
                            <tr>
                                <th>文件名</th>
                                <th>描述</th>
                                <th>插入</th>
                                <th>文件大小</th>
                                <th>上传时间</th>
                            </tr>
                        </thead>
                        <tbody>
						<? foreach($attach as $item){?>
                        <tr class="tr3">
                            <td>
                            <?
                                if($type=='image'){
                                    echo "<img src='/images/img.gif' width='16' height='16' hspace='5' align='absmiddle' />";
									echo '<a href="javascript:void(0);" img="'.str_replace(".", "_s.", $item['filepath']).'" >'.$item['filepath'].'</a>';
                                }else{
                                    echo "<img src='/images/file/doc.gif' width='16' height='16' hspace='5' align='absmiddle' />";
									echo '<a href="'.$item['filepath'].'">'.$item['filepath'].'</a>';
                                } 
                            ?>
                            </td>
                            <td><?=$item['fileintro']?></td>
                            <td>
                            <? if($type=='image'){ ?>
                            <a herf="javascript:;" onClick="insertImg(<?=$item['aid'];?>,'<?=$item['filepath']; ?>',<?=$filetype?>,'.');">原图</a>
                            <a herf="javascript:;" onClick="insertImg(<?=$item['aid'];?>,'<?=$item['filepath']?>',<?=$filetype?>,'_m.');">中图</a>
                            <a herf="javascript:;" onClick="insertImg(<?=$item['aid'];?>,'<?=$item['filepath']?>',<?=$filetype?>,'_s.');">小图</a>
                            <? }else{ ?>
                            <a herf="javascript:;" onClick="insertImg(<?=$item['aid'];?>,'<?=$item['filepath']?>',<?=$filetype?>,'.');">插入</a>
                            <? } ?>
                            </td>
                            <td><?=$item['size']; ?> KB<br /></td>
                            <td><?=date('Y-m-d H:i:s',$item['uploadtime']); ?><br /></td>
                        </tr>
                        <? } ?>
                        </tbody>
                    </table>
                    </div>
                    
                    <div class="row">
                        <ul class="pagination pull-right">
                            <?=$splitPageStr?>
                        </ul>
                    </div>
                </div>
            </div><!-- panel end -->
        </div>
        </div>
      </div>
</div>
</div>

</div>

<iframe name="uploadFrame" style="display:''" width="0"></iframe>