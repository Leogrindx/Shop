<?php
class Register
{
    protected $mysqli;

    function __construct()
    {
        $config = require_once 'application/config/db.php';
        $this->mysqli = new mysqli($config['host'], $config['name'], $config['password'], $config['db']);
        if ($this->mysqli->connect_errno) {
            echo "error connection MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
    }

    public function search_email()
    {
        $sql = "SELECT email FROM users";
        if (!$this->mysqli->multi_query($sql)) {
            die("Failed to execute multi-query: (" . $mysqli->errno . ") " . $mysqli->error);
        }


        if ($res = $this->mysqli->store_result()) {
            $all = $res->fetch_all(MYSQLI_ASSOC);
            if (empty($all)) {
                // SEND MAIL
                $id = random_int(1000, 9999);
                $subject = 'Sprawdzam Email';
                $message = '<!DOCTYPE html>
                    <html lang="pl">
                    <head>
                        <title>Sprawdzam Email</title>
                    </head>
                    <body>
                        <h1 style="font-family: Arial;">Prosze skopijowac ten kod: ' . $id . '</h1>
                    </body>
                    </html>';
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                if (mail($_POST['email'], $subject, $message, $headers)) {
                    header("Location: /account/check_mail");
                    $session_arr = [
                        'first_name' => $_POST['first_name'],
                        'last_name' => $_POST['last_name'],
                        'email' => $_POST['email'],
                        'password' => password_hash($_REQUEST['password'], PASSWORD_DEFAULT),
                        'gender' => $_POST['gender'],
                        'cart' => $_POST['email'],
                        'kod' => $id
                    ];
                    $_SESSION["register"] = $session_arr;
                } else {
                    $this->error('Takiego emaila niema');
                }
            } else {

                foreach ($all as $key => $arr) {
                    foreach ($arr as $key => $val) {
                        if ($val == $_POST['email']) {
                            $res->free();
                            $this->error('Takiej email już Zarejestrowany');
                        } else {
                            $res->free();

                            // SEND MAIL
                            $id = random_int(1000, 9999);
                            $subject = 'Sprawdzam Email';
                            $message = '<!DOCTYPE html>
                                <html lang="pl">
                                <head>
                                    <title>Sprawdzam Email</title>
                                </head>
                                <body>
                                    <h1 style="font-family: Arial;">Prosze skopijowac ten kod: ' . $id . '</h1>
                                </body>
                                </html>';
                            $headers  = 'MIME-Version: 1.0' . "\r\n";
                            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                            if (mail($_POST['email'], $subject, $message, $headers)) {
                                jquery_alert('send_email', '/', 'success');
                                $session_arr = [
                                    'first_name' => $_POST['first_name'],
                                    'last_name' => $_POST['last_name'],
                                    'email' => $_POST['email'],
                                    'password' => password_hash($_REQUEST['password'], PASSWORD_DEFAULT),
                                    'gender' => $_POST['gender'],
                                    'cart' => '',
                                    'kod' => $id
                                ];
                                $_SESSION["register"] = $session_arr;
                            } else {
                                $this->error('Takiego emaila niema');
                            }
                            die();
                        }
                    }
                }
            }
        }
    }

    public function audit_email()
    {
        if ($_SESSION["register"]["kod"] == $_POST['kod']) {
            $this->query();
        }else{
            jquery_alert('wpisz prawidlowy kod', 'yes', 'error');
        }
    }



    public function query()
    {
        if (isset($_SESSION['register'])) {
            $first_name = $_SESSION['register']['first_name'];
            $last_name = $_SESSION['register']['last_name'];
            $email = $_SESSION['register']['email'];
            $password = $_SESSION['register']['password'];
            $gender = $_SESSION['register']['gender'];
            $cart = $_SESSION['register']['cart'];

            $sql = "INSERT INTO users(first_name, last_name, gender, email, password, cart, admin) 
                 VALUE('$first_name', '$last_name', '$gender', '$email', '$password', '$cart' , 'no')";
            if (!$this->mysqli->query($sql)) {
                echo $this->mysqli->connect_error;
            }
            unset($_SESSION['register']);
            jquery_alert('Ty jesteś zarejestrowany', '/', 'success');
        } else {
            unset($_SESSION['register']);
            $this->error('Proszę zrobić rejestracje ponownie');
        }
    }

    public function error($error)
    {
        die(jquery_alert($error, ' ', 'error'));
    }
}
