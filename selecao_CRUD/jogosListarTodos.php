<?php
header('Access-Control-Allow-Origin: *'); //falha de segurança
    $servidor = "localhost";
    $user = "root";
    $pass = "";
    $banco = "bancodaw";
    $mensagem = "";
    if($_SERVER["REQUEST_METHOD"]=="GET")
    {

        $conn = new mysqli ($servidor, $user, $pass, $banco);
        $sql="SELECT * FROM `sistemajogos` ORDER BY `data`, `hora` ASC";

        $result=$conn->query($sql);
        $arrayJogos[] = array();
        $i = 0;


        While ($linha = $result->fetch_assoc()){
            $arrayJogos[$i] = $linha;
            $i++;
        }
        if ($result=true){
            $retorno=json_encode($arrayJogos);

        } else {
            $retorno=json_encode("Falha na listagem");
        }
    }
echo $retorno;
?>