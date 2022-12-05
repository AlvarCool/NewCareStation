<?php 

include("db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM `esp_data`.`usuarios` WHERE (`id` = '$id');";

    $resultado = mysqli_query($con, $sql);

    echo "<script>alert ('Se elimino el usuario!'); window.location = 'usuarios.php'; </script>";
}

if(isset($_GET['id_nodo'])){
    $id_nodo = $_GET['id_nodo'];
    $sql = "DELETE FROM `esp_data`.`nodo` WHERE (`id_nodo` = '$id_nodo');";

    $resultado = mysqli_query($con, $sql);

    echo "<script>alert ('Se elimino el nodo!'); window.location = 'nodos.php'; </script>";
}

?>