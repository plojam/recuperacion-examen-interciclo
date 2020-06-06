<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Agregar Libro</title>
    <style type="text/css" rel="stylesheet"> 
        .error{
            color: red;}
    </style>

</head>
<body>

    <?php
        include '../conexion/conexionBD.php';

        $cont = isset($_POST["ncap"]) ? trim($_POST["ncap"]) : null;
        $nombrel = isset($_POST["nombrel"]) ? mb_strtoupper(trim($_POST["nombrel"]), 'UTF-8') : null;
        $isbn = isset($_POST["isbn"]) ? mb_strtoupper(trim($_POST["isbn"]), 'UTF-8') : null;
        $npaginas = isset($_POST["npaginas"]) ? mb_strtoupper(trim($_POST["npaginas"]), 'UTF-8') : null;
        //echo "<p>$cont  </p>";
        $aux = 0;
        $senial = true; 
//num tit aut
        $sql00 = "SELECT lib_id FROM libro WHERE lib_nombre='$nombrel'";
        $result00 = $conn->query($sql00);
        if($result00->num_rows>0){
            $senial = false;
        }
        while($aux<$cont){
            $autor = isset($_POST["aut$aux"]) ? mb_strtoupper(trim($_POST["aut$aux"]), 'UTF-8') : null;
            $sql0 = "SELECT aut_id FROM autor WHERE aut_nombre='$autor'";
            $result0 = $conn->query($sql0);
            $aux = $aux +1;
            if($result0->num_rows==0){
                $senial = false;
                $aux = $cont;
            }

        
        }

        if($senial==true){
            $sql1 = "INSERT INTO libro VALUES (0, '$nombrel', '$isbn', $npaginas)";

            
            if($conn->query($sql1) === TRUE){
                
                $sql2 = "SELECT lib_id FROM libro WHERE lib_nombre='$nombrel'";
                $result2 = $conn->query($sql2);

                while($row = $result2->fetch_assoc()) {
                    $idlib = $row["lib_id"];
                }

                
                $aux2 = 0;
                while($aux2<$cont){
                    
                    $autor = isset($_POST["aut$aux2"]) ? mb_strtoupper(trim($_POST["aut$aux2"]), 'UTF-8') : null;
                    $sql3 = "SELECT aut_id FROM autor WHERE aut_nombre='$autor'";
                    $result3 = $conn->query($sql3);
        
                    if($result3->num_rows>0){
                        while($row = $result3->fetch_assoc()) {
                            $idaut = $row["aut_id"];
                        }
                    }
                    
                    $capnum = isset($_POST["num$aux2"]) ? trim($_POST["num$aux2"]) : null;
                    $captit = isset($_POST["tit$aux2"]) ? mb_strtoupper(trim($_POST["tit$aux2"]), 'UTF-8') : null;
                    echo "<p>si</p>";
                    echo "<p>$capnum  $captit  $idlib  $idaut $autor</p>";
                    $sql4 = "INSERT INTO capitulo VALUES (0, $capnum, '$captit', $idlib, $idaut)";
                    $conn->query($sql4);
                        
                    
                    $aux2 = $aux2 +1;

                }
                //header("Location: ../vista/index.html");
            }else{
                //header("Location: ../vista/index.html");
            }
        }


 
    ?>
 </body>
 </html>