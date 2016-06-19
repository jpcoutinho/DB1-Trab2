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
              <?php
              if($_GET['tb']==1){
                require_once('resources/pages/inserir/'. $_GET['ntb'] .'.php');
              }
              elseif ($_GET['tb']==2) {
                require_once('resources/pages/ler/'. $_GET['ntb'] .'.php');
              }
              elseif ($_GET['tb']==3) {
                require_once('resources/pages/atualizar/'. $_GET['ntb'] .'.php');
              }
              elseif ($_GET['tb']==4) {
                require_once('resources/pages/deletar/'. $_GET['ntb'] .'.php');
              }
              else{
                echo "<h1>OPERAÇÃO NÃO PERMITIDA!!</h1>";
              }
              ?>
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
    <!-- DataTables JavaScript -->
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>
    <script>
    $(document).ready(function() {
        $('#MainTabela').DataTable({
                responsive: true
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        $('#SecTabela').DataTable({
                responsive: true
        });
    });
    </script>
</body>
</html>
