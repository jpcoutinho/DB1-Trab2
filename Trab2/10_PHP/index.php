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
              <div class="medium-12 columns callout MarginTop">
                <nav aria-label="You are here:" role="navigation">
                  <ul class="breadcrumbs">
                    <li class="disabled">Home</li>
                  </ul>
                </nav>
              </div>
            </div>
            <div class="row">
              <h2>Selecione uma tabela</h2>
            </div>
            <div class="row" data-equalizer data-equalize-on="medium">
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Caixa',FALSE) .'&tbo=numero">Caixa</a>';
                  ?>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Cliente',FALSE) .'&tbo=doc_PES">Cliente</a>';
                  ?>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Competiu',FALSE) .'&tbo=doc_CLI">Competiu</a>';
                  ?>
                </div>
              </div>
            </div>
            <div class="row" data-equalizer data-equalize-on="medium">
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Comprou',FALSE) .'&tbo=doc_CLI">Comprou</a>';
                  ?>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_ContatoFranquia',FALSE) .'&tbo=tin_FRA">Contato Franquia</a>';
                  ?>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_ContatoPessoa',FALSE) .'&tbo=doc_PES">Contato Pessoa</a>';
                  ?>
                </div>
              </div>
            </div>
            <div class="row" data-equalizer data-equalize-on="medium">
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Franquia',FALSE) .'&tbo=tin">Franquia</a>';
                  ?>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Frequentou',FALSE) .'&tbo=doc_CLI">Frequentou</a>';
                  ?>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Funcionario',FALSE) .'&tbo=doc_PES">Funcionário</a>';
                  ?>
                </div>
              </div>
            </div>
            <div class="row" data-equalizer data-equalize-on="medium">
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Ganhou',FALSE) .'&tbo=doc_CLI">Ganhou</a>';
                  ?>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Jogada',FALSE) .'&tbo=doc_CLI">Jogada</a>';
                  ?>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Jogo',FALSE) .'&tbo=nome">Jogo</a>';
                  ?>
                </div>
              </div>
            </div>
            <div class="row" data-equalizer data-equalize-on="medium">
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_JogoEmGrupo',FALSE) .'&tbo=nome_JGO">Jogo em Grupo</a>';
                  ?>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_JogoIndividual',FALSE) .'&tbo=nome_JGO">Jogo Individual</a>';
                  ?>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Maquina',FALSE) .'&tbo=snumber">Máquina</a>';
                  ?>
                </div>
              </div>
            </div>
            <div class="row" data-equalizer data-equalize-on="medium">
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Mesa',FALSE) .'&tbo=numero">Mesa</a>';
                  ?>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Oferece',FALSE) .'&tbo=nome_JGI">Oferece</a>';
                  ?>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Partida',FALSE) .'&tbo=ID">Partida</a>';
                  ?>
                </div>
              </div>
            </div>
            <div class="row" data-equalizer data-equalize-on="medium">
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Pessoa',FALSE) .'&tbo=nome">Pessoa</a>';
                  ?>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <?php
                  echo '<a href="tabela.php?ntb=' .md5('TB_Vendeu',FALSE) .'&tbo=doc_CLI">Vendeu</a>';
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
