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
	<title>LH1 - Registro Guardado</title>
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
		createTableLH1($conn);
		
		$cod_arch = mysqli_real_escape_string($conn,$_POST["cod_arch"]); // char
		$nro_lote = mysqli_real_escape_string($conn,$_POST["nro_lote"]); // int
		$per_lote = mysqli_real_escape_string($conn,$_POST["per_lote"]); // int
		$cod_org = mysqli_real_escape_string($conn,$_POST["cod_org"]); // char
		$tipo_doc = mysqli_real_escape_string($conn,$_POST["tip_doc"]); // char
		$nro_dni = mysqli_real_escape_string($conn,$_POST["nro_dni"]); // int
		$cod_esc = mysqli_real_escape_string($conn,$_POST["cod_esc"]); // int
		$cod_agrup = mysqli_real_escape_string($conn,$_POST["cod_agrup"]); // char
		$cod_nivel = mysqli_real_escape_string($conn,$_POST["cod_nivel"]); // char
		$cod_grado = mysqli_real_escape_string($conn,$_POST["cod_grado"]); // char
		$cod_uni = mysqli_real_escape_string($conn,$_POST["cod_uni"]); // char
		$cod_jur = mysqli_real_escape_string($conn,$_POST["cod_jur"]); // char
		$cod_subjur = mysqli_real_escape_string($conn,$_POST["cod_subjur"]); // char
		$cod_entidad = mysqli_real_escape_string($conn,$_POST["cod_entidad"]); // char
		$cod_prog = mysqli_real_escape_string($conn,$_POST["cod_prog"]); // char
		$cod_subprog = mysqli_real_escape_string($conn,$_POST["cod_subprog"]); // char
		$cod_proy = mysqli_real_escape_string($conn,$_POST["cod_proy"]); // char
		$cod_act = mysqli_real_escape_string($conn,$_POST["cod_act"]); // char
		$cod_geo = mysqli_real_escape_string($conn,$_POST["cod_geo"]); // char
		$periodo = mysqli_real_escape_string($conn,$_POST["periodo"]); // int
		$cod_planta = mysqli_real_escape_string($conn,$_POST["cod_planta"]); // char
		$f_ing = mysqli_real_escape_string($conn,$_POST["f_ing"]); // date
		$cod_ff = mysqli_real_escape_string($conn,$_POST["cod_ff"]); // int
		$cod_est = mysqli_real_escape_string($conn,$_POST["cod_estado"]); // char
		
		
				
		 $sqlInsert = "INSERT INTO tb_lh1 ".
		  "(cod_inst,cod_arch,nro_lote,per_lote,tipo_doc,nro_doc,cod_esc,cod_agrup,cod_nivel,cod_grado,cod_uni,cod_jur,cod_subjur,cod_entidad,cod_prog,cod_subprog,cod_proy,cod_act,cod_geo,periodo,tipo_planta,f_ing,cod_fin,marca_estado)".
		  "VALUES ".
		  "('$cod_org','$cod_arch','$nro_lote','$per_lote','$tipo_doc','$nro_dni','$cod_esc','$cod_agrup','$cod_nivel','$cod_grado','$cod_uni','$cod_jur','$cod_subjur','$cod_entidad','$cod_prog','$cod_subprog','$cod_proy','$cod_act','$cod_geo','$periodo','$cod_planta','$f_ing','$cod_ff','$cod_est')";
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
			      echo '<hr> <a href="cargar_lh1.php"><input type="button" value="Volver" class="btn btn-primary"></a>';
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

