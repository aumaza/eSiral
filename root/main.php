<?php  include "../functions/functions.php";
       include "../connection/connection.php";

	session_start();
	$varsession = $_SESSION['user'];
	
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
	<title>Sirhal - Panel Administrador</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../img/img-favicon32x32.png" />
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
	<button><span class="glyphicon glyphicon-user"></span> Usuario: <?php echo $_SESSION['user'] ?></button>
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
    <a href="organismos/organismos.php" class="btn btn-default"><span class="pull-center "><img src="../icons/actions/view-bank.png"  class="img-reponsive img-rounded"> Cargar Organismos</a>
    <a href="#" class="btn btn-default"><span class="pull-center "><img src="../icons/actions/view-expenses-categories.png"  class="img-reponsive img-rounded"> Sumarias</a>
    <a href="#" class="btn btn-default"><span class="pull-center "><img src="../icons/actions/svn-commit.png"  class="img-reponsive img-rounded"> Cargar Lote</a>
    <a href="#" class="btn btn-default"><span class="pull-center "><img src="../icons/actions/svn-update.png"  class="img-reponsive img-rounded"> Descargar Lote</a>
    <a href="liquidadores/liquidadores.php" class="btn btn-default"><span class="pull-center "><img src="../icons/actions/meeting-attending.png"  class="img-reponsive img-rounded"> Datos Liquidadores</a>
    <a href="users/users.php" class="btn btn-default"><span class="pull-center "><img src="../icons/actions/user-group-properties.png"  class="img-reponsive img-rounded"> Usuarios</a>
    
  
  </div>
  </div>
  </div><hr>
<!-- end dashboard buttons -->

</div>



</div>

</div>


</body>
</html>