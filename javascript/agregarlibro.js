function capitulos() {
    var ncapi = document.getElementById("ncap").value;
    if (ncapi == "") {
        document.getElementById("informacion").innerHTML = "";
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //alert("llegue");
            document.getElementById("informacion").innerHTML = this.responseText;
        }
    };
    console.log(ncapi);
    xmlhttp.open("GET","../controladores/agregarcap.php?ncap="+ncapi+"",true);
    xmlhttp.send();
    }

    return false;
}