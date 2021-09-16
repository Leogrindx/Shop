<?php 

class Model {
    public function __construct($action){
        $this->$action();
    }

    function register(){
        require_once 'application/models/register.php';
    }

    function login(){
        require_once 'application/models/login.php';
    }

    function mail(){
        require_once 'application/models/mail.php';
    }

}

?>