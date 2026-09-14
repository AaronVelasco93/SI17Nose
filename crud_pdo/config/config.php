<?php
// config/config.php
//leer la configuracion de las variables de entorno y usaremos las que estan por default para el entorno local
// En Docker Compose, los valores llegaran desde el servicio APP
return [
    // Host de la DB. En XAMPP/Mac conviene 127.0.0.1 para forzar TCP.
    "DB_HOST" => getenv("DB_HOST") ?: "127.0.0.1",
    //Puerto TCP de MySQL
    "DB_PORT" => getenv("DB_PORT") ?: "3306",
    //nombre de la base de datos Objetivo a consultar
    "DB_NAME" => getenv("DB_NAME") ?: "crud_pdo",
    //credenciales de la base de datos
    "DB_USER" => getenv("DB_USER") ?: "root",
    "DB_PASS" => getenv("DB_PASS")  ?: "Aaron123",
     //charset para evistra problemas de acentos
     "DB_CHARSET" => getenv("DB_CHARSET") ?: "utf8mb4",

];
?>
