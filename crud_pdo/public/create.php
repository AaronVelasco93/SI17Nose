<?php
//public /create.php
require_once __DIR__ . "/../config/db.php";

// variables para mostrar errores
$error = "";
$nombre = "";
$email = "";
//Si el fomulario se envia por POST
if( $_SERVER["REQUEST_METHOD"] === "POST"){
        $nombre = trim($_POST["nombre"] ?? "");
        $email = trim($_POST["email"] ?? "");
        
    if($nombre === "" || $email === ""){
        $error="Todos los campos sin obligatorios";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = "El correo no es valido";
    }else{
        try{
            // Inserter la consulta preparada y segura
            $sql = "INSERT INTO alumnos (nombre,email) VALUES (:nombre,:email)";
            $stmt=$pdo->prepare($sql);
            $stmt->execute([
                ":nombre" => $nombre,
                ":email" => $email,
            ]);

            // Redirigir a el listado
            header("Location: index.php");
            exit();
        }catch(PDOException $e){
            $error = "Error al guardar:". $e->getMessage();
        }
    }


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Alumno</title>
</head>
<body>
    <h1>Crear alumno</h1>
    <p><a href="index.php"><- Regresar a pagina iniciar</a></p>
    <?php if($error):?>
        <p style="color: red;" ><?= htmlspecialchars($error) ?></p>
    <?php endif;?>
    <form method="POST">
        <label for="Nombre">Nombre</label>
        <input type="text" name="nombre" required  value="<?= htmlspecialchars($nombre)?>"> <br><br>

        <label for="Email">Email</label>
        <input type="email" name="email" required value="<?= htmlspecialchars($email)?>"> <br><br>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>
