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
        <li><a href="tabela.php?ntb=0a258ee607f3546bd8d9050ef6697142">Tabela Contato Franquia</a></li>
        <li>
          <span class="show-for-sr">Atual: </span> Visualizar entrada
        </li>
      </ul>
    </nav>
  </div>
</div>
<div class="row">
  <div class="medium-12 columns MarginTop">
    <div class="button-group">
      <?php
      echo '<a class="warning button" href="page.php?ntb='. $_GET['ntb'] .'&tb=3&a='. $tin_fra .'&b='. $contato .'">Editar</a>';
      ?>
      <a data-open="exampleModal1" class="alert button">Deletar</a>
    </div>
    <div class="reveal" id="exampleModal1" data-reveal>
      <h1>Tem certeza que deseja deletar esta entrada??</h1>
      <p class="lead">!!Esta ação não pode ser desfeita!!</p>
      <div class="row align-justify">
        <div class="column small-4"><a data-close aria-label="Cancelar" class="success button">Cancelar</a></div>
        <?php
        echo '<div class="column small-4"><a class="warning button" href="page.php?ntb='. $_GET['ntb'] .'&tb=4&a='. $tin_fra .'&b='. $contato .'">Deletar</a></div>';
        ?>
      </div>
      <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
</div>
<div class="row align-center">
  <div class="column small-4">
    <?php
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo '<span class="TitlText">Nome da franquia:</span><span class="TextLeft">  '. $row['nome'] .'</span>';
    echo '<br>';
    echo '<span class="TitlText">TIN:</span><span class="TextLeft"> '. $row['tin'] .'</span>';
    echo '<br>';
    echo '<span class="TitlText">Endereço:</span><span class="TextLeft"> '. $row['endereco'] .'</span>';
    echo '<br>';
    echo '<span class="TitlText">Contato:</span><span class="TextLeft"> '. $row['contato'] .'</span>';
    ?>
  </div>
</div>
<?php
BancodeDados::desconecta();
?>
