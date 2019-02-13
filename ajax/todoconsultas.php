<?php
require_once '../php/functions.php';
$database = new Functions();
$response = $database->getallconsultation();
echo json_encode($response);