<?php
$pdo = BancodeDados::conecta();
$tin = $_GET['a'];
$stmt = $pdo->query("SELECT * FROM ". $BDSchema ."TB_Franquia FRA WHERE FRA.tin='". $tin ."'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$nome = $row['nome'];
$endereco = $row['endereco'];
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Visualizar um Franquia</h1>
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
          <dt>TIN:</dt>
          <?php echo '<dd>#'.$tin.'</dd>'; ?>
          <dt>Endereço:</dt>
          <?php echo '<dd>'.$row['endereco'].'</dd>'; ?>
          <?php
          echo '<dt>Contato:</dt>';
          $stmt = $pdo->query("SELECT * FROM ". $BDSchema ."TB_ContatoFranquia COF WHERE COF.tin_fra='". $tin ."'");
          foreach ($stmt as $row)
            echo '<dd>'.$row['contato'].'</dd>';
          ?>
          <dt>Numero de mesas:</dt>
          <?php
          $stmt = $pdo->query("SELECT count(numero) FROM ". $BDSchema ."TB_Mesa MES WHERE MES.tin_fra='". $tin ."'");
          $NMesa = $stmt->fetchColumn();
          echo '<dd>'.$NMesa.'</dd>'; ?>
          <dt>Numero de máquinas:</dt>
          <?php
          $stmt = $pdo->query("SELECT count(snumber) FROM ". $BDSchema ."TB_Maquina MAQ WHERE MAQ.tin_fra='". $tin ."'");
          $NMaquinas = $stmt->fetchColumn();
          echo '<dd>'.$NMaquinas.'</dd>'; ?>
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
                <?php echo 'Tem certeza que deseja deletar a franquia: '.$nome.' com a TIN: #'.$tin.'?'; ?>
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
<?php
BancodeDados::desconecta();
?>
