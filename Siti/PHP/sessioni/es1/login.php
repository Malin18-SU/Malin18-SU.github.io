<?php
session_start()

?>
<html>
<head>
    <title>Sessione 1</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>

    <?php
    if($_POST){
        if(array_key_exists($_POST["user"], $_SESSION["array"])){
            if($_SESSION["array"][$_POST["user"]] == $_POST["pass"]){
                header("Location: home.php");
            }else{
                echo "<br> password errata <br>";

                echo "<a href='login.php'>Torna indietro</a>";
                return;
            }
        }
        $_SESSION["login"] = $_POST["user"];
        $_SESSION["pass"] = $_POST["pass"];
        if($_SESSION["utenti_registrati"] < 4) {
            $_SESSION["array"][$_POST["user"]] = $_POST["pass"];
            /*foreach($_SESSION["array"] as $key => $value){
                echo "$key: $value <br>";
            }
            return;*/
        }else{
            echo "Non è possibile effettuare una registrazione";
        }
        header("Location: home.php");
    }else{
    ?>
    <div class="container">
        <form method="post" action="login.php" class="form-floating m-auto bg-light border rounded">
            <div class="container">
                <label class="form-label">
                    <p class="form-text">Login</p>
                    <input type="text" name="user" class="form-control">
                </label>

                <label for="pass" class="form-label">
                    <p class="form-text">Password</p>
                    <input type="password" name="pass" class="form-control">
                </label>
            </div>


            <input type="submit" class="form-control btn btn-primary m-1" value="Invia">
        </form>
        <?php
  /*      echo "valori: " . $_SESSION["utenti_registrati"] ."<br>";
        foreach($_SESSION["array"] as $key => $value){
            echo "$key $value <br>";
        }*/
        ?>
    </div>
    <?php
    }
   ?>
</body>
</html>
