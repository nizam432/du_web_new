<!DOCTYPE html>
<html class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" lang="" style=""><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Dhaka University|  Home</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>assets/frontend/images/favicon.png">
        <!-- Normalize CSS --> 
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/normalize.css">
        <!-- Main CSS -->         
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/main.css">
        <!-- Bootstrap CSS --> 
        <!--<link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <!-- Animate CSS --> 
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/animate.min.css">
        <!-- Font-awesome CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Owl Caousel CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/owl.theme.default.min.css">

        <!-- Main Menu CSS -->      
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/meanmenu.min.css">
        <!-- nivo slider CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/nivo-slider.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/preview.css" type="text/css" media="screen">
        <!-- Datetime Picker Style CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/jquery.datetimepicker.css">
        <!-- Magic popup CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/magnific-popup.css">
        <!-- Switch Style CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/hover-min.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/style.css">
        <!-- Modernizr Js -->
        <script src="<?php echo base_url() ?>assets/frontend/js/modernizr-2.8.3.min.js"></script>
    </head>
    <body cz-shortcut-listen="true">
        <!-- Main Body Area Start Here -->
        <div id="wrapper">
            <!-- Header Area Start Here -->
            <header>       
                <link href="<?php echo base_url() ?>assets/frontend/css/CssFilesHome.css" rel="stylesheet">
                <div id="header2" class="header4-area">
                    <div class="header-top-area" style="background:#2B1774">
                        <div class="container" >
                            <div class="row" >
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <div class="header-top-left" >
                                        <div class="logo-area">
                                            <a href="<?php echo base_url() ?>">
                                                <img class="img-responsive" src="<?php echo base_url(); ?>assets/frontend/images/logo_du.png"  alt="logo">
                                            </a>
                                       <!--<span style="display:inline;font-size:28px;font-weight:bold;color:#01A0DE; font-family:Times New Roman;"> </span>-->
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="header-top-right">
                                        <a href="#" target="_blank">Webmail</a>
                                        <a href="#" target="_blank">Login</a>
                                        <a href="#" target="_blank">Old Website</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
				<!--Menu-->	
				<?php $this->load->view('pages/home/menu');?>
                
				<!-- Mobile Menu Area  -->
				<?php $this->load->view('pages/home/mobile_menu');?>
                
    </header>

	
			<!-- Content Area start-->
				<?php
					if (isset($content)) {
						echo $content;
					}
				?>
			<!-- Content Area end-->			
	
            <!-- Footer Area -->
            <?php $this->load->view('pages/footer'); ?>

        </div>
            <!-- Main Body Area End Here -->
            
        <!-- jquery-->  
        <script src="<?php echo base_url() ?>assets/frontend/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <!-- Plugins js -->
        <script src="<?php echo base_url() ?>assets/frontend/js/plugins.js" type="text/javascript"></script>

        <!-- Bootstrap js -->
        <script src="<?php echo base_url() ?>assets/frontend/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- WOW JS -->     
        <script src="<?php echo base_url() ?>assets/frontend/js/wow.min.js"></script>
        <!-- Nivo slider js -->     
        <script src="<?php echo base_url() ?>assets/frontend/js/jquery.nivo.slider.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/frontend/js/home.js" type="text/javascript"></script>
        <!-- Owl Cauosel JS -->
        <script src="<?php echo base_url() ?>assets/frontend/js/owl.carousel.min.js" type="text/javascript"></script>

        <!-- Meanmenu Js -->
        <script src="<?php echo base_url() ?>assets/frontend/js/jquery.meanmenu.min.js" type="text/javascript"></script>
        <!-- Srollup js -->
        <script src="<?php echo base_url() ?>assets/frontend/js/jquery.scrollUp.min.js" type="text/javascript"></script>
        <!-- jquery.counterup js -->
        <script src="<?php echo base_url() ?>assets/frontend/js/jquery.counterup.min.js"></script>
        <script src="<?php echo base_url() ?>assets/frontend/js/waypoints.min.js"></script>
        <!-- Countdown js -->
        <script src="<?php echo base_url() ?>assets/frontend/js/jquery.countdown.min.js" type="text/javascript"></script>
        <!-- Isotope js -->
        <script src="<?php echo base_url() ?>assets/frontend/js/isotope.pkgd.min.js" type="text/javascript"></script>
        <!-- Magic Popup js -->
        <script src="<?php echo base_url() ?>assets/frontend/js/jquery.magnific-popup.min.js" type="text/javascript"></script>

        <!-- Custom Js -->
        <script src="<?php echo base_url() ?>assets/frontend/js/main.js" type="text/javascript"></script>
        <a id="scrollUp" href="<?php echo base_url() ?>#top" style="display: none; position: fixed; z-index: 2147483647;"><i class="fa fa-arrow-up"></i></a>
    </body>
</html>