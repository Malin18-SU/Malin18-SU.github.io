<?php
session_start();

if($_POST){
    $_SESSION["name"] = $_POST["name"];
    $_SESSION["surname"] = $_POST["surname"];
    $_SESSION["sex"] = $_POST["sex"];
    header("Location: sport.php");
}

?>

<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    <div class="container bg-light m-auto justify-content-center d-flex">
    <form method="post" action="home.php">
        <input type="text" name="name" placeholder="nome" class="form-control">
        <input type="text" name="surname" placeholder="cognome" class="form-control">
        <select name="sex" class="form-select">
            <option value="M">Maschio</option>
            <option value="F"">Femmina</option>
            <option value="O">Preferisco non specificare</option>
        </select>

        <input type="submit" value="Invia" class="btn btn-primary form-control">
    </form>
    </div>
</body>
</html>
