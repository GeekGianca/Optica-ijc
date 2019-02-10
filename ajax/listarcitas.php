<?php
require_once '../php/functions.php';
$database = new Functions();
if (isset($_POST['cedula'])){
    $idusuario = $_POST['cedula'];
    $resultado = $database->getquotes($idusuario);
    $resp = json_encode($resultado);
    echo $resp;
} else {
    $resp = json_encode("Referencia POST invalida");
    echo $resp;
}