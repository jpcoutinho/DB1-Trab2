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
    <div class="off-canvas-wrapper">
      <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
        <!-- Barra de titulo off-canvas para telas 'pequenas' -->
        <div class="title-bar" data-responsive-toggle="widemenu" data-hide-for="medium">
          <div class="title-bar-left">
            <button class="menu-icon" type="button" data-open="offCanvasLeft"></button>
            <span class="title-bar-title">INF1383</span>
          </div>
          <div class="title-bar-right">
            <span class="title-bar-title">Login</span>
            <button class="menu-icon" type="button" data-open="offCanvasRight"></button>
          </div>
        </div>
        <!-- Menu off-canvas da esquerda -->
        <div class="off-canvas position-left" id="offCanvasLeft" data-off-canvas>
          <ul class="vertical dropdown menu" data-dropdown-menu>
            <li><a href="left_item_1">Left item 1</a></li>
            <li><a href="left_item_2">Left item 2</a></li>
            <li><a href="left_item_3">Left item 3</a></li>
          </ul>
        </div>
        <!-- Menu off-canvas da direita -->
        <div class="off-canvas position-right" id="offCanvasRight" data-off-canvas data-position="right">
          <ul class="vertical dropdown menu" data-dropdown-menu>
            <li><a href="right_item_1">Right item 1</a></li>
            <li><a href="right_item_2">Right item 2</a></li>
            <li><a href="right_item_3">Right item 3</a></li>
          </ul>
        </div>
        <!-- Barra de menu largo para medio e acima -->
        <div id="widemenu" class="top-bar">
          <div class="top-bar-left">
            <ul class="dropdown menu" data-dropdown-menu>
              <li class="menu-text">INF1383</li>
              <li class="has-submenu">
                <a href="#">Item 1</a>
                <ul class="menu submenu vertical" data-submenu>
                  <li><a href="left_wide_11">Left wide 1</a></li>
                  <li><a href="left_wide_12">Left wide 2</a></li>
                  <li><a href="left_wide_13">Left wide 3</a></li>
                </ul>
              </li>
              <li class="has-submenu">
                <a href="#">Item 2</a>
                <ul class="menu submenu vertical" data-submenu>
                  <li><a href="left_wide_21">Left wide 1</a></li>
                  <li><a href="left_wide_22">Left wide 2</a></li>
                  <li><a href="left_wide_23">Left wide 3</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <div class="top-bar-right">
            <ul class="menu">
              <li><input type="search" placeholder="Search"></li>
              <li><button class="button">Search</button></li>
            </ul>
          </div>
        </div>
        <!-- Coloque conteudo a partir daqui -->
        <div class="off-canvas-content" data-off-canvas-content>
          <div class="row column">
            <div class="row" data-equalizer data-equalize-on="medium">
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <a href="tabela.php?ntb=TB_Caixa&tbo=numero">Caixa</a>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <a href="tabela.php?ntb=TB_Cliente&tbo=doc_PES">Cliente</a>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <a href="tabela.php?ntb=TB_Competiu&tbo=doc_CLI">Pessoa</a>
                </div>
              </div>
            </div>
            <div class="row" data-equalizer data-equalize-on="medium">
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <a href="tabela.php?ntb=TB_Comprou&tbo=doc_CLI">Comprou</a>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <a href="tabela.php?ntb=TB_ContatoFranquia&tbo=tin_FRA">Contato Franquia</a>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <a href="tabela.php?ntb=TB_ContatoPessoa&tbo=doc_PES">Contato Pessoa</a>
                </div>
              </div>
            </div>
            <div class="row" data-equalizer data-equalize-on="medium">
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <a href="tabela.php?ntb=TB_Franquia&tbo=tin">Franquia</a>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <a href="tabela.php?ntb=TB_Frequentou&tbo=doc_CLI">Frequentou</a>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <a href="tabela.php?ntb=TB_Funcionario&tbo=doc_PES">Funcionário</a>
                </div>
              </div>
            </div>
            <div class="row" data-equalizer data-equalize-on="medium">
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <a href="tabela.php?ntb=TB_Ganhou&tbo=doc_CLI">Ganhou</a>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <a href="tabela.php?ntb=TB_Jogada&tbo=doc_CLI">Jogada</a>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <a href="tabela.php?ntb=TB_Jogo&tbo=nome">Jogo</a>
                </div>
              </div>
            </div>
            <div class="row" data-equalizer data-equalize-on="medium">
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <a href="tabela.php?ntb=TB_JogoEmGrupo&tbo=nome_JGO">Jogo em Grupo</a>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <a href="tabela.php?ntb=TB_JogoIndividual&tbo=nome_JGO">Jogo Individual</a>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <a href="tabela.php?ntb=TB_Maquina&tbo=snumber">Máquina</a>
                </div>
              </div>
            </div>
            <div class="row" data-equalizer data-equalize-on="medium">
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <a href="tabela.php?ntb=TB_Mesa&tbo=numero">Mesa</a>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <a href="tabela.php?ntb=TB_Oferece&tbo=nome_JGI">Oferece</a>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <a href="tabela.php?ntb=TB_Partida&tbo=ID">Partida</a>
                </div>
              </div>
            </div>
            <div class="row" data-equalizer data-equalize-on="medium">
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <a href="tabela.php?ntb=TB_Pessoa&tbo=nome">Pessoa</a>
                </div>
              </div>
              <div class="medium-4 columns">
                <div class="callout" data-equalizer-watch>
                  <a href="tabela.php?ntb=TB_Vendeu&tbo=doc_CLI">Vendeu</a>
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
