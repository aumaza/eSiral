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
      $sql = "SELECT * FROM tb_lh1 WHERE id = '$id'";
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
	<title>Datos Actualizados</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../../icons/actions/im-skype.png" />
	<?php skeleton(); ?>
	
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
		$id = mysqli_real_escape_string($_POST["id"], $conn);
		$cod_arch = mysqli_real_escape_string($conn,$_POST["cod_arch"]);
		$nro_lote = mysqli_real_escape_string($conn,$_POST["nro_lote"]);
		$per_lote = mysqli_real_escape_string($conn,$_POST["per_lote"]);
		$cod_org = mysqli_real_escape_string($conn,$_POST["cod_org"]);
		$tipo_doc = mysqli_real_escape_string($conn,$_POST["tip_doc"]);
		$nro_dni = mysqli_real_escape_string($conn,$_POST["nro_dni"]);
		$cod_esc = mysqli_real_escape_string($conn,$_POST["cod_esc"]);
		$cod_agrup = mysqli_real_escape_string($conn,$_POST["cod_agrup"]);
		$cod_nivel = mysqli_real_escape_string($conn,$_POST["cod_nivel"]);
		$cod_grado = mysqli_real_escape_string($conn,$_POST["cod_grado"]);
		$cod_uni = mysqli_real_escape_string($conn,$_POST["cod_uni"]);
		$cod_jur = mysqli_real_escape_string($conn,$_POST["cod_jur"]);
		$cod_subjur = mysqli_real_escape_string($conn,$_POST["cod_subjur"]);
		$cod_entidad = mysqli_real_escape_string($conn,$_POST["cod_entidad"]);
		$cod_prog = mysqli_real_escape_string($conn,$_POST["cod_prog"]);
		$cod_subprog = mysqli_real_escape_string($conn,$_POST["cod_subprog"]);
		$cod_proy = mysqli_real_escape_string($conn,$_POST["cod_proy"]);
		$cod_act = mysqli_real_escape_string($conn,$_POST["cod_act"]);
		$cod_geo = mysqli_real_escape_string($conn,$_POST["cod_geo"]);
		$periodo = mysqli_real_escape_string($conn,$_POST["periodo"]);
		$cod_planta = mysqli_real_escape_string($conn,$_POST["cod_planta"]);
		$f_ing = mysqli_real_escape_string($conn,$_POST["f_ing"]);
		$cod_ff = mysqli_real_escape_string($conn,$_POST["cod_ff"]);
		$cod_est = mysqli_real_escape_string($conn,$_POST["cod_estado"]);
		
		
		$sqlInsert = "UPDATE tb_lh1 SET cod_inst='$cod_org', cod_arch='$cod_arch', nro_lote='$nro_lote', per_lote='$per_lote',
		tipo_doc='$tipo_doc', nro_doc='$nro_dni', cod_esc='$cod_esc', cod_agrup='$cod_agrup', cod_nivel='$cod_nivel', cod_grado='$cod_grado',
		cod_uni='$cod_uni', cod_jur='$cod_jur', cod_subjur='$cod_subjur', cod_entidad='$cod_entidad', cod_prog='$cod_prog',
		cod_subprog='$cod_subprog', cod_proy='$cod_proy', cod_act='$cod_act', cod_geo='$cod_geo', periodo='$periodo',
		tipo_planta='$cod_planta', f_ing='$f_ing', cod_fin='$cod_ff', marca_estado='$cod_est' WHERE id = '$id'";
		
  			
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
    echo '<hr> <a href="cargar_lh1.php"><input type="button" value="Volver" class="btn btn-primary"></a>';
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
