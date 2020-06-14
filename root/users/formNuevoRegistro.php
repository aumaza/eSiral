<?php  include "../../functions/functions.php";
       include "../../connection/connection.php"; 

	session_start();
	$varsession = $_SESSION['user'];
	
	if($varsession == null || $varsession = ''){
	echo '<div class="alert alert-danger" role="alert">';
	echo "Usuario o Contraseña Incorrecta. Reintente Por Favor...";
	echo '<br>';
	echo "O no tiene permisos o no ha iniciado sesion...";
	echo "</div>";
	echo '<a href="../index.html"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
	die();
	}



?>


<html><head>
	<meta charset="utf-8">
	<title>Usuarios</title>
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

	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet"  type="text/css" media="screen" href="login.css" />
	
</head>
<body background="../../img/main-img.png" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center; background-size: cover; height: 100%">

<div class="container-fluid">
      <div class="row">
      <div class="col-md-12 text-center">
	<button><span class="glyphicon glyphicon-user"></span> Usuario: <?php echo $_SESSION['user'] ?></button>
	<?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-time"></span> <?php echo "Hora Actual: " . date("H:i"); ?></button>
	 <?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-calendar"></span> <?php echo "Fecha Actual: ". strftime("%d de %B del %Y"); ?> </button>
	</div>
	</div>
	</div>
	<br>

  <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h1 class="panel-title text-center" contenteditable="true">Nuevo Usuario</h1>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
       <?php
        
       if($conn){
       
	mysqli_select_db('sirhal_web');
	  	
	     if (isset($_POST['A'])) {
	     
			    
                            
                            $nombre = mysqli_real_escape_string($conn,$_POST["nombre"]);
                            $user = mysqli_real_escape_string($conn,$_POST["user"]);
                            $pass1 = mysqli_real_escape_string($conn,$_POST["pass1"]);
                            $pass2 = mysqli_real_escape_string($conn,$_POST["pass2"]);
                            $permisos = mysqli_real_escape_string($conn,$_POST["permisos"]);
                                                        
                             agregarUser($nombre,$user,$pass1,$pass2,$permisos,$conn);
                             


                             }
                             }else {

                                      mysqli_error($conn);

                                    }
                                    

  //cerramos la conexion
  
  mysqli_close($conn);


?>
<div class="container">
<div class="row">
<div class="col-md-12">
<hr> <a href="users.php"><input type="button" value="Volver" class="btn btn-primary"></a>
</div>
</div>
</div>


</body>
</html>
