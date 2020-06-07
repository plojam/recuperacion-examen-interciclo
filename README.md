# Base de datos

Para la estructura de la base de datos se crearon tres tablas, las cuales son las siguiente:

![aut](/imagenes/autor.png)

![lib](/imagenes/libro.png)

![cap](/imagenes/capitulo.png)

Ademas, la tabla de capitulo tiene llaves foraneas las cuales indican las relaciones que tienen con el autor y el libro al que pertenece.

![for](/imagenes/foraneas.png)


# conexion

Primero se conecta a la base de datos que corresponde a la correccion.

![img0](/imagenes/i0.png)

# Index

Primero, se creo una pagina index.html para navegar entre las distintas paginas creadas.

![img1](/imagenes/i1.png)

# Crear autor

Luego, a pesar de que no es requerido, se creo una pagina que permite agregar un autor a la base de datos, ademas, con el uso de javascript se valido que los campos sean correctos, la pagina se ve de la siguiente forma:

![img2](/imagenes/i2.png)

# Agregar libro

Para la pagina de agregacion de libro, se creo un formulario donde sus campos usan javascript para verificar el correcto ingreso de datos, ademas se agrego un campo para añadir el numero de capitulos que tiene el libro, la pagina, con ayuda de un archivo css se ve de la siguiente forma:

![img3](/imagenes/i3.png)

Ademas, cuando se agregan capitulos, se usa AJAX para desplegar campos que permiten ingresar los datos respectivos de la cantidad de capitulos indicados, entonces, la pagina se ve de la siguiente forma:

![img4](/imagenes/i4.png)

# Listar

Para la pagina de listar libros se agregaron tablas que listan todos los libros ingresados en la base de datos, indicando los capitulos que tiene cada libro con su respectivo autor, la pagina queda de la siguinte forma:

![img5](/imagenes/i5.png)

Ademas, se agrego un apartado que permite buscar libros tanto por el autor de uno de sus libros como poe el titulo de uno de sus capitulos, esta funcionalidad de la pagina sirve gracias a la implementacion de AJAX, por lo que la pagina no se recargara al momento de buscar libros.

Buscando un libro por el autor de uno de sus capitulos, la pagina se ve de la siguiente forma:

![img6](/imagenes/i6.png)

Encambio, para la buscar un libro mediante el nombre de uno de sus capitulos, la pagina se ve de esta forma:

![img7](/imagenes/i7.png)



