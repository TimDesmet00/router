<?php
declare(strict_types=1);

require_once '../vendor/autoload.php';

// use App\views\component\header;
require_once 'views/component/header.php';

use App\controllers\homeController;
// use App\controllers\articlesController;

// $headerView = new headerView();
// $headerView->index();


$homeController = new homeController();
$homeController->index();

// $articlesController = new articlesController();
// $articlesController->index();

require_once 'views/component/footer.php';

$page = $_GET['page'] ?? null;

// Load the controller (Charger le contrôleur)
// It will *control* the rest of the work to load the page (Il *contrôlera* le reste du travail pour charger la page)
switch ($page) {
    case 'articles':
    case 'articles-index':
        // This is shorthand for: (Ceci est un raccourci pour:)
        // $articleController = new ArticleController; (nouveau ArticleController;)
        // $articleController->index(); 
        (new ArticleController())->index();
        break;
    case 'articles-show':
        // TODO: detail page 
    case 'home':
    default:
        (new HomepageController())->index();
        break;
}