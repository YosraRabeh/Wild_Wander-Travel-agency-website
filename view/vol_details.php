<?php
require_once '../Controller/volC.php';

$VOLC = new volC();

$id = isset($_GET['id']) ? $_GET['id'] : null;

 
 // $flight = $VOLC->fetchVolById($id);
    $flight= $VOLC->fetchVolById($id);


   
    
if (isset($_POST['company'])) {
    $departure_city = $_POST['departure_city']; // We might want to handle this differently, e.g., from session data
    $destinantion_city = $_POST['destinantion_city'];
    $check_in = date('Y-m-d H:i:s'); // Current date and time
    $check_out = date('Y-m-d H:i:s'); // Current date and time
    $adults_1 = $_POST['adults_1']; // This could also come from session data or another source
    $children_1 = $_POST['children_1'];
    $amount = $_POST['amount']; // Hidden field in form
    $id = $_POST['id'];
   
    // Optionally, redirect back to the article to see the new comment
    header("Location: vol_details.php?id=$id");
    exit;
}

if ($flight) {
    echo '<h1>' . htmlspecialchars($flight['company']) . '</h1>';
    echo '<p>' . nl2br(htmlspecialchars($flight['departure_city'])) . '</p>';
    echo '</p>' . htmlspecialchars($flight['destination_city']) . '</p>';
    echo '<p> ID: ' . htmlspecialchars($flight['id']) . '</p>';

    // Form for adding a comment
    echo '<form action="" method="post">';
    echo '<input type="hidden" name="company" value="' . htmlspecialchars($id) . '"/>';
    echo '<input type="text" name="departure_city" placeholder=" departure city"/>';
    echo '<input type="text" name="destination_city" placeholder="destination"/>';
    echo '<textarea name="check_in" placeholder="check_in"></textarea>';
    echo '<textarea name="check_out" placeholder="check_out"></textarea>';
    echo '<textarea name="adults_1" placeholder="adults_1"></textarea>';
    echo '<textarea name="children_1" placeholder="children_1"></textarea>';
    echo '<textarea name="amount" placeholder="amount"></textarea>';
    echo '<textarea name="id" placeholder="id"></textarea>';
    
    echo '<input type="submit" name="submit_comment" value="Add vol"/>';
    echo '</form>';

    
    echo '</div>';

    echo '<a href="vol_frontpage.php"><button>Go back to the frontpage</button></a>';
} else {
    echo 'vol not found.';}

?>