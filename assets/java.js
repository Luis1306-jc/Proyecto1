let estado_opcion, tipo_camion, fila;

addEvent(window, 'load', cargar, false);

function addEvent(ele, eve, fun, cap) {
  if (window.attachEvent)
    addAttachEvent('on' + eve, fun);
  else
    ele.addEventListener(eve, fun, cap);
}

function cargar() {      
    addEvent(document.getElementById("txt_clave"),'keypress',filtraNumeros,false);
    addEvent(document.getElementById("txt_nombre"),'keypress',filtrarLetras,false);
    addEvent(document.getElementById("txt_paterno"),'keypress',filtrarLetras,false);
    addEvent(document.getElementById("txt_materno"),'keypress',filtrarLetras,false);
    addEvent(document.getElementById("txt_nacimiento"),'keypress',filtraNacimiento,false);
    addEvent(document.getElementById("txt_telefono"),'keypress',filtraNumeros,false);
    addEvent(document.getElementById("txt_correo"),'keypress',filtrarCorreo,false);

    addEvent(document.getElementById("txt_modelo"),'keypress',filtrarLetras,false);
    addEvent(document.getElementById("txt_marca"),'keypress',filtrarLetras,false);
    addEvent(document.getElementById("txt_matricula"),'keypress',filtrarMatricula,false);
    addEvent(document.getElementById("txt_fabricacion"),'keypress',filtraNumeros,false);
    addEvent(document.getElementById("txt_capacidad"),'keypress',filtraCapacidad,false); 

    addEvent(document.getElementById("bt_registrar"), 'click', conexionServidor1, false);
    addEvent(document.getElementById("combo1"), 'change', mostrar_Sexo, false);

    tipo_camion = document.getElementById("combo2");
    conexionServidor2(); 
}

function conexionServidor1() {
    if (verificaCampos()) {
        let Clave = parseInt(document.getElementById("txt_clave").value);
        let Nombre = document.getElementById("txt_nombre").value;
        let Paterno = document.getElementById("txt_paterno").value;
        let Materno = document.getElementById("txt_materno").value;
        let Nacimiento = document.getElementById("txt_nacimiento").value;
        let Telefono = document.getElementById("txt_telefono").value;
        let Correo = document.getElementById("txt_correo").value;
        let Sexo = estado_opcion;
        let Tipo = tipo_camion.value;

        let Modelo = document.getElementById("txt_modelo").value;
        let Marca = document.getElementById("txt_marca").value; 
        let Matricula = document.getElementById("txt_matricula").value; 
        let Fabricacion = parseInt(document.getElementById("txt_fabricacion").value);
        let Capacidad = parseFloat(document.getElementById("txt_capacidad").value);

        conexion = xmlhttprequest();
        conexion.onreadystatechange = esperaRespuesta1;
        conexion.open("POST", "registrar_datos.php", true);
        conexion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        conexion.send("php_clave=" + Clave + "&php_nombre=" + Nombre + "&php_paterno=" + Paterno +
                  "&php_materno=" + Materno + "&php_nacimiento=" + Nacimiento + "&php_telefono=" + Telefono +
                  "&php_correo=" + Correo + "&php_sexo=" + Sexo + "&php_modelo=" + Modelo +
                  "&php_marca=" + Marca + "&php_matricula=" + Matricula + "&php_fabricacion=" + Fabricacion +
                  "&php_capacidad=" + Capacidad + "&php_tipo=" + Tipo);
    }
}

function conexionServidor2() {
      conexion = xmlhttprequest();
      conexion.onreadystatechange = esperaRespuesta2;
      conexion.open("POST", "obtener_tipo_camion.php", true);
      conexion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      conexion.send();
}

function esperaRespuesta1() {
    if (conexion.readyState == 4) {
        if (conexion.status == 200) {
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: conexion.responseText,
            });
            limpiarCampos()
        } 
        else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Hubo un problema al procesar la solicitud.',
            });
        }
    }
}

function esperaRespuesta2(){ 
  if(conexion.readyState == 4){
      fila = conexion.responseText;
      agregarOpciones();     
  }
}  


function agregarOpciones() {
  let fragment1 = document.createDocumentFragment();
  //separa el arreglo en partes
  let tipos = fila.split(",");
  for(let i = 0; i < tipos.length; i++){
      let opcion1 = document.createElement('OPTION');
      opcion1.textContent = tipos[i];
      opcion1.value = tipos[i];
      fragment1.appendChild(opcion1);
  }
  tipo_camion.appendChild(fragment1);
}


function mostrar_Sexo() {
    let opcion1 = parseInt(document.getElementById("combo1").value);
    if (opcion1 == 1)
      estado_opcion = "Masculino";
    else if (opcion1 == 2)
      estado_opcion = "Femenino";
      
}

function limpiarCampos() {
  document.getElementById("txt_clave").value = "";
  document.getElementById("txt_nombre").value = "";
  document.getElementById("txt_paterno").value = "";
  document.getElementById("txt_materno").value = "";
  document.getElementById("txt_nacimiento").value = "";
  document.getElementById("txt_telefono").value = "";
  document.getElementById("txt_correo").value = "";
  document.getElementById("combo1").value = 0;
  document.getElementById("txt_modelo").value = "";
  document.getElementById("txt_marca").value = "";
  document.getElementById("txt_matricula").value = "";
  document.getElementById("txt_fabricacion").value = "";
  document.getElementById("combo2").value = "0";
  document.getElementById("txt_capacidad").value = "";
  document.getElementById("terminos").checked = false;
}

function verificaCampos() {
    var datos_completos = true;
  
    if (document.getElementById("txt_clave").value == "") {
        Swal.fire('Error','Por favor, ingresa la clave del operador', 'error');
        datos_completos = false;
      } 
    else if (document.getElementById("txt_nombre").value == "") {
        Swal.fire('Error','Por favor, ingresa el nombre del operador', 'error');
        datos_completos = false;
    } 
    else if (document.getElementById("txt_paterno").value == "") {
        Swal.fire('Error','Por favor, ingresa el apellido paterno del operador', 'error');
        datos_completos = false;
    } 
    else if (document.getElementById("txt_materno").value == "") {
        Swal.fire('Error','Por favor, ingresa el apellido materno del operador', 'error');
        datos_completos = false;
    } 
    else if (document.getElementById("txt_nacimiento").value == "") {
        Swal.fire('Error','Por favor, ingresa el nacimiento del operador', 'error');
        datos_completos = false;
    }
    else if (document.getElementById("combo1").value == 0) {
      Swal.fire('Error','Por favor, selecciona un sexo', 'error');
      datos_completos = false;
    }
    else if (document.getElementById("txt_telefono").value == "") {
        Swal.fire('Error','Por favor, ingresa el telefono del operador', 'error');
        datos_completos = false;
    }   
    else if (document.getElementById("txt_correo").value == "") {
        Swal.fire('Error','Por favor, ingresa el correo del operador', 'error');
        datos_completos = false;
    }   
    else if (document.getElementById("txt_modelo").value == "") {
      Swal.fire('Error','Por favor, ingresa el modelo del camión', 'error');
      datos_completos = false;
    } 
    else if (document.getElementById("txt_marca").value == "") {
      Swal.fire('Error','Por favor, ingresa la marca del camión', 'error');
      datos_completos = false;
    } 
    else if (document.getElementById("txt_matricula").value == "") {
      Swal.fire('Error','Por favor, ingresa las placas del camión', 'error');
      datos_completos = false;
    } 
    else if (document.getElementById("txt_fabricacion").value == "") {
      Swal.fire('Error','Por favor, ingresa el año de fabricación del camión', 'error');
      datos_completos = false;
    } 
    else if (document.getElementById("combo2").value == 0) {
      Swal.fire('Error','Por favor, selecciona un tipo de camión', 'error');
      datos_completos = false;
    } 
    else if (document.getElementById("txt_capacidad").value == "") {
      Swal.fire('Error','Por favor, ingresa la capacidad de carga del camión en kilogramos', 'error');
      datos_completos = false;
    } 
    else if (!document.getElementById("terminos").checked) {
      Swal.fire('Error','Por favor, acepta los términos y condiciones', 'error');
      datos_completos = false;
    } 
    else {
      datos_completos = true;
    }
    return datos_completos;
}

function filtraNumeros() {
    if((event.keyCode >= 48 && event.keyCode <= 57)) {
    event.returnValue = true;
  } else {
    event.returnValue = false;
  }
}

function filtrarLetras() {
    if((event.keyCode >= 65 && event.keyCode <= 90) || (event.keyCode >= 97 && event.keyCode <= 122) ||
        event.keyCode === 8 || event.keyCode === 32){
        event.returnValue=true;
    }
    else{ 
        event.returnValue=false; 
    }
}

function filtrarMatricula() {
    if((event.keyCode >= 65 && event.keyCode <= 90) || (event.keyCode >= 97 && event.keyCode <= 122) ||
       (event.keyCode >= 48 && event.keyCode <= 57) ||  event.keyCode === 8 || event.keyCode === 32){
        event.returnValue=true;
    }
    else{ 
        event.returnValue=false; 
    }
}

function filtrarCorreo() {
    if((event.keyCode >= 64 && event.keyCode <= 90) || (event.keyCode >= 97 && event.keyCode <= 122) ||
       (event.keyCode >= 48 && event.keyCode <= 57) || event.keyCode === 8 || event.keyCode === 32 || 
        event.keyCode === 46){
        event.returnValue=true;
    }
    else{ 
        event.returnValue=false; 
    }
}

function filtraNacimiento() {
  if((event.keyCode >= 65 && event.keyCode <= 90) || (event.keyCode >= 97 && event.keyCode <= 122) ||
     (event.keyCode >= 47 && event.keyCode <= 57) || event.keyCode === 8 || event.keyCode === 32   || event.keyCode === 45){
    event.returnValue=true;
  }
  else {
    event.returnValue = false;
  }
}

function filtraCapacidad() {
    if((event.keyCode >= 48 && event.keyCode <= 57) || event.keyCode === 46) {
    event.returnValue = true;
  } else {
    event.returnValue = false;
  }
}

function xmlhttprequest() {
    return new XMLHttpRequest();
}
