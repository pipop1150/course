<?php
    $navbar = array();
    if (!empty($headerValues)) {
        $navbar = $headerValues["navbar"];
    }
?>

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
</style>

<div class="container-fluid custom-header-panel hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-4 hidden-xs">
                <div class="col-md-3 col-sm-3">
                    <div class="navbar-logo">
                        <div class="top-image">
                            <img class="navbar-brand-image" 
                            src="<?=asset_url()?>images/sjulogo.png" />
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9">
                    <h2 style="color: #FAB321; text-shadow: none;">มหาวิทยาลัยเซนต์จอร์น</h2>
                    <p style="color: #fff; margin-top: 10px">Saint John's University</p>
                </div>
            </div>

            <div class="col-md-7 col-sm-8 custom-navbar-panel">
                <nav id="topNavbar" class="navbar navbar-default" style="z-index: 99;">
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
                            <h4 class="nav-list-h4">Saint John's University</h4>
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <?php if (!empty($navbar)) {?>
                                <?php foreach ($navbar['leftMenu'] as $menu) { ?>
                                    <li>
                                        <a href="<?=$menu['url']?>" <?=$menu['options']?>>
                                        <h4 class="nav-list-h4" style="color: #fff;
                                        text-shadow: none;"><?=$menu['name']?></h4></a></li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <?php if (!empty($navbar)) {?>
                                <?php foreach ($navbar['rightMenu'] as $menu) { ?>
                                    <li>
                                        <a href="<?=$menu['url']?>" <?=$menu['options']?>>
                                        <h4 class="nav-list-h4" style="color: #fff;
                                        text-shadow: none;"><?=$menu['name']?></h4></a></li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </nav>
            </div>
        </div>
    </div> <!-- container -->
</div>


<nav id="topNavbarFixed" class="navbar navbar-default navbar-fixed hidden-lg hidden-md" style="z-index: 99;">
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
                <?php if (!empty($navbar)) {?>
                    <?php foreach ($navbar['leftMenu'] as $menu) { ?>
                        <li>
                            <a href="<?=$menu['url']?>" <?=$menu['options']?>>
                            <h4 class="nav-list-h4" style="color: #fff;
                                text-shadow: none;"><?=$menu['name']?></h4></a></li>
                    <?php } ?>
                <?php } ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (!empty($navbar)) {?>
                    <?php foreach ($navbar['rightMenu'] as $menu) { ?>
                        <li>
                            <a href="<?=$menu['url']?>" <?=$menu['options']?>>
                            <h4 class="nav-list-h4" style="color: #fff;
                                text-shadow: none;"><?=$menu['name']?></h4></a></li>
                    <?php } ?>
                <?php } ?>
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
        