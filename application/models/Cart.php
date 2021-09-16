<?php

class Cart
{
    public $mysqli;
    public $table;
    public $EAN;
    function __construct()
    {
        $config = require_once 'application/config/db.php';
        $this->mysqli = new mysqli($config['host'], $config['name'], $config['password'], $config['db']);
        if ($this->mysqli->connect_errno) {
            echo "error connection MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
    }

    public function add()
    {
        $ex_post = explode(',', $_POST['ean']);
        if(count($ex_post) <= 5){
            $ean = $ex_post[0] . ',' . $ex_post[1] . ',' . $ex_post[3] . ',' . $ex_post[4];
            $price = $ex_post[2];
            if (empty($_SESSION['login']['cart'])) {
                $cart = $ean;
            } else {
                $cart = $_SESSION['login']['cart'];
                $ex_ses = explode(';', $_SESSION['login']['cart']);
                $size_carto = 1;
                foreach ($ex_ses as $key => $value) {
                    $ex_cart = explode(',', $value);
                     $size_carto .= $ex_cart[3] . ',';
                    if($ex_cart[3] == $ex_post[4] && $ex_cart[1] == $ex_post[1]){
                            $new_number = $ex_cart[2] + 1;
                            $old_item = $value;
                            $new_item = $ex_post[0] . ',' . $ex_post[1] . ',' . $new_number . ',' . $ex_post[4];
                            $new_cart = str_replace($old_item, $new_item, $_SESSION['login']['cart']);
                    }else{
                        $cart = $_SESSION['login']['cart'] . ';' . $ean;
                    }
                    
                }
                   
            }
            if(isset($new_cart)){
                $cart = $new_cart;
            }
            if ($this->update($cart)) {
                $_SESSION['login']['cart'] = $cart;
                $num = $_SESSION['login']['number_item_cart'] + $ex_post[3];
                if (isset($_SESSION['login']['total_price'])) {
                    $total_price = strval($_SESSION['login']['total_price'] + $price);
                } else {
                    $total_price = strval($price);
                }
                if (empty($_SESSION['login']['total_price'])) {
                    $_SESSION['login']['total_price'] = $price;
                } else {
                    $_SESSION['login']['total_price'] += $price;
                }
                $_SESSION['login']['number_item_cart'] = $num;
                echo json_encode([
                    'title' => 'Towar Dodany',
                    'text' => $num,
                    'total_price' => $total_price,
                    'status' => 'success'
                ], 0);
            } else {
                jquery_alert('Nie dodano do kosza', ' ', 'error');
                die();
            }
        }
        
    }

    public function delete()
    {
        $ex = explode(',', $_POST['del']);
        $price = $ex[1];
        $id_item = $ex[0];
        $size = $ex[2];
        $old_cart = explode(';', $_SESSION['login']['cart']);
        
        foreach ($old_cart as $key => $value) {
            $ean = explode(',', $value);
            if ($id_item != $ean[1] or $size != $ean[3]) { 
                if (empty($new_cart)) {
                    $new_cart = $value;
                } else {
                    $new_cart .= ';' . $value;
                }
            } else {
                $price = $ex[1] * $ean[2];
                $num_del = $ean[2];
            }
        }

        if (count($old_cart) >= 2) {
            if ($this->update($new_cart)) {
                $_SESSION['login']['cart'] = $new_cart;
                $new_num = $_SESSION['login']['number_item_cart'] - $num_del;
                $_SESSION['login']['number_item_cart'] = $new_num;
                $_SESSION['login']['total_price'] -= $price;
                $total_price = $_SESSION['login']['total_price'];
                echo json_encode([
                    'title' => 'Towar usunięty z kosza',
                    'text' => $id_item . '_' . $size,
                    'price' => $total_price,
                    'num_items' => $new_num,
                    'status' => 'success',
                ], 0);
            } else {
                jquery_alert('Error_servera', ' ', 'error');
                die();
            }
        } else {
            if ($this->update('')) {
                $_SESSION['login']['cart'] = '';
                $new_num = $_SESSION['login']['number_item_cart'] - $ean[2];
                $_SESSION['login']['number_item_cart'] = $new_num;
                $_SESSION['login']['total_price'] -= $price;
                $total_price = $_SESSION['login']['total_price'];
                echo json_encode([
                    'title' => 'Towar usunięty z kosza',
                    'text' => $id_item . '_' . $size,
                    'price' => $total_price,
                    'num_items' => $new_num,
                    'status' => 'success',
                    'refresh' => true
                ], 0);
            } else {
                jquery_alert('Error_servera', ' ', 'error');
                die();
            }
        }

    }

    public function view()
    {

        $sql_data_cart = 'SELECT * FROM users';
        $result_data_cart = $this->mysqli->query($sql_data_cart);
        while ($row = $result_data_cart->fetch_assoc()) {
            if ($row['email'] == $_SESSION['login']['email']) {
               $cart_data = $row['cart'];
            }
        }
        //show items
        if (!empty($cart_data)) {
            $items = explode(';', $cart_data);
            $param = [];
            foreach ($items as $key => $val) {
                $value = explode(',', $val);
                //show numbers item
                $param['number'][$key] = $value[2];
                //
                //show size
                $param['size'][$key] = $value[3];
                //
                $param['table'][$key + 1] = $value[0];
                $EAN = $value[1];
                $audit_basket_date[$key] = $value[1];

                if (empty($sql)) {
                    $sql = 'SELECT * FROM items WHERE EAN = ' . '"' . $EAN . '";';
                } else {
                    $sql .= 'SELECT * FROM items WHERE EAN = ' . '"' . $EAN . '";';
                }
            }
            if ($this->mysqli->multi_query($sql)) {
                $num = 0;
                do {
                    $num++;
                    if ($result = $this->mysqli->store_result()) {
                        while ($row = $result->fetch_row()) {
                            $param['param'][$num] = $row;
                            $first_img = explode(',',$row[12]);
                            $param['param'][$num][12] = $first_img[0];
                            if(isset($total_price)){
                                $total_price += $row[9] * $param['number'][$num-1];
                            }else{
                                $total_price = $row[9] * $param['number'][$num-1];
                            }
                        }
                        $result->free();
                    }
                    if ($this->mysqli->more_results()) {
                    }else{
                    }
                } while (@$this->mysqli->next_result());
            }
        //show total price in cart
            $_SESSION['login']['total_price'] = $total_price;
        } else {
            $param = false;
        }
        //delete defunct item
        if(isset($audit_basket_date)){
            foreach ($audit_basket_date as $key => $cart_ean) {
                if(!isset($param['param'][$key+1])){
                    foreach ($items as $key => $v) {
                        $item_data = explode(',', $v);
                        if($item_data[1] == $cart_ean){
                            unset($items[$key]);
                            $new_cart_data = array_values($items);
                            $this->update(implode(';', $new_cart_data));
                            $cart_data = implode(';', $new_cart_data);
                        }
                    }
                }
            }
        }
        
        //show total number items in cart
        if (!empty($cart_data)) {
            $cart = explode(';', $cart_data);
            $number_items = 0;
            foreach ($cart as $key => $value) {
                $ex = explode(',', $value);
                $number_items += $ex[2];
            }
            $_SESSION['login']['number_item_cart'] = $number_items;
        } else {
            $_SESSION['login']['number_item_cart'] = "0";
        }

        
        return $param;
    }


    public function upgrade_number_item_cart()
    {
        $ex = explode(',', $_POST['ean']);
        $ean = $ex[0];
        $price = $ex[1];
        $size = $ex[2];
        $number = $_POST['number_cart'];
        $cart = explode(';', $_SESSION['login']['cart']);
        foreach ($cart as $key => $value) {
            $ean_cart = explode(',', $value);
            if ($ean_cart[1] == $ean and $size == $ean_cart[3]) {
                if ($number > $ean_cart[2]) {
                    $num = $number - $ean_cart[2];
                    $new_price = $num * $price;
                    $_SESSION['login']['total_price'] = $_SESSION['login']['total_price'] + $new_price;
                    $_SESSION['login']['number_item_cart'] += $num;
                    echo json_encode(
                        [
                            'total_price' => $_SESSION['login']['total_price'],
                            'number_item_cart' => $_SESSION['login']['number_item_cart']
                        ],
                        0
                    );
                } else {
                    $num = $ean_cart[2] - $number;
                    $new_price = $num * $price;
                    $_SESSION['login']['total_price'] -= $new_price;
                    $_SESSION['login']['number_item_cart'] -= $num;
                    echo json_encode(
                        [
                            'total_price' => $_SESSION['login']['total_price'],
                            'number_item_cart' => $_SESSION['login']['number_item_cart']
                        ],
                        0
                    );
                }

                $ean_cart[2] = $number;
                $new_item = $ean_cart[0] . ',' . $ean_cart[1] . ',' . $ean_cart[2] . ',' . $ean_cart[3];
                $new_number_item = str_replace($value, $new_item, $_SESSION['login']['cart']);
                $this->update($new_number_item);
                $_SESSION['login']['cart'] = $new_number_item;
            }
        }
    }

    public function size()
    {

        $ex = explode(',', $_POST['ean']);
        $ean = $ex[0];
        $size = $ex[4];
        $number = $_POST['number_cart'];
        $cart = explode(';', $_SESSION['login']['cart']);
        foreach ($cart as $key => $value) {
            $ean_cart = explode(',', $value);
            if ($ean_cart[1] == $ean) {
                if ($number > $ean_cart[2]) {
                    $num = $number - $ean_cart[2];
                    $new_price = $num * $price;
                    $_SESSION['login']['total_price'] = $_SESSION['login']['total_price'] + $new_price;
                    $_SESSION['login']['number_item_cart'] += $num;
                    echo json_encode(
                        [
                            'total_price' => $_SESSION['login']['total_price'],
                            'number_item_cart' => $_SESSION['login']['number_item_cart']
                        ],
                        0
                    );
                } else {
                    $num = $ean_cart[2] - $number;
                    $new_price = $num * $price;
                    $_SESSION['login']['total_price'] -= $new_price;
                    $_SESSION['login']['number_item_cart'] -= $num;
                    echo json_encode(
                        [
                            'total_price' => $_SESSION['login']['total_price'],
                            'number_item_cart' => $_SESSION['login']['number_item_cart']
                        ],
                        0
                    );
                }

                $ean_cart[2] = $number;
                $new_item = $ean_cart[0] . ',' . $ean_cart[1] . ',' . $ean_cart[2];
                $new_number_item = str_replace($value, $new_item, $_SESSION['login']['cart']);
                $this->update($new_number_item);
                $_SESSION['login']['cart'] = $new_number_item;
            }
        }
    }

    //additional Function

    public function update($result)
    {
        $sql = "UPDATE users SET cart = \"" . $result . "\" WHERE users.email = \"" . $_SESSION['login']['email'] . "\"";
        if ($this->mysqli->multi_query($sql)) {
            return true;
        } else {
            return false;
        }
        $this->mysqli->close();
    }
}
