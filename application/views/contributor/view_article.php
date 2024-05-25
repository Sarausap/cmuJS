<style>

</style>
<div class="page-wrapper">
    <div class="container-fluid">
        <section>
            <div class="card overflow-hidden">
                <div class="position-relative">
                    <div class="doi">
                        <?php
                        echo "(" . $article['doi'] . ") " . $article['volume'];
                        ?>
                    </div>
                    <!-- <a href="javascript:void(0)">
                <img src="../assets/images/blog/blog-img5.jpg" class="card-img-top rounded-0 object-fit-cover"
                    alt="ample-img" height="440">
            </a> -->
                    <!-- <span class="badge text-bg-light mb-9 me-9 position-absolute bottom-0 end-0">2
                min Read</span> -->
                    <!-- <img src="../assets/images/profile/user-5.jpg" alt="ample-img"
                class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40"
                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Esther Lindsey"> -->
                </div>
                <div class="card-body p-4">
                    <h2 class="fs-9 fw-semibold my-4"><?php echo $article['title'] ?></h2>
                    <div class="card-footer-left">
                        <?php
                        $keywords = explode(",", $article['keywords']);
                        $previousindex = 0;
                        foreach ($keywords as $keyword) {
                            $currentindex = 0;
                            do {
                                $currentindex = rand(1, 5);
                            } while ($currentindex == $previousindex);
                            $previousindex = $currentindex;
                            echo "<button class='keywords" . $currentindex . "'>" . $keyword . "</button>";
                        }
                        ?>
                    </div>
                    <div class="d-flex align-items-center fs-2 ms-auto">
                        <i class="ti ti-point text-dark"></i>
                        <?php
                        $date = strtotime($article["date_published"]);
                        $formatted = date('F d, Y', $date);
                        echo $formatted;
                        ?>
                    </div>
                    <?php foreach ($authors as $author): ?>
                        <div class="d-flex align-items-center gap-4">
                            <div class="d-flex align-items-center gap-2">
                                <div class="author-name"><?php echo $author['name'] ?></div>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="card-body border-top p-4">
                    <p class="mb-3">
                        <?php echo $article['abstract'] ?>
                    </p>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Recent Comments -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-md-9 col-lg-9 col-sm-12">
                    <canvas id="myChart"></canvas>
                    <div class="card white-box p-0">
                        <div class="card-body">
                            <h3 class="box-title mb-0">Graph Title</h3>
                            <!-- Insert your graph rendering code here -->
                        </div>
                    </div>
                </div>
                <!-- .col -->
                <div class="col-md-3 col-lg-3 col-sm-12">
                    <div class="card white-box p-0">
                        <div class="card-body">
                            <h3 class="box-title mb-0">Comments</h3>
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
                <!-- /.col -->
            </div>
        </section>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>