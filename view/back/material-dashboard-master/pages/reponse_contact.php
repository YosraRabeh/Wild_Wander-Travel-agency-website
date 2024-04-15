<?php
include 'C:/xampp/htdocs/PROJECT1/projet web/controller/gestion_contact.php';


/*---------------------- voiir et rep contact imta3 il client  ---------------------------*/
$contact_gestion = new contact_gestion();


// Fetch reclamation by id
$contact = $contact_gestion->showContact($_GET["id"]);

/*************************update contact ***********************/


// update

$error = "";

$ContactU = null;

$reponse = null;
$curentDate_r= date('Y-m-d H:i:s');


// create an instance of the controller
$contact_gestion = new contact_gestion();
$reponse_gestion = new reponse_gestion();


if (isset($_POST["id"])&& isset($_POST["repense"]) ) {
    if (!empty($_POST["id"]) && !empty($_POST["repense"])) {
        $ContactU = new contact( $contact["id_contact"],new DateTime($contact["date_envoie"])  , $contact["sujet_contact"],$contact["description"] );
      
       $ContactU =$ContactU->setEtat("traiter");  
              
        $contact_gestion->updateContact($ContactU, $_POST["id"]);
      

       // he8a bich yajouti fi tableau il reponse
       $reponse = new reponse(null,$contact["id_contact"],$_POST['repense'] , new DateTime($curentDate_r) ); 
       $reponse_gestion->addReponse($reponse);


        header('Location:claim.php');
 
    } else
        $error = "Missing information";
}
      
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-image: url('images_ranim/offer_3.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100%;
        }

        #form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            max-width: 500px;
            margin: 50px auto;
        }

        .divgrid {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .modifier_input, #repense {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        .titre {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        .modifier_input[readonly], #repense[readonly] {
            border: none;
            background-color: transparent;
            /* Optional: to remove the border but maintain the input appearance */
            outline: none;
            box-shadow: none;
        }

        .but {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .but:hover {
            background-color: #45a049;
        }
    </style>
</head>
</head>

<body>


  <!---              FORMMMMMMMMMMMMMM        -->

  <form id="form" action="" method="POST">

<input type="hidden" name="id" value="<?=$contact['id_contact'];?> ">

<input  class="titre modifier_input text" type="text" value="Reclamation pour le client  : " readonly>
   
<div class="divgrid"  >
   <label  class="r">Subject du contact</label>
   <input class="modifier_input" type="text"  value="<?php echo $contact['sujet_contact']; ?>" readonly>
</div>

<div class="divgrid" >
    <label class="r">Message du client</label>
    <?php echo $contact['description'];?>
</div>

<div class="divgrid" id="div1"  >
    <label for="repense" class="r">Ecrire Votre Repense</label>
    <textarea  id="repense" name="repense" rows="5" placeholder="write your Reponse"></textarea>

</div>


<input type="submit" id="submit" class="but" value="repondre" onclick="return confirm('repondre ?')">





</form>



    
</body>
</html>