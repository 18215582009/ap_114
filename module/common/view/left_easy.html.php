<div class="sidebar-main sidebar">
    <div class="sidebar-collapse sidebar-scroll">
        <ul id="sidebar-main" class="nav">
            <li class="sidebar-search">
                <form action="#" class="form-search">
                    <div class="input-icon right"><i class="icon-magnifier"></i>
                    <input type="text" placeholder="搜索..." class="form-control"/>
                    </div>
                </form>
            </li>
            <!--li class="sidebar-hide"><h4 class="sidebar-title-section">主要</h4></li>
            <li onclick="launch('index.html');"><a href="#"><i class="icon-home"></i><span class="menu-title">工作台</span></a></li>
            <li onclick="launch('fc_project/index.html');"><a href="#"><i class="icon-book-open"></i><span class="menu-title">信息管理</span><span class="badge badge-success">80%</span></a></li>
            <li><a href="page_calendar.html"><i class="icon-calendar"></i><span
                    class="menu-title">日历</span><span class="badge badge-warning">2 件</span></a>
            </li-->
            <li class="sidebar-hide"><h4 class="sidebar-title-section">功能</h4></li>
            <li onclick="launch('index.html');"><a href="#"><i class="icon-home"></i><span class="menu-title">管理中心</span></a></li>
            <?php foreach($menu as $val){	?>	
                <li>
                    <a href="#"><i class="<?=$val['project_icon']?>"></i><span class="menu-title"><?=$val['project_name']?></span><span class="arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <?php foreach($val['child'] as $cval){ ?>
                        <li title="<?=$cval['business_name']?>">
                            <a href="javascript:void(0);" onclick="launch('/<?=$cval['module_name']?>/<?=$cval['method_name']?>');"><span class="submenu-title"><?=$cval['business_name']?></span></a>
                        </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
            <li class="active"><a href="#"><i class="icon-compass"></i><span class="menu-title">其他</span><span class="arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="index.html" target="main"><span class="submenu-title">1</span></a></li>
                    <li><a href="index.html" target="main"><span class="submenu-title">2</span></a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>