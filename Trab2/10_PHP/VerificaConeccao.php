<?php
  include('includes/config.php');
  $pdo = BancodeDados::conecta();
  $status = $pdo->getAttribute(PDO::ATTR_CONNECTION_STATUS);
  $pdo = BancodeDados::desconecta();
?>
<!doctype html>
<html class="no-js" lang="pt">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Teste de Coneção</title>
  </head>
  <body>
    <?php
      echo '<h1>'. $status .'</h1>';
    ?>
  </body>
</html>
