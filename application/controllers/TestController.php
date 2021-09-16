<?php 
    class TestCOntroller{
        public $param;
        public $action;
        public function __construct($action, $param)
        {
            $this->param = $param;
            $this->action = $action;
            $this->$action();
            
        }

        public function test(Type $var = null)
        {
            
        }
    }
?>