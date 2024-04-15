<?php
session_start();


// remove all session variables
session_unset();

// destroy the session
session_destroy();
header("Location:Dashboard/View/back/material-dashboard-master/pages/dashboard.php");



?>