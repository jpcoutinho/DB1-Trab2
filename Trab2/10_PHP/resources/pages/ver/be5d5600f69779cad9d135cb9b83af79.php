<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tabela Vendeu</h1>
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
                <th>DOC do cliente</th>
                <th>Valor</th>
                <th>Data da transação</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $pdo = BancodeDados::conecta();
              $sql = 'SELECT * FROM '. $BDSchema .'TB_Vendeu ORDER BY numero_cax ASC';
              foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td>'. $row['numero_cax'] .'</td>';
                echo '<td>'. $row['doc_cli'] . '</td>';
                echo '<td>'. $Moeda .''. $row['valor'] . '</td>';
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
