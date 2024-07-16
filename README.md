# Prueba Técnica, Francisco Javier Ordóñez Salamanca

### Migraciones
Se ha utilizado la librería [Laravel migrations generator](https://github.com/kitloong/laravel-migrations-generator) para generar las migraciones a partir de la BBDD dada en el script sql.
Ésto nos ha generado cinco migraciones para definir y crear las tablas, y otras tres para añadir las claves foráneas a las mismas, el plugin genera las migraciones de esta forma, para que al hacer el rollback en el comando "php artisan migrate:refresh" no llegue a ocurrir un error, pues al ejecutar las migraciones en orden inverso, primero eliminará las claves foráneas para luego eliminar las tablas antes de volver a crearlas.
