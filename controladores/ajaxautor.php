<?php
    include '../conexion/conexionBD.php';

    $aut_id = $_GET["autor"];
    $cont = $_GET["cont"];

    $sql = "SELECT * FROM autor WHERE aut_id='$aut_id'";
    $resultado = $conn->query($sql);
    if($resultado->num_rows > 0){
        while($row = $resultado->fetch_assoc()){
            echo "
            <label>Nombre del autor</label>
            <input type='text' id='nom$cont' name='nom$cont' value='".$row['aut_nombre']."'/>
            <label>Nacionalidad del autor</label>
            <input type='text' id='nac$cont' name='nac$cont' value='".$row['aut_nacionalidad']."'/>
        ";
        }
    }else{
        echo "<tr>";
        echo " <td colspan='7'> No existe un autor con ese codigo en el sistema </td>";
        echo "</tr>";
    }

    
        

    $conn->close();

?>