<?php include "../../connection/connection.php"; 

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
	<title>CH Concepto de Haberes - Nuevo Registro</title>
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
	
	
	<script src="/sirhal-web/skeleton/js/jquery.dataTables.min.js"></script>
	<script src="/sirhal-web/skeleton/js/dataTables.editor.min.js"></script>
	<script src="/sirhal-web/skeleton/js/dataTables.select.min.js"></script>
	<script src="/sirhal-web/skeleton/js/dataTables.buttons.min.js"></script>
	
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
    var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ';//Caracteres validos
	
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
<div class="container"><br>
<div class="row">
<div class="col-sm-12">

<div class="panel panel-info" >
  <div class="panel-heading">
    <h2 class="panel-title text-center text-default "><span class="pull-center "><img src="../../icons/actions/user-group-new.png"  class="img-reponsive img-rounded"> CH Concepto de Haberes - Nuevo Registro</h2>
  </div>
    <div class="panel-body">
   

    
     <form action="formNuevoRegistro.php" method="post">
  
  <div class="input-group">
    <span class="input-group-addon" style="color: blue">Código Archivo</span>
    <input id="text" type="text" class="form-control" name="cod_arch" value="CH1" readonly>
  </div><br>
  
  <div class="input-group">
    <span class="input-group-addon" style="color: blue">Lote Número</span>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#NroLote"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
    <input id="text" type="text" maxlenght="3" class="form-control" name="nro_lote" value="" onkeyup="this.value=Numeros(this.value);" onKeyDown="limitText(this,3);" onKeyUp="limitText(this,3);" placeholder="Ingrese nro. de Lote" required>
    </div>
    <br>
  
  <div class="input-group">
    <span class="input-group-addon" style="color: blue">Período Lote</span>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#PerLote"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
    <input id="text" type="text" maxlenght="6" class="form-control" name="per_lote" value="" onkeyup="this.value=Numeros(this.value);" onKeyDown="limitText(this,6);" onKeyUp="limitText(this,6);" placeholder="AAAAMM" required>
  </div><br>
 
<div class="input-group">
    <span class="input-group-addon" style="color: blue" >Codigo Organismo</span>
    <input id="text" type="text" class="form-control" name="cod_org" value="<?php echo $cod ?>" readonly>
  </div><br>
  
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
                </div><br>
  
  <div class="input-group">
    <span class="input-group-addon" style="color: blue">Código de Concepto</span>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#CodConcepto"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
    <input id="text" type="text" maxlenght="6" class="form-control" name="cod_concepto" value="" onkeyup="this.value=Numeros(this.value);" onKeyDown="limitText(this,6);" onKeyUp="limitText(this,6);" required>
  </div><br>
  
  <div class="input-group">
    <span class="input-group-addon" style="color: blue">Descripción de Concepto</span>
    <input id="text" type="text" class="form-control" name="desc_concepto" value="" onkeyup="this.value=Text(this.value);" required>
  </div><br>
  
  <div class="input-group">
  <span class="input-group-addon" style="color: blue">Remunerativo - Bonificable</span>
  <select class="browser-default custom-select" name="rem_bon" required>
  <option value="" disabled selected>Seleccionar</option>
  <option value="1">Concepto Remunerativo y Bonificable</option>
  <option value="2">Concepto Remunerativo y No Bonificable</option>
  <option value="3">Concepto No Remunerativo y Bonificable</option>
  <option value="4">Concepto No Remunerativo y No Bonificable</option>
  </select>
</div><br>

<div class="input-group">
  <span class="input-group-addon" style="color: blue">Tipo de Concepto</span>
  <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#TpoConcepto"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
  <select class="browser-default custom-select" name="tip_concepto" required>
  <option value="" disabled selected>Seleccionar</option>
  <option value="1">Salarios</option>
  <option value="2">Descuentos y Retenciones</option>
  <option value="3">Otros Haberes</option>
  <option value="4">Aportes Patronales</option>
  </select>
</div><br>
  
 <hr>
  
  <div class="form-group">
   <div class="col-sm-offset-2 col-sm-12" align="left">
   <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>  Agregar</button>
   <a href="cargar_ch.php"><input type="button" value="Volver" class="btn btn-primary"></a>
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



<!-- Modal Codigo Escalafon-->
<div id="CodEsc" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Código de Escalafón</h4>
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
<!-- End Modal Codigo Escalafon-->

<!-- Modal Codigo Concepto-->
<div id="CodConcepto" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Código de Concepto</h4>
      </div>
      <div class="modal-body" align="center">
        <p>El código de concepto deberá ser un numero de 6 cifras.</p>
	<p>Dicho código no puede contener caracteres alfabéticos</p>
	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal Codigo Concepto-->

<!-- Modal Descripción Concepto-->
<div id="Concepto" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Descripción de Concepto</h4>
      </div>
      <div class="modal-body" align="center">
        <p>Aquí debe ingresar la descripcion del concepto.</p>
	<p>Ejemplo: Descuento Obra Social</p>
	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal Descripción Concepto-->

<!-- Modal Codigo de Remunerativo / Bonificable-->
<div id="TpoConcepto" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tipo de Concepto</h4>
      </div>
      <div class="modal-body" align="center">
        <p>Si el concepto es remunerativo y bonificable, sólo para este tipo de conceptos deberá seleccionar, "Salarios" u "Otros Haberes".</p>
	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal Tipo de Concepto-->


    

</div>
</div>
</div>
</div>


</body>
</html>