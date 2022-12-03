<?php
header('Access-Control-Allow-Origin: *'); //falha de segurança
    $servidor = "localhost";
    $user = "root";
    $pass = "";
    $banco = "crudav2";
    $mensagem = "";


    if($_SERVER["REQUEST_METHOD"]=="GET")
    {    
        
        $email = $_GET["testEmail"];
        $senha = $_GET["testSenha"];

        $conn = new mysqli ($servidor, $user, $pass, $banco);
        
            $sql="SELECT * FROM `listausuarios` WHERE `email` = '$email' AND `senha` = '$senha'";

        $result=$conn->query($sql);

        if (mysqli_num_rows($result) != 0) {
            $linha = mysqli_fetch_row($result);
            $retorno=json_encode($linha);    
                
        }else{
            $retorno=json_encode("Falha no login");
        }

}
echo $retorno;
?>