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
	
	$id = $_GET['id'];
      $sql = "SELECT * FROM tb_lh1 WHERE id = '$id'";
      mysqli_select_db('sirhal_web');
      $resultado = mysqli_query($conn,$sql);
      $fila = mysqli_fetch_assoc($resultado);
      
      

?>

<html><head>
	<meta charset="utf-8">
	<title>LH1 - Editar Registro</title>
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
          
           alert("Ha ingresado más caracteres que los Permitidos!!");
            limitField.value = limitField.value.substring(0, limitNum);
       }
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
    <h2 class="panel-title text-center text-default "><span class="pull-center "><img src="../../icons/actions/user-group-new.png"  class="img-reponsive img-rounded"> LH1 - Nuevo Registro</h2>
  </div>
    <div class="panel-body">
   

    
     <form action="formUpdate.php" method="post">
     <input type="hidden" id="id" name="id" value="<?php echo $fila['id']; ?>" />
  
  <div class="input-group">
    <span class="input-group-addon" style="color: blue">Código Archivo</span>
    <input id="text" type="text" class="form-control" name="cod_arch" value="LH1" readonly>
  </div><br>
  
  <div class="input-group">
    <span class="input-group-addon" style="color: blue">Lote Número</span>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#NroLote"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
    <input id="text" type="text" class="form-control" name="nro_lote" value="<?php echo $fila['nro_lote']; ?>" required>
    </div>
    <br>
  
  <div class="input-group">
    <span class="input-group-addon" style="color: blue">Período Lote</span>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#PerLote"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
    <input id="text" type="text" class="form-control" name="per_lote" value="<?php echo $fila['per_lote']; ?>" required>
  </div><br>
  
  <div class="input-group">
    <span class="input-group-addon" style="color: blue" >Codigo Organismo</span>
    <input id="text" type="text" class="form-control" name="cod_org" value="<?php echo $cod ?>" readonly>
  </div><br>
  
  <div class="input-group">
  <span class="input-group-addon" style="color: blue">Tipo Documento</span>
  <select class="browser-default custom-select" name="tip_doc" required>
  <option value="" disabled selected>Seleccionar</option>
  <option value="LE" <?php if($fila['tipo_doc'] == "LE") echo 'selected'; ?>>Libreta de Enrolamiento</option>
  <option value="DNI" <?php if($fila['tipo_doc'] == "DNI") echo 'selected'; ?>>DNI</option>
  <option value="LC" <?php if($fila['tipo_doc'] == "LC") echo 'selected'; ?>>Libreta Cívica</option>
  <option value="OTS" <?php if($fila['tipo_doc'] == "OTS") echo 'selected'; ?>>Otro Documento</option>
  </select>
  </div><br>
  
  <div class="input-group">
    <span class="input-group-addon" style="color: blue">Nro. DNI</span>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#NroDNI"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
    <input id="text" type="text" class="form-control" name="nro_dni" value="<?php echo $fila['nro_doc']; ?>" required>
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
                        //'<option value="'.$valores[cod_esc].'" '.(($fila['cod_esc']== $valores[cod_esc])?'selected="selected"':"").'
                        echo '<option value="'.$valores[cod_esc].'" '.(($fila['cod_esc']== $valores[cod_esc])?'selected="selected"':"").'>'.$valores[cod_esc].'-'.$valores[descripcion].'</option>';
                    }
                }
                }

               

                ?>
                </select>
                </div><br>
  
  
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
                        //value="'.$valores[cod_esc].'" '.(($fila['cod_esc']== $valores[cod_esc])?'selected="selected"':"").'
                        echo '<option value="'.$valores[cod_agrup].'" '.(($fila['cod_agrup']== $valores[cod_agrup])?'selected="selected"':"").'>'.$valores[cod_agrup].'-'.$valores[descripcion].'</option>';
                    }
                }
                }

                

                ?>
                </select>
                </div><br>
                
                
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
                        //value="'.$valores[cod_esc].'" '.(($fila['cod_esc']== $valores[cod_esc])?'selected="selected"':"").'
                        echo '<option value="'.$valores[cod_nivel].'" '.(($fila['cod_nivel']== $valores[cod_nivel])?'selected="selected"':"").'>'.$valores[cod_nivel].'-'.$valores[descripcion].'</option>';
                    }
                }
                }

                

                ?>
                </select>
                </div><br>
                
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
                        //value="'.$valores[cod_esc].'" '.(($fila['cod_esc']== $valores[cod_esc])?'selected="selected"':"").'
                        echo '<option value="'.$valores[cod_grado].'" '.(($fila['cod_grado']== $valores[cod_grado])?'selected="selected"':"").'>'.$valores[cod_grado].'-'.$valores[descripcion].'</option>';
                    }
                }
                }

                

                ?>
                </select>
                </div><br>
                
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
                        echo '<option value="'.$valores[cod_uni].'" '.(($fila['cod_uni']== $valores[cod_uni])?'selected="selected"':"").'>'.$valores[descripcion].'</option>';
                    }
                }
                }

                

                ?>
                </select>
                </div><br>
                
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
                        echo '<option value="'.$valores[cod_jur].'" '.(($fila['cod_jur']== $valores[cod_jur])?'selected="selected"':"").'>'.$valores[cod_jur].'-'.$valores[descripcion].'</option>';
                    }
                }
                }

                

                ?>
                </select>
                </div><br>
                
                <div class="input-group">
		<span class="input-group-addon" style="color: blue">Subjurisdicción</span>
		<!-- Trigger the modal with a button -->
		<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#SubJur"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
		<input id="text" type="text" maxlenght="2" class="form-control" name="cod_subjur"  onKeyDown="limitText(this,2);" onKeyUp="limitText(this,2);" value="<?php echo $fila['cod_subjur'] ?>" required>
		</div><br>

                
                <div class="input-group">
		<span class="input-group-addon" style="color: blue">Entidades</span>
		<!-- Trigger the modal with a button -->
		<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Entidad"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
		<input id="text" type="text" maxlenght="3" class="form-control" name="cod_entidad" onKeyDown="limitText(this,3);" onKeyUp="limitText(this,3);" value="<?php echo $fila['cod_entidad'] ?>" required>
	      </div><br>
                
                
                  
               <div class="input-group">
		<span class="input-group-addon" style="color: blue">Programa</span>
		<!-- Trigger the modal with a button -->
		<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Programa"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
		<input id="text" type="text" maxlenght="2" class="form-control" name="cod_prog" onKeyDown="limitText(this,2);" onKeyUp="limitText(this,2);" value="<?php echo $fila['cod_prog'] ?>" required>
	      </div><br>
                
                 <div class="input-group">
	      <span class="input-group-addon" style="color: blue">Subprograma</span>
	      <!-- Trigger the modal with a button -->
	      <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Subprograma"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
	      <input id="text" type="text" maxlenght="2" class="form-control" name="cod_subprog" onKeyDown="limitText(this,2);" onKeyUp="limitText(this,2);" value="<?php echo $fila['cod_subprog'] ?>" required>
	    </div><br>
                
               <div class="input-group">
	      <span class="input-group-addon" style="color: blue">Proyeto</span>
	      <!-- Trigger the modal with a button -->
	      <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Proyecto"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
	      <input id="text" type="text" maxlenght="2" class="form-control" name="cod_proy" onKeyDown="limitText(this,2);" onKeyUp="limitText(this,2);" value="<?php echo $fila['cod_proy'] ?>" required>
	    </div><br>
                
                
                <div class="input-group">
	      <span class="input-group-addon" style="color: blue">Actividad</span>
	      <!-- Trigger the modal with a button -->
	      <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Actividad"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
	      <input id="text" type="text" maxlenght="2" class="form-control" name="cod_act" onKeyDown="limitText(this,2);" onKeyUp="limitText(this,2);" value="<?php echo $fila['cod_act'] ?>"  required>
	    </div><br>
                
                
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
                        echo '<option value="'.$valores[cod_geo].'" '.(($fila['cod_geo']== $valores[cod_geo])?'selected="selected"':"").'>'.$valores[cod_geo].'-'.$valores[descripcion].'</option>';
                    }
                }
                }

                

                ?>
                </select>
                </div><br>
                
                <div class="input-group">
		<span class="input-group-addon" style="color: blue">Período</span>
		<!-- Trigger the modal with a button -->
		<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Periodo"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
		<input id="text" type="text" class="form-control" name="periodo" value="<?php echo $fila['periodo']; ?>" required>
		</div><br>
		
		
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
                        echo '<option value="'.$valores[cod_planta].'" '.(($fila['tipo_planta']== $valores[cod_planta])?'selected="selected"':"").'>'.$valores[cod_planta].'-'.$valores[descripcion].'</option>';
                    }
                }
                }

                

                ?>
                </select>
                </div><br>
                
                 <div class="input-group">
		  <span class="input-group-addon" style="color: blue">Fecha Ingreso</span>
		    <input id="text" type="date" class="form-control" name="f_ing" value="<?php echo $fila['f_ing']; ?>" required>
		 </div><br>
                
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
                        echo '<option value="'.$valores[cod_ff].'" '.(($fila['cod_fin']== $valores[cod_ff])?'selected="selected"':"").'>'.$valores[cod_ff].'-'.$valores[descripcion].'</option>';
                    }
                }
                }

                

                ?>
                </select>
                </div><br>
                
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
                        echo '<option value="'.$valores[cod_estado].'" '.(($fila['marca_estado']== $valores[cod_estado])?'selected="selected"':"").'>'.$valores[cod_estado].'-'.$valores[descripcion].'</option>';
                    }
                }
                }

                mysqli_close($conn);

                ?>
                </select>
                </div><br>
  
  
 
  
  <div class="form-group">
   <div class="col-sm-offset-2 col-sm-12" align="left">
   <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Editar</button>
   <a href="cargar_lh1.php"><input type="button" value="Volver" class="btn btn-primary"></a>
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