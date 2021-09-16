<?php 
class SearchController{
    public $mysqli;
    public $arcticl;
    function __construct($arcticl){
        $config = require_once 'application/config/db.php';
            $this->mysqli = new mysqli($config['host'], $config['name'], $config['password'], $config['db']);
            if ($this->mysqli->connect_errno) {
                echo "error connection MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            $this->search_ajax();
    }
    public function search_ajax(){
        $next = false;
        $num = 0;
        if(isset($_POST['dat'])){
            $sql = 'SELECT * FROM items WHERE  name LIKE \'%' . $_POST['dat'] . '%\';';
            $sql .= 'SELECT * FROM items WHERE brand LIKE \'%' . $_POST['dat'] . '%\';';

            if ($this->mysqli->multi_query($sql)) {
                do {
                    if ($result = $this->mysqli->store_result()) {
                        while ($row = $result->fetch_row()) { 
                            $param[$num] = $row;
                            $first_img = explode(',',$row[12]);
                            $param[$num][12] = $first_img[0];
                            $num++;     
                        }
                        $result->free();
                    }
                    if ($this->mysqli->more_results()) {
                       
                    }
                } while (@$this->mysqli->next_result());
            }
            if(empty($param)){
                $param = false;
            }
            $this->mysqli->close();
            require_once 'application/core/View.php';
            $view = new View;
            $view->render('searchView', $param);
        } 
    }
}
?>