<?php
require_once '../php/functions.php';
$database = new Functions();
$response = $database->getallquotes();
echo json_encode($response);