let cajas_cuenta;
let conexion;

addEvent(window, 'load', cargar, false);

function addEvent(ele, eve, fun, cap) {
    if (window.attachEvent)
        ele.attachEvent('on' + eve, fun);
    else
        ele.addEventListener(eve, fun, cap);
}

function cargar() {
    Swal.fire({
        title: 'Bienvenidos',
        text: '¡Bienvenidos a nuestro sitio web!',
        icon: 'info',
        confirmButtonText: 'Aceptar'
    });

    cajas_cuenta = document.getElementsByTagName("input");
    addEvent(document.getElementById('bt_enviar'), 'click', enviardatos, false);
}

function enviardatos() {
    conexion = xmlhttprequest();
    conexion.onreadystatechange = esperaRespuesta;
    conexion.open("POST", "guardar.php", true);
    conexion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    conexion.send(
        "nombre_php=" + cajas_cuenta[0].value +
        "&apellido_php=" + cajas_cuenta[1].value +
        "&correo_php=" + cajas_cuenta[2].value +
        "&contraseña_php=" + cajas_cuenta[4].value
    );
}

function esperaRespuesta() {
    if (conexion.readyState == 4) {
        if (conexion.status == 200) {
            Swal.fire({
                title: '¡Éxito!',
                text: 'Datos enviados correctamente',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        } else {
            Swal.fire({
                title: 'Error',
                text: 'Hubo un problema al enviar los datos',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        }
    }
}

function xmlhttprequest() {
    return new XMLHttpRequest();
}
