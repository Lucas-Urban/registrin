<?php
    include("conexao.php");   

    $query = "select * from tb_locatarios";
  
    $result = mysqli_query($conector, $query);
?>
<div class="corpoHtml" id="ConsultarLocatarios">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Consultar Locatários</h1>
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
                <h3 class="card-title">Locatários</h3>

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
              <table id="tabelaCadastrarUsuario" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>CPF</th>
                  <th>Nome</th>
                  <th>Número do Ap.</th>
                  <th>Telefone</th>
                  <th>Valor do Aluguel</th>
                  <th>Data de admissão</th>
                </tr>
                </thead>
                <tbody id="conteudoTabelaCadastrarUsuario">
                  <?php 
                  
                  while ($row = $result->fetch_row()) {
                    echo 
                      "<tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[3]</td>
                        <td>$row[2]</td>
                        <td>$row[4]</td>
                        <td>$row[5]</td>
                      </tr>";
                  }
                  ?>               

                </tbody>
                <tfoot>
                <tr>
                  <th>CPF</th>
                  <th>Nome</th>
                  <th>Número do Ap.</th>
                  <th>Telefone</th>
                  <th>Valor do Aluguel</th>
                  <th>Data de admissão</th>
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
<script>
    window.dt = require('/node_modules/datatables.net')();
    window.$('#table_id').DataTable();

</script>