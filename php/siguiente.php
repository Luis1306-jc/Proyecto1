<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Registros</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php
require('cone.php'); // Asegúrate de que este archivo contiene la conexión a la base de datos.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el último registro de la tabla (con el ID más alto)
    $stmt_last = $cn->prepare("SELECT * FROM sti ORDER BY ID DESC LIMIT 1");

    if (!$stmt_last) {
        echo "Error en la preparación de la consulta: " . $cn->error;
        exit;
    }

    $stmt_last->execute();
    $result_last = $stmt_last->get_result();

    if ($result_last->num_rows > 0) {
        $last_record = $result_last->fetch_assoc(); // Último registro
        $last_id = $last_record['ID']; // ID del último registro

        // Obtener el registro anterior (ID - 1)
        $stmt_previous = $cn->prepare("SELECT * FROM sti WHERE ID = ? LIMIT 1");
        $previousID = $last_id - 1;
        $stmt_previous->bind_param("i", $previousID);
        $stmt_previous->execute();
        $result_previous = $stmt_previous->get_result();

        if ($result_previous->num_rows > 0) {
            $previous_record = $result_previous->fetch_assoc(); // Registro anterior
            $previous_id = $previous_record['ID']; // ID del registro anterior

            // Obtener el siguiente registro al anterior (ID + 1)
            $stmt_next = $cn->prepare("SELECT * FROM sti WHERE ID = ? LIMIT 1");

            if ($stmt_next) { // Verifica si la preparación fue exitosa
                $nextID = $previous_id + 1;
                $stmt_next->bind_param("i", $nextID);
                $stmt_next->execute();
                $result_next = $stmt_next->get_result();

                if ($result_next->num_rows > 0) {
                    $next_record = $result_next->fetch_assoc(); // Registro siguiente al anterior
                } else {
                    $next_record = null; // No hay siguiente registro
                }

                // Libera resultados y cierra la declaración correctamente
                $result_next->free();
                $stmt_next->close();
            } else {
                echo "Error en la preparación de la consulta: " . $cn->error;
            }

        } else {
            $previous_record = null; // No hay registro anterior
            $next_record = null;
        }

        // Mostrar solo el registro siguiente en una tabla HTML
        echo "<h2>Registro Siguiente</h2>";
        if ($next_record) {
            echo "<table><tr><th>ID</th><th>Folio</th><th>SILL</th><th>Serie</th><th>Falla</th><th>Equipo</th><th>Marca</th><th>Modelo</th><th>Situación</th></tr>";
            echo "<tr>
                    <td>{$next_record['ID']}</td>
                    <td>{$next_record['folio']}</td>
                    <td>{$next_record['sill']}</td>
                    <td>{$next_record['serie']}</td>
                    <td>{$next_record['falla']}</td>
                    <td>{$next_record['equipo']}</td>
                    <td>{$next_record['marca']}</td>
                    <td>{$next_record['modelo']}</td>
                    <td>{$next_record['situacion']}</td>
                  </tr>";
            echo "</table>";
        } else {
            echo "<p>No hay siguiente registro.</p>";
        }

    } else {
        echo "<div>No se encontraron registros en la base de datos.</div>";
    }

    // Cierra las declaraciones
    $stmt_last->close();
    $stmt_previous->close();
}
?>

<!-- Enlace para regresar a la página SEDENA.HTML -->
<br>
<a href="../SEDENA.HTML">Regresar a la página principal</a>

</body>
</html>
