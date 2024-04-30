<?php

include_once dirname(__FILE__).'/../Config.php';
include_once dirname(__FILE__) . '/../Model/reservation.php';

    class ReservationC {


        /////..............................Afficher............................../////
                function AfficherReservation(){
                    $sql="SELECT * FROM Reservation";
                    $db = config::getConnexion();
                    try{
                        $liste = $db->query($sql);
                        return $liste;
                    }
                    catch(Exception $e){
                        die('Erreur:'. $e->getMessage());
                    }
                }
        
        /////..............................Supprimer............................../////
                function SupprimerReservation($idReservation){
                    $sql="DELETE FROM reservation WHERE id_reservation=:idReservation";
                    $db = config::getConnexion();
                    $req=$db->prepare($sql);
                    $req->bindValue(':idReservation', $idReservation);   
                    try{
                        $req->execute();
                    }
                    catch(Exception $e){
                        die('Erreur:'. $e->getMessage());
                    }
                }
        
        /////..............................Ajouter............................../////
                function AjouterReservation($Reservation){
                    $sql="INSERT INTO reservation (id_acc ,idUser,date_Start,date_End ,payment_status)
                    VALUES (:id_acc ,:id_user,:date_Start,:date_End,:payment_status)";
                    
                    $db = config::getConnexion();
                    try{
                        $query = $db->prepare($sql);
                        $query->execute([
                            'id_acc' => $Reservation->getidAcc(),
                            'id_user' => $Reservation->getid_user(),
                            'date_Start' => $Reservation->getdate_Start(),
                            'date_End' => $Reservation->getdate_End(),
                            'payment_status' => $Reservation->checkPaymentStatus($Reservation->getpayment_status())




                    ]);
                                
                    }
                    catch (Exception $e){
                        echo 'Erreur: '.$e->getMessage();
                    }			
                }
        /////..............................Affichage par la cle Primaire............................../////
                function RecupererReservation($idReservation){
                    $sql="SELECT * from reservation where id_reservation=$idReservation";
                    $db = config::getConnexion();
                    try{
                        $query=$db->prepare($sql);
                        $query->execute();
        
                        $Reservation=$query->fetch();
                        return $Reservation;
                    }
                    catch (Exception $e){
                        die('Erreur: '.$e->getMessage());
                    }
                }

                function RecupererAccomodation($idAcc){
                    $sql="SELECT * from accomodation where id_Acc=$idAcc";
                    $db = config::getConnexion();
                    try{
                        $query=$db->prepare($sql);
                        $query->execute();
        
                        $offre=$query->fetch();
                        return $offre;
                    }
                    catch (Exception $e){
                        die('Erreur: '.$e->getMessage());
                    }
                }
        
        /////..............................Update............................../////
        function modifierReservation($Reservation, $idReservation){
            try {
                $db = config::getConnexion();
                $query = $db->prepare('UPDATE reservation SET  id_acc=:id_acc,id_user=:id_user,date_Start=:date_Start,date_End=:date_End,date_creation=:date_creation,payment_status=:payment_status WHERE id_reservation=:id_reservation');
                $query->execute([
                    'id_acc' => $Reservation->getid_acc(),
                    'id_user' => $Reservation->getid_user(),
                    'date_Start' => $Reservation->getdate_Start(),
                    'date_End' => $Reservation->getdate_End(),
                    'date_creation' => $Reservation->getdate_creation(),
                    'payment_status' => $Reservation->getpayment_status(),
                    'id_reservation' => $idReservation

                ]);
                echo $query->rowCount() . " records UPDATED successfully <br>";
            } catch (PDOException $e) {
                echo $e->getMessage(); // Afficher l'erreur PDO
            }
        }
            }

            //get ids from data base
            function getaccIDS(){
                $sql="SELECT id_acc from accomodation ";
                $db = config::getConnexion();
                try{
                    $liste=$db->query($sql);
                    return $liste;
                } catch (Exception $e){
                    die('Erreur: '.$e->getMessage());
                }
            }
function getuserIDS(){
    $sql="SELECT idUser from user ";
    $db = config::getConnexion();
    try{
        $liste=$db->query($sql);
        return $liste;
    } catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}