<?php  include "../functions/functions.php";
       include "../connection/connection.php";

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
	
	
	
	$ql = "select file_name, user_name, upload_on from files_ok where cod_org = '$cod' order by upload_on desc limit 1";
	mysqli_select_db('sirhal_web');
	$resval = mysqli_query($conn,$ql);
	while($row = mysqli_fetch_array($resval)){
	  $archivo = $row['file_name'];
	  $user = $row['user_name'];
	  $fecha = $row['upload_on'];
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
   <title>eSiral - Panel Usuario</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../icons/actions/im-skype.png" />
	
	<?php skeleton(); ?>
	
	
	<!-- Data Table Script -->
<script>
 $(document).ready(function(){
      $('#myTable').DataTable({
      "order": [[1, "asc"]],
      "responsive": true,
      "scrollY":        "300px",
        "scrollX":        true,
        "scrollCollapse": true,
        "paging":         true,
        "fixedColumns": true,
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
<body  background="../img/main-img.png" class="img-fluid" alt="Responsive image" style="background-repeat: repeat; background-position: center center; background-size: cover; height: 100%">
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
  <a href="upload_lote/lotes.php" class="list-group-item"><span class="pull-center "><img src="../icons/actions/svn-commit.png"  class="img-reponsive img-rounded"> Subida de Lotes</a>
  <a href="#" class="list-group-item"><img src="../icons/actions/games-solve.png"  class="img-reponsive img-rounded"> Proceso y Análisis de Lotes</a>
  <a href="datos_personales/datos_personales.php" class="list-group-item"><span class="pull-center "><img src="../icons/apps/preferences-contact-list.png"  class="img-reponsive img-rounded"> Mis Datos</a>
  </div>
  
   <div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse1"><img src="../icons/actions/svn-update.png"  class="img-reponsive img-rounded"> Carga Manual de Lotes</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse">
      <ul class="list-group">
        <a href="cargar_dp/cargar_dp.php" class="list-group-item"><li class="list-group-item"><img src="../icons/actions/address-book-new.png"  class="img-reponsive img-rounded"> DP (Datos de Personas)</li></a>
        <a href="cargar_ch/cargar_ch.php" class="list-group-item"><li class="list-group-item"><img src="../icons/actions/address-book-new.png"  class="img-reponsive img-rounded"> CH (Concepto de Haberes)</li></a>
        <a href="cargar_lh1/cargar_lh1.php" class="list-group-item"><li class="list-group-item"><img src="../icons/actions/address-book-new.png"  class="img-reponsive img-rounded"> LH1 (Cabezal de Haberes)</li></a>
        <a href="cargar_lh2/cargar_lh2.php" class="list-group-item"><li class="list-group-item"><img src="../icons/actions/address-book-new.png"  class="img-reponsive img-rounded"> LH2 (Detalle de Haberes)</li></a>
      </ul>
     </div>
   </div>
   
   <div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse2"><img src="../icons/apps/accessories-dictionary.png"  class="img-reponsive img-rounded"> Documentación</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <ul class="list-group">
        <a href="doc_download/download_res.php?file_name=res24-2004-sirhu.pdf" class="list-group-item"><li class="list-group-item"><img src="../icons/apps/acroread.png"  class="img-reponsive img-rounded"> Resolución 24/2004</li></a>
        <a href="doc_download/download_res.php?file_name=res_conj_26-2019.pdf" class="list-group-item"><li class="list-group-item"><img src="../icons/apps/acroread.png"  class="img-reponsive img-rounded"> Res. Conjunta 26/2019</li></a>
        <a href="doc_download/download_res.php?file_name=dec_645-1995.pdf" class="list-group-item"><li class="list-group-item"><img src="../icons/apps/acroread.png"  class="img-reponsive img-rounded"> Decreto 645/1995</li></a>
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