<?php
    require_once("configsql.php");
//-------------------------------------------- Modificações --------------------------------------------

//--------------------------- carro -------------------------

// ----------------- >Adicional por itens:< ---------------------
    if(isset($_REQUEST["campo3"]))
    {
         $volume =  $_REQUEST["campo3"];
        if($volume != 0){
         $modific = new carro();
         $modific->loadById(0);
         $modific->updateVolume($volume);
        }
    }else
    {
        
    }
    // ----------------- >Preço por KM:< ---------------------
    if(isset($_REQUEST["campo4"]))
    {
        $volume = $_REQUEST["campo4"];
        if($volume != 0){
        $modific = new carro();
        $modific->loadById(0);
        $modific->updateKm($volume);
        }
    }else
    {
       
    }
// ----------------- preço base ---------------------  
    if(isset($_REQUEST["campo5"]))
    {
        $volume =  $_REQUEST["campo5"];
        if($volume != 0){
        $modific = new carro();
        $modific->loadById(0);
        $modific->updateBase($volume);
        }
    }else
    {
        
    }

//--------------------------- Moto -------------------------


// ----------------- >Adicional por itens:< ---------------------
    if(isset($_REQUEST["campo6"]))
    {
        $volume =  $_REQUEST["campo6"];
        if($volume != 0){
        $modific = new moto();
        $modific->loadById(0);
        $modific->updateVolume($volume);
        }
    }else
    {
      
    }
     // ----------------- >Preço por KM:< ---------------------
    if(isset($_REQUEST["campo7"]))
    {
       $volume =  $_REQUEST["campo7"];
        if($volume != 0){
        $modific = new moto();
        $modific->loadById(0);
        $modific->updateKm($volume);
        }
    }else
    {
        
    }
    // ----------------- preço base ---------------------  -
    if(isset($_REQUEST["campo8"]))
    {
         $volume =  $_REQUEST["campo8"];
        if($volume != 0){
        $modific = new moto();
        $modific->loadById(0);
        $modific->updateBase($volume);
        }
    }else
    {
        
    }

//--------------------------- pickup -------------------------

// ----------------- local origem ---------------------
    if(isset($_REQUEST["campo9"]))
    {
       $volume =  $_REQUEST["campo9"];
        if($volume != 0){
        $modific = new pickup();
        $modific->loadById(0);
        $modific->updateVolume($volume);
        }
    }else
    {
        
    }
    // ----------------- local destino ---------------------
    if(isset($_REQUEST["campo10"]))
    {
         $volume =  $_REQUEST["campo10"];
        if($volume != 0){
        $modific = new pickup();
        $modific->loadById(0);
        $modific->updateKm($volume);
        }
    }else
    {
       
    }
    // ----------------- quantidade de peças ---------------------
    if(isset($_REQUEST["campo11"]))
    {
          $volume =  $_REQUEST["campo11"];
        if($volume != 0){
        $modific = new pickup();
        $modific->loadById(0);
        $modific->updateBase($volume);
        }
    }else
    {
        
    }

//--------------------------- VAN -------------------------

// ----------------- local origem ---------------------
    if(isset($_REQUEST["campo12"]))
    {
          $volume =  $_REQUEST["campo12"];
        if($volume != 0){
        $modific = new van();
        $modific->loadById(0);
        $modific->updatevolume($volume);
        }
    }else
    {
     
    }
    // ----------------- local destino ---------------------
    if(isset($_REQUEST["campo13"]))
    {
        $volume =  $_REQUEST["campo13"];
        if($volume != 0){
        $modific = new van();
        $modific->loadById(0);
        $modific->updateKm($volume);
        }
    }else
    {
        
    }
    // ----------------- quantidade de peças ---------------------
    if(isset($_REQUEST["campo14"]))
    {
        $volume =  $_REQUEST["campo14"];
        if($volume != 0){
        $modific = new van();
        $modific->loadById(0);
        $modific->updateBase($volume);
        }
    }else
    {
      
    }


//--------------------------- truck -------------------------

// ----------------- local origem ---------------------
    if(isset($_REQUEST["campo15"]))
    {
        $volume =  $_REQUEST["campo15"];
        if($volume != 0){
        $modific = new truck();
        $modific->loadById(0);
        $modific->updateVolume($volume);
        }
    }else
    {
        $origins = 0;
    }
    // ----------------- local destino ---------------------
    if(isset($_REQUEST["campo16"]))
    {
        $volume =  $_REQUEST["campo16"];
        if($volume != 0)
        {
          $modific = new truck();
        $modific->loadById(0);
        $modific->updateKm($volume);;  
        }
        
    }else
    {
        
    }
    if(isset($_REQUEST["campo17"]))
    {
       $volume =  $_REQUEST["campo17"];
        if($volume != 0){
        $modific = new truck();
        $modific->loadById(0);
        $modific->updateBase($volume);;
        }
    }else
    {
        
    }
      


?>