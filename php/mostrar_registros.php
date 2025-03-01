<?php
require('cone.php');

// Obtener todos los registros de la tabla 'sti'
$query = "SELECT * FROM sti";
$result = $cn->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar y Eliminar Registros</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td, th {
            padding: 10px;
            text-align: left;
            border: 1px solid #ccc;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h2>Actualizar y Eliminar Registros</h2>
    
    <table>
        <thead>
            <tr>
                <th>Folio</th>
                <th>No. CTL S.I.L</th>
                <th>Serie</th>
                <th>Falla</th>
                <th>Fecha</th>
                <th>Equipo</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['folio']; ?></td>
                    <td><?php echo $row['sill']; ?></td>
                    <td><?php echo $row['serie']; ?></td>
                    <td><?php echo $row['falla']; ?></td>
                    <td><?php echo $row['fecha']; ?></td>
                    <td><?php echo $row['equipo']; ?></td>
                    <td><?php echo $row['marca']; ?></td>
                    <td><?php echo $row['modelo']; ?></td>
                    <td>
                        <!-- Botón para actualizar -->
                        <form action="mostrar_registro_editar.php" method="post">
                            <input type="hidden" name="sill_php" value="<?php echo $row['sill']; ?>">
                            <input type="submit" value="Actualizar">
                        </form>
                        <!-- Botón para eliminar -->
                        <form action="borrar.php" method="post" onsubmit="return confirm('¿Estás seguro de eliminar este registro?');">
                            <input type="hidden" name="sill_php" value="<?php echo $row['sill']; ?>">
                            <input type="submit" value="Eliminar" style="background-color: red;">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>

<?php
// Cerrar la conexión
$cn->close();
?>
