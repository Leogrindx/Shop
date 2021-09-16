<?php 

class AdminController{
    private $action;
    private $param;
    private $mysqli;
    function __construct($action, $param){
        $this->action = $action;
        $this->param = $param;
        if($action === "login"){
            $this->$action();
        }else{
            if(isset($_SESSION['admin'])){
                $this->$action();
            }else{
                require_once 'application/core/View.php';
                $view = new View;
                $view->render('admin/login_adminView', $this->param);
            }
        }
    }
        

    public function admin_panel(){
        require_once 'application/core/View.php';
        $view = new View;
        $view->render('admin/admin_panel', $this->param);
    }
    
    public function login(){
        if(isset($_SESSION['admin'])){
            header('Location: /admin_panel');
        }else{
            require_once 'application/models/admin/Login_admin.php';
            $login = new Login_Admin; 
        }
    }

    public function out_admin_panel()
    {
        unset($_SESSION['admin']);
        header('Location: /');
    }

    public function add_item_home(){
        require_once 'application/core/View.php';
        $view = new View;
        $view->render('admin/add_item_homeView', $this->param);
    }

    public function view_panel_add(){
        require_once 'application/core/View.php';

        $type_man = require_once 'application/config/kategories_items_man.php';
        $type_woman = require_once 'application/config/kategories_items_woman.php';
        $brand = require_once 'application/config/brands.php';
        $material = require_once 'application/config/materials.php';
        $color = require_once 'application/config/color.php';
        $type['type_text'] = explode(',',$type_man[$this->param['type']] . ',' . $type_woman[$this->param['type']]);
        $type['type_value'] = explode(',',$type_man['value_' . $this->param['type']] . ',' . $type_woman['value_' . $this->param['type']]);
        foreach ($type['type_text'] as $key => $value) {
            if(isset($res)){
                if(array_search($value, $res['type_text']) == false){
                    $res['type_text'][$key] = $value;
                    $res['type_value'][$key] = $type['type_value'][$key];
                }
            }else{
                $res['type_text'][$key] = $value;
                $res['type_value'][$key] = $type['type_value'][$key];
            }          
        }
        $param['type']['type_text'] = $res['type_text'];
        $param['type']['type_value'] = $res['type_value'];
        $param['size'] = require_once 'application/config/size_' . $this->param['type'] . '.php';
        $param['brand'] = explode(',',$brand['brands']);
        $param['color']['color_text'] = explode(',', $color['color_text']);
        $param['color']['color_val'] = explode(',', $color['color_val']);
        $param['material']['material_text'] = explode(',', $material['material_text']);
        $param['material']['material_val'] = explode(',', $material['material_val']);
        $param['table'] = $this->param['type'];
        $view = new View;
        $view->render('admin/add_itemView', $param);
    }

    public function add_item(){
        require_once 'application/models/admin/Add_item.php';
        $addItem = new AddItem($this->param);
    }

    public function outAdmin(){
        unset($_SESSION['admin']);
    }

    public function upgrade_itemViev()
    {
        require_once 'application/core/View.php';
            $view = new View;
            $view->render('admin/upgrade_itemView', $this->param);
    }

    public function upgrade_itemSearch()
    {
        require_once 'application/models/admin/Upgrade_admin.php';
        require_once 'application/core/View.php';
        $up = new Upgrade_admin($this->param);
        $param = $up->search();
        $view = new View;
        $view->render('admin/upgrade_itemRender', $param);
    }

    public function upgrade_itemUpgrade()
    {
        require_once 'application/models/admin/Upgrade_admin.php';
        $up = new Upgrade_admin($this->param);
        $up->edit_data();

    }

}


?>