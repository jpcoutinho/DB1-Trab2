<?php
require_once('resources/config.php');
$pdo = BancodeDados::conecta();

if ( !empty($_POST)) {
        $numero = $_POST['vNUMERO'];
        $doc = $_POST['vDOC'];
        $comprou = $_POST['vCOMPROU'];
        $data = $_POST['vDATA'];
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO '. $BDSchema .'TB_Comprou (numero_CAX,doc_CLI,valor,data) VALUES(?, ?, ?, ?)';
        $q = $pdo->prepare($sql);
        $q->execute(array($numero,$doc,$comprou,$data));
        header("Location: tabela.php?ntb=d184455c8eb6fa3bfb9e1440aa465620=doc_CLI");
      }
?>
<form action="page.php?ntb=d184455c8eb6fa3bfb9e1440aa465620&tb=1" method="post" data-abide novalidate>
  <div data-abide-error class="alert callout" style="display: none;">
    <p><i class="fi-alert"></i> Seu formulário possue alguns erros.</p>
  </div>
  <div class="row">
    <div class="medium-6 columns">
      <label>*Selecione o numero do caixa
        <select id="select" name="vNUMERO" required>
          <option value="">--SELECIONE O NUMERO--</option>
          <?php
            $sql = 'SELECT * FROM '. $BDSchema .'TB_Caixa ORDER BY numero ASC';
            foreach ($pdo->query($sql) as $row) {
              echo '<option value="'. $row['numero'] . '">'. $row['numero'] . '</option>';
            }
          ?>
        </select>
        <span class="form-error">
          Koé, você não pode deixar isso em branco!
        </span>
      </label>
    </div>
    <div class="medium-6 columns">
      <label>*Selecione o documento do cliente
        <select id="select" name="vDOC" required>
          <option value="">--SELECIONE O DOCUMENTO--</option>
          <?php
            $sql = 'SELECT * FROM '. $BDSchema .'TB_Cliente ORDER BY doc_PES ASC';
            foreach ($pdo->query($sql) as $row) {
              echo '<option value="'. $row['doc_PES'] .'">'. $row['doc_PES'] .'</option>';
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
      <label>*Quanto foi comprado
        <div class="input-group">
          <span class="input-group-label">$</span>
          <input class="input-group-field" name="vCOMPROU" required type="number">
          <span class="form-error">
            Koé, você não pode deixar isso em branco!
          </span>
        </div>
      </label>
      <p class="help-text" id="exampleHelpText">Digite o valor que foi apostado.</p>
    </div>
    <div class="medium-6 columns">
      <label>Data da compra.
        <input type="text" name="vDATA" placeholder="YYYYMMDD" aria-describedby="Digite a data" required pattern="date">
      </label>
      <p class="help-text" id="exampleHelpText">Caso deseje permanecer anônimo, por favor preencha este campo!</p>
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
