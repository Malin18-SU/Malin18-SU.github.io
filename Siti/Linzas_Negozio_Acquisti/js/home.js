$(document).ready(function(){

    //visualizza le categorie disponibili - prints all categories
    $.getJSON("json/categories.json", function(data){
        data.categories.forEach(function(category){
            $("#categories").append('<div class="card up shadow">' +
                '<div class="card-header">' +
                '                <img class="card-img-top" src="'+ category.img +' " alt="Card image cap">' +
                '</div>' +
                '                <div class="card-body d-flex flex-column justify-content-center align-items-center h-75 flex-fill">' +
                '                    <h5 class="card-title">' + category.name + '</h5>' +
                '                    <p class="card-text form-text h-75">' + category.description + '</p>' +
                '                    <a href="prodotti.php?category=' + category.name + '" class="btn btn-danger" data-type="' + category.name + '">Vedi i prodotti!</a>' +
                '                </div>' +
                '            </div>')
        })
    })
})