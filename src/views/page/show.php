<?php require 'views/component/header.php'; ?>

<?php use App\controller\getArticles; ?> 

<p><a href="./index.php?page=home">Home</a></p>

<section>
    <h1><?= $articleToShow->title ?></h1>
    <p>Par: <a href="./index.php?page=page-showAuthor&id=<?= $article->id_author ?>"><?= $articleToShow->author_first_name ?> <?= $articleToShow->author_last_name ?></a></p>
    <p><?= $articleToShow->formatPublishDate() ?></p>
    <p><?= $articleToShow->description ?></p>

    <?php // TODO: links to next and previous ?>
    <?php if ($previousArticle != null): ?>
        <a href="./index.php?page=page-show&id=<?= $previousArticle->id ?>">Article précédent</a>
    <?php endif; ?>

    <?php if ($nextArticle != null): ?>
        <a href="./index.php?page=page-show&id=<?= $nextArticle->id ?>">Article suivant</a>
    <?php endif; ?>
    <div>
        <img src="/BeCode/router/img/<?= $articleToShow->img ?>" alt="">
    </div>
</section>

<?php
require 'views/component/footer.php'
?>
