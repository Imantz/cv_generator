<?php
ini_set('display_errors', true);
include __DIR__ . '/vendor/autoload.php';

use Core\Database;

(new Database(
    config('database.host'),
    config('database.username'),
    config('database.password'),
    config('database.database')
));

createTableForImages();
createUsersCvTable();
createEducationTable();
createLanguagesTable();

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $router) {
    $namespace = "\\App\\Controllers\\";

    $router->get('/', $namespace . 'CvGeneratorController@create');
    $router->post('/', $namespace . 'CvGeneratorController@store');
    $router->get('/{id}', $namespace . 'DownloadController@download');


});

// Fetch method and URI from somewhere
$httpMethod = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        return view("/");
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        [$controller, $method] = explode('@', $handler);
        (new $controller)->$method($vars);
        break;
}
?>






