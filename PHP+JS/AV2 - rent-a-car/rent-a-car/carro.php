<?php
header('Access-Control-Allow-Origin: *'); //falha de segurança
    $servidor = "localhost";
    $user = "root";
    $pass = "";
    $banco = "crudav2";
    $mensagem = "";


    if($_SERVER["REQUEST_METHOD"]=="GET")
    {    
        
        $id = $_GET["id"];

        $conn = new mysqli ($servidor, $user, $pass, $banco);
        
            $sql="SELECT * FROM `listacarros` WHERE `id` = '$id'";

        $result=$conn->query($sql);

        if (mysqli_num_rows($result) != 0) {
            $linha = $result->fetch_assoc();
            $retorno=json_encode($linha);    
                
        }else{
            $retorno=json_encode("Erro no sistema");
        }

}
echo $retorno;
?>