<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sneh</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styleImage.css">
    <link rel="stylesheet" href="loginCss.css">
</head>
<body>


<div class="top">
    <a class="active" href="#home" id="hm">Galeria</a>
    <a href="#news">Recenzie</a>
    <a href="#contact">Kontakty</a>
    <a href="#section2">Moja galéria</a>
    <a href="myGallery.php">O nás</a>
</div>


<div id="demo" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="Images/voda.jpg" alt="nazov autra ">
            <!--Todo doplniť autora -->
        </div>
        <div class="carousel-item">
            <img src="Images/hora.jpg" alt="nazov autra ">
            <!--Todo doplniť autora -->
        </div>
        <div class="carousel-item">
            <img src="Images/spectrum.jpg" alt="nazov autra ">
            <!--Todo doplniť autora -->
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>


<h2 class="top" id="section2">
    <a class="active" href="#hm">Home</a>
    <a href="#section3">Spravovat</a>

    <a href="">O nás</a>
</h2>

<form class="alt" method="POST" enctype="multipart/form-data">

    <div class="responsive">
        <div class="gallery">

            <a target="_blank" href="#echo">

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


                $sql = "SELECT urlImage,description FROM galleryweb where userID=5";
                $result = mysqli_query($connection, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        //echo "id: " . $row["urlImage"] . "<br>";
                        echo '<img src="' . $row["urlImage"] . '"  width="600" height="400">';

                    }
                } else {
                    echo "0 results";
                }


                $connection->close();


                ?>
            </a>

        </div>
    </div>
</form>


<div class="clearfix"></div>




<h3 class="top" id="section3">
    <a class="active" href="#hm">Home</a>
    <a href="#section2">Galeria</a>
    <a href="">O nás</a>
</h3>


<form action="galleryInsert.php" class="alt" method="post">
    <div class="container">
        <label for="name"><b>URL </b></label>
        <input type="text" placeholder="zadaj URL" name="name" required>

        <label for="text"><b>Popis</b></label>
        <input type="text" placeholder="zadaj popis" name="message" required >

        <button type="submit">Pridat</button>

    </div>
</form>


<form action="galleryEdit.php" class="alt" method="post">
    <div class="container">
        <label for="uname"><b>ID obrázka </b></label>
        <input type="text" placeholder="zadaj ID obrazka " name="id_img" required>

        <label for="text"><b>Popis</b></label>
        <input type="text" placeholder="zadaj nový popis" name="message" required >

        <button type="submit">Zmen</button>

    </div>
</form>


<form action="galleryDelete.php" class="alt" method="post">
    <div class="container">
        <label for="uname"><b>ID obrázka </b></label>
        <input type="text" placeholder="zadaj ID obrazka " name="id_img" required>

        <button type="submit">Odstraniť</button>

    </div>
</form>

</body>
</html>