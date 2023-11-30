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

        $sql = 'SELECT * FROM articles';
        // $rawArticles = $pdo->query($sql)->fetchAll();
        $rawArticles = $db->query($sql)->fetchAll(\PDO::FETCH_ASSOC);

        // print_r($rawArticles);
        $articles = [];
        foreach ($rawArticles as $rawArticle) 
        {
            // We are converting an article from a "dumb" array to a much more flexible class (Nous convertissons un article d'un tableau "dumb" à une classe beaucoup plus flexible)
            $articles[] = new Article($rawArticle['id'], $rawArticle['title'], $rawArticle['description'], $rawArticle['Publication-date'], $rawArticle['id_author']);
        }

        return $articles;
    }

    public function show($id)
    {
        $articles = $this->getArticles();
        // echo 'articlesController show';
        $articleToShow = null;
        foreach ($articles as $article) 
        {
            if ($article->id == $id) 
            {
                $articleToShow = $article;
                break;
            }
        }
        require_once 'views/page/show.php';
    }
}