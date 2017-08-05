<?php
    header('Content-Type: text/html; charset=utf-8');
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ST-Project (Default name)</title>
        
        <link rel="stylesheet" type="text/css" href="<?php echo $config['base_url']; ?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $config['base_url']; ?>assets/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $config['base_url']; ?>assets/css/bootstrap-datepicker.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $config['base_url']; ?>assets/css/sweetalert.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $config['base_url']; ?>assets/css/components.css" />
        <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo $config['base_url']; ?>assets/css/custom.css">

        <script src="<?php echo $config['base_url']; ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo $config['base_url']; ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo $config['base_url']; ?>assets/js/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo $config['base_url']; ?>assets/js/sweetalert.min.js"></script>
        <script src="<?php echo $config['base_url']; ?>assets/locales/bootstrap-datepicker.th.min.js"></script>





         <style>
            /*@font-face {
                font-family: 'Slabo';
                font-style: normal;
                src: url('http://10.211.55.4/course/assets/fonts/Slabo.ttf');
            }

            @font-face {
                font-family: 'Prompt';
                font-weight: bold;
                src: url('http://10.211.55.4/course/assets/fonts/Prompt-Light.ttf');
            }*/

            body {
                font-family: 'Prompt', sans-serif;
                font-size: 1.8em;
            }

            h2, h3, h4 {
                font-family: 'Prompt', sans-serif !important;
            }
         </style>
    </head>
    <body>
        
<style>
    .navbar-brand-image {
        width: 98; 
        height: 98;
        display: block;
        margin: 5 0 5 0;
    }

    .navbar-default {
        border-top-color: transparent;
        background-color: #303030;
        border-color: #303030;
        border: 0px;
    }

    .navbar {
        border-radius: 0px;
    }

    .navbar-fixed {
        position: fixed;
        top: 0;
        width: 100%;
    }

    .navbar-logo {
        background-color: #303030;
    }

    .navbar-default .navbar-nav>.active>a, 
    .navbar-default .navbar-nav>.active>a:focus, 
    .navbar-default .navbar-nav>.active>a:hover {
        color: #fff;
        background: #303030;
        /*background: red;  For browsers that do not support gradients */
        background: -webkit-linear-gradient(#303030, #000); /* For Safari 5.1 to 6.0 */
        background: -o-linear-gradient(#303030, #000); /* For Opera 11.1 to 12.0 */
        background: -moz-linear-gradient(#303030, #000); /* For Firefox 3.6 to 15 */
        background: linear-gradient(#303030, #000); /* Standard syntax */
    }

    .navbar-default .navbar-toggle:focus, .navbar-default .navbar-toggle:hover {
        background-color: #2980B9;
    }

    .navbar-default .navbar-nav>li>a {
        color: #fff;
    }

    .navbar-default .navbar-brand {
        color: #fff;
    }

    .navbar-default .navbar-toggle .icon-bar {
        background-color: #fff;
    }

    .nav-list-h4 {
        margin-top: 0px;
        margin-bottom: 0px;
    }
    .custom-navbar-panel {
        padding-top: 58px;
    }

    .custom-header-panel {
        background-color: #303030; 
        height: 108px;
    }

    .scroll {
        white-space: nowrap;
        overflow-x: auto; 
        -webkit-overflow-scrolling: touch;
    }

    @media (max-width: 1199px) {
        #largeNavbarLeft {
            width: 550px;
        }
    }
</style>

<div class="container-fluid custom-header-panel hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6 col-sm-8 hidden-xs">
                <div class="col-md-3 col-sm-3">
                    <div class="navbar-logo">
                        <div class="top-image">
                            <img class="navbar-brand-image" 
                            src="<?php echo $config['base_url']; ?>assets/images/sjulogo.png" />
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9">
                    <h2 style="color: #FAB321; text-shadow: none;">มหาวิทยาลัยเซนต์จอห์น</h2>
                    <p style="color: #fff; margin-top: 10px">Saint John's University</p>
                </div>
            </div>

            <div class="col-lg-7 col-md-6 col-sm-4 custom-navbar-panel">
                <nav id="topNavbar" class="navbar navbar-default" style="z-index: 99;">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
                        data-target="#bs-example-navbar-collapse" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand hidden-lg hidden-md hidden-sm" href="/st-project/" style="margin-right: 20px;">
                            <h4 class="nav-list-h4">Saint John's University</h4>
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse">
                        <ul id="largeNavbarLeft" class="nav navbar-nav">
                                                                                                <li>
                                        <a href="<?php echo $config['base_url']; ?>" >
                                        <h4 class="nav-list-h4" style="color: #fff;
                                        text-shadow: none;">หน้าหลัก</h4></a></li>
                                                                    <li>
                                        <a href="http://www.stjohn.ac.th/sju/admission_sju/index.php?Node=ADDMISSION" target="_blank">
                                        <h4 class="nav-list-h4" style="color: #fff;
                                        text-shadow: none;">สมัครเรียน</h4></a></li>
                                                                    <li>
                                        <a href="http://www.stjohn.ac.th/sju/admission_sju/index.php?Node=INTRO(-_-)" target="_blank">
                                        <h4 class="nav-list-h4" style="color: #fff;
                                        text-shadow: none;">เอกสารประกอบการสมัคร</h4></a></li>
                                                                    <li>
                                        <a href="http://www.stjohn.ac.th/sju/admission_sju/index.php?Node=CONTACTSJU" target="_blank">
                                        <h4 class="nav-list-h4" style="color: #fff;
                                        text-shadow: none;">ติดต่อเรา</h4></a></li>
                                                                                    </ul>
                        <ul class="nav navbar-nav navbar-right">
                                                                                                                </ul>
                    </div><!-- /.navbar-collapse -->

                    
                </nav>
            </div>
        </div>
    </div> <!-- container -->
</div>


<nav id="topNavbarFixed" class="navbar navbar-default navbar-fixed hidden-lg hidden-md hidden-sm" style="z-index: 99;">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand hidden-lg hidden-md hidden-sm" href="/st-project/" style="margin-right: 20px;">
                <h4 class="nav-list-h4" style="color: #FAB321; text-shadow: none;">Saint John's University</h4>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                                                            <li>
                            <a href="<?php echo $config['base_url']; ?>" >
                            <h4 class="nav-list-h4" style="color: #fff;
                                text-shadow: none;">หน้าหลัก</h4></a></li>
                                            <li>
                            <a href="http://www.stjohn.ac.th/sju/admission_sju/index.php?Node=ADDMISSION" target="_blank">
                            <h4 class="nav-list-h4" style="color: #fff;
                                text-shadow: none;">สมัครเรียน</h4></a></li>
                                            <li>
                            <a href="http://www.stjohn.ac.th/sju/admission_sju/index.php?Node=INTRO(-_-)" target="_blank">
                            <h4 class="nav-list-h4" style="color: #fff;
                                text-shadow: none;">เอกสารประกอบการสมัคร</h4></a></li>
                                            <li>
                            <a href="http://www.stjohn.ac.th/sju/admission_sju/index.php?Node=CONTACTSJU" target="_blank">
                            <h4 class="nav-list-h4" style="color: #fff;
                                text-shadow: none;">ติดต่อเรา</h4></a></li>
                                                </ul>
            <ul class="nav navbar-nav navbar-right">
                                                                </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>

<script>
    // handle active class of navbar
    var url = window.location;
    $('ul.nav a').filter(function() {
        return this.href == url;
    }).parent().addClass('active');
    
    logoBrandReposition();
    $(window).resize(function() {
        logoBrandReposition();
    })

    /* fixed the navbar when scrolling more than the top image's height */
    $( document ).scroll(function() {
        if ($(this).scrollTop() > 115) {
            $('#topNavbarFixed').removeClass('hidden-md');
            $('#topNavbarFixed').removeClass('hidden-lg');
        }
        else {
            $('#topNavbarFixed').addClass('hidden-md');
            $('#topNavbarFixed').addClass('hidden-lg');
        }
    });

    function logoBrandReposition() {
        if ($(document).width() > 768) {
            $('.top-image').outerWidth($('.navbar-brand').width());
        }
        else {
            var containerPaddingLeft = 15;
            var containerPaddingRight = 15;
            var containerPadding = containerPaddingLeft + containerPaddingRight;
            $('.top-image').outerWidth($(document).width() - containerPadding);
        }
    }
</script>

<div id="content" style="margin-bottom: 50px">
