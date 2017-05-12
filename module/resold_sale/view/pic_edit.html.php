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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?=$header?></title>
<?=Form::css();?>
</head>
<style>
.page-content {
    margin: 0px;
}
.bootstrap-select.btn-group:not(.input-group-btn), .bootstrap-select.btn-group[class*="span"]{ margin-bottom:0px;}
</style>
<body>
<div class="page-wrapper">

<div class="page-content">
  <!-- begin box-content -->
  <div class="box-content">
      <!--begin content-->
      <div class="content">
        <form action="<?=$handle?>Pic?action=save" id="opform" name="opform"  method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?=$Info['id']?>" name="id" id="id" />
        <input type="text" value="<?=$Info['esf_id']?>" name="esf_id" id="esf_id" style="display:none;ßß">
          <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-heading">
                    <div class="caption"><?=$header?></div>
                    <div class="pull-right"><?=Form::btn_alert('Pic',$handle);?></div>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-4">
                        <?=Form::input('title',$Info['title'],$handle,'图片名称');?>
                    </div>
                         
                    <div class="col-md-4">
                         <?=Form::select('code',$this->config->pic_option,empty($Info['code'])?0:$Info['code'],$handle,'图片类型');?>
                    </div>
                         
                    <div class="col-md-4">
                         <?=Form::radio('flag',$this->config->flag_option,empty($Info['flag'])?0:$Info['flag'],$handle,'是否有效');?>
                    </div>
                    </div>
                  <div class="row">
                       
                <? if($handle="add"){  ?>

                    <div class="col-md-4">
                            <div class="form-group">
                            <label class="control-label" for="total_apa">户型图</label>
                            <input type="file"  value="" placeholder="请上传户型图" name="url" id="url" class="form-control " />
                            </div>
                        </div>

               <?} else {?>
                 <div class="col-md-4" >
                            <div class="thumbnail">
                                <img src="<?=empty($Info['url'])?'/images/pic_default.jpg':$Info['url'];?>">
                            </div>
                 </div>
               <? } ?>
                        <div class="col-md-12">
                        <?=Form::textarea('des',$Info['des'],$handle,'类型(图)描述');?>
                        </div>
                    </div>
                    
                    
                    
                </div>
              </div>
            </div>
          </div>
           
            
    </form> 
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
