<?php
header('Content-Type: application/json; charset=utf-8');

require_once("configsql.php");


if (isset($_REQUEST)) {
	echo Rest::open();
}

class Rest
{
	public static function open()
	{
	// ----------------- local origem ---------------------

  if(isset($_REQUEST["origem"]))
    {
         $origem =  $_REQUEST["origem"];
    }else
    {
        $origem = 0;
    }
     
// ----------------- local destino ---------------------

  if(isset($_REQUEST["destino"]))
    {
         $destino =  $_REQUEST["destino"];
    }else
    {
        $destino = 0;
    }
     
// ----------------- quantidade de peças ---------------------
    if(isset($_REQUEST["volume"]))
    {
         $volume =  $_REQUEST["volume"];
    }else
    {
        $volume = 1;
    }


// ----------------- categoria ---------------------
    if(isset($_REQUEST["categ"]))
    {
         $categ =  $_REQUEST["categ"];
    }else
    {
        $categ = "carro";
    }

            // ----------------- local origem ---------------------
     $localorigem = "https://geocoder.api.here.com/6.2/geocode.xml?searchtext=".$origem."&app_id=sBvldWkB7LmvjO3AWJLR&app_code=WWYCuGDGU8VN7JVRUPwJMA&gen=9";
    
    // ----------------- local destino ---------------------
    $localdestino = "https://geocoder.api.here.com/6.2/geocode.xml?searchtext=".$destino."&app_id=sBvldWkB7LmvjO3AWJLR&app_code=WWYCuGDGU8VN7JVRUPwJMA&gen=9";
    
    
     // tratando o erro de espaço
    $localorigem = str_replace(" ",'%20',$localorigem);
    $localdestino = str_replace(" ",'%20',$localdestino);
    
    //
    // tratando erro de http acentos e caracteres especiais
    $localorigem = str_replace("ã",'%C3%A3',$localorigem);
    $localorigem = str_replace("õ",'%C3%B5',$localorigem);
    $localorigem = str_replace("í",'%C3%AD',$localorigem);
    $localorigem = str_replace("é",'%C3%A9',$localorigem);
    $localorigem = str_replace("á",'%C3%81',$localorigem);
    $localorigem = str_replace("ó",'%C3%B3',$localorigem);
    $localorigem = str_replace("ú",'%C3%BA',$localorigem);
    $localorigem = str_replace("â",'%C3%A2',$localorigem);
    $localorigem = str_replace("ê",'%C3%AA',$localorigem);
    $localorigem = str_replace("ô",'%C3%B4',$localorigem);
    $localorigem = str_replace("à",'%C3%A0',$localorigem);

    $localdestino = str_replace("ã",'%C3%A3',$localdestino);
    $localdestino = str_replace("õ",'%C3%B5',$localdestino);
    $localdestino = str_replace("í",'%C3%AD',$localdestino);
    $localdestino = str_replace("é",'%C3%A9',$localdestino);
    $localdestino = str_replace("á",'%C3%81',$localdestino);
    $localdestino = str_replace("ó",'%C3%B3',$localdestino);
    $localdestino = str_replace("ú",'%C3%BA',$localdestino);
    $localdestino = str_replace("â",'%C3%A2',$localdestino);
    $localdestino = str_replace("ê",'%C3%AA',$localdestino);
    $localdestino = str_replace("ô",'%C3%B4',$localdestino);
    $localdestino = str_replace("à",'%C3%A0',$localdestino);


$origemxml =  simplexml_load_file($localorigem); 
$destinoxml = simplexml_load_file($localdestino);

$latorigem = $origemxml->Response->View->Result->Location->DisplayPosition->Latitude;
$longorigem = $origemxml->Response->View->Result->Location->DisplayPosition->Longitude;
    
$latdestino = $destinoxml->Response->View->Result->Location->DisplayPosition->Latitude;
$longdestino = $destinoxml->Response->View->Result->Location->DisplayPosition->Longitude;
    

 
   

     //url a carregar rota 
    $rota = "https://route.api.here.com/routing/7.2/calculateroute.xml?app_id=sySuXRtT8OKshqzCBk9g&app_code=5YzcPyArf2lDsDv7cBD8Zg&waypoint0=geo!".$latorigem.",".$longorigem."&waypoint1=geo!".$latdestino.",".$longdestino."&mode=fastest;car;traffic:disabled";
    



     ob_start();

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $rota);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_exec($ch);

     // xml de retorno  
     $rota = simplexml_load_file($rota);
     $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
 
    ob_end_clean();
    curl_close($ch);
//---------------------- km -------------------------

$tempo = $rota->Response->Route->Summary->TrafficTime;
$tempo = $tempo /60;
if($tempo >= 60)
{
         $duration = $duration / 60;
}

//---------------------- km -------------------------

 $KM= $rota->Response->Route->Summary->Distance;
 $KM = $KM / 1000;
      
 if($categ == "carro")
{
//--------------------- recebendo valores do banco de dados ---------------------
   if($KM < 300){
    //-----------------  carro ------------
     $classcar = new carro();
     $classcar->loadbyId(0);
     
         $adccar = $classcar->volume;
         $adccar = str_replace(",",'.',$adccar);
         $custokmcar = $classcar->km;
         $custokmcar = str_replace(",",'.',$custokmcar);
         $basecar = $classcar->base;
         $basecar = str_replace(",",'.',$basecar);
    
     $calccarro = ($KM * $custokmcar)+ $basecar +($volume * $adccar);
     $calccarro = $calccarro + 0.50;
     $calccarro = number_format($calccarro, 2, ',', '.');
     $KM = number_format($KM, 2, ',', '.');
     $tempo = number_format($tempo, 2, ',', '.');
    }else
   {
       $calccarro = "Kilometragem maior do que permitido por esta categoria, que é de 300km";
   }
    
    
      $resultados = array();
           $resultados[0] = $calccarro ;
           $resultados[1] = $KM ;
            $resultados[2] = $tempo ;
        
             if ($KM > 0)
{
    return json_encode(array('status' => 'sucesso', 'dados' => $resultados)); 
}else
{
     return json_encode(array('status' => 'falha', 'dados' => 'sem indereços'));
}      
        
}

 if($categ == "moto")
{
    if($KM < 300){

        //------------------ moto --------------
     $classmoto = new moto();
     $classmoto->loadbyId(0);
         $adcmoto = $classmoto->volume;
         $adcmoto = str_replace(",",'.',$adcmoto);
         $custokmmoto = $classmoto->km;
         $custokmmoto = str_replace(",",'.',$custokmmoto);
         $basemoto = $classmoto->base;
         $basemoto = str_replace(",",'.',$basemoto);
    
      $calcmoto = ($KM * $custokmmoto) + $basemoto +($volume * $adcmoto);
    $calcmoto = $calcmoto + 0.50;
     $calcmoto = number_format($calcmoto, 2, ',', '.');
     }else
   {
       $calccarro = "Kilometragem maior do que permitido por esta categoria, que é de 300km";
   }
    
     $resultados = array();
           $resultados[0] = $calcmoto ;
           $resultados[1] = $KM ;
            $resultados[2] = $tempo ;
          if ($KM > 0)
{
    return json_encode(array('status' => 'sucesso', 'dados' => $resultados)); 
}else
{
     return json_encode(array('status' => 'falha', 'dados' => 'sem indereços'));
}      
}

 if($categ == "pickup")
{

      //------------------ pickup --------------
    $classpickup = new pickup();
     $classpickup->loadbyId(0);
         $adcpickup = $classpickup->volume;
         $adcpickup = str_replace(",",'.',$adcpickup);
         $custokmpickup = $classpickup->km;
         $custokmpickup = str_replace(",",'.',$custokmpickup);
         $basepickup = $classpickup->base;
         $basepickup = str_replace(",",'.',$basepickup);
    
     $calcpickup = (($KM * $custokmpickup) + $basepickup +($volume * $adcpickup));
     $calcpickup = $calcpickup + 0.50;
     $calcpickup = number_format($calcpickup, 2, ',', '.');
    
     $resultados = array();
           $resultados[0] = $calcpickup ;
           $resultados[1] = $KM ;
            $resultados[2] = $tempo ;
          if ($KM > 0)
{
    return json_encode(array('status' => 'sucesso', 'dados' => $resultados)); 
}else
{
     return json_encode(array('status' => 'falha', 'dados' => 'sem indereços'));
}      
     
}

 if($categ == "van")
{

      //------------------ van --------------
    $classvan = new van();
     $classvan->loadbyId(0);
         $adcvan = $classvan->volume;
         $adcvan = str_replace(",",'.',$adcvan);
         $custokmvan = $classvan->km;
         $custokmvan = str_replace(",",'.',$custokmvan);
         $basevan = $classvan->base;
         $basevan = str_replace(",",'.',$basevan);
    
     $calcvan = (($KM * $custokmvan)+ $basevan +($volume * $adcvan));
     $calcvan = $calcvan + 0.50;
     $calcvan = number_format($calcvan, 2, ',', '.');
     
       $resultados = array();
           $resultados[0] = $calcvan ;
           $resultados[1] = $KM ;
            $resultados[2] = $tempo ;
          if ($KM > 0)
{
    return json_encode(array('status' => 'sucesso', 'dados' => $resultados)); 
}else
{
     return json_encode(array('status' => 'falha', 'dados' => 'sem indereços'));
}      
     
    
}
 if($categ == "truck")
{

      //------------------ van --------------
    //------------------ truck --------------
    $classtruck = new truck();
     $classtruck->loadbyId(0);
         $adctruck = $classtruck->volume;
         $adctruck = str_replace(",",'.',$adctruck);
         $custokmtruck = $classtruck->km;
         $custokmtruck = str_replace(",",'.',$custokmtruck);
         $basetruck = $classtruck->base;
         $basetruck = str_replace(",",'.',$basetruck);
    
      $calctruck = (($KM * $custokmtruck)+ $basetruck +($volume * $adctruck));
      $calctruck = $calctruck + 0.50;
     $calctruck = number_format($calctruck, 2, ',', '.');
     
      $resultados = array();
           $resultados[0] = $calctruck ;
           $resultados[1] = $KM ;
            $resultados[2] = $tempo ;
     if ($KM > 0)
{
    return json_encode(array('status' => 'sucesso', 'dados' => $resultados)); 
}else
{
     return json_encode(array('status' => 'falha', 'dados' => 'sem indereços'));
}      
     
   
 }
     

          

    
        
        
    }
}


?>