$().ready(function() {
    let prenotazioni = [];
    let n_prenotazioni = 0;
    let numero_camere = [5, 5, 5, 5];
    let current = $.datepicker.formatDate('yy-mm-dd', new Date());
    $('#checkin').attr("min", current);
    $('#checkin').change(function(){
        $('#checkout').attr("min", $('#checkin').val());
    })

    function alert_check(code){
        let alarm;

        switch(code){
            case 0: //terminazione di funzione
                console.log("code: " + code + ", success");
                return;

            case 210:   //successo: è stata creata una prenotazione
                console.log("code: " + code + ", success");
                alarm = "Prenotazione registrata.";
                break;

            case 220:
                console.log("code: " + code + ", success");
                alarm = "Prenotazione eliminata.";
                break;

            case 400:   //errore: non esistono prenotazioni
                console.log("code: " + code + ", error");
                alarm = "Non sono presenti prenotazioni nel registro";
                break;

            case 410:   //errore: non sono presenti camere di quel tipo
                console.log("code: " + code + ", error");
                alarm = "Non sono più disponibili questo tipo di camere";
                break;


            case 430:   //errore del form non compilato correttamente
                console.log("code: " + code + ", error");
                alarm = "Form non valido";
                break;
        }

        if(code!==0){
            alert_(alarm);
        }

    }

    //click del form
    $('#submit').click(function() {
        if($('#form_pren').valid()){
            if(numero_camere[$('#camera').val()-1]-$('#ncamere').val() < 0){    //check del numero di stanze
                alert_check(410);
                return false;
            }
            $('#form_pren').submit();
            aggiungi_Prenotazione();
            alert_check(210);
        }else alert_check(430);
        return false;
    })

    //funzione per finestra dialog per notifica di stato
    function alert_(msg) {
        alert = $("<div></div>");
        $(alert).addClass("dialog");
        $(alert).text(msg);
        $(alert).dialog({
            title: "Attenzione",
            draggable: false,
            resizable: false,
            autoOpen: false,
            modal: true,
            width: "25%",
            buttons: {
                "Ok" : function() {
                    $(alert).dialog('close');
                }
            },
            show: {
                effect: "fade",
                duration: 800
            },
            hide: {
                effect: "clip",
                duration: 200
            }

        });
        $(alert).dialog('open');
    }

    function Prenotazione(){
        this.id = n_prenotazioni;
        this.nome = $('#nome').val(); 
        this.cognome = $('#cognome').val();
        this.citta = $('#cit').val();
        this.nazionalita = $('#nazio').val();
        this.telefono = $('#numero').val();
        this.email = $('#email').val();
        this.ncamere = $('#ncamere').val();
        this.camera = $('#camera option:selected').text();
        this.checkin = $('#checkin').val();
        this.checkout = $('#checkout').val();

        n_prenotazioni++;
        numero_camere[$('#camera').val()-1]-=this.ncamere;

        return this;
    }

    //validazione form
    $("#form_pren").validate({
            rules: {
                nome: {
                    required: true
                },
                cognome: {
                    required: true
                },
                città: {
                    required: true
                },
                nazionalità: {
                    required: true
                },
                telefono: {
                    required: false,
                    digits: true
                },
                email: {
                    required: true,
                    email: true
                },
                camera: {
                    required: true
                },
                arrivo: {
                    required: true
                },
                partenza: {
                    required: true
                }
            }
        }
    )

    //click per la stampa a schermo
    $("#print").bind("click", function() {
        printPrenotazioni();
    });

    //click del tasto 'elimina' per le prenotazioni
    $(document).on("click", ".elimina", function(event) {
        let id = $($(this).closest(".prenotazione")).attr("id");
        elimina_Prenotazione(id);
        $("#"+id).effect("clip", 200);
        alert_check(220);
        //event.stopImmediatePropagation();
    })

        $('#ncamere').change(function() {
            $('#ncamere').attr('max', numero_camere[$('#camera').val()]);
        })

        //stampa a schermo le prenotazioni registrate
        function printPrenotazioni(){
            $('#prenotazioni_box').empty();

            if(prenotazioni.length === 0)   //se esistono prenotazioni
                alert_check(400);

            for(let pren in prenotazioni){  ///creazione dei div delle singole prenotazioni
                let box = $("<div></div>");
                $(box).addClass("prenotazione text-light bg-dark rounded-3 bg-opacity-75 p-1");
                $(box).attr("id", prenotazioni[pren].id);

                $(box).append("<h2>Prenotazione n. " + (parseInt(pren) + 1) + "</h2>");

                let elimina = $("<input type='button' value='elimina'>");
                $(elimina).attr("class", "bg-light bg-opacity-50 btn elimina");
                $(box).append(elimina);

                $(box).append("Nome: " + prenotazioni[pren].nome + "<br>" +     //dati della prenotazione
                    "Cognome: " + prenotazioni[pren].cognome + "<br>" +
                    "Città: " + prenotazioni[pren].citta + "<br>" +
                    "Nazionalità: " + prenotazioni[pren].nazionalita + "<br>" +
                    "Numero: " + prenotazioni[pren].telefono + "<br>" +
                    "Email: " + prenotazioni[pren].email + "<br>" +
                    "Numero di camere: " + prenotazioni[pren].ncamere + "<br>" +
                    "Camera: " + prenotazioni[pren].camera + "<br>" +
                    "Check-in: " + prenotazioni[pren].checkin + "<br>" +
                    "Check-out: " + prenotazioni[pren].checkout);

                $('#prenotazioni_box').append(box).hide().show('slow'); //mostra a schermo con animazione
            }

            alert_check(0);
        }

    //aggiunge una prenotazione
    function aggiungi_Prenotazione(){
        prenotazioni.push(new Prenotazione());
    }

    //elimina una prenotazione dall'id dato
    function elimina_Prenotazione(id){
        let pren = prenotazioni.find((o) => {return o["id"] == id});
        numero_camere[tipo_stanza(pren.camera)]+=parseInt(pren.ncamere);
        prenotazioni.splice(prenotazioni.indexOf(pren), 1);
    }

    function tipo_stanza(stanza){
        if(stanza === "Singola"){
            return 0;
        }

        if(stanza === "Doppia"){
            return 1;
        }

        if(stanza === "Quadrupla"){
            return 2;
        }

        if(stanza === "Luna di miele"){
            return 3;
        }

    }
}
)
