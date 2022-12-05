<?php 

include("db.php");

if (isset($_POST['usuario'])){
    if(isset($_POST['contrasena'])){
        if(strlen($_POST['usuario']) >= 1){
        $usuario = trim($_POST['usuario']);
        $pass = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);

        if(($_POST['privilegio']) != 1){
            $privilegio = 0;
        }else{
            $privilegio = ($_POST['privilegio']);
        }

        $sql = "INSERT INTO `esp_data`.`usuarios` (`usuario`, `contrasena`, `privilegio`) VALUES ('$usuario', '$pass', '$privilegio');";

        $resultado = mysqli_query($con, $sql);

        if($resultado){
            echo "<script>alert ('Se agrego el usuario!');window.location = 'usuarios.php'</script>";
        }
    }

    }
    
}
if (isset($_POST['nodo'])){
    if(strlen($_POST['nodo']) >= 1){
        $nombre = trim($_POST['nodo']);
        $temp = floatval($_POST['temp']);
        $hum = floatval($_POST['hum']);
        $humrel = floatval($_POST['humrel']);
        $uv = floatval($_POST['uv']);

    $sql = "INSERT INTO `esp_data`.`nodo` (`nombre`, `temp`, `hum`, `humrel`, `uv`) 
            VALUES ('$nombre', '$temp', '$hum', '$humrel', '$uv');";

    $row = mysqli_query($con, $sql);

    if($row){
        echo "<script>alert ('Se agrego el nodo!');window.location = 'nodos.php'</script>";
    }
}

    }

?>