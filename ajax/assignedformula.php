<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['idusuario'])) {
    header("Contet-Type: application/json");
    $response = array();
    $iduser = $_POST['idusuario'];

}