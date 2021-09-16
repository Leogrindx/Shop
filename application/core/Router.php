<?php

class Router{
    protected $route;
    protected $param = [];
    protected $routes = [];

    function __construct(){
        $arr = require_once 'application/config/routes.php';
        $this->routes = $arr;
        $this->search($arr);
    }

    function search($arr){
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($arr as $route => $param) {
            if($route == $url){
                $this->route = $route;
                $this->param = $param;
                break;
            }
        }
    }
    

    function run(){
            if(isset($this->route)){
                require_once 'application/core/Controller.php';
                $connect = new Controller($this->route, $this->param);
            }elseif(!empty($_GET)){
                $tr = trim($_SERVER['REQUEST_URI'], '/');
                $url = stristr($tr, '?', true);
                foreach ($this->routes as $route => $param) {
                    if($route == $url){
                        $this->route = $route;
                        $this->param = $param;
                        break;
                    }
                }
                foreach ($_GET as $key => $value) {
                    $this->param[$key] = $value;
                }
                require_once 'application/core/Controller.php';
                $connect = new Controller($this->route, $this->param);
            }else{
                die(require_once 'public/view/404.php' );
            }
    }
}

?>