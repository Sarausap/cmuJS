<link rel="stylesheet" href="<?php echo base_url('assets/publicNav/css/carousel.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/publicNav/css/articleCard.css') ?>">
<style>
    .abstract {
        width: 100%;
        height: 500px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .abstract>p {
        color: black;
        width: 100%;
        height: auto;
        /* Adjusted to auto to allow for dynamic content height */
        white-space: normal;
        /* Changed to normal to allow text to wrap */
        overflow: hidden;
        /* Keeps the overflow hidden */
        text-overflow: ellipsis;
        /* Keeps the ellipsis for single line */
        display: -webkit-box;
        -webkit-line-clamp: 3;
        /* Adjust the number of lines as needed */
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
<form>
    <input type="radio" name="fancy" autofocus value="clubs" id="clubs" />
    <input type="radio" name="fancy" value="hearts" id="hearts" />
    <input type="radio" name="fancy" value="spades" id="spades" />
    <input type="radio" name="fancy" value="diamonds" id="diamonds" />
    <label for="clubs"><img class="carousel-images" src='<?php echo base_url('assets/images/home.jpg') ?>' /></label>
</form>

<section>
    <div class="title-container">
        <h3 class="title">LATEST</h3>
        <a href="#">
            <h4>MORE</h4>
        </a>
    </div>
    <hr>
    <?php foreach ($latest_articles as $article): ?>
        <div class="ArticleCard">
            <div class="doi">
                <?php
                $date = strtotime($article["date_published"]);
                $formatted = date('F d, Y', $date);
                echo $article['volume'] . " " . $formatted;
                ?>
            </div>

            <div class="article-name" style="max-height:fit-content;"><?php echo $article['title'] ?></div>
            <div class="doi-number"><?php echo $article['doi'] ?></div>
            <div>
                <?php foreach ($article_authors as $article_author): ?>
                    <?php if ($article_author["article_id"] === $article['articles_id']): ?>
                        <p style="color:black"><?php echo ($article_author['complete_name']); ?></p>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
            <div class="abstract">
                <p><?php echo $article['abstract'] ?></p>
            </div>
            <div class="card-footer">
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
                <div class="card-footer-right">
                    <form id="articleForm" class="PrimaryButton" action="<?php echo site_url('article/view'); ?>"
                        method="post">
                        <input type="hidden" name="id" value="<?php echo $article['articles_id']; ?>">
                        <input type="submit" class="Login" value="View">
                    </form>

                </div>
            </div>
        </div>
    <?php endforeach ?>
    <div class="title-container">
        <h3 class="title">Popular</h3>
        <a href="#">
            <h4>MORE</h4>
        </a>
    </div>
    <hr>
</section>

<div class="announcement">

</div>

<div>
</div>