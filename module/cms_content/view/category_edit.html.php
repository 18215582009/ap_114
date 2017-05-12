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
.page-wrapper{overflow:hidden;padding-bottom:30px;}
.page-content{margin:0px;overflow:auto;}
.panel-body{padding-top:0px;margin-bottom:30px;}
/*table line*/
.line td{border-bottom:1px #e4e2da dashed;min-height:30px;line-height:170%;color:#000;padding:3px 5px 3px 10px;}

.head {
    border-bottom: 1px solid #daebcd;
    /*border-top: 1px solid #c4d2db;
    background: #f3f8ef none repeat scroll 0 0;
    */
    color: #659b28;
    line-height: 21px;
    padding: 0 6px 2px;
    text-align: left;
}
</style>
<body>
<div class="page-wrapper">
    <div class="page-content">
    <!-- begin page header-->
    <?=lib\form\Form::bread_crumb(
        $header,
        $this->config->module->moduleName,
        $navlist=array(
            array('name'=>$this->config->module->name,'method'=>'contentList')
        ));
    ?>
    <!-- end  page header-->

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
                                    <input type="hidden" name="id" id="id" value="<?=$cInfo['id']?>" />
                                    <div class="head">基本信息[必须填写]</div>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">

                                        <tr class="line">
                                            <td width="20%">上级栏目</td>
                                            <td width="80%"><select name="parent_id" id="parent_id" class="input">
                                                    <option value="0">站点根分类</option>
                                                    <?php foreach($category as $item){ ?>
                                                        <option value="<?php echo $item['id']; ?>"
                                                        <?php if($item['id']==$pid) echo "selected";?> >&raquo;<?php echo $item['name']; ?>
                                                        </option>
                                                        <?php
                                                        if(count($item['child'])>0){
                                                            foreach($item['child'] as $item2){
                                                                if($item2['id']==$pid){$select="selected";}else{$select="";}
                                                                echo "<option value='".$item2['id']."' ".$select.">|---".$item2['name']."</option>";
                                                            }
                                                        }
                                                        ?>
                                                    <?php } ?>
                                                </select></td>
                                        </tr>
                                        <tr class="line">
                                            <td>栏目名称</td>
                                            <td><input name="name" type="text" class="input" id="name" value="<?php echo @$cInfo['name']; ?>"></td>
                                        </tr>
                                        <tr class="line">
                                            <td>栏目类型</td>
                                            <td>
                                                <input type="radio" name="type" value="1" <?php if($cInfo['type']==1) echo "checked='checked'" ?> />正常发布此栏目
                                                <input type="radio" name="type" value="0" <?php if($cInfo['type']==0) echo "checked='checked'" ?>/>屏蔽此栏目
                                            </td>
                                        </tr>
                                        <tr class="line">
                                            <td>内容模型</td>
                                            <td>
                                                <?php if($handle=='add'){ ?>
                                                    <select name="mid" id="mid" onchange="ShowSet(this.value);" >
                                                        <?php foreach($module as $mItem){
                                                            echo "<option value='".$mItem['mid']."'>".$mItem['mname']."</option>";
                                                        } ?>
                                                    </select>
                                                <?php }else{ ?>
                                                    <input type="hidden" name="fmid" id="fmid" value="<?php echo $this->mid; ?>" />
                                                    <select name="mid" id="mid" onchange="ShowSet(this.value);" disabled >
                                                        <?php foreach($module as $mItem){
                                                            if($this->mid==$mItem['mid']) $slt = "selected"; else $slt = "";
                                                            echo "<option value='".$mItem['mid']."' ".$slt.">".$mItem['mname']."</option>";
                                                        } ?>
                                                    </select>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <!--
                                              <tr>
                                                <td colspan="2"><div id='more'>
                                                    <div id='blog' style="display:none;">
                                                      <table width="100%" cellpadding="0" cellspacing="0">
                                                        <tr class="line">
                                                          <td width="20%">调用分类ID</td>
                                                          <td width="80%"><input name="bloginfo[fid]" type="text" class="input" value=""></td>
                                                        </tr>
                                                        <tr class="line">
                                                          <td>内容页浏览方式</td>
                                                          <td><input name="bloginfo[viewtype]" type="radio" value="1" >
                                                            在CMS站点浏览
                                                            <input name="bloginfo[viewtype]" type="radio" value="0" CHECKED>
                                                            转入blog浏览</td>
                                                        </tr>

                                                        <tr class="line">
                                                          <td>是否只调用精华</td>
                                                          <td><input name="bloginfo[digest]" type="radio" value="1" CHECKED />
                                                            是
                                                            <input name="bloginfo[digest]" type="radio" value="0"  />
                                                            否 </td>
                                                        </tr>
                                                        <tr class="line">

                                                            <td>调用时间限制</td>
                                                            <td><input name="bloginfo[postdate]" type="text" class="input" id="bloginfo[postdate]" value="" size="5" />
                                                                天 </td>
                                                            </tr>
                                                        <tr class="line">
                                                            <td>&nbsp;</td>

                                                            <td>&nbsp;</td>
                                                        </tr>

                                                      </table>
                                                    </div>
                                                    <div id='bbs' style="display:none;">
                                                      <table width="100%" cellpadding="0" cellspacing="0">
                                                        <tr class="line">
                                                          <td width="20%">调用板块ID</td>
                                                          <td width="80%"><input class="input" name="bbsinfo[fid]" type="text" value="">
                                                            (可以用逗号,区分多个版块id,如果留空调用所有板块)</td>

                                                        </tr>
                                                        <tr class="line">
                                                          <td>内容页浏览方式</td>
                                                          <td><input name="bbsinfo[viewtype]" type="radio" value="1" >
                                                            在CMS站点浏览
                                                            <input name="bbsinfo[viewtype]" type="radio" value="0" CHECKED>
                                                            转入论坛浏览</td>
                                                        </tr>

                                                        <tr class="line">
                                                          <td>是否只调用精华</td>
                                                          <td><input name="bbsinfo[digest]" type="radio" value="1" CHECKED>
                                                            是
                                                            <input name="bbsinfo[digest]" type="radio" value="0" >
                                                            否 </td>
                                                        </tr>
                                                        <tr class="line">

                                                          <td>主题排序方法</td>
                                                          <td><input name="bbsinfo[taxis]" type="radio" value="1" >
                                                            主题时间
                                                            <input name="bbsinfo[taxis]" type="radio" value="0" >
                                                            回复时间 </td>
                                                        </tr>
                                                        <tr class="line">
                                                          <td>调用帖浏览数</td>

                                                          <td><input name="bbsinfo[hits]" type="text" class="input" id="bbs[hits]" value="" size="5" />
                                                            (只调用浏览数大于这个值的主题,留空不作限制)</td>
                                                        </tr>
                                                        <tr class="line">
                                                          <td>调用帖回复数</td>
                                                          <td><input name="bbsinfo[replies]" type="text" class="input" id="bbs[replies]" value="" size="5" />
                                                            (只调用回复数大于这个值的主题,留空不作限制)</td>

                                                        </tr>
                                                        <tr class="line">
                                                          <td>调用主题时间段</td>
                                                          <td><input name="bbsinfo[postdate]" type="text" class="input" id="bbs[postdate]" value="" size="5" />
                                                            (只调用多少天以内发表的主题,留空不作限制)</td>
                                                        </tr>
                                                        <tr class="line">
                                                          <td>调用回复时间段</td>

                                                          <td><input name="bbsinfo[lastpost]" type="text" class="input" id="bbs[lastpost]" value="" size="5" />
                                                            (只调用多少天以内回复过的主题,留空不作限制) </td>
                                                        </tr>
                                                      </table>
                                                    </div>
                                                    <div id='link' style="display:none;">
                                                      <table width="100%" cellpadding="0" cellspacing="0">
                                                           <tr class="line">

                                                                <td width="20%">连接地址</td>
                                                                <td width="80%"><input name="link" type="text"  class="input" id="linkurl" value="" size=50 /> (连接到一个外部网址)</td>
                                                             </tr>
                                                      </table>
                                                      </div>
                                                  </div></td>
                                              </tr>
                                        -->
                                        <!--
                                              <tr class="line">
                                                <td>栏目类型</td>
                                                <td><input name="iflink" type="radio" value="0" onclick="document.getElementById('link').disabled='disabled';document.getElementById('advance').style.display='';"  />
                                                  内部栏目
                                                  <input type="radio" name="iflink" value="1"  onclick="document.getElementById('link').disabled='';document.getElementById('advance').style.display='none';"  />
                                                  外部栏目 </td>
                                              </tr>
                                        -->
                                    </table>
                                    <div class="head">高级模式[选择性填写]</div>
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <!--
                                        <tr class="line">
                                          <td width="20%">唯一标识符</td>
                                          <td width="80%"><div style="float:right; padding-right:65px;">(可以使用该标识符代替CID进行CMS内容调用,)</div><input name="varname" type="text" class="input" id="varname" value="" /></td>
                                        </tr>
                                        -->
                                        <tr class="line">
                                            <td width="20%">栏目简介</td>
                                            <td width="80%">
                                                <div><input type="hidden" id="description" name="description" value="<?=$cInfo['description']?>" style="display:none" /><input type="hidden" id="description___Config" value="" style="display:none" /><iframe id="description___Frame" name="description___Frame" src="/js/plugins/fckeditor/editor/fckeditor.html?InstanceName=description&amp;Toolbar=Basic" width="450" height="150" frameborder="0" scrolling="no"></iframe></div>
                                                <span>(栏目的简单描述，可用于Rss输出栏目摘要)</span>
                                            </td>
                                        </tr>
                                        <tr class="line">
                                            <td>栏目Meta关键字</td>
                                            <td>
                                                <input name="metakeyword" type="text" class="input" id="metakeyword" value="<?php echo @$cInfo['metakeyword']; ?>" size="50" /><span>(有利于搜索引擎的搜索)</span>
                                            </td>
                                        </tr>
                                        <tr class="line">
                                            <td>栏目Meta描述</td>
                                            <td>
                                                <input name="metadescrip" type="text" class="input" id="metadescrip" value="<?php echo @$cInfo['metadescrip']; ?>" size="50" /><span>(有利于搜索引擎的搜索)</span>
                                            </td>
                                        </tr>
                                        <!--
                                        <tr class="line">
                                          <td>内容页发布形式</td>
                                          <td><div style="float:right; padding-right:100px;">(是否将栏目文章自动生成Html文件)</div>
                                            <input type="radio" name="htmlpub" value="0" >
                                            动态发布
                                            <input type="radio" name="htmlpub" value="1" CHECKED>
                                            静态发布 </td>
                                        </tr>
                                        <tr class="line">
                                          <td>列表页发布形式</td>
                                          <td><div style="float:right; padding-right:100px;">(是否将栏目列表自动生成Html文件)</div>
                                            <input type="radio" name="listpub" value="0"  />
                                            动态发布
                                            <input type="radio" name="listpub" value="1" CHECKED />
                                            静态发布 </td>
                                        </tr>
                                        <tr class="line">
                                          <td>静态列表页更新时间</td>
                                          <td><div style="float:right; padding-right:65px;">(是否将静态栏目列表页栏目首页自动更新)</div>
                                          <input name="autoupdate" type="text" class="input" id="autoupdate" value="" size="5" />
                                          分钟(0表示关闭)</td>
                                        </tr>
                                        <tr class="line">
                                          <td>是否自动发布</td>
                                          <td><div style="float:right; padding-right:65px;">(添加文章之后自动发布出去还是手动发布)</div>
                                            <input name="autopub" type="radio" value="1" CHECKED>
                                            自动发布
                                            <input type="radio" name="autopub" value="0"  />
                                            手动发布 </td>
                                        </tr>
                                        <tr class="line">
                                          <td>是否允许评论</td>
                                          <td><input type="radio" name="comment" value="1" CHECKED />
                                            开启评论
                                            <input type="radio" name="comment" value="0"  />
                                            关闭评论</td>
                                        </tr>
                                        <tr class="line">
                                          <td>是否开启文章水印</td>
                                          <td><div style="float:right; padding-right:200px;">(防止文章被复制)</div>
                                            <input type="radio" name="copyctrl" value="1"  />
                                            开启水印
                                            <input type="radio" name="copyctrl" value="0" CHECKED />
                                            关闭水印</td>
                                        </tr>
                                        <tr class="line">
                                          <td>静态文件发布点</td>
                                          <td><input name="path" type="text" class="input" id="path" value="" size="50" />
                                            (相对于站点www目录下的子目录,最后不要加斜杠,请不要随意更改)</td>

                                        </tr>
                                        -->
                                        <tr class="line">
                                            <td>栏目首页模板</td>
                                            <td>
                                                <input name="tpl_index" type="text" class="input" id="tpl_index" value="<?php echo @$cInfo['tpl_index']; ?>" size="50" />
                                                <button class="button" name="Submit2" onclick="selectTpl('list');">选择模版</button>
                                            </td>
                                        </tr>
                                        <tr class="line">
                                            <td>内容页模板</td>
                                            <td>
                                                <input name="tpl_content" type="text" class="input" id="tpl_content" value="<?php echo @$cInfo['tpl_content']; ?>" size="50" />
                                                <button class="button" name="Submit22" onclick="selectTpl('content');">选择模版</button>
                                            </td>
                                        </tr>
                                        <!--当前版本暂不支持自定义名
                                    <tr class="line">
                                    <td>首页文件名</td>
                                    <td><input name="file_index" type="text" class="input" id="file_index" value="">
                                    (例如index.html)</td>
                                    </tr>
                                    <tr class="line">
                                    <td>内容页文件名命名规则</td>
                                    <td><input name="file_content" type="text"  class="input" id="file_content" value="">
                                    （）</td>
                                    </tr>
                                    <tr class="line">
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    </tr>
                                    -->
                                    </table>

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
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.4"></script>
<script>
jQuery(document).ready(function () {
    "use strict";
	
	$('.selectpicker').selectpicker({
		iconBase: 'fa',
		tickIcon: 'fa-check'
	});

	
});

function vk(){
	$("#opform").submit();	
	//$("#opbtn").click();
}
function cancel(){
	prompt('您确认放弃操作嘛？','warning');
}

</script>
</body>
</html>
