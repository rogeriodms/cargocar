<?php
 class pickup
{
    var $idpickup;
    var $volume;
    var $km;
    var $base;
    
    //-------------------------- ID ------------------------
    
    public function getIdpickup()
    {
        return $this->idpickup;
    }
    public function setIdpickup($value)
    {
        $this->idpickup = $value;
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
        $result = $sql->select("SELECT * FROM pickup WHERE idpickup = :ID", array(
            ":ID"=>$id
        ));
        
        if(count($result) > 0)
        {
            $row = $result[0];
            
            $this->setIdpickup($row['idpickup']);
            $this->setVolume($row['volume']);
            $this->setKm($row['km']);
            $this->setBase($row['base']);
        }
    }
    
    public function __toString()
    {
        return $retorno = json_encode(array(
        "idpickup"=>$this->getIdpickup(),
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
        $sql->query("UPDATE pickup SET volume = :volume WHERE idpickup = :ID", array(':volume'=>$this->getVolume(),
              ':ID'=>$this->getIdpickup()
            ));
    }
    public function updateKm($volume)
    {
        $this->setKm($volume);
        $sql = new  sql();
        $sql->query("UPDATE pickup SET km = :volume WHERE idpickup = :ID", array(':volume'=>$this->getKm(),
              ':ID'=>$this->getIdpickup()
            ));
    }
    public function updateBase($volume)
    {
        $this->setBase($volume);
        $sql = new  sql();
        $sql->query("UPDATE pickup SET base = :volume WHERE idpickup = :ID", array(':volume'=>$this->getBase(),
              ':ID'=>$this->getIdpickup()
            ));
    }
}


?>