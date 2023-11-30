<?php require 'views/component/header.php'; ?>

<?php use App\controller\getArticles; ?>

<section>
    <h1>Auteur</h1>
    <ul>
    <?php foreach ($uniqueAuthors as $article) : ?>
        <li><p><a href="#"><?= $article->author_first_name ?> <?= $article->author_last_name ?></a></p></li>
    <?php endforeach; ?>
    </ul>

</section>

<?php require 'views/component/footer.php'?>