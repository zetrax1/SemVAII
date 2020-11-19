<?php
$host = "localhost";
$db_name = "gallery";
$username = "root";
$password = "root";
$connection = null;

// Create connection
$connection = new mysqli($host, $username, $password, $db_name);
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}


$sql = "SELECT * FROM galleryweb";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. ": " . $row["description"]. "<br>";

    }
} else {
    echo "0 results";
}


$connection->close();



?>