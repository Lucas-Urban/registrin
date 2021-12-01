<?php
  @session_start();
  include_once("funcoes.php");
  include_once('conexao.php');
  
  // validaPermissoes();

  if(!(empty(@$_POST['descricao']) || empty(@$_POST['valor']) || empty(@$_POST['data']) || empty(@$_POST['operacao']))){        
  
    $descricao = mysqli_real_escape_string($conector, $_POST["descricao"]);
    $valor = mysqli_real_escape_string($conector, $_POST["valor"]);
    $data = mysqli_real_escape_string($conector, $_POST["data"]);
    $ap = mysqli_real_escape_string($conector, $_POST["ap"]);
    $operacao = mysqli_real_escape_string($conector, $_POST["operacao"]);


    if ("ele ta na tabela" == "      ") {
        echo "faz query de update";
    }else{
        $query = "INSERT INTO tb_registros(descricao, valor, data, tipo_movimentação, apartamento) VALUES ('$descricao','$valor','$data','$operacao','$ap')";
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
<div class="corpoHtml" id="LancarRegistros">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lançar Registro</h1>
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
                <h3 class="card-title">Registro</h3>

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
                <form action="lancarRegistros.php" method="POST">
                  <div>
                      <div class="col-md-12">
                          <div style="margin-top: 10px;">
                            <label>Descrição</label>
                            <input class="form-control" type="text" name="descricao" placeholder="Descrição do Registro">
                          </div>
                          <div class="row" style="margin-top: 10px;margin-left: 1px;">
                            <div>
                              <label>Valor</label>
                              <input class="form-control" style="max-width: 200px;" type="text" name="valor" placeholder="Valor do Registro">
                            </div>
                            <div>
                              <div class="form-group" style="margin-left: 10px;">
                                <label>Data:</label>
                                  <div class="input-group date" id="dataRegistro" data-target-input="nearest">
                                      <input type="date" class="form-control datetimepicker-input" name="data" data-target="#dataRegistro"/>
                                      <div class="input-group-append" data-target="#dataRegistro" data-toggle="datetimepicker">
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <div style="margin-left: 10px;" >
                              <label>Apartamento:</label> 
                              <input class="form-control" style="max-width: 200px;" type="text" name="ap" placeholder="Número do Apartamento">
                            </div>
                          </div>
                          
                          <div style="margin-top: 10px;">
                              <label>Tipo Movimentação</label>
                              <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" value="E" type="radio" name="operacao" checked>
                                        <label class="form-check-label">Entrada</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" value="S"  type="radio" name="operacao" >
                                        <label class="form-check-label">Saída</label>
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