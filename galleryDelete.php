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
$loginId = 5;
if (!is_numeric($id_g)) {
    echo var_export($id_g, true) . " is NOT numeric ID", PHP_EOL;
    return;
}

$sql = "DELETE FROM `gallery`.`galleryweb` WHERE (`id` = '$id_g')";

if ($conn->query($sql) === TRUE) {
    echo '<h1 style="font-size:50px" >Úspešné zmazanie </h1>
        <p>„Obrázok bol odstranený zo súkromnej galérie“</p>';

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>