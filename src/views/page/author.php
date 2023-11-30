<?php require 'views/component/header.php'; ?>

<?php use App\controller\getArticles; ?>

<p><a href="./index.php?page=home">Home</a></p>

<section>
    <h1>Auteur</h1>
    <ul>
    <?php foreach ($uniqueAuthors as $article) : ?>
        <li><p><a href="./index.php?page=page-showAuthor&id=<?= $article->id_author ?>"><?= $article->author_first_name ?> <?= $article->author_last_name ?></a></p></li>
    <?php endforeach; ?>
    </ul>

</section>

<?php require 'views/component/footer.php'?>