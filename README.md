# Prueba Técnica, Francisco Javier Ordóñez Salamanca

### Migraciones
Se ha utilizado la librería [Laravel migrations generator](https://github.com/kitloong/laravel-migrations-generator) para generar las migraciones a partir de la BBDD dada en el script sql.
Ésto nos ha generado cinco migraciones para definir y crear las tablas, y otras tres para añadir las claves foráneas a las mismas, el plugin genera las migraciones de esta forma, para que al hacer el rollback en el comando "php artisan migrate:refresh" no llegue a ocurrir un error, pues al ejecutar las migraciones en orden inverso, primero eliminará las claves foráneas para luego eliminar las tablas antes de volver a crearlas. 
### Modelos
Se han creado los modelos y se ha comprobado que no hay errores con eloquent al obtener la tabla relacionada llamando al método "::all()" de cada modelo, y comprobando que devuelve todos los registros que se encuentran en el script SQL Facilitado.
### Seeders
Se han creado los ficheros factories y seeders para todas las entidades, para el caso de la tabla "pivot" se ha creado un seeder que añade 4 registros harcodeados ya que en este punto no disponemos de relaciones para comprobar de forma eficiente si una relación existe antes de añadirla.

## Relaciones
Se han creado las relaciones especificadas, para la relación "writer" en el modelo comment y la relación "owner" en el modelo post se ha tenido que especificar la columna que hace referencia a la clave foránea debido a la forma en la que laravel hace la búsqueda de la misma, está especificado en un comentario en las dos relaciones.
Para "userCategories" se ha hecho uso de la carga anidada, también está detallado en un comentario en la propia función.

## Category CRUD
Para el crud de categorías hemos creado un controlador de tipo resource, con esto hemos conseguido, de una parte, no tener que declarar todas las rutas en el router de la api, ya que añadiendo el resource es suficiente. Con esto y habiendo especificado el modelo asociado a este controlador, laravel se ha encargado de crear todas las funciones del crud, y en las que es necesario, como por ejemplo show, update.., que reciban como parámetro el objeto category, logrando así no tener que buscarlo dentro del método del controlador.
Para los métodos store y update, se ha creado una clase Request personalizada, que incluye las validaciones de los parámetros que se envían en el body de la petición.
Para controlar el mensaje que devuelve la API cuando se introduce un id de una categoría que no existe, se ha manejado de forma global la excepción que lanza laravel al no encontrar el recurso, y personalizado la respuesta.
