<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="<?php echo assets_url();  ?>/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Kindred</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="<?php echo assets_url();  ?>/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo assets_url();  ?>/css/jquery-ui.min.css" rel="stylesheet"/>
    <link href="<?php echo assets_url();  ?>/css/jquery-ui-timepicker-addon.css" rel="stylesheet"/>
    <link href="<?php echo assets_url();  ?>/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?php echo assets_url();  ?>/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="<?php echo assets_url();  ?>/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="<?php echo assets_url();  ?>/css/pe-icon-7-stroke.css" rel="stylesheet" />




    <!--   Core JS Files   -->
    <script src="<?php echo assets_url();  ?>/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="<?php echo assets_url();  ?>/js/bootstrap.min.js" type="text/javascript"></script>
    
    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="<?php echo assets_url();  ?>/js/bootstrap-checkbox-radio-switch.js"></script>
    <script src="<?php echo assets_url();  ?>/js/jquery-ui.min.js"></script>
    <script src="<?php echo assets_url();  ?>/js/jquery-ui-timepicker-addon.js"></script>

    <!--  Charts Plugin -->
    <script src="<?php echo assets_url();  ?>/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo assets_url();  ?>/js/bootstrap-notify.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="<?php echo assets_url();  ?>/js/light-bootstrap-dashboard.js"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="<?php echo assets_url();  ?>/js/demo.js"></script>
    
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="<?php echo assets_url();  ?>/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="<?php echo base_url(); ?>" class="simple-text">
                    Kindred
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="<?php echo base_url('dashboard'); ?>">
                        <i class="pe-7s-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('login'); ?>">
                        <i class="pe-7s-user"></i>
                        <p>Login</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('schedule'); ?>">
                        <i class="pe-7s-alarm"></i>
                        <p>My Schedule</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('appointments'); ?>">
                        <i class="pe-7s-note2"></i>
                        <p>Appointments</p>
                    </a>
                </li>


                <li>
                    <a href="<?php echo base_url('doctors'); ?>">
                        <i class="pe-7s-users"></i>
                        <p>Doctors</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('bookings'); ?>">
                        <i class="pe-7s-note2"></i>
                        <p>My Bookings</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('documents'); ?>">
                        <i class="pe-7s-copy-file"></i>
                        <p>Documents</p>
                    </a>
                </li>

            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><?php echo isset($title) ? $title : ""; ?></a>
                    <?php echo isset($dom) ? $dom : ""; ?>
                </div>
                <div class="collapse navbar-collapse">
                    <!-- <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               Account
                            </a>
                        </li>


                    </ul> -->
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">