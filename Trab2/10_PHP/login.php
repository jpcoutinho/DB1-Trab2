<?php session_start(); /* Starts the session */
	/* Check Login form submitted */
	if(isset($_POST['Submit'])){
		/* Define username and associated password array */
		$logins = array('Zezinho' => '123456','username1' => 'password1','username2' => 'password2');
		/* Check and assign submitted Username and Password to new variable */
		$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
		$Password = isset($_POST['Password']) ? $_POST['Password'] : '';
		/* Check Username and Password existence in defined array */
		if (isset($logins[$Username]) && $logins[$Username] == $Password){
			/* Success: Set session variables and redirect to Protected page  */
			$_SESSION['UserData']['Username']=$logins[$Username];
			header("location:index.php");
			exit;
		} else {
			/*Unsuccessful attempt: Set error message */
			$msg="<span style='color:red'>Detalhes de login inválidos!</span>";
		}
	}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Casino INF1336</title>
    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
		<link href="dist/css/login.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="dist/js/html5shiv.js"></script>
        <script src="dist/js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Por favor faça login</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" name="Login_Form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Usuário" name="Username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="Password" type="password">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
																<input name="Submit" type="submit" value="Login" class="btn btn-success">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
				<div class="row">
            <div class="col-md-4 col-md-offset-4">
								<img src="img/Max.gif">
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
		<script src="js/Max_Anim.js"></script>
</body>
</html>
