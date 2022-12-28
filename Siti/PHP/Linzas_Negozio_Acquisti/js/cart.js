$(document).ready(function(){
    //elimina un prodotto dal carrello - delete a product from the cart (div)
    $(document).on("click", ".prod-delete", function(){
      $(this).animate({width:'toggle'},150, function(){
          $(this).parent(".product").remove()
      })
    })

    //elimina un prodotto dal carrello - delete a product from the cart (data)
    $(document).on("click", ".prod-delete", function(){
        $("#name").attr("value", $(this).closest(".product").find(".prod-name").text())
        //$("#name").attr("value", $(this).closest(".product").find(".prod-img").children("img").attr("src"))
        $("#delete").submit()
    })
})