<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<div class="container">
    <div class="control_panel_menu row">
        <div class="col-sm-3 ">
            <div class="sidebar-nav">
                <div class="navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <span class="visible-xs navbar-brand">Control Panel</span>
                    </div>
                    <div class="navbar-collapse collapse sidebar-navbar-collapse">
                        <ul class="nav navbar-nav" >
                            <li class="active">
                                <a href="#" data-toggle="collapse" data-target="#toggleDemo0" data-parent="#sidenav01" class="collapsed">
                                    <h4>
                                        Control Panel
<!--                                        <br>
                                        <small>IOSDSV <span class="caret"></span></small>-->
                                    </h4>
                                </a>
<!--                                <div class="collapse" id="toggleDemo0" style="height: 0px;">
                                    <ul class="nav nav-list">
                                        <li><a href="#">ProfileSubMenu1</a></li>
                                        <li><a href="#">ProfileSubMenu2</a></li>
                                        <li><a href="#">ProfileSubMenu3</a></li>
                                    </ul>
                                </div>-->
                            </li>
<!--                            <li>
                                <a href="#" data-toggle="collapse" data-target="#toggleDemo" data-parent="#sidenav01" class="collapsed">
                                    <span class="glyphicon glyphicon-cloud"></span> Submenu 1 <span class="caret pull-right"></span>
                                </a>
                                <div class="collapse" id="toggleDemo" style="height: 0px;">
                                    <ul class="nav nav-list">
                                        <li><a href="#">Submenu1.1</a></li>
                                        <li><a href="#">Submenu1.2</a></li>
                                        <li><a href="#">Submenu1.3</a></li>
                                    </ul>
                                </div>
                            </li>-->
<!--                            <li class="active">
                                <a href="#" data-toggle="collapse" data-target="#toggleDemo2" data-parent="#sidenav01" class="collapsed">
                                    <span class="glyphicon glyphicon-inbox"></span> Submenu 2 <span class="caret pull-right"></span>
                                </a>
                                <div class="collapse" id="toggleDemo2" style="height: 0px;">
                                    <ul class="nav nav-list">
                                        <li><a href="#">Submenu2.1</a></li>
                                        <li><a href="#">Submenu2.2</a></li>
                                        <li><a href="#">Submenu2.3</a></li>
                                    </ul>
                                </div>
                            </li>-->
                            <!--<li><a href="#"><span class="glyphicon glyphicon-calendar"></span> Dashboard <span class="badge pull-right">42</span></a></li>-->
                            <li><a href="<?php echo base_url()?>customer/dashboard"><span class="fa fa-dashboard"></span> Dashboard</a></li>
                            <li ><a href="<?php echo base_url()?>customer/profile"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                            <!--<li><a href=""><span class="glyphicon glyphicon-cog"></span> PreferencesMenu</a></li>-->
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .control_panel_menu .navbar-nav>li{
        width: 100%;
        border-bottom: 1px solid #ddd;
    } 
    .control_panel_menu .navbar-collapse{
        padding-right: 0px;
    } 
</style>