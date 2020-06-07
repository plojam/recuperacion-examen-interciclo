<?php
    //include '../conexion/conexionBD.php';

    $ncap = $_GET["ncap"];
    $cont = 0;

    while($cont<$ncap){
        /*<input type="text" id="id" name="id"  value="<?php echo $id ?>" />*/
        
        echo "
                <h1>Cap $cont</h1>
                <label>Numero del capitulo</label>
                <input type='text' id='num$cont' name='num$cont' value='$cont' onkeyup='return noLetras(this, 2)'/>
                <label>Titulo del capitulo</label>
                <input type='text' id='tit$cont' name='tit$cont' />
                <label class='mlinea1'>Codigo del autor</label>
                <input type='text' id='aut$cont' name='aut$cont' class='mlinea2' onkeyup='return noLetras(this, 11)'/>
                <input type='button' id='baut' name='baut' class='mlinea1' value='Buscar autor' onclick=\"return autor('aut$cont', 'divautor$cont', $cont)\"/>
                <div id='divautor$cont'></div>
            ";
        $cont = $cont +1;
    }

?>