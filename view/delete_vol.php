<?php

require_once '../Controller/volC.php';

$VOLC = new volC();
if (isset($_POST['id'])) { // Corrected: Use $_POST to access submitted data
    $VOLC->supprimer_Vol_by_id($_POST['id']); // Corrected: Properly call the method
    header('Location: vol_frontpage.php'); // Redirect back to the articles page
} else {
    echo "No vol ID provided.";
}
?>