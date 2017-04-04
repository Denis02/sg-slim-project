<?php
/**
 * Created by PhpStorm.
 * User: denis
 * Date: 02.04.17
 * Time: 19:09
 */

namespace App\Controllers;


use App\Mappers\UserMapper;

class HomeController
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function index($request, $response){
        $data = ['title' => 'My Application'];

        $response = $this->container->renderer->render($response, "/index.tpl.php", $data);
        return $response;
    }

    public function users($request, $response)
    {
        $mapper = new UserMapper();
        $items = $mapper->all();
        $response = $response->withJson($items);
        return $response;
    }
}