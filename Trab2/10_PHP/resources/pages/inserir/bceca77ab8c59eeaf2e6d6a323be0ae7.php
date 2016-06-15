<?php
require_once('resources/config.php');
$pdo = BancodeDados::conecta();

if ( !empty($_POST)) {
        $nome = $_POST['vNOME'];
        $duracao = $_POST['vDURACAO'];
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO '. $BDSchema .'TB_Jogo (nome,duracao) VALUES(?, ?)';
        $q = $pdo->prepare($sql);
        $q->execute(array($nome,$duracao));
        header("Location: tabela.php?ntb=bceca77ab8c59eeaf2e6d6a323be0ae7&tbo=nome");
      }
?>
<h1>Tabela jogo</h1>
<form action="page.php?ntb=bceca77ab8c59eeaf2e6d6a323be0ae7&tb=1" method="post" data-abide novalidate>
  <div data-abide-error class="alert callout" style="display: none;">
    <p><i class="fi-alert"></i> Seu formulário possue alguns erros.</p>
  </div>
  <div class="row">
    <div class="medium-6 columns">
      <label>Digite o nome do jogo.
        <input type="text" name="vNOME" placeholder="BlackJack (30)" aria-describedby="Digite o nome do jogo." required pattern="text">
      </label>
    </div>
  </div>
  <div class="row">
    <div class="medium-6 columns">
      <label>*Selecione o nome do jogo
        <select id="select" name="vNOME_JGO" required>
          <option value="">--SELECIONE O JOGO--</option>
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
    <div class="medium-6 columns">
      <label>Data e hora da compra.
        <input type="text" name="vDATA" placeholder="1991-10-05 19:59:02" aria-describedby="Digite a data e hora" required pattern="text">
      </label>
      <p class="help-text" id="exampleHelpText">Caso deseje permanecer anônimo, por favor preencha este campo!</p>
    </div>
  </div>
  <div class="row">
    <div class="medium-6 columns">
      <label>*Quanto foi apostado
        <div class="input-group">
          <span class="input-group-label">$</span>
          <input class="input-group-field" name="vAPOSTOU" required type="number">
          <span class="form-error">
            Koé, você não pode deixar isso em branco!
          </span>
        </div>
      </label>
      <p class="help-text" id="exampleHelpText">Digite o valor que foi apostado.</p>
    </div>
    <div class="medium-6 columns">
      <label>*Quanto foi ganho
        <div class="input-group">
          <span class="input-group-label">$</span>
          <input class="input-group-field" name="vGANHOU" required type="number">
          <span class="form-error">
            Koé, você não pode deixar isso em branco!
          </span>
        </div>
      </label>
      <p class="help-text" id="exampleHelpText">Digite o valor que foi apostado.</p>
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
