<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tabela Caixa</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
      <div class="dataTable_wrapper">
          <table class="table table-striped table-bordered table-hover" id="MainTabela">
              <thead>
                  <tr>
                      <th>Número do caixa</th>
                      <th>TIN da franquia</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                  $pdo = BancodeDados::conecta();
                  $sql = 'SELECT * FROM '. $BDSchema .'TB_Caixa ORDER BY numero ASC';
                  foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>'. $row['numero'] .'</td>';
                    echo '<td>'. $row['tin_fra'] . '</td>';
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
