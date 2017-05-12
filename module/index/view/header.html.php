<nav id="mainNav" class="navbar <? if(in_array($this->app->getModuleName(),array('news','supervision','guide','user_entry')) || in_array($this->app->getMethodName(),array('pub'))){echo 'navbar-default';}else{echo 'navbar-custom';} ?> navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
    	<button data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" class="navbar-toggle" type="button" aria-expanded="true">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
    	<a href="/" class="navbar-brand logo logo-main"></a>
        <div class="location mrl pull-left"><i class="fa fa-map-marker mrs"></i>乐山</div>
   	</div>
    <div id="bs-example-navbar-collapse-1" class="navbar-collapse collapse in" aria-expanded="true" style="">
      <ul class="nav navbar-nav">
        <li class="dropdown <? if($this->app->getModuleName()=='index'){?>active<? } ?>"> <a data-hover="dropdown" class="dropdown-toggle" href="/">首页 <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li> <a href="/news"><i class="icon-layers fa-fw"></i> 最新资讯 </a> </li>
            <li> <a href="/news/index?type=policy"><i class="icon-star fa-fw"></i> 房产政策 </a> </li>
            <li class="divider"></li>
            <!--li class="dropdown-header"> 代办 &amp; 监管: 贷款</li-->
            <li> <a href="/index/#M1"><i class="icon-handbag fa-fw"></i> 房价 </a> </li>
            <li> <a href="/supervision/index">监管</a> </li>
          </ul>
        </li>
        <!--li class="dropdown <? if($this->app->getModuleName()=='newhouse'){?>active<? } ?>"><a data-hover="dropdown" class="dropdown-toggle" href="/newhouse" aria-expanded="false">新房 <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li> <a href="#"><i class="icon-list"></i> 新盘 </a> </li>
            <li> <a href="#"><i class="icon-support"></i> 看房团 &amp; 优惠团</a> </li>
          </ul>
        </li-->

        <li <? if($this->app->getModuleName()=='newhouse'){ ?>class="active"<? } ?>> <a href="/newhouse">&nbsp;新房&nbsp;</a> </li>
        <li <? if($this->app->getModuleName()=='sale'){ ?>class="active"<? } ?>> <a href="/sale">二手房</a> </li>
        <li <? if($this->app->getModuleName()=='rent'){ ?>class="active"<? } ?>> <a href="/rent">&nbsp;租房&nbsp;</a> </li>
        <li class="dropdown <? if($this->app->getModuleName()=='office' || $this->app->getModuleName()=='business'){?>active<? } ?>"> <a data-hover="dropdown" class="dropdown-toggle" href="/office/index?type=rent">写字楼商铺 <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li> <a href="/newhouse?pm_type=22304"> 商铺出售 </a> </li>
            <!--li> <a href="/office/index?type=rent"> 写字楼出租 </a> </li-->
            <!--li> <a href="/office/index?type=sale"> 写字楼出售 </a> </li-->
            <li class="divider"></li>
            <li> <a href="/newhouse?pm_type=22305"> 写字楼出售 </a> </li>
            <!--li> <a href="/business/index?type=rent"> 商铺出租 </a> </li-->
            <!--li> <a href="/business/index?type=sale"> 商铺出售 </a> </li-->
          </ul>
        </li>
        <li> <a href="/supervision/index">投诉 &amp; 监管</a> </li>
        <li <? if($this->app->getModuleName()=='news'){ ?>class="active"<? } ?>> <a href="/news">资讯</a> </li>
        <li <? if($this->app->getModuleName()=='guide'){ ?>class="active"<? } ?>> <a href="/guide">指南</a> </li>
      </ul>
      <? //print_r($_SESSION);
        if(isset($_SESSION['login']) && $_SESSION['login']==1){
      ?>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="true"><i class="glyphicon glyphicon-user"></i>&nbsp;<?=$_SESSION['username']?><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li> <a href="/sale/pub"> 发布房源 </a> </li>
                <li> <a href="/user_center"> 我的发布 </a> </li>
                <li class="divider"></li>
                <li> <a href="/user_center"> 个人中心 </a> </li>
                <li> <a href="/userlogin/logout?type=index"> 退出系统 </a> </li>
              </ul>
            </li>
          </ul>
      <?}else{?>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="javascript:;"><i class="icon-user"></i>
                <span onClick="window.location.href='/userlogin/enter'">登录</span>
              </a>
            </li>
            <li>
              <a href="javascript:;"><i class="icon-user"></i>
                <span onClick="window.location.href='/userlogin/regist';">注册</span>
              </a>
            </li>
          </ul>
      <?}?>
      
      <!--ul class="nav navbar-nav navbar-right">
                <li class="dropdown"> <a title="Premium Bootstrap Themes &amp; Templates" data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"><i class="icon-star"></i> <span>登录</span>  <span>注册</span> <b class="caret"></b></a>
                	<ul class="dropdown-menu">
                        <li> <a href="/bootstrap-design-services"><i class="icon-pencil fa-fw"></i> Custom Bootstrap Design Services</a> </li>
                        <li> <a href="https://wrapbootstrap.com/?ref=StartBootstrap"><i class="icon-handbag fa-fw"></i> WrapBootstrap - Premium Bootstrap Themes</a> </li>
                    </ul>
                </li>
                <li> <a data-target="#searchModal" data-toggle="modal" href="#"><i class="icon-magnifier"></i> <span class="hidden-lg hidden-md hidden-sm">Search Themes</span></a> </li>
              </ul--> 
    </div>
  </div>
  <!-- /.container-fluid --> 
</nav>
<div class="page-header-clear"></div>