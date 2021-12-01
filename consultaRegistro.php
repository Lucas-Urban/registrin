<?php    
    @session_start();
    include("conexao.php");

    $query = "SELECT * FROM `tb_registros` WHERE";
    
    if(!empty(@$_POST['descricao'])){
      $query = $query . " `descricao` LIKE '%" . mysqli_real_escape_string($conector, $_POST["descricao"])  . "%' AND ";
    }
  
    if(!empty(@$_POST['ap'])){
      $query = $query . " `apartamento` = '" . mysqli_real_escape_string($conector, $_POST["ap"])  . "' AND ";
    }
  
    if(!empty(@$_POST['movimentacao'])){
      $query = $query . " `tipo_movimentação` = '" . mysqli_real_escape_string($conector, $_POST["movimentacao"])  . "' AND ";
    }
  
    if (!empty(@$_POST['dtInicio']) && !empty(@$_POST["dtFim"])){
      $query = $query . " `data` BETWEEN '" . mysqli_real_escape_string($conector, $_POST["dtInicio"]) 
        . "' AND '" . mysqli_real_escape_string($conector, $_POST["dtFim"]) . "' AND ";
    } else if (!empty(@$_POST['dtInicio'])){
      $query = $query . " `data` > '" . mysqli_real_escape_string($conector, $_POST["dtInicio"]) . "' AND ";
    } else if (!empty(@$_POST['dtFim'])){
      $query = $query . " `data` < '" . mysqli_real_escape_string($conector, $_POST["dtFim"])  . "' AND ";
    } 
    
    if (strcmp(substr($query, strlen($query) - 4, 3), 'AND') == 0){
      $query = substr($query, 0, strlen($query) - 4);
    }
    
    if (strcmp(substr($query, strlen($query) - 5, 6), 'WHERE') == 0){
        $query = substr($query, 0, strlen($query) - 5);
    }

    $query = $query . " ORDER BY data DESC";
    
    if(!empty(@$_POST['limite'])){
      $query = $query . " LIMIT " . mysqli_real_escape_string($conector, $_POST["limite"]);
    }
    
    $query = $query . ";";
  
    $_SESSION[$_SESSION['menu'][4][0]] = $query;
   
    header('Location: home.php');
?>