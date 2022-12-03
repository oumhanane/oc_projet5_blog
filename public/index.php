<?php  

use App\Controller\HomeController;
use App\Controller\PostController;
use App\Controller\UserController;

require_once __DIR__ . DIRECTORY_SEPARATOR. '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

// $pathInfo = $_SERVER['PATH_INFO'];
$uri = $_SERVER['REQUEST_URI'];
// var_dump($_SERVER).
// die();

/**
 * route => /nomRoute?action=nomAction&id=entityId
 * 
 * nomRoute =>determine le controller à instancier
 * action => détermine l'action du controller à exécuter
 * id => détermine l'entité sur laquelle l'action doit être exécutée
 * 
 * Exemple : 
 * 1. /posts?action=list        ['action' => 'list']
 * 2. /posts?action=show&id=1   ['action' => 'show', 'id' => 1]
 * 3. /posts?action=create      ['action' => 'create']
 * 4. /posts?action=edit&id1    ['action' => 'edit', 'id' => 1]
 * 5. /posts?action=delete&id=1 ['action' => 'delete', 'id' => 1 ]
 */

// Gestion des routes
switch ($uri) {
    case '/posts':
        $controller = new PostController();
        break;

    case '/users':
        $controller = new UserController();
        break;

    default:
        $controller = new HomeController();
        break;
}

// Gestion action à exécuter
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'index';
}

$action = $action . 'Action';
//var_dump($controller, $action);
//die();
if (method_exists($controller, $action)) {
    echo $controller->$action();
} else {
    // to do : lancer une exception
}