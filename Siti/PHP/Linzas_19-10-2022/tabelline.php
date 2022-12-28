<?php
echo "<table border='3' >";

$num=$_POST["numero1"];
echo "<tr>";
for($a=1; $a<=$num; $a++){
    for($b=1; $b<=$num; $b++){
        echo "<td>" .$a*$b ."</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>
