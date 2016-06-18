<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tabela Frequentou</h1>
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
                <th>Doc do cliente</th>
                <th>TIN</th>
                <th>Data</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $pdo = BancodeDados::conecta();
              $sql = 'SELECT * FROM '. $BDSchema .'TB_Frequentou ORDER BY doc_cli ASC';
              foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td>'. $row['doc_cli'] . '</td>';
                echo '<td>'. $row['tin_fra'] . '</td>';
                echo '<td>'. $row['data'] . '</td>';
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
