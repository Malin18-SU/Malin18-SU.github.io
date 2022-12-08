<?php include("init.php");
?>
<html>
<head>
    <title>I NOSTRI PRODOTTI</title>
    <script src="js/products.js"></script>
    <?php
    if($_POST){
        if(isset($_SESSION["num_products"]))
            $_SESSION["num_products"] += 1;
       else
           $_SESSION["num_products"] = 1;

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
        <div>

        </div>
        <div id="products" class="d-flex flex-wrap justify-content-center m-1 p-1 gap-3">
    </div>
</div>

</body>
</html>