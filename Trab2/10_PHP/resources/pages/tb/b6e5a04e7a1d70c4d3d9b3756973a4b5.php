<?php
require_once('resources/config.php');
?>
<div class="row">
  <span class="TitTabel">Tabela Jogo Individual</span>
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
          <th>Nome do jogo</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $pdo = BancodeDados::conecta();
        $sql = 'SELECT * FROM '. $BDSchema .'TB_JogoIndividual ORDER BY nome_jgo ASC';
        foreach ($pdo->query($sql) as $row) {
          echo '<tr>';
          echo '<td>'. $row['nome_jgo'] . '</td>';
          echo '<td><a class="button" href="page.php?ntb='. $_GET['ntb'] .'&tb=2&a='. $row['nome_jgo'] .'">Ler</a><a class="warning button" href="page.php?ntb='. $_GET['ntb'] .'&tb=3&a='. $row['nome_jgo'] .'">Editar</a><a class="alert button" href="page.php?ntb='. $_GET['ntb'] .'&tb=4&a='. $row['nome_jgo'] .'">Deletar</a>';
          echo '</tr>';
        }
        BancodeDados::desconecta();
        ?>
      </tbody>
    </table>
  </div>
</div>
