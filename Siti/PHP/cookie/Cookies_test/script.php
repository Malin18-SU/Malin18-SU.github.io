<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Prova Cookie</title>
  </head>
  <body>
    <?php
    if(!isset($_COOKIE["visita"])){
      echo "Benvenuto <br>";

      setcookie("visita", "s", time() + 3600);
    }else{
      echo "Bentornato. L'ultimo accesso è stato alle " .$_COOKIE["visita"] ."<br>";

      setcookie("visita", date("h:i:s d/m/y"), time() + 3600);
    }

     ?>
  </body>
</html>
