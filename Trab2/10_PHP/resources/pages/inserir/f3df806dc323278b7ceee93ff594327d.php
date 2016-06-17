<?php
require_once('resources/config.php');
$pdo = BancodeDados::conecta();

if ( !empty($_POST)) {
        $doc = $_POST['vDOC'];
        $numero = $_POST['vNUMERO'];
        $data = $_POST['vDATA'];
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO '. $BDSchema .'TB_Partida (doc_FUC,numero_MES,data) VALUES(?, ?, ?)';
        $q = $pdo->prepare($sql);
        $q->execute(array($doc,$numero,$data));
        header("Location: tabela.php?ntb=f3df806dc323278b7ceee93ff594327d");
      }
?>
<h1>Tabela jogo individual</h1>
<div class="row">
  <div class="medium-12 columns MarginTop">
    <nav aria-label="Você está aqui:" role="navigation">
      <ul class="breadcrumbs">
        <li><a href="index.php">Home</a></li>
        <li><a href="tabela.php?ntb=f3df806dc323278b7ceee93ff594327d">Tabela Partida</a></li>
        <li>
          <span class="show-for-sr">Atual: </span> Inserir entrada
        </li>
      </ul>
    </nav>
  </div>
</div>
<div class="row">
  <div class="medium-12 columns MarginTop">
    <form action="page.php?ntb=f3df806dc323278b7ceee93ff594327d&tb=1" method="post" data-abide novalidate>
      <div data-abide-error class="alert callout" style="display: none;">
        <p><i class="fi-alert"></i> Seu formulário possue alguns erros.</p>
      </div>
      <div class="row">
        <div class="medium-6 columns">
          <label>*Selecione o documento do funcionário
            <select id="select" name="vDOC" required>
              <option value="">--SELECIONE O DOCUMENTO--</option>
              <?php
                $sql = 'SELECT * FROM '. $BDSchema .'TB_Funcionario ORDER BY doc_pes ASC';
                foreach ($pdo->query($sql) as $row) {
                  echo '<option value="'. $row['doc_pes'] . '">'. $row['doc_pes'] . '</option>';
                }
              ?>
            </select>
            <span class="form-error">
              Koé, você não pode deixar isso em branco!
            </span>
          </label>
        </div>
        <div class="medium-6 columns">
          <label>*Selecione a mesa que ocorreu a partida.
            <select id="select" name="vNUMERO" required>
              <option value="">--SELECIONE A MESA--</option>
              <?php
                $sql = 'SELECT * FROM '. $BDSchema .'TB_Mesa ORDER BY numero ASC';
                foreach ($pdo->query($sql) as $row) {
                  echo '<option value="'. $row['numero'] . '">'. $row['numero'] . '</option>';
                }
              ?>
            </select>
            <span class="form-error">
              Koé, você não pode deixar isso em branco!
            </span>
          </label>
        </div>
      </div>
      <div class="row">
        <div class="medium-6 columns">
          <label>Data e hora da partida.
            <input type="text" name="vDATA" placeholder="1991-10-05 19:59:02" aria-describedby="Digite a data e hora" required pattern="text">
            <span class="form-error">
              Koé, você não pode deixar isso em branco!
            </span>
          </label>
        </div>
      </div>
      <div class="row">
        <fieldset class="large-6 columns">
          <button class="alert button" type="reset" value="Reset">Apagar</button>
        </fieldset>
        <fieldset class="large-6 columns">
          <button class="success button" type="submit" value="Submit">Enviar</button>
        </fieldset>
      </div>
    </form>
  </div>
</div>
<?php
BancodeDados::desconecta();
?>
