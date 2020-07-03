<?php include "../../connection/connection.php";
      include "../../functions/functions.php";

	session_start();
	$varsession = $_SESSION['user'];
	
	$sql = "SELECT nombre FROM usuarios where user = '$varsession'";
	mysqli_select_db('sirhal_web');
        $retval = mysqli_query($conn,$sql);
        while($fila = mysqli_fetch_array($retval)){
	  $nombre = $fila['nombre'];
	  
	  }
	  
	$sqla = "SELECT organismo FROM liquidadores where nombreApellido = '$nombre'";
	mysqli_select_db('sirhal_web');
	$valor = mysqli_query($sqla);
	while($row = mysqli_fetch_array($valor)){
	  $organismo = $row['organismo'];
	}
		
	$query = "SELECT cod_org from organismos where descripcion = '$organismo'";
	mysqli_select_db('sirhal_web');
	$res = mysqli_query($conn,$query);
	while($linea = mysqli_fetch_array($res)){
	  $cod = $linea['cod_org'];
	 
	}
	
	if($varsession == null || $varsession = ''){
	echo '<div class="alert alert-danger" role="alert">';
	echo "Usuario o Contraseña Incorrecta. Reintente Por Favor...";
	echo '<br>';
	echo "O no tiene permisos o no ha iniciado sesion...";
	echo "</div>";
	echo '<a href="../../index.html"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
	die();
	}

      if($conn){
      $id = $_GET['id'];
      $sql = "SELECT * FROM tb_lh2 WHERE id = '$id'";
      mysqli_select_db('sirhal_web');
      $resultado = mysqli_query($conn,$sql);
      $fila = mysqli_fetch_assoc($resultado);
      }else{
	echo '<div class="alert alert-danger" role="alert">';
	echo 'Could not Connect: ' . mysqli_error($conn);
	echo "</div>";
      }

?>


<html><head>
	<meta charset="utf-8">
	<title>LH2 Detalle de Haberes - Registro Actualizado</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../../icons/actions/im-skype.png" />
	<?php skeleton();?>
	
	
</head>
<body background="../../img/main-img.png" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center; background-size: cover; height: 100%">

<div class="container-fluid"><br>
      <div class="row">
      <div class="col-md-12 text-center">
	<button><span class="glyphicon glyphicon-user"></span> Usuario: <?php echo $nombre ?></button>
	<button><span class="glyphicon glyphicon-user"></span> Organismo: <?php echo $organismo ?></button>
	<?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-time"></span> <?php echo "Hora Actual: " . date("H:i"); ?></button>
	 <?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-calendar"></span> <?php echo "Fecha Actual: ". strftime("%d de %B del %Y"); ?> </button>
	</div>
	</div>
	</div>
	<br><hr>

    <div class="container">
    <div class="main">
    
    
    <?php
    
    if($conn){
		$id = mysqli_real_escape_string($conn,$_POST["id"]);
		$cod_arch = mysqli_real_escape_string($conn,$_POST["cod_arch"]);
		$nro_lote = mysqli_real_escape_string($conn,$_POST["nro_lote"]);
		$per_lote = mysqli_real_escape_string($conn,$_POST["per_lote"]);
		$cod_org = mysqli_real_escape_string($conn,$_POST["cod_org"]);
		$tipo_doc = mysqli_real_escape_string($conn,$_POST["tipo_doc"]);
		$nro_dni = mysqli_real_escape_string($conn,$_POST["nro_dni"]);
		$cod_esc = mysqli_real_escape_string($conn,$_POST["cod_esc"]);
		$cod_concepto = mysqli_real_escape_string($conn,$_POST["cod_concepto"]);
		$importe = mysqli_real_escape_string($conn,$_POST["importe"]);
		$tipo_uf = mysqli_real_escape_string($conn,$_POST["tipo_uf"]);
		$cant_uf = mysqli_real_escape_string($conn,$_POST["cant_uf"]);
		$per_liquidado = mysqli_real_escape_string($conn,$_POST["per_liquidado"]);
		
		
		$sqlInsert = "UPDATE tb_lh2 SET cod_inst='$cod_org', cod_arch='$cod_arch', nro_lote='$nro_lote', per_lote='$per_lote',
		tipo_doc='$tipo_doc', nro_doc='$nro_dni', cod_esc='$cod_esc', cod_concepto='$cod_concepto', importe='$importe', tipo_uf='$tipo_uf', cant_uf='$cant_uf', periodo='$per_liquidado' WHERE id = '$id'";
		
  			
mysqli_select_db('sirhal_web');
$q = mysqli_query($conn,$sqlInsert);

if(!$q)
{
	 echo '<div class="alert alert-danger" role="alert">';
         echo 'Could not enter data: ' . mysqli_error($conn);
         echo "</div>";
}

else
  {
    echo '<div class="alert alert-success" role="alert">';
    echo "Registro Actualizado Exitosamente!!";
    echo "</div>";
    echo '<hr> <a href="cargar_lh2.php"><input type="button" value="Volver" class="btn btn-primary"></a>';
}
}

else 
	//cerramos la conexion
	
	mysqli_close($conn);

	 	
	  	
    
    ?>
    </div>
    </div>




</body>
</html>
