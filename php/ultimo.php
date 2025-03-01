<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Último Registro</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

    <h2>Último Registro de la Base de Datos</h2>

    <?php
    require('cone.php'); // Asegúrate de que este archivo contiene la conexión a la base de datos.

    // Consultar el último registro de la base de datos
    $stmt_last = $cn->prepare("SELECT * FROM sti ORDER BY ID DESC LIMIT 1");
    if (!$stmt_last) {
        echo "Error en la preparación de la consulta: " . $cn->error;
        exit;
    }

    $stmt_last->execute();
    $result_last = $stmt_last->get_result();

    if ($result_last->num_rows > 0) {
        // Extraer el último registro
        $last_record = $result_last->fetch_assoc();

        // Crear la tabla HTML con los datos del último registro
        echo "<table>
                <thead>
                    <tr>
                        <th>Campo</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>";

        // Iterar sobre las claves y valores del registro y añadir filas a la tabla
        foreach ($last_record as $key => $value) {
            echo "<tr>
                    <td><strong>$key</strong></td>
                    <td>$value</td>
                </tr>";
        }

        echo "</tbody></table>";
    } else {
        // Si no hay registros, mostrar un SweetAlert
        echo "
        <script>
            Swal.fire({
                title: 'No hay registros',
                text: 'No se han encontrado registros en la base de datos.',
                icon: 'warning',
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirigir a la página SEDENA.HTML
                    window.location.href = '../SEDENA.HTML'; // Cambia esta URL si es necesario
                }
            });
        </script>";
    }

    // Cierra la declaración
    $stmt_last->close();
    ?>

    <!-- Enlace para regresar a la página SEDENA.HTML -->
    <br>
    <a href="../SEDENA.HTML">Regresar a la página principal</a>

</body>
</html>
