<?php
    @session_start();

    function validaPermissoes(){
        include_once('conexao.php');

        $usuario = mysqli_real_escape_string($conector, $_SESSION['usuario']);

        $query = "select 
                    gerenciarUsuarios, consultarUsuarios, gerenciarLocatarios, consultarLocatarios, consultarRegistros, lancarRegistros 
                    from tb_usuario where login = '{$usuario}'";

        $result = mysqli_query($conector, $query);        

        $_SESSION['permissoes'] = mysqli_fetch_array($result);
    }

    function mostraMenu(){            

        if($_SESSION['permissoes']['gerenciarUsuarios'] == true){ 
            $_SESSION['dados'] = $_SESSION['menu'][0];
            include("menuLateralItem.php");
        }
        if($_SESSION['permissoes']['consultarUsuarios'] == true){
            $_SESSION['dados'] = $_SESSION['menu'][1];
            include("menuLateralItem.php");
        }
        if($_SESSION['permissoes']['gerenciarLocatarios'] == true){
            $_SESSION['dados'] = $_SESSION['menu'][2];
            include("menuLateralItem.php");
        }
        if($_SESSION['permissoes']['consultarLocatarios'] == true){
            $_SESSION['dados'] = $_SESSION['menu'][3];
            include("menuLateralItem.php");
        }
        if($_SESSION['permissoes']['consultarRegistros'] == true){
            $_SESSION['dados'] = $_SESSION['menu'][4];
            include("menuLateralItem.php");
        }
        if($_SESSION['permissoes']['lancarRegistros'] == true){
            $_SESSION['dados'] = $_SESSION['menu'][5];
            include("menuLateralItem.php");
        }

    };
    function abrePaginas(){
        if($_SESSION['permissoes']['gerenciarUsuarios'] == true){
            // echo 'entrei1';
            include("gerenciarUsuarios.php");
        }
        if($_SESSION['permissoes']['consultarUsuarios'] == true){
            // echo 'entrei2';
            include("consultarUsuarios.php");
        }
        if($_SESSION['permissoes']['gerenciarLocatarios'] == true){
            // echo 'entrei3';
            include("gerenciarLocatarios.php");
        }
        if($_SESSION['permissoes']['consultarLocatarios'] == true){
            // echo 'entrei4';
            include("consultarLocatarios.php");
        }
        if($_SESSION['permissoes']['consultarRegistros'] == true){
            // echo 'entrei5';
            include("consultarRegistros.php");
        }
        if($_SESSION['permissoes']['lancarRegistros'] == true){
            // echo 'entrei6';
            include("lancarRegistros.php");
        }        
    };
?>