<?php
/**
 * Created by PhpStorm.
 * User: Null
 * Date: 10/30/2018
 * Time: 5:05 PM
 */

class Db
{
    private $connection;

    public function connect()
    {
        require_once 'config.php';
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        return $this->connection;
    }
}