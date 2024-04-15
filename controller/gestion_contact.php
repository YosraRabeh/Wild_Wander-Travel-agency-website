<?php

include_once("C:/xampp/htdocs/PROJECT1/projet web/config.php");
include_once("C:/xampp/htdocs/PROJECT1/projet web/Model/contact.php");



class contact_gestion
{
   

    function addcontact($contact)
{
    $sql = "INSERT INTO contact  VALUES (NULL,:sujet_contact,:date_envoie,DEFAULT,:description)";

    $config = new Config();
    $db = $config->getConexion();   
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'sujet_contact' => $contact->getSujet_contact(),
            'date_envoie' => $contact->getDateEnvoie()->format('Y-m-d H:i:s'),
            'description' => $contact->getdescription(),
        ]);
        // Gérer le succès de l'insertion ici si nécessaire
    } catch (PDOException $e) {
        // Gérer les erreurs de la base de données ici
        echo 'Error: ' . $e->getMessage();
    }
}
public function listContact()
{
    $sql = "SELECT * FROM contact";
    $config = new Config();
    $db = $config->getConexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}
function deleteContact($id)
{
    $sql = "DELETE FROM contact WHERE id_contact = :id";

    $config = new Config();
    $db = $config->getConexion();
    $req = $db->prepare($sql);
    $req->bindValue(':id', $id);

    try {
        $req->execute();
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}
function showContact($id)
{
    $sql = "SELECT * from contact where id_contact = $id";
    $config = new Config();
    $db = $config->getConexion();
    try {
        $query = $db->prepare($sql);
        $query->execute();

        $contact = $query->fetch();
        return $contact;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}



function updateContact($contact, $id)
{
    try {
        $config = new Config();
        $db = $config->getConexion();
        
        $query = $db->prepare('UPDATE contact SET sujet_contact = :sujet, date_envoie = :date_envoie, etat_contact = :etat, description = :description WHERE id_contact = :id');
        $query->execute([
            'id' => $id,
            'sujet' => $contact->getSujet_contact(),
            'date_envoie' => $contact->getDateEnvoie()->format('Y-m-d H:i:s'),
            'etat' => $contact->getEtat_contact(),
            'description' => $contact->getdescription()
        ]);
        // echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        $e->getMessage();
    }
}





}  




class reponse_gestion
{
   
    function addReponse($reponse)
    {  
     $sql = "INSERT INTO reponse  VALUES (NULL,:idContact,:Reponse,:date_envoie_r,DEFAULT)";

            $config = new Config();
            $db = $config->getConexion();   
         try {
            //print_r($reponse->getDateEnvoie_r()->format('Y-m-d H:i:s'));
            $query = $db->prepare($sql);
            $query->execute([
                'idContact' => $reponse->getididContact(),
                'Reponse' => $reponse->getReponse(),
                'date_envoie_r' => $reponse->getDateEnvoie_r()->format('Y-m-d H:i:s'),

            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

   



  
}




?>