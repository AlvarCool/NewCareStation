<?php
    $conexion = mysqli_connect("carestation.mysql.database.azure.com","ubuntu","ubnt@1804","esp_data","3306");
    mysqli_set_charset($conexion,"utf8");

    
?>
<?php
    // PHP Data Objects(PDO) Sample Code:
    try {
        $conn = new PDO("sqlsrv:server = carestation.mysql.database.azure.com,3306; Database = esp_data", "ubuntu", "ubnt@1804");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        print("Error connecting to SQL Server.");
        die(print_r($e));
    }

    // SQL Server Extension Sample Code:
    $connection_info = array("UID" => "ubuntu", "pwd" => "ubnt@1804", "Database" => "esp_data", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
    $serverName = "tcp:carestation.mysql.database.azure.com";
    $conn = sqlsrv_connect($serverName, $connection_info);
?>