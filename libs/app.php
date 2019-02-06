<?php
require_once '../controllers/error.php';

class App
{
    function __construct()
    {
        //Initialized here
        $url = $_GET['url'];//Recupera el parametro de la pagina index.php
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        $archcontroller = '../controllers/' . $url[0] . '.php';
        if (file_exists($archcontroller)) {
            require_once $archcontroller;
            $controller = new $url[0];
            if (isset($url[1])){
                $controller->{$url[1]}();
            }
        } else {
            $controller = new Error();
        }
    }
}