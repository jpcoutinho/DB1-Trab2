<?php
require_once('resources/config.php');
$pdo = BancodeDados::conecta();

if ( !empty($_POST)) {
        $nome = $_POST['vNOME'];
        $equipes = $_POST['vEQUIPES'];
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO '. $BDSchema .'TB_JogoIndividual (nome_jgo) VALUES(?)';
        $q = $pdo->prepare($sql);
        $q->execute(array($nome));
        header("Location: tabela.php?ntb=b6e5a04e7a1d70c4d3d9b3756973a4b5&tbo=nome_JGO");
      }
?>
<h1>Tabela jogo individual</h1>
<form action="page.php?ntb=b6e5a04e7a1d70c4d3d9b3756973a4b5&tb=1" method="post" data-abide novalidate>
  <div data-abide-error class="alert callout" style="display: none;">
    <p><i class="fi-alert"></i> Seu formulário possue alguns erros.</p>
  </div>
  <div class="row">
    <div class="medium-6 columns">
      <label>*Selecione o nome do jogo
        <select id="select" name="vNOME" required>
          <option value="">--SELECIONE O NOME--</option>
          <?php
            $sql = 'SELECT * FROM '. $BDSchema .'TB_Jogo ORDER BY nome ASC';
            foreach ($pdo->query($sql) as $row) {
              echo '<option value="'. $row['nome'] . '">'. $row['nome'] . '</option>';
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
