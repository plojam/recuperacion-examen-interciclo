<?php
    include '../conexion/conexionBD.php';
    $nombre = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8') : null;
    $nacionalidad= isset($_POST["nacionalidad"]) ? mb_strtoupper(trim($_POST["nacionalidad"]), 'UTF-8') : null;

    $sql1 = "SELECT aut_id FROM autor WHERE aut_nombre='$nombre'";
    $result1 = $conn->query($sql1);

    if($result1->num_rows==0){
        $sql2 = "INSERT INTO AUTOR VALUES (0, '$nombre', '$nacionalidad')";

        if($conn->query($sql2) === TRUE){
            header("Location: ../vista/index.html");
        }else{
            header("Location: ../vista/autor.html");
        }
    }

    
?>