var vgeneral = [false];

function validacion(formulario){
    var bandera = true;
    validarNA(document.getElementById('nombre'), 'mnombre',0);
    for(var i=0; i<10 ; i++){
        if(vgeneral[i]==false){
            bandera = false;
            i = 10;
        }
    }
    
    return bandera;
}

function error(inp, spa, men){
    document.getElementById(spa).innerHTML = men;
    inp.style.border = '2px red solid';
    inp.className = 'error';
}
function arreglo(inp, spa){
    document.getElementById(spa).innerHTML = '';
    inp.style.border = '2px green solid';
    inp.className = 'none';
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