<?php

class ItemController
{
    public $action;
    public $param;
    public $mysqli;
    function __construct($action, $param)
    {
        $this->action = $action;
        $this->param = $param;
        $this->$action();
    }


    public function home()
    {
        require_once 'application/core/View.php';
        $param = require_once 'application/config/kategories_items_' . $this->param['gender'] . '.php';
        $view = new View;
        $view->render('home', $param);
    }

    public function items()
    {
        require_once 'application/models/Items.php';
        require_once 'application/core/View.php';
        $items = new Items($this->param);
        $param = $items->query();
        $view = new View;
        $view->render('itemsView', $param);
    }

    public function items_ajax()
    {
        sleep(1);
        require_once 'application/models/Items.php';
        require_once 'application/core/View.php';
        $items = new Items($this->param);
        $param = $items->query();
        $view = new View;
        $view->render('render_items', $param);
    }

    public function details()
    {
        if (isset($this->param['c']) || isset($this->param['s'])) {
            require_once 'application/models/Item_Details.php';
            require_once 'application/core/View.php';
            $det = new Item_Details($this->param);
            $param = $det->return();
            $view = new View;
            $view->render('item_detailsView', $param);
        }
    }
}
