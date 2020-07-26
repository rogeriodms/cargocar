<?php
   include("update.php");

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Complete Bootstrap $ Website Layout</title>
    
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	               <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	                   <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
    <link href="style.css" rel="stylesheet">
    
</head>
<body>
    <!-- Navigation -->
<nav class="navbar navbar-expand-md fixe-top ">
    
<nav class="col-md-3 offset-md-2 col-sm-2 col-12  container-fluid navbar-dark fixe-top" >
    <a class="navbar-brand" href=""><img src="img/CARGO%20LOGO%20PRETO.png" width="100%" ></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
    </button>
   <a class="nav-link" href="https://www.cargocar.app/">Home</a>
    </nav>
</nav>

<br><br><br><br>

<!--- Two Column Section -->
<div class="container-fluid col-md-20">
            <p style="color:#fff;font-size:180%;">Cargo Carro</p>
        <form  class="form-inline container-fluid" action="" method="post">
            
            <label style="color:#fff;padding:0% 1% 0% 0%;">Preço base:</label>
            <input type="number"  step=0.01 min="0" class="form-control" id="campo5" placeholder="valor" name="campo5" >&ensp;&ensp;&ensp;
            <label style="color:#fff;padding:0% 1% 0% 0%;">Preço por KM:</label>
            <input type="number"  step=0.01 min="0" class="form-control" id="campo4" placeholder="preço" name="campo4" >&ensp;&ensp;&ensp;
            <label style="color:#fff;padding:0% 1% 0% 0%;">Adicional por itens:</label>
            <input type="number" step=0.01 min="0" class="form-control" id="campo3" placeholder="preço" name="campo3" >&ensp;&ensp;&ensp;
                <button type="submit" class="btn btn-primary">Enviar</button>
  </form><br><br><br>
     <hr class="light">
        <p style="color:#fff;font-size:180%;">Cargo Moto</p>
        <form class="form-inline" action="" method="post">
            
            <label style="color:#fff;padding:0% 1% 0% 0%;">Preço base:</label>
            <input type="number"  step=0.01 min="0" class="form-control" id="campo8" placeholder="valor" name="campo8" >&ensp;&ensp;&ensp;
            <label style="color:#fff;padding:0% 1% 0% 0%;">Preço por KM:</label>
            <input type="number"  step=0.01 min="0" class="form-control" id="campo7" placeholder="preço" name="campo7" >&ensp;&ensp;&ensp;
            <label style="color:#fff;padding:0% 1% 0% 0%;">Adicional por itens:</label>
            <input type="number" step=0.01 min="0"  class="form-control" id="campo6" placeholder="preço" name="campo6" >&ensp;&ensp;&ensp;
                <button type="submit" class="btn btn-primary">Enviar</button>
  </form><br><br><br>
     <hr class="light">
        <p style="color:#fff;font-size:180%;">Cargo Pickup </p>
        <form class="form-inline" action="" method="post">
            
            <label style="color:#fff;padding:0% 1% 0% 0%;">Preço base:</label>
            <input type="number"  step=0.01 min="0" class="form-control" id="campo11" placeholder="valor" name="campo11" >&ensp;&ensp;&ensp;
            <label style="color:#fff;padding:0% 1% 0% 0%;">Preço por KM:</label>
            <input type="number"  step=0.01 min="0" class="form-control" id="campo10" placeholder="preço" name="campo10" >&ensp;&ensp;&ensp;
            <label style="color:#fff;padding:0% 1% 0% 0%;">Adicional por itens:</label>
            <input type="number" step=0.01 min="0" class="form-control" id="campo9" placeholder="preço" name="campo9" >&ensp;&ensp;&ensp;
                <button type="submit" class="btn btn-primary">Enviar</button>
  </form><br><br><br>
     <hr class="light">
        <p style="color:#fff;font-size:180%;">Cargo Furgo </p>
        <form class="form-inline" action="" method="post">
            
            <label style="color:#fff;padding:0% 1% 0% 0%;">Preço base:</label>
            <input type="number"  step=0.01 min="0" class="form-control" id="campo14" placeholder="valor" name="campo14" >&ensp;&ensp;&ensp;
            <label style="color:#fff;padding:0% 1% 0% 0%;">Preço por KM:</label>
            <input type="number"  step=0.01 min="0" class="form-control" id="campo13" placeholder="preço" name="campo13" >&ensp;&ensp;&ensp;
            <label style="color:#fff;padding:0% 1% 0% 0%;">Adicional por itens:</label>
            <input type="number" step=0.01 min="0" class="form-control" id="campo12" placeholder="preço" name="campo12">&ensp;&ensp;&ensp;
                <button type="submit" class="btn btn-primary">Enviar</button>
  </form><br><br><br>
     <hr class="light">
        <p style="color:#fff;font-size:180%;">Cargo Truck</p><br>
        <form class="form-inline" action="" method="post">
            
            <label style="color:#fff;padding:0% 1% 0% 0%;">Preço base:  </label>
            <input type="number"  step=0.01 min="0" class="form-control" id="campo17" placeholder="valor" name="campo17" >&ensp;&ensp;&ensp;
            <label style="color:#fff;padding:0% 1% 0% 0%;">Preço por KM:  </label>
            <input type="number"  step=0.01 min="0" class="form-control" id="campo16" placeholder="preço" name="campo16" >&ensp;&ensp;&ensp;
            <label style="color:#fff;padding:0% 1% 0% 0%;">Adicional por itens:  </label>
            <input type="number" step=0.01 min="0" class="form-control" id="campo15" placeholder="preço" name="campo15" >&ensp;&ensp;&ensp;
                <button type="submit" class="btn btn-primary">Enviar</button>
  </form>

</div>               
                    


        
    
<!--- Footer -->
<footer>
    <div class="container-fluid padding">
<div class="row text-center">
   
    <div class="col-12">
         <button type="button" class="btn btn-secondary"><a href="https://www.cargocar.app/"> Home </a></button>
    <hr class="light-100">
    <h5>&copy; CargoCar.app</h5>    
    </div>
</div>    
</div>
   
    

</footer>

</body>
</html>


