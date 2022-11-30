
<?php
  session_start();
  if(!isset($_SESSION['privilegio'])){
      header("location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    CareStation | Informacion
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="dashboard.php" target="_blank">
        <img src="../assets/img/icons/planta.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Care Sation</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <?php 
          ?>
          <a class="nav-link" href="../pages/dash_admin.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Inicio</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../pages/tables.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Informacion</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/zan.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Graficas</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/alta-usuario.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Alta de usuario</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/alta-nodo.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Alta de nodo</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/cerrarsesion.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Desconectarse</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pagina</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Informacion</li>
          </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-5">
            <div class="card-header pb-0">
              <h6>Temperatura</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                
                <?php
                $dbhost = "carestation.mysql.database.azure.com";
                $dbuser = "ubuntu";
                $dbpass = "ubnt@1804";
                $dbname = "esp_data";

                $con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

                $temperatura = mysqli_query($con, "SELECT * FROM esp_data.temperatura order by id_temp desc limit 5;");
                $humedad = mysqli_query($con, "SELECT * FROM esp_data.humedad order by id_hum desc limit 5;");
                $humedad_rel = mysqli_query($con, "SELECT * FROM esp_data.humedad_rel order by id_humrel desc limit 5;");
                $uv = mysqli_query($con, "SELECT * FROM esp_data.uv order by id_uv desc limit 5;");

                if ($temperatura) { ?>
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr class="align-middle text-center text-sm">
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NODO</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">TEMPERATURA</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">HORA</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  while ($reg_temp=mysqli_fetch_array($temperatura)) {?>
                    <tr>
                      <td>
                        <div class="align-middle text-center text-sm">
                          <p class="text-xs font-weight-bold mb-0"><?php echo $reg_temp['id_temp'];?></p>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <div class="align-middle text-center text-sm">
                          <p class="text-xs font-weight-bold mb-0"><?php echo $reg_temp['nodo'];?></p>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <div class="align-middle text-center text-sm">
                          <p class="text-xs font-weight-bold mb-0"><?php echo $reg_temp['temperatura'];?></p>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <div class="align-middle text-center text-sm">
                          <p class="text-xs font-weight-bold mb-0"><?php echo $reg_temp['hora'];?></p>
                        </div>
                      </td>
                    </tr>
                    <?php }?>
                </table>
                <?php }?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Humedad</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              <?php
              if ($humedad) { ?>
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr class="align-middle text-center text-sm">
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NODO</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">HUMEDAD</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">HORA</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  while ($reg_hum=mysqli_fetch_array($humedad)) {?>
                    <tr>
                      <td>
                        <div class="align-middle text-center text-sm">
                          <p class="text-xs font-weight-bold mb-0"><?php echo $reg_hum['id_hum'];?></p>
                        </div>
                      </td>
                        <td class="align-middle text-center text-sm">
                          <div class="align-middle text-center text-sm">
                          <p class="text-xs font-weight-bold mb-0"><?php echo $reg_hum['nodo'];?></p>
                          </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <div class="align-middle text-center text-sm">
                          <p class="text-xs font-weight-bold mb-0"><?php echo $reg_hum['humedad'];?></p>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <div class="align-middle text-center text-sm"> 
                          <p class="text-xs font-weight-bold mb-0"><?php echo $reg_hum['hora'];?></p>
                        </div>
                      </td>
                    </tr>
                    <?php }?>
                </table>
                <?php }?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Humedad del suelo</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              <?php
              if ($humedad_rel) { ?>
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr class="align-middle text-center text-sm">
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NODO</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">HUMEDAD SUELO</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">HORA</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  while ($reg_humrel=mysqli_fetch_array($humedad_rel)) {?>
                    <tr>
                      <td>
                        <div class="align-middle text-center text-sm">
                          <p class="text-xs font-weight-bold mb-0"><?php echo $reg_humrel['id_humrel'];?></p>
                        </div>
                      </td>
                        <td class="align-middle text-center text-sm">
                          <div class="align-middle text-center text-sm">
                          <p class="text-xs font-weight-bold mb-0"><?php echo $reg_humrel['nodo'];?></p>
                          </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <div class="align-middle text-center text-sm">
                          <p class="text-xs font-weight-bold mb-0"><?php echo $reg_humrel['humedad_rel'];?></p>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <div class="align-middle text-center text-sm">
                          <p class="text-xs font-weight-bold mb-0"><?php echo $reg_humrel['hora'];?></p>
                        </div>
                      </td>
                    </tr>
                    <?php }?>
                </table>
                <?php }?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Luz UV</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              <?php
              if ($uv) { ?>
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr class="align-middle text-center text-sm">
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NODO</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">HUMEDAD SUELO</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">HORA</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  while ($reg_uv=mysqli_fetch_array($uv)) {?>
                    <tr>
                      <td>
                        <div class="align-middle text-center text-sm">
                          <p class="text-xs font-weight-bold mb-0"><?php echo $reg_uv['id_uv'];?></p>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <div class="align-middle text-center text-sm">
                          <p class="text-xs font-weight-bold mb-0"><?php echo $reg_uv['nodo'];?></p>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <div class="align-middle text-center text-sm">
                          <p class="text-xs font-weight-bold mb-0"><?php echo $reg_uv['uv'];?></p>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <div class="align-middle text-center text-sm">
                          <p class="text-xs font-weight-bold mb-0"><?php echo $reg_uv['hora'];?></p>
                        </div>
                      </td>
                    </tr>
                    <?php }?>
                </table>
                <?php }?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Argon Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0 overflow-auto">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">Dark</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="d-flex my-3">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <div class="mt-2 mb-5 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/argon-dashboard">Free Download</a>
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/argon-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/argon-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Argon%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fargon-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/argon-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.0"></script>
</body>

</html>