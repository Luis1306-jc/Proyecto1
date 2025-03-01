let dato;
let lista_modelos; //Se guarda el id del select
let caja_precio;   //Se guarda el id de la caja   
var comprarr;   
let iva=10;
     addEvent(window,'load',cargar, false);
     function addEvent(ele,eve,fun,cap){
         if(window.attachEvent)
          addAttachEvent('on'+eve,fun);
        else
          ele.addEventListener(eve,fun,cap);
     }
      function cargar(){      
       //addEvent(document.getElementById("lista"),'onchange',mostrarPrecioModelo,false);  
        //Obtenemos el id del select y la caja
        
       lista_modelos= document.getElementById("slt_modelos"); 
       caja_precio= document.getElementById("txt_contenido");
       comprarr=document.getElementById("bt_compra");
       addEvent(comprarr,'click', comprar, false);
       //Agregamos el evento change al select
       addEvent(lista_modelos,'change',conexionServidor2,false);
       conexionServidor1();    
     }
    function conexionServidor2(){
       alert("cs2");
       //caja_precio.value =lista_modelos.value;
       conexion = xmlhttprequest();
             conexion.onreadystatechange = esperaRespuesta2;
             conexion.open("POST","carrito.php",true);   
       conexion.setRequestHeader("Content-type","application/x-www-form-urlencoded");  
              conexion.send("nombre="+lista_modelos.value);

    }
    function conexionServidor1(){
             conexion = xmlhttprequest();
             conexion.onreadystatechange = esperaRespuesta1;
             conexion.open("POST","carrito1.php",true);   
      conexion.setRequestHeader("Content-type","application/x-www-form-urlencoded");  
             conexion.send();
     }
   function esperaRespuesta1(){ 
       if(conexion.readyState == 4){
          
             //dato = eval('('+conexion.responseText+')');
          //A dato se le asigna el arreglo clave-valor
          
          dato = eval(conexion.responseText);
          
          
          agregarOpciones();     
       }
   }  

   function esperaRespuesta2(){
      if(conexion.readyState == 4){
          alert(conexion.responseText);
             dato = eval(conexion.responseText);
          caja_precio.value=dato[0]["precio"];
                  
       } 
   }   
   function agregarOpciones(){
      //lista_modelos
      
      //1.- Creamos un fragment y lo guardamos en una variable 
            //entonces fragment1 es como un acumulador  
      let fragment1=document.createDocumentFragment();
      //Se puede usar también un for-in
      for(let i=1;i<=dato[0]["tam"];i++){
         //2.- Creamos una etiqueta que se relaciona con la principal y la guardamos en una variable(opcion1). 
         let opcion1=document.createElement('OPTION');
         //3.- A la etiqueta le asignamos atributos 
         opcion1.setAttribute('value',dato[0]["modelo"+i]);
         opcion1.textContent=dato[0]["clave"+i]+ " "+ dato[0]["modelo"+i] ;
         //4.-A la variable del paso 1 (fragment1) le adjuntamos o concatenamos opcion1
         fragment1.appendChild(opcion1);
      }
      //5.-Mediante el id de la etiqueta select, le adjuntamos
      // fragment1 que son todas las opciones.  
      lista_modelos.appendChild(fragment1);
  }
 
  function comprar() {
   let precio = parseInt(caja_precio.value, 10);
   const total = precio + (precio * iva / 150);
   Swal.fire({
       title: 'El precio total es:',
       text: total.toFixed(2),
       icon: 'info',
       confirmButtonText: '¡Total!'
   });
}
 
  function xmlhttprequest(){
          return new XMLHttpRequest();
    }