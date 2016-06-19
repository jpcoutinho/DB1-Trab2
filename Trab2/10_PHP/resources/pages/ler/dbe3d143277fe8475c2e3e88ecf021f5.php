<?php
$pdo = BancodeDados::conecta();
$doc = $_GET['a'];
$stmt = $pdo->query("SELECT * FROM ". $BDSchema ."TB_Funcionario FUC WHERE FUC.doc_pes='". $doc ."'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$doc_pes = $row['doc_pes'];
$ri = $row['ri'];
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Visualizar um Funcionário</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <?php
    echo '<a href="tabela.php?ntb='.$_GET['ntb'].'"><button type="button" class="btn btn-primary">Voltar</button></a>';
    echo '<a href="page.php?ntb=05b7ea9032cccacb4ecfa3785f42810c&tb=2&a='.$_GET['a'].'"><button type="button" class="btn btn-info MarginLeft">Ir para pessoa</button></a>';
    echo '<a href="page.php?ntb='.$_GET['ntb'].'&tb=3&a='.$_GET['a'].'"><button type="button" class="btn btn-warning MarginLeft">Editar</button></a>';
    echo '<button type="button" class="btn btn-danger MarginLeft" data-toggle="modal" data-target="#DeletarEntrada">Deletar</button>';
    ?>
  </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
      <dl class="dl-horizontal MarginTop">
          <?php
          $stmt = $pdo->query("SELECT * FROM ". $BDSchema ."TB_Pessoa PES WHERE PES.doc='". $doc_pes ."'");
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          $NomePes = $row['nome'];
          ?>
          <dt>Registro Interno (RI):</dt>
          <?php echo '<dd>#'.$ri.'</dd>'; ?>
          <dt>Documento:</dt>
          <?php echo '<dd>#'.$doc_pes.'</dd>'; ?>
          <dt>Tipo do documento:</dt>
          <?php
          if($row['tipodoc']==='PP')
            echo '<dd>Passaporte</dd>';
          else
            echo '<dd>Idêntidade</dd>';
          ?>
          <dt>Nome:</dt>
          <?php echo '<dd>'.$NomePes.'</dd>'; ?>
          <dt>Sexo:</dt>
          <?php
          if($row['sexo']==='M')
            echo '<dd>Masculino</dd>';
          elseif ($row['sexo']==='F')
            echo '<dd>Fêminino</dd>';
          else
            echo '<dd>Outro</dd>';
          ?>
          <dt>Data de nascimento:</dt>
          <?php echo '<dd>'.$row['nascimento'].'</dd>';
          echo '<dt>Contato:</dt>';
          $stmt = $pdo->query("SELECT * FROM ". $BDSchema ."TB_ContatoPessoa COP WHERE COP.doc_pes='". $doc ."'");
          foreach ($stmt as $row)
            echo '<dd>'.$row['contato'].'</dd>';
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
<?php
BancodeDados::desconecta();
?>
