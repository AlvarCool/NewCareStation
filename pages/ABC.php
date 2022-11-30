<?php 
  include("db.php");

  if (isset($_POST['nombrenodo'])){
    if(strlen($_POST['nombrenodo']) >= 1);{
        $nombre = trim($_POST['nombrenodo']);

        $sql = "INSERT INTO `esp_data`.`nodo` (`nombre`) VALUES ('$nombre')";
        $resultado = mysqli_query($con, $sql);

        if($resultado){
            echo "<script>alert ('Se dio de alta el nodo');window.location = 'alta-nodo.php'</script>";
        }
    }
  }
  
  if (isset($_POST['usuario'])){
    if(strlen($_POST['usuario']) >= 1);{
        $usuario = trim($_POST['usuario']);
        $pass = password_hash($_POST['contraseña'], PASSWORD_BCRYPT);
        if(($_POST['privilegio']) != 1){
            $privilegio = 0;
        }else{
            $privilegio = ($_POST['privilegio']);
        }

        $sql = "INSERT INTO `esp_data`.`usuarios` (`usuario`, `contrasena`, `privilegio`) VALUES ('$usuario', '$pass', '$privilegio')";
        $resultado = mysqli_query($con, $sql);

        if($resultado){
            echo "<script>alert ('Se dio de alta el usuario ;');window.location = 'alta-usuario.php'</script>";
        }
    }
  }
?>