<?php

function debug($str){
    echo "<pre>";
    print_r($str);
    echo "</pre>";
    exit;
}

function jquery_alert($title, $text, $status){
    echo json_encode([
            'title' => $title,
            'text' => $text,
            'status' => $status
    ],0);
}

?>
