var cajas_radios;
addEvent(window,'load',cargar, false);
function addEvent(ele,eve,fun,cap){
  if(window.attachEvent)
    addAttachEvent('on'+eve,fun);
  else
    ele.addEventListener(eve,fun,cap);
}
function cargar() {
  Swal.fire({
    title: 'Bienvenidos',
    text: '¡Bienvenidos al formulario',
    icon: 'info',
});
  cajas_radios = document.getElementsByTagName("input");
  addEvent(cajas_radios[0], 'keypress', filtraLetras, false);
  addEvent(cajas_radios[1], 'keypress', filtraLetras, false);
  addEvent(cajas_radios[2], 'keypress', filtraLetras, false);
  addEvent(cajas_radios[3], 'keypress', filtraLetras, false);
  addEvent(cajas_radios[4], 'keypress', filtraNumeros, false);
  addEvent(cajas_radios[5], 'keypress', filtraLetras, false);
  addEvent(cajas_radios[6], 'click', validaDatos, false);
}

function filtraNumeros2() {
  if (event.keyCode >= 48 && event.keyCode <= 57) {
    if (cajas_radios[3].value <= 999999999)
      event.returnValue = true;
    else
      event.returnValue = false;
  } else
    event.returnValue = false;
}

function filtraLetras() {
  if (event.keyCode >= 65 && event.keyCode <= 90) {
    event.returnValue = true;
  } else if (event.keyCode >= 97 && event.keyCode <= 122) {
    event.returnValue = true;
  } else
    event.returnValue = false;
}

function validaDatos() {
  if (cajas_radios[0].value !== "" && cajas_radios[1].value !== "" && cajas_radios[2].value !== "" && cajas_radios[3].value !== "" && cajas_radios[4].value !=="" && cajas_radios[5].value !== "")
    conexionServidor();
  else {
    Swal.fire({
      title: "Falta algun dato",
      confirmButtonText: "Confirmar"
    });
  }
}

function conexionServidor() {
  conexion = xmlhttprequest();
  conexion.onreadystatechange = esperaRespuesta;
  conexion.open("POST", "from.php", true);
  conexion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  conexion.send("buscarlibro_php=" + cajas_radios[0].value + "&titulo_php=" + cajas_radios[1].value + "&autor_php=" + cajas_radios[2].value + "&editoria_php=" + cajas_radios[3].value + "&ano_php=" + cajas_radios[4].value + "&isbn_php=" + cajas_radios[5].value); // Corrección: era "&caja"+cajas_radios[4].value+"&caja"+cajas_radios[5].value
}

function esperaRespuesta() {
  if (conexion.readyState == 4) {
    Swal.fire({
      title: "El registro se guardo  correctamente:",
      text: conexion.responseText,
      confirmButtonText: "Confirmar"
    });
  }
}

function xmlhttprequest() {
  return new XMLHttpRequest();
}

function filtraNumeros() {
  if (event.keyCode >= 48 && event.keyCode <= 57)
    event.returnValue = true;
  else
    event.returnValue = false;
}