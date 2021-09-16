<?php


class AccountController
{
    public $action;
    public $param;
    function __construct($action, $param)
    {
        $this->action = $action;
        $this->param = $param;
        $this->$action();
    }

    public function register()
    {
        require_once 'application/core/View.php';
        $view = new View;
        $view->render($this->action . 'View', $this->param);
    }

    public function register_ajax()
    {
        require_once 'application/models/Register.php';
        if (isset($_SESSION['first_name'])) {
            die(header('Location: /'));
        }
        if (isset($_POST['doGO_register'])) {
            $reg = new Register;
            $reg->search_email();
        } elseif (isset($_POST['doGO_check'])) {
            $reg = new Register;
            $reg->audit_email();
        }
    }

    public function login()
    {
        if (isset($_SESSION['login'])) {
            header('Location: /');
        } else {
            require_once 'application/core/View.php';
            $view = new View;
            $view->render($this->action . 'View', $this->param);
        }
    }

    public function login_ajax()
    {
        //MODEL
        require_once 'application/models/Login.php';
        $reg = new Login;

    }


    public function out()
    {
        unset($_SESSION['login']);
        header_remove();
        header('Location: /');
    }

    public function check_mail()
    {
        require_once 'application/core/View.php';
        $view = new View;
        $view->render($this->action, $this->param);
    }

    public function forgot_password()
    {
        require_once 'application/core/View.php';
        $view = new View;
        $view->render($this->action . 'View', $this->param);
    }
    public function forgot_password_edit()
    {
        require_once 'application/models/Forgot_password_editModel.php';
        $fpe = new Forgot_Password_Edit;
    }
    public function edit_password()
    {
        require_once 'application/core/View.php';
        $view = new View;
        $view->render($this->action . 'View', $this->param);
    }

    public function edit_password_ajax()
    {
        require_once 'application/models/Edit_password_ajax.php';
        $epa = new Edit_Password_Ajax;
    }
}
