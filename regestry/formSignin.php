<?php include "../connection/connection.php";



if($conn){


	mysqli_select_db('sirhal_web');
	
		$nombre = mysqli_real_escape_string($conn,$_POST["nombre"]);
		$sexo = mysqli_real_escape_string($conn,$_POST["sexo"]);
		$dni = mysqli_real_escape_string($conn,$_POST["dni"]);
		$email = mysqli_real_escape_string($conn,$_POST["email"]);
		$telefono = mysqli_real_escape_string($conn,$_POST["telefono"]);    
		$organismo = mysqli_real_escape_string($conn,$_POST["organismo"]);
	
$sqlInsert = "INSERT INTO liquidadores ".
"(nombreApellido,sexo,dni,email,telefono,organismo)".
"VALUES ".
"('$nombre','$sexo','$dni','$email','$telefono','$organismo')";


  $q = mysqli_query($conn,$sqlInsert);

    $user = 'DNI'.$dni;
    $password = 'DNI'.$dni;
    $permisos = 1;

  $query = "insert into usuarios ".
  "(nombre,user,password,permisos)".
  "VALUES ".
  "('$nombre','$user','$password','$permisos')";
  
  $retval = mysqli_query($conn,$query);

}else{
 echo '<div class="alert alert-danger" role="alert">';
  echo 'Could not Connect to Database: ' . mysqli_error($conn);
  echo "</div>";
}
  

?>

<html><head>
	<meta charset="utf-8">
	<title>Registro Finalizado</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../../img/img-favicon32x32.png" />
	<link rel="stylesheet" href="/sirhal-web/skeleton/css/bootstrap.min.css" >
	<link rel="stylesheet" href="/sirhal-web/skeleton/css/bootstrap-theme.css" >
	<link rel="stylesheet" href="/sirhal-web/skeleton/css/bootstrap-theme.min.css" >
	<link rel="stylesheet" href="/sirhal-web/skeleton/css/fontawesome.css">
	<link rel="stylesheet" href="/sirhal-web/skeleton/css/fontawesome.min.css" >
	<link rel="stylesheet" href="/sirhal-web/skeleton/css/jquery.dataTables.min.css" >

	<script src="/sirhal-web/skeleton/js/jquery-3.4.1.min.js"></script>
	<script src="/sirhal-web/skeleton/js/bootstrap.min.js"></script>
	
	
	<script src="/sirhal-web/skeleton/js/jquery.dataTables.min.js"></script>
	<script src="/sirhal-web/skeleton/js/dataTables.editor.min.js"></script>
	<script src="/sirhal-web/skeleton/js/dataTables.select.min.js"></script>
	<script src="/sirhal-web/skeleton/js/dataTables.buttons.min.js"></script>

	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet"  type="text/css" media="screen" href="login.css" />
	
	
	
</head>
<body background="../img/main-img.png" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center; background-size: cover; height: 100%">

<div class="container-fluid"><br>
      <div class="row">
      <div class="col-md-12 text-center">
	
	<?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-time"></span> <?php echo "Hora Actual: " . date("H:i"); ?></button>
	 <?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-calendar"></span> <?php echo "Fecha Actual: ". strftime("%d de %B del %Y"); ?> </button>
	</div>
	</div>
	</div>
	<br><hr>


            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        

<?php



if(!$q && !$retval)
{
 
  echo '<div class="alert alert-danger" role="alert">';
  echo 'Could not enter data: ' . mysqli_error($conn);
  echo "</div>";
  echo '<hr> <a href="../logout.php"><input type="button" value="Reintente" class="btn btn-danger"></a>';
 
}

else
{
   
    echo '<div class="alert alert-success" role="alert">';
    echo "Registro Exitoso!!<br>";
    echo "Su Usuario y contraseña son su número de DNI anteponiendo DNI al número, sin dejar espacios.<br> Ejemplo: DNI99444666";
    echo "</div>";
    echo '<hr> <a href="../logout.php"><input type="button" value="Ingresar" class="btn btn-success"></a>';
}



	//cerramos la conexion
	
	mysqli_close($conn);

    
?>
</div>
</div>
</div>




</body>
</html>

