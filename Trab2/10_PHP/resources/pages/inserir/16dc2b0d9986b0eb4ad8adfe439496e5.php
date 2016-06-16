<?php
require_once('resources/config.php');
$pdo = BancodeDados::conecta();

if ( !empty($_POST)) {
        $numero = $_POST['vNUMERO'];
        $nome = $_POST['vNJOGO'];
        $tin = $_POST['vTIN'];
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO '. $BDSchema .'TB_Mesa (numero,nome_JGG,tin_FRA) VALUES(?, ?, ?)';
        $q = $pdo->prepare($sql);
        $q->execute(array($numero,$nome,$tin));
        header("Location: tabela.php?ntb=16dc2b0d9986b0eb4ad8adfe439496e5&tbo=numero");
      }
?>
<h1>Tabela mesa</h1>
<form action="page.php?ntb=16dc2b0d9986b0eb4ad8adfe439496e5&tb=1" method="post" data-abide novalidate>
  <div data-abide-error class="alert callout" style="display: none;">
    <p><i class="fi-alert"></i> Seu formulário possue alguns erros.</p>
  </div>
  <div class="row">
    <div class="medium-6 columns">
      <label>*Digite o numero da mesa.
        <input type="text" name="vNUMERO" placeholder="1234" aria-describedby="Digite o numero da mesa." required pattern="number">
        <span class="form-error">
          Koé, você não pode deixar isso em branco!
        </span>
      </label>
    </div>
    <div class="medium-6 columns">
      <label>*Selecione qual jogo esta mesa possue
        <select id="select" name="vNJOGO" required>
          <option value="">--SELECIONE O NOME--</option>
          <?php
            $sql = 'SELECT * FROM '. $BDSchema .'TB_JogoEmGrupo ORDER BY nome_jgo ASC';
            foreach ($pdo->query($sql) as $row) {
              echo '<option value="'. $row['nome_jgo'] . '">'. $row['nome_jgo'] . '</option>';
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
      <label>*Selecione onde a máquina está localizada
        <select id="select" name="vTIN" required>
          <option value="">--SELECIONE O NOME--</option>
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
