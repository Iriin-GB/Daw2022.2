<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancodeDados = "crudtest";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connection = new mysqli($servidor, $usuario, $senha, $bancodeDados);
    if ($connection->connect_error) {
        die("Conexao com o banco de dados falhou!!!");
    }

    
}

?>