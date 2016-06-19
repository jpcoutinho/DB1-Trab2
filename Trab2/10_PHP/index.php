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
                        <h1 class="page-header">Dashboard</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <?php
                        $stmt = $pdo->query("SELECT count(doc_pes) FROM ". $BDSchema ."TB_Cliente");
                        $totalClientes = $stmt->fetchColumn();
                        ?>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-star fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php echo '<div class="huge">'.$totalClientes.'</div>'; ?>
                                        <div>Clientes!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="tabela.php?ntb=36b5b40331e8df3f92b5ccf8685afbf5">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver Detalhes</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <?php
                        $stmt = $pdo->query("SELECT count(doc) FROM ". $BDSchema ."TB_Pessoa");
                        $totalPessoas = $stmt->fetchColumn();
                        ?>
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php echo '<div class="huge">'.$totalPessoas.'</div>'; ?>
                                        <div>Pessoas!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="tabela.php?ntb=05b7ea9032cccacb4ecfa3785f42810c">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver Detalhes</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <?php
                        $stmt = $pdo->query("SELECT count(id) FROM ". $BDSchema ."TB_Partida");
                        $totalPartidas = $stmt->fetchColumn();
                        ?>
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-flag-o fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php echo '<div class="huge">'.$totalPartidas.'</div>'; ?>
                                        <div>Partidas!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="tabela.php?ntb=f3df806dc323278b7ceee93ff594327d">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver Detalhes</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <?php
                        $stmt = $pdo->query("SELECT count(doc_pes) FROM ". $BDSchema ."TB_Funcionario");
                        $totalFuncionarios = $stmt->fetchColumn();
                        ?>
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php echo '<div class="huge">'.$totalFuncionarios.'</div>'; ?>
                                        <div>Funcionários!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="tabela.php?ntb=dbe3d143277fe8475c2e3e88ecf021f5">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver Detalhes</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Adicionar novo</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <a href="page.php?ntb=36b5b40331e8df3f92b5ccf8685afbf5&tb=1"><button type="button" class="btn btn-primary btn-lg btn-block MarginTop">Cliente</button></a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <a href="page.php?ntb=607eb7714ecba6f640dd0c1fafb2f42c&tb=1"><button type="button" class="btn btn-primary btn-lg btn-block MarginTop">Franquia</button></a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <a href="page.php?ntb=dbe3d143277fe8475c2e3e88ecf021f5&tb=1"><button type="button" class="btn btn-primary btn-lg btn-block MarginTop">Funcionário</button></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <a href="page.php?ntb=bceca77ab8c59eeaf2e6d6a323be0ae7&tb=1"><button type="button" class="btn btn-primary btn-lg btn-block MarginTop">Jogo</button></a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <a href="page.php?ntb=eaff6c1f31f280f1bd68c5d54469f61b&tb=1"><button type="button" class="btn btn-primary btn-lg btn-block MarginTop">Máquina</button></a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <a href="page.php?ntb=05b7ea9032cccacb4ecfa3785f42810c&tb=1"><button type="button" class="btn btn-primary btn-lg btn-block MarginTop">Pessoa</button></a>
                    </div>
                </div>
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
<?php
  $pdo = BancodeDados::desconecta();
?>
