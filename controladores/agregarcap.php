<?php
    include '../conexion/conexionBD.php';

    $ncap = $_GET["ncap"];
    $cont = 0;

    while($cont<$ncap){
        /*<input type="text" id="id" name="id"  value="<?php echo $id ?>" />*/
        
        echo "
                <h1>Cap $cont</h1>
                <label>Numero del capitulo</label>
                <input type='text' id='num$cont' name='num$cont' value='$cont' />
                <label>Titulo del capitulo</label>
                <input type='text' id='tit$cont' name='tit$cont' />
                <label>Nombre del autor</label>
                <input type='text' id='aut$cont' name='aut$cont'/>
            ";
        $cont = $cont +1;
    }

?>