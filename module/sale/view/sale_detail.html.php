<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><? if(!empty($sale_detail[0]['title'])){echo $sale_detail[0]['title'];}else{$this->loadModel('sale');$title = $this->sale->title($sale_detail[0]);echo $title['title'].$title['price'];
        }?>_<?=$sale_detail[0]['reside'] ?>_二手房列表_<?=$this->config->siteName?></title>

    <!-- Bootstrap Core CSS -->
    <link href="/js/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Plugin Css -->
    <link href="/js/vendor/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/css/mtek_font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/css/fonts/font-lineicons.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="/js/vendor/vlightbox/vlb_files1/vlightbox1.css" type="text/css" />
    <link rel="stylesheet" href="/js/vendor/vlightbox/vlb_files1/visuallightbox.css" type="text/css" media="screen" />

    <!-- Theme CSS -->
    <link href="/theme/agency/css/agency.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<style>
    .tit-name {font-size: 22px;  font-family: Microsoft YaHei;  font-weight: bold;  line-height: 30px;  }
    .p_icon {background: url(../theme/agency/img/sprite_8_dy_2.png) no-repeat 0 0;}
    /* thumbs img */
    #thumbs { overflow: hidden; padding-top: 10px;}
    #thumbs img, #largeImage { /*border: 1px solid gray; padding: 4px;*/ background-color: white; cursor: pointer;}
    #largeImage{ width:100%; height:290px}
    #thumbs .picborder{float:left;border: 1px solid gray; margin-right:5px;}
    #thumbs .picborder img {float:left;width:85px;height:58px; }
    #thumbs .active{border:2px solid #74982E;padding:0;}
    #thumbs .active img{width:82px;height:56px; }
    #thumbs .rongs{ float:left; position:relative}
    #thumbs .active:before {
        border-bottom: 7px solid rgba(0, 0, 0, 0.2);
        border-left: 7px solid rgba(0, 0, 0, 0);
        border-right: 7px solid rgba(0, 0, 0, 0);
        content: "";
        display: inline-block;
        left: 37px;
        position: absolute;
        top: -7px;
    }
    #thumbs .active:after {
        border-bottom: 6px solid #74982E;
        border-left: 6px solid rgba(0, 0, 0, 0);
        border-right: 6px solid rgba(0, 0, 0, 0);
        content: "";
        display: inline-block;
        left: 38px;
        position: absolute;
        top: -6px;
    }

    /* inforTxt */
    .inforTxt{font-size:13px;color:#000}
    .inforTxt dl dt,.inforTxt dl dd{line-height: 36px;font-size:13px;font-family: "Microsoft YaHei"!important;}
    .inforTxt dl dt{font-weight:100;color:#000;}
    .inforTxt dl dd {  display: block;  float: left;  width: 175px;  }
    .inforTxt dl dt .mor_cal{  background: url('/theme/agency/img/mor_cal.png') no-repeat left center;  padding-left: 20px;  margin-left: 20px;}
    .gray9{color:#999999;}
    .gray6{color:#666666;font-size: 13px;}
    .red28b {font-size: 28px;color: #E51400;font-family: Arial;padding-right: 5px;  font-weight: bold;}
    .red20b{font-size:18px;color:#E51400;}

    /* agent css */
    .agent{background: #eee;width:100%;height: 100%}
    .agent .agent-info .iframe-img{padding:10px 0 0 20px}
    .agent .agent-info .agent-del{margin-right:20px;height:auto;}
    .agent .agent-info .p-del p.p-01 {font-size: 30px;font-weight: bold;margin:0;}
    .agent .agent-info .p-del p span {color: #888;}
    .agent .agent-info .p-del p .bold a{line-height: 20px;  height: 20px;  color: #335292;}
    .agent .agent-info .p-del p .bold a:hover {color: #f60;  text-decoration: underline;  outline: 0;}
    .identity_verify {background-position: -21px 1px;display: inline-block;width: 22px;height: 20px;margin-right: 3px;}
    .company_verify {  background-position: -53px 1px;display: inline-block;width: 22px;height: 20px;margin-right: 3px;}
    .broker_shop {height: 42px;background-color: #EEE;  line-height: 42px;padding: 0 17px;white-space: nowrap;width: 100%;border-top: 2px solid #fff;
    }
    .broker_shop a {font-size: 12px;color: #666;  }
    .broker_shop a:hover {color: #f60;  }
    .phone_top {float: left;width: 100%}
    .phone_top span {
        display: block;
        line-height: 36px;
        padding: 10px 20px 10px 66px;
        border: solid 1px #eee;
        background: url(../theme/agency/img/sprite_8_dy_1.png) no-repeat 10px 10px ;
        background-color: #f7f7f7;
        font-size: 28px;
        color: #62ab00;
    }

    /* houseInfo detail */
    .houseInfo{font-size:14px;color:#000}
    .block-title {font-size:20px;font-weight:bold;line-height:44px;margin-top:39px;padding-bottom:2px;overflow:hidden;  }
    .houseInfo-title {margin: 15px 0 16px; border-bottom: 1px solid #e6e6e6;  }
    .houseInfo-title span {float: right;font-size: 12px;margin-top: 3px;font-weight: normal;color: #999;  }
    .houseInfo .first-col {width: 340px;}
    .houseInfo .second-col {width: 240px;}
    .houseInfo .third-col {width: 240px;}
    .houseInfo a {  color: #2666b2;  font-size: 14px;  }
    .houseInfo dl{float: left;margin-bottom: 7px;font-size:13px;}
    .houseInfo dt, .houseInfo dd {float:left;line-height:36px;overflow:hidden;white-space: nowrap;text-overflow:ellipsis;font-family: "Microsoft YaHei"!important;}
    .houseInfo dl dt{font-weight:100;color:#999;padding-right: 4px;}
    .houseInfo dl dd {padding-right: 12px;float: left;}
    .houseInfo dd p {  float: left;  overflow: hidden;  white-space: nowrap;  text-overflow: ellipsis;  }
    .houseInfo .first-col dd {width: 275px; ;  }
    .houseInfo .second-col dd,.houseInfo .third-col dd {width: 133px;  }

    .map{height:300px;margin-top:10px;}
    .collection_report{color:#a5a5a5;}
    .collection_report:hover{cursor:pointer}

    .ainput{width: 388px;height: 44px;padding-left: 40px;}
    .aint{margin: 10px 40px}
    .alogin{width: 388px;height: 34px;background-color: #5cb85c;color:#fff;border:0;}
    .alogin:hover{background-color: #448d44;}
    .forget_password{margin-left: 230px;color:#60ab00;}
    .register{position:relative;float: right;left: -40px;top: -29px;}
    .register span{color:#a5a5a5;}
    .close{font-size: 30px;}
    .lhead{border-bottom:2px solid #60ab00;height: 70px};
    #landlord{width: 500px;border-radius: 0;margin-left: 70px;margin-top: 140px;}
    .modal-dialog{width: 500px;border-radius: 0;margin-left: 470px;margin-top: 140px;}
    .licon{float: left;font-size: 17px;position:relative;top:32px;left:13px;color: #828282;}
    .title{overflow: hidden;display:inline-block;text-overflow: ellipsis;white-space: nowrap;}
    .phoneyse{width: 65px;height: 40px}
    .phoneyse:hover{background-color: #00aa00;color:#fff;}
    .phoneno{width: 65px;height: 40px}
    .phoneno:hover{background-color: #00aa77;color:#fff;}

    .modal-dialog{width: 500px;border-radius: 0;margin-left: 470px;margin-top: 140px;}
    .rtoubu{width: 458px;margin-left: 20px;}
    .rtishi{margin-left: 20px;width: 458px;height: 60px;background-color: #eeeeee;}
    .rtubiao{float:left;display: inline-block;width: 40px;height: 40px;border-radius: 50%;border:2px solid #62ab00;margin: 10px 15px;text-align: center;line-height: 52px;}
    .rtubiao>span{font-size: 28px;color:#62ab00;}
    .rcontent{float: left;width: 301px;margin-top: 10px;}
    .rcontent>span{display:inline-block;}
    .rxuanzhe{width: 408px;margin-left: 30px;}
    .rxuanzhe>p{font-size: 20px;}
    .rxuanzhe>ul>li{padding-top: 15px;}
    .checkbox{width: 15px;height: 15px;float: left;}
    .rxuanzhe>textarea{width: 408px;height: 120px;margin-top: 15px;resize: none;}
    .rxuanzhe>input{width: 408px;height: 50px;color: #fff;background-color: #e0e0e0;border: 0;font-size: 20px;}
    #report{margin-top: -80px;}
</style>
<body>
<!-- Navigation -->
<?php include '../../index/view/header.html.php';?>

<!-- Search -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <ul class="breadcrumb title">
                <li><a href="/">FC114乐山站</a></li>
<!--                <li><a href="/">--><?//=$this->config->shortName?><!--</a></li>-->
                <li><a href="/sale">二手房列表</a></li>
                <li><a href="/sale?borough=<?=$district[0]['borough'] ?>"><?=$this->config->borough_option[$district[0]['borough']] ?></a></li>
                <li>
                    <? if(!empty($sale_detail[0]['title'])){
                        echo $sale_detail[0]['title'];
                    }else{
                        $this->loadModel('sale');
                        $title = $this->sale->title($sale_detail[0]);
                        echo $title['title'].$title['price'];
                    }?>
                </li>
            </ul>
<!--            <input type="hidden" id="layout_id" name="layout_id" value="{$info.id}" />-->
<!--            <input type="hidden" id="project_name" name="project_name" value="{$info.project_name}" />-->
        </div>
        <div class="col-md-6 search-box">
            <form class="search-form right" method="get" action="/sale/" onsubmit="return search()">
                <input type="text" placeholder="请输入楼盘名称、地址或房源特征" class="input-search" name="keyword" id="keyword" maxlength="100" value="">
                <input type="submit" class="btn-search" value="搜索">
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12"><?  ?>
            <h3 class="tit-name" id="j-triggerlayer">
                <?=$sale_detail[0]['reside']?> 】
                <? if(!empty($sale_detail[0]['title'])){
                    echo $sale_detail[0]['title'];
                }else{
                    $this->loadModel('sale');
                    $title = $this->sale->title($sale_detail[0]);
                    echo $title['title'].$title['price'];
                }?>
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tit-sub">
                <p class="gray9">
                    <span class="mr10">房源编号：<?=$sale_detail[0]['id'] ?></span>
                    <span class="mr10"></span>发布时间：<?=date("Y-m-d H:i:s",$sale_detail[0]['create_date']);?>

                    <a class="collection_report report" style="float: right" data-toggle="modal" data-target="#report"><span class="glyphicon glyphicon-exclamation-sign"></span><span>举报</span></a>
                    <a class="collection_report collection" title="" onclick="collection()" style="float: right"><span class="glyphicon glyphicon-star"></span><span>收藏&nbsp;&nbsp;</span></a>
                </p>
            </div>
        </div>
    </div>

    <!-- sale start -->
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-7" style="width: 55.66666666%">
                    <div id="gallery" style="background:#fff;border:1px">
                        <img id="largeImage" class="img-responsive" src="<?=$img==''?'':$img[0]['url']?>" onerror="javascript:this.src='/images/pic_default.jpg'"/>
                        <div id="thumbs">
                            <? if($img != ''){foreach($img as $key=>$info){ ?>
                                <? if($key < 5){ ?>
                                    <div class="rongs">
                                        <? if($key == 0){ ?>
                                            <div class="picborder active"><img onerror="javascript:this.src='/images/pic_default.jpg'" src="<?=$info['url']?>" alt="<?=$info['url']?>" /></div>
                                        <? }else{ ?>
                                            <div class="picborder"><img onerror="javascript:this.src='/images/pic_default.jpg'" src="<?=$info['url']?>" alt="<?=$info['url']?>" /></div>
                                        <? } ?>
                                    </div>
                                <? } ?>
                            <? }} ?>
<!--                            <div class="rongs">-->
<!--                                <div class="picborder active"><img src="/theme/agency/img/12_m.png" alt="" /></div>-->
<!--                            </div>-->
                        </div>
                    </div>
                </div>
                <div class="col-md-5" style="width: 44.33333333%">
                    <div class="inforTxt clearfix">
                        <dl>
                            <dt>
                                <? $price = round($sale_detail[0]['price']);$total_area = explode('.',$sale_detail[0]['total_area']); ?>
                                <span class="gray6">总<span class="plxl"></span>价：</span>
                                <span class="red28b"><?=round($price)==0?'待定':round($sale_detail[0]['price']).'万'?></span><span class="black"></span>(<?=$price==0?'暂无':round(($price."0000") / $total_area[0]).'元/㎡' ?>)
                               

                               <a class="mor_cal" href="tools">房贷计算器</a>



                            </dt>
                            <dd class="gray6">参考首付：<span class="black "><? if($price!=0){ ?><?=$down_payments = round($price * 0.3,0)?>万<?}else{echo "暂无";}?></span></dd>
                            <? $sum = (($price - $down_payments)."0000")/180; ?>
                            <dd class="gray6">参考月供：<span class="black "><? if($price!=0){ ?><?=round($sum)?>元<?}else{echo "暂无";}?></span></dd>
                            <dd class="gray6">户型：<span class="black "><? if($sale_detail[0]['shi']!='' || $sale_detail[0]['ting']!='' || $sale_detail[0]['wei']!=''){ ?><?=$sale_detail[0]['shi']?>室<?=$sale_detail[0]['ting']?>厅<?=$sale_detail[0]['wei']?>卫<? }else{echo "未知";} ?></span></dd>
                            <dd class="gray6">建筑面积：<span class="black "><?=$total_area[0]==''?'未知':$total_area[0].'㎡'?></span></dd>
                        </dl>
                        <dl style=" clear:both;">
                            <dd><span class="gray6">年<span class="padl27"></span>代：</span><?=$sale_detail[0]['build_year']==''?'未知':$sale_detail[0]['build_year']?>年</dd>
                            <dd><span class="gray6">所在楼层：</span>
                                <?if($sale_detail[0]['current_floor']!= ''){ if($sale_detail[0]['current_floor'] < 10){
                                    echo "低区(共".$sale_detail[0]['total_floor']."层)";
                                }else if($sale_detail[0]['current_floor'] > 20 ){
                                    echo "高区(共".$sale_detail[0]['total_floor']."层)";
                                }else{
                                    echo "中区(共".$sale_detail[0]['total_floor']."层)";
                                }}else{echo "未知";} ?>
                            </dd>
<!--                            <dd><span class="gray6">结<span class="padl27"></span>构：</span>-->
<!--                                --><?//if(isset($this->config->apa_type_option[$sale_detail[0]['house_struct']])){
//                                    echo $this->config->apa_type_option[$sale_detail[0]['house_struct']];
//                                }else{echo "未知";} ?>
<!--                            </dd>-->
                            <dd><span class="gray6">装<span class="padl27"></span>修：</span>
                                <?if(isset($this->config->fitment_option[$sale_detail[0]['fitmen_type']])){
                                    echo $this->config->fitment_option[$sale_detail[0]['fitmen_type']];
                                }else{echo "未知";} ?>
                            </dd>
                            <dd><span class="gray6">住宅类别：</span>
                                <?if(isset($this->config->pm_type_option[$sale_detail[0]['pm_type']])){
                                    echo $this->config->pm_type_option[$sale_detail[0]['pm_type']];
                                }else{echo "未知";} ?>
                            </dd>
                            <dd>
                                <span class="gray6">楼盘名称：</span>
                                <a class="bule" href="#" target="_blank" title="查看此楼盘的更多写字楼房源" id="A1"><?=$district[0]['reside']==''?'未提供楼盘名称':($district[0]['reside'])?></a>
                            </dd>
                            <dd><span class="gray6">产权性质：</span>
                                <? if(isset($this->config->pright_option[$sale_detail[0]['pright']])){
                                    echo $this->config->pright_option[$sale_detail[0]['pright']];
                                }else{echo "未知";} ?>
                            </dd>
                        </dl>
                        <dl style=" clear:both;">

                            <dt><span class="gray6">楼盘地址：</span><?=$district[0]['address']==''?'未提供地址':$district[0]['address']?></dt>
                        </dl>

                    </div>
                </div>
            </div>

            <!-- sale simaple start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="houseInfo">
                        <? $time = explode('-',date("Y-m-d",$sale_detail[0]['create_date']))?>
                        <h4 class="block-title houseInfo-title">房屋信息<span class="house-encode">房屋编码： <?=$sale_detail[0]['id'] ?>，发布时间：<?=$time[0]?>年<?=$time[1]?>月<?=$time[2]?>日</span></h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="first-col left">
                                    <dl><dt>小区：</dt>
                                        <dd><a href="http://chengdu.anjuke.com/community/view/208230" target="_blank" _soj="propview"><?=$district[0]['reside']==''?'未提供小区名称':($district[0]['reside'])?></a>
                                        </dd>
                                    </dl>
                                    <dl><dt>位置：</dt>
                                        <dd>
                                            <span class="loc-text">
                                                <? if(!isset($this->config->borough_option[$district[0]['borough']]) && $district[0]['address']==''){echo "未提供地址";}else{ ?>
                                                    <a href="/" target="_blank"><?=$this->config->borough_option[$district[0]['borough']]?></a>-
                                                <a href="/" target="_blank"></a><?=$district[0]['address']?>
                                                <? } ?>
                                            </span>
                                            <i class="iconsindex i-location">&nbsp;</i>
                                        </dd>
                                    </dl>
                                    <dl><dt>年代：</dt><dd><?=$sale_detail[0]['build_year']==''?'未知':$sale_detail[0]['build_year'].'年'?></dd></dl>
                                    <dl><dt>类型：</dt><dd>
                                            <? if(isset($this->config->pm_type_option[$sale_detail[0]['pm_type']])){echo $this->config->pm_type_option[$sale_detail[0]['pm_type']];}else{echo "未知";} ?>
                                        </dd></dl>
                                </div>
                                <div class="second-col left">
                                    <dl><dt>房型：</dt><dd><? if($sale_detail[0]['shi']!='' || $sale_detail[0]['ting']!='' || $sale_detail[0]['wei']!=''){ ?><?=$sale_detail[0]['shi']?>室<?=$sale_detail[0]['ting']?>厅<?=$sale_detail[0]['wei']?>卫<? }else{echo "未知";} ?></dd></dl>
                                    <dl><dt>面积：</dt><dd><?=$sale_detail[0]['total_area']==''?'未知':round($sale_detail[0]['total_area']).'平米'?></dd></dl>
                                    <dl><dt>朝向：</dt><dd><?if(isset($this->config->orientation_option[$sale_detail[0]['toward']])){echo $this->config->orientation_option[$sale_detail[0]['toward']];}else{echo "未知";} ?></dd></dl>
                                    <dl><dt>楼层：</dt><dd>
                                            <?if($sale_detail[0]['current_floor']!= ''){ if($sale_detail[0]['current_floor'] < 10){
                                                echo "低区(共".$sale_detail[0]['total_floor']."层)";
                                            }else if($sale_detail[0]['current_floor'] > 20 ){
                                                echo "高区(共".$sale_detail[0]['total_floor']."层)";
                                            }else{
                                                echo "中区(共".$sale_detail[0]['total_floor']."层)";
                                            }}else{echo "未知";} ?>
                                    </dd></dl>
                                </div>
                                <div class="third-col left">
                                    <dl><dt>装修程度：</dt><dd>
                                            <? if(isset($this->config->fitment_option[$sale_detail[0]['fitmen_type']]) && $sale_detail[0]['fitmen_type'] != 0){echo $this->config->fitment_option[$sale_detail[0]['fitmen_type']];}else{echo "未知";} ?>
                                        </dd></dl>
                                    <dl><dt>房屋单价：</dt><dd><?=$price==0?'暂无':round(($price."0000") / $total_area[0]).'元/㎡' ?></dd></dl>
                                    <dl><dt>参考首付：</dt><dd>
                                            <? if($price!=0){ ?><?=$down_payments?>万<?}else{echo "暂无";}?>                    </dd></dl>
                                    <dl><dt>参考月供：</dt>
                                        <dd><span id="reference_monthpay"><? if($price!=0){ ?><?=round($sum)?>元<?}else{echo "暂无";}?></span></dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- sale desc start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="houseInfo">
                        <h4 class="block-title houseInfo-title">
                            <i class="iconsindex i-home">&nbsp;</i> 核心卖点
                        </h4>
                        <div class="row">
                            <div class="col-md-12">
                                <?=$sale_detail[0]['selling_point']==''?'房东没有提供此房源的详细信息':'<p>*理由：</p>'.$sale_detail[0]['selling_point'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- sale pic start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="houseInfo">
                        <h4 class="block-title houseInfo-title">
                            <i class="iconsindex i-home">&nbsp;</i> 房源图片
                        </h4>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- 户型图 -->
                                <? if($img != ''){foreach($img as $key=>$info){ ?>
                                    <div class="col-md-3 img-portfolio" style="margin-bottom:20px;">
                                        <a class="vlightbox1" href="<?=$info['url']?>" title="{$allphoto[a].title}">
                                            <img onerror="javascript:this.src='/images/pic_default.jpg'" src="<?=$info['url']?>" class="img-responsive img-hover">
                                        </a>
                                        <p>房源图片</p>
                                    </div>
                                <? }}else{
                                    echo "暂无房源图片";
                                } ?>

<!--                                <div class="col-md-3 img-portfolio" style="margin-bottom:20px;">-->
<!--                                    <a class="vlightbox1" href="/theme/agency/img/hx_s.jpg" title="{$allphoto[a].title}">-->
<!--                                        <img src="/theme/agency/img/hx_s.jpg" class="img-responsive img-hover">-->
<!--                                    </a>-->
<!--                                    <p>sdf</p>-->
<!--                                </div>-->

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- sale map start -->
            <div class="row" id="mapBox">
                <div class="col-md-12">
                    <div class="houseInfo clearfix" style="margin-bottom:20px;">
                        <h4 class="block-title houseInfo-title"><i class="iconsindex i-map">&nbsp;</i> 地图交通</h4>
                        <div class="map" id="map"></div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <!-- sale map end -->

        </div>
        <!-- right -->
        <div class="col-md-3">
            <div class="agent clearfix">
                <div class="agent-info left">
                    <div class="agent-del left">
                        <a href="#" class="laishanghai" target="_blank">
                            <img class="iframe-img" src="../theme/agency/img/zj03.jpg">
                        </a>
                    </div>
                    <div class="p-del left">
                        <p class="p-01">张永</p>
                        <p><span>经纪人</span></p>
                        <div class="mbs"><span class="p_icon identity_verify" title="已进行身份验证"></span>
                            <span class="p_icon company_verify" title="已进行公司验证"></span></div>
                        <p class="small"><span class="bold"><a href="#" target="_blank">康乐地产</a></span></p>
                        <p class="small"><span class="bold"><a href="#" target="_blank">康乐地产世纪城店</a></span></p>
                    </div>
                </div>
                <div class="broker_shop left">
                    <a class="left" href="/" target="_blank">写字楼出售<em>11</em>套</a>
                    <a class="right" href="/" target="_blank">查看个人信息 &gt;</a>
                </div>
                <div class="phone_top">
                    <span><label style="cursor: pointer;" id="mobilecode" data-toggle="modal" data-target="#viewphone">联系房东</label></span>
                </div>
            </div>
        </div>
    </div>
    <!-- sale end -->


    <div id="prompt" style="display: none;box-shadow: 2px 4px 10px #000;z-index: 2;background-color: #fbfbfb;width:300px;height:180px;position: fixed;left: 38%;top:32%;text-align: center;font-size: 20px">
        <div style="padding-top: 65px">
            <span style="color:#fd6002" class="glyphicon glyphicon-star"></span> 收藏成功
        </div>
    </div>
    <div class="modal fade" id="report" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header lhead rtoubu">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span id="close" aria-hidden="true" style="font-size: 30px">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabel">我要举报</h3>
                </div>
                <div class="rtishi">
                <span class="rtubiao">
                    <span class="glyphicon glyphicon-volume-up"></span>
                </span>
                <span class="rcontent">
                    <span>1.信息隐私保护，请放心举报;</span>
                    <span>2.举报会在两个工作日内进行处理。</span>
                </span>
                </div>
                <div class="modal-body">
                    <form class="rxuanzhe">
                        <p>您举报房源的原因是 (必填,可多选):</p>
                        <input id="esf_id" type="hidden" value=""/>
                        <ul>
                            <li><input class="checkbox" id="check1" name="check" type="checkbox" value="1"/>&nbsp;<label for="check1">房子不存在或已经卖了</label></li>
                            <li><input class="checkbox" id="check2" name="check" type="checkbox" value="2"/>&nbsp;<label for="check2">图文与实际不符</label></li>
                            <li><input class="checkbox" id="check3" name="check" type="checkbox" value="3"/>&nbsp;<label for="check3">价格与实际不符</label></li>
                            <li><input class="checkbox" id="check4" name="check" type="checkbox" value="4"/>&nbsp;<label for="check4">其他</label></li>
                        </ul>
                        <input id="type" name="type" type="hidden" value=""/>
                        <textarea id="textarea" name="textarea" placeholder="您可在此写下具体描述,请至少输入10个汉字"></textarea>
                        <span style="float:right;position:relative;top: -25px;left: -4px"><span id="textsum">0</span>/<span>100</span></span>
                        <input id="submit" disabled type="button" data-dismiss="" value="提交"/>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="userlogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header lhead">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span id="close" aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabel">用户登录</h3>
                    <div class="register"><span style="">还没有FC114账号？</span><a href="/userlogin/regist">马上注册</a></div>
                </div>
                <div class="modal-body">
                    <div class="loan1">
                        <input type="hidden" name="from" id="from" value="sale">
                        <p class="aint">
                            <span class="glyphicon glyphicon-phone licon"></span><input id="tel" name="tel" maxlength="11" class="ainput phone" type="text" placeholder=" 请输入手机号"/>
                        </p>
                        <p class="aint">
                            <span class="glyphicon glyphicon-lock licon"></span><input id="pwd" name="pwd" class="ainput code" type="password" placeholder=" 请输入密码"/>
                        </p>
                        <p class="aint">
                            <input id="daicheck" type="checkbox" checked/>下次自动登录 <a class="forget_password" href="#">忘记密码</a>
                        </p>
                        <p class="aint">
                            <input id="loan_application" class="alogin daisheng" type="button" onclick="login()" value="马上登录"/>
                        </p>
                    </div>
                    <div id="loadingToast" class="weui_loading_toast" style="display: none;">
                        <div class="weui_mask_transparent"></div>
                        <div class="weui_toast">
                            <div class="weui_loading">
                                <div class="weui_loading_leaf weui_loading_leaf_0"></div>
                                <div class="weui_loading_leaf weui_loading_leaf_1"></div>
                                <div class="weui_loading_leaf weui_loading_leaf_2"></div>
                                <div class="weui_loading_leaf weui_loading_leaf_3"></div>
                                <div class="weui_loading_leaf weui_loading_leaf_4"></div>
                                <div class="weui_loading_leaf weui_loading_leaf_5"></div>
                                <div class="weui_loading_leaf weui_loading_leaf_6"></div>
                                <div class="weui_loading_leaf weui_loading_leaf_7"></div>
                                <div class="weui_loading_leaf weui_loading_leaf_8"></div>
                                <div class="weui_loading_leaf weui_loading_leaf_9"></div>
                                <div class="weui_loading_leaf weui_loading_leaf_10"></div>
                                <div class="weui_loading_leaf weui_loading_leaf_11"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="viewphone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header lhead">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span id="close" aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabel">查看房源</h3>
                </div>
                <div class="modal-body" style="padding: 50px">
                    <h4 id="integral_cue" style="text-align: center">是否使用<span style="font-size: 25px;font-weight: bold"> 40 </span>积分获得房东电话</h4>
                    <div style="text-align: center;margin-top: 50px;margin-bottom: 40px;">
                        <button type="button" class="btn phoneyse" data-dismiss="">确定</button>
                        <button type="button" class="btn phoneno closes" data-dismiss="modal">取消</button>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>
<!-- Footer -->
<?php include '../../index/view/footer.html.php';?>

<!-- jQuery -->
<script src="/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/js/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.4"></script>
<script type="text/javascript" src="/js/baidu_new.js"></script>

<!-- main JavaScript -->
<script src="/theme/agency/js/agency.js"></script>

<script src="/js/vendor/vlightbox/vlb_engine/visuallightbox.js" type="text/javascript"></script>
<script src="/js/vendor/vlightbox/vlb_engine/vlbdata1.js" type="text/javascript"></script>

<script>
    var houseid = 3327;
    $(document).ready(function(){
        try
        {
            // 初始化地图，设置中心点坐标和地图级别
            var map = new BMap.Map("map");          // 创建地图实例
            var houseid = 3327;
            var _point_x = <?=$district[0]['map_x']==''?'103.77193':$district[0]['map_x']?>;
            var _point_y = <?=$district[0]['map_y']==''?'29.558141':$district[0]['map_y']?>;
            var title = "<?=$district[0]['reside']?>";
            _point_x = <?=$district[0]['map_x']==''?'103.77193':$district[0]['map_x']?>;
            _point_y = <?=$district[0]['map_y']==''?'29.558141':$district[0]['map_y']?>;

            var point = new BMap.Point(_point_x, _point_y);  // 创建点坐标   //根据给定的坐标点设置
            var Icon = new BMap.Icon( "http://map.baidu.com/image/markers_new.png",new BMap.Size(22, 30),{
                imageOffset: new BMap.Size(0, 0),anchor:new BMap.Size(10,10)
            });
            <? if($district[0]['map_x']!='' && $district[0]['map_y'] != ''){ ?>
            var marker = new ComplexCustomOverlay(new BMap.Point(_point_x,_point_y), title,title,'');
            map.centerAndZoom(point, 17);map.addControl(new BMap.NavigationControl());
            map.addOverlay(marker);
            <? }else{ ?>
            map.centerAndZoom(point, 12);map.addControl(new BMap.NavigationControl());
            <? } ?>
            map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        }
        catch (e)
        {

        }
    });

    $(document).ready(function(){
        //判断是否登录
        <? if(!isset($_SESSION['userid'])){ ?>
            $(".report").attr('data-target','#userlogin');
            $(".collection").attr({"data-toggle":"modal","data-target":"#userlogin"});
            $("#mobilecode").attr({"data-toggle":"modal","data-target":"#userlogin"});
        <? } ?>
        //判断登录后已经收藏的房源
        <? if(isset($_SESSION['userid'])){ ?>
            <? foreach($collection as $info){ ?>
                <? if($info['esf_id'] == $sale_detail[0]['id']){ ?>
                    $(".collection>span:eq(1)").html("已收藏&nbsp;&nbsp;");
                <? } ?>
            <? } ?>
            <? foreach($landlordphone as $info){ ?>
                <? if($info['esf_id'] == $sale_detail[0]['id']){ ?>
                    $("#mobilecode").html("<?=$info['telphone']?>");
                    $("#mobilecode").attr("data-target","");
                <? } ?>
            <? } ?>
        <? } ?>
    })

//用户登录
    function login(){
        var tel = $('#tel').val();
        var pwd = $('#pwd').val();
        var code = $('#code').val();
        var from = $('#from').val();
        $('#loadingToast').show();
        $.ajax({
            type: 'POST',
            url: '/userlogin/apiMobilelogin',
            dataType: 'JSON',
            data: {
                username: tel,
                password:pwd,
                code:code,
                from:from,
                submittype:'ajax'
            },
            success: function (result) {
                alert(result.msg);
                if (result.success) {
                    window.location = "/sale/detail?id=<?=$sale_detail[0]['id']?>";
                }
                setTimeout(function () {
                    $('#loadingToast').hide();
                }, 500);
            },
            error: function (result) {
                if (result.success) {
                    alert(result.msg);
                }
                else {
                    alert("系统繁忙!");
                }
            }
        });
    }
    //举报
    $("#textarea").keyup(function(){
        var text = $("#textarea").val();
        if(text.length >= 10){
            $("#submit").attr("disabled",false);
            $("#submit").css("background","#62ab00");
        }else{
            $("#submit").attr("disabled",true);
            $("#submit").css("background","#e0e0e0");
        }
        $("#textsum").html(text.length);
    });
    $("#submit").click(function(){
        var aa = document.getElementsByName("check");
        var ss = "";
        for (var i = 0; i < aa.length; i++) {
            if (aa[i].checked) {
                ss += aa[i].value+",";
            }
        }
        if(ss==""){
            alert("请选择举报原因");
        }else{
            ss =  ss.substr(0, ss.length - 1);
            $.ajax({
                type:"post",
                url:"/sale/report",
                dataType:"JSON",
                data:{
                    houseid:<?=$sale_detail[0]['id'] ?>,
                    type:ss,
                    reason:$("#textarea").val(),
                    page_url:"sale_detail"
                },
                success:function(result){
                    alert(result);
                    $("#report").modal("hide");
                    $("#textarea").val("");
                    $(".checkbox").prop("checked",false);
                },
                error:function(result){alert("数据错误,请修改后从新提交");}
            });
        }

    });

    //收藏
    function collection(){
        <? if(isset($_SESSION['userid'])){ ?>
        if($(".collection>span:eq(1)").html() == "收藏&nbsp;&nbsp;"){
            $.ajax({
                type:'POST',
                url:'/sale/collection',
                dataType:'JSON',
                data:{
                    esf_id:'<?=$sale_detail[0]['id'] ?>',
                    house_type:2
                },
                success:function(result){
                    $("#prompt").css("display","block");
                    $("#prompt").fadeOut(3000);
                    $(".collection>span:eq(1)").html("已收藏&nbsp;&nbsp;");
                },
                error:function(result){alert('no');}
            });
        }
        event.stopPropagation();
        <? } ?>
    }

    //消费积分查看房东电话
    $(".phoneyse").click(function(){
        $.ajax({
            type:'POST',
            url:'/sale/consumption',
            dataType:'JSON',
            data:{
                esf_id:'<?=$sale_detail[0]['id'] ?>',
                esf_name:$(".tit-name").html(),
                sum:40
            },
            success:function(result){
                if(result == '积分不足'){
                    $('#integral_cue').html("<span style='font-size: 27px;position: relative;top: 13px;'>"+result+"</span>"+"&nbsp;&nbsp;&nbsp;<a style='font-size: 14px' href='#'>>>前往充值</a><div style='position:relative;top: 1px;left:77px;font-size: 14px;color: #a5a5a5;'><a href='/user_common/score'>>>如何获得积分</a></div>");
                    $(".phoneyse").css("display","none");

                }else{
                    $("#mobilecode").html(result.telphone);
                    $("#mobilecode").attr("data-target","");
                    $('#integral_cue').html("房东："+result.linkman+"&nbsp;&nbsp;电话："+result.telphone);
                    $(".phoneyse").css("display","none");
                }
            },
            error:function(result){alert('no');}
        });
    });
    $(".closes").click(function(){
        setTimeout("integral_cue()",1000);
    });
    function integral_cue(){
        $('#integral_cue').html("是否使用<span style='font-size: 25px;font-weight: bold'> 40 </span>积分获得房东电话");
        $(".phoneyse").css("display","inline-block")
    }


//
//    function goToLabel(obj)
//    {
//        var _targetTop = $('#'+obj).offset().top;//获取位置
//        $("html,body").animate({scrollTop:_targetTop},300);//跳转
//    }

    //flash 幻灯
    $('#thumbs').delegate('img','mouseover', function(){
        $('#largeImage').attr('src',$(this).attr('src').replace('thumb','large'));
        //$('#description').html($(this).attr('alt'));
        $('.picborder').removeClass('active');
        $(this).parent().addClass('active');
    });

    //tab
    $('.proj_tab').delegate('li','click', function(){
        $(this).siblings().removeClass('active');
        $(this).addClass('active');

        $(this).parent().parent().siblings().children('#'+$(this).attr('title')).css('display','');
        $(this).parent().parent().siblings().children('#'+$(this).attr('title')).siblings().css('display','none');
    });


    //搜索二手房
    function search(){
        if($("#keyword").val() == ''){
            return false;
        }else{
            return true;
        }
    }
</script>
</body>
</html>
