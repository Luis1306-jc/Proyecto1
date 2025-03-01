document.getElementById("buscarFolioBtn").addEventListener("click", function () {
    const folio = document.getElementById("folioInput").value;

    if (!folio) {
        Swal.fire({
            title: 'Error',
            text: 'Por favor, ingresa un folio.',
            icon: 'warning',
            confirmButtonText: 'Aceptar'
        });
        return;
    }

    fetch("php/buscar_folio.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `sill=${folio}`
    })
        .then(response => {
            if (!response.ok) {
                throw new Error("Error en la respuesta de la red");
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                Swal.fire({
                    title: 'Datos del Equipo',
                    text: data.message,
                    icon: 'info',
                    confirmButtonText: 'Cerrar'
                });
            } else {
                Swal.fire({
                    title: 'No encontrado',
                    text: data.message,
                    icon: 'warning',
                    confirmButtonText: 'Aceptar'
                });
            }
        })
        .catch(error => {
            Swal.fire({
                title: 'Error',
                text: 'Ocurrió un problema al obtener los datos.',
                icon: 'error',
                confirmButtonText: 'Cerrar'
            });
            console.error('Error:', error);
        });
});
