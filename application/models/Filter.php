<?php 
    class Filter{
        protected $mysqli;
        public function __construct($param)
        {
            $config = require_once 'application/config/db.php';
            $this->mysqli = new mysqli($config['host'], $config['name'], $config['password'], $config['db']);
            if ($this->mysqli->connect_errno) {
                echo "error connection MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            // $this->filter();
            sleep(1);
            print_r($_GET);
        }

        public function filter()
        {
            if(isset($this->param['type'])){
                $sql = 'SELECT * FROM cloth WHERE gender = \'woman\' AND type = \' \'';
            }else{
                $sql = 'SELECT * FROM ' . $this->param['articl'] 
                . ' WHERE gender = \'' . $this->param['gender'] .'\'';
            }

            if(isset($_GET['color'])){
                $val_color;
                foreach ($_GET['color'] as $key => $v_color) {
                    if(empty($val_color)){
                    $val_color = 'color=\'' . $v_color. '\'';
                    }else{
                    $val_color .= ' OR color=\'' . $v_color. '\'';
                    }
                }

                $sql .= ' AND (' . $val_color . ')'; 
            }
        }
    }
?>