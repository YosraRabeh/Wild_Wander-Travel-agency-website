<!---------------------- voir reclamation imta3 il client  --------------------------->
<?php
include 'C:/xampp/htdocs/PROJECT1/projet web/controller/gestion_contact.php';


$contact_gestion = new contact_gestion();


// Fetch by id
$contact = $contact_gestion->showContact($_GET["id"]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact View</title>


    <style>
  /* Style for the container */
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-image: url('images_ranim/offer_2.jpg'); /* Replace 'background.jpg' with the path to your background image */
    background-size: cover;
    background-position: center;
}

/* Style for the form container */
#form {
    width: 50%;
    padding: 20px;
    background-color: rgba(255, 255, 255, 0.8); /* Use rgba for semi-transparent background */
    border: 1px solid #ccc;
    border-radius: 8px;
}

/* Style for the form fields */
#divgrid {
    margin-bottom: 20px;
}

/* Style for labels */
label {
    display: block;
    font-weight: bold;
}

/* Style for the return button */
.but {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
}

/* Style for the return button on hover */
.but:hover {
    background-color: #0056b3;
}


    </style>


</head>
<body>
    <div class="container">
        <form id="form" class="cadre">
            <div id="divgrid">
                <label for="suijet">Subject du Reclamation</label>
                <?php echo $contact['sujet_contact']; ?>
            </div>
            <div id="divgrid">
                <label for="textarea">Message du Reclamation</label>
                <?php echo $contact['description']; ?>
            </div>
            <a href="claim.php" class="but">Retourne</a>
        </form>
    </div>
</body>
</html>
