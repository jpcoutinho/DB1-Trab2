<?php
require_once('resources/config.php');
$pdo = BancodeDados::conecta();

if ( !empty($_POST)) {
        $numro = $_POST['vNUMERO'];
        $tin = $_POST['vTIN'];
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO '. $BDSchema .'TB_Caixa (numero,tin_FRA) VALUES(?, ?)';
        $q = $pdo->prepare($sql);
        $q->execute(array($numro,$tin));
        header("Location: tabela.php?ntb=cbeb4c01b2c581b42decd055eec9076f&tbo=numero");
      }
?>
<form action="page.php?ntb=cbeb4c01b2c581b42decd055eec9076f&tb=1" method="post" data-abide novalidate>
  <div data-abide-error class="alert callout" style="display: none;">
    <p><i class="fi-alert"></i> Seu formulário possue alguns erros.</p>
  </div>
  <div class="row">
    <div class="medium-6 columns">
      <label>*Número do caixa
        <input type="text" name="vNUMERO" placeholder="1234" aria-describedby="Digite o numero da caixa" required pattern="number">
        <span class="form-error">
          Koé, você não pode deixar isso em branco!
        </span>
      </label>
      <p class="help-text" id="exampleHelpText">Por favor digite o numero do caixa!</p>
    </div>
    <div class="medium-6 columns">
      <label>*Selecione em qual franquia o Caixa está localizado
        <select id="select" name="vTIN" required>
          <option value="">--SELECIONE O NOME--</option>
          <?php
                   $sql = 'SELECT * FROM '. $BDSchema .'TB_Franquia ORDER BY nome ASC';
                   foreach ($pdo->query($sql) as $row) {
                     echo '<option value="'. $row['tin'] . '">'. $row['nome'] . '</option>';
                   }
                   BancodeDados::desconecta();
                  ?>
        </select>
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
