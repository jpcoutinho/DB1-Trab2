<?php
  session_start(); /* Starts the session */
  if(!isset($_SESSION['UserData']['Username'])){
    header("location:login.php");
    exit;
  }
  require_once("resources/config.php");
  require_once("resources/library/tbcodes.php");
  $pdo = BancodeDados::conecta();
  $tabela = $BDSchema .''. ConvertCodes($_GET['ntb']);
?>
<!doctype html>
<html class="no-js" lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BD1 Item 10</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
  <body>
    <?php
    require_once("resources/template/menu.php");
    ?>
        <!-- Coloque conteudo a partir daqui -->
        <div class="off-canvas-content" data-off-canvas-content>
          <div class="row MaxWidth" data-equalizer data-equalize-on="medium">
              <?php
              require_once('resources/pages/tb/'. $_GET['ntb'] .'.php');
              ?>
          </div>
        </div>
        <!-- Fim do conteudo -->
      </div>
    </div>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
<?php
  $pdo = BancodeDados::desconecta();
?>
