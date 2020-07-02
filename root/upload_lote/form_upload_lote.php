<html><head>
	<meta charset="utf-8">
	<title>Subir Lote</title>
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
	<script src="/eSiral/js/dataTables.select.min.js"></script>
	<script src="/eSiral/skeleton/js/dataTables.buttons.min.js"></script>

	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet"  type="text/css" media="screen" href="login.css" />
	
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

<div class="section"><br>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

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
      	
	if($varsession == null || $varsession = ''){
	echo '<div class="alert alert-danger" role="alert">';
	echo "Usuario o Contraseña Incorrecta. Reintente Por Favor...";
	echo '<br>';
	echo "O no tiene permisos o no ha iniciado sesion...";
	echo "</div>";
	echo '<a href="../../index.html"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
	die();
	}
	
	 create_table_files();

	
	
$statusMsg = '';
foreach($_FILES["files"]["tmp_name"] as $key => $tmp_name){
// File upload path
$targetDir = '../../uploads/files/';
$fileName = basename($_FILES["files"]["name"][$key]);
$targetFilePath = $targetDir . $fileName;

$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["files"]["name"][$key])){
    // Allow certain file formats
    $allowTypes = array('SIR','csv','txt','sir');
    
    if(in_array($fileType, $allowTypes)){
    
        // Upload file to server
        if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
           
            
            // Insert image file name into database
           
           $sqlInsert = "INSERT INTO files ".
			  "(file_name,upload_on,user_name,path_folder)".
			  "VALUES ".
			  "('$fileName', NOW(),'$nombre','$targetDir')";

			  mysqli_select_db('sirhal_web');
			  $insert = mysqli_query($conn,$sqlInsert);
          
            if($insert){
            
			  echo '<div class="alert alert-success" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img src="../../img/success-img.png" alt="Avatar" class="avatar" ><strong> Base de Datos Actualizada. El Archivo '.$fileName. ' se ha subido correctamente..</strong>';
                          echo "</div><hr>";
                          echo '<div class="alert alert-success" role="alert">';
                          echo "<a href='../main.php'><button class='btn btn-warning navbar-btn'><span class='glyphicon glyphicon-chevron-left'></span> Volver</button></a>";
                          echo "</div><hr>";
             }else{
	      
			  echo '<div class="alert alert-success" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img src="../../img/success-img.png" alt="Avatar" class="avatar" ><strong>El Archivo '.$fileName. ' se ha subido correctamente.</strong>';
                          echo "</div><hr>";
                          echo '<div class="alert alert-success" role="alert">';
                          echo "<a href='../main.php'><button class='btn btn-warning navbar-btn'><span class='glyphicon glyphicon-chevron-left'></span> Volver</button></a>";
                          echo "</div><hr>";
               }

        }else{
        
			  echo '<div class="alert alert-warning" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img src="../../img/think-img.png" alt="Avatar" class="avatar" ><strong> Ups. Hubo un error subiendo el Archivo.</strong>';
                          echo "</div><hr>";
                          echo '<div class="alert alert-success" role="alert">';
                          echo "<a href='../main.php'><button class='btn btn-warning navbar-btn'><span class='glyphicon glyphicon-chevron-left'></span> Volver</button></a>";
                          echo "</div><hr>";
            }
        
    }else{
        
			  echo '<div class="alert alert-danger" role="alert">';
			  echo '<h1 class="panel-title text-left" contenteditable="true"><img src="../../img/aircraft-crash64-img.png" alt="Avatar" class="avatar" ><strong> Ups, solo archivos con extensión: SIR, CSV, TXT son soportados.</strong>';
			  echo "</div><hr>";
                          echo '<div class="alert alert-success" role="alert">';
                          echo "<a href='../main.php'><button class='btn btn-warning navbar-btn'><span class='glyphicon glyphicon-chevron-left'></span> Volver</button></a>";
                          echo "</div><hr>";
	} 
    
}else{
    
			  echo '<div class="alert alert-info" role="alert">';
                          echo '<h1 class="panel-title text-left" contenteditable="true"><img src="../../img/refresh-img.png" alt="Avatar" class="avatar" ><strong> Por favor, seleccione al archivo a subir.</strong>';
                          echo "</div><hr>";
                          echo '<div class="alert alert-success" role="alert">';
                          echo "<a href='../main.php'><button class='btn btn-warning navbar-btn'><span class='glyphicon glyphicon-chevron-left'></span> Volver</button></a>";
                          echo "</div><hr>";
   
}

}

// Display status message
echo $statusMsg;

?>


</div>
</div>
</div>
</div>
</body>
</html>