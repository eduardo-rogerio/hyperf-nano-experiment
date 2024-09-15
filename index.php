<?php

require 'vendor/autoload.php';

use Hyperf\Nano\Factory\AppFactory;
use Mixd\App\Controllers\HomeController;
use Mixd\App\Providers\ServiceProvider;

$app = AppFactory::create();

ServiceProvider::register($app->getContainer());

$app->get('/', [HomeController::class, 'index']);

$app->run();
