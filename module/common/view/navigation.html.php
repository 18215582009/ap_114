<!--BEGIN TEMPLATE SETTING-->
<div class="hidden-xs hidden-sm">
    <div id="template-setting">
        <div class="content-template-setting">
            <button id="save-setting" class="btn btn-success btn-sm pull-right">保存</button>
            <div class="mbm clearfix"></div>
            <h5 class="pull-left">头部主题</h5>

            <div class="pull-right">
                <div id="setting-header-dark" data-on="info" data-off="default" data-on-label="Dark"
                     data-off-label="Light" class="make-switch switch-small"><input type="checkbox" class="switch"/>
                </div>
            </div>
            <div class="mbm clearfix"></div>
            <h5>菜单栏颜色</h5>
            <ul class="sidebar-color list-unstyled list-inline">
                <li data-style="grey" class="grey-blue active"></li>
                <li data-style="default" class="grey"></li>
                <li data-style="blue" class="blue"></li>
                <li data-style="green" class="green"></li>
                <li data-style="orange" class="orange"></li>
                <li data-style="white" class="white"></li>
            </ul>
            <div class="mbm clearfix"></div>
            <h5 class="pull-left">字体</h5>

            <div class="pull-right"><select id="font-select" class="mts">
                <option value="source-sans-pro">Source Sans Pro</option>
                <option value="open-sans">Open Sans</option>
                <option value="roboto">Roboto</option>
                <option value="lato">Lato</option>
                <option value="lora">Lora</option>
                <option value="helvetica">Helvetica Neue</option>
            </select></div>
            <div class="mbm clearfix"></div>
            <hr/>
            <h5 class="pull-left">Header Fixed</h5>

            <div class="pull-right">
                <div id="setting-header-fixed" data-on="success" data-off="default"
                     class="make-switch switch-small"><input type="checkbox" class="switch"/></div>
            </div>
            <div class="mbm clearfix"></div>
            <h5 class="pull-left">Sidebar Collapsed</h5>

            <div class="pull-right">
                <div id="setting-sidebar-collapsed" data-on="success" data-off="default"
                     class="make-switch switch-small"><input type="checkbox" class="switch"/></div>
            </div>
            <div class="mbm clearfix"></div>
            <h5 class="pull-left">Sidebar Show/Hide</h5>

            <div class="pull-right">
                <div id="setting-sidebar-hide" data-on="success" data-off="default"
                     class="make-switch switch-small"><input type="checkbox" class="switch"/></div>
            </div>
            <div class="mbm clearfix"></div>
            <h5 class="pull-left">Sidebar Fixed</h5>

            <div class="pull-right">
                <div id="setting-sidebar-fixed" data-on="success" data-off="default"
                     class="make-switch switch-small"><input type="checkbox" class="switch"/></div>
            </div>
            <div class="mbm clearfix"></div>
            <h5 class="pull-left">Toggle Button<i data-hover="tooltip" data-placement="top"
                                                  title="Switch it then click toogle button on topbar"
                                                  class="fa fa-info-circle mls"></i></h5>

            <div class="pull-right">
                <div id="setting-toggle-status" data-on="success" data-off="default" data-on-label="Hide"
                     data-off-label="Mini" class="make-switch switch-small"><input type="checkbox" class="switch"/>
                </div>
            </div>
            <div class="mbm clearfix"></div>
            <hr/>
            <h5 class="pull-left">Logo mode</h5>

            <div class="pull-right">
                <div id="setting-logo-status" data-on="success" data-off="default" data-on-label="Aside"
                     data-off-label="Top" class="make-switch switch-small"><input type="checkbox" class="switch"/>
                </div>
            </div>
            <div class="mbm clearfix"></div>
            <h5 class="pull-left">Layout Boxed</h5>

            <div class="pull-right">
                <div id="setting-layout-boxed" data-on="success" data-off="default"
                     class="make-switch switch-small"><input type="checkbox" class="switch"/></div>
            </div>
            <div class="mbm clearfix"></div>
            <h5 class="pull-left">Menu Horizontal</h5>

            <div class="pull-right">
                <div id="setting-horizontal-menu" data-on="success" data-off="default"
                     class="make-switch switch-small"><input type="checkbox" class="switch"/></div>
            </div>
            <div class="mbm clearfix"></div>
        </div>
    </div>
</div>
<!--END TEMPLATE SETTING-->
<!--BEGIN TOPBAR-->
<div class="page-header-topbar">
    <nav class="navbar navbar-default container pln prn" role="navigation" id="topbar">
        <div class="container-fluid pln prn">
            <div class="navbar-collapse pln prn" id="topbar-menu">
                <ul class="nav navbar-nav logo-wrapper">
                    <li class="btn-menu-toggle">
                        <div class="show-collapsed" id="menu-toggle"><i class="fa fa-bars"></i></div>
                    </li>
                    <li class="pull-left"><a class="pan" href="index.html" id="logo"><img src="/images/logo.png"/></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-left topbar-nav">
                    <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown"><i
                            class="icon-calendar"></i><span class="badge badge-primary">1</span></a>
                        <ul class="dropdown-menu dropdown-task dropdown-topbar">
                            <li><p>您有一个新的任务</p></li>
                            <li>
                                <div class="dropdown-slimscroll">
                                    <ul>
                                        <li class="unread"><a href="#" target="_blank">推送XXX项目数据100条<span class="label label-success pull-right">紧急</span><br/><span
                                                    class="text-muted small">4分钟前</span></a></li>
                                        <li><a href="#" target="_blank">关闭XXX项目张三经纪人使用权限<span
                                                class="label label-info pull-right">一般</span><br/><span
                                                class="text-muted small">12分钟前</span></a></li>
                                        <li><a href="#" target="_blank">关闭XXX项目张三经纪人使用权限<span
                                                class="label label-warning pull-right">重要</span><br/><span
                                                class="text-muted small">15分钟前</span></a></li>
                                        <li><a href="#" target="_blank">关闭XXX项目张三经纪人使用权限<span
                                                class="label label-default pull-right">一般</span><br/><span
                                                class="text-muted small">18分钟前</span></a></li>
                                        <li><a href="#" target="_blank">关闭XXX项目张三经纪人使用权限<span
                                                class="label label-success pull-right">一般</span><br/><span
                                                class="text-muted small">2天前</span></a></li>
                                        <li><a href="#" target="_blank">关闭XXX项目张三经纪人使用权限<span
                                                class="label label-info pull-right">一般</span><br/><span
                                                class="text-muted small">2天前</span></a></li>
                                        <li><a href="#" target="_blank">关闭XXX项目张三经纪人使用权限<span
                                                class="label label-default pull-right">一般</span><br/><span
                                                class="text-muted small">5天前</span></a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="last"><a class="text-right" href="extra-user-list.html">通知</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown"><i
                            class="icon-bell"></i><span
                            data-pulsate="{parent:true,onClick:'stop',border:false,speed:800,reach: 20,delay:5000}"
                            class="badge badge-success">2</span></a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li><p>您有2条通知</p></li>
                            <li>
                                <div class="dropdown-slimscroll">
                                    <ul>
                                        <li class="unread"><a href="extra-user-list.html" target="_blank"><span
                                                class="label label-info"><i class="fa fa-comment"></i></span>最新评论<span class="pull-right text-muted small">4分钟前</span></a>
                                        </li>
                                        <li class="unread"><a href="extra-user-list.html" target="_blank"><span
                                                class="label label-success"><i class="fa fa-twitter"></i></span>3个客户<span
                                                    class="pull-right text-muted small">12分钟前</span></a></li>
                                        <li><a href="extra-user-list.html" target="_blank"><span
                                                class="label label-warning"><i class="fa fa-envelope"></i></span>消息发送<span class="pull-right text-muted small">15分钟前</span></a>
                                        </li>
                                        <li><a href="extra-user-list.html" target="_blank"><span
                                                class="label label-success"><i class="fa fa-tasks"></i></span>最新任务<span class="pull-right text-muted small">18分钟前</span></a>
                                        </li>
                                        <li><a href="extra-user-list.html" target="_blank"><span
                                                class="label label-danger"><i class="fa fa-upload"></i></span>重置账户<span class="pull-right text-muted small">19分钟前</span></a>
                                        </li>
                                        <li><a href="extra-user-list.html" target="_blank"><span
                                                class="label label-success"><i class="fa fa-tasks"></i></span>新任务<span class="pull-right text-muted small">2天前</span></a></li>
                                        <li><a href="extra-user-list.html" target="_blank"><span
                                                class="label label-warning"><i class="fa fa-envelope"></i></span>消息发送<span class="pull-right text-muted small">5天前</span></a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="last"><a class="text-right" href="#">查看更多</a>
                            </li>
                        </ul>
                    </li>
                    <li class="hidden-sm hidden-xs">
                        <div class="btn btn-info btn-xs mlm" id="note-app-toggle"><i class="icon-note mrs"></i>记事本</div>
                        <div id="note-app-wrapper">
                            <div class="note-app-tools"><i data-hover="tooltip" title="New" class="icon-note"></i><i
                                    data-hover="tooltip" title="Import" class="fa fa-sign-in"></i><i
                                    data-hover="tooltip" title="Save" class="fa fa-save"></i><i data-hover="tooltip"
                                                                                                title="Close"
                                                                                                class="icon-close"></i><input
                                    id="note-app-file" type="file" style="display: none;"/></div>
                            <div class="note-app-list"></div>
                            <div class="note-app-data"><input type="text" placeholder="Enter note title..."
                                                              class="note-app-title"/><textarea
                                    placeholder="Enter note description here..."
                                    class="note-app-content"></textarea></div>
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden-xs" id="topbar-chat"><a class="btn-chat" href="javascript:void(0)"><i
                            class="fa fa-comments-o"></i><span class="badge badge-warning">3</span></a></li>
                    <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown"><i
                            class="icon-user"></i>&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-user pull-right">
                            <li>
                                <div class="navbar-content">
                                    <div class="row">
                                        <div class="col-md-5 col-xs-5"><img src="/images/app_icons/org64.png" alt="" class="img-responsive img-circle"/>
                                            <p class="text-center mtm"><a class="change-avatar" href="#">
                                                <small>设置头像</small>
                                            </a></p>
                                        </div>
                                        <div class="col-md-7 col-xs-5"><span><?=$_SESSION['username']?></span>

                                            <p class="text-muted small">qq@mail.com</p>

                                            <div class="divider"></div>
                                            <a href="#">
                                                <button class="btn btn-default btn-sm" href="#">编辑信息</button>
                                            </a></div>
                                    </div>
                                </div>
                                <div class="navbar-footer">
                                    <div class="navbar-footer-content">
                                        <div class="row">
                                            <div class="col-md-6 col-xs-6"><a href="#">
                                                <button class="btn btn-default btn-sm">修改密码</button>
                                            </a></div>
                                            <div class="col-md-6 col-xs-6"><a href="/userlogin/logout">
                                                <button href="page-lock-screen.html" class="btn btn-info btn-sm pull-right">系统退出</button>
                                            </a></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="hidden-sm hidden-xs"><a class="btn-template-setting" href="#"><i
                            class="icon-settings"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<!--END TOPBAR-->
<!--BEGIN HORIZONTAL MENU-->
<div class="page-horizontal-menu">
    <div id="horizontal-menu" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li><a href="index.html"><i class="icon-home"></i><span class="menu-title">Dashboard</span></a></li>
            <li><a href="page_profile.html"><i class="icon-user"></i><span class="menu-title">User Profile</span></a></li>
            <li><a href="page_mail.html"><i class="icon-envelope"></i><span class="menu-title">Mail Box</span></a></li>
            <li class="dropdown"><a href="#" data-hover="dropdown" class="dropdown-toggle"><i class="icon-screen-desktop"></i><span class="menu-title">Layouts</span></a>
                <ul class="dropdown-menu">
                    <li><a href="layout_full_width.html"><span class="submenu-title">Full width</span></a></li>
                    <li><a href="layout_boxed.html"><span class="submenu-title">Boxed</span></a></li>
                    <li class="hidden-sm"><a href="layout_sidebar_collapsed.html"><span class="submenu-title">Sidebar Collapsed</span></a></li>
                    <li class="hidden-sm"><a href="layout_sidebar_fixed.html"><span class="submenu-title">Sidebar fixed</span></a></li>
                    <li class="hidden-sm"><a href="layout_sidebar_collapsed_fixed.html"><span class="submenu-title">Sidebar collapsed & fixed</span></a></li>
                    <li><a href="layout_horizontal_menu.html"><span class="submenu-title">Horizontal Menu</span></a></li>
                    <li><a href="layout_header_fixed.html"><span class="submenu-title">Header Fixed</span></a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#" data-hover="dropdown" class="dropdown-toggle"><i
                    class="icon-magic-wand"></i><span class="menu-title">UI Elements</span><span
                    class="badge badge-danger">3</span></a>
                <ul class="dropdown-menu">
                    <li><a href="ui_general.html"><span class="submenu-title">General</span><span class="badge badge-success">10</span></a></li>
                    <li><a href="ui_buttons.html"><span class="submenu-title">Buttons</span></a></li>
                    <li><a href="ui_typography.html"><span class="submenu-title">Typography</span></a></li>
                    <li><a href="ui_tabs_accordions.html"><span class="submenu-title">Tabs & Accordions</span></a></li>
                    <li><a href="ui_modals.html"><span class="submenu-title">Modals</span></a></li>
                    <li><a href="ui_treeview.html"><span class="submenu-title">Tree view</span></a></li>
                    <li><a href="ui_icons.html"><span class="submenu-title">Icons</span></a></li>
                    <li><a href="ui_panels.html"><span class="submenu-title">Panels</span></a></li>
                    <li><a href="ui_nestable_list.html"><span class="submenu-title">Nestable List</span></a></li>
                    <li><a href="ui_toastr.html"><span class="submenu-title">Toastr Notifications</span></a></li>
                    <li><a href="ui_datepaginator.html"><span class="submenu-title">Date Paginator</span></a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#" data-hover="dropdown" class="dropdown-toggle"><i class="icon-note"></i><span
                    class="menu-title">Forms</span></a>
                <ul class="dropdown-menu">
                    <li><a href="form_components.html"><span class="submenu-title">Form Component</span><span class="label label-info">8</span></a></li>
                    <li><a href="form_wizard.html"><span class="submenu-title">Form Wizard</span></a></li>
                    <li><a href="form_validation.html"><span class="submenu-title">Form Validation</span></a></li>
                    <li><a href="form_select.html"><span class="submenu-title">Dropdown & Select</span></a></li>
                    <li><a href="form_picker.html"><span class="submenu-title">Picker</span></a></li>
                    <li><a href="form_editor.html"><span class="submenu-title">Editor</span></a></li>
                    <li><a href="form_dropzone.html"><span class="submenu-title">Dropzone File Upload</span></a></li>
                    <li><a href="form_multiple_file_upload.html"><span class="submenu-title">Multiple File Upload</span></a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#" data-hover="dropdown" class="dropdown-toggle"><i class="icon-grid"></i><span
                    class="menu-title">Tables</span></a>
                <ul class="dropdown-menu">
                    <li><a href="table_basic.html"><span class="submenu-title">Basic table</span></a></li>
                    <li><a href="table_responsive.html"><span class="submenu-title">Responsive table</span></a></li>
                    <li><a href="table_advanced.html"><span class="submenu-title">Advanced table</span></a></li>
                    <li><a href="table_treegrid.html"><span class="submenu-title">Treegrid table</span></a></li>
                </ul>
            </li>
            <li class="dropdown active"><a href="#" data-hover="dropdown" class="dropdown-toggle"><i
                    class="icon-book-open"></i><span class="menu-title">Pages</span></a>
                <ul class="dropdown-menu in">
                    <li><a href="page_gallery.html"><span class="submenu-title">Gallery</span></a></li>
                    <li><a href="page_calendar.html"><span class="submenu-title">Calendar</span></a></li>
                    <li><a href="page_invoice.html"><span class="submenu-title">Invoice</span></a></li>
                    <li class="active"><a href="page_pricing_table.html"><span
                            class="submenu-title">Pricing Table</span></a></li>
                    <li><a href="page_search.html"><span class="submenu-title">Search</span></a></li>
                    <li><a href="page_signin.html"><span class="submenu-title">Sign in</span></a></li>
                    <li><a href="page_signup.html"><span class="submenu-title">Sign up</span></a></li>
                    <li><a href="page_lock_screen.html"><span class="submenu-title">Lock screen</span></a></li>
                    <li><a href="page_404.html"><span class="submenu-title">Page 404</span></a></li>
                    <li><a href="page_500.html"><span class="submenu-title">Page 500</span></a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#" data-hover="dropdown" class="dropdown-toggle"><i
                    class="icon-bar-chart"></i><span class="menu-title">Chart</span><span
                    class="badge badge-warning">8</span></a>
                <ul class="dropdown-menu">
                    <li><a href="charts_chartjs.html"><span class="submenu-title">ChartJs</span></a></li>
                    <li><a href="charts_flot.html"><span class="submenu-title">Flot Charts</span></a></li>
                    <li><a href="charts_sparklines.html"><span class="submenu-title">Sparklines Charts</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!--END HORIZONTAL MENU-->