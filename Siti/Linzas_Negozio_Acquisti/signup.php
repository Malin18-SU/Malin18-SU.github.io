<?php include("init.php");
?>

<html>
<head>
    <title>Registrazione</title>
    
    <?php

    if($_POST){
        $file = fopen("accessi.txt", "a");
        $text = "\n" .$_POST["username"] ."," .$_POST["psw"] ."," .$_POST["name"] ."," .$_POST["surname"] ."," .$_POST["sex"];
        echo "$text <br>";
        fwrite($file, $text);
        fclose($file);
        echo("<script>location.href = 'login.php';</script>");
    }
    ?>

</head>
<body>

<div class="bg-opacity-25 p-3 container-fluid w-50">

    <!-- div esterno -->
    <div class="container bg-light text-center p-3 rounded-1 m-auto">

        <!-- div del form -->
        <div id="login" class="pt-1 container">
            <h3 class="text-dark">FORM DI REGISTRAZIONE</h3>

            <!-- form e container dati personali del cliente che effettua la registrazione -->
            <form action="signup.php" class="m-auto form-floating w-25 text-dark" method="post">
                <div class="container m-auto p-1">
                    <label class="p-1">
                        Username:
                        <input type="text" name="username" placeholder="esempio: mario.rossi@gmail.com" class="form-control bg-light border-1 text-dark" required>
                    </label>

                    <label class="p-1">
                        Password:
                        <input type="text" name="psw" placeholder="esempio: abc123" class="form-control bg-light border-1 text-dark" required>
                    </label>

                    <label class="p-1">
                        Nome:
                        <input type="text" name="name" placeholder="esempio: Mario" class="form-control bg-light border-1 text-dark" required>
                    </label>

                    <label class="p-1">
                        Cognome:
                        <input type="text" name="surname" placeholder="esempio: Rossi" class="form-control bg-light border-1 text-dark" required>
                    </label>

                    <label class="p-1">
                        Sesso:
                        <select class="form-control form-select" name="sex">
                            <option value='F'>F</option>
                            <option value='M'>M</option>
                        </select>

                    </label>

                </div>
                <input type="submit" value="Registrati" class="btn btn-danger p-1 w-75">
            </form>
        </div>
    </div>
</div>

</body>
</html>