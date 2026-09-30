<?php
require_once __DIR__ . "/../config/db.php";
//1) Tomar ID
$id = (int)($_GET['id']??0);
if($id <=0){
    die("ID invalido");
}
//eliminar con consulta preparada


$sql="DELETE FROM alumnos WHERE id = :id";
$stmt=$pdo->prepare($sql);
$stmt->execute([":id"=>$id]);

//regresar a el listado
header('Location: index.php');
exit();
?>