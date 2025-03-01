// Event Listener para cargar la función cuando la página se carga
addEvent(window, 'load', cargar, false);

function addEvent(ele, eve, fun, cap) {
    if (window.attachEvent)
        ele.attachEvent('on' + eve, fun);
    else
        ele.addEventListener(eve, fun, cap);
}

function cargar() {
    // Obtener elementos del DOM
    var sal = document.getElementById("bt_sal");
    addEvent(sal, 'click', enviarDatos, false);
}

function enviarDatos() {
    // Al hacer clic en el botón, enviamos el formulario
    document.getElementById("frm_sal").submit();
}