<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    
</body>
</html>

<?php 
require('cone.php');

// Obtener el valor de 'sill' desde el formulario
$CLAVE = isset($_POST['sill_php']) ? $_POST['sill_php'] : '';

if ($CLAVE != '') {
    // Consultar si existe un registro con el valor de 'sill'
    $buscar = $cn->query("SELECT * FROM sti WHERE sill = '$CLAVE'");

    if ($buscar && $buscar->num_rows > 0) {
        // Realizar la eliminación del registro
        $cn->query("DELETE FROM sti WHERE sill = '$CLAVE'");
        
        if ($cn->affected_rows > 0) {
            echo "<script>
                    Swal.fire({
                        title: 'Éxito!',
                        text: 'Registro eliminado correctamente.',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    }).then(function() {
                        window.location = '../SEDENA.HTML';
                    });
                  </script>";
        } else {
            echo "<script>
                    Swal.fire({
                        title: 'Error',
                        text: 'No se pudo eliminar el registro.',
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    }).then(function() {
                        window.location = '../SEDENA.HTML';
                    });
                  </script>";
        }
    } else {
        echo "<script>
                Swal.fire({
                    title: 'No encontrado',
                    text: 'No existe el registro con sill = \"$CLAVE\".',
                    icon: 'info',
                    confirmButtonText: 'Aceptar'
                }).then(function() {
                    window.location = '../borrar.html';
                });
              </script>";
    }
} else {
    echo "<script>
            Swal.fire({
                title: 'Advertencia',
                text: 'Debe ingresar un valor para \"sill\".',
                icon: 'warning',
                confirmButtonText: 'Aceptar'
            }).then(function() {
                window.location = '../borrar.html';
            });
          </script>";
}

$cn->close();
?>
