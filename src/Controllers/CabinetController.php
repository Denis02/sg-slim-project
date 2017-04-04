<?php
/**
 * Created by PhpStorm.
 * User: denis
 * Date: 02.04.17
 * Time: 21:21
 */

namespace App\Controllers;

use App\Models\User;
use App\Mappers\UserMapper;

class CabinetController
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function index($request, $response, $args)
    {
        $mapper = new UserMapper();
//        $item = $mapper->get($args['id']);
//        $response = $response->withJson($item);
        $data = $mapper->get(3);
        $response = $this->container->renderer->render($response, "/cabinet.tpl.php", $data);

        return $response;
    }

    public function getUser($request, $response, $args){
        $mapper = new UserMapper();
        $item = $mapper->get(3);
        $response = $response->withJson($item);
        return $response;
    }

    public function store($request, $response)
    {
        $data = $request->getParsedBody();
        $item = new User($data);
        $mapper = new UserMapper();
        $item_id = $mapper->save($item);

        return $response;
    }

    public function update($request, $response, $args)
    {
        $data = $request->getParsedBody();
        $mapper = new UserMapper();
        $data['id'] = $args['id'];
        $item = new User($data);
        $item_id = $mapper->save($item);

        return $response;
    }

    public function destroy($request, $response, $args)
    {
        $mapper = new UserMapper();
        $result = $mapper->delete($args['id']);

        if ($result) {
            $response = $response->withStatus(204);
        }

        return $response;
    }

}