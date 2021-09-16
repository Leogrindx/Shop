<?php

class CartController
{
    public $action;
    public $param;
    function __construct($action, $param)
    {
        $this->action = $action;
        $this->param = $param;
        $this->$action();
    }


    public function add_item_to_cart()
    {
        if (isset($_SESSION['login'])) {
            require_once 'application/models/Cart.php';
            $cart = new Cart();
            $cart->add();
        }else{
            jquery_alert('Zaloguj się', ' ', 'warning');
        }
        
    }

    public function delete_item_to_cart()
    {
        require_once 'application/models/Cart.php';
        $cart = new Cart();
        $cart->delete();
    }

    public function view_item_to_cart()
    {
        if (!isset($_SESSION['login'])) {
            die(header('Location: /'));
        }
        require_once 'application/core/View.php';
        require_once 'application/models/Cart.php';
        $cart = new Cart();
        $param = $cart->view();
        $view = new View;
        $view->render('cartView', $param);
    }

    public function upgrade_number_item_cart()
    {
        sleep(1);
        require_once 'application/models/Cart.php';
        $cart = new Cart();
        $cart->upgrade_number_item_cart();
    }
}
