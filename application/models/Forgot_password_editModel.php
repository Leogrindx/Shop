<?php 

class Forgot_Password_Edit{
    protected $mysqli;
    function __construct(){
        $config = require_once 'application/config/db.php';
        $this->mysqli = new mysqli($config['host'], $config['name'], $config['password'], $config['db']);
        if ($this->mysqli->connect_errno) {
            die(print_r("error connection MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
        }

        $this->check_email();
    }

    public function check_email(){
        $sql = "SELECT * FROM users WHERE email = \"" . $_POST['email'] . "\"";
            if ($this->mysqli->multi_query($sql)) {
                
            }else{
                jquery_alert('ERROR SERVERA', ' ' ,'error');
                die();
            }
            if ($res = $this->mysqli->store_result()) {
                if($all = $res->fetch_all(MYSQLI_ASSOC)){
                    $this->edit_password();
                }else{
                    jquery_alert('Nie prawidlowy Email', ' ' ,'error');
                }
            }
    }

    public function edit_password(){
        $id = uniqid(true);
        $new_password = password_hash($id, PASSWORD_DEFAULT); 
        $sql_p = "UPDATE users SET password = \"" . $new_password . "\" WHERE users.email = \"" . $_POST['email']. "\"";
        if($this->mysqli->query($sql_p)){
            if($this->send_mail($id)){
                jquery_alert('wyslano haslo na Email', ' ','success');
            }else{
                jquery_alert('niema takiego Emaila', ' ','error');
            }
                
        }else{
            jquery_alert('Error Servera', ' ','error');
        }
    }
    public function send_mail($new_password){
        $subject = 'Zmiana Hasła';
        $message = '<!DOCTYPE html>
        <html lang="pl">
        <head>
            <title>Nowe hasło</title>
        </head>
        <body>
            <h1 style="font-family: Arial;"> To jest Nowe Hasło państwa: '. $new_password . '</h1>
            <p style="font-family: Arial;">Prosze państwa nikt nie pokazać tego hasła</p>
        </body>
        </html>';
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        if(mail($_POST['email'], $subject, $message, $headers)){
            return true;
        }else{
            return false;
        }
    }
}
?>