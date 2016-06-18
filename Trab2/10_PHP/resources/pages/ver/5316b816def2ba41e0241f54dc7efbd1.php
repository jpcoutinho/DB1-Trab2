<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tabela Competiu</h1>
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
                      <th>Partida</th>
                      <th>DOC</th>
                      <th>Apostou</th>
                      <th>Ganhou</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                $pdo = BancodeDados::conecta();
                $sql = 'SELECT DISTINCT ON (id_par) * FROM '. $BDSchema .'TB_Competiu ORDER BY id_par DESC';
                foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                  echo '<td>'. $row['id_par'] . '</td>';
                  echo '<td>'. $row['doc_cli'] . '</td>';
                  echo '<td>'. $Moeda .''. $row['apostou'] . '</td>';
                  echo '<td>'. $Moeda .''. $row['ganhou'] . '</td>';
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
