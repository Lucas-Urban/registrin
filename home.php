<!DOCTYPE html>

<?php 
  session_start();

  include_once("funcoes.php"); 
  include_once("variaveis.php");
  
  validaPermissoes();
?>

<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Language" content="pt-br">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RegistrIn</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte.min.css">
  <link rel="stylesheet" href="tempusdominus-bootstrap-4.min.css" >
  <link rel="stylesheet"
    href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <link rel="script"
    href="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js">
    
</head>

<body class="hold-transition sidebar-mini">
  
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>

        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link"  href="index.html" role="button">
            <b>Sair</b>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.html" class="brand-link">
        <span class="brand-text font-weight-light">Registr<b>In</b></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <?php
                mostraMenu();
              ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">

        <?php          
          abrePaginas();
        ?>

        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Adriel Nobre - Jônatas Peixoto - Lucas Dhein - Lucas Urban - Thiago Gomes
      </div>
      <!-- Default to the left -->
      <strong>Registr<b>In</b> &copy; 2021 <a href="https://www.ulbra.br/">Equipe Ulbra</a>.</strong> todos direitos
      reservados.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="/site/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->

  <script src="/site/plugins/moment/moment.min.js"></script>

  <script src="/site/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

  <script src="/site/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
  <script src="/site/dist/js/adminlte.min.js"></script>
  <script type="module" src="/site/scripts/scripts.js" ></script>
  <script src= "scriptMenu.js"></script>
  <?php
    if(@$_SESSION[$_SESSION['menu'][5][0]] == 'true'){ 
      echo  "<script>alert('Sucesso!');</script>";
      $_SESSION[$_SESSION['menu'][5][0]] = 'null';
  
    } else if(@$_SESSION[$_SESSION['menu'][5][0]] == 'false'){ 
      echo  "<script>alert('Faio!');</script>";
      $_SESSION[$_SESSION['menu'][5][0]] = 'null';
    }  

    if(@empty($_SESSION['pagina'])){      
      $_SESSION['pagina'] = 'home';
    }
    
    echo  "<script>abrePagina('" . $_SESSION['pagina'] . "');</script>";
  ?>
</body>
</html>
