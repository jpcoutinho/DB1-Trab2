<?php
require_once('resources/config.php');
$pdo = BancodeDados::conecta();
$doc = $_GET['a'];
$stmt = $pdo->query("SELECT * FROM ". $BDSchema ."TB_Pessoa PES WHERE PES.doc='". $doc ."'");
?>
<div class="row">
  <span class="TitTabel">Visualização de uma pessoa</span>
</div>
<div class="row">
  <div class="medium-12 columns MarginTop">
    <nav aria-label="Você está aqui:" role="navigation">
      <ul class="breadcrumbs">
        <li><a href="index.php">Home</a></li>
        <?php echo '<li><a href="tabela.php?ntb='. $_GET['ntb'] .'">Tabela Pessoa</a></li>' ?>
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
      echo '<a class="warning button" href="page.php?ntb='. $_GET['ntb'] .'&tb=3&a='. $doc .'">Editar</a>';
      ?>
      <a data-open="exampleModal1" class="alert button">Deletar</a>
    </div>
    <div class="reveal" id="exampleModal1" data-reveal>
      <h1>Tem certeza que deseja deletar esta entrada??</h1>
      <p class="lead">!!Esta ação não pode ser desfeita!!</p>
      <div class="row align-justify">
        <div class="column small-4"><a data-close aria-label="Cancelar" class="success button">Cancelar</a></div>
        <?php
        echo '<div class="column small-4"><a class="warning button" href="page.php?ntb='. $_GET['ntb'] .'&tb=4&a='. $doc .'">Deletar</a></div>';
        ?>
      </div>
      <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
</div>
<div class="row align-center">
  <div class="column small-6">
    <?php
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo '<span class="TitlText">Nome da pessoa:</span><span class="TextLeft">  '. $row['nome'] .'</span>';
    echo '<br>';
    echo '<span class="TitlText">DOC:</span><span class="TextLeft"> #'. $row['doc'] .'</span>';
    echo '<br>';
    if($row['tipodoc']==='PP')
      echo '<span class="TitlText">Tipo do documento:</span><span class="TextLeft"> Passaporte</span>';
    else
      echo '<span class="TitlText">Tipo do documento:</span><span class="TextLeft"> Identidade</span>';
      echo '<br>';
      echo '<span class="TitlText">Contato(s):</span>';
    $stmt = $pdo->query("SELECT * FROM ". $BDSchema ."TB_ContatoPessoa COP WHERE COP.doc_pes='". $doc ."'");
    foreach ($stmt as $row)
      echo '<span class="TextLeft"> '. $row['contato'] .',</span>';
    $stmt = $pdo->query("SELECT * FROM ". $BDSchema ."TB_Cliente CLI WHERE CLI.doc_pes='". $doc ."'");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo '<br>';
    echo '<br>';
    if(!empty($row['doc_pes'])){
      echo '<span class="TitlText">Status:</span><span class="TextLeft"> É CLIENTE</span>';
      echo '<br>';
      if (empty($row['pseudominio']))
        echo '<span class="TitlText">Pseudonimo:</span><span class="TextLeft">**NÃO POSSUI**</span>';
      else
        echo '<span class="TitlText">Pseudonimo:</span><span class="TextLeft"> '. $row['pseudominio'] .'</span>';
      $stmt = $pdo->query("SELECT * FROM ". $BDSchema ."TB_Frequentou FRQ WHERE FRQ.doc_cli='". $doc ."' ORDER BY data DESC");
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $data = $row['data'];
      $tin_fra = $row['tin_fra'];
      $stmt = $pdo->query("SELECT * FROM ". $BDSchema ."TB_Franquia FRA WHERE FRA.tin='". $tin_fra ."'");
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      echo '<br>';
      echo '<span class="TitlText">Ultima franquia frequentada:</span><span class="TextLeft"> '. $row['nome'] .' <a data-open="ModalFrequencia">(Histórico)</a></span>';
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
      echo '<br>';
      $stmt = $pdo->query("SELECT sum(valor) FROM ". $BDSchema ."TB_Comprou CMP WHERE CMP.doc_cli='". $doc ."'");
      $totalCompra = $stmt->fetchColumn();
      if(empty($totalCompra)){
        $totalCompra = 0.00;
        echo '<span class="TitlText">Comprou:</span><span class="TextLeft"> '. $Moeda .' '. $totalCompra .' </span>';
      }
      else
        echo '<span class="TitlText">Comprou:</span><span class="TextLeft"> '. $Moeda .' '. $totalCompra .' <a data-open="ModalCompra">(Histórico)</a></span>';
      echo '<br>';
      $stmt = $pdo->query("SELECT sum(valor) FROM ". $BDSchema ."TB_Vendeu VEN WHERE VEN.doc_cli='". $doc ."'");
      $totalVenda = $stmt->fetchColumn();
      if(empty($totalVenda)){
        $totalVenda = 0.00;
        echo '<span class="TitlText">Trocou:</span><span class="TextLeft"> '. $Moeda .' '. $totalVenda .'</span>';
      }
      else
        echo '<span class="TitlText">Trocou:</span><span class="TextLeft"> '. $Moeda .' '. $totalVenda .' <a data-open="ModalVenda">(Histórico)</a></span>';
      echo '<br>';
      echo '<br>';
      $stmt = $pdo->query("SELECT count(id_par) FROM ". $BDSchema ."TB_Competiu CPU WHERE CPU.doc_cli='". $doc ."'");
      $totalPartidas = $stmt->fetchColumn();
      if(empty($totalPartidas)){
        $totalPartidas = 0;
        echo '<span class="TitlText">Participou de:</span><span class="TextLeft"> '. $totalPartidas . ' Partida</span>';
      }
      else
        echo '<span class="TitlText">Participou de:</span><span class="TextLeft"> '. $totalPartidas .' Partidas <a data-open="ModalPartida">(Histórico)</a></span>';
      echo '<br>';
      $stmt = $pdo->query("SELECT count(id_par) FROM ". $BDSchema ."TB_Ganhou GAN WHERE GAN.doc_cli='". $doc ."'");
      $totalGanhou = $stmt->fetchColumn();
      if(empty($totalGanhou)){
        $totalGanhou = 0;
        echo '<span class="TitlText">Ganhou em:</span><span class="TextLeft"> '. $totalGanhou . ' Partida</span>';
      }
      else
        echo '<span class="TitlText">Ganhou em:</span><span class="TextLeft"> '. $totalGanhou .' Partidas <a data-open="ModalGanhou">(Histórico)</a></span>';
    }
    else
      echo '<span class="TitlText">Status:</span><span class="TextLeft"> NÃO É CLIENTE</span>';
    ?>
  </div>
</div>
<div class="reveal" id="ModalFrequencia" data-reveal>
  <?php
  $stmt = $pdo->query("SELECT * FROM ". $BDSchema ."TB_Frequentou FRQ, ". $BDSchema ."TB_Franquia FRA WHERE FRQ.tin_fra=FRA.tin AND FRQ.doc_cli = '". $doc ."' ORDER BY data DESC");
  ?>
  <h4>Histórico de frequencia</h4>
  <div class="row">
    <div class="medium-12 columns">
      <table class="stack">
        <thead>
          <tr>
            <th>Franquia</th>
            <th>Data e hora</th>
          </tr>
      </thead>
      <tbody>
        <?php
        foreach ($stmt as $row){
          echo '<tr>';
          echo '<td>'. $row['nome'] .'</td>';
          echo '<td>'. $row['data'] .'</td>';
          echo '</tr>';
        }
        ?>
      </tbody>
      </table>
    </div>
  </div>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="reveal" id="ModalCompra" data-reveal>
  <?php
  $stmt = $pdo->query("SELECT * FROM ". $BDSchema ."TB_Comprou CMP, ". $BDSchema ."TB_Caixa CAX, ". $BDSchema ."TB_Franquia FRA WHERE CMP.doc_cli='". $doc ."' AND CMP.numero_cax = CAX.numero AND CAX.tin_fra = FRA.tin ORDER BY data DESC");
  ?>
  <h4>Histórico de compra</h4>
  <div class="row">
    <div class="medium-12 columns">
      <table class="stack">
        <thead>
          <tr>
            <th># Caixa</th>
            <th>Franquia</th>
            <th>Valor</th>
            <th>Data</th>
          </tr>
      </thead>
      <tbody>
        <?php
        foreach ($stmt as $row){
          echo '<tr>';
          echo '<td>'. $row['numero_cax'] .'</td>';
          echo '<td>'. $row['nome'] .'</td>';
          echo '<td>'. $row['valor'] .'</td>';
          echo '<td>'. $row['data'] .'</td>';
          echo '</tr>';
        }
        ?>
      </tbody>
      </table>
    </div>
  </div>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="reveal" id="ModalVenda" data-reveal>
  <?php
  $stmt = $pdo->query("SELECT * FROM ". $BDSchema ."TB_Vendeu VEN, ". $BDSchema ."TB_Caixa CAX, ". $BDSchema ."TB_Franquia FRA WHERE VEN.doc_cli='". $doc ."' AND VEN.numero_cax = CAX.numero AND CAX.tin_fra = FRA.tin ORDER BY data DESC");
  ?>
  <h4>Histórico de venda</h4>
  <div class="row">
    <div class="medium-12 columns">
      <table class="stack">
        <thead>
          <tr>
            <th># Caixa</th>
            <th>Franquia</th>
            <th>Valor</th>
            <th>Data</th>
          </tr>
      </thead>
      <tbody>
        <?php
        foreach ($stmt as $row){
          echo '<tr>';
          echo '<td>'. $row['numero_cax'] .'</td>';
          echo '<td>'. $row['nome'] .'</td>';
          echo '<td>'. $row['valor'] .'</td>';
          echo '<td>'. $row['data'] .'</td>';
          echo '</tr>';
        }
        ?>
      </tbody>
      </table>
    </div>
  </div>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="reveal" id="ModalPartida" data-reveal>
  <?php
  $stmt = $pdo->query("SELECT * FROM ". $BDSchema ."TB_Competiu CPU, ". $BDSchema ."TB_Partida PAR, ". $BDSchema ."TB_Franquia FRA, ". $BDSchema ."TB_Mesa MES WHERE CPU.doc_cli='". $doc ."' AND CPU.id_par = PAR.id AND PAR.numero_mes = MES.numero AND MES.tin_fra = FRA.tin ORDER BY data DESC");
  ?>
  <h4>Histórico de partida</h4>
  <div class="row">
    <div class="medium-12 columns">
      <table class="stack">
        <thead>
          <tr>
            <th>ID</th>
            <th>Franquia</th>
            <th>Mesa</th>
            <th>Nome do jogo</th>
            <th>Apostou</th>
            <th>Ganhou</th>
            <th>Data</th>
          </tr>
      </thead>
      <tbody>
        <?php
        foreach ($stmt as $row){
          echo '<tr>';
          echo '<td>'. $row['id_par'] .'</td>';
          echo '<td>'. $row['nome'] .'</td>';
          echo '<td>#'. $row['numero_mes'] .'</td>';
          echo '<td>'. $row['nome_jgg'] .'</td>';
          echo '<td>'. $row['apostou'] .'</td>';
          echo '<td>'. $row['ganhou'] .'</td>';
          echo '<td>'. $row['data'] .'</td>';
          echo '</tr>';
        }
        ?>
      </tbody>
      </table>
    </div>
  </div>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="reveal" id="ModalGanhou" data-reveal>
  <?php
  $stmt = $pdo->query("SELECT * FROM ". $BDSchema ."TB_Ganhou GAN, ". $BDSchema ."TB_Partida PAR, ". $BDSchema ."TB_Franquia FRA, ". $BDSchema ."TB_Mesa MES WHERE GAN.doc_cli='". $doc ."' AND GAN.id_par = PAR.id AND PAR.numero_mes = MES.numero AND MES.tin_fra = FRA.tin ORDER BY data DESC");
  ?>
  <h4>Histórico de partidas ganhas</h4>
  <div class="row">
    <div class="medium-12 columns">
      <table class="stack">
        <thead>
          <tr>
            <th>ID</th>
            <th>Franquia</th>
            <th>Mesa</th>
            <th>Nome do jogo</th>
            <th>Data</th>
          </tr>
      </thead>
      <tbody>
        <?php
        foreach ($stmt as $row){
          echo '<tr>';
          echo '<td>'. $row['id_par'] .'</td>';
          echo '<td>'. $row['nome'] .'</td>';
          echo '<td>#'. $row['numero_mes'] .'</td>';
          echo '<td>'. $row['nome_jgg'] .'</td>';
          echo '<td>'. $row['data'] .'</td>';
          echo '</tr>';
        }
        ?>
      </tbody>
      </table>
    </div>
  </div>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php
BancodeDados::desconecta();
?>
