<?php
require_once('resources/config.php');
$pdo = BancodeDados::conecta();

if ( !empty($_POST)) {
  $id = $_POST['vID'];
  $doc = $_POST['vDOC'];
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = 'INSERT INTO '. $BDSchema .'TB_Ganhou (id_PAR,doc_CLI) VALUES(?, ?)';
  $q = $pdo->prepare($sql);
  $q->execute(array($id,$doc));
  header("Location: tabela.php?ntb=d9e35a12173a53725317fcabc563c48f&tbo=doc_CLI");
}
?>
<h1>Tabela ganhou</h1>
<form action="page.php?ntb=d9e35a12173a53725317fcabc563c48f&tb=1" method="post" data-abide novalidate>
  <div data-abide-error class="alert callout" style="display: none;">
    <p><i class="fi-alert"></i> Seu formulário possue alguns erros.</p>
  </div>
  <div class="row">
    <div class="medium-6 columns">
      <label>*Selecione a partida
        <select id="select" name="vID" required>
          <option value="">--SELECIONE O ID--</option>
          <?php
            $sql = 'SELECT * FROM '. $BDSchema .'TB_Partida ORDER BY ID ASC';
            foreach ($pdo->query($sql) as $row) {
              echo '<option value="'. $row['ID'] . '">'. $row['ID'] . '</option>';
            }
          ?>
        </select>
        <span class="form-error">
          Koé, você não pode deixar isso em branco!
        </span>
      </label>
    </div>
    <div class="medium-6 columns">
      <label>*Selecione o cliente
        <select id="select" name="vID" required>
          <option value="">--SELECIONE O NOME--</option>
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
