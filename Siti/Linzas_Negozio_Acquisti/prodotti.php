<?php include("init.php");
?>
<html>
<head>
    <title>I NOSTRI PRODOTTI</title>
    <script src="js/products.js"></script>
    <?php
    if($_POST){     //il prodotto è inviato al carrello - the product is sent to the cart
        $_SESSION["cart"][$_POST["name"]] = ["img" => $_POST["img"], "quantity" => $_POST["quantity"], "price" => $_POST["price"]];

 /*      foreach($_SESSION["cart"] as $product => $name){
           foreach($name as $key => $value)
           echo "$product = " .$key ." = " .$value ."<br>";

       }
        echo "POST <br>";
       foreach($_POST as $key => $value){
           echo $key ." = $value<br>";
        }
 */
    }
    ?>
</head>
<body>
<div id="container" class="bg-light container-fluid w-75 rounded mb-5">
    <div class="bg-opacity-10 text-center border rounded shadow m-auto">
        <form id="send_to_cart" class="d-none" method="post" action="">
            <input id="img" name="img" type="text" value="">
            <input id="name" name="name" type="text" value="">
            <input id="quantity" name="quantity" type="number" value="">
            <input id="price" name="price" type="number" value="">
        </form>
        <div class="container d-flex justify-content-end align-items-center m-3 gap-2">
            <input id="search_categories" type="search" class="form-control w-25" placeholder="Categorie">
            <input id="search_categories_btn" type="button" class="btn btn-danger" value="Cerca">
        </div>
        <div id="products" class="d-flex flex-wrap justify-content-center m-1 p-1 gap-3">
    </div>
</div>

</body>
</html>