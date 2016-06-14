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
        header("Location: tabela.php?ntb=36b5b40331e8df3f92b5ccf8685afbf5&tbo=numero");
      }
?>
<form action="page.php?ntb=36b5b40331e8df3f92b5ccf8685afbf5&tb=1" method="post" data-abide novalidate>
  <div data-abide-error class="alert callout" style="display: none;">
    <p><i class="fi-alert"></i> There are some errors in your form.</p>
  </div>
  <div class="row">
    <div class="medium-6 columns">
      <label>Selecione o nome do cliente.
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
      <div class="medium-6 columns">
        <label>Pseudominio.
          <input type="text" name="vPSEUDOMINIO" placeholder="Don Corleone" aria-describedby="Digite o pseudominio" maxlength="20" pattern="text">
        </label>
        <p class="help-text" id="exampleHelpText">Caso deseje permanecer anônimo, por favor preencha este campo!</p>
      </div>
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
