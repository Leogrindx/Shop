<?php

class MainController
{
    public $action;
    public $param;
    function __construct($action, $param)
    {
        $this->action = $action;
        $this->param = $param;
        $this->$action();
    }

    public function index()
    {
        unset($_SESSION['login']['gender']);
        require_once 'application/core/View.php';
        $view = new View;
        $view->render($this->action, $this->param);
    }
}
