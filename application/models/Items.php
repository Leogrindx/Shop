<?php 

 class Items{
    protected $action;
    protected $param;
    protected $mysqli;
    function __construct($param){
        $this->param = $param;
        $config = require_once 'application/config/db.php';
            $this->mysqli = new mysqli($config['host'], $config['name'], $config['password'], $config['db']);
            if ($this->mysqli->connect_errno) {
                die('Error servera 500');
            }
    }

    public function filter($pos)
    {
        if(isset($this->param['type'])){
            $sql = 'SELECT * FROM items WHERE type = \''. $this->param['articl'] . '\'' . ' AND gender = \'' . $this->param['gender'] .'\'' . ' AND under_type = \'' . $this->param['type'] .'\'';
        }else{
            $sql = 'SELECT * FROM items WHERE type = \''. $this->param['articl'] . '\'' . ' AND gender = \'' . $this->param['gender'] .'\'';
        }

        if(isset($_GET['color'])){
            $tirm_color = trim($_GET['color']);
            $total_color = explode(',', $tirm_color);
            foreach ($total_color as $key => $v_color) {
                if(empty($val_color)){
                $val_color = '\'' . trim($v_color). '\'';
                }else{
                $val_color .= ',\'' . trim($v_color). '\'';
                }
            }

            $sql .= ' AND color IN (' . $val_color . ')'; 
        }

            
        if(isset($_GET['brand'])){
            $tirm_brand = trim($_GET['brand']);
            $total_brand = explode(',', $tirm_brand);
            $val_brand;
            foreach ($total_brand as $key => $v_brand) {
                if(empty($val_brand)){
                $val_brand = '\'' . trim($v_brand). '\'';
                }else{
                $val_brand .= ',\'' . trim($v_brand). '\'';
                }
            }

            $sql .= ' AND brand IN (' . $val_brand . ')'; 
        }

        if(isset($_GET['material'])){
            $tirm_material = trim($_GET['material']);
            $total_material = explode(',', $tirm_material);
            $val_material;
            foreach ($total_material as $key => $v_material) {
                if(empty($val_material)){
                $val_material = '\'' . trim($v_material). '\'';
                }else{
                $val_material .= ',\'' . trim($v_material). '\'';
                }
            }

            $sql .= ' AND material IN (' . $val_material . ')';
        }

        if(isset($_GET['size'])){
            $val_size;
            
            foreach ($_GET['size'] as $key => $V_size) {
                if(empty($val_size)){
                $val_size = '\'' . trim($V_size) . '\'';
                }else{
                $val_size .= ',\'' . trim($V_size) . '\'';
                }
            }

            $sql .= ' AND size IN  (' . $val_size . ')'; 
        }

        if(isset($_GET['price'])){
            $val_size;
            $total_price = explode(',',$_GET['price']);
            $from = $total_price[0];

            $to = $total_price[1];


            $sql .= ' AND ( price >= ' . $from . ' AND price <= ' . $to . ') ORDER BY price'; 
        }
        
        $sql .= ' LIMIT '. $pos . ', 99';

        return $sql;
    }


    public function query(){
        $arr = [];

        //number_pages

        if(!empty($this->param['type'])){
            
            $sql_pages = 'SELECT COUNT(*) FROM items WHERE type = \'' . $this->param['articl'] . '\'' . ' AND gender = \'' . $this->param['gender'] .'\'' . ' AND under_type = \'' . $this->param['type'] .'\'';

        }else{

            $sql_pages = 'SELECT COUNT(*) FROM items WHERE type = \'' . $this->param['articl'] . '\'' . ' AND gender = \'' . $this->param['gender'] .'\'';
            
        }

        if (!$this->mysqli->multi_query($sql_pages)) {
            die("Failed to execute multi-query: (" . $this->mysqli->errno . ") " . $this->mysqli->error);
        }
            if ($res = $this->mysqli->store_result()) {
                 $number = $res->fetch_array();
                
                 $num = $number[0];
                 $pages = floor($num / 100);
                 $arr['pages'] = $pages;       
            }
        
        // items
        if(isset($this->param['p'])){
            if($arr['pages'] < 0 + $this->param['p']){
                die(require_once 'public/view/404.php' );
            }
        }

        $pos = 0;
         
        if(!empty($this->param['p'])){
            if($this->param['p'] !== '1'){
                $pos = trim($this->param['p'] - 1) . '00' - 1;
            }else{
                $pos = trim($this->param['p'] - 1);
            }
            
            $page_num = $this->param['p'];
            $arr['page'] = $page_num;
        }
        if(!empty($_GET)){
            $sql = $this->filter($pos);
        }else{
            if(isset($this->param['type'])){
                $sql = 'SELECT * FROM items WHERE type = \'' . $this->param['articl'] . '\'' . ' AND gender = \'' . $this->param['gender'] .'\''
                . ' AND under_type = \'' . $this->param['type'] . '\' LIMIT '. $pos . ', 99';
            }else{
                $sql = 'SELECT * FROM items WHERE type = \'' . $this->param['articl'] . '\'' . ' AND gender = \'' . $this->param['gender'] . '\' LIMIT '. $pos . ', 99';
            }
        }

        $result = $this->mysqli->query($sql);
        $fetch = $result->fetch_all(MYSQLI_ASSOC);
        if($fetch){
            $arr['items'] = $fetch;
            $articl;
            if($this->param['articl'] == 'shoes'){
                $articl = 's';
            }elseif($this->param['articl'] == 'cloth'){
                $articl = 'c';
            } 
            $arr['articl'] = $articl;
        }else{
            if($this->param['action'] != 'items_ajax'){
                die(require_once 'public/view/not_items.php' );
            }else{
                die(require_once 'public/view/not_items_ajax.php' );
            }
        }

        $brands = require_once 'application/config/brands.php';
        $material = require_once 'application/config/materials.php';
        $color =  require_once 'application/config/color.php';

        $arr['filter_brands'] = explode(',', $brands['brands']);
        $arr['filter_material_val'] = explode(',', $material['material_val']);
        $arr['filter_material_text'] = explode(',', $material['material_text']);
        $arr['filter_colors_val'] = explode(',', $color['color_val']);
        $arr['filter_colors_text'] = explode(',', $color['color_text']);
        
        return $arr;
    }

 }

?>