<link rel="stylesheet" href="<?php echo base_url('assets/publicNav/css/carousel.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/publicNav/css/article_view.css') ?>">


<style>
    .card-body>p {
        color: #000000;
        font-weight: 300;
        font-size: 18px;

    }
</style>

<form>
    <input type="radio" name="fancy" autofocus value="clubs" id="clubs" />
    <input type="radio" name="fancy" value="hearts" id="hearts" />
    <input type="radio" name="fancy" value="spades" id="spades" />
    <input type="radio" name="fancy" value="diamonds" id="diamonds" />
    <label for="clubs"><img class="carousel-images" src='<?php echo base_url('assets/images/home.jpg') ?>' /></label>

    <div class="keys">Use left and right keys to navigate</div>
</form>

<section>
    <div class="card overflow-hidden">
        <div class="position-relative">
            <div class="doi card-body p-4">
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
                    <div>
                        <?php foreach ($article_authors as $article_author): ?>
                            <?php if ($article_author["article_id"] === $article['articles_id']): ?>
                                <p style="color:black"><?php echo ($article_author['complete_name']); ?></p>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="card-body border-top p-4">
            <?php echo $article['abstract'] ?>

        </div>
        <a href="<?php echo base_url('assets/uploads/' . $article["filename"]) ?>" class="card-body border-top p-4">
            PDF
        </a>
    </div>
    <!-- ============================================================== -->
    <!-- Recent Comments -->
    <!-- ============================================================== -->

</section>

<div class="announcement">

</div>

<div>
</div>