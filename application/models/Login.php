<?php
class Login
{
    protected $mysqli;
    public $cart;
    function __construct()
    {
        $config = require_once 'application/config/db.php';
        $this->mysqli = new mysqli($config['host'], $config['name'], $config['password'], $config['db']);
        if ($this->mysqli->connect_errno) {
            die(print_r("error connection MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
        }

        $this->search_email();
    }


    protected function search_email()
    {
        $sql = 'SELECT * FROM users';
        $result = $this->mysqli->query($sql);
        while ($row = $result->fetch_assoc()) {
            if ($row['email'] == $_POST['email']) {
                $this->search_password($row['password'], $row['first_name'], $row['last_name'], $row['email'], $row['cart']);
                return;
            }
        }
        jquery_alert('Nieprawidłowy email', '/', 'error');
    }

    protected function search_password($password_hash, $first_name, $last_name, $email, $cart)
    {
        if (password_verify($_POST['password'], $password_hash)) {
            $this->login($first_name, $last_name, $email, $cart);
        } else {
            jquery_alert('Nieprawidłowe hosło', '/', 'error');
        }
    }

    public function total_price_to_cart()
    {

        if (isset($_SESSION['login'])) {
            if (!empty($_SESSION['login']['cart'])) {
                $items = explode(';', $_SESSION['login']['cart']);
                $param = [];
                foreach ($items as $key => $val) {
                    $value = explode(',', $val);
                    $param['number'][$key] = $value[2];
                    if ($value[0] == "s") {
                        $type = "shoes";
                    }
                    if ($value[0] == "c") {
                        $type = "cloth";
                    }
                    $EAN = $value[1];
                    if (empty($sql)) {
                        $sql = 'SELECT * FROM items WHERE EAN = "' . $EAN . '";';
                    } else {
                        $sql .= 'SELECT * FROM items WHERE EAN = "' . $EAN . '";';
                    }
                }

                if ($this->mysqli->multi_query($sql)) {
                    $num = 0;
                    do {
                        $num++;
                        if ($result = $this->mysqli->store_result()) {
                            while ($row = $result->fetch_row()) {
                                $param['param'][$num] = $row;
                            }
                            $result->free();
                        }
                        if ($this->mysqli->more_results()) {
                        }
                    } while (@$this->mysqli->next_result());
                }
                $this->mysqli->close();
            } else {
                $param = false;
            }
        }
        if (isset($_SESSION['login'])) {
            if ($param != false) {
                if (empty($_SESSION['login']['total_price'])) {
                    foreach ($param['param'] as $key => $item) {
                        if (empty($_SESSION['login']['total_price'])) {
                            if ($param['number'][$key - 1] != 1) {
                                $total = $param['number'][$key - 1] * $item[9];
                                $_SESSION['login']['total_price'] = $total;
                            } else {
                                $_SESSION['login']['total_price'] = $item[9];
                            }
                        } else {

                            if ($param['number'][$key - 1] != 1) {
                                $total = $param['number'][$key - 1] * $item[9];
                                $_SESSION['login']['total_price'] += $total;
                            } else {
                                $_SESSION['login']['total_price'] += $item[9];
                            }
                        }
                    }
                }
            }
        }
    }

    protected function login($first_name, $last_name, $email, $cart)
    {
        $_SESSION["login"] = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'cart' =>  $cart
        ];
        if (!empty($_SESSION['login']['cart'])) {
            $cart = explode(';', $_SESSION['login']['cart']);
            $number_items = 0;
            foreach ($cart as $key => $value) {
                $ex = explode(',', $value);
                $number_items += $ex[2];
            }
            $_SESSION['login']['number_item_cart'] = $number_items;
        } else {
            $_SESSION['login']['number_item_cart'] = "0";
        }
        $this->total_price_to_cart();
        jquery_alert('Ty jesteś zalogowany', '/', 'success');
    }
}

