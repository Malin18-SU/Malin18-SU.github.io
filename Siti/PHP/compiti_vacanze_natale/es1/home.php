<?php session_start(); ?>
<html>
    <head>
        <title>Esercizio 1</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>

        <form action="sendmail.php" method="post" class="m-auto d-flex flex-column w-25 gap-3 mt-3">
            <input type="text" name="name" placeholder="nome" required class="form-control">
            <input type="text" name="surname" placeholder="cognome" required class="form-control">
            <input type="date" name="date" max="2022-12-12" placeholder="data di nascita" required class="form-control">
            <input type="text" name="addr" placeholder="indirizzo" required class="form-control">
            <input type="text" name="city" placeholder="città" required class="form-control">
            <input type="email" name="email" placeholder="email" required class="form-control">

            <input type="submit" value="Invia" class="btn btn-primary form-control">
        </form>

    </body>
</html>