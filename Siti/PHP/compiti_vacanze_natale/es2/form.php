<?php session_start() ?>

<html lang="it">
<head>
    <title>Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">



</head>
<body class="bg-warning bg-opacity-50">
<div class="container-fluid bg-gradient bg-light p-3 border-bottom border-1">
    <h2 class="">Questionario</h2>
</div>
<?php
if($_POST){
    $file = fopen("results.json", "r");
    $_SESSION["questions"] = json_decode(fread($file, filesize("results.json")), true);
    fclose($file);

    foreach($_POST as $key => $value){
        if($value == "T"){
            $_SESSION["questions"][$key]["T"]++;
        }else $_SESSION["questions"][$key]["F"]++;
    }
    $file = fopen("results.json", "w");
    fwrite($file, json_encode($_SESSION["questions"]));
    fclose($file);
    ?>
        <div class="bg-light text-dark m-auto container rounded p-2 w-50 mt-5 border-top border-5 border-warning">
            <h2 class="border-bottom border-warning">Grazie per aver collaborato con noi!</h2>
            <div class="text-center mt-3">
                <h5 class="">La tua collaborazione vuol dire molto per noi!</h5>
                <a href="results.php">Visualizza i risultati totali</a>
            </div>

        </div>
        <?php
}else{
    ?>
    <div class="d-flex flex-column gap-5">
        <div class="bg-light text-dark m-auto container rounded p-2 w-50 mt-5 border-top border-5 border-warning">

            <h2>Informazioni generali di tipo sociale</h2>
            <p class="text-dark text-end form-control-plaintext">Accesso effettuato con l'account: <?php echo $_SESSION["email"]?></p>

        </div>

        <div>
            <form class="d-flex justify-content-center align-items-center flex-column gap-5 m-auto" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <div class="border rounded w-50 p-3 bg-light">
                    <h4>Esistono per lei gli alieni?</h4>
                    <div class="d-flex flex-column form-check">
                        <label for="q1a1" class="form-check-label">
                            <input id="q1a1" type="radio" name="aliens" value="T" class="form-check-input">
                            Vero
                        </label>
                        <label for="q1a2" class="form-check-label">
                            <input id="q1a2" type="radio" name="aliens" value="F" class="form-check-input">
                            Falso
                        </label>
                    </div>
                </div>

                <div class="border rounded w-50 p-3 bg-light">
                    <h4>Crede nella teoria della terra piatta?</h4>
                    <div class="d-flex flex-column form-check">
                        <label for="q2a1" class="form-check-label">
                            <input id="q2a1" type="radio" name="flat-earth" value="T" class="form-check-input">
                            Vero
                        </label>
                        <label for="q2a2" class="form-check-label">
                            <input id="q2a2" type="radio" name="flat-earth" value="F" class="form-check-input">
                            Falso
                        </label>
                    </div>
                </div>

                <div class="border rounded w-50 p-3 bg-light">
                    <h4>E' a conoscenza di prove tangibili dell'esistenza di un Dio?</h4>
                    <div class="d-flex flex-column form-check">
                        <label for="q3a1" class="form-check-label">
                            <input id="q3a1" type="radio" name="god" value="T" class="form-check-input">
                            Vero
                        </label>
                        <label for="q3a2" class="form-check-label">
                            <input id="q3a2" type="radio" name="god" value="F" class="form-check-input">
                            Falso
                        </label>
                    </div>
                </div>

                <div class="border rounded w-50 p-3 bg-light">
                    <h4>Crede che la sezione informatica sia più completa della sezione elettronica?</h4>
                    <div class="d-flex flex-column form-check">
                        <label for="q4a1" class="form-check-label">
                            <input id="q4a1" type="radio" name="school" value="T" class="form-check-input">
                            Vero
                        </label>
                        <label for="q4a2" class="form-check-label">
                            <input id="q4a2" type="radio" name="school" value="F" class="form-check-input">
                            Falso
                        </label>
                    </div>
                </div>

                <div class="border rounded w-50 p-3 bg-light">
                    <h4>Il governo ci sta spiando?</h4>
                    <div class="d-flex flex-column form-check">
                        <label for="q5a1" class="form-check-label">
                            <input id="q5a1" type="radio" name="politics" value="F" class="form-check-input">
                            Falso
                        </label>
                        <label for="q5a2" class="form-check-label">
                            <input id="q5a2" type="radio" name="politics" value="F" class="form-check-input">
                            Falso
                        </label>
                    </div>
                </div>

                <input type="submit" class="btn btn-success w-50">
            </form>
        </div>
    </div>
<?php
}
?>
</body>
</html>