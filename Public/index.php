<?php
    define('BASE_PATH', realpath(__DIR__ . '/..'));
    require BASE_PATH . '/helpers.php';

    require basePath('router.php');
    $routes = new Router();
    require basePath('routes.php');

    $uri = $_SERVER['REQUEST_URI']; // uniform resource identifier
    $method = $_SERVER['REQUEST_METHOD'];

    $routes->route($uri, $method);
?>