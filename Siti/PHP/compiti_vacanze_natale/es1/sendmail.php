<?php
session_start();
ini_set('SMTP','ssl:smtp.gmail.com');
ini_set('smtp_port',465);
ini_set('username', 'matteo.linzas@gmail.com');
ini_set('password', 'AinzMatteo18');

if($_POST){
    $file = fopen("file.txt", "a+");

    $_SESSION["id"] = randomPassword("user", 5);
    $_SESSION["psw"] = randomPassword("psw");
    $_SESSION["name"] = $_POST["name"];
    $_SESSION["surname"] = $_POST["surname"];
    $_SESSION["date"] = $_POST["date"];
    $_SESSION["addr"] = $_POST["addr"];
    $_SESSION["city"] = $_POST["city"];
    $_SESSION["email"] = $_POST["email"];

    fwrite($file, $_SESSION["name"] ."," .$_SESSION["surname"] ."," .$_SESSION["date"] ."," .$_SESSION["addr"] ."," .$_SESSION["city"] ."," .$_SESSION["email"] ."\n");
    fclose($file);

    $sender = "me";
    $sender_mail = "mittente@weh.com";
    $receiver = $_SESSION["email"];

    $mail_obj = "boh";
    $mail_body = "Prova";

    $mail_headers = "From: " .$sender ." <" .$sender_mail . "> \r\n";
    $mail_headers .= "Reply-To: " .$sender_mail ."> \r\n";
    $mail_headers .= "X-Mailer: PHP/" .phpversion();

    if(mail($receiver, $mail_obj, $mail_body, $mail_headers)){
        echo "Messaggio inviato con successo\n";
        echo "user: " .$_SESSION["id"] . " psw: " .$_SESSION["psw"] ."<br>";
    }else echo "Errore. \n";

}

function randomPassword($type, $length=8) {
    $psw = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $user = 'abcdefghijklmnopqrstuvwxyz';

    if($type == "user"){
        $alphabet = $user;
    }else $alphabet = $psw;

    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < $length; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
?>
