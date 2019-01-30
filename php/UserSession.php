<?php

class UserSession{

    public function __construct()
    {
        session_start();
    }

    public function setCurrentUser($user){
        $_SESSION['userSession'] = $user;
    }

    public function getCurrentUser(){
        return $_SESSION['userSession'];
    }

    public function closeSession(){
        session_unset();
        session_destroy();
    }
}