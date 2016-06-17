<?php
require_once('resources/config.php');
?>
<div class="row">
  <span class="TitTabel">Tabela comprou</span>
</div>
<div class="row">
  <div class="medium-12 columns MarginTop">
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
          <th>Número do caixa</th>
          <th>DOC do cliente</th>
          <th>Valor</th>
          <th>Data da transação</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $pdo = BancodeDados::conecta();
        $sql = 'SELECT * FROM '. $BDSchema .'TB_Comprou ORDER BY numero_cax ASC';
        foreach ($pdo->query($sql) as $row) {
          echo '<tr>';
          echo '<td>'. $row['numero_cax'] .'</td>';
          echo '<td>'. $row['doc_cli'] . '</td>';
          echo '<td>'. $Moeda .''. $row['valor'] . '</td>';
          echo '<td>'. $row['data'] . '</td>';
          echo '<td><a class="button" href="page.php?ntb='. $_GET['ntb'] .'&tb=2&a='. $row['numero_cax'] .'&b='. $row['doc_cli'] .'&c='. $row['data'] .'">Ler</a><a class="warning button" href="page.php?ntb='. $_GET['ntb'] .'&tb=3&a='. $row['numero_cax'] .'&b='. $row['doc_cli'] .'&c='. $row['data'] .'">Editar</a><a class="alert button" href="page.php?ntb='. $_GET['ntb'] .'&tb=4&a='. $row['numero_cax'] .'&b='. $row['doc_cli'] .'&c='. $row['data'] .'">Deletar</a>';
          echo '</tr>';
        }
        BancodeDados::desconecta();
        ?>
      </tbody>
    </table>
  </div>
</div>
