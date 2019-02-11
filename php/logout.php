<?php
require_once 'UserSession.php';
require_once 'adminsession.php';
$userss = new UserSession();
$admin = new AdminSession();
$userss->closeSession();
$admin->closeSession();
header("location: http://192.168.1.8/Optica-ijc/");