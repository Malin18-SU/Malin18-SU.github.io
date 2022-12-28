<?php
session_start();
//$_SESSION["array"] = array("user1" => "psw123");
$_SESSION["utenti_registrati"] = count($_SESSION["array"]);
?>

<html>
<head>
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
<?php
    if(!isset($_SESSION["login"])) {
        header("Location: login.php");
    }
    ?>
        <form action="login.php" method="post">
            <div class="container m-auto">
                <div class="container img-fluid">
                    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png">
                </div>
                <p class="text-dark">Benvenuto <?php echo " " .$_SESSION["login"] ."!" ?></p>
                <input type="submit" value="Logout">
            </div>

        </form>
</body>
</html>
