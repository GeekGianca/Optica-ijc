<?php
require_once 'functions.php';
class AdminController{
    private $funciones;
    public function __construct()
    {
        $this->funciones = new Functions();
    }

    public function gettotalquotes(){
        return $this->funciones->getquotesquantity();
    }
}