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
	<title>LH2 Detalle de Haberes - Nuevo Registro</title>
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
    <h2 class="panel-title text-center text-default "><span class="pull-center "><img src="../../icons/actions/user-group-new.png"  class="img-reponsive img-rounded"> LH2 Detalle de Haberes - Nuevo Registro</h2>
  </div>
    <div class="panel-body bg-warning">
   

    
     <form action="formNuevoRegistro.php" method="post">
  
  <div class="container">
  <div class="row">
  <div class="col-sm-4">
  <div class="input-group">
    <span class="input-group-addon" style="color: blue">Código Archivo</span>
    <input id="text" type="text" class="form-control" name="cod_arch" value="LH2" readonly>
  </div></div>
  
  <div class="col-sm-4">
  <div class="input-group">
    <span class="input-group-addon" style="color: blue">Lote Número</span>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#NroLote"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
    <input id="text" type="text" maxlenght="3" class="form-control" name="nro_lote" value="<?php echo $lote;?>" required readonly>
    </div>
    </div>
  
  <div class="col-sm-4">
  <div class="input-group">
    <span class="input-group-addon" style="color: blue">Período Lote</span>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#PerLote"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
    <input id="text" type="text" maxlenght="6" class="form-control" name="per_lote" value="<?php echo $periodo;?>" required readonly>
  </div></div></div></div><hr>
  
  <div class="container">
  <div class="row">
  <div class="col-sm-4">
  <div class="input-group">
    <span class="input-group-addon" style="color: blue" >Codigo Organismo</span>
    <input id="text" type="text" class="form-control" name="cod_org" value="<?php echo $cod ?>" readonly>
  </div></div>
  
  <div class="col-sm-4">
  <div class="input-group">
  <span class="input-group-addon" style="color: blue">Tipo Documento</span>
  <select class="browser-default custom-select" name="tipo_doc" required>
  <option value="" disabled selected>Seleccionar</option>
  <option value="LE">Libreta de Enrolamiento</option>
  <option value="DNI">DNI</option>
  <option value="LC">Libreta Cívica</option>
  <option value="OTS">Otro Documento</option>
  </select>
  </div></div>
  
  <div class="col-sm-4">
  <div class="input-group">
    <span class="input-group-addon" style="color: blue">Nro. DNI</span>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#NroDNI"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
    <input id="text" type="text" maxlenght="8" class="form-control" name="nro_dni" value="" onkeyup="this.value=Numeros(this.value);" onKeyDown="limitText(this,8);" onKeyUp="limitText(this,8);" placeholder="99666444" required>
  </div></div></div></div><hr>
  
  <div class="container">
  <div class="row">
  <div class="col-sm-8">
   <div class="input-group">
  <span class="input-group-addon" style="color: blue">Escalafón</span>
              <select class="browser-default custom-select" name="cod_esc">
              <option value="" disabled selected>Seleccionar</option>
              
             <?php
             
             
               if($conn){

              $query = "SELECT * FROM escalafones";
              mysqli_select_db('sirhal_web');
              $res = mysqli_query($conn,$query);

              if($res)
              {
                
                  while ($valores = mysqli_fetch_array($res))
                    {
                        echo '<option value="'.$valores[cod_esc].'">'.$valores[cod_esc].'-'.$valores[descripcion].'</option>';
                    }
                }
                }

               mysqli_close($conn);

                ?>
                </select>
                </div></div>
                
                <div class="col-sm-4">
                <div class="input-group">
		<span class="input-group-addon" style="color: blue">Código de Concepto</span>
		<!-- Trigger the modal with a button -->
		<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#CodConcepto"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
		<input id="cod_conc" type="text" maxlenght="6" class="form-control" name="cod_concepto" value="" onblur="validate();" onkeyup="this.value=Numeros(this.value);" onKeyDown="limitText(this,6);" onKeyUp="limitText(this,6);" required>
		<script>
		function validate(){
                
		var number = document.getElementById("cod_conc").value;
		var cantNumbers = number.length;
		if(cantNumbers < 6){
		alert("Código de Concepto requiere de 6 Caracteres!!!");
		
		}else{
		  alert("Puede continuar!!");
		}
  
  }
  </script>
		
		</div></div></div></div><hr>
		
		<div class="container">
		<div class="row">
		<div class="col-sm-4">
		<div class="input-group">
		<span class="input-group-addon" style="color: blue">Importe</span>
		<!-- Trigger the modal with a button -->
		<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Importe"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
		<input id="text" type="text" class="form-control" name="importe" value="" onkeyup="this.value=Numeros(this.value);" required>
		</div></div>
		
		<div class="container">
		<div class="row">
		<div class="col-sm-4">
		<div class="input-group">
		<span class="input-group-addon" style="color: blue">Tipo Unidad Física</span>
		<select class="browser-default custom-select" name="tipo_uf" required>
		<option value="" disabled selected>Seleccionar</option>
		<option value="01">Horas Cátedra</option>
		<option value="99" selected>Cargos</option>
		</select>
		</div></div>
		
		<div class="col-sm-4">
		<div class="input-group">
		<span class="input-group-addon" style="color: blue">Cantidad Unidad Física</span>
		<!-- Trigger the modal with a button -->
		<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#UniFisica"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
		<input type="text" class="form-control" name="cant_uf" value="1" required readonly>
		</div></div></div></div><hr>
		
		<div class="container">
		<civ class="row">
		<div class="col-sm-4">
		<div class="input-group">
		<span class="input-group-addon" style="color: blue">Período Liquidado</span>
		<!-- Trigger the modal with a button -->
		<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Periodo"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
		<input id="text" type="text" maxlenght="6" class="form-control" name="per_liquidado" placeholder="AAAAMM" value="" onkeyup="this.value=Numeros(this.value);"  onKeyDown="limitText(this,6);" onKeyUp="limitText(this,6);" required>
		</div></div></div></div><hr> 
 
  
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
	<p>Si es el primer lote que carga, entonces deberá ingresarlo asi: 1.</p>
	<p>No se preocupe por los ceros faltantes delante de la unidad, se agregarán automáticamente.</p>
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
    
    <!-- Modal Período-->
<div id="Periodo" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Período Liquidado</h4>
      </div>
      <div class="modal-body" align="center">
        <p>Deberá ingresar los datos con el mismo formato que para el período del lote.</p>
	<p>Ejemplo: 202001</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal Periodo-->

<!-- Modal Período-->
<div id="CodConcepto" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Código de Concepto</h4>
      </div>
      <div class="modal-body" align="center">
        <p>El código de Concepto es un valor de 6 cifras.</p>
	<p>Dicho código representa un concepto liquidatorio, ya sea un descuento o un pago.</p>
	<p>Este código deberá consultarlo con la Dirección de Evalución de Gastos en Personal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal Codigo Concepto-->

<!-- Modal Importe-->
<div id="Importe" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Importe</h4>
      </div>
      <div class="modal-body" align="center">
        <p>El Importe deberá contener como máximo dos (2) decimales.</p>
	<p>Ejemplo: 1500.02.</p>
	<p>Si el importe es negativo, en representación de un descuento, deberá ingresarlo de la siguiente manera.</p>
	<p>Ejemplo: -1500.02</p>
	<p>Tenga en cuenta que el monto que ingrese debe tener relación con el código de concepto que ingresó anteriormente.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal Importe-->

<!-- Modal UniFisica-->
<div id="UniFisica" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cantidad de Unidades Físicas</h4>
      </div>
      <div class="modal-body" align="center">
        <p>Ingrese la cantidad de unidades físicas que correspondan.</p>
	<p>Puede tipear el valor o utilizar las flechas "arriba" o "abajo" desde el teclado o bien presionando las que están en el campo correspondiente</p>
	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal UniFisica-->




    

</div>
</div>
</div>
</div>


</body>
</html>