<?php
require_once('resources/config.php');
$pdo = BancodeDados::conecta();

if ( !empty($_POST)) {
        $doc = $_POST['vDOC'];
        $ncax = $_POST['vNUMERO'];
        $valor = $_POST['vVAL'];
        $data = $_POST['vDATA'];
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO '. $BDSchema .'TB_Vendeu (doc_cli,numero_cax,valor,data) VALUES(?, ?, ?, ?)';
        $q = $pdo->prepare($sql);
        $q->execute(array($doc,$ncax,$valor,$data));
        header("Location: tabela.php?ntb=be5d5600f69779cad9d135cb9b83af79");
      }
?>
<h1>Tabela vendeu</h1>
<div class="row">
  <div class="medium-12 columns MarginTop">
    <nav aria-label="Você está aqui:" role="navigation">
      <ul class="breadcrumbs">
        <li><a href="index.php">Home</a></li>
        <li><a href="tabela.php?ntb=be5d5600f69779cad9d135cb9b83af79">Tabela Vendeu</a></li>
        <li>
          <span class="show-for-sr">Atual: </span> Inserir entrada
        </li>
      </ul>
    </nav>
  </div>
</div>
<div class="row">
  <div class="medium-12 columns MarginTop">
    <form action="page.php?ntb=be5d5600f69779cad9d135cb9b83af79&tb=1" method="post" data-abide novalidate>
      <div data-abide-error class="alert callout" style="display: none;">
        <p><i class="fi-alert"></i> Seu formulário possue alguns erros.</p>
      </div>
      <div class="row">
        <div class="medium-6 columns">
          <label>*Selecione o documento do cliente
            <select id="select" name="vDOC" required>
              <option value="">--SELECIONE O DOCUMENTO--</option>
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
      </div>
      <div class="row">
        <div class="medium-6 columns">
          <label>*Quanto foi vendido
            <div class="input-group">
              <span class="input-group-label">$</span>
              <input class="input-group-field" name="vVAL" required type="number">
              <span class="form-error">
                Koé, você não pode deixar isso em branco!
              </span>
            </div>
          </label>
          <p class="help-text" id="exampleHelpText">Digite o valor que foi apostado.</p>
        </div>
        <div class="medium-6 columns">
          <label>Data da transação
            <input type="text" name="vDATA" placeholder="1991-05-20 20:05:59" aria-describedby="Data de nascimento." required pattern="text">
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
  </div>
</div>
<?php
BancodeDados::desconecta();
?>
