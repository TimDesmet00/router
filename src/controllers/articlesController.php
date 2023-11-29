<?php

namespace App\Controllers;

use App\utils\Database;

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
        $pdo = new Database();
        $pdo->connectDB();

        $rawArticles = $pdo->query('SELECT * FROM articles')->fetchAll();
        // print_r($rawArticles);
        $articles = [];
        foreach ($rawArticles as $rawArticle) 
        {
            // We are converting an article from a "dumb" array to a much more flexible class (Nous convertissons un article d'un tableau "dumb" à une classe beaucoup plus flexible)
            $articles[] = new Article($rawArticle['id'], $rawArticle['title'], $rawArticle['description'], $rawArticle['Publication-date'], $rawArticle['id_author']);
        }

        return $articles;
    }

    public function show()
    {
        // echo 'articlesController show';
        require_once 'views/page/show.php';
    }
}