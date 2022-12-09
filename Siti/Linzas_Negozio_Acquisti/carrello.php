<?php include("init.php");

?>
<html>
    <head>
        <title>Carrello</title>
        <script src="js/cart.js"></script>

        <?php
        if($_POST){
            foreach(array_keys($_SESSION["cart"]) as $key){
                //echo "$key == " .$_POST["name"] ."<br>";
                if($key){
                    unset($_SESSION["cart"][$key]);
                    break;
                }

            }


        }

        $total_price = 0;       //visualizza il totale del prezzo dei prodotti - prints the summary bill to pay
        $total_quantity = 0;    //visualizza la quantità di prodotti totale - prints how many products are being bought

        //visualizza i prodotti nel carrello. Se vuoto, visualizza una finestra specifica - prints all products in cart. If empty, then prints a specific div
        function create_cart(){
            foreach($_SESSION["cart"] as $product => $value){
                global $total_price;
                global $total_quantity;
                $total_price += (float)$value["price"];
                $total_quantity += (int)$value["quantity"];
                echo '<div class="product row justify-content-center align-items-center border-bottom">' ;
                echo '                    <div class="prod-img col-2">' ;
                echo '                        <img class="w-75 rounded p-1 border" src=' .$value["img"] .' >' ;
                echo '                    </div>' ;

                echo '                    <div class="prod-name col-2">' ;
                echo '                        <p>'.$product.'</p>' ;
                echo '                    </div>' ;

                echo '                    <div class="prod-quantity col-2">' ;
                echo '                        <input class="w-50 text-center form-control" readonly type="text" value="' .(int)($value["quantity"]) .'">' ;
                echo '                    </div>' ;

                echo '                    <div class="col-1">' ;
                echo '                        <h4>*</h4>' ;
                echo '                    </div>' ;

                echo '                    <div class="prod-price col-2">' ;
                echo '                        <input class="w-50 text-center form-control" type="text" readonly value="' .(float)$value["price"] .'€">' ;
                echo '                    </div>' ;

                echo '                    <div class="col-1">' ;
                echo '                        <h4>=</h4>' ;
                echo '                    </div>' ;

                echo '                    <div class="col-1">' ;
                echo '                        <input class="w-75 form-control" type="text" readonly value="' .($value["quantity"]*$value["price"]) . '€">' ;
                echo '                    </div>' ;
                echo '                    <div class="prod-delete col-1">' ;
                echo '                        <a class="w-75 btn down"><img class="w-75 icon" src="img/icons/delete.png"> </a>' ;
                echo '                    </div>' ;
                echo '                </div>';


            }
        }
        ?>

    </head>
    <body>
        <div class="bg-light w-75 container-fluid shadow m-5 rounded m-auto" style="min-height: 75%">
            <div class="container d-flex border-bottom">
                <h2 class="text-start">Il Tuo Carrello</h2>
                <form id="delete" class="d-none" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <input id="name" name="name" type="text">
                </form>
            </div>


            <?php
            if(empty($_SESSION["cart"])){
                ?>
                <div class="container d-flex flex-column justify-content-center align-items-center h-50 m-5">
                    <div class="opacity-50">
                        <img src="img/icons/cart/add.png">
                    </div>
                    <div class="text-dark font-weight-bold text-center">
                        <h4>Oh no! Sembra che il carrello sia vuoto!</h4>
                        <h5 class="form-text">Aggiungi qualche prodotto per riempire il carrello!</h5>
                    </div>
                </div>
                <?php
            }else{
                ?>
            <div class="container modal-content cart-content d-flex flex-wrap m-auto" style="min-height: 75%">
                <div class="row border-bottom border-dark">
                    <div class="col-2">
                        <h3>Prodotto</h3>
                    </div>

                    <div class="col-2">
                        <h3>Nome</h3>
                    </div>

                    <div class="col-2">
                        <h3>Quantità</h3>
                    </div>

                    <div class="col-1">

                    </div>

                    <div class="col-2">
                        <h3>Prezzo</h3>
                    </div>

                    <div class="col-1">

                    </div>

                    <div class="col-1">
                        <h3>Totale</h3>
                    </div>

                    <div class="col-1">

                    </div>

                </div>
                <div class="products">
                    <?php
                    create_cart();
                    ?>
                </div>

                <div class="row border-top border-dark">
                    <div class="col-2">

                    </div>

                    <div class="col-2">

                    </div>

                    <div class="col-2">
                        <input class="w-50 text-center form-control" readonly type="text" value="<?php echo $total_quantity ?>">
                    </div>

                    <div class="col-1">

                    </div>

                    <div class="col-2">

                    </div>

                    <div class="col-1">

                    </div>

                    <div class="col-1">
                        <input class="w-75 text-center form-control" readonly type="text" value="<?php echo $total_price ?>€">
                    </div>

                    <div class="col-1">

                    </div>
                </div>
                    <?php
                }
                ?>
        </div>
    </body>
</html>