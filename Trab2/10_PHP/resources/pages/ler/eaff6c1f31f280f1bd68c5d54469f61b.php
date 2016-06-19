<?php
$pdo = BancodeDados::conecta();
$snumber = $_GET['a'];
$stmt = $pdo->query("SELECT * FROM ". $BDSchema ."TB_Maquina MAQ WHERE MAQ.snumber='". $snumber ."'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$tin = $row['tin_fra'];
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Visualizar uma Máquina</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <?php
    echo '<a href="tabela.php?ntb='.$_GET['ntb'].'"><button type="button" class="btn btn-primary">Voltar</button></a>';
    echo '<a href="page.php?ntb='.$_GET['ntb'].'&tb=3&a='.$_GET['a'].'"><button type="button" class="btn btn-warning MarginLeft">Editar</button></a>';
    echo '<button type="button" class="btn btn-danger MarginLeft" data-toggle="modal" data-target="#DeletarEntrada">Deletar</button>';
    ?>
  </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
      <dl class="dl-horizontal MarginTop">
          <dt>Serial:</dt>
          <?php echo '<dd>'.$snumber.'</dd>'; ?>
          <dt>Localização:</dt>
          <?php
          $stmt = $pdo->query("SELECT * FROM ". $BDSchema ."TB_Franquia FRA WHERE FRA.tin='". $tin ."'");
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          echo '<dd>'.$row['nome'].' - '.$tin.'</dd>'; ?>
          <dt>Oferece o jogo:</dt>
          <?php
          $stmt = $pdo->query("SELECT * FROM ". $BDSchema ."TB_Oferece OFE WHERE OFE.snumber_maq='". $snumber ."'");
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          echo '<dd>'.$row['nome_jgi'].'</dd>'; ?>
          <dt>Ja realizou:</dt>
          <?php
          $stmt = $pdo->query("SELECT count(*) FROM ". $BDSchema ."TB_Jogada JOG WHERE JOG.snumber_maq='".$snumber."'");
          $QTJOG = $stmt->fetchColumn();
          echo '<dd>'.$QTJOG.' Jogadas <a data-toggle="modal" data-target="#QTJOG">(Detalhes)</a></dd>';
          ?>
      </dl>
    </div>
</div>
<!-- /.row -->
<!-- Modal -->
<div class="modal fade" id="DeletarEntrada" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Deletar entrada</h4>
            </div>
            <div class="modal-body">
                <?php echo 'Tem certeza que deseja deletar a máquina com o serial: #'.$snumber.'?'; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Não</button>
                <?php echo '<a href="page.php?ntb='.$_GET['ntb'].'&tb=4&a='.$_GET['a'].'"><button type="button" class="btn btn-danger">Deletar</button></a>'; ?>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- Modal -->
<div class="modal fade" id="QTJOG" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <?php echo '<h4 class="modal-title" id="myModalLabel">Histórico de jogadas da máquina com Serial #'.$snumber.'</h4>'; ?>
            </div>
            <div class="modal-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="MainTabela">
                      <thead>
                        <tr>
                          <th>DOC Cliente</th>
                          <th>Data e Hora</th>
                          <th>Apostou</th>
                          <th>Ganhou</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sql = "SELECT * FROM ". $BDSchema ."TB_Jogada JOG WHERE JOG.snumber_maq='".$snumber."' ORDER BY data DESC";
                        foreach ($pdo->query($sql) as $row) {
                          echo '<tr>';
                          echo '<td>'. $row['doc_cli'] . '</td>';
                          echo '<td>'. $row['data'] . '</td>';
                          echo '<td>'. $row['apostou'] . '</td>';
                          echo '<td>'. $row['ganhou'] . '</td>';
                          echo '</tr>';
                        }
                        ?>
                      </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php
BancodeDados::desconecta();
?>
