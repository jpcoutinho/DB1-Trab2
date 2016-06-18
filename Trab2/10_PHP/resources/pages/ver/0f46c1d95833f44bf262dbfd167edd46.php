<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tabela Jogo em Grupo</h1>
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
                <th>Nome do jogo</th>
                <th>Min jogadores</th>
                <th>Max jogadores</th>
                <th>N de Equipes</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $pdo = BancodeDados::conecta();
              $sql = 'SELECT * FROM '. $BDSchema .'TB_JogoEmGrupo ORDER BY nome_jgo ASC';
              foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td>'. $row['nome_jgo'] . '</td>';
                echo '<td>'. $row['jogadores_min'] . '</td>';
                echo '<td>'. $row['jogadores_max'] . '</td>';
                echo '<td>'. $row['equipes'] . '</td>';
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
