<?php
require_once '../vendor/autoload.php';
require_once 'views/component/header.php';

use App\controllers\articlesController;

$articlesController = new articlesController();
$articlesController->index();


require_once 'views/component/footer.php'
?>
