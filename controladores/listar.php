<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title>Libros</title>
    <link rel='stylesheet' type='text/css' href='../css/listar.css'>
    <script type='text/javascript' src='../javascript/listar.js'></script>
</head>

<body>
    
   
    <form>
        <fieldse>
            <input type="text" id="autor" class="texto" name="autor" placeholder="ej. Pablo Loja" value="">
            <input type="button" id="buscarautor" name="buscarautor" value="Buscar por autor"  onclick="buscarPorAutor()">
            <br>
            <input type="text" id="capitulo" class="texto" name="capitulo" placeholder="ej. Capitulo1" value="">
            <input type="button" id="buscarcapitulo" name="buscarcapitulo" value="Buscar por capitulo" onclick="buscarPorCap()">
            <br>
            <input type="button" id="cancelar" name="volver" value="Volver" onclick=<?php echo "location.href='../vista/index.php'" ?>>
            <div class="separador"></div>
        </fieldse>
        <div class="separador"></div>
    </form>

    
    <div id="informacion"><b></b></div>

    <div id="primer_div"></div>
    <h2>Lista de usuarios</h2>

    <?php 
        include '../conexion/conexionBD.php';
        $sql = "SELECT * FROM libro";
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
                        echo "<td class=capitulo>".$row2["cap_numero"]."</td>";
                        echo "<td>".$row2["cap_titulo"]."</td>";
                        if($resultado3->num_rows > 0){
                    
                            while($row3 = $resultado3->fetch_assoc()){
                                echo "<td class=capitulo>".$row3["aut_nombre"]."</td>";
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
        $conn->close();
    ?>
</body>
</html>