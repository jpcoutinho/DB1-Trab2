<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tabela Contato Pessoa</h1>
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
                <th>Doc da pessoa</th>
                <th>Contato</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $pdo = BancodeDados::conecta();
              $sql = 'SELECT * FROM '. $BDSchema .'TB_ContatoPessoa ORDER BY doc_pes ASC';
              foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td>'. $row['doc_pes'] . '</td>';
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
