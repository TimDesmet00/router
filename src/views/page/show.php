<?php require 'views/component/header.php'; ?>

<?php use App\controller\getArticles; ?> 

<section>
    <h1><?= $articleToShow->title ?></h1>
    <p>Par: <?= $articleToShow->author_first_name ?> <?= $articleToShow->author_last_name ?></p>
    <p><?= $articleToShow->formatPublishDate() ?></p>
    <p><?= $articleToShow->description ?></p>

    <?php // TODO: links to next and previous ?>
    <?php if ($previousArticle != null): ?>
        <a href="./index.php?page=page-show&id=<?= $previousArticle->id ?>">Article précédent</a>
    <?php endif; ?>

    <?php if ($nextArticle != null): ?>
        <a href="./index.php?page=page-show&id=<?= $nextArticle->id ?>">Article suivant</a>
    <?php endif; ?>
</section>

<?php
require 'views/component/footer.php'
?>
