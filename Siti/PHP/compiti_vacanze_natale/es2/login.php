<?php session_start();

if($_POST){
    $_SESSION["email"] = $_POST["email"];
    header("Location: form.php");
}
?>

<html lang="it">
<head>
    <title>Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body class="bg-warning bg-opacity-50">

<div class="container-fluid bg-gradient bg-light p-3">
    <h2 class="">Login</h2>
</div>

<div class="bg-light text-dark m-auto container rounded p-2 w-50 border mt-5">
    <h4 class="text-body">Effettua il login per completare il questionario</h4>
    <form class="d-flex justify-content-center flex-wrap gap-3 w-50 m-auto" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <label for="email" class="form-label">
            Email:
        </label>
        <input id="email" name="email" type="email" placeholder="La tua email" class="form-control" required>

        <label for="psw" class="form-label">
            Password:
        </label>
        <input id="psw" name="psw" type="password" placeholder="La tua password" class="form-control" required>

        <input type="submit" class="btn btn-success w-50">
    </form>
</div>
</body>
</html>