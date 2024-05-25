<html>

<head>
    <title>CodeIgniter Tutorial</title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/plugins/images/favicon.png'); ?>">
    <link rel="stylesheet"
        href="<?php echo base_url('assets/plugins/bower_components/chartist/dist/chartist.min.css'); ?>">
    <link rel="stylesheet"
        href="<?php echo base_url('assets/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.min.css'); ?>">
    <style>
        .profile-pic {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .profile-pic span {
            color: black !important;
            margin-top: 25px;
            font-size: 18px;
        }

        .profile-pic img {
            width: 125px;
            height: 125px;
            border-radius: 50%;

        }

        .left-sidebar {
            padding-top: 50px !important;
        }
    </style>
</head>

<body>
    <div class="modal fade" id="logoutexampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content rounded-0">
                <div class="modal-body p-4 px-5">
                    <div class="main-content text-center">
                        <a href="#" class="close-btn" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><span class="icon-close2"></span></span>
                        </a>
                        <div class="warp-icon mb-4">
                            <span class="icon-lock2"></span>
                        </div>
                        <label for="">Confirm Logout?</label>
                        <div class="d-flex">
                            <div class="mx-auto">
                                <a href="#" class="btn btn-primary">Cancel</a>
                                <a href="<?php echo site_url("home") ?>" class="btn btn-primary">OK</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <a class="profile-pic" href="#">
                                <img src="<?php echo base_url("assets/images/JSLogo.png") ?>" alt="user-img" width="100"
                                    class="img-circle" style="width: 200px;height: 75px;border-radius: unset;"></a>
                        </li>
                        <li style="margin-top: 50px;">
                            <a class="profile-pic" href="#">
                                <img src="<?php echo base_url("assets/plugins/images/users/varun.jpg") ?>"
                                    alt="user-img" width="36" class="img-circle"><span
                                    class="text-white font-medium"><?php echo $this->session->userdata('user_name') ?></span>
                                <span class="text-white font-medium"
                                    style="margin-top: unset;font-weight: 200;">Admin</span></a>
                        </li>
                        <li class="sidebar-item" style="margin-top:30px;">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="<?php echo site_url("admin/dashboard") ?>" aria-expanded="false">
                                <i class="far fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>
                        <!-- <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="<?php echo site_url("admin/profile") ?>" aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li> -->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="<?php echo site_url("admin/users") ?>" aria-expanded="false">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span class="hide-menu">Users</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="<?php echo site_url("admin/role") ?>" aria-expanded="false">
                                <i class="fas fa-book" aria-hidden="true"></i>
                                <span class="hide-menu">Role</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="<?php echo site_url("admin/authors") ?>" aria-expanded="false">
                                <i class="fas fa-address-card" aria-hidden="true"></i>
                                <span class="hide-menu">Authors</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="<?php echo site_url("admin/articles") ?>" aria-expanded="false">
                                <i class="fas fa-book" aria-hidden="true"></i>
                                <span class="hide-menu">Articles</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="<?php echo site_url("admin/volumes") ?>" aria-expanded="false">
                                <i class="fas fa-book" aria-hidden="true"></i>
                                <span class="hide-menu">Volumes</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" data-toggle="modal"
                                data-target="#logoutexampleModalCenter" href="#" aria-expanded="false">
                                <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                                <span class="hide-menu">Logout</span>
                            </a>
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <script src="<?php echo base_url("assets/js/jquery-3.3.1.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/js/popper.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/js/bootstrap.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/js/main.js") ?>"></script>