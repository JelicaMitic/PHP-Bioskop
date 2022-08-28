<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-MySQL-AJAX Bioskop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

    <div class="div-wrap">

        <h3 id="welcome-heading">Dobro došli u ITECH bioskop</h3>
        <a href="forms/addFilm.php"><button type="button" class="btn btn-dark" id="dodaj_film">Novi Film</button></a>

        <?php
        include 'meni.html';
        ?>

        <input type="text" class="form-control text-center" id="s-in" placeholder="Unesite naziv/jezik/zanr filma...">

        <div class="div-list-index">

        </div>


    </div>




    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/index.js"></script>
</body>

</html>