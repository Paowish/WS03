<?php
    // // Return a simple routes map expected by `router.php`.
    // return [
    //     '/' => 'Controllers/home.php',
    //     '/listings' => 'Listings/index.php',
    //     '/listings/create' => 'Listings/create.php',
    //     '404' => 'Error/404.php',
    // ];

    $routes->get('/', 'Controllers/home.php');
    $routes->get('/listings', 'Listings/index.php');
    $routes->get('/listings/create', 'Listings/create.php');