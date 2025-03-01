document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formBuscar").addEventListener("submit", function (event) {
        event.preventDefault();

        const folio = document.getElementById("folio").value.trim();

        if (!folio) {
            Swal.fire("Error", "Por favor, ingresa un folio válido.", "error");
            return;
        }

        fetch("php/buscar_registro.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `folio_php=${encodeURIComponent(folio)}`
        })
            .then(response => response.json())
            .then(data => {
                if (data.exito) {
                    document.getElementById("txt_folio").value = data.folio || "";
                    document.getElementById("txt_sill").value = data.sill || "";
                    document.getElementById("txt_serie").value = data.serie || "";
                    document.getElementById("txt_falla").value = data.falla || "";
                    document.getElementById("txt_uu").value = data.uu || "";
                    document.getElementById("txt_fecha").value = data.fecha || "";
                    document.getElementById("txt_equipo").value = data.equipo || "";
                    document.getElementById("txt_marca").value = data.marca || "";
                    document.getElementById("txt_modelo").value = data.modelo || "";
                    document.getElementById("txt_situacion").value = data.situacion || "";
                    document.getElementById("select_oficio").value = data.oficio || "";
                    document.getElementById("txt_info_seleccionada").value = data.oficio || "";
                    Swal.fire("Éxito", "Registro cargado correctamente.", "success");
                } else {
                    Swal.fire("Error", "No se encontró un registro con ese folio.", "error");
                }
            })
            .catch(error => {
                console.error("Error:", error);
                Swal.fire("Error", "Hubo un problema en la búsqueda.", "error");
            });
    });
});
