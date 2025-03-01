
let opcion;
let conexion;
let x;
let valor;

addEvent(window, 'load', cargar, false);

function addEvent(ele, eve, fun, cap) {
    if (window.attachEvent)
        ele.attachEvent('on' + eve, fun);
    else
        ele.addEventListener(eve, fun, cap);
}


function cargar() {
    Swal.fire({
        title: 'Bienvenido',
        text: '¡Gracias por ingresar al sistema!',
        icon: 'success',
        confirmButtonText: 'Aceptar'
    });
    x = document.getElementsByTagName("input");
    addEvent(x[0], 'keypress', filtraLetras, false);
    addEvent(x[1], 'keypress', filtraLetras, false);
    addEvent(x[2], 'keypress', filtraLetras, false);
    addEvent(x[3], 'keypress', filtraLetras, false);
    addEvent(x[4], 'keypress', filtraLetras, false);
    addEvent(x[5], 'keypress', filtraLetras, false);
    addEvent(x[6], 'keypress', filtraLetras, false);
    addEvent(x[7], 'keypress', filtraLetras, false);
    addEvent(x[8], 'keypress', filtraLetras, false);
    addEvent(x[9], 'keypress', filtraLetras, false);
    addEvent(x[10], 'keypress', filtraLetras, false);
    addEvent(x[11], 'keypress', filtraLetras, false);
    addEvent(x[12], 'keypress', filtraLetras, false);

    addEvent(x[14], 'keypress', filtraLetras, false);
    addEvent(x[15], 'keypress', filtraLetras, false);
    addEvent(x[16], 'keypress', filtraLetras, false);
    addEvent(x[17], 'keypress', filtraLetras, false);
    addEvent(x[18], 'keypress', filtraLetras, false);
    addEvent(x[19], 'keypress', filtraLetras, false);
    addEvent(x[20], 'keypress', filtraLetras, false);
    addEvent(x[21], 'keypress', filtraLetras, false);
    addEvent(x[22], 'keypress', filtraLetras, false);

    addEvent(x[13], 'click', guardar, false);


}
/*function filtraLetras() {

    
    
}

function buscar(){
    


}*/
function guardar(event) {
    event.preventDefault();
    if (!(x[0].value === "") && !(x[2].value === "") && !(x[3].value === "") && !(x[4].value === "") && !(x[5].value === "") && !(x[6].value === "") && !(x[7].value === "") && !(x[8].value === "") && !(x[9].value === "") && !(x[10].value === "") && !(x[11].value === "") && !(x[12].value === "") && !(x[14].value === "") && !(x[15].value === "") && !(x[16].value === "") && !(x[17].value === "") && !(x[18].value === "") && !(x[19].value === "") && !(x[20].value === "") && !(x[21].value === "") && !(x[22].value === "")) {
        conexionServidor();
    } else {
        Swal.fire({
            title: 'Error',
            text: 'Por favor llena todos los campos',
            icon: 'warning',
            confirmButtonText: 'Ok'
        });
    }
}

function consulta(event) {
    event.preventDefault();
    if (!(x[0].value === "")) {
        consultaServidor();
    } else {
        Swal.fire({
            title: 'Error',
            text: 'Por favor llena todos los campos',
            icon: 'warning',
            confirmButtonText: 'Ok'
        });
    }
}

function conexionServidor() {
    let folio = x[0].value;
    let sill = x[1].value;
    let serie = x[2].value;
    let falla = x[3].value;
    let uu = x[4].value;
    let fecha = x[5].value;
    let equipo = x[6].value;
    let marca = x[7].value;
    let modelo = x[8].value;
    let situacion = x[9].value;

    let oficio = x[10].value;

    let noOficio = x[11].value;
    let fechaOficio = x[12].value;
    let observacion = x[14].value;
    let piezas = x[15].value;
    let descripcion = x[16].value;
    let parte = x[17].value;
    let num_serie = x[18].value;
    let reparacion = x[19].value;
    let fechaTermino = x[20].value;
    let responsable = x[21].value;
    let verificacion = x[22].value;

    conexion = xmlhttprequest();
    alert(se, mNSDO)
    conexion.onreadystatechange = esperaRespuesta;
    conexion.open("POST", "php/guardar.php", true);
    conexion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    conexion.send("folio_php=" + folio + "&sill_php=" + sill + "&serie_php=" + serie + "&falla_php=" + falla + "&uu_php=" + uu + "&fecha_php=" + fecha + "&equipo_php=" + equipo + "&marca_php=" + marca + "&modelo_php=" + modelo + "&situacion_php=" + situacion + "&oficioR_php=" + oficio + "&oficio_php=" + noOficio + "&fecha_oficio_php=" + fechaOficio + "&observacion_php=" + observacion + "&piezas_php=" + piezas + "&desc_php=" + descripcion + "&parte_php=" + parte + "&num_serie_php=" + num_serie + "&reparacion_php=" + reparacion + "&termino_php=" + fechaTermino + "&responsable_php=" + responsable + "&verificacion_php=" + verificacion);
}

function esperaRespuesta() {
    if (conexion.readyState === 4) {
        let respuesta = conexion.responseText;
        if (respuesta === "REGISTRO_EXITO") {
            Swal.fire({
                title: 'Éxito',
                text: '¡Ya eres un empleado!',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                location.href = "sesionEmpleado.html";
            });
        } else {
            Swal.fire({
                title: 'Error',
                text: 'Hubo un problema : ' + respuesta,
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        }
    }
}

function xmlhttprequest() {
    return new XMLHttpRequest();
}

