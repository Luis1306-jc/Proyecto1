addEvent(window, 'load', cargar, false);

function addEvent(ele, eve, fun, cap) {
    if (window.attachEvent)
        addAttachEvent('on' + eve, fun);
    else
        ele.addEventListener(eve, fun, cap);
}

function cargar() {
    var sal = document.getElementById("bt_buscar");
    addEvent(sal, 'click', enviarDatos, false);
}

function enviarDatos() {
    alert("Buscando registro...");
    document.getElementById("frm_sal").submit();
}