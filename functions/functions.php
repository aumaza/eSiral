<?php

function createTable(){

			
		$sql = "CREATE TABLE usuarios(".
		      "id INT AUTO_INCREMENT,".
		      "nombre VARCHAR(50),".
		      "user VARCHAR(15),".
		      "password VARCHAR(10),".
		      "roles INT".
		      "PRIMARY KEY (id)); ";

	$retval = mysql_query($sql);
	
	if(!$retval)
	{
		mysql_error();
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


function create_table_files(){


$sql = "CREATE TABLE files (".
      "id INT AUTO_INCREMENT,".
      "file_name VARCHAR(255),".
      "user_name VARCHAR(60),".
      "path_folder VARCHAR(60),".
      "upload_on datetime NOT NULL,".
      "status enum('1','0') NOT NULL DEFAULT 1,".
      "PRIMARY KEY (id)); ";

	mysql_select_db('sirhal_web');
	$retval = mysql_query($sql);
	
	if(!$retval)
	{
		mysql_error(); 	
	}
	
	else
	 {	
		echo 'Table create Succesfully\n';
	 }
   
}

function create_table_files_ok(){


$sql = "CREATE TABLE files_ok (".
      "id INT AUTO_INCREMENT,".
      "file_name VARCHAR(255),".
      "user_name VARCHAR(60),".
      "path_folder VARCHAR(60),".
      "upload_on datetime NOT NULL,".
      "status enum('1','0') NOT NULL DEFAULT 1,".
      "PRIMARY KEY (id)); ";

	mysql_select_db('sirhal_web');
	$retval = mysql_query($sql);
	
	if(!$retval)
	{
		mysql_error(); 	
	}
	
	else
	 {	
		echo 'Table create Succesfully\n';
	 }
   
}


function createTableCH(){
  
  $sql = "CREATE TABLE tb_ch (".
               "id INT AUTO_INCREMENT,".
               "cod_arch VARCHAR(3) NOT NULL,".
               "nro_lote int(3) ZEROFILL NOT NULL,".
               "per_lote int(6) NOT NULL,".
               "cod_inst varchar(2) NOT NULL,".
               "cod_esc  int(4) ZEROFILL NOT NULL,".
               "cod_concepto  int(6) NOT NULL,".
               "desc_concepto varchar(40) NOT NULL,".
               "rem_bon int(1) NOT NULL,".
               "tip_concepto int(1) NOT NULL,".
               "PRIMARY KEY (id)); ";

	mysql_select_db('sirhal_web');
	$retval = mysql_query($sql);
	
	if(!$retval){
	  
	echo '<div class="alert alert-danger" role="alert">';
	mysql_error(); 
	echo '</div>';
	}else{
	  echo '<div class="alert alert-success" role="alert">';
	  echo 'Table create Succesfully';
	  echo '</div>';
	 }
  
}

function createTableLH1(){
  
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

	mysql_select_db('sirhal_web');
	$retval = mysql_query($sql);
	
	if(!$retval){
	  
	echo '<div class="alert alert-danger" role="alert">';
	mysql_error(); 
	echo '</div>';
	}else{
	  echo '<div class="alert alert-success" role="alert">';
	  echo 'Table create Succesfully';
	  echo '</div>';
	 }
  
}







function agregarUser($nombre,$user,$pass1,$pass2,$permisos){

		

	$sqlInsert = "INSERT INTO usuarios ".
		"(nombre,user,password,permisos)".
		"VALUES ".
      "('$nombre','$user','$pass1','$permisos')";
		


	if(strcmp($pass2, $pass1) == 0) 
	{
		mysql_query($sqlInsert);	
		echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-success" role="alert">';
		echo 'Usuario Creado Satisfactoriamente';
		echo "</div>";
		echo "</div>";
	
	}

	else
	{
		echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-warning" role="alert">';
		echo "Las Contraseñas no Coinciden. Intente Nuevamente!";
		echo "</div>";
		echo "</div>";
		
	}
}


function buscarUser($nombre){

		$sql = "SELECT * FROM usuarios where nombre = '$nombre'";
		mysql_select_db('admin_csc');
		$retval = mysql_query($sql);
	
		if(!$retval)
		{
		  echo "<br>";
		  echo '<div class="alert alert-warning" role="alert">';
		  echo 'No Existe Usuario para ' .$nombre;
		  echo '</div>';

		}


		while($fila = mysql_fetch_array($retval))
		{
			
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

	
	 



function updatePass($user,$pass1,$pass2){

	

    	$sql = "UPDATE usuarios set password = '$pass1' WHERE user = '$user'";
    	mysql_select_db('sirhal_web');
    	
    	
    	if(strcmp($pass2, $pass1) == 0)
    	{
    		mysql_query($sql);
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
			
	   	}

    	else
    	{
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

function cambiarPermisos($user,$permisos){

  $sql = "UPDATE usuarios set permisos = '$permisos' where user = '$user'";
  mysql_select_db('sirhal_web');
  
  if($user){
    mysql_query($sql);
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

function resetPass($nombre,$email){

  $password = genPass();
  
  $sql = "UPDATE usuarios SET password = '$password' where nombre = '$nombre'";
  
  $retval = mysql_query($sql);
 
  
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


?>