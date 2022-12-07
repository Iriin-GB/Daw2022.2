<?php
header('Access-Control-Allow-Origin: *'); //falha de segurança
    $servidor = "localhost";
    $user = "root";
    $pass = "";
    $banco = "bancodaw";
    $mensagem = "";
    if($_SERVER["REQUEST_METHOD"]=="GET")
    {    
        $altSelec = $_GET["altSelec"];
        $altTec= $_GET["altTec"];
        $altGrupo= $_GET["altGrupo"];
        $antSelec= $_GET["antSelec"];

        $conn = new mysqli ($servidor, $user, $pass, $banco);
        $sql="UPDATE `sistemacopa` SET `nomeSelecao`='$altSelec',`nomeTecnico`='$altTec',`grupo`='$altGrupo' WHERE `nomeSelecao`='$antSelec'";
        $result=$conn->query($sql);
        // echo $result;
        echo $sql;
        if ($result=true){
            $mensagem="Executando...";
        } else {
            $mensagem="Erro no sistema!";
        }
    }
echo $mensagem;
?>
