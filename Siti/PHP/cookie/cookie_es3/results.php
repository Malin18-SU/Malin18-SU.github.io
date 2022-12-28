<html>
    <head>
        <title>Scheda Risultati</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    </head>

    <body class="text-center">
    <div class="container text-light text-center bg-dark fst-italic">
        <?php
        if(isset($_COOKIE['form'])){
            foreach($_COOKIE['form'] as $key => $value){
                echo $key .": " .$value ."<br>";
            }
        }
        ?>
    </div>

    </body>
</html>
