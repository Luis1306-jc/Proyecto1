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
    text: '¡Bienvenidos !',
    icon: 'info',
    confirmButtonText: 'Aceptar'
  });

  cajas_radios = document.getElementsByTagName("input");
  addEvent(cajas_radios[0], 'keypress',filtraLetras,false );
  addEvent(cajas_radios[1], 'keypress', filtraNumeros,false );
  addEvent(cajas_radios[2], 'click', validaDatos, false);
  addEvent(cajas_radios[3], 'click', validaDatos, false);
}

function filtraLetras() {
  if (event.keyCode >= 65 && event.keyCode <= 90) {
    event.returnValue = true;
  } else if (event.keyCode >= 97 && event.keyCode <= 122) {
    event.returnValue = true;
  } else if (event.keyCode >= 58 && event.keyCode <= 64) {
    event.returnValue = true;
  } else if (event.keyCode >=42 && event.keyCode <= 46) {
    event.returnValue = true;
  } else if (event.keyCode >=48 && event.keyCode <= 57) {
    event.returnValue = true;
  } 
  else
    event.returnValue = false;
}

function filtraNumeros() {
  if (event.keyCode >= 48 && event.keyCode <= 57)
    event.returnValue = true;
  else
    event.returnValue = false;
}

function validaDatos() {
  if (cajas_radios[0].value !== "" && cajas_radios[1].value !== "" )
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
  conexion.open("POST", "INICIO.php", true);
  conexion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  conexion.send("correo_php=" + encodeURIComponent(cajas_radios[0].value) + "&contraseña_php=" + encodeURIComponent(cajas_radios[1].value));
}

function esperaRespuesta() {
  if (conexion.readyState == 4) {
    if (conexion.responseText === "success") {
      window.location.href = "pagina.html";
    }
    else {
      Swal.fire ({
        title: "Error",
        text: conexion.responseText,
        icon: 'error',
        confirmButtonText: "Confirmar"
      });
    }
  }
}

function xmlhttprequest() {
  return new XMLHttpRequest();
}
