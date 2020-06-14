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
	<title>LH1 - Nuevo Registro</title>
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
   

    
     <form action="formNuevoRegistro.php" method="post">
  
  <div class="input-group">
    <span class="input-group-addon" style="color: blue">Código Archivo</span>
    <input id="text" type="text" class="form-control" name="cod_arch" value="LH1" readonly>
  </div><br>
  
  <div class="input-group">
    <span class="input-group-addon" style="color: blue">Lote Número</span>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#NroLote"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
    <input id="text" type="text" class="form-control" name="nro_lote" placeholder="Ingrese nro. de Lote" required>
    </div>
    <br>
  
  <div class="input-group">
    <span class="input-group-addon" style="color: blue">Período Lote</span>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#PerLote"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
    <input id="text" type="text" class="form-control" name="per_lote" placeholder="AAAAMM" required>
  </div><br>
  
  <div class="input-group">
    <span class="input-group-addon" style="color: blue" >Codigo Organismo</span>
    <input id="text" type="text" class="form-control" name="cod_org" value="<?php echo $cod ?>" readonly>
  </div><br>
  
  <div class="input-group">
  <span class="input-group-addon" style="color: blue">Tipo Documento</span>
  <select class="browser-default custom-select" name="tip_doc" required>
  <option value="" disabled selected>Seleccionar</option>
  <option value="LE">Libreta de Enrolamiento</option>
  <option value="DNI">DNI</option>
  <option value="LC">Libreta Cívica</option>
  <option value="OTS">Otro Documento</option>
  </select>
  </div><br>
  
  <div class="input-group">
    <span class="input-group-addon" style="color: blue">Nro. DNI</span>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#NroDNI"><span class="glyphicon glyphicon-info-sign"></span> Información</button>
    <input id="text" type="text" class="form-control" name="nro_dni" placeholder="99666444" required>
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
                        echo '<option value="'.$valores[cod_agrup].'">'.$valores[cod_agrup].'-'.$valores[descripcion].'</option>';
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
                        echo '<option value="'.$valores[cod_nivel].'">'.$valores[cod_nivel].'-'.$valores[descripcion].'</option>';
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
                        echo '<option value="'.$valores[cod_grado].'">'.$valores[cod_grado].'-'.$valores[descripcion].'</option>';
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
                        echo '<option value="'.$valores[cod_uni].'">'.$valores[cod_uni].'-'.$valores[descripcion].'</option>';
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
                        echo '<option value="'.$valores[cod_jur].'">'.$valores[cod_jur].'-'.$valores[descripcion].'</option>';
                    }
                }
                }

                

                ?>
                </select>
                </div><br>
                
                <div class="input-group">
	      <span class="input-group-addon" style="color: blue">Sub-Jurisdicción</span>
              <select class="browser-default custom-select" name="cod_subjur">
              <option value="" disabled selected>Seleccionar</option>
              
             <?php
             
             
               if($conn){

              $query = "SELECT * FROM sub_jur";
              mysqli_select_db('sirhal_web');
              $res = mysqli_query($conn,$query);

              if($res)
              {
                
                  while ($valores = mysqli_fetch_array($res))
                    {
                        echo '<option value="'.$valores[cod_subjur].'">'.$valores[cod_subjur].'-'.$valores[descripcion].'</option>';
                    }
                }
                }

                

                ?>
                </select>
                </div><br>
                
                <div class="input-group">
	      <span class="input-group-addon" style="color: blue">Entidades</span>
              <select class="browser-default custom-select" name="cod_entidad">
              <option value="" disabled selected>Seleccionar</option>
              
             <?php
             
             
               if($conn){

              $query = "SELECT * FROM entidades";
              mysqli_select_db('sirhal_web');
              $res = mysqli_query($conn,$query);

              if($res)
              {
                
                  while ($valores = mysqli_fetch_array($res))
                    {
                        echo '<option value="'.$valores[cod_entidad].'">'.$valores[cod_entidad].'-'.$valores[descripcion].'</option>';
                    }
                }
                }

                

                ?>
                </select>
                </div><br>
                
                
                  
                <div class="input-group">
	      <span class="input-group-addon" style="color: blue">Programas</span>
              <select class="browser-default custom-select" name="cod_prog">
              <option value="" disabled selected>Seleccionar</option>
              
             <?php
             
             
               if($conn){

              $query = "SELECT * FROM programas";
              mysqli_select_db('sirhal_web');
              $res = mysqli_query($conn,$query);

              if($res)
              {
                
                  while ($valores = mysqli_fetch_array($res))
                    {
                        echo '<option value="'.$valores[cod_prog].'">'.$valores[cod_prog].'-'.$valores[descripcion].'</option>';
                    }
                }
                }

                

                ?>
                </select>
                </div><br>
                
                <div class="input-group">
	      <span class="input-group-addon" style="color: blue">Sub-Programas</span>
              <select class="browser-default custom-select" name="cod_subprog">
              <option value="" disabled selected>Seleccionar</option>
              
             <?php
             
             
               if($conn){

              $query = "SELECT * FROM subprogramas";
              mysqli_select_db('sirhal_web');
              $res = mysqli_query($conn,$query);

              if($res)
              {
                
                  while ($valores = mysqli_fetch_array($res))
                    {
                        echo '<option value="'.$valores[cod_subprog].'">'.$valores[cod_subprog].'-'.$valores[descripcion].'</option>';
                    }
                }
                }

                

                ?>
                </select>
                </div><br>
                
                 <div class="input-group">
	      <span class="input-group-addon" style="color: blue">Proyectos</span>
              <select class="browser-default custom-select" name="cod_proy">
              <option value="" disabled selected>Seleccionar</option>
              
             <?php
             
             
               if($conn){

              $query = "SELECT * FROM proyectos";
              mysqli_select_db('sirhal_web');
              $res = mysqli_query($conn,$query);

              if($res)
              {
                
                  while ($valores = mysqli_fetch_array($res))
                    {
                        echo '<option value="'.$valores[cod_proy].'">'.$valores[cod_proy].'-'.$valores[descripcion].'</option>';
                    }
                }
                }

                

                ?>
                </select>
                </div><br>
                
                
                 <div class="input-group">
	      <span class="input-group-addon" style="color: blue">Actividades</span>
              <select class="browser-default custom-select" name="cod_act">
              <option value="" disabled selected>Seleccionar</option>
              
             <?php
             
             
               if($conn){

              $query = "SELECT * FROM actividades";
              mysqli_select_db('sirhal_web');
              $res = mysqli_query($conn,$query);

              if($res)
              {
                
                  while ($valores = mysqli_fetch_array($res))
                    {
                        echo '<option value="'.$valores[cod_act].'">'.$valores[cod_act].'-'.$valores[descripcion].'</option>';
                    }
                }
                }

                

                ?>
                </select>
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
                        echo '<option value="'.$valores[cod_geo].'">'.$valores[cod_geo].'-'.$valores[descripcion].'</option>';
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
		<input id="text" type="text" class="form-control" name="periodo" placeholder="AAAAMM" required>
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
                        echo '<option value="'.$valores[cod_planta].'">'.$valores[cod_planta].'-'.$valores[descripcion].'</option>';
                    }
                }
                }

                

                ?>
                </select>
                </div><br>
                
                 <div class="input-group">
		  <span class="input-group-addon" style="color: blue">Fecha Ingreso</span>
		    <input id="text" type="date" class="form-control" name="f_ing" required>
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
                        echo '<option value="'.$valores[cod_ff].'">'.$valores[cod_ff].'-'.$valores[descripcion].'</option>';
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
                        echo '<option value="'.$valores[cod_estado].'">'.$valores[cod_estado].'-'.$valores[descripcion].'</option>';
                    }
                }
                }

                mysqli_close($conn);

                ?>
                </select>
                </div><br>
  
  
 
  
  <div class="form-group">
   <div class="col-sm-offset-2 col-sm-12" align="left">
   <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>  Agregar</button>
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
    




    

</div>
</div>
</div>
</div>


</body>
</html>