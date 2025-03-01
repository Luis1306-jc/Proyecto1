document.addEventListener("DOMContentLoaded", function () {
    const verificaButton = document.getElementById("verifica");

    verificaButton.addEventListener("click", function () {
        // Obtener los valores de los campos del formulario
        const correo = document.querySelector("input[name='correo_php']").value;
        const contraseña = document.querySelector("input[name='contraseña_php']").value;

        // Validar que los campos no estén vacíos
        if (!correo || !contraseña) {
            Swal.fire({
                icon: 'warning',
                title: 'Campos vacíos',
                text: 'Por favor, completa todos los campos.',
                confirmButtonText: 'Aceptar'
            });
            return;
        }

        // Enviar los datos al archivo PHP usando Fetch API
        fetch("php/login.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `correo_php=${encodeURIComponent(correo)}&contraseña_php=${encodeURIComponent(contraseña)}`
        })
        .then(response => response.json()) // Recibir respuesta JSON del servidor
        .then(data => {
            Swal.fire({
                icon: data.success ? 'success' : 'error',
                title: data.title,
                text: data.message,
                confirmButtonText: 'Aceptar'
            }).then(() => {
                if (data.success) {
                    window.location.href = "SEDENA.html"; // Redirigir si el inicio de sesión es exitoso
                }
            });
        })
        .catch(error => {
            console.error("Error en la solicitud:", error);
            Swal.fire({
                icon: 'error',
                title: 'Error del servidor',
                text: 'No se pudo conectar al servidor. Intenta más tarde.',
                confirmButtonText: 'Aceptar'
            });
        });
    });
});
