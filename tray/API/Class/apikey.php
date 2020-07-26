<?php

class apikey
{
    var $idkey;
    var $keys;
    var $log;
    //-------------------------- ID ------------------------
    
    public function getIdkey()
    {
        return $this->idkey;
    }
    public function setIdkey($value)
    {
        $this->idkey = $value;
    }
    
    //------------------- valor por volume ---------------------
    
    public function getKey()
    {
        return $this->keys;
    }
    public function setKey($value)
    {
        $this->keys = $value;
    }

    public function getlog()
    {
        return $this->log;
    }
    public function setlog($value)
    {
        $this->log = $value;
    }
    
  
    //------------------- carregando pelo ID ----------------
    public function loadById($id)
    {
        $sql = new sql();
        $result = $sql->select("SELECT * FROM chaves WHERE chave = :ID", array(
            ":ID"=>$id
        ));
        
        if(count($result) > 0)
        {
            $row = $result[0];
            
            $this->setIdkey($row['id']);
            $this->setKey($row['chave']);
            $this->setlog($row['log']);
            
        }
    }
    
    public function __toString()
    {
        return $retorno = json_encode(array(
        "id"=>$this->getIdkey(),
        "chave"=>$this->getKey(),
        "log"=>$this->getlog(),   
       
        ));
    }

    public function update($chave,$login)
    {
        $this->setlog($login);
        $this->setKey($chave);

         $sql = new sql();
         $result = $sql->query("UPDATE chaves SET log = :lo WHERE chave = :ID", array(
            ":lo"=>$this->getlog(),
            ":ID"=>$this->getKey(),


        ));

    }
    
  
}



 ?>