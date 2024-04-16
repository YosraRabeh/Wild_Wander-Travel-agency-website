<?php
include '../../../controller/blogC.php';

$blogC = new blogC();
$id = $_GET["id"];
$token=$_GET['token'] ?? null;
$blogC->deleteblog($id);

if($token==null)
    header('Location: blog.php');
else
    header('Location: ../../back/material-dashboard-master/pages/blog.php');
exit;
?>