<?php
require_once '../php/functions.php';
$database = new Functions();
/**
 * Created by PhpStorm.
 * User: Null
 * Date: 10/31/2018
 * Time: 9:42 AM
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header("Contet-Type: application/json");
    $response = array();
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $user = $database->checkUser($username, $pass);
    if ($user){
        $response = $user;
        $response['redirect'] = "http://localhost/proyecto-optica/admin.php";
    } else {
        $response['message'] = 'El usuario no tiene permisos de administrador, o no esta registrado';
        $response['exist'] = false;
    }
    echo json_encode($response);
}