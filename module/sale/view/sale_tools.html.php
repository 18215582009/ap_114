<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><? if(!empty($sale_detail[0]['title'])){echo $sale_detail[0]['title'];}else{$this->loadModel('sale');$title = $this->sale->title($sale_detail[0]);echo $title['title'].$title['price'];
        }?>_<?=$district[0]['reside'] ?>_二手房列表_<?=$this->config->siteName?></title>

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



    <link href="/theme/agency/css/tools.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<script src="/theme/agency/js/jquery-2.2.0.min.js"></script>
<script src="/theme/agency/js/tools.min.js"></script>

<style>


</style>
</head>

<body>
<!-- Navigation -->
<?php include '../../index/view/header.html.php';?>

<!-- Search -->
<div class="container">

    
    <!-- sale start -->
    <div class="row">
        <div class="col-md-9">
            <div class="row" style="min-height:878px;">
               
                <div class="col-md-5" style="width: 44.33333333%">
                    <div class="inforTxt clearfix">


                        <div id="box">
                            <h2>贷款计算器</h2>
                            <div id="tabs">
                                <ul class="title">
                                    <li><a href="#" data-cid="contact" class="current">贷款计算器</a></li>
                                    <li><a href="#" data-cid="project">公积金贷款计算器</a></li>
                                    <li><a href="#" data-cid="submit">攒钱贷款计算器</a></li>
                                    <li><a href="#" data-cid="money">税费计算器</a></li>
                                    <li><a href="#" data-cid="fish">装修贷款计算器</a></li>
                                    <li><a href="#" data-cid="buy">购房能力评估计算器</a></li>
                                </ul>
                                <div id="content">
                                    <div id="contact">
                                        <form id="myform" action="#" style="display: block">
                                            <div id="contact_left">
                                                <div id="dklx">
                                                    <h5>请您填写1:</h5>
                                                    贷款类别:
                                                    <label><input type="radio" name="dktype" checked value="0"/>商业贷款</label>
                                                    <label><input type="radio" name="dktype" value="1"/>公积金贷款</label>
                                                    <label><input type="radio" name="dktype" value="2"/>组合型贷款</label>
                                                </div>
                                                <div id="jsfs">
                                                    <h6>计算方式:</h6>
                                                    <dl id="way">
                                                        <dt><label class="count"><input type="radio" name="jsfs" value="0"
                                                                                        checked/>根据面积、单价计算</label></dt>
                                                        <dd style="display: block">
                                                            <label>单价:</label><input type="text" name="price">元/平米<br>
                                                            <label>面积:</label><input type="text" name="area">平方米<br>
                                                            <label>按揭成数</label>
                                                            <select style="width: 45px;height: 19px;" class="" name="ajcs">
                                                                <option value="70" selected>7成</option>
                                                                <option value="80">8成</option>
                                                                <option value="90">9成</option>
                                                            </select>
                                                        </dd>
                                                        <dt><label><input type="radio" value="1" name="jsfs"/>根据贷款总额计算</label></dt>
                                                        <dd>
                                                            <label>贷款总额：<input type="text" name="dkze">元</label>
                                                        </dd>
                                                    </dl>
                                                    <label>按揭年数</label>
                                                    <select class="" name="ajns">
                                                        <option value="120" selected>10年（120期）</option>
                                                        <option value="240">20年（240期）</option>
                                                        <option value="360">30年（360期）</option>
                                                    </select><br>
                                                </div>
                                                <div id="dkll">
                                                    <label>贷款利率</label>
                                                    <select name="dkll">
                                                        <option value="0">12年6月8日基准利率</option>
                                                        <option value="1">12年7月6日基准利率</option>
                                                        <option value="2">14年11月22日基准利率</option>
                                                        <option value="3" selected>15年03月01日基准利率</option>
                                                    </select><br>
                                                    <input class="percent" name="dkll" type="text" value="6.80"/>%
                                                </div>
                                                <div id="method">
                                                    还款方式:
                                                    <label><input type="radio" name="bb" checked/>等额本息</label>
                                                    <label><input type="radio" name="bb"/>等额本金<br></label>
                                                </div>
                                                <input type="button" name="startCalc" class="start" value="开始计算"/>
                                                <input type="reset" class="again" value="重新填写"/>
                                            </div>
                                            <div style="" id="contact_right">
                                                <h5>查看结果:</h5>
                                                <label>房款总<span class="letter_spacing">额</span>：</label><input type="text" name="fousex" readonly/><span class="position">元</span><br>
                                                <label>贷款总<span class="letter_spacing">额</span>：</label><input type="text" name="loan" readonly/><span class="position">元</span><br>
                                                <label>还款总<span class="letter_spacing">额</span>：</label><input type="text" name="refund" readonly/><span class="position">元</span><br>
                                                <label>支付利息款：</label><input type="text" name="pay" readonly/><span class="position">元</span><br>
                                                <label>首期付<span class="letter_spacing">款</span>：</label><input type="text" name="first" readonly/><span class="position">元</span><br>
                                                <label>贷款月<span class="letter_spacing">数</span>：</label><input type="text" name="month" readonly/><span class="position">月</span><br>
                                                <label>月均还<span class="letter_spacing">款</span>：</label><input type="text" name="average" readonly/><span class="position">元</span><br>
                                                <p>*以上结果仅供参考</p>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="box">公积金贷款></div>
                                    <div class="box">提前还贷</div>
                                    <div class="box">税费></div>
                                    <div class="box">装修贷款</div>
                                    <div class="box">购房能力评估</div>
                                </div>
                            </div>
                        </div>
                        <div id="list">
                            <h2>贷款利率表</h2>
                            <table>
                                <thead>
                                <tr>
                                    <th colspan="3">房贷利率</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th colspan="3">公积金利率（单位%）</th>
                                </tr>
                                <tr>
                                    <td>年限</td>
                                    <td>1-5年</td>
                                    <td>5-30年</td>
                                </tr>
                                <tr>
                                    <td>12年6月8日</td>
                                    <td>4.20</td>
                                    <td>4.70</td>
                                </tr>
                                <tr>
                                    <td>12年7月6日</td>
                                    <td>4.00</td>
                                    <td>4.50</td>
                                </tr>
                                <tr>
                                    <td>14年11月22日</td>
                                    <td>3.75</td>
                                    <td>4.25</td>
                                </tr>
                                <tr>
                                    <td>15年3月1日</td>
                                    <td>3.50</td>
                                    <td>4.00</td>
                                </tr>
                                <tr>
                                    <td>15年5月11日</td>
                                    <td>3.25</td>
                                    <td>3.75</td>
                                </tr>
                                <tr>
                                    <th colspan="3">商业贷款利率（单位%）</th>
                                </tr>
                                <tr>
                                    <td>年限</td>
                                    <td>3-5年</td>
                                    <td>5-30年</td>
                                </tr>
                                <tr>
                                    <td>12年6月8日</td>
                                    <td>6.65</td>
                                    <td>6.80</td>
                                </tr>
                                <tr>
                                    <td>12年7月6日</td>
                                    <td>6.40</td>
                                    <td>6.55</td>
                                </tr>
                                <tr>
                                    <td>14年11月22日</td>
                                    <td>6.00</td>
                                    <td>6.15</td>
                                </tr>
                                <tr>
                                    <td>15年3月1日</td>
                                    <td>5.75</td>
                                    <td>5.90</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
      
    </div>
    <!-- sale end -->



</div>

<div style="clear:both;"></div>

<!-- Footer -->
<?php include '../../index/view/footer.html.php';?>



</body>
</html>
