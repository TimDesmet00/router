<?php
require_once '../vendor/autoload.php';
require 'views/component/header.php';
?>

<section>
    <h1><?= $article->title ?></h1>
    <p><?= $article->formatPublishDate() ?></p>
    <p><?= $article->description ?></p>

    <?php // TODO: links to next and previous ?>
    <a href="#">Previous article</a>
    <a href="#">Next article</a>
</section>

<?php
require 'views/component/footer.php'
?>
