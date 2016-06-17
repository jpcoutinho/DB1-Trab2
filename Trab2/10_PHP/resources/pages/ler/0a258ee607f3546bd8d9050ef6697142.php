<?php
require_once('resources/config.php');
$pdo = BancodeDados::conecta();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$tin_fra = $_GET['a'];
$contato = $_GET['b'];
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
  <div class="medium-12 columns">
    <table class="stack">
      <thead>
        <tr>
        <th></th>
        <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php
          echo '<td>'. $tin_fra .'</td>';
          echo '<td>'. $contato .'</td>'; 
          ?>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<?php
BancodeDados::desconecta();
?>
