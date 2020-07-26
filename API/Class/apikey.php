<?php

class apikey
{
    var $idkey;
    var $keys;
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
    
  
    //------------------- carregando pelo ID ----------------
    public function loadById($id)
    {
        $sql = new sql();
        $result = $sql->select("SELECT * FROM chaves WHERE id = :ID", array(
            ":ID"=>$id
        ));
        
        if(count($result) > 0)
        {
            $row = $result[0];
            
            $this->setIdkey($row['id']);
            $this->setKey($row['chave']);
            
        }
    }
    
    public function __toString()
    {
        return $retorno = json_encode(array(
        "id"=>$this->getIdkey(),
        "chave"=>$this->getKey(),
       
        ));
    }
    
  
}



 ?>