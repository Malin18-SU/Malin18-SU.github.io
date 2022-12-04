$(document).ready(function(){
    let json_url = "chats.json"
    let Timeout = []
    let stop_chat = false

    setInterval(Time, 1000)
    load_app()



    $(document).on("click", "div.user > div", function(){
        $(".chats_window").hide()
        load_chat($(this).closest(".user").attr("data-name"))
    })

    $(document).on("click", "div .top-chat > .icon", function(){
        $(".icon").closest(".window").remove()
        stop_chat = true
        clearTimeout_msg(Timeout)
        $(".chats_window").show()
    })

    $(document).on("click", "div .send > .icon", function(){
        if($(".send-msg").val() !== "")
        send_message({
            sender: "you",
            content: $(".send-msg").val(),
            time: "[10/11/22] 10:33"
        })
        $(".send-msg").val("")
    })

    //load the selected chat
    function load_chat(user){
        $.getJSON(json_url, function(data){     //takes the JSON file
            data.users.forEach(function(item){      //check on every user
                if(item.name === user){     //when finds the user's chat, it loads
                    $(".content").append('<div class="window">' +
                        '   <div class="top-chat d-flex flex-wrap color-secondary">' +
                        '       <div class="icon">' +
                        '               <img src="images/icons/back_arrow.svg">' +
                        '       </div>' +
                        '                    <div class="user-icon">\n' +
                        '                        <img src=' + item.pic + '>\n' +
                        '                    </div>\n' +
                        '\n' +
                        '                    <div class="mt-2 w-50">\n' +
                        '                        <h2 class="user-name">' + item.name + '</h2>\n' +
                        '                    </div>' +
                        '   </div>' +
                        ' <div class="chat"></div>' +
                        ' <div class="bot-chat m-auto p-2 rounded d-flex flex-wrap color-main-2">' +
                        '<input type="text" class="form-control send-msg w-75 color-main-1" placeholder="Scrivi un messaggio"</div>' +
                        '<div class="w-25 send text-end"> ' +
                        '<div class="icon">' +
                        '<img src="images/icons/send.png">' +
                        '</div>' +
                        '</div>' +
                        '</div>')
                    $(".send-msg").attr('disabled', 'disabled')
                    $(".chat").scroll()
                    stop_chat = false
                    item.chat.every(function(msg){    //print every message
                        Timeout[msg.id] = setTimeout(function(){
                            if((Timeout && stop_chat) || (msg.id === item.chat[item.chat.length-1].id)){       //doesn't allow to print messages of previous chats
                                clearTimeout_msg(Timeout)
                                $(".send-msg").removeAttr('disabled')
                                return false
                            }

                            if(item.user === "Gabriel" && msg.id === 6){

                            }

                            send_message(msg)
                        }, (msg.id-1) * 2000)
                        return true
                    })
                }
            })
        })

    }

    function send_message(msg){
        $(".chat").append('<div id="' + msg.id + '" class="messageBox bg-light">')

        if(msg.sender !== "you"){
            $("#" + msg.id).append(
                '<div class="msg-sender">' + msg.sender + '</div>'
            )
        }

        if(msg.image){
            $("#" + msg.id).append(
                '<div class="msg-image"><img src="' + msg.image + '"></div>'
            )
        }

        $("#" + msg.id).append(
            '<div class="msg-content">' + msg.content + '</div>' +
            '<div class="msg-time float-end">' + msg.time.substring(11) + '</div> ' +
            '</div>')

        if(msg.sender === "you"){       //if this is your message, add class "you"
            $(".chat").children("#" + msg.id).addClass("you color-main").removeClass("bg-light")
        }

        $(".chat").animate({
            scrollTop: $('.chat').prop("scrollHeight")}, 1000)
    }

    //load the selected chat
    function load_app(){
        $.getJSON(json_url, function(data){
            data.users.forEach(function(item){
                $(".chats_window").append('  <div class="user d-flex text-wrap" data-name=' + item.name + ' >\n' +
                    '                    <div class="w-25">\n' +
                    '                        <img src=' + item.pic + '>\n' +
                    '                    </div>\n' +
                    '\n' +
                    '                    <div class="mt-3 w-50">\n' +
                    '                        <h2>' + item.name + '</h2>\n' +
                    '                        <h5 class="d-inline-flex">' + max_content(item.chat[item.chat.length-1].sender + ": "  + item.chat[item.chat.length-1].content, 21) + '</h5>\n' +
                    '                    </div><div class="ms-auto me-1 mt-4">    <h6 class="text-end">' + item.chat[item.chat.length-1].time + '</h6>' +
                    '                    </div>\n')
            })
        })
    }


    //clear all timeout created for the messages
    function clearTimeout_msg(Timeouts){
        Timeouts.forEach(function(value){
            window.clearTimeout(value)
        })

        Timeouts = []
    }

    //refresh the clock time displayed
    function Time(){
        let d = new Date()
        let minutes = d.getMinutes()
        let hours = d.getHours()

        if(hours < 10)
             hours = "0" + hours

        if(minutes < 10)
            minutes = "0" + minutes


        $("#time").text(hours + ":" + minutes)
    }

    //when the content has a higher value than the max_char value, it shows just the ones before adding "..."
    function max_content(content, max_char){
        if(content.length > max_char){
            return content.substr(0, 21) + "...";
        }
        else return content;
    }

})


/*
* TO DO LIST
*   -Funzione per stampare il contenuto in modo che dopo tot caratteri metta "..." e basta ##fatto
*   -Funzione per visualizzare l'orario dell'ultimo messaggio sulla finestra principale ##fatto
*   -Funzione per i messaggi
*   -Funzione che ordina le chat in base alla data dell'ultimo messaggio*/