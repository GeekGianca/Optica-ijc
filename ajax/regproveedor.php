<?php
require_once '../php/functions.php';
require_once '../php/adminsession.php';
session_start();
$usrsess = new AdminSession();
$database = new Functions();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header("Contet-Type: application/json");
    $response = array();

    $nit = $_POST['nitprov'];
    $nomprov = $_POST['nombprov'];
    $telef = $_POST['telprov'];
    $contact = $_POST['contactoprov'];
    $ciudad = $_POST['ciudadprov'];

    if ($database->regprovider($nit, $nomprov, $telef, $contact, $ciudad)) {
        echo json_encode("Proveedor registrado exitosamente.");
    } else {
        echo json_encode("Fallo al registrar");
    }
}
echo json_encode($response);
