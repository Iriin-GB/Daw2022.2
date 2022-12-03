<?php
header('Access-Control-Allow-Origin: *'); //falha de segurança
    $servidor = "localhost";
    $user = "root";
    $pass = "";
    $banco = "crudav2";
    $mensagem = "";


    if($_SERVER["REQUEST_METHOD"]=="GET")
    {    
        
        $nome = $_GET["regNome"];
        $email = $_GET["regEmail"];
        $senha = $_GET["regSenha"];

        $conn = new mysqli ($servidor, $user, $pass, $banco);
        
            $sql = "INSERT INTO `listausuarios`(`nome`, `email`, `senha`) VALUES ('$nome','$email','$senha') ";

        $result=$conn->query($sql);
       
        if($result == true){
            $retorno = "Cliente criado, faça login agora";
        }
        else{
            $retorno = "Erro no registro, tente novamente";
        }
        
    }
    echo $retorno;
?>
