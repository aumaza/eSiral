<?php
      include "../../connection/connection.php";
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
	
	
	$lotes = (isset($_POST['lote'])) ? $_POST['lote'] : array(); 
	$zipname = 'lotes.zip';
	$Zip = new ZipArchive;
	$Zip->open($zipname, ZipArchive::CREATE);
	
	if (count($lotes) > 0) {
	
	foreach ($lotes as $lote) {
	  $archivos = basename($lote);
	  $file = '../../uploads/files_ok/'.$archivos;
	  $Zip->addFile($file);
	
	}
	}else{
	
	    echo '<script>
		  alert("No ha seleccionado Lotes");
		  </script>';
	}
	$Zip->close();
  
	header('Content-Type: application/force-download');
	header('Content-Disposition: attachment; filename='.$zipname);
	header('Content-Transfer-Encoding: binary');
	header('Content-Length: '.filesize($zipname));

	readfile($zipname);

?>