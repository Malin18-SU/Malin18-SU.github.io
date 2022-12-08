<?php include("init.php");
?>

<html>
<head>
    <title>Il Tuo Profilo</title>

   <?php
   if($_POST){      //scrivere per aggiornare le variabili sul file

   }

    $file = fopen("accessi.txt", "r");
    $text = 0;
    $user = 0;
    $psw = 0;
    while(!feof($file)){
        $text = explode(",", fgets($file));
        if($text[2] === $_SESSION["name"]){
            $user = $text[0];
            $psw = $text[1];
            fclose($file);
            break;
        }
    }
    ?>

</head>
<body>
<div class="container-fluid w-75 bg-white h-75">
    <div class="d-flex align-items-center justify-content-center">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <label class="form-label">
                Nome
                <input class="form-control" name="name" type="text" placeholder="<?php echo $_SESSION['name'] ?>">
            </label>

            <label class="form-label">
                Cognome
                <input class="form-control" name="surname" type="text" placeholder="<?php echo $_SESSION['surname'] ?>">
            </label>

            <label class="form-label">
                Username
                <input class="form-control" name="user" type="text" placeholder="<?php echo $user ?>">
            </label>

            <label class="form-label">
                Password
                <input class="form-control" name="psw" type="text" placeholder="<?php echo $psw ?>">
            </label>

            <select class="form-control form-select" name="sex">
                <?php
                if($_SESSION["sex"] === "F"){
                    echo "<option selected value='F'>F</option>";
                    echo "<option value='M'>M</option>";
                }else{
                    echo "<option value='F'>F</option>";
                    echo "<option selected value='M'>M</option>";
                }
                ?>
            </select>


            <input type="button" class="form-control btn btn-danger" value="Aggiorna">
        </form>
    </div>
</div>
</body>
</html>