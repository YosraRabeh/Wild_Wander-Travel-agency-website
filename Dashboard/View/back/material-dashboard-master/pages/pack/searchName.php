<?php
include 'C:\xampp\htdocs\Works\PackManagement\Dashboard\Controller\OffreC.php';
$nom_offre = $_GET['nom_offre'];
$offre = new OffreC();
$result = $OffreC->searchName($nom_offre);


echo json_encode($result);
?>