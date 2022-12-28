<head>
    <title>Esercizi Bonus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body class="bg-dark"></body>
<?php
function isvocale($c){
    switch($c){
        case 'a':
        case 'A':

        case 'e':
        case 'E':

        case 'i':
        case 'I':

        case 'o':
        case 'O':

        case 'u':
        case 'U':
            return true;

        default:
            return false;
    }
}

function isnumero($c){
    if(ord($c) >= 48 && ord($c) <= 57)
        return true;
    return false;
}

if($_POST){
    $str = str_split($_POST["str"]);
    $cons = 0;
    $voc = 0;
    $search = 0;
    $num = 0;
    foreach($str as $key => $value){
        if(isvocale($value)){
        $voc++;
        } else $cons++;

        if($value == $_POST["char"]){
            $search++;
        }

        if(isnumero($value))
            $num++;
    }

    echo "<div class='container bg-warning bg-gradient rounded-1 text-center text-dark h-50 justify-content-center align-items-center row m-auto'>";
    echo "<strong>" .$_POST["str"] ."</strong> <br>";
    echo "consonanti: $cons" ."<br>";
    echo "vocali: $voc" ."<br>";
    echo "carattere " .$_POST["char"] ." uscito $search volte" ."<br>";
    echo "caratteri numerici: $num" ."<br>";
    echo "carattere " .$_POST["char"] ." uscito il " .($search/count($str)*100) ." %" ."<br>";
    $result = preg_split('/[ .]/', $_POST["str"]);
    echo "parole: " .count($result) ."<br>";

    echo "</div>";
}else {
    echo "errore";
}
?>