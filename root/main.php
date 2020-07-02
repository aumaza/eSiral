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
<body  background="../img/main-img.png" class="img-fluid" alt="Responsive image" style="background-repeat: repeat; background-position: center center; background-size: cover; height: 100%">
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



<!-- marco general -->
<div class="container-fluid">
<div class="row">
<div class="col-xs-12"><br>

<!-- Menu principal -->

<div class="col-xs-2">
<div class="panel panel-default" >
  <div class="panel-heading">
    <h2 class="panel-title text-center text-default "><li class="list-group-item"><img src="../icons/actions/dashboard-show.png"  class="img-reponsive img-rounded"> Menú Principal</h2>
    </div>
        
<div class="list-group">
  <a href="organismos/organismos.php" class="list-group-item"><span class="pull-center "><img src="../icons/actions/view-bank.png"  class="img-reponsive img-rounded"> Alta de Organismos</a>
  <a href="upload_lote/lotes.php" class="list-group-item"><span class="pull-center "><img src="../icons/places/server-database.png"  class="img-reponsive img-rounded"> Lotes Subidos</a>
  <a href="upload_lote/lotes_ok.php" class="list-group-item"><span class="pull-center "><img src="../icons/places/server-database.png"  class="img-reponsive img-rounded"> Lotes Generados Manualmente</a>
  <a href="procesar_lotes/procesar_lote.php" class="list-group-item"><span class="pull-center "><img src="../icons/actions/games-solve.png"  class="img-reponsive img-rounded"> Procesar Lotes Subidos</a>
  <a href="liquidadores/liquidadores.php" class="list-group-item"><span class="pull-center "><img src="../icons/actions/meeting-attending.png"  class="img-reponsive img-rounded"> Datos Liquidadores</a>
  <a href="users/users.php" class="list-group-item"><span class="pull-center "><img src="../icons/actions/user-group-properties.png"  class="img-reponsive img-rounded"> Administración de Usuarios</a>
  </div>
  
   <div class="panel-group">
  
   
   <div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse2"><img src="../icons/apps/accessories-dictionary.png"  class="img-reponsive img-rounded"> Documentación</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <ul class="list-group">
        <a href="../1/doc_download/download_res.php?file_name=res24-2004-sirhu.pdf" class="list-group-item"><li class="list-group-item"><img src="../icons/apps/acroread.png"  class="img-reponsive img-rounded"> Resolución 24/2004</li></a>
        <a href="../1/doc_download/download_res.php?file_name=res_conj_26-2019.pdf" class="list-group-item"><li class="list-group-item"><img src="../icons/apps/acroread.png"  class="img-reponsive img-rounded"> Res. Conjunta 26/2019</li></a>
        <a href="../1/doc_download/download_res.php?file_name=dec_645-1995.pdf" class="list-group-item"><li class="list-group-item"><img src="../icons/apps/acroread.png"  class="img-reponsive img-rounded"> Decreto 645/1995</li></a>
        <a href="#" class="list-group-item"><li class="list-group-item"><img src="../icons/apps/acroread.png"  class="img-reponsive img-rounded"> Manual del Usuario</li></a>
        </ul>
     </div>
   </div>
   
   
   
</div> 
  
</div></div></div>
<!--En Menu Principal  -->

<!-- menu informacion -->
<div class="col-xs-10">
<div class="panel panel-default" >
  <div class="panel-heading">
    <h2 class="panel-title text-center text-default "><li class="list-group-item"><img src="../icons/status/dialog-information.png"  class="img-reponsive img-rounded"> Información</h2>
    </div>
     <div class="panel-body">
      <div class="alert alert-success" role="alert">
      <p><img src="../icons/status/task-attempt.png"  class="img-reponsive img-rounded"> No olvide que la fecha límite para cargar lotes en el sistema SIRHU es hasta el 10 de cada mes</p>
     </div><br>
     <div class="alert alert-success" role="alert">
      <p><img src="../icons/categories/system-help.png"  class="img-reponsive img-rounded"> Ante cualquier duda consulte el "Manual del Usuario" o la normativa vigente publicada en el apartado "Documentación"</p>
     </div>
     </div><hr>
<!-- end menu informacion -->

<!-- menu informacion -->

<div class="col-xs-14"><br>
<div class="panel panel-default" >
  <div class="panel-heading">
    <h2 class="panel-title text-center text-default "><li class="list-group-item"><img src="../icons/actions/view-statistics.png"  class="img-reponsive img-rounded"> Informes Estadísticos</h2>
    </div>
     <div class="panel-body">
      <div class="alert alert-success" role="alert">
      <p><img src="../icons/actions/view-calendar-month.png"  class="img-reponsive img-rounded"> <strong>Ultimo Lote Generado</strong></p><hr>
      <p><strong>Archivo:</strong> <?php echo $archivo; ?></p>
      <p><strong>Usuario:</strong> <?php echo $user; ?></p>
      <p><strong>Fecha:</strong> <?php echo $fecha; ?></p>
     </div><br>
     <div class="alert alert-success" role="alert">
      <p><img src="../icons/categories/system-help.png"  class="img-reponsive img-rounded"> Ante cualquier duda consulte el "Manual del Usuario" o la normativa vigente publicada en el apartado "Documentación"</p>
     </div>
     </div>
     </div>
     </div>
     
     
<!-- end menu informacion -->
    


</div>
</div>
</div>
<!-- End marco general -->


</body>
</html>