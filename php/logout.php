<?php
require_once 'UserSession.php';
require_once 'adminsession.php';
$userss = new UserSession();
$admin = new AdminSession();
$userss->closeSession();
$admin->closeSession();
header("location: ".constant('URL')."/Optica-ijc/");