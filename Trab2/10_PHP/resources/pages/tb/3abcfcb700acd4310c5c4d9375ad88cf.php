<?php
require_once('resources/config.php');
$pdo = BancodeDados::conecta();

if ( !empty($_POST)) {
        $doc = $_POST['vDOC'];
        $tin = $_POST['vTIN'];
        $data = $_POST['vDATA'];
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO '. $BDSchema .'TB_Frequentou (doc_CLI,tin_FRA,data) VALUES(?, ?, ?)';
        $q = $pdo->prepare($sql);
        $q->execute(array($doc,$tin,$data));
        header("Location: tabela.php?ntb=3abcfcb700acd4310c5c4d9375ad88cf&tbo=doc_CLI");
      }
?>
<h1>Tabela frquentou</h1>
<form action="page.php?ntb=3abcfcb700acd4310c5c4d9375ad88cf&tb=1" method="post" data-abide novalidate>
  <div data-abide-error class="alert callout" style="display: none;">
    <p><i class="fi-alert"></i> Seu formulário possue alguns erros.</p>
  </div>
  <div class="row">
    <div class="medium-6 columns">
      <label>*Selecione o cliente
        <select id="select" name="vDOC" required>
          <option value="">--SELECIONE O CLIENTE--</option>
          <?php
          $sql = 'SELECT * FROM '. $BDSchema .'TB_Cliente ORDER BY doc_pes ASC';
          foreach ($pdo->query($sql) as $row) {
            if(!empty($row['pseudominio']))
              echo '<option value="'. $row['doc_pes'] .'">'. $row['pseudominio'] .'</option>';
            else {
              echo '<option value="'. $row['doc_pes'] .'">'. $row['doc_pes'] .'</option>';
            }
          }
          ?>
        </select>
        <span class="form-error">
          Koé, você não pode deixar isso em branco!
        </span>
      </label>
    </div>
    <div class="medium-6 columns">
      <label>*Selecione a franquia
        <select id="select" name="vTIN" required>
          <option value="">--SELECIONE O TIN--</option>
          <?php
            $sql = 'SELECT * FROM '. $BDSchema .'TB_Franquia ORDER BY nome ASC';
            foreach ($pdo->query($sql) as $row) {
              echo '<option value="'. $row['tin'] . '">'. $row['nome'] . '</option>';
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
      <label>*Digite o dia e a hora
        <input type="text" name="vDATA" placeholder="1991-05-20 20:05:59" aria-describedby="Digite o dia e a hora" required pattern="text">
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
<?php
BancodeDados::desconecta();
?>
