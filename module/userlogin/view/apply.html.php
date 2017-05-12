<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title><?=$name?>-<?=$this->config->app_name?></title>
<!-- Bootstrap Core CSS -->
<link href="/js/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="/css/mtek_font-awesome.min.css" rel="stylesheet" type="text/css">

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
    .secondNav{border-bottom: 1px solid #ddd}
    .med-icon {font-size: 32px;}

    /* smart-service-block */
    .smart-service-block {
        float: left;
        width: 100%;
        padding: 2% 0;
        background: #fff;
    }
    .smart-service-block .service-list {
        float: left;
        width: 100%;
    }
    .smart-service-block .service-list li {
        float: left;
        width: 33.33%;
        padding: 0 3% 0 100px;
        position: relative;
        margin: 40px 0;
        padding: 0 10px 0 75px;
    }
    .smart-service-block .service-list li h5 {
        display: block;
        margin-bottom: 10px;
        font-size: 21px;
        line-height: 35px;
        color: #444;
        font-weight: 400;
        font-family: "Roboto",sans-serif;
        font-size: 18px;
    }
    .smart-service-block .service-list li p {
        font-size: 14px;
        line-height: 26px;
        color: #505050;
        font-weight: 300;
        font-family: "Roboto",sans-serif;
        display: block;
        margin-bottom: 20px;
    }
    .smart-service-block .service-list li a {
        font-size: 17px;
        line-height: 27px;
        color: #f38920;
        font-weight: 300;
        font-family: "Helvetica LT Light";
        display: inline-block;
        border: 1px solid #f38920;
        padding: 0 10px;
        text-transform: capitalize;
        overflow: hidden;
        position: relative;
        z-index: 2;
        -webkit-transition: all 0.3s cubic-bezier(0.49, 0.38, 0.23, 0.96) 0s;
        -o-transition: all 0.3s cubic-bezier(0.49, 0.38, 0.23, 0.96) 0s;
        transition: all 0.3s cubic-bezier(0.49, 0.38, 0.23, 0.96) 0s;
    }
    .smart-service-block .service-list li:after {
        width: 67px;
        height: 85px;
        left: 0;
        top: 0;
        background-image: url(/theme/agency/img/service-icons.png);
        display: inline-block;
        content: "";
        position: absolute;
        background-size: 67px 480px;
        background-repeat: no-repeat;
        background-position: center 0;
    }
    .smart-service-block .service-list li.service-icon2:after {
        background-position: center -85px;
    }
    .smart-service-block .service-list li.service-icon3:after {
        background-position: center -175px;
    }
    .smart-service-block .service-list li.service-icon4:after {
        background-position: center -265px;
    }
    .smart-service-block .service-list li.service-icon5:after {
        background-position: center -338px;
    }
    .smart-service-block .service-list li.service-icon6:after {
        background-position: center -415px;
    }

    /* split-blocks */
    .split-blocks{
        background-image: url('/theme/agency/img/alley-grey_02.jpg');
        background-attachment: fixed;
        background-repeat: no-repeat;
        /*background-color:#00aa66;*/
        color:#fff;padding:20px 0;}
    .split-blocks .header.centered {text-align: center;}
    .split-blocks .header{margin-bottom: 30px;}
    .split-blocks .service-block {
        margin-bottom: 30px;
    }
    .split-blocks .service-block i {  float: left;  }
    .split-blocks .accent{color: #fff;}
    .split-blocks .service-block-text{cursor: pointer}
    .split-blocks .service-block h3 {
        margin-top: 0;
        padding-top: 4px;
        margin-left: 60px;
    }
    .split-blocks .service-block p {
        font-family: "Open Sans","Helvetica Neue",Helvetica,Arial,sans-serif;
        font-weight: normal;
        font-size: 14px;
        line-height: 24px;
        color: #fff;
        margin: 0 0 10px 60px;
    }

</style>
<body id="page-top">
<?php include 'header.html.php';?>

<!--
<div id="service-block" class="smart-service-block clearfix">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <ul class="service-list">
                    <li class="service-icon1">
                        <h5>Order Medicines</h5>
                        <p>Never lose sight of your prescriptions, again! Capture, upload and access images of all your medical details</p>
                        <a class="view-more" href="//www.heycare.com/order-medicines">View More</a>
                    </li>
                    <li class="service-icon2">
                        <h5>OTC Products</h5>
                        <p>Not just medicines, now you can buy OTC products hassle free with HeyCare. Search from the listed categories</p>
                        <a href="wellness-products" class="view-more">View More</a>
                    </li>
                    <li class="service-icon3">
                        <h5>Diagnostic</h5>
                        <p>Search and Book Diagnostic Labs easy with HeyCare. Schedule pickups, get online reports and all done</p>
                        <a class="view-more" href="//www.heycare.com/diagnostic">View More </a>
                    </li>
                    <li class="service-icon4">
                        <h5>Pill Reminder</h5>
                        <p>Remembering to take a pill just got easier! Effortlessly follow your prescriptions, whether simple or complex</p>
                        <a href="pill-reminder" class="view-more">View More</a>
                    </li>
                    <li class="service-icon5">
                        <h5>Vaccination</h5>
                        <p>Keeping track of your child's vaccination types and immunization schedule just got easier. </p>
                        <a href="vaccination" class="view-more">View More</a>
                    </li>
                    <li class="service-icon6">
                        <h5>Care Wallet</h5>
                        <p>Savings are on the way, Pay through Care Wallet and save up to 30% on your medical expenses.</p>
                        <a href="wallet" class="view-more">View More</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
-->

<div id="develop" class="split-blocks clearfix">
    <? if($type=='1'){?>
	<div class="container">

        <div class="row">
            <div class="header col-xs-12 centered">
                <h2>开发商、中介系统入口</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="service-block service-block-0 ptxl">
                    <div class="med-icon">
                        <i class="accent glyphicon glyphicon-file"></i> </div>
                    <div class="service-block-text" data-link="/userlogin/apply?type=1">
                        <h3>网签备案系统</h3>
                        <p>开发商与购房者签订合同后,通过网签备案系统快速实现在房管局系统备案，并公布在网上。然后会给个网签号，用户可以通过网签号在网上进行查询。网签是为了让房地产交易更加透明化，防止"一房多卖"。</p>
                    </div>
                </div>
                <div class="service-block service-block-1">
                    <div class="med-icon">
                        <i class="accent glyphicon glyphicon-cloud"></i> </div>
                    <div class="service-block-text" data-link="/company_center">
                        <h3>房云大数据(开发商、中介版)</h3>
                        <p>为地产公司提供最完整、权威的行业数据分析报告,帮助地产公司正确作出企业决策!</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <p><img class="alignnone size-full" style="margin-top:25px" src="/theme/agency/img/main-window-600x465.jpg" alt="" width="455" height="353"></p>
            </div>
        </div>

    </div>
    <? } ?>

    <? if($type=='2'){?>
        <div class="container">

            <div class="row">
                <div class="header col-xs-12 centered">

                    <h2>银行、担保公司 &amp; 系统入口</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="service-block service-block-0">
                        <div class="med-icon">
                            <i class="accent glyphicon glyphicon-yen"></i> </div>
                        <div class="service-block-text" data-link="/userlogin/apply?type=2">
                            <h3>资金监管</h3>
                            <p>二手房交易纠纷逐渐增多，很多购房者都担心一旦纠纷出现，资金安全问题如何保障，在这里小编不得不提起我们高大上的资金监管了，这是能有效保证资金安全的交易方式。</p>
                        </div>
                    </div>
                    <div class="service-block service-block-0">
                        <div class="med-icon">
                            <i class="accent glyphicon glyphicon-file"></i> </div>
                        <div class="service-block-text" data-link="/userlogin/apply?type=2">
                            <h3>二手房网签备案</h3>
                            <p>房屋买卖双方签订合同后,通过网签备案系统快速实现在房管局系统备案，并公布在网上。然后会给个网签号，用户可以通过网签号在网上进行查询。网签是为了让房地产交易更加透明化，防止"一房多卖"。</p>
                        </div>
                    </div>
                    <div class="service-block service-block-1">
                        <div class="med-icon">
                            <i class="accent glyphicon glyphicon-cloud"></i> </div>
                        <div class="service-block-text" data-link="/company_center">
                            <h3>房云大数据(中介、代理公司版)</h3>
                            <p>为地产公司提供最完整、权威的行业数据分析报告,帮助地产公司正确作出企业决策!</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <p><img class="alignnone size-full" style="margin-top:25px" src="/theme/agency/img/main-window-600x465.jpg" alt="" width="455" height="353"></p>
                </div>
            </div>

        </div>
    <? } ?>

    <? if($type=='3'){?>
        <div class="container">

            <div class="row">
                <div class="header col-xs-12 centered">

                    <h2>其他机构 &amp; 系统入口</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="service-block service-block-1">
                        <div class="med-icon">
                            <i class="accent glyphicon glyphicon-cloud"></i> </div>
                        <div class="service-block-text" data-link="/user_center">
                            <h3>房云大数据(个人专业版)</h3>
                            <p>为地产公司提供最完整、权威的行业数据分析报告,帮助地产公司正确作出企业决策!</p>
                        </div>
                    </div>
                    <div class="service-block service-block-0">
                        <div class="med-icon">
                            <i class="accent glyphicon glyphicon-file"></i> </div>
                        <div class="service-block-text" data-link="/userlogin/apply?type=3">
                            <h3>其他</h3>
                            <p>****</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <p><img class="alignnone size-full" style="margin-top:25px" src="/theme/agency/img/main-window-600x465.jpg" alt="" width="455" height="353"></p>
                </div>
            </div>

        </div>
    <? } ?>


</div>

<!-- Footer -->
<?php include '../../userlogin/view/footer.html.php';?>

<!-- jQuery --> 
<script src="/js/jquery.min.js"></script>

<!-- Plugin JavaScript --> 

<!-- main JavaScript -->

<script>
    $('div.service-block-text').bind('click', function(event) {
        var $anchor = $(this);
        window.location.href =  $(this).data('link');
    });
</script>
</body>
</html>
