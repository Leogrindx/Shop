<?php

class Controller{
    protected $route;
    protected $param = [];
    function __construct($route, $param){
        $this->route = $route;
        $this->param = $param;
        $this->connect();
    }

    public function connect(){
        $class = ucfirst($this->param['controller']).'Controller';
        $action = $this->param['action'];
        require_once 'application/controllers/'.$class.'.php';
        if(class_exists($class)){
           
            if(method_exists($class, $action)){
                $controller = new $class($action, $this->param);
            }else{
                echo 'it\'s not Method';
            }
        }else{
            echo 'it\'s not Classes';
        }
        
        
    }
}

?>