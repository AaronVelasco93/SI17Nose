<?php 
require_once __DIR__ . "/../config/db.php";
$error="";
//1) Tomar ID
$id = (int)($_GET['id']??0);
if($id <=0){
    die("ID invalido");
}
//2) buscar el registro con ID, para mostrar en un formulario
//consulta
$sql="SELECT id, nombre, email FROM alumnos WHERE id = :id";
$stm = $pdo->prepare($sql);
$stm->execute([":id"=>$id]);
$alumno = $stm->fetch();


if(!$alumno){
    die("Registro no encontrado");
}
//3) Se envian los datos a el formulario para actualizar, por medio de POST
if($_SERVER["REQUEST_METHOD"]=== "POST"){
    $nombre = trim($_POST["nombre"]??"");
    $email = trim($_POST["email"]??"");
    if($nombre=== "" || $email ===2){
        $error="Todos los campos son obligatorios";
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error="EL CORREO NO ES VALIDO";
    }else{
        try{
            $sql="UPDATE alumnos SET nombre = :nombre, email = :email WHERE id = :id";
            $stm = $pdo->prepare($sql);
            $stm->execute([
                ":nombre" => $nombre,
                ":email" => $email,
                ":id" => $id
            ]);
            header('Location: index.php');
            exit();
        }catch(PDOException $e){
            $error = "Error al actualizar registro".$e->getMessage();
        }
    }

}else{
   $nombre= $alumno['nombre'];
   $correo= $alumno['email'];

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Alumno</title>
</head>
<body>
    <h1>Editar Alumno</h1>
    <a href="index.php"><p><- Regresar</p></a>
    <?php if($error):?>
      <p style="color:red"><?=htmlspecialchars($error)?></p>
    <?php endif;?>
    <form method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($nombre)?>" ><br><br>

        <label for="email">Correo: </label>
        <input type="text" name="email" value="<?= htmlspecialchars($correo)?>"> <br><br>
        
        <button type="submit">Actualizar</button>



    </form>

    
</body>
</html>