<?php
require_once('resources/config.php');
?>
<div class="row">
  <span class="TitTabel">Tabela Frequentou</span>
</div>
<div class="row">
  <div class="medium-12 columns callout MarginTop">
    <nav aria-label="Você está aqui:" role="navigation">
      <ul class="breadcrumbs">
        <li><a href="index.php">Home</a></li>
        <li>
          <span class="show-for-sr">Atual: </span> Visualização de tabela
        </li>
      </ul>
    </nav>
  </div>
</div>
<div class="row">
  <div class="medium-12 columns">
    <?php
    echo '<a class="expanded success button" href="page.php?ntb='.$_GET['ntb'].'&tb=1">Inserir</a>';
    ?>
  </div>
</div>
<div class="row">
  <div class="medium-12 columns">
    <table class="hover">
      <thead>
        <tr>
          <th>Doc do cliente</th>
          <th>TIN</th>
          <th>Data</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $pdo = BancodeDados::conecta();
        $sql = 'SELECT * FROM '. $BDSchema .'TB_Frequentou ORDER BY doc_cli ASC';
        foreach ($pdo->query($sql) as $row) {
          echo '<tr>';
          echo '<td>'. $row['doc_cli'] . '</td>';
          echo '<td>'. $row['tin_fra'] . '</td>';
          echo '<td>'. $row['data'] . '</td>';
          echo '<td><a class="button" href="page.php?ntb='. $_GET['ntb'] .'&tb=2&a='. $row['doc_cli'] .'&b='. $row['tin_fra'] .'&c='. $row['data'] .'">Ler</a><a class="warning button" href="page.php?ntb='. $_GET['ntb'] .'&tb=3&a='. $row['doc_cli'] .'&b='. $row['tin_fra'] .'&c='. $row['data'] .'">Editar</a><a class="alert button" href="page.php?ntb='. $_GET['ntb'] .'&tb=4&a='. $row['doc_cli'] .'&b='. $row['tin_fra'] .'&c='. $row['data'] .'">Deletar</a>';
          echo '</tr>';
        }
        BancodeDados::desconecta();
        ?>
      </tbody>
    </table>
  </div>
</div>
