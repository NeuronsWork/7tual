<?php require_once 'class_facebook/facebook.php';
$nuevo = new facebook();
$comment=$_POST['comment'];
$id_message = $_POST['id_message'];
$nuevo->load_comments_ajax($id_message,$comment);
?>