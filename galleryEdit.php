<?php
$host = "localhost";
$db_name = "gallery";
$username = "root";
$password = "root";
$connection = null;

// Create connection
$conn = new mysqli($host, $username, $password, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id_g = htmlentities($_POST['id_img']);
$message = htmlentities($_POST['message']);
$loginId = 5;



$sql = "UPDATE `gallery`.`galleryweb` SET `description` = '$message' WHERE (`id` = '$id_g');";

if ($conn->query($sql) === TRUE) {
    echo '<h1 style="font-size:50px" >Úspešné zmena </h1>
        <p>„Zmena popisu obrázka zaznamenaná“</p>';

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>