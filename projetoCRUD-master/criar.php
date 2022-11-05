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


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Matrícula</title>

</head>

<body>
    <div>
        <div><a style="margin-right: 25px" href="/criar.php">Criar Matricula</a> <a style="margin-right: 25px" href="/alterar.php">Alterar Matrícula</a> <a style="margin-right: 25px" href="/apagar.php">Apagar Matrícula</a> <a style="margin-right: 25px" href="/exibir.php">Exibir</a></div>
    </div>

    <br>
    <form action="criar.php" method="POST">

        <label for="cadMat">Número Matrícula: </label>
        <input type="text" name="matricula" placeholder="Digite a Matrícula"><br>

        <label for="cadNome">Nome do Aluno: </label>
        <input type="text" name="nome" placeholder="Digite o Nome"><br>

        <label for="cadEmail">Email: </label>
        <input type="text" name="email" placeholder="Digite o Email"><br>

        <input name="botaoCad" type="submit" value="Enviar">

    </form>
</body>

</html>

<?php


if (isset($_POST["botaoCad"])) {

    $matricula = $_POST["matricula"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    $inserirSQL = "INSERT INTO `sistema`(`matricula`, `nome`, `email`) VALUES ('$matricula','$nome','$email')";

    $resultado = $connection->query($inserirSQL);


    if ($resultado == true) {
        echo "<p>Matrícula Criada!</p>";
    } else {
        echo "<p>Falha no Cadastramento!</p>";
    }
}

?>