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
	
	if($varsession == null || $varsession = ''){
	echo '<div class="alert alert-danger" role="alert">';
	echo "Usuario o Contraseña Incorrecta. Reintente Por Favor...";
	echo '<br>';
	echo "O no tiene permisos o no ha iniciado sesion...";
	echo "</div>";
	echo '<a href="../../index.html"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
	die();
	}

	$background = 'background="../../img/main-img.png" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center; background-size: cover; height: 100%"';
?>

<html><head>
	<meta charset="utf-8">
	<title>LH2 Detalle de Haberes - Registro Guardado</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../../icons/actions/im-skype.png" />
	<?php skeleton();?>
	
	<!-- block mouse left-button   -->
  <script>
      $(document).bind("contextmenu",function(e) {
    e.preventDefault();
    });
  </script>
<!-- block F12 development mode -->
  <script>
      $(document).keydown(function(e){
	if(e.which === 123){
	  return false;
	}
    });
  </script>
	
</head>
<body <?php echo $background ?>>

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
                <div class="row">
                    <div class="col-md-12">
                        

<?php

      if($conn){
		createTableLH2($conn);
		
		$cod_arch = mysqli_real_escape_string($conn,$_POST["cod_arch"]); // char
		$nro_lote = mysqli_real_escape_string($conn,$_POST["nro_lote"]); // int
		$per_lote = mysqli_real_escape_string($conn,$_POST["per_lote"]); // int
		$cod_org = mysqli_real_escape_string($conn,$_POST["cod_org"]); // char
		$tipo_doc = mysqli_real_escape_string($conn,$_POST["tipo_doc"]); // char
		$nro_dni = mysqli_real_escape_string($conn,$_POST["nro_dni"]); // int
		$cod_esc = mysqli_real_escape_string($conn,$_POST["cod_esc"]); // int
		$cod_concepto = mysqli_real_escape_string($conn,$_POST["cod_concepto"]); // int
		$importe = mysqli_real_escape_string($conn,$_POST["importe"]); //float
		$tipo_uf = mysqli_real_escape_string($conn,$_POST["tipo_uf"]); // int
		$cant_uf = mysqli_real_escape_string($conn,$_POST["cant_uf"]); // int
		$per_liquidado = mysqli_real_escape_string($conn,$_POST["per_liquidado"]); //int
		
		
		
		 $sqlInsert = "INSERT INTO tb_lh2 ".
		  "(cod_inst,cod_arch,nro_lote,per_lote,tipo_doc,nro_doc,cod_esc,cod_concepto,importe,tipo_uf,cant_uf,periodo)".
		  "VALUES ".
		  "('$cod_org','$cod_arch','$nro_lote','$per_lote','$tipo_doc','$nro_dni','$cod_esc','$cod_concepto','$importe','$tipo_uf','$cant_uf','$per_liquidado')";
		  $q = mysqli_query($conn,$sqlInsert);
		  
		  
		  
		  if(!$q){
 
			echo '<div class="alert alert-danger" role="alert">';
			echo 'Could not enter data: ' . mysqli_error($conn);
			echo "</div>";
			echo '<hr> <a href="nuevoRegistro.php"><input type="button" value="Volver" class="btn btn-primary"></a>'; 
			}else{
   
			      echo '<div class="alert alert-success" role="alert">';
			      echo "Registro Guardado Exitosamente!!";
			      echo "</div>";
			      echo '<hr> <a href="cargar_lh2.php"><input type="button" value="Volver" class="btn btn-primary"></a>';
			      } 
		    
		
		    }else{
			  echo '<div class="alert alert-danger" role="alert">';
			  echo 'Could not Connect to Database: ' . mysqli_error($conn);
			  echo "</div>";
			 }

	//cerramos la conexion
	
	mysqli_close($conn);

    
?>
</div>
</div>
</div>




</body>
</html>

