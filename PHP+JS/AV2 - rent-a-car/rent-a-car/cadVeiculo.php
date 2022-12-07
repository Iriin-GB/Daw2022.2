<?php
header('Access-Control-Allow-Origin: *'); //falha de segurança
    $servidor = "localhost";
    $user = "root";
    $pass = "";
    $banco = "crudav2";
    $mensagem = "";


    if($_SERVER["REQUEST_METHOD"]=="GET")
    {    
        
        $nomeCarro = $_GET["nome"];
        $categoria = $_GET["cat"];
        $cidade = $_GET["cid"];
        $preco = $_GET["preco"];

        $conn = new mysqli ($servidor, $user, $pass, $banco);
        
            $sql = "INSERT INTO `listacarros`(`nomeCarro`, `categoria`, `cidade`, `preco` ) VALUES ('$nomeCarro','$categoria','$cidade','$preco') ";

        $result=$conn->query($sql);
       
        if($result == true){
            $retorno = "Veículo criado com sucesso!";
        }
        else{
            $retorno = "Erro no registro, tente novamente";
        }
        
    }
    echo $retorno;
?>
