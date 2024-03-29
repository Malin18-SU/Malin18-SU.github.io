<?php session_start();


#############################################
#   QUESTA PAGINA E' RICHIAMATA ALL'INIZIO  #
#   DELLE ALTRE E CONTIENE LO SCRIPT        #
#   NECESSARIO, QUALI LO START DELLA        #
#   SESSIONE, ALCUNI CONTROLLI E LA NAVBAR  #
#############################################
#   THIS PAGE IS CALLED IN ALL THE OTHER    #
#   PAGES AND CONTAINS THE NEEDED SCRIPT,   #
#   WHICH ARE THE SESSION START, SOME       #
#   CONTROLS AND THE NAVBAR BAR             #
#############################################

$location = explode("/", $_SERVER['PHP_SELF']);
$location = end($location); //prende il nome del file in modo sicuro - gets filename safely

//timeout di mezz'ora per logout - 30min timeout logout
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    session_destroy();
    session_unset();
}
$_SESSION['LAST_ACTIVITY'] = time(); //aggiorna l'ultima azione eseguita sulla pagina - update last activity time

//se non esiste una sessione valida e non si è sulla pagina di login o di registrazione, reindirizza a login.php
//if there is no valid session and it's not in login or signup, redirect to login.php
if(!isset($_SESSION["ID"]) && ($location != "login.php" && $location != "signup.php")){
    echo("<script>location.href = 'login.php';</script>");
}

//se esiste una sessione valida e si è sulla pagina di login o di registrazione, reindirizza a home.php
//if there is a valid session and it's in login or signup, redirect to home.php
if(isset($_SESSION["ID"]) && ($location == "login.php" || $location == "signup.php")){
    echo("<script>location.href = 'home.php';</script>");
}

//imposta l'immagine del carrello - sets cart icon
$cart_img = "img/icons/cart/cart.png";
if(!empty($_SESSION["cart"])){
    $cart_img = "img/icons/cart/full.png";
}
?>
<head>
    <link rel="icon" href="img/logo/logo_40.png">
    <link rel="stylesheet" href="css/myStyle.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js" integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c=" crossorigin="anonymous"></script>

</head>
<body>
<div class="navbar navbar-dark bg-danger text-light m-auto">
  <span class="navbar-brand mb-0 h1"><img src="img/logo/logo_80.png" class="d-inline-block down">A Casa di Nonna Maria</span>
  <div class="justify-content-center btn-group">
      <span><a class="btn down" href="home.php">HOME</a></span>
      <span><a class="btn down" href="prodotti.php">I NOSTRI PRODOTTI</a></span>
  </div>
  <div class="justify-content-end btn-group align-items-center">
    <span><a href="carrello.php" class="btn down"><img src="<?php echo $cart_img?>" class="icon"></a></span>
      <div class="dropdown show">
          <a id="dropdownButton" role="button" href="#" class="dropdown-toggle btn down" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="img/icons/profile.png" class="icon"></a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownButton">
              <a class="dropdown-item" href="profilo.php">Il tuo Profilo</a>
              <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
      </div>
  </div>
</div>
</body>