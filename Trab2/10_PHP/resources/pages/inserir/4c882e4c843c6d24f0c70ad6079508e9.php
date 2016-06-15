<?php
require_once('resources/config.php');
$pdo = BancodeDados::conecta();

if ( !empty($_POST)) {
        $doc = $_POST['vDOC'];
        $contato = $_POST['vCONTATO'];
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO '. $BDSchema .'TB_ContatoPessoa (doc_PES,contato) VALUES(?, ?)';
        $q = $pdo->prepare($sql);
        $q->execute(array($doc,$contato));
        header("Location: tabela.php?ntb=4c882e4c843c6d24f0c70ad6079508e9&tbo=doc_PES");
      }
?>
<h1>Tabela contato pessoa</h1>
<form action="page.php?ntb=4c882e4c843c6d24f0c70ad6079508e9&tb=1" method="post" data-abide novalidate>
  <div data-abide-error class="alert callout" style="display: none;">
    <p><i class="fi-alert"></i> Seu formulário possue alguns erros.</p>
  </div>
  <div class="row">
    <div class="medium-6 columns">
      <label>*Selecione o cliente
        <select id="select" name="vDOC" required>
          <option value="">--SELECIONE O CLIENTE--</option>
          <?php
            $sql = 'SELECT * FROM '. $BDSchema .'TB_Pessoa ORDER BY nome ASC';
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
    <div class="medium-6 columns">
      <label>*Número de contato
        <input type="text" name="vCONTATO" placeholder="12345678901234" aria-describedby="Digite o numero de contato" required pattern="text">
        <span class="form-error">
          Koé, você não pode deixar isso em branco!
        </span>
      </label>
      <p class="help-text" id="exampleHelpText">Por favor digite o numero de contato!</p>
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
