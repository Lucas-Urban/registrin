<?php
@session_start();
include("conexao.php");

if (!empty(@$_SESSION[$_SESSION['menu'][4][0]])){  
  $query = $_SESSION[$_SESSION['menu'][4][0]];
} else {
  $query = "SELECT * FROM tb_registros order by data DESC LIMIT 10;";
}

$_SESSION[$_SESSION['menu'][4][0]] = null;

$result = mysqli_query($conector, $query);  

?>
<div class="corpoHtml" id="ConsultarRegistros">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Consultar Registro</h1>
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
              <h3 class="card-title">Registros</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <form action="consultaRegistro.php" method="POST">
                <div>
                  <div class="col-md-12">
                    <div style="margin-top: 10px;">
                      <label>Descrição</label>
                      <input class="form-control" type="text" name="descricao" placeholder="Descricao do Registro">
                    </div>
                    <div class="row" style="margin-top: 10px;margin-left: 1px;">
                      <div>
                        <label>Apartamento:</label>
                        <input class="form-control" style="max-width: 200px;" type="text" name="ap" placeholder="Número do Apartamento">
                      </div>
                      <div style="margin-left: 10px;">
                        <label>Tipo modificação</label>
                        <select class="form-control" name="movimentacao">
                          <option value="" selected>Todos</option>
                          <option value="E">Entrada</option>
                          <option value="S">Saída</option>
                        </select>
                      </div>
                      <div style="margin-left: 10px;">
                        <label>Data Inicio</label>
                        <input type="date" class="form-control datetimepicker-input" name="dtInicio" data-target="#dataRegistro" />
                      </div>
                      <div style="margin-left: 10px;">
                        <label>Data Fim</label>
                        <input type="date" class="form-control datetimepicker-input" name="dtFim" data-target="#dataRegistro" />
                      </div>
                      <div style="margin-left: 10px;">
                        <label>Limite:</label>
                        <input class="form-control" style="max-width: 200px;" type="text" name="limite" value="10" placeholder="Limite de registros">
                      </div>
                    </div>

                    <div style="margin: 20px 0;" class="row">
                      <div class="col-xs-4">
                        <button type="submit" id="abrirModalCadastrarUsuario" class="btn btn-primary btn-block btn-flat">
                          Consultar
                        </button>
                      </div>
                      <!-- /.col -->
                    </div>
                  </div>
                </div>
              </form>
              <table id="tabelaCadastrarUsuario" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Tipo Movimentação</th>
                    <th>Data</th>
                    <th>Apartamento</th>
                  </tr>
                </thead>
                <tbody id="conteudoTabelaCadastrarUsuario">
                  <?php
                  if ($result) {
                    while ($row = $result->fetch_row()) {
                      echo
                      "<tr>
                        <td>$row[5]</td>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>" . ($row[3] == 'E' ? 'Entrada' : 'Saida') . "</td>
                        <td>$row[2]</td>
                        <td>$row[4]</td>                        
                      </tr>";
                    }
                  }
                  ?>

                </tbody>
                <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Tipo Movimentação</th>
                    <th>Data</th>
                    <th>Apartamento</th>
                  </tr>
                </tfoot>
              </table>
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