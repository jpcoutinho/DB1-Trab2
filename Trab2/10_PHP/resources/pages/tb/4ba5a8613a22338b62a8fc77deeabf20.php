<?php
require_once('resources/config.php');
$pdo = BancodeDados::conecta();

if ( !empty($_POST)) {
        $doc = $_POST['vDOC'];
        $snumber = $_POST['vSN'];
        $nome_jgo = $_POST['vNOME_JGO'];
        $data = $_POST['vDATA'];
        $apostou = $_POST['vAPOSTOU'];
        $ganhou = $_POST['vGANHOU'];
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO '. $BDSchema .'TB_Jogada (doc_cli,snumber_maq,nome_jgo,data,apostou,ganhou) VALUES(?, ?, ?, ?, ?, ?)';
        $q = $pdo->prepare($sql);
        $q->execute(array($doc,$snumber,$nome_jgo,$data,$apostou,$ganhou));
        header("Location: tabela.php?ntb=4ba5a8613a22338b62a8fc77deeabf20&tbo=doc_CLI");
      }
?>
<h1>Tabela jogada</h1>
<form action="page.php?ntb=4ba5a8613a22338b62a8fc77deeabf20&tb=1" method="post" data-abide novalidate>
  <div data-abide-error class="alert callout" style="display: none;">
    <p><i class="fi-alert"></i> Seu formulário possue alguns erros.</p>
  </div>
  <div class="row">
    <div class="medium-6 columns">
      <label>*Selecione o cliente
        <select id="select" name="vDOC" required>
          <option value="">--SELECIONE O NOME--</option>
          <?php
          $sql = 'SELECT * FROM '. $BDSchema .'TB_Cliente ORDER BY doc_pes ASC';
          foreach ($pdo->query($sql) as $row) {
            if(!empty($row['pseudominio']))
              echo '<option value="'. $row['doc_pes'] .'">'. $row['pseudominio'] .'</option>';
            else {
              echo '<option value="'. $row['doc_pes'] .'">'. $row['doc_pes'] .'</option>';
            }
          }
          ?>
        </select>
        <span class="form-error">
          Koé, você não pode deixar isso em branco!
        </span>
      </label>
    </div>
    <div class="medium-6 columns">
      <label>*Selecione a maquina
        <select id="select" name="vSN" required>
          <option value="">--SELECIONE O SERIAL--</option>
          <?php
            $sql = 'SELECT * FROM '. $BDSchema .'TB_Maquina ORDER BY snumber ASC';
            foreach ($pdo->query($sql) as $row) {
              echo '<option value="'. $row['snumber'] . '">'. $row['snumber'] . '</option>';
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
