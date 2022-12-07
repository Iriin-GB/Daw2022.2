<?php
// header('Access-Control-Allow-Origin: *'); //falha de segurança
    $servidor = "localhost";
    $user = "root";
    $pass = "";
    $banco = "bancodaw";
    $mensagem = "";
    if($_SERVER["REQUEST_METHOD"]=="GET")
    {    
        $nomeSelec = $_GET["nomeSelec"];

        $conn = new mysqli ($servidor, $user, $pass, $banco);
        $sql="DELETE FROM `sistemacopa` WHERE `nomeSelecao` = '$nomeSelec' ";
        $result=$conn->query($sql);
        echo $result;
        echo $sql;
        if ($result=true){
            $mensagem="Executando...";
        } else {
            $mensagem="Erro no sistema!";
        }
    }
echo $mensagem;
?>
