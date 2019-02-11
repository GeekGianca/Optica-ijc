<?php
class AdminSession{

    public function __construct()
    {
        session_start();
    }

    public function setCurrentUser($user){
        $_SESSION['adminsession'] = $user;
    }

    public function getCurrentUser(){
        return $_SESSION['adminsession'];
    }

    public function closeSession(){
        session_unset();
        session_destroy();
    }
}