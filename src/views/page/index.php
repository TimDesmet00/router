<?php require 'views/component/header.php';?>

<?php use App\controller\getArticles; ?>

<section>
    <p><a href="./index.php?page=home">Home</a></p>
    <h1>Articles</h1>
    <ul>
        <?php foreach ($articles as $article) : ?>
            <li><a href="./index.php?page=page-show&id=<?= $article->id ?>"><?= $article->title ?> (Par: <?= $article->author_first_name ?> <?= $article->author_last_name ?> le:<?= $article->formatPublishDate() ?>)</a></li>
        <?php endforeach; ?>
    </ul>

    <h2>Ajouter un nouvelle article</h2>

    <form action="" method="post">
        <div>
            <label for="title">Titre: </label>
            <input type="text" name="title" id="title" minlength="3" maxlength="46" require>
        </div>
        <div>
            <label for="description">Article: </label>
            <textarea name="description" id="description" cols="150" rows="20" minlength="3" maxlength="1000" require></textarea>
        </div>
        <div>
            <label for="id_author">Identifiant de l'auteur: </label>
            <input type="number" name="id_author" id="id_author" min="0" max="255" require>
        </div>
        <div>
            <input type="submit" value="Ajouter">
        </div>
    </form>
    
</section>

<?php require 'views/component/footer.php';?>