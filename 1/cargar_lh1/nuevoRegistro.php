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
	<title>LH1 Cabezal de Haberes - Nuevo Registro</title>
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
    <h2 class="panel-title text-center text-default "><span class="pull-center "><img src="../../icons/actions/user-group-new.png"  class="img-reponsive img-rounded"> LH1 Cabezal de Haberes - Nuevo Registro</h2>
  </div>
    <div class="panel-body bg-warning">
   

    
     <form action="formNuevoRegistro.php" method="post">
  
  <div class="container">
  <div class="row">
  <div class="col-sm-4">
  <div class="input-group">
    <span class="input-group-addon" style="color: blue">Código Archivo</span>
    <input id="text" type="text" class="form-control" name="cod_arch" value="LH1" readonly>
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
    <input id="text" type="text" maxlenght="6" class="form-control" name="per_lote" placeholder="AAAAMM" value="<?php echo $periodo;?>" required readonly>
  </div>
  </div>
  </div>
  </div><hr>
  
  <div class="container">
  <div class="row">
  <div class="col-sm-4">
  <div class="input-group">
    <span class="input-group-addon" style="color: blue" >Codigo Organismo</span>
    <input id="text" type="text" class="form-control" name="cod_org" value="<?php echo $cod ?>" readonly>
  </div>
  </div>
  
  <div class="col-sm-4">
  <div class="input-group">
  <span class="input-group-addon" style="color: blue">Tipo Documento</span>
  <select class="browser-default custom-select" name="tip_doc" required>
  <option value="" disabled selected>Seleccionar</option>
  <option value="LE">Libreta de Enrolamiento</option>
  <option value="DNI">DNI</option>
  <option value="LC">Libreta Cívica</option>
  <option value="OTS">Otro Documento</option>
  </select>
  </div></div>
  
  <div class="col-sm-3">
  <div class="input-group">
    <span class="input-group-addon" style="color: blue">Nro. DNI</span>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#NroDNI"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
    <input id="text" type="text" maxlenght="8" class="form-control" name="nro_dni" placeholder="99666444" value="" onkeyup="this.value=Numeros(this.value);" onKeyDown="limitText(this,8);" onKeyUp="limitText(this,8);" required>
  </div></div></div></div><hr>
  
  <div class="container">
  <div class="row">
  <div class="col-sm-6">
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

               

                ?>
                </select>
                </div></div>
  
  <div class="col-sm-4">
   <div class="input-group">
  <span class="input-group-addon" style="color: blue">Agrupamiento</span>
              <select class="browser-default custom-select" name="cod_agrup">
              <option value="" disabled selected>Seleccionar</option>
              
             <?php
             
             
               if($conn){

              $query = "SELECT * FROM agrupamiento";
              mysqli_select_db('sirhal_web');
              $res = mysqli_query($conn,$query);

              if($res)
              {
                
                  while ($valores = mysqli_fetch_array($res))
                    {
                        echo '<option value="'.$valores[cod_agrup].'">'.$valores[cod_agrup].'-'.$valores[descripcion].'</option>';
                    }
                }
                }

                

                ?>
                </select>
                </div></div></div></div><hr>
                
              <div class="container">
              <div class="row">
              <div class="col-sm-4">
              <div class="input-group">
	      <span class="input-group-addon" style="color: blue">Nivel</span>
              <select class="browser-default custom-select" name="cod_nivel">
              <option value="" disabled selected>Seleccionar</option>
              
             <?php
             
             
               if($conn){

              $query = "SELECT * FROM niveles";
              mysqli_select_db('sirhal_web');
              $res = mysqli_query($conn,$query);

              if($res)
              {
                
                  while ($valores = mysqli_fetch_array($res))
                    {
                        echo '<option value="'.$valores[cod_nivel].'">'.$valores[cod_nivel].'-'.$valores[descripcion].'</option>';
                    }
                }
                }

                

                ?>
                </select>
                </div></div>
                
              <div class="col-sm-4">
              <div class="input-group">
	      <span class="input-group-addon" style="color: blue">Grado</span>
              <select class="browser-default custom-select" name="cod_grado">
              <option value="" disabled selected>Seleccionar</option>
              
             <?php
             
             
               if($conn){

              $query = "SELECT * FROM grados";
              mysqli_select_db('sirhal_web');
              $res = mysqli_query($conn,$query);

              if($res)
              {
                
                  while ($valores = mysqli_fetch_array($res))
                    {
                        echo '<option value="'.$valores[cod_grado].'">'.$valores[cod_grado].'-'.$valores[descripcion].'</option>';
                    }
                }
                }

                

                ?>
                </select>
                </div></div>
                
                <div class="col-sm-4">
                <div class="input-group">
	      <span class="input-group-addon" style="color: blue">Unidad Organizativa</span>
              <select class="browser-default custom-select" name="cod_uni">
              <option value="" disabled selected>Seleccionar</option>
              
             <?php
             
             
               if($conn){

              $query = "SELECT * FROM uni_org";
              mysqli_select_db('sirhal_web');
              $res = mysqli_query($conn,$query);

              if($res)
              {
                
                  while ($valores = mysqli_fetch_array($res))
                    {
                        echo '<option value="'.$valores[cod_uni].'">'.$valores[descripcion].'</option>';
                    }
                }
                }

                

                ?>
                </select>
                </div></div></div></div><hr>
                
              <div class="container">
              <div class="row">
              <div class="col-sm-8">
              <div class="input-group">
	      <span class="input-group-addon" style="color: blue">Jurisdicción</span>
              <select class="browser-default custom-select" name="cod_jur">
              <option value="" disabled selected>Seleccionar</option>
              
             <?php
             
             
               if($conn){

              $query = "SELECT * FROM jurisdicciones";
              mysqli_select_db('sirhal_web');
              $res = mysqli_query($conn,$query);

              if($res)
              {
                
                  while ($valores = mysqli_fetch_array($res))
                    {
                        echo '<option value="'.$valores[cod_jur].'">'.$valores[cod_jur].'-'.$valores[descripcion].'</option>';
                    }
                }
                }

                

                ?>
                </select>
                </div></div>
                
                <div class="col-sm-4">
                <div class="input-group">
		<span class="input-group-addon" style="color: blue">Subjurisdicción</span>
		<!-- Trigger the modal with a button -->
		<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#SubJur"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
		<input id="text" type="text" maxlenght="2" class="form-control" name="cod_subjur" value="" onkeyup="this.value=Numeros(this.value);" onKeyDown="limitText(this,2);" onKeyUp="limitText(this,2);" required>
	      </div></div></div></div><hr>
                
               <div class="container">
               <div class="row">
               <div class="col-sm-4">
               <div class="input-group">
		<span class="input-group-addon" style="color: blue">Entidades</span>
		<!-- Trigger the modal with a button -->
		<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Entidad"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
		<input id="text" type="text" maxlenght="3" class="form-control" name="cod_entidad" value="" onkeyup="this.value=Numeros(this.value);" onKeyDown="limitText(this,3);" onKeyUp="limitText(this,3);" required>
	      </div></div>
                
                
                <div class="col-sm-4">  
                <div class="input-group">
		<span class="input-group-addon" style="color: blue">Programa</span>
		<!-- Trigger the modal with a button -->
		<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Programa"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
		<input id="text" type="text" maxlenght="2" class="form-control" name="cod_prog" value="" onkeyup="this.value=Numeros(this.value);" onKeyDown="limitText(this,2);" onKeyUp="limitText(this,2);" required>
	      </div></div>
               
              <div class="col-sm-4"> 
              <div class="input-group">
	      <span class="input-group-addon" style="color: blue">Subprograma</span>
	      <!-- Trigger the modal with a button -->
	      <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Subprograma"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
	      <input id="text" type="text" maxlenght="2" class="form-control" name="cod_subprog" value="" onkeyup="this.value=Numeros(this.value);" onKeyDown="limitText(this,2);" onKeyUp="limitText(this,2);" required>
	    </div></div></div></div><hr>
                
             <div class="container">
             <div class="row">
             <div class="col-sm-4">
             <div class="input-group">
	      <span class="input-group-addon" style="color: blue">Proyecto</span>
	      <!-- Trigger the modal with a button -->
	      <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Proyecto"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
	      <input id="text" type="text" maxlenght="2" class="form-control" name="cod_proy" value="" onkeyup="this.value=Numeros(this.value);" onKeyDown="limitText(this,2);" onKeyUp="limitText(this,2);" required>
	    </div></div>
                
             <div class="col-sm-4">   
             <div class="input-group">
	      <span class="input-group-addon" style="color: blue">Actividad</span>
	      <!-- Trigger the modal with a button -->
	      <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Actividad"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
	      <input id="text" type="text" maxlenght="2" class="form-control" name="cod_act" value="" onkeyup="this.value=Numeros(this.value);" onKeyDown="limitText(this,2);" onKeyUp="limitText(this,2);" required>
	    </div></div>
                
                <div class="col-sm-4">
                <div class="input-group">
	      <span class="input-group-addon" style="color: blue">Ubicación Geográfica</span>
              <select class="browser-default custom-select" name="cod_geo">
              <option value="" disabled selected>Seleccionar</option>
              
             <?php
             
             
               if($conn){

              $query = "SELECT * FROM ubi_geo";
              mysqli_select_db('sirhal_web');
              $res = mysqli_query($conn,$query);

              if($res)
              {
                
                  while ($valores = mysqli_fetch_array($res))
                    {
                        echo '<option value="'.$valores[cod_geo].'">'.$valores[cod_geo].'-'.$valores[descripcion].'</option>';
                    }
                }
                }

                

                ?>
                </select>
                </div></div></div></div><hr>
                
                <div class="container">
                <div class="row">
                <div class="col-sm-4">
                <div class="input-group">
		<span class="input-group-addon" style="color: blue">Período</span>
		<!-- Trigger the modal with a button -->
		<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Periodo"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
		<input id="text" type="text" maxlenght="6" class="form-control" name="periodo" value="" onkeyup="this.value=Numeros(this.value);" onKeyDown="limitText(this,6);" onKeyUp="limitText(this,6);"  placeholder="AAAAMM" required>
		</div></div>
		
		<div class="col-sm-4">
		 <div class="input-group">
	      <span class="input-group-addon" style="color: blue">Tipo de Planta</span>
              <select class="browser-default custom-select" name="cod_planta">
              <option value="" disabled selected>Seleccionar</option>
              
             <?php
             
             
               if($conn){

              $query = "SELECT * FROM tipo_planta";
              mysqli_select_db('sirhal_web');
              $res = mysqli_query($conn,$query);

              if($res)
              {
                
                  while ($valores = mysqli_fetch_array($res))
                    {
                        echo '<option value="'.$valores[cod_planta].'">'.$valores[cod_planta].'-'.$valores[descripcion].'</option>';
                    }
                }
                }

                

                ?>
                </select>
                </div></div>
                
                <div class="col-sm-4">
                 <div class="input-group">
		  <span class="input-group-addon" style="color: blue">Fecha Ingreso</span>
		    <input id="text" type="date" class="form-control" name="f_ing" required>
		 </div></div></div></div><hr>
                
              <div class="container">
              <div class="row">
              <div class="col-sm-8">
              <div class="input-group">
	      <span class="input-group-addon" style="color: blue">Fuente Financiamiento</span>
              <select class="browser-default custom-select" name="cod_ff">
              <option value="" disabled selected>Seleccionar</option>
              
             <?php
             
             
               if($conn){

              $query = "SELECT * FROM fuente_financiamiento";
              mysqli_select_db('sirhal_web');
              $res = mysqli_query($conn,$query);

              if($res)
              {
                
                  while ($valores = mysqli_fetch_array($res))
                    {
                        echo '<option value="'.$valores[cod_ff].'">'.$valores[cod_ff].'-'.$valores[descripcion].'</option>';
                    }
                }
                }

                

                ?>
                </select>
                </div></div>
                
                <div class="col-sm-4">
                 <div class="input-group">
	      <span class="input-group-addon" style="color: blue">Marca de Estado</span>
              <select class="browser-default custom-select" name="cod_estado">
              <option value="" disabled selected>Seleccionar</option>
              
             <?php
             
             
               if($conn){

              $query = "SELECT * FROM marca_estado";
              mysqli_select_db('sirhal_web');
              $res = mysqli_query($conn,$query);

              if($res)
              {
                
                  while ($valores = mysqli_fetch_array($res))
                    {
                        echo '<option value="'.$valores[cod_estado].'">'.$valores[cod_estado].'-'.$valores[descripcion].'</option>';
                    }
                }
                }

                mysqli_close($conn);

                ?>
                </select>
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


    <!-- Modal Subjurisdicción-->
<div id="SubJur" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Subjurisdicción</h4>
      </div>
      <div class="modal-body" align="center">
        <p>Deberá ingresar un valor de dos (2) dígitos.-</p>
	<p>Ejemplo: 00, 01 o el valor que corresponda a su Subjurisdicción.</p>
	<p>En caso de no conocerlo ingrese 00.-</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal Subjurisdicción-->

 <!-- Modal Entidad-->
<div id="Entidad" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Entidad</h4>
      </div>
      <div class="modal-body" align="center">
        <p>Deberá ingresar un valor de tres (3) dígitos.-</p>
	<p>Ejemplo: 000, 001 o el valor que corresponda a su Entidad.</p>
	<p>En caso de no conocerlo ingrese 000.-</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal Entidad-->


 <!-- Modal Programa-->
<div id="Programa" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Programa</h4>
      </div>
      <div class="modal-body" align="center">
        <p>Deberá ingresar un valor de dos (2) dígitos.-</p>
	<p>Ejemplo: 00, 01 o el valor que corresponda al Programa en cuestión.</p>
	<p>En caso de no conocerlo ingrese 00.-</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal Entidad-->
    
<!-- Modal Subprograma-->
<div id="Subprograma" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sub-Programa</h4>
      </div>
      <div class="modal-body" align="center">
        <p>Deberá ingresar un valor de dos (2) dígitos.-</p>
	<p>Ejemplo: 00, 01 o el valor que corresponda al Sub-Programa en cuestión.</p>
	<p>En caso de no conocerlo ingrese 00.-</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal Subprograma-->

<!-- Modal Proyecto-->
<div id="Proyecto" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Proyecto</h4>
      </div>
      <div class="modal-body" align="center">
        <p>Deberá ingresar un valor de dos (2) dígitos.-</p>
	<p>Ejemplo: 00, 01 o el valor que corresponda al Proyecto en cuestión.</p>
	<p>En caso de no conocerlo ingrese 00.-</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal Proyecto-->

<!-- Modal Actividad-->
<div id="Actividad" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Actividad</h4>
      </div>
      <div class="modal-body" align="center">
        <p>Deberá ingresar un valor de dos (2) dígitos.-</p>
	<p>Ejemplo: 00, 01 o el valor que corresponda a la Actividad en cuestión.</p>
	<p>En caso de no conocerlo ingrese 00.-</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal Actividad-->
    

</div>
</div>
</div>
</div>


</body>
</html>