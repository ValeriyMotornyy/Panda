<?php
// DIC configuration
$container = $app->getContainer();

// Twig View
$container['view'] = function ($c) {
    $settings = $c->get('settings');
    $view = new Slim\Views\Twig(
      $settings['view']['template_path'],
      $settings['view']['twig']
    );

    // Add extensions
    $view->addExtension(new Slim\Views\TwigExtension(
      $c->get('router'),
      $c->get('request'
    )->getUri()));
    $view->addExtension(new Twig_Extension_Debug());

    return $view;
};

// Monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings');
    $logger = new Monolog\Logger($settings['logger']['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler(
      $settings['logger']['path'],
      Monolog\Logger::DEBUG)
    );
    return $logger;
};

// Language
$container['language'] = function ($c) {
    return new App\Loaders\Language;
};

// Controllers
$container[App\Controllers\VideoController::class] = function ($c) {
    return new App\Controllers\VideoController($c->get('view'));
};
$container[App\Controllers\EncoderController::class] = function ($c) {
    return new App\Controllers\EncoderController($c->get('view'));
};
$container[App\Controllers\ProfileController::class] = function ($c) {
    return new App\Controllers\ProfileController($c->get('view'));
};
