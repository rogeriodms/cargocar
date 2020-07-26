<?php
 class moto
{
    var $idmoto;
    var $volume;
    var $km;
    var $base;
    
    //-------------------------- ID ------------------------
    
    public function getIdmoto()
    {
        return $this->idmoto;
    }
    public function setIdmoto($value)
    {
        $this->idmoto = $value;
    }
    
    //------------------- valor por volume ---------------------
    
    public function getVolume()
    {
        return $this->volume;
    }
    public function setVolume($value)
    {
        $this->volume = $value;
    }
    
    //------------------- valor por km ---------------------
    
    public function getKm()
    {
        return $this->km;
    }
    public function setKm($value)
    {
        $this->km = $value;
    }
    
    //------------------- valor base ---------------------
    
    public function getBase()
    {
        return $this->base;
    }
    public function setBase($value)
    {
        $this->base = $value;
    }
    
    //------------------- carregando pelo ID ----------------
    public function loadById($id)
    {
        $sql = new sql();
        $result = $sql->select("SELECT * FROM moto WHERE idmoto = :ID", array(
            ":ID"=>$id
        ));
        
        if(count($result) > 0)
        {
            $row = $result[0];
            
            $this->setIdmoto($row['idmoto']);
            $this->setVolume($row['volume']);
            $this->setKm($row['km']);
            $this->setBase($row['base']);
        }
    }
    
    public function __toString()
    {
        return $retorno = json_encode(array(
        "idmoto"=>$this->getIdmoto(),
        "volume"=>$this->getVolume(),
        "km"=>$this->getKm(),
        "base"=>$this->getBase()
        ));
    }
     
     //---------------  Update moto ----------------------
    public function updateVolume($volume)
    {
        $this->setVolume($volume);
        $sql = new  sql();
        $sql->query("UPDATE moto SET volume = :volume WHERE idmoto = :ID", array(':volume'=>$this->getVolume(),
              ':ID'=>$this->getIdmoto()
            ));
    }
    public function updateKm($volume)
    {
        $this->setKm($volume);
        $sql = new  sql();
        $sql->query("UPDATE carro SET km = :volume WHERE idmoto = :ID", array(':volume'=>$this->getKm(),
              ':ID'=>$this->getIdmoto()
            ));
    }
    public function updateBase($volume)
    {
        $this->setBase($volume);
        $sql = new  sql();
        $sql->query("UPDATE carro SET base = :volume WHERE idmoto = :ID", array(':volume'=>$this->getBase(),
              ':ID'=>$this->getIdmoto()
            ));
    }
}


?>