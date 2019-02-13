<?php
require_once '../php/functions.php';
$database = new Functions();
if (isset($_POST['codigo'])){
    $codigo = $_POST['codigo'];
    $objresult = $database->updatequotesaccept($codigo);
    if ($objresult){
        $result = json_encode($objresult);
        echo $result;
    } else {
        echo "No se pudo cancelar la cita!";
    }
} else {
    echo "No hay una cabecera especifica para el parametro.";
}