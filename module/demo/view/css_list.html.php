<?php
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
<title>Css+Html前端框架</title>
</head>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/common.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/cdrstyle.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/metroicon2.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/style.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/page.css';?>' type='text/css' media='screen' />
<style>
body{overflow:visible;color: #000;
    font-family: 'Arial';
    padding: 0px !important;
    margin: 0px !important;
    font-size:13px;
    /*overflow-x: hidden ;*/
}

#main-content {
    margin-top: 0 !important;
}
#main-content {
    background: none repeat scroll 0 0 #FFFFFF;
    margin-bottom: 40px !important;
    margin-left: 180px;
    margin-top: 0;
    min-height: 1000px;
}
.fixed-top #container {
    margin-top: 60px;
}
/***************************/

.fixed-top #main-content {
    margin-top: 20px;
}
#main-content {
    margin-top: 0 !important;
}
#main-content {
    background: none repeat scroll 0 0 #FFFFFF;
    margin-bottom: 40px !important;
    margin-left: 180px;
    margin-top: 0;
    min-height: 1000px;
}

/*current page css*/
.widget-tabs .nav-tabs {
    margin-top: -52px;
    position: relative;
}
.widget-tabs .nav-tabs > li {
    float: right;
}
.widget-tabs .nav-tabs {
    border-bottom: medium none;
    margin-right: 5px;
}
.widget-tabs .nav-tabs > li > a {
    border-left: medium none !important;
    border-radius: 0 0 0 0;
    border-right: medium none !important;
    color: #FFFFFF;
    line-height: 17px;
    margin-left: 0;
    margin-right: 0;
    padding-bottom: 10px;
    padding-top: 9px;
}
.widget-tabs .nav-tabs > li:last-child > a {
    border-right: 0 none;
}
.widget-tabs .nav-tabs > li {
    margin-left: -1px;
}
.widget-tabs .nav-tabs > li > a:hover {
    background-color: rgba(255, 255, 255, 0.6);
    border-color: transparent -moz-use-text-color -moz-use-text-color;
    border-style: solid none none;
    border-width: 1px 0 0;
    color: #404040;
    margin-bottom: 0;
    margin-left: 0;
    margin-right: 0;
}
.widget-tabs .nav-tabs > .active > a {
    background-color: #FFFFFF;
    color: #555555;
    cursor: default;
}
.widget-tabs .widget-body.form {
    padding: 0;
}
.widget-tabs .widget-body.form .tab-pane {
    padding: 0 15px 15px;
}
.widget-tabs .widget-body.form .nav-tabs {
    margin-top: -37px;
}

.search-result label {
    width: 0 !important;
}
.search-result .controls {
    float: left;
    margin-left: 100px;
    margin-right: 10px;
}
.search-result label, .search-result input, .search-result button {
    float: left;
}

.classic-search {
    margin-bottom: 30px;
}
.classic-search h4 {
    margin-bottom: 3px;
}
.classic-search h4 a {
    color: #314558;
}
.file-search tr td img {
    float: left;
    padding-right: 10px;
}
.file-search tr td strong {
    display: block;
    padding-top: 5px;
}
.file-search tr td {
    vertical-align: middle;
}
.table th, .table td {
    padding: 8px;
}
.product-search {
    background: none repeat scroll 0 0 #F7F7F7;
    margin-bottom: 15px;
}
.product-text img {
    float: left;
    margin-right: 15px;
}
.product-text, .product-text .product-text-info {
    overflow: hidden;
}
.product-info {
    color: #616161;
    float: left;
    font-size: 12px;
    margin-bottom: 5px;
    padding: 15px 30px;
    text-transform: uppercase;
}
.product-info span {
    color: #E18090;
    display: block;
    font-size: 25px;
    font-weight: 200;
    margin-top: 10px;
    text-transform: uppercase;
}
ul li{float:left;padding:3px 12px;}
</style>
<body class="fixed-top">
	
   <div class="container-fluid">
            <!-- BEGIN PAGE CONTENT-->
            <div id="page">
                <div class="row-fluid ">
                    <div class="span12">
                        <!-- BEGIN TAB PORTLET-->
                        <div class="widget widget-tabs red">
                            <div class="widget-title">
                                <!--<h4><i class=" icon-search"></i>Search Result</h4>-->
                            </div>
                            <div class="widget-body">
                                <div class="tabbable portlet-tabs">
                                    <ul class="nav nav-tabs pull-left">
                                        <li><a data-toggle="tab" href="#portlet_tab4">产品搜索</a></li>
                                        <li><a data-toggle="tab" href="#portlet_tab3">公司搜索</a></li>
                                        <li><a data-toggle="tab" href="#portlet_tab2">文件搜索</a></li>
                                        <li class="active"><a data-toggle="tab" href="#portlet_tab1">分类搜索</a></li>
                                    </ul>
                                    <div class="clearfix"></div>
                                    <div class="tab-content">
                                        <div id="portlet_tab1" class="tab-pane active">
                                            <form class="form-horizontal search-result">
                                                <div class="control-group">
                                                    <label class="control-label">搜索</label>
                                                    <div class="controls">
                                                        <input type="text" class="input-xxlarge">
                                                        <p class="help-block">拱 3,880,000 条结果 (0.29 秒) </p>
                                                    </div>
                                                    <button class="btn " type="submit">搜索</button>
                                                </div>
                                            </form>
                                            <div class="space20"></div>
                                            <!-- BEGIN CLASSIC SEARCH-->
                                            <div class="classic-search">
                                                <h4><a href="#">萧旭岑将接任马英九办公室副秘书长</a></h4>
                                                <a href="#">http://news.sina.com.cn/c/2013-09-18/085328246217.shtml</a>
                                                <p>中国台湾网9月18日消息 据台湾今日新闻网报道，马英九办公室副秘书长罗智强日前请辞获准，马英九办公室发言人李佳霏17日证实，遗缺将由国民党文传会主委萧旭岑接任，自10月1日起生效。 </p>
                                            </div>
                                            <div class="classic-search">
                                                <h4><a href="#">王光亚呼吁支持梁振英 称未来特首必须爱国爱港</a></h4>
                                                <a href="#">http://news.sina.com.cn/c/2013-09-17/233628241649.shtml</a>
                                                <p>摘要：成员包括几十名全国政协委员的香港友好协进会代表团下午在北京和国务院港澳办主任王光亚会面。友好协进会代表团和王光亚会面后合照留念。有成员透露，王光亚在会上呼吁大家要多支持行政长官梁振英；又说，未来香港选出的特首，必须爱国爱港。</p>
                                            </div>
                                            <div class="classic-search">
                                                <h4><a href="#">王光亚呼吁支持梁振英 称未来特首必须爱国爱港</a></h4>
                                                <a href="#">http://news.sina.com.cn/c/2013-09-17/233628241649.shtml</a>
                                                <p>摘要：成员包括几十名全国政协委员的香港友好协进会代表团下午在北京和国务院港澳办主任王光亚会面。友好协进会代表团和王光亚会面后合照留念。有成员透露，王光亚在会上呼吁大家要多支持行政长官梁振英；又说，未来香港选出的特首，必须爱国爱港。</p>
                                            </div>
                                            <div class="classic-search">
                                                <h4><a href="#">王光亚呼吁支持梁振英 称未来特首必须爱国爱港</a></h4>
                                                <a href="#">http://news.sina.com.cn/c/2013-09-17/233628241649.shtml</a>
                                                <p>摘要：成员包括几十名全国政协委员的香港友好协进会代表团下午在北京和国务院港澳办主任王光亚会面。友好协进会代表团和王光亚会面后合照留念。有成员透露，王光亚在会上呼吁大家要多支持行政长官梁振英；又说，未来香港选出的特首，必须爱国爱港。</p>
                                            </div>
                                            <div class="classic-search">
                                                <h4><a href="#">王光亚呼吁支持梁振英 称未来特首必须爱国爱港</a></h4>
                                                <a href="#">http://news.sina.com.cn/c/2013-09-17/233628241649.shtml</a>
                                                <p>摘要：成员包括几十名全国政协委员的香港友好协进会代表团下午在北京和国务院港澳办主任王光亚会面。友好协进会代表团和王光亚会面后合照留念。有成员透露，王光亚在会上呼吁大家要多支持行政长官梁振英；又说，未来香港选出的特首，必须爱国爱港。</p>
                                            </div>

                                            <!-- END CLASSIC SEARCH-->

                                            <div class="pagination pagination-centered">
                                                <ul>
                                                    <li><a href="#">Prev</a></li>
                                                    <li class="active"><a href="#">1</a></li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li><a href="#">4</a></li>
                                                    <li><a href="#">5</a></li>
                                                    <li><a href="#">Next</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="portlet_tab2" class="tab-pane">
                                            <form class="form-horizontal search-result">
                                                <div class="control-group">
                                                    <label class="control-label">Search</label>
                                                    <div class="controls">
                                                        <input type="text" class="input-xxlarge">
                                                        <p class="help-block">About 3,880,000 results (0.29 seconds) </p>
                                                    </div>
                                                    <button class="btn " type="submit">SEARCH</button>
                                                </div>
                                            </form>
                                            <div class="space20"></div>
                                            <!-- BEGIN FILE SEARCH-->
                                            <table class="table table-hover file-search">
                                                <thead>
                                                <tr>
                                                    <th>文件名 &amp; 本地</th>
                                                    <th>创建时间</th>
                                                    <th>最后修改</th>
                                                    <th>大小</th>
                                                    <th>类型</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <img alt="" src="/images/icon/doc.png">
                                                        <strong>软件需求分析</strong>
                                                        C:\Users\Murat\Documents\My Dropbox                                                    </td>
                                                    <td>01.01.2012	</td>
                                                    <td>12.05.2013</td>
                                                    <td>193 KB</td>
                                                    <td>DOC文档</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img alt="" src="/images/icon/ppt.png">
                                                        <strong>方案设计</strong>
                                                        C:\Users\Murat\Documents\My Dropbox                                                    </td>
                                                    <td>01.01.2012	</td>
                                                    <td>12.05.2013</td>
                                                    <td>193 KB</td>
                                                    <td>PPT文档</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img alt="" src="/images/icon/xls.png">
                                                        <strong>价格分析表</strong>
                                                        C:\Users\Murat\Documents\My Dropbox                                                    </td>
                                                    <td>01.01.2012	</td>
                                                    <td>12.05.2013</td>
                                                    <td>193 KB</td>
                                                    <td>EXl文档</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img alt="" src="/images/icon/jpg.png">
                                                        <strong>Linux壁纸</strong>
                                                        C:\Users\Murat\Documents\My Dropbox                                                    </td>
                                                    <td>01.01.2012	</td>
                                                    <td>12.05.2013</td>
                                                    <td>193 KB</td>
                                                    <td>JPGE图片</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img alt="" src="/images/icon/zip.png">
                                                        <strong>系统备份</strong>
                                                        C:\Users\Murat\Documents\My Dropbox
                                                    </td>
                                                    <td>01.01.2012	</td>
                                                    <td>12.05.2013</td>
                                                    <td>193 KB</td>
                                                    <td>系统压缩</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img alt="" src="/images/icon/pdf.png">
                                                        <strong>widget开发pdf</strong>
                                                        C:\Users\Murat\Documents\My Dropbox
                                                    </td>
                                                    <td>01.01.2012	</td>
                                                    <td>12.05.2013</td>
                                                    <td>193 KB</td>
                                                    <td>PDF文档</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img alt="" src="/images/icon/ai.png">
                                                        <strong>黑客帝国</strong>
                                                        C:\Users\Murat\Documents\My Dropbox
                                                    </td>
                                                    <td>01.01.2012	</td>
                                                    <td>12.05.2013</td>
                                                    <td>193 KB</td>
                                                    <td>ai</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img alt="" src="/images/icon/psd.png">
                                                        <strong>界面设计</strong>
                                                        C:\Users\Murat\Documents\My Dropbox
                                                    </td>
                                                    <td>01.01.2012	</td>
                                                    <td>12.05.2013</td>
                                                    <td>193 KB</td>
                                                    <td>PSD底图</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img alt="" src="/images/icon/rss.png">
                                                        <strong>最新信息</strong>
                                                        C:\Users\Murat\Documents\My Dropbox
                                                    </td>
                                                    <td>01.01.2012	</td>
                                                    <td>12.05.2013</td>
                                                    <td>193 KB</td>
                                                    <td>RSS</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img alt="" src="/images/icon/email.png">
                                                        <strong>联系人</strong>
                                                        C:\Users\Murat\Documents\My Dropbox
                                                    </td>
                                                    <td>01.01.2012	</td>
                                                    <td>12.05.2013</td>
                                                    <td>193 KB</td>
                                                    <td>EML</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img alt="" src="/images/icon/eps.png">
                                                        <strong>系统标签</strong>
                                                        C:\Users\Murat\Documents\My Dropbox
                                                    </td>
                                                    <td>01.01.2012	</td>
                                                    <td>12.05.2013</td>
                                                    <td>193 KB</td>
                                                    <td>EPS</td>
                                                </tr>

                                                </tbody>
                                            </table>
                                            <p>
                                              <!-- END FILE SEARCH-->
                                            </p>
                                            <p>&nbsp; </p>
                                            <div class="space20"></div>

                                            <div class="pagination pagination-centered">
                                                <ul>
                                                    <li><a href="#">Prev</a></li>
                                                    <li class="active"><a href="#">1</a></li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li><a href="#">4</a></li>
                                                    <li><a href="#">5</a></li>
                                                    <li><a href="#">Next</a></li>
                                                </ul>
                                            </div>

                                        </div>
                                        <div id="portlet_tab3" class="tab-pane">
                                            <form class="form-horizontal search-result">
                                                <div class="control-group">
                                                    <label class="control-label">搜索</label>
                                                    <div class="controls">
                                                        <input type="text" class="input-xxlarge">
                                                        <p class="help-block">共 3,880,000 条记录 (0.29 秒) </p>
                                                    </div>
                                                    <button class="btn " type="submit">搜索</button>
                                                </div>
                                            </form>
                                            <div class="space20"></div>
                                            <!--BEGIN COMPANY SEARCH-->
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Company Name</th>
                                                    <th class="hidden-phone">Descrition</th>
                                                    <th>Total Transaction</th>
                                                    <th>Paid</th>
                                                    <th>Due</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td><a href="#">Frame 2 frame</a></td>
                                                    <td class="hidden-phone">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                                    <td>$ 20,000</td>
                                                    <td>$ 12,000</td>
                                                    <td>$ 8,000</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#">Dot Net Corporation</a></td>
                                                    <td class="hidden-phone">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                                    <td>$ 20,000</td>
                                                    <td>$ 12,000</td>
                                                    <td>$ 8,000</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#">Graphic Design	</a></td>
                                                    <td class="hidden-phone">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                                    <td>$ 20,000</td>
                                                    <td>$ 12,000</td>
                                                    <td>$ 8,000</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#">Graphzone</a></td>
                                                    <td class="hidden-phone">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                                    <td>$ 20,000</td>
                                                    <td>$ 12,000</td>
                                                    <td>$ 8,000</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#">Mega Pixel</a></td>
                                                    <td class="hidden-phone">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                                    <td>$ 20,000</td>
                                                    <td>$ 12,000</td>
                                                    <td>$ 8,000</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#">Pixel By Pixel</a></td>
                                                    <td class="hidden-phone">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                                    <td>$ 20,000</td>
                                                    <td>$ 12,000</td>
                                                    <td>$ 8,000</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#">Frame 2 frame</a></td>
                                                    <td class="hidden-phone">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                                    <td>$ 20,000</td>
                                                    <td>$ 12,000</td>
                                                    <td>$ 8,000</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#">Dot Net Corporation</a></td>
                                                    <td class="hidden-phone">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                                    <td>$ 20,000</td>
                                                    <td>$ 12,000</td>
                                                    <td>$ 8,000</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#">Graphzone</a></td>
                                                    <td class="hidden-phone">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                                    <td>$ 20,000</td>
                                                    <td>$ 12,000</td>
                                                    <td>$ 8,000</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#">Mega Pixel</a></td>
                                                    <td class="hidden-phone">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                                    <td>$ 20,000</td>
                                                    <td>$ 12,000</td>
                                                    <td>$ 8,000</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#">Frame 2 frame</a></td>
                                                    <td class="hidden-phone">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                                    <td>$ 20,000</td>
                                                    <td>$ 12,000</td>
                                                    <td>$ 8,000</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#">Dot Net Corporation</a></td>
                                                    <td class="hidden-phone">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                                    <td>$ 20,000</td>
                                                    <td>$ 12,000</td>
                                                    <td>$ 8,000</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#">Frame 2 frame</a></td>
                                                    <td class="hidden-phone">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                                    <td>$ 20,000</td>
                                                    <td>$ 12,000</td>
                                                    <td>$ 8,000</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <!--END COMPANY SEARCH-->
                                            <div class="space20"></div>

                                            <div class="pagination pagination-centered">
                                                <ul>
                                                    <li><a href="#">Prev</a></li>
                                                    <li class="active"><a href="#">1</a></li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li><a href="#">4</a></li>
                                                    <li><a href="#">5</a></li>
                                                    <li><a href="#">Next</a></li>
                                                </ul>
                                            </div>

                                        </div>
                                        <div id="portlet_tab4" class="tab-pane">
                                            <form class="form-horizontal search-result">
                                                <div class="control-group">
                                                    <label class="control-label">Search</label>
                                                    <div class="controls">
                                                        <input type="text" class="input-xxlarge">
                                                        <p class="help-block">About 3,880,000 results (0.29 seconds) </p>
                                                    </div>
                                                    <button class="btn " type="submit">SEARCH</button>
                                                </div>
                                            </form>
                                            <div class="space20"></div>
                                            <!--BEGIN PRODUCT SEARCH-->
                                            <div class="row-fluid product-search">
                                                <div class="span10 product-text">
                                                    <img src="/upload/product1.jpg" alt="">
                                                    <div class="portfolio-text-info">
                                                        <h4><strong>川AN7S77</strong></h4>
														<ul>
															<li><span  style="color:#888">事故日期:</span>2013-09-22</li>
															<li><span  style="color:#888">驾驶员:</span>张斯卡</li>
															<li><span  style="color:#888">事故处理经办人:</span>王的卡</li>
															
															<li><span  style="color:#888">事故处理经办人:</span>王的卡</li>
															<li><span  style="color:#888">事故处理经办人:</span>王的卡</li>
															<li><span  style="color:#888">事故处理经办人:</span>王的卡</li>
														</ul>
                                                    </div>
                                                </div>
                                                <div class="span2">
                                                    <div class="product-info">
                                                        <a>查看</a><br />
														<a>修改</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-fluid product-search">
                                                <div class="span4 product-text">
                                                    <img src="/upload/product2.png" alt="">
                                                    <div class="portfolio-text-info">
                                                        <h4>iMac Slim</h4>
                                                        <p>21 inch Display, 1.8 GHz Processor, 8 GB Memory</p>
                                                    </div>
                                                </div>
                                                <div class="span8">
                                                    <div class="product-info">
                                                        Today Sold
                                                        <span>190</span>
                                                    </div>
                                                    <div class="product-info">
                                                        Today's Earning
                                                        <span>1,970</span>
                                                    </div>
                                                    <div class="product-info">
                                                        Total Sold
                                                        <span>$12.300</span>
                                                    </div>
                                                    <div class="product-info">
                                                        Total Earnings
                                                        <span>$12.300</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-fluid product-search">
                                                <div class="span4 product-text">
                                                    <img src="/upload/product3.png" alt="">
                                                    <div class="portfolio-text-info">
                                                        <h4>iMac Slim</h4>
                                                        <p>21 inch Display, 1.8 GHz Processor, 8 GB Memory</p>
                                                    </div>
                                                </div>
                                                <div class="span8">
                                                    <div class="product-info">
                                                        Today Sold
                                                        <span>190</span>
                                                    </div>
                                                    <div class="product-info">
                                                        Today's Earning
                                                        <span>1,970</span>
                                                    </div>
                                                    <div class="product-info">
                                                        Total Sold
                                                        <span>$12.300</span>
                                                    </div>
                                                    <div class="product-info">
                                                        Total Earnings
                                                        <span>$12.300</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-fluid product-search">
                                                <div class="span4 product-text">
                                                    <img src="/upload/product4.png" alt="">
                                                    <div class="portfolio-text-info">
                                                        <h4>iMac Slim</h4>
                                                        <p>21 inch Display, 1.8 GHz Processor, 8 GB Memory</p>
                                                    </div>
                                                </div>
                                                <div class="span8">
                                                    <div class="product-info">
                                                        Today Sold
                                                        <span>190</span>
                                                    </div>
                                                    <div class="product-info">
                                                        Today's Earning
                                                        <span>1,970</span>
                                                    </div>
                                                    <div class="product-info">
                                                        Total Sold
                                                        <span>$12.300</span>
                                                    </div>
                                                    <div class="product-info">
                                                        Total Earnings
                                                        <span>$12.300</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-fluid product-search">
                                                <div class="span4 product-text">
                                                    <img src="/upload/product5.png" alt="">
                                                    <div class="portfolio-text-info">
                                                        <h4>iMac Slim</h4>
                                                        <p>21 inch Display, 1.8 GHz Processor, 8 GB Memory</p>
                                                    </div>
                                                </div>
                                                <div class="span8">
                                                    <div class="product-info">
                                                        Today Sold
                                                        <span>190</span>
                                                    </div>
                                                    <div class="product-info">
                                                        Today's Earning
                                                        <span>1,970</span>
                                                    </div>
                                                    <div class="product-info">
                                                        Total Sold
                                                        <span>$12.300</span>
                                                    </div>
                                                    <div class="product-info">
                                                        Total Earnings
                                                        <span>$12.300</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--END PRODUCT SEARCH-->
                                            <div class="space20"></div>

                                            <div class="pagination pagination-centered">
                                                <ul>
                                                    <li><a href="#">Prev</a></li>
                                                    <li class="active"><a href="#">1</a></li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li><a href="#">4</a></li>
                                                    <li><a href="#">5</a></li>
                                                    <li><a href="#">Next</a></li>
                                                </ul>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END TAB PORTLET-->
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
         </div>
	
<script src="/js/jquery-1.8.3.min.js" ></script>
<script src="/js/jquery.nicescroll.js"></script>
<script src="/js/jquery-ui.custom.min.js"></script>
<script src="/js/bootstrap.min.js" ></script>

</body>
</html>
<script>
var foo = "Hello World!";
document.write("<p>Before our anonymous function foo means '" + foo + '".</p>');

(function() {
    // The following code will be enclosed within an anonymous function
    var foo = "Goodbye World!";
    document.write("<p>Inside our anonymous function foo means '" + foo + '".</p>');
})(); // We call our anonymous function immediately

document.write("<p>After our anonymous function foo means '" + foo + '".</p>');

//打印页面
function startPrint(obj)   
{   
	var obj = document.getElementById(obj);
	var oWin=window.open("","_blank");
	var strPrint="<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"><html xmlns=\"http://www.w3.org/1999/xhtml\" content=\"text/html; charset=utf-8\">";
	strPrint=strPrint + "<body><h4 style=\"font-size:18px; text-align:center;\" style=\"font-size:18px; text-align:center;\">打印预览区</h4>\n";   
	strPrint=strPrint + "<script type=\"text/javascript\">\n";   
	strPrint=strPrint + "function printWin()\n";   
	strPrint=strPrint + "{";   
	strPrint=strPrint + "var oWin=window.open(\"\",\"_blank\");\n";   
	strPrint=strPrint + "oWin.document.write(document.getElementById(\"content\").innerHTML);\n";   
	strPrint=strPrint + "oWin.focus();\n";   
	strPrint=strPrint + "oWin.document.close();\n";   
	strPrint=strPrint + "oWin.print()\n";   
	strPrint=strPrint + "oWin.close()\n";   
	strPrint=strPrint + "}\n";   
	strPrint=strPrint + "<\/script>\n";   
	strPrint=strPrint + "<hr size='1' />\n";   
	strPrint=strPrint + "<div id=\"printcontent\">\n"; 
	strPrint=strPrint + "<style>img{background-color:#F4F4F4; border:1px solid #999999;float:left;font-size:10px;margin:2px 10px 4px 5px;padding:5px 5px;text-align:center;}\n#content{line-height:200%; margin:20px;}</style>";  
	strPrint=strPrint + obj.innerHTML + "\n";   
	strPrint=strPrint + "</div>\n";   
	strPrint=strPrint + "<hr size='1' />\n";   
	strPrint=strPrint + "<div style=\"text-align:center\"><button onclick='printWin()' style=\"padding-left:4px;padding-right:4px;\">打印</button><button onclick='window.opener=null;window.close();' style=\"padding-left:4px;padding-right:4px;\">关闭</button></div>\n</body></html>";   
	oWin.document.write(strPrint);   
	oWin.focus();   
	oWin.document.close();
}

function doPrint() { 
	bdhtml=window.document.body.innerHTML; 
sprnstr="<!--startprint-->"; 
eprnstr="<!--endprint-->"; 
prnhtml=bdhtml.substr(bdhtml.indexOf(sprnstr)+17); 
prnhtml=prnhtml.substring(0,prnhtml.indexOf(eprnstr)); 
window.document.body.innerHTML=prnhtml; 
window.print(); 


	//var obj = document.getElementById('testprint');
	//window.document.body.innerHTML=obj.innerHTML; 
	//window.print(); 
}

</script>

