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
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Css+Html前端框架</title>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_font-awesome.min.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_simple-line-icons.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/bootstrap.min.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_animate.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_all.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/bootstrap-switch.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/prettify.css';?>' type='text/css' media='screen' />
<link type="text/css" rel="stylesheet" href="" id="font-layout">
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/toastr.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/jquery.treegrid.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_core.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_system.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_system-responsive.css';?>' type='text/css' media='screen' />
</head>
<body class="sidebar-color-grey font-source-sans-pro"><!--Modal Default-->
<div id="source-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" class="close">&times;</button>
                <h4 id="modal-default-label" class="modal-title">View Code</h4></div>
            <div class="modal-body">
                <pre class="prettyprint linenums"></pre>
            </div>
        </div>
    </div>
</div>
<div class="fluid"><!--BEGIN TEMPLATE SETTING-->
    <div class="hidden-xs hidden-sm">
        <div id="template-setting">
            <div class="content-template-setting">
                <button id="save-setting" class="btn btn-success btn-sm pull-right">Save Change</button>
                <div class="mbm clearfix"></div>
                <h5 class="pull-left">Header theme</h5>

                <div class="pull-right">
                    <div id="setting-header-dark" data-on="info" data-off="default" data-on-label="Dark"
                         data-off-label="Light" class="make-switch switch-small"><input type="checkbox" class="switch"/>
                    </div>
                </div>
                <div class="mbm clearfix"></div>
                <h5>Sidebar Colors</h5>
                <ul class="sidebar-color list-unstyled list-inline">
                    <li data-style="grey" class="grey-blue active"></li>
                    <li data-style="default" class="grey"></li>
                    <li data-style="blue" class="blue"></li>
                    <li data-style="green" class="green"></li>
                    <li data-style="orange" class="orange"></li>
                    <li data-style="white" class="white"></li>
                </ul>
                <div class="mbm clearfix"></div>
                <h5 class="pull-left">Font</h5>

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
    <!--END TEMPLATE SETTING--><!--BEGIN TOPBAR-->
    <div class="page-header-topbar">
        <nav id="topbar" role="navigation" class="navbar navbar-default container pln prn">
            <div class="container-fluid pln prn">
                <div id="topbar-menu" class="navbar-collapse pln prn">
                    <ul class="nav navbar-nav logo-wrapper">
                        <li class="btn-menu-toggle">
                            <div id="menu-toggle" class="show-collapsed"><i class="fa fa-bars"></i></div>
                        </li>
                        <li class="pull-left"><a id="logo" href="index.html" class="pan"><img
                                src="assets/images/logo2.png"/></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-left topbar-nav">
                        <li class="dropdown"><a data-toggle="dropdown" href="#" class="dropdown-toggle"><i
                                class="icon-calendar"></i><span class="badge badge-primary">1</span></a>
                            <ul class="dropdown-menu dropdown-task dropdown-topbar">
                                <li><p>You have 1 new tasks</p></li>
                                <li>
                                    <div class="dropdown-slimscroll">
                                        <ul>
                                            <li class="unread"><a href="#" target="_blank">Lorem ipsum dolor sit
                                                amet<span class="label label-success pull-right">Html</span><br/><span
                                                        class="text-muted small">4 mins ago</span></a></li>
                                            <li><a href="#" target="_blank">Consectetur adipiscing<span
                                                    class="label label-info pull-right">CSS</span><br/><span
                                                    class="text-muted small">12 mins ago</span></a></li>
                                            <li><a href="#" target="_blank">Tempor incididunt ut<span
                                                    class="label label-warning pull-right">Javascript</span><br/><span
                                                    class="text-muted small">15 mins ago</span></a></li>
                                            <li><a href="#" target="_blank">Ut enim ad minim<span
                                                    class="label label-default pull-right">Fix Bug</span><br/><span
                                                    class="text-muted small">18 mins ago</span></a></li>
                                            <li><a href="#" target="_blank">Sed ut perspiciatis unde omnis<span
                                                    class="label label-success pull-right">Html</span><br/><span
                                                    class="text-muted small">2 days ago</span></a></li>
                                            <li><a href="#" target="_blank">Sed quia non numquam<span
                                                    class="label label-info pull-right">CSS</span><br/><span
                                                    class="text-muted small">2 days ago</span></a></li>
                                            <li><a href="#" target="_blank">Lorem ipsum dolor sit<span
                                                    class="label label-default pull-right">Fix Bug</span><br/><span
                                                    class="text-muted small">5 days ago</span></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="last"><a href="extra-user-list.html" class="text-right">See all alerts</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown"><a data-toggle="dropdown" href="#" class="dropdown-toggle"><i
                                class="icon-bell"></i><span
                                data-pulsate="{parent:true,onClick:'stop',border:false,speed:800,reach: 20,delay:5000}"
                                class="badge badge-success">2</span></a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li><p>You have 2 new notifications</p></li>
                                <li>
                                    <div class="dropdown-slimscroll">
                                        <ul>
                                            <li class="unread"><a href="extra-user-list.html" target="_blank"><span
                                                    class="label label-info"><i class="fa fa-comment"></i></span>New
                                                Comment<span class="pull-right text-muted small">4 mins ago</span></a>
                                            </li>
                                            <li class="unread"><a href="extra-user-list.html" target="_blank"><span
                                                    class="label label-success"><i class="fa fa-twitter"></i></span>3
                                                New Followers<span
                                                        class="pull-right text-muted small">12 mins ago</span></a></li>
                                            <li><a href="extra-user-list.html" target="_blank"><span
                                                    class="label label-warning"><i class="fa fa-envelope"></i></span>Message
                                                Sent<span class="pull-right text-muted small">15 mins ago</span></a>
                                            </li>
                                            <li><a href="extra-user-list.html" target="_blank"><span
                                                    class="label label-success"><i class="fa fa-tasks"></i></span>New
                                                Task<span class="pull-right text-muted small">18 mins ago</span></a>
                                            </li>
                                            <li><a href="extra-user-list.html" target="_blank"><span
                                                    class="label label-danger"><i class="fa fa-upload"></i></span>Server
                                                Rebooted<span class="pull-right text-muted small">19 mins ago</span></a>
                                            </li>
                                            <li><a href="extra-user-list.html" target="_blank"><span
                                                    class="label label-success"><i class="fa fa-tasks"></i></span>New
                                                Task<span class="pull-right text-muted small">2 days ago</span></a></li>
                                            <li><a href="extra-user-list.html" target="_blank"><span
                                                    class="label label-warning"><i class="fa fa-envelope"></i></span>Message
                                                Sent<span class="pull-right text-muted small">5 days ago</span></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="last"><a href="extra-user-list.html" class="text-right">See all alerts</a>
                                </li>
                            </ul>
                        </li>
                        <li class="hidden-sm hidden-xs">
                            <div id="note-app-toggle" class="btn btn-info btn-xs mlm"><i class="icon-note mrs"></i>Add
                                note
                            </div>
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
                        <li id="topbar-chat" class="hidden-xs"><a href="javascript:void(0)" class="btn-chat"><i
                                class="fa fa-comments-o"></i><span class="badge badge-warning">3</span></a></li>
                        <li class="dropdown"><a data-toggle="dropdown" href="#" class="dropdown-toggle"><i
                                class="icon-user"></i>&nbsp;<span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-user pull-right">
                                <li>
                                    <div class="navbar-content">
                                        <div class="row">
                                            <div class="col-md-5 col-xs-5"><img
                                                    src="http://api.randomuser.me/portraits/men/27.jpg" alt=""
                                                    class="img-responsive img-circle"/>

                                                <p class="text-center mtm"><a href="#" class="change-avatar">
                                                    <small>Set Avatar</small>
                                                </a></p>
                                            </div>
                                            <div class="col-md-7 col-xs-5"><span>Jake Rochleau</span>

                                                <p class="text-muted small">example@mail.com</p>

                                                <div class="divider"></div>
                                                <a href="#">
                                                    <button href="#" class="btn btn-default btn-sm">Edit Profile
                                                    </button>
                                                </a></div>
                                        </div>
                                    </div>
                                    <div class="navbar-footer">
                                        <div class="navbar-footer-content">
                                            <div class="row">
                                                <div class="col-md-6 col-xs-6"><a href="#">
                                                    <button class="btn btn-default btn-sm">Change Password</button>
                                                </a></div>
                                                <div class="col-md-6 col-xs-6"><a href="#">
                                                    <button href="page-lock-screen.html"
                                                            class="btn btn-info btn-sm pull-right">Sign Out
                                                    </button>
                                                </a></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="hidden-sm hidden-xs"><a href="#" class="btn-template-setting"><i
                                class="icon-settings"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!--END TOPBAR--><!--BEGIN HORIZONTAL MENU-->
    <div class="page-horizontal-menu">
        <div id="horizontal-menu" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.html"><i class="icon-home"></i><span class="menu-title">Dashboard</span></a></li>
                <li><a href="page_profile.html"><i class="icon-user"></i><span
                        class="menu-title">User Profile</span></a></li>
                <li><a href="page_mail.html"><i class="icon-envelope"></i><span class="menu-title">Mail Box</span></a>
                </li>
                <li class="dropdown"><a href="#" data-hover="dropdown" class="dropdown-toggle"><i
                        class="icon-screen-desktop"></i><span class="menu-title">Layouts</span></a>
                    <ul class="dropdown-menu">
                        <li><a href="layout_full_width.html"><span class="submenu-title">Full width</span></a></li>
                        <li><a href="layout_boxed.html"><span class="submenu-title">Boxed</span></a></li>
                        <li class="hidden-sm"><a href="layout_sidebar_collapsed.html"><span class="submenu-title">Sidebar Collapsed</span></a>
                        </li>
                        <li class="hidden-sm"><a href="layout_sidebar_fixed.html"><span class="submenu-title">Sidebar fixed</span></a>
                        </li>
                        <li class="hidden-sm"><a href="layout_sidebar_collapsed_fixed.html"><span class="submenu-title">Sidebar collapsed & fixed</span></a>
                        </li>
                        <li><a href="layout_horizontal_menu.html"><span class="submenu-title">Horizontal Menu</span></a>
                        </li>
                        <li><a href="layout_header_fixed.html"><span class="submenu-title">Header Fixed</span></a></li>
                    </ul>
                </li>
                <li class="dropdown active"><a href="#" data-hover="dropdown" class="dropdown-toggle"><i
                        class="icon-magic-wand"></i><span class="menu-title">UI Elements</span><span
                        class="badge badge-danger">3</span></a>
                    <ul class="dropdown-menu in">
                        <li><a href="ui_general.html"><span class="submenu-title">General</span><span
                                class="badge badge-success">10</span></a></li>
                        <li><a href="ui_buttons.html"><span class="submenu-title">Buttons</span></a></li>
                        <li><a href="ui_typography.html"><span class="submenu-title">Typography</span></a></li>
                        <li class="active"><a href="ui_tabs_accordions.html"><span class="submenu-title">Tabs & Accordions</span></a>
                        </li>
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
                        <li><a href="form_components.html"><span class="submenu-title">Form Component</span><span
                                class="label label-info">8</span></a></li>
                        <li><a href="form_wizard.html"><span class="submenu-title">Form Wizard</span></a></li>
                        <li><a href="form_validation.html"><span class="submenu-title">Form Validation</span></a></li>
                        <li><a href="form_select.html"><span class="submenu-title">Dropdown & Select</span></a></li>
                        <li><a href="form_picker.html"><span class="submenu-title">Picker</span></a></li>
                        <li><a href="form_editor.html"><span class="submenu-title">Editor</span></a></li>
                        <li><a href="form_dropzone.html"><span class="submenu-title">Dropzone File Upload</span></a>
                        </li>
                        <li><a href="form_multiple_file_upload.html"><span
                                class="submenu-title">Multiple File Upload</span></a></li>
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
                <li class="dropdown"><a href="#" data-hover="dropdown" class="dropdown-toggle"><i
                        class="icon-book-open"></i><span class="menu-title">Pages</span></a>
                    <ul class="dropdown-menu">
                        <li><a href="page_gallery.html"><span class="submenu-title">Gallery</span></a></li>
                        <li><a href="page_calendar.html"><span class="submenu-title">Calendar</span></a></li>
                        <li><a href="page_invoice.html"><span class="submenu-title">Invoice</span></a></li>
                        <li><a href="page_pricing_table.html"><span class="submenu-title">Pricing Table</span></a></li>
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
    <div id="wrapper"><!--BEGIN PAGE WRAPPER-->
        <div id="page-wrapper"><!--BEGIN SIDEBAR MAIN-->
            <div class="sidebar-main sidebar">
                <div class="sidebar-collapse sidebar-scroll">
                    <ul id="sidebar-main" class="nav">
                        <li class="sidebar-search">
                            <form action="#" class="form-search">
                                <div class="input-icon right"><i class="icon-magnifier"></i><input type="text"
                                                                                                   placeholder="Search..."
                                                                                                   class="form-control"/>
                                </div>
                            </form>
                        </li>
                        <li class="sidebar-hide"><h4 class="sidebar-title-section">Main</h4></li>
                        <li><a href="index.html"><i class="icon-home"></i><span class="menu-title">Dashboard</span></a>
                        </li>
                        <li><a href="page_profile.html"><i class="icon-user"></i><span class="menu-title">Profile</span><span
                                class="badge badge-success">80%</span></a></li>
                        <li><a href="page_calendar.html"><i class="icon-calendar"></i><span
                                class="menu-title">Calendar</span><span class="badge badge-warning">2 events</span></a>
                        </li>
                        <li class="sidebar-hide"><h4 class="sidebar-title-section">All Components</h4></li>
                        <li><a href="#"><i class="icon-screen-desktop"></i><span
                                class="menu-title">Quick Use</span><span class="arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="layout_full_width.html"><span class="submenu-title">Full width</span></a>
                                </li>
                                <li><a href="layout_boxed.html"><span class="submenu-title">Boxed</span></a></li>
                                <li class="hidden-sm"><a href="layout_sidebar_collapsed.html"><span
                                        class="submenu-title">Sidebar Collapsed</span></a></li>
                                <li class="hidden-sm"><a href="layout_sidebar_fixed.html"><span class="submenu-title">Sidebar fixed</span></a>
                                </li>
                                <li class="hidden-sm"><a href="layout_sidebar_collapsed_fixed.html"><span
                                        class="submenu-title">Sidebar collapsed & fixed</span></a></li>
                                <li><a href="layout_horizontal_menu.html"><span
                                        class="submenu-title">Horizontal Menu</span></a></li>
                                <li><a href="layout_header_fixed.html"><span
                                        class="submenu-title">Header Fixed</span></a></li>
                                <li><a href="layout_dark_style.html"><span class="submenu-title">Dark Style</span></a>
                                </li>
                                <li><a href="layout_light_style.html"><span class="submenu-title">Light Style</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="active open"><a href="#"><i class="icon-magic-wand"></i><span class="menu-title">UI Elements</span><span
                                class="arrow"></span></a>
                            <ul class="nav nav-second-level in">
                                <li><a href="ui_general.html"><span class="submenu-title">General</span><span
                                        class="badge badge-success">10</span></a></li>
                                <li><a href="ui_buttons.html"><span class="submenu-title">Buttons</span></a></li>
                                <li><a href="ui_typography.html"><span class="submenu-title">Typography</span></a></li>
                                <li class="active"><a href="ui_tabs_accordions.html"><span class="submenu-title">Tabs & Accordions</span></a>
                                </li>
                                <li><a href="ui_modals.html"><span class="submenu-title">Modals</span></a></li>
                                <li><a href="ui_treeview.html"><span class="submenu-title">Tree view</span></a></li>
                                <li><a href="ui_icons.html"><span class="submenu-title">Icons</span></a></li>
                                <li><a href="ui_panels.html"><span class="submenu-title">Panels</span></a></li>
                                <li><a href="ui_nestable_list.html"><span class="submenu-title">Nestable List</span></a>
                                </li>
                                <li><a href="ui_toastr.html"><span class="submenu-title">Toastr Notifications</span></a>
                                </li>
                                <li><a href="ui_datepaginator.html"><span
                                        class="submenu-title">Date Paginator</span></a></li>
                                <li><a href="ui_slider.html"><span class="submenu-title">Range 2D Slider</span></a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="icon-note"></i><span class="menu-title">Forms</span><span
                                class="arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="form_components.html"><span
                                        class="submenu-title">Form Components</span><span
                                        class="label label-info">8</span></a></li>
                                <li><a href="form_wizard.html"><span class="submenu-title">Form Wizard</span></a></li>
                                <li><a href="form_validation.html"><span
                                        class="submenu-title">Form Validation</span></a></li>
                                <li><a href="form_select.html"><span class="submenu-title">Dropdown & Select</span></a>
                                </li>
                                <li><a href="form_picker.html"><span class="submenu-title">Picker</span></a></li>
                                <li><a href="form_editor.html"><span class="submenu-title">Editor</span></a></li>
                                <li><a href="form_dropzone.html"><span class="submenu-title">Dropzone File Upload</span></a>
                                </li>
                                <li><a href="form_multiple_file_upload.html"><span class="submenu-title">Multiple File Upload</span></a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="icon-grid"></i><span class="menu-title">Tables</span><span
                                class="arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="table_basic.html"><span class="submenu-title">Basic table</span></a></li>
                                <li><a href="table_responsive.html"><span class="submenu-title">Responsive table</span></a>
                                </li>
                                <li><a href="table_advanced.html"><span class="submenu-title">Advanced table</span></a>
                                </li>
                                <li><a href="table_treegrid.html"><span class="submenu-title">Treegrid table</span></a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="icon-book-open"></i><span class="menu-title">Pages</span><span
                                class="arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="page_gallery.html"><span class="submenu-title">Gallery</span></a></li>
                                <li><a href="page_mail.html"><span class="submenu-title">Mail Box</span><span
                                        class="badge badge-primary">7</span></a></li>
                                <li><a href="page_invoice.html"><span class="submenu-title">Invoice</span></a></li>
                                <li><a href="page_pricing_table.html"><span
                                        class="submenu-title">Pricing Table</span></a></li>
                                <li><a href="page_search.html"><span class="submenu-title">Search</span></a></li>
                                <li><a href="page_signin.html"><span class="submenu-title">Sign in</span></a></li>
                                <li><a href="page_signup.html"><span class="submenu-title">Sign up</span></a></li>
                                <li><a href="page_lock_screen.html"><span class="submenu-title">Lock screen</span></a>
                                </li>
                                <li><a href="page_404.html"><span class="submenu-title">Page 404</span></a></li>
                                <li><a href="page_500.html"><span class="submenu-title">Page 500</span></a></li>
                                <li><a href="page_timeline.html"><span class="submenu-title">Timeline</span></a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="icon-bar-chart"></i><span class="menu-title">Charts</span><span
                                class="arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="charts_chartjs.html"><span class="submenu-title">ChartJs</span></a></li>
                                <li><a href="charts_flot.html"><span class="submenu-title">Flot Charts</span></a></li>
                                <li><a href="charts_sparklines.html"><span
                                        class="submenu-title">Sparklines Charts</span></a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="icon-compass"></i><span class="menu-title">Maps</span><span
                                class="arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="maps_gmaps.html"><span class="submenu-title">GMaps</span></a></li>
                                <li><a href="maps_vector.html"><span class="submenu-title">Vector maps</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!--END SIDEBAR MAIN--><!--BEGIN CHAT FORM-->
            <div class="chat-form-wrapper">
                <div id="chat-form">
                    <div class="chat-inner"><h2 class="chat-header"><a href="javascript:;"
                                                                       class="chat-form-close pull-right"><i
                            class="fa fa-times"></i></a><i class="fa fa-user"></i>&nbsp;
                        Active Chat
                        &nbsp;<span class="badge badge-success">5</span></h2>

                        <div id="group-1" class="chat-group"><h4 class="group-title">Recently</h4><a href="#"><img
                                src="https://s3.amazonaws.com/uifaces/faces/twitter/claudioguglieri/48.jpg"
                                class="avt"/><span class="user-status is-online"></span>
                            <small>Judy Russell</small>
                            <span class="badge badge-info">2</span></a><a href="#"><img
                                src="https://s3.amazonaws.com/uifaces/faces/twitter/uxceo/48.jpg" class="avt"/><span
                                class="user-status is-online"></span>
                            <small>Eugene Turner</small>
                            <span class="badge badge-info is-hidden">0</span></a><a href="#"><img
                                src="https://s3.amazonaws.com/uifaces/faces/twitter/rssems/48.jpg" class="avt"/><span
                                class="user-status is-busy"></span>
                            <small>Ann Porter</small>
                            <span class="badge badge-info is-hidden">0</span></a><a href="#"><img
                                src="https://s3.amazonaws.com/uifaces/faces/twitter/jackmcdade/48.jpg"
                                class="avt"/><span class="user-status is-idle"></span>
                            <small>Benjamin Howell</small>
                            <span class="badge badge-info is-hidden">0</span></a></div>
                        <div id="group-2" class="chat-group"><h4 class="group-title">Work</h4><a href="#"><img
                                src="https://s3.amazonaws.com/uifaces/faces/twitter/oliveirasimoes/48.jpg" class="avt"/><span
                                class="user-status is-busy"></span>
                            <small>Lawrence Larson</small>
                            <span class="badge badge-info is-hidden">0</span></a><a href="#"><img
                                src="https://s3.amazonaws.com/uifaces/faces/twitter/adellecharles/48.jpg"
                                class="avt"/><span class="user-status is-offline"></span>
                            <small>Jacqueline Howell</small>
                            <span class="badge badge-info is-hidden">0</span></a><a href="#"><img
                                src="https://s3.amazonaws.com/uifaces/faces/twitter/jackmcdade/48.jpg"
                                class="avt"/><span class="user-status is-offline"></span>
                            <small>Andrew Brewer</small>
                            <span class="badge badge-info">1</span></a></div>
                        <div id="group-3" class="chat-group"><h4 class="group-title">Friends</h4><a href="#"><img
                                src="https://s3.amazonaws.com/uifaces/faces/twitter/adellecharles/48.jpg"
                                class="avt"/><span class="user-status is-online"></span>
                            <small>Marilyn Romero</small>
                            <span class="badge badge-info is-hidden">0</span></a><a href="#"><img
                                src="https://s3.amazonaws.com/uifaces/faces/twitter/rssems/48.jpg" class="avt"/><span
                                class="user-status is-busy"></span>
                            <small>Philip Hall</small>
                            <span class="badge badge-info is-hidden">0</span></a><a href="#"><img
                                src="https://s3.amazonaws.com/uifaces/faces/twitter/uxceo/48.jpg" class="avt"/><span
                                class="user-status is-offline"></span>
                            <small>Gary Wells</small>
                            <span class="badge badge-info is-hidden">0</span></a></div>
                        <div class="chat-theme-setting text-right">
                            <div id="setting-theme-chat" data-on-label="dark" data-off-label="light"
                                 class="make-switch"><input type="checkbox" class="switch"/></div>
                        </div>
                    </div>
                </div>
                <div class="chat-box-wrapper">
                    <div id="chat-box" style="top:400px">
                        <div class="chat-box-header"><a href="#" class="chat-box-close pull-right mlm"><i
                                class="fa fa-times"></i></a><a href="#" class="chat-box-minimize-btn pull-right"><i
                                class="fa fa-chevron-down"></i></a><span class="user-status is-online"></span><span
                                class="display-name">Willard Mckenzie</span></div>
                        <div class="chat-content">
                            <ul class="chat-box-body">
                                <li><p><img src="http://api.randomuser.me/portraits/men/27.jpg" class="avt"/><span
                                        class="user">You</span><span class="time">08:44</span></p>

                                    <p>Hi, we have some ideas for this template</p></li>
                                <li class="odd"><p><img
                                        src="https://s3.amazonaws.com/uifaces/faces/twitter/claudioguglieri/48.jpg"
                                        class="avt"/><span class="user">Jake Rochleau</span><span
                                        class="time">08:45</span></p>

                                    <p>Great! Let tell us now...</p></li>
                            </ul>
                        </div>
                        <div class="chat-textarea"><input placeholder="Type text and press Enter" class="form-control"/>
                        </div>
                    </div>
                    <div class="chat-box-minimize"><img
                            src="https://s3.amazonaws.com/uifaces/faces/twitter/claudioguglieri/48.jpg"
                            data-pulsate="{border:false,speed:200,reach: 50}" class="img-circle"/><span
                            class="user-status is-online"></span></div>
                </div>
            </div>
            <!--END CHAT FORM--><!--BEGIN PAGE CONTENT-->
            <div class="page-content"><!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">Tabs &amp; Accordions</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb hidden-xs hidden">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">Home</a>&nbsp;&nbsp;<i
                                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li><a href="#">UI</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Tabs &amp; Accordions</li>
                    </ol>
                    <div class="view-code-wrapper pull-right">
                        <div id="setting-view-code" data-on="success" data-off="default" data-on-label="View"
                             data-text-label="Code" data-off-label="Off" class="make-switch switch-small"><input
                                type="checkbox" checked="checked" class="switch"/></div>
                    </div>
                </div>
                <!--END TITLE & BREADCRUMB PAGE-->
                <div class="box-content"><!--BEGIN CONTENT-->
                    <div class="content">
                        <div class="row mbl">
                            <div class="col-md-12">
                                <div class="heading-box">Bootstrap Line Tabs</div>
                                <div class="viewcode-example">
                                    <div class="tabbable-line-wrapper">
                                        <div class="tabbable-line">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#tab_default_1" data-toggle="tab">Tab 1</a></li>
                                                <li><a href="#tab_default_2" data-toggle="tab">Tab 2</a></li>
                                                <li><a href="#tab_default_3" data-toggle="tab">Tab 3</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div id="tab_default_1" class="tab-pane active">
                                                    <p>I'm in Tab 1.</p>
                                                    <p>
                                                        Duis autem eum iriure dolor in hendrerit in vulputate velit esse
                                                        molestie consequat. Ut wisi enim ad minim veniam, quis nostrud
                                                        exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex
                                                        ea commodo consequat. Duis autem vel eum iriure dolor in
                                                        hendrerit in vulputate velit esse molestie consequat. Duis autem
                                                        vel eum iriure dolor in hendrerit in vulputate velit esse
                                                        molestie consequat.
                                                    </p>
                                                    <p>
                                                        <a href="http://j.mp/metronictheme" target="_blank" class="btn btn-success">Learn more...</a>
                                                    </p>
                                                </div>
                                                <div id="tab_default_2" class="tab-pane">
                                                    <p>Howdy, I'm in Tab 2.</p>
                                                    <p>
                                                        Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                                        ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                                                        consequat. Duis autem vel eum iriure dolor in hendrerit in
                                                        vulputate velit esse molestie consequat. Ut wisi enim ad minim
                                                        veniam, quis nostrud exerci tation.
                                                    </p>
                                                    <p>
                                                        <a href="http://j.mp/metronictheme" target="_blank" class="btn btn-warning">Click for more features...</a>
                                                    </p>
                                                </div>
                                                <div id="tab_default_3" class="tab-pane">
                                                    <p>Howdy, I'm in Tab 3.</p>
                                                    <p>
                                                        Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut
                                                        wisi enim ad minim veniam, quis nostrud exerci tation
                                                        ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                                                        consequat. Duis autem vel eum iriure dolor in hendrerit in
                                                        vulputate velit esse molestie consequat
                                                    </p>
                                                    <p>
                                                        <a href="http://j.mp/metronictheme" target="_blank" class="btn btn-info">Learn more...</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mbl">
                            <div class="col-md-4">
                                <div class="heading-box">Default Tabs</div>
                                <div class="viewcode-example">
                                    <ul id="myTab" class="nav nav-tabs">
                                        <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
                                        <li><a href="#profile" data-toggle="tab">Profile</a></li>
                                    </ul>
                                    <div id="myTabContent" class="tab-content">
                                        <div id="home" class="tab-pane fade in active">
                                            <p>
                                                Raw denim you probably haven't
                                                heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro
                                                synth master cleanse. Mustache cliche tempor, williamsburg carles vegan
                                                helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby
                                                sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat
                                                salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher
                                                voluptate nisi qui. Wolf salvia freegan, sartorial.
                                            </p>
                                        </div>
                                        <div id="profile" class="tab-pane fade">
                                            <p>
                                                Food truck fixie locavore, accusamus
                                                mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore
                                                velit, blog sartorial PBR leggings next level wes anderson artisan four loko
                                                farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim
                                                craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo
                                                nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar
                                                helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan
                                                fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut
                                                DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown,
                                                tumblr butcher vero sint qui sapiente accusamus tattooed echo park.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="heading-box">Left Tabs</div>
                                <div class="viewcode-example">
                                    <div class="tabbable tabs-vertical tabs-left">
                                        <ul id="myTab2" class="nav nav-tabs">
                                            <li class="active"><a href="#home4" data-toggle="tab">Home</a></li>
                                            <li><a href="#profile4" data-toggle="tab">Profile</a></li>
                                        </ul>
                                        <div id="myTabContent2" class="tab-content">
                                            <div id="home4" class="tab-pane fade in active">
                                                <p>
                                                    Raw denim you probably
                                                    haven't heard of them jean shorts Austin. Nesciunt tofu stumptown
                                                    aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg
                                                    carles vegan helvetica. Reprehenderit butcher retro keffiyeh
                                                    dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson
                                                    ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis
                                                    cardigan american apparel, butcher voluptate nisi qui.
                                                </p>
                                            </div>
                                            <div id="profile4" class="tab-pane fade">
                                                <p>Food truck fixie locavore,
                                                    accusamus mcsweeney's marfa nulla single-origin coffee squid.
                                                    Exercitation +1 labore velit, blog sartorial PBR leggings next level wes
                                                    anderson artisan four loko farm-to-table craft beer twee. Qui photo
                                                    booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts
                                                    ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore
                                                    aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero
                                                    magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes
                                                    anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry
                                                    richardson biodiesel. Art party scenester stumptown, tumblr butcher vero
                                                    sint qui sapiente accusamus tattooed echo park.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="heading-box">Right Tabs</div>
                                <div class="viewcode-example">
                                    <div class="tabbable tabs-right">
                                        <ul id="myTab3" class="nav nav-tabs">
                                            <li class="active"><a href="#home5" data-toggle="tab">Home</a></li>
                                            <li><a href="#profile5" data-toggle="tab">Profile</a></li>
                                        </ul>
                                        <div id="myTabContent3" class="tab-content">
                                            <div id="home5" class="tab-pane fade in active">
                                                <p>
                                                    Raw denim you probably
                                                    haven't heard of them jean shorts Austin. Nesciunt tofu stumptown
                                                    aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg
                                                    carles vegan helvetica. Reprehenderit butcher retro keffiyeh
                                                    dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson
                                                    ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis
                                                    cardigan american apparel, butcher voluptate nisi qui.
                                                </p>
                                            </div>
                                            <div id="profile5" class="tab-pane fade">
                                                <p>
                                                    Food truck fixie locavore,
                                                    accusamus mcsweeney's marfa nulla single-origin coffee squid.
                                                    Exercitation +1 labore velit, blog sartorial PBR leggings next level wes
                                                    anderson artisan four loko farm-to-table craft beer twee. Qui photo
                                                    booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts
                                                    ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore
                                                    aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero
                                                    magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes
                                                    anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry
                                                    richardson biodiesel. Art party scenester stumptown, tumblr butcher vero
                                                    sint qui sapiente accusamus tattooed echo park.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="heading-box">Below Tabs</div>
                                <div class="viewcode-example">
                                    <div class="tabbable tabs-below">
                                        <div id="myTabContent1" class="tab-content">
                                            <div id="home2" class="tab-pane fade in active">
                                                <p>
                                                    Raw denim you probably
                                                    haven't heard of them jean shorts Austin. Nesciunt tofu stumptown
                                                    aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg
                                                    carles vegan helvetica. Reprehenderit butcher retro keffiyeh
                                                    dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson
                                                    ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis
                                                    cardigan american apparel, butcher voluptate nisi qui.
                                                </p>
                                            </div>
                                            <div id="profile2" class="tab-pane fade">
                                                <p>
                                                    Food truck fixie locavore,
                                                    accusamus mcsweeney's marfa nulla single-origin coffee squid.
                                                    Exercitation +1 labore velit, blog sartorial PBR leggings next level wes
                                                    anderson artisan four loko farm-to-table craft beer twee. Qui photo
                                                    booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts
                                                    ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore
                                                    aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero
                                                    magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes
                                                    anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry
                                                    richardson biodiesel. Art party scenester stumptown, tumblr butcher vero
                                                    sint qui sapiente accusamus tattooed echo park.
                                                </p>
                                            </div>
                                        </div>
                                        <ul id="myTab1" class="nav nav-tabs">
                                            <li class="active"><a href="#home2" data-toggle="tab">Home</a></li>
                                            <li><a href="#profile2" data-toggle="tab">Profile</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="heading-box">Justify Tabs</div>
                                <div class="viewcode-example">
                                    <ul id="myTab4" class="nav nav-tabs nav-justified">
                                        <li class="active"><a href="#home6" data-toggle="tab">Home</a></li>
                                        <li><a href="#profile6" data-toggle="tab">Profile</a></li>
                                        <div id="myTabContent4" class="tab-content">
                                            <div id="home6" class="tab-pane fade in active">
                                                <p>
                                                    Raw denim you probably
                                                    haven't heard of them jean shorts Austin. Nesciunt tofu stumptown
                                                    aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg
                                                    carles vegan helvetica. Reprehenderit butcher retro keffiyeh
                                                    dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson
                                                    ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis
                                                    cardigan american apparel, butcher voluptate nisi qui.
                                                </p>
                                            </div>
                                            <div id="profile6" class="tab-pane fade">
                                                <p>
                                                    Food truck fixie locavore,
                                                    accusamus mcsweeney's marfa nulla single-origin coffee squid.
                                                    Exercitation +1 labore velit, blog sartorial PBR leggings next level wes
                                                    anderson artisan four loko farm-to-table craft beer twee. Qui photo
                                                    booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts
                                                    ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore
                                                    aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero
                                                    magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes
                                                    anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry
                                                    richardson biodiesel. Art party scenester stumptown, tumblr butcher vero
                                                    sint qui sapiente accusamus tattooed echo park.
                                                </p>
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="heading-box">Accordion</div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="viewcode-example">
                                    <div id="accordion" class="panel-group accordion">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="accordion-toggle">
                                                        <i class="icon-arrow"></i>
                                                        What software do you recommend for making HTML?
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod
                                                    high life accusamus terry richardson ad squid. 3 wolf moon officia
                                                    aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                                    nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put
                                                    a bird on it squid single-origin coffee nulla assumenda shoreditch
                                                    et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                                    cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
                                                    lomo. Leggings occaecat craft beer farm-to-table, raw denim
                                                    aesthetic synth nesciunt you probably haven't heard of them
                                                    accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="accordion-toggle collapsed">
                                                        <i class="icon-arrow"></i>
                                                        How can I modify flash portion of the template?
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo" style="height: 0px;" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod
                                                    high life accusamus terry richardson ad squid. 3 wolf moon officia
                                                    aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                                    nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put
                                                    a bird on it squid single-origin coffee nulla assumenda shoreditch
                                                    et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                                    cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
                                                    lomo. Leggings occaecat craft beer farm-to-table, raw denim
                                                    aesthetic synth nesciunt you probably haven't heard of them
                                                    accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="accordion-toggle collapsed">
                                                        <i class="icon-arrow"></i>
                                                        Are your templates compatible with any CMS?
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseThree" style="height: 0px;" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod
                                                    high life accusamus terry richardson ad squid. 3 wolf moon officia
                                                    aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                                    nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put
                                                    a bird on it squid single-origin coffee nulla assumenda shoreditch
                                                    et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                                    cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
                                                    lomo. Leggings occaecat craft beer farm-to-table, raw denim
                                                    aesthetic synth nesciunt you probably haven't heard of them
                                                    accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="viewcode-example">
                                    <div id="accordion2" class="panel-group accordion accordion-inline">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion2" href="#collapseOne2" class="accordion-toggle">
                                                        <i class="icon-arrow"></i>What software do you recommend for making HTML?
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseOne2" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod
                                                    high life accusamus terry richardson ad squid. 3 wolf moon officia
                                                    aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                                    nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put
                                                    a bird on it squid single-origin coffee nulla assumenda shoreditch
                                                    et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                                    cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
                                                    lomo. Leggings occaecat craft beer farm-to-table, raw denim
                                                    aesthetic synth nesciunt you probably haven't heard of them
                                                    accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo2" class="accordion-toggle collapsed">
                                                        <i class="icon-arrow"></i>
                                                        How can I modify flash portion of the template?
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo2" style="height: 0px;" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod
                                                    high life accusamus terry richardson ad squid. 3 wolf moon officia
                                                    aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                                    nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put
                                                    a bird on it squid single-origin coffee nulla assumenda shoreditch
                                                    et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                                    cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
                                                    lomo. Leggings occaecat craft beer farm-to-table, raw denim
                                                    aesthetic synth nesciunt you probably haven't heard of them
                                                    accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion2" href="#collapseThree2" class="accordion-toggle collapsed">
                                                        <i class="icon-arrow"></i>Are your templates compatible with any CMS?
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseThree2" style="height: 0px;"
                                                 class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod
                                                    high life accusamus terry richardson ad squid. 3 wolf moon officia
                                                    aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                                    nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put
                                                    a bird on it squid single-origin coffee nulla assumenda shoreditch
                                                    et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                                    cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
                                                    lomo. Leggings occaecat craft beer farm-to-table, raw denim
                                                    aesthetic synth nesciunt you probably haven't heard of them
                                                    accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="heading-box">Navbar</div>
                                <div class="viewcode-example">
                                    <nav role="navigation" class="navbar navbar-default">
                                        <div class="container-fluid">
                                            <div class="navbar-header">
                                                <button type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" class="navbar-toggle">
                                                    <span class="sr-only">Toggle navigation</span>
                                                    <span class="icon-bar"></span><span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                </button>
                                                <a href="#" class="navbar-brand">Brand</a>
                                            </div>
                                            <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
                                                <ul class="nav navbar-nav">
                                                    <li class="active"><a href="#">Link</a></li>
                                                    <li><a href="#">Link</a></li>
                                                    <li class="dropdown">
                                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                                            Dropdown
                                                            <b class="caret"></b>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="#">Action</a></li>
                                                            <li><a href="#">Another action</a></li>
                                                            <li><a href="#">Something else here</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#">Separated link</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#">One more separated link</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <form role="search" class="navbar-form navbar-left">
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Search" class="form-control"/>
                                                    </div>
                                                    &nbsp;
                                                    <button type="submit" class="btn btn-default">Submit</button>
                                                </form>
                                                <ul class="nav navbar-nav navbar-right">
                                                    <li><a href="#">Link</a></li>
                                                    <li class="dropdown">
                                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                                            Dropdown
                                                            <b class="caret"></b>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="#">Action</a></li>
                                                            <li><a href="#">Another action</a></li>
                                                            <li><a href="#">Something else here</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#">Separated link</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </nav>
                                    <div class="panel">
                                        <div class="panel-body">
                                            <h4>Home</h4>
                                            <p>
                                                Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt
                                                tofu stumptown aliqua, retro synth master cleanse. Mustache cliche
                                                tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro
                                                keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry
                                                richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan
                                                aliquip quis cardigan american apparel, butcher voluptate nisi qui.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="heading-box">ScrollSpy</div>
                                <div id="viewcode-scroll" class="viewcode-example">
                                    <nav id="navbar-example2" role="navigation" class="navbar navbar-default navbar-static">
                                        <div class="container-fluid">
                                            <div class="navbar-header">
                                                <button type="button" data-toggle="collapse" data-target="bs-example-js-navbar-scrollspy" class="navbar-toggle">
                                                    <span class="sr-only">Toggle navigation</span>
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                </button>
                                                <a href="#" class="navbar-brand">Project Name</a>
                                            </div>
                                            <div class="collapse navbar-collapse viewcode-example-js-navbar-scrollspy">
                                                <ul class="nav navbar-nav">
                                                    <li><a href="#fat">@fat</a></li>
                                                    <li><a href="#mdo">@mdo</a></li>
                                                    <li class="dropdown active">
                                                        <a id="navbarDrop1" href="#" data-toggle="dropdown" class="dropdown-toggle">
                                                            Dropdown
                                                            &nbsp;
                                                            <b class="caret"></b>
                                                        </a>
                                                        <ul role="menu" aria-labelledby="navbarDrop1"
                                                            class="dropdown-menu">
                                                            <li><a href="#one" tabindex="-1">one</a></li>
                                                            <li><a href="#two" tabindex="-1">two</a></li>
                                                            <li class="divider"></li>
                                                            <li class="active"><a href="#three" tabindex="-1">three</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </nav>

                                    <div class="panel">
                                        <div class="panel-body">
                                            <div data-spy="scroll" data-target="#navbar-example2" data-offset="0" class="scrollspy-example">
                                                <h4 id="fat" class="text-warning">@fat</h4>
                                                <p>
                                                    Ad leggings keytar, brunch id art party dolor labore. Pitchfork yr
                                                    enim lo-fi before they sold out qui. Tumblr farm-to-table bicycle
                                                    rights whatever. Anim keffiyeh carles cardigan. Velit seitan
                                                    mcsweeney's photo booth 3 wolf moon irure. Cosby sweater lomo jean
                                                    shorts, williamsburg hoodie minim qui you probably haven't heard of
                                                    them et cardigan trust fund culpa biodiesel wes anderson aesthetic.
                                                    Nihil tattooed accusamus, cred irony biodiesel keffiyeh artisan
                                                    ullamco consequat.
                                                </p>
                                                <h4 id="mdo" class="text-success">@mdo</h4>
                                                <p>
                                                    Veniam marfa mustache skateboard, adipisicing fugiat velit pitchfork
                                                    beard. Freegan beard aliqua cupidatat mcsweeney's vero. Cupidatat
                                                    four loko nisi, ea helvetica nulla carles. Tattooed cosby sweater
                                                    food truck, mcsweeney's quis non freegan vinyl. Lo-fi wes anderson
                                                    +1 sartorial. Carles non aesthetic exercitation quis gentrify.
                                                    Brooklyn adipisicing craft beer vice keytar deserunt.
                                                </p>
                                                <h4 id="one" class="text-info">one</h4>
                                                <p>
                                                    Occaecat commodo aliqua delectus. Fap craft beer deserunt skateboard
                                                    ea. Lomo bicycle rights adipisicing banh mi, velit ea sunt next
                                                    level locavore single-origin coffee in magna veniam. High life id
                                                    vinyl, echo park consequat quis aliquip banh mi pitchfork. Vero VHS
                                                    est adipisicing. Consectetur nisi DIY minim messenger bag. Cred ex
                                                    in, sustainable delectus consectetur fanny pack iphone.
                                                </p>
                                                <h4 id="two" class="text-danger">two</h4>
                                                <p>
                                                    In incididunt echo park, officia deserunt mcsweeney's proident master
                                                    cleanse thundercats sapiente veniam. Excepteur VHS elit, proident
                                                    shoreditch +1 biodiesel laborum craft beer. Single-origin coffee
                                                    wayfarers irure four loko, cupidatat terry richardson master
                                                    cleanse. Assumenda you probably haven't heard of them art party
                                                    fanny pack, tattooed nulla cardigan tempor ad. Proident wolf
                                                    nesciunt sartorial keffiyeh eu banh mi sustainable. Elit wolf
                                                    voluptate, lo-fi ea portland before they sold out four loko.
                                                    Locavore enim nostrud mlkshk brooklyn nesciunt.
                                                </p>
                                                <h4 id="three" class="text-primary">three</h4>
                                                <p>
                                                    Ad leggings keytar, brunch id art party dolor labore. Pitchfork yr
                                                    enim lo-fi before they sold out qui. Tumblr farm-to-table bicycle
                                                    rights whatever. Anim keffiyeh carles cardigan. Velit seitan
                                                    mcsweeney's photo booth 3 wolf moon irure. Cosby sweater lomo jean
                                                    shorts, williamsburg hoodie minim qui you probably haven't heard of
                                                    them et cardigan trust fund culpa biodiesel wes anderson aesthetic.
                                                    Nihil tattooed accusamus, cred irony biodiesel keffiyeh artisan
                                                    ullamco consequat.
                                                </p>

                                                <p>
                                                    Keytar twee blog, culpa messenger bag marfa whatever delectus food
                                                    truck. Sapiente synth id assumenda. Locavore sed helvetica cliche
                                                    irony, thundercats you probably haven't heard of them consequat
                                                    hoodie gluten-free lo-fi fap aliquip. Labore elit placeat before
                                                    they sold out, terry richardson proident brunch nesciunt quis cosby
                                                    sweater pariatur keffiyeh ut helvetica artisan. Cardigan craft beer
                                                    seitan readymade velit. VHS chambray laboris tempor veniam. Anim
                                                    mollit minim commodo ullamco thundercats.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--END CONTENT--></div>
            </div>
            <!--END PAGE CONTENT--></div>
        <!--END PAGE WRAPPER--></div>
    <!--BEGIN FOOTER-->
    <div id="footer">
        <div class="copyright"> Create by: Nextthemes
            <div class="pull-left">©2014 mTek - Bootstrap Admin Template</div>
        </div>
    </div>
    <!--END FOOTER--></div>

<script src="/js/jquery-1.10.2.min.js" ></script>
<script src="/js/jquery-migrate-1.2.1.min.js"></script>
<!--script src="/js/candor.blockui.js"></script-->
<!--script src="/js/jquery.nicescroll.js"></script-->
<script src="/js/jquery-ui.js"></script>
<script src="/js/bootstrap.min.js" ></script>
<script src="/js/bootstrap-hover-dropdown.js"></script>
<script src="/js/mtek_html5shiv.js"></script>
<script src="/js/respond.min.js"></script>
<script src="/js/jquery.metisMenu.js"></script>
<script src="/js/mtek_icheck.min.js"></script>
<script src="/js/mtek_custom.min.js"></script>
<script src="/js/jquery.slimscroll.js"></script>
<script src="/js/bootstrap-switch.min.js"></script>
<script src="/js/prettify.js"></script>
<script src="/js/jquery.cookie.js"></script>
<script src="/js/jquery.pulsate.js"></script>

<!--LOADING SCRIPTS FOR PAGE-->
<!--script src="/js/jquery.treegrid.js"></script-->

<!--LOADING SCRIPTS FOR PAGE--><!--CORE JAVASCRIPT-->
<script src="/js/mtek_core.js"></script>
<script src="/js/mtek_system-layout.js"></script>
<script src="/js/jquery-responsive.js"></script>
<!--script src="/js/candor.portal.js" ></script-->

<script>jQuery(document).ready(function () {
    "use strict";
    JQueryResponsive.init();
    Layout.init();
});
</script>
<script>jQuery(document).ready(function () {
    ui_tabs_accordions.init();
});


</script>
</body>
</html>

