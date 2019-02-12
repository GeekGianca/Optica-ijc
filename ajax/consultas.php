<?php
require_once '../php/functions.php';
$database = new Functions();
if (isset($_POST['cedula']) && isset($_POST['fecha']) && isset($_POST['hora']) && isset($_POST['razon']) && isset($_POST['sintomas'])){
    $cedula = $_POST['cedula'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $razon = $_POST['razon'];
    $sintomas = $_POST['sintomas'];
    $tipocons = $_POST['tipocons'];
    //$result = $database->insertconsultation($cedula, $fecha, $hora, $razon, $sintomas, $tipocons);
    $result = $database->insertconsultation("1069492640", "2019-02-21", "01:20", "Nueva razon", "Nuevo sintoma", "Especializada");
    if ($result){
        echo true;
    } else {
        echo false;
    }
}