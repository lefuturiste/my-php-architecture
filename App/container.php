<?php
// Get container
$container = $app->getContainer();

$container['config'] = function ($container) {
  return \App\Config::get();
};

$container['view'] = function ($container) {

    $dir = dirname(__DIR__);

    $view = new \Slim\Views\Twig($dir . '/App/views', $container->config['twig']);

    $view->addExtension(new Twig_Extension_Debug());
    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};

$container['db'] = function ($container) {
    $db = new \Simplon\Mysql\Mysql(
        $container->config['db']['host'],
        $container->config['db']['user'],
        $container->config['db']['password'],
        $container->config['db']['name']
    );
    return $db;
};

/*$container['notFoundHandler'] = function ($container) {
    return function ($request, $response) use ($container) {
        return $container->view->render($response, 'errors/404.twig');
    };
};*/