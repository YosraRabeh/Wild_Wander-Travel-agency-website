<?php
	include '../../../../../Controller/reservationC.php';


	$message = "" ; 
	$ReservationC=new ReservationC();
	$ReservationC->SupprimerReservation($_GET["id_reservation"]);
	header('Location:Afficherreservation.php?message= reservation Supprimé avec succés');
?>