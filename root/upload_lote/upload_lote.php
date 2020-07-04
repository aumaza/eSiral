<?php include "../../connection/connection.php";
      include "../../functions/functions.php";
      

	session_start();
	$varsession = $_SESSION['user'];
	
		
	if($varsession == null || $varsession = ''){
	echo '<div class="alert alert-danger" role="alert">';
	echo "Usuario o Contraseña Incorrecta. Reintente Por Favor...";
	echo '<br>';
	echo "O no tiene permisos o no ha iniciado sesion...";
	echo "</div>";
	echo '<a href="../../index.html"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
	die();
	}
	
	
	
	
	
?>

<html style="height: 100%"><head>
	<meta charset="utf-8">
	<title>Subir Lote</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../../icons/actions/im-skype.png" />
	<?php skeleton();?>
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
  
  <style>
.avatar {
  vertical-align: middle;
  horizontal-align: right;
  width: 60px;
  height: 60px;
  border-radius: 60%;
}
</style>
	
</head>
<body background="../../img/main-img.png" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center; background-size: cover; height: 100%">

  <!-- User Info -->
      <div class="container-fluid">
      <div class="row">
      <div class="col-md-12 text-center">
      <br>
	
	<button><span class="glyphicon glyphicon-user"></span> Usuario: <?php echo $_SESSION['user'] ?></button>
	<?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-time"></span> <?php echo "Hora Actual: " . date("H:i"); ?></button>
	 <?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-calendar"></span> <?php echo "Fecha Actual: ". strftime("%d de %B del %Y"); ?> </button>
	</div>
	</div>
	</div>
	<br><hr>
	<!-- End User Info -->
	
	
<body >
<div class="section"><br>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    
                    <div class="alert alert-success" role="alert">
                     <h1><strong><u>Importante</u>: </strong></h1>
                     <h3>Solo suba archivos con extensión SIR/CSV/TXT.</h3><hr>
                     <a href="lotes.php"><input type="button" value="Volver a Lotes" class="btn btn-primary"></a>
                    </div>
                    <hr>
                          
<form action="form_upload_lote.php" method="post" enctype="multipart/form-data">
	  <div class="row">
	    <div class="col-sm-12">
	      <div class="panel panel-default">
		<div class='panel-heading'>
		<strong>Seleccione los Archivos a Subir:</strong>
		<br>
	      <input type="file" name="files[]" multiple="" class="btn btn-default"><br>
	      <button type="submit" class="btn btn-warning navbar-btn" name="submit"><span class="glyphicon glyphicon-cloud-upload"></span> Subir</button>
	      
	    </form>
	  
	   </div>
	   
	    
     </div>
   </div>
</div>
</div>
</div>
</div>
</div>





</body>
</html>

