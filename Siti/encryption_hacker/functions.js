$(document).ready(function(){
    autoplay()
    let key, text;

    function autoplay(){    //permette di attivare l'audio su chrome            //quando gli dai il segnale fa tutto da solo, non devi fare nient'altro
        let r = confirm("Clicca 'Ok' per attivare la musica");
        if (r === true) {
            document.getElementById("player").play();
        }
    }


    $("#submit").on("click", function(){    //permette di selezionare il tipo di decodifica
        key = $("#key").val()
        text = $("#input").val()
        switch($("#encryption").val()){ //ah ok, allora questo giustifica i mezzi ch- AHAHAHAHAH, che ci sono sotto perché analizza la parola
            case "1":
                do_DES()
                break

            case "2":
                do_3DES()
                break

            case "3":
                do_own_3DES()
                break

            case "4":
                do_AES()
                break

            case "5":
                do_personal()
                break

            default:
                $(".d-error").append("<h3 class='text-danger'>errore</h3>")
        }


        function do_DES(){   //funzione che esegue la codifica e decodifica con DES        //*whispers* che cazzo è...
            let ciphertext = text;

            if($("#mode").val() === "1"){   //se è una codifica
                // Encrypt
                ciphertext = CryptoJS.DES.encrypt(text, key)
                $("#output").val(ciphertext)
            }else{      //se è una decodifica
                // Decrypt
                let bytes  = CryptoJS.DES.decrypt(ciphertext, key);
                let plaintext = bytes.toString(CryptoJS.enc.Utf8);
                $("#output").val(plaintext)
            }
        }

        function do_3DES(){     //funzione che esegue la codifica e decodifica con TripleDES     //*whispers ancora* la stessa cosa...
            let ciphertext = text;

            if($("#mode").val() === "1"){
                // Encrypt
                ciphertext = CryptoJS.TripleDES.encrypt(text, key)
                $("#output").val(ciphertext)
            }else{
                // Decrypt
                let bytes  = CryptoJS.TripleDES.decrypt(ciphertext, key);
                let plaintext = bytes.toString(CryptoJS.enc.Utf8);
                $("#output").val(plaintext)
            }
        }

        function do_own_3DES(){ //funzione che esegue la codifica e decodifica con TripleDES manuale          //QUI E' il punto importante, il pilastro del codice perché qui analizza il tutto, aspet perché se non succede una cosa, succede un'altra
            key = key.split(' ');
            let ciphertext = text;

            if($("#mode").val() === "1"){
                // Encrypt
                for(let keys in key){
                    ciphertext = CryptoJS.TripleDES.encrypt(text, keys)
                }

                $("#output").val(ciphertext)
            }else{
                // Decrypt
                let bytes

                let temp = key[0]
                key[0] = key[2]
                key[2] = temp
                for(let keys in key){
                    bytes  = CryptoJS.TripleDES.decrypt(ciphertext, keys);
                }

                let plaintext = bytes.toString(CryptoJS.enc.Utf8);
                $("#output").val(plaintext)
            }


        }

        function do_AES(){   //funzione che esegue la codifica e decodifica con AES                //e in questo caso se il valore è uguale a 1, va bene, se è diverso, se ne va nelle backrooms (minchia aggiungerei)
            let ciphertext = text;

            if($("#mode").val() === "1"){
                // Encrypt
                ciphertext = CryptoJS.AES.encrypt(text, key)
                $("#output").val(ciphertext)
            }else{
                // Decrypt
                let bytes  = CryptoJS.AES.decrypt(ciphertext.toString(), key);
                let plaintext = bytes.toString();
                $("#output").val(plaintext)
            }
        }

        function do_personal(){     //funzione che esegue la codifica e decodifica con metodo originale
            let ciphertext = text;

            if($("#mode").val() === "1"){
                // Encrypt
                ciphertext = own_encrypt(own_encrypt(own_encrypt(text, key), key), key)
                $("#output").val(ciphertext)
            }else{
                // Decrypt
                let bytes  = own_decrypt(own_decrypt(own_decrypt(ciphertext.toString(CryptoJS.enc.Utf8), key).toString(CryptoJS.enc.Utf8), key).toString(CryptoJS.enc.Utf8), key);
                let plaintext = bytes.toString(CryptoJS.enc.Utf8);
                $("#output").val(plaintext)
            }
        }


        function own_encrypt(text, key){
            let key_crypt = 0
            let text_crypt = ""

            for(let i = 0;i < key.length; i++){
                key_crypt += key.charCodeAt(i)
            }

            console.log(key_crypt)
            console.log(key_crypt/4)
            console.log(key_crypt%((key_crypt/4)+1))
            key_crypt = (key_crypt%((key_crypt/4)+1)).toString()

            console.log(key_crypt)

            for(let i = 0;i < text.length; i++){
                if(i % 2 === 0){
                    text_crypt += String.fromCharCode(text.charCodeAt(i) + (Number)(key_crypt))
                }else text_crypt += String.fromCharCode(text.charCodeAt(i) - (Number)(key_crypt))

                //console.log("text_crypt: " + text_crypt + ", text: " + text.charAt(i))
            }

            return text_crypt
        }

        function own_decrypt(text, key){
            let key_crypt = 0
            let text_crypt = ""

            for(let i = 0;i < key.length; i++){
                key_crypt += key.charCodeAt(i)
            }

            key_crypt = (key_crypt%((key_crypt/4)+1)).toString()

            for(let i = 0;i < text.length; i++){
                if(i % 2 === 0){
                    text_crypt += String.fromCharCode(text.charCodeAt(i) - (Number)(key_crypt))
                }else text_crypt += String.fromCharCode(text.charCodeAt(i) + (Number)(key_crypt))

                //console.log("text_crypt: " + text_crypt + ", text: " + text.charAt(i))
            }

            return text_crypt
        }
    })
})