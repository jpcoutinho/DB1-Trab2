<?php
  require_once("resources/config.php");
  $pdo = BancodeDados::conecta();
  $sql = 'SELECT * FROM '. $BDSchema .'.TB_Caixa CAX JOIN'. $BDSchema .'.TB_Franquia FRA ON CAX.tin_FRA=FRA.tin';
?>
<form data-abide novalidate>
  <div data-abide-error class="alert callout" style="display: none;">
    <p><i class="fi-alert"></i> There are some errors in your form.</p>
  </div>
  <div class="row">
    <div class="medium-6 columns">
      <label>Número do caixa
        <input type="text" placeholder="1234" aria-describedby="Digite o numero da caixa" required pattern="number">
        <span class="form-error">
          Yo, you had better fill this out, it's required.
        </span>
      </label>
      <p class="help-text" id="exampleHelpText">Por favor digite o numero do caixa!</p>
    </div>
    <div class="medium-6 columns">
      <label>European Cars, Choose One, it can't be the blank option.
        <select id="select" required>
          <option value=""></option>
          <?php
          foreach ($pdo->query($sql) as $row) {
            echo '<option value="'. $row['tin'] .'">'. $row['nome'] .'</option>';
          }
          ?>
        </select>
      </label>
    </div>
  </div>
  <div class="row">
    <fieldset class="large-6 columns">
      <button class="button" type="submit" value="Submit">Submit</button>
    </fieldset>
    <fieldset class="large-6 columns">
      <button class="button" type="reset" value="Reset">Reset</button>
    </fieldset>
  </div>
</form>
<?php
  $pdo = BancodeDados::desconecta();
?>
