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
                        <li><a href="ui_tabs_accordions.html"><span class="submenu-title">Tabs & Accordions</span></a>
                        </li>
                        <li class="active"><a href="ui_modals.html"><span class="submenu-title">Modals</span></a></li>
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
                                <div class="input-icon right">
                                <i class="icon-magnifier"></i><input type="text" class="form-control" placeholder="Search...">
                                </div>
                            </form>
                        </li>
                        <li class="sidebar-hide"><h4 class="sidebar-title-section">Main</h4></li>
                        <li><a href="index.html"><i class="icon-home"></i><span class="menu-title">Dashboard</span></a>
                        </li>
                        <li><a href="page_profile.html"><i class="icon-user"></i><span class="menu-title">Profile</span><span class="badge badge-success">80%</span></a></li>
                        <li><a href="page_calendar.html"><i class="icon-calendar"></i><span class="menu-title">Calendar</span><span class="badge badge-warning">2 events</span></a>
                        </li>
                        <li class="sidebar-hide"><h4 class="sidebar-title-section">All Components</h4></li>
                        <li class="">
                        	<a href="#">
                            <i class="icon-screen-desktop"></i><span class="menu-title">Quick Use</span><span class="arrow"></span></a>
                            <ul class="nav nav-second-level collapse" style="height: 0px;">
                                <li><a href="layout_full_width.html"><span class="submenu-title">Full width</span></a>
                                </li>
                                <li><a href="layout_boxed.html"><span class="submenu-title">Boxed</span></a></li>
                                <li class="hidden-sm"><a href="layout_sidebar_collapsed.html"><span class="submenu-title">Sidebar Collapsed</span></a></li>
                                <li class="hidden-sm"><a href="layout_sidebar_fixed.html"><span class="submenu-title">Sidebar fixed</span></a>
                                </li>
                                <li class="hidden-sm"><a href="layout_sidebar_collapsed_fixed.html"><span class="submenu-title">Sidebar collapsed &amp; fixed</span></a></li>
                                <li><a href="layout_horizontal_menu.html"><span class="submenu-title">Horizontal Menu</span></a></li>
                                <li><a href="layout_header_fixed.html"><span class="submenu-title">Header Fixed</span></a></li>
                                <li><a href="layout_dark_style.html"><span class="submenu-title">Dark Style</span></a>
                                </li>
                                <li><a href="layout_light_style.html"><span class="submenu-title">Light Style</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="active"><a href="#"><i class="icon-magic-wand"></i><span class="menu-title">UI Elements</span><span class="arrow"></span></a>
                            <ul class="nav nav-second-level collapse" style="height: 0px;">
                                <li><a href="ui_general.html"><span class="submenu-title">General</span><span class="badge badge-success">10</span></a></li>
                                <li><a href="ui_buttons.html"><span class="submenu-title">Buttons</span></a></li>
                                <li><a href="ui_typography.html"><span class="submenu-title">Typography</span></a></li>
                                <li><a href="ui_tabs_accordions.html"><span class="submenu-title">Tabs &amp; Accordions</span></a></li>
                                <li class="active"><a href="ui_modals.html"><span class="submenu-title">Modals</span></a></li>
                                <li><a href="ui_treeview.html"><span class="submenu-title">Tree view</span></a></li>
                                <li><a href="ui_icons.html"><span class="submenu-title">Icons</span></a></li>
                                <li><a href="ui_panels.html"><span class="submenu-title">Panels</span></a></li>
                                <li><a href="ui_nestable_list.html"><span class="submenu-title">Nestable List</span></a>
                                </li>
                                <li><a href="ui_toastr.html"><span class="submenu-title">Toastr Notifications</span></a>
                                </li>
                                <li><a href="ui_datepaginator.html"><span class="submenu-title">Date Paginator</span></a></li>
                                <li><a href="ui_slider.html"><span class="submenu-title">Range 2D Slider</span></a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="icon-note"></i><span class="menu-title">Forms</span><span class="arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="form_components.html"><span class="submenu-title">Form Components</span><span class="label label-info">8</span></a></li>
                                <li><a href="form_wizard.html"><span class="submenu-title">Form Wizard</span></a></li>
                                <li><a href="form_validation.html"><span class="submenu-title">Form Validation</span></a></li>
                                <li><a href="form_select.html"><span class="submenu-title">Dropdown &amp; Select</span></a>
                                </li>
                                <li><a href="form_picker.html"><span class="submenu-title">Picker</span></a></li>
                                <li><a href="form_editor.html"><span class="submenu-title">Editor</span></a></li>
                                <li><a href="form_dropzone.html"><span class="submenu-title">Dropzone File Upload</span></a>
                                </li>
                                <li><a href="form_multiple_file_upload.html"><span class="submenu-title">Multiple File Upload</span></a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="icon-grid"></i><span class="menu-title">Tables</span><span class="arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="table_basic.html"><span class="submenu-title">Basic table</span></a></li>
                                <li><a href="table_responsive.html"><span class="submenu-title">Responsive table</span></a>
                                </li>
                                <li><a href="table_advanced.html"><span class="submenu-title">Advanced table</span></a>
                                </li>
                                <li><a href="table_treegrid.html"><span class="submenu-title">Treegrid table</span></a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="icon-book-open"></i><span class="menu-title">Pages</span><span class="arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="page_gallery.html"><span class="submenu-title">Gallery</span></a></li>
                                <li><a href="page_mail.html"><span class="submenu-title">Mail Box</span><span class="badge badge-primary">7</span></a></li>
                                <li><a href="page_invoice.html"><span class="submenu-title">Invoice</span></a></li>
                                <li><a href="page_pricing_table.html"><span class="submenu-title">Pricing Table</span></a></li>
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
                        <li><a href="#"><i class="icon-bar-chart"></i><span class="menu-title">Charts</span><span class="arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="charts_chartjs.html"><span class="submenu-title">ChartJs</span></a></li>
                                <li><a href="charts_flot.html"><span class="submenu-title">Flot Charts</span></a></li>
                                <li><a href="charts_sparklines.html"><span class="submenu-title">Sparklines Charts</span></a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="icon-compass"></i><span class="menu-title">Maps</span><span class="arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
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
                                src="/images/add_act.png"
                                class="avt"/><span class="user-status is-online"></span>
                            <small>Judy Russell</small>
                            <span class="badge badge-info">2</span></a><a href="#"><img
                                src="/images/add_act.png" class="avt"/><span
                                class="user-status is-online"></span>
                            <small>Eugene Turner</small>
                            <span class="badge badge-info is-hidden">0</span></a><a href="#"><img
                                src="/images/add_act.png" class="avt"/><span
                                class="user-status is-busy"></span>
                            <small>Ann Porter</small>
                            <span class="badge badge-info is-hidden">0</span></a><a href="#"><img
                                src="/images/add_act.png"
                                class="avt"/><span class="user-status is-idle"></span>
                            <small>Benjamin Howell</small>
                            <span class="badge badge-info is-hidden">0</span></a></div>
                        <div id="group-2" class="chat-group"><h4 class="group-title">Work</h4><a href="#"><img
                                src="/images/add_act.png" class="avt"/><span
                                class="user-status is-busy"></span>
                            <small>Lawrence Larson</small>
                            <span class="badge badge-info is-hidden">0</span></a><a href="#"><img
                                src="/images/add_act.png"
                                class="avt"/><span class="user-status is-offline"></span>
                            <small>Jacqueline Howell</small>
                            <span class="badge badge-info is-hidden">0</span></a><a href="#"><img
                                src="/images/add_act.png"
                                class="avt"/><span class="user-status is-offline"></span>
                            <small>Andrew Brewer</small>
                            <span class="badge badge-info">1</span></a></div>
                        <div id="group-3" class="chat-group"><h4 class="group-title">Friends</h4><a href="#"><img
                                src="/images/add_act.png"
                                class="avt"/><span class="user-status is-online"></span>
                            <small>Marilyn Romero</small>
                            <span class="badge badge-info is-hidden">0</span></a><a href="#"><img
                                src="/images/add_act.png" class="avt"/><span
                                class="user-status is-busy"></span>
                            <small>Philip Hall</small>
                            <span class="badge badge-info is-hidden">0</span></a><a href="#"><img
                                src="/images/add_act.png" class="avt"/><span
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
                                <li><p><img src="/images/add_act.png" class="avt"/><span
                                        class="user">You</span><span class="time">08:44</span></p>

                                    <p>Hi, we have some ideas for this template</p></li>
                                <li class="odd"><p><img
                                        src="/images/add_act.png"
                                        class="avt"/><span class="user">Jake Rochleau</span><span
                                        class="time">08:45</span></p>

                                    <p>Great! Let tell us now...</p></li>
                            </ul>
                        </div>
                        <div class="chat-textarea"><input placeholder="Type text and press Enter" class="form-control"/>
                        </div>
                    </div>
                    <div class="chat-box-minimize"><img
                            src="/images/add_act.png"
                            data-pulsate="{border:false,speed:200,reach: 50}" class="img-circle"/><span
                            class="user-status is-online"></span></div>
                </div>
            </div>
            <!--END CHAT FORM--><!--BEGIN PAGE CONTENT-->
            <div class="page-content"><!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">Modals</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb hidden-xs">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">Home</a>&nbsp;&nbsp;<i
                                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li><a href="#">UI</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Modals</li>
                    </ol>
                </div>
                <!--END TITLE & BREADCRUMB PAGE-->
                <div class="box-content"><!--BEGIN CONTENT-->
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="caption">Basic</div>
                                    </div>
                                    <div class="panel-body pan">
                                        <form action="#" class="form-horizontal form-bordered">
                                            <div class="form-body">
                                                <div class="form-group"><label for="" class="col-md-4 control-label">Default</label>

                                                    <div class="col-md-4">
                                                        <button type="button" data-target="#modal-default"
                                                                data-toggle="modal" class="btn btn-primary">View Demo
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label for="" class="col-md-4 control-label">Responsive</label>

                                                    <div class="col-md-4">
                                                        <button type="button" data-target="#modal-responsive"
                                                                data-toggle="modal" class="btn btn-primary">View Demo
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label for="" class="col-md-4 control-label">Stackable</label>

                                                    <div class="col-md-4">
                                                        <button type="button" data-target="#modal-stackable"
                                                                data-toggle="modal" class="btn btn-primary">View Demo
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label for="" class="col-md-4 control-label">Full
                                                    Width</label>

                                                    <div class="col-md-4">
                                                        <button type="button" data-target="#modal-full-width"
                                                                data-toggle="modal" class="btn btn-primary">View Demo
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label for="" class="col-md-4 control-label">Wide
                                                    Width</label>

                                                    <div class="col-md-4">
                                                        <button type="button" data-target="#modal-wide-width"
                                                                data-toggle="modal" class="btn btn-primary">View Demo
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label for="" class="col-md-4 control-label">Static
                                                    Background</label>

                                                    <div class="col-md-4">
                                                        <button type="button" data-target="#modal-static"
                                                                data-toggle="modal" class="btn btn-primary">View Demo
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label for="" class="col-md-4 control-label">Left
                                                    Footer</label>

                                                    <div class="col-md-4">
                                                        <button type="button" data-target="#modal-left-footer"
                                                                data-toggle="modal" class="btn btn-primary">View Demo
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label for="" class="col-md-4 control-label">Header
                                                    Primary</label>

                                                    <div class="col-md-4">
                                                        <button type="button" data-target="#modal-header-primary"
                                                                data-toggle="modal" class="btn btn-primary">View Demo
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="caption">Advanced</div>
                                    </div>
                                    <div class="panel-body pan">
                                        <form action="#" class="form-horizontal form-bordered">
                                            <div class="form-body">
                                                <div class="form-group"><label for="" class="col-md-3 control-label">Long
                                                    Modals</label>

                                                    <div class="col-md-4">
                                                        <button type="button" data-target="#modal-long"
                                                                data-toggle="modal" class="btn btn-danger">View Demo
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label for="" class="col-md-3 control-label">Alert</label>

                                                    <div class="col-md-4">
                                                        <button type="button" data-target="#modal-alert"
                                                                data-toggle="modal" class="btn btn-danger">View Demo
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label for="" class="col-md-3 control-label">Confirm</label>

                                                    <div class="col-md-4">
                                                        <button type="button" data-target="#modal-confirm"
                                                                data-toggle="modal" class="btn btn-danger">View Demo
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label for="" class="col-md-3 control-label">Custom
                                                    Dialog</label>

                                                    <div class="col-md-4">
                                                        <button type="button" data-target="#modal-custom-dialog"
                                                                data-toggle="modal" class="btn btn-danger">View Demo
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label for="" class="col-md-3 control-label">Login</label>

                                                    <div class="col-md-4">
                                                        <button type="button" data-target="#modal-login"
                                                                data-toggle="modal" class="btn btn-danger">View Demo
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label for="" class="col-md-3 control-label">Prompt</label>

                                                    <div class="col-md-4">
                                                        <button type="button" data-target="#modal-prompt"
                                                                data-toggle="modal" class="btn btn-danger">View Demo
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Modal Default-->
                        <div id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default-label"
                             aria-hidden="true" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true"
                                                class="close">&times;</button>
                                        <h4 id="modal-default-label" class="modal-title">Modal Default</h4></div>
                                    <div class="modal-body">Modal body goes here</div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-default">Close
                                        </button>
                                        <button type="button" class="btn btn-success">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Modal Left Footer-->
                        <div id="modal-left-footer" tabindex="-1" role="dialog"
                             aria-labelledby="modal-left-footer-label" aria-hidden="true" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true"
                                                class="close">&times;</button>
                                        <h4 id="modal-left-footer-label" class="modal-title">Modal Left Footer</h4>
                                    </div>
                                    <div class="modal-body">Modal body goes here</div>
                                    <div class="modal-footer modal-footer-left">
                                        <button type="button" data-dismiss="modal" class="btn btn-default">Close
                                        </button>
                                        <button type="button" class="btn btn-success">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Modal Header Color Primary-->
                        <div id="modal-header-primary" tabindex="-1" role="dialog"
                             aria-labelledby="modal-header-primary-label" aria-hidden="true" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <button type="button" data-dismiss="modal" aria-hidden="true"
                                                class="close">&times;</button>
                                        <h4 id="modal-header-primary-label" class="modal-title">Modal Header
                                            Primary</h4></div>
                                    <div class="modal-body">Modal body goes here</div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-default">Close
                                        </button>
                                        <button type="button" class="btn btn-success">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Modal Responsive-->
                        <div id="modal-responsive" tabindex="-1" role="dialog" aria-labelledby="modal-responsive-label"
                             aria-hidden="true" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true"
                                                class="close">&times;</button>
                                        <h4 id="modal-responsive-label" class="modal-title">Modal Responsive</h4></div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mbm"><input type="text" class="form-control"/></div>
                                                <div class="mbm"><input type="text" class="form-control"/></div>
                                                <div class="mbm"><input type="text" class="form-control"/></div>
                                                <div class="mbm"><input type="text" class="form-control"/></div>
                                                <div class="mbm"><input type="text" class="form-control"/></div>
                                                <div class="mbm"><input type="text" class="form-control"/></div>
                                                <div class="mbm"><input type="text" class="form-control"/></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mbm"><input type="text" class="form-control"/></div>
                                                <div class="mbm"><input type="text" class="form-control"/></div>
                                                <div class="mbm"><input type="text" class="form-control"/></div>
                                                <div class="mbm"><input type="text" class="form-control"/></div>
                                                <div class="mbm"><input type="text" class="form-control"/></div>
                                                <div class="mbm"><input type="text" class="form-control"/></div>
                                                <div class="mbm"><input type="text" class="form-control"/></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-default">Close
                                        </button>
                                        <button type="button" class="btn btn-success">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Modal Stackable-->
                        <div id="modal-stackable" tabindex="-1" role="dialog" aria-labelledby="modal-stackable-label"
                             aria-hidden="true" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true"
                                                class="close">&times;</button>
                                        <h4 id="modal-stackable-label" class="modal-title">Modal Stackable</h4></div>
                                    <div class="modal-body"><p>One fine body…</p>

                                        <p>One fine body…</p>

                                        <p>One fine body…</p><input type="text" data-tabindex="1"
                                                                    class="form-control mbm"/><input type="text"
                                                                                                     data-tabindex="2"
                                                                                                     class="form-control mbm"/><a
                                                data-toggle="modal" data-target="#stack2" class="btn btn-primary">Launch
                                            modal</a></div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-default">Close
                                        </button>
                                        <button type="button" class="btn btn-success">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="stack2" tabindex="-1" data-focus-on="input:first" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true"
                                                class="close">&times;</button>
                                        <h4>Stack Two</h4></div>
                                    <div class="modal-body"><p>One fine body…</p>

                                        <p>One fine body…</p><input type="text" data-tabindex="1"
                                                                    class="form-control mbm"/><input type="text"
                                                                                                     data-tabindex="2"
                                                                                                     class="form-control mbm"/><a
                                                data-toggle="modal" href="#stack3" class="btn btn-default">Launch
                                            modal</a></div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-default">Close
                                        </button>
                                        <button type="button" class="btn btn-success">Ok</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="stack3" tabindex="-1" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true"
                                                class="close">&times;</button>
                                        <h4>Stack Three</h4></div>
                                    <div class="modal-body"><p>One fine body…</p><input type="text" data-tabindex="1"
                                                                                        class="form-control mbm"/><input
                                            type="text" data-tabindex="2" class="form-control mbm"/></div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-default">Close
                                        </button>
                                        <button type="button" class="btn btn-success">Ok</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Modal Full Width-->
                        <div id="modal-full-width" tabindex="-1" role="dialog" aria-labelledby="modal-full-width-label"
                             aria-hidden="true" class="modal fade">
                            <div class="modal-dialog modal-full-width">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true"
                                                class="close">&times;</button>
                                        <h4 id="modal-full-width-label" class="modal-title">Modal Full Width</h4></div>
                                    <div class="modal-body">Modal body goes here</div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-default">Close
                                        </button>
                                        <button type="button" class="btn btn-success">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Modal Wide Width-->
                        <div id="modal-wide-width" tabindex="-1" role="dialog" aria-labelledby="modal-wide-width-label"
                             aria-hidden="true" class="modal fade">
                            <div class="modal-dialog modal-wide-width">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true"
                                                class="close">&times;</button>
                                        <h4 id="modal-wide-width-label" class="modal-title">Modal Wide Width</h4></div>
                                    <div class="modal-body">Modal body goes here</div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-default">Close
                                        </button>
                                        <button type="button" class="btn btn-success">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Modal Static-->
                        <div id="modal-static" tabindex="-1" data-backdrop="static" data-keyboard="false"
                             class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body"><p>Would you like to continue with some arbitrary task?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-default">Cancel
                                        </button>
                                        <button type="button" data-dismiss="modal" class="btn btn-success">Continue
                                            Task
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Modal Long-->
                        <div id="modal-long" tabindex="-1" data-replace="true" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true"
                                                class="close">&times;</button>
                                        <h4>A Fairly Long Modal</h4></div>
                                    <div class="modal-body"><a data-toggle="modal" href="#modal-notlong"
                                                               style="position: absolute; top: 50%; right: 12px"
                                                               class="btn btn-primary">Not So Long Modal</a><img
                                            style="height: 800px;" src="http://i.imgur.com/KwPYo.jpg"/></div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-default">Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="modal-notlong" tabindex="-1" data-replace="true" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true"
                                                class="close">&times;</button>
                                        <h4>Not That Long</h4></div>
                                    <div class="modal-body"><img style="height: 300px;"
                                                                 src="http://i.imgur.com/KwPYo.jpg"/></div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-default">Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Modal Alert-->
                        <div id="modal-alert" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">Hello world !</div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-success">Ok</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Modal Confirm-->
                        <div id="modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">Are you sure?</div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-default">Cancel
                                        </button>
                                        <button type="button" data-dismiss="modal" class="btn btn-success">Ok</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Modal Custom Dialog-->
                        <div id="modal-custom-dialog" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true"
                                                class="close">&times;</button>
                                        <h4 class="modal-title">Custom Dialog</h4></div>
                                    <div class="modal-body">I am a custom dialog</div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-success">Success !
                                        </button>
                                        <button type="button" data-dismiss="modal" class="btn btn-info">Information !
                                        </button>
                                        <button type="button" data-dismiss="modal" class="btn btn-danger">Danger !
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Modal Login-->
                        <div id="modal-login" tabindex="-1" role="dialog" aria-labelledby="modal-login-label"
                             aria-hidden="true" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true"
                                                class="close">&times;</button>
                                        <h4 id="modal-login-label" class="modal-title">Login</h4></div>
                                    <div class="modal-body">
                                        <div class="form">
                                            <form class="form-horizontal">
                                                <div class="form-group"><label for="username"
                                                                               class="control-label col-md-3">Username</label>

                                                    <div class="col-md-9"><input id="username" type="text"
                                                                                 class="form-control"/></div>
                                                </div>
                                                <div class="form-group"><label for="password"
                                                                               class="control-label col-md-3">Password</label>

                                                    <div class="col-md-9"><input id="password" type="password"
                                                                                 class="form-control"/></div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-9 col-md-offset-3">
                                                        <button type="button" class="btn btn-success">Login</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Modal Prompt-->
                        <div id="modal-prompt" tabindex="-1" role="dialog" aria-labelledby="modal-prompt-label"
                             aria-hidden="true" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true"
                                                class="close">&times;</button>
                                        <h4 id="modal-prompt-label" class="modal-title">What is your name?</h4></div>
                                    <div class="modal-body"><input id="fullname" type="text" class="form-control"/>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-default">Close
                                        </button>
                                        <button type="button" class="btn btn-success">OK</button>
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
    //ui_modals.init();
});


</script>
</body>
</html>

