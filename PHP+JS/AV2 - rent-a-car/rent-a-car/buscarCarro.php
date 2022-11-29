<?php
header('Access-Control-Allow-Origin: *'); //falha de segurança
    $servidor = "localhost";
    $user = "root";
    $pass = "";
    $banco = "crudav2";
    $mensagem = "";


    if($_SERVER["REQUEST_METHOD"]=="GET")
    {    
        
        $nomeCarro = $_GET["nomeCarro"];
        $nomeCidade = $_GET["nomeCidade"];

        $conn = new mysqli ($servidor, $user, $pass, $banco);
        if($nomeCarro == ""){
            $sql="SELECT * FROM `listacarros` WHERE `cidade` = '$nomeCidade'";
        }else if($nomeCidade == ""){
            $sql="SELECT * FROM `listacarros` WHERE `nomeCarro` = '$nomeCarro'";
        }else if($nomeCidade == "" && $nomeCarro == ""){
            $sql="SELECT * FROM `listacarros`";
        }else{
            $sql="SELECT * FROM `listacarros` WHERE `nomeCarro` = '$nomeCarro' AND `cidade` = '$nomeCidade'";
        }

        
        
        $result=$conn->query($sql);
        $arrayCarros[] = array();
        $i = 0;
        While ($linha = $result->fetch_assoc()){
            $arrayCarros[$i] = $linha;
            $i++;
        }
        if ($result=true){
            $retorno=json_encode($arrayCarros);

        } else {
            $retorno=json_encode("Falha na listagem");
        }
    }
    echo $retorno;
?>
