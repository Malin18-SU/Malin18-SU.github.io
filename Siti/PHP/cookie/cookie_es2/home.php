<html>
<head>
    <title></title>

</head>
<body>
<?php
if(!isset($_COOKIE["visite"])){
    echo "Benvenuto <br>";

    setcookie("visite", "1", time() + 600);
}else{
    echo "Bentornato. La pagina è stata visitata " .$_COOKIE["visite"] ." volte negli ultimi 10 min<br>";

    setcookie("visite", (int)$_COOKIE["visite"] + 1, time() + 600);
}

?>
</body>
</html>