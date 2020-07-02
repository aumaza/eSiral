<?php include "connection/connection.php";

	$user = mysqli_real_escape_string($conn,$_POST["user"]);
	$pass1 = mysqli_real_escape_string($conn,$_POST["pass"]);
	session_start();
	$_SESSION['user'] = $user;
	$_SESSION['pass'] = $pass1;
	
      if($conn){
	        
	mysqli_select_db('sirhal_web');
	
	$sql = "SELECT * FROM usuarios where user='$user' and password='$pass1' and permisos = 1";
	$q = mysqli_query($conn,$sql);
	
	$query = "SELECT * FROM usuarios where user='$user' and password='$pass1' and permisos = 0";
	$retval = mysqli_query($conn,$query);
	
	}

?>
  <html style="height: 100%">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="icons/actions/im-skype.png" />
    <link rel="stylesheet" href="/eSiral/skeleton/css/bootstrap.min.css" >
	<link rel="stylesheet" href="/eSiral/skeleton/css/bootstrap-theme.css" >
	<link rel="stylesheet" href="/eSiral/skeleton/css/bootstrap-theme.min.css" >
	<link rel="stylesheet" href="/eSiral/skeleton/css/fontawesome.css">
	<link rel="stylesheet" href="/eSiral/skeleton/css/fontawesome.min.css" >
	<link rel="stylesheet" href="/eSiral/skeleton/css/jquery.dataTables.min.css" >

	<script src="/eSiral/skeleton/js/jquery-3.4.1.min.js"></script>
	<script src="/eSiral/skeleton/js/bootstrap.min.js"></script>
	<link rel="stylesheet"  type="text/css" media="screen" href="style.css" />
	
    <title>Bienvenido</title>
    </head>
    <body background="img/login-img.jpg" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center; background-size: cover" style="height: 100%"><br>
    <div class="container">
    <div class="main">
    <h2></h2>

<?php
	
    		if(!$q && !$retval){	
			echo '<div class="alert alert-danger" role="alert">';
			echo "Error de Conexion..." .mysqli_error();
			echo "</div>";
			echo '<a href="index.html"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
			exit;			
			
			}
		
			if($user = mysqli_fetch_assoc($retval)){
				

				echo '<div class="alert alert-danger" role="alert">';
				echo "<strong>Atención!  </strong>" .$_SESSION["user"];
				echo "<br>";
				echo '<span class="pull-center "><img src="icons/status/security-low.png"  class="img-reponsive img-rounded"><strong> Usuario Bloqueado. Contacte al Administrador.</strong>';
				echo "</div>";
				echo '<a href="index.html"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
				exit;
			}

			else if($user = mysqli_fetch_assoc($q)){

				if(strcmp($_SESSION["user"], 'root') == 0){

				echo "<br>";
				echo '<div class="alert alert-success" role="alert">';
				echo '<span class="pull-center "><img src="img/tenor.gif" class="img-reponsive img-rounded" weight="5%" height="5%">';
				echo "<strong> Bienvenido!  </strong>" .$_SESSION["user"];
				echo "<strong> Aguarde un Instante...</strong>";
				echo "<br>";
				echo "</div>";
  				echo '<meta http-equiv="refresh" content="10;URL=http:root/main.php "/>';
				//echo '<a href="root/main.php"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a><br>';		
			}else{
				echo '<div class="alert alert-success" role="alert">';
				echo '<span class="pull-center "><img src="img/tenor.gif" class="img-reponsive img-rounded"  weight="5%" height="5%">';
				echo "<strong> Bienvenido!  </strong>" .$_SESSION["user"];
				echo "<strong> Aguarde un Instante...</strong>";
				echo "<br>";
				echo "</div>";
  				echo '<meta http-equiv="refresh" content="3;URL=http:1/main.php "/>';
				//echo '<a href="1/main.php"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a><br>';
			}
			}else{
				echo '<div class="alert alert-danger" role="alert">';
				echo '<span class="pull-center "><img src="icons/status/dialog-warning.png"  class="img-reponsive img-rounded"> Usuario o Contraseña Incorrecta. Reintente Por Favor....';
				//echo "Usuario o Contraseña Incorrecta. Reintente Por Favor...";
				echo "</div>";
				echo '<a href="index.html"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
				}
	
			
	
	//cerramos la conexion
	
	mysqli_close($conn);
    ?>
</div>
</div>
</body>
