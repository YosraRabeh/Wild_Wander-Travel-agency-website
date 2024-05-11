<?php
include 'C:\xampp\htdocs\ali&yossra\ali&yossra\UserManagment\Dashboard\Controller\OffreC.php';
$nom_offre = $_GET['nom_offre'];
$offre = new OffreC();
$result = $OffreC->searchName($nom_offre);


echo json_encode($result);
?>