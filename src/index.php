<?php
declare(strict_types=1);

require_once '../vendor/autoload.php';

// require_once 'views/component/header.php';

use App\controllers\homeController;

$homeController = new homeController();
$homeController->index();

$page = $_GET['page'] ?? null;

// Load the controller (Charger le contrôleur)
// It will *control* the rest of the work to load the page (Il *contrôlera* le reste du travail pour charger la page)
switch ($page) {
    case 'page':
    case 'page-index':
        // This is shorthand for: (Ceci est un raccourci pour:)
        // $articleController = new ArticleController; (nouveau ArticleController;)
        // $articleController->index(); 
        (new ArticleController())->index();
        break;
    case 'page-articles':
        // TODO: detail page 
    case 'home':
    default:
        (new HomeController())->index();
        break;
}