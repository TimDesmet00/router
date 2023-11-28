<?php

namespace App\Controllers;

use App\utils\pdo;

class articlesController
{
    public function index()
    {
        // echo 'articlesController index';
        require_once 'views/page/index.php';
    }

    public function getArticles()
    {
        $pdo = new pdo();
    }
}