$(document).ready(function(){
let category = new URLSearchParams(window.location.search).get('category')


    $.getJSON("json/products.json", function(data){
        let categories = data.categories[0]
        let keys = Object.keys(categories)
        console.log("keys: " + keys)
        console.log("categories: " + categories)
        for(let key of keys){
                if(category === key || category == null) {
                    categories[key].forEach(function (product) {
                        $("#products").append('<div class="card up shadow">' +
                            '<div class="card-header">' +
                            '                <img id="c" class="card-img-top" src="' + product.img + ' " alt="Card image cap">' +
                            '</div>' +
                            '                <div class="card-body d-flex flex-column justify-content-center h-75 align-items-center">' +
                            '                    <h5 class="card-title">' + product.name + '</h5>' +
                            '                    <p class="card-text form-text h-25">' + product.description + '</p>' +
                            '                    <input class="quantity rounded border-1 text-end w-25" type="number" max="' + product.quantity + '" min="0" value="1">' +
                            '                    <p class="card-text form-text">prezzo: <span class="price">' + product.price + '</span>€</p>  ' +
                            '                    <a class="btn btn-danger buy"><img class="icon w-25" src="../img/icons/cart/add.png">Aggiungi al carrello</a>' +
                            '                </div>' +
                            '            </div>')
                    })
                }
        }
    })

    $(document).on("click", ".buy", function() {
        //console.log("ci sono " + $(this).closest(".card").find(".card-img-top").attr("src"))
        $("#img").attr("value", $(this).closest(".card").find(".card-img-top").attr("src"))
        $("#name").attr("value", $(this).closest(".card").find(".card-title").text())
        $("#quantity").attr("value", $(this).closest(".card").find(".quantity").val())
        $("#price").attr("value", $(this).closest(".card").find(".price").text())
        console.log($("#img").val())
        console.log($("#name").val())
        console.log($("#quantity").val())
        console.log($("#price").val())

        $("#send_to_cart").submit()
    })

})