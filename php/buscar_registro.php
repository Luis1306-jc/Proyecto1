<?php
require('cone.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['folio_php']) || empty($_POST['folio_php'])) {
        echo json_encode(["exito" => false, "error" => "Folio vacío"]);
        exit;
    }

    $folio = $_POST['folio_php'];

    $consulta = $cn->prepare("SELECT * FROM sti WHERE folio = ?");
    
    if (!$consulta) {
        die(json_encode(["exito" => false, "error" => $cn->error]));
    }

    $consulta->bind_param("s", $folio);
    $consulta->execute();
    $resultado = $consulta->get_result();

    if ($resultado->num_rows > 0) {
        $registro = $resultado->fetch_assoc();

        // Convertir fechas a formato compatible con HTML
        $registro['fecha'] = !empty($registro['fecha']) ? date("Y-m-d", strtotime($registro['fecha'])) : "";
        $registro['fecha_oficio'] = !empty($registro['fecha_oficio']) ? date("Y-m-d", strtotime($registro['fecha_oficio'])) : "";

        echo json_encode(array_merge(["exito" => true], $registro));
    } else {
        echo json_encode(["exito" => false, "error" => "No se encontró el folio"]);
    }

    $consulta->close();
    $cn->close();
}
?>
