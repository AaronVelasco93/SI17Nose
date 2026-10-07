<?php 
    require_once __DIR__ . "/../config/db.php";
    //Consultar los registros

    // declaracion de sql
    $consulta="SELECT id, nombre, email, created_at FROM alumnos ORDER BY  id DESC";
    $stm=$pdo->query($consulta);
    $alumnos = $stm->fetchAll();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PDO - Alumnos</title>
</head>
<body>
     <h1>CRUD PDO </h1>
     <a href="create.php">+ Nuevo alumno</a>
     <h2>Lista</h2>
     <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Creado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- Si no tenemos alumnos -->
             <?php if(count($alumnos)=== 0):?>
                <tr><td><h2>No tenemos alumnos</h2></td></tr>
            <?php else:  ?>
                <?php foreach($alumnos as $a):?>
                <tr>
                    <td><?= htmlspecialchars($a["id"]) ?></td>
                    <td><?= htmlspecialchars($a["nombre"]) ?></td>
                    <td><?= htmlspecialchars($a["email"]) ?></td>
                    <td><?= htmlspecialchars($a["created_at"]) ?></td>
                    <td>
                        <a href="edit.php?id=<?=urldecode($a["id"]) ?>">Editar</a>
                        <a href="delete.php?id=<?=urlencode($a["id"]) ?> " onclick=" return confirm('Quieres elimnar el registro?')">Eliminar</a>
                    </td>
    
                </tr>
                <?php endforeach;?>
            <?php endif;?>

        </tbody>


     </table>
    

</body>
</html>