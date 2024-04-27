<?php
include '../../../controller/blogC.php';

$commentsC = new commentsC();
$id = $_GET["id"];
$token=$_GET['token'] ?? null;
$commentsC->deletecomments($id);

if($token==null)
header("Location: comments.php?blogid={$id}");
else
    header('Location: ../../back/material-dashboard-master/pages/blog.php');
exit;
?>