<?php
  @session_start();
  include_once("funcoes.php");
  include_once('conexao.php');
  
  // validaPermissoes();

  if(!(empty(@$_POST['login']) || empty(@$_POST['senha']))){        
  
    $login = mysqli_real_escape_string($conector, @$_POST["login"]);
    $senha = mysqli_real_escape_string($conector, @$_POST["senha"]);
    $gUsu = mysqli_real_escape_string($conector, @$_POST["gUsu"]) == 'on' ? 1 : 0;
    $cUsu = mysqli_real_escape_string($conector, @$_POST["cUsu"]) == 'on' ? 1 : 0;
    $gLoc = mysqli_real_escape_string($conector, @$_POST["gLoc"]) == 'on' ? 1 : 0;
    $cLoc = mysqli_real_escape_string($conector, @$_POST["cLoc"]) == 'on' ? 1 : 0;
    $cReg = mysqli_real_escape_string($conector, @$_POST["cReg"]) == 'on' ? 1 : 0;
    $lReg = mysqli_real_escape_string($conector, @$_POST["lReg"]) == 'on' ? 1 : 0;

    
    if ("ele ta na tabela" == "      ") {
        echo "faz query de update";
    }else{
        $query = "INSERT INTO `tb_usuario`(`login`, `senha`, `gerenciarUsuarios`, `consultarUsuarios`, `gerenciarLocatarios`, `consultarLocatarios`, `consultarRegistros`, `lancarRegistros`) 
        VALUES ('$login','" . md5($senha) . "','$gUsu','$cUsu','$gLoc','$cLoc','$cReg','$lReg');";
    }

    $result = mysqli_query($conector, $query);
    
    if($result){
        echo'entrei';
        $_SESSION[$_SESSION['menu'][5][0]] = 'true';
    } else{
        echo'entrei2';
        $_SESSION[$_SESSION['menu'][5][0]] = 'false';
    }
    
    header('Location: home.php');     
  }
?> 
<div class="corpoHtml" id="GerenciarUsuarios">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gerenciar Usuários</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Usuários</h3>

                <!-- <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div> -->

              </div>
              <div class="card-body">
                <form action="gerenciarUsuarios.php" method="POST">
                  <div>
                      <div class="col-md-12">
                          <div style="margin-top: 10px;">
                            <label>Login:</label>
                            <input class="form-control" type="text" name="login" placeholder="Login">
                          </div>
                          <div style="margin-top: 10px;">
                            <label>Senha:</label>
                            <input class="form-control" type="text" name="senha" placeholder="Senha">
                          </div>
                          <div class="row" style="margin-top: 10px;margin-left: 1px;">
                            <div style="margin-top: 10px;">
                              <label>Gerenciar Usuários:</label><br>
                              <center>
                                <input type="checkbox" name="gUsu">
                              </center>
                            </div>
                            <div style="margin-top: 10px;  margin-left: 10px;">                            
                              <label>Consultar Usuários:</label><br>
                              <center>
                                <input type="checkbox" name="cUsu">
                              </center>
                            </div>
                            <div style="margin-top: 10px;  margin-left: 10px;">
                              <label>Gerenciar Locatários:</label><br>
                              <center>
                                <input type="checkbox" name="gLoc">
                              </center>
                            </div>
                            <div style="margin-top: 10px;  margin-left: 10px;">
                              <label>Consultar Locatários:</label><br>
                              <center>
                                <input type="checkbox" name="cLoc">
                              </center>
                            </div>
                            <div style="margin-top: 10px;  margin-left: 10px;">
                              <label>Consultar Registros:</label><br>
                              <center>
                                <input type="checkbox" name="cReg">
                              </center>
                            </div>
                            <div style="margin-top: 10px;  margin-left: 10px;">
                              <label>Lançar Registros:</label><br>
                              <center>
                                <input type="checkbox" name="lReg">
                              </center>
                            </div>	                   
                          </div>              
                            <div style="margin-top: 10px;" class="row">
                              <div class="col-xs-4">
                                <button type="submit" id="abrirModalCadastrarUsuario" class="btn btn-primary btn-block btn-flat">
                                  Salvar
                                </button>
                              </div>
                              <!-- /.col -->
                            </div>
                      </div>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
</div>