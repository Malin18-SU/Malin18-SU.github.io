<html>
    <head>
    <?php

        $start = 33;
        $end = 127;
        for($i = $start; $i < $end; $i++){
            if($i % 16 != 0){
                echo "$i = " .chr($i) .' ';

            }else echo "<br>";
        }
    ?>


    <?php
    $a = array();

    for($i = 0;$i < 40; $i++){
        $a[$i] = rand(1, 40);
    }
    echo  "<br><br>";
    print_r($a);
    echo  "<br><br>";
    sort($a);
    print_r($a);
    echo  "<br><br>";
    shuffle($a);
    print_r($a);
    echo  "<br><br>";
    rsort($a);
    print_r($a);
    echo "<br><br>";
    if($c = array_search(5, $a)){
        echo "elemento 5 trovato in $c";
    }else echo $c;
    ?>

    <?php
    $a = array();
    $max = 20;
    $media = 0;
    $pari = 0;
    $dispari = 0;
    for($i = 0;$i < $max;$i++){
        $a[$i] = rand(10, 100);
        if($a[$i] % 2 == 0)
            $pari++;
        else $dispari++;
    }

    echo "<br>max = " .max($a);
    echo "<br>min = " .min($a);
    echo "<br>media = " .array_sum($a)/count($a);
    echo "<br>numeri pari: $pari";
    echo "<br>numeri dispari: $dispari";
    ?>


    <?php
    echo "<br><br>";
    $ar = array('Italia'=>'Roma', 'Francia'=>'Parigi', 'Spagna'=>'Madrid', 'Germania'=>'Berlino', 'Austria'=>'Vienna', 'Belgio'=>'Bruxelles', 'Bulgaria'=>'Sofia', 'Crozia'=>'Zagabria', 'Danimarca'=>'Copenhagen', 'Slovacchia'=>'Bratislava');

    function Trova_Nazione($ar, $citta){
        return array_search($citta, $ar);
    }

    function Trova_Capitale($ar, $nazione){
        foreach($ar as $key => $citta){
            if($key == $nazione){
                return $citta;
            }
        }
        return false;
    }

    function Stampa_Vett($ar){
        echo "<br>";
        foreach($ar as $key => $value){
            echo "$key : $value <br>";
        }

    }

    echo Trova_Nazione($ar, 'Roma') ."<br>";

    echo Trova_Capitale($ar, 'Italia');

    Stampa_Vett($ar);

    ?>


    <?php
    $ar = array("Alessandria" => 'AL', "Asti" => 'AT', "Biella" => 'BI', "Cuneo" => 'CN', "Novara" => 'NO', "Torino" => 'TO', "Verbano-Cusio-Ossola" => 'VCO', "Vercelli" => 'VCO');

    function Trova_Sigla($ar, $provincia){
        return array_search($provincia, $ar);
    }

    echo Trova_Sigla($ar, "Asti") ."<br>";
    echo Trova_Sigla($ar, "Asti") ."<br>";
    ?>

    <?php
    $ar = array('Pianoforte'=>'900', 'Cioccolato'=>'5', 'Chitarra'=>'350', 'Mouse'=>'30', 'Tastiera'=>'80', 'Stampante'=>'100', 'Penna'=>'2', 'Quaderno'=>'3', 'Monitor'=>'150', 'Cuscino'=>'30');

    echo "max = " .max($ar) .'€';
    echo "<br>min = " .min($ar) .'€';
    echo "<br>media = " .array_sum($ar)/count($ar) .'€';
    ?>

    </head>
</html>