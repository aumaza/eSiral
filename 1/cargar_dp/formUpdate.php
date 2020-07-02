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
	$valor = mysqli_query($conn,$sqla);
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
      $sql = "SELECT * FROM tb_dp WHERE id = '$id'";
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
	<title>DP Datos de Personal - Registro Actualizado</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../../icons/actions/im-skype.png" />
	<link rel="stylesheet" href="/eSiral/skeleton/css/bootstrap.min.css" >
	<link rel="stylesheet" href="/eSiral/skeleton/css/bootstrap-theme.css" >
	<link rel="stylesheet" href="/eSiral/skeleton/css/bootstrap-theme.min.css" >
	<link rel="stylesheet" href="/eSiral/skeleton/css/fontawesome.css">
	<link rel="stylesheet" href="/eSiral/skeleton/css/fontawesome.min.css" >
	<link rel="stylesheet" href="/eSiral/skeleton/css/jquery.dataTables.min.css" >

	<script src="/eSiral/skeleton/js/jquery-3.4.1.min.js"></script>
	<script src="/eSiral/skeleton/js/bootstrap.min.js"></script>
		
	<script src="/eSiral/skeleton/js/jquery.dataTables.min.js"></script>
	<script src="/eSiral/skeleton/js/dataTables.editor.min.js"></script>
	<script src="/eSiral/skeleton/js/dataTables.select.min.js"></script>
	<script src="/eSiral/skeleton/js/dataTables.buttons.min.js"></script>

	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet"  type="text/css" media="screen" href="login.css" />
	
	
	
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
		$tip_doc = mysqli_real_escape_string($conn,$_POST["tip_doc"]);
		$nro_dni = mysqli_real_escape_string($conn,$_POST["nro_dni"]);
		$nombre = mysqli_real_escape_string($conn,$_POST["nombre"]);
		$nombre = strtoupper($nombre);
		$f_nac = mysqli_real_escape_string($conn,$_POST["f_nac"]);
		$sexo = mysqli_real_escape_string($conn,$_POST["sexo"]);
		$cod_est_civ = mysqli_real_escape_string($conn,$_POST["cod_est_civ"]);
		$cod_inst = mysqli_real_escape_string($conn,$_POST["cod_org"]);
		$f_ing = mysqli_real_escape_string($conn,$_POST["f_ing"]);
		$cod_nac = mysqli_real_escape_string($conn,$_POST["cod_nac"]);
		$cod_niv_edu = mysqli_real_escape_string($conn,$_POST["cod_niv_edu"]);
		$desc_tit = mysqli_real_escape_string($conn,$_POST["desc_tit"]);
		$desc_tit = strtoupper($desc_tit);
		$cuit_cuil = mysqli_real_escape_string($conn,$_POST["cuit_cuil"]);
		$sist_prev = mysqli_real_escape_string($conn,$_POST["sist_prev"]);
		$cod_sist_prev = mysqli_real_escape_string($conn,$_POST["cod_sist_prev"]);
		$cod_ob_soc = mysqli_real_escape_string($conn,$_POST["cod_ob_soc"]);
		$nro_afi = mysqli_real_escape_string($conn,$_POST["nro_afi"]);
		$tip_hor = mysqli_real_escape_string($conn,$_POST["tip_hor"]);
	
			
		$sqlInsert = "UPDATE tb_dp SET cod_arch='$cod_arch',nro_lote='$nro_lote',per_lote='$per_lote',tipo_dni='$tip_doc',nro_dni='$nro_dni',
		nombreApellido='$nombre',f_nac='$f_nac',cod_sexo='$sexo',cod_est_civ='$cod_est_civ',cod_inst='$cod_inst',f_ing='$f_ing',
		cod_nac='$cod_nac',cod_niv_edu='$cod_niv_edu',desc_tit='$desc_tit',cuil_cuit='$cuit_cuil',sist_prev='$sist_prev',
		cod_sist_prev='$cod_sist_prev',cod_ob_soc='$cod_ob_soc',nro_afi='$nro_afi',tip_hor='$tip_hor' WHERE id = '$id'";
		
  			
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
    echo '<hr> <a href="cargar_dp.php"><input type="button" value="Volver a Cargar DP" class="btn btn-primary"></a>';
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
