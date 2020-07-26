<?php
session_start();

$senha=$_POST['senha'];


if(isset($_POST['senha'])){
    //$senha = mysqli_real_escape_string($_POST['senha']);
    //$senha = md5($senha);
    if(($senha == "admcargocar")){
        header("Location: modifica.php");
    }else{
        $_SESSION['LoginErro'] = "Senha Invalida";
        header("Location: index.php");
        echo "Invalida a senha ";
    }

    }else{
    $_SESSION['loginErro'] = "Senha invalida ";
    header("Location: index.php");
        
 
}

?>
