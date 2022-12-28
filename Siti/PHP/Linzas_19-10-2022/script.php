<?php
$op=$_POST["sel"];
$num1=$_POST["num1"];
$num2=$_POST["num2"];
$res=0;

switch($op){
    case 1:
        $res=$num1+$num2;
        break;

    case 2:
        $res=$num1-$num2;
        break;

    case 3:
        $res=$num1/$num2;
        break;

    case 4:
        $res=$num1*$num2;
        break;

    case 5:
        $res=pow($num1,$num2);
        break;


}
echo"Il risultato dei due numeri inseriti è " .$res;

?>


