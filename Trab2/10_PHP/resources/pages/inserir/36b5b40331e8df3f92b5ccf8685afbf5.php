<?php
require_once('resources/config.php');
$pdo = BancodeDados::conecta();

if ( !empty($_POST)) {
        $pseu = $_POST['vPSEUDOMINIO'];
        $doc = $_POST['vDOC'];
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO '. $BDSchema .'TB_Cliente (doc_PES,pseudominio) VALUES(?, ?)';
        $q = $pdo->prepare($sql);
        $q->execute(array($doc,$pseu));
        header("Location: tabela.php?ntb=36b5b40331e8df3f92b5ccf8685afbf5&tbo=doc_PES");
      }
?>
<h1>Tabela cliente</h1>
<form action="page.php?ntb=36b5b40331e8df3f92b5ccf8685afbf5&tb=1" method="post" data-abide novalidate>
  <div data-abide-error class="alert callout" style="display: none;">
    <p><i class="fi-alert"></i> Seu formulário possue alguns erros.</p>
  </div>
  <div class="row">
    <div class="medium-6 columns">
      <label>*Selecione o nome do cliente.
        <select id="select" name="vDOC" required>
          <option value="">--SELECIONE O NOME--</option>
          <?php
                   $sql = 'SELECT * FROM '. $BDSchema .'TB_Pessoa ORDER BY nome ASC';
                   foreach ($pdo->query($sql) as $row) {
                     echo '<option value="'. $row['doc'] . '">'. $row['nome'] . '</option>';
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
          <input type="text" name="vPSEUDOMINIO" placeholder="Don Corleone (20)" aria-describedby="Digite o pseudominio" pattern="text">
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
