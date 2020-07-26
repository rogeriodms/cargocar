<?php
 class van
{
    var $idvan;
    var $volume;
    var $km;
    var $base;
    
    //-------------------------- ID ------------------------
    
    public function getIdvan()
    {
        return $this->idvan;
    }
    public function setIdvan($value)
    {
        $this->idvan = $value;
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
        $result = $sql->select("SELECT * FROM van WHERE idvan = :ID", array(
            ":ID"=>$id
        ));
        
        if(count($result) > 0)
        {
            $row = $result[0];
            
            $this->setIdvan($row['idvan']);
            $this->setVolume($row['volume']);
            $this->setKm($row['km']);
            $this->setBase($row['base']);
        }
    }
    
    public function __toString()
    {
        return $retorno = json_encode(array(
        "idvan"=>$this->getIdvan(),
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
        $sql->query("UPDATE van SET volume = :volume WHERE idvan = :ID", array(':volume'=>$this->getVolume(),
              ':ID'=>$this->getIdvan()
            ));
    }
    public function updateKm($volume)
    {
        $this->setKm($volume);
        $sql = new  sql();
        $sql->query("UPDATE van SET km = :volume WHERE idvan = :ID", array(':volume'=>$this->getKm(),
              ':ID'=>$this->getIdvan()
            ));
    }
    public function updateBase($volume)
    {
        $this->setBase($volume);
        $sql = new  sql();
        $sql->query("UPDATE van SET base = :volume WHERE idvan = :ID", array(':volume'=>$this->getBase(),
              ':ID'=>$this->getIdvan()
            ));
    }
}


?>