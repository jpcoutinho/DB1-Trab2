<?php
require_once('resources/config.php');
$pdo = BancodeDados::conecta();

if ( !empty($_POST)) {
        $id = $_POST['vID'];
        $doc = $_POST['vDOC'];
        $apostou = $_POST['vAPOSTOU'];
        $ganhou = $_POST['vGANHOU'];
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO '. $BDSchema .'TB_Competiu (id_PAR,doc_CLI,apostou,ganhou) VALUES(?, ?, ?, ?)';
        $q = $pdo->prepare($sql);
        $q->execute(array($id,$doc,$apostou,$ganhou));
        header("Location: tabela.php?ntb=5316b816def2ba41e0241f54dc7efbd1&tbo=doc_CLI");
      }
?>
<form action="page.php?ntb=5316b816def2ba41e0241f54dc7efbd1&tb=1" method="post" data-abide novalidate>
  <div data-abide-error class="alert callout" style="display: none;">
    <p><i class="fi-alert"></i> Seu formulário possue alguns erros.</p>
  </div>
  <div class="row">
    <div class="medium-6 columns">
      <label>*Selecione o ID da partida
        <select id="select" name="vID" required>
          <option value="">--SELECIONE O ID--</option>
          <?php
            $sql = 'SELECT * FROM '. $BDSchema .'TB_Partida ORDER BY id ASC';
            foreach ($pdo->query($sql) as $row) {
              echo '<option value="'. $row['id'] . '">'. $row['id'] . '</option>';
            }
          ?>
        </select>
        <span class="form-error">
          Koé, você não pode deixar isso em branco!
        </span>
      </label>
    </div>
    <div class="medium-6 columns">
      <label>*Selecione o nome do cliente
        <select id="select" name="vDOC" required>
          <option value="">--SELECIONE O NOME--</option>
          <?php
            $sql = 'SELECT * FROM '. $BDSchema .'TB_Cliente ORDER BY nome ASC';
            foreach ($pdo->query($sql) as $row) {
              echo '<option value="'. $row['doc'] . '">'. $row['nome'] . '</option>';
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
      <label>*Quanto apostou
        <div class="input-group">
          <span class="input-group-label">$</span>
          <input class="input-group-field" name="vAPOSTOU" required type="number">
        </div>
        <span class="form-error">
          Koé, você não pode deixar isso em branco!
        </span>
      </label>
      <p class="help-text" id="exampleHelpText">Digite o valor que foi apostado.</p>
    </div>
    <div class="medium-6 columns">
      <label>*Quanto ganhou
        <div class="input-group">
          <span class="input-group-label">$</span>
          <input class="input-group-field" name="vGANHOU" required type="number">
        </div>
        <span class="form-error">
          Koé, você não pode deixar isso em branco!
        </span>
      </label>
      <p class="help-text" id="exampleHelpText">Digite o valor que foi ganho.</p>
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
