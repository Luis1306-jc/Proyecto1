<?php  
   $clave=$_POST['php_clave']; 
   $nombre=$_POST['php_nombre']; 
   $paterno=$_POST['php_paterno']; 
   $materno=$_POST['php_materno']; 
   $nacimiento=$_POST['php_nacimiento']; 
   $telefono=$_POST['php_telefono']; 
   $correo=$_POST['php_correo']; 
   $sexo=$_POST['php_sexo'];
   $modelo=$_POST['php_modelo']; 
   $marca=$_POST['php_marca']; 
   $matricula=$_POST['php_matricula']; 
   $fabricacion=$_POST['php_fabricacion']; 
   $capacidad=$_POST['php_capacidad']; 
   $tipo=$_POST['php_tipo']; 

   $toneladas = $capacidad / 1000;

   $cn=new mysqli("localhost", "root", "mysql123","transporte");
    
   if(! $cn->connect_errno ) {
      echo("Conexión exitosa");

      $insertar=$cn->query("insert into registro values
      ('$clave', '$nombre', '$paterno', '$materno', '$nacimiento', '$sexo', '$telefono', '$correo', '$modelo', '$marca', '$matricula', '$fabricacion', '$tipo', '$toneladas')");
  
      if($insertar==1){          
         echo("El registro se guardo  correctamente=".!$cn->connect_errno. "Insertar =". $insertar); 
      }
      else{
         echo("No se guardo el registro".$cn->error."insertar=".$insertar);
      }
      $cn->close();
   }
?>
