<?php
require_once '../php/functions.php';
$database = new Functions();
if (isset($_POST['cedula'])){
    $cedula = $_POST['cedula'];
    $result = $database->getchistories($cedula);
    $resp = json_encode($result);
    echo $resp;
} else {
    $respon = json_encode("Referencia POST no valida");
    echo $respon;
}