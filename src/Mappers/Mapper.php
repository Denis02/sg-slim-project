<?php
/**
 * Created by PhpStorm.
 * User: denis
 * Date: 03.04.17
 * Time: 21:44
 */

namespace App\Mappers;


class Mapper
{
    protected $db;

    public function __construct()
    {
        $this->db = new \PDO("mysql:host=localhost;dbname=sg_slim_db;charset=utf8", "root", "123");
    }
}