<?php 

class Edit_Password_Ajax{
    protected $mysqli;
    function __construct(){
        $config = require_once 'application/config/db.php';
        $this->mysqli = new mysqli($config['host'], $config['name'], $config['password'], $config['db']);
        if ($this->mysqli->connect_errno) {
            die(print_r("error connection MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
        }
        $this->check_old_password();
    }
    public function check_old_password(){
        $sql_old = "SELECT password FROM users WHERE users.email = \"" . $_SESSION['login']['email'] . "\"";
        $result = $this->mysqli->query($sql_old);
        $row = $result->fetch_assoc();
        if(password_verify($_POST['old_password'] ,$row['password'])){
            $this->swap_new_password();
        }else{
            jquery_alert('Stare haslo nieprawiedlowe',' ','error');
        }
    }
    public function swap_new_password(){
        $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        $sql_new = "UPDATE users SET password = \"" . $new_password . "\" WHERE users.email = \"" . $_SESSION['login']['email'] . "\"";
        if ($this->mysqli->multi_query($sql_new)){
            jquery_alert('Haslo zmienione', ' ' ,'success');
        }else{
            jquery_alert('ERROR SERVERA', ' ' ,'error');
            die();
        }
    }
}


?>