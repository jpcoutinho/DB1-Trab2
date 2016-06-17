<?php
require_once('resources/config.php');
$pdo = BancodeDados::conecta();
$nome_jgo = $_GET['a'];
$stmt = $pdo->query("SELECT * FROM ". $BDSchema ."TB_JogoEmGrupo JGG WHERE JGG.nome_jgo='". $nome_jgo ."'");
?>
<div class="row">
  <span class="TitTabel">Visualização de um Jogo em Grupo</span>
</div>
<div class="row">
  <div class="medium-12 columns MarginTop">
    <nav aria-label="Você está aqui:" role="navigation">
      <ul class="breadcrumbs">
        <li><a href="index.php">Home</a></li>
        <li><a href="tabela.php?ntb=0f46c1d95833f44bf262dbfd167edd46">Tabela Jogo em Grupo</a></li>
        <li>
          <span class="show-for-sr">Atual: </span> Visualizar entrada entrada
        </li>
      </ul>
    </nav>
  </div>
</div>
<div class="row">
  <div class="medium-12 columns MarginTop">
    <div class="button-group">
      <?php
      echo '<a class="warning button" href="page.php?ntb='. $_GET['ntb'] .'&tb=3&a='. $nome_jgo .'">Editar</a>';
      ?>
      <a data-open="exampleModal1" class="alert button">Deletar</a>
    </div>
    <div class="reveal" id="exampleModal1" data-reveal>
      <h1>Tem certeza que deseja deletar esta entrada??</h1>
      <p class="lead">!!Esta ação não pode ser desfeita!!</p>
      <div class="row align-justify">
        <div class="column small-4"><a data-close aria-label="Cancelar" class="success button">Cancelar</a></div>
        <?php
        echo '<div class="column small-4"><a class="warning button" href="page.php?ntb='. $_GET['ntb'] .'&tb=4&a='. $nome_jgo .'">Deletar</a></div>';
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
    echo '<span class="TitlText">Nome do jogo:</span><span class="TextLeft">  '. $row['nome_jgo'] .'</span>';
    echo '<br>';
    echo '<span class="TitlText">Número máximo de jogadores:</span><span class="TextLeft"> '. $row['jogadores_max'] .'</span>';
    echo '<br>';
    echo '<span class="TitlText">Número minimo de jogadores:</span><span class="TextLeft"> '. $row['jogadores_min'] .'</span>';
    echo '<br>';
    echo '<span class="TitlText">Número de equipes:</span><span class="TextLeft"> '. $row['equipes'] .'</span>';
    ?>
  </div>
</div>
<?php
BancodeDados::desconecta();
?>
