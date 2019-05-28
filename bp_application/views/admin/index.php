<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Panel</title>

        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="Developed By" content="MD NIZAM UDDIN, Mobile:01822484490"/>

        <!-- Favicon -->
        <link href="images/logo.png" rel="icon" type="image/png">

        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style --> <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/plugins/select2/select2.min.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/plugins/iCheck/all.css">

        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/plugins/datatables/dataTables.bootstrap.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/dist/css/AdminLTE.css">

        <!-- Date Picker -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/plugins/datepicker/datepicker3.css">


        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
               page. However, you can choose any other skin. Make sure you
               apply the skin class to the body tag so the changes take effect.
        -->

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/dist/css/skins/skin-blue.min.css">
        <!-- Select2 -->
        <!-- jQuery 2.2.3 -->
        <script src="<?php echo base_url(); ?>assets/backend/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- bootstrap validation -->
        <script src="<?php echo base_url(); ?>assets/backend/dist/js/validator.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/backend/dist/js/custom.js"></script>

    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <!-- Main Header -->
            <header class="main-header">

                <!-- Logo -->
                <a href="<?php echo base_url(); ?>backend_dashboard" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b>P</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Admin</b> Panel</span>
                </a>

                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">

                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <img src="<?php echo base_url(); ?>assets/backend/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs"><?php $user_data=$this->session->userdata('login_session_data'); echo $user_data['user_name'];  ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- The user image in the menu -->
                                    <li class="user-header">
                                        <img src="<?php echo base_url(); ?>assets/backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                        <p>
                                            <!-- Alexander Pierce - Web Developer
                                             <small>Member since Nov. 2012</small>-->
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <a href="<?php echo base_url() ?>backend_logout/logout" class="btn btn-default btn-flat">
                                                Log out
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-singout"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">

                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">

                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url() ?>/assets/backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $this->session->userdata('admin_name') ?></p>
                            <!-- Status -->
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>



                    <!-- Sidebar Menu -->
                    <?php $this->load->view('admin/menu/menu'); ?>
                    <!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                <!-- Main content -->
                <div class="col-md-10" id='messagebox' style=" font-size: 14px; text-align: center; position: absolute; z-index: 9999 !important;"> </div>
                <section class="content">

                    <div class="row">

                        <?php
                        if (isset($content)) {
                            echo $content;
                        }
                        ?>
                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="pull-right hidden-xs">
                    <!-- Anything you want-->
                </div>
                <!-- Default to the left -->
                <strong>Copyright &copy; - All Rights Reserved 
            </footer>

            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->


        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo base_url(); ?>assets/backend/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/plugins/select2/select2.full.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/plugins/iCheck/icheck.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
        <!-- DataTables -->
        <script src="<?php echo base_url(); ?>assets/backend/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/plugins/datatables/dataTables.bootstrap.min.js"></script>

        <!-- SlimScroll -->
        <script src="<?php echo base_url(); ?>assets/backend/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url(); ?>assets/backend/plugins/fastclick/fastclick.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/plugins/chartjs/Chart.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/backend/dist/js/app.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/dist/js/demo.js"></script>
        <!--Print-->
        <script src="<?php echo base_url(); ?>assets/backend/dist/js/jQuery.print.js"></script>
        <!-- Date picker -->
        <script src="<?php echo base_url(); ?>assets/backend/plugins/datepicker/bootstrap-datepicker.js"></script>


        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. Slimscroll is required when using the
             fixed layout. -->
    </body>
</html>
<script>
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //date picker
        $('.datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'

        });

        //data table
        $("#example1").DataTable();

        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
    CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();

    });
</script>
