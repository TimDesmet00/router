<?php

namespace App\Controllers;

class homeController
{
    public function index()
    {
        // echo 'homeController index';
        require_once 'views/home.php';
    }
}