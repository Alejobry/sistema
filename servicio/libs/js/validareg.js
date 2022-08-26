function validareg(){
    var cedula,nombre,apellido,telefono,correo,edad,clave;
    cedula=document.getElementById("cedula").value;
    nombre=document.getElementById("nombre").value;
    apellido=document.getElementById("apellido").value;
    telefono=document.getElementById("telefono").value;
    correo=document.getElementById("correo").value;
    edad=document.getElementById("edad").value;
    clave=document.getElementById("clave").value;

    if(cedula === "" || nombre === "" || apellido === "" || telefono === "" || 
       correo === "" || edad === "" || clave === ""){
        alert("Campo Vacío, Intentelo de Nuevo.");
        return false;
    }
    else if( cedula.length>10  || cedula.length<10 ){
        alert("La Cedula son 10 Numeros, Intentelo de Nuevo.");
        return false;
    }
    else if( edad.length>2  || edad.length<2  ){
        alert("La Edad son 2 Numeros, Intentelo de Nuevo.");
        return false;
    }
    else if(isNaN(cedula)){
        alert("La Cedula solo Acepta Numeros, Intentelo de Nuevo.");
        return false;
    }
    else if(isNaN(edad)){
        alert("La Edad solo Acepta Numeros, Intentelo de Nuevo.");
        return false;
    }
    else if(isNaN(telefono)){
        alert("El Telefono solo Acepta Numeros, Intentelo de Nuevo.");
        return false;
    }
          // VALIDAR CEDULA
           var cad = document.getElementById("cedula").value.trim();
           var total = 0;
           var longitud = cad.length;
           var longcheck = longitud - 1;
           if( cad.length>10 || cad.length<10 )
           {
               alert("La Cedula debe de Tener 10 Numeros");
               return false;
           }                    
           if (cad !== "" && longitud === 10){
             for(i = 0; i < longcheck; i++){
               if (i%2 === 0) {
                 var aux = cad.charAt(i) * 2;
                 if (aux > 9) aux -= 9;
                total += aux;
               } else {
                 total += parseInt(cad.charAt(i)); // parseInt o concatenará en lugar de sumar
               }
             }
  
             total = total % 10 ? 10 - total % 10 : 0;
  
             if (cad.charAt(longitud-1) != total) {
                 alert("Cedula Inválida");
                 return false;              
             }
           }
          
}