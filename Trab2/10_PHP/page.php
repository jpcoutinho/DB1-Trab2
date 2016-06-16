<?php
session_start(); /* Starts the session */
if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}
  require_once('resources/library/tbcodes.php');
  $strfile = $_GET['ntb'];
  $optipo = $_GET['tb'];
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
                  <nav aria-label="Você está aqui:" role="navigation">
                    <ul class="breadcrumbs">
                      <li><a href="index.php">Home</a></li>
                      <li class="disabled">Visualização de tabela</li>
                      <li>
                        <?php
                        if($optipo==1){
                          echo '<span class="show-for-sr">Atual: </span> Inserir entrada';
                        }
                        elseif ($optipo==2) {
                          echo '<span class="show-for-sr">Atual: </span> Visualizar entrada';
                        }
                        elseif ($optipo==3) {
                          echo '<span class="show-for-sr">Atual: </span> Atualizar entrada';
                        }
                        elseif ($optipo==4) {
                          echo '<span class="show-for-sr">Atual: </span> Deletar entrada';
                        }
                        else{
                          echo '<span class="show-for-sr">Atual: </span> OPERAÇÃO NÃO PERMITIDA!!';
                        }
                        ?>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
              <div class="row">
                <div class="medium-12 columns">
                  <?php
                  if($optipo==1){
                    require_once('resources/pages/inserir/'. $strfile .'.php');
                  }
                  elseif ($optipo==2) {
                    require_once('resources/pages/ler/'. $strfile .'.php');
                  }
                  elseif ($optipo==3) {
                    require_once('resources/pages/atualizar/'. $strfile .'.php');
                  }
                  elseif ($optipo==4) {
                    require_once('resources/pages/deletar/'. $strfile .'.php');
                  }
                  else{
                    echo "<h1>OPERAÇÃO NÃO PERMITIDA!!</h1>";
                  }
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
