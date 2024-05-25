<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('assets/publicNav/fonts/icomoon/style.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/publicNav/css/owl.carousel.min.css') ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/publicNav/css/bootstrap.min.css') ?>">

    <!-- Style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/publicNav/css/style.css') ?>">

    <title>Website Menu #9</title>
</head>

<body>
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->


    <!-- NAVBAR -->
    <header class="site-navbar mt-3">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="site-logo col-6">
                    <a href="index.html">
                        <img class="logo-round" src="<?php echo base_url("assets/images/logo.png") ?>" />
                    </a>
                </div>
                <nav class="mx-auto site-navigation">
                    <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                        <li><a href="<?php echo site_url("home") ?>" class="nav-link active">Home</a></li>
                        <li><a href="<?php echo site_url("archive") ?>">Archive</a></li>
                        <!-- <li class="has-children">
                            <a href="services.html">Pages</a>
                            <ul class="dropdown">
                                <li><a href="services.html">Authors</a></li>
                                <li><a href="service-single.html">Service Single</a></li>
                                <li><a href="blog-single.html">Blog Single</a></li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="job-listings.html">About</a>
                            <ul class="dropdown">
                                <li><a href="job-single.html">Contributor</a></li>
                                <li><a href="post-job.html">About Us</a></li>
                            </ul>
                        </li> -->

                        <li class="d-lg-none"><a href="post-job.html"><span class="mr-2">+</span> Post a Job</a></li>
                        <li class="d-lg-none"><a href="login.html">Log In</a></li>
                    </ul>
                </nav>

                <div class="right-side">
                    <div class="ml-auto">
                        <form class="search">
                            <input type="text" class="search-textbox" placeholder="Search" />
                        </form>
                        <a href="<?php echo site_url("login") ?>"
                            class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                                class="mr-2 icon-lock_outline"></span>Log In</a>
                    </div>
                    <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span
                            class="icon-menu h3 m-0 p-0 mt-2"></span></a>
                </div>

            </div>
        </div>
    </header>