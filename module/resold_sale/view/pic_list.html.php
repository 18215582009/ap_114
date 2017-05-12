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
<link rel="stylesheet" href="/js/vendor/lightbox/css/lightbox.css" type="text/css" media="screen">
</head>
<style>
.page-content {
    margin: 0px;
}
.panel-body{padding-top:0px}
</style>
<body>
<div class="page-wrapper">

<div class="page-content">
    <!-- begin page header-->
    <?=lib\form\Form::bread_crumb(
        $header,
        $this->config->module->moduleName,
        $navlist=array(
            array('name'=>$this->config->module->name,'method'=>'index')
        ));
    ?>
    <!-- end  page header-->
    
    <!-- begin box-content -->
    <div class="box-content">
        <!--begin content-->
        <div class="content">
        <!--end tabbable-->
        <div class="tabbable-line-wrapper">
            <div class="tabbable-line">
                <?=$tab?>
                <div class="tab-content">
                    <div id="default" class="tab-pane active">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- begin panel -->
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="gallery-pages">
                                            <ul class="list-filter list-unstyled" style="float: left;">
                                                <li class="filter active" data-filter="all">All</li>
                                                <? foreach($this->config->pic_option as $key=>$val){
                                                echo '<li class="filter" data-filter=".pic'.$key.'">'.$val.'</li>';
                                                } ?>
                                            </ul>
                                            <div class="action-group btn-group pull-right mtm mbm">
                                                <button class="btn btn-success mrm" onclick="addPic(<?=$esf_id?>)"><i class="fa fa-upload mrs"></i>上传</button>
                                                <button class="btn btn-default"><i class="fa fa-trash-o mrs"></i>删除</button>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="row mix-grid mtl">
                                                <? foreach($list as $key=>$val){ ?>
                                                <div class="col-md-4 col-lg-3 mix pic<?=$val['code']?>" style="display: inline-block;">
                                                    <div class="thumbnail">
                                                    <div class="caption" style="display: none;">
                                                        <h4><?=$val['title']?></h4>
                                                        <p><?=$val['des']?></p>
                                                        <p>
                                                            <? if($val['is_show']==1){ ?>
                                                                <a class="label label-default mix-zoom mrs" href="/resold_sale/setShow?attach_id=<?=$val['attach_id']?>&esf_id=<?=$val['esf_id']?>&pic_id=<?=$val['id']?>&set=0" >取消</a>
                                                            <?}else{?>
                                                                <a class="label label-danger mix-zoom mrs" href="/resold_sale/setShow?attach_id=<?=$val['attach_id']?>&esf_id=<?=$val['esf_id']?>&pic_id=<?=$val['id']?>&set=1" >显示</a>
                                                            <?}?>
                                                            <a class="label label-success mrs" href="javascript:;"  onclick="editPic(<?=$esf_id?>,<?=$val['attach_id']?>)"data-original-title="Save as">编辑</a>
                                                            <a class="label label-default" href="delpic?attach_id=<?=$val['attach_id']?>&esf_id=<?=$val['esf_id']?>" data-original-title="Save as">删除</a>
                                                            <a class="label label-danger mix-zoom mrs" data-lightbox="image-1" rel="tooltip" href="<?=$val['url']?>" >查看</a>
                                                        </p>
                                                    </div>
                                                    <img alt="..." src="<?=$val['url']?>">
                                                    <? if($val['is_show']==1){ ?>
                                                    <div class="thumbnailInfo" style="position:absolute;right: 0;bottom: 0">
                                                        <img src="/images/sys_icons/icon64_succeed.png">
                                                    </div>
                                                    <?}?>
                                                    </div>
                                                </div>
                                                <? } ?>
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <ul class="pagination pull-right">
                                                <?=$splitPageStr?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- end panel -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end tabbable-->
        </div>
        <!--end content-->
    </div>
    <!-- end box-content -->
</div>
</div>

<?=Form::js();?>
<!--LOADING SCRIPTS FOR PAGE-->
<script src="/js/jquery.mixitup.js"></script>
<script src="/js/vendor/lightbox/js/lightbox.min.js"></script>
<script src="/js/page-gallery.js"></script>


<script>
jQuery(document).ready(function () {
    "use strict";
    
    page_gallery.init();
});

function addPic(esf_id)
{
    art.dialog.open('/resold_sale/addPic?esf_id='+esf_id,{
        title: '',
        width: '85%',
        height: '90%',
        lock: 'true',
        esc: 'false',
        close: function(){
            //重新刷新表格数据;
            return true;   
        }
    },false);
}

function editPic(esf_id,attach_id)
{
    art.dialog.open('/resold_sale/editPic?esf_id='+esf_id+'&attach_id='+attach_id,{
        title: '',
        width: '85%',
        height: '90%',
        lock: 'true',
        esc: 'false',
        close: function(){
            //重新刷新表格数据;
            return true;   
        }
    },false);
}

function setShow(pic_id,project_id) {
    $.ajax({
        type: "POST",
        url: "/fc_project/ajaxSetShow",
        data: "picid="+pic_id+"&project_id="+project_id,
        success: function(data){

        }
    });
}
</script>
</body>
</html>
