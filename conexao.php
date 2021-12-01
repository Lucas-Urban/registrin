<?php

$servidor = "localhost";
$usuario = "root";
$senha ="";
$banco = "usuario";


try{
        $conector = mysqli_connect($servidor, $usuario, $senha, $banco);

        // echo "CONEXÃO COM SUCESSO";
} catch(\throwable $th){
    
        // echo "FALHA NA CONEXÃO"; 
}


?>