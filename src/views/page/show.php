<?php require 'views/component/header.php'; ?>

<?php use App\controller\getArticles; ?> 

<section>
    <h1><?= $articleToShow->title ?></h1>
    <p><?= $articleToShow->formatPublishDate() ?></p>
    <p><?= $articleToShow->description ?></p>

    <?php // TODO: links to next and previous ?>
    <a href="#">Previous article</a>
    <a href="#">Next article</a>
</section>

<?php
require 'views/component/footer.php'
?>
