<?php
require_once '../vendor/autoload.php';
require_once 'controllers/homeController.php';
require_once 'controllers/articles.controller.php';

use Controllers\homeController;
use Controllers\articlesController;


$homeController = new homeController();
$homeController->index();

$articlesController = new articlesController();
$articlesController->index();