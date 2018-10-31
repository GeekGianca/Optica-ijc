<?php
require_once '../php/functions.php';
$database = new Functions();
/**
 * Created by PhpStorm.
 * User: Null
 * Date: 10/31/2018
 * Time: 7:18 AM
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header("Contet-Type: application/json");
    $response = array();
    $iduser = $_POST['iduser'];
    $dateappmt = $_POST['date'];
    $timeappmt = $_POST['time'];
    if ($database->getUser($iduser)){
        $result = $database->requestAppointment($iduser, $dateappmt, $timeappmt);
        if ($result){
            $response['message'] = "Se ha realizado el proceso correctamente, la solicitud esta en espera";
            $response['title'] = "Solicitud realizada";
            $response['schedule_complete'] = true;
        }else{
            $response['message'] = "Ha ocurrido un error inesperado";
            $response['title'] = "No se puede solicitar";
            $response['schedule_complete'] = false;
        }
    } else {
        $response['message'] = "El usuario identificado con ".$iduser." no existe, intente registrando el usuario y realizando nuevamente el proceso";
        $response['title'] = "No se puede solicitar";
        $response['schedule_complete'] = false;
    }
    echo json_encode($response);
} else {
    echo json_encode("Las cabeceras de la peticion son incorrectas");
    exit("Las cabeceras de la peticion son incorrectas");
}