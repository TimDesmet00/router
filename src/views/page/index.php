<?php require 'views/component/header.php';?>

<?php use App\controller\getArticles; ?>

<section>
    <h1>Articles</h1>
    <ul>
        <?php foreach ($articles as $article) : ?>
            <li><a href="./index.php?page=page-show&id=<?= $article->id ?>"><?= $article->title ?> (Par: <?= $article->author_first_name ?> <?= $article->author_last_name ?> le:<?= $article->formatPublishDate() ?>)</a></li>
        <?php endforeach; ?>
    </ul>
    
</section>

<?php require 'views/component/footer.php';?>