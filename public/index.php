<?php
/*
* Application's router
* Using php7, Slim3
*
* @author lefuturiste <contact@lefuturiste.fr>
* @version 1.0
*
**/
require '../vendor/autoload.php';

$config = \App\Config::get();

$app = new \Slim\App([
    'settings' => $config['slim3']
]);

require '../App/container.php';

$app->get('/', App\Controllers\PagesController::class . ':home')->setName('home');

$app->run();