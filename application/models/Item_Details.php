<?php

class Item_Details{
    protected $mysqli;
    protected $param;
    function __construct($param){
        $config = require_once 'application/config/db.php';
            $this->mysqli = new mysqli($config['host'], $config['name'], $config['password'], $config['db']);
            if ($this->mysqli->connect_errno) {
                die(print_r("error connection MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
            }
            $this->param = $param;
    }
    
    public function return(){
        foreach ($this->param as $key => $value) {
            if($key == 's'){
                $table = 'shoes';
            }elseif($key == 'c'){
                $table = 'cloth';
            }
        }
        
        $sql = 'SELECT * FROM items WHERE EAN = ' . $value;
        $result = $this->mysqli->query($sql);
        unset($this->param);
        $param['items'] = $result->fetch_assoc();
        $param['image'] = explode(',', $param['items']['img']);
        $info = explode(',', $param['items']['info']);

        foreach ($info as $key => $value) {
            $done_info = explode('/', $value);
            $info[$key] = $done_info;
        }

        $param['info'] = $info;

        $color =  require_once 'application/config/color.php';
        $color_val = explode(',', $color['color_val']);
        $color_text = explode(',', $color['color_text']);
        foreach ($color_val as $k_c => $v_c){
            if(trim($v_c) == $param['items']['color']){
                $param['items']['color'] = ucfirst(trim($color_text[$k_c]));
            }
        }

        $material = require_once 'application/config/materials.php';
        $material_val = explode(',', $material['material_val']);
        $material_text = explode(',', $material['material_text']);
        foreach ($material_val as $k_m => $v_m){
            if(trim($v_m) == $param['items']['material']){
                $param['items']['material'] = $material_text[$k_m];
            }
        }

        unset($param['items']['img']);
        unset($param['items']['info']);
        $_SESSION['gender'] = $param['items']['gender'];
        return $param;   
    }
}

?>