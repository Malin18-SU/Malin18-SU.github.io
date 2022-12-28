<?php
session_start();

if($_POST){
    $_SESSION["sport"] = $_POST["sport"];
    header("Location: result.php");
}
?>

<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Selezione Sport</title>
</head>
<body>
    <div class="container bg-light d-flex justify-content-center">
        <form method="post" action="sport.php">
            <h4 class="form-text">Benvenuto <?php echo $_SESSION["name"] ." " .$_SESSION['surname'] ."! <br> Seleziona uno sport!" ?></h4>
            <select class="form-select" name="sport">
                <option value="karate">Karate</option>
                <option value="basket">Basket</option>
                <option value="calcio">Calcio</option>
            </select>

            <input type="submit" value="Invia" class="btn btn-primary form-control">
        </form>
    </div>
</body>
</html>
