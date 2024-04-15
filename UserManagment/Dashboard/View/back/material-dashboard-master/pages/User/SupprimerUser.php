<?php
	include '../../../../../Controller/UserC.php';

	$message = "" ; 
	$UserC=new UserC();
	$UserC->SupprimerUser($_GET["idUser"]);
	header('Location:AfficherUtilisateurs.php?message= Utilisiateur Supprimé avec succés');
?>