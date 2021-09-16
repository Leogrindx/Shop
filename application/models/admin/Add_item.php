<?php


class AddItem{
    protected $mysqli;
    private $param;

    function __construct($param){
        $config = require_once 'application/config/db.php';
        $this->mysqli = new mysqli($config['host'], $config['name'], $config['password'], $config['db']);
        $this->mysqli->set_charset('windows-1250');
        if ($this->mysqli->connect_errno) {
        }
        $this->param = $param;
        
        $this->query();
    }

    public function create_repository($way){
        if(@mkdir($way, 0777, true)){
            
        }else{
            jquery_alert('Error', 'Jest', 'error');
            die();
        }
    }

    public function uploadImage($name, $tmp_name, $new_way){
        $extension = pathinfo($name, PATHINFO_EXTENSION);
        $filename = uniqid(true) . '.' . $extension;

        move_uploaded_file($tmp_name, $new_way . $filename);
        return $new_way . $filename;
    }


    public function query(){
        if(empty($_POST['color'])){
            jquery_alert('Zapomniali Kolor',' ','error');
            die();
        }
        if(empty($_POST['brand'])){
            jquery_alert('Zapomniali Marke',' ','error');
            die();
        }
        if(empty($_POST['material'])){
            jquery_alert('Zapomniali Materiał',' ','error');
            die();
        }
        if(empty($_POST['info'])){
            jquery_alert('Zapomniali Materiał',' ','error');
            die();
        }
        
        $name = $_POST['name'];
        $EAN = $_POST['EAN'];
        $price = $_POST['price'];
        $brand = trim($_POST['brand']);
        $info = implode(",", $_POST['info']);
        $type = $_POST['type'];
        $under_type = trim($_POST['under_type']);
        $size = implode(",", $_POST['size']);
        $material = trim($_POST['material']);
        $gender = $_POST['gender'];
        $color = trim($_POST['color']);
        $way = 'public/img/' . $gender . '/' . $_POST['type'] . '/' . $EAN . '/';
        $this->create_repository($way);
        $images;
        for ($i = 0 ; $i < count($_FILES['img']['name']) ; $i++) { 
            if(empty($images)){
                $images = $this->uploadImage($_FILES['img']['name'][$i], $_FILES['img']['tmp_name'][$i], $way);
            }else{
                $images .= ',' . $this->uploadImage($_FILES['img']['name'][$i], $_FILES['img']['tmp_name'][$i], $way);
                
            }
        }
        $img = trim($images);
        for ($i=0; $i <= 400; $i++) {
            if($i != 400){
                $sql .= "INSERT INTO items (EAN, brand, name, info, type, under_type, size, material, price, gender, color, img) 
                VALUE ('$EAN', '$brand', '$name', '$info', '$type', '$under_type', '$size', '$material','$price', '$gender', '$color', '$img');";
            }else{
                $sql .= "INSERT INTO items (EAN, brand, name, info, type, under_type, size, material, price, gender, color, img) 
                VALUE ('$EAN', '$brand', '$name', '$info', '$type', '$under_type', '$size', '$material','$price', '$gender', '$color', '$img')";
            }
            
        }
        $sql = "INSERT INTO items (EAN, brand, name, info, type, under_type, size, material, price, gender, color, img) VALUE ('$EAN', '$brand', '$name', '$info', '$type', '$under_type', '$size', '$material','$price', '$gender', '$color', '$img')";
        if($this->mysqli->multi_query($sql)){
            jquery_alert('Towar Dodany', ' ', 'success');
        }else{
            jquery_alert('Error', 'Error Servera', 'error');
        }
        
        $this->clear_data();
    }


    public function clear_data(){
        unset($_POST);
        unset($_FILES);
    }
    
}

?>