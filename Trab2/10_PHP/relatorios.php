<?php
session_start(); /* Starts the session */
if(!isset($_SESSION['UserData']['Username'])){
  $url = "login.php";
  if (!headers_sent()) {
      header('Location: '.$url);
      exit;
  } else {
          echo '<script type="text/javascript">';
          echo 'window.location.href="'.$url.'";';
          echo '</script>';
          exit;
  }
  exit;
}
require_once("resources/config.php");
$pdo = BancodeDados::conecta();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Casino INF1383</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="css/dataTables.bootstrap.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <?php
        require_once("resources/template/nav.html");
        ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">Relatório da rede de Casino INF1383</h1>
                      <h3>O casino possui:</h3>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row">
                  <div class="col-lg-12">
                    <dl class="dl-horizontal MarginTop">
                        <?php
                        $stmt = $pdo->query("SELECT count(doc_pes) FROM ". $BDSchema ."TB_Cliente");
                        $totalClientes = $stmt->fetchColumn();
                        ?>
                        <dt>Clientes:</dt>
                        <?php echo '<dd>'.$totalClientes.'</dd>'; ?>
                        <?php
                        $stmt = $pdo->query("SELECT count(doc) FROM ". $BDSchema ."TB_Pessoa");
                        $totalPessoas = $stmt->fetchColumn();
                        ?>
                        <dt>Pessoas:</dt>
                        <?php echo '<dd>'.$totalPessoas.'</dd>'; ?>
                        <?php
                        $stmt = $pdo->query("SELECT count(doc_pes) FROM ". $BDSchema ."TB_Funcionario");
                        $totalFunc = $stmt->fetchColumn(); ?>
                        <dt>Funcionários:</dt>
                        <?php echo '<dd>'.$totalFunc.'</dd>'; ?>
                        <?php
                        $stmt = $pdo->query("SELECT count(tin) FROM ". $BDSchema ."TB_Franquia");
                        $totalFra = $stmt->fetchColumn(); ?>
                        <dt>Franquias:</dt>
                        <?php echo '<dd>'.$totalFra.'</dd>'; ?>
                        <?php
                        $stmt = $pdo->query("SELECT count(nome) FROM ". $BDSchema ."TB_Jogo");
                        $totalJgo = $stmt->fetchColumn(); ?>
                        <dt>Jogos:</dt>
                        <?php echo '<dd>'.$totalJgo.'</dd>'; ?>
                        <?php
                        $stmt = $pdo->query("SELECT count(numero) FROM ". $BDSchema ."TB_Mesa");
                        $totalMES = $stmt->fetchColumn(); ?>
                        <dt>Mesas:</dt>
                        <?php echo '<dd>'.$totalMES.'</dd>'; ?>
                        <?php
                        $stmt = $pdo->query("SELECT count(snumber) FROM ". $BDSchema ."TB_Maquina");
                        $totalMAQ = $stmt->fetchColumn(); ?>
                        <dt>Máquinas:</dt>
                        <?php echo '<dd>'.$totalMAQ.'</dd>'; ?>
                    </dl>
                  </div>
              </div>
              <!-- /.row -->
              <div class="row">
                  <div class="col-lg-12">
                      <h3 lass="page-header">Foram realizadas:</h3>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row">
                  <div class="col-lg-12">
                    <dl class="dl-horizontal MarginTop">
                        <?php
                        $stmt = $pdo->query("SELECT count(doc_cli) FROM ". $BDSchema ."TB_Jogada");
                        $totalJGA = $stmt->fetchColumn();
                        ?>
                        <dt>Jogadas:</dt>
                        <?php echo '<dd>'.$totalJGA.'</dd>'; ?>
                        <?php
                        $stmt = $pdo->query("SELECT count(id) FROM ". $BDSchema ."TB_Partida");
                        $totalPAR = $stmt->fetchColumn();
                        ?>
                        <dt>Partidas:</dt>
                        <?php echo '<dd>'.$totalPAR.'</dd>'; ?>
                        <?php
                        $stmt = $pdo->query("SELECT count(numero_cax) FROM ". $BDSchema ."TB_Vendeu");
                        $totalVend = $stmt->fetchColumn();
                        $stmt = $pdo->query("SELECT count(numero_cax) FROM ". $BDSchema ."TB_Comprou");
                        $totalComp = $stmt->fetchColumn();
                        $totalTran = $totalVend + $totalComp;
                        ?>
                        <dt>Transações:</dt>
                        <?php echo '<dd>'.$totalTran.'</dd>'; ?>
                        <?php
                        $stmt = $pdo->query("SELECT sum(valor) FROM ". $BDSchema ."TB_Vendeu");
                        $totalVend = $stmt->fetchColumn();
                        $stmt = $pdo->query("SELECT sum(valor) FROM ". $BDSchema ."TB_Comprou");
                        $totalComp = $stmt->fetchColumn();
                        $totalTran = $totalVend + $totalComp;
                        ?>
                        <dt>Somando um total de:</dt>
                        <?php echo '<dd>'.$Moeda.' '.$totalTran.'</dd>'; ?>
                    </dl>
                  </div>
              </div>
              <!-- /.row -->
              <div class="row">
                  <div class="col-lg-12">
                    <dl class="dl-horizontal MarginTop">
                      <?php
                      $stmt = $pdo->query("SELECT sum(valor) FROM ". $BDSchema ."TB_Vendeu");
                      $totalVend = $stmt->fetchColumn();
                      $stmt = $pdo->query("SELECT sum(valor) FROM ". $BDSchema ."TB_Comprou");
                      $totalComp = $stmt->fetchColumn();
                      $totalTran =  $totalComp - $totalVend;
                      ?>
                      <dt>Receita Liquida:</dt>
                      <?php echo '<dd>'.$Moeda.' '.$totalTran.'</dd>'; ?>
                    </dl>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>
</body>
</html>
