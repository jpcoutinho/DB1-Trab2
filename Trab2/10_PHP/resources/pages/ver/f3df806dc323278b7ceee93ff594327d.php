<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tabela Partida</h1>
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
                <th>ID</th>
                <th>Funcionário responsável</th>
                <th>Número da mesa</th>
                <th>Data e hora</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $pdo = BancodeDados::conecta();
              $sql = 'SELECT * FROM '. $BDSchema .'TB_Partida ORDER BY id ASC';
              foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td>'. $row['id'] . '</td>';
                echo '<td>'. $row['doc_fuc'] . '</td>';
                echo '<td>'. $row['numero_mes'] . '</td>';
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
