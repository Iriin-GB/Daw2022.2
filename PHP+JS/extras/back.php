<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancodeDados = "crudjs";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $connection = new mysqli($servidor, $usuario, $senha, $bancodeDados);
    if ($connection->connect_error) {
        die("Conexao com o banco de dados falhou!!!");
    }


    $nome = $_GET["nome"];
    $matricula = $_GET["matricula"];
    $email = $_GET["email"];
    $cpf = $_GET["cpf"];

    $inserirSQL = "INSERT INTO `sistema`(`nome`, `matricula`, `email`, `cpf`) VALUES ('$nome', '$matricula', '$email', '$cpf')";
    $resultado = $connection->query($inserirSQL);


    if ($resultado == true) {
        echo "<p>Matricula Criada!</p>";
    } else {
        echo "<p>Falha no Cadastramento!</p>";
    }


    // if (!$connection->query($inserirSQL)) {
    //     echo ("Error description: " . $conn->error);
    // }

    $msg = "JOINHA!";
    echo $msg;
}

