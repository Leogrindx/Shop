<?php
class Login_Admin
{
    protected $mysqli;
    function __construct()
    {
        $config = require_once 'application/config/db.php';
        $this->mysqli = new mysqli($config['host'], $config['name'], $config['password'], $config['db']);
        if ($this->mysqli->connect_errno) {
            die(print_r("error connection MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
        }

        $this->search_email();
    }

    protected function checked_form()
    {
        if (isset($_POST['emailAdmin'])) {
            if (isset($_POST['passwordAdmin'])) {
                return true;
            } else {
                unset($_POST['doGO_loginAdmin']);
                $this->error('proszę wpisać Hasło');
            }
        } else {
            unset($_POST['doGO_loginAdmin']);
            $this->error('proszę wpisać Email');
        }
    }

    protected function search_email()
    {
        if ($this->checked_form()) {
            $sql = 'SELECT * FROM users';
            $result = $this->mysqli->query($sql);
            while ($row = $result->fetch_assoc()) {
                if ($row['email'] == $_POST['emailAdmin']) {
                    if ($row['Admin'] == 'yes') {
                        $this->search_password($row['password'], $row['first_name'], $row['last_name']);
                        return;
                    } else {
                        $this->error('nie jesteś Adminem');
                    }
                }
            }
            $this->error('nieprawidłowy email');
        }
    }

    protected function search_password($password_hash, $first_name, $last_name)
    {
        if (password_verify($_POST['passwordAdmin'], $password_hash)) {
            $this->login($first_name, $last_name);
        } else {
            $this->error('nieprawidłowe hasło');
        }
    }

    protected function error($error)
    {
        unset($_POST['doGO_login']);
        die('<h1 style="font-family: Arial; text-align: center; margin-top: 40px;">' . $error . '</h1><br>
                    <p style="text-align: center;"><a style="font-family: Arial;  margin-top: 20px; font-size: 20px;" 
                    href="/admin_login">wróć do logowiania</a></p>');
    }

    protected function login($first_name, $last_name)
    {
        $_SESSION["admin"] = [
            'first_name' => $first_name,
            'last_name' => $last_name
        ];
        header('Location: /admin_panel');
    }
}
