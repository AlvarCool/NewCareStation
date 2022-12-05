<?php 

include("db.php");

if (isset($_POST['usuario'])){
    if(isset($_POST['contrasena'])){
        if(strlen($_POST['usuario']) >= 1){
        $usuario = trim($_POST['usuario']);
        $pass = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);
        $id = $_POST['id'];

        if(($_POST['privilegio']) != 1){
            $privilegio = 0;
        }else{
            $privilegio = ($_POST['privilegio']);
        }

        $sql = "UPDATE `esp_data`.`usuarios` SET `usuario` = '$usuario', `contrasena` = '$pass', `privilegio` = '$privilegio' 
                WHERE (`id` = '$id');";

        $resultado = mysqli_query($con, $sql);

        if($resultado){
            echo "<script>alert ('Se modifico el usuario!');window.location = 'usuarios.php'</script>";
        }
    }

    }else{
        echo "<script>alert ('Ingrese contraseña de usuario');</script>";
    }
    
}

if (isset($_POST['nombre'])){
    if(strlen($_POST['nombre'] >= 1)){
        $id_nodo = $_POST['id_nodo'];
        $nombre = trim($_POST['nombre']);
        $temp = floatval($_POST['temp']);
        $hum = floatval($_POST['hum']);
        $humrel = floatval($_POST['humrel']);
        $uv = floatval($_POST['uv']);

        $sql = "UPDATE `esp_data`.`nodo` SET `nombre` = '$nombre', `temp` = '$temp', `hum` = '$hum', `humrel` = '$humrel', `uv` = '$uv' WHERE (`id_nodo` = '$id_nodo')";

        $row = mysqli_query($con, $sql);

        if($row){
            echo "<script>alert ('Se modifico el nodo!');window.location = 'nodos.php'</script>";
        }

    }
}
?>