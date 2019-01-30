<?php
require_once 'UserSession.php';
$userss = new UserSession();
$userss->closeSession();
header("location: http://192.168.1.7/Optica-ijc/");