<?php include "../../connection/connection.php";
      include "../../functions/functions.php";

        session_start();
	$varsession = $_SESSION['user'];
	if(isset($_POST['nro_lote'], $_POST['periodo'])){
	$_SESSION['nro_lote'] = $_POST['nro_lote'];
	$_SESSION['periodo'] = $_POST['periodo'];
	}
	
	$_COOKIE['nro_lote'] = $_SESSION['nro_lote'];
	$_COOKIE['periodo'] = $_SESSION['periodo'];
	
	if(isset($_COOKIE['nro_lote'], $_COOKIE['periodo'])){
	setcookie("lote", $_COOKIE['nro_lote'], time()+0);
	setcookie("periodo", $_COOKIE['periodo'], time()+0);
	$lote = $_COOKIE['nro_lote'];
	$periodo = $_COOKIE['periodo'];
	}
	
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

?>

<html><head>
	<meta charset="utf-8">
	<title>DP Datos de Personal - Nuevo Registro</title>
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
    var filtro = '1234567890';//Caracteres validos
	
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

<script> 
function Text(string){//validacion solo letras
    var out = '';
    //Se añaden las letras validas
    var filtro ="^[abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ ]+$"; // Caracteres Válidos
  
    for (var i=0; i<string.length; i++){
       if (filtro.indexOf(string.charAt(i)) != -1){ 
	     out += string.charAt(i);
	     }else{
		alert("ATENCION - Sólo se permite Texto");
	     }
	     }
    return out;
}
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


	
</head>
<body background="../../img/main-img.png" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center; background-size: cover; height: 100%">

<!-- User and system info -->
<div class="container-fluid">
      <div class="row">
      <div class="col-md-12 text-center"><br>
	<button><span class="glyphicon glyphicon-user"></span> Usuario: <?php echo $nombre ?></button>
	<button><span class="glyphicon glyphicon-user"></span> Organismo: <?php echo $organismo ?></button>
	
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
<div class="container-fluid"><br>
<div class="row">
<div class="col-sm-12">

<div class="panel panel-info" >
  <div class="panel-heading">
    <h2 class="panel-title text-center text-default "><span class="pull-center "><img src="../../icons/actions/user-group-new.png"  class="img-reponsive img-rounded"> DP Datos de Personal - Nuevo Registro</h2>
  </div>
    <div class="panel-body bg-warning">
   

    
     <form action="formNuevoRegistro.php" method="post">
  
<div class="container">
<div class="row">
<div class="col-sm-3">
 <div class="input-group">
    <span class="input-group-addon" style="color: blue">Código Archivo</span>
    <input id="text" type="text" class="form-control" name="cod_arch" value="DP" readonly>
  </div>
  </div>
   
<div class="col-sm-3">
  <div class="input-group">
    <span class="input-group-addon" style="color: blue">Lote Número</span>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#NroLote"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
    <input id="text" type="text" maxlenght="3" class="form-control" name="nro_lote" value="<?php echo $lote;?>" required readonly>
    </div>
    </div>
    
    <div class="col-sm-3">
  <div class="input-group">
    <span class="input-group-addon" style="color: blue">Período Lote</span>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#PerLote"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
    <input id="text" type="text" maxlenght="6" class="form-control" name="per_lote" value="<?php echo $periodo;?>" required readonly>
  </div>
  </div>
   
  <div class="col-sm-3">
  <div class="input-group">
  <span class="input-group-addon" style="color: blue">Tipo Documento</span>
  <select class="browser-default custom-select" name="tip_doc" required>
  <option value="" disabled selected>Seleccionar</option>
  <option value="LE">Libreta de Enrolamiento</option>
  <option value="DNI">DNI</option>
  <option value="LC">Libreta Cívica</option>
  <option value="OTS">Otro Documento</option>
  </select>
  </div>
  </div>
  </div>
  </div>
  <hr>
  
   <div class="container">
    <div class="row">
   <div class="col-sm-3">
  <div class="input-group">
    <span class="input-group-addon" style="color: blue">Nro. DNI</span>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#NroDNI"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
    <input id="text" type="text" maxlenght="8" class="form-control" name="nro_dni" value="" onkeyup="this.value=Numeros(this.value);" onKeyDown="limitText(this,8);" onKeyUp="limitText(this,8);" placeholder="99666444" required>
  </div>
  </div>
  
  <div class="col-sm-3">
   <div class="input-group">
    <span class="input-group-addon" style="color: blue">Ap.Nombre</span>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#NombreApellido"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
    <input id="text" type="text" class="form-control" name="nombre" value="" onkeyup="this.value=Text(this.value);" placeholder="Apellido y Nombre" required>
  </div>
  </div>
  
   
  <div class="col-sm-3">
  <div class="input-group">
    <span class="input-group-addon" style="color: blue">Fecha Nacimiento</span>
    <input id="text" type="date" class="form-control" name="f_nac" required>
  </div>
  </div>
  
  <div class="col-sm-3">
  <div class="input-group">
  <span class="input-group-addon" style="color: blue">Sexo</span>
  <select class="browser-default custom-select" name="sexo">
  <option value="" disabled selected>Seleccionar</option>
  <option value="FEM ">Femenino</option>
  <option value="MASC">Masculino</option>
  </select>
</div>
</div>
</div>
</div><hr>

 <div class="container">
  <div class="row">
<div class="col-sm-3">
<div class="input-group">
  <span class="input-group-addon" style="color: blue">Estado Civil</span>
  <select class="browser-default custom-select" name="cod_est_civ" required>
  <option value="" disabled selected>Seleccionar</option>
  <option value="CAS">Casado/a</option>
  <option value="SOL">Soltero/a</option>
  <option value="DIV">Divorciado/a</option>
  <option value="UHE">Unido/a de Hecho</option>
  <option value="VIU">Viudo/a</option>
  <option value="UCI">Unión Civil</option>
  <option value="OTS">Otros</option>
  </select>
</div>
</div>

<div class="col-sm-3">
<div class="input-group">
    <span class="input-group-addon" style="color: blue" >Codigo Organismo</span>
    <input id="text" type="text" class="form-control" name="cod_org" value="<?php echo $cod ?>" readonly>
  </div>
  </div>
  
  <div class="col-sm-3">
  <div class="input-group">
    <span class="input-group-addon" style="color: blue">Fecha Ingreso</span>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#FI"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
    <input id="text" type="text" maxlenght="6" class="form-control" name="f_ing" value="" onkeyup="this.value=Numeros(this.value);" onKeyDown="limitText(this,8);" onKeyUp="limitText(this,8);" required>
  </div>
  </div>
  
  <div class="col-sm-3">
  <div class="input-group">
  <span class="input-group-addon" style="color: blue">Código Nacionalidad</span>
  <select class="browser-default custom-select" name="cod_nac" required>
  <option value="" disabled selected>Seleccionar</option>
  <option value="01">Argentino Nativo</option>
  <option value="02">Argentino Naturalizado</option>
  <option value="03">Extranjero</option>
  <option value="04">Argentino por Opción</option>
  <option value="90">Otra</option>
  </select>
</div>
</div>
</div>
</div><hr>

<div class="container">
<div class="row">
<div class="col-sm-3">
<div class="input-group">
  <span class="input-group-addon" style="color: blue">Niv.Educ.</span>
  <select class="browser-default custom-select" name="cod_niv_edu" required>
  <option value="" disabled selected>Seleccionar</option>
  <option value="EP">Educación Primaria</option>
  <option value="ES">Educación Secundaria</option>
  <option value="ET">Educación Terciaria</option>
  <option value="EU">Educación Univ.</option>
  <option value="OT">Otra Area Educativa</option>
  </select>
</div>
</div>

  <div class="col-sm-3">
  <div class="input-group">
    <span class="input-group-addon" style="color: blue">T. Obtenido</span>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#TitObtenido"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
    <input id="text" type="text" class="form-control" name="desc_tit" value="" onkeyup="this.value=Text(this.value);" placeholder="Describa el Título Obtenido" required>
  </div>
  </div>
  
  <div class="col-sm-3">
   <div class="input-group">
     <span class="input-group-addon" style="color: blue">Cuit/Cuil</span>
     <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#CUIL"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
    <input  type="text" maxlenght="11" class="form-control" name="cuit_cuil" value="" onkeyup="this.value=Numeros(this.value);" onKeyDown="limitText(this,11);" onKeyUp="limitText(this,11);" placeholder="209996664440" required>
  </div>
  </div>
  
  <div class="col-sm-3">
  <div class="input-group">
  <span class="input-group-addon" style="color: blue">Sistema Previsional</span>
  <select class="browser-default custom-select" name="sist_prev" required>
  <option value="" disabled selected>Seleccionar</option>
  <option value="R" selected>Reparto</option>
  <option value="C">Capitalización</option>
  </select>
</div>
</div>
</div>
</div><hr>

<div class="container">
<div class="row">
<div class="col-xs-3" >
<div class="input-group">
  <span class="input-group-addon" style="color: blue">Cod.Sist. Prev.</span>
  <select class="browser-default custom-select" name="cod_sist_prev" required>
  <option value="" disabled selected>Seleccionar</option>
  <option value="20">AFJP - Consolidar</option>
  <option value="21">AFJP - Siembra</option>
  <option value="22">AFJP - Orígenes</option>
  <option value="24">AFJP - Profesión</option>
  <option value="26">AFJP - Máxima</option>
  <option value="29">AFJP - Arauca Bit</option>
  <option value="34">AFJP - Futura</option>
  <option value="37">AFJP - Nación</option>
  <option value="39">AFJP - Previsol</option>
  <option value="40">AFJP - Pro-Renta</option>
  <option value="41">AFJP - MET</option>
  <option value="42">AFJP - Unidos</option>
  <option value="90" selected>Otra Caja o AFJP</option>
  </select>
</div>
</div>

<div class="col-xs-3" >
  <div class="input-group">
     <span class="input-group-addon" style="color: blue">Cód.Obra Social</span>
    <input  type="text" maxlenght="9" class="form-control" name="cod_ob_soc" value="" onkeyup="this.value=Numeros(this.value);" onKeyDown="limitText(this,9);" onKeyUp="limitText(this,9);" required>
  </div>
  </div>
  
  <div class="col-xs-3">
  <div class="input-group">
     <span class="input-group-addon" style="color: blue">Nro. Afiliado</span>
    <input  type="text" maxlenght="14" class="form-control" name="nro_afi" value="" onkeyup="this.value=Numeros(this.value);" onKeyDown="limitText(this,14);" onKeyUp="limitText(this,14);" required>
  </div>
  </div>
  
  <div class="col-xs-3">
  <div class="input-group">
  <span class="input-group-addon" style="color: blue">Tipo Horario Laboral</span>
  <select class="browser-default custom-select" name="tip_hor" required>
  <option value="" disabled selected>Seleccionar</option>
  <option value="1">Jornada Legal</option>
  <option value="2">Horario Reducido</option>
  <option value="3">Otros Horarios Especiales</option>
  </select>
</div>
</div>
</div>
</div>
<hr>
  
  <div class="form-group">
   <div class="col-sm-12" align="center">
   <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>  Agregar</button>
   <a href="../main.php"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>
  </div>
  </div>
</form> 

    
    </div>
    <br>
    
   <!-- Modal Nro. Lote-->
<div id="NroLote" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Lote Número</h4>
      </div>
      <div class="modal-body">
        <p>El número de lote debe tener 3 dígitos.</p>
	<p>Si es el primer lote que carga entonces deberá ingresarlo asi: 001.</p>
	<p>Hasta llegar al número 999.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal Nro. Lote-->


<!-- Modal Periodo Lote-->
<div id="PerLote" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Período del Lote</h4>
      </div>
      <div class="modal-body" align="center">
        <p>El período está formado por el Año y el mes.</p>
	<p>Por ejemplo, si desea ingresar Enero del 2020, será: 202001</p>
	<p>Debe respetar este formato de lo contrario al ingresar los datos de otra manera, obtendrá error al procesar el lote luego.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal Periodo Lote-->

<!-- Modal Nro. DNI-->
<div id="NroDNI" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Número de DNI</h4>
      </div>
      <div class="modal-body" align="center">
        <p>No introduzca ni puntos ni comas para delimitar el dni, debe tipearlo sin espacios.</p>
	<p>Ejemplo: 20789456</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal Nro. DNI-->
    
    <!-- Modal Nombre y Apellido-->
<div id="NombreApellido" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Nombre y Apellido</h4>
      </div>
      <div class="modal-body" align="center">
        <p>Deberá ingresar primero el Apellido y luego el Nombre.</p>
	<p>No separe el Apellido del nombre por comas ni guiones, solo por espacios.</p>
	<p>Ejemplo: Gonzalez Marcos</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal Nombre y Apellido-->
    
<!-- Modal Titulo Obtenido-->
<div id="TitObtenido" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Título Obtenido</h4>
      </div>
      <div class="modal-body" align="center">
        <p>Al igual que en Nombre y Apellido,</p>
	<p>No separe por comas ni guiones, solo por espacios.</p>
	<p>Ejemplo: Licenciatura en Psicología</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal Titulo Obtenido-->

<!-- Modal Cuil-->
<div id="CUIL" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">CUIL-CUIT</h4>
      </div>
      <div class="modal-body" align="center">
        <p>Al igual que en el ingreso del DNI</p>
	<p>No separe por comas ni guiones,ingrese los números sin espacios.</p>
	<p>Ejemplo: 20996664440</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal Cuil-->

<!-- Modal FI-->
<div id="FI" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Fecha de Ingreso</h4>
      </div>
      <div class="modal-body" align="center">
        <p>Al igual que en el ingreso del Período del Lote,</p>
	<p>No separe por comas ni guiones,ingrese los números sin espacios, si desea ingresar Febrero de 1996</p>
	<p>Ejemplo: 199602</p>
	<p>En el caso que sea un contrato, se indicará la fecha de inicio del contrato vigente.-</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal FI-->
    

</div>
</div>
</div>
</div>


</body>
</html>