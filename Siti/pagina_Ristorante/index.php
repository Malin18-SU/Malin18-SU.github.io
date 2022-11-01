<html lang="it" class="h-100">
<head>
    <title>Pagina Ristorante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="css/myStyle.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js" integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c=" crossorigin="anonymous"></script>
    <style>
        html,body{
            margin: 0;
            padding: 0;
            height: 100vh;
            width: 100vw;
        }
    </style>
</head>
<body>
<div class="navbar nav navbar-dark bg-dark">
    <p class="navbar-brand">Ristorante Linz</p>
</div>

<div class="container col-4 w-100 h-100 position-relative text-center text-light">

    <?php

    function get_id($name){
        switch($name){
            case "Fugassa":
                return 1;

            case "Hummus":
                return 2;

            case "Involtini":
                return 3;

            case "Gnocchi_Sorrentina:":
                return 4;

            case "Lasagne_Bolognese":
                return 5;

            case "Spaghetti_CacioPepe":
                return 6;

            case "Gnocchi_Romana":
                return 7;

            case "Parmigiana_Melanzane":
                return 8;

            case "Bresato_Barolo":
                return 9;

            case "Tiramisù":
                return 10;

            case "Tortino_Cioccolato":
                return 11;

            case "Torta_Nonna":
                return 12;

            case "Acqua_Naturale":
                return 13;

            case "Poggio_Rosso":
                return 14;

            case "Barbaresco":
                return 15;
        }
        return 0;
    }
    function get_prezzo($id){
        switch($id){
            case 1:
                return 2.99;

            case 2:
            case 3:
            case 7:
                return 3.99;

            case 4:
            case 5:
            case 6:
            case 8:
            case 9:
                return 4.99;

            case 10:
            case 11:
            case 12:
                return 3.50;

            case 13:
                return 1.00;

            case 14:
            case 15:
                return 11.99;

        }
    }
    if($_POST){
        ?>

        <div class="rounded-1 p-1 container d-flex flex-wrap flex-fill justify-content-center w-100">
            <div class="card bg-dark bg-opacity-75 p-1 m-1 text-light w-auto">
                <div class="card-body">
                    <h5 class="card-title">Resoconto</h5>
                    <p class="card-text">
        <?php
        $prezzo_finale = 0;
        foreach($_POST as $name=>$value){
            if($value>0){
                $prezzo_finale+=(get_prezzo(get_id($name))*$value);
                echo "$name: " .$value .", prezzo:" .get_prezzo(get_id($name)) ."x$value = " .(get_prezzo(get_id($name))*$value) ."€<br>";
            }

        }
        echo "<strong>Prezzo finale: $prezzo_finale" ."€ </strong><br>";

        ?>
                    </p>
                </div>
            </div>
            <?php
    }else{
     ?>
        <form class="form-floating bg-dark bg-opacity-75 rounded-1" action="index.php" method="post">
            <h1 class="text-light text-center container">Antipasti</h1>
            <div id="antipasti" class="rounded-1 p-1 container d-flex flex-wrap flex-fill justify-content-center">
                <div class="card bg-dark bg-opacity-75 p-1 m-1 text-light w-25">
                    <img class="card-img-top" src="https://www.giallozafferano.it/images/224-22468/Focaccia-fugassa-alla-genovese_360x300.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Fugassa alla Genovese</h5>
                        <p>Prezzo: <?php echo get_prezzo(1) ."€"?></p>
                        <p class="card-text">Fugassa alla Genovese preparata da veri esperti</p>
                        <label>
                            Quantità: <input type="number" min="0" class="w-25" name="Fugassa" value="0" required>
                        </label>
                    </div>
                </div>

                <div class="card bg-dark bg-opacity-75 p-1 m-1 text-light w-25">
                    <img class="card-img-top" src="https://www.giallozafferano.it/images/230-23004/Involtini-primavera_360x300.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Involtini Primavera</h5>
                        <p>Prezzo: <?php echo get_prezzo(2) ."€"?></p>
                        <p class="card-text">Involtini ripieni di verdure nostrane</p>
                        <label>
                            Quantità: <input type="number" min="0" class="w-25" name="Involtini" value="0" required>
                        </label>
                    </div>
                </div>

                <div class="card bg-dark bg-opacity-75 p-1 m-1 text-light w-25">
                    <img class="card-img-top" src="https://www.giallozafferano.it/images/243-24308/Hummus_360x300.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Hummus</h5>
                        <p>Prezzo: <?php echo get_prezzo(3) ."€"?></p>
                        <p class="card-text">Soffice hummus vellutata artigianale</p>
                        <label>
                            Quantità: <input type="number" min="0" class="w-25" name="Hummus" value="0" required>
                        </label>
                    </div>
                </div>
            </div>

            <h1 class="text-light text-center container">Primi</h1>
            <div id="primi" class="rounded-1 p-1 container d-flex flex-wrap flex-fill justify-content-center">
                <div class="card bg-dark bg-opacity-75 p-1 m-1 text-light w-25">
                    <img class="card-img-top" src="https://www.giallozafferano.it/images/197-19745/Gnocchi-alla-sorrentina_360x300.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Gnocchi alla Sorrentina</h5>
                        <p>Prezzo: <?php echo get_prezzo(4) ."€"?></p>
                        <p class="card-text">Un piatto tipico campano preparato con tanto amore</p>
                        <label>
                            Quantità: <input type="number" min="0" class="w-25" name="Gnocchi_Sorrentina" value="0" required>
                        </label>
                    </div>
                </div>

                <div class="card bg-dark bg-opacity-75 p-1 m-1 text-light w-25">
                    <img class="card-img-top" src="https://www.giallozafferano.it/images/229-22941/Lasagne-alla-Bolognese_360x300.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Lasagne alla Bolognese</h5>
                        <p>Prezzo: <?php echo get_prezzo(5) ."€"?></p>
                        <p class="card-text">Tipico piatto della domenica bolognese</p>
                        <label>
                            Quantità: <input type="number" min="0" class="w-25" name="Lasagne_Bolognese" value="0" required>
                        </label>
                    </div>
                </div>

                <div class="card bg-dark bg-opacity-75 p-1 m-1 text-light w-25">
                    <img class="card-img-top" src="https://www.giallozafferano.it/images/219-21989/Spaghetti-Cacio-e-Pepe_360x300.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Spaghetti Cacio e Pepe</h5>
                        <p>Prezzo: <?php echo get_prezzo(6) ."€"?></p>
                        <p class="card-text">Piatto capo saldo della cucina romana. Pochi ingredienti, massima rendita!</p>
                        <label>
                            Quantità: <input type="number" min="0" class="w-25" name="Spaghetti_CacioPepe" value="0" required>
                        </label>
                    </div>
                </div>
            </div>

            <h1 class="text-light text-center container">Secondi</h1>
            <div id="secondi" class="rounded-1 p-1 container d-flex flex-wrap flex-fill justify-content-center">
                <div class="card bg-dark bg-opacity-75 p-1 m-1 text-light w-25">
                    <img class="card-img-top" src="https://www.giallozafferano.it/images/245-24589/Gnocchi-alla-romana_360x300.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Gnocchi alla Romana</h5>
                        <p>Prezzo: <?php echo get_prezzo(7) ."€"?></p>
                        <p class="card-text">Gli gnocchi alla romana, sono dei dischetti tondi di semolino, caratterizzati da una piacevole crosticina che si crea grazie al pecorino.</p>
                        <label>
                            Quantità: <input type="number" min="0" class="w-25" name="Gnocchi_Romana" value="0" required>
                        </label>
                    </div>
                </div>

                <div class="card bg-dark bg-opacity-75 p-1 m-1 text-light w-25">
                    <img class="card-img-top" src="https://www.giallozafferano.it/images/234-23446/Parmigiana-di-melanzane_360x300.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Parmigiana di Melanzane</h5>
                        <p>Prezzo: <?php echo get_prezzo(8) ."€"?></p>
                        <p class="card-text">La parmigiana di melanzane è una delle ricette italiane più famose e amate!</p>
                        <label>
                            Quantità: <input type="number" min="0" class="w-25" name="Parmigiana_Melanzane" value="0" required>
                        </label>
                    </div>
                </div>

                <div class="card bg-dark bg-opacity-75 p-1 m-1 text-light w-25">
                    <img class="card-img-top" src="https://www.giallozafferano.it/images/182-18287/Brasato-al-Barolo_360x300.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Bresato al Barolo</h5>
                        <p>Prezzo: <?php echo get_prezzo(9) ."€"?></p>
                        <p class="card-text">Un brasato piemontese che comprerà il tuo palato!</p>
                        <label>
                            Quantità: <input type="number" min="0" class="w-25" name="Bresato_Barolo" value="0" required>
                        </label>
                    </div>
                </div>
            </div>

            <h1 class="text-light text-center container">Dessert</h1>
            <div id="dessert" class="rounded-1 p-1 container d-flex flex-wrap flex-fill justify-content-center">
                <div class="card bg-dark bg-opacity-75 p-1 m-1 text-light w-25">
                    <img class="card-img-top" src="https://www.giallozafferano.it/images/237-23742/Tiramisu_360x300.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Tiramisù</h5>
                        <p>Prezzo: <?php echo get_prezzo(10) ."€"?></p>
                        <p class="card-text">Immancabile è il dolce Tiramisù, con mascarpone e savoiardi al caffè!</p>
                        <label>
                            Quantità: <input type="number" min="0" class="w-25" name="Tiramisù" value="0" required>
                        </label>
                    </div>
                </div>

                <div class="card bg-dark bg-opacity-75 p-1 m-1 text-light w-25">
                    <img class="card-img-top" src="https://www.giallozafferano.it/images/235-23566/Tortino-di-cioccolato-con-cuore-fondente_360x300.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Tortino al cioccolato</h5>
                        <p>Prezzo: <?php echo get_prezzo(11) ."€"?></p>
                        <p class="card-text">Tortino al cioccolato con cuore fondente</p>
                        <label>
                            Quantità: <input type="number" min="0" class="w-25" name="Tortino_Cioccolato" value="0" required>
                        </label>
                    </div>
                </div>

                <div class="card bg-dark bg-opacity-75 p-1 m-1 text-light w-25">
                    <img class="card-img-top" src="https://www.giallozafferano.it/images/229-22997/Torta-della-nonna_360x300.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Torta della nonna</h5>
                        <p>Prezzo: <?php echo get_prezzo(12) ."€"?></p>
                        <p class="card-text">Preparata con tanto amore da Nonna Lucia!</p>
                        <label>
                            Quantità: <input type="number" min="0" class="w-25" name="Torta_Nonna" value="0" required>
                        </label>
                    </div>
                </div>
            </div>

            <h1 class="text-light text-center container">Bevande</h1>
            <div id="bevande" class="rounded-1 p-1 container d-flex flex-wrap flex-fill justify-content-center">
                <div class="card bg-dark bg-opacity-75 p-1 m-1 text-light w-25">
                    <img class="card-img-top" src="https://static.sushilabroma.it/i/2018/03/acqua-naturale-500ml.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Acqua Naturale 50cl</h5>
                        <p>Prezzo: <?php echo get_prezzo(13) ."€"?></p>
                        <p class="card-text">Acqua</p>
                        <label>
                            Quantità: <input type="number" min="0" class="w-25" name="Acqua_Naturale" value="0" required>
                        </label>
                    </div>
                </div>

                <div class="card bg-dark bg-opacity-75 p-1 m-1 text-light w-25">
                    <img class="card-img-top" src="https://data.callmewine.com/imgprodotto/poggio-mandorlo-rosso-2012_44968_list.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Poggio Mandorlo Rosso</h5>
                        <p>Prezzo: <?php echo get_prezzo(14) ."€"?></p>
                        <p class="card-text">Vino</p>
                        <label>
                            Quantità: <input type="number" min="0" class="w-25" name="Poggio_Rosso" value="0" required>
                        </label>
                    </div>
                </div>

                <div class="card bg-dark bg-opacity-75 p-1 m-1 text-light w-25">
                    <img class="card-img-top" src="https://data.callmewine.com/imgprodotto/barbaresco-rabaja-cortese-2019_46637_list.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Vino Barbaresco</h5>
                        <p>Prezzo: <?php echo get_prezzo(15) ."€"?></p>
                        <p class="card-text">Un rosso intenso</p>
                        <label>
                            Quantità: <input type="number" min="0" class="w-25" name="Barbaresco" value="0" required>
                        </label>
                    </div>
                </div>
            </div>

            <input type="submit" value="Invia Prenotazione" class="btn btn-primary">
            <input type="reset" value="Cancella i dati" class="btn btn-secondary">
        </form>
    <?php
    }
    ?>

</div>
</body>
</html>