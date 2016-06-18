<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tabela Contato Franquia</h1>
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
                <th>TIN</th>
                <th>Contato</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $pdo = BancodeDados::conecta();
              $sql = 'SELECT * FROM '. $BDSchema .'TB_ContatoFranquia ORDER BY tin_fra ASC';
              foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td>'. $row['tin_fra'] . '</td>';
                echo '<td>'. $row['contato'] . '</td>';
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
