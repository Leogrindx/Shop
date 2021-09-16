<?php 
    class Upgrade_admin {
        private $param;
        private $mysqli;
        public function __construct($param)
        {   $config = require_once 'application/config/db.php';
            $this->mysqli = new mysqli($config['host'], $config['name'], $config['password'], $config['db']);
            if($this->mysqli->connect_errno){
                die('Error servera 500');
            }
            $this->param = $param;
        }
        public function search(){
            $sql = 'SELECT * FROM items WHERE EAN="' . $_POST['ean'] . '"';
            $result = $this->mysqli->query($sql);
            $fetch = $result->fetch_array(MYSQLI_ASSOC);
            if(empty($fetch)){
                jquery_alert('Niema takiego artykla',' ','error');
                die();
            }else{
                return $fetch;
            }
        }
    
        public function edit_data(){
            $ean = $_POST['EAN'];
            foreach ($_POST as $key => $value) {
                if(!isset($set)){
                    $set = $key . '=' . $value . ', ';
                }else{
                    $set .= $key . '=' . $value . ', ';
                }
                 
            }
            $sql = 'UPDATE items SET ' . $set . ' WHERE items.EAN ="' . $ean . '";';
            print_r($sql);
            // $result = $this->mysqli->query($sql);
            // $fetch = $result->fetch_array(MYSQLI_ASSOC);
        }
    }

    
?>