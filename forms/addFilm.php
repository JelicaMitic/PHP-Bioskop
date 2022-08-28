<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-MySQL-AJAX Bioskop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>

    <div class="div-form-wrap">
        <form method="post" id="form-add-film" class="text-center">

            <div class="form-group">
                <label>Dan</label>
                <select class="form-select mb-2" name="dan">
                    <option value="">Izaberi dan</option>
                    <option value="Ponedeljak">Ponedeljak</option>
                    <option value="Utorak">Utorak</option>
                    <option value="Sreda">Sreda</option>
                    <option value="Cetvrtak">Četvrtak</option>
                    <option value="Petak">Petak</option>
                    <option value="Subota">Subota</option>
                    <option value="Nedelja">Nedelja</option>
                </select>
            </div>

            <div class="form-group">
                <label>Vreme</label>
                <input type="text" class="form-control mb-2" name="vreme">
            </div>

            <div class="form-group">
                <label>Film</label>
                <select class="form-select mb-2" name="film">
                    <?php

                    $hostname = "localhost";
                    $username = "root";
                    $password = "";
                    $db = "bioskop_php";

                    $connection = new mysqli($hostname, $username, $password, $db) or die("Connect failed: %s\n" . $connection->error);

                    $query = "SELECT id, naziv FROM film";
                    $data = $connection->query($query);

                    while ($red = mysqli_fetch_array($data)) {
                    ?>
                        <option value="<?php echo $red['id']; ?>"><?php echo $red['naziv']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>Sala</label>
                <select class="form-select mb-2" name="sala">
                    <?php

                    $query1 = "SELECT id, naziv FROM sala";
                    $data1 = $connection->query($query1);

                    while ($red = mysqli_fetch_array($data1)) {
                    ?>
                        <option value="<?php echo $red['id']; ?>"><?php echo $red['naziv']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>Cena karte</label>
                <input type="number" class="form-control mb-4" name="cena_karte">
            </div>


            <button type="submit" class="btn btn-dark" name="dodaj_film_bn" id="btnd">Dodaj Film</button>




        </form>
        <?php
        include '../raspored.php';

        if (isset($_POST['dodaj_film_bn'])) {

            $filmRaspored = new Raspored();

            if ($filmRaspored->insert($_POST['dan'], $_POST['vreme'], $_POST['film'], $_POST['sala'], $_POST['cena_karte'])) {
                echo "<script type='text/javascript'>alert('Film je unet u raspored!'); location='../index.php'</script>";
            } else {
                echo "<script type='text/javascript'>alert('Film nije unet u raspored!');";
            }
        }
        ?>
    </div>
</body>

</html>