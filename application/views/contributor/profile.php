<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Profile page</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li><a href="#" class="fw-normal">Dashboard</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-12">
                <div class="white-box" style="height:96%;">
                    <div class="user-bg" style="height: 112%;">
                        <div class="overlay-box">
                            <div class="user-content" style="padding:15px 15px 0 15px">
                                <form class="form-horizontal form-material"
                                    action="<?php echo site_url('user/profile/update') ?>" method="post"
                                    enctype="multipart/form-data">
                                    <input type="hidden" style="display:none" name="role" value="contributor">
                                    <input type="hidden" style="display:none" name="default"
                                        value="<?php echo $user["profile_pic"] ?>">
                                    <label for="imageInput" style="cursor: pointer;"><img id="previewContainer"
                                            src="<?php echo base_url("assets/profiles/" . $user["profile_pic"]) ?>"
                                            class="thumb-lg img-circle" alt="img"
                                            style="width:250px;height:250px"></label>
                                    <input type="file" id="imageInput" accept="image/*" style="display:none"
                                        name="profile">
                                    <h4 class="text-white mt-2" style="margin-top:30px !important">
                                        <?php echo $user['complete_name'] ?>
                                    </h4>
                                    <h5 class="text-white mt-2"><?php echo $user['email'] ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xlg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Name</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" name="name" placeholder="Name" class="form-control p-0 border-0"
                                    value="<?php echo $user['complete_name'] ?>">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0">Email</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="email" placeholder="johnathan@admin.com" class="form-control p-0 border-0"
                                    name="email" id="example-email" value="<?php echo $user['email'] ?>">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Password</label>
                            <div class="col-md-12" class="form-control p-0 border-0" name="password"
                                value="<?php echo $user['pword'] ?>">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-sm-12">Role</label>
                            <div class="col-sm-12 border-bottom">
                                <p>Contributor</p>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12" style="position:relative">
                                <button class="btn btn-success" type="submit"
                                    style="position:absolute;right:0;top:50%;transform: translateY(-50%)">Update
                                    Profile</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <div class="row">
            <!-- .col -->
            <div class="col-md-12 col-lg-8 col-sm-12">
                <div class="card white-box p-0">
                    <div class="card-body">
                        <h3 class="box-title mb-0">Recents</h3>
                    </div>
                    <div class="comment-widgets">
                        <!-- Comment Row -->
                        <div class="d-flex flex-row comment-row p-3 mt-0">
                            <div class="p-2"><img src="plugins/images/users/varun.jpg" alt="user" width="50"
                                    class="rounded-circle"></div>
                            <div class="comment-text ps-2 ps-md-3 w-100">
                                <h5 class="font-medium">James Anderson</h5>
                                <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing and type
                                    setting
                                    industry.It has survived not only five centuries. </span>
                                <div class="comment-footer d-md-flex align-items-center">
                                    <span class="badge bg-primary rounded">Pending</span>

                                    <div class="text-muted fs-2 ms-auto mt-2 mt-md-0">April 14, 2021</div>
                                </div>
                            </div>
                        </div>
                        <!-- Comment Row -->
                        <div class="d-flex flex-row comment-row p-3">
                            <div class="p-2"><img src="plugins/images/users/genu.jpg" alt="user" width="50"
                                    class="rounded-circle"></div>
                            <div class="comment-text ps-2 ps-md-3 active w-100">
                                <h5 class="font-medium">Michael Jorden</h5>
                                <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing and type
                                    setting
                                    industry.It has survived not only five centuries. </span>
                                <div class="comment-footer d-md-flex align-items-center">

                                    <span class="badge bg-success rounded">Approved</span>

                                    <div class="text-muted fs-2 ms-auto mt-2 mt-md-0">April 14, 2021</div>
                                </div>
                            </div>
                        </div>
                        <!-- Comment Row -->
                        <div class="d-flex flex-row comment-row p-3">
                            <div class="p-2"><img src="plugins/images/users/ritesh.jpg" alt="user" width="50"
                                    class="rounded-circle"></div>
                            <div class="comment-text ps-2 ps-md-3 w-100">
                                <h5 class="font-medium">Johnathan Doeting</h5>
                                <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing and type
                                    setting
                                    industry.It has survived not only five centuries. </span>
                                <div class="comment-footer d-md-flex align-items-center">

                                    <span class="badge rounded bg-danger">Rejected</span>

                                    <div class="text-muted fs-2 ms-auto mt-2 mt-md-0">April 14, 2021</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card white-box p-0">
                    <div class="card-heading">
                        <h3 class="box-title mb-0">Announcement</h3>
                    </div>
                    <div class="card-body">
                        <ul class="chatonline">
                            <li>
                                <div class="call-chat">
                                    <button class="btn btn-success text-white btn-circle btn" type="button">
                                        <i class="fas fa-phone"></i>
                                    </button>
                                    <button class="btn btn-info btn-circle btn" type="button">
                                        <i class="far fa-comments text-white"></i>
                                    </button>
                                </div>
                                <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                        src="plugins/images/users/varun.jpg" alt="user-img" class="img-circle">
                                    <div class="ms-2">
                                        <span class="text-dark">Varun Dhavan <small
                                                class="d-block text-success d-block">online</small></span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="call-chat">
                                    <button class="btn btn-success text-white btn-circle btn" type="button">
                                        <i class="fas fa-phone"></i>
                                    </button>
                                    <button class="btn btn-info btn-circle btn" type="button">
                                        <i class="far fa-comments text-white"></i>
                                    </button>
                                </div>
                                <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                        src="plugins/images/users/genu.jpg" alt="user-img" class="img-circle">
                                    <div class="ms-2">
                                        <span class="text-dark">Genelia
                                            Deshmukh <small class="d-block text-warning">Away</small></span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="call-chat">
                                    <button class="btn btn-success text-white btn-circle btn" type="button">
                                        <i class="fas fa-phone"></i>
                                    </button>
                                    <button class="btn btn-info btn-circle btn" type="button">
                                        <i class="far fa-comments text-white"></i>
                                    </button>
                                </div>
                                <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                        src="plugins/images/users/ritesh.jpg" alt="user-img" class="img-circle">
                                    <div class="ms-2">
                                        <span class="text-dark">Ritesh
                                            Deshmukh <small class="d-block text-danger">Busy</small></span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="call-chat">
                                    <button class="btn btn-success text-white btn-circle btn" type="button">
                                        <i class="fas fa-phone"></i>
                                    </button>
                                    <button class="btn btn-info btn-circle btn" type="button">
                                        <i class="far fa-comments text-white"></i>
                                    </button>
                                </div>
                                <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                        src="plugins/images/users/arijit.jpg" alt="user-img" class="img-circle">
                                    <div class="ms-2">
                                        <span class="text-dark">Arijit
                                            Sinh <small class="d-block text-muted">Offline</small></span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="call-chat">
                                    <button class="btn btn-success text-white btn-circle btn" type="button">
                                        <i class="fas fa-phone"></i>
                                    </button>
                                    <button class="btn btn-info btn-circle btn" type="button">
                                        <i class="far fa-comments text-white"></i>
                                    </button>
                                </div>
                                <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                        src="plugins/images/users/govinda.jpg" alt="user-img" class="img-circle">
                                    <div class="ms-2">
                                        <span class="text-dark">Govinda
                                            Star <small class="d-block text-success">online</small></span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="call-chat">
                                    <button class="btn btn-success text-white btn-circle btn" type="button">
                                        <i class="fas fa-phone"></i>
                                    </button>
                                    <button class="btn btn-info btn-circle btn" type="button">
                                        <i class="far fa-comments text-white"></i>
                                    </button>
                                </div>
                                <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                        src="plugins/images/users/hritik.jpg" alt="user-img" class="img-circle">
                                    <div class="ms-2">
                                        <span class="text-dark">John
                                            Abraham<small class="d-block text-success">online</small></span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer text-center"> 2021 © Ample Admin brought to you by <a
            href="https://www.wrappixel.com/">wrappixel.com</a>
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
<script>
    document.getElementById('imageInput').addEventListener('change', function (e) {
        // Reset the preview container to its initial state
        document.getElementById('previewContainer').src = "<?php echo base_url("assets/profiles/" . $user["profile_pic"]); ?>";

        var reader = new FileReader();
        reader.onload = function (event) {
            // Update the preview container with the newly selected file
            document.getElementById('previewContainer').src = event.target.result;
        }
        reader.readAsDataURL(e.target.files[0]);
    });

</script>