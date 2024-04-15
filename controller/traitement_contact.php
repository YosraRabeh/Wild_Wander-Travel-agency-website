<?php
include 'gestion_contact.php';



$error = "";

// create reclamation
$contact = null;

$curentDate= date('Y-m-d H:i:s');


// create an instance of the controller
$contact_gestion = new contact_gestion();
if (isset($_POST["sujet"]) && isset($_POST["message"])) 
{
    if (  (!empty($_POST["sujet"]) && !empty($_POST["message"])) )
     {
        $contact = new contact(null,new DateTime($curentDate) ,$_POST['sujet'] , $_POST['message'] ); 
        $contact_gestion->addcontact($contact);
        


        

    } else
        {$error = "Missing information";
         echo $error ; }

}


?>