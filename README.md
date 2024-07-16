# Prueba Técnica, Francisco Javier Ordóñez Salamanca

### Migraciones
Se ha utilizado la librería [Laravel migrations generator](https://github.com/kitloong/laravel-migrations-generator) para generar las migraciones a partir de la BBDD dada en el script sql.
Ésto nos ha generado cinco migraciones para definir y crear las tablas, y otras tres para añadir las claves foráneas a las mismas, el plugin genera las migraciones de esta forma, para que al hacer el rollback en el comando "php artisan migrate:refresh" no llegue a ocurrir un error, pues al ejecutar las migraciones en orden inverso, primero eliminará las claves foráneas para luego eliminar las tablas antes de volver a crearlas. 
### Modelos
Se han creado los modelos y se ha comprobado que no hay errores con eloquent al obtener la tabla relacionada llamando al método "::all()" de cada modelo, y comprobando que devuelve todos los registros que se encuentran en el script SQL Facilitado.
### Seeders
Se han creado los ficheros factories y seeders para todas las entidades, para el caso de la tabla "pivot" se ha creado un seeder que añade 4 registros harcodeados ya que en este punto no disponemos de relaciones para comprobar de forma eficiente si una relación existe antes de añadirla.
