<?php
$pdo = BancodeDados::conecta();
$doc = $_GET['a'];
$stmt = $pdo->query("SELECT * FROM ". $BDSchema ."TB_Pessoa PES WHERE PES.doc='".$doc."'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$nome = $row['nome'];
$tpdoc = $row['tipodoc'];
$sexo = $row['sexo'];
$nascimento = $row['nascimento'];
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Visualizar uma pessoa</h1>
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
          <dt>DOC:</dt>
          <?php echo '<dd>#'.$doc.'</dd>';
          echo '<dt>Tipo do DOC:</dt>';
          if($tpdoc==='PP')
            echo '<dd>Passaporte</dd>';
          else
            echo '<dd>Idêntidade</dd>';
          ?>
          <dt>Sexo:</dt>
          <?php
          if($sexo==='M')
            echo '<dd>Masculino</dd>';
          elseif ($sexo==='F')
            echo '<dd>Fêminino</dd>';
          else
            echo '<dd>Outro</dd>';
          ?>
          <dt>Data de nascimento:</dt>
          <?php echo '<dd>'.$nascimento.'</dd>';
          echo '<dt>Contato:</dt>';
          $stmt = $pdo->query("SELECT * FROM ". $BDSchema ."TB_ContatoPessoa COP WHERE COP.doc_pes='". $doc ."'");
          foreach ($stmt as $row)
            echo '<dd>'.$row['contato'].'</dd>';
          ?>
          <dt>Status</dt>
          <?php
          $stmt = $pdo->query("SELECT * FROM ". $BDSchema ."TB_Cliente CLI WHERE CLI.doc_pes='". $doc ."'");
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          if(!empty($row['doc_pes']))
            echo '<dd><a href="page.php?ntb=36b5b40331e8df3f92b5ccf8685afbf5&tb=2&a='.$doc.'"><span class="label label-success">É CLIENTE</span></a></dd>';
          else
            echo '<dd><span class="label label-danger">NÃO É CLIENTE</span></dd>';
          ?>
      </dl>
    </div>
</div>
<!-- /.row -->
<?php
BancodeDados::desconecta();
?>
