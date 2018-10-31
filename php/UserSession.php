<?php
/**
 * Created by PhpStorm.
 * User: Null
 * Date: 10/31/2018
 * Time: 10:35 AM
 */
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