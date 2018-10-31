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
    //protected static $conn;
    /*private function __construct()
    {
        $arrOptions = array(
            PDO::ATTR_EMULATE_PREPARES => FALSE,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
        );
        try{
            self::$conn = new PDO(
                'mysql:charset=utf8mb4;host=localhost;port3306;dbname=opticadatabase',
                'root',
                'geekprogramador23',
                $arrOptions);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$conn->setAttribute(PDO::ATTR_PERSISTENT, false);
        }catch (PDOException $e){
            echo "Failed to connected to database.". $e->getMessage();
            exit;
        }

    }*/

    public static function getConnection(){
        if (!self::$conn){
            new Db();
        }
        return self::$conn;
    }
}