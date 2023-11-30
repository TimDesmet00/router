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
            $article = new Article($rawArticle['id'], $rawArticle['title'], $rawArticle['description'], $rawArticle['Publication-date'], $rawArticle['id_author'], $rawArticle['img']);
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
}