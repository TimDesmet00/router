<?php

namespace App\Controllers;

use App\utils\Database;
use App\models\Article;

class articlesController
{
    
    public function index()
    {
        // echo 'articlesController index';
        $articles = $this->getArticles();

        $uniqueAuthors = [];

        foreach ($articles as $article) {
            if (!array_key_exists($article->id_author, $uniqueAuthors)) {
                $uniqueAuthors[$article->id_author] = $article;
            }
        }

        $this->handleFormSubmission();

        $data = compact('uniqueAuthors');
        require_once 'views/page/index.php';
    }

    public function getArticles()
    {
        
        $db = new Database();
        $db->connectDB();

        // $sql = 'SELECT * FROM articles';
        $sql = 'SELECT articles.*, author.first_name, author.last_name FROM articles INNER JOIN author ON articles.id_author = author.id';
        // $rawArticles = $pdo->query($sql)->fetchAll();
        $rawArticles = $db->query($sql)->fetchAll(\PDO::FETCH_ASSOC);

        // print_r($rawArticles);
        $articles = [];
        foreach ($rawArticles as $rawArticle) 
        {
            // We are converting an article from a "dumb" array to a much more flexible class (Nous convertissons un article d'un tableau "dumb" à une classe beaucoup plus flexible)
            $article = new Article($rawArticle['id'], $rawArticle['title'], $rawArticle['description'], $rawArticle['publication_date'], $rawArticle['id_author'], $rawArticle['img']);
            $article->author_first_name = $rawArticle['first_name'];
            $article->author_last_name = $rawArticle['last_name'];
            $articles[] = $article;
        }

        return $articles;
    }

    public function show($id)
    {
        $articles = $this->getArticles();
        $articleToShow = null;
        $previousArticle = null;
        $nextArticle = null;

        foreach ($articles as $index => $article) 
        {
            if ($article->id == $id) 
            {
                $articleToShow = $article;

                if ($index != 0) {
                    $previousArticle = $articles[$index - 1];
                }
    
                if ($index != count($articles) - 1) {
                    $nextArticle = $articles[$index + 1];
                }
                break;
            }
        }
        require_once 'views/page/show.php';
    }

    public function author()
    {
        $articles = $this->getArticles();

        $uniqueAuthors = [];

    foreach ($articles as $article) {
        if (!array_key_exists($article->id_author, $uniqueAuthors)) {
            $uniqueAuthors[$article->id_author] = $article;
        }
    }
        $data = compact('uniqueAuthors');
        require_once 'views/page/author.php';   
    }

    public function showAuthor($id)
    {
        $articles = $this->getArticles();
        
        $articlesByAuthors = [];

    foreach ($articles as $article) 
    {
        if ($article->id_author == $id) 
        {
            $articlesByAuthors[] = $article;
        }
    }

        require_once 'views/page/showAuthor.php';
    }

    public function handleFormSubmission()
    {
        // var_dump($_POST);
        var_dump('handleFormSubmission called');
        if(array_key_exists('submit', $_POST)) {
            var_dump('submit key exists');
            $result = $this->validateAndSanitize($_POST);
            var_dump($result);
            if($result) 
            {
                list($title, $description, $id_author) = $result;
                var_dump($title, $description, $id_author);
                if($title !== '' && $description !== '' && $id_author !== '') 
                {
                    $this->addArticle($title, $description, $id_author);
                    var_dump('addArticle called');
                } else {
                    echo 'Veuillez remplir tous les champs correctement';
                }
            }    
        }
    }

    public function validateAndSanitize($_post)
    {
        var_dump('validateAndSanitize called');
        if (isset($_POST['title']) and !empty($_POST['title']) and strlen($_POST['title']) >= 3 and strlen($_POST['title']) <= 46) 
        {
            $title = htmlspecialchars($_POST['title']);
        } else {
            $title = null;
        }

        if (isset($_POST['description']) and !empty($_POST['description']) and strlen($_POST['description']) >= 3 and strlen($_POST['description']) <= 5000) 
        {
            $description = htmlspecialchars($_POST['description']);
        } else {
            $description = null;
        }

        if (isset($_POST['id_author']) and !empty($_POST['id_author']) and is_numeric($_POST['id_author']) and $_POST['id_author'] >= 0 and $_POST['id_author'] <= 255) 
        {
            $id_author = intval(htmlspecialchars($_POST['id_author']));
        } else {
            $id_author = null;
        }
        // var_dump($title, $description, $id_author);
        if ($title != null and $description != null and $id_author != null) 
        {
            // $this->addArticle($title, $description, $id_author);
            return [$title, $description, $id_author];
            var_dump($title, $description, $id_author);
        } else {
            echo 'Veuillez remplir tous les champs correctement';
            return false;
        }
        
    }

    public function addArticle($title, $description, $id_author)
    {
        var_dump('addArticle called');
        $db = new Database();
        $db->connectDB();

        $description = addslashes($description);

        $sql = 'INSERT INTO articles (title, description, publication_date, id_author) VALUES (:title, :description, now(), :id_author)';
        $stmt = $db->prepare($sql);

        $result = $stmt->execute([':title' => $title, ':description' => $description, ':id_author' => $id_author]);
        
        if ($result) {
            return 'Article ajouté avec succès';
        } else {
            return 'Erreur lors de l\'ajout de l\'article';
        }
        // header('Location: ./index.php?page=page-index');
    }
}

