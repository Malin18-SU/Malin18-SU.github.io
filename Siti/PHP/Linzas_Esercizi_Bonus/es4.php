<?php
if($_POST){
    $array = array(array("Piero", 3, "Angelo"), array("Rossi", 2, "Alberto"), array("Verdi", 5, "Giuseppe"));

    switch($_POST["sel_visual"]){
        case "1":
            sort($array);
            break;

        default:
            usort($array);
            break;

    }

    echo "<div class='container text-center bg-dark bg-opacity-50 text-light m-auto'><table border='3'>";


    for($x = 0; $x < count($array) ;$x++){
        echo "<tr>";
        for($y = 0; $y < count($array[$x]); $y++){
            echo "<td>" .$array[$x][$y] ."</td>";
        }
        echo "</tr>";
    }

    echo "</tr></table></div>";
}


function order(){

}

?>
