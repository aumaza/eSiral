<?php include "connection/connection.php";

	$user = mysql_real_escape_string($_POST["user"],$conn);
	$pass1 = mysql_real_escape_string($_POST["pass"],$conn);
	session_start();
	$_SESSION['user'] = $user;
	$_SESSION['pass'] = $pass1;
	
      if($conn){
	
	         
	mysql_select_db('sirhal_web');
	
	$sql = "SELECT * FROM usuarios where user='$user' and password='$pass1' and permisos = 1";
	$q = mysql_query($sql,$conn);
	
	$query = "SELECT * FROM usuarios where user='$user' and password='$pass1' and permisos = 0";
	$retval = mysql_query($query,$conn);
	
		
	}


?>
  <html style="height: 100%">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="icons/actions/im-skype.png" />
    <link rel="stylesheet" href="/sirhal-web/skeleton/css/bootstrap.min.css" >
	<link rel="stylesheet" href="/sirhal-web/skeleton/css/bootstrap-theme.css" >
	<link rel="stylesheet" href="/sirhal-web/skeleton/css/bootstrap-theme.min.css" >
	<link rel="stylesheet" href="/sirhal-web/skeleton/css/fontawesome.css">
	<link rel="stylesheet" href="/sirhal-web/skeleton/css/fontawesome.min.css" >
	<link rel="stylesheet" href="/sirhal-web/skeleton/css/jquery.dataTables.min.css" >

	<script src="/sirhal-web/skeleton/js/jquery-3.4.1.min.js"></script>
	<script src="/sirhal-web/skeleton/js/bootstrap.min.js"></script>
	<link rel="stylesheet"  type="text/css" media="screen" href="style.css" />
	
    <title>Bienvenido</title>
    </head>
    <body background="img/login-img.jpg" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center; background-size: cover" style="height: 100%"><br>
    <div class="container">
    <div class="main">
    <h2></h2>

<?php
	
    		if(!$q && !$retval) 
		{	
			echo '<div class="alert alert-danger" role="alert">';
			echo "Error de Conexion...";
			exit;
			echo "</div>";
			echo '<a href="index.html"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
			exit;			
			
		}
		
			if($user = mysql_fetch_assoc($retval)){
				

				echo '<div class="alert alert-success" role="alert">';
				echo "Bienvenido!  " .$_SESSION["user"];
				echo "<br>";
				echo "Presione -Aceptar- para continuar";
  				echo "</div>";
				echo '<a href="0/main.php"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a><br>';
			}

			else if($user = mysql_fetch_assoc($q)){

				if(strcmp($_SESSION["user"], 'root') == 0){

				echo '<div class="alert alert-success" role="alert">';
				echo "Bienvenido!  " .$_SESSION["user"];
				echo "<br>";
				echo "Presione -Aceptar- para continuar";
  				echo "</div>";
				echo '<a href="root/main.php"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a><br>';		
			}

			
				else{
				
				echo '<div class="alert alert-success" role="alert">';
				echo "Bienvenido!  " .$_SESSION["user"];
				echo "<br>";
				echo "Presione -Aceptar- para continuar";
  				echo "</div>";
				echo '<a href="1/main.php"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a><br>';
			}
			} 

			

			else{

				echo '<div class="alert alert-danger" role="alert">';
				echo "Usuario o Contraseña Incorrecta. Reintente Por Favor...";
				echo "</div>";
				echo '<a href="index.html"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
	
			}
	
			
	
	//cerramos la conexion
	
	mysql_close($conn);
    ?>
</div>
</div>
</body>
</html>