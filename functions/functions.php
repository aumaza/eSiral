<?php

/*
** Función que carga la cabecera de con el skeleton de bootstrap
*/

function skeleton(){


        
  echo '<link rel="stylesheet" href="/eSiral/skeleton/css/bootstrap.min.css" >
	<link rel="stylesheet" href="/eSiral/skeleton/css/bootstrap-theme.css" >
	<link rel="stylesheet" href="/eSiral/skeleton/css/bootstrap-theme.min.css" >
	<link rel="stylesheet" href="/eSiral/skeleton/css/fontawesome.css">
	<link rel="stylesheet" href="/eSiral/skeleton/css/fontawesome.min.css" >
	<link rel="stylesheet" href="/eSiral/skeleton/css/jquery.dataTables.min.css" >

	<script src="/eSiral/skeleton/js/jquery-3.4.1.min.js"></script>
	<script src="/eSiral/skeleton/js/bootstrap.min.js"></script>
	
	<script src="/eSiral/skeleton/js/jquery.dataTables.min.js"></script>
	<script src="/eSiral/skeleton/js/dataTables.editor.min.js"></script>
	<script src="/eSiral/skeleton/js/dataTables.select.min.js"></script>
	<script src="/eSiral/skeleton/js/dataTables.buttons.min.js"></script>
	<script src="/eSiral/skeleton/Chart.js/Chart.bundle.min.js"></script>
	<script src="/eSiral/skeleton/Chart.js/Chart.bundle.js"></script>
	<script src="/eSiral/skeleton/Chart.js/Chart.js"></script>
	<script src="/eSiral/skeleton/Chart.js/Chart.min.js"></script>
	 
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet"  type="text/css" media="screen" href="login.css" />';

}


/*
** Se crea la tabla usuarios, contenedora de los datos para ingreso a la app.-
*/

function createTable($var1){

			
		$sql = "CREATE TABLE usuarios(".
		      "id INT AUTO_INCREMENT,".
		      "nombre VARCHAR(50),".
		      "user VARCHAR(15),".
		      "password VARCHAR(10),".
		      "roles INT".
		      "PRIMARY KEY (id)); ";

	$retval = mysqli_query($var1,$sql);
	
	if(!$retval)
	{
		mysqli_error($var1);
		echo "<br>"; 	
	}
	
	else
	 {	
		echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-success" role="alert">';
		echo 'Table Usuarios create Succesfully';
		echo "</div>";
		echo "</div>";
		
	 }

	 //mysql_close($conn);

}

/*
** Se crea la tabla files, contendrá los datos de los archivos subidos, para llevar un control de los mismos.-
*/

function create_table_files($var1){


$sql = "CREATE TABLE files (".
      "id INT AUTO_INCREMENT,".
      "file_name VARCHAR(255),".
      "user_name VARCHAR(60),".
      "path_folder VARCHAR(60),".
      "upload_on datetime NOT NULL,".
      "status enum('1','0') NOT NULL DEFAULT 1,".
      "PRIMARY KEY (id)); ";

	mysqli_select_db('sirhal_web');
	$retval = mysqli_query($var1,$sql);
	
	if(!$retval)
	{
		mysqli_error($var1); 	
	}
	
	else
	 {	
		echo 'Table create Succesfully\n';
	 }
   
}

/*
** Se crea la tabla "files_ok" contendrá los datos de los archivos generados, para llevar un control de los mismos.-
*/

function create_table_files_ok($var1){


$sql = "CREATE TABLE files_ok (".
      "id INT AUTO_INCREMENT,".
      "file_name VARCHAR(255),".
      "user_name VARCHAR(60),".
      "cod_org   VARCHAR(2),".
      "path_folder VARCHAR(60),".
      "upload_on datetime NOT NULL,".
      "status enum('1','0') NOT NULL DEFAULT 1,".
      "PRIMARY KEY (id)); ";

	mysqli_select_db('sirhal_web');
	$retval = mysqli_query($var1,$sql);
	
	if(!$retval)
	{
	    echo '<div class="alert alert-danger" role="alert" align="center">';
	    echo '<span class="pull-center "><img src="../../icons/status/dialog-warning.png"  class="img-reponsive img-rounded"> Error ' .mysqli_error($var1);
	    echo "</div>";
	}
	
	else
	 {	
	    echo '<div class="alert alert-success" role="alert" align="center">';
	    echo '<span class="pull-center "><img src="../../icons/actions/dialog-ok-apply.png"  class="img-reponsive img-rounded"> Tabla Creada Exitosamente';
	    echo "</div>";
	 }
   
}

/*
** Se crea la tabla "organismos", es la depositaria de los datos de cada organismo
*/

function createTableOrganismos($conn){
$sql = "CREATE TABLE organismos(".
               "id INT AUTO_INCREMENT,".
               "cod_org VARCHAR(2) NOT NULL,".
               "saf INT NOT NULL,".
               "descripcion VARCHAR(90) NOT NULL,".
               "PRIMARY KEY (id)); ";

	mysqli_select_db('sirhal_web');
	$retval = mysqli_query($conn,$sql);
	
	if(!$retval){	  
	echo '<div class="alert alert-danger" role="alert">';
	mysqli_error($conn); 
	echo '</div>';
	}else{
	  echo '<div class="alert alert-success" role="alert">';
	  echo 'Table create Succesfully';
	  echo '</div>';
	 }
}

/*
** Se crea la tabla "liquidadores", es la depositaria de los datos de los usuarios de cada organismo
*/

function createTableLiquidadores($conn){

$sql = "CREATE TABLE liquidadores (".
               "id INT AUTO_INCREMENT,".
               "nombreApellido VARCHAR(30) NOT NULL,".
               "sexo VARCHAR(9) NOT NULL,".
               "dni VARCHAR(8) NOT NULL,".
               "email VARCHAR(20) NOT NULL,".
               "telefono VARCHAR(20) NOT NULL,".
               "organismo VARCHAR(90) NOT NULL,".
               "PRIMARY KEY (id)); ";

	mysqli_select_db('sirhal_web');
	$retval = mysqli_query($conn,$sql);
	
	if(!$retval){	  
	echo '<div class="alert alert-danger" role="alert">';
	mysqli_error($conn); 
	echo '</div>';
	}else{
	  echo '<div class="alert alert-success" role="alert">';
	  echo 'Table create Succesfully';
	  echo '</div>';
	 }

}

/*
** Se crea la tabla "tb_dp", es la depositaria de los datos del archivo de lotes DP
** sus datos serán utilizados para la generación del archivo de lote DP.-
*/

function createTableDP($var1){
  
  $sql = "CREATE TABLE tb_dp (".
               "id INT AUTO_INCREMENT,".
               "cod_arch VARCHAR(3) NOT NULL,".
               "nro_lote int(3) ZEROFILL NOT NULL,".
               "per_lote int(6) NOT NULL,".
               "tipo_dni VARCHAR(3) NOT NULL,".
               "nro_dni int(16) ZEROFILL NOT NULL,".
               "nombreApellido VARCHAR(41) NOT NULL,".
               "f_nac date NOT NULL,".
               "cod_sexo VARCHAR(4) NOT NULL,".
               "cod_est_civ VARCHAR(3) NOT NULL,".
               "cod_inst VARCHAR(2) NOT NULL,".
               "f_ing int(6) NOT NULL,".
               "cod_nac int(2) NOT NULL,".
               "cod_niv_edu VARCHAR(2) NOT NULL,".
               "desc_tit VARCHAR(30) NOT NULL,".
               "cuil_cuit VARCHAR(11) NOT NULL,".
               "sist_prev VARCHAR(1) NOT NULL,".
               "cod_sist_prev VARCHAR(2) NOT NULL,".
               "cod_ob_soc VARCHAR(1) NOT NULL,".
               "nro_afi VARCHAR(14) NOT NULL,".
               "tip_hor VARCHAR(1) NOT NULL,".
               "PRIMARY KEY (id)); ";

	mysqli_select_db('sirhal_web');
	$retval = mysqli_query($var1,$sql);
	
	if(!$retval){	  
	echo '<div class="alert alert-danger" role="alert">';
	mysqli_error($var1); 
	echo '</div>';
	}else{
	  echo '<div class="alert alert-success" role="alert">';
	  echo 'Table create Succesfully';
	  echo '</div>';
	 }
     
}

/*
** Se crea la tabla "tb_ch", es la depositaria de los datos del archivo de lotes CH
** sus datos serán utilizados para la generación del archivo de lote CH.-
*/

function createTableCH($var1){
  
  $sql = "CREATE TABLE tb_ch (".
               "id INT AUTO_INCREMENT,".
               "cod_arch VARCHAR(3) NOT NULL,".
               "nro_lote int(3) ZEROFILL NOT NULL,".
               "per_lote int(6) ZEROFILL NOT NULL,".
               "cod_inst varchar(2) NOT NULL,".
               "cod_esc  int(4) ZEROFILL NOT NULL,".
               "cod_concepto  int(6) NOT NULL,".
               "desc_concepto varchar(40) NOT NULL,".
               "rem_bon int(1) NOT NULL,".
               "tip_concepto int(1) NOT NULL,".
               "PRIMARY KEY (id)); ";

	mysqli_select_db('sirhal_web');
	$retval = mysqli_query($var1,$sql);
	
	if(!$retval){
	  
	echo '<div class="alert alert-danger" role="alert">';
	mysqli_error($var1); 
	echo '</div>';
	}else{
	  echo '<div class="alert alert-success" role="alert">';
	  echo 'Table create Succesfully';
	  echo '</div>';
	 }
  
}


/*
** Se crea la tabla "tb_lh1", es la depositaria de los datos del archivo de lotes LH1
** sus datos serán utilizados para la generación del archivo de lote LH1.-
*/

function createTableLH1($var1){
  
  $sql = "CREATE TABLE tb_lh1 (".
               "id INT AUTO_INCREMENT,".
               "cod_inst VARCHAR(2) NOT NULL,".
               "cod_arch VARCHAR(3) NOT NULL,".
               "nro_lote int(3) ZEROFILL NOT NULL,".
               "per_lote int(6) NOT NULL,".
               "tipo_doc VARCHAR(3) NOT NULL,".
               "nro_doc  int(16) ZEROFILL NOT NULL,".
               "cod_esc  int(4) ZEROFILL NOT NULL,".
               "cod_agrup  VARCHAR(4) NOT NULL,".
               "cod_nivel  VARCHAR(3) NOT NULL,".
               "cod_grado VARCHAR(3) NOT NULL,".
               "cod_uni   VARCHAR(13) NOT NULL,".
               "cod_jur   VARCHAR(2) NOT NULL,".
               "cod_subjur  VARCHAR(2) NOT NULL,".
               "cod_entidad  VARCHAR(3) NOT NULL,".
               "cod_prog   VARCHAR(2) NOT NULL,".
               "cod_subprog  VARCHAR(2) NOT NULL,".
               "cod_proy  VARCHAR(2) NOT NULL,".
               "cod_act  VARCHAR(2) NOT NULL,".
               "cod_geo  VARCHAR(2) NOT NULL,".
               "periodo  int(4) ZEROFILL NOT NULL,".
               "tipo_planta  VARCHAR(1) NOT NULL,".
               "f_ing  date NOT NULL,".
               "cod_fin  int(2) ZEROFILL NOT NULL,".
               "marca_estado  VARCHAR(1) NOT NULL,".
               "PRIMARY KEY (id)); ";

	mysqli_select_db('sirhal_web');
	$retval = mysqli_query($var1,$sql);
	
	if(!$retval){
	  
	echo '<div class="alert alert-danger" role="alert">';
	mysqli_error($var1); 
	echo '</div>';
	}else{
	  echo '<div class="alert alert-success" role="alert">';
	  echo 'Table create Succesfully';
	  echo '</div>';
	 }
  
}

/*
** Se crea la tabla "tb_LH2", es la depositaria de los datos del archivo de lotes LH2
** sus datos serán utilizados para la generación del archivo de lote LH2.-
*/

function createTableLH2($var1){
  
  $sql = "CREATE TABLE tb_lh2 (".
               "id INT AUTO_INCREMENT,".
               "cod_inst VARCHAR(2) NOT NULL,".
               "cod_arch VARCHAR(3) NOT NULL,".
               "nro_lote int(3) ZEROFILL NOT NULL,".
               "per_lote int(6) NOT NULL,".
               "tipo_doc VARCHAR(3) NOT NULL,".
               "nro_doc  int(16) ZEROFILL NOT NULL,".
               "cod_esc  int(4) ZEROFILL NOT NULL,".
               "cod_concepto  int(6) NOT NULL,".
               "importe  float(15,2) ZEROFILL NOT NULL,".
               "tipo_uf  int(2) ZEROFILL NOT NULL,".
               "cant_uf  int(6) ZEROFILL NOT NULL,".
               "periodo  int(4) NOT NULL,".
               "PRIMARY KEY (id)); ";

	mysqli_select_db('sirhal_web');
	$retval = mysqli_query($var1,$sql);
	
	if(!$retval){
	  
	echo '<div class="alert alert-danger" role="alert">';
	mysqli_error($var1); 
	echo '</div>';
	}else{
	  echo '<div class="alert alert-success" role="alert">';
	  echo 'Table create Succesfully';
	  echo '</div>';
	 }
  
}




function agregarUser($nombre,$user,$pass1,$pass2,$permisos,$conn){

		

	$sqlInsert = "INSERT INTO usuarios ".
		"(nombre,user,password,permisos)".
		"VALUES ".
      "('$nombre','$user','$pass1','$permisos')";
		


	if(strcmp($pass2, $pass1) == 0){
		mysqli_query($conn,$sqlInsert);	
		echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-success" role="alert">';
		echo 'Usuario Creado Satisfactoriamente';
		echo "</div>";
		echo "</div>";	
	}else{
		echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-warning" role="alert">';
		echo "Las Contraseñas no Coinciden. Intente Nuevamente!";
		echo "</div>";
		echo "</div>";
	}
}


function buscarUser($nombre,$conn){
		$sql = "SELECT * FROM usuarios where nombre = '$nombre'";
		mysqli_select_db('admin_csc');
		$retval = mysqli_query($conn,$sql);
	
		if(!$retval){
		  echo "<br>";
		  echo '<div class="alert alert-warning" role="alert">';
		  echo 'No Existe Usuario para ' .$nombre;
		  echo '</div>';

		}
		
		while($fila = mysqli_fetch_array($retval)){
			
		  if($retval){
		    $res = $fila['user'];
		      echo "<br>";
		      echo '<div class="alert alert-success" role="alert">';
		      echo 'La persona: ' .$nombre;
		      echo '<br><hr>';
		      echo 'Posee el Usuario: ' .$res;
		      echo "</div>";
	    }
	}
}

	
	 



function updatePass($user,$pass1,$pass2,$conn){

	

    	$sql = "UPDATE usuarios set password = '$pass1' WHERE user = '$user'";
    	mysqli_select_db('sirhal_web');
    	
    	
    	if(strcmp($pass2, $pass1) == 0){
    		
		      mysqli_query($conn,$sql);
			echo "<br>";
			echo '<div class="section"><br>
			      <div class="container">
			      <div class="row">
			      <div class="col-md-12">';
			echo '<div class="alert alert-success" role="alert">';
			echo 'Password Actualizado Satisfactoriamente';
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			
	   	}else{
			echo "<br>";
			echo '<div class="section"><br>
			      <div class="container">
			      <div class="row">
			      <div class="col-md-12">';
			echo '<div class="alert alert-warning" role="alert">';
			echo "Las Contraseñas no Coinciden. Intente Nuevamente!";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			
			

    	}

    
}

function cambiarPermisos($user,$permisos,$conn){

  $sql = "UPDATE usuarios set permisos = '$permisos' where user = '$user'";
  mysqli_select_db('sirhal_web');
  
  if($user){
    mysqli_query($conn,$sql);
    echo "<br>";
			echo '<div class="section"><br>
			      <div class="container">
			      <div class="row">
			      <div class="col-md-12">';
			echo '<div class="alert alert-success" role="alert">';
			echo 'Rol Actualizado Satisfactoriamente';
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
  
  }else{
			echo "<br>";
			echo '<div class="section"><br>
			      <div class="container">
			      <div class="row">
			      <div class="col-md-12">';
			echo '<div class="alert alert-warning" role="alert">';
			echo "El usuario no existe. Intente Nuevamente!";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
	}
 
}

function gentxt($nombre,$password){
  
  $fileName = "gen_pass/$nombre.pass.txt"; 
  //$mensaje = $password;
  
  if (file_exists($fileName)){
  
  //echo "Archivo Existente...";
  //echo "Se actualizaran los datos...";
  $file = fopen($fileName, 'w+') or die("Se produjo un error al crear el archivo");
  
  fwrite($file, $password) or die("No se pudo escribir en el archivo");
  
  fclose($file);
  echo '<div class="section"><br>
	<div class="container">
	<div class="row">
	<div class="col-md-12">';
	echo '<div class="alert alert-success" role="alert">';
	echo "Se ha generado su archivo de password";
	echo "</div>";
  echo "<br><hr>";
  echo '<a href="download_pass.php?file_name='.$fileName.'" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-save"></span> Descargar</a>';
  echo '</div>
	</div>
	</div>
	</div>';
  
  
  }else{
  
      //echo "Se Generará archivo de respaldo..."
      $file = fopen($fileName, 'w') or die("Se produjo un error al crear el archivo");
      fwrite($file, $password) or die("No se pudo escribir en el archivo");
      fclose($file);
      
        echo '<div class="section"><br>
	    <div class="container">
	    <div class="row">
	    <div class="col-md-12">';
        echo '<div class="alert alert-success" role="alert">';
	echo "Se ha generado su archivo de password";
	echo "</div>";
        echo "<br><hr>";
        echo '<a href="download_pass.php?file_name='.$fileName.'" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-save"></span> Descargar</a>';
        echo '</div>
	      </div>
	      </div>
	      </div>';
  
  }
  
  
}


function genPass(){
    //Se define una cadena de caractares.
    //Os recomiendo desordenar las minúsculas, mayúsculas y números para mejorar la probabilidad.
    $string = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890@";
    //Obtenemos la longitud de la cadena de caracteres
    $stringLong = strlen($string);
 
    //Definimos la variable que va a contener la contraseña
    $pass = "";
    //Se define la longitud de la contraseña, puedes poner la longitud que necesites
    //Se debe tener en cuenta que cuanto más larga sea más segura será.
    $longPass=10;
 
    //Creamos la contraseña recorriendo la cadena tantas veces como hayamos indicado
    for($i=1 ; $i<=$longPass ; $i++){
        //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
        $pos = rand(0,$stringLong-1);
 
        //Vamos formando la contraseña con cada carácter aleatorio.
        $pass .= substr($string,$pos,1);
    }
    return $pass;
}

function resetPass($nombre,$email,$conn){

  $password = genPass();
  
  $sql = "UPDATE usuarios SET password = '$password' where nombre = '$nombre'";
  
  $retval = mysqli_query($conn,$sql);
 
  
  if($retval){
    echo '<div class="container">
      <div class="row">
      <div class="col-md-12">';
    
    echo '<div class="alert alert-success" role="alert">';
    echo "Su Password fue blanqueada con Exito!";
    echo "<br>";
    gentxt($nombre,$password);
    //echo 'Y es la siguiente: '.$password;
    echo "</div>";
    echo '</div>
	  </div>
	  </div>';
    
  }else{
    
    echo '<div class="container">
      <div class="row">
      <div class="col-md-12">';
    echo '<div class="alert alert-danger" role="alert">';
    echo "Error al Blanquear Password";
    echo "</div>";
     echo '</div>
	  </div>
	  </div>';
    
  }
 
}


function openFile($file){
  
   $archivo = substr($file,2,2); // se obtiene el codigo de archivo (CH, DP, LH1, LH2)
   
     
   $fp = fopen("../../uploads/files/".$file, "r"); // se procede a abrir el archivo correspondiente
      
    
    switch($archivo){
      
      case "CH": processCH($fp); break; //funcion para procesar los archivos CH
      
      case "DP": processDP($fp); break; // funcion para procesar los archivos DP
      
      case "LH": echo "Es un archivo LH"; break; // funcion para procesar archivos LH
      
      
    }
    
         
      fclose($fp); // cerramos el archivos cargado
 
}


function processCH($fp){
  
  $count = 0;
  
  while(!feof($fp)) {
     
	if($linea = fgets($fp)){
	
	 $Col1 = substr($linea,0,2); // Codigo de Organismo
	 $Col2 = substr($linea,2,4); // Codigo de Escalafón
	 $Col3 = substr($linea,6,6); // Codigo de Concepto
	 $Col4 = substr($linea,12,40); // Descripcion del Concepto
	 $Col5 = substr($linea,52,1); // Remunerativo/Bonificable
	 $Col6 = substr($linea,53,1); // Tipo de Concepto
	 
	 echo $Col1.','.$Col2.','.$Col3.','.$Col4.','.$Col5.','.$Col6;
	 echo "<br>";
	 
	}
	$count++;
      }
      
      fclose($fp);
  
      echo "Cantidad de Lineas del Archivo: " .$count;
  
  
}


function processDP($fp){
  
  $count = 0;
  
  while(!feof($fp)){
    
    if($linea = fgets($fp)){
      
      $col1 = substr($linea,0,3);      // tipo de documento
      $col2 = substr($linea,4,16);     // numero de documento
      $col3 = substr($linea,20,39);    // nombre y apellido
      $col4 = substr($linea,60,8);    // fecha de nacimiento
      $col5 = substr($linea,68,4);     // sexo
      $col6 = substr($linea,72,3);     // estado civil
      $col7 = substr($linea,77,2);     // codigo organismo
      $col8 = substr($linea,81,7);     // fecha ingreso
      $col9 = substr($linea,87,2);     // codigo nacionalidad
      $col10 = substr($linea,89,2);    // codigo nivel estudios
      $col11 = substr($linea,91,30);   // titulo obtenido
      $col12 = substr($linea,121,11);  // cuil/cuit
      $col13 = substr($linea,132,1);   // sistema previsional (R=reparto C=capitalizacion)
      $col14 = substr($linea,133,1);   // codigo de sistema previsional
      $col15 = substr($linea,137,6);   // codigo de obra social
      $col16 = substr($linea,162,1);   // tipo de horario
      
      echo $col1.','.$col2.','.$col3.','.$col4.','.$col5.','.$col6.','.$col7.','.$col8.','.$col9.','.$col10.','.$col11.','.$col12.','.$col13.','.$col14.','.$col15.','.$col16;
      echo "<br>";
      
    }
    $count++;  
  }
      fclose($fp);
  
      echo "Cantidad de Lineas del Archivo: " .$count;
  
}


function isNumeric($var){
  
  if(!is_numeric($var)){
		  echo '<div class="alert alert-danger" role="alert">';
		  echo  "El dato introducido no es numérico: " .$var. " Verifíquelo";
		  echo "</div>";
  }else{
		  echo '<div class="alert alert-success" role="alert">';
		  echo  "El dato es numérico: " .$var;
		  echo "</div>";
  }
  
}

function isString($var){
  
  if(!is_string($var)){
    
		  echo '<div class="alert alert-danger" role="alert">';
		  echo  "El dato introducido no es alfabético: " .$var. " Verifíquelo";
		  echo "</div>";    
  }else{
		  echo '<div class="alert alert-success" role="alert">';
		  echo  "El dato es alfabético: " .$var;
		  echo "</div>";
  }
  
}


function genLoteDP($var1,$var2,$var3,$var4,$var5){

	if(strlen($var3) < 3){
	      echo '<div class="alert alert-danger" role="alert" align="center">';
	      echo '<span class="pull-center "><img src="../../icons/status/dialog-warning.png"  class="img-reponsive img-rounded"> Debe Ingresar mínimo 3 Dígitos';
	      echo "</div>";
	      exit();
	}
	
           
	$sql = "SELECT tipo_dni, nro_dni, RPAD(nombreApellido,40,' ') as nombre, DATE_FORMAT(f_nac,'%Y%m%d') as date , cod_sexo, cod_est_civ, cod_inst, f_ing, cod_nac, cod_niv_edu, RPAD(desc_tit,30,' ') as titulo, cuil_cuit, sist_prev, RPAD(cod_sist_prev,3,' ') as prev, RPAD(cod_ob_soc,9,' ') as ob_soc, RPAD(nro_afi,14,' ') as afi, tip_hor FROM tb_dp WHERE nro_lote = $var3 and cod_inst = '$var1'";
            
	mysqli_select_db('sirhal_web');
	$resval = mysqli_query($var5,$sql);
	
	$file = "$var1$var2$var3.SIR";
	
	if (mysqli_num_rows($resval) != 0) {
	  $jump = "\r\n";
	  $separator1 = " ";
	  $separator2 = "  ";
	  $fp = fopen('../../uploads/files_ok/'.$file, 'w');
	 	  
	  while($row = mysqli_fetch_array($resval)) {
	  $registro = $row['tipo_dni'] . $separator1 . $row['nro_dni'] . $row['nombre'] . $row['date'] . $row['cod_sexo'] .$row['cod_est_civ'] . $separator2 .$row['cod_inst'] .$separator2 .$row['f_ing'] .$row['cod_nac'] .$row['cod_niv_edu'] .$row['titulo'] .$row['cuil_cuit'] . $row['sist_prev'] . $row['prev'] .$separator1. $row['ob_soc'] . $row['afi'] . $separator2. $row['tip_hor'] . $jump;
	  fwrite($fp, $registro);
	  }
	  
	  fclose($fp);
	  chmod($file, 0777);
	  
	  $targetDir = '../../uploads/files_ok/';
	  
	  $sqlInsert = "INSERT INTO files_ok ".
			  "(file_name,upload_on,user_name,cod_org,path_folder)".
			  "VALUES ".
			  "('$file', NOW(),'$var4','$var1','$targetDir')";

			  create_table_files_ok($var5);
			  mysqli_select_db('sirhal_web');
			  $insert = mysqli_query($var5,$sqlInsert);
	  if($insert){
	    
	  echo '<div class="alert alert-success" role="alert" align="center">';
	  echo '<span class="pull-center "><img src="../../icons/actions/dialog-ok-apply.png"  class="img-reponsive img-rounded"> Se han guardado '.mysqli_num_rows($resval).' registros en el archivo: ' .$file;
	  echo "</div>";
	  }else{
	      echo '<div class="alert alert-danger" role="alert" align="center">';
	      echo '<span class="pull-center "><img src="../../icons/status/dialog-warning.png"  class="img-reponsive img-rounded"> Error '.mysqli_error($var5);
	      echo "</div>";
	  }
	  }else{
		//en caso no se haya creado el archivo, muestro un mensaje
		  echo '<div class="alert alert-danger" role="alert" align="center">';
		  echo '<span class="pull-center "><img src="../../icons/status/dialog-warning.png"  class="img-reponsive img-rounded"> Hubo un error al momento de crear el archivo.';
		  echo "</div>"; 
	}
}


function genLoteCH($var1,$var2,$var3,$var4,$var5){

	if(strlen($var3) < 3){
	      echo '<div class="alert alert-danger" role="alert" align="center">';
	      echo '<span class="pull-center "><img src="../../icons/status/dialog-warning.png"  class="img-reponsive img-rounded"> Debe Ingresar mínimo 3 Dígitos';
	      echo "</div>";
	      exit();
	}

        $sql = "SELECT cod_inst,cod_esc,cod_concepto, RPAD(desc_concepto,40,' ') as concepto,rem_bon,tip_concepto FROM tb_ch WHERE nro_lote = $var3 and cod_inst = '$var1'";
        
   	mysqli_select_db('sirhal_web');
	$resval = mysqli_query($var5,$sql);
		
	$file = "$var1$var2$var3.SIR";
	
	if(mysqli_num_rows($resval) != 0){
		  
	  $jump = "\r\n";
	  $fp = fopen('../../uploads/files_ok/'.$file, 'w');
	 	  
	  while($row = mysqli_fetch_array($resval)) {
	  $registro = $row['cod_inst'] . $row['cod_esc'] . $row['cod_concepto'] . $row['concepto'] . $row['rem_bon'] .$row['tip_concepto'] . $jump;
	  fwrite($fp, $registro);
	  }
	  
	  fclose($fp);
	  chmod($file, 0777);
	  
	  $targetDir = '../../uploads/files_ok/';
	  
	  $sqlInsert = "INSERT INTO files_ok ".
			  "(file_name,upload_on,user_name,cod_org,path_folder)".
			  "VALUES ".
			  "('$file', NOW(),'$var4','$var1','$targetDir')";

			  create_table_files_ok($var5);
			  mysqli_select_db('sirhal_web');
			  $insert = mysqli_query($var5,$sqlInsert);
	  if($insert){
	    
	  echo '<div class="alert alert-success" role="alert" align="center">';
	  echo '<span class="pull-center "><img src="../../icons/actions/dialog-ok-apply.png"  class="img-reponsive img-rounded"> Se han guardado '.mysqli_num_rows($resval).' registros en el archivo: ' .$file;
	  echo "</div>";
	  }else{
	      echo '<div class="alert alert-danger" role="alert" align="center">';
	      echo '<span class="pull-center "><img src="../../icons/status/dialog-warning.png"  class="img-reponsive img-rounded"> Error '.mysqli_error($var5);
	      echo "</div>";
	  }
	  }else{
		//en caso no se haya creado el archivo, muestro un mensaje
		  echo '<div class="alert alert-danger" role="alert" align="center">';
		  echo '<span class="pull-center "><img src="../../icons/status/dialog-warning.png"  class="img-reponsive img-rounded"> Hubo un error al momento de crear el archivo.' .mysqli_error($conn);
		  echo "</div>"; 
	}
}


function genLoteLH1($var1,$var2,$var3,$var4,$var5){

	if(strlen($var3) < 3){
	      echo '<div class="alert alert-danger" role="alert" align="center">';
	      echo '<span class="pull-center "><img src="../../icons/status/dialog-warning.png"  class="img-reponsive img-rounded"> Debe Ingresar mínimo 3 Dígitos';
	      echo "</div>";
	      exit();
	}

    
           
	$sql = "SELECT  cod_inst,tipo_doc,nro_doc,cod_esc,cod_agrup,cod_nivel,cod_grado, RPAD(cod_uni,14,'0') as nudo,cod_jur,cod_subjur,cod_entidad,cod_prog,cod_subprog,cod_proy,cod_act,cod_geo,periodo,tipo_planta,DATE_FORMAT(f_ing,'%Y%m%d') as ing,cod_fin,marca_estado FROM tb_lh1 WHERE nro_lote = $var3 and cod_inst = '$var1'";
            
	mysqli_select_db('sirhal_web');
	$resval = mysqli_query($var5,$sql);
	
	$file = "$var1$var2$var3.SIR";
	
	if (mysqli_num_rows($resval) != 0) {
	  $jump = "\r\n";
	  $separator1 = " ";
	  $separator2 = "  ";
	  $separator3 = "   ";
	  $separator6 = "      ";
	  $fp = fopen('../../uploads/files_ok/'.$file, 'w');
	 	  
	  while($row = mysqli_fetch_array($resval)) {
	  $registro = $row['cod_inst'] .$separator2. $row['tipo_doc'] .$separator1. $row['nro_doc'] . $row['cod_esc'] . $row['cod_agrup'] .$separator3. $row['cod_nivel'] .$separator3. $row['cod_grado'] . $row['nudo'] .$separator1. $row['cod_jur'] .$row['cod_subjur'] .$row['cod_entidad'] .$row['cod_prog'] .$row['cod_subprog'] .$row['cod_proy']. $row['cod_act'] .$row['cod_geo'] .$separator6. $row['periodo'] .$row['tipo_planta'] .$row['ing'] .$row['cod_fin'] . $row['marca_estado'] . $jump;
	  fwrite($fp, $registro);
	  }
	  
	  fclose($fp);
	  chmod($file, 0777);
	  
	  $targetDir = '../../uploads/files_ok/';
	  
	  $sqlInsert = "INSERT INTO files_ok ".
			  "(file_name,upload_on,user_name,cod_org,path_folder)".
			  "VALUES ".
			  "('$file', NOW(),'$var4','$var1','$targetDir')";

			  create_table_files_ok($var5);
			  mysqli_select_db('sirhal_web');
			  $insert = mysqli_query($var5,$sqlInsert);
	  if($insert){
	    
	  echo '<div class="alert alert-success" role="alert" align="center">';
	  echo '<span class="pull-center "><img src="../../icons/actions/dialog-ok-apply.png"  class="img-reponsive img-rounded"> Se han guardado '.mysqli_num_rows($resval).' registros en el archivo: ' .$file;
	  echo "</div>";
	  }else{
	      echo '<div class="alert alert-danger" role="alert" align="center">';
	      echo '<span class="pull-center "><img src="../../icons/status/dialog-warning.png"  class="img-reponsive img-rounded"> Error '.mysqli_error($var5);
	      echo "</div>";
	  }
	  }else{
		//en caso no se haya creado el archivo, muestro un mensaje
		  echo '<div class="alert alert-danger" role="alert" align="center">';
		  echo '<span class="pull-center "><img src="../../icons/status/dialog-warning.png"  class="img-reponsive img-rounded"> Hubo un error al momento de crear el archivo.';
		  echo "</div>"; 
	}
}


function genLoteLH2($var1,$var2,$var3,$var4,$var5){

	if(strlen($var3) < 3){
	      echo '<div class="alert alert-danger" role="alert" align="center">';
	      echo '<span class="pull-center "><img src="../../icons/status/dialog-warning.png"  class="img-reponsive img-rounded"> Debe Ingresar mínimo 3 Dígitos';
	      echo "</div>";
	      exit();
	}
           
	$sql = "SELECT cod_inst,tipo_doc,nro_doc,cod_esc,cod_concepto,LPAD(importe,15,'0') as importe,tipo_uf,cant_uf,periodo FROM tb_lh2 WHERE nro_lote = $var3 and cod_inst = '$var1'";
            
	mysqli_select_db('sirhal_web');
	$resval = mysqli_query($var5,$sql);
	
	$file = "$var1$var2$var3.SIR";
	
	if (mysqli_num_rows($resval) != 0) {
	  $jump = "\r\n";
	  $separator1 = " ";
	  $separator2 = "  ";
	  $fp = fopen('../../uploads/files_ok/'.$file, 'w');
	 	  
	  while($row = mysqli_fetch_array($resval)) {
	  $registro =  $row['cod_inst'] .$separator2. $row['tipo_doc'] . $separator1. $row['nro_doc'] . $row['cod_esc'] . $row['cod_concepto'] .$row['importe'] .$row['tipo_uf'] . $row['cant_uf'] .$row['periodo'] . $jump;
	  fwrite($fp, $registro);
	  }
	  
	  fclose($fp);
	  chmod($file, 0777);
	  
	  $targetDir = '../../uploads/files_ok/';
	  
	  $sqlInsert = "INSERT INTO files_ok ".
			  "(file_name,upload_on,user_name,cod_org,path_folder)".
			  "VALUES ".
			  "('$file', NOW(),'$var4','$var1','$targetDir')";

			  create_table_files_ok($var5);
			  mysqli_select_db('sirhal_web');
			  $insert = mysqli_query($var5,$sqlInsert);
	  if($insert){
	    
	  echo '<div class="alert alert-success" role="alert" align="center">';
	  echo '<span class="pull-center "><img src="../../icons/actions/dialog-ok-apply.png"  class="img-reponsive img-rounded"> Se han guardado '.mysqli_num_rows($resval).' registros en el archivo: ' .$file;
	  echo "</div>";
	  }else{
	      echo '<div class="alert alert-danger" role="alert" align="center">';
	      echo '<span class="pull-center "><img src="../../icons/status/dialog-warning.png"  class="img-reponsive img-rounded"> Error '.mysqli_error($var5);
	      echo "</div>";
	  }
	  }else{
		//en caso no se haya creado el archivo, muestro un mensaje
		  echo '<div class="alert alert-danger" role="alert" align="center">';
		  echo '<span class="pull-center "><img src="../../icons/status/dialog-warning.png"  class="img-reponsive img-rounded"> Hubo un error al momento de crear el archivo.';
		  echo "</div>"; 
	}
}

/*
** Funcion generadora de archivo Excel a partir de tabla fils_ok
*/

function genExcel($var1,$var2){


	$sql = "SELECT * FROM files_ok where cod_org = '$var1'";
            
	mysqli_select_db('sirhal_web');
	$resval = mysqli_query($var2,$sql);
	
	$file = "lotes.xls";
	
	if (mysqli_num_rows($resval) != 0){
	  $jump = "\r\n";
	  $separator = ",";
	  $fp = fopen('../../docs/'.$file, 'w');
	 	  
	  while($row = mysqli_fetch_array($resval)) {
	  $registro =  $row['file_name'] .$separator. $row['upload_on'] . $separator. $row['user_name'] .$separator. $row['cod_org'] . $jump;
	  fwrite($fp, $registro);
	  }
	  
	  fclose($fp);
	  chmod($file, 0777);
	  
	  
	  if($file){
	     $path = '../../docs/'.$file;
	  
	  if(is_file($path)){
	    header('Content-Type: application/force-download');
	    header('Content-Disposition: attachment; filename='.$file);
	    header('Content-Transfer-Encoding: binary');
	    header('Content-Length: '.filesize($path));

	    readfile($path);
	  }
	  }else{
	    exit();
	    }
	    
	   }
	   }
	  

?>