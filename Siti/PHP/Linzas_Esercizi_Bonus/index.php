<html>
<head>
    <style>
        @keyframes open{
            from{display: none}
            to{display: block}
        }

        @keyframes slidein {
            from {
                margin-left: 100%;
                width: 300%;
            }

            to {
                margin-left: 0%;
                width: 100%;
            }
        }

        @keyframes visible {
            from{
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        form{
            animation-name: slidein;
            animation-duration: 1s;
        }

        body{
            animation-name: visible;
            animation-duration: 1s;
        }
    </style>
    <title>Esercizi Bonus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body class="bg-dark text-center m-auto p-1">
    <div class="container bg-gradient bg-warning text-center p-1 m-auto rounded-1">
    <form action="es1.php" method="post" class="form-group">
        <h1>es1</h1>
        <h4 class="form-text">Stringa</h4>
        <input type="text" name="str" placeholder="Inserire la frase qui" class="form-control">
        <label class="p-1">
            <h4 class="form-text">Carattere da cercare: </h4><input type="text" name="char" maxlength="1" class="form-control">
        </label>
        <br>
        <input type="submit" value="Invia" class="btn btn-success">
    </form>
    </div>

   <div class="container bg-gradient bg-light text-center p-1 m-auto rounded-1">
       <form action="index.php" method="post" class="form-group">
           <br>
           <br>
           <h1>es3</h1>
           <label>
               <h4 class="form-text">Username:</h4> <input type="text" name="user" class="form-control">
               <br>
               <br>
           </label>

           <label>
               <h4 class="form-text">Password:</h4> <input type="password" name="pass" class="form-control">
               <br>
               <br>
           </label>

           <label>
               <h4 class="form-text">Ripeti Password:</h4> <input type="password" name="check_pass" class="form-control">
               <br>
               <br>
           </label>

           <div class="container">
               <label class="">
                   <p class="form-text">Condizioni</p>
                   <textarea readonly style="resize: none; width: 400px; height: 150px;" class="form-control">Non esistono più condizioni</textarea>
               </label></div>


           <div class="form-check"></div>
           <input type="checkbox" id="check1" name="condizioni" value="on" >
           <label class="form-check-label" for="check1">
              Ho letto e accetto le condizioni.</label>

           <br>
           <input type="submit" value="Invia" class="btn btn-primary">
       </form>

       <?php
       if($_POST){
           echo "<div class='container text-center bg-dark bg-opacity-50 text-light m-auto'><table border='3'>";
           foreach($_POST as $key => $value){
               echo "<th>" .$key ."</th>";
           }

           echo "<tr>";
           foreach($_POST as $Key => $value){
               echo "<td>" .$value ."</td>";
           }

           echo "</tr></table></div>";
       }
       ?>
   </div>

    <div class="container bg-gradient bg-warning text-center p-1 m-auto rounded-1">
        <h1>es4</h1>
        <form action="es4.php" method="post" class="form-group text-center">
            <label class="form-check-label" for="sel1">
            </label>

            <select id="sel1" name="sel_visual" class="form-select w-25">
                <option value="1">Numero del giocatore</option>
                <option value="2">Cognome</option>
            </select>

            <input type="submit" value="Invia" class="btn btn-primary">
        </form>

    </div>


</body>
</html>