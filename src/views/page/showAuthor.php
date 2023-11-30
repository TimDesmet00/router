<?php require 'views/component/header.php'; ?>

<?php use App\controller\getArticles; ?>

<p><a href="./index.php?page=home">Home</a></p>

<section>
    <?Php $author = $articlesByAuthors[0]; ?>
    <h1><?= $author->author_first_name ?> <?= $author->author_last_name ?></h1>
    <ul>
    <?php foreach ($articlesByAuthors as $article) : ?>
        <li><p><a href="./index.php?page=page-show&id=<?= $article->id ?>"><?= $article->title ?></a></p></li>
    <?php endforeach; ?>
    </ul>



<?php require 'views/component/footer.php'?>