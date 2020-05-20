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
  
   $fp = fopen("../../uploads/files/".$file, "r");
   $count = 0;
   $chars = 0;
   
      
    while(!feof($fp)) {
     
	if($linea = fgets($fp)){
	
	 $Col1 = substr($linea,0,2); // Codigo de Organismo
	 $Col2 = substr($linea,2,10); // Codigo de Concepto
	 $Col3 = substr($linea,12,40); // Descripcion de Concepto
	 $Col4 = substr($linea,52); // Codigo ?
	 
	}
	$count++;
      }
      
      fclose($fp);
  
      echo "Cantidad de Lineas del Archivo: " .$count;
      echo "<br>";
      
      
      
     
      
      

  
}


?>