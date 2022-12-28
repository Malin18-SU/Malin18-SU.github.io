<html>
    <head>
        <title>Es4</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    </head>
    <body class="text-center">
       <div class="text-center container m-auto">
           <h1>Pagina Home</h1>
           <?php
           if(isset($_COOKIE["user"])){
               echo "Buongiorno <strong>" .$_COOKIE["user"] ."</strong><br>";
               ?>
               <h4>modifica/cancella le <a href='set_cookie.php'>impostazioni</a></h4>
               <?php
           }else{
               ?>
               <h4>Buongiorno. Clicca il pulsare per modificare la pagina di benvenuto</h4>
               <form action="add_user.php"><input type="submit" value="Modifica" class="btn btn-primary form-control w-25"></form>
               <?php
           }
           ?>
       </div>
    </body>
</html>