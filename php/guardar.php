<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro</title>
</head>
<body>
    
</body>
</html>

<?php
// Obtener los datos del formulario
$folio = $_POST['folio_php'];
$sill = $_POST['sill_php'];
$serie = $_POST['serie_php'];
$falla = $_POST['falla_php'];
$uu = $_POST['uu_php'];
$fecha = $_POST['fecha_php'];
$equipo = $_POST['equipo_php'];
$marca = $_POST['marca_php'];
$modelo = $_POST['modelo_php'];
$situacion = $_POST['situacion_php'];

$oficio = $_POST['oficioR_php'];
$noOficio = $_POST['oficio_php'];
$fechaOficio = $_POST['fecha_oficio_php']; // Aquí recogemos el valor del select
$observacion = $_POST['observacion_php'];
$piezas = $_POST['piezas_php'];
$descripcion = $_POST['desc_php'];
$parte = $_POST['parte_php'];
$num_serie = $_POST['num_serie_php'];
$reparacion = $_POST['reparacion_php'];
$fechaTermino = $_POST['termino_php'];
$responsable = $_POST['responsable_php'];
$verificacion = $_POST['verificacion_php'];

// Conectar a la base de datos
require('cone.php');

if (!$cn->connect_errno) {
    // Verificar si el sill ya existe
    $verificar = $cn->query("SELECT sill FROM sti WHERE sill = '$sill'");
    
    if ($verificar->num_rows > 0) {
        // Si el registro ya existe, mostrar una alerta de SweetAlert
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                title: 'Registro Existente',
                text: 'El registro con el sill $sill ya existe en la base de datos.',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then(() => {
                // Redirigir a SEDENA.HTML cuando el usuario hace clic en 'OK'
                window.location.href = 'SEDENA.HTML'; 
            });
        </script>";
    } else {
        // Si el registro no existe, realizar la inserción
        $insertar = $cn->query("INSERT INTO sti (folio, sill, serie, falla, uu, fecha, equipo, marca, modelo, situacion, oficio, noOficio, fechaOficio, observacion, piezas, descripcion, parte, num_serie, reparacion, fechaTermino, responsable, verificacion)
        VALUES ('$folio', '$sill', '$serie', '$falla', '$uu', '$fecha', '$equipo', '$marca', '$modelo', '$situacion', '$oficio', '$noOficio', '$fechaOficio', '$observacion', '$piezas', '$descripcion','$parte','$num_serie', '$reparacion', '$fechaTermino', '$responsable', '$verificacion')");

        if ($insertar) {
            // Si el registro fue insertado correctamente, mostrar la alerta con el valor seleccionado de 'situacion'
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                Swal.fire({
                    title: 'Registro Exitoso',
                    text: 'El registro fue guardado correctamente',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    // Redirigir a SEDENA.HTML cuando el usuario hace clic en 'OK'
                    window.location.href = '../SEDENA.html';
                });
            </script>";
        } else {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                Swal.fire({
                    title: 'Error al Registrar',
                    text: 'ERROR_REGISTRO: " . $cn->error . "',
                    icon: 'error',
                    confirmButtonText: 'Intentar de nuevo'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.history.back();
                    }
                });
            </script>";
        }
    }

    // Cerrar la conexión
    $cn->close();
} else {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        Swal.fire({
            title: 'Error de Conexión',
            text: 'ERROR_CONEXION: " . $cn->connect_errno . "',
            icon: 'error',
            confirmButtonText: 'Intentar de nuevo'
        }).then((result) => {
            if (result.isConfirmed) {
                window.history.back();
            }
        });
    </script>";
}
?>
