<?php  include "../functions/functions.php";
       include "../connection/connection.php";

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
	echo '<a href="../logout.php"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
	die();
	}
?>

<html style="height: 100%" lang="es"><head>
	<meta charset="utf-8">
	<title>Sirhal - Panel Usuario</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../icons/actions/im-skype.png" />
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
	
	
	<!-- Data Table Script -->
<script>

      $(document).ready(function(){
      $('#myTable').DataTable({
      "order": [[1, "asc"]],
      "language":{
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrada de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search": "Buscar:",
        "zeroRecords":    "No se encontraron registros coincidentes",
        "paginate": {
          "next":       "Siguiente",
          "previous":   "Anterior"
        },
      }
    });

  });

  </script>
  <!-- END Data Table Script -->
	
</head>
<body  background="../img/main-img.png" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center; background-size: cover; height: 100%">
<br>
<!--User and System Information -->
<div class="container-fluid">
      <div class="row">
      <div class="col-md-12 text-center">
	<a href="../logout.php"><button><span class="glyphicon glyphicon-log-out"></span> Salir</button></a>
	<button><span class="glyphicon glyphicon-user"></span> Usuario: <?php echo $nombre ?></button>
	<button><span class="glyphicon glyphicon-user"></span> Organismo: <?php echo $organismo ?></button>
	<?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-time"></span> <?php echo "Hora Actual: " . date("H:i"); ?></button>
	 <?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-calendar"></span> <?php echo "Fecha Actual: ". strftime("%d de %b de %Y"); ?> </button>
	</div>
	</div>
	</div><hr>
<!-- end user and system information -->


<div class="container-fluid">

<div class="row">
<div class="col-sm-12"><br>

<!-- Dashboard buttons -->
<div class="panel panel-primary">
  <div class="panel-body">

   <div class="btn-group btn-group-justified">
    <a href="upload_lote/lotes.php" class="btn btn-default"><span class="pull-center "><img src="../icons/places/server-database.png"  class="img-reponsive img-rounded"> Lotes</a>
    <div class="btn-group btn-group-justified">
    <button type="button" class="btn btn-default"><img src="../icons/actions/svn-update.png"  class="img-reponsive img-rounded"> Cargar Lotes </button>
    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu">
    <li><a href="cargar_dp/cargar_dp.php" class="btn btn-default"><span class="pull-center "><img src="../icons/actions/address-book-new.png"  class="img-reponsive img-rounded"> Cargar DP (Datos de Personas)</a></li>
    <li><a href="cargar_ch/cargar_ch.php" class="btn btn-default"><span class="pull-center "><img src="../icons/actions/address-book-new.png"  class="img-reponsive img-rounded"> Cargar CH (Cabezal de Haberes)</a></li>
    <li><a href="cargar_lh1/cargar_lh1.php" class="btn btn-default"><span class="pull-center "><img src="../icons/actions/address-book-new.png"  class="img-reponsive img-rounded"> Cargar LH1 (Listado de Haberes)</a></li>
    <li><a href="cargar_lh2/cargar_lh2.php" class="btn btn-default"><span class="pull-center "><img src="../icons/actions/address-book-new.png"  class="img-reponsive img-rounded"> Cargar LH2 (Listado de Haberes)</a></li>
    </ul>
  </div>
    <a href="#" class="btn btn-default"><span class="pull-center "><img src="../icons/actions/games-solve.png"  class="img-reponsive img-rounded"> Procesar Lotes</a>
    <a href="datos_personales/datos_personales.php" class="btn btn-default"><span class="pull-center "><img src="../icons/apps/preferences-contact-list.png"  class="img-reponsive img-rounded"> Mis Datos</a>
</div>
    
   
  
  </div>
  </div>
  </div><hr>
<!-- end dashboard buttons -->

</div>



</div>

</div>


</body>
</html>