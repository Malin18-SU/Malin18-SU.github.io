$(document).ready(function(){
    let pokemon_images = {"Bulbasaur":"http://img.pokemondb.net/artwork/bulbasaur.jpg","Ivysaur":"http://img.pokemondb.net/artwork/ivysaur.jpg","Venusaur":"http://img.pokemondb.net/artwork/venusaur.jpg","Charmander":"http://img.pokemondb.net/artwork/charmander.jpg","Charmeleon":"http://img.pokemondb.net/artwork/charmeleon.jpg","Charizard":"http://img.pokemondb.net/artwork/charizard.jpg","Squirtle":"http://img.pokemondb.net/artwork/squirtle.jpg","Wartortle":"http://img.pokemondb.net/artwork/wartortle.jpg","Blastoise":"http://img.pokemondb.net/artwork/blastoise.jpg","Caterpie":"http://img.pokemondb.net/artwork/caterpie.jpg","Metapod":"http://img.pokemondb.net/artwork/metapod.jpg","Butterfree":"http://img.pokemondb.net/artwork/butterfree.jpg","Weedle":"http://img.pokemondb.net/artwork/weedle.jpg","Kakuna":"http://img.pokemondb.net/artwork/kakuna.jpg","Beedrill":"http://img.pokemondb.net/artwork/beedrill.jpg","Pidgey":"http://img.pokemondb.net/artwork/pidgey.jpg","Pidgeotto":"http://img.pokemondb.net/artwork/pidgeotto.jpg","Pidgeot":"http://img.pokemondb.net/artwork/pidgeot.jpg","Rattata":"http://img.pokemondb.net/artwork/rattata.jpg","Raticate":"http://img.pokemondb.net/artwork/raticate.jpg","Spearow":"http://img.pokemondb.net/artwork/spearow.jpg","Fearow":"http://img.pokemondb.net/artwork/fearow.jpg","Ekans":"http://img.pokemondb.net/artwork/ekans.jpg","Arbok":"http://img.pokemondb.net/artwork/arbok.jpg","Pikachu":"http://img.pokemondb.net/artwork/pikachu.jpg","Raichu":"http://img.pokemondb.net/artwork/raichu.jpg","Sandshrew":"http://img.pokemondb.net/artwork/sandshrew.jpg","Sandslash":"http://img.pokemondb.net/artwork/sandslash.jpg","Nidoran?":"http://img.pokemondb.net/artwork/nidoran-f.jpg","Nidorina":"http://img.pokemondb.net/artwork/nidorina.jpg","Nidoqueen":"http://img.pokemondb.net/artwork/nidoqueen.jpg","Nidoran":"http://img.pokemondb.net/artwork/nidoran-m.jpg","Nidorino":"http://img.pokemondb.net/artwork/nidorino.jpg","Nidoking":"http://img.pokemondb.net/artwork/nidoking.jpg","Clefairy":"http://img.pokemondb.net/artwork/clefairy.jpg","Clefable":"http://img.pokemondb.net/artwork/clefable.jpg","Vulpix":"http://img.pokemondb.net/artwork/vulpix.jpg","Ninetales":"http://img.pokemondb.net/artwork/ninetales.jpg","Jigglypuff":"http://img.pokemondb.net/artwork/jigglypuff.jpg","Wigglytuff":"http://img.pokemondb.net/artwork/wigglytuff.jpg","Zubat":"http://img.pokemondb.net/artwork/zubat.jpg","Golbat":"http://img.pokemondb.net/artwork/golbat.jpg","Oddish":"http://img.pokemondb.net/artwork/oddish.jpg","Gloom":"http://img.pokemondb.net/artwork/gloom.jpg","Vileplume":"http://img.pokemondb.net/artwork/vileplume.jpg","Paras":"http://img.pokemondb.net/artwork/paras.jpg","Parasect":"http://img.pokemondb.net/artwork/parasect.jpg","Venonat":"http://img.pokemondb.net/artwork/venonat.jpg","Venomoth":"http://img.pokemondb.net/artwork/venomoth.jpg","Diglett":"http://img.pokemondb.net/artwork/diglett.jpg","Dugtrio":"http://img.pokemondb.net/artwork/dugtrio.jpg","Meowth":"http://img.pokemondb.net/artwork/meowth.jpg","Persian":"http://img.pokemondb.net/artwork/persian.jpg","Psyduck":"http://img.pokemondb.net/artwork/psyduck.jpg","Golduck":"http://img.pokemondb.net/artwork/golduck.jpg","Mankey":"http://img.pokemondb.net/artwork/mankey.jpg","Primeape":"http://img.pokemondb.net/artwork/primeape.jpg","Growlithe":"http://img.pokemondb.net/artwork/growlithe.jpg","Arcanine":"http://img.pokemondb.net/artwork/arcanine.jpg","Poliwag":"http://img.pokemondb.net/artwork/poliwag.jpg","Poliwhirl":"http://img.pokemondb.net/artwork/poliwhirl.jpg","Poliwrath":"http://img.pokemondb.net/artwork/poliwrath.jpg","Abra":"http://img.pokemondb.net/artwork/abra.jpg","Kadabra":"http://img.pokemondb.net/artwork/kadabra.jpg","Alakazam":"http://img.pokemondb.net/artwork/alakazam.jpg","Machop":"http://img.pokemondb.net/artwork/machop.jpg","Machoke":"http://img.pokemondb.net/artwork/machoke.jpg","Machamp":"http://img.pokemondb.net/artwork/machamp.jpg","Bellsprout":"http://img.pokemondb.net/artwork/bellsprout.jpg","Weepinbell":"http://img.pokemondb.net/artwork/weepinbell.jpg","Victreebel":"http://img.pokemondb.net/artwork/victreebel.jpg","Tentacool":"http://img.pokemondb.net/artwork/tentacool.jpg","Tentacruel":"http://img.pokemondb.net/artwork/tentacruel.jpg","Geodude":"http://img.pokemondb.net/artwork/geodude.jpg","Graveler":"http://img.pokemondb.net/artwork/graveler.jpg","Golem":"http://img.pokemondb.net/artwork/golem.jpg","Ponyta":"http://img.pokemondb.net/artwork/ponyta.jpg","Rapidash":"http://img.pokemondb.net/artwork/rapidash.jpg","Slowpoke":"http://img.pokemondb.net/artwork/slowpoke.jpg","Slowbro":"http://img.pokemondb.net/artwork/slowbro.jpg","Magnemite":"http://img.pokemondb.net/artwork/magnemite.jpg","Magneton":"http://img.pokemondb.net/artwork/magneton.jpg","Farfetch'd":"http://img.pokemondb.net/artwork/farfetch'd.jpg","Doduo":"http://img.pokemondb.net/artwork/doduo.jpg","Dodrio":"http://img.pokemondb.net/artwork/dodrio.jpg","Seel":"http://img.pokemondb.net/artwork/seel.jpg","Dewgong":"http://img.pokemondb.net/artwork/dewgong.jpg","Grimer":"http://img.pokemondb.net/artwork/grimer.jpg","Muk":"http://img.pokemondb.net/artwork/muk.jpg","Shellder":"http://img.pokemondb.net/artwork/shellder.jpg","Cloyster":"http://img.pokemondb.net/artwork/cloyster.jpg","Gastly":"http://img.pokemondb.net/artwork/gastly.jpg","Haunter":"http://img.pokemondb.net/artwork/haunter.jpg","Gengar":"http://img.pokemondb.net/artwork/gengar.jpg","Onix":"http://img.pokemondb.net/artwork/onix.jpg","Drowzee":"http://img.pokemondb.net/artwork/drowzee.jpg","Hypno":"http://img.pokemondb.net/artwork/hypno.jpg","Krabby":"http://img.pokemondb.net/artwork/krabby.jpg","Kingler":"http://img.pokemondb.net/artwork/kingler.jpg","Voltorb":"http://img.pokemondb.net/artwork/voltorb.jpg","Electrode":"http://img.pokemondb.net/artwork/electrode.jpg","Exeggcute":"http://img.pokemondb.net/artwork/exeggcute.jpg","Exeggutor":"http://img.pokemondb.net/artwork/exeggutor.jpg","Cubone":"http://img.pokemondb.net/artwork/cubone.jpg","Marowak":"http://img.pokemondb.net/artwork/marowak.jpg","Hitmonlee":"http://img.pokemondb.net/artwork/hitmonlee.jpg","Hitmonchan":"http://img.pokemondb.net/artwork/hitmonchan.jpg","Lickitung":"http://img.pokemondb.net/artwork/lickitung.jpg","Koffing":"http://img.pokemondb.net/artwork/koffing.jpg","Weezing":"http://img.pokemondb.net/artwork/weezing.jpg","Rhyhorn":"http://img.pokemondb.net/artwork/rhyhorn.jpg","Rhydon":"http://img.pokemondb.net/artwork/rhydon.jpg","Chansey":"http://img.pokemondb.net/artwork/chansey.jpg","Tangela":"http://img.pokemondb.net/artwork/tangela.jpg","Kangaskhan":"http://img.pokemondb.net/artwork/kangaskhan.jpg","Horsea":"http://img.pokemondb.net/artwork/horsea.jpg","Seadra":"http://img.pokemondb.net/artwork/seadra.jpg","Goldeen":"http://img.pokemondb.net/artwork/goldeen.jpg","Seaking":"http://img.pokemondb.net/artwork/seaking.jpg","Staryu":"http://img.pokemondb.net/artwork/staryu.jpg","Starmie":"http://img.pokemondb.net/artwork/starmie.jpg","Mr. Mime":"http://img.pokemondb.net/artwork/mr. mime.jpg","Scyther":"http://img.pokemondb.net/artwork/scyther.jpg","Jynx":"http://img.pokemondb.net/artwork/jynx.jpg","Electabuzz":"http://img.pokemondb.net/artwork/electabuzz.jpg","Magmar":"http://img.pokemondb.net/artwork/magmar.jpg","Pinsir":"http://img.pokemondb.net/artwork/pinsir.jpg","Tauros":"http://img.pokemondb.net/artwork/tauros.jpg","Magikarp":"http://img.pokemondb.net/artwork/magikarp.jpg","Gyarados":"http://img.pokemondb.net/artwork/gyarados.jpg","Lapras":"http://img.pokemondb.net/artwork/lapras.jpg","Ditto":"http://img.pokemondb.net/artwork/ditto.jpg","Eevee":"http://img.pokemondb.net/artwork/eevee.jpg","Vaporeon":"http://img.pokemondb.net/artwork/vaporeon.jpg","Jolteon":"http://img.pokemondb.net/artwork/jolteon.jpg","Flareon":"http://img.pokemondb.net/artwork/flareon.jpg","Porygon":"http://img.pokemondb.net/artwork/porygon.jpg","Omanyte":"http://img.pokemondb.net/artwork/omanyte.jpg","Omastar":"http://img.pokemondb.net/artwork/omastar.jpg","Kabuto":"http://img.pokemondb.net/artwork/kabuto.jpg","Kabutops":"http://img.pokemondb.net/artwork/kabutops.jpg","Aerodactyl":"http://img.pokemondb.net/artwork/aerodactyl.jpg","Snorlax":"http://img.pokemondb.net/artwork/snorlax.jpg","Articuno":"http://img.pokemondb.net/artwork/articuno.jpg","Zapdos":"http://img.pokemondb.net/artwork/zapdos.jpg","Moltres":"http://img.pokemondb.net/artwork/moltres.jpg","Dratini":"http://img.pokemondb.net/artwork/dratini.jpg","Dragonair":"http://img.pokemondb.net/artwork/dragonair.jpg","Dragonite":"http://img.pokemondb.net/artwork/dragonite.jpg","Mewtwo":"http://img.pokemondb.net/artwork/mewtwo.jpg","Mew":"http://img.pokemondb.net/artwork/mew.jpg"}
    let pokemon_names = []
    let colors = {"normal": "#A8A77A", "fire": "#EE8130", "water": "#6390F0", "electric": "#F7D02C", "grass": "#7AC74C", "ice": "#96D9D6", "fighting": "#C22E28","poison": "#A33EA1", "ground": "#E2BF65",
        "flying": "#A98FF3", "psychic": "#F95587", "bug": "#A6B91A", "rock": "#B6A136", "ghost": "#735797", "dragon": "#6F35FC", "dark": "#705746", "steel": "#B7B7CE", "fairy": "#D685AD"};


    $("#pokemon_content").hide()
    $(".container-fight").hide()
    names()
    setDroppable("#pokefight_container1")
    setDroppable("#pokefight_container2")

    $("#btn-fight").on("click", function(){
        if(check_fight_conditions()){
            animation_start_fight()
            $(this).parent().css({
                background: "url('/images/fight/" + $(this).parent().find("#pokefight_container1").attr("meta-type") + ".jpg') no-repeat center center fixed",
                backgroundSize: "cover",
                borderRadius: "8px"
            })
        }

    })

    $("#pokemon_name").autocomplete({
        source: pokemon_names
    })

    $("#pokemon_name").on("change", function(){
        $("#pokemon_abilities").empty()
        $("#pokemon_types").empty()
        $("#pokemon_stats").empty()
        $("#pokemon_stats_name").empty()
        $("#pokemon_content").show()
        $("#pokemon_card").css({
            backgroundColor: "black"
        })

        if($("#pokemon_img").attr("src", "/images/404/error.gif")){
            $("#pokemon_card").draggable({disabled: true})
        }



        let name = $("#pokemon_name").val();
        name = name.substr(0, 1).toLowerCase() + name.substr(1)

        $("#pokemon_img").attr("src", "https://projectpokemon.org/images/normal-sprite/" + name + ".gif")

        $("#pokemon_img").on("error", function(){
            $("#pokemon_img").attr("src", "/images/404/error.gif").css({
                width: "100%",
                height: "100%"
            })
        })


        $.ajax({
            type: "GET",
            datatype: "json",
            url: "https://pokeapi.co/api/v2/pokemon/" + name,
            success: function(data) {
                console.log(data)
                $("#pokemon_abilities").empty()
                $("#pokemon_types").empty()
                $("#pokemon_stats_name").empty()
                $("#pokemon_stats").empty()
                data.abilities.forEach(function(item, index){
                    $("#pokemon_abilities").append("<td>" + item.ability.name + "</td>")
                })

                data.types.forEach(function(item, index){
                    $("#pokemon_types").append("<td>" + item.type.name + "</td>")
                    color_type(colors[item.type.name])
                })

                data.stats.forEach(function(item, index){
                    $("#pokemon_stats_name").append("<th>" + item.stat.name + "</th>")
                    $("#pokemon_stats").append($("<td>" + item.base_stat + "</td>").attr("id", item.stat.name))
                })

                setDraggable("#pokemon_card")
            }
        });
    })

    function color_type(color){
        $("#pokemon_card").css({
            backgroundColor: color
        })
    }

    function setDroppable(obj){
        $(obj).droppable({
            accepts: ".pokemon_card",
            drop: function(event, ui){
                if($.trim($(this).html() == 0))
                    $(this).empty()

                $(this).css({
                    backgroundColor: $(ui.draggable).css("backgroundColor")
                })

                $(ui.draggable).find("#pokemon_img").clone().css({
                    width: "100%",
                    height: "100%",
                    objectFit: "contain"
                }).appendTo(this)

                if($(this).attr("id") == "pokefight_container1"){
                    $($(this).find("#pokemon_img")).css({
                        transform: "scaleX(-1)"
                    })

                    $(this).append($("<div class='container bg-light text-dark border border-secondary rounded-1'>" +
                        "<h3 class='pokemon_fight_name'>" + $(ui.draggable).find("#pokemon_name").val().toUpperCase() + "</h3>" +
                        "<div>HP  <div id='pokelife_1' class='progress-bar'></div></div>"))
                    $(this).attr("meta-type", $(ui.draggable).find("#pokemon_types").children("td").last().text())

                    setProgressbar("#pokelife_1", $(ui.draggable).find("#hp").text())
                }else{
                    $(this).append($("<div class='container bg-light text-dark border border-secondary rounded-1'>" +
                        "<h3 class='pokemon_fight_name'>" + $(ui.draggable).find("#pokemon_name").val().toUpperCase() + "</h3>" +
                        "<div>HP  <div id='pokelife_2' class='progress-bar'></div></div>"))
                    setProgressbar("#pokelife_2", $(ui.draggable).find("#hp").text())
                }

                $(this).removeClass("border").css({
                    borderStyle: "solid",
                    borderColor: "black"
                })
            }
        })
    }

    function setDraggable(obj){
        $(obj).draggable({
            revert: true,
            disabled: false
        })
    }

    function setProgressbar(obj, max){
        $(obj).children("div").addClass("bg-success")
        $(obj).progressbar({
            max: max,
            value: max-0.1,

            change: function(){
                if($(obj).val()/max*100 <=75){
                    $(obj).children("div").addClass("bg-warning")
                }

                if($(obj).val()/max*100 <=25){
                    $(obj).children("div").addClass("bg-danger")
                }
            }
        })

    }

    function animation_start_fight(){
        $("#pokemon_card").hide("slideUp")
        $("#btn-fight").hide("fade")
        $(".container-fight").animate({
            minHeight: "90vh"
        })

        $("#pokefight_container1").animate({
            top: "-300px",
        })

        $("#pokefight_container2").animate({
            top: "300px",
        })


    }

    function fight(){

    }

    function check_fight_conditions(){
        if($.trim($("#pokefight_container1").html()) == 0 || ($.trim($("#pokefight_container2").html()) == 0)){
            alert("pokémon non inserito")

            return false
        }

        return true
    }

    function names(){
        $.ajax({
            type: "GET",
            datatype: "json",
            url: "https://pokeapi.co/api/v2/pokemon/?offset=0&limit=1154",
            success: function(data){
                for(let offset=0;offset<1154;offset++){
                    pokemon_names.push(data.results[offset].name)
                }

            }
        })
    }

})