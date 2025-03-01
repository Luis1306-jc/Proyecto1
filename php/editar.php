<?php
// Conectar a la base de datos
require('cone.php');

// Establecer codificación para evitar problemas con caracteres especiales
$cn->set_charset("utf8");

// Verificar la conexión
if ($cn->connect_error) {
    die("<script>
        window.onload = function() {
            Swal.fire({
                title: 'Error',
                text: 'Error en la conexión a la base de datos: " . addslashes($cn->connect_error) . "',
                icon: 'error',
                confirmButtonText: 'Intentar de nuevo'
            }).then(() => {
                window.location.href = '../SEDENA.html';
            });
        };
    </script>");
}

// Obtener los datos del formulario (evitando errores si alguna variable no existe)
$folio = $_POST['folio_php'] ?? '';
$sill = $_POST['sill_php'] ?? '';
$serie = $_POST['serie_php'] ?? '';
$falla = $_POST['falla_php'] ?? '';
$uu = $_POST['uu_php'] ?? '';
$fecha = $_POST['fecha_php'] ?? '';
$equipo = $_POST['equipo_php'] ?? '';
$marca = $_POST['marca_php'] ?? '';
$modelo = $_POST['modelo_php'] ?? '';
$situacion = $_POST['situacion_php'] ?? '';
$oficio = $_POST['oficioR_php'] ?? '';
$noOficio = $_POST['oficio_php'] ?? '';
$fechaOficio = $_POST['fecha_oficio_php'] ?? '';
$observacion = $_POST['observacion_php'] ?? '';
$descripcion = $_POST['desc_php'] ?? '';
$parte = $_POST['parte_php'] ?? '';
$num_serie = $_POST['num_serie_php'] ?? '';
$reparacion = $_POST['reparacion_php'] ?? '';
$fechaTermino = $_POST['termino_php'] ?? '';
$responsable = $_POST['responsable_php'] ?? '';
$verificacion = $_POST['verificacion_php'] ?? '';

// Validar que el folio no esté vacío
if (empty($folio)) {
    echo "<script>
        window.onload = function() {
            Swal.fire({
                title: 'Error',
                text: 'No se recibió el folio.',
                icon: 'error',
                confirmButtonText: 'Intentar de nuevo'
            }).then(() => {
                window.location.href = '../SEDENA.html';
            });
        };
    </script>";
    exit();
}

// Usar una consulta preparada para evitar inyección SQL
$query = "UPDATE sti SET 
    sill = ?, serie = ?, falla = ?, uu = ?, fecha = ?, equipo = ?, marca = ?, modelo = ?, situacion = ?, 
    oficio = ?, noOficio = ?, fechaOficio = ?, observacion = ?, descripcion = ?, parte = ?, 
    num_serie = ?, reparacion = ?, fechaTermino = ?, responsable = ?, verificacion = ?
    WHERE folio = ?";

$stmt = $cn->prepare($query);

if (!$stmt) {
    echo "<script>
        window.onload = function() {
            Swal.fire({
                title: 'Error',
                text: 'Error en la preparación de la consulta: " . addslashes($cn->error) . "',
                icon: 'error',
                confirmButtonText: 'Intentar de nuevo'
            }).then(() => {
                window.location.href = '../SEDENA.html';
            });
        };
    </script>";
    exit();
}

// Vincular los parámetros a la consulta (21 en total)
$stmt->bind_param(
    "sssssssssssssssssssss", 
    $sill, $serie, $falla, $uu, $fecha, $equipo, $marca, $modelo, $situacion, 
    $oficio, $noOficio, $fechaOficio, $observacion, $descripcion, $parte, 
    $num_serie, $reparacion, $fechaTermino, $responsable, $verificacion, $folio
);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "<script>
        window.onload = function() {
            Swal.fire({
                title: 'Registro Actualizado',
                text: 'El registro se actualizó correctamente.',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                window.location.href = '../SEDENA.html';
            });
        };
    </script>";
} else {
    echo "<script>
        window.onload = function() {
            Swal.fire({
                title: 'Error',
                text: 'Hubo un error al actualizar el registro: " . addslashes($stmt->error) . "',
                icon: 'error',
                confirmButtonText: 'Intentar de nuevo'
            }).then(() => {
                window.location.href = '../SEDENA.html';
            });
        };
    </script>";
}

// Cerrar la consulta y la conexión
$stmt->close();
$cn->close();
?>

<!-- Agregar SweetAlert2 (CDN) -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
