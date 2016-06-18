<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tabela Franquia</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
      <?php echo '<a href="page.php?ntb='.$_GET['ntb'].'&tb=1"><button type="button" class="btn btn-success btn-lg btn-block">Inserir</button></a>'; ?>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
      <div class="dataTable_wrapper MarginTop">
          <table class="table table-striped table-bordered table-hover" id="MainTabela">
              <thead>
                <tr>
                  <th>TIN</th>
                  <th>Nome</th>
                  <th>Endereço</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                  $pdo = BancodeDados::conecta();
                  $sql = 'SELECT * FROM '. $BDSchema .'TB_Franquia ORDER BY tin ASC';
                  foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>'. $row['tin'] . '</td>';
                    echo '<td>'. $row['nome'] . '</td>';
                    echo '<td>'. $row['endereco'] . '</td>';
                    echo '<td>
                    <a href="page.php?ntb='. $_GET['ntb'] .'&tb=2&a='. $row['tin'] .'"><button type="button" class="btn btn-info">Ler</button></a>
                    <a href="page.php?ntb='. $_GET['ntb'] .'&tb=3&a='. $row['tin'] .'"><button type="button" class="btn btn-warning">Editar</button></a>
                    <a href="page.php?ntb='. $_GET['ntb'] .'&tb=4&a='. $row['tin'] .'"><button type="button" class="btn btn-danger">Deletar</button></a>
                    </td>';
                    echo '</tr>';
                  }
                  BancodeDados::desconecta();
                  ?>
              </tbody>
          </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
