<?php
header('Content-Type: text/xml');

require_once("configsql.php");

$i;
$C;
	// ----------------- local origem ---------------------
  if(isset($_REQUEST["cep"]))
    {
         $origem =  $_REQUEST["cep"];
    }else
    {
        $origem = 0;
    }
     
// ----------------- local destino ---------------------

  if(isset($_REQUEST["cep_destino"]))
    {
         $destino =  $_REQUEST["cep_destino"];
    }else
    {
        $destino = 0;
    }
     
// ----------------- quantidade de peças ---------------------
    if(isset($_REQUEST["prods"]))
    {
         $variaveis =  $_REQUEST["prods"];
         $variaveis = explode(';',$variaveis);
         $volume = intval($variaveis[4]);
         $peso = doubleval($variaveis[5]);
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
    if(isset($_REQUEST["token"]))
    {
         $token =  $_REQUEST["token"];
    }else
    {
        $token= "x";
    }


    $acess = new apikey();
    $acess->loadbyId($token);
    $key = $acess->keys;
    $keyt = $acess->log;
    $acu = $keyt;
    $acu++; 
    $aid = $acu;

    $update = new apikey();
    $update->update($key,$aid);

   if($key == $token){
     // ----------------- local origem ---------------------
    $localorigem = "https://viacep.com.br/ws/$origem/xml/";
    // ----------------- local destino ---------------------
    $localdestino = "https://viacep.com.br/ws/$destino/xml/";
     

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

$logdestino  = $destinoxml->logradouro;
$baidestino  = $destinoxml->bairro;
$locadestino  = $destinoxml->localidade;
$ufdestino  = $destinoxml->uf;

$logorigem = $origemxml->logradouro;
$baiorigem = $origemxml->bairro;
$locaorigem = $origemxml->localidade;
$ufrigem = $origemxml->uf;

$teste = "https://nominatim.openstreetmap.org/search/$ufrigem/$locaorigem/$logorigem/1720?format=xml&polygon=1&addressdetails=1&email=rogeritos260298@gmail.com";
$teste1 = "https://nominatim.openstreetmap.org/search/$ufdestino/$locadestino/$logdestino/1720?format=xml&polygon=1&addressdetails=1&email=rogeritos260298@gmail.com";

$teste = str_replace(" ",'%20',$teste);

$teste = str_replace("ã",'%C3%A3',$teste);
$teste = str_replace("õ",'%C3%B5',$teste);
$teste = str_replace("í",'%C3%AD',$teste);
$teste = str_replace("é",'%C3%A9',$teste);
$teste = str_replace("á",'%C3%81',$teste);
$teste = str_replace("ó",'%C3%B3',$teste);
$teste = str_replace("ú",'%C3%BA',$teste);
$teste = str_replace("â",'%C3%A2',$teste);
$teste = str_replace("ê",'%C3%AA',$teste);
$teste = str_replace("ô",'%C3%B4',$teste);
$teste = str_replace("à",'%C3%A0',$teste);


$teste1 = str_replace(" ",'%20',$teste1);

$teste1 = str_replace("ã",'%C3%A3',$teste1);
$teste1 = str_replace("õ",'%C3%B5',$teste1);
$teste1 = str_replace("í",'%C3%AD',$teste1);
$teste1 = str_replace("é",'%C3%A9',$teste1);
$teste1 = str_replace("á",'%C3%81',$teste1);
$teste1 = str_replace("ó",'%C3%B3',$teste1);
$teste1 = str_replace("ú",'%C3%BA',$teste1);
$teste1 = str_replace("â",'%C3%A2',$teste1);
$teste1 = str_replace("ê",'%C3%AA',$teste1);
$teste1 = str_replace("ô",'%C3%B4',$teste1);
$teste1 = str_replace("à",'%C3%A0',$teste1);

$teste = simplexml_load_file($teste);
$teste1 = simplexml_load_file($teste1);


$latorigem = $teste->place["lat"];
$longorigem = $teste->place["lon"];
    
$latdestino = $teste1->place["lat"];
$longdestino = $teste1->place["lon"];
  
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
    $tempo = $tempo / 60;
 
}

$dias = $tempo/1440;
$dias = number_format($dias, 4, ',', '.');
if($dias < 1){

    $dias = 1;

}


//---------------------- km -------------------------

 $KM= $rota->Response->Route->Summary->Distance;
 $KM = $KM / 1000;
 
 

 if($categ == "carro")
{
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
    
     $calccarro = ($KM * $custokmcar)+ $basecar +($volume * $adccar);
     $calccarro = $calccarro + 0.50;
     $calccarro = number_format($calccarro, 2, ',', '.');
     $KM = number_format($KM, 2, ',', '.');
     $tempo = number_format($tempo, 2, ',', '.');
    
        
if ($KM > 0)
{
$xml = new DOMDocument('1.0','ISO-8859-1');
$xml->preserveWhiteSpace = false;
$xml->formatOutput = true;

$cotacao = $xml->createElement('cotacao');
$resultados = $xml->createElement('resultado');           

$codigo = $xml->createElement('codigo',utf8_encode($keyt));
$transportadora = $xml->createElement('transportadora',utf8_encode('CarGo'));
$servico = $xml->createElement('servico',utf8_encode('cargo car'));
$transporte = $xml->createElement('transporte',utf8_encode($categ));
$valor = $xml->createElement('valor',utf8_encode($calccarro));
$peso = $xml->createElement('peso',utf8_encode($peso));
/*$km =$xml->createElement('KM',utf8_encode($KM));*/
$prazomin = $xml->createElement('prazo_min',utf8_encode($dias));
$prazomax = $xml->createElement('prazo_max',utf8_encode($dias));

$resultados->appendChild($codigo);
$resultados->appendChild($transportadora);
$resultados->appendChild($servico);
$resultados->appendChild($transporte);
$resultados->appendChild($valor);
$resultados->appendChild($peso);
//$resultados->appendChild($km);
$resultados->appendChild($prazomin);
$resultados->appendChild($prazomax);

              
$cotacao->appendChild($resultados);
$xml->appendChild($cotacao);
echo $xml->saveXML();

}else
{
     
}      
}

 if($categ == "moto")
{

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
if ($KM > 0)
{
    $xml = new DOMDocument('1.0','ISO-8859-1');
    $xml->preserveWhiteSpace = false;
    $xml->formatOutput = true;
    
    $cotacao = $xml->createElement('cotacao');
    $resultados = $xml->createElement('resultado');           
    
    $codigo = $xml->createElement('codigo',utf8_encode($id));
    $transportadora = $xml->createElement('transportadora',utf8_encode('CarGo'));
    $servico = $xml->createElement('servico',utf8_encode('moto cargo'));
    $transporte = $xml->createElement('transporte',utf8_encode($categ));
    $valor = $xml->createElement('valor',utf8_encode($calcmoto));
    $peso = $xml->createElement('peso',utf8_encode($peso));
   /* $km =$xml->createElement('KM',utf8_encode($KM));*/
   $prazomin = $xml->createElement('prazo_min',utf8_encode($dias));
   $prazomax = $xml->createElement('prazo_max',utf8_encode($dias));
    
    $resultados->appendChild($codigo);
    $resultados->appendChild($transportadora);
    $resultados->appendChild($servico);
    $resultados->appendChild($transporte);
    $resultados->appendChild($valor);
    $resultados->appendChild($peso);
    //$resultados->appendChild($km);
    $resultados->appendChild($prazomin);
    $resultados->appendChild($prazomax);
    
    $cotacao->appendChild($resultados);
    $xml->appendChild($cotacao);
    echo $xml->saveXML();
    
}else
{
     
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

if ($KM > 0)
{
    $xml = new DOMDocument('1.0','ISO-8859-1');
    $xml->preserveWhiteSpace = false;
    $xml->formatOutput = true;
    
    $cotacao = $xml->createElement('cotacao');
    $resultados = $xml->createElement('resultado');           
    
    $codigo = $xml->createElement('codigo',utf8_encode($id2));
    $transportadora = $xml->createElement('transportadora',utf8_encode('CarGo'));
    $servico = $xml->createElement('servico',utf8_encode('pickup cargo'));
    $transporte = $xml->createElement('transporte',utf8_encode($categ));
    $valor = $xml->createElement('valor',utf8_encode($calcpickup));
    $peso = $xml->createElement('peso',utf8_encode($peso));
    /*$km =$xml->createElement('KM',utf8_encode($KM));*/
    $prazomin = $xml->createElement('prazo_min',utf8_encode($dias));
    $prazomax = $xml->createElement('prazo_max',utf8_encode($dias));
    
    $resultados->appendChild($codigo);
    $resultados->appendChild($transportadora);
    $resultados->appendChild($servico);
    $resultados->appendChild($transporte);
    $resultados->appendChild($valor);
    $resultados->appendChild($peso);
    //$resultados->appendChild($km);
    $resultados->appendChild($prazomin);
    $resultados->appendChild($prazomax);
    
    $cotacao->appendChild($resultados);
    $xml->appendChild($cotacao);
    echo $xml->saveXML();
    
    
}else
{
    
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
     
if ($KM > 0)
{
    $xml = new DOMDocument('1.0','ISO-8859-1');
    $xml->preserveWhiteSpace = false;
    $xml->formatOutput = true;
    
    $cotacao = $xml->createElement('cotacao');
    $resultados = $xml->createElement('resultado');           
    
    $codigo = $xml->createElement('codigo',utf8_encode($id));
    $transportadora = $xml->createElement('transportadora',utf8_encode('CarGo'));
    $servico = $xml->createElement('servico',utf8_encode('furgo cargo'));
    $transporte = $xml->createElement('transporte',utf8_encode($categ));
    $valor = $xml->createElement('valor',utf8_encode($calcvan));
    $peso = $xml->createElement('peso',utf8_encode($peso));
    /*$km =$xml->createElement('KM',utf8_encode($KM));*/
    $prazomin = $xml->createElement('prazo_min',utf8_encode($dias));
    $prazomax = $xml->createElement('prazo_max',utf8_encode($dias));
    $resultados->appendChild($codigo);
    $resultados->appendChild($transportadora);
    $resultados->appendChild($servico);
    $resultados->appendChild($transporte);
    $resultados->appendChild($valor);
    $resultados->appendChild($peso);
    //$resultados->appendChild($km);
    $resultados->appendChild($prazomin);
    $resultados->appendChild($prazomax);
    
    $cotacao->appendChild($resultados);
    $xml->appendChild($cotacao);
    echo $xml->saveXML();

}else
{
    
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
     
      
if ($KM > 0)
{
    $xml = new DOMDocument('1.0','ISO-8859-1');
    $xml->preserveWhiteSpace = false;
    $xml->formatOutput = true;
    
    $cotacao = $xml->createElement('cotacao');
    $resultados = $xml->createElement('resultado');   

    $codigo = $xml->createElement('codigo',utf8_encode($id));
    $transportadora = $xml->createElement('transportadora',utf8_encode('CarGo'));
    $servico = $xml->createElement('servico',utf8_encode('truck cargo'));
    $transporte = $xml->createElement('transporte',utf8_encode($categ));
    $valor = $xml->createElement('valor',utf8_encode($calctruck));
    $peso = $xml->createElement('peso',utf8_encode($peso));
   /* $km =$xml->createElement('KM',utf8_encode($KM));*/
   $prazomin = $xml->createElement('prazo_min',utf8_encode($dias));
   $prazomax = $xml->createElement('prazo_max',utf8_encode($dias));
    
    $resultados->appendChild($codigo);
    $resultados->appendChild($transportadora);
    $resultados->appendChild($servico);
    $resultados->appendChild($transporte);
    $resultados->appendChild($valor);
    $resultados->appendChild($peso);
    //$resultados->appendChild($km);
    $resultados->appendChild($prazomin);
    $resultados->appendChild($prazomax);
    
    $cotacao->appendChild($resultados);
    $xml->appendChild($cotacao);
    echo $xml->saveXML();
}else
{
  
}      
     
   
}     

}
else
{
    $xml = new DOMDocument('1.0','ISO-8859-1');
    $xml->preserveWhiteSpace = false;
    $xml->formatOutput = true;
    
    $cotacao = $xml->createElement('cotacao');
    $resultados = $xml->createElement('resultado');   
    
    $codigo = $xml->createElement('codigo',utf8_encode($id));
    
    
    $resultados->appendChild($codigo);
    
    
    $cotacao->appendChild($resultados);
    $xml->appendChild($cotacao);
    echo $xml->saveXML();
}

?>