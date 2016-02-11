<?php require_once 'class_facebook/facebook.php';
$entry = new facebook();
$message = strip_tags($_POST['newentry']);
$entry->insert_entry($message);
?>