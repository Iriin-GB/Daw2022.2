<?php
/**/
    $servidor = "localhost";
    $user = "root";
    $pass = "";
    $banco = "bancodaw";
    $mensagem = "";
    if($_SERVER["REQUEST_METHOD"]=="GET")
    {    
        $nome = $_GET["nome"];
        $matricula= $_GET["matricula"];
        $email= $_GET["email"];
        $cpf= $_GET["cpf"];

        $conn = new mysqli ($servidor, $user, $pass, $banco);
        $sql="INSERT INTO `sistemajs`(`nome`, `matricula`, `email`, `cpf`) VALUES ('$nome', '$matricula', '$email', '$cpf')";
        $result=$conn->query($sql);
        echo $result;
        echo $sql;
        if ($result=true){
            $mensagem="JOINHA!👍";
        } else {
            $mensagem="DEU RUIM!😭😭";
        }
    }
echo $mensagem;
?>
