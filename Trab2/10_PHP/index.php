<?php
session_start(); /* Starts the session */
if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}
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
            <div class="row">
              <h2>Selecione uma tabela</h2>
            </div>
            <div class="row" data-equalizer data-equalize-on="medium">
              <div class="medium-4 columns">
                <div class="callout warning" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Caixa',FALSE) .'">Caixa</a>';
                  ?>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout warning" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Cliente',FALSE) .'">Cliente</a>';
                  ?>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout warning" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Competiu',FALSE) .'">Competiu</a>';
                  ?>
                </div>
              </div>
            </div>
            <div class="row" data-equalizer data-equalize-on="medium">
              <div class="medium-4 columns">
                <div class="callout warning" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Comprou',FALSE) .'">Comprou</a>';
                  ?>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout success" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_ContatoFranquia',FALSE) .'">Contato Franquia</a>';
                  ?>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout success" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_ContatoPessoa',FALSE) .'">Contato Pessoa</a>';
                  ?>
                </div>
              </div>
            </div>
            <div class="row" data-equalizer data-equalize-on="medium">
              <div class="medium-4 columns">
                <div class="callout warning" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Franquia',FALSE) .'">Franquia</a>';
                  ?>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout success" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Frequentou',FALSE) .'">Frequentou</a>';
                  ?>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout warning" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Funcionario',FALSE) .'">Funcionário</a>';
                  ?>
                </div>
              </div>
            </div>
            <div class="row" data-equalizer data-equalize-on="medium">
              <div class="medium-4 columns">
                <div class="callout warning" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Ganhou',FALSE) .'">Ganhou</a>';
                  ?>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout success" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Jogada',FALSE) .'">Jogada</a>';
                  ?>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout warning" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Jogo',FALSE) .'">Jogo</a>';
                  ?>
                </div>
              </div>
            </div>
            <div class="row" data-equalizer data-equalize-on="medium">
              <div class="medium-4 columns">
                <div class="callout success" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_JogoEmGrupo',FALSE) .'">Jogo em Grupo</a>';
                  ?>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout warning" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_JogoIndividual',FALSE) .'">Jogo Individual</a>';
                  ?>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout warning" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Maquina',FALSE) .'">Máquina</a>';
                  ?>
                </div>
              </div>
            </div>
            <div class="row" data-equalizer data-equalize-on="medium">
              <div class="medium-4 columns">
                <div class="callout warning" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Mesa',FALSE) .'">Mesa</a>';
                  ?>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout warning" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Oferece',FALSE) .'">Oferece</a>';
                  ?>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout warning" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Partida',FALSE) .'">Partida</a>';
                  ?>
                </div>
              </div>
            </div>
            <div class="row" data-equalizer data-equalize-on="medium">
              <div class="medium-4 columns">
                <div class="callout success" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Pessoa',FALSE) .'">Pessoa</a>';
                  ?>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout warning" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Vendeu',FALSE) .'">Vendeu</a>';
                  ?>
                </div>
              </div>
              <div class="medium-4 columns"></div>
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
