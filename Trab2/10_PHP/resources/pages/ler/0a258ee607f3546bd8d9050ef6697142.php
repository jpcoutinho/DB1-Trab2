<?php
require_once('resources/config.php');
$pdo = BancodeDados::conecta();
$tin_fra = $_GET['a'];
$contato = $_GET['b'];
$stmt = $pdo->query("SELECT * FROM ". $BDSchema ."TB_Franquia FRA, ". $BDSchema ."TB_ContatoFranquia COF WHERE FRA.tin='". $tin_fra ."' AND COF.contato = '". $contato ."'");
?>
<div class="row">
  <span class="TitTabel">Visualização de um contato de uma franquia</span>
</div>
<div class="row">
  <div class="medium-12 columns MarginTop">
    <nav aria-label="Você está aqui:" role="navigation">
      <ul class="breadcrumbs">
        <li><a href="index.php">Home</a></li>
        <li>
          <span class="show-for-sr">Atual: </span> Visualização de entrada
        </li>
      </ul>
    </nav>
  </div>
</div>
<div class="row">
  <div class="row align-center">
    <div class="column small-6">
      <div class="row">
        <div class="column small-6">
          <span class="NomeLeft">Franquia:</span>
        </div>
        <div class="column small-6">
          <?php
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          echo 'Nome: '. $row['nome'] .' & '. $row['contato'] .' ';
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
BancodeDados::desconecta();
?>
