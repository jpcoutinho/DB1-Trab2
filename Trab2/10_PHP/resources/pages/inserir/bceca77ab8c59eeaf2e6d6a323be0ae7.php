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
        header("Location: tabela.php?ntb=bceca77ab8c59eeaf2e6d6a323be0ae7");
      }
?>
<h1>Tabela jogo</h1>
<div class="row">
  <div class="medium-12 columns MarginTop">
    <nav aria-label="Você está aqui:" role="navigation">
      <ul class="breadcrumbs">
        <li><a href="index.php">Home</a></li>
        <li><a href="tabela.php?ntb=bceca77ab8c59eeaf2e6d6a323be0ae7">Tabela Jogo</a></li>
        <li>
          <span class="show-for-sr">Atual: </span> Inserir entrada
        </li>
      </ul>
    </nav>
  </div>
</div>
<div class="row">
  <div class="medium-12 columns MarginTop">
    <form action="page.php?ntb=bceca77ab8c59eeaf2e6d6a323be0ae7&tb=1" method="post" data-abide novalidate>
      <div data-abide-error class="alert callout" style="display: none;">
        <p><i class="fi-alert"></i> Seu formulário possue alguns erros.</p>
      </div>
      <div class="row">
        <div class="medium-6 columns">
          <label>*Digite o nome do jogo.
            <input type="text" name="vNOME" placeholder="BlackJack (30)" aria-describedby="Digite o nome do jogo." required pattern="text">
            <span class="form-error">
              Koé, você não pode deixar isso em branco!
            </span>
          </label>
        </div>
        <div class="medium-6 columns">
          <label>*Digite a duração do jogo em minutos.
            <input type="text" name="vDURACAO" placeholder="120.2" aria-describedby="Digite a duração do jogo em min." required pattern="number">
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
