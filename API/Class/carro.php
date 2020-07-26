<?php
    
class carro
{
    var $idcarro;
    var $volume;
    var $km;
    var $base;
    
    //-------------------------- ID ------------------------
    
    public function getIdcarro()
    {
        return $this->idcarro;
    }
    public function setIdcarro($value)
    {
        $this->idcarro = $value;
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
        $result = $sql->select("SELECT * FROM carro WHERE idcarro = :ID", array(
            ":ID"=>$id
        ));
        
        if(count($result) > 0)
        {
            $row = $result[0];
            
            $this->setIdcarro($row['idcarro']);
            $this->setVolume($row['volume']);
            $this->setKm($row['km']);
            $this->setBase($row['base']);
        }
    }
    
    public function __toString()
    {
        return $retorno = json_encode(array(
        "idcarro"=>$this->getIdcarro(),
        "volume"=>$this->getVolume(),
        "km"=>$this->getKm(),
        "base"=>$this->getBase()
        ));
    }
    
    //---------------  Update carro ----------------------
    public function updateVolume($volume)
    {
        $this->setVolume($volume);
        $sql = new  sql();
        $sql->query("UPDATE carro SET volume = :volume WHERE idcarro = :ID", array(':volume'=>$this->getVolume(),
              ':ID'=>$this->getIdcarro()
            ));
    }
    public function updateKm($volume)
    {
        $this->setKm($volume);
        $sql = new  sql();
        $sql->query("UPDATE carro SET km = :volume WHERE idcarro = :ID", array(':volume'=>$this->getKm(),
              ':ID'=>$this->getIdcarro()
            ));
    }
    public function updateBase($volume)
    {
        $this->setBase($volume);
        $sql = new  sql();
        $sql->query("UPDATE carro SET base = :volume WHERE idcarro = :ID", array(':volume'=>$this->getBase(),
              ':ID'=>$this->getIdcarro()
            ));
    }
}


?>