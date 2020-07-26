<?php
 class sql extends PDO
 {
     private $con;
     
     public function __construct()
     {
         //$this->con = new PDO("mysql:host=186.202.152.73;dbname=cargocar", "cargocar","cargoproxy");    
         //$this->con = new PDO("mysql:host=localhost;dbname=tabelaselect", "root","");  
         $this->con = new PDO("mysql:host=cargocar.mysql.dbaas.com.br;dbname=cargocar", "cargocar","cargocar1");  
     }
     
     private function setParams($statment, $parameters = array())
     {
         foreach($parameters as $key => $value)
         {
             $this->setParam($statment, $key, $value);
         }
     }
     
     private function setParam($statment, $key, $value)
     {
         $statment->bindParam($key, $value);
     }
     
     public function query($rawquery,$params = array())
     {
         $stmt = $this->con->prepare($rawquery);
         
         $this->setParams($stmt, $params);
         
         $stmt->execute();
         
         return $stmt;
     }
     public function select($rawquery, $params = array()):array
     {
       $stmt = $this->query($rawquery, $params);
    
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
 
 }





?>