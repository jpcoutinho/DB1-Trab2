<?php
require_once('resources/config.php');
$pdo = BancodeDados::conecta();

if ( !empty($_POST)) {
        $tin = $_POST['vTIN'];
        $contato = $_POST['vCONTATO'];
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO '. $BDSchema .'TB_ContatoFranquia (tin_FRA,contato) VALUES(?, ?)';
        $q = $pdo->prepare($sql);
        $q->execute(array($tin,$contato));
        header("Location: tabela.php?ntb=0a258ee607f3546bd8d9050ef6697142&tbo=tin_FRA");
      }
?>
<form action="page.php?ntb=0a258ee607f3546bd8d9050ef6697142&tb=1" method="post" data-abide novalidate>
  <div data-abide-error class="alert callout" style="display: none;">
    <p><i class="fi-alert"></i> Seu formulário possue alguns erros.</p>
  </div>
  <div class="row">
    <div class="medium-6 columns">
      <label>*Selecione a franquia
        <select id="select" name="vTIN" required>
          <option value="">--SELECIONE A FRANQUIA--</option>
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
    <div class="medium-6 columns">
      <label>*Número do caixa
        <input type="text" name="vCONTATO" placeholder="12345678901234" aria-describedby="Digite o numero de contato" required pattern="text">
        <span class="form-error">
          Koé, você não pode deixar isso em branco!
        </span>
      </label>
      <p class="help-text" id="exampleHelpText">Por favor digite o numero do caixa!</p>
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
