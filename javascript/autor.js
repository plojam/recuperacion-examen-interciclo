var vgeneral = [false, false, false, false, false, false, false, false, false, false];

function validacion(formulario){
    var bandera = true;
    for(var i=0; i<10 ; i++){
        if(vgeneral[i]==false){
            bandera = false;
            i = 10;
        }
    }
    if(bandera!==true){
        validarCedula(0);
        validarNA(document.getElementById('name'), 'mnombre',1);
        validarNA(document.getElementById('lastname'), 'mapellido',2)
        verificarDT(document.getElementById('address'), 'mdireccion',3);
        verificarDT(document.getElementById('telf'), 'mtelefono',4);
        validarOperadoraTipo('oper' , 'moper', 5)
        validarOperadoraTipo('tipo', 'mtipo', 6)
        validarFecha(7);
        verificarCorreo(8);
        verificarContrasena(9);
    }

    return bandera;
}

function noNumeros(texto){
    if(texto.value.length > 0){
        var as = texto.value.charCodeAt(texto.value.length-1);

        if((as >= 97 && as <= 122)||(as>=65 && as<=90) || as==32){
            return true;
        }else {
            texto.value = texto.value.substring(0, texto.value.length-1);
            return false;
        }
    }else{
    return true;
    }
}

function validarNA(atri, men, id){
    var bandera = true;
    if(atri.value!==''){
        var partes = atri.value.split(" ");
        if(partes.length !== 2 || partes[0]=='' || partes[1]==''){
            error(atri, men, '<br>Los datos ingresados no son aceptados')
            bandera = false;
            vgeneral[id]=bandera;
        }else{
            arreglo(atri, men);
            bandera = true;
            vgeneral[id]=bandera;
        }
    }else{
        error(atri, men, '<br>Debe ingresar mas informacion')
        bandera = false;
        vgeneral[id]=bandera;
    }
    return bandera;
}