<?php
$target_dir = "/var/www/html/files/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file);
header('Location: index.html');
?>