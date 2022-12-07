<?php
header("Access-Control-Allow-Origin: *");
$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancodeDados = "av1js";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $connection = new mysqli($servidor, $usuario, $senha, $bancodeDados);
    if ($connection->connect_error) {
        die("Conexao com o banco de dados falhou!!!");
    }else{
        $nome = $_GET["matNome"];
        $creditos = $_GET["creditos"];
        $periodo = $_GET["periodo"];
        $idReq = $_GET["idReq"];
    
        $inserirSQL = "INSERT INTO `sistema`(`nome`, `periodo`, `idReq`, `creditos`) VALUES ('$nome', $periodo, $idReq, $creditos)";
    
        $resultado = $connection->query($inserirSQL);
    
    
        if ($resultado == true) {
            echo "Matéria Criada!";
        } else {
            echo "Falha no Cadastramento!";
        }
    }
    
}
return;
?>