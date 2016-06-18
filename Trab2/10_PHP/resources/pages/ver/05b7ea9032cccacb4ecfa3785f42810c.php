<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tabela Pessoa</h1>
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
                  <th>DOC</th>
                  <th>Nome</th>
                  <th>Tipo do DOC</th>
                  <th>Sexo</th>
                  <th>Nascimento</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $pdo = BancodeDados::conecta();
                $sql = 'SELECT * FROM '. $BDSchema .'TB_Pessoa ORDER BY doc ASC';
                foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>'. $row['doc'] . '</td>';
                    echo '<td>'. $row['nome'] . '</td>';
                    echo '<td>'. $row['tipodoc'] . '</td>';
                    echo '<td>'. $row['sexo'] . '</td>';
                    echo '<td>'. $row['nascimento'] . '</td>';
                    echo '<td>
                    <a href="page.php?ntb='. $_GET['ntb'] .'&tb=2&a='. $row['doc'] .'"><button type="button" class="btn btn-info">Ler</button></a>
                    <a href="page.php?ntb='. $_GET['ntb'] .'&tb=3&a='. $row['doc'] .'"><button type="button" class="btn btn-warning">Editar</button></a>
                    <a href="page.php?ntb='. $_GET['ntb'] .'&tb=4&a='. $row['doc'] .'"><button type="button" class="btn btn-danger">Deletar</button></a>
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
