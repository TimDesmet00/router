<?php require 'views/component/header.php'; ?>

<?php use App\controller\getArticles; ?>

<section>
    <h1><?= $articles->title ?></h1>
    <p><?= $articles->formatPublishDate() ?></p>
    <p><?= $articles->description ?></p>

    <?php // TODO: links to next and previous ?>
    <a href="#">Previous article</a>
    <a href="#">Next article</a>
</section>

<?php
require 'views/component/footer.php'
?>
