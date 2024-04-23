<?php
	include '../../Dashboard/Controller/ReservationC.php';

	$message = "" ; 
	$ReservationC=new ReservationC();
	$ReservationC->SupprimerReservation($_GET["idReservation"]);
	header("Location:ListReservations.php?successMessage= Reservation Supprimé avec succés");

?>