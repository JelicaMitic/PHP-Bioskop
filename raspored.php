<?php

class Raspored
{
    public $id;
    public $dan;
    public $vreme;
    public $film_id;
    public $sala_id;
    public $cena_karte;

    public function insert($dan, $vreme, $film_id, $sala_id, $cena_karte)
    {
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $db = "bioskop_php";

        $connection = new mysqli($hostname, $username, $password, $db) or die("Connection failed: %s\n" . $connection->error);

        $query = "INSERT INTO raspored VALUES (null, '$dan', '$vreme', '$film_id', '$sala_id', '$cena_karte')";
        return $connection->query($query);
    }

    public function update($dan, $vreme, $film_id, $sala_id, $cena_karte, $id)
    {
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $db = "bioskop_php";

        $connection = new mysqli($hostname, $username, $password, $db) or die("Connection failed: %s\n" . $connection->error);

        $query = "UPDATE raspored SET dan='" . $dan . "', vreme='" . $vreme . "',
        film_id='" . $film_id . "', sala_id='" . $sala_id . "', cena_karte='" . $cena_karte . "' where id=" . $id;

        return $connection->query($query);
    }
}
