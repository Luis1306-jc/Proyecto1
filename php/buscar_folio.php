<?php

header('Content-Type: application/json');

if (!isset($_POST['sill'])) {
    echo json_encode([
        "success" => false,
        "message" => "Folio no especificado."
    ]);
    exit();
}

$sill = $_POST['sill'];

$conexion = new mysqli("localhost", "root", "", "sedena");

if ($conexion->connect_errno) {
    echo json_encode([
        "success" => false,
        "message" => "Error de conexión a la base de datos."
    ]);
    exit();
}

$consulta = $conexion->prepare("SELECT * FROM sti WHERE sill = ?");
$consulta->bind_param("s", $sill);
$consulta->execute();
$resultado = $consulta->get_result();

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    $datos = "Folio: " . $fila['folio'] . "\n"; 

    $datos .= "Sill: " . $fila['sill'] . "\n";
    $datos .= "Serie: " . $fila['serie'] . "\n";
    $datos .= "Falla: " . $fila['falla'] . "\n";
    $datos .= "UU: " . $fila['uu'] . "\n";
    $datos .= "Fecha: " . $fila['fecha'] . "\n";
    $datos .= "Equipo: " . $fila['equipo'] . "\n";
    $datos .= "Marca: " . $fila['marca'] . "\n";
    $datos .= "Modelo: " . $fila['modelo'] . "\n";
    $datos .= "Situación: " . $fila['situacion'] . "\n";
    $datos .= "Oficio: " . $fila['oficio'] . "\n";
    $datos .= "Tarjeta: " . $fila['tarjeta'] . "\n";
    $datos .= "Cei: " . $fila['cei'] . "\n";
    $datos .= "Fca: " . $fila['fca'] . "\n";
    $datos .= "NoOficio: " . $fila['noOficio'] . "\n";
    $datos .= "Observacion: " . $fila['observacion'] . "\n";
    $datos .= "Piezas: " . $fila['piezas'] . "\n";
    $datos .= "Descripcion: " . $fila['desc'] . "\n";
    $datos .= "Parte: " . $fila['parte'] . "\n";
    $datos .= "Num_serie: " . $fila['num_serie'] . "\n";
    $datos .= "Reparacion: " . $fila['reparacion'] . "\n";
    $datos .= "FechaTermino: " . $fila['fechaTermino'] . "\n";
    $datos .= "Reparacion: " . $fila['reparacion'] . "\n";
    $datos .= "responsable: " . $fila['responsable'] . "\n";
    $datos .= "Verificacion: " . $fila['verificacion'] . "\n";
    


    echo json_encode([
        "success" => true,
        "message" => $datos
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "No se encontró el registro con el sill especificado."
    ]);
}

$conexion->close();
?>
