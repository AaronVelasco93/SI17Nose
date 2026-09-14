<?php
    // Cargar la configuracion
    $config = require __DIR__ . "/config.php";
    // Extrar las variables del arreglo
     $host =    $config["DB_HOST"];
     $port =    $config["DB_PORT"];
     $dbname =  $config["DB_NAME"];
     $user =    $config["DB_USER"];
     $pass =    $config["DB_PASS"];
     $charset=  $config["DB_CHARSET"];

    //  Opciones recomendas para PDO
    $options=[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //Lanza exepcion en error de MYSQL
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,//devuelve arrays asociativos
        PDO::ATTR_EMULATE_PREPARES => false,// Usa prepares reales de Driver
        ];
        

    try{
        //dsn: incluye el puerto, host, nombre de la DB y charset
        //Esto permite que el mismo codigo funciones en docker yu local
        $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=$charset";
        $pdo = new PDO($dsn, $user, $pass, $options);

    }catch(PDOException $e){
    error_log("Error de conexión: " . $e->getMessage());
    die("Error al conectar con la base de datos.");
}
