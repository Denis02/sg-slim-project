<?php

use Slim\Views\PhpRenderer;

require '../vendor/autoload.php';

$app = new \Slim\App;
$container = $app->getContainer();
$container['renderer'] = new PhpRenderer("../app/views");

$app->get('/', 'App\Controllers\HomeController:index');
$app->get('/users', 'App\Controllers\HomeController:users');

$app->group('/cabinet', function () {
    $this->get('', 'App\Controllers\CabinetController:index');
    $this->get('/get', 'App\Controllers\CabinetController:getUser');
    $this->post('', 'App\Controllers\CabinetController:store');
    $this->put('/{id}', 'App\Controllers\CabinetController:update');
    $this->delete('/{id}', 'App\Controllers\CabinetController:destroy');
});

$app->run();