<?php
require_once('resources/config.php');
?>
<div class="row">
  <span class="TitTabel">Tabela Pessoa</span>
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
          <th>DOC</th>
          <th>Nome</th>
          <th>Tipo do DOC</th>
          <th>Sexo</th>
          <th>Nascimento</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $pdo = BancodeDados::conecta();
        $sql = 'SELECT * FROM '. $BDSchema .'TB_Pessoa ORDER BY doc ASC';
        foreach ($pdo->query($sql) as $row) {
          echo '<tr>';
          echo '<td>'. $row['doc'] . '</td>';
          echo '<td>'. $row['nome'] . '</td>';
          echo '<td>'. $row['tipodoc'] . '</td>';
          echo '<td>'. $row['sexo'] . '</td>';
          echo '<td>'. $row['nascimento'] . '</td>';
          echo '<td><a class="button" href="page.php?id='. $_GET['ntb'] .'&tb=2">Ler</a><a class="warning button" href="page.php?id='. $_GET['ntb'] .'&tb=3">Editar</a><a class="alert button" href="page.php?id='. $_GET['ntb'] .'&tb=4">Deletar</a>';
          echo '</tr>';
        }
        BancodeDados::desconecta();
        ?>
      </tbody>
    </table>
  </div>
</div>
