<?php require 'views/component/header.php'; ?>

<?php use App\controller\getArticles; ?>

<section>
    <?Php $author = $articlesByAuthors[0]; ?>
    <h1><?= $author->author_first_name ?> <?= $author->author_last_name ?></h1>
    <ul>
    <?php foreach ($articlesByAuthors as $article) : ?>
        <li><p><a href="#"><?= $article->title ?></a></p></li>
    <?php endforeach; ?>
    </ul>



<?php require 'views/component/footer.php'?>