<?php
    include '../conexion/conexionBD.php';
    $autor = $_GET['aut'];
    $capitulo = $_GET['cap'];
    
    if($autor!=''){
        $sq = "SELECT aut_id FROM autor WHERE aut_nombre='$autor'";
        $res = $conn->query($sq);
        if($res->num_rows > 0){
            while($row = $res->fetch_assoc()) {
                $aut_id = $row['aut_id'];
            }
            $libros = [];
            $cont = 0;
            $bandera = true;
            $sq = "SELECT cap_libro FROM capitulo WHERE cap_autor=$aut_id";
            $res = $conn->query($sq);
            if($res->num_rows > 0){
                while($row = $res->fetch_assoc()) {
                    $idlibro = $row['cap_libro'];
                    //echo "<p>el id del libro es $idlibro</p>";
                    if($cont==0){
                        $libros[$cont] = $idlibro;
                        $cont++;
                    }else{
                        $cont2 =0;
                        $bandera = true;
                        while($cont2<$cont){
                            $bandera = true;
                            $comprobar = $libros[$cont2];
                            if($comprobar==$idlibro){
                                $bandera = false;
                                $cont2 = $cont + 1;
                            }
                            $cont2++;
                        }
                        if($bandera == true){
                            array_push($libros, $idlibro);
                            $cont++;
                        }
                        
                    }
                }
            }
            $cont2 =0;
            while($cont2<$cont){
                $sql = "SELECT * FROM libro WHERE lib_id=$libros[$cont2]";
                $resultado = $conn->query($sql);
                if($resultado->num_rows > 0){
                    while($row = $resultado->fetch_assoc()){
                        echo "<aside>";
                        echo "
                            <table>
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
                                <table class=capitulo>
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
                                        echo "<td>".$row3["aut_nacionalidad"]."</td>";
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
                $cont2++;
            }
        }
        
        
    }elseif($capitulo!=''){
        $sq = "SELECT cap_libro FROM capitulo WHERE cap_titulo='$capitulo'";
        $res = $conn->query($sq);
        if($res->num_rows > 0){
            while($row = $res->fetch_assoc()) {
                $sql = "SELECT * FROM libro WHERE lib_id=".$row['cap_libro'];
                $resultado = $conn->query($sql);
                if($resultado->num_rows > 0){
                    while($row = $resultado->fetch_assoc()){
                        echo "<aside>";
                        echo "
                            <table>
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
                                <table class=capitulo>
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
                                        echo "<td>".$row3["aut_nacionalidad"]."</td>";
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
            }
        }



    }

    $conn->close();
?>