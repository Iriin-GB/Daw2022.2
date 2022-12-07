<?php
    $servidor = "localhost";
    $user = "root";
    $pass = "";
    $banco = "bancodaw";
    $mensagem = "";
    if($_SERVER["REQUEST_METHOD"]=="GET")
    {    
        $nomeSelec = $_GET["nomeSelec"];
        $nomeTec= $_GET["nomeTec"];
        $grupo= $_GET["grupo"];

        $conn = new mysqli ($servidor, $user, $pass, $banco);
        $sql="INSERT INTO `sistemacopa`(`nomeSelecao`, `nomeTecnico`, `grupo`) VALUES ('$nomeSelec', '$nomeTec', '$grupo')";
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
