<?php
    require_once("configsql.php");

    

    // ----------------- local origem ---------------------
    if(isset($_REQUEST["autocomplete"]))
    {
         $origins =  $_REQUEST["autocomplete"];
        
    }else
    {
        $origins = 0;
    }
    // ----------------- local destino ---------------------
    if(isset($_REQUEST["autocomplete1"]))
    {
        $destination = $_REQUEST["autocomplete1"];
        
    }else
    {
        $destination = 0;
    }
    // ----------------- quantidade de peças ---------------------
    if(isset($_REQUEST["volume"]))
    {
         $volume =  $_REQUEST["volume"];
    }else
    {
        $volume = 0;
    }

    $origins1 = $origins;
    $destination1 = $destination;

    $origins = str_replace("ã",'%C3%A3',$origins);
    $origins = str_replace("õ",'%C3%B5',$origins);
    $origins = str_replace("í",'%C3%AD',$origins);
    $origins = str_replace("é",'%C3%A9',$origins);
    $origins = str_replace("á",'%C3%81',$origins);
    $origins = str_replace("ó",'%C3%B3',$origins);
    $origins = str_replace("ú",'%C3%BA',$origins);
    $origins = str_replace("â",'%C3%A2',$origins);
    $origins = str_replace("ê",'%C3%AA',$origins);
    $origins = str_replace("ô",'%C3%B4',$origins);
    $origins = str_replace("à",'%C3%A0',$origins);
 
    $destination = str_replace("ã",'%C3%A3',$destination);
    $destination = str_replace("õ",'%C3%B5',$destination);
    $destination = str_replace("í",'%C3%AD',$destination);
    $destination = str_replace("é",'%C3%A9',$destination);
    $destination = str_replace("á",'%C3%81',$destination);
    $destination = str_replace("ó",'%C3%B3',$destination);
    $destination = str_replace("ú",'%C3%BA',$destination);
    $destination = str_replace("â",'%C3%A2',$destination);
    $destination = str_replace("ê",'%C3%AA',$destination);
    $destination = str_replace("ô",'%C3%B4',$destination);
    $destination = str_replace("à",'%C3%A0',$destination);



    //chave api 
    $params["key"] = "AIzaSyCnmEz07Lv6RHVwHxdvSJ4l8U-tF8tCIqY";

    //url a carregar
   $urlc = "https://maps.googleapis.com/maps/api/distancematrix/xml?&origins=".$origins."&destinations=".$destination."&mode=driving&".http_build_query($params);
    // tratando o erro de espaço e caracteres diferentes 
    $url = str_replace(" ",'%20',$urlc);
    
    ob_start();

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_exec($ch);

    // xml de retorno  
    //$resposta = json_decode($url); 
    $resposta = simplexml_load_file($url); 
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
 
   ob_end_clean();
   curl_close($ch);

   //--------------------- recebendo valores do banco de dados ---------------------
     //-----------------  carro ------------
     $classcar = new carro();
     $classcar->loadbyId(0);
     
         $adccar = $classcar->volume;
         $adccar = str_replace(",",'.',$adccar);
         $custokmcar = $classcar->km;
         $custokmcar = str_replace(",",'.',$custokmcar);
         $basecar = $classcar->base;
         $basecar = str_replace(",",'.',$basecar);
    //------------------ moto --------------
     $classmoto = new moto();
     $classmoto->loadbyId(0);
         $adcmoto = $classmoto->volume;
         $adcmoto = str_replace(",",'.',$adcmoto);
         $custokmmoto = $classmoto->km;
         $custokmmoto = str_replace(",",'.',$custokmmoto);
         $basemoto = $classmoto->base;
         $basemoto = str_replace(",",'.',$basemoto);
    //------------------ pickup --------------
    $classpickup = new pickup();
     $classpickup->loadbyId(0);
         $adcpickup = $classpickup->volume;
         $adcpickup = str_replace(",",'.',$adcpickup);
         $custokmpickup = $classpickup->km;
         $custokmpickup = str_replace(",",'.',$custokmpickup);
         $basepickup = $classpickup->base;
         $basepickup = str_replace(",",'.',$basepickup);
    //------------------ van --------------
    $classvan = new van();
     $classvan->loadbyId(0);
         $adcvan = $classvan->volume;
         $adcvan = str_replace(",",'.',$adcvan);
         $custokmvan = $classvan->km;
         $custokmvan = str_replace(",",'.',$custokmvan);
         $basevan = $classvan->base;
         $basevan = str_replace(",",'.',$basevan);
    //------------------ truck --------------
    $classtruck = new truck();
     $classtruck->loadbyId(0);
         $adctruck = $classtruck->volume;
         $adctruck = str_replace(",",'.',$adctruck);
         $custokmtruck = $classtruck->km;
         $custokmtruck = str_replace(",",'.',$custokmtruck);
         $basetruck = $classtruck->base;
         $basetruck = str_replace(",",'.',$basetruck);
         //$valorfrete = 7.00;   


      $erro = $resposta->origin_address;
      $erro1 = $resposta->destination_address;
  if(isset($_REQUEST["autocomplete"]) && ($_REQUEST["autocomplete1"])){
      $status = $resposta->row->element->status;
  }
      //calculo da quantidade ganha no flex
      //$calcvolume = $volume * $valorfrete;
  
if ($volume > 0){
if ($status == "OK" ){ 
    //valor em metros para calculo
      $distance = $resposta->row->element->distance->value;
      //duração em segundos para calculo
      $duration = $resposta->row->element->duration->value;
      //calculo de transformação das variaveis
      $distance = $distance / 1000;
      $duration = $duration / 60;
      if($duration >= 60)
      {
         $duration = $duration / 60;
      }
      
  if($distance < 1) 
  {
                $exibemoto = "Insira o endereço com numero valido <br>";
                $exibecar = "Insira o endereço com numero valido <br>";
                $exibepickup = "Insira o endereço com numero valido <br>";
                $exibevan = "Insira o endereço com numero valido <br>";
                $exibetruck = "Insira o endereço com numero valido <br>";
                $kmcliente = "KM: 0,00";
                $tempclient =" 0h 00min";
               
  }else
  { 
     //$distance = number_format($distance, 2, ',', '.');
      
      if ($distance < 300)
       {
         $calcmoto = ($distance * $custokmmoto) + $basemoto +($volume * $adcmoto);
         $calccarro = ($distance * $custokmcar)+ $basecar +($volume * $adccar);
         
         $calcmoto = number_format($calcmoto, 2, ',', '.');
         $calccarro = number_format($calccarro, 2, ',', '.');
          
         $exibemoto = "Valor do Frete: R$ ".$calcmoto."<br>";
         $exibecar = "Valor do Frete: R$ ".$calccarro."<br>";
         
       }else
      {
          $exibemoto = "A quantidade maxima de Km para este modal é 300Km <br>";
          $exibecar = "A quantidade maxima de Km para este modal é 300Km <br>";
      }
      //calculo restante pickup, van e caminhão 
       $calcpickup = (($distance * $custokmpickup) + $basepickup +($volume * $adcpickup));
       $calcvan = (($distance * $custokmvan)+ $basevan +($volume * $adcvan));
       $calctruck = (($distance * $custokmtruck)+ $basetruck +($volume * $adctruck));
      
       $kmcliente = $resposta->row->element->distance->text;
       $tempclient = $resposta->row->element->duration->text;
      
       $calcpickup = number_format($calcpickup, 2, ',', '.');
       $calcvan = number_format($calcvan, 2, ',', '.');
       $calctruck = number_format($calctruck, 2, ',', '.');
       
     
       $exibepickup = "Valor do Frete: R$ ".$calcpickup."<br>";
       $exibevan = "Valor do Frete: R$ ".$calcvan."<br>";
       $exibetruck = "Valor do Frete: R$ ".$calctruck."<br>";
         
   }
}else
{
    $exibemoto = "Certifique-se que tenha digitado um endereço valido <br>";
    $exibecar = "Certifique-se que tenha digitado um endereço valido <br>";
    $exibepickup = "Certifique-se que tenha digitado um endereço valido <br>";
    $exibevan = "Certifique-se que tenha digitado um endereço validoe <br>";
    $exibetruck = "Certifique-se que tenha digitado um endereço valido <br>";
}
}else
{  
    
    $exibemoto="Quantidade de volumes inserida <br>";
    $exibecar="Quantidade de volumes inserida <br>";
    $exibepickup="Quantidade de volumes inserida <br>";
    $exibevan="Quantidade de volumes inserida <br>";
    $exibetruck="Quantidade de volumes inserida <br>";
}

?>