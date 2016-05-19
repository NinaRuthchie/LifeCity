<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'lifecity';

$conn = mysqli_connect($host, $user, $pass, $dbname);

$upload_image=(isset($_FILES['file']['name']));

$image_path="uploads/";

move_uploaded_file($upload_image,$image_path);

$sql= "INSERT INTO image_upload VALUES('$upload_image','$upload_image')";

$result = $conn->query($sql);
//$result = $dbname->query($sql);

?>