<?php

$hostname = "localhost";
$username = "root";
$password = "";
$db = "bioskop_php";

$connection = new mysqli($hostname, $username, $password, $db) or die("Connect failed: %s\n" . $connection->error);

$id_filma = $_GET['id_filma'];
$query = "DELETE FROM raspored WHERE id=" . $id_filma;
$connection->query($query);

header('Location: index.php');
