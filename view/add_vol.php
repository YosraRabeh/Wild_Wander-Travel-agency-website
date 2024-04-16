<?php
require_once '../Controller/volC.php';

//On instancie les classes

$VOLC=  new  volC();

// Check if form data is submitted for adding an article


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter_vol'])) {
    $company= $_POST['company'];
    $departure_city= $_POST['departure_city'];
    $destination_city = $_POST['destination_city'];
    $check_in = $_POST['check_in']; 
	$check_out = $_POST['check_out']; 
    $adults_1 = $_POST['adults_1'];
	$children_1 = $_POST['children_1']; 
	$amount= $_POST['amount']; 
	$id= $_POST['id']; 

    $VOLC->ajouter_vol($company,$departure_city, $destination_city, $check_in, $check_out, $adults_1, $children_1 , $amount , $id );
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vol</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input[type="text"], input[type="date"], input[type="number"], textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ddd;
            box-sizing: border-box; /* Added this to include padding in input width */
        }
        button {
            background-color: #0056b3;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: block;
            width: 100%;
            margin-top: 20px;
        }
        button:hover {
            background-color: #004494;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #0056b3;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Add Article Form -->
    <form method="POST" action="" enctype="multipart/form-data">
        <h2>Add vol</h2>
        <label for="company">company</label>
        <input type="text" id="company" name="company" required>
        <label for="departure_city">departure city:</label>
        <input type="text" id="departure_city" name="departure_city" required>
        <label for="destination_city">destination city</label>
        <textarea type="text" id="destination_city" name="destination_city" required></textarea>
        <label for="check_in">check  in :</label>
        <input type="date" id="check_in " name="check_in" required>
        <label for="check_out">check  out :</label>
        <input type="date" id="check_out " name="check_out" required>
        <label for="adults_1">adults :</label>
        <input type="number" id="adults_1" name="adults_1" required>
        <label for="children_1">children :</label>
        <input type="number" id="children_1" name="children_1" required>
        <label for="amount">amount  :</label>
        <input type="number" id="amount" name="amount" required>
        <label for="id">id :</label>
        <input type="number" id="id" name="id" required>
       
       
        <button type="submit" name="ajouter_vol">add vol</button>

        <a href="blogs_frontpage.php">Go back to all the articles</a>
    </form>
</body>
</html>