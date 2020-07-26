<?php
    $params["consumer_key"] = "3e5e09c1013c76a40d84ab526b7bcad029688d35e80f4a2d829356029bdf3369";
    $params["consumer_secret"] = "a077e11f82253d8036eddfd1698854411ad120888fd1c13eba89a37b5248d22c";
    $params["code"] = $_POST['code'];

    $key =  $params["consumer_key"];
    $url = $_REQUEST['url'];


    ob_start();

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_exec($ch);

    // JSON de retorno  
    $resposta = json_decode(ob_get_contents());
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    ob_end_clean();
    curl_close($ch);
    if($code == "200"){
        $urlreturn= $url."/auth.php?response_type=code&consumer_key=3e5e09c1013c76a40d84ab526b7bcad029688d35e80f4a2d829356029bdf3369&callback=http://cargoproxys.com.br/tray"; 
        
    }
?>
<!DOCTYPE html>
<html>
    <header>
    </header>
<head>
<style>
    body {
    margin: 0;
    padding: 0;
    background-image: url(http://cargoproxys.com.br/img/design3.png);
    background-repeat: no-repeat;
    height: 100vh;
    font-family:sans-serif;
    color: #222;
  }
  #login .container #login-row #login-column #login-box {
    margin-top: 120px;
    max-width: 600px;
    height: 320px;
    border: 1px solid #9C9C9C;
    background-color: #EAEAEA;
    font-family:sans-serif;
    color: #222;
  }
  #login .container #login-row #login-column #login-box #login-form {
    padding: 20px;
    font-family:sans-serif;
    color: #222;
  }
  #login .container #login-row #login-column #login-box #login-form #register-link {
    margin-top: -85px;
    font-family:sans-serif;
    color: #222;
  }
</style>    

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body style="background-color: #eaaa3d;">
    <img src="http://cargoproxys.com.br/img/CARGO%20LOGO%20PRETO.png" style="max-width: 400px; height: 100px;">
    <div id="login">
        <h3 class="text-center text-white pt-10 ">Permissão de acesso</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                    <?php require_once("index.php"); 
                                echo ("<form action=$urlreturn  method=POST>");
                                echo ('<h3 class="text-center text-dark">O aplicativo terá acesso a:</h3>
                            <div class="form-group">
                                <label for="username" class="text-dark">Informações de pedidos </label><br>
                                <label for="username" class="text-dark">Informações de clientes</label><br>
                                <label for="username" class="text-dark">Informações de produtos</label>
                                <h3 class="text-center text-dark">O aplicativo poderá:</h3>
                                <label for="username" class="text-dark">Incluir ou alterar produtos</label><br>
                                <label for="username" class="text-dark">Incluir ou alterar pedidos</label>
                            </div>
                                <input type="submit" name="Aceitar" class="btn btn-dark btn-md" >
        
                      </form>');?>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
