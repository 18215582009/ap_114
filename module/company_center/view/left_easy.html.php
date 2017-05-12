<div class="sidebar-main sidebar">
    <div class="sidebar-collapse sidebar-scroll">
        <ul id="sidebar-main" class="nav mtl">
            <? if($this->session->user_type==10){ ?>
                <li class="active"><a href="#"><i class="icon-user"></i><span class="menu-title">个人中心</span></a></li>
                <li><a href="#"><i class="icon-book-open"></i><span class="menu-title">我的收藏</span></a></li>
                <li><a href="#"><i class="icon-bar-chart"></i><span class="menu-title">为您推荐</span></a></li>
                <li><a href="#"><i class="icon-bell"></i><span class="menu-title">我要投诉</span><span class="badge badge-danger">hot</span></a></li>
                <li><a href="#"><i class="icon-note"></i><span class="menu-title">委托出售</span></a></li>
                <li><a href="page_calendar.html"><i class="icon-rocket"></i><span class="menu-title">发布出租</span></a>
                </li>
                <li><a href="/guide" target="_blank"><i class="icon-question"></i><span class="menu-title">购房指南</span></a></li>
            <? }else{ ?>
            <li class="active"><a href="#"><i class="icon-home"></i><span class="menu-title">工作台</span></a></li>
            <li><a href="#"><i class="icon-screen-desktop"></i><span class="menu-title">项目管理</span><span class="badge badge-success">80%</span></a></li>
            <li><a href="page_calendar.html"><i class="icon-calendar"></i><span
                    class="menu-title">日历</span><span class="badge badge-warning">2 件</span></a>
            </li>
            <li><a href="#"><i class="icon-bar-chart"></i><span class="menu-title">数据统计</span></a></li>
            <li><a href="#"><i class="icon-book-open"></i><span class="menu-title">行业报表</span></a></li>
            <li><a href="#"><i class="icon-compass"></i><span class="menu-title">意向客户</span><span class="arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/"><span class="submenu-title">客户数据</span></a></li>
                    <li><a href="/"><span class="submenu-title">合作伙伴数据</span></a></li>
                </ul>
            </li>
            <? } ?>
        </ul>
    </div>
</div>