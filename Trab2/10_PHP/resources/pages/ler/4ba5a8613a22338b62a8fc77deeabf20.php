<?php
require_once('resources/config.php');
$pdo = BancodeDados::conecta();
$doc_cli = $_GET['a'];
$snumber_maq = $_GET['b'];
$data = $_GET['c'];
$stmt = $pdo->query("SELECT * FROM ". $BDSchema ."TB_Cliente CLI WHERE CLI.doc_pes='". $doc_cli ."'");
?>
<div class="row">
  <span class="TitTabel">Visualização de uma jogada</span>
</div>
<div class="row">
  <div class="medium-12 columns MarginTop">
    <nav aria-label="Você está aqui:" role="navigation">
      <ul class="breadcrumbs">
        <li><a href="index.php">Home</a></li>
        <?php echo '<li><a href="tabela.php?ntb='. $_GET['ntb'] .'">Tabela Jogada</a></li>' ?>
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
      echo '<a class="warning button" href="page.php?ntb='. $_GET['ntb'] .'&tb=3&a='. $doc_cli .'&b='. $snumber_maq .'&c='. $data .'">Editar</a>';
      ?>
      <a data-open="exampleModal1" class="alert button">Deletar</a>
    </div>
    <div class="reveal" id="exampleModal1" data-reveal>
      <h1>Tem certeza que deseja deletar esta entrada??</h1>
      <p class="lead">!!Esta ação não pode ser desfeita!!</p>
      <div class="row align-justify">
        <div class="column small-4"><a data-close aria-label="Cancelar" class="success button">Cancelar</a></div>
        <?php
        echo '<div class="column small-4"><a class="warning button" href="page.php?ntb='. $_GET['ntb'] .'&tb=4&&a='. $doc_cli .'&b='. $tin_fra .'&c='. $data .'">Deletar</a></div>';
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
    if (empty($row['pseudominio']))
      echo '<span class="TitlText">Pseudonimo:</span><span class="TextLeft">**NÃO POSSUI**</span>';
    else
      echo '<span class="TitlText">Pseudonimo:</span><span class="TextLeft"> '. $row['pseudominio'] .'</span>';
    echo '<br>';
    echo '<span class="TitlText">Documento:</span><span class="TextLeft">  #'. $row['doc_pes'] .'</span>';
    echo '<br>';
    $stmt = $pdo->query("SELECT * FROM ". $BDSchema ."TB_Jogada JOG WHERE JOG.doc_cli='". $doc_cli ."' AND JOG.snumber_maq ='". $snumber_maq ."' AND JOG.data = '". $data ."'");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $nome = $row['nome_jgo'];
    $apostou = $row['apostou'];
    $ganhou = $row['ganhou'];
    echo '<span class="TitlText">Jogou:</span><span class="TextLeft"> '. $nome .'</span>';
    echo '<br>';
    echo '<span class="TitlText">Na máquina:</span><span class="TextLeft"> '. $snumber_maq .'</span>';
    echo '<br>';
    $stmt = $pdo->query("SELECT * FROM ". $BDSchema ."TB_Franquia FRA, ". $BDSchema ."TB_Maquina MAQ WHERE MAQ.snumber='". $snumber_maq ."' AND MAQ.tin_fra = FRA.tin");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo '<span class="TitlText">Na franquia:</span><span class="TextLeft"> '. $row['nome'] .'</span>';
    echo '<br>';
    //Our dates and times.
    $then = $data;
    $now = time();
    //convert $then into a timestamp.
    $then = strtotime($then);
    //Get the difference in seconds.
    $difference = $now - $then;
    $days = floor($difference / (60*60*24) );
    echo '<span class="TitlText">Na data:</span><span class="TextLeft"> '. $data .'</span></span><span class="TextLeft"> - '. $days .' dias atrás</span>';
    echo '<br>';
    echo '<span class="TitlText">Apostou:</span><span class="TextLeft"> '. $Moeda .' '. $apostou .'</span>';
    echo '<br>';
    echo '<span class="TitlText">Ganhou:</span><span class="TextLeft"> '. $Moeda .' '. $ganhou .'</span>';
    ?>
  </div>
</div>
<?php
BancodeDados::desconecta();
?>
