<?php 

class View{

    public function render($file, $param){
        $way = 'public/view/'. $file .'.php';
        require_once $way;
    }

}

?>