<?php
  session_start();
  
  if(isset($_GET['cerrar_sesion'])){
    
    session_unset();
    session_destroy();

  }

  if(isset($_POST['usuario']) && isset($_POST['contraseña'])){

    $dbhost = "carestation.mysql.database.azure.com";
    $dbuser = "ubuntu";
    $dbpass = "ubnt@1804";
    $dbname = "esp_data";

    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $db = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

    if(!$db){
        die("No hay conexion: ".mysqli_connect_error());
    }

    $query = mysqli_query($db, "SELECT * FROM usuarios WHERE usuario = '".$usuario."'");
    $row = mysqli_fetch_array($query);
    

    if(password_verify($contraseña,$row['contrasena'])){
      if($row == true){

          $rol = $row[3];
          
          $_SESSION['privilegio'] = $rol;

          header("location: dash_admin.php");

      }else{

          echo "<script>alert ('Usuario y/o contraseña incorrecta');window.location = 'login.php'</script>";
          mysqli_close($db);
      }
    }else{
      echo "<script>alert ('Usuario y/o contraseña incorrecta');window.location = 'login.php'</script>";
      mysqli_close($db);
    }
  }
?>