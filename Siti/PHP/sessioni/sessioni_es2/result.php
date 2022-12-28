<?php
session_start();
$url = "img/" .$_SESSION["sport"] .".jpeg";
?>

<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Risultati</title>
</head>
<body>
    <div class="container-fluid bg-light text-dark d-flex flex-wrap text-center justify-content-center">
        <h4 class="col-12"> nome: <?php echo $_SESSION["name"] ?> </h4>
        <h4 class="col-12"> cognome: <?php echo $_SESSION["surname"] ." "?> </h4>
        <h4 class="col-12"> sport: <?php echo $_SESSION["sport"]?> </h4>
        <img class="col-6" src=<?php echo $url?> >

        <a class="col-12" href="home.php">Torna indietro</a>
    </div>
</body>
</html>
