<?php


$hostname = "localhost";
$username = "root";
$password = "";
$db = "bioskop_php";

$connection = new mysqli($hostname, $username, $password, $db) or die("Connect failed: %s\n" . $connection->error);

$dan = $_POST['dan'];
$query = "SELECT raspored.id, raspored.dan, raspored.vreme, raspored.cena_karte, film.naziv as fnaziv, film.godina, film.jezik, film.zanr, sala.naziv as snaziv 
        FROM raspored JOIN film ON raspored.film_id = film.id
                      JOIN sala ON raspored.sala_id = sala.id
                      WHERE raspored.dan='" . $dan . "' 
                      ORDER BY raspored.vreme ASC";

$data = $connection->query($query);
?>

<table class="table table-bordered table-hover table-light text-center">
    <thead>
        <tr class="table-dark">
            <th>Dan</th>
            <th id="kolona-vreme" poredak="ascending">Vreme</th>
            <th>Film</th>
            <th>Jezik</th>
            <th>Žanr</th>
            <th>Godina</th>
            <th>Cena karte - RSD</th>
            <th>Sala</th>
            <th>Akcije</th>
        </tr>
    </thead>

    <?php
    while ($red = mysqli_fetch_array($data)) {
    ?>

        <tr>
            <td><?php echo $red['dan'] ?></td>
            <td><?php echo $red['vreme'] ?></td>
            <td><?php echo $red['fnaziv'] ?></td>
            <td><?php echo $red['jezik'] ?></td>
            <td><?php echo $red['zanr'] ?></td>
            <td><?php echo $red['godina'] ?></td>
            <td><?php echo $red['cena_karte'] ?></td>
            <td><?php echo $red['snaziv'] ?></td>
            <td><a href="forms/editFilm.php?id_filma=<?php echo $red['id']; ?>"><button class="btn btn-dark">Izmena</button></a>
                <a href="obrisiFilm.php?id_filma=<?php echo $red['id']; ?>"><button class="btn btn-dark">Brisanje</button></a>
            </td>
        </tr>

    <?php
    }
    ?>