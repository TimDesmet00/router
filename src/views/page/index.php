<?php require 'views/component/header.php';?>

<?php use App\controller\getArticles; ?>

<section>
    <h1>Articles</h1>
    <ul>
        <?php foreach ($articles as $article) : ?>
            <li><?= $article->title ?> (<?= $article->formatPublishDate() ?>)</li>
        <?php endforeach; ?>
    </ul>
</section>

<?php require 'views/component/footer.php';?>