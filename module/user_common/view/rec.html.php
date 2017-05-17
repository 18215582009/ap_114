<?php
use lib\form\Form;
/**
 * Html模板文件
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong<751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: index.html.php,v 1.4 2012/02/16 09:54:23 lj Exp $
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>为您推荐-个人中心</title>
    <?=Form::cssmin();?>
    <link rel='stylesheet' href='/theme/client/css/user_center.css' type='text/css' media='screen' />
    <!-- Theme CSS -->
    <link href="/theme/agency/css/agency.css" rel="stylesheet">
</head>
<body class="font-source-sans-pro sidebar-color-white">
<div class="fluid">
    <?php include '../../user_center/view/navigation.html.php';?>

    <div id="wrapper"><!--BEGIN PAGE WRAPPER-->
        <div id="page-wrapper">

            <!--BEGIN SIDEBAR MAIN-->
            <?php include '../../user_center/view/left_easy.html.php';?>
            <!--END SIDEBAR MAIN-->

            <!--BEGIN PAGE CONTENT-->
            <div class="page-content"><!--BEGIN TITLE & BREADCRUMB PAGE-->
                <!-- begin page header-->
                <?=lib\form\Form::bread_crumb(
                    '为你推荐',
                    'user_common');
                ?>
                <!-- end  page header-->
                <div class="box-content"><!--BEGIN CONTENT-->
                    <div class="content">
                        <div class="row text-center">
                            <div class="services-list clearfix">
                                <div class="col-sm-4 step">
                                    <img src="/theme/client/img/user-center-sale.png" alt="闪电卖房">
                                    <h4 class="text-uppercase"><strong>闪电卖房</strong></h4>
                                    <p class="lead">为您提供安全、便捷的房屋出售服务.</p>
                                    <br>
                                </div>
                                <div class="col-sm-4 step">
                                    <img src="/theme/client/img/user-center-rent.png" alt="出租合租">
                                    <h4 class="text-uppercase"><strong>出租 &amp; 合租</strong></h4>
                                    <p class="lead">方便、快捷的发布您的出租需求.</p>
                                    <br>
                                </div>
                                <div class="col-sm-4 step">
                                    <img src="/theme/client/img/user-center-guide.png" alt="购房指南">
                                    <h4 class="text-uppercase"><strong>购房指南</strong></h4>
                                    <p class="lead">提供新房、二手房买卖等权威指南.</p>
                                    <br>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>编号(自编号)</th>
                                        <th>房源基本信息</th>
                                        <th>区域</th>
                                        <th>房屋状态</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <? foreach($esf_house as $info){ ?>
                                        <? $url=""; if($info['house_type'] == 1){$url="/rent/detail?id=".$info['id'];}else{$url="/sale/detail?id=".$info['id'];} ?>
                                        <tr>
                                            <td><?=$info['id']?></td>
                                            <td>
                                                <p><a href="<?=$url?>" target="_blank"><?=$info['title']?></a> <? if(!empty($info['img_path'])){echo "<font color='#FF6600'>[图]</font>";} ?><? if($info['shi'] == 0){}else{ ?> <?=$info['shi']?>室<?=$info['ting']?>厅<?=$info['wei']?>卫<?}?>
                                                    <?=$info['total_area']?>m² <font color="#FF0000"><?=round($info['price'])?></font><?=$info['house_type']==1?"元/月":"万元"?></p>
                                            </td>
                                            <td>
                                                <? if(isset($this->config->borough_option[$info['borough']])){echo $this->config->borough_option[$info['borough']];}?> <?=$info['address']?>
                                            </td>
                                            <td><span class="label label-sm label-success"><?=$info['flag']==0?"无效":"有效"?></span></td>
                                            <td>
                                                <a href="<?=$url?>" target="_blank">查看</a>
                                            </td>
                                        </tr>
                                    <? } ?>
                                    </tbody>
                                </table>
                                <div id="pagination">
                                    <?=$pageNation ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--END CONTENT-->
                </div>
            </div>
            <!--END PAGE CONTENT-->
        </div>
        <!--END PAGE WRAPPER-->
    </div>
    <!--BEGIN FOOTER-->
    <!--END FOOTER-->
</div>
<?
$jsArr = array(
    "/js/plugins/artDialog/artDialog.source.js?skins=default",
    "/js/plugins/artDialog/plugins/iframeTools.js"
);
Form::jsmin($jsArr);
?>

<script>
    jQuery(document).ready(function () {
        "use strict";
        JQueryResponsive.init();
        Layout.init();
        //page_pricing_table.init();
        //$("#main").height($(window).height()-60);
    });

    jQuery(document).ready(function () {
        index.init();
    });

</script>
</body>
</html>
