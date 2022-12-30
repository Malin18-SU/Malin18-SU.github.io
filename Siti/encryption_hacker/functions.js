$(document).ready(function(){
    autoplay()
    let key, text;

    function autoplay(){
        let r = confirm("Clicca 'Ok' per attivare la musica");
        if (r === true) {
            document.getElementById("player").play();
        }
    }



    $("#submit").on("click", function(){
        $(".d-error").empty()
        key = $("#key").val()
        text = $("#input").val()
        switch($("#encryption").val()){
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


        function do_DES(){
            let ciphertext = text;

            if($("#mode").val() === "1"){
                // Encrypt
                ciphertext = CryptoJS.DES.encrypt(text, key)
                $("#output").val(ciphertext)
            }else{
                // Decrypt
                let bytes  = CryptoJS.DES.decrypt(ciphertext, key);
                let plaintext = bytes.toString(CryptoJS.enc.Utf8);
                $("#output").val(plaintext)
            }
        }

        function do_3DES(){
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

        function do_own_3DES(){
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

        function do_AES(){
            let ciphertext = text;

            if($("#mode").val() === "1"){
                // Encrypt
                ciphertext = CryptoJS.AES.encrypt(text, key)
                $("#output").val(ciphertext)
            }else{
                // Decrypt
                let bytes  = CryptoJS.AES.decrypt(ciphertext.toString(), key);
                let plaintext = bytes.toString(CryptoJS.enc.Utf8);
                $("#output").val(plaintext)
            }
        }

        function do_personal(){

        }
    })
})