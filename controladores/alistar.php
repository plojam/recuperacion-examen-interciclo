<?php
    include '../conexion/conexionBD.php';
    $cedula = $_GET['aut'];
    $correo = $_GET['cap'];
    
    if($cedula!=''){
        $sq = "SELECT aut_id FROM autor WHERE aut_nombre='$cedula'";
        $res = $conn->query($sq);
        if($res->num_rows > 0){
            while($row = $res->fetch_assoc()) {
                $aut_id = $row['aut_id'];
            }
        }

        $sq = "SELECT cap_libro FROM capitulo WHERE cap_autor=$aut_id";
        $res = $conn->query($sq);
        if($res->num_rows > 0){
            while($row = $res->fetch_assoc()) {
                $lib_id = $row['cap_libro'];
            }
        }

        $sql = "SELECT * FROM libro WHERE lib_id=$lib_id";
        $resultado = $conn->query($sql);
        if($resultado->num_rows > 0){
            while($row = $resultado->fetch_assoc()){
                echo "<aside>";
                echo "
                    <table class=usuario>
                    <tr>
                        <th>Nombre</th>
                        <th>ISBN</th>
                        <th>N. Paginas</th>
                    </tr>
                ";
                echo "<tr>";
                echo "<td>".$row["lib_nombre"]."</td>";
                echo "<td>".$row["lib_isbn"]."</td>";
                echo "<td>".$row["lib_paginas"]."</td>";
                echo "</tr>";
                echo "</table>";

                $sql2 = "SELECT * FROM capitulo WHERE cap_libro=".$row['lib_id'];
                $resultado2 = $conn->query($sql2);

                if($resultado2->num_rows > 0){
                    echo "
                        <table class=telefono>
                        <tr>
                            <th>Numero</th>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Nacionalidad</th>
                        </tr>
                        ";

                    while($row2 = $resultado2->fetch_assoc()){
                        $sql3 = "SELECT * FROM autor WHERE aut_id=".$row2['cap_autor'];
                        $resultado3 = $conn->query($sql3);
                        echo "<tr >";
                        echo "<td class=telefono>".$row2["cap_numero"]."</td>";
                        echo "<td>".$row2["cap_titulo"]."</td>";
                        if($resultado3->num_rows > 0){
                    
                            while($row3 = $resultado3->fetch_assoc()){
                                echo "<td class=telefono>".$row3["aut_nombre"]."</td>";
                                echo "<td>".$row3["aut_aut_nacionalidad"]."</td>";
                            }
                        }
                        echo "</tr>";
                    }


                    echo "</table>";
                }
                

                
                echo "</aside>";
            }
            
        }else{
            echo "<tr>";
            echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
            echo "</tr>";
        }
    }elseif($correo!=''){
        $sql = "SELECT * FROM usuario WHERE usu_correo='$correo' AND usu_eliminado='N'";
        $result = $conn->query($sql);
        $senial = false;

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<aside>";
                echo "
                    <table class=usuario>
                    <tr>
                        <th>Cedula</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Direccion</th>
                        <th>Correo</th>
                        <th>Fecha de nacimiento</th>
                    </tr>
                ";
                echo "<tr>";
                echo "<td>".$row["usu_cedula"]."</td>";
                echo "<td>".$row["usu_nombres"]."</td>";
                echo "<td>".$row["usu_apellidos"]."</td>";
                echo "<td>".$row["usu_direccion"]."</td>";
                echo "<td>".$row["usu_correo"]."</td>";
                echo "<td>".$row["usu_fecha_nacimiento"]."</td>";
                echo "</tr>";
                echo "</table>";
                
                $sql2 = "SELECT * FROM telefono WHERE tel_eliminado='N' and tel_usuario=".$row['usu_id'];
                $resultado2 = $conn->query($sql2);

                if($resultado2->num_rows > 0){
                    echo "
                        <table class=telefono>
                        <tr>
                            <th>Numero</th>
                            <th>Operadora</th>
                            <th>Tipo</th>
                        </tr>
                        ";

                    while($row2 = $resultado2->fetch_assoc()){
                        
                        echo "<tr >";
                        echo "<td class=telefono>".$row2["tel_numero"]."</td>";
                        echo "<td>".$row2["tel_operadora"]."</td>";
                        echo "<td>".$row2["tel_tipo"]."</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                }
            }
            echo "</aside>";
        } else {
           echo "<p>No existe un usuario con este corrreo</p>";
           $senial = false;
        }
    }

    $conn->close();
?>