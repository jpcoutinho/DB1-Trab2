<?php
  require_once("resources/config.php");
  require_once("resources/library/tbcodes.php");
  $pdo = BancodeDados::conecta();
  $tabela = $BDSchema .''. ConvertCodes($_GET['ntb']);
  $ordem = $_GET['tbo'];
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
                      <li>
                        <span class="show-for-sr">Current: </span> Visualização de tabela
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
              <div class="row">
                <div class="medium-12 columns">
                  <?php
                  echo '<a class="expanded success button" href="inserir.php?ntb='.$_GET['ntb'].'">Inserir</a>';
                  ?>
                </div>
              </div>
              <div class="row">
                <div class="medium-12 columns">
                  <table class="hover">
                    <thead>
                      <?php
                      $sql = 'SELECT * FROM '. $tabela .' ORDER BY '. $ordem .' ASC';
                      $result = $pdo->query($sql);
                      $rowcol = $result->fetch(PDO::FETCH_ASSOC);
                      echo '<tr>'. "\n";
                      foreach ($rowcol as $field => $value) {
                        echo '  <th>'. $field .'</th>'. "\n";
                      }
                      echo '  <th></th>';
                      echo '</tr>';
                      ?>
                    </thead>
                    <tbody>
                      <?php
                      $sqlPK = "SELECT a.attname AS data_type
                        FROM   pg_index i
                        JOIN   pg_attribute a ON a.attrelid = i.indrelid
                        AND a.attnum = ANY(i.indkey)
                        WHERE  i.indrelid = '". $tabela ."'::regclass AND i.indisprimary;";
                      $res = $pdo->query($sqlPK);
                      $PKs = $res->fetch(PDO::FETCH_ASSOC);
                      $vPKs = array_values($PKs);
                      foreach ($pdo->query($sql) as $row) {
                        echo '<tr>'. "\n";
                        foreach ($rowcol as $field => $value) {
                          echo '<td>'. $row[$field] .'</td>'. "\n";
                        }
                        echo ' <td><a class="button" href="ler.php?id='.$row[$vPKs[0]].'">Ler</a></td>';
                        echo '</tr>';
                      }
                      ?>
                    </tbody>
                  </table>
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
<?php
  $pdo = BancodeDados::desconecta();
?>
