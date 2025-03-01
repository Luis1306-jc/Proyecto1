<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Anterior</title>
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

    <h2>Registro Anterior de la Base de Datos</h2>

    <?php
    require('cone.php'); // Asegúrate de que este archivo contiene la conexión a la base de datos.

    // Obtener el penúltimo registro de la tabla 'sti'
    $stmt_previous = $cn->prepare("SELECT * FROM sti ORDER BY ID DESC LIMIT 2");
    if (!$stmt_previous) {
        echo "Error en la preparación de la consulta: " . $cn->error;
        exit;
    }

    $stmt_previous->execute();
    $result_previous = $stmt_previous->get_result();

    if ($result_previous->num_rows == 2) {
        // Recuperar el penúltimo registro
        $records = $result_previous->fetch_all(MYSQLI_ASSOC);
        $previous_record = $records[1]; // Penúltimo registro

        // Mostrar el penúltimo registro en una tabla HTML
        echo "<table><thead><tr><th>Campo</th><th>Valor</th></tr></thead><tbody>";
        
        // Iterar sobre el penúltimo registro y mostrar sus datos en la tabla
        foreach ($previous_record as $key => $value) {
            echo "<tr>
                    <td><strong>$key</strong></td>
                    <td>$value</td>
                </tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "<div>No se encontraron suficientes registros en la base de datos.</div>";
    }

    // Cierra la declaración
    $stmt_previous->close();
    ?>

    <!-- Enlace para regresar a la página SEDENA.HTML -->
    <br>
    <a href="../SEDENA.HTML">Regresar a la página principal</a>

</body>
</html>
