<?php
  require_once('resources/library/tbcodes.php');
  $strfile = $_GET['ntb'];
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
          <div class="row column MaxWidth">
            <div class="row" data-equalizer data-equalize-on="medium">
              <div class="row">
                <div class="medium-12 columns callout MarginTop">
                  <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                      <li><a href="index.php">Home</a></li>
                      <li class="disabled">Visualização de tabela</li>
                      <li>
                        <span class="show-for-sr">Current: </span> Inserir entrada
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
              <div class="row">
                <div class="medium-12 columns">
                  <?php
                  require_once('resources/pages/'. $strfile .'.php');
                  ?>
                </div>
              </div>
            </div>
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
