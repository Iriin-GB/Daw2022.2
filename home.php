<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancodeDados = "bancodaw";


$bolCriar = false;
$bolAlt = false;
$bolDel = false;


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = new mysqli($servidor, $usuario, $senha, $bancodeDados);
    if ($conn->connect_error) {
        die("Conexao com o banco de dados falhou!!!");
    }


    if (isset($_POST["botaoCriar"])) {
        $nome = $_POST["nome"];
        $mat = $_POST["matricula"];
        $email = $_POST["email"];

        $sqlCriar = "INSERT into `registroalunos`(`nome`, `matricula`, `email`) VALUES ('$nome','$mat','$email')";

        if (!$conn->query($sqlCriar)) {
            echo ("Error description: " . $conn->error);
        }else{
            $bolCriar = true;
        }
    }
    if (isset($_POST["botaoAlt"])) {
        $nome = $_POST["nome"];
        $mat = $_POST["matricula"];
        $email = $_POST["email"];

        $sqlAlt = "UPDATE `registroalunos` SET";
        
        
        if($nome != ""){
            $sqlAlt .= " `nome` = '$nome' , ";
        }
        if($email != ""){
            $sqlAlt .= " `email` = '$email' ";
        }
        
        $sqlAlt .= "WHERE  `matricula` =  '$mat' ";

        echo $sqlAlt;

           

         if (!$conn->query($sqlAlt)) {
             echo ("Error description: " . $conn->error);
         }else{
            $bolAlt = true;
        }
        }
        

    if (isset($_POST["botaoDel"])) {
        $mat = $_POST["matricula"];

        $sqlDel = "DELETE  FROM `registroalunos` WHERE `matricula` = '$mat' " ;

        if (!$conn->query($sqlDel)) {
            echo ("Error description: " . $conn->error);
        }else{
            $bolDel = true;
        }
    }
    if (isset($_POST["botaoExib"])) {
        $mat = $_POST["matricula"];
        $sqlExib = "SELECT `matricula`, `nome`, `email` FROM `registroalunos` WHERE `matricula` = '$mat'";

        $boolTest = false;
        if (!$conn->query($sqlExib)) {
            echo ("Error description: " . $conn->error);
        }
        if ($result=mysqli_query($conn,$sqlExib))
            {
                while ($row=mysqli_fetch_row($result))
                {
                    $printM = $row[0];
                    $printN = $row[1];
                    $printE = $row[2];
                }
                if(mysqli_num_rows($result)){
                    $boolTest = true;
                }
            }
    }
    
    }