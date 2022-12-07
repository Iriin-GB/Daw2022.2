<?php
/**/
    $servidor = "localhost";
    $user = "root";
    $pass = "";
    $banco = "bancodaw";
    $retorno = "";
    if($_SERVER["REQUEST_METHOD"]=="GET")
    {    
        $conn = new mysqli ($servidor, $user, $pass, $banco);
        $sql="SELECT * FROM `sistemacopa`";
        $result=$conn->query($sql);
        $arrAlunos[] = array();
        $i = 0;
        While ($linha = $result->fetch_assoc()){
            $arrAlunos[$i] = $linha;
            $i++;
        }
        if ($result=true){
            $retorno=json_encode($arrAlunos);

        } else {
            $retorno=json_encode("Falha no sistema");
        }
    }
echo $retorno;
?>
