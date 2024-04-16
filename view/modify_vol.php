<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Article</title>
    <!-- Add any required styles -->
</head>
<body>

<?php
require_once '../Controller/volC.php';
$VOLC= new volC();

// Check if ID_article is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Fetch the article data based on ID_article
    $flight = $VOLC->fetchVolById($id);

    // Display the form with article data for editing
    echo '<form action="update_vol.php" method="post">';
    echo '<input type="text" name="id" value="' . htmlspecialchars($flight['id']) . '"/>'; // Corrected name attribute to match the expected POST parameter in modifier_article
    echo ': <input type="text" name="company" value="' . htmlspecialchars($flight['company']) . '"/><br/>';
    echo 'Content:<br/><textarea name="departure_city">' . htmlspecialchars($flight['departure_city']) . '</textarea><br/>';
    echo 'Content:<br/><textarea name="destination_city">' . htmlspecialchars($flight['destination_city']) . '</textarea><br/>';
    echo 'check_in: <input type="date" name="check_in" value="' . htmlspecialchars($flight['check_in']) . '"/><br/>';
    echo 'Publication Date: <input type="date" name="check_out" value="' . htmlspecialchars($flight['check_out']) . '"/><br/>';
   echo 'Content:<br/><textarea name="adults_1">' . htmlspecialchars($flight['adults_1']) . '</textarea><br/>';
   echo 'Content:<br/><textarea name="children_1">' . htmlspecialchars($flight['children_1']) . '</textarea><br/>';
   echo 'Content:<br/><textarea name="amount">' . htmlspecialchars($flight['amount']) . '</textarea><br/>';
   
    echo '<input type="submit" value="Confirm Modifications"/>';
    echo '</form>';
    echo '<a href="vol_frontpage.php">Cancel</a>';
} else {
    echo 'No vol ID provided.';
}
?>

</body>
</html>