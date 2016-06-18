<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tabela Jogada</h1>
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
                <th>Serial</th>
                <th>Nome do jogo</th>
                <th>Data e hora</th>
                <th>Apostou</th>
                <th>Ganhou</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $pdo = BancodeDados::conecta();
              $sql = 'SELECT * FROM '. $BDSchema .'TB_Jogada ORDER BY doc_cli ASC';
              foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td>'. $row['doc_cli'] . '</td>';
                echo '<td>'. $row['snumber_maq'] . '</td>';
                echo '<td>'. $row['nome_jgo'] . '</td>';
                echo '<td>'. $row['data'] . '</td>';
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
