$(document).ready(function(){
    get_products()
    let sourcedata = ["antipasti", "primi", "secondi", "dolci", "caffè e bevande"]      //per autocomplete(non riuscivo a farlo funzionare recuperando i valori direttamente dal json)


    //autocomplete per la ricerca tramite categorie - autocomplete for the search by categories
    $("#search_categories").autocomplete({
        source:  sourcedata
    });

    //invio della ricerca tramite categorie - button that start search by categories
    $("#search_categories_btn").on("click", function(){
        let keys = $("#search_categories").val().replace(" ", "").replace(",", "-");
        if(keys[keys.length-1] === "-")
           keys = keys.substr(0, keys.length-1)

        location.href = "prodotti.php?category=" + keys;
    })

    //visualizza a schermo i prodotti delle categorie scelte - print on screen all products of selected categories
    function get_products(){
        let data_categories = new URLSearchParams(window.location.search).get('category')   //prende i parametri GET - gets GET parameters

        if(data_categories == null) //se non ci sono parametri, uguaglia a "" per stampare tutti i prodotti - if null, equals "" to print all products
            data_categories = ""

        $.getJSON("json/products.json", function(data){
            let categories = data.categories[0]
            let keys = Object.keys(categories)
            console.log("keys: " + keys)
            console.log("categories: " + categories)

            for(let category of data_categories.split("-")){    //esegue per ogni categoria, stampando a schermo le singole cards dei prodotti prelevate dal JSON
                for(let key of keys){               //execute for every category in data_categories, printing on screen the single cards of the products in the JSON file
                    if(category === key || category === "") {

                        //se non sono presenti prodotti nella singola categoria scelta, stampa una finestra apposita
                        //if there are no products in the single chosen category, then it prints a specific div
                        if(categories[key].length === 0 && category != null && data_categories !== ""){
                            $("#container").append(' <div class="no_result container d-flex flex-column justify-content-center align-items-center h-50 m-5">\n' +
                                '                    <div class="opacity-50">\n' +
                                '                        <img src="img/logo/logo_80.png">\n' +
                                '                    </div>\n' +
                                '                    <div class="text-dark font-weight-bold text-center">\n' +
                                '                        <h4>Oh no! Sembra che non ci siano prodotti di questa categoria!</h4>\n' +
                                '                        <h5 class="form-text">Torna in futuro!</h5>\n' +
                                '                    </div>\n' +
                                '                </div>')
                        }else{
                            categories[key].forEach(function (product) {
                                $("#products").append('<div class="card up shadow" data-category="' + category + '">' +
                                    '<div class="card-header">' +
                                    '                <img id="c" class="card-img-top" src="' + product.img + ' " alt="Card image cap">' +
                                    '</div>' +
                                    '                <div class="card-body d-flex flex-column justify-content-center h-75 align-items-center">' +
                                    '                    <h5 class="card-title">' + product.name + '</h5>' +
                                    '                    <p class="card-text form-text h-25">' + product.description + '</p>' +
                                    '                    <input class="quantity rounded border-1 text-end w-25" type="number" max="' + product.quantity + '" min="0" value="1">' +
                                    '                    <p class="card-text form-text">prezzo: <span class="price">' + product.price + '</span>€</p>  ' +
                                    '                    <a class="btn btn-danger buy"><img class="icon w-25" src="img/icons/cart/add.png">Aggiungi al carrello</a>' +
                                    '                </div>' +
                                    '            </div>')

                            })
                        }
                    }
                }
            }
        })
    }

    //quando si aggiunge un prodotto al carrello, si inviano i dati - if a product is added to cart, then the product is sent there
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