<?php
  @session_start();
  include_once("funcoes.php");
  include_once('conexao.php');
  
  // validaPermissoes();

  if(!(empty(@$_POST['nome']) || empty(@$_POST['valor']) || empty(@$_POST['cpf']) || empty(@$_POST['data']) || empty(@$_POST["ap"]) || empty(@$_POST["telefone"]))){        
  
    $nome = mysqli_real_escape_string($conector, $_POST["nome"]);
    $valor = mysqli_real_escape_string($conector, $_POST["valor"]);
    $cpf = mysqli_real_escape_string($conector, $_POST["cpf"]);
    $ap = mysqli_real_escape_string($conector, $_POST["ap"]);
    $telefone = mysqli_real_escape_string($conector, $_POST["telefone"]);
    $data = mysqli_real_escape_string($conector, $_POST["data"]);

    if ("ele ta na tabela" == "      ") {
        echo "faz query de update";
    }else{
        $query = "INSERT INTO tb_locatarios(cpf, nome, telefone, apartamento, valor_aluguel,	data_locacao) VALUES ('$cpf','$nome','$telefone','$ap', '$valor', '$data')";
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
<div class="corpoHtml" id="GerenciarLocatarios">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gerenciar Locatário</h1>
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
                <h3 class="card-title">Locatário</h3>
              </div>
              <div class="card-body">
                <form action="gerenciarLocatarios.php" method="POST">
                  <div>
                      <div class="col-md-12">
                          <div style="margin-top: 10px;">
                            <label>Nome</label>
                            <input class="form-control" type="text" name="nome" placeholder="Nome do Locatário">
                          </div>
                          <div class="row" style="margin-top: 10px;margin-left: 1px;">
                            <div class="form-group">
                              <label>Valor do aluguel</label>
                              <input class="form-control" style="max-width: 200px;" type="text" name="valor" placeholder="Valor do Aluguel">
                            </div>  
                            <div style="margin-left: 10px;" class="form-group">
                              <label>Cpf</label>
                              <input class="form-control" style="max-width: 200px;" type="text" name="cpf" placeholder="000.000.000-00">
                            </div>                      
                            <div style="margin-left: 10px;" >
                              <label>Apartamento:</label> 
                              <input class="form-control" style="max-width: 200px;" type="text" name="ap" placeholder="Número do Apartamento">
                            </div>
                            <div style="margin-left: 10px;" >
                              <label>Telefone:</label> 
                              <input class="form-control" style="max-width: 200px;" type="text" name="telefone" placeholder="(00) 00000-0000">
                            </div>
                            <div class="form-group" style="margin-left: 10px;">
                                <label>Data:</label>
                                  <div class="input-group date" id="dataRegistro" data-target-input="nearest">
                                      <input type="date" class="form-control datetimepicker-input" name="data" data-target="#dataRegistro"/>
                                      <div class="input-group-append" data-target="#dataRegistro" data-toggle="datetimepicker">
                                      </div>
                                  </div>
                              </div>
                          </div>
              
                            <div class="row">
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