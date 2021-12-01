<?php
    include("conexao.php");   
    include("variaveis.php");

    $query = "select * from tb_usuario";
  
    $result = mysqli_query($conector, $query);
?>
<div class="corpoHtml" id="ConsultarUsuarios">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Consultar Usuários</h1>
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
                  <th>Login</th>
                  <?php
                    echo "<th>" . $Menus[0][1] . "</th>";
                    echo "<th>" . $Menus[1][1] . "</th>";
                    echo "<th>" . $Menus[2][1] . "</th>";
                    echo "<th>" . $Menus[3][1] . "</th>";
                    echo "<th>" . $Menus[4][1] . "</th>";
                    echo "<th>" . $Menus[5][1] . "</th>";
                  ?>          
                </tr>
                </thead>
                <tbody id="conteudoTabelaCadastrarUsuario">
                  <?php
                    while ($row = $result->fetch_row()) {
                      echo 
                        "<tr>
                          <td>$row[0]</td>
                          <td><input type=\"checkbox\" id=\"checkbox" . $Menus[0][0]. "\" name=\"checkbox" . $Menus[0][0] . "\" " . ($row[2] == 1 ? "checked" : "") . "></td>
                          <td><input type=\"checkbox\" id=\"checkbox" . $Menus[1][0]. "\" name=\"checkbox" . $Menus[1][0] . "\" " . ($row[3] == 1 ? "checked" : "") . "></td>
                          <td><input type=\"checkbox\" id=\"checkbox" . $Menus[2][0]. "\" name=\"checkbox" . $Menus[2][0] . "\" " . ($row[4] == 1 ? "checked" : "") . "></td>
                          <td><input type=\"checkbox\" id=\"checkbox" . $Menus[3][0]. "\" name=\"checkbox" . $Menus[3][0] . "\" " . ($row[5] == 1 ? "checked" : "") . "></td>
                          <td><input type=\"checkbox\" id=\"checkbox" . $Menus[4][0]. "\" name=\"checkbox" . $Menus[4][0] . "\" " . ($row[6] == 1 ? "checked" : "") . "></td>
                          <td><input type=\"checkbox\" id=\"checkbox" . $Menus[5][0]. "\" name=\"checkbox" . $Menus[5][0] . "\" " . ($row[7] == 1 ? "checked" : "") . "></td>
                        </tr>";
                    }
                  ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Login</th>
                  <?php
                    echo "<th>" . $Menus[0][1] . "</th>";
                    echo "<th>" . $Menus[1][1] . "</th>";
                    echo "<th>" . $Menus[2][1] . "</th>";
                    echo "<th>" . $Menus[3][1] . "</th>";
                    echo "<th>" . $Menus[4][1] . "</th>";
                    echo "<th>" . $Menus[5][1] . "</th>";
                  ?>          
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