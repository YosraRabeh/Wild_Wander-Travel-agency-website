<?php
	include 'C:\xampp\htdocs\Works\PackManagement\Dashboard\Controller\OffreC.php';

	$message = "" ; 
	$OffreC=new OffreC();
	$OffreC->SupprimerOffre($_GET["ID_offre"]);
	header("Location:afficherPack.php?successMessage= offre Supprimé avec succés");

?>