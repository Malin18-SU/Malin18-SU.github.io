<html lang="it">
    <head>
        <title>Esercizi Linzas Matteo</title>

    </head>

    <body>
        <div id="es1">
            <?php
            for($i=0;$i<100;$i++){
                echo $i ." ";
            }
            ?>
        </div>

        <div id="es2">
            <?php
            $dim=20;
            $value=0;
            echo "<table border=3px style='border: solid blue'>";
            for($x=0;$x<$dim;$x++){
                echo "<tr style='border=3px solid blue; background-color=blue'>";
                for($y=0;$y<$dim;$y++){
                    echo "<td style='border=3px solid blue;background-color=blue '>" .($value+=3) ."</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </div>

        <div id="es3">
            <?php
                $sec_date1 = time();
                $date1 = new DateTime();
                $sec_date2 = time()+30;
                $date2 = new DateTime();
                $date2->add(DateInterval::createFromDateString('30 seconds'));

                echo "data1: " .($date1->format('h:i:s')) .", data2: " .($date2->format('h:i:s') ."<br>");

                echo ($sec_date2 - $sec_date1)  ." secondi di differenza tra due date ";
            ?>
        </div>
    </body>
</html>