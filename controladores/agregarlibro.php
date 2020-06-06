<!DOCTYPE html>

<html lang="es">
<head>
  <meta charset="utf-8"/>
  <title>Perfil</title>
  <link rel="stylesheet" type="text/css" href="../css/agregarlibro.css">
  <script type="text/javascript" src="../javascript/agregarlibro.js"></script>
</head>

<body>

  <form method="POST" action="bd_agregar_libro.php">
      <fieldset>
        <legend>Agregar Nuevo Usuario</legend>
        <label>Nombre del libro</label>
        <input type="text" id="nombrel" name="nombrel">
        <label>ISBN</label>
        <input type="text" id="isbn" name="isbn">
        <label>Numero de paginas</label>
        <input type="text" id="npaginas" name="npaginas">

        <label>Numero capitulos</label>
        <input type="text" id="ncap" name="ncap">
        <input type="button" id="agcap" name="agcap" value="Agregar cap" onclick="return capitulos()">

        <input type="button" id="cancelar" name="cancelar" value="cancelar" onclick="location.href='index.html'">
        <input type="submit" id="agregar" name="agregar" value="agregar">
        <div id="informacion"></div>

      </fieldset>
    </form>

</body>
</html>