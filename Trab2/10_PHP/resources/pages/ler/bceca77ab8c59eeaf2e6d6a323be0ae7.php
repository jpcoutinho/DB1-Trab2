<?php
$pdo = BancodeDados::conecta();
$nome = $_GET['a'];
$stmt = $pdo->query("SELECT * FROM ". $BDSchema ."TB_Jogo JGO WHERE JGO.nome='". $nome ."'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$nome = $row['nome'];
$duracao = $row['duracao'];
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Visualizar um Jogo</h1>
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
          <dt>Nome:</dt>
          <?php echo '<dd>'.$nome.'</dd>'; ?>
          <dt>Duração:</dt>
          <?php echo '<dd>'.$duracao.' min</dd>'; ?>
          <dt>Está sendo jogado em:</dt>
          <?php
          $stmt = $pdo->query("SELECT count(numero) FROM ". $BDSchema ."TB_Mesa MES WHERE MES.nome_jgg='".$nome."'");
          $QTMES = $stmt->fetchColumn();
          $stmt = $pdo->query("SELECT count(snumber_maq) FROM ". $BDSchema ."TB_Oferece OFE WHERE OFE.nome_jgi='".$nome."'");
          $QTMAQ = $stmt->fetchColumn();
          if($QTMES>0)
            echo '<dd>'.$QTMES.' Mesa(s) <a data-toggle="modal" data-target="#QTMes">(Detalhes)</a></dd>';
          elseif($QTMAQ>0)
            echo '<dd>'.$QTMAQ.' Máquina(s) <a data-toggle="modal" data-target="#QTMaq">(Detalhes)</a></dd>';
          else
            echo '<dd>Nenhum lugar</dd>';
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
                <?php echo 'Tem certeza que deseja deletar o funcioário: '.$NomePes.' com o documento: #'.$doc_pes.'?'; ?>
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
<div class="modal fade" id="QTMes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <?php echo '<h4 class="modal-title" id="myModalLabel">O jogo '.$nome.' está nas seguintes mesas</h4>'; ?>
            </div>
            <div class="modal-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="MainTabela">
                      <thead>
                        <tr>
                          <th>Numero da mesa</th>
                          <th>Nome do Jogo</th>
                          <th>TIN da franquia</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sql = "SELECT * FROM ". $BDSchema ."TB_Mesa MES WHERE MES.nome_jgg='".$nome."' ORDER BY nome_jgg ASC";
                        foreach ($pdo->query($sql) as $row) {
                          echo '<tr>';
                          echo '<td>'. $row['numero'] . '</td>';
                          echo '<td>'. $row['nome_jgg'] . '</td>';
                          echo '<td>'. $row['tin_fra'] . '</td>';
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
<!-- Modal -->
<div class="modal fade" id="QTMaq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <?php echo '<h4 class="modal-title" id="myModalLabel">O jogo '.$nome.' está nas seguintes máquinas</h4>'; ?>
            </div>
            <div class="modal-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="SecTabela">
                      <thead>
                        <tr>
                          <th>Nome</th>
                          <th>Serial da máquina</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sql = "SELECT * FROM ". $BDSchema ."TB_Oferece OFE WHERE OFE.nome_jgi='".$nome."' ORDER BY nome_jgi ASC";
                        foreach ($pdo->query($sql) as $row) {
                          echo '<tr>';
                          echo '<td>'. $row['nome_jgi'] . '</td>';
                          echo '<td>'. $row['snumber_maq'] . '</td>';
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
