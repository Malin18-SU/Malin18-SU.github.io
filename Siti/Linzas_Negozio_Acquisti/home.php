<?php
include("init.php");

?>

<html>
<head>
    <title>Home</title>
    <script src="js/home.js"></script>

</head>
<body>
    <div class="bg-light container-fluid w-75 rounded m-auto" style="height: fit-content">
        <h2 class="text-start text-danger">Benvenut<?php
            if($_SESSION["sex"] == "M"){
                echo "o ";
            }else echo "a ";
            echo $_SESSION['name'] .' ' .$_SESSION['surname']; ?></h2>

        <div class="bg-opacity-10 text-center border rounded m-5">
            <h2 class="">Scegli cosa prendere!</h2>
            <div id="categories" class="d-flex flex-wrap justify-content-center p-1 gap-5">

            </div>
        </div>
    </div>
</body>
</html>