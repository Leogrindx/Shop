<?php

class DB {
    protected $db;
    public function __construct(){
        $config = require_once 'application/config/db.php';
        $this->db = new PDO ('mysql:host='.$config['host'].';dbname='.$config['db'], $config['name'], $config['password']);
    }

    public function query($sql, $params = []){
         $stmt = $this->db->prepare($sql);
         if(!empty($params)){
             foreach ($params as $key => $value) {
                 $stmt->db->bindValue(':'.$key, $value);
             }
         }
         $stmt->execute();
         return $stmt;
        
    }

    public function exec($sql_exec){
        function PDOBindArray(&$poStatement, &$paArray){

            foreach ($paArray as $k=>$v){
          
              @$poStatement->bindValue(':'.$k,$v);
          
            }
           
          } 
          
          
          $stmt = $dbh->prepare("INSERT INTO tExample (id,value) VALUES (:id,:value)");
          
          $taValues = array(
          'id' => '1',
          'value' => '2'
          ); 
          
          PDOBindArray($stmt,$taValues);
          
          $stmt->execute();
    }

    public function row($sql, $params){
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
        
    }

    public function column($sql, $params){
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }

}

?>