<?php include "../../connection/connection.php";
      include "../../functions/functions.php";

session_start();
	$varsession = $_SESSION['user'];
	
	$sql = "SELECT nombre FROM usuarios where user = '$varsession'";
	mysql_select_db('sirhal_web');
        $retval = mysql_query($sql);
        
        while($fila = mysql_fetch_array($retval)){
	  $nombre = $fila['nombre'];
	  
	  }
	  
	$sqla = "SELECT organismo FROM liquidadores where nombreApellido = '$nombre'";
	mysql_select_db('sirhal_web');
	$valor = mysql_query($sqla);
	while($row = mysql_fetch_array($valor)){
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
		createTableLH1();
		
		$cod_arch = mysql_real_escape_string($_POST["cod_arch"], $conn);
		$nro_lote = mysql_real_escape_string($_POST["nro_lote"], $conn);
		$per_lote = mysql_real_escape_string($_POST["per_lote"], $conn);
		$cod_org = mysql_real_escape_string($_POST["cod_org"], $conn);
		$tipo_doc = mysql_real_escape_string($_POST["tip_doc"], $conn);
		$nro_dni = mysql_real_escape_string($_POST["nro_dni"], $conn);
		$cod_esc = mysql_real_escape_string($_POST["cod_esc"], $conn);
		$cod_agrup = mysql_real_escape_string($_POST["cod_agrup"], $conn);
		$cod_nivel = mysql_real_escape_string($_POST["cod_nivel"], $conn);
		$cod_grado = mysql_real_escape_string($_POST["cod_grado"], $conn);
		$cod_uni = mysql_real_escape_string($_POST["cod_uni"], $conn);
		$cod_jur = mysql_real_escape_string($_POST["cod_jur"], $conn);
		$cod_subjur = mysql_real_escape_string($_POST["cod_subjur"], $conn);
		$cod_entidad = mysql_real_escape_string($_POST["cod_entidad"], $conn);
		$cod_prog = mysql_real_escape_string($_POST["cod_prog"], $conn);
		$cod_subprog = mysql_real_escape_string($_POST["cod_subprog"], $conn);
		$cod_proy = mysql_real_escape_string($_POST["cod_proy"], $conn);
		$cod_act = mysql_real_escape_string($_POST["cod_act"], $conn);
		$cod_geo = mysql_real_escape_string($_POST["cod_geo"], $conn);
		$periodo = mysql_real_escape_string($_POST["periodo"], $conn);
		$cod_planta = mysql_real_escape_string($_POST["cod_planta"], $conn);
		$f_ing = mysql_real_escape_string($_POST["f_ing"], $conn);
		$cod_ff = mysql_real_escape_string($_POST["cod_ff"], $conn);
		$cod_est = mysql_real_escape_string($_POST["cod_estado"], $conn);
		
		
		
		$integer = array($nro_lote, $per_lote,$nro_dni);
		
		
		foreach($integer as $elementos){
		if(!is_numeric($elementos)){
		
		  echo '<div class="alert alert-danger" role="alert">';
		  echo  "Ha introducido datos erroneos: " .$elementos. " Verifíquelos";
		  echo "</div>";
		
		}
		}
		
		 $sqlInsert = "INSERT INTO tb_lh1 ".
		  "(cod_inst,cod_arch,nro_lote,per_lote,tipo_doc,nro_doc,cod_esc,cod_agrup,cod_nivel,cod_grado,cod_uni,cod_jur,cod_subjur,cod_entidad,cod_prog,cod_subprog,cod_proy,cod_act,cod_geo,periodo,tipo_planta,f_ing,cod_fin,marca_estado)".
		  "VALUES ".
		  "('$cod_org','$cod_arch','$nro_lote','$per_lote','$tipo_doc','$nro_dni','$cod_esc','$cod_agrup','$cod_nivel','$cod_grado','$cod_uni','$cod_jur','$cod_subjur','$cod_entidad','$cod_prog','$cod_subprog','$cod_proy','$cod_act','$cod_geo','$periodo','$cod_planta','$f_ing','$cod_ff','$cod_est')";
		  $q = mysql_query($sqlInsert,$conn);
		  
		  
		  
		  if(!$q){
 
			echo '<div class="alert alert-danger" role="alert">';
			echo 'Could not enter data: ' . mysql_error();
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
			  echo 'Could not Connect to Database: ' . mysql_error();
			  echo "</div>";
			 }

	//cerramos la conexion
	
	mysql_close($conn);

    
?>
</div>
</div>
</div>




</body>
</html>

