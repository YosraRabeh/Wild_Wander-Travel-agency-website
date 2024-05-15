
<?php
include_once 'C:\xampp\htdocs\ali&yossra\ali&yossra\UserManagment\Dashboard\Controller\UserC.php';

session_start();

$UserC = new UserC();

$idUser = $_SESSION['idUser'];
  $user = $UserC->RecupererUser($idUser);


$userNumber = $UserC->getTotalUsers();

	//// number of taxis per page
	$itemsPerPage = 6; // Adjust as needed
	// Get the total number of users
	$totalUsers = $UserC->getTotalUsers();
	// Calculate the total number of pages
	$totalPages = ceil($totalUsers / $itemsPerPage);
	$currentPage = 1;
	$start = 0; ;
	    


    if (isset($_GET['page']) && !empty($_GET['page'])) {
        $currentPage = (int) strip_tags($_GET['page']);

			$currentPage = max(1, min($currentPage, $totalPages));
			$start = ($currentPage - 1) * $itemsPerPage;

    }	elseif(isset($_GET['Search']))
		{
		$userList = $UserC->Recherche($_GET['Search']);
		} elseif(isset($_GET['role']))
    {
      $userList = $UserC->TriRole();
    }elseif(isset($_GET['username']))
    {
      $userList = $UserC->TriUsername();
    }elseif(isset($_GET['dob']))
    {
      $userList = $UserC->TriDob();
    }
	 else 
		{
		$userList = $UserC->AfficherUser();
		}

	if (!isset($_GET['Search']) && !isset($_GET['role']) && !isset($_GET['username']) && !isset($_GET['dob']) ) {          ////// if cat (Afficher taxis per category) not present he display the pagination
		$userList = $UserC->getUserWithPagination($start, $itemsPerPage);
	}

  $roleCounts = $UserC->CountUsersByRole();

  $roleData = [];
  foreach ($roleCounts as $roleCount) {
      $roleData[$roleCount['role']] = (int)$roleCount['count'];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    user Management  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
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
        <span class="ms-1 font-weight-bold text-white">Wild wander</span>
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
          <a class="nav-link text-white active bg-gradient-primary " href="../pages/User/AfficherUtilisateurs.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">User Management</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../../pages/flight.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Flight Management</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../../pages/accomodation.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Accomodation Management</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../../pages/pack/afficherPack.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Pack Management</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../../pages/claim.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Claims</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../../pages/blog.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Blog Management</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../../pages/notifications.html">
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
          <a class="nav-link text-white " href="../../pages/profile.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../../pages/sign-in.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">login</i>
            </div>
            <span class="nav-link-text ms-1">Sign In</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../../pages/sign-up.html">
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
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tables</li>
            

          </ol>
          <h6 class="font-weight-bolder mb-0">Tables</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">

            <!------------------------Search bar----------------------->
          <div class="input-group input-group-outline">
              <label class="form-label">Type here...</label>
              <form method="GET">
              <input type="text" name="Search" id="Search" class="form-control">
              </form>
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
                        <img src="../../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
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
            
            <li class="nav-item d-flex align-items-center">
            <?php if(!(isset($_SESSION['idUser'])&& $_SESSION['idUser']!=-1)){
								?>
              <a href="../../../../../../login.php" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Login</span>
              </a>
              <?php }
                ?>
              <?php if(isset($_SESSION['idUser'])&& $_SESSION['idUser']!=-1){
						?>
              	<a href="../../../../../../logoutBack.php" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Logout</span>
              </a>
                <?php }
                 ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
    <?php
           if(isset($_GET['successMessage'])){
            $successMessage = $_GET['successMessage'];
              
            echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
            '$successMessage'
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>"; 
           }

		   if(isset($_GET['message'])){
            $message = $_GET['message'];
              
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            '$message'
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>"; 
           }

		   if(isset($_GET['mess'])){
            $mess = $_GET['mess'];
              
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
            '$mess'
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>"; 
           }

          ?>

      <div class="row">

      <div class="col-lg-5 col-sm-5">
      <div class="card">
      <div class="card-header p-3 pt-2 bg-transparent">
        <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
          <i class="material-icons opacity-10">person_add</i>
        </div>
        <div class="text-end pt-1">
          <p class="text-sm mb-0 text-capitalize ">Users</p>
          <h4 class="mb-0 "><?php echo $userNumber ?></h4>
        </div>
      </div>
      </div>
    </div>


    <div class="col-lg-5 col-sm-5">
      <div class="card">
      <div class="card-header p-3 pt-2 bg-transparent">
        <div class="icon icon-shape icon-shape bg-gradient-danger shadow-danger text-center border-radius-xl mt-n4 position-absolute">
          <i class="material-icons opacity-10">person_add</i>
        </div>
        <div class="text-end pt-1">
          <h2 class="text-sm mb-0 text-capitalize ">Connected Admin</h2>
          <h4 class="mb-0 "><?php echo $user['username']; ?></h4>
        </div>
      </div>
      </div>
    </div>
    <br>
    <br><br><br><br>

        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">users table</h6>
              </div>
              <br>
              <a class="btn btn-primary" href="AjouterUtilisateur.php" role="button">Create new User</a>
              <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="AfficherUtilisateurs.php" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  Filter By
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="AfficherUtilisateurs.php?role">Role</a></li>
                  <li><a class="dropdown-item" href="AfficherUtilisateurs.php?username">Username</a></li>
                  <li><a class="dropdown-item" href="AfficherUtilisateurs.php?dob">Date of Birth</a></li>
                </ul>
              </div>
            </div>


            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Password</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date of Birth</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Show</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                    </tr>
                  </thead>
                 
                 <?php
		
				          foreach($userList as $user){
			            ?>
                  <tbody>
                    <tr>
                    <td>
                      <img src="uploads/<?php echo $user['image']; ?>" height="40px" width="40px" alt="" style="border-radius: 50%;">
                    </td>
                      <td><?php echo $user['idUser']; ?></td>
                      <td><?php echo $user['username']; ?></td>
                      <td><?php echo $user['email']; ?></td>
                      <td><?php echo $user['password']; ?></td>
                      <td><?php echo $user['dob']; ?></td>
                      <td><?php echo $user['role']; ?></td>
                      <td>
                       <form method="GET" action="ShowUser.php">
                        <input type="submit"  class="btn btn-dark btn-sm" name="Show" value="Show">
                        <input type="hidden"  value=<?php echo $user['idUser']; ?>  name="idUser">  
                       </form>
                      </td>
                      <td>
                       <form method="GET" action="ModifierUtilisateur.php">
                        <input type="submit"  class="btn btn-success btn-sm" name="Modifier" value="Edit">
                        <input type="hidden"  value=<?php echo $user['idUser']; ?>  name="idUser">  
                       </form>
                      </td>
                  <td>
                    <a  class="btn btn-danger btn-sm"   href="SupprimerUser.php?idUser=<?php echo $user['idUser']; ?>">Delete</a>
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
                    echo "<a href='AfficherUtilisateurs.php?page=$i' ";
                    if ($i == $currentPage) {
                        echo "class='active'";
                    }
                    echo ">$i</a>";
                }
            ?>
        </div>


              </div>
              
            </div>


             </div>  

          </div>
          
        </div>
        <div class="card">
              <div class="card-body">
                <div class="card-title">
                  <h4>Users By Role</h4>
                </div>
                <canvas id="rolePieChart" width="400" height="400"></canvas>
              </div>
      </div>
      

      
     
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
        <hr class="horizontal dark my-sm-4">
        <a class="btn bg-gradient-info w-100" href="https://www.creative-tim.com/product/material-dashboard-pro">Free Download</a>
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
var ctx = document.getElementById('rolePieChart').getContext('2d');
var roleData = <?php echo json_encode($roleData); ?>;

var myPieChart = new Chart(ctx, {
type: 'pie',
data: {
labels: Object.keys(roleData),
datasets: [{
  data: Object.values(roleData),
  backgroundColor: ['#FF6384', '#36A2EB'], // Customize colors as needed
  hoverBackgroundColor: ['#FF6384', '#36A2EB']
}]
}
});
</script>
<style>
.pagination {
display: flex;
justify-content: center;
margin-top: 20px;
}

.pagination a {
color: #333;
padding: 8px 16px;
text-decoration: none;
border: 1px solid #ddd;
margin: 0 4px;
border-radius: 4px;
}

.pagination a.active {
background-color: #4CAF50;
color: white;
}

.pagination a:hover:not(.active) {
background-color: #ddd;


}
</style>
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
</body>

</html>