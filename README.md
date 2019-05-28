# integro

##Configuración

-Descargar todos los archivos (incluyendo el .htaccess)

-Descarga e importa el archivo intregro.sql

-El usuario de la BD es "root" y está sin password

-Para cambiar el usuario y el password de la BD, se debe ir a "includes/admin/connect.php"

##Acceso

adm1n / A12345

##Consideraciones

-Hice todo el sistema sin utilizar framework.

-Utilicé MySql para la BD.

-En el .htaccess eliminé la extensión ".php" de los archivos, para mejorar la navegación.

-Se manejan las sesiones con localstorage.

-Utilicé el HTTP POST request de jQuery para los CRUD´s.

-Creé un archivo de servicios (sin token de validación), el cual consumo cada vez hago un CRUD.

-Al editar, ya sea un usuario o película, el sistema NO redirecciona al listado de elementos, por si se quiere seguir editando.

-La contraseña de usuario se cambia independiente de los demás datos, ya que en la BD está encriptada.

-El usuario no se puede eliminar el mismo.

-Para eliminar un registro, se debe hacer una validación de 2 pasos.
