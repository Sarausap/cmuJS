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
                            echo "<p class='keywords" . $currentindex . "'>" . $keyword . "</p>";
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
                <a style="width: 5em;" href="<?php echo base_url("assets/uploads/" . $article['filename']) ?>"
                    class="edit-btn btn btn-danger d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">
                    PDF
                </a>
            </div>
        </section>
    </div>
</div>