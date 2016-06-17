<?php
require_once('resources/config.php');
?>
<div class="row">
  <span class="TitTabel">Tabela partida</span>
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
          <th>ID</th>
          <th>Funcionário responsavel</th>
          <th>Número da mesa</th>
          <th>Data e hora</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $pdo = BancodeDados::conecta();
        $sql = 'SELECT * FROM '. $BDSchema .'TB_Partida ORDER BY id ASC';
        foreach ($pdo->query($sql) as $row) {
          echo '<tr>';
          echo '<td>'. $row['id'] . '</td>';
          echo '<td>'. $row['doc_fuc'] . '</td>';
          echo '<td>'. $row['numero_mes'] . '</td>';
          echo '<td>'. $row['data'] . '</td>';
          echo '<td><a class="button" href="page.php?ntb='. $_GET['ntb'] .'&tb=2&a='. $row['id'] . '">Ler</a><a class="warning button" href="page.php?ntb='. $_GET['ntb'] .'&tb=3&a='. $row['id'] . '">Editar</a><a class="alert button" href="page.php?ntb='. $_GET['ntb'] .'&tb=4&a='. $row['id'] . '">Deletar</a>';
          echo '</tr>';
        }
        BancodeDados::desconecta();
        ?>
      </tbody>
    </table>
  </div>
</div>
