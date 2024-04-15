<?php

    include_once 'C:\xampp\htdocs\Works\PackManagement\Dashboard\connexion.php';
    include_once 'C:\xampp\htdocs\Works\PackManagement\Dashboard\Model\offre.php';

    class OffreC {


        /////..............................Afficher............................../////
                function AfficherOffre(){
                    $sql="SELECT * FROM offre";
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
                function SupprimerOffre($ID_offre){
                    $sql="DELETE FROM offre WHERE ID_offre=:ID_offre";
                    $db = config::getConnexion();
                    $req=$db->prepare($sql);
                    $req->bindValue(':ID_offre', $ID_offre);   
                    try{
                        $req->execute();
                    }
                    catch(Exception $e){
                        die('Erreur:'. $e->getMessage());
                    }
                }
        
        /////..............................Ajouter............................../////
                function AjouterOffre($offre){
                    $sql="INSERT INTO offre (nom_offre,date_debut,date_fin) 
                    VALUES (:nom_offre,:date_debut,:date_fin)";
                    
                    $db = config::getConnexion();
                    try{
                        $query = $db->prepare($sql);
                        $query->execute([
                            'nom_offre' => $offre->getnom_offre(),
                            'date_debut' => $offre->getdate_debut(),
                            'date_fin' => $offre->getdate_fin(),
                            
                    ]);
                                
                    }
                    catch (Exception $e){
                        echo 'Erreur: '.$e->getMessage();
                    }			
                }
        /////..............................Affichage par la cle Primaire............................../////
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
        function modifierPack($offre, $ID_offre){
            try {
                $db = config::getConnexion();
                $query = $db->prepare('UPDATE offre SET nom_offre = :nom_offre, date_debut = :date_debut, date_fin = :date_fin WHERE ID_offre = :ID_offre');
                $query->execute([
                    'nom_offre' => $offre->getnom_offre(),
                    'date_debut' => $offre->getdate_debut(),
                    'date_fin' => $offre->getdate_fin(),
                    'ID_offre' => $ID_offre, 
                ]);
                echo $query->rowCount() . " records UPDATED successfully <br>";
            } catch (PDOException $e) {
                echo $e->getMessage(); // Afficher l'erreur PDO
            }
        }
        
                        //$nom_offre,$date_debut,$date_fin
            }