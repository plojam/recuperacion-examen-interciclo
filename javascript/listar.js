function buscarPorAutor() {
    var autor = document.getElementById("autor").value;
    if (autor == "") {
        document.getElementById("informacion").innerHTML = "";
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //alert("llegue");
            document.getElementById("informacion").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","../controladores/alistar.php?aut="+autor+"&cap="+"",true);
    xmlhttp.send();
    }

    return false;
}

function buscarPorCap() {
    var capitulo = document.getElementById("capitulo").value;
    if (capitulo == "") {
        document.getElementById("informacion").innerHTML = "";
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("informacion").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","../controladores/alistar.php?cap="+capitulo+"&aut="+"",true);
    xmlhttp.send();
    }
    
    return false;
}