<?php

    include_once 'C:\xampp\htdocs\Works\PackManagement\Dashboard\connexion.php';
    include_once 'C:\xampp\htdocs\Works\PackManagement\Dashboard\Model\Reservation.php';

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
                    $sql="DELETE FROM reservation WHERE idReservation=:idReservation";
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
                    $sql="INSERT INTO reservation (nombrePlaces,source,paiement,idOffre) 
                    VALUES (:nombrePlaces,:source,:paiement,:idOffre)";
                    
                    $db = config::getConnexion();
                    try{
                        $query = $db->prepare($sql);
                        $query->execute([
                            'nombrePlaces' => $Reservation->getnombrePlaces(),
                            'source' => $Reservation->getsource(),
                            'paiement' => $Reservation->getpaiement(),
                            'idOffre' => $Reservation->getidOffre(),
                            
                    ]);
                                
                    }
                    catch (Exception $e){
                        echo 'Erreur: '.$e->getMessage();
                    }			
                }
        /////..............................Affichage par la cle Primaire............................../////
                function RecupererReservation($idReservation){
                    $sql="SELECT * from reservation where idReservation=$idReservation";
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

                function Recupereroffre($ID_offre){
                    $sql="SELECT * from offre where ID_offre=$ID_offre";
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
                $query = $db->prepare('UPDATE reservation SET nombrePlaces = :nombrePlaces, source = :source, paiement = :paiement , idOffre = :idOffre  WHERE idReservation = :idReservation');
                $query->execute([
                    'nombrePlaces' => $Reservation->getnombrePlaces(),
                    'source' => $Reservation->getsource(),
                    'paiement' => $Reservation->getpaiement(),
                    'idOffre' => $Reservation->getidOffre(),
                    'idReservation' => $idReservation, 
                ]);
                echo $query->rowCount() . " records UPDATED successfully <br>";
            } catch (PDOException $e) {
                echo $e->getMessage(); // Afficher l'erreur PDO
            }
        }
        
                        //$nom_offre,$date_debut,$date_fin
            }