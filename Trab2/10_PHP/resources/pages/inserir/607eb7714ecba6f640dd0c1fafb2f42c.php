<?php
require_once('resources/config.php');
$pdo = BancodeDados::conecta();

if ( !empty($_POST)) {
        $tin = $_POST['vTIN'];
        $nome = $_POST['vNOME'];
        $endereco = $_POST['vENDERECO'];
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO '. $BDSchema .'TB_Franquia (tin,nome,endereco) VALUES(?, ?, ?)';
        $q = $pdo->prepare($sql);
        $q->execute(array($tin,$nome,$endereco));
        header("Location: tabela.php?ntb=607eb7714ecba6f640dd0c1fafb2f42c");
      }
?>
<h1>Tabela franquia</h1>
<div class="row">
  <div class="medium-12 columns MarginTop">
    <nav aria-label="Você está aqui:" role="navigation">
      <ul class="breadcrumbs">
        <li><a href="index.php">Home</a></li>
        <li><a href="tabela.php?ntb=607eb7714ecba6f640dd0c1fafb2f42c">Tabela Franquia</a></li>
        <li>
          <span class="show-for-sr">Atual: </span> Inserir entrada
        </li>
      </ul>
    </nav>
  </div>
</div>
<div class="row">
  <div class="medium-12 columns MarginTop">
    <form action="page.php?ntb=607eb7714ecba6f640dd0c1fafb2f42c&tb=1" method="post" data-abide novalidate>
      <div data-abide-error class="alert callout" style="display: none;">
        <p><i class="fi-alert"></i> Seu formulário possue alguns erros.</p>
      </div>
      <div class="row">
        <div class="medium-6 columns">
          <label>*Número do TIN
            <input type="text" name="vTIN" placeholder="0123456789" aria-describedby="Digite o TIN" required pattern="number">
            <span class="form-error">
              Koé, você não pode deixar isso em branco!
            </span>
          </label>
        </div>
        <div class="medium-6 columns">
          <label>*Número de contato
            <input type="text" name="vNOME" placeholder="Flamingo (40)" aria-describedby="Digite o nome" required pattern="text">
            <span class="form-error">
              Koé, você não pode deixar isso em branco!
            </span>
          </label>
        </div>
      </div>
      <div class="row">
        <div class="medium-6 columns">
          <label>*Endereço
            <input type="text" name="vENDERECO" placeholder="Rua 123 (100)" aria-describedby="Digite o endereço" required pattern="text">
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
