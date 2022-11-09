<?php
if (file_get_contents($_FILES['fileToUpload']['tmp_name'], false, null, 0, 5) == "%PDF-")
{
	move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "/var/www/html/files/".basename($_FILES["fileToUpload"]["name"]));
	header('Location: index.html');
}
echo "ERROR: File is not PDF."
?>