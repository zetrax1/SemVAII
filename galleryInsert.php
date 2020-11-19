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

$name = htmlentities($_POST['name']);
$message = htmlentities($_POST['message']);
$loginId = 5;



$sql = "INSERT INTO galleryweb (userID, urlImage, description) VALUES ('$loginId', '$name', '$message')";

if ($conn->query($sql) === TRUE) {
    echo '<h1 style="font-size:50px" >Úspešné pridanie </h1>
        <p>„Obrázok bol pridaný do súkromnej galérie“</p>';
    echo  '<img src="'.$name.'" alt="Forest" width="600" height="400">';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>