<?php
include 'C:\xampp\htdocs\Works\PackManagement\Dashboard\Controller\ReservationC.php';

$ReservationC = new ReservationC();
$reservationList = $ReservationC->AfficherReservation();

$PuckNumber = $ReservationC->getTotalres();

	//// number of taxis per page
	$itemsPerPage = 3; // Adjust as needed
	// Get the total number of users
	$totalRES = $ReservationC->getTotalres();
	// Calculate the total number of pages
	$totalPages = ceil($totalRES / $itemsPerPage);
	$currentPage = 1;
	$start = 0;    
  if(isset($_GET['Search'])) {
    // Traiter la recherche en utilisant la méthode Recherche de votre classe OffreC
    $reservationList = $ReservationC->RechercheB($_GET['Search']);
  } else {
    // Si aucune recherche n'a été effectuée, afficher tous les Packs normalement
    $reservationList = $ReservationC->AfficherReservation();
  }
    if (isset($_GET['page']) && !empty($_GET['page'])) {
        $currentPage = (int) strip_tags($_GET['page']);

			$currentPage = max(1, min($currentPage, $totalPages));
			$start = ($currentPage - 1) * $itemsPerPage;

    }	elseif(isset($_GET['Search']))
		{
		$reservationList = $ReservationC->RechercheB($_GET['Search']);
		}
     elseif(isset($_GET['dateACS']))
    {
      $reservationList = $ReservationC->tridatecreation();
    }
    elseif(isset($_GET['dateDESC']))
    {
      $reservationList = $ReservationC->tridatecreationD();
    }
	 else 
		{
		$reservationList = $ReservationC->AfficherReservation();
		}

	if (!isset($_GET['Search']) && !isset($_GET['dateACS']) && !isset($_GET['dateDESC']) ) {          ////// if cat (Afficher taxis per category) not present he display the pagination
		$reservationList = $ReservationC->getresWithPagination($start, $itemsPerPage);
	}

  $data = $ReservationC->getOffresLesPlusReservees();

// Conversion des données en format JSON et retour
$data_json = json_encode($data);




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
  <title>
    Pack
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/style.css">
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">

  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="../../assets/img/logos/logo web.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Wild Wander</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white " href="../../pages/dashboard.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white ">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">User Management</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white ">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Flight Management</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white ">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Accomodation Management</span>
          </a>
        </li>
        <li class="nav-item" onmouseover="showSubmenu()" onmouseout="hideSubmenu()">
          <a class="nav-link text-white active bg-gradient-primary" href="#">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Pack Management</span>
          </a>
          <ul id="submenu" class="submenu">
            <li>
              <a href="AjouterPack.php" class="nav-link text-white">Add</a>
            </li>
            <li>
              <a href="afficherPack.php" class="nav-link text-white">Show</a>
            </li>
          </ul>
        </li>

        <script>
          function showSubmenu() {
            document.getElementById("submenu").style.display = "block";
          }

          function hideSubmenu() {
            document.getElementById("submenu").style.display = "none";
          }
        </script>

        <li class="nav-item">
          <a class="nav-link text-white ">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Claims Management</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white ">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Blog Management</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white ">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">notifications</i>
            </div>
            <span class="nav-link-text ms-1">Notifications</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white ">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white ">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">login</i>
            </div>
            <span class="nav-link-text ms-1">Sign In</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white ">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">Sign Up</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
      <h6 class="font-weight-bolder mb-0">Wild Wander</h6>

        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
                  <!------------------------Search bar----------------------->
          <div class="input-group input-group-outline">
                      <form method="GET">
                        <input type="text" name="Search" id="Search" class="form-control" placeholder="Search...">
                      </form>
           </div>
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            
           
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Reservation Table</h4>
                <div class="input-group input-group-outline">
                      
                    </div>

                <a href="afficherPack.php" class="btn btn-primary">Pack List </a>
                <a href="stat.php" class="btn btn-primary">statistique  </a>

                <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="AfficherReservations.php" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  Filter By
                </a>
                   

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="AfficherReservations.php?dateACS">date cration in ascending order</a></li>
                <li><a class="dropdown-item" href="AfficherReservations.php?dateDESC">date cration in descending order </a></li>
                </ul>
                <!-- Add a button or link to trigger PDF download -->
<a class="btn btn-primary" href="generate_pdf.php" target="_blank">Download PDF</a>

           </div>
                <!-- "validateForm" marbouta bl fichier controle.js mawjoud f dossier 'js'  -->
                <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ID</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Seats Number</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Source</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Paiement</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date Creation</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">pack name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Update</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <?php

                  foreach ($reservationList as $reservation) {
                  ?>
                    <tbody>
                      <tr>
                        
                              <td><?php echo $reservation['idReservation']; ?></td>
                              <td><?php echo $reservation['nombrePlaces']; ?></td>
                              <td><?php echo $reservation['source']; ?></td>
                              <td><?php echo $reservation['paiement']; ?></td>
                              <td><?php echo $reservation['dateCreation']; ?></td>
                        <td>
                            <?php
                                $offre = $ReservationC->Recupereroffre($reservation['idOffre']);
                                $nomOffre = $offre['nom_offre'];
                                echo "$nomOffre";
                            ?> 
                            </td>
                        <td>
                          <form method="GET" action="modifierReservation.php">
                            <input type="submit" class="btn btn-success btn-sm" name="Modifier" value="Edit">
                            <input type="hidden" value=<?php echo $reservation['idReservation']; ?> name="idReservation">
                          </form>
                        </td>
                        <td>
                          <a class="btn btn-danger btn-sm" href="SupprimerReservation.php?idReservation=<?php echo $reservation['idReservation']; ?>">Delete</a>
                        </td>
                      </tr>
                    </tbody>
                  <?php
                  }
                  ?>

                </table>
                <div class="pagination">
    <?php
        for ($i = 1; $i <= $totalPages; $i++) {
            echo "<a href='AfficherReservations.php?page=$i' ";
            if ($i == $currentPage) {
                echo "class='active'";
            }
            echo ">$i</a>";
        }
    ?>
</div>

     <style>
.pagination {
  display: flex;
  justify-content: center;
}

.pagination a {
  border: 1px solid #ddd;
  color: black;
  padding: 10px 12px;
  text-decoration: none;
  transition: background-color .3s;
}

.pagination a.active {
  background-color: #6B4CAF;
  color: white;
  border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {
  background-color: #ddd;
}   </style>


   </div>
  </div>



              </div>
              <div class="card">
  <div class="card-title">
    <h4>Offre By Reservartion</h4>
  </div>
  <div class="card-body">
  <canvas id="statistiqueChart" width="400" height="400"></canvas> <!-- Modifier la taille du canvas -->
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        var jsonData = <?php echo $data_json; ?>; // Inclure les données JSON directement dans le script

        var labels = [];
        var values = [];
        var colors = []; // Tableau de couleurs

        // Parcourir les données et extraire les labels, les valeurs et les couleurs
        jsonData.forEach(function(item) {
            labels.push(item.nom_offre); // Nom de l'offre
            values.push(item.nombreReservations); // Nombre de réservations
            colors.push(getRandomColor()); // Ajouter une couleur aléatoire
        });

        var ctx = document.getElementById('statistiqueChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie', // Changer le type de graphique en "doughnut" pour un graphique circulaire
            data: {
                labels: labels,
                datasets: [{
                    label: 'Nombre de réservations',
                    data: values,
                    backgroundColor: colors, // Utiliser les couleurs définies
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: true, // Afficher la légende
                        position: 'right' // Position de la légende
                    }
                }
            }
        });
    });

    // Fonction pour obtenir une couleur aléatoire
    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }
</script>
            </div>
         
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">

          </footer>
          <!-- partial -->
        </div>



        <!-- End Navbar -->
        <div class="container-fluid py-4">
          <footer class="footer py-4  ">

          </footer>
        </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Material UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
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
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3 d-flex">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <!-- <hr class="horizontal dark my-sm-4">
        <div class="w-100 text-center">
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div> -->
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../../assets/js/core/popper.min.js"></script>
  <script src="../../assets/js/core/bootstrap.min.js"></script>
  <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
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
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../../assets/js/material-dashboard.min.js?v=3.1.0"></script>
  <script src="assets/javascript.js"></script>
</body>

</html>