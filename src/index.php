<?php
declare(strict_types=1);

require_once '../vendor/autoload.php';

use App\controllers\homeController;
use App\controllers\articlesController;

$homeController = new homeController();
$articlesController = new articlesController();

$page = $_GET['page'] ?? null;

// Load the controller (Charger le contrôleur)
// It will *control* the rest of the work to load the page (Il *contrôlera* le reste du travail pour charger la page)
switch ($page) {
    case 'page':
        // This is shorthand for: (Ceci est un raccourci pour:)
        // $articleController = new ArticleController; (nouveau ArticleController;)
        // $articleController->index(); 
        (new ArticlesController())->index();
        break;
    case 'page-show':
        // TODO: detail page 
        $id = $_GET['id'] ?? null;
        if ($id !== null) {
            (new ArticlesController())->show($id);
        } 
        break;
    case 'page-author':
        (new ArticlesController())->author();
        break;
    case 'page-showAuthor':
        $id = $_GET['id'] ?? null;
        if ($id !== null) {
            (new ArticlesController())->showAuthor($id);
        } 
        break;
    case 'home':
    default:
        (new HomeController())->index();
        break;
}