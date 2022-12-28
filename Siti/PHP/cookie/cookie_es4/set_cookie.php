<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body class="m-auto text-center">
    <?php

    if($_POST){
        setcookie("user", $_POST["message"], time() + 3600);
    }else{
        setcookie("user", "");
    }
        echo "Torna alla pagina principale <br>";
        echo "<form action='index.php'><input type='submit' value='Torna Indietro' class='btn btn-primary'></form>";
    ?>
    </body>
</html>