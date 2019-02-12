<?php
require_once '../php/functions.php';
require_once '../php/UserSession.php';
$database = new Functions();
$userss = new UserSession();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header("Contet-Type: application/json");
    $response = array();
    $username = $_POST['usercommon'];
    $pass = $_POST['passcommon'];
    $user = $database->loginuser($username, $pass);
    if ($user) {
        $response = $user;
        $response['redirect'] = "http://192.168.1.10/Optica-ijc/";
        $userss->setCurrentUser($user);
    } else {
        $response = $user;
        $response['message'] = 'El usuario no se encuentra registrado.';
        $response['exist'] = false;
    }
    echo json_encode($response);
}
