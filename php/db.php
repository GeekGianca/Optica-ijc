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
<<<<<<< HEAD

    public static function getConnection(){
        if (!self::$conn){
            new Db();
        }
        return self::$conn;
    }
=======
>>>>>>> 0243e409f70836c563d51b0221d65c7055d89c18
}