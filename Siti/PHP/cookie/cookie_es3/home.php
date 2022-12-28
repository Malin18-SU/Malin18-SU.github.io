<html>
    <head>
        <title>Prova</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

        <?php
        if($_POST){
            setcookie("form[regione]", $_POST["regione"]);
            setcookie("form[provincia]", $_POST["provincia"]);
            setcookie("form[nome]", $_POST["nome"]);
            setcookie("form[cognome]", $_POST["cognome"]);
            header("Location: results.php");
        }

        ?>
    </head>

    <body class="text center">
        <div class="container m-auto text-center p-1">
            <h1>Inserisci le tue informazioni</h1>
            <form action="home.php" method="post" class="form-floating w-25 m-auto bg-success p-3 rounded">
                <select class="form-select" name="regione">
                    <option>Piemonte</option>
                    <option>Lombardia</option>
                </select>

                <select class="form-select" name="provincia">
                    <option>VCO</option>
                    <option>Laveno</option>
                </select>

                <input type="text" class="form-control" placeholder="nome" name="nome">
                <input type="text" class="form-control" placeholder="cognome" name="cognome">

                <input type="submit" class="form-control btn btn-primary mt-1">
            </form>
        </div>
    </body>
</html>