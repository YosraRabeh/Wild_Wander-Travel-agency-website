<?php
require_once '../Controller/volC.php';
$VOLC = new volC();

if (isset($_POST['id_article'])) {
    // Call the modifier_article method with the form data
    $VOLC_>modifier_vol(); // Ensure this method uses $_POST data as shown in your provided code
    header('Location: vol_frontpage.php'); // Redirect back to the articles page
} else {
    echo "No  ID provolvided.";
}
?>