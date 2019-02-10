<?php
require_once '../php/functions.php';
$database = new Functions();
/**
 * Created by PhpStorm.
 * User: Null
 * Date: 10/30/2018
 * Time: 8:13 PM
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    header("Contet-Type: application/json");
    $response=array();
    $iduser = $_POST['iduser'];
    $name  = strtoupper($_POST['name']);
    $phone = $_POST['phone'];
    $birthdate = $_POST['birthdate'];
    $address = $_POST['address'];
    $eps = $_POST['eps'];
    //Check if exist user
    if ($database->getUser($iduser)){
        $response['message'] = "El usuario identificado con ".$iduser." ya existe, intente agregando un nuevo usuario";
        $response['title'] = "No se puede registrar el Usuario";
        $response['is_login'] = false;
    } else{
        $id_user = $database->saveUser($iduser, $name, $phone, $birthdate, $address, $eps);
        $_SESSION['id_user'] = (int)$id_user;
        $response['message'] = "Se registro exitosamente el usuario";
        $response['title'] = "El usuario se ha registrado exitosamente";
        $response['redirect'] = 'http://192.168.1.7/Optica-ijc/index.php';
        $response['is_login'] = true;
    }
    echo json_encode($response);
} else {
    echo json_encode("El metodo obtenido no es igual al recibido");
}
