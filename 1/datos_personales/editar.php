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
	  
	$sqla = "SELECT nombreApellido FROM liquidadores where nombreApellido = '$nombre'";
	mysqli_select_db('sirhal_web');
	$valor = mysqli_query($conn,$sqla);
	while($row = mysqli_fetch_array($valor)){
	  $avatar = $row['avatar'];
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
	
	$id = $_GET['id'];
      $sql = "SELECT * FROM liquidadores WHERE id = '$id'";
      mysqli_select_db('sirhal_web');
      $resultado = mysqli_query($conn,$sql);
      $fila = mysqli_fetch_assoc($resultado);

?>

<html><head>
	<meta charset="utf-8">
	<title>Liquidadores - Editar Registro</title>
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
  
  <script >
    function limitText(limitField, limitNum) {
       if (limitField.value.length > limitNum) {
          
           alert("Ha ingresado más caracteres de los requeridos, deben ser: \n" + limitNum);
            limitField.value = limitField.value.substring(0, limitNum);
       }
       
       if(limitField.value.lenght < limitNum){
	  alert("Ha ingresado menos caracteres de los requeridos, deben ser:  \n"  + limitNum);
            limitField.value = limitField.value.substring(0, limitNum);
       }
}
</script>

<script>
function Numeros(string){
//Solo numeros
    var out = '';
    var filtro = '1234567890-';//Caracteres validos
	
    //Recorrer el texto y verificar si el caracter se encuentra en la lista de validos 
    for (var i=0; i<string.length; i++){
       if (filtro.indexOf(string.charAt(i)) != -1){ 
             //Se añaden a la salida los caracteres validos
              out += string.charAt(i);
	     }else{
		alert("ATENCION - Sólo se permiten Números");
	     }
	     }
	
    //Retornar valor filtrado
    return out;
} 
</script>
	
</head>
<body background="../../img/main-img.png" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center; background-size: cover; height: 100%">

<!-- User and system info -->
<div class="container-fluid">
      <div class="row">
      <div class="col-md-12 text-center"><br>
	<button><span class="glyphicon glyphicon-user"></span> Usuario: <?php echo $nombre ?></button>
	<?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-time"></span> <?php echo "Hora Actual: " . date("H:i"); ?></button>
	 <?php setlocale(LC_ALL,"es_ES"); ?>
	<button><span class="glyphicon glyphicon-calendar"></span> <?php echo "Fecha Actual: ". strftime("%d de %B del %Y"); ?> </button>
	</div>
	</div>
	</div>
<!-- end user and system info -->
	<hr>
	
<!-- main body -->
<div class="container"><br>
<div class="row">
<div class="col-sm-10">

<div class="panel panel-info" >
  <div class="panel-heading">
    <h2 class="panel-title text-center text-default "><span class="pull-center "><img src="../../icons/actions/user-group-new.png"  class="img-reponsive img-rounded"> Liquidadores - Editar Registro</h2>
  </div>
    <div class="panel-body">
    
    
     <form action="formUpdate.php" method="post">
     <input type="hidden" id="id" name="id" value="<?php echo $fila['id']; ?>" />
         
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="text" type="text" class="form-control" name="nombre" placeholder="Nombre y Apellido" value="<?php echo $fila['nombreApellido']; ?>" readonly>
  </div>
  
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <select class="browser-default custom-select" name="sexo">
  <option value="" disabled selected>Sexo</option>
  <option value="Femenino" <?php if($fila['sexo'] == "Femenino") echo "Selected"; ?>>Femenino</option>
  <option value="Masculino"<?php if($fila['sexo'] == "Masculino") echo "Selected"; ?>>Masculino</option>
  </select>
</div>

  
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
    <input id="text" type="text" class="form-control" name="dni" placeholder="Nro. DNI" value="<?php echo $fila['dni']; ?>" readonly>
  </div>
  
   <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
    <input  type="email" class="form-control" name="email" placeholder="E-Mail" value="<?php echo $fila['email']; ?>">
  </div>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
    <input  type="text" maxlenght="10" class="form-control" name="telefono"  value="<?php echo $fila['telefono']; ?>" value="" onkeyup="this.value=Numeros(this.value);" onKeyDown="limitText(this,10);" onKeyUp="limitText(this,10);" >
  </div>
  
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
              <select class="browser-default custom-select" name="organismo">
              <option value="" disabled selected>Organismo</option>
              
             <?php
             
             
               if($conn){

              $query = "SELECT * FROM organismos order by descripcion ASC";
              mysqli_select_db('sirhal_web');
              $res = mysqli_query($conn,$query);

              if($res)
              {
                
                  while ($valores = mysqli_fetch_array($res))
                    {
                        echo '<option value="'.$valores[descripcion].'" '.(($fila['organismo']== $valores[descripcion])?'selected="selected"':"").'>'.$valores[descripcion].'</option>';
                    }
                }
                }

                mysqli_close($conn);

                ?>
                </select>
                </div>
  <br>
  
  <div class="form-group">
   <div class="col-sm-offset-2 col-sm-12" align="left">
   <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span>  Editar</button>
   <a href="datos_personales.php"><input type="button" value="Volver" class="btn btn-primary"></a>
   <a href="../main.php"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>
  </div>
  </div>
</form> 

    
    </div>
    <br>
    
    
    
    
    

</div>
</div>
</div>
</div>


</body>
</html>