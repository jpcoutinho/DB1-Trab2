<div class="off-canvas-wrapper">
  <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
    <!-- Barra de titulo off-canvas para telas 'pequenas' -->
    <div class="title-bar" data-responsive-toggle="widemenu" data-hide-for="medium">
      <div class="title-bar-left">
        <button class="menu-icon" type="button" data-open="offCanvasLeft"></button>
        <span class="title-bar-title">INF1383</span>
      </div>
      <div class="title-bar-right">
        <span class="title-bar-title"><a href="logout.php">Logout</a></span>
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
          <li><a class="button" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <!-- MENU NÃO FECHA AQUI, SOMENTE DPS DO CONTEUDO NA PAG PRINCIPAL! -->
