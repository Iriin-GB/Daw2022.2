<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Index</title>
</head>

<body>
    <?php require("home.php"); ?>
    <div class="mestre">

        <div class="criar">
            <h1>Criar</h1>
            <form action="index.php" method="POST">
                <label for="Matricula">Matrícula:</label>
                <input type="text" name="matricula" placeholder="Num de Matrícula"><br>

                <label for="Nome">Nome:</label>
                <input type="text" name="nome" placeholder="Nome"><br>

                <label for="Email">Email:</label>
                <input type="text" name="email" placeholder="Email"><br>

                <input name="botaoCriar" class="botao" type="submit" value="Criar">
                <?php if($bolCriar == true){ echo("<p style=\"margin-top: 0px;\">Aluno Criado!</p>");} ?>
            </form>
        </div>

        <div class="alterar">
            <h1>Alterar</h1>
            <form action="index.php" method="POST">
                <label for="altByMatricula">Matrícula:</label>
                <input type="text" name="matricula" placeholder="Matrícula a ser alterada"><br>

                <label for="Nome">Nome [Alteração Obrigatória]:</label>
                <input type="text" name="nome" placeholder="Novo nome"><br>
                

                <label for="Email">Email [Alteração Obrigatória]:</label>
                <input type="text" name="email" placeholder="Novo email"><br>

                <input name="botaoAlt" class="botao" type="submit" value="Alterar">
                <?php if($bolAlt == true){ echo("<p style=\"margin-top: 0px;\">Aluno Alterado!</p>");} ?>
            </form>
        </div>

        <div class="apagar">
            <h1>Apagar</h1>
            <form action="index.php" method="POST">
                <label for="delByMatricula">Matrícula:</label>
                <input type="text" name="matricula" placeholder="Matrícula a ser deletada"><br>
                <input name="botaoDel" class="botao" type="submit" value="Apagar">
                <?php if($bolDel == true){ echo("<p style=\"margin-top: 0px;\">Aluno Apagado!</p>");} ?>
            </form>
        </div>

        <div class="exibir">
            <h1>Exibir</h1>
            <form action="index.php" method="POST">
                <input class="matBusc" type="text" name="matricula" placeholder="Matrícula a ser buscada">
                <input name="botaoExib" class="botao" type="submit" value="Exibir 1"><br>
                <?php
                if (isset($_POST["botaoExib"])) {
                    if ($boolTest == true) {
                        echo "<table>
                <tr>
                    <td>$printM</td>
                    <td>$printN</td>
                    <td>$printE</td>
                </tr>
            </table>";
                    }
                }


                ?>
                <p>OU</p>
                <input name="botaoExibTds" class="botao" type="submit" value="Exibir Todos">


            </form>
            <table>
                <thead>
                    <tr>
                        <th>Matrícula</th>
                        <th>Nome</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST["botaoExibTds"])) {
                        $sqlExibTds = "SELECT `matricula`, `nome`, `email` FROM `registroalunos`";

                        if (!$conn->query($sqlExibTds)) {
                            echo ("Error description: " . $conn->error);
                        }
                        if ($result = mysqli_query($conn, $sqlExibTds)) {
                            while ($row = mysqli_fetch_row($result)) {

                                echo  "<tr><td> $row[0]</td>";
                                echo  "<td> $row[1]</td>";
                                echo  "<td> $row[2]</td></tr>";
                            }
                        }
                    }
                    ?>

                </tbody>
            </table>

        </div>

    </div>
</body>

</html>