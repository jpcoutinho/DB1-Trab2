<?php
require_once('resources/config.php');
$pdo = BancodeDados::conecta();

if ( !empty($_POST)) {
        $snumber = $_POST['vSN'];
        $tin = $_POST['vTIN'];
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO '. $BDSchema .'TB_Maquina (snumber,tin_fra) VALUES(?, ?)';
        $q = $pdo->prepare($sql);
        $q->execute(array($snumber,$tin));
        header("Location: tabela.php?ntb=eaff6c1f31f280f1bd68c5d54469f61b&tbo=snumber");
      }
?>
<h1>Tabela máquina</h1>
<form action="page.php?ntb=eaff6c1f31f280f1bd68c5d54469f61b&tb=1" method="post" data-abide novalidate>
  <div data-abide-error class="alert callout" style="display: none;">
    <p><i class="fi-alert"></i> Seu formulário possue alguns erros.</p>
  </div>
  <div class="row">
    <div class="medium-6 columns">
      <label>*Digite o numero de série.
        <input type="text" name="vSN" placeholder="1234" aria-describedby="Digite o numero de série." required pattern="number">
        <span class="form-error">
          Koé, você não pode deixar isso em branco!
        </span>
      </label>
    </div>
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
