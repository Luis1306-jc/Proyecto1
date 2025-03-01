<?php
     
  $conexion = new mysqli("localhost","root","mysql123","transporte");
  
  $consulta = $conexion->query("SELECT * FROM tipo_camion");
  
  if($consulta==1){
    $tipos = "";
    while($fila = $consulta->fetch_array()){
      $tipos .= $fila[0] . ",";
    }
    // Elimina la coma extra al final de la cadena
    $tipos = rtrim($tipos, ",");
    echo $tipos;
    $conexion->close();
  }

?>
