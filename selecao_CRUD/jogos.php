<?php
header('Access-Control-Allow-Origin: *'); //falha de segurança
    $servidor = "localhost";
    $user = "root";
    $pass = "";
    $banco = "bancodaw";
    $mensagem = "";
    if($_SERVER["REQUEST_METHOD"]=="GET")
    {    
        $selecaoA = $_GET["selecaoA"];
        $selecaoB = $_GET["selecaoB"];
        $data = $_GET["data"];
        $hora = $_GET["hora"];
        $local = $_GET["local"];
        $golsA = $_GET["golsA"];
        $golsB = $_GET["golsB"];

        $conn = new mysqli ($servidor, $user, $pass, $banco);

        $sql="INSERT INTO `sistemajogos`(`data`, `hora`, `local`, `selecaoA`, `selecaoB`, `golsA`, `golsB`) VALUES ('$data', '$hora', '$local', '$selecaoA', '$selecaoB', $golsA, $golsB )";
        if ($golsA > $golsB) {
            $sqlPnts = "UPDATE `sistemacopa` SET `pontos` = `pontos`+3 WHERE `nomeSelecao` = '$selecaoA' ";
        }else if($golsA < $golsB){
            $sqlPnts = "UPDATE `sistemacopa` SET `pontos` = `pontos`+3 WHERE `nomeSelecao` = '$selecaoB' ";
        }else{
            $sqlPnts = "UPDATE `sistemacopa` SET `pontos` = `pontos`+1 WHERE `nomeSelecao` = '$selecaoB' OR `nomeSelecao` =  '$selecaoA' ";
        }
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
