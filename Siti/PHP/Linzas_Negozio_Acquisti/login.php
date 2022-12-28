<?php
//ob_start();
include("init.php");

?>
<html>
<head>
    <title>Login</title>

    <?php
    //echo isset($_SESSION["name"]) ."<br>";
    $found_user = true;     //variabili per messaggi di errore per l'utente
    $found_psw = true;
    $check_psw = true;

    if($_POST){
        {
            $file = fopen("accessi.txt", "r") or die("Il file non è stato trovato");

            while(!feof($file)){    //fino a quando non ha finito il file
                $line = fgets($file);   //legge linea per linea
                //echo $line ."<br>";
                $user = explode(",", $line);    //separando le parole tramite le virgole
              /*  foreach($user as $key => $value){
                    echo "user $key=" .$value ."<br>";
                }*/
                if($user[0] == $_POST["username"]){     //quando trova l'utente
                    $found_user = true;
                    if($_POST["psw"] != $_POST["check_psw"]){   //se password e conferma password non coincidono, restituisce un errore
                        //echo "wrong check: " .$_POST["psw"] ."- " .$_POST["check_psw"] ."<br>";
                        $check_psw = false;
                        break;
                    }

                    if($user[1] == $_POST["psw"]){  //e quando la password combacia
                        $_SESSION["ID"] = session_id(); //salva il session ID
                        $_SESSION["username"] = $user[0];           //salva le variabili e reindirizza alla home
                        $_SESSION["name"] = $user[2];
                        $_SESSION["surname"] = $user[3];
                        $_SESSION["sex"] = $user[4];
                        //echo "logged successfully. Welcome " .$_SESSION["name"] ." " .$_SESSION["surname"];
                        echo("<script>location.href = 'home.php';</script>");
                        ?>
        <!--<meta http-equiv = "refresh" content = "1; url = home.php">-->

                    <?php
                    }else{  //se la password non combacia
                        //echo "wrong password: $user[1] <br>";
                       $found_psw = false;
                       break;
                    }
                }else{  //se non è stato trovato l'utente
                    //echo "wrong user: $user[0] <br>";
                    $found_user = false;
                }
            }
            fclose($file);
            if(!$found_user){       //messaggio di errore
            ?>
            <script>
                $(document).ready(function(){
                    $("#login").append("<h4 class='text-danger'>Non esiste un utente con tale username</h4>")
                })

            </script>
        <?php
            }else if(!$found_psw){      //messaggio di errore
        ?>
            <script>
                $(document).ready(function(){
                    $("#login").append("<h4 class='text-danger'>La password è sbagliata</h4>")
                })
            </script>
        <?php
            }

            if(!$check_psw && $found_user){     //messaggio di errore
        ?>
                <script>
                    $(document).ready(function(){
                        $("#login").append("<h4 class='text-danger'>le password non coincidono</h4>")
                    })

                </script>
                <?php
            }
        }

    }
    ?>

</head>
<body>


<div class="bg-opacity-25 p-3 container-fluid w-50">

    <!-- div esterno -->
    <div class="container bg-light text-center p-3 rounded-1 m-auto">

        <!-- div del form -->
        <div id="login" class="pt-1 container">
            <h3 class="text-dark">EFFETTUA IL LOGIN</h3>

            <!-- form e container dati personali del cliente che effettua la registrazione -->
            <form action="login.php" class="m-auto form-floating w-25 text-dark" method="post">
                <div class="container m-auto p-1">
                    <label class="p-1">
                        Username:
                        <input type="text" name="username" placeholder="<?php $text = explode(",", fgets(fopen("accessi.txt", "r"))); echo $text[0] ?>" class="form-control bg-light border-1 text-dark" required>
                    </label>

                    <label class="p-1">
                        Password:
                        <input type="password" name="psw" placeholder="<?php $text = explode(",", fgets(fopen("accessi.txt", "r"))); echo $text[1] ?>" class="form-control bg-light border-1 text-dark" required>
                    </label>

                    <label class="p-1">
                        Conferma password:
                        <input type="password" name="check_psw" class="form-control bg-light border-1 text-dark" required>
                    </label>

                    <span>Non ti sei ancora registrato? <a href="signup.php">Registrati!</a></span>
                </div>

                <input type="submit" value="Accedi" class="btn btn-danger p-1 w-75">
            </form>
        </div>
    </div>
</div>

</body>
</html>