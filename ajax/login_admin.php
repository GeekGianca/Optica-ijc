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
<<<<<<< HEAD
        $response['redirect'] = "http://192.168.1.10/Optica-ijc/admin.php";
        setcookie('admin', $user);
        session_start();
        $_SESSION['adminsession'] = $user;
=======
        $response['redirect'] = "https://optica-ijc.herokuapp.com/Optica-ijc/admin.php";
>>>>>>> 0243e409f70836c563d51b0221d65c7055d89c18
    } else {
        $response['message'] = 'El usuario no tiene permisos de administrador, o no esta registrado';
        $response['exist'] = false;
    }
    echo json_encode($response);
}
