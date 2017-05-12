<div class="sidebar-main sidebar">
    <div class="sidebar-collapse sidebar-scroll">
        <ul id="sidebar-main" class="nav metismenu">
            <!--li class="sidebar-search">
                <form action="#" class="form-search">
                    <div class="input-icon right"><i class="icon-magnifier"></i>
                    <input type="text" placeholder="搜索..." class="form-control"/>
                    </div>
                </form>
            </li-->
            <li class="sidebar-hide"><h4 class="sidebar-title-section">主要</h4></li>
            <li onclick="launch('index.html');" class="active"><a href="#"><i class="icon-home"></i><span class="menu-title">工作台</span></a></li>
            <li onclick="launch('fc_project/index.html');"><a href="#"><i class="icon-book-open"></i><span class="menu-title">信息管理</span><span class="badge badge-success">80%</span></a></li>
            
            <li><a href="javascript:frameWorkTab('1','流程设计','/wkf_admin/index');"><i class="icon-book-open"></i><span class="menu-title">流程设计</span></a></li>
            <!--li><a href="page_calendar.html"><i class="icon-calendar"></i><span
                    class="menu-title">日历</span><span class="badge badge-warning">2 件</span></a>
            </li-->
            
            <li>
                <a href="#"><i class="icon-home"></i><span class="menu-title">test</span><span class="arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li title="test"><a href="javascript:void(0);" ><span class="submenu-title">test1</span></a></li>
                    <li>
                    <a aria-expanded="false" href="#"><span class="menu-title">Menu 1.3</span><span class="fa plus-minus"></span></a>
                    <ul aria-expanded="false" class="collapse nav nav-second-level">
                      <li><a href="#"><span class="submenu-title">item 1.3.1</span></a></li>
                      <li><a href="#"><span class="submenu-title">item 1.3.2</span></a></li>
                      <li><a href="#"><span class="submenu-title">item 1.3.3</span></a></li>
                      <li><a href="#"><span class="submenu-title">item 1.3.4</span></a></li>
                    </ul>
                  </li>
                </ul>
            </li>
            <li class="sidebar-hide"><h4 class="sidebar-title-section">其他</h4></li>
            <!--
			<?php foreach($menu as $val){ if($val['parent_id']=='0'){	?>	
                <li>
                    <a href="#"><i class="<?=$val['icon']?>"></i><span class="menu-title"><?=$val['name']?></span><span class="arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <?php foreach($menu as $cval){ if($cval['parent_id']==$val['id']){?>
                        <li title="<?=$cavl['description']?>"><a href="javascript:void(0);" onclick="launch('<?=$cval['url']?>');"><span class="submenu-title"><?=$cval['name']?></span></a></li>
                        <?php }} ?>
                    </ul>
                </li>
            <?php }} ?>
			-->
            <!--li class="active"><a href="#"><i class="icon-compass"></i><span class="menu-title">其他</span><span class="arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="index.html" target="main"><span class="submenu-title">1</span></a></li>
                    <li><a href="index.html" target="main"><span class="submenu-title">2</span></a></li>
                </ul>
            </li-->
            
        </ul>
        
        
    </div>
</div>