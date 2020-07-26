<?php
    session_start();
    require_once("requestapi.php");
    error_reporting(0); 
     
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  
  <title>Cargo Car</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Site Cargo Car</title>
    
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	               <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	                   <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
                            
     
    <link href="style.css" rel="stylesheet">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
       
        #home{
            margin-right: 36%;
           
        }
        #logo{
            margin-left: 29%;
        }
        
        #wpp-btn-fixo {
            width: 20%;
            height: 20%;
            
        
       }
        
        #mostrar{
            color: #000;
            font-family: sans-serif;
            font-size: 140%;
           
    }
        #fundo{
        background-color: #fff;
        margin: center;
        text-align: center;
        display: block;
        padding: auto;    
    }
        #resultado{
            padding: auto;
        }
        #map {
        width: 100%;
        height: 35%;
        position: absolute;
        margin-top: -300px;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
        @media only screen and (max-width: 480px){
        .card{
        display: block;
        }
    }
    </style>
    
        <script>
// This sample uses the Autocomplete widget to help the user select a
// place, then it retrieves the address components associated with that
// place, and then it populates the form fields with those details.
// This sample requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script
// src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

var placeSearch, autocomplete, map;

        
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();
  var place = autocomplete1.getPlace();
  
  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
      
    }
  }
}

    
            
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle(
          {center: geolocation, radius: position.coords.accuracy});
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
            
function geolocate1() {
  if (navigator.geolocation1) {
    navigator.geolocation1.getCurrentPosition(function(position) {
      var geolocation1 = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle(
          {center: geolocation, radius: position.coords.accuracy});
      autocomplete1.setBounds(circle.getBounds());
    });
  }
}
            
            
// TRAÇANDO ROTAS API SECRETA 
            
      function initMap() {
        var directionsService = new google.maps.DirectionsService();
        var directionsRenderer = new google.maps.DirectionsRenderer(); 
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat:-23.467263, lng: -46.529354},
            styles:[
    {
        " featureType ": "all" ,
        " elementType ": "labels.text.fill" ,
        " estilizadores ": [
            {
                " color ": "# 7c93a3" 
            } ,
            {
                " leveza ": "-10" 
            }
        ]
    } ,
    {
        " featureType ": "administrative.country" ,
        " elementType ": "geometria" ,
        " estilizadores ": [
            {
                " visibilidade ": "on" 
            }
        ]
    } ,
    {
        " featureType ": "administrative.country" ,
        " elementType ": "geometry.stroke" ,
        " estilizadores ": [
            {
                " color ": "# a0a4a5" 
            }
        ]
    } ,
    {
        " featureType ": "administrative.province" ,
        " elementType ": "geometry.stroke" ,
        " estilizadores ": [
            {
                " color ": "# 62838e" 
            }
        ]
    } ,
    {
        " featureType ": "paisagem" ,
        " elementType ": "geometry.fill" ,
        " estilizadores ": [
            {
                " color ": "# dde3e3" 
            }
        ]
    } ,
    {
        " featureType ": "landscape.man_made" ,
        " elementType ": "geometry.stroke" ,
        " estilizadores ": [
            {
                " color ": "# 3f4a51" 
            } ,
            {
                " peso ": "0,30" 
            }
        ]
    } ,
    {
        " featureType ": "poi" ,
        " elementType ": "all" ,
        " estilizadores ": [
            {
                " visibilidade ": "simplificado" 
            }
        ]
    } ,
    {
        " featureType ": "poi.attraction" ,
        " elementType ": "all" ,
        " estilizadores ": [
            {
                " visibilidade ": "on" 
            }
        ]
    } ,
    {
        " featureType ": "poi.business" ,
        " elementType ": "all" ,
        " estilizadores ": [
            {
                " visibilidade ": "desativado" 
            }
        ]
    } ,
    {
        " featureType ": "poi.government" ,
        " elementType ": "all" ,
        " estilizadores ": [
            {
                " visibilidade ": "desativado" 
            }
        ]
    } ,
    {
        " featureType ": "poi.park" ,
        " elementType ": "all" ,
        " estilizadores ": [
            {
                " visibilidade ": "on" 
            }
        ]
    } ,
    {
        " featureType ": "poi.place_of_worship" ,
        " elementType ": "all" ,
        " estilizadores ": [
            {
                " visibilidade ": "desativado" 
            }
        ]
    } ,
    {
        " featureType ": "poi.school" ,
        " elementType ": "all" ,
        " estilizadores ": [
            {
                " visibilidade ": "desativado" 
            }
        ]
    } ,
    {
        " featureType ": "poi.sports_complex" ,
        " elementType ": "all" ,
        " estilizadores ": [
            {
                " visibilidade ": "desativado" 
            }
        ]
    } ,
    {
        " featureType ": "road" ,
        " elementType ": "all" ,
        " estilizadores ": [
            {
                " saturação ": "-100" 
            } ,
            {
                " visibilidade ": "on" 
            }
        ]
    } ,
    {
        " featureType ": "road" ,
        " elementType ": "geometry.stroke" ,
        " estilizadores ": [
            {
                " visibilidade ": "on" 
            }
        ]
    } ,
    {
        " featureType ": "road.highway" ,
        " elementType ": "geometry.fill" ,
        " estilizadores ": [
            {
                " color ": "#bbcacf" 
            }
        ]
    } ,
    {
        " featureType ": "road.highway" ,
        " elementType ": "geometry.stroke" ,
        " estilizadores ": [
            {
                " leveza ": "0" 
            } ,
            {
                " color ": "#bbcacf" 
            } ,
            {
                " weight ": "0.50" 
            }
        ]
    } ,
    {
        " featureType ": "road.highway" ,
        " elementType ": "labels" ,
        " estilizadores ": [
            {
                " visibilidade ": "on" 
            }
        ]
    } ,
    {
        " featureType ": "road.highway" ,
        " elementType ": "labels.text" ,
        " estilizadores ": [
            {
                " visibilidade ": "on" 
            }
        ]
    } ,
    {
        " featureType ": "road.highway.controlled_access" ,
        " elementType ": "geometry.fill" ,
        " estilizadores ": [
            {
                " color ": "#ffffff" 
            }
        ]
    } ,
    {
        " featureType ": "road.highway.controlled_access" ,
        " elementType ": "geometry.stroke" ,
        " estilizadores ": [
            {
                " color ": "# a9b4b8" 
            }
        ]
    } ,
    {
        " featureType ": "road.arterial" ,
        " elementType ": "labels.icon" ,
        " estilizadores ": [
            {
                " invert_lightness ": true 
            } ,
            {
                " saturação ": "-7" 
            } ,
            {
                " leveza ": "3" 
            } ,
            {
                " gama ": "1,80" 
            } ,
            {
                " peso ": "0,01" 
            }
        ]
    } ,
    {
        " featureType ": "trânsito" ,
        " elementType ": "all" ,
        " estilizadores ": [
            {
                " visibilidade ": "desativado" 
            }
        ]
    } ,
    {
        " featureType ": "water" ,
        " elementType ": "geometry.fill" ,
        " estilizadores ": [
            {
                " color ": "# a3c7df" 
            }
        ]
    } 
]
        });
        directionsRenderer.setMap(map);
     //----- 
      autocomplete = new google.maps.places.Autocomplete(
      document.getElementById('autocomplete'), {types: ['geocode']});
      autocomplete1 = new google.maps.places.Autocomplete(
      document.getElementById('autocomplete1'), {types: ['geocode']});
    
  // Avoid paying for data that you don't need by restricting the set of
  // place fields that are returned to just the address components.
  autocomplete.setFields(['address_component']);
  autocomplete1.setFields(['address_component']);
    
  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
  autocomplete1.addListener('place_changed', fillInAddress);
          //------

        var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsRenderer);
        };
        document.getElementById('autocomplete').addEventListener('change', onChangeHandler);
        document.getElementById('autocomplete1').addEventListener('change', onChangeHandler);
      }

      function calculateAndDisplayRoute(directionsService, directionsRenderer) {
        directionsService.route(
            {
              origin: {query: document.getElementById('autocomplete').value},
              destination: {query: document.getElementById('autocomplete1').value},
              travelMode: 'DRIVING'
            },
            function(response, status) {
              if (status === 'OK') {
                   
                   directionsRenderer.setDirections(response);
              } else {
                window.alert(status     +'Certifique-se de que inseriu um numero valido em ambos os endereços');
              }
            });
      }     

    
            
            
            
 </script>  
 

</head>
<body>
    <!-- Navigation -->
<nav class="navbar navbar-expand-md fixe-top">
    
<nav class="container-fluid">
    <a class="navbar-brand" href="#"><img src="img/CARGO%20LOGO%20PRETO.png" width="50%" height="30%" id="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
    </button><br><br><br>
   <a class="nav-link" href="https://www.cargocar.app/" id="home" >Home</a>
    </nav>
</nav>




<!--- Welcome Section -->    
<div class="container-fluid padding">
<div class="row welcome text-center">
    <div class="col-14">
        <h1 class="display-4 text-white">Calcule seu frete</h1>
    </div>
    <hr>
    <div class="col-14">
        <p class="lead text-white">Digite a quantidade de volumes o seu endereço 
            de retirada e o endereço que deseja entregar abaixo.</p>
    </div>
</div>    
</div>


<!--- Two Column Section -->
<div class="container-fluid padding">
    <div class="row">
        <div class="col-md-5 offset-md-5 col-sm-19 col-13">
            <div class="card card-body">
                <form action="indexmobile.php#ancora" method="post"> 
                    <div class="form-group">
                        <label>Quantidade de volume</label>
                        <input type="number" id="volume" name="volume" class="form-control" min="0" max="1000">
                        <label>Local de origem</label>
                        <input type="text" id="autocomplete"  name="autocomplete" class="form-control" placeholder="Enter your address"  >
                        <label>Local de destino</label>
                        <input type="text" id="autocomplete1" name="autocomplete1" class="form-control" placeholder="Enter your address" > <br>
                       
                     
                        <button class="btn btn-dark" id="calcular" type="submit" >Calcular </button> <br>
                        <br>
                           <?php
                    
                    echo "Local de partida: " .$origins1. "<br>";
                     echo "Local de destino: " .$destination1. "<br>";
                    
    ?>
                </div>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnmEz07Lv6RHVwHxdvSJ4l8U-tF8tCIqY&libraries=places&callback=initMap"
                       async defer></script>
                          
                 </form> 
               
            </div>
            
        </div>  
       
    </div>
     
</div>
    
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div id="map"></div>
      
    <!-  Galeria ->
    <div id="ancora"></div>
    <h1 class="text-center"  style='color:#2E2E2E;'>Valores e modalidades</h1>
      <p class="page-description text-center" style='color:#2E2E2E;font-size:18px;'>Valores acessiveis e Logistica avançada </p>
 
  <!-- Resultado Moto -->
<div id="resultado">        
<div class="container" class="resultado">           
  <table class="table class="col-md-4"">
    <thead>
      <tr>
        <th><div> 
                <div id="ancora"></div>
               
                    
                    <img src="img/icones/moto.png" alt="Park" class="card-img-top  d-none d-md-block" style="width:200px;height:200px;">
                    </div>
                    
            </th>
        <th><div id="mostrar"><?php
            
            // echo $url;
                        echo "<h2 style='color:#2E2E2E;'>MOTO CARGO</h2>";
                        echo "<p style='color:#2E2E2E;'>$exibemoto</p>";
                        echo "<p style='color:#2E2E2E;display:inline'> ". $kmcliente. "<br></p>";
                        echo "<p style='color:#2E2E2E;display:inline;margin:0;padding:0;';> ".$tempclient."</p>";
                        
           /* echo $erro."<br>";
           echo $erro1."<br>";
        */        
            ?>
        </div></th>
        
      </tr>
      </thead>
    </table>
  </div>
    
 <!-- Resultado Carro -->   
<div class="container" class="resultado">           
  <table class="table class="col-md-4"">
    <thead>
      <tr>
        <th><div> 
                <div id="ancora"></div>
                
                    
                    <img src="img/icones/car.png" alt="Park" class="card-img-top  d-none d-md-block" style="width:200px;height:200px;">
                    </div>
                    
            </th>
        <th><div id="mostrar"><?php 
                        echo "<h2 style='color:#2E2E2E;'>CARGO CAR</h2>";
                        echo "<p style='color:#2E2E2E;'>$exibecar</p>";
                        echo "<p style='color:#2E2E2E;display:inline'> ". $kmcliente. "<br></p>";
                        echo "<p style='color:#2E2E2E;display:inline'> ".$tempclient. "</p>";
                      
                ?></div></th>
        
      </tr>
      </thead>
    </table>
  </div>   
    
    <!-- Resultado Pickup -->
     <div class="container" class="resultado">           
  <table class="table class="col-md-4"">
    <thead>
      <tr>
        <th><div> 
                <div id="ancora"></div>
                
                    
                    <img src="img/icones/pickup.png" alt="Park" class="card-img-top  d-none d-md-block" style="width:200px;height:200px;;">
                    </div>
                    
            </th>
        <th><div id="mostrar"><?php 
                        echo "<h2 style='color:#2E2E2E;'>PICKUP CARGO</h2>";
                        echo "<p style='color:#2E2E2E;'>$exibepickup</p>";
                        echo "<p style='color:#2E2E2E;display:inline'> ". $kmcliente. "<br></p>";
                        echo "<p style='color:#2E2E2E;display:inline'> ".$tempclient. "</p>";
                     
                ?></div></th>
        
      </tr>
      </thead>
    </table>
  </div>     
    
     <!-- Resultado Furgão -->
     <div class="container" class="resultado">           
  <table class="table class="col-md-4"">
    <thead>
      <tr>
        <th><div> 
                <div id="ancora"></div>
                
                    
                    <img src="img/icones/furg%C3%A3o.png" alt="Park" class="card-img-top  d-none d-md-block" style="width:200px;height:200px;">
                    </div>
                    
            </th>
        <th><div id="mostrar"><?php
                        echo "<h2 style='color:#2E2E2E;'>FURGO CARGO</h2>";
                        echo "<p style='color:#2E2E2E;'>$exibevan</p>";
                        echo "<p style='color:#2E2E2E;display:inline'> ". $kmcliente. "<br></p>";
                        echo "<p style='color:#2E2E2E;display:inline'> ".$tempclient. "</p>";
                      
                ?></div></th>
        
      </tr>
      </thead>
    </table>
  </div>  
    
         <!-- Resultado Truck -->
     <div class="container" class="resultado">           
  <table class="table class="col-md-4"">
    <thead>
      <tr>
        <th><div> 
                <div id="ancora"></div>
                
                    
                    <img src="img/icones/caminh%C3%A3o.png" alt="Park" class="card-img-top  d-none d-md-block" style="width:200px;height:200px;">
                    </div>
                    
            </th>
        <th><div id="mostrar"><?php
                        echo "<h2 style='color:#2E2E2E;'>TRUCK CARGO</h2>";
                        echo "<p style='color:#2E2E2E;'>$exibetruck</p>";
                        echo "<p style='color:#2E2E2E;display:inline'> ". $kmcliente. "<br></p>";
                        echo "<p style='color:#2E2E2E;display:inline'> ".$tempclient. "</p>";
                ?></div></th>
        
      </tr>
      </thead>
    </table>
  </div>  
    
 </div> 
 
 <div class="fixed-bottom">
   <div id="wpp-btn-fixo" >
    <a href="https://api.whatsapp.com/send?phone=5541997775533">
        <img src="https://blob.llimages.com/machine-files/all-images/WhatsApp.svg" alt="Fale Conosco pelo WhatsApp" />
    </a>
</div>
</div>
<!--- Logar -->

<form action="redi.php" method="post">
        <label> Login</label>
        <input type="password" name="senha" id="name" placeholder="Digite sua senha ">
        <button type="submit" value="Logar">Logar</button>
    </form>

    
    
<!--- Footer -->
<footer>

    
<div class="container-fluid padding">
<div class="row text-center">
   
    <div class="col-12">
         <a href="https://www.cargocar.app/"> Home </a>
    <hr class="light-100">
    <h5>&copy; cargocar.app</h5>    
    </div>
</div>    
</div>
</footer>

</body>
</html>

