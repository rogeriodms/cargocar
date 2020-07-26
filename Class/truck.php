<?php
 class truck
{
    var $idtruck;
    var $volume;
    var $km;
    var $base;
    
    //-------------------------- ID ------------------------
    
    public function getIdtruck()
    {
        return $this->idtruck;
    }
    public function setIdtruck($value)
    {
        $this->idtruck = $value;
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
        $result = $sql->select("SELECT * FROM truck WHERE idtruck = :ID", array(
            ":ID"=>$id
        ));
        
        if(count($result) > 0)
        {
            $row = $result[0];
            
            $this->setIdtruck($row['idtruck']);
            $this->setVolume($row['volume']);
            $this->setKm($row['km']);
            $this->setBase($row['base']);
        }
    }
    
    public function __toString()
    {
        return $retorno = json_encode(array(
        "idtruck"=>$this->getIdtruck(),
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
        $sql->query("UPDATE truck SET volume = :volume WHERE idtruck = :ID", array(':volume'=>$this->getVolume(),
              ':ID'=>$this->getIdtruck()
            ));
    }
    public function updateKm($volume)
    {
        $this->setKm($volume);
        $sql = new  sql();
        $sql->query("UPDATE truck SET km = :volume WHERE idtruck = :ID", array(':volume'=>$this->getKm(),
              ':ID'=>$this->getIdtruck()
            ));
    }
    public function updateBase($volume)
    {
        $this->setBase($volume);
        $sql = new  sql();
        $sql->query("UPDATE truck SET base = :volume WHERE idtruck = :ID", array(':volume'=>$this->getBase(),
              ':ID'=>$this->getIdtruck()
            ));
    }
}


?>