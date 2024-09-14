<?php

require 'vendor/autoload.php';

use Hyperf\Nano\Factory\AppFactory;
use App\Controllers\HomeController;

$app = AppFactory::create();

// Definindo a rota '/' para ser tratada pelo método index do HomeController
$app->get('/', [HomeController::class, 'index']);

// Iniciando o servidor HTTP
$app->run();
